<?php
require_once __DIR__ . '/utils.php';

#[\AllowDynamicProperties]
class ComponentContext
{
    private string $_path;

    public function __construct(string $path, array $props)
    {
        $this->_path = $path;
        foreach ($props as $k => $v) {
            $this->$k = $v;
        }
    }

    public function evaluate(): string
    {
        ob_start();
        require $this->_path;
        return ob_get_clean();
    }
}

class SfcEngine
{
    private string $components_dir;
    private static ?SfcEngine $instance = null;

    private function __construct(string $components_dir)
    {
        $this->components_dir = rtrim($components_dir, '/');
    }

    public static function init(string $components_dir): self
    {
        self::$instance = new self($components_dir);
        return self::$instance;
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            throw new \RuntimeException('SfcEngine not initialized. Call SfcEngine::init() first.');
        }
        return self::$instance;
    }

    public function renderPage(string $name): string
    {
        $GLOBALS['component_css'] = [];
        $html = $this->renderComponent($name, []);

        $dom = new DOMDocument('1.0', 'UTF-8');
        @$dom->loadXML($html);

        $css = implode("\n", $GLOBALS['component_css']);
        if ($css !== '') {
            $xpath = new DOMXPath($dom);
            $head = $xpath->query('//head')->item(0);
            if ($head !== null) {
                $style = $dom->createElement('style');
                $style->appendChild($dom->createCDATASection($css));
                $head->appendChild($style);
            }
        }

        return '<!DOCTYPE html>' . "\n" . $dom->saveHTML($dom->documentElement);
    }

    public function renderComponent(string $name, array $props): string
    {
        $path = $this->components_dir . '/' . $name . '.php';
        if (!file_exists($path)) {
            throw new \RuntimeException("Component not found: $name at $path");
        }

        $ctx = new ComponentContext($path, $props);
        $output = $ctx->evaluate();

        $dom = new DOMDocument('1.0', 'UTF-8');
        $wrapped = '<sfc>' . $output . '</sfc>';
        $result = @$dom->loadXML($wrapped);
        if ($result === false) {
            throw new \RuntimeException("XML parse error in component '$name'. Output was:\n" . substr($output, 0, 200));
        }

        if (!isset($GLOBALS['component_css'][$name])) {
            $xpath = new DOMXPath($dom);
            $style_nodes = $xpath->query('/sfc/style');
            if ($style_nodes->length > 0) {
                $style_node = $style_nodes->item(0);
                $css = '';
                foreach ($style_node->childNodes as $child) {
                    $css .= $child->data ?? $dom->saveXML($child);
                }
                $GLOBALS['component_css'][$name] = trim($css);
            }
        }

        $xpath = new DOMXPath($dom);
        $template_nodes = $xpath->query('/sfc/template');
        if ($template_nodes->length === 0) {
            throw new \RuntimeException("Component '$name' has no <template> element.");
        }
        $template = $template_nodes->item(0);

        $this->substituteCustomElements($template, $dom);
        return $this->innerXml($template, $dom);
    }

    private function substituteCustomElements(DOMElement $root, DOMDocument $doc): void
    {
        $xpath = new DOMXPath($doc);
        $elements = [];
        foreach ($xpath->query('.//*[starts-with(name(), "x-")]', $root) as $el) {
            $elements[] = $el;
        }

        foreach ($elements as $el) {
            if ($el->parentNode === null) {
                continue;
            }

            $component_name = substr($el->localName, 2);
            $props = [];
            foreach ($el->attributes as $attr) {
                $props[$attr->name] = $attr->value;
            }

            $rendered_html = $this->renderComponent($component_name, $props);

            $tmp = new DOMDocument('1.0', 'UTF-8');
            @$tmp->loadXML('<fragment>' . $rendered_html . '</fragment>');

            $parent = $el->parentNode;
            $ref = $el->nextSibling;

            foreach (iterator_to_array($tmp->documentElement->childNodes) as $child) {
                $imported = $doc->importNode($child, true);
                $parent->insertBefore($imported, $ref);
            }

            $parent->removeChild($el);
        }
    }

    private function innerXml(DOMElement $el, DOMDocument $doc): string
    {
        $out = '';
        foreach ($el->childNodes as $child) {
            $out .= $doc->saveXML($child);
        }
        return $out;
    }
}

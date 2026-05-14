<?php
class XmlUtil
{
    public static function loadFile(string $path): \SimpleXMLElement
    {
        return simplexml_load_file($path);
    }

    public static function toArray($xml)
    {
        if ($xml instanceof \SimpleXMLElement) {
            $xml = (array) $xml;
        }
        if (!is_array($xml)) {
            return $xml;
        }
        return array_map(fn($item) => self::toArray($item), $xml);
    }

    public static function createDocument(string $xml, string $context = ''): \DOMDocument
    {
        $dom = new \DOMDocument('1.0', 'UTF-8');
        $result = @$dom->loadXML($xml);
        if ($result === false) {
            throw new \RuntimeException("XML parse error" . ($context ? " in $context" : '') . ". Content was:\n" . substr($xml, 0, 200));
        }
        return $dom;
    }
}

class ParsedComponent
{
    public function __construct(
        public readonly string $templateHtml,
        public readonly string $css
    ) {}
}

class ComponentParser
{
    public function parse(string $output, string $componentName): ParsedComponent
    {
        if (!preg_match('/<template>(.*?)<\/template>/s', $output, $matches)) {
            throw new \RuntimeException("Component '$componentName' has no <template> element.");
        }
        $templateHtml = $matches[1];

        $css = '';
        if (preg_match('/<style>(.*?)<\/style>/s', $output, $matches)) {
            $css = trim($matches[1]);
        }

        return new ParsedComponent($templateHtml, $css);
    }
}

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
    private ComponentParser $parser;
    private array $css = [];

    public function __construct(string $components_dir)
    {
        $this->components_dir = rtrim($components_dir, '/');
        $this->parser = new ComponentParser();
    }

    public function renderPage(string $name): string
    {
        $this->css = [];
        $html = $this->renderComponent($name, []);

        $dom = XmlUtil::createDocument($html, "page '$name'");

        $this->injectStyles($dom);

        return '<!DOCTYPE html>' . "\n" . $dom->saveHTML($dom->documentElement);
    }

    private function injectStyles(DOMDocument $dom): void
    {
        $xpath = new DOMXPath($dom);
        $css_elements = $xpath->query('//css');

        if ($css_elements->length === 0) {
            return;
        }

        $css = implode("\n", $this->css);
        if ($css === '') {
            return;
        }

        $style = $dom->createElement('style');
        $style->appendChild($dom->createTextNode($css));

        foreach ($css_elements as $el) {
            if ($el->parentNode !== null) {
                $el->parentNode->replaceChild($style, $el);
            }
        }
    }

    public function renderComponent(string $name, array $props): string
    {
        $path = $this->components_dir . '/' . $name . '.php';
        if (!file_exists($path)) {
            throw new \RuntimeException("Component not found: $name at $path");
        }

        $ctx = new ComponentContext($path, $props);
        $output = $ctx->evaluate();

        $parsed = $this->parser->parse($output, $name);

        if (!isset($this->css[$name]) && $parsed->css !== '') {
            $this->css[$name] = $parsed->css;
        }

        $dom = XmlUtil::createDocument('<sfc>' . $parsed->templateHtml . '</sfc>', "component '$name'");

        $root = $dom->documentElement;
        $this->substituteCustomElements($root, $dom);
        return $this->innerXml($root, $dom);
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

            $tmp = XmlUtil::createDocument('<fragment>' . $rendered_html . '</fragment>');

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

function data_url(string $header, string $source): string
{
    $contents = file_get_contents($source);
    $b64 = base64_encode($contents);
    return "{$header};base64,{$b64}";
}

function asset(string $path)
{
    return getcwd() . "/assets/" . $path;
}


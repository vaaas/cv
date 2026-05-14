<?php
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
    private static ?SfcEngine $instance = null;

    private function __construct(string $components_dir)
    {
        $this->components_dir = rtrim($components_dir, '/');
        $this->parser = new ComponentParser();
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
        $this->css = [];
        $html = $this->renderComponent($name, []);

        $dom = new DOMDocument('1.0', 'UTF-8');
        @$dom->loadXML($html);

        $css = implode("\n", $this->css);
        if ($css !== '') {
            $xpath = new DOMXPath($dom);
            $head = $xpath->query('//head')->item(0);
            if ($head !== null) {
                $style = $dom->createElement('style');
                $style->appendChild($dom->createTextNode($css));
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

        $parsed = $this->parser->parse($output, $name);

        if (!isset($this->css[$name]) && $parsed->css !== '') {
            $this->css[$name] = $parsed->css;
        }

        $dom = new DOMDocument('1.0', 'UTF-8');
        $wrapped = '<sfc>' . $parsed->templateHtml . '</sfc>';
        $result = @$dom->loadXML($wrapped);
        if ($result === false) {
            throw new \RuntimeException("XML parse error in component '$name'. Output was:\n" . substr($parsed->templateHtml, 0, 200));
        }

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

function loadXml(string $path)
{
    return simplexml_load_file(getcwd() . "/data/" . $path);
}

function xml_to_array($xml)
{
    if ($xml instanceof \SimpleXMLElement) {
        $xml = (array) $xml;
    }
    if (!is_array($xml)) {
        return $xml;
    }
    return array_map('xml_to_array', $xml);
}

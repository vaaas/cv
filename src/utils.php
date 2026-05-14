<?php

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

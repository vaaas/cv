<?php

function data_url(string $header, string $source): string
{
    $contents = file_get_contents($source);
    $b64 = base64_encode($contents);
    return "{$header};base64,{$b64}";
}

function walk(string $dir)
{
    foreach (scandir($dir) as $entry) {
        if (str_starts_with($entry, ".")) {
            continue;
        }
        $pathname = $dir . "/" . $entry;
        if (is_file($pathname)) {
            yield $pathname;
        } elseif (is_dir($pathname)) {
            yield from walk($pathname);
        }
    }
}

function asset(string $path)
{
    return getcwd() . "/assets/" . $path;
}

function loadXml(string $path)
{
    return simplexml_load_file(getcwd() . "/data/" . $path);
}

<?php
error_reporting(E_ALL ^ E_WARNING);
require __DIR__ . "/engine.php";
echo (new SfcEngine(__DIR__ . "/components"))->renderPage("index-page");

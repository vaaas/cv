<?php
error_reporting(E_ALL ^ E_WARNING);
require __DIR__ . "/engine.php";
echo SfcEngine::init(__DIR__ . "/components")->renderPage("index-page");

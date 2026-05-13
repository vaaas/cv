<?php
error_reporting(E_ALL ^ E_WARNING);
require __DIR__ . '/engine.php';
SfcEngine::init(__DIR__ . '/components');
echo render_page('index-page');

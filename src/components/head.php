<?php
$favicon_url = data_url('data:image/png', asset('favicon.png'));
$font_url = data_url('data:font/truetype;charset=utf-8', asset('playfair-display/PlayfairDisplay-VariableFont_wght.ttf'));
?>
<template>
  <head>
    <meta charset="utf-8"/>
    <title>Vasileios Pasioliokis - Software Developer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="CV of Vasileios Pasialiokis, senior full-stack engineer, Javascript, Typescript, Vue, PHP, Laravel"/>
    <link rel="icon" href="<?= htmlspecialchars($favicon_url, ENT_XML1) ?>"/>
  </head>
</template>
<style><![CDATA[
@font-face {
  font-family: 'Playfair Display';
  src: url(<?= $font_url ?>);
}

@page {
  size: A4;
  margin: 1cm;
}

* { all: unset; }

:root {
  --p: 0.5rem;
  --color-faded: #0002;
  --color-slightly-faded: #000a;
  --color-fed: #fed;
  --color-white: #fff;
}

html {
    font-family: 'Playfair Display', serif;
    padding: calc(2 * var(--p));
}

head { display: none; }

body {
    background: var(--color-fed);
    display: grid;
    grid-column-gap: var(--p);
    grid-template-columns: repeat(12, 1fr);
    margin: auto;
    max-width: calc(96 * var(--p));
}

body > * {
    grid-column: span 12;
}

body > * + * {
    padding-top: calc(8 * var(--p));
}

.skills .counter {
    grid-column: span 5;
}

a {
    cursor: pointer;
}

a:hover {
    text-decoration: underline;
}

@media print {
    html {
        font-size: 12px;
        padding: 0;
    }

    body {
        background: white;
        height: 100vh;
    }
}

@media screen {
  html { font-size: 20px; }
}
]]></style>

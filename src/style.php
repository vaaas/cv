<?php
$font =
    "data:font/ttf;base64," .
    base64_encode(
        file_get_contents(
            __DIR__ .
                "/../assets/playfair-display/PlayfairDisplay-VariableFont_wght.ttf",
        ),
    ); ?>
@font-face {
    font-family: 'Playfair Display';
    src: url(<?= $font ?>);
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
}

html {
    font-family: 'Playfair Display', serif;
    padding: calc(2 * var(--p));
}

head { display: none; }

body {
    background: var(--color-fed);
    counter-reset: section;
    display: grid;
    grid-column-gap: var(--p);
    grid-template-columns: repeat(12, 1fr);
    margin: auto;
    max-width: calc(96 * var(--p));
}

body > * { grid-column: span 12; }
body > * + * { padding-top: calc(8 * var(--p)); }

a { cursor: pointer; }
a:hover { text-decoration: underline; }

body > header {
    display: flex;
    align-items: baseline;
    justify-content: space-between;
}

body > header hgroup { display: block; }

body > header h1 {
    display: block;
    line-height: 1em;
    font-size: calc(4 * var(--p));
}

body > header hgroup p {
    display: inline-block;
    padding: 0 var(--p);
    margin-top: var(--p);
    color: var(--color-slightly-faded);
}

body > header address { display: block; }

body > header address a {
    display: block;
    line-height: calc(2.5 * var(--p));
}

body > section {
    counter-increment: section;
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    column-gap: var(--p);
    row-gap: calc(2 * var(--p));
    align-items: baseline;
}

body > section::before {
    content: "(" counter(section, decimal-leading-zero) ")";
    grid-column: 1;
    user-select: none;
    font-size: calc(1.5 * var(--p));
}

body > section > h2,
body > section > ol,
body > section > dl {
    grid-column: 2 / -1;
}

body > section h2 {
    display: block;
    line-height: 1em;
    text-transform: lowercase;
    font-size: calc(4 * var(--p));
}

body > section > dl {
    padding-bottom: calc(2 * var(--p));
}

body > section > ol {
    display: flex;
    flex-direction: column;
    gap: calc(2 * var(--p));
}

body > section > ol > li {
    display: block;
    line-height: calc(2.5 * var(--p));
}

body > section h3 {
    display: flex;
    flex-wrap: wrap;
    align-items: baseline;
    gap: calc(2 * var(--p));
    text-transform: lowercase;
}

body > section h3 > strong { font-weight: bold; }

body > section h3 > strong:has(+ span) { min-width: 12ch; }

body > section h3 > time {
    white-space: nowrap;
    order: 2;
}

body > section h3::after {
    content: '';
    display: block;
    flex: 1;
    border-top: 1px solid black;
    order: 1;
    position: relative;
    top: -0.2rem;
}

body > section ul {
    display: block;
    color: var(--color-slightly-faded);
    font-size: calc(1.75 * var(--p));
}

body > section > ol > li > ul {
    padding-left: calc(2 * var(--p));
}

body > section ul > li {
    display: list-item;
    list-style: disc outside;
    text-align: justify;
}

body > section > dl {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    row-gap: calc(2 * var(--p));
    text-transform: lowercase;
}

body > section > dl > div {
    display: block;
    width: calc(24 * var(--p));
    height: calc(15 * var(--p));
}

body > section dt {
    display: block;
    font-weight: bold;
}

body > section dd ul {
    columns: 2;
    line-height: calc(2.5 * var(--p));
    padding-top: calc(2 * var(--p));
}

body > section dd li { display: block; }

body > footer {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: baseline;
    text-transform: lowercase;
    font-size: calc(1.5 * var(--p));
}

body > footer > a {
    grid-column: 2;
    justify-self: center;
}

body > footer > aside {
    grid-column: 3;
    justify-self: end;
    user-select: none;
}

[data-media="screen"] { display: inline; }
[data-media="print"] { display: none; }

@media print {
    html { font-size: 12px; padding: 0; }
    body { background: white; height: 100vh; }
    body > footer { margin-top: auto; padding: 0; }
    [data-media="screen"] { display: none; }
    [data-media="print"] { display: inline; }
}

@media screen {
    html { font-size: 20px; }
}

@media screen and (max-width: 60rem) {
    body > header { display: block; }

    body > header address {
        display: block;
        margin-top: var(--p);
        margin-left: var(--p);
    }

    body > section::before { display: none; }

    body > section > h2,
    body > section > ol,
    body > section > dl {
        grid-column: 1 / -1;
    }

    body > section h3 { gap: 0 1rem; }

    body > section h3::after { display: none; }

    body > section h3 > strong:has(+ span) { min-width: unset !important; }

    body > section h3 > time { width: 100%; }

    body > section ul > li { text-align: left; }

    body > footer {
        display: block;
        margin: auto;
        font-size: 1rem;
    }

    body > footer > aside { display: none; }
}

@media screen and (max-width: 30rem) {
    html { font-size: 16px; padding: calc(1 * var(--p)); }

    body > section > dl {
        flex-direction: column;
        gap: calc(2 * var(--p));
    }

    body > section > dl > div { width: 100%; height: auto; }
}

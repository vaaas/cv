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

<?php foreach (walk(__DIR__) as $file) {
    if ($file === __FILE__) {
        continue;
    } elseif (str_contains($file, "style")) {
        require $file;
    }
} ?>

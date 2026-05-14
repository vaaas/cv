<template>
  <footer>
    <span></span>
    <a class="available-pdf" href="en.pdf">This document is available in PDF</a>
    <a class="available-online" href="https://rirekisho.tsuku.ro">This document is available online at rirekisho.tsuku.ro</a>
    <aside>Page 1/1</aside>
  </footer>
</template>

<style><![CDATA[
body > footer {
    display: flex;
    justify-content: space-between;
    text-transform: lowercase;
    font-size: calc(1.5 * var(--p));
}

body > footer aside {
    user-select: none;
}

.available-online {
    display: none;
}

@media print {
    body > footer {
        margin-top: auto;
        padding: 0;
    }

    .available-pdf {
        display: none;
    }

    .available-online {
        display: block;
    }
}

@media screen and (max-width: 60rem) {
    body > footer {
        display: none;
    }
}
]]></style>

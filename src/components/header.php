<?php ?>
<template>
  <header>
    <h1>Vasileios Pasialiokis</h1>
    <section>
      <div>full-stack developer</div>
      <a href="mailto:vas@tsuku.ro">vas@tsuku.ro</a>
      <a href="tel:+306955018104">+30 695 501 8104</a>
      <a href="https://github.com/vaaas">github.com/vaaas</a>
    </section>
  </header>
</template>
<style><![CDATA[
body > header {
    display: flex;
    align-items: baseline;
    justify-content: space-between;
}

body > header h1 {
    line-height: 1em;
    font-size: calc(4 * var(--p));
}

body > header section * {
    display: block;
}

body > header a {
    line-height: calc(2.5 * var(--p));
}

body > header section div {
    padding-bottom: calc(2 * var(--p));
}

@media screen and (max-width: 60rem) {
    body > header {
        display: block;
    }

    body > header section {
        display: block;
    }
}
]]></style>

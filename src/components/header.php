<?php
$langs = unserialize($this->langs);
$lang_codes = [];
foreach ($langs ?? [] as $lang) {
    $lang_codes[] = (string) $lang;
}
$langs_text = implode("/", $lang_codes);
?>

<template>
  <header>
    <div class="title">
      <h1>Vasileios Pasialiokis</h1>
      <div class="role">
        full-stack engineer
        <?php if ($langs_text): ?>
            <span class="langs"> · <?= htmlspecialchars($langs_text) ?></span>
        <?php endif; ?>
      </div>
    </div>
    <section>
      <a href="mailto:vas@tsuku.ro">vas@tsuku.ro</a>
      <a href="tel:+306955018104">+30 695 501 8104</a>
      <a href="https://github.com/vaaas">github.com/vaaas</a>
    </section>
  </header>
</template>

<style>
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

body > header h1 {
    display: block;
}

body > header .role {
    display: inline-block;
}

body > header .role {
    padding-left: var(--p);
    padding-right: var(--p);
    margin-top: var(--p);
    color: var(--color-slightly-faded);
}

@media screen and (max-width: 60rem) {
    body > header {
        display: block;
    }

    body > header section {
        display: block;
        margin-top: var(--p);
        margin-left: var(--p);
    }
}
</style>

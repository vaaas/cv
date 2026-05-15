<?php
$plangs = unserialize($this->plangs);
$frontend = unserialize($this->frontend);
$backend = unserialize($this->backend);
?>

<template>
  <section class="skills">
    <x-counter counter="03"/>
    <div class="body">
      <article class="plangs">
        <h3>Languages</h3>
        <ul>
            <?php foreach ($plangs as $item): ?>
                <li><?= htmlspecialchars((string) $item) ?></li>
            <?php endforeach; ?>
        </ul>
      </article>
      <article class="frontend">
        <h3>Frontend &amp; libraries</h3>
        <ul>
            <?php foreach ($frontend as $item): ?>
                <li><?= htmlspecialchars((string) $item) ?></li>
            <?php endforeach; ?>
        </ul>
      </article>
      <article class="backend">
        <h3>Backend &amp; infra</h3>
        <ul>
            <?php foreach ($backend as $item): ?>
                <li><?= htmlspecialchars((string) $item) ?></li>
            <?php endforeach; ?>
        </ul>
      </article>
    </div>
  </section>
</template>

<style>
.skills {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    align-items: baseline;
    padding-bottom: calc(2 * var(--p));
}

.skills .counter {
    grid-column: span 1;
}

.skills .body {
    grid-column: span 11;
    text-transform: lowercase;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    row-gap: calc(2 * var(--p));
}

.skills article {
    display: block;
    width: calc(24 * var(--p));
}

.skills article h3 {
    display: block;
    font-weight: bold;
}

.skills ul {
    display: block;
    line-height: calc(2.5 * var(--p));
    padding-top: calc(2 * var(--p));
    font-size: calc(1.75 * var(--p));
    color: var(--color-slightly-faded);
}

.plangs,
.frontend,
.backend {
    height: calc(15 * var(--p));
}

.plangs ul,
.frontend ul,
.backend ul {
    columns: 2;
}

.skills li {
    display: block;
}

@media screen and (max-width: 60rem) {
    .skills .body {
        display: flex;
        flex-wrap: wrap;
        gap: var(--p);
    }
}

@media screen and (max-width: 30rem) {
    .skills .body {
        flex-direction: column;
        gap: calc(2 * var(--p));
    }

    .skills article {
        width: 100%;
    }

    .plangs,
    .frontend,
    .backend {
        height: auto;
    }
}
</style>

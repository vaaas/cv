<?php
$plangs = $this->plangs;
$tools = $this->tools;
$langs = $this->langs;

$render_list = function (iterable $items): string {
    $out = "";
    foreach ($items as $item) {
        $out .= "<li>" . htmlspecialchars((string) $item) . "</li>";
    }
    return $out;
};
?>
<template>
  <section class="skills">
    <x-counter counter="03"/>
    <div class="body">
      <article class="plangs">
        <h3>Programming languages</h3>
        <ul><?= $render_list($plangs) ?></ul>
      </article>
      <article class="libs">
        <h3>Tooling &amp; libraries</h3>
        <ul><?= $render_list($tools) ?></ul>
      </article>
      <article class="langs">
        <h3>Spoken languages</h3>
        <ul><?= $render_list($langs) ?></ul>
      </article>
    </div>
  </section>
</template>
<style><![CDATA[
.skills {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    align-items: baseline;
    padding-bottom: calc(2 * var(--p));
}

.skills .counter {
    grid-column: span 2;
}

.skills .body {
    grid-column: span 10;
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
.libs {
    height: calc(20 * var(--p));
}

.langs {
    height: calc(10 * var(--p));
}

.plangs ul,
.libs ul,
.langs ul {
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
]]></style>

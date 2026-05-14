<?php
$item = unserialize($this->item);
$company = htmlspecialchars($item['company'] ?? "");
$title = htmlspecialchars($item['title'] ?? "");
$period = htmlspecialchars($item['period'] ?? "");
$bullets = $item['description']['bullet'] ?? [];
?>

<template>
  <li>
    <h3>
      <span class="company"><?= $company ?></span>
      <?php if (
          $this->title ?? null
      ): ?><span><?= $title ?></span><?php endif; ?>
      <hr/>
      <?php if (
          $this->period ?? null
      ): ?><time><?= $period ?></time><?php endif; ?>
    </h3>
    <ul>
      <?php foreach ($bullets as $bullet): ?>
        <li><?= htmlspecialchars((string) $bullet) ?></li>
      <?php endforeach; ?>
    </ul>
  </li>
</template>

<style>
.work-list > ol > li {
    line-height: calc(2.5 * var(--p));
}

.work-list > ol > li ul {
    color: var(--color-slightly-faded);
    display: block;
    font-size: calc(1.75 * var(--p));
    padding-left: calc(2 * var(--p));
}

.work-list > ol > li ul li {
    display: list-item;
    list-style: disc outside;
    text-align: justify;
}

.work-list > ol > li time {
    white-space: nowrap;
}

.work-list > ol > li hr {
    border-top: 1px solid black;
    flex: 1;
    position: relative;
    top: 0.7rem;
}

.work-list > ol > li h3 {
    display: flex;
    flex-wrap: wrap;
    gap: calc(2 * var(--p));
    text-transform: lowercase;
}

.work-list .company {
    font-weight: bold;
}

.work-list .company:has(+ span) {
    min-width: 14ch;
}

@media screen and (max-width: 60rem) {
    .work-list > ol > li hr {
        display: none;
    }

    .work-list > ol > li h3 {
        gap: var(--p);
    }
}
</style>

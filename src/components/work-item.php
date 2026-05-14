<?php
$item = unserialize($this->item);
$company = htmlspecialchars($item["company"] ?? "");
$title = htmlspecialchars($item["title"] ?? "");
$period = htmlspecialchars($item["period"] ?? "");
$raw_bullets = $item["description"]["bullet"] ?? [];
$bullets = is_array($raw_bullets) ? $raw_bullets : [$raw_bullets];
?>

<template>
  <li class='work-item'>
    <h3>
      <span class="company"><?= $company ?></span>
      <?php if ($title): ?><span><?= $title ?></span><?php endif; ?>
      <hr/>
      <?php if ($period): ?><time><?= $period ?></time><?php endif; ?>
    </h3>
    <ul>
      <?php foreach ($bullets as $bullet): ?>
        <li><?= htmlspecialchars((string) $bullet) ?></li>
      <?php endforeach; ?>
    </ul>
  </li>
</template>

<style>
.work-item {
    line-height: calc(2.5 * var(--p));
}

.work-item ul {
    color: var(--color-slightly-faded);
    display: block;
    font-size: calc(1.75 * var(--p));
    padding-left: calc(2 * var(--p));
}

.work-item ul li {
    display: list-item;
    list-style: disc outside;
    text-align: justify;
}

.work-item time {
    white-space: nowrap;
}

.work-item hr {
    border-top: 1px solid black;
    flex: 1;
    position: relative;
    top: 0.7rem;
}

.work-item h3 {
    display: flex;
    flex-wrap: wrap;
    gap: calc(2 * var(--p));
    text-transform: lowercase;
}

.work-item .company {
    font-weight: bold;
}

.work-item .company:has(+ span) {
    min-width: 10ch;
}

@media screen and (max-width: 60rem) {
    .work-item hr {
        display: none;
    }

    .work-item h3 {
        gap: 0 1rem;
    }

    .work-item ul li {
        text-align: left;
    }

    .work-item .company { min-width: unset !important; }

    .work-item time { width: 100%; }
}
</style>

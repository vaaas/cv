<?php
$company     = htmlspecialchars($this->company ?? '');
$title       = htmlspecialchars($this->title ?? '');
$period      = htmlspecialchars($this->period ?? '');
$bullets     = $this->description->bullet ?? [];
?>
<template>
  <li>
    <h3>
      <span class="company"><?= $company ?></span>
      <?php if ($this->title ?? null): ?><span><?= $title ?></span><?php endif; ?>
      <hr/>
      <?php if ($this->period ?? null): ?><time><?= $period ?></time><?php endif; ?>
    </h3>
    <ul>
      <?php foreach ($bullets as $bullet): ?>
        <li><?= htmlspecialchars((string) $bullet) ?></li>
      <?php endforeach; ?>
    </ul>
  </li>
</template>
<style><![CDATA[
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

.work-list > ol > li .company {
    font-weight: bold;
}

@media screen and (max-width: 60rem) {
    .work-list > ol > li hr {
        display: none;
    }

    .work-list > ol > li h3 {
        gap: var(--p);
    }
}
]]></style>

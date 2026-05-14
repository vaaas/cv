<?php $items = unserialize($this->items); ?>

<template>
  <div class="work-list">
    <h2><?= htmlspecialchars($this->title) ?></h2>
    <ol><?php foreach ($items as $item): ?><x-work-item item="<?= htmlspecialchars(serialize((array) $item)) ?>"/><?php endforeach; ?></ol>
  </div>
</template>

<style><![CDATA[
.work-list h2 {
    line-height: 1em;
    text-transform: lowercase;
    font-size: calc(4 * var(--p));
}

.work-list,
.work-list ol {
    display: flex;
    flex-direction: column;
    gap: calc(2 * var(--p));
}
]]></style>

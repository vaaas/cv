<?php $items = unserialize($this->items); ?>

<template>
  <section class="foss">
    <x-counter counter="02"/>
    <x-work-list title="Open-source Contributions." items="<?= htmlspecialchars(serialize($items)) ?>"/>
  </section>
</template>

<style>
.foss {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    align-items: baseline;
}

.foss .counter {
    grid-column: span 1;
}

.foss .work-list {
    grid-column: span 11;
}

@media screen and (max-width: 60rem) {
    .foss .work-list {
        grid-column: span 12;
    }
}
</style>

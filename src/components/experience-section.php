<?php $jobs = unserialize($this->jobs); ?>

<template>
  <section class="experience">
    <x-counter counter="01"/>
    <x-work-list title="Experience." items="<?= htmlspecialchars(serialize($jobs)) ?>"/>
  </section>
</template>

<style><![CDATA[
.experience {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    align-items: baseline;
}

.experience .counter {
    grid-column: span 1;
}

.experience .work-list {
    grid-column: span 11;
}

@media screen and (max-width: 60rem) {
    .experience .work-list {
        grid-column: span 12;
    }
}
]]></style>

<?php ?>
<template>
  <aside class="counter">(<?= htmlspecialchars($this->counter) ?>)</aside>
</template>
<style><![CDATA[
.counter {
    user-select: none;
    font-size: calc(1.5 * var(--p));
}

@media screen and (max-width: 60rem) {
    .counter {
        display: none;
    }
}
]]></style>

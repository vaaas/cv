<?php
$work_list_html = render('work-list', ['title' => 'Open-source Contributions.', 'items' => $this->items]);
?>
<template>
  <section class="foss">
    <x-counter counter="02"/>
    <?= $work_list_html ?>
  </section>
</template>
<style><![CDATA[
.foss {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    align-items: baseline;
}

.foss .counter {
    grid-column: span 2;
}

.foss .work-list {
    grid-column: span 10;
}

@media screen and (max-width: 60rem) {
    .foss .work-list {
        grid-column: span 12;
    }
}
]]></style>

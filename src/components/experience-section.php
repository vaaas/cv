<?php
$work_list_html = render('work-list', ['title' => 'Experience.', 'items' => $this->jobs]);
?>
<template>
  <section class="experience">
    <x-counter counter="01"/>
    <?= $work_list_html ?>
  </section>
</template>
<style><![CDATA[
.experience {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    align-items: baseline;
}

.experience .counter {
    grid-column: span 2;
}

.experience .work-list {
    grid-column: span 10;
}

@media screen and (max-width: 60rem) {
    .experience .work-list {
        grid-column: span 12;
    }
}
]]></style>

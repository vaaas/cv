<?php
$company     = htmlspecialchars($this->company ?? '');
$title       = htmlspecialchars($this->title ?? '');
$period      = htmlspecialchars($this->period ?? '');
$description = htmlspecialchars($this->description ?? '');
?>
<template>
  <li>
    <h3>
      <span class="company"><?= $company ?></span>
      <?php if ($this->title ?? null): ?><span><?= $title ?></span><?php endif; ?>
      <hr/>
      <?php if ($this->period ?? null): ?><time><?= $period ?></time><?php endif; ?>
    </h3>
    <p><?= $description ?></p>
  </li>
</template>
<style><![CDATA[
.work-list li {
    line-height: calc(2.5 * var(--p));
}

.work-list li p {
    color: var(--color-slightly-faded);
    display: block;
    font-size: calc(1.75 * var(--p));
    text-align: justify;
}

.work-list li time {
    white-space: nowrap;
}

.work-list li hr {
    border-top: 1px solid black;
    flex: 1;
    position: relative;
    top: 0.7rem;
}

.work-list li h3 {
    /* flex flex-wrap gap-2p mobile:gap-p text-lowercase */
    display: flex;
    flex-wrap: wrap;
    gap: calc(2 * var(--p));
    text-transform: lowercase;
}

.work-list li .company {
    font-weight: bold;
}

@media screen and (max-width: 60rem) {
    .work-list li hr {
        display: none;
    }

    .work-list li h3 {
        gap: var(--p);
    }
}
]]></style>

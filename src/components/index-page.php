<?php
$xml  = xml_to_array(loadXml('experience.xml'));
$jobs = array_map(fn($x) => (array) $x, $xml['job']);
$foss = array_map(fn($x) => (array) $x, $xml['foss']);
?>

<template>
  <html lang="en">
    <x-head/>
    <body>
      <x-header langs="<?= htmlspecialchars(serialize($xml['lang'])) ?>"/>
      <x-experience-section jobs="<?= htmlspecialchars(serialize($jobs)) ?>"/>
      <x-foss-section items="<?= htmlspecialchars(serialize($foss)) ?>"/>
      <x-skills-section plangs="<?= htmlspecialchars(serialize($xml['plang'])) ?>" frontend="<?= htmlspecialchars(serialize($xml['frontend'])) ?>" backend="<?= htmlspecialchars(serialize($xml['backend'])) ?>"/>
      <x-footer/>
    </body>
  </html>
</template>

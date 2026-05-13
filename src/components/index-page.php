<?php
$xml   = (array) loadXml('experience.xml');
$jobs  = array_map(fn($x) => (array) $x, $xml['job']);
$foss  = array_map(fn($x) => (array) $x, $xml['foss']);
$plangs = (array) $xml['plang'];
$tools  = (array) $xml['tool'];
$langs  = (array) $xml['lang'];

$experience_html = render('experience-section', ['jobs' => $jobs]);
$foss_html       = render('foss-section',       ['items' => $foss]);
$skills_html     = render('skills-section', [
    'plangs' => $xml['plang'],
    'tools'  => $xml['tool'],
    'langs'  => $xml['lang'],
]);
?>
<template>
  <html lang="en">
    <x-head/>
    <body>
      <x-header/>
      <?= $experience_html ?>
      <?= $foss_html ?>
      <?= $skills_html ?>
      <x-footer/>
    </body>
  </html>
</template>

<?php
$xml  = (array) loadXml('experience.xml');
$jobs = array_map(fn($x) => (array) $x, $xml['job']);
$foss = array_map(fn($x) => (array) $x, $xml['foss']);

$experience_html = render('experience-section', ['jobs' => $jobs]);
$foss_html       = render('foss-section',       ['items' => $foss]);
$header_html     = render('header', ['langs' => $xml['lang']]);
$skills_html     = render('skills-section', [
    'plangs'   => $xml['plang'],
    'frontend' => $xml['frontend'],
    'backend'  => $xml['backend'],
]);
?>
<template>
  <html lang="en">
    <x-head/>
    <body>
      <?= $header_html ?>
      <?= $experience_html ?>
      <?= $foss_html ?>
      <?= $skills_html ?>
      <x-footer/>
    </body>
  </html>
</template>

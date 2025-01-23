<?php
require "utils.php";
$xml = (array) loadXml("experience.xml");
$data = new stdClass();
$data->jobs = array_map(fn($x) => (array) $x, $xml["job"]);
$data->foss = array_map(fn($x) => (array) $x, $xml["foss"]);
$data->plangs = $xml["plang"];
$data->langs = $xml["lang"];
$data->tools = $xml["tool"];
unset($xml);
?>
<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'/>
    <title>Vasileios Pasioliokis - Software Developer</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'/>
    <meta name='description' content='CV of Vasileios Pasialiokis, senior full-stack engineer, Javascript, Typescript, Vue, PHP, Laravel'/>
    <style>
      <?php require "style.php"; ?>
    </style>
    <link rel='icon' href='<?= data_url(
        "data:image/png",
        asset("favicon.png")
    ) ?>'/>
  </head>

  <body>
    <?php require "fragments/header.php"; ?>
    <?php require "fragments/experience.php"; ?>
    <?php require "fragments/foss.php"; ?>
    <?php require "fragments/skills.php"; ?>
    <?php require "fragments/footer.php"; ?>
  </body>
</html>

<?php
error_reporting(E_ALL ^ E_WARNING);
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
  <?php require "fragments/head.php"; ?>
  <body>
    <?php require "fragments/header.php"; ?>
    <?php require "fragments/experience.php"; ?>
    <?php require "fragments/foss.php"; ?>
    <?php require "fragments/skills.php"; ?>
    <?php require "fragments/footer.php"; ?>
  </body>
</html>

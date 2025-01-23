<?php require "utils.php"; ?>
<!DOCTYPE html>
<html lang='en' class='p-2p print:p-0'>
  <head class='hidden'>
    <meta charset='utf-8'/>
    <title>Vasileios Pasioliokis - Software Developer</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'/>
    <meta name='description' content='CV of Vasileios Pasialiokis, senior full-stack engineer, Javascript, Typescript, Vue, PHP, Laravel'/>
    <style>
      <?php require "style.php"; ?>
    </style>
    <link rel='icon' href='<?= data_url(
        "data:image/png",
        __DIR__ . "/favicon.png"
    ) ?>'/>
  </head>

  <body class='bg-fed grid grid-col-gap-p grid-columns-12 m-auto max-w-96p print:bg-white print:h-full'>
    <?php require "fragments/header.php"; ?>

    <section class='col-span-12 grid grid-columns-12 h-50p items-baseline mobile:h-auto pt-8p'>
      <aside class='col-span-2 mobile:hidden no-select text-s'>(01)</aside>

      <div class='col-span-10 mobile:col-span-12'>
        <?php require "fragments/experience.php"; ?>
      </div>
    </section>

    <section class='col-span-12 grid grid-columns-12 h-30p items-baseline mobile:h-auto pt-8p'>
      <aside class='col-span-2 mobile:hidden no-select text-s'>(02)</aside>

      <div class='col-span-10 mobile:col-span-12'>
        <?php require "fragments/foss.php"; ?>
      </div>
    </section>

    <section class='col-span-12 grid grid-columns-12 items-baseline pt-8p'>
      <aside class='col-span-5 mobile:hidden no-select text-s'>(03)</aside>

      <?php require "fragments/skills.php"; ?>
    </section>

    <?php require "fragments/footer.php"; ?>
  </body>
</html>

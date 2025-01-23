<div class='flex flex-col gap-2p'>
  <h2 class='leading-reset text-huge text-lowercase'>Open-source Contributions.</h2>

  <?= render("work-item", [
      "company" => "Mattermost",
      "period" => "2022",
      "description" =>
          "Paid contributor for the Electron application. Development in React, Typescript.",
  ]) ?>

  <?= render("work-item", [
      "company" => "Organisation for Transformative Works",
      "period" => "2015 — 2021",
      "description" =>
          "Founded and coordinated the Greek translation team. Content management through Wordpress. Development of internal tooling in jQuery. Wrangling and management of metadata ontologies.",
  ]) ?>

  <?= render("work-item", [
      "company" => "Assorted &amp; Hobbyist Projects",
      "description" =>
          "Video game development in Python, PyGame, Panda3d. Native Linux application development in GTK3, Qt4. Embedded systems programming in ChibiOS. Compiler research (Scheme Lisp → Javascript).",
  ]) ?>
</div>

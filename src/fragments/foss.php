<section class='foss'>
    <?= render("counter", ["counter" => "01"]) ?>

    <?= render("work-list", [
        "title" => "Open-source Contributions.",
        "items" => [
            [
                "company" => "Mattermost",
                "period" => "2022",
                "description" =>
                    "Paid contributor for the Electron application. Development in React, Typescript.",
            ],
            [
                "company" => "Organisation for Transformative Works",
                "period" => "2015 — 2021",
                "description" =>
                    "Founded and coordinated the Greek translation team. Content management through Wordpress. Development of internal tooling in jQuery. Wrangling and management of metadata ontologies.",
            ],
            [
                "company" => "Assorted & Hobbyist Projects",
                "description" =>
                    "Video game development in Python, PyGame, Panda3d. Native Linux application development in GTK3, Qt4. Embedded systems programming in ChibiOS. Compiler research (Scheme Lisp → Javascript).",
            ],
        ],
    ]) ?>
</section>

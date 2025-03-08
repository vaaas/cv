<section class='foss'>
    <?= render("counter", ["counter" => "02"]) ?>

    <?= render("work-list", [
        "title" => "Open-source Contributions.",
        "items" => $data->foss,
    ]) ?>
</section>

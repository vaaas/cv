<section class='foss'>
    <?= render("counter", ["counter" => "01"]) ?>

    <?= render("work-list", [
        "title" => "Open-source Contributions.",
        "items" => $data->foss,
    ]) ?>
</section>

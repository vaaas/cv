<section class='experience'>
    <?= render("counter", ["counter" => "01"]) ?>

    <?= render("work-list", [
        "title" => "Experience.",
        "items" => $data->jobs,
    ]) ?>
</section>

<div class='work-list'>
    <h2><?= $this->title ?></h2>

    <ol>
        <?php foreach ($this->items as $item): ?>
            <?= render("work-item", $item) ?>
        <?php endforeach; ?>
    </ol>
</div>

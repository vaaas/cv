<section class='skills'>
    <?= render("counter", ["counter" => "03"]) ?>

    <div class='body'>
        <article class="plangs">
            <h3>Programming languages</h3>

            <ul>
                <?php foreach ($data->plangs as $plang): ?>
                    <li><?= $plang ?></li>
                <?php endforeach; ?>
            </ul>
        </article>

        <article class="libs">
            <h3>Tooling &amp; libraries</h3>

            <ul>
                <?php foreach ($data->tools as $tool): ?>
                    <li><?= $tool ?></li>
                <?php endforeach; ?>
            </ul>
        </article>

        <article class="langs">
            <h3>Spoken languages</h3>

            <ul>
                <?php foreach ($data->langs as $lang): ?>
                    <li><?= $lang ?></li>
                <?php endforeach; ?>
            </ul>
        </article>
    </div>
</section>

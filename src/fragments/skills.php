<section class='skills'>
    <aside class='counter'>(03)</aside>

    <div class='col-span-7 grid grid-col-gap-p grid-columns-7 mobile:col-span-12 mobile:flex mobile:flex-wrap mobile:gap-p text-lowercase'>
        <article class='col-span-3 mobile:max-w-18p'>
            <div class='block bold leading-reset'>Programming languages</div>

            <div class='block children:block columns-2 leading-2hp pt-2p text-slightly-faded text-sm'>
                <?php foreach ($data->plangs as $plang): ?>
                    <div><?= $plang ?></div>
                <?php endforeach; ?>
            </div>
        </article>

        <article class='mobile:hidden'></article>

        <article class='col-span-3 mobile:max-w-18p'>
            <div class='block bold leading-reset'>Tooling &amp; libraries</div>

            <div class='block children:block columns-2 leading-2hp pt-2p text-slightly-faded text-sm'>
                <?php foreach ($data->tools as $tool): ?>
                    <div><?= $tool ?></div>
                <?php endforeach; ?>
            </div>

        </article>

        <article class='col-span-3 mobile:max-w-18p mobile:p-0 pt-3p'>
            <div class='block bold leading-reset'>Spoken languages</div>

            <div class='block children:block leading-2hp pt-2p text-slightly-faded text-sm'>
                <?php foreach ($data->langs as $lang): ?>
                    <div><?= $lang ?></div>
                <?php endforeach; ?>
            </div>
        </article>
    </div>
</section>

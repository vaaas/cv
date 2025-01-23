<article class='leading-2hp'>
  <h3 class='flex flex-wrap gap-2p mobile:gap-p text-lowercase'>
    <div class='bold'><?= $this->company ?></div>
    <?php if ($this->title): ?>
      <div><?= $this->title ?></div>
    <?php endif; ?>
    <div class="border-top-1px border-top-black border-top-solid flexible line mobile:hidden relative"></div>
    <?php if ($this->period): ?>
      <div class='no-wrap'><?= $this->period ?></div>
    <?php endif; ?>
  </h3>

  <div class='text-slightly-faded text-sm justified block'><?= $this->description ?></div>
</article>

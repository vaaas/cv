<li>
  <h3>
    <span class="company"><?= htmlspecialchars($this->company) ?></span>
    <?php if ($this->title): ?>
      <span><?= htmlspecialchars($this->title) ?></span>
    <?php endif; ?>
    <hr>
    <?php if ($this->period): ?>
      <time><?= $this->period ?></time>
    <?php endif; ?>
  </h3>

  <p><?= htmlspecialchars($this->description) ?></p>
</li>

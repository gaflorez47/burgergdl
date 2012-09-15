<div class="tips">
  <h2><?=t('Tips')?></h2>
  <div class="tips-container">
  <?php
  foreach ($node->tips as $tip):
  ?>
    <div class="tip">
      <div class="left">
        <img src="<?=$tip->user->photo?>" width="30" height="30"/>
      </div>
      <div class="right">
        <p class="user"><?=$tip->user->firstName?></p>
        <p class="tip-text"><?=$tip->text?></p>
      </div>
    </div>
  <?php endforeach;?>
  </div>
</div>

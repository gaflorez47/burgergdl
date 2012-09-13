<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php require 'photos.tpl.php';?>
  <h2><?=t('Rating')?></h2>
  <div class="rating">
    <?=$node->field_food_rating['und'][0]['value']?>
  </div>
  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?=$node->body['und'][0]['value']?>
  </div>
  <div class="fb-like" data-href="<?=$node_url?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
  
  <?php require 'tips.tpl.php';?>
  <?php require 'fb_comments.tpl.php';?>
  
</div>
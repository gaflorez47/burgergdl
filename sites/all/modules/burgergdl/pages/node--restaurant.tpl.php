<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php require 'photos.tpl.php';?>
  <?php require 'rating.tpl.php';?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?=$node->body['und'][0]['value']?>
  </div>
  
  <?php require 'social_widgets.tpl.php';?>
  <?php require 'tips.tpl.php';?>
  <?php require 'fb_comments.tpl.php';?>
  
</div>
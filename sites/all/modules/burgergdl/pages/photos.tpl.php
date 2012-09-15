<div class="photos-wrapper">
  
  <img class="logo" src="<?=$node->field_logo_url['und'][0]['value']?>"/>
  <ul class="photos mycarousel jcarousel-skin-default">
    <?php 
    $photos = $node->photos;
    foreach ($photos as $photo):
    ?>
      <li class="photo">
        <img width="100%" height="auto" src="<?=$photo?>"/>
      </li>
    <?php endforeach;?>
  </ul>
<?php
  jcarousel_add('mycarousel', array('vertical' => 0, 'auto'=>10, 'scroll'=>1, 'visible'=>3, 'animation'=>1000));
?>
</div>
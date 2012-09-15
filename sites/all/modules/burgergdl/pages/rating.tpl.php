<h2>Calificaci&#243;n</h2>
<div class="rating">
  <?php 
  $rate = intval($node->field_food_rating['und'][0]['value']);
  $path = drupal_get_path('module', 'burgergdl'). "/pages/burger-icon.png";
  for ($i=0; $i < $rate; $i++): 
  ?>
    <img src="<?=$path?>"/>
  <?php endfor?>  
</div>
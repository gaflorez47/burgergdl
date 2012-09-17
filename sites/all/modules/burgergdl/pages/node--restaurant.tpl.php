<?php
$complete_url = url($node_url, array('absolute'=>true));
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <?php require "restaurant-$view_mode.tpl.php";?>
</div>
<?php  defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<div class="stack-randomizer">
	<?php  echo $editMsg; ?>
    <?php  if(is_object($stack)) {
		 $stack->display(); 
	} else {
		echo $stack; // messages from controller
	} ?>
</div>


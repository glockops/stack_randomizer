<?php   
/**
 * @author 		Daniel Mitchell <glockops \at\ gmail.com>
 * @copyright  	Copyright (c) 2012 D. Mitchell.
 * @license    	Creative Commons Attribution-ShareAlike 3.0 Unported
 *				http://creativecommons.org/licenses/by-sa/3.0/
 */
defined('C5_EXECUTE') or die(_("Access Denied.")); 

// Load helpers
$form = Loader::helper('form');
$sh = Loader::helper('form/stack_selector','stack_randomizer');
?>
<div class="content-plus-ui ccm-ui">

	<div class="ccm-block-field-group">
		<h2><?php  echo t('Choose Stacks'); ?></h2>
        <?php  echo $sh->select_multi_stack('stacks',$stacks);?>
    </div>

</div>
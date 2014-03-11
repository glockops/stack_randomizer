<?php  
defined('C5_EXECUTE') or die(_("Access Denied."));

class StackRandomizerBlockController extends BlockController {

	// Block Settings
	protected $btDescription = "Display a random stack from a custom list.";
	protected $btName = "Stack Randomizer";
	protected $btTable = 'btStackRandomizer';
	protected $btInterfaceWidth = "400";
	protected $btInterfaceHeight = "430";
	
	public function getBlockTypeDescription() {
		return t("Display a random stack from a custom list.");
	}
	
	public function getBlockTypeName() {
		return t("Stack Randomizer");
	}
	
	// Cache Settings
	protected $btCacheBlockRecord = true;
    protected $btCacheBlockOutput = false;
    protected $btCacheBlockOutputOnPost = false;
    protected $btCacheBlockOutputForRegisteredUsers = false;
    protected $btCacheBlockOutputLifetime = 1440;
	
	public function getJavaScriptStrings() {
		return array(
			'stack-required' => t('You must select at least one stack.')
		);
	}
	
	public function add() {
		$this->set('stacks',0);
	}
	
	public function edit() {
		
	}
	
	public function save($args) {
		$args['stacks'] = (empty($args['stacks'])) ? 0 : implode(',',$args['stacks']);
		parent::save($args);
	}
	
	public function view() {
		global $c;
		if($c->isEditMode()) {
			$this->set('editMsg',
				'<div class="ccm-ui"><div class="alert alert-info">'.
				t('Randomized stack displaying below.')
				.'</div></div>');
		}
		
		// Randomize the array of stacks
		$stacks = explode(',',$this->stacks);
		$rand = array_rand($stacks);
		$stack = Stack::getByID($stacks[$rand]);
		
		// Prevent a randomizer block that is in a stack from loading itself.
		// This compares the area ID of the stack being loaded to the Area ID of the block's collection object
		if(is_object($stack)) {
			$s1 = Area::get($stack,STACKS_AREA_NAME)->getAreaID();
			$b2 = Block::getByID($this->bID)->getBlockCollectionObject();
			if (is_object($b2)){
			  $a2 = Area::get($b2,STACKS_AREA_NAME);
			  if (is_object($a2)){
				$s2 = $a2->getAreaID();
			  }
			}
			if($s1 != $s2) {
			  $this->set('stack',$stack);
			
			} else {
			  $error = t('An error occured. Infinite loop. A randomizer in a stack cannot randomize itself.');
			  $this->set('stack',"<p>".$error."</p>");
			}
		} else {
		$error = t('An error occured. The referenced stack is no longer available.');
		$this->set('stack',"<p>".$error."</p>");
		}
		
	}
	
}
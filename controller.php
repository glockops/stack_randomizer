<?php  

defined('C5_EXECUTE') or die(_("Access Denied."));

class StackRandomizerPackage extends Package {

     protected $pkgHandle = 'stack_randomizer';
     protected $appVersionRequired = '5.6';
     protected $pkgVersion = '1.2.0';

     public function getPackageDescription() {
          return t("Display a random stack from a custom list.");
     }

     public function getPackageName() {
          return t("Stack Randomizer");
     }
    
     public function install() {
          $pkg = parent::install();
    
          // install block
          BlockType::installBlockTypeFromPackage('stack_randomizer', $pkg);
     }
    
}

?>
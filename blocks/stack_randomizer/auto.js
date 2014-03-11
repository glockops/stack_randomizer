// JavaScript Document

ccmValidateBlockForm = function() {	
	if ($("input[name^=stacks]").size() == 0) { 
		ccm_addError(ccm_t('stack-required'));
	}
	return false;
}
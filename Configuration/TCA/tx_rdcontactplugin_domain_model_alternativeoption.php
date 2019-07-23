<?php
$LOCALLANG = 'LLL:EXT:rd_contact_plugin/Resources/Private/Language/locallang.xlf:';

$optionTca = (include 'tx_rdcontactplugin_domain_model_option.php');

// make specific changes for tx_rdcontactplugin_domain_model_alternativeoption
$optionTca['ctrl']['title'] = $LOCALLANG . 'tx_rdcontactplugin_domain_model_alternativeoption';

// remove fields which will break the logic
unset($optionTca['columns']['restrictions']);

return $optionTca;

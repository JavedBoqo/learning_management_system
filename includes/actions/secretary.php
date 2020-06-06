<?php
$secretaryName = isset($aPost['secretaryName']) ? $aPost['secretaryName'] : "";
$recID = isset($aPost['id']) && !empty($aPost['id']) ?  $aPost['id'] : 0;

if(in_array($subTask, array(ACTION_ADD,ACTION_EDIT))) {
	if(empty($secretaryName)) $sMsg = "Please enter secretary name";
}

if(empty($sMsg)) {
	$sMsg = ERROR_UNEXPECTED;
	$vRedirectURL = "?p=".base64_encode(P_SECRETARY);
	switch ($subTask) {
		default:
		// case ACTION_ADD:
		// 	if(addSecretary($secretaryName) == RESP_SUCCESS) {
		// 		$bStatus = true;
		// 		$sMsg = "Secretary Saved Successfully";
		// 	}
		// 	break;
		// case ACTION_EDIT:
		// 	if(addSecretary($recID,$secretaryName) == RESP_SUCCESS) {
		// 		$bStatus = true;
		// 		$sMsg = "Secretary Saved Successfully";
		// 	}
		// 	break;
		case ACTION_DELETE:
			if(checkSecretaryLink($recID)){
				$sMsg = "Secretary has Departments";
			} else {
				if(deleteSecretary($recID) == RESP_SUCCESS) {
					$bStatus = true;
					$sMsg = "Secretary Deleted Successfully";
				}
			}
			break;			
	}	
}
?>
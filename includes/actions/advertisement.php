<?php
$recID = isset($aPost['id']) && !empty($aPost['id']) ?  $aPost['id'] : 0;

	$sMsg = ERROR_UNEXPECTED;
	$vRedirectURL = "?p=".base64_encode(P_ADVERTISEMENT);
	switch ($subTask) {
		default:
		case ACTION_DELETE:
			// if(checkClientLink($recID)){
			// 	$sMsg = "Client has Advertisements";
			// } else {
				if(deleteAvertisement($recID) == RESP_SUCCESS) {
					$bStatus = true;
					$sMsg = "Advertisement Deleted Successfully";
				}
			// }
			break;
	}	
?>
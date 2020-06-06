<?php
$recID = isset($aPost['id']) && !empty($aPost['id']) ?  $aPost['id'] : 0;

	$sMsg = ERROR_UNEXPECTED;
	$vRedirectURL = "?p=".base64_encode(P_CLIENT);
	switch ($subTask) {
		default:
		case ACTION_DELETE:
			if(checkClientLink($recID)){
				$sMsg = "Client has Advertisements";
			} else {
				if(deleteClient($recID) == RESP_SUCCESS) {
					$bStatus = true;
					$sMsg = "Client Deleted Successfully";
				}
			}
			break;
			case "GET_CLIENTS":
			$depId = isset($aPost['dep_id']) && !empty($aPost['dep_id']) ?  $aPost['dep_id'] : 0;
			$vData = getClient(0,$depId);
			$bStatus=true;
			break;
	}	
?>
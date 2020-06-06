<?php
$recID = isset($aPost['id']) && !empty($aPost['id']) ?  $aPost['id'] : 0;

	$sMsg = ERROR_UNEXPECTED;
	$vRedirectURL = "?p=".base64_encode(P_DEPARTMENT);
	switch ($subTask) {
		default:
		case ACTION_DELETE:
			if(checkDepartmentLink($recID)){
				$sMsg = "Department has Clients";
			} else {
				if(deleteDepartment($recID) == RESP_SUCCESS) {
					$bStatus = true;
					$sMsg = "Department Deleted Successfully";
				}
			}
			break;
		case "GET_DEPARTMENTS":
			$secretaryId = isset($aPost['secretary_id']) && !empty($aPost['secretary_id']) ?  $aPost['secretary_id'] : 0;
			$vData = getDepartment(0,$secretaryId);
			$bStatus=true;
			break;
	}	
?>
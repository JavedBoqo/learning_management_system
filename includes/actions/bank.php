<?php
$recID = isset($aPost['id']) && !empty($aPost['id']) ?  $aPost['id'] : 0;

	$sMsg = ERROR_UNEXPECTED;
	$vRedirectURL = "?p=".base64_encode(P_BANK);
	switch ($subTask) {
		case ACTION_DELETE:
			if(checkBankLink($recID)){
				$sMsg = "Bank has Transactions";
			} else {
				if(deleteBank($recID) == RESP_SUCCESS) {
					$bStatus = true;
					$sMsg = "Bank Deleted Successfully";
				}
			 }
			break;
	}	
?>
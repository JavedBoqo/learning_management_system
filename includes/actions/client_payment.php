<?php
$recID = isset($aPost['id']) && !empty($aPost['id']) ?  $aPost['id'] : 0;

	$sMsg = ERROR_UNEXPECTED;
	$vRedirectURL = "?p=".base64_encode(P_CLIENT_PAYMENT);
	switch ($subTask) {
		default:
		case ACTION_DELETE:
			// if(checkClientLink($recID)){
			// 	$sMsg = "Client has Advertisements";
			// } else {
				if(deleteClientPayment($recID) == RESP_SUCCESS) {
					$bStatus = true;
					$sMsg = "Client Payment Deleted Successfully";
				}
			// }
			break;
			case "GET_BILL_BY_CLIENT":
            $client = isset($aPost['data']) && !empty($aPost['data']) ?  $aPost['data'] : "";
            if(!empty($client)) {
                $vData = getClientOutstandingBills($client);
                // printR($vData);
                $bStatus=true;
            }
			break;
            case "GET_BILL_BY_IDGB":
            $idgb = isset($aPost['data']) && !empty($aPost['data']) ?  $aPost['data'] : "";
            if(!empty($idgb)) {
                $vData = getClientOutstandingBillsByIDGB($idgb);
                // printR($vData);
                $bStatus=true;
            }
			break;
			// case "GET_BILL_DETAIL":
            // $bill = isset($aPost['bill']) && !empty($aPost['bill']) ?  $aPost['bill'] : "";
            // if(!empty($bill)) {
            //     $vData = getBillDetail($bill);
            //     printR($vData);
            //     $bStatus=true;
            // }
            // break;
	}	
?>
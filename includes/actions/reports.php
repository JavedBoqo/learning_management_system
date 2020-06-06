<?php
    $secretaryId = isset($aPost['secretary_id']) && !empty($aPost['secretary_id']) ?  $aPost['secretary_id'] : 0;
    $departmentId = isset($aPost['dep_id']) && !empty($aPost['dep_id']) ?  $aPost['dep_id'] : 0;
    $clientId = isset($aPost['client_id']) && !empty($aPost['client_id']) ?  $aPost['client_id'] : 0;

    $startDate = isset($aPost['start_date']) && !empty($aPost['start_date']) ?  $aPost['start_date'] : "";
    $endDate = isset($aPost['end_date']) && !empty($aPost['end_date']) ?  $aPost['end_date'] : "";

	$sMsg = ERROR_UNEXPECTED;
	$vRedirectURL = "";
	switch ($subTask) {
        default:
        case P_RPT_OUTSTANDING_BILL:        
			if($secretaryId > 0) {
               $vData=getAllOutstandingBills($secretaryId,$departmentId,$clientId);
               $bStatus=true;
            }else $sMsg = "Please select secretary";
        break;
        case P_RPT_PAID_BILL:
            if($secretaryId > 0) {
                $vData=getAllPaidBills($secretaryId,$departmentId,$clientId);
                $bStatus=true;
            }else $sMsg = "Please select secretary";
        break;
        case P_RPT_CLIENT_PAYMENT:
            if($clientId > 0) {
                $vData=getAllClientPaymentBills($clientId,$secretaryId,$departmentId,$startDate,$endDate);
                $bStatus=true;
            }else $sMsg = "Please select client";
        break;
	}	
?>
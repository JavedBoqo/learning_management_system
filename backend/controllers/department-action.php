<?php
    $department=new Department();
    $recID = isset($aPost['id']) && !empty($aPost['id']) ?  $aPost['id'] : 0;
	$sMsg = ERROR_UNEXPECTED;
	$vRedirectURL = "?p=".P_ADMIN_DEPARTMENT;
	switch ($subTask) {
		case ACTION_DELETE:
				if($department->deleteDepartment($recID) == PROCESS_SUCCESS) {
					$bStatus = true;
					$sMsg = "Department Deleted Successfully";
				}
			break;
	}	
?>
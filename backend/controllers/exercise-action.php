<?php
    $exercise=new Exercise();
    $recID = isset($aPost['id']) && !empty($aPost['id']) ?  $aPost['id'] : 0;
	$sMsg = ERROR_UNEXPECTED;
	$vRedirectURL = "?p=".P_ADMIN_EXERCISE;
	switch ($subTask) {
		case ACTION_DELETE:
				if($exercise->deleteExercise($recID) == PROCESS_SUCCESS) {
					$bStatus = true;
					$sMsg = "Exercise Deleted Successfully";
				}
			break;
	}	
?>
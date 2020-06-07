<?php
    $quiz=new Course();
    $recID = isset($aPost['id']) && !empty($aPost['id']) ?  $aPost['id'] : 0;
	$sMsg = ERROR_UNEXPECTED;
	$vRedirectURL = "?p=".P_ADMIN_COURSE;
	switch ($subTask) {
		case ACTION_DELETE:
				if($quiz->deleteCourse($recID) == PROCESS_SUCCESS) {
					$bStatus = true;
					$sMsg = "Course Deleted Successfully";
				}
			break;
	}	
?>
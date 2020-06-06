<?php
    $quiz=new Quiz();
    $recID = isset($aPost['id']) && !empty($aPost['id']) ?  $aPost['id'] : 0;
	$sMsg = ERROR_UNEXPECTED;
	$vRedirectURL = "?p=".P_ADMIN_QUIZ;
	switch ($subTask) {
		case ACTION_DELETE:
				if($quiz->deleteQuiz($recID) == PROCESS_SUCCESS) {
					$bStatus = true;
					$sMsg = "Quiz Deleted Successfully";
				}
			break;
	}	
?>
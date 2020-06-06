<?php
    $quiz=new QuizQuestionAnswer();
	$recID = isset($aPost['id']) && !empty($aPost['id']) ?  $aPost['id'] : 0;
	$quizId = isset($aPost['otherData']) && !empty($aPost['otherData']) ?  $aPost['otherData'] : 0;
	$sMsg = ERROR_UNEXPECTED;
	$vRedirectURL = "?p=".P_ADMIN_QUIZ_QUESTION."&quiz_id=".$quizId;
	switch ($subTask) {
		case ACTION_DELETE:
				if($quiz->deleteQuizQuestionAnswer($recID) == PROCESS_SUCCESS) {
					$quiz->updateQuizQuestionCount($quizId);
					$bStatus = true;
					$sMsg = "Quiz Question Deleted Successfully";
				}
			break;
	}	
?>
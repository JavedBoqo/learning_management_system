<?php
    $quiz=new StudentQuiz();
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
			case "GET-RANDOM-QUESTION":
				$firstTimeLoad = $aPost['data']['firstTimeLoad'];
				$selectedAnswer = isset($aPost['data']['selectedAnswer']) ? $aPost['data']['selectedAnswer'] : 0;
				$questionId = isset($aPost['data']['questionId']) ? $aPost['data']['questionId'] : 0;
				$allQuestions = $_SESSION['USER']["QUIZ"];
				// $quiz->PrintR($allQuestions);
				$questionReturn = array(
					"id"=>0,
					"question"=>"",
					"answer1"=>"",
					"answer2"=>"",
					"answer3"=>"",
					"answer4"=>"",
					"done",false
				);

				if($questionId > 0 && $selectedAnswer > 0) {
					foreach($allQuestions as &$rq) {
						if($rq['id'] == $questionId) {
							$rq['answer_selected'] = $selectedAnswer;
						}
					}
				}

				// Get next random question
				foreach($allQuestions as $rqs) {
					if($rqs['answer_selected']==0) {
						$bStatus=true;
						$questionReturn = array(
							"id"=>$rqs['id'],
							"question"=>$rqs['question'],
							"answer1"=>$rqs['answer1'],
							"answer2"=>$rqs['answer2'],
							"answer3"=>$rqs['answer3'],
							"answer4"=>$rqs['answer4']
						);
						break;
					}
				}
				$_SESSION['USER']["QUIZ"]=$allQuestions;
				$questionReturn["done"]=$bStatus ? false : true;
				$vData=$questionReturn;
				// $quiz->PrintR($allQuestions);
				// $quiz->PrintR($_SESSION['USER']["QUIZ"]);
			break;
			case "CALCULATE-SCORE":
				$countCorrect=0;
				$allQuestions = $_SESSION['USER']["QUIZ"];
				// $quiz->PrintR($allQuestions);
				$quizId = $allQuestions[0]['quiz_id'];
				$quiz->deleteStudentQuizQuestionAnswered($quizId);
				foreach($allQuestions as $rqs) {
					if($rqs['answer_selected'] > 0) {
						if($rqs['answer_selected']==$rqs['answer_correct']) {
							$countCorrect++;
						}

						$quiz->addStudentQuizQuestionAnswered($quizId,$rqs['id'],$rqs['answer_selected']);
					}
				}
				$bStatus=true;
				$vData = array("countTotal"=>count($allQuestions),"countCorrect"=>$countCorrect);
			break;
	}	
?>
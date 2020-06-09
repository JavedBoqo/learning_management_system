<?php
require_once 'setting.php';
$aPost = $_POST;
if($bDebug) printR($aPost, "POST");
foreach ($aPost as &$thisPos) {
	if(!is_array($thisPos))	$thisPos = trim(str_replace("'", "''", $thisPos));
}
$currentPage = base64_decode($aPost['task']);
$subTask = isset($aPost['subtask']) ? strtoupper(base64_decode($aPost['subtask'])) : "";

$bStatus = $vIsReport = false; 
$sMsg = $sResponseFrom = $vData = $vRedirectURL = "";
$aData=array(); 

$actionPath = dirname(__FILE__).'/backend/controllers/';		
 
switch($currentPage) {
	case P_ADMIN_QUIZ:
	case P_ADMIN_QUIZ_QUESTION:	
	case "GET-RANDOM-QUESTION":
		include_once dirname(__FILE__).'/backend/models/department.php';		
		include_once dirname(__FILE__).'/backend/models/quiz.php';		
		include_once dirname(__FILE__).'/backend/models/quiz_question_answer.php';
		if($currentPage == P_ADMIN_QUIZ) include_once $actionPath.'quiz-action.php';
		else include_once $actionPath.'quiz-question-action.php';
	break;	
	case P_ADMIN_DEPARTMENT:
		include_once dirname(__FILE__).'/backend/models/department.php';
		include_once $actionPath.'department-action.php';
	break;
	case P_ADMIN_COURSE:
		include_once dirname(__FILE__).'/backend/models/department.php';
		include_once dirname(__FILE__).'/backend/models/course.php';
		include_once $actionPath.'course-action.php';
	break;
	case P_ADMIN_EXERCISE:
		include_once dirname(__FILE__).'/backend/models/department.php';
		include_once dirname(__FILE__).'/backend/models/exercise.php';
		include_once $actionPath.'exercise-action.php';
	break;
	case P_ADMIN_VIDEO:
		include_once dirname(__FILE__).'/backend/models/department.php';
		include_once dirname(__FILE__).'/backend/models/video.php';
		include_once $actionPath.'video-action.php';
	break;
}

$aResponse = array(
	"status" => $bStatus, 
	"message" => $sMsg, 
	"redirectURL" => $vRedirectURL, 
	"reportMode" => $vIsReport, 
	"responseFrom"=>$sResponseFrom,
	"data"=>$vData
	);

echo json_encode($aResponse);
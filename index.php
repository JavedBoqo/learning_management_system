<?php 
require_once 'setting.php';
require_once 'includes/header_start.php'; 
require_once 'includes/header_end.php'; 
$file = $heading = ""; 
$msg = ""; $process = false;
//session_destroy();

switch($p) {
    default:
    case P_ADMIN_DASHBOARD:        
        $file = "dashboard.php";
        require_once 'backend/models/department.php'; 
        require_once 'backend/models/quiz.php';
        require_once 'backend/models/user.php';
        require_once 'backend/models/course.php';
        require_once 'backend/models/exercise.php';
        require_once 'backend/models/video.php';
    break;    
    case P_ADMIN_QUIZ:    
         $file = "quiz.php";
        require_once 'backend/models/department.php'; 
        require_once 'backend/models/quiz.php';
        require_once 'backend/models/quiz_question_answer.php';
     break;
     case P_QUIZ_DETAIL:    
        $file = "quiz_detail.php";
       require_once 'backend/models/department.php'; 
       require_once 'backend/models/quiz.php';
       require_once 'backend/models/quiz_question_answer.php';
    break;
    case P_ADMIN_COURSE:
        $file="course.php";
        require_once 'backend/models/department.php';
        require_once 'backend/models/course.php';
    break;
    case P_ADMIN_EXERCISE:
        $file="exercise.php";
        require_once 'backend/models/department.php';
        require_once 'backend/models/exercise.php';
    break;
    case P_ADMIN_VIDEO:
        $file="video.php";
        require_once 'backend/models/department.php';
        require_once 'backend/models/video.php';
    break;
    case P_VIDEO_PLAY:
        $file="videoplayer.php";
        require_once 'backend/models/department.php';
        require_once 'backend/models/video.php';
    break;
    // case P_ADMIN_CHANGE_PASS:
    //     $file="change_pass.php";
    //     require_once 'backend/models/user.php';
    // break;
    case P_ADMIN_LOGIN: 
    case P_ADMIN_LOGOUT: 
        if($p==P_ADMIN_LOGOUT) {
            unset($_SESSION["USER"]);
            session_destroy();
        }
        $heading ="";
        $file = "login.php";        
        require_once 'backend/models/user.php'; 
    break;
    case P_REGISTER: 
         $heading ="Register";
         $file = "register.php";
         require_once 'backend/models/department.php'; 
         require_once 'backend/models/user.php'; 
     break;   //*/
}
?>

        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">                           
                            <h4 class="page-title"><?php echo $heading;?></h4>
                        </div>
                    </div>
                </div>
                <?php if(!empty($file)) require_once "modules/public/{$file}"; ?>                
            </div>
        </div>

        <?php require_once 'includes/footer_start.php'; 
        require_once 'includes/footer_end.php'; ?>
       
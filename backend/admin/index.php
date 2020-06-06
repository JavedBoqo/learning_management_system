<?php
// echo "LMS";
// require_once '../models/constant.php';
// require_once '../models/common.php';
// require_once '../models/database.php';
// require_once '../models/user.php';

// $user=new User();

// //add
// // $user->addUser("Ammar","amaar@gmail.com","123456",1);
// //update
// // $user->updateUser(4,"Shan",1);
// //
// // $data=$user->login("zia@gmail.com","112233");
// //get
// // $data=$user->getUser();
// // $user->printR($data);
require 'setting.php';
require 'includes/header_start.php'; 
require 'includes/header_end.php'; 
$file = $heading = ""; 
$msg = ""; $process = false;

switch($p) {
    case "LOGIN": 
        $heading ="";
        $file = "login.php";
        require_once 'backend/common.php'; 
        require_once 'backend/module/user.php'; 
    break;
    case "LOGOUT": 
        $heading ="Logout";
        $file = "logout.php";
    break;
    case "CHANGE_PASS":
        $heading ="Change Password";
        $file = "change_pass.php";
        require_once 'backend/module/user.php'; 
    break;
    case "DASHBOARD":
    default:
        $heading ="Dashboard";
        $file = "dashboard.php";        
        require_once 'backend/module/advertisement.php'; 
        require_once 'backend/module/client_payment.php'; 
    break;
    case P_SECRETARY: 
        $heading ="SECRETARY";
        $file = "secretary.php";
        require_once 'backend/module/secretary.php'; 
    break;
    case P_DEPARTMENT:
        $heading ="DEPARTMENTS";
        $file = "department.php";
        require_once 'backend/module/secretary.php'; 
        require_once 'backend/module/department.php'; 
    break;
    case P_CLIENT:
        $heading ="CLIENTS";
        $file = "client.php";
        require_once 'backend/module/department.php'; 
        require_once 'backend/module/client.php'; 
    break;  
    case P_CLIENT_PAYMENT:
        $heading ="CLIENT PAYMENT";
        $file = "client_payment.php";
        require_once 'backend/module/bank.php'; 
        require_once 'backend/module/advertisement.php'; 
        require_once 'backend/module/client.php'; 
        require_once 'backend/module/client_payment.php'; 
    break;      
    case P_BANK:
        $heading ="BANKS";
        $file = "bank.php";
        require_once 'backend/module/bank.php'; 
    break;  
    case P_ADVERTISEMENT:
        $heading ="ADVERTISEMENTS";
        $file = "advertisement.php";        
        require_once 'backend/module/client.php'; 
        require_once 'backend/module/client_payment.php'; 
        require_once 'backend/module/advertisement.php'; 
    break;  
    case P_ADVERTISEMENT_PRINT:
        $heading ="";
        $file = "advertisement_print.php";        
        require_once 'backend/module/advertisement.php'; 
    break;
    case P_RPT_OUTSTANDING_BILL:
    case P_RPT_PAID_BILL:
    case P_RPT_CLIENT_PAYMENT:
        if($p == P_RPT_OUTSTANDING_BILL) {
            $heading ="Outstanding Bills";
            $file = "report_outstanding_bill.php"; 
        }
        elseif($p == P_RPT_PAID_BILL) {
            $heading ="Paid Bills";
            $file = "report_paid_bill.php"; 
        }
        elseif($p == P_RPT_CLIENT_PAYMENT) {
            $heading ="Client Payment Bills";
            $file = "report_client_payment_bill.php"; 
        }
        require_once 'backend/module/secretary.php'; 
        require_once 'backend/module/department.php';    
        require_once 'backend/module/client.php'; 
        require_once 'backend/module/client_payment.php';     
        require_once 'backend/module/advertisement.php'; 
    break;
}
?>

        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <!-- <div class="btn-group float-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Highdmin</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div> -->
                            <h4 class="page-title"><?php echo $heading;?></h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->                
                <?php if(!empty($file)) require_once "modules/{$file}"; ?>                
            </div> <!-- end container-fluid -->
        </div>
        <!-- end wrapper -->

        <?php require_once 'includes/footer_start.php'; 
        require_once 'includes/footer_end.php'; ?>
       
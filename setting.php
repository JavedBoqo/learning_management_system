<?php
date_default_timezone_set('Asia/Karachi');
$p = isset($_GET['p']) ? $_GET['p'] : 0;
$act = isset($_GET['act']) ? $_GET['act'] : "";
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$bDebug = isset($_REQUEST['depth']) ? true : false;
$sRequestURI = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
session_start();
$projectURL="http://localhost/lms/";
$db=null;

require_once 'backend/models/constant.php'; 
require_once 'backend/models/common.php'; 
require_once 'backend/models/database.php'; 

$publicAccess=false;
if(isset($_SERVER['SCRIPT_NAME'])) {
    $sript = $_SERVER['SCRIPT_NAME'];
    $aCheckIndex = explode("/",$sript);
    foreach($aCheckIndex as $chk) {
        if($chk == "index.php") {
            $publicAccess=true;
        }
    }
}
// echo "<pre>".print_r($_SESSION["USER"],true)."</pre>";

$loggedInUserId = 0;
$loggedInUserName = 0;
$loggedInUserDepId = 0;
// if($publicAccess) {
//     if(isset($_SESSION["USER"]) && count($_SESSION["USER"]) > 0){
//         $loggedInUserId = $_SESSION["USER"]["ID"];
//         $loggedInUserName = $_SESSION["USER"]["NAME"];
//     }
// }else {
    if(!isset($_SESSION["USER"]) || count($_SESSION["USER"]) ==0) {
        if($p==P_REGISTER) $p = P_REGISTER;
        else $p = P_ADMIN_LOGIN;
    }
    else {
        
        $loggedInUserId = $_SESSION["USER"]["ID"];
        $loggedInUserName = $_SESSION["USER"]["NAME"];
        $loggedInUserDepId= $_SESSION["USER"]["DEPID"];
    }
// }
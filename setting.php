<?php
date_default_timezone_set('Asia/Karachi');
$p = isset($_GET['p']) ? $_GET['p'] : 0;
$act = isset($_GET['act']) ? $_GET['act'] : "";
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$bDebug = isset($_REQUEST['depth']) ? true : false;
$sRequestURI = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
session_start();

$db=null;

require_once 'backend/models/constant.php'; 
require_once 'backend/models/common.php'; 
require_once 'backend/models/database.php'; 


$loggedInUserId = 0;
$loggedInUserName = 0;
if(!isset($_SESSION["USER"]) || count($_SESSION["USER"]) ==0) $p=P_ADMIN_LOGIN;
else {
    $loggedInUserId = $_SESSION["USER"]["ID"];
    $loggedInUserName = $_SESSION["USER"]["NAME"];
}
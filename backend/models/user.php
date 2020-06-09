<?php
class User extends Common {
    
    function addUser($fullName,$email,$password,$isAdmin=0, $depId=0) {
        $db = new Database();
        $password = sha1($password);
        $sql  = "INSERT INTO ".TBL_USER." (full_name,email,password,is_admin,dept_id,".SQL_COMMON_FIELDS.")".chr(10);
        $sql .= "VALUES(".chr(10);
        $sql .= "'{$fullName}','{$email}','{$password}',{$isAdmin},{$depId},".STATUS_ACTIVE.",NOW(),NOW()".chr(10);
        $sql .= ")".chr(10);
        $db->setQuery($sql);
        // echo $sql;
        if($db->executeInserQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }

    function updateUser($userId,$fullName,$isAdmin=0) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_USER." SET".chr(10);
        $sql .= "full_name='{$fullName}',is_admin={$isAdmin}".chr(10);
        $sql .= "WHERE id={$userId}".chr(10);
        echo $sql;
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }

    function updateUserPassword($userId,$currentPassword,$newPassword) {
        $db = new Database();
        $currentPassword = sha1($currentPassword);
        $sql ="SELECT * FROM  ".TBL_USER.chr(10);
        $sql .="WHERE status=".STATUS_ACTIVE.chr(10);
        $sql .="AND id={$userId}".chr(10);
        $sql .="AND password='{$currentPassword}'".chr(10);
        $db->setQuery($sql);
        if(count($db->executeListQuery()) > 0) {
            $newPassword=sha1($newPassword);
            $sql  = "UPDATE ".TBL_USER." SET".chr(10);
            $sql .= "password='{$newPassword}'".chr(10);
            $sql .= "WHERE id={$userId}".chr(10);
            $db->setQuery($sql);
            if($db->executeUpdateQuery()) return PROCESS_SUCCESS;
            else return PROCESS_FAIL;
        } else return -100;
    }

    function getUser($userId=0) {
        $db = new Database();
        $sql ="SELECT * FROM  ".TBL_USER.chr(10);
        $sql .="WHERE status=".STATUS_ACTIVE.chr(10);
        if($userId > 0)$sql .="AND id={$userId}".chr(10);
        $db->setQuery($sql);
        return $db->executeListQuery();
    }

    function checkUserAvailable($email) {
        $db = new Database();
        $sql ="SELECT * FROM  ".TBL_USER.chr(10);
        $sql .="WHERE status=".STATUS_ACTIVE.chr(10);
        $sql .="AND email='{$email}'".chr(10);
        $db->setQuery($sql);
        if(count($db->executeListQuery()) > 0) return false;
        return true;
    }

    function login($email,$password) {
        $password = sha1($password);
        $db = new Database();
        $sql ="SELECT * FROM  ".TBL_USER.chr(10);
        $sql .="WHERE status=".STATUS_ACTIVE.chr(10);
        $sql .="AND email='{$email}'".chr(10);
        $sql .="AND password='{$password}'".chr(10);
        $db->setQuery($sql);
        return $db->executeListQuery();
    }

    function logout() {
        unset($_SESSION["USER"]);
        session_destroy();  
    }
}
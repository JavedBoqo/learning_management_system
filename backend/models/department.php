<?php

class Department extends Common {
    
    function addDepartment($departmentName) {
        $db = new Database();
        $sql  = "INSERT INTO ".TBL_DEPARTMENT." (dep_name,".SQL_COMMON_FIELDS.")".chr(10);
        $sql .= "VALUES(".chr(10);
        $sql .= "'{$departmentName}',".STATUS_ACTIVE.",NOW(),NOW()".chr(10);
        $sql .= ")".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeInserQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }

    function updateDepartment($deparmentId,$departmentName) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_DEPARTMENT." SET".chr(10);
        $sql .= "dep_name='{$departmentName}'".chr(10);
        $sql .= "WHERE id={$deparmentId}".chr(10);
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }


    function deleteDepartment($depId) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_DEPARTMENT." SET".chr(10);
        $sql .= "status=".STATUS_INACTIVE.chr(10);
        $sql .= "WHERE id={$depId}".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) return PROCESS_SUCCESS;        
        else return PROCESS_FAIL;
    }

    function getDepartment($depId=0) {
        $db = new Database();
        $sql ="SELECT * FROM  ".TBL_DEPARTMENT.chr(10);
        $sql .="WHERE status=".STATUS_ACTIVE.chr(10);
        if($depId > 0)$sql .="AND id={$depId}".chr(10);
        $sql .="ORDER BY dep_name".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        return $db->executeListQuery();
    }

}
    

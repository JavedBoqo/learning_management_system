<?php

class Exercise extends Department {
    
    function addExercise($deparmentId, $exerciseName, $exercise_file) {
        $db = new Database();
        $sql  = "INSERT INTO ".TBL_EXERCISE." (dept_id,exercise_name,exercise_file, ".SQL_COMMON_FIELDS.")".chr(10);
        $sql .= "VALUES(".chr(10);
        $sql .= "{$deparmentId},'{$exerciseName}','{$exercise_file}',".STATUS_ACTIVE.",NOW(),NOW()".chr(10);
        $sql .= ")".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeInserQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }

    function updateExercise( $exerciseID ,$deparmentId,$exerciseName ,$exercise_file) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_EXERCISE." SET".chr(10);
        $sql .= "exercise_name='{$exerciseName}',dept_id={$deparmentId},exercise_file='{$exercise_file}'".chr(10);
        $sql .= "WHERE id={$exerciseID}".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }


    function deleteExercise($exerciseID) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_EXERCISE." SET".chr(10);
        $sql .= "status=".STATUS_INACTIVE.chr(10);
        $sql .= "WHERE id={$exerciseID}".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) return PROCESS_SUCCESS;        
        else return PROCESS_FAIL;
    }

    function getExercise($exerciseID=0) {
        $db = new Database();
        $sql ="SELECT dep_name,c.* FROM  ".TBL_EXERCISE." c,".TBL_DEPARTMENT." d".chr(10);
        $sql .="WHERE c.status=".STATUS_ACTIVE.chr(10);
        $sql .="AND c.dept_id=d.id".chr(10);
        if($exerciseID > 0) $sql .="AND c.id={$exerciseID}".chr(10);
        $sql .="ORDER BY dept_id".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        return $db->executeListQuery();
    }

}
<?php

class Course extends Department {
    
    function addCourse($deparmentId, $courseName, $course_file) {
        $db = new Database();
        $sql  = "INSERT INTO ".TBL_COURSE." (dept_id,course_name,course_file, ".SQL_COMMON_FIELDS.")".chr(10);
        $sql .= "VALUES(".chr(10);
        $sql .= "{$deparmentId},'{$courseName}','{$course_file}',".STATUS_ACTIVE.",NOW(),NOW()".chr(10);
        $sql .= ")".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeInserQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }

    function updateCourse( $courseID ,$deparmentId,$courseName ,$course_file) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_COURSE." SET".chr(10);
        $sql .= "course_name='{$courseName}',dept_id={$deparmentId},course_file='{$course_file}'".chr(10);
        $sql .= "WHERE id={$courseID}".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }


    function deleteCourse($courseID) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_COURSE." SET".chr(10);
        $sql .= "status=".STATUS_INACTIVE.chr(10);
        $sql .= "WHERE id={$courseID}".chr(10);
        echo $sql;
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) return PROCESS_SUCCESS;        
        else return PROCESS_FAIL;
    }

    function getCourse($courseID=0) {
        $db = new Database();
        $sql ="SELECT * FROM  ".TBL_COURSE.chr(10);
        $sql .="WHERE status=".STATUS_ACTIVE.chr(10);
        if($courseID > 0)$sql .="AND id={$courseID}".chr(10);
        $sql .="ORDER BY dept_id".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        return $db->executeListQuery();
    }

}
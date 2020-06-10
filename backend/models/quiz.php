<?php
class Quiz extends Department {
    
    function addQuiz($depId,$quizName,$quizTime,$quizQuestionCount=0) {
        $db = new Database();
        $sql  = "INSERT INTO ".TBL_QUIZ." (dep_id,quiz_name,quiz_time,question_count,".SQL_COMMON_FIELDS.")".chr(10);
        $sql .= "VALUES(".chr(10);
        $sql .= "{$depId},'{$quizName}',{$quizTime},{$quizQuestionCount},".STATUS_ACTIVE.",NOW(),NOW()".chr(10);
        $sql .= ")".chr(10);
        $db->setQuery($sql);
        // echo $sql;
        if($db->executeInserQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }

    function updateQuiz($quizId,$depId,$quizName,$quizTime,$quizQuestionCount=0) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_QUIZ." SET".chr(10);
        $sql .= "dep_id={$depId},quiz_name='{$quizName}',quiz_time={$quizTime},question_count={$quizQuestionCount}".chr(10);
        $sql .= "WHERE id={$quizId}".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }

    function updateQuizQuestionCount($quizId) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_QUIZ." SET".chr(10);
        $sql .= "question_count=(SELECT COUNT(id) FROM ".TBL_QUIZ_QUESTION_ANSWER." WHERE status=".STATUS_ACTIVE." AND quiz_id={$quizId})".chr(10);
        $sql .= "WHERE id={$quizId}".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }

    function deleteQuiz($quizId) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_QUIZ." SET".chr(10);
        $sql .= "status=".STATUS_INACTIVE.chr(10);
        $sql .= "WHERE id={$quizId}".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) {
            $sql  = "UPDATE ".TBL_QUIZ_QUESTION_ANSWER." SET".chr(10);
            $sql .= "status=".STATUS_INACTIVE.chr(10);
            $sql .= "WHERE quiz_id={$quizId}".chr(10);
            // echo $sql;
            $db->setQuery($sql);
            $db->executeUpdateQuery();

            return PROCESS_SUCCESS;
        }
        else return PROCESS_FAIL;
    }

    function getQuiz($quizId=0,$depId=0) {
        $db = new Database();
        $sql ="SELECT dep_name,q.* FROM  ".TBL_QUIZ." q".chr(10);
        $sql .="LEFT OUTER JOIN ".TBL_DEPARTMENT." d ON q.dep_id=d.id".chr(10);
        $sql .="WHERE q.status=".STATUS_ACTIVE.chr(10);
        if($depId > 0)$sql .="AND q.dep_id={$depId}".chr(10);
        if($quizId > 0)$sql .="AND q.id={$quizId}".chr(10);
        $sql .="ORDER BY quiz_name".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        return $db->executeListQuery();
    }
    
    function getLatestQuiz($depId) {
        $db = new Database();
        $sql ="SELECT dep_name,q.* FROM  ".TBL_QUIZ." q".chr(10);
        $sql .="LEFT OUTER JOIN ".TBL_DEPARTMENT." d ON q.dep_id=d.id".chr(10);
        $sql .="WHERE q.status=".STATUS_ACTIVE.chr(10);
        if($depId > 0) $sql .="AND q.dep_id={$depId}".chr(10);
        $sql .="ORDER BY id DESC".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        return $db->executeListQuery();
    }
}


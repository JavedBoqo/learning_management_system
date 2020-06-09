<?php
class QuizQuestionAnswer extends Quiz {
    
    function addQuizQuestionAnswer($quizId,$question,$answer1,$answer2,$answer3,$answer4,$correctAnswer) {
        $db = new Database();
        $sql  = "INSERT INTO ".TBL_QUIZ_QUESTION_ANSWER." (quiz_id,question,answer_1,answer_2,answer_3,answer_4,correct_answer,".SQL_COMMON_FIELDS.")".chr(10);
        $sql .= "VALUES(".chr(10);
        $sql .= "{$quizId},'{$question}','{$answer1}','{$answer2}','{$answer3}','{$answer4}',{$correctAnswer},".STATUS_ACTIVE.",NOW(),NOW()".chr(10);
        $sql .= ")".chr(10);
        $db->setQuery($sql);
        // echo $sql;
        if($db->executeInserQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }

    function updateQuizQuestionAnswer($quizQAId,$question,$answer1,$answer2,$answer3,$answer4,$correctAnswer) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_QUIZ_QUESTION_ANSWER." SET".chr(10);
        $sql .= "question='{$question}',".chr(10);
        $sql .= "answer_1='{$answer1}',".chr(10);
        $sql .= "answer_2='{$answer2}',".chr(10);
        $sql .= "answer_3='{$answer3}',".chr(10);
        $sql .= "answer_4='{$answer4}',".chr(10);
        $sql .= "correct_answer={$correctAnswer}".chr(10);
        $sql .= "WHERE id={$quizQAId}".chr(10);
        $sql .= "AND status=".STATUS_ACTIVE.chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }

    function deleteQuizQuestionAnswer($quizQAId) {
        $db = new Database();
        $sql  = "UPDATE ".TBL_QUIZ_QUESTION_ANSWER." SET".chr(10);
        $sql .= "status=".STATUS_INACTIVE.chr(10);
        $sql .= "WHERE id={$quizQAId}".chr(10);
        // echo $sql;
        $db->setQuery($sql);
        if($db->executeUpdateQuery()) return PROCESS_SUCCESS;
        else return PROCESS_FAIL;
    }

    function getQuizQuestionAnswer($quizId,$quizQAId=0) {
        $db = new Database();
        $sql ="SELECT q.quiz_name,a.* FROM  ".chr(10);
        $sql .= TBL_QUIZ_QUESTION_ANSWER." a,".TBL_QUIZ." q".chr(10);
        $sql .="WHERE a.status=".STATUS_ACTIVE.chr(10);
        $sql .="AND a.quiz_id=q.id".chr(10);
        $sql .="AND a.quiz_id={$quizId}".chr(10);
        if($quizQAId > 0) $sql .="AND a.id={$quizQAId}".chr(10);
        //  echo $sql;
        $db->setQuery($sql);
        return $db->executeListQuery();

    }
}
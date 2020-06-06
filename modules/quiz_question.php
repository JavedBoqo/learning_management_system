<?php
$quizQuestion = new QuizQuestionAnswer();
$depId = isset($_GET['dep_id']) ? $_GET['dep_id'] : 0;
$quizId = isset($_GET['quiz_id']) ? $_GET['quiz_id'] : 0;
list($hideForm, $hideList) = $quizQuestion->showHideForm($id);

$question=$answer1=$answer2=$answer3=$answer4=$answerCorrect="";
$list = ""; $link = "?p=".P_ADMIN_QUIZ_QUESTION."&dep_id=".$depId."&quiz_id=".$quizId;

if($_POST) {
    // printR($_POST);
    $recId = $_POST['id']; 
    $question = $_POST['question'];
    
    $answer1=$_POST['answer1'];
    $answer2=$_POST['answer2'];
    $answer3=$_POST['answer3'];
    $answer4=$_POST['answer4'];
    $answerCorrect=$_POST['answerCorrect'];

    $status = $recId == 0 ? $quizQuestion->addQuizQuestionAnswer($quizId,$question,$answer1,$answer2,$answer3,$answer4,$answerCorrect) : $quizQuestion->updateQuizQuestionAnswer($recId,$question,$answer1,$answer2,$answer3,$answer4,$answerCorrect);
    if($status == PROCESS_SUCCESS) {
        $quizQuestion->updateQuizQuestionCount($quizId);
        $process=true;
        $msg=$quizQuestion->showInfo("Quiz Question Saved Successfully");
    }
}
else $aList = $quizQuestion->getQuizQuestionAnswer($quizId,$id); //$quizQuestion->printR($aList);

if($id == 0) {
    foreach($aList as $r) {
        $list .= '<tr>
                <td>'.$r->question.'</td>
                <td>'.$r->answer_1.'</td>
                <td>'.$r->answer_2.'</td>
                <td>'.$r->answer_3.'</td>
                <td>'.$r->answer_4.'</td>
                <td>'.$r->correct_answer.'</td>                
                <td><a href="'.$link."&id=".$r->id.'"><i class="fa fa-edit"></i></a> ';
        // $list .= $quizQuestion->deleteLink($r->id);
        $list .='</td></tr>';
    }
}else {
    $aList = $aList[0];
    $question = $aList->question; 
    $answer1 = $aList->answer_1;
    $answer2 = $aList->answer_2;
    $answer3 = $aList->answer_3;
    $answer4 = $aList->answer_4;
    $answerCorrect = $aList->correct_answer;
}

?>
<div><?php echo $msg;?></div>
<div class="row form" style="<?php echo $hideForm;?>">
    <div class="col-lg-12">
    <div class="card-box">
        <h4 class="header-title m-t-0">ADD/UPDATE</h4>
        <p class="text-muted font-14 m-b-20">        
        </p>

        <form action="#" method="post">
            <div class="form-group">
                <label for="userName">Question<span class="text-danger">*</span></label>
                <input type="text" 
                    parsley-trigger="change"
                    placeholder="Question" 
                    class="form-control" 
                    id="question" 
                    name="question"
                    value="<?php echo $question;?>"
                    required
                    >                
            </div>
            <div class="form-group">
                <label for="userName">Answer 1<span class="text-danger">*</span></label>
                <input type="text" 
                    parsley-trigger="change"
                    placeholder="Answer 1" 
                    class="form-control" 
                    id="answer1" 
                    name="answer1"
                    value="<?php echo $answer1;?>"
                    required
                    >
            </div>
            <div class="form-group">
                <label for="userName">Answer 2<span class="text-danger">*</span></label>
                <input type="text" 
                    parsley-trigger="change"
                    placeholder="Answer 2" 
                    class="form-control" 
                    id="answer2" 
                    name="answer2"
                    value="<?php echo $answer2;?>"
                    required
                    >
            </div>
            <div class="form-group">
                <label for="userName">Answer 3<span class="text-danger">*</span></label>
                <input type="text" 
                    parsley-trigger="change"
                    placeholder="Answer 3" 
                    class="form-control" 
                    id="answer3" 
                    name="answer3"
                    value="<?php echo $answer3;?>"
                    required
                    >
            </div>
            <div class="form-group">
                <label for="userName">Answer 4<span class="text-danger">*</span></label>
                <input type="text" 
                    parsley-trigger="change"
                    placeholder="Answer 4" 
                    class="form-control" 
Answer 1*
                    name="answer4"
                    value="<?php echo $answer4;?>"
                    required
                    >
            </div>
            <div class="form-group">
                <label for="userName">Correct Answer<span class="text-danger">*</span></label>
                <input type="text" 
                    parsley-trigger="change"
                    placeholder="Correct Answer" 
                    class="form-control" 
                    id="answerCorrect" 
                    name="answerCorrect"
                    value="<?php echo $answerCorrect;?>"
                    required
                    >
            </div>
            
            <div class="form-group text-right m-b-0">            
                <button class="btn btn-info waves-effect waves-light" type="submit">
                    Save
                </button>
                <a class="btn btn-light waves-effect m-l-5" href="javascript:HideForm()">
                    Back
                </a>
                <?php 
                
                if($id > 0) {
                    echo $quizQuestion->deleteLink($id,"btn btn-danger waves-effect waves-light");
                }?>
                <input type="hidden" name="id" value="<?php echo $id;?>"/>
            </div>

        </form>
    </div>
    </div>
</div>

        <div class="row list" style="<?php echo $hideList;?>">
            <div class="col-12">                
                <div class="card-box table-responsive">
                    <h4 class="m-t-0">
                        <a class="btn btn-info" href="javascript:ShowForm()">Add New</a>
                    </h4>
                    <p class="text-muted font-14 m-b-30">                                
                    </p>

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>Question</th>
                            <th>Answer 1</th>
                            <th>Answer 2</th>
                            <th>Answer 3</th>
                            <th>Answer 4</th>
                            <th>Correct Answer</th>
                            <th></th>
                        </tr>
                        </thead>


                        <tbody>
                        <?php echo $list; ?>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
<?php 
    $quizQuestion->deleteModal(P_ADMIN_QUIZ_QUESTION,ACTION_DELETE,$quizId);
    if($process) echo $quizQuestion->refreshPage($link);
?>
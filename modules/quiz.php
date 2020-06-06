<?php
$quiz = new Quiz();
list($hideForm, $hideList) = $quiz->showHideForm($id);

$departmentId =0; $quizName=""; $list = ""; $link = "?p=".P_ADMIN_QUIZ;

if($_POST) {
    // printR($_POST);
    $recId = $_POST['id']; 
    $quizName = $_POST['quizName'];
    $departmentId = $_POST['department'];
    $status = $recId == 0 ? $quiz->addQuiz($departmentId,$quizName) : $quiz->updateQuiz($recId,$departmentId,$quizName);
    if($status == PROCESS_SUCCESS) {
        $process=true;
        $msg=$quiz->showInfo("Quiz Saved Successfully");
    }
}
else $aList = $quiz->getQuiz($id); //$quiz->printR($aList);

if($id == 0) {
    $linkQuestion = "?p=".P_ADMIN_QUIZ_QUESTION;
    foreach($aList as $r) {
        $list .= '<tr>
                <td>'.$r->quiz_name.'</td>
                <td>'.$r->dep_name.'</td>
                <td>'.$r->question_count.'</td>
                <td>
                <a href="'.$link."&id=".$r->id.'"><i class="fa fa-edit"></i></a>
                <a target="_blank" href="'.$linkQuestion."&quiz_id=".$r->id.'"><i class="fa fa-question-circle"></i></a>
                ';
        $list .= $quiz->deleteLink($r->id);
        $list .='</td></tr>';
    }
}else {
    $aList = $aList[0];
    $quizName = $aList->quiz_name;
    $departmentId = $aList->dep_id;
}

$aListDepartment=$quiz->getDepartment(); //$quiz->printR($aListDepartment);
$optDepartment = "<option value=''>Select Department</option>";
foreach($aListDepartment as $opt) {
    $selected = $opt->id==$departmentId ? "selected='selected'":null;
    $optDepartment .= "<option {$selected} value='".$opt->id."'>".$opt->dep_name."</option>";
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
                <label for="userName">Quiz Name<span class="text-danger">*</span></label>
                <input type="text" 
                    parsley-trigger="change"
                    placeholder="Quiz name" 
                    class="form-control" 
                    id="quizName" 
                    name="quizName"
                    value="<?php echo $quizName;?>"
                    required
                    >
                    <div class="form-group">
                <label for="department">Department<span class="text-danger">*</span></label>
                <select 
                    class="form-control select2" 
                    id="department" 
                    name="department"
                    required
                    >
                    <?php echo $optDepartment;?>
                </select>
            </div>
            </div>
            
            <div class="form-group text-right m-b-0">            
                <button class="btn btn-info waves-effect waves-light" type="submit">
                    Save
                </button>
                <a class="btn btn-light waves-effect m-l-5" href="javascript:HideForm()">
                    Back
                </a>
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
                            <th>Quiz</th>
                            <th>Department</th>
                            <th>Total Questions</th>
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
    $quiz->deleteModal(P_ADMIN_QUIZ_QUESTION,ACTION_DELETE);
    if($process) echo $quiz->refreshPage($link);
?>
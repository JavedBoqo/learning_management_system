<?php
$exercise =new Exercise();
list($hideForm, $hideList) = $exercise->showHideForm($id);
$departmentId = $exerciseName = $exerciseFile= ""; $list = ""; $link = "?p=".P_ADMIN_EXERCISE;
$msg = ""; $process=false;
if($_POST) {
    //$exercise->printR($_POST);
    // $exercise->printR($_FILES);
    if(count($_FILES) > 0 && isset($_FILES["exerciseFile"]["name"]) && !empty($_FILES["exerciseFile"]["name"]))
        list($msg,$exerciseFile)=$exercise->uploadFile("exercises","exerciseFile");        

    $recId = $_POST['recId'];     
    $exerciseName = $_POST['exerciseName'];
    $departmentId = $_POST['department'];
    if(empty($msg)){        
        $status = $recId == 0 ? $exercise->addExercise($departmentId,$exerciseName,$exerciseFile) : $exercise->updateExercise($recId,$departmentId,$exerciseName,$exerciseFile);
        if($status == PROCESS_SUCCESS) {
            $process=true;
            $msg=$exercise->showInfo("Exercise Saved Successfully");
        }
    }else { 
        $hideForm="display:block;";
        $hideList="display:none;";
    }
}

$aList = $exercise->getExercise($id); ///$exercise->printR($aList);

if($id == 0) {
    foreach($aList as $r) {
     $list .= '<tr>
                <td>'.$r->exercise_name.'</td>  
                <td>'.$r->dep_name.'</td>                
                <td>
                    <a href="'.$link."&id=".$r->id.'"><i class="fa fa-edit"></i></a> ';
    $list .= $exercise->deleteLink($r->id);
    $list .='</td></tr>';
    }
}else {
    $aList = $aList[0];
    $departmentId = $aList->dept_id;
    $exerciseName = $aList->exercise_name;
    $exerciseFile = $aList->exercise_file;
}

$aListDepartment=$exercise->getDepartment(); //$quiz->printR($aListDepartment);
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

        <form action="#" method="post" enctype="multipart/form-data">           
            <div class="form-group">`
                <label for="exerciseName">Exercise Name<span class="text-danger">*</span></label>
                <input type="text" 
                    parsley-trigger="change"
                    placeholder="Exercise name" 
                    class="form-control" 
                    id="exerciseName" 
                    name="exerciseName"
                    value="<?php echo $exerciseName;?>"
                    required
                    >
            </div>
            
            <div class="form-group">
                <label for="exerciseFile">Exercise File<span class="text-danger">*</span></label>
                <input type="file" 
                    parsley-trigger="change"
                    placeholder="Exercise file" 
                    class="form-control" 
                    id="exerciseFile" 
                    name="exerciseFile"
                    value="<?php echo $exerciseFile;?>"                    
                    >
            </div>

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
            
            <div class="form-group text-right m-b-0">            
                <button class="btn btn-info waves-effect waves-light" type="submit">
                    Save
                </button>
                <a class="btn btn-light waves-effect m-l-5" href="javascript:HideForm()">
                    Back
                </a>
                <input type="hidden" name="recId" value="<?php echo $id;?>"/>
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
                            <th>Exercise</th>
                            <th>Department</th>
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
    $exercise->deleteModal(P_ADMIN_EXERCISE,ACTION_DELETE);
    if($process) echo $exercise->refreshPage($link);
?>
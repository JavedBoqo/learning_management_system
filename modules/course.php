<?php
$course =new Course();
list($hideForm, $hideList) = $course->showHideForm($id);
$departmentId = $courseName = $courseFile= ""; $list = ""; $link = "?p=".P_ADMIN_COURSE;
$msg = ""; $process=false;
if($_POST) {
    // printR($_POST);
    $recId = $_POST['recId'];     
    $courseName = $_POST['courseName'];
    $departmentId = $_POST['department'];
    $status = $recId == 0 ? $course->addCourse($departmentId,$courseName,$courseFile) : $course->updateCourse($recId,$departmentId,$courseName,$courseFile);
    if($status == PROCESS_SUCCESS) {
        $process=true;
        $msg=$course->showInfo("Course Saved Successfully");
    }
}

$aList = $course->getCourse($id); $course->printR($aList);


if($id == 0) {
    foreach($aList as $r) {
     $list .= '<tr>
                <td>'.$r->dep_name.'</td>                
                <td>
                    <a href="'.$link."&id=".$r->id.'"><i class="fa fa-edit"></i></a> ';
    $list .= $course->deleteLink($r->id);
    $list .='</td></tr>';
    }
}else {
    $aList = $aList[0];
    $departmentId = $aList->dept_id;
    $courseName = $aList->course_name;
    $courseFile = $aList->course_file;
}

$aListDepartment=$course->getDepartment(); //$quiz->printR($aListDepartment);
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
                <label for="courseName">Course Name<span class="text-danger">*</span></label>
                <input type="text" 
                    parsley-trigger="change"
                    placeholder="Course name" 
                    class="form-control" 
                    id="courseName" 
                    name="courseName"
                    value="<?php echo $courseName;?>"
                    required
                    >
            </div>
            
            <div class="form-group">
                <label for="courseFile">Course File<span class="text-danger">*</span></label>
                <input type="file" 
                    parsley-trigger="change"
                    placeholder="Course file" 
                    class="form-control" 
                    id="courseFile" 
                    name="courseFile"
                    value="<?php echo $courseFile;?>"
                    required
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
    $course->deleteModal(P_ADMIN_DEPARTMENT,ACTION_DELETE);
    if($process) echo $course->refreshPage($link);
?>
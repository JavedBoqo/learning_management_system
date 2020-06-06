<?php
$dept =new Department();
list($hideForm, $hideList) = $dept->showHideForm($id);
$msg = ""; $process=false;
if($_POST) {
    // printR($_POST);
    $recId = $_POST['recId'];     
    $name = $_POST['department'];
    $status = $recId == 0 ? $dept->addDepartment($name) : $dept->updateDepartment($recId,$name);
    if($status == PROCESS_SUCCESS) {
        $process=true;
        $msg=$dept->showInfo("Department Saved Successfully");
    }
}

$aList = $dept->getDepartment($id); //$dept->printR($aList);


$name = ""; $list = ""; $link = "?p=".P_ADMIN_DEPARTMENT;
if($id == 0) {
    foreach($aList as $r) {
     $list .= '<tr>
                <td>'.$r->dep_name.'</td>                
                <td>
                    <a href="'.$link."&id=".$r->id.'"><i class="fa fa-edit"></i></a> ';
    $list .= $dept->deleteLink($r->id);
    $list .='</td></tr>';
    }
}else {
    $aList = $aList[0];
    $name = $aList->dep_name;
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
                <label for="department">Department Name<span class="text-danger">*</span></label>
                <input type="text" 
                    parsley-trigger="change"
                    placeholder="Department name" 
                    class="form-control" 
                    id="department" 
                    name="department"
                    value="<?php echo $name;?>"
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
    $dept->deleteModal(P_ADMIN_DEPARTMENT,ACTION_DELETE);
    if($process) echo $dept->refreshPage($link);
?>
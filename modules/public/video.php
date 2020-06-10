<?php
$video =new Video();
list($hideForm, $hideList) = $video->showHideForm($id);
$departmentId = $videoName = $videoLink= ""; $list = ""; $link = "?p=".P_ADMIN_VIDEO;
$msg = ""; $process=false;


$aList = $video->getVideo($id); //$video->printR($aList);

if($id == 0) {
    foreach($aList as $r) {
     $list .= '<tr>
                <td>'.$r->dep_name.'</td>  
                <td><a target="_blank" href="index.php?p='.P_VIDEO_PLAY.'&link='.$r->video_link.'">'.$r->video_name.'</a></td>    
                <td>
                    <a target="_blank" href="https://www.youtubepp.com/watch?v='.$r->video_link.'"><i class="fa fa-download"></i></a>
                    <a href="'.$link."&id=".$r->id.'"><i class="fa fa-edit"></i></a> ';
    $list .= $video->deleteLink($r->id);
    $list .='</td></tr>';
    }
}else {
    $aList = $aList[0];
    $departmentId = $aList->dept_id;
    $videoName = $aList->video_name;
    $videoLink = $aList->video_link;
}

$aListDepartment=$video->getDepartment(); //$quiz->printR($aListDepartment);
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
            <div class="form-group">
                <label for="videoName">Video Name<span class="text-danger">*</span></label>
                <input type="text" 
                    parsley-trigger="change"
                    placeholder="Video name" 
                    class="form-control" 
                    id="videoName" 
                    name="videoName"
                    value="<?php echo $videoName;?>"
                    required
                    >
            </div>
            
            <div class="form-group">
                <label for="videoLink">Video Link<span class="text-danger">*</span></label>
                <input type="text" 
                    parsley-trigger="change"
                    placeholder="Video link" 
                    class="form-control" 
                    id="videoLink" 
                    name="videoLink"
                    value="<?php echo $videoLink;?>"                    
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
                            <th>Video Name</th>
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
    $video->deleteModal(P_ADMIN_VIDEO,ACTION_DELETE);
    if($process) echo $video->refreshPage($link);
?>
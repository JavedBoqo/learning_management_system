<?php
$course =new Course();
$aList = $course->getCourse($id); //$course->printR($aList);

foreach($aList as $r) {
    $list .= '<tr>
            <td>'.$r->course_name.'</td>  
            <td>'.$r->dep_name.'</td>                
            <td>
                <a target="_blank" href="'.$projectURL.UPLOAD_DIR_COURSE.$r->course_file.'"><i class="fa fa-download"></i></a> ';    
    $list .='</td></tr>';
}
?>
<div class="row list">
    <div class="col-12">                
        <div class="card-box table-responsive">
            <h4 class="m-t-0">
                <b>Courses</b>
            </h4>
            <p class="text-muted font-14 m-b-30">                                
            </p>

            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead>
                <tr>
                    <th>Course</th>
                    <th>Department</th>
                    <th>Download Document</th>
                </tr>
                </thead>


                <tbody>
                <?php echo $list; ?>                        
                </tbody>
            </table>
        </div>
    </div>
</div>
  
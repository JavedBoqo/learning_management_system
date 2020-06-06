<?php
class Common {
    function printR($data) {
        echo "<pre>".print_r($data,true)."</pre>";
    }

    function showInfo($msg,$success=true){
        $className = $success ? "alert-success" : "alert-danger";
        $m = '<div class="alert '.$className.'">';
        $m .= $msg;
        $m .= '</div>';
        return $m;
    }

    function showHideForm($id) {
        $hideForm = $hideList = "";
        if($id == 0) {
          $hideForm="display: none" ; $hideList = "display: block";
        } else {
            $hideForm="display: block";$hideList = "display: none";
        } 
        return array($hideForm,$hideList);
    }

    function deleteLink($id,$buttonClass="") {	
        return '<a href="#custom-modal" class="fa fa-window-close '.$buttonClass.'" data-animation="door" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a" onclick="setDeleteId('.$id.')"></a>';
    }

    

    function deleteModal($task, $subTask,$otherData="") {
        $task = base64_encode($task);
        $subTask = base64_encode($subTask);
        $temp = "'{$task}', '{$subTask}'";
    
        echo ' <div id="custom-modal" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Delete</h4>
        <div class="custom-modal-text">
            <form class="form-horizontal" action="#">
                <div class="form-group m-b-25">
                        <div class="col-12">
                            <label for="emailaddress3">Are you sure you want to delete?</label>					
                      </div>
                      <div class="result"></div>
                </div>
                <div class="form-group account-btn text-center m-t-10">
                    <div class="col-12">
                        <a class="btn-action btn w-lg btn-rounded btn-custom waves-effect waves-light btn-danger" href="javascript:deleteRecord('.$temp.')">Yes</a>
                        <input type="hidden" id="delId" name="delId" value=""/>
                        <input type="hidden" id="otherData" name="otherData" value="'.$otherData.'"/>
                    </div>
                </div>
    
            </form>
        </div>
    </div>  ';
    }
    
    function refreshPage($redirectTo) {
        return '<script>function refreshPage() {
            setTimeout(function(){
                window.location="'.$redirectTo.'";
            },2000);
        }
        refreshPage();
        </script>';
    }
}
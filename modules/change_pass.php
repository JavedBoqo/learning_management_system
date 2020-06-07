<?php
$user=new User();
list($hideForm, $hideList) = $user->showHideForm($id);
if($_POST) {
    // printR($_POST);
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    if($newPassword != $confirmPassword) $msg=$user->showInfo("New & confirm password do not match",false);
    else {
        $status=$user->updateUserPassword($loggedInUserId, $currentPassword,$newPassword);
        if($status==PROCESS_SUCCESS) $msg =$user->showInfo("Password changed successfully");
        else if($status==-100) $msg =$user->showInfo("Current Password is wrong",false);
        else $msg =$user->showInfo("Password change failed",false);
    }
}
?>
<div><?php echo $msg;?></div>
<div class="row form">
    <div class="col-lg-12">
    <div class="card-box">
        
        <form action="#" method="post">
            <div class="form-group">
                <label for="currentPassword">Current Password<span class="text-danger">*</span></label>
                <input type="password" 
                    parsley-trigger="change"
                    placeholder="Enter current password" 
                    class="form-control" 
                    id="currentPassword" 
                    name="currentPassword"
                    value=""
                    required>
            </div>
            <div class="form-group">
                <label for="newPassword">New Password<span class="text-danger">*</span></label>
                <input type="password" 
                    parsley-trigger="change"
                    placeholder="Enter new password" 
                    class="form-control" 
                    id="newPassword" 
                    name="newPassword"
                    value=""
                    required>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password<span class="text-danger">*</span></label>
                <input type="password" 
                    parsley-trigger="change"
                    placeholder="Enter confirm password" 
                    class="form-control" 
                    id="confirmPassword" 
                    name="confirmPassword"
                    value=""
                    required>
            </div>
            
            <div class="form-group text-right m-b-0">            
                <button class="btn btn-info waves-effect waves-light" type="submit">
                    Change
                </button>
                <input type="hidden" name="id" value="<?php echo $id;?>"/>
            </div>

        </form>
    </div>
    </div>
</div>
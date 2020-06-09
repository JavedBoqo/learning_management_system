<?php
$dep = new Department();
$departmentId=$name=$email="";
if($_POST) {    
    $user=new User(); 
    $departmentId = $_POST['department'];
    $name = $_POST['fullName'];
    $email = $_POST['emailAddress']; 
    $password = $_POST['password'];    
    $confirmPassword = $_POST['confirmPassword'];    
    if($password != $confirmPassword) $msg=$user->showInfo("Passwords do not match",false);
    else {
        if($user->checkUserAvailable($email)) {
            $status = $user->addUser($name,$email,$password,0,$departmentId); //$user->printR($data);exit;    
            if($status == PROCESS_SUCCESS) $msg=$user->showInfo("Registerd Successfully");
            else $msg=$user->showInfo("Registeration Failed");
        } else $msg=$user->showInfo("Email not available",false);
    }
}

$aListDepartment=$dep->getDepartment(); //$quiz->printR($aListDepartment);
$optDepartment = "<option value=''>Select Department</option>";
foreach($aListDepartment as $opt) {
    $selected = $opt->id==$departmentId ? "selected='selected'":null;
    $optDepartment .= "<option {$selected} value='".$opt->id."'>".$opt->dep_name."</option>";
}
?>
<div><?php echo $msg;?></div>
<div class="row">
<div class="col-3"></div>    
<div class="col-6">
    <div class="card">
                <div class="card-block">

                    <div class="account-box">

                        <div class="card-box p-5">
                            <h2 class="text-uppercase text-center pb-4">
                            
                                <!-- <a href="index.html" class="text-success">
                                    <span><img src="assets/images/logo.png" alt="" height="26"></span>
                                </a> -->
                            </h2>

                            <form class="" action="" method="post">
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

                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="fullName">Name<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" id="fullName" name="fullName" placeholder="Enter your name" value="<?php echo $name;?>" required="">
                                    </div>
                                </div>

                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailddress">Email address<span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" id="emailAddress" name="emailAddress" placeholder="Enter your email"  value="<?php echo $email;?>" required="">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">                                        
                                        <label for="password">Password<span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" required="">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">                                        
                                        <label for="password">Confirm Password<span class="text-danger">*</span></label>
                                        <input class="form-control" type="password" id="confirmPassword" name="confirmPassword" placeholder="Enter your password again" required="">
                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Register</button>
                                    </div>
                                </div>
                            </form>                            
                        </div>
                    </div>

                </div>
            </div>
    </div>
</div>
<div class="col-3"></div>    
<?php
if($_POST) {    
    $user=new User(); 
    $email = $_POST['emailAddress']; $password = $_POST['password'];    
    $data = $user->login($email,$password); //$user->printR($data);exit;
    if(count($data) > 0) {        
        $data = $data[0]; 
        $_SESSION["USER"]["ID"]=$data->id;
        $_SESSION["USER"]["EMAIL"]=$data->email;
        $_SESSION["USER"]["NAME"]=$data->full_name;
        $_SESSION["USER"]["ADMIN"]=$data->is_admin;
        $redirectPage = $data->is_admin > 0 ? "admin.php" : "index.php";
        echo "<script>window.location.href='./".$redirectPage."?p=a';</script>";
    } else $msg=$user->showInfo("Please enter valid Email & Password",false);
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

                                <div class="form-group m-b-20 row">
                                    <div class="col-12">
                                        <label for="emailddress">Email address</label>
                                        <input class="form-control" type="email" id="emailAddress" name="emailAddress" placeholder="Enter your email" required="">
                                    </div>
                                </div>

                                <div class="form-group row m-b-20">
                                    <div class="col-12">
                                        
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password" required="">
                                    </div>
                                </div>

                                <div class="form-group row text-center m-t-10">
                                    <div class="col-12">
                                        <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Login</button>
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
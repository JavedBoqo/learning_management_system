    <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                <?php if($loggedInUserId > 0) {?>
                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <a href="./" class="logo">
                            <!-- <span class="logo-small"><i class="mdi mdi-radar"></i></span> -->
                            <span class="logo-large"><i class="mdi mdi-radar"></i></span>
                            Teaching Training on ICT
                        </a> 
                        <!-- Image Logo -->
                        <!-- <a href="index.php" class="logo">
                            <img src="assets/images/logo_sm.png" alt="" height="26" class="logo-small">
                            <img src="assets/images/logo.png" alt="" height="22" class="logo-large">
                        </a> -->

                    </div>
                    <!-- End Logo container-->
                    <?php }?>

                    <div class="menu-extras topbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <li class="menu-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                            
                            
                            <?php if($loggedInUserId > 0) {?>
                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle"> <span class="ml-1 pro-user-name"><?php echo $loggedInUserName;?><i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                                    <!-- item-->
                                    <div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome <?php echo $loggedInUserName;?>!</h6>
                                    </div>
                                    <!-- item-->
                                    <a href="./?p=<?php echo base64_encode("CHANGE_PASS");?>" class="dropdown-item notify-item">
                                        <i class="fi-cog"></i> <span>Change Password</span>
                                    </a>
                                    <!-- item-->
                                    <a href="./?p=<?php echo base64_encode("LOGOUT");?>" class="dropdown-item notify-item">
                                        <i class="fi-power"></i> <span>Logout</span>
                                    </a>

                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <?php if($loggedInUserId > 0) {?>
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="admin.php"><i class="icon-speedometer"></i>Dashboard</a>
                            </li>
                            <li class="has-submenu">
                                <a href="admin.php?p=<?php echo P_ADMIN_DEPARTMENT; ?>"><i class="icon-speedometer"></i>Departments</a>
                            </li>
                            <li class="has-submenu">
                                <a href="admin.php?p=<?php echo P_ADMIN_COURSE; ?>"><i class="icon-speedometer"></i>Courses</a>
                            </li>
                            <li class="has-submenu">
                                <a href="admin.php?p=<?php echo P_ADMIN_EXERCISE; ?>"><i class="icon-speedometer"></i>Exercise</a>
                            </li>
                            <li class="has-submenu">
                                <a href="admin.php?p=<?php echo P_ADMIN_VIDEO; ?>"><i class="icon-speedometer"></i>Videos</a>
                            </li>
                            <li class="has-submenu">
                                <a href="admin.php?p=<?php echo P_ADMIN_QUIZ; ?>"><i class="icon-speedometer"></i>Quiz</a>
                            </li>
                                                                                    
                        </ul>
                            <?php }?>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->
        
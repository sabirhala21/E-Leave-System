<?php
session_start();
include ('config.php');
?>
<header class="header">
    <img src="elms.png" class="logo">
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                 <div class="navbar-right">
                    <ul class="nav navbar-nav">                  
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               
                                <span>   <?php 
                                           $result=mysqli_query($conn,"SELECT count(status) as total from principalleave where status='pending' ");
                                        if (mysqli_num_rows($result)>0) {
                                                $data=mysqli_fetch_array($result);
                                             ?> <i class="caret"></i><?php echo $data['total']; ?></span><?php
                                            }?>


                            </a>
                     
                            <ul class="dropdown-menu">
                               
                                <li class="user-footer">
                                    
                                       <a href="index.php">
                                           
                                        <span><?php
                                                 $result=mysqli_query($conn,"select principalleave.id,principalreg.userid,principalleave.leavetype,principalleave.applyeddate,principalleave.status from principalleave join principalreg on principalleave.empid=principalreg.id where principalleave.status='pending'");
                                        if (mysqli_num_rows($result)>0) {
                                            while ($raw=mysqli_fetch_array($result)) {
                                                ?>
                                                  <a style="
                                                  <?php
                                                if ($raw['status']=="pending") {
                                                 echo "font-weight:bold;";
                                                }?>
                                                "class="btn btn-default btn-flat" href="takeaction_principal.php?id=<?php echo $raw['id'] ?>">
                                        <?php 
                  
                if($raw['status']=='pending'){
                    echo "Request From".$raw['userid'];
                }
                ?>

                                           </span>
                                       </a>
                                       <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "No Record Found";
                                            }
                                       ?>
                                  
                                </li>
                            </ul>
                </div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">                  
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            
                                   
                            </a>
                            <ul class="dropdown-menu">
                               
                                <li class="user-footer">
                                    
                                       
                                   
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
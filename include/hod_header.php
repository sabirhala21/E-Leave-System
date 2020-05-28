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
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                              Faculty Leaves
                                <span>  <i class="fa fa-bell"></i>  <?php 
                                           $result=mysqli_query($conn,"SELECT count(statushod) as total from facultyleave where statushod='pending' AND hodid=".$_SESSION['id']);
                                        if (mysqli_num_rows($result)>0) {
                                                $data=mysqli_fetch_array($result);
                                             ?> <i class="caret"></i><?php echo $data['total']; ?></span><?php
                                            }?>


                            </a>
                     
                            <ul class="dropdown-menu">
                               
                                <li class="user-footer">
                                    
                                       <a href="#">
                                           
                                        <span><?php
                                                 $result=mysqli_query($conn,"select facultyleave.id,empreg.firstname,empreg.lastname,facultyleave.leavetype,facultyleave.applyeddate,facultyleave.statushod from facultyleave join empreg on facultyleave.empid=empreg.id where facultyleave.statushod='pending' AND facultyleave.hodid=".$_SESSION['id']);
                                        if (mysqli_num_rows($result)>0) {
                                            while ($raw=mysqli_fetch_array($result)) {
                                                ?>
                                                  <a style="
                                                  <?php
                                                if ($raw['statushod']=="pending") {
                                                 echo "font-weight:bold;";
                                                }?>
                                                "class="btn btn-default btn-flat" href="takeaction_faculty.php?id=<?php echo $raw['id'] ?>">
                                        <?php 
                  
                if($raw['statushod']=='pending'){
                    echo "Request From:-    ".$raw['firstname']." ".$raw['lastname'];
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
                                  </span>
                                </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">                  
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                              Student Leaves
                                <span>  <i class="fa fa-bell"></i>  <?php 
                                           $result=mysqli_query($conn,"select count(statushod) as total from studentleave where statushod='pending' AND statusfaculty='Approved'");
                                        if (mysqli_num_rows($result)>0) {
                                                $data=mysqli_fetch_array($result);
                                             ?> <i class="caret"></i><?php echo $data['total'];?></span>
                                            <?php
                                            }?>


                            </a>
                     
                            <ul class="dropdown-menu">
                               
                                <li class="user-footer">
                                    
                                       <a href="#">
                                           
                                        <span><?php
                                                 $result=mysqli_query($conn,"select studentleave.id,studentreg.firstname,studentreg.lastname,studentleave.leavetype,studentleave.applyeddate,studentleave.statushod,studentleave.department,studentreg.department,studentleave.statusfaculty  from studentleave join studentreg on studentleave.empid=studentreg.id where studentleave.statushod='pending' AND studentleave.hodid = ".$_SESSION['id']);
                                        if (mysqli_num_rows($result)>0) {
                                            while ($raw=mysqli_fetch_array($result)) {
                                                ?>
                                                  <a style="
                                                  <?php
                                                if ($raw['statushod']=="pending" && $raw['statusfaculty']=="Approved") {
                                                 echo "font-weight:bold;";
                                                }?>
                                                "class="btn btn-default btn-flat" href="takeactionhod_student.php?id=<?php echo $raw['id'] ?>">
                                        <?php 
                  
                if($raw['statushod']=='pending' && $raw['statusfaculty']=="Approved"){
                    echo "Request From:-    ".$raw['firstname']." ".$raw['lastname'];
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
                                  </span>
                                </a>
                                </li>
                            </ul>
                    
                </li>
            </ul>
                </div>
            </nav>
        </header>
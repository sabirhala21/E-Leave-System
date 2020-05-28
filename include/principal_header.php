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
                              HOD Leaves
                                <span>  <i class="fa fa-bell"></i>  <?php 
                                           $result=mysqli_query($conn,"SELECT ( SELECT COUNT(STATUS) FROM hodleave WHERE STATUS='pending' ) AS total1, ( SELECT COUNT(statusprincipal) FROM facultyleave WHERE statusprincipal='pending' AND statushod='Approved' ) AS total2 FROM dual");
                                        if (mysqli_num_rows($result)>0) {
                                                $data=mysqli_fetch_array($result);
                                             ?> <i class="caret"></i><?php echo $data['total1'];?>
                                             <?php  $data['total2'] ?></span><?php
                                            }?>


                            </a>
                     
                            <ul class="dropdown-menu">
                               
                                <li class="user-footer">
                                    <a href="#">
                                        <span><?php
                                                 $result=mysqli_query($conn,"select hodleave.id,hodreg.firstname,hodreg.lastname,hodleave.leavetype,hodleave.applyeddate,hodleave.status from hodleave join hodreg on hodleave.empid=hodreg.id where hodleave.status='pending'");
                                        if (mysqli_num_rows($result)>0) {
                                            while ($raw=mysqli_fetch_array($result)) {
                                                ?>
                                                  <a style="
                                                  <?php
                                                if ($raw['status']=="pending") {
                                                 echo "font-weight:bold;";
                                                }?>
                                                "class="btn btn-default btn-flat" href="takeaction_hod.php?id=<?php echo $raw['id'] ?>">
                                        <?php 
                  
                if($raw['status']=='pending'){
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
                              Faculty Leaves
                                <span>  <i class="fa fa-bell"></i>  <?php 
                                           $result=mysqli_query($conn,"select count(statusprincipal) as total from facultyleave where statusprincipal='pending' AND statushod='Approved'");
                                        if (mysqli_num_rows($result)>0) {
                                                $data=mysqli_fetch_array($result);
                                             ?> <i class="caret"></i><?php echo $data['total'];?>
                                            <?php
                                            }?>


                            </a>
                     
                            <ul class="dropdown-menu">
                               
                                <li class="user-footer">
                                    
                                       <a href="#">
                                           
                                        <span><?php
                                                 $result=mysqli_query($conn,"select facultyleave.id,empreg.firstname,empreg.lastname,facultyleave.leavetype,facultyleave.applyeddate,facultyleave.statushod,facultyleave.statusprincipal from facultyleave join empreg on facultyleave.empid=empreg.id where facultyleave.statusprincipal='pending'");
                                        if (mysqli_num_rows($result)>0) {
                                            while ($raw=mysqli_fetch_array($result)) {
                                                ?>
                                                  <a style="
                                                  <?php
                                                if ($raw['statusprincipal']=="pending" && $raw['statushod']=="Approved") {
                                                 echo "font-weight:bold;";
                                                }?>
                                                "class="btn btn-default btn-flat" href="takeactionprincipal_faculty.php?id=<?php echo $raw['id'] ?>">
                                        <?php 
                  
                if($raw['statusprincipal']=='pending' && $raw['statushod']=="Approved"){
                    echo "Request From:-".$raw['firstname']." ".$raw['lastname'];
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
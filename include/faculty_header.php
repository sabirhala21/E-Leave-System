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
                              Student Laves
                                <span>  <i class="fa fa-bell"></i>  <?php 
                                           $result=mysqli_query($conn,"SELECT count(statusfaculty) as total from studentleave where statusfaculty='pending' AND mentorid =".$_SESSION['id']);
                                        if (mysqli_num_rows($result)>0) {
                                                $data=mysqli_fetch_array($result);
                                             ?> <i class="caret"></i><?php echo $data['total']; ?></span><?php
                                            }?>


                            </a>
                     
                            <ul class="dropdown-menu">
                               
                                <li class="user-footer">
                                    
                                       <a href="">
                                           
                                        <span><?php
                                                 $result=mysqli_query($conn,"select studentleave.id,studentreg.firstname,studentreg.lastname,studentleave.leavetype,studentleave.applyeddate,studentleave.statusfaculty,studentleave.department,studentreg.department from studentleave join studentreg on studentleave.empid=studentreg.id where studentleave.statusfaculty='pending' AND studentleave.mentorid =".$_SESSION['id']);
                                        if (mysqli_num_rows($result)>0) {
                                            while ($raw=mysqli_fetch_array($result)) {
                                                ?>
                                                  <a style="
                                                  <?php
                                                if ($raw['statusfaculty']=="pending") {
                                                 echo "font-weight:bold;";
                                                }?>
                                                "class="btn btn-default btn-flat" href="takeactionfaculty_student.php?id=<?php echo $raw['id'] ?>">
                                        <?php 
                  
                if($raw['statusfaculty']=='pending'){
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
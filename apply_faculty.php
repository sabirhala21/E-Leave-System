<?php
include_once('config.php');
if(isset($_GET['id']) &&  $_GET['id'] != '')
{
    $query = 'select * from facultyleave where id='.$_GET['id'];
    $row = $dbc->QueryGetRow($query);
    $action="action.php?action=update";
}
else
{
    $action="action.php";
}
?>

<!DOCTYPE html>
<html>
    <head>
      
      <?php include_once('include/header.php');  ?>
  
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include_once('include/faculty_header.php');  ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
           
                   <?php include_once('include/facultymenu.php');  ?>
               

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
               
                <ol class="breadcrumb">
                        <li><a href="das.php"><i class="fa pull-right"></i> Profile </a></li>
                        <li><a href="department.php">Leave History</a></li>
                         <li class="active"><?php echo($action !='action.php?action=update' ? "Apply New Leave" : "Update Leave")?></li>
                    </ol>
                <!-- Main content -->
                <section class="content">
                    <form method="Post"  id="category-form" name="category-form" action="<?php echo $action ?>" enctype="multipart/form-data">
                    <div class="wrapper wrapper-content animated fadeInRight"> 
                    <div class="row">                          
                        <div class="col-sm-6">
                        <legend>Leave Detail</legend>
                        
                        <div class="form-group">
                                <label>Leave Type<a class="tooltip-ps" data-toggle="tooltip" title="Please provide Leave Type"> <span class='glyphicon glyphicon-info-sign menu-icon'></span></a>
                                </label>
                                <select name="leavetype" class="form-control" required>
                                     <?php

                                $conn=mysqli_connect('localhost','root','','eleavesystem');
                                $fetch=mysqli_query($conn,"select * from leavetype");
                             while ($raws=mysqli_fetch_array($fetch)) {

                        echo "<option>".$raws["description"]."</option>";
                             }
    ?>
</select>
                                <input type="hidden" name="hidden_id" value="<?php echo $row['id']; ?>"/>
                                
                            </div>
                             <div class="form-group">
                                <label>From Date<a class="tooltip-ps" data-toggle="tooltip" title="Please provide Date"> <span class='glyphicon glyphicon-info-sign menu-icon'></span></a>
                                </label>
                                 <input class="form-control" type="date" placeholder="From Date" name="fdate" id="fdate" value="<?php echo $row['fromdate']; ?>" required>
                          
                            </div>
                            <div class="form-group">
                                <label>To Date<a class="tooltip-ps" data-toggle="tooltip" title="Please provide Date"> <span class='glyphicon glyphicon-info-sign menu-icon'></span></a>
                                </label>
                                 <input class="form-control" type="date" placeholder="To Date" name="tdate" id="tdate" value="<?php echo $row['todate']; ?>" required>
                          
                            </div>
                            <div class="form-group">
                                <label>Discription<a class="tooltip-ps" data-toggle="tooltip" title="Please provide Date"> <span class='glyphicon glyphicon-info-sign menu-icon'></span></a>
                                </label>
                                 <textarea rows="10" cols="50" name="dis"  class="form-control">
                                   
                                 </textarea>
                          
                            </div>
                             <div class="form-group">
                                <label>Department :<a class="tooltip-ps" data-toggle="tooltip" title="Please select Department"> <span class='glyphicon glyphicon-info-sign menu-icon'></span></a>
                                </label>
                                <select name="depname" class="form-control" required>
                                     <?php

                                $conn=mysqli_connect('localhost','root','','eleavesystem');
                                $fetch=mysqli_query($conn,"select * from department");
                             while ($raws=mysqli_fetch_array($fetch)) {

                        echo "<option>".$raws["depname"]."</option>";
                             }
    ?>
</select>
                                <input type="hidden" name="hidden_id" value="<?php echo $row['id']; ?>"/>
                                
                            </div>
                                         
                      </div> <!--END col-sm-6-->
                    </div> <!--END row class-->
                
                <hr/>
                <input type="submit" class="btn btn-primary" value="<?php echo($action !='action.php?action=update' ? "Save" : "Update")?>"  id="btn_faculty" name="btn_faculty" />               
                <a href="faculty_history.php" class="btn btn-primary">Cancel</a>
                </div> <!--wrapper div end-->
                    </form>

                </section><!-- /.content -->
            
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    <?php include_once('include/jscript.php'); ?>

   
    </body>
</html>
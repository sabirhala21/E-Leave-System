<?php
include_once('config.php');
if(isset($_GET['id']) &&  $_GET['id'] != '')
{
    $query = 'select * from leavetype where id='.$_GET['id'];
   $exe= mysqli_query($conn,$query);
    $row=mysqli_fetch_array($exe);
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
        <?php include_once('include/topheader.php');  ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
           
                   <?php include_once('include/leftmenu.php');  ?>
               

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
               
				<ol class="breadcrumb">
                        <li><a href="das.php"><i class="fa pull-right"></i> Dashboard </a></li>
                        <li><a href="department.php">LeaveType List</a></li>
                         <li class="active"><?php echo($action !='action.php?action=update' ? "Add New Leave Type" : "Update Leave Type")?></li>
                    </ol>
                <!-- Main content -->
                <section class="content">
					<form method="Post"  id="category-form" name="category-form" action="<?php echo $action ?>" enctype="multipart/form-data">
                    <div class="wrapper wrapper-content animated fadeInRight"> 
					<div class="row">	                       
                    	<div class="col-sm-6">
                        <legend>Type Detail</legend>
                    	
                        <div class="form-group">
								<label>Leave Type<a class="tooltip-ps" data-toggle="tooltip" title="Please provide the Leave Type"> <span class='glyphicon glyphicon-info-sign menu-icon'></span></a>
								</label>
								 <input class="form-control" type="text" placeholder="Type" name="type" id="type" value="<?php echo $row['leavetype']; ?>" required>
                                <input type="hidden" name="hidden_id" value="<?php echo $row['id']; ?>"/>
                                
							</div>
							 <div class="form-group">
								<label>Leave Type Description<a class="tooltip-ps" data-toggle="tooltip" title="Please provide the Leave Type Description"> <span class='glyphicon glyphicon-info-sign menu-icon'></span></a>
								</label>
								 <input class="form-control" type="text" placeholder="Type Description" name="dis" id="dis" value="<?php echo $row['description']; ?>" required>
                          
							</div>
                       					 
                      </div> <!--END col-sm-6-->
					</div> <!--END row class-->
				
				<hr/>
				<input type="submit" class="btn btn-primary" value="<?php echo($action !='action.php?action=update' ? "Save" : "Update")?>"  id="btntype" name="btntype" />               
				<a href="leavetype.php" class="btn btn-primary">Cancel</a>
                </div> <!--wrapper div end-->
                    </form>

                </section><!-- /.content -->
            
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
    <?php include_once('include/jscript.php'); ?>

   
    </body>
</html>
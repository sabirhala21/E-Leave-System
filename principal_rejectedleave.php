<?php
   include_once('config.php');
 ?>
<!DOCTYPE html>
<html>
    <head>
        
      <?php include_once('include/header.php');  ?>
      <title>Welcome To e-Leave System</title>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <?php include_once('include/principal_header.php');  ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
           
                   <?php include_once('include/principalmenu.php');  ?>
               

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                 <ol class="breadcrumb">
                        <li><a href="das.php"><i class="fa pull-right"></i> Profile </a></li>
                        <li class="active">Approved Leave List</li>
                        
                    </ol>
               
                <!-- Main content -->
                <section class="wrapper content animated fadeInRight"> 
                 <form id="form_category" name="form_category" method="post" onSubmit="return checkChecked('form_category');">
                
				<div class="row">
                	<div class="col-sm-1">
						
                     </div>
                    
					<div class="col-sm-11">
						
                    </div>
                    
               </div>
               <!--message-->
           <?php 
					@session_start();
					 echo $_SESSION['msg'];
					  unset($_SESSION['msg']); ?>

           
                    <div class="row">
                        <div class="col-xs-12">                           
                            <div class="box">                               
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                 <th>No.</th>                                             
                                                 <th>Employee Name</th>  
                                                 <th>Leave Type</th>
                                                 <th>Posting Date</th>   
                                                  <th>Admin Remark</th>
                                                 <th>Admin Remark Date</th>
                                                 <th>Status</th>
                                                
                                                

                                            </tr>
                                        </thead>
                                        <tbody>

                                         <?php 
										 	$Srno=0;
										 	$query="select principalleave.id,principalreg.userid,principalleave.leavetype,principalleave.applyeddate,principalleave.status,principalleave.adminremark,principalleave.adminremarkdate from principalleave join principalreg on principalleave.empid=principalreg.id where principalleave.status='Rejectted'AND  principalleave.empid=".$_SESSION['id'];;
                                            $result = mysqli_query($conn,$query);
                                            if (mysqli_num_rows($result))
											{
												while($row = mysqli_fetch_array($result))
												{	
													$Srno++;
                                                    $stats=$row['status'];
										 ?>
                                            <tr>
                                            <form method="POST">
                                              <td style="width:50px"><?php echo $Srno; ?></td>                                    
                                              <td style="width:650px"><?php echo $row["userid"] ?></td>                   
                                              <td style="width:650px"><?php echo $row["leavetype"] ?></td> 
                                              <td style="width:650px"><?php echo $row["applyeddate"] ?></td>

                                              <td style="width:650px"><?php echo $row["adminremark"] ?></td>

                                              <td style="width:650px"><?php echo $row["adminremarkdate"] ?></td>

                                               <td><?php
if($stats=='pending'){
                                             ?>
                                                 <span style="color: blue">waiting for approval</span>
                                                 <?php } if($stats=='Approved')  { ?>
                                                <span style="color: green">Approved</span>
                                                 <?php } if($stats=='Rejectted')  { ?>
 <span style="color: red">Not Approved</span>
 <?php } ?>


                                             </td>     
                                             
                                        </tr>
									 <?php }} ?>           
                                        </tbody>
                                        
                                        
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                   </form>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
<?php include_once('include/jscript.php'); ?>
  

    </body>
</html>
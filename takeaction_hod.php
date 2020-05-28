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
        <?php include_once('include/topheader.php');  ?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
           
                   <?php include_once('include/principalmenu.php');  ?>
               

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                 <ol class="breadcrumb">
                        <li><a href="das.php"><i class="fa pull-right"></i> Dashboard </a></li>
                        <li class="active">Pending Leave List</li>
                        
                    </ol>
               
                <!-- Main content -->
                <section class="wrapper content animated fadeInRight"> 
                 <form id="form_category" name="form_category" method="post">
                
        <div class="row">
                  <div class="col-sm-1">
            
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
                                           
                                        </thead>
                                        <tbody>
                                          <?php
                                             if (isset($_GET['id'])) {
                                                $id=$_GET['id'];
                                                $query="select hodleave.id,hodreg.firstname,hodreg.lastname,hodleave.leavetype,hodleave.fromdate,hodleave.todate,hodleave.discription,hodleave.applyeddate,hodleave.principalremark,hodleave.principalremarkdate,hodleave.status from hodleave join hodreg on hodleave.empid=hodreg.id where hodleave.id='$id'";
                                            $result = mysqli_query($conn,$query);
                                            if (mysqli_num_rows($result))
                      {
                        while($row = mysqli_fetch_array($result))
                        { 
                          $Srno++;
                                                    $stats=$row['status'];
                     ?>
                                            <tr>
                                            <td style="font-size:16px;"> <b>Employe Name :</b></td>
                                              <td><?php echo $row['userid']; ?></td>
                                          
                
                                            <td style="font-size:16px;"> <b>Leave Type:</b></td>
                                              <td><?php echo $row['leavetype']; ?></td>
                                          </tr>
                                           <tr>
                                            <td style="font-size:16px;"> <b>From Date:</b></td><td><?php echo $row['fromdate']; ?></td>
                                             <td> <b>To Date:</b></td><td><?php echo $row['todate']; ?></td>
                                          </tr>
                                          <tr>
                                            <td style="font-size:16px;"> <b>Applid Date:</b></td>
                                              <td><?php echo $row['applyeddate']; ?></td>
                                      
                                            <td style="font-size:16px;"> <b>Discription:</b></td>
                                              <td><?php echo $row['discription']; ?></td>
                                          </tr>
                                           <tr>
                                            <td style="font-size:16px;"> <b>Admin Remark:</b></td>
                                              <td><?php echo $row['adminremark']; ?></td>
                                         
                                            <td style="font-size:16px;"> <b>Admin Remark Date:</b></td>
                                              <td><?php echo $row['adminremarkdate']; ?></td>
                                          </tr>
                                          <tr>
                                            <td style="font-size:16px;"> <b>Leave Status:</b></td>
                                          
                                               <td colspan="3" style="text-align:center;"><?php
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
                                        <tr>
                                        <tr>
                                            <td style="font-size:16px;"> <b>Chose Your Option:</b></td>
                                            <td style="font-size:16px;"> 
                                            <div style="width:90%">
                                            <select name="action">
                                            <option> Select Any</option>
                                            <option>Approved</option>
                                            <option>Rejectted</option>
                                            </select></div></td>
                                            </tr>
                                            <tr>
                                              <td style="font-size:16px;"><b>Add Discription</b></td>
                                               <td style="font-size:16px;"><p><textarea id="textarea1" name="description" placeholder="Description" length="500" maxlength="500" required></textarea></p>
                                               </td>
                                          </tr>
                                          <tr>
                                           <td style="align:center;">
                                           <input type="hidden" name="hide" value="<?php echo $row['id']; ?>">
                                         <input type="submit" name="takeaction" value="Take Action" class="btn btn-primary">
                                          </td>
                                           </tr>

         
                   <?php 
                 }
                 } 
               }
                else{
                      $Srno=0;
                      $id=$_GET['id'];
                      $query="select hodleave.id,hodreg.firstname,hodreg.lastname,hodleave.leavetype,hodleave.fromdate,hodleave.todate,hodleave.discription,hodleave.applyeddate,hodleave.principalremark,hodleave.principalremarkdate,hodleave.status from hodleave join hodreg on hodleave.empid=hodreg.id where hodleave.id='$id'";
                                            $result = mysqli_query($conn,$query);
                                            if (mysqli_num_rows($result))
                      {
                        while($row = mysqli_fetch_array($result))
                        { 
                          $Srno++;
                                                    $stats=$row['status'];
                     ?>
                                            <tr>
                                            <td style="font-size:16px;"> <b>Employe Name :</b></td>
                                              <td><?php echo $row['userid']; ?></td>
                                          
                
                                            <td style="font-size:16px;"> <b>Leave Type:</b></td>
                                              <td><?php echo $row['leavetype']; ?></td>
                                          </tr>
                                           <tr>
                                            <td style="font-size:16px;"> <b>From Date:</b></td><td><?php echo $row['fromdate']; ?></td>
                                             <td> <b>To Date:</b></td><td><?php echo $row['todate']; ?></td>
                                          </tr>
                                          <tr>
                                            <td style="font-size:16px;"> <b>Applid Date:</b></td>
                                              <td><?php echo $row['applyeddate']; ?></td>
                                      
                                            <td style="font-size:16px;"> <b>Discription:</b></td>
                                              <td><?php echo $row['discription']; ?></td>
                                          </tr>
                                           <tr>
                                            <td style="font-size:16px;"> <b>Admin Remark:</b></td>
                                              <td><?php echo $row['principalremark']; ?></td>
                                         
                                            <td style="font-size:16px;"> <b>Admin Remark Date:</b></td>
                                              <td><?php echo $row['principalremarkdate']; ?></td>
                                          </tr>
                                          <tr>
                                            <td style="font-size:16px;"> <b>Leave Status:</b></td>
                                          
                                               <td colspan="3" style="text-align:center;"><?php
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
                                        <tr>
                                        <tr>
                                            <td style="font-size:16px;"> <b>Chose Your Option:</b></td>
                                            <td style="font-size:16px;"> 
                                            <div style="width:90%">
                                            <select name="action">
                                            <option> Select Any</option>
                                            <option>Approved</option>
                                            <option>Rejectted</option>
                                            </select></div></td>
                                            </tr>
                                            <tr>
                                              <td style="font-size:16px;"><b>Add Discription</b></td>
                                               <td style="font-size:16px;"><p><textarea id="textarea1" name="description" placeholder="Description" length="500" maxlength="500" required></textarea></p>
                                               </td>
                                          </tr>
                                          <tr>
                                           <td style="align:center;">
                                           <input type="hidden" name="hide" value="<?php echo $row['id']; ?>">
                                         <input type="submit" name="takeaction" value="Take Action" class="btn btn-primary">
                                          </td>
                                           </tr>

         
                   <?php }} }?>   
<?php

      if (isset($_POST['takeaction'])) {
        $id=$_POST['hide'];
        $action=$_POST['action'];
    $adminremark=$_POST['description'];
    date_default_timezone_set('Asia/Kolkata');
    $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
    $que="update hodleave set status='$action',principalremark='$adminremark',principalremarkdate='$admremarkdate' where id='$id'";
    $exe=mysqli_query($conn,$que);
       $message='<div class="alert alert-success fade in">Action Taken successfully <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
      }

    ?>



 
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
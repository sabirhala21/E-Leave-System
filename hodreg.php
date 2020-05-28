<?php
$conn=mysqli_connect('localhost','root','','eleavesystem');
if(isset($_POST["submit"])) 
{
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$dob=$_POST['dob'];
	$gender=$_POST['gender'];
	$email=$_POST['email'];
	$department=$_POST['dept'];
	$add=$_POST['address'];
	$no=$_POST['mono'];
	$user=$_POST['user'];
	$password=md5($_POST['pass']);

	if ($user!="") {
	$que="select * from hodreg where userid='$user' ";
	$run=mysqli_query($conn,$que);
	if (mysqli_num_rows($run)>0) {
				echo '<script type="text/javascript"> alert("UserName aleredy Exist")</script>';
	}
	else
	{
		
		
	$query="insert into hodreg (firstname,lastname,dob,gender,email,department,address,mono,userid,password) values ('$fname','$lname','$dob','$gender','$email','$department','$add','$no','$user','$password')";
	$execute=mysqli_query($conn,$query);


	if (!$execute) {
	echo mysqli_error($conn);
			# code...
	}
	else{
		echo '<script type="text/javascript"> alert("Employee Inserted")</script>';
		header("location:index.php");
	}
	
}
}
}
?>
<html style="min-height: 710px;"><head>
      
      
<meta charset="UTF-8">
        <title>E-Leave System</title>
         <link rel="shortcut icon" href="icon_32.png" type="image/x-icon">
        
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
			<!-- font Awesome -->
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
			<!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css">
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
         
			<!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css">
			<!-- Animation style -->
        <link href="css/animate.css" rel="stylesheet" type="text/css">
        
			<!-- DATA TABLES -->
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css">  
    <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
    <body class="skin-blue  pace-done" style="min-height: 710px;"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
        <!-- header logo: style can be found in header.less -->
        
    <div class="wrapper row-offcanvas row-offcanvas-left" style="min-height: 510px;">
            <!-- Left side column. contains the logo and sidebar -->
            
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
				
                <!-- Main content -->
                <section class="content">
					<form method="post" id="news-form" name="news-form" enctype="multipart/form-data" novalidate="novalidate">
                    <div class="wrapper wrapper-content animated fadeInRight" style="min-height: 510px;"> 
					<div class="row">	                       
                    	<div class="col-sm-6">
                        <legend style="background-color: gray; text-align: center;">New Registeration</legend>    
						<div class="form-group">
								<label>First Name: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the First Name."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
								<input class="form-control" type="text" name="fname" id="word_title" value="" required="" aria-required="true">
								
                                <input type="hidden" name="hidden_id" value="">
                                							   
							</div>
							<div class="form-group">
								<label>Last Name: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the Last Name."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
								<input class="form-control" type="text"  name="lname" id="word_title" value="" required="" aria-required="true">
							 							   
							</div>

							<div class="form-group">
								<label>DOB: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the Date Of Birth."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
								<input class="form-control" type="date" name="dob" id="word_title" value="" required="" aria-required="true">
							 							   
							</div>
                               <div class="form-group">
								<label>Gender : <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please select Gender."> <span class="glyphicon glyphicon-info-sign menu-icon"> </span>	</a> </label>
                               
								 <select class="form-control" name="gender" id="quizlevel" required="" aria-required="true">
                                 								 <option value="Male"> Male</option> 
                              								 <option value="Female"> Female</option> 
                                                               </select>
								 </div>  	
							 
                        <div class="form-group">
								<label>Email: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the Email."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
								<input class="form-control" type="email" name="email" id="word_title" value="" required="" aria-required="true">
							 							   
							</div>
						<div class="form-group">
								<label>Department : <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please select Department."> <span class="glyphicon glyphicon-info-sign menu-icon"> </span>	</a> </label>
                               
								 <select class="form-control" name="dept" id="quizlevel" required="" aria-required="true">
                                 								<?php

		$conn=mysqli_connect('localhost','root','','eleavesystem');
		$fetch=mysqli_query($conn,"select * from department");
		while ($raws=mysqli_fetch_array($fetch)) {

			echo "<option>".$raws["depname"]."</option>";
		}
	?> 
                                                               </select>
								 </div>  
						<div class="form-group">
								<label>Address: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the Address."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
								<textarea class="form-control" type="text" name="address" id="word_title" value="" required="" aria-required="true" rows="5" cols="5">
									</textarea>
								<input type="hidden" name="hidden_id" value="">
                        </div>
						<div class="form-group">
								<label>Mobile No <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the Mobile No."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
								<input class="form-control" type="text" name="mono" id="word_title" value="" required="" aria-required="true" pattern ="[0-9]+" maxlength="10">
								<input type="hidden" name="hidden_id" value="">
                        </div>
						<div class="form-group">
								<label>User ID: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the UserID."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
								<input class="form-control" type="text"  name="user" id="word_title" value="" required="" aria-required="true">
							 							   
							</div>
							<div class="form-group">
								<label>Password: <a class="tooltip-ps" data-toggle="tooltip" title="" data-original-title="Please provide the Password."><span class="glyphicon glyphicon-info-sign menu-icon"></span></a></label>
								<input class="form-control" type="password"  name="pass" id="word_title" value="" required="" aria-required="true">
							 							   
							</div>
                        						
                      </div> <!--END col-sm-6-->
  
					</div> <!--END row class-->
				<input class="form-control" type="hidden" placeholder="Question" name="hidden_id" id="hidden_id" value="">
				<hr>
				<input type="submit" class="btn btn-primary" value="Save" id="btnnews" name="submit">               
				<a href="index.php" class="btn btn-primary">Cancel</a>
                </div> <!--wrapper div end-->
                    </form>

                </section><!-- /.content -->
            
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
     

    
</body></html>

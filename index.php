<?php
require 'config.php';

?>


<html><head>
     
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
        <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css">    </head>
    <body style="">
       <div class="form-box" id="login-box">
          <div class="header">Sign In</div>
		  
           <form method="post">
           	<?php 
           ?>
		   
		        <div class="body bg-gray">
		        	<label>User Type<a class="tooltip-ps" data-toggle="tooltip" title="Please provide User Type"> <span class='glyphicon glyphicon-info-sign menu-icon'></span></a>
                                </label>
                                <select name="utype" class="form-control" required>
                 					<option value="Select">Select</option>
                 					<option>Admin</option>
                 					<option>Principal</option>
                 					<option>HOD</option>
                 					<option>Faculty</option>
                 					<option>Student</option>
								</select>
                 <div class="form-group">
                    <label>Userid<a class="tooltip-ps" data-toggle="tooltip" title="Please provide UserID"> <span class='glyphicon glyphicon-info-sign menu-icon'></span></a>
                                </label>
                                 <input class="form-control" type="text" placeholder="UserID" name="username" id="fdate">
                   </div>
                   <div class="form-group">
                     <label>Password<a class="tooltip-ps" data-toggle="tooltip" title="Please provide Passsword"> <span class='glyphicon glyphicon-info-sign menu-icon'></span></a>
                                </label>
                                 <input class="form-control" type="password" placeholder="Password" name="pass" id="fdate">
                   </div>         
				</div>
               <div class="footer">                                                               
                  <button type="submit" class="btn bg-blue btn-block" name="signin">Sign me in</button>   
               </div>
               <div class="footer">                                                               
                  <button type="submit" class="btn bg-blue btn-block" name="signup">Sign Up</button>   
               </div>

                                                                             
                  <a href="forgot_password.php">forgot password</a> 
        

            </form>
        </div>

</body></html>

<?php

if(isset($_POST['signin']))
{

	$usertype=$_POST['utype'];
	$userid=$_POST['username'];
	$password=$_POST['pass'];
	if ($usertype=="Select") {
		echo '<script type="text/javascript"> alert("Please Select User Type")</script>';
	}
	elseif ($userid=="") {
		echo '<script type="text/javascript"> alert("Please Enter UserID")</script>';
	}
	elseif($password=="") {
		echo '<script type="text/javascript"> alert("Please Enter Password")</script>';
	}
	elseif ($usertype=="Admin") {
		
		$userid=$_POST['username'];
		$password=md5($_POST['pass']);
		$query="select * from adminprincipalreg where userid='$userid' AND password='$password' ";
		$exe=mysqli_query($conn,$query);
		if (mysqli_num_rows($exe)>0) {
			$_SESSION['username']=$userid;
			header('location:leavetype.php');
		}
		else {
			echo '<script type="text/javascript"> alert("Invallid username or password")</script>';
			}
		}

	else if ($usertype=="Faculty") {

		$userid=$_POST['username'];
	$password=md5($_POST['pass']);
	
	$query="select * from empreg where userid='$userid' AND password='$password' ";


	$exe=mysqli_query($conn,$query);
	if (mysqli_num_rows($exe)>0) {
		while ($raw=mysqli_fetch_array($exe)) {
			session_start();
			$_SESSION['id']=$raw['id'];
			echo $_SESSION['id'];
		}
		$_SESSION['username']=$userid;
	header('location:faculty_history.php');
	}
	else {
		echo '<script type="text/javascript"> alert("Invallid username or password")</script>';
	}

	}


	else if ($usertype=="HOD") {
		
		$userid=$_POST['username'];
	$password=md5($_POST['pass']);
	$query="select * from hodreg where userid='$userid' AND password='$password' ";
	$exe=mysqli_query($conn,$query);
	if (mysqli_num_rows($exe)>0) {
		while ($raw=mysqli_fetch_array($exe)) {
			session_start();
			$_SESSION['id']=$raw['id'];
			echo $_SESSION['id'];
		}
		$_SESSION['username']=$userid;
		header('location:hod_history.php');
	}
	else {
		echo '<script type="text/javascript"> alert("Invallid username or password")</script>';
	}

	}


	else if ($usertype=="Principal") {
		
		$userid=$_POST['username'];
	$password=md5($_POST['pass']);
	$query="select * from principalreg where userid='$userid' AND password='$password' ";
	$exe=mysqli_query($conn,$query);
	if (mysqli_num_rows($exe)>0) {
		while ($raw=mysqli_fetch_array($exe)) {
			session_start();
			$_SESSION['id']=$raw['id'];
			echo $_SESSION['id'];
		}
		$_SESSION['username']=$userid;
		header('location:principal_history.php');
	}
	else {
		echo '<script type="text/javascript"> alert("Invallid username or password")</script>';
	}

	}

	elseif ($usertype=="Student") {
		
		$userid=$_POST['username'];
		$password=md5($_POST['pass']);
		$query="select * from studentreg where userid='$userid' AND password='$password' ";
		$exe=mysqli_query($conn,$query);
		if (mysqli_num_rows($exe)>0) {
			while ($raw=mysqli_fetch_array($exe)) {
				session_start();
			$_SESSION['id']=$raw['id'];
			echo $_SESSION['id'];
		}
			$_SESSION['username']=$userid;
			header('location:student_das.php');
		}
		else {
			echo '<script type="text/javascript"> alert("Invallid username or password")</script>';
			}
		}
	
}


?>
<?php

if (isset($_POST['signup'])) {

	$usertype=$_POST['utype'];
	if ($usertype=="Select") {
		echo '<script type="text/javascript"> alert("Please Select User Type")</script>';
	}
	$usertype=$_POST['utype'];
	
	if ($usertype=="HOD") {
		
		header('location:hodreg.php');
	}

	if ($usertype=="Admin") {
		
		echo '<script type="text/javascript"> alert("Not Authorized")</script>';
	}

	if ($usertype=="Faculty") {
		
		header('location:employeereg.php');
	}

	if ($usertype=="Student") {
		
		header('location:studentreg.php');
	}


	if ($usertype=="Principal") {
		
		echo '<script type="text/javascript"> alert("Not Authorized")</script>';
	}
	
}


?>


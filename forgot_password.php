<?php
require 'config.php';
include_once("../maillib/send_email.php");

 function fp($to)
  {
     $string="abcdABCD012345*^%$";
    $random=substr(str_shuffle($string),0,6);
    return $random;
   // echo $to;
  // sendemailses($to,'New Password','New Password are :- '.$random);

  }
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
          <div class="header">Recover Your Paassword</div>
		  
           <form method="post">
		   
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
                    <label>Email-id<a class="tooltip-ps" data-toggle="tooltip" title="Please provide Email-id"> <span class='glyphicon glyphicon-info-sign menu-icon'></span></a>
                                </label>
                                 <input class="form-control" type="email" placeholder="Email-id" name="email" id="fdate">
                   </div>
                           
				</div>
                                                                            
                  <button type="submit" class="btn bg-blue btn-block" name="send">Send Email</button>   
               </div>

               

            </form>
        </div>

</body></html>

<?php
if (isset($_POST['send'])) {

$usertype=$_POST['utype'];
$email=$_POST['email'];
  if ($usertype=="Admin") {


    
  }

  if ($usertype=="Principal") {
    
  }

  if ($usertype=="HOD") {

     $query="select * from hodreg where email='$email'";
    $exe=mysqli_query($conn,$query);
    if (mysqli_num_rows($exe)>0) {
  while ($raw=mysqli_fetch_array($exe)) {
    $to=$raw['email'];
    $new=fp($to);
   // echo "New=".$new;
    $new1=md5($new);
   // echo "MD5=".$new1;
   sendemailses($to,'New Password','New Password are :- '.$new);
   $q="update hodreg set password='$new1' where email='$to'" ;
   $e=mysqli_query($conn,$q);
   if ($e) {

     $message='<div class="alert alert-success fade in">Password Sent to your Email-id<button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
      echo $message;
     
   }
  }
   }
    
  }

  if ($usertype=="Faculty") {


 $query="select * from empreg where email='$email'";
    $exe=mysqli_query($conn,$query);
    if (mysqli_num_rows($exe)>0) {
  while ($raw=mysqli_fetch_array($exe)) {
    $to=$raw['email'];
    $new=fp($to);
   // echo "New=".$new;
    $new1=md5($new);
   // echo "MD5=".$new1;
   sendemailses($to,'New Password','New Password are :- '.$new);
   $q="update empreg set password='$new1' where email='$to'" ;
   $e=mysqli_query($conn,$q);
   if ($e) {

     $message='<div class="alert alert-success fade in">Password Sent to your Email-id<button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
      echo $message;
     
   }
  }
   }

    
  }

  if ($usertype=="Student") {

    $query="select * from studentreg where email='$email'";
    $exe=mysqli_query($conn,$query);
    if (mysqli_num_rows($exe)>0) {
  while ($raw=mysqli_fetch_array($exe)) {
    $to=$raw['email'];
    $new=fp($to);
   // echo "New=".$new;
    $new1=md5($new);
   // echo "MD5=".$new1;
   sendemailses($to,'New Password','New Password are :- '.$new);
   $q="update studentreg set password='$new1' where email='$to'" ;
   $e=mysqli_query($conn,$q);
   if ($e) {

     $message='<div class="alert alert-success fade in">Password Sent to your Email-id<button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
      echo $message;
     
   }
  }
   }

  }




}


?>

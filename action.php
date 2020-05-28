<?php 
session_start();
include("include/config.php");

include("config.php");
include_once("../maillib/send_email.php");
$id=$_SESSION['username'];

$sql="select * from principalreg where userid='$id'";
	$result =  $dbc->Query($sql);
	$row = $result->fetch_assoc();
	$use=$row['id'];
	echo $use;


if(isset($_POST['btndep']))
{
	
	//*************Add level******************//
	if(isset($_POST['depid']) && isset($_POST['depname']) && isset($_POST['depsname']) && $_GET['action'] != 'update')
	{	
		
			$sql ='insert into department(depid,depname,shortname)values("'.$_POST['depid'].'","'.$_POST['depname'].'","'.$_POST['depsname'].'")';	
            $result =  $dbc->Query($sql);
		    if($result){
						$message='<div class="alert alert-success fade in">Department is successfully Added.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
				@session_start();
				$_SESSION['msg']=$message;
					header('location:department.php');}					
					else{echo mysqli_error();}
					exit();	
						 header('location:department.php');


			}
		

	if($_GET['action']=='update' && isset($_POST['hidden_id']) &&  $_POST['hidden_id'] != '')
	{
		$query = 'update department set depid= "'.$_POST['depid'].'",depname= "'.$_POST['depname'].'",shortname= "'.$_POST['depsname'].'" where id ='.$_POST['hidden_id'];

        $sql =  mysqli_query($conn,$query);
			if($sql){
			   $message='<div class="alert alert-success fade in">Department is successfully updated.<button type="button" class="close" 
								data-dismiss="alert" aria-hidden="true">x</button></div>';
				@session_start();
				$_SESSION['msg']=$message;
					header('location:department.php');}					
					else{echo mysqli_error();}
					exit();
			}
					
}
if($_GET['action'] == 'delete_dep' && isset($_GET['id']) &&  $_GET['id'] != '')
	{
		
		$sql ='delete  from department where id = '.$_GET['id'];	
        $result =  $dbc->Query($sql);
			$message='<div class="alert alert-danger fade in">Record is successfully deleted.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
								@session_start();
								$_SESSION['msg']=$message;
			  header('location:department.php');
			  exit();
	}

	

	# Leave TYpe



if(isset($_POST['btntype']))
{
	
	//*************Add level******************//
	if(isset($_POST['type']) && isset($_POST['dis']) && $_GET['action'] != 'update')
	{	
		
			$sql ='insert into leavetype(leavetype,description)values("'.$_POST['type'].'","'.$_POST['dis'].'")';	
            $result =  $dbc->Query($sql);
		    if($result){
						$message='<div class="alert alert-success fade in">Department is successfully Added.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
				@session_start();
				$_SESSION['msg']=$message;
					header('location:leavetype.php');}					
					else{echo mysqli_error();}
					exit();	
						 header('location:leavetype.php');


			}
		
	
//*************Update level******************//
	if($_GET['action']=='update' && isset($_POST['hidden_id']) &&  $_POST['hidden_id'] != '')
	{
		$query = 'update leavetype set leavetype= "'.$_POST['type'].'",description= "'.$_POST['dis'].'" where id ='.$_POST['hidden_id'];

        $sql =  $dbc->Query($query);
			if($sql){
			   $message='<div class="alert alert-success fade in">Department is successfully updated.<button type="button" class="close" 
								data-dismiss="alert" aria-hidden="true">x</button></div>';
				@session_start();
				$_SESSION['msg']=$message;
					header('location:leavetype.php');}					
					else{echo mysqli_error();}
					exit();
			}
					
}

if($_GET['action'] == 'delete_dis' && isset($_GET['id']) &&  $_GET['id'] != '')
	{
		
		$sql ='delete  from leavetype where id = '.$_GET['id'];	
        $result =  $dbc->Query($sql);
			$message='<div class="alert alert-danger fade in">Record is successfully deleted.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
								@session_start();
								$_SESSION['msg']=$message;
			  header('location:leavetype.php');
			  exit();
	}



	# principal Laevs
	if (isset($_POST['btnapply'])) {
		
$leavetype=$_POST['leavetype'];
$fromdate=$_POST['fdate'];
$todate=$_POST['tdate'];
$dis=$_POST['dis'];
$id=$_SESSION['username'];

$sql="insert into principalleave (leavetype,fromdate,todate,discription,status,empid) values ('$leavetype','$fromdate','$todate','$dis','pending','$use')";
	 $result =  $dbc->Query($sql);

 $message='<div class="alert alert-success fade in">Leave Applied successfully.<button type="button" class="close" 
								data-dismiss="alert" aria-hidden="true">x</button></div>';
								@session_start();
								$_SESSION['msg']=$message;
			  header('location:principal_history.php');
			  exit();
}

if (isset($_POST['btn_hod'])) {

	$id=$_SESSION['username'];
echo $id;
$sql="select * from hodreg where userid='$id'";
	$result =  $dbc->Query($sql);
	$row = $result->fetch_assoc();
	$use=$row['id'];
	echo $use;

		
$leavetype=$_POST['leavetype'];
$fromdate=$_POST['fdate'];
$todate=$_POST['tdate'];
$dis=$_POST['dis'];
$id=$_SESSION['username'];

$sql="insert into hodleave (leavetype,fromdate,todate,discription,status,empid) values ('$leavetype','$fromdate','$todate','$dis','pending','$use')";
	 $result =  $dbc->Query($sql);

 $message='<div class="alert alert-success fade in">Leave Applied successfully.<button type="button" class="close" 
								data-dismiss="alert" aria-hidden="true">x</button></div>';
								@session_start();
								$_SESSION['msg']=$message;
			  header('location:hod_history.php');
			  exit();
}
      
if (isset($_POST['btn_faculty'])) {

	$id=$_SESSION['username'];
echo $id;
$sql="select * from empreg where userid='$id'";
	$result =  $dbc->Query($sql);
	$row = $result->fetch_assoc();
	$use=$row['id'];
	echo $use;
$leavetype=$_POST['leavetype'];
$fromdate=$_POST['fdate'];
$todate=$_POST['tdate'];
$dis=$_POST['dis'];
$dep=$_POST['depname'];
$que="select * from hodreg where department='$dep'";
$result =  $dbc->Query($que);
$row = $result->fetch_assoc();
$hodid=$row['id'];
	
$sql="insert into facultyleave (leavetype,fromdate,todate,discription,statushod,statusprincipal,empid,department,hodid) values ('$leavetype','$fromdate','$todate','$dis','pending','pending','$use','$dep','$hodid')";
	 $result =  $dbc->Query($sql);

	 if ($result) {
	 	$query="select facultyleave.id,empreg.firstname,empreg.lastname,empreg.email AS femail,empreg.id,facultyleave.hodid,hodreg.email AS hemail from facultyleave join empreg on facultyleave.empid=empreg.id join hodreg on facultyleave.hodid=hodreg.id where facultyleave.empid=".$_SESSION['id'];
			$exe=mysqli_query($conn,$query);
			$raw=mysqli_fetch_array($exe);
				$from=$raw['femail'];
				$fname=$raw['firstname'];
				$lname=$raw['lastname'];
				$name=$raw['firstname'];
				$to=$raw['hemail'];
				sendemailses($to,'New Request Faculty','New request from Faculty :- '.$fname.' '.$lname);
			 $message='<div class="alert alert-success fade in">Leave Applied successfully.<button type="button" class="close" 
											data-dismiss="alert" aria-hidden="true">x</button></div>';
											 $mess='<div class="alert alert-success fade in">Leave Applied successfully To:-.'.$to.'<button type="button" class="close" 
											data-dismiss="alert" aria-hidden="true">x</button></div>';
											@session_start();
											$_SESSION['msg']=$message;
											$_SESSION['m']=$mess;
						  header('location:faculty_history.php');
						  exit();
			}
}
  
if (isset($_POST['takeaction'])) {
        $id=$_POST['hide'];
        $action=$_POST['action'];
    $adminremark=$_POST['description'];
    date_default_timezone_set('Asia/Kolkata');
    $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
    $que="update facultyleave set statushod='$action',hodremark='$adminremark',hodremarkdate='$admremarkdate' where id='$id'";
    $exe=mysqli_query($conn,$que);
       $message='<div class="alert alert-success fade in">Action Taken successfully <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
        header('location:faculty_pending.php');
      }

if (isset($_POST['takeaction_faculty'])) {
        $id=$_POST['hide'];
        $action=$_POST['action'];
    $adminremark=$_POST['description'];
    date_default_timezone_set('Asia/Kolkata');
    $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
    $que="update facultyleave set statusprincipal='$action',principalremark='$adminremark',principalremarkdate='$admremarkdate' where id='$id'";
    $exe=mysqli_query($conn,$que);
       $message='<div class="alert alert-success fade in">Action Taken successfully <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
        header('location:faculty_pending_principal.php');
      }




#Student Registeration

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
	$que="select * from studentreg where userid='$user' ";
	$run=mysqli_query($conn,$que);
	if (mysqli_num_rows($run)>0) {
				echo '<script type="text/javascript"> alert("UserName aleredy Exist")</script>';
	}
	else
	{
		
		
	$query="insert into studentreg (firstname,lastname,dob,gender,email,department,address,mobile,userid,password) values ('$fname','$lname','$dob','$gender','$email','$department','$add','$no','$user','$password')";
	$execute=mysqli_query($conn,$query);


	if (!$execute) {
	echo mysqli_error($conn);
			# code...
	}
	else{
		 $message='<div class="alert alert-success fade in">Action Taken successfully <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
               @session_start();
        $_SESSION['msg']=$message;
        header('location:index.php');
	}
	
}
}
}



#Student apply

if (isset($_POST['btn_student'])) {

	$id=$_SESSION['username'];
echo $id;
$sql="select * from studentreg where userid='$id'";
	$result =  $dbc->Query($sql);
	$row = $result->fetch_assoc();
	$use=$row['id'];
	echo $use;
$leavetype=$_POST['leavetype'];
$fromdate=$_POST['fdate'];
$todate=$_POST['tdate'];
$dis=$_POST['dis'];
$dep=$_POST['depname'];
$men=$_POST['mname'];
$que="select * from hodreg where department='$dep'";
$result =  $dbc->Query($que);
$row = $result->fetch_assoc();
$hodid=$row['id'];
$q="select * from empreg where firstname='$men'";
$re=  $dbc->Query($q);
$row = $re->fetch_assoc();
$facultyid=$row['id'];

$sql="insert into studentleave (leavetype,fromdate,todate,discription,statusfaculty,statushod,empid,department,mentorname,mentorid,hodid) values ('$leavetype','$fromdate','$todate','$dis','pending','pending','$use','$dep','$men','$facultyid','$hodid')";
	 $result =  $dbc->Query($sql);

 if ($result) {
	 	$query="select studentleave.id,studentreg.firstname,studentreg.lastname,studentreg.email AS femail,studentreg.id,studentleave.mentorid,empreg.email AS hemail from studentleave join studentreg on studentleave.empid=studentreg.id join empreg on studentleave.mentorid=empreg.id where studentleave.mentorid='$facultyid' AND studentleave.empid=".$_SESSION['id'];
$exe=mysqli_query($conn,$query);
$raw=mysqli_fetch_array($exe);
	$from=$raw['femail'];
	$name=$raw['firstname'];	
	$to=$raw['hemail'];
	$fname=$raw['firstname'];
	$lname=$raw['lastname'];
	sendemailses($to,'New Request Faculty','New request from Faculty :- '.$fname.' '.$lname);
 $message='<div class="alert alert-success fade in">Leave Applied successfully.<button type="button" class="close" 
								data-dismiss="alert" aria-hidden="true">x</button></div>';
								 $mess='<div class="alert alert-success fade in">Leave Applied successfully To:-.'.$to.'<button type="button" class="close" 
								data-dismiss="alert" aria-hidden="true">x</button></div>';
								@session_start();
								$_SESSION['msg']=$message;
								$_SESSION['m']=$mess;
			  header('location:student_history.php');
			  exit();
			}
}




if (isset($_POST['takeactionfaculty_student'])) {
        $id=$_POST['hide'];
        $action=$_POST['action'];
    $adminremark=$_POST['description'];
    date_default_timezone_set('Asia/Kolkata');
    $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
    $que="update studentleave set statusfaculty='$action',facultyremark='$adminremark',facultyremarkdate='$admremarkdate' where id='$id'";
    $exe=mysqli_query($conn,$que);
       $message='<div class="alert alert-success fade in">Action Taken successfully <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
        header('location:student_pending.php');
      }

if (isset($_POST['takeactionhod_student'])) {
        $id=$_POST['hide'];
        $action=$_POST['action'];
    $adminremark=$_POST['description'];
    date_default_timezone_set('Asia/Kolkata');
    $admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
    $que="update studentleave set statushod='$action',hodremark='$adminremark',hodremarkdate='$admremarkdate' where id='$id'";
    $exe=mysqli_query($conn,$que);
       $message='<div class="alert alert-success fade in">Action Taken successfully <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
        header('location:student_pending_hod.php');
      }


if (isset($_POST['change_studentpassword'])) {
	$id=$_POST['hidden_id'];
	$cpass=md5($_POST['cpass']);
	$newpass=md5($_POST['newpass']);
    $confirmpass=md5($_POST['confirmpass']);

    $query ="select password from studentreg where id='$id' AND password='$cpass'";
		$exe=mysqli_query($conn,$query);
		if (mysqli_num_rows($exe)>0) {
			if ($newpass==$confirmpass) {

				$q="update studentreg set password='$newpass' where id='$id'";
				$e=mysqli_query($conn,$q);
				 $message='<div class="alert alert-success fade in">Password Changed successfully <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
        header('location:index.php');
			}
			elseif ($newpass!=$confirmpass){
				$message='<div class="alert alert-danger fade in">Password Does not Match.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
				
				 header('location:changepassword_student.php');
			}
		}

		else{
			$message='<div class="alert alert-danger fade in">Current Password Is Wrong.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
			
			 header('location:changepassword_student.php');
		}

}


        if (isset($_POST['student_update'])) {

            $id=$_POST['hidden_id'];
        $fn=$_POST['fname'];
        $ln=$_POST['lname'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $dept=$_POST['dept'];
        $address=$_POST['address'];
        $mono=$_POST['mono'];
        $que="update studentreg set firstname='$fn',lastname='$ln',dob='$dob',gender='$gender',email='$email',department='$dept',address='$address',mobile='$mono' where id='$id'";
        $exe=mysqli_query($conn,$que);
        if ($exe) {
            
        $msg='<div class="alert alert-success fade in">Action Taken successfully <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
                 @session_start();
        $_SESSION['msg']=$meg;
                header("location:student_das.php");
            }
           
        }





        #Faculty Update

        if (isset($_POST['faculty_update'])) {

            $id=$_POST['hidden_id'];
        $fn=$_POST['fname'];
        $ln=$_POST['lname'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $dept=$_POST['dept'];
        $address=$_POST['address'];
        $mono=$_POST['mono'];
        $que="update empreg set firstname='$fn',lastname='$ln',dob='$dob',gender='$gender',email='$email',department='$dept',address='$address',mobile='$mono' where id='$id'";
        $exe=mysqli_query($conn,$que);
        if ($exe) {
            
        $msg='<div class="alert alert-success fade in">Action Taken successfully <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
                 @session_start();
        $_SESSION['msg']=$meg;
                header("location:faculty_das.php");
            }
           
        }


        if (isset($_POST['change_facultypassword'])) {
	$id=$_POST['hidden_id'];
	$cpass=md5($_POST['cpass']);
	$newpass=md5($_POST['newpass']);
    $confirmpass=md5($_POST['confirmpass']);

    $query ="select password from empreg where id='$id' AND password='$cpass'";
		$exe=mysqli_query($conn,$query);
		if (mysqli_num_rows($exe)>0) {
			if ($newpass==$confirmpass) {

				$q="update empreg set password='$newpass' where id='$id'";
				$e=mysqli_query($conn,$q);
				 $message='<div class="alert alert-success fade in">Action Taken successfully <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
        header('location:index.php');
			}
			elseif ($newpass!=$confirmpass){
				$message='<div class="alert alert-danger fade in">Password Does not Match.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
				
				 header('location:changepassword_faculty.php');
			}
}
		else{
			$message='<div class="alert alert-danger fade in">Current Password Is Wrong.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
			
			 header('location:changepassword_faculty.php');
			}

}

        #HOD Update

if (isset($_POST['hod_update'])) {

            $id=$_POST['hidden_id'];
        $fn=$_POST['fname'];
        $ln=$_POST['lname'];
        $dob=$_POST['dob'];
        $gender=$_POST['gender'];
        $email=$_POST['email'];
        $dept=$_POST['dept'];
        $address=$_POST['address'];
        $mono=$_POST['mono'];
        $que="update hodreg set firstname='$fn',lastname='$ln',dob='$dob',gender='$gender',email='$email',department='$dept',address='$address',mono='$mono' where id='$id'";
        $exe=mysqli_query($conn,$que);
        if ($exe) {
            
        $msg='<div class="alert alert-success fade in">Action Taken successfully <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
                 @session_start();
        $_SESSION['msg']=$meg;
                header("location:hod_history.php");
            }
           
        }
         if (isset($_POST['change_hodpassword'])) {
	$id=$_POST['hidden_id'];
	$cpass=md5($_POST['cpass']);
	$newpass=md5($_POST['newpass']);
    $confirmpass=md5($_POST['confirmpass']);

    $query ="select password from hodreg where id='$id' AND password='$cpass'";
		$exe=mysqli_query($conn,$query);
		if (mysqli_num_rows($exe)>0) {
			if ($newpass==$confirmpass) {

				$q="update hodreg set password='$newpass' where id='$id'";
				$e=mysqli_query($conn,$q);
				 $message='<div class="alert alert-success fade in">Action Taken successfully <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
        header('location:index.php');
			}
			elseif ($newpass!=$confirmpass){
				$message='<div class="alert alert-danger fade in">Password Does not Match.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
				
				 header('location:changepassword_hod.php');
			}
}
		else{
			$message='<div class="alert alert-danger fade in">Current Password Is Wrong.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
			
			 header('location:changepassword_hod.php');
			}

}




#changepassword Principal

 if (isset($_POST['change_principalpassword'])) {
	$id=$_POST['hidden_id'];
	$cpass=md5($_POST['cpass']);
	$newpass=md5($_POST['newpass']);
    $confirmpass=md5($_POST['confirmpass']);

    $query ="select password from principalreg where id='$id' AND password='$cpass'";
		$exe=mysqli_query($conn,$query);
		if (mysqli_num_rows($exe)>0) {
			if ($newpass==$confirmpass) {

				$q="update principalreg set password='$newpass' where id='$id'";
				$e=mysqli_query($conn,$q);
				 $message='<div class="alert alert-success fade in">Action Taken successfully <button type="button" class="close" 
                data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
        header('location:index.php');
			}
			elseif ($newpass!=$confirmpass){
				$message='<div class="alert alert-danger fade in">Password Does not Match.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
				
				 header('location:changepassword_principal.php');
			}
}
		else{
			$message='<div class="alert alert-danger fade in">Current Password Is Wrong.<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button></div>';
        @session_start();
        $_SESSION['msg']=$message;
			
			 header('location:changepassword_principal.php');
			}

}

        

     
  
?>



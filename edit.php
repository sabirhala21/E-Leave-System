<?php

require 'config.php';


	if (isset($_POST['hid'])) 
	{
	$id=$_POST['hid'];
	$que="select * from leavetype where id='$id'";
	$exe=mysqli_query($conn,$que);
	$raw=mysqli_fetch_array($exe);
}

if (isset($_REQUEST['nupdate'])) {

		$nid=$_POST['hidd'];
		$ntype=$_POST['type'];
		$ndes=$_POST['des'];
		$que="update leavetype set leavetype='$ntype',description='$ndes' where id='$nid'";
 		$exe=mysqli_query($conn,$que);
 		if (!$exe) {

 						echo "Cant Update";
 			 		}
 		else{
 			header("location:manageleavetype.php");
 		}
 		
		
 			

	}


	
?>

<form method="POST">
	<input type="hidden" name="hidd" value="<?php echo $raw['id']; ?>">
	<input type="text" name="type" value="<?php echo $raw['leavetype']; ?>">
	<input type="text" name="des" value="<?php echo $raw['description']; ?>">
	<input type="submit" name="nupdate" value="UPDATE">
 	
</form>
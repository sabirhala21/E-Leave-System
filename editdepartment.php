<?php
require 'config.php';
if (isset($_POST['hid'])) {
	$id=$_POST['hid'];
	$que="select * from department where id='$id'";
	$exe=mysqli_query($conn,$que);
	$raw=mysqli_fetch_array($exe);
}
if (isset($_POST['update'])) {
	$nid=$_POST['hide'];
	$ndepid=$_POST['ndepid'];
	$ndepname=$_POST['ndepname'];
	$nsn=$_POST['nsn'];
	$que="update department set depid='$ndepid',depname='$ndepname',shortname='nsn' where id='$nid'";
	if (!$exe) {

 						echo "Cant Update";
 			 		}
 		else{
 			header("location:managedepartment.php");
 		}
}


?>

<form method="POST">
<input type="hidden" name="hide" value="<?php echo $raw['id'] ?>">
<input type="text" name="ndepid" value="<?php echo $raw['depid'] ?>">
<input type="text" name="ndepname" value="<?php echo $raw['depname'] ?>">
<input type="text" name="nsn" value="<?php echo $raw['shortname'] ?>">
<input type="submit" name="update" value="UPDATE"> 
</form>
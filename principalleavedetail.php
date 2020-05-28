<?php
session_start();
require 'config.php';
?>
<?php

if (isset($_POST['hid'])) 
	{
	$id=$_POST['hid'];
	$query="select principalleave.id,principalreg.userid,principalleave.leavetype,principalleave.fromdate,principalleave.todate,principalleave.discription,principalleave.applyeddate,principalleave.adminremark,principalleave.adminremarkdate,principalleave.status from principalleave join principalreg on principalleave.empid=principalreg.id where principalleave.id='$id'";
		$exe=mysqli_query($conn,$query);
		$raw=mysqli_fetch_array($exe);
}

if (isset($_POST['takeaction'])) {
		$id=$_POST['hidd'];
		$action=$_POST['action'];
		$adminremark=$_POST['adminremark'];
		date_default_timezone_set('Asia/Kolkata');
		$admremarkdate=date('Y-m-d G:i:s ', strtotime("now"));
		$que="update principalleave set status='$action',adminremark='$adminremark',adminremarkdate='$admremarkdate' where id='$id'";
 		$exe=mysqli_query($conn,$que);
 		if (!$exe) {

 						echo "Cant Update";
 			 		}
 		else{
 			header("location:pendingleaves.php");
 		}
	}

?>




<!DOCTYPE html>
<html>
<head>
	<title>Admin Action</title>
</head>
<body>
<table>	
<tr>
<form method="POST">
<input type="hidden" name="hidd" value="<?php echo $raw['id']; ?>">
<tr><td><input type="text" name="empname" value="<?php echo $raw['userid'] ?>"></td></tr>
<tr><td><input type="text" name="type" value="<?php echo $raw['leavetype'] ?>"></td></tr>
<tr><td>From Date:<input type="text" name="fromdate" value="<?php echo $raw['fromdate'] ?>"></td><td>To Date :<input type="text" name="todate" value="<?php echo $raw['todate'] ?>"></td></tr>
<tr><td><input type="text" name="discription" value="<?php echo $raw['discription'] ?>"></td></tr>
<tr><td><input type="text" name="applyeddate" value="<?php echo $raw['applyeddate'] ?>"></td></tr>
<tr><td><input type="text" name="status" value="<?php echo $raw['status'] ?>"></td></tr>
<tr>
<td> Choose Your Option </td>
<td><select name="action">	
		<option value="Select">Select</option>
		<option value="Approved">Approved</option>
		<option value="Rejectted">Rejectted</option>
</select></td>
</tr>

<tr><td>Admin Remark</td>
	<td><textarea rows="10" cols="50" required name="adminremark"></textarea></td>	
</tr>
<tr><td><input type="text" name="adminremarkdate" value="<?php echo $raw['adminremarkdate'] ?>"></td></tr>
<tr><td><input type="submit" name="takeaction" value="Take Action"></td></tr>

</form>



</table>



</body>
</html>


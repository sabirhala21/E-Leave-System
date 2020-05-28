<?php  
session_start();
require 'config.php'

?>

<?php
$id=$_SESSION['username'];
echo $id;
$que="select * from principalreg where userid='$id'";
	$exe=mysqli_query($conn,$que);
	$raw=mysqli_fetch_array($exe);
	$use=$raw['id'];
	echo $use;

if(isset($_POST["apply"])) {
	
$leavetype=$_POST['leavetype'];
$fromdate=$_POST['fromdate'];
$todate=$_POST['todate'];
$dis=$_POST['discription'];
$id=$_SESSION['username'];

$query="insert into principalleave (leavetype,fromdate,todate,discription,status,empid) values ('$leavetype','$fromdate','$todate','$dis','pending','$use')";
	$execute=mysqli_query($conn,$query);


	if (!$execute) {
	echo mysqli_error($conn);
			# code...
	}
	else{
		echo '<script type="text/javascript"> alert("Leave Applied")</script>';
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Apply For Leave</title>
</head>
<body>

<table>
<tr>
<form method="POST">
	<tr><td>Leave Type</td><td><select name="leavetype" required>
	<?php

		$conn=mysqli_connect('localhost','root','','eleavesystem');
		$fetch=mysqli_query($conn,"select * from leavetype");
		while ($raws=mysqli_fetch_array($fetch)) {

			echo "<option>".$raws["description"]."</option>";
		}
	?>
</select></td></tr>

<tr><td>From Date</td>
	<td><input type="date" name="fromdate" placeholder="dd/mm/yyyy" required></td>
</tr>
<tr>
<td>To Date </td>
<td><input type="date" name="todate" placeholder="dd/mm/yyyy" required></td>
</tr>

<tr>
<td>Discription </td>
<td><textarea rows="10" cols="50" required name="discription"></textarea></td>
</tr>

<tr><td><input type="submit" name="apply" value="APPLY"></td></tr>
</form>
</table>


</body>
</html>
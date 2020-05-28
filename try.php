<?php 
require 'config.php';
if (isset($_POST['add'])) {
	# code...
	$type=$_POST['ltype'];
	$des=$_POST['ldes'];
	$que="insert into leavetype (leavetype,description) values ('$type','$des')";
	$exe=mysqli_query($conn,$que);
	if ($exe) {
		echo '<script type="text/javascript">alert("Leave Type Added")</script>';
		# code...
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Department</title>


</head>
<body>

<form method="POST">
	

<label>Leave Type</label>
<input type="text" name="ltype">
<label>Description</label>
<input type="text" name="ldes">
<input type="submit" name="add" value="ADD">

</form>

</body>
</html>
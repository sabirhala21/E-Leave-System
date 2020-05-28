<?php

require 'config.php';

$que="select * from department";
$exe=mysqli_query($conn,$que);
?>


<!DOCTYPE html>
<html>
<head>
	<title>Manage Department</title>
</head>
<body>
<style type="text/css">
	th,td,tr{
		text-align: center;
	}

</style>
</body>
</html>

<?php
if (isset($_POST['del'])) {
	$id=$_POST['hid'];
	$que="delete from department where id='$id'";
	$res=mysqli_query($conn,$que);
	if ($res) {
		echo '<script type="text/javascript"> alert("Department Deleted")</script>';
	}
	$que="select * from department";
$exe=mysqli_query($conn,$que);
}


?>



<table border='1'>
<tr>
<th>DEPARTMENT ID</th><th>DEPARTMENT NAME</th><th>DEPARTMENT SHORTNAME</th><th colspan="2">EDIT</th></tr>
<?php

if (mysqli_num_rows($exe)>0) {
	while ($raw=mysqli_fetch_array($exe)) {
		$id=$raw['id'];
		$depid=$raw['depid'];
		$depname=$raw['depname'];
		$sn=$raw['shortname'];
?>

<tr>
 <form action="editdep.php" method="POST">
 
 	<td><?php echo $depid; ?></td>
 	<td><?php echo $depname; ?></td>
 	<td><?php echo $sn; ?></td>
 	<input type="hidden" name="hid" value="<?php echo $id; ?>">
 	<td><input type="submit" name="update" value="UPDATE"></td>
 	</form>

 	 <form action="" method="POST">
 	<input type="hidden" name="hid" value="<?php echo $id; ?>">
 	<td><input type="submit" name="del" value="DELETE"></td>
 	</form></tr>



<?php
	}
}
?>













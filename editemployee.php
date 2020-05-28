<?php
require 'config.php';
session_start();
$uname=$_SESSION['username'];
$que="select * from empreg where userid='$uname'";
	$exe=mysqli_query($conn,$que);
	$raw=mysqli_fetch_array($exe);

	if (isset($_POST['update'])) {
		$id=$_POST['hidd'];
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
 		if (!$exe) {

 						echo '<script type="text/javascript"> alert("Cant Update")</script>';
 			 		}
 		else{
 			header("location:editemployee.php");
 		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Employee</title>
</head>
<body>
<br>
<br>
<table border="0">
<tr>
<form method="POST"	>
<td>First Name</td><td> <input type="text" name="fname" value="<?php echo $raw['firstname'] ?>"></td>
</tr>
<tr>
<td>Last Name</td><td> <input type="text" name="lname" value="<?php echo $raw['lastname'] ?>"></td>
</tr>
<tr>
<td>DOB</td><td> <input type="date" name="dob" value="<?php echo $raw['dob'] ?>"></td>
</tr>
<tr>
<td>Gender</td><td><select name="gender" required>

	<option value="<?php echo $raw['gender']; ?>"><?php echo $raw['gender']; ?></option>
	<option value="Male">Male</option>
	<option value="Female">Female</option>
</select>
</tr>
<tr>
<td>Email</td><td> <input type="text" name="email" value="<?php echo $raw['email'] ?>"></td>
</tr>
<tr>
<td>Department</td><td><select name="dept" required>
	<option value="<?php echo $raw['department']; ?>"><?php echo $raw['department']; ?></option>
	<?php

		$conn=mysqli_connect('localhost','root','','eleavesystem');
		$fetch=mysqli_query($conn,"select * from department");
		while ($raws=mysqli_fetch_array($fetch)) {

			echo "<option>".$raws["depname"]."</option>";
		}
	?>
</select>
</tr>
<tr>
<td>Address</td><td> <input type="text" name="address" value="<?php echo $raw['address'] ?>"></td>
</tr>

<tr>
<td>MoNo</td><td> <input type="text" name="mono"  pattern ="[0-9]+" maxlength="10" value="<?php echo $raw['mobile'] ?>" ></td>
</tr>

<tr><td><input type="hidden" name="hidd" value="<?php echo $raw['id']; ?>"></td></tr>

<tr><td><lable> Registered On :-</lable></td><td><?php echo $raw['regdate']; ?></td></tr>
<tr><td></td><td><input type="submit" name="update" value="UPDATE"></td></tr>

</body>
</html>

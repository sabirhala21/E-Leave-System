<?php
$conn=mysqli_connect('localhost','root','','eleavesystem');
if(isset($_POST["submit"])) 
{
	$user=$_POST['user'];
	$password=md5($_POST['pass']);

	if ($user!="") {
	$que="select * from principalreg where userid='$user' ";
	$run=mysqli_query($conn,$que);
	if (mysqli_num_rows($run)>1) {
				echo '<script type="text/javascript"> alert("UserName aleredy Exist")</script>';
	}
	else
	{
		
		
	$query="insert into principalreg (userid,password) values ('$user','$password')";
	$execute=mysqli_query($conn,$query);


	if (!$execute) {
	echo mysqli_error($conn);
			# code...
	}
	else{
		echo '<script type="text/javascript"> alert("Inserted")</script>';
		header("location:index.php");
	}
	
}
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registeration</title>
</head>
<body>
<fieldset style="width:30%"><legend>Registration Form</legend>
<table border="0">
<tr>
<form method="POST">
<tr>
<td>UserName</td><td> <input type="text" name="user" required></td>
</tr>
<tr>
<td>Password</td><td> <input type="password" name="pass" required></td>
</tr>
<tr>
<td><input id="button" type="submit" name="submit" value="Sign-Up"></td>
</tr>
</form>
</table>
</fieldset>
</body>
</html>

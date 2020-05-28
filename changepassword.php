<?php
session_start();
require 'config.php';
?>


<?php
	
	if (isset($_POST['change'])) {

		$id=$_SESSION['username'];
		$cpass=md5($_POST['cpass']);
		$npass=md5($_POST['npass']);
		$rnpass=md5($_POST['rnpass']);

		$query ="select password from principalreg where userid='$id' AND password='$cpass'";
		$exe=mysqli_query($conn,$query);
		if (mysqli_num_rows($exe)>0) {
			if ($npass==$rnpass) {

				$q="update principalreg set password='$npass' where userid='$id'";
				$e=mysqli_query($conn,$q);
				echo "Password Changed";

			}
			else{
				echo "Password Does Not Match";
			}
		}

		else{
			echo "Current Password Is Wrong";
		}


	}

?>
<table border="1" align="center">
<tr>
	<form method="POST">
		<tr><td>Currunt Password</td><td><input type="password" name="cpass" required></td></tr>

		<tr><td>New Password</td><td><input type="password" name="npass" required></td></tr>

		<tr><td>Re-enter Password</td><td><input type="password" name="rnpass" required></td></tr>

		<tr><td><input type="submit" name="change" value="CHANGE"></td></tr>

	</form>

</tr>



</table>
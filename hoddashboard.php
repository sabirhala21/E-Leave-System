<!DOCTYPE html>
<html>
<head>
	<title>HOD DashBoard</title>
	<style type="text/css">
		ul li{
			opacity: .8;
			margin-bottom: 4px;
		}

		ul li ul li{
			display: none;
		}
		
		ul li:hover ul li{
			display: block;
		}
		


	</style>
</head>
<body>
<?php
 
	session_start();
	require 'config.php';
	echo "<h1>".$_SESSION['username']."</h1>";

?>

<aside style="background-color:gray; width:25%">
<ul type="none">

	<li><a>Profile</a></li>
	<li>My Leaves
		<ul type="none">
				<li><a href="hodapplyleave.php">Apply Leave</a></li>
				<li><a href="hodleavehistory.php">Leave History</a></li>			
		</ul>
	</li>
	<li>Leave Management
		<ul type="none">
				<li><a>All Levae</a></li>
				<li>Approved Leaves</li>
				<li>Rejected Leaves</li>
				<li><a>Pending Leaves</a></li>			
		</ul>
	</li>
	<li>Change Password</li>
	<li><a href="index.php"> Log Out</a></li>
</ul>




</aside>

</body>
</html>
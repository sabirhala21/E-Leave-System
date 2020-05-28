<?php
session_start();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashbord</title>
</head>

<frameset cols="20%, 80%">
	
<frame src="admindashboard.php" ></frame>
<frame src="department.php" name="here"></frame>

<body>
<h1><?php echo $_SESSION['username']; ?></h1>

<ul type="none">
	<li>Edit Profile</li>
	<li>Apply For Leave</li>
	<li>Leave Management
			<ul type="none">
				<li><a>All Leaves</a></li>
				<li><a>Pending Leave</a></li>	
				<li><a>Approved Leave</a></li>	
				<li><a>Rejected Leave</a></li>			
			</ul>
	</li>
	<li>Sign Out</li>
</ul>
</body>
</frameset>

</html>
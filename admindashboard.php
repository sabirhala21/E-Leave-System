<?php

session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Dash Board</title>
	<style type="text/css">
		ul li{
			opacity: .8;
			margin-bottom: 2px;
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
<h1><?php echo $_SESSION['username']; ?></h1>
<ul type="none">
	<li>Manage Deaprtment

		<ul>
		<li><a href="department.php" target="here" style="text-decoration:none; color:black;">Add Department</a></li>
		<li><a href="managedepartment.php" target="here" style="text-decoration:none; color:black;">Edit Department</li>
		</ul>
	</li>
	<li>Manage Leave Type
		<ul>
		<li><a href="try.php" target="here" style="text-decoration:none; color:black;">Add Leave Type</a></li>
		<li><a href="manageleavetype.php" target="here" style="text-decoration:none; color:black;">Edit Leave Type</li>
		</ul>
	</li>

	<li>Leave Management
			<ul type="none">
				<li><a>All Leaves</a></li>
				<li><a href="pendingleaves.php" target="here">Pending Leave</a></li>	
				<li><a>Approved Leave</a></li>	
				<li><a>Rejected Leave</a></li>			
			</ul>
	</li>
</ul>



</body>
</html>
<?php
session_start();
require 'config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>ABC</title>
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

		iframe{
			margin-left: 20%;
			width: 50%;
			height: 100%;
			margin-top: 10%
		}
		.rgt{
			margin-top: 10%;
		}
		


	</style>
</head>
<body>
<iframe>
<ul type="none">

	<li><a href="editemployee.php" target="here">Profile</a></li>
	<li>My Leaves
		<ul type="none">
				<li><a href="applyleave.php" target="here">Apply Leave</a></li>
				<li><a href="principalleavehistory.php" target="here">Leave History</a></li>			
		</ul>
	</li>
	<li>Leave Management
		<ul type="none">
				<li><a>All Levae</a></li>
				<li>Approved Leaves</li>
				<li><a href="principalrejectedleaves.php" target="here">Rejected Leaves</a>
				</li>
				<li><a href="pendingleaves.php" target="here"> Pending Leaves</a></li>			
		</ul>
	</li>
	<li><a href="changepassword.php" target="here">Change Password</li>
	<li><a href="index.php"> Log Out</a></li>

	
</ul>
</iframe>

</body>
</html>

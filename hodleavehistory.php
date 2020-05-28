<?php

session_start();
require 'config.php';
?>

<?php
$id=$_SESSION['username'];
echo $id;
$que="select * from hodreg where userid='$id'";
	$exe=mysqli_query($conn,$que);
	$raw=mysqli_fetch_array($exe);
	$use=$raw['id'];
	echo $use;
$query="select * from hodleave where empid='$use'";
$exe=mysqli_query($conn,$query);

?>
<table border="1">
<tr><th>#</th><th>Leave Type</th><th>From Date</th><th>To date</th><th>Discription</th><th>Posting Date</th><th>Principal Remark</th><th>Status</th></tr>

<?php
if (mysqli_num_rows($exe)>0) {
	
	while ($raw=mysqli_fetch_array($exe)) {

		$id=$raw['id'];
		$leavetype=$raw['leavetype'];
		$fromdate=$raw['fromdate'];
		$todate=$raw['todate'];
		$discription=$raw['discription'];
		$applyeddate=$raw['applyeddate'];
		$adminremark=$raw['principalremark'];
		$status=$raw['status'];

?>
<tr><td><?php echo $id; ?></td>
	<td><?php echo $leavetype; ?></td>
	<td><?php echo $fromdate; ?></td>
	<td><?php echo $todate; ?></td>
	<td><?php echo $discription; ?></td>
	<td><?php echo $applyeddate; ?></td>
	<td><?php echo $adminremark; ?></td>
	<td><?php echo $status; ?></td>
</tr>
<?php	
	}
}
?>
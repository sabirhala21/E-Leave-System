<?php
session_start();
require 'config.php';
?>



<?php

$query="select principalleave.id,principalreg.userid,principalleave.leavetype,principalleave.applyeddate,principalleave.status from principalleave join principalreg on principalleave.empid=principalreg.id where principalleave.status='pending'";
$exe=mysqli_query($conn,$query);

?>



<table border='1' text-alignment='center' style="margin-top:40px;">
		<tr><th>ID<th>Empoyee Name</th><th>Leave Type</th><th>Posting Date</th><th>Staus</th><th>Action</th></tr>

<?php
if (mysqli_num_rows($exe)>0) {
	
	while ($raw=mysqli_fetch_array($exe)) {
		
		$id=$raw['id'];
		$userid=$raw['userid'];
		$type=$raw['leavetype'];
		$date=$raw['applyeddate'];
		$status=$raw['status'];

?>
<tr>
<form method="POST" action="principalleavedetail.php">
<td><?php echo $id; ?></td>
<td><?php echo $userid; ?></td>
<td><?php echo $type; ?></td>
<td><?php echo $date; ?></td>
<td><?php echo $status; ?></td>
<input type="hidden" name="hid" value="<?php echo $id; ?>">
<td><input type="submit" name="approve" value="Take Action"></td>
</form>
</tr>

<?php


	}
}


?>







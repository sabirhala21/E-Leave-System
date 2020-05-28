<?php

require 'config.php';

$que="select * from leavetype";
$exe=mysqli_query($conn,$que);

?>

 
 
 

 	<?php

 		if (isset($_POST['del'])) {
 			$id=$_POST['hid'];
 			 $sql="delete from leavetype where id='$id'";
 			$res=mysqli_query($conn,$sql) or die("Cant Delete".mysql_error());
 			$que="select * from leavetype";
			$exe=mysqli_query($conn,$que);
 			# code...
 		}

 	?>






<table border='1' text-alignment='center' style="margin-top:40px;">
		<tr><th>Leave Type</th><th>Description</th><th>Creation Date</th><th colspan="2">Edit</th></tr>

 		
<?php
if (mysqli_num_rows($exe)>0) {

	while($raw=mysqli_fetch_array($exe)){
		$id=$raw['id'];
		$type=$raw['leavetype'];
		$des=$raw['description'];
		$time=$raw['creationdate'];
	 ?>

<tr>
 <form action="edit.php" method="POST">
 
 	<td><?php echo $type; ?></td>
 	<td><?php echo $des; ?></td>
 	<td><?php echo $time; ?></td>
 	<input type="hidden" name="hid" value="<?php echo $id; ?>">
 	<input type="hidden" name="htype" value="<?php echo $type; ?>">
 	<input type="hidden" name="hdes" value="<?php echo $des; ?>">
 	<td>
 	<input type="submit" name="update" value="UPDATE"></td>
 	</form>

 	 <form action="" method="POST">
 	<input type="hidden" name="hid" value="<?php echo $id; ?>">
 	<td><input type="submit" name="del" value="DELETE"></td>
 	</form></tr>

 	<?php

 }
}
 ?>

		


	

<?php
session_start();
	
	$msg="";
	if (isset($_POST["submit"]))
	{
		$target="images/".basename($_FILES['image']['name']);
		$db=mysqli_connect("localhost","root","","eleavesystem");
		$image=$_FILES['image']['name'];
		$txt=$_POST['image_text'];
		$sql="insert into photo(image,text) values('$image','$txt')";
		mysqli_query($db,$sql);
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
		{
			echo "Success";
		}
		else
		{
			$msg="Failed";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Image</title>
</head>
<body>
<?php
session_start();
$db=mysqli_connect("localhost","root","","eleavesystem");
$que="select * from photo";
$result = mysqli_query($db,$que);
 while ($row = mysqli_fetch_array($result)) {
    	echo $_SESSION['username'];
      	echo "<img src='images/".$row['image']."'>";
      	echo "<p>".$row['text']."</p>";

      }

?>
	<form action="" method="POST" enctype="multipart/form-data">
		<input type="file" name="image">
		<textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."></textarea>
		<input type="submit" name="submit">
			</form>
</body>
</html>
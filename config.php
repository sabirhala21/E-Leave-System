<?php

$conn=mysqli_connect('localhost','root','','eleavesystem');

if($conn)
{
	echo "";
}
else
{
	echo "";
}

if (mysqli_select_db($conn,'eleavesystem'))
{ 	 
	echo "";
}
else
{
		die('Can\'t use '. mysql_error());
}

?>
<?php

$conn=mysqli_connect('localhost','root','','eleavesystem');
if ($conn) {
	echo "OK";
}include_once("eLeaveSystem/maillib/send_email.php");


$query="select * from empreg where id=11";
$exe=mysqli_query($conn,$query);
$raw=mysqli_fetch_array($exe);
$facultyid=$raw['id'];
$email=$raw['email'];
//echo $email;


  $query="select studentleave.id,studentreg.firstname,studentreg.email AS femail,studentreg.id,studentleave.mentorid,empreg.email AS hemail from studentleave join studentreg on studentleave.empid=studentreg.id join empreg on studentleave.mentorid=empreg.id where studentleave.empid=2 AND studentleave.mentorid='$facultyid'";
$exe=mysqli_query($conn,$query);
$raw=mysqli_fetch_array($exe);
  $from=$raw['femail'];
  $name=$raw['firstname'];
  $to=$raw['hemail'];
  sendemailses($to,'testing','Testing');
/*
  $que="select empreg.firstname,empreg.email from empreg join studentleave  on studentleave.mentorid=empreg.id where studentleave.empid=2";
$exe=mysqli_query($conn,$que);
$raw=mysqli_fetch_array($exe);
echo $raw['firstname'];
echo $raw['email'];
*/
?>
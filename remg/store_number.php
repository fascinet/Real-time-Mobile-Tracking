<?php
function phpAlert($msg)
{
	echo $msg;
}
$mobile=$_POST["mobile_no"];
$password=$_POST["password"];
$user="mohit";
$pass="Singh@123";
$database="mobile_tracking"
session_start();
$connect=mysqli_connect('localhost','root',$user,$pass);
mysqli_select_db($connect,$database);
$tablename='otp_msg';
$q="select * from ".$tablename."where Mobile='$mobile'";
$chec=mysqli_query($connect,$q);
$check=mysqli_num_rows($chec);
if($check)
{
	//go to our website;
	phpAlert('Already Printed');
}
else
{
	//go to login page+ alert not registered;
}
?>

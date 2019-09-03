<?php
function phpAlert($msg)
{
  echo '<script type="text/javascript">window.alert("'.$msg.'");window.location.href = "/~sajal/reg1.php";</script>';
}
$mobile=$_POST["mobile_no"];
$password=$_POST["password"];
$user="btech2017";
$pass="btech2017";
$database="btech2017"
session_start();
$connect=mysqli_connect('localhost',$user,$pass);
mysqli_select_db($connect,$database);
$tablename='moble_track';
$q="select * from ".$tablename."where mobile_no.='$mobile' and Password='$password'";
$chec=mysqli_query($connect,$q);
$check=mysqli_num_rows($chec);
if(!$check)
{
        phpAlert("PASSWORD OR NUMBER IS INVALID!!");
}
else{

}
?>


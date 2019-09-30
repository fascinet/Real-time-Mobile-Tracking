<?php
function phpAlert($msg,$link)
{
  echo '<script type="text/javascript">window.alert("'.$msg.'");window.location.href = "'.$link.'";</script>';
}
$mobile=$_POST["mobile_no"];
$name=$_POST["name"];
$number=rand(100000,999999);
/*
$url="curl \"https://www.fast2sms.com/dev/bulk?authorization=XVOnCYKz5HIgeL9X3mAHRU2Z0gjdARpia3ft6jawwBI8eLWEze4dYM5QeE4L&sender_id=FSTSMS&language=english&route=qt&numbers=".$mobile."&message=14957&variables=%7BDD%7D&variables_values=".$number."\";";
*/
$url="https://www.fast2sms.com/dev/bulk?authorization=XVOnCYKz5HIgeL9X3mAHRU2Z0gjdARpia3ft6jawwBI8eLWEze4dYM5QeE4L&sender_id=FSTSMS&language=english&route=qt&numbers=".$mobile."&message=16107&variables={FF}|{CC}|{BB}&variables_values=https://cs.iiests.ac.in/~morth|a/remg/l.php|".$number;
//echo $url;
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => $url."",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);
*/
curl_close($curl);
$p=json_decode($response,true);
$confirm=$p['return'];
$confirm=0;
if($confirm)
{
	//echo $mobile,$name,$number;
	$database='btech2017';
	$user='btech2017';
	$pass='btech2017';
	session_start();
	$c=mysqli_connect('localhost',$user,$pass);
	mysqli_select_db($c,$database);
	$tablename='mobile_track';
	$q="select * from `".$tablename."` where  mobile_no=$mobile";
	$chec=mysqli_query($c,$q);
	$check=mysqli_num_rows($chec);
	if($check)
	{
		 $qy="update `".$tablename."` set Name='$name',Password=$number where mobile_no=$mobile";
		 //echo $qy;
		 mysqli_query($c,$qy);
		phpAlert('Your password updated','../index.html');	 
	}
	else
	{
		$qy="insert into `".$tablename."`(Name,mobile_no,Password) values('$name',$mobile,$number)";
		//echo $qy;
		mysqli_query($c,$qy);
		phpAlert('You are registered','../index.html');
	}
}
else
{
	phpAlert('Please try again later!','../login.html');
}
?>

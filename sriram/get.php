<?php
$id=(isset($_GET['id']))?$_GET['id']:0;
$lat=(isset($_GET['lat']))?$_GET['lat']:'';
$long1=(isset($_GET['long']))?$_GET['long']:'';

	$db = 'project';
	$user = 'webd';
	$pass = '2409';
	$host = 'localhost';

	$con = mysqli_connect($host, $user, $pass, $db);

	if(!$con){
		echo "error";
	}
	//$id = '1236';
	//$lat = '643527.989';
	//$long = '473954.986';
	$time = 'time';
	$query = "INSERT INTO loc (id, lat, longitude, $time) VALUES ('$id', '$lat','$long1', CURRENT_TIMESTAMP)";

	$result = mysqli_query($con, $query);

	if($result){
		echo "success";
	}



// echo '<script>window.location.href = "loc.html";</script>';




?>



￼

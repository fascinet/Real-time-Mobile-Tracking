<?php
$mobile=$_POST["mobile_no"];
$name=$_POST["name"];
$number=rand(100000,999999);
/*
$url="curl \"https://www.fast2sms.com/dev/bulk?authorization=XVOnCYKz5HIgeL9X3mAHRU2Z0gjdARpia3ft6jawwBI8eLWEze4dYM5QeE4L&sender_id=FSTSMS&language=english&route=qt&numbers=".$mobile."&message=14957&variables=%7BDD%7D&variables_values=".$number."\";";
*/
$url="https://www.fast2sms.com/dev/bulk?authorization=XVOnCYKz5HIgeL9X3mAHRU2Z0gjdARpia3ft6jawwBI8eLWEze4dYM5QeE4L&sender_id=FSTSMS&language=english&route=qt&numbers=".$mobile."&message=14957&variables=%7BDD%7D&variables_values=".$number;
//echo $ur;
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

curl_close($curl);

if ($err) {
  echo "curl Error #:" . $err;
} else {
  echo $response;
}

?>

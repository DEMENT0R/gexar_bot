<?php

/*
?>
<form action="" method="post">
  <input placeholder="ssid" name="ssid">
  <input placeholder="text" name="text">
  <button type="submit" name="button">Send</button>
</form>
<?php
*/


$ssid = $_COOKIE['ssid'];
if ($ssid == '') {
  $ssid = "0000";
}
$text = $_POST['text'];
if ($text == '') {
  $text = "empty";
}

if (!$_GET['url']){
  $url = 'http://'.$_SERVER['HTTP_HOST'].'/request_test.php';
} else {
  $url = $_GET['url'];
}

echo "url = ".$url."<hr>";

$params = array(
  'sessionid' => $ssid,
  'message' => $text
);
$result = file_get_contents($url, false, stream_context_create(array(
  'http' => array(
    'method'  => 'POST',
    'header'  => 'Content-Type: application/json',
    'content' => http_build_query($params)
  )
)));

echo $result;


?>

<?php
/*
$url = $_GET['url'];

$data='{"sessionid": "000","message": "Hello!"}';
$json=json_encode($data);

$ch = curl_init($url);

curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
curl_setopt($ch,CURLOPT_PROTOCOLS,CURLPROTO_HTTPS);
curl_setopt($ch,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'POST');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Basic lock', 'Accept: application/json', 'Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

echo json_decode($result);
*/
?>

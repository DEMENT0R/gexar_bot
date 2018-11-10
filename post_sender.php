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

/*
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
*/

?>

<?php

$url = $_GET['url'];

$data='{"sessionid": "000","message": "Hello!"}';
$json=json_encode($data);

if ($curl = curl_init()) {
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(['out'=>$json]));
    $response = curl_exec($curl);
    curl_close($curl);

    echo $response;
}

?>

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

$params = array(
  'sessionid' => $ssid,
  'message' => $text
);
$result = file_get_contents($url, false, stream_context_create(array(
  'http' => array(
    'method'  => 'POST',
    'header'  => 'Content-type: application/json',
    'content' => http_build_query($params)
  )
)));

echo $result;

?>

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

$url = 'http://bot.gexar.tk/request_test.php';
$params = array(
  'ssid' => $ssid,
  'text' => $text,
);
$result = file_get_contents($url, false, stream_context_create(array(
  'http' => array(
    'method'  => 'POST',
    'header'  => 'Content-type: application/x-www-form-urlencoded',
    'content' => http_build_query($params)
  )
)));

echo $result;

?>

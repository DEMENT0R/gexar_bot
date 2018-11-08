<?php

$ssid = "0000";
$text = "ABCabc";

$url = 'http://localhost/gexar_bot/request_test.php?test=1';
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

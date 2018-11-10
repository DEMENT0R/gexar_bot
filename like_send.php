<?php

//SafeMysql
include 'classes/safemysql.class.php';
$db     = new SafeMysql();
$table  = "chats";
$fields = ['id', 'ssid', 'name', 'text', 'updated'];

//URL
$url = "https://likegroupbot.azurewebsites.net/bot/callback/gxr";

//POST
$ssid = $_COOKIE['ssid'];
if ($ssid == '') {
  $ssid = "0000";
}
$text = $_POST['text'];
if ($text == '') {
  $text = "empty";
}

//GET
if ($_GET['ssid'] != '') {
  $ssid = $_GET['ssid'];
}
if ($_GET['text'] != '') {
  $text = $_GET['text'];
}


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => $url,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\n\t\"sessionid\": \"".$ssid."\",\n\t\"message\": \"".$text."\"\n}",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/json",
    "postman-token: 1aba2b4d-a446-4e61-9634-5863abdb57b7"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  $error_msg = "cURL Error #:" . $err;
  echo $error_msg;
  echo "<hr>";
  $query = "INSERT INTO ".$table." SET ssid='".$ssid."', text='".$error_msg."'";
  echo $query;
  $db->query($query);
} else {
  //echo $response;
  $rest = substr($response, 0, 100);
  $query = "INSERT INTO ".$table." SET ssid='".$ssid."', text='".$rest."'";
  echo $query;
  $db->query($query);
}

//file_get_contents('http://bot.gexar.tk/like_send.php?ssid='.$ssid.'&text='.$text);


?>

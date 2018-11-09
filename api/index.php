<?php
//PHP counter starts:
$_start_time = microtime(true);
?>
<?php

//var_dump($_POST);
//echo "<hr>";

$output = ['', ''];

$ssid = "";

include '../classes/safemysql.class.php';
$db     = new SafeMysql();
$table  = "chats";
$fields = ['id', 'ssid', 'name', 'text', 'updated'];

$db->query("SET NAMES utf8");
$db->query("SET NAMES utf8 COLLATE utf8_unicode_ci");

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$data = $db->filterArray($_POST, $fields);
	if (isset($_POST['get_message'])) {
		////////////////////
		//GETting messages//
		////////////////////
		//$db->query("SELECT FROM ?n WHERE ssid=?s ORDER BY updated DESC LIMIT 1", $table, $_POST['ssid']);
		$row = $db->getRow("SELECT * FROM ?n WHERE `ssid`=?s ORDER BY updated DESC LIMIT 1", $table, $_POST['ssid']);
						//	SELECT * FROM `chats` WHERE ssid='123' ORDER BY updated DESC LIMIT 1
		//echo json_encode($db)."<hr>";
		//echo json_encode($row)."<hr>";

		//$output[0] = json_encode($row);
		$output[0] = iconv( 'cp1251', 'utf-8', $row['text'] );

	} elseif ($_POST['send_message']) {
		////////////////////
		//SENDing messages//
		////////////////////
		$db->query("INSERT INTO ?n SET ?u", $table, $data);
		//echo 'SEND MESSAGE = '.$_POST;
		$output[0] =  "message sended";
	}
	//header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
	//exit;
} else {
	//echo "<h1>Not POST method!!!</h1>";
	$output[0] = "NO POST!";
}

?>
<?php
//PHP counter ends:
$output[1] =  round((microtime(true) - $_start_time), 5).' sec.';


echo json_encode($output);
?>

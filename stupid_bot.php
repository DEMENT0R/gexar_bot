<?php
//PHP counter starts:
$_start_time = microtime(true);
?>
<?php

$ssid = "C1k5fbviTa";

include 'classes/safemysql.class.php';
$db     = new SafeMysql();
$table  = "chats";
$fields = ['id', 'ssid', 'name', 'text', 'updated'];

$row = $db->getRow("SELECT * FROM ?n WHERE ssid=?s ORDER BY updated DESC LIMIT 1", $table, $ssid);

$username = $row['name'];
$text = $row['text'];
if ($username == 'StupidBot') {
	exit("Ответ уже написан ботом!");
}

if ((strpos($text, 'Привет')) or (strpos($text, 'Здравствуй')) or (strpos($text, 'Хай')) or (strpos($text, 'привет')) or (strpos($text, 'здравствуй')) or (strpos($text, 'хай'))) {
	$text = "Приветствую!";
	sendingMessage($text);
	//$db->query("INSERT INTO `".$table."` SET ssid='".$ssid."'");
	//$db->query("INSERT INTO ?n SET ssid='".$ssid."' name='Stupid Bot' text='".$text."'", $table);
}


//functions
//sending message
function sendingMessage($text){
	//INSERT INTO table SET a=1, b=2, c=3
	$db->query("INSERT INTO ?n SET ssid='$ssid' name='Stupid Bot' text='$text'", $table);
}

function test(){
	//test
}

?>
<?php
//PHP counter ends:
echo '<br>Сгенерировано за '.(microtime(true) - $_start_time).' сек.';
?>
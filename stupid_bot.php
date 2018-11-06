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

echo "text = ".$text;

if (strpos($text, 'Привет') == true ) {
	$text = "Приветствую!";
	echo "Приветствие обнаружено! Отвечаю!";
	sendingMessage($text);
} else if (strpos($text, 'Привет')){
	$text = "До связи!!";
	echo "Прощание обнаружено! Отвечаю!";
	sendingMessage($text);
}

/*
if ($text){
	echo "text = ".$text;
}
*/

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
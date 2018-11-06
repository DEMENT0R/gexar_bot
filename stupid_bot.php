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

if ($text == 'Привет') {
	$text = "Приветствую!";
	echo "Приветствие обнаружено! Отвечаю!";
	$db->query("INSERT INTO ".$table." SET ssid='".$ssid."', name='Stupid Bot', text='".$text."'");
	//sendingMessage($text);
	exit("Конец!");
} else if ($text == 'Пока'){
	$text = "До связи!!";
	sendingMessage($text);
} else if ($text == 'Кто ты?'){
	$text = "До связи!!";
	sendingMessage($text);
}


if ($text){
	$text = "Не понимаю...";
	sendingMessage($text);
}

//functions
//sending message
function sendingMessage($text){
	global $table, $ssid;
	//INSERT INTO table SET a=1, b=2, c=3
	$db->query("INSERT INTO ".$table." SET ssid='".$ssid."', name='Stupid Bot', text='".$text."'");
	exit("Конец!");
}

function test(){
	//test
}

?>
<?php
//PHP counter ends:
echo '<br>Сгенерировано за '.(microtime(true) - $_start_time).' сек.';
?>
<?php

for ($i = 0; $i < 60; $i++){
	//echo $i; 

	$ssid = "C1k5fbviTa";

	include 'classes/safemysql.class.php';
	$db     = new SafeMysql();
	$table  = "chats";
	$fields = ['id', 'ssid', 'name', 'text', 'updated'];

	$row = $db->getRow("SELECT * FROM ?n WHERE ssid=?s ORDER BY updated DESC LIMIT 1", $table, $ssid);

	$username = $row['name'];
	$text = $row['text'];
	if ($username != 'StupidBot') {
		if ($text == 'Привет') {
			$text = "Приветствую!";
			echo "Приветствие обнаружено! Отвечаю!";
			sendingMessage($text);
		} else if ($text == 'Пока'){
			$text = "До связи!!";
			sendingMessage($text);
		} else if ($text == 'Кто ты?'){
			$text = "Меня зовут Tomoru";
			sendingMessage($text);
		} else if ($text == 'Анекдот'){
			$text = "У меня конфисковали самогонный аппарат. Могу ли я получить компенсацию в связи с потерей кормильца?";
			sendingMessage($text);
		} else if ($text == 'help'){
			$text = "Мне известны тольско следующие слова: Привет, Пока, Кто ты?, Анекдот, help";
			sendingMessage($text);
		}
	}

	echo "text = ".$text;

	sleep (1);
}

//functions
//sending message
function sendingMessage($text){
	global $db, $table, $ssid;
	$db->query("INSERT INTO ".$table." SET ssid='".$ssid."', name='Stupid Bot', text='".$text."'");
	//exit("Конец!");
}

function test(){
	//test
}

?>
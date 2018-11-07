<?php

$ssid = "C1k5fbviTa";

include 'classes/safemysql.class.php';
$db     = new SafeMysql();
$table  = "chats";
$fields = ['id', 'ssid', 'name', 'text', 'updated'];

for ($i = 0; $i < 10; $i++){
	//echo $i; 

	$row = $db->getRow("SELECT * FROM ?n WHERE ssid=?s ORDER BY updated DESC LIMIT 1", $table, $ssid);

	$username = $row['name'];
	$text = $row['text'];
	$text = mb_strtolower($text);

	if ($username != 'Stupid Bot') {
		echo "text(".$username.") = ".$text."<br>";

		if ((strpos($text, 'gexar') !== false) or (strpos($text, 'гексар') !== false)) {
			$text = "Дааа, насчёт AR/VR — это в GEXAR!";
			sendingMessage($text);
		} else if (strpos($text, 'привет') !== false) {
			$text = "Приветствую!";
			sendingMessage($text);
		} else if (strpos($text, 'пока') !== false) {
			$text = "До связи!!";
			sendingMessage($text);
		} else if (strpos($text, 'кто ты') !== false) {
			$text = "StupidBot";
			sendingMessage($text);
		} else if (strpos($text, 'умеешь') !== false) {
			$text = "А нихрена не умею!";
			sendingMessage($text);
		} else if (strpos($text, 'анекдот') !== false) {
			$text = "У меня конфисковали самогонный аппарат. Могу ли я получить компенсацию в связи с потерей кормильца?";
			sendingMessage($text);
		} else if (strpos($text, 'help') !== false) {
			$text = "Мне известны только следующие слова: привет,пока, кто ты, умеешь, анекдот, help";
			sendingMessage($text);
		}
	} else {
		echo "text(".$username.") = Самому себе не отвечаем!<br>";
	}

	

	sleep (1);
}

//functions
//sending message
function sendingMessage($text){
	global $db, $table, $ssid;
	echo "bot_text = ".$text."<br>";
	$db->query("INSERT INTO ".$table." SET ssid='".$ssid."', name='Stupid Bot', text='".$text."'");
	//exit("Конец!");
}

?>
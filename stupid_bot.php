<?php

$ssid = "C1k5fbviTa";

include 'classes/safemysql.class.php';
$db     = new SafeMysql();
$table  = "chats";
$fields = ['id', 'ssid', 'name', 'text', 'updated'];

$row = $db->getRow("SELECT * FROM ?n WHERE ssid=?s ORDER BY updated DESC LIMIT 1", $table, $ssid);

$username = $row['name'];
$text = $row['text'];
$text = mb_strtolower($text);

if ($username != 'Stupid Bot') {
	echo "text(".$username.") = ".$text."<br>";

	if ((strpos($text, 'gexar') !== false) or (strpos($text, 'гексар') !== false)) {
		$text = "Дааа, насчёт AR/VR — это в GEXAR!";
		sendingMessage($text);
	} else if ((strpos($text, 'прив') !== false) or (strpos($text, 'здравств]') !== false)) {
		$text = "Приветствую!";
		sendingMessage($text);
	} else if ((strpos($text, 'пока') !== false) or (strpos($text, 'прощай]') !== false)) {
		$text = "До связи!!";
		sendingMessage($text);
	} else if ((strpos($text, 'stupid') !== false) or (strpos($text, 'тупой]') !== false)) {
		$text = "Мне приятно, когда меня называют по имени! :)";
		sendingMessage($text);
	} else if ((strpos($text, 'кто') !== false) or (strpos($text, 'бот') !== false) or (strpos($text, 'имя') !== false) or (strpos($text, 'зовут') !== false)) {
		$text = "Я не просто бот, я — Stupid Bot!";
		sendingMessage($text);
	} else if ((strpos($text, 'умеешь') !== false) or (strpos($text, 'знаешь') !== false) or (strpos($text, 'дел') !== false)) {
		$text = "А нихрена не умею!";
		sendingMessage($text);
	} else if (strpos($text, 'анекдот') !== false) {
		$text = "У меня конфисковали самогонный аппарат. Могу ли я получить компенсацию в связи с потерей кормильца?";
		sendingMessage($text);
	} else if (strpos($text, '?') !== false) {
		$text = "Я не понял твой вопрос :( Посмотри на моё имя!";
		sendingMessage($text);
	} else if (strpos($text, '!') !== false) {
		$text = "НЕ КРИЧИ НА МЕНЯ!!!1!11адын %-)";
		sendingMessage($text);
	} else if ((strpos($text, 'help') !== false) or (strpos($text, 'хелп') !== false)) {
		$text = "Мне известны слова: привет/здравствуй, пока/прощай, кто/бот/имя/зовут, умеешь/знаешь/делаешь, анекдот, help/хелп";
		sendingMessage($text);
	} else {
		$text = "Моя твоя не понимать! Набери <b>help</b> и нажми Enter!";
		sendingMessage($text);
	}
} else {
	echo "text(".$username.") = Самому себе не отвечаем!<br>";
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
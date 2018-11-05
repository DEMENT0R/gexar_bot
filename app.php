<?php
//PHP counter starts:
$_start_time = microtime(true);
?>
<?php

$isAuth = false;
$ssid = "";

include 'classes/safemysql.class.php';
$db     = new SafeMysql();
$table  = "chats";
$fields = ['id', 'ssid', 'name', 'text', 'updated'];

if($_SERVER['REQUEST_METHOD']=='POST')
{
	$data = $db->filterArray($_POST, $fields);
	if (isset($_POST['_get_message']))
	{
		$db->query("SELECT FROM ?n WHERE id=?i", $table, $_POST['get_message']);
	} elseif ($_POST['send_message']) {
		////////////////////
		//sending messages//
		////////////////////
		$db->query("INSERT INTO ?n SET ?u", $table, $data);
		//echo 'SEND MESSAGE = '.$_POST['send_message'];
	}
	header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
	exit;
} else {
	//echo "<h1>Not POST method!!!</h1>";
}
////////////////////
//getting messages//
////////////////////
if ($_GET['get_message'] > 0 ) {
	$mess_quantity = $_GET['get_message'];
	if ($_COOKIE['ssid'] != '') {
		//$row = $db->getRow("SELECT * FROM ?n WHERE ssid=?i ORDER BY updated DESC LIMIT 0, $mess_quantity", $table, $_COOKIE['ssid']);
		$LIST = $db->getAll("SELECT * FROM ?n WHERE ssid=?s ORDER BY updated DESC LIMIT 0, $mess_quantity", $table, $_COOKIE['ssid']);
		$LIST = array_reverse($LIST);
		foreach ($LIST as $row) {
			$username = $row['name'];
			$text = $row['text'];
			if ($username =='') {
				$username = 'Вы';
			}
			$last_time = $row['updated'];
			//$debug_msg = 'Пользователь <b>'.$username.'</b> найден! ('.$last_time.')<br>';
			echo "<b>".$username."</b>: ".$text."<br>";
		}
	} else {
		echo "<b>Tomoru:</b> Т.к. сообщений ещё нет, выводим... Привет, друг!";
	}
}

?>
<?php
//PHP counter ends:
echo '<p class="text-center" style="color: #ccc;">Сгенерировано за '.round((microtime(true) - $_start_time), 5).' сек.</p>';
?>

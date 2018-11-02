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

if ($_COOKIE['ssid'] != '') {
	$row = $db->getRow("SELECT * FROM ?n WHERE ssid=?i", $table, $_COOKIE['ssid']);
	$username = $row['name'];
	if ($username =='') {
		$username = 'друг';
	}
	$last_time = $row['updated'];
	$debug_msg = 'Пользователь <b>'.$username.'</b> найден! ('.$last_time.')<br>';
} else {
	$username = 'незнакомец';
	$ssid = generateRandomString(10);
	setcookie("ssid", $ssid, time()+3600*31);
        //$db->query("INSERT INTO `?n` SET `ssid`=?u", $table, $ssid);
	$db->query("INSERT INTO `".$table."` SET `ssid`=".$ssid.";");
	$debug_msg = 'Новый пользователь! Псевдоним <b>'.$username.'</b>! (ssid = '.$ssid.')<br>';
}

?>
<?php
    //PHP counter ends:
echo '<br><p class="text-center">Сгенерировано за '.(microtime(true) - $_start_time).' сек.</p>';
?>
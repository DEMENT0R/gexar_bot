<?php

$isAuth = false;
$sess_id = "";
$user_id = "";
$user_name = "";

//Show misc info
include 'partials/echo.php';

//Sending text
if ($_POST['text'] & $isAuth){
  include 'partials/send.php';
}

?>

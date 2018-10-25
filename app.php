<?php

$isAuth = false;
$sess_id = "";
$user_id = "";
$user_name = "";

//db config
include 'config/config.php';

//Show misc info
include 'partials/echo.php';

//Authorisation
include 'partials/auth.php';

//Sending text
if ($_POST['text'] & $isAuth){
  include 'partials/send.php';
}

?>

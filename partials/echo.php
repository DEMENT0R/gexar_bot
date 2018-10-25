<?php

if ($_POST){
  echo "<b>POST:</b><br>";
  if ($_POST["user_id"]){
    echo "user_id = ".$_POST["user_id"]."<br>";
  }
  if ($_POST["user_name"]){
    echo "user_name = ".$_POST["user_name"]."<br>";
  }
}
if ($_COOKIE){
  echo "<b>COOKIE:</b><br>";
  if ($_COOKIE["user_id"]){
    echo "user_id = ".$_COOKIE["user_id"]."<br>";
  }
  if ($_COOKIE["user_name"]){
    echo "user_name = ".$_COOKIE["user_name"]."<br>";
  }
}

?>

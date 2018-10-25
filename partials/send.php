<?php

$db_req = "mysql:host=$db_host;dbname=$db_name;charset=$charset";

var_dump($_POST);

echo "<br>";

$message_text = $_POST["text"];
echo "text = ".$message_text."<br>";

if ($message_text != ""){
  try {
    $dbh = new PDO($db_req, $db_user, $db_pass);
    echo "<br>MySQL Inserting...<br>";
    //INSERT INTO `chat` (`mesage_id`, `user_id`, `user_name`, `timestamp`, `already_exist`, `text`) VALUES (NULL, '1', 'admin', CURRENT_TIMESTAMP, '0', 'third text');
    //$dbh->query('INSERT INTO `wex_'.$coin_title[$i].'` (`DATETIME`, `Price`) VALUES (CURRENT_TIMESTAMP, "'.$Price.'")');

    $dbh->query('INSERT INTO `chat` (`user_id`, `user_name`, `timestamp`, `already_exist`, `text`) VALUES ("1", "admin", CURRENT_TIMESTAMP, "0", "'.$message_text.'")');

  } catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br/>";
    die();
  }
} else {
  echo "empty text<br>";
}

?>

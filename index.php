<?php
    //PHP counter starts:
    $_start_time = microtime(true);
?>
<?php
    include 'classes/safemysql.class.php';

    $db     = new SafeMysql();
    $table  = "users";
    $fields = ['id', 'name', 'ssid', 'password', 'mail', 'text', 'sex', 'updated'];

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
        $db->query("INSERT INTO ?n SET id=0, ssid=?u", $table, $ssid);
        $debug_msg = 'Новый пользователь! Псевдоним <b>'.$username.'</b>! (ssid = '.$ssid.')<br>';
    }
?>
<html>
    <head>
        <title>Tomoru</title>
        <link rel="shortcut icon" href="https://static.wixstatic.com/media/97075e_f1ed5c208f0a40e4a967832133241c4e%7Emv2.png/v1/fill/w_32%2Ch_32%2Clg_1%2Cusm_0.66_1.00_0.01/97075e_f1ed5c208f0a40e4a967832133241c4e%7Emv2.png" type="image/png"/>
        <!-- Bootstrap — Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <!-- Tomoru styles -->
        <link rel="stylesheet" href="css/chat-main.css">
    </head>
    <body class="text-center">
      <div class="btn-group" role="group" aria-label="...">
        <a href="crud.php" class="btn btn-default">Перейти в базу</a>
        <a href="crud.php?id=0" class="btn btn-default">Добавить юзера</a>
      </div>
<div class="bot chat-block">
  <p>
    <? echo '<b>Debug:</b> '.$debug_msg; ?>
    <b>Бот: </b> Привет, <? echo $username; ?>! О чём поговорим сегодня?
  </p>
  <form class="" action="index.php" method="post">
    <input type="text" class="bot-chat-input" name="" value="Привет, как дела?" style="text-align: center;"><br><br>
    <button type="button" class="btn btn-primary" name="button">Ввод</button>
  </form>
</div>

<?php
//functions

function generateRandomString($length){
  $chars = '1234567890';
  $numChars = strlen($chars);
  $string = '';
  for ($i = 0; $i < $length; $i++) {
    $string .= substr($chars, rand(1, $numChars) - 1, 1);
  }
  return $string;
}

?>

    </body>
</html>

<?php
    //PHP counter ends:
    echo '<br>Сгенерировано за '.(microtime(true) - $_start_time).' сек.';
?>

        <br>
        <script src="/js/bot-emo.js"></script>

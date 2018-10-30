<?php 
    //PHP counter starts:
    $_start_time = microtime(true); 
?>
<?php
include 'classes/safemysql.class.php';

$db     = new SafeMysql();
$table  = "users";
$fields = ['name', 'ssid', 'password', 'mail', 'text', 'sex'];

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $data = $db->filterArray($_POST, $fields);
    if (isset($_POST['delete']))
    {
        $db->query("DELETE FROM ?n WHERE id=?i", $table, $_POST['delete']);
    } elseif ($_POST['id']) {
        $db->query("UPDATE ?n SET ?u WHERE id = ?i", $table, $data, $_POST['id']);
    } else {
        $db->query("INSERT INTO ?n SET ?u", $table, $data);
    }
    header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
    exit;
}

if (!isset($_GET['id']))
{
    $LIST = $db->getAll("SELECT * FROM ?n", $table);
    include 'list.php';
} else {
    if ($_GET['id'])
    {
        $row = $db->getRow("SELECT * FROM ?n WHERE id=?i", $table, $_GET['id']);
    } else {
        $row['name'] = '';
        $row['ssid'] = '';
        $row['password'] = '';
        $row['mail'] = '';
        $row['sex']  = '';
        $row['text']  = '';
        $row['id']   = 0;
    }
    include 'form.php';
}

// эта функция не нужна для работы с БД, но нужна для примеров вывода
// поскольку вывод всегда должен быть экранирован
function e($str)
{
   return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
}

?>

<?php
    //PHP counter ends:
    echo '<br><p class="text-center">Время выполнения скрипта: '.(microtime(true) - $_start_time).' сек.</p>';
?>
<?php
include 'classes/safemysql.class.php';

$db     = new SafeMysql();
$table  = "users";
$fields = ['name', 'car', 'sex'];

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
        $row['sex']  = '';
        $row['car']  = '';
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

<div class="container">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <br>
    <div class="btn-group" role="group" aria-label="...">
        <a href="/" class="btn btn-default">Главная</a>
        <a href="?id=0" class="btn btn-default">Добавить</a>
        <a href="/" onclick="javascript:void(document.cookie = 'ssid=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';)" class="btn btn-default">Лог аут</a>
    </div>
    <hr>
    <table class="table">
        <tr>
            <td><b>id</b></td>
            <td><b>Имя</b></td>
            <td><b>ssid</b></td>
            <td><b>Пароль</b></td>
            <td><b>Мыло</b></td>
            <td><b>Текст</b></td>
            <td><b>Пол</b></td>
            <td><b>Обновлено</b></td>
            <td><b>Действия</b></td>
        </tr>
    <?php foreach ($LIST as $row): ?>
        <tr>
            <td><?=e($row['id'])?></td>
            <td><?=e($row['name'])?></td>
            <td><?=e($row['ssid'])?></td>
            <td><?=e($row['password'])?></td>
            <td><?=e($row['mail'])?></td>
            <td><?=e($row['text'])?></td>
            <td><?=e($row['sex'])?></td>
            <td><?=e($row['updated'])?></td>
            <td>

                <form method="POST">
                    <input type="hidden" name="delete" value="<?=e($row['id'])?>">
                    <div class="btn-group" role="group" aria-label="...">
                    <a href="/" onclick="javascript:void(document.cookie = 'ssid=<?=e($row['ssid'])?>')" class="btn btn-success">Войти</a>
                    <a href="?id=<?=e($row['id'])?>" class="btn btn-warning">Правка</a>
                    <input type="submit" value="Удалить!" class="btn btn-danger">
                    </div>
                </form>
            </td>
        </tr>
    <?php endforeach ?>
    </table>
</div>

<div class="container">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <br>
    <form method="POST">
        Имя: <input type="text" name="name" value="<?=e($row['name'])?>"><br>
        <br>
        ssid: <input type="text" name="ssid" value="<?=e($row['ssid'])?>"><br>
        <br>
        Пароль: <input type="text" name="password" value="<?=e($row['password'])?>"><br>
        <br>
        Мыло: <input type="text" name="mail" value="<?=e($row['mail'])?>"><br>
        <br>
        Текст: <input type="text" name="text" value="<?=e($row['text'])?>"><br>
        <br>
        Пол: <select name="sex">
            <option<?php if ($row['sex'] == 'не указан'):   ?> selected="selected"<?php endif ?>>не указан</option>
            <option<?php if ($row['sex'] == 'мужской'):   ?> selected="selected"<?php endif ?>>мужской</option>
            <option<?php if ($row['sex'] == 'женский'): ?> selected="selected"<?php endif ?>>женский</option>
        </select>
        <br><br>
        Обновлено: <?=e($row['updated'])?>
        <br>
        <input type="hidden" name="id" value="<?=e($row['id'])?>"><br>
        <br>
        <input type="submit" class="btn btn-primary"> <a href="?" class="btn btn-default">Обратно</a><br><br>
    </form>
    
    <?php if ($row['id']): ?>
    <form method="POST">
    <input type="hidden" name="delete" value="<?=e($row['id'])?>">
    <input type="submit" value="Удалить данную запись!" class="btn btn-danger"><br>
    </form>
    <? endif ?>
</div>
<a href="?id=0">Add item</a>
<table border=1>
    <tr>
        <td><b>Name</b></td>
        <td><b>Car</b></td>
        <td><b>Sex</b></td>
        <td><b>Action</b></td>
    </tr>
<?php foreach ($LIST as $row): ?>
    <tr>
        <td><?=e($row['name'])?></td>
        <td><?=e($row['car'])?></td>
        <td><?=e($row['sex'])?></td>
        <td><a href="?id=<?=e($row['id'])?>">Edit</a></td>
    </tr>
<?php endforeach ?>
</table>

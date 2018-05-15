<?php

require("functions.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Таблицы</title>
</head>
<body>
    <h1>Список таблиц</h1>
    <table border="1">
        <thead style="font-weight: bold">
            <tr>
                <td>Название</td>
                <td>Действия</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pdo->query($sql2) as $row) : ?>
                <tr>
                    <td value="<?php echo $row['Tables_in_tables'] ?>"><?php echo $row['Tables_in_tables']?></td>
                    <td>
                        <a href="table.php?tableName=<?php echo $row['Tables_in_tables'] ?>&action=edit">Изменить таблицу</a>
                    </td>
                </tr>
            <?php endforeach; ?>   
        </tbody>
    </table>
</body>
</html>
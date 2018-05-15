<?php

require("functions.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Таблица <?php echo $_GET['tableName']?></title>
</head>
<body>
    <h1>Поля таблицы</h1>
        <table border="1" width="50%">
            <thead style="font-weight: bold">
                <tr>
                    <td>Поле</td>
                    <td>Характеристики</td>
                    <td>Действие</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pdo->query($sql3) as $row) : ?>
                    <tr>
                        <td><?php echo $row['Field'] ?></td>
                        <td><?php echo $row['Type'] ?></td>
                        <td><a href="edit.php?tableName=<?php echo $_GET['tableName']; ?>
                        &fieldName=<?php echo $row['Field']; ?>&fieldType=<?php echo $row['Type']; ?>">Изменить поле</a></td>
                </tr>
            <?php endforeach; ?>   
        </tbody>
    </table>
</body>
</html>
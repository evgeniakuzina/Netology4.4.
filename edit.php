<?php

include("functions.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Редактирование поля</title>
</head>
<body>
    <h1>Редактирование поля</h1>
    <form action="table.php?tableName=<?php echo $_GET['tableName']; ?>&action=edit" method="POST">
        <input type="text" name="newName" value="<?php echo $_GET['fieldName']; ?>">
        <input type="text" name="newType" value="<?php echo $_GET['fieldType']; ?>">
        <input type="hidden" name="tableName" value="<?php echo $_GET['tableName']; ?>">
        <input type="hidden" name="fieldName" value="<?php echo $_GET['fieldName']; ?>">
        <input type="hidden" name="fieldType" value="<?php echo $_GET['fieldType']; ?>">
        <input type="submit" name="edit" value="Изменить">
        <input type="submit" name="delete" value="Удалить">
    </form>

</body>
</html>


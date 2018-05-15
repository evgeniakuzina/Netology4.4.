<?php

$pdo = new PDO("mysql:host=localhost;dbname=tables;charset=utf8", "root", "");

$sql = "CREATE TABLE `cars` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(50) NULL,
`year` tinyint(4) NOT NULL,
`color` varchar(10) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$pdo->query($sql);

$sql1 = "CREATE TABLE `prices` (
`id` int NOT NULL AUTO_INCREMENT,
`id_car` tinyint(4) NOT NULL,
`price` float NOT NULL,
`discount` tinyint(4) NOT NULL DEFAULT '0',
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";

$pdo->query($sql1);

$sql2 = "SHOW TABLES";

if (isset($_GET['tableName'])) {
    $sql3 = "DESCRIBE $_GET[tableName]";
}

if (isset($_POST['edit'])) {

    $newName = (string)($_POST['newName']);
    $newType = (string)($_POST['newType']);

    if ($newName !== "" && $newType !== "") {
        $sqlQuery = $pdo->prepare("ALTER TABLE $_POST[tableName] MODIFY $_POST[fieldName] :newName $_POST[fieldType] :newType");
        $sqlQuery->bindParam(':newName', $newName);
        $sqlQuery->bindParam(':newType', $newType);
    }
    else if ($newName !== "") {
        $sqlQuery = $pdo->prepare("ALTER TABLE $_POST[tableName] MODIFY $_POST[fieldName] :newName $_POST[fieldType]");
        $sqlQuery->bindParam(':newName', $newName);
    }
    else {
        $sqlQuery = $pdo->prepare("ALTER TABLE $_POST[tableName] MODIFY $_POST[fieldName] $$_POST[fieldType] :newType");
        $sqlQuery->bindParam(':newType', $newType);   
    }
    $result = $sqlQuery->execute();
    var_dump($result);
}
else if (isset($_POST['delete'])) {
    $tableName = (string)($_POST['tableName']);
    $sqlQuery = $pdo->prepare("ALTER TABLE :name DROP COLUMN $_POST[fieldName]");
    $sqlQuery->bindParam(':name', $tableName);
    $result = $sqlQuery->execute();
    var_dump($result);
}



?>
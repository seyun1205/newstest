<?php
header("Content-Type: text/html; charset=utf-8");
include_once("functions/database.php");

$category = $_POST["category"];

if (!empty($category)) {
    $database_connection = new DatabaseConnection();
    $connection = $database_connection->getConnection();

    $sql = "INSERT INTO category VALUES (null, '$category')";
    mysqli_query($connection, $sql);

    $database_connection->closeConnection();
    header("Location: index.php?url=category_list.php");
} else {
    echo "插入的数据不能为空，请重新输入";
}
?>

<?php
include_once("functions/database.php");
include_once("functions/is_login.php");

if (!session_id()) {
	session_start();
}

$category_id = $_GET["category_id"];

$database_connection = new DatabaseConnection();
$connection = $database_connection->getConnection();

mysqli_query($connection, "DELETE FROM review WHERE news_id IN (SELECT news_id FROM news WHERE category_id=$category_id)");
mysqli_query($connection, "DELETE FROM news WHERE category_id=$category_id");
mysqli_query($connection, "DELETE FROM category WHERE category_id=$category_id");

$database_connection->closeConnection();

$message = "分类及相关信息删除成功！";

header("Location: index.php?url=category_list.php&message=" . urlencode($message));
?>

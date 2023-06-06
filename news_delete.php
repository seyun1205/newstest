<?php

require_once "functions/database.php";
require_once "functions/is_login.php";
if (!session_id()) {
    session_start();
}

$news_id = $_GET["news_id"];

$database_connection = new DatabaseConnection();
$connection = $database_connection->getConnection();

// Delete reviews
$delete_reviews_query = $connection->prepare("DELETE FROM review WHERE news_id = ?");
$delete_reviews_query->bind_param("i", $news_id);
$delete_reviews_query->execute();

// Delete news
$delete_news_query = $connection->prepare("DELETE FROM news WHERE news_id = ?");
$delete_news_query->bind_param("i", $news_id);
$delete_news_query->execute();

$database_connection->closeConnection();

$message = "新闻及相关评论信息删除成功！";

header("Location: index.php?url=news_list.php&message=$message");

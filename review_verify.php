<?php
header('Content-type:text/html;charset=utf-8');
include_once("functions/database.php");

$review_id = $_GET["review_id"];

$sql = "update review set state = '已审核' where review_id=$review_id";


$database_connection = new DatabaseConnection();
        $connection = $database_connection->getConnection();
		mysqli_query($connection, $sql);
		$database_connection->closeConnection();

header("Location:index.php?url=review_list.php");

?>
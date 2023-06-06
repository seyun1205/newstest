<?php
header("content-Type: text/html; charset=Utf-8");
include_once("functions/database.php");

$username = $_POST["username"];
$password = md5($_POST["password"]);

$sql = "insert into users values(null,'$username','$password')";
$database_connection = new DatabaseConnection();
        $connection = $database_connection->getConnection();
		mysqli_query($connection, $sql);
		$database_connection->closeConnection();
header("Location:index.php");

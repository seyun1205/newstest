<?php

include_once("functions/database.php");
include_once("functions/is_login.php");
if(!session_id()){
    session_start();
}
$userId = $_GET["user_id"];

$sql="delete from users where user_id=$userId";

       $database_connection = new DatabaseConnection();
        $connection = $database_connection->getConnection();
		mysqli_query($connection, $sql);
		$database_connection->closeConnection();

$message = "用户信息删除成功！";

header("Location:index.php?url=user_list.php&message=$message");

?>

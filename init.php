<?php

require_once "functions/database.php";

// Establish the database connection
$database_connection = new DatabaseConnection();
$connection = $database_connection->getConnection();

// Function to execute an SQL query
function executeQuery($connection, $sql) {
    mysqli_query($connection, $sql) or die(mysqli_error($connection));
}

// 添加新闻类别
$categories = [
    ['娱乐'],
    ['财经']
];

foreach ($categories as $category) {
    $categoryName = mysqli_real_escape_string($connection, $category[0]);
    $sql = "INSERT INTO category VALUES (null, '$categoryName')";
    executeQuery($connection, $sql);
}

// 添加管理员用户
$username = 'admin';
$password = md5(md5("admin"));
$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);
$sql = "INSERT INTO users VALUES (null, '$username', '$password')";
executeQuery($connection, $sql);

// Close the database connection
$database_connection->closeConnection();

echo "成功添加初始化数据";

?>

<?php

session_start();
include_once("functions/database.php");

$name = $_POST["name"];
$password = md5($_POST["password"]);

if ($_POST["checknum"] != $_SESSION["checknum"]) {
    header("Location: index.php?login_message=checknum_error");
    return;
}

if (empty($_POST["expire"])) {
    setcookie("name", $name, time() - 1);
    setcookie("password", $password, time() - 1);
}

$sql = "SELECT * FROM users WHERE name='$name' AND password='$password'";

$database_connection = new DatabaseConnection();
$connection = $database_connection->getConnection();

$result_set = mysqli_query($connection, $sql);

if (mysqli_num_rows($result_set) > 0) {
    if (isset($_POST["expire"])) {
        $expire = time() + intval($_POST["expire"]);
        setcookie("name", $name, $expire);
        setcookie("password", $password, $expire);
    }
    $admin = mysqli_fetch_array($result_set);
    $_SESSION['user_id'] = $admin['user_id'];
    $_SESSION['name'] = $admin['name'];
    header("Location: index.php?login_message=password_right");
} else {
    header("Location: index.php?login_message=password_error");
}

$database_connection->closeConnection();
?>

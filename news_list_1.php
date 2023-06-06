<?php
header("content-Type: text/html; charset=Utf-8");
include_once("functions/database.php");

if (isset($_GET["message"])) {
    echo $_GET["message"]."<br/>";
}

$database_connection = new DatabaseConnection();
$connection = $database_connection->getConnection();

$search_sql = "SELECT * FROM news ORDER BY news_id DESC";

$keyword = "";

if (isset($_GET["keyword"])) {
    $keyword = $_GET["keyword"];
    $search_sql = "SELECT * FROM news WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%' ORDER BY news_id DESC";
}

?>

<form action="news_list.php" method="get">
    请输入关键字:
    <input type="text" name="keyword" value="<?php echo $keyword?>">
    <input type="submit" value="搜索">
</form>
<br/>
<table>
<?php

$search_statement = $connection->prepare($search_sql);
$search_statement->execute();
$result_set = $search_statement->get_result();

if ($result_set->num_rows === 0) {
    exit("暂无记录!");
}

while ($row = $result_set->fetch_assoc()) {
?>

<tr>
    <td>
        <a href="news_detail.php?news_id=<?php echo $row['news_id']?>"><?php echo $row['title']?></a>
    </td>
    <td>
        <a href="news_edit.php?news_id=<?php echo $row['news_id']?>">编辑</a>
    </td>
    <td>
        <a href="news_delete.php?news_id=<?php echo $row['news_id']?>">删除</a>
    </td>
</tr>
<?php
}

$database_connection->closeConnection();
?>
</table>

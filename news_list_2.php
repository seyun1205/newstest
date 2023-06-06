<?php
header("content-Type: text/html; charset=Utf-8");
include_once("functions/database.php");

if (isset($_GET["message"])) {
    echo $_GET["message"]."<br/>";
}

$database_connection = new DatabaseConnection();
$connection = $database_connection->getConnection();

$page_size = 5;
$page_current = isset($_GET["page_current"]) ? $_GET["page_current"] : 1;
$start = ($page_current - 1) * $page_size;

$search_sql = "SELECT * FROM news ORDER BY news_id DESC LIMIT $start, $page_size";

$keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : "";

if (!empty($keyword)) {
    $search_sql = "SELECT * FROM news WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%' ORDER BY news_id DESC LIMIT $start, $page_size";
}

$result_set = mysqli_query($connection, $search_sql);

if (mysqli_num_rows($result_set) == 0) {
    exit("暂无记录!");
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
while ($row = mysqli_fetch_array($result_set)) {
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

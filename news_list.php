<?php
header("content-Type: text/html; charset=Utf-8");
include_once("functions/database.php");
include_once("functions/page.php");
include_once("functions/is_login.php");

if(!session_id()){
	session_start();
}

if(isset($_GET["message"])){
	echo $_GET["message"]."<br/>";
}

$search_sql = "SELECT * FROM news ORDER BY news_id DESC";

$keyword = "";

if(isset($_GET["keyword"])){
	$keyword = trim($_GET["keyword"]);
	$search_sql = "SELECT * FROM news WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%' ORDER BY news_id DESC";
}

?>

<br/>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>新闻标题</th>
			<th width="40">操作</th>
			<th width="40">操作</th>
		</tr>
	</thead>
<?php

$database_connection = new DatabaseConnection();
$connection = $database_connection->getConnection();

$result_news = mysqli_query($connection, $search_sql);

$total_records = mysqli_num_rows($result_news);

$page_size = 3;

if(isset($_GET["page_current"])){
	$page_current = $_GET["page_current"];
}else{
	$page_current = 1;
}

$start = ($page_current - 1) * $page_size;

$search_sql = "SELECT * FROM news ORDER BY news_id DESC LIMIT $start, $page_size";

if(isset($_GET["keyword"])){
	$keyword = $_GET["keyword"];
	$search_sql = "SELECT * FROM news WHERE title LIKE '%$keyword%' OR content LIKE '%$keyword%' ORDER BY news_id DESC LIMIT $start, $page_size";
}

$result_set = mysqli_query($connection, $search_sql);

if(mysqli_num_rows($result_set) == 0){
	exit("暂无记录!");
}

while($row = mysqli_fetch_array($result_set)){
?>
<tr>
	<td style="width: 500px;">
		<!-- 点击链接插入向数据库增加1 -->
		<a href="index.php?url=news_detail.php&keyword=<?php echo $keyword?>&news_id=<?php echo mb_strcut($row['news_id'], 0, 40, "utf8")?>" onclick="insertValue()"><?php echo mb_strcut($row['title'], 0, 160, "utf8")?></a>
		<script type="text/javascript">
			function insertValue(){
				<?php
					$num = $row['news_id'];
					$add_sql = "UPDATE news SET clicked=clicked+1 WHERE news_id=$num";
					mysqli_query($connection, $add_sql);
				?>
			}
		</script>
	</td>
	<?php
	if(is_admin()){
		echo '<td><a href="index.php?url=news_edit.php&news_id='.$row['news_id'].'">编辑</a></td><td><a href="index.php?url=news_delete.php&news_id='.$row['news_id'].'" onclick="return confirm(\'确定删除吗?\');">删除</a></td>';
	} else {
		echo "<td>/</td><td>/</td>";
	}
	?>
</tr>
<?php
}

$database_connection->closeConnection();
?>
</table>
<?php
$url = $_SERVER["PHP_SELF"];
page($total_records, $page_size, $page_current, $url, $keyword);
?>

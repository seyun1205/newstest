<?php
header('Content-type:text/html;charset=utf-8');
include_once("functions/database.php");

$news_id = $_GET["news_id"];

$sql_news_update = "UPDATE news SET clicked = clicked + 1 WHERE news_id = ?";
$sql_news_detail = "SELECT * FROM news WHERE news_id = ?";
$sql_review_query = "SELECT * FROM review WHERE news_id = ? AND state = '已审核'";

$database_connection = new DatabaseConnection();
$connection = $database_connection->getConnection();

// Update news clicked count
$news_update_statement = $connection->prepare($sql_news_update);
$news_update_statement->bind_param("i", $news_id);
$news_update_statement->execute();

// Fetch news details
$news_detail_statement = $connection->prepare($sql_news_detail);
$news_detail_statement->bind_param("i", $news_id);
$news_detail_statement->execute();
$result_news = $news_detail_statement->get_result();
$count_news = $result_news->num_rows;

// Fetch reviewed comments
$review_query_statement = $connection->prepare($sql_review_query);
$review_query_statement->bind_param("i", $news_id);
$review_query_statement->execute();
$result_review = $review_query_statement->get_result();
$count_reviews = $result_review->num_rows;

if ($count_news == 0) {
    echo "该新闻不存在或已被删除!";
    exit;
}

$news = $result_news->fetch_assoc();
$user_id = $news["user_id"];

// Fetch user information
$sql_user = "SELECT * FROM users WHERE user_id = ?";
$user_statement = $connection->prepare($sql_user);
$user_statement->bind_param("i", $user_id);
$user_statement->execute();
$result_user = $user_statement->get_result();
$user = $result_user->fetch_assoc();

// Fetch category information
$category_id = $news["category_id"];
$sql_category = "SELECT * FROM category WHERE category_id = ?";
$category_statement = $connection->prepare($sql_category);
$category_statement->bind_param("i", $category_id);
$category_statement->execute();
$result_category = $category_statement->get_result();
$category = $result_category->fetch_assoc();

$database_connection->closeConnection();

$title = $news['title'];
$content = $news['content'];
if (isset($_GET['keyword'])) {
    $keyword = $_GET["keyword"];
    $replacement = "<b><i>".$keyword."</b></i>";
    $title = str_replace($keyword, $replacement, $title);
    $content = str_replace($keyword, $replacement, $content);
}
?>

<h3 class="text-center"><?php echo $title?></h3>
<p class="text-center">作者：<?php echo $user['name'];?> 类别：<?php echo $category['name'];?> 发布时间：<?php echo $news['publish_time'];?> 点击次数：<?php echo $news['clicked'];?></p>
<div style="padding: 15px;">
    <?php echo html_entity_decode($content, ENT_QUOTES)?>
</div>
<p>附件-<a href="download.php?attachment=<?php echo urlencode($news['attachment']);?>"><?php echo $news['attachment'];?></a></p>

<div>
    <h4>发表评论</h4>
</div>
<form action="review_save.php" method="post">
    <textarea name="content" class="form-control" rows="3"></textarea><br>
    <input type="hidden" name="news_id" value="<?php echo $news['news_id'];?>">
	<input type="submit" name="评论" class="btn btn-default" value="评论">
</form>
<br>

<?php

// if($count_reviews > 0){
// 	echo "<a href = 'index.php?url=review_news_list.php&news_id=".$news['news_id']."'>共有".$count_reviews."条评论</a></br/>";
// }else{
// 	echo "该新闻暂无评论!<br/>";
// }

$news_id = $news['news_id'];
$sql = "SELECT * FROM review WHERE news_id = ? AND state = '已审核' ORDER BY review_id DESC";

$database_connection = new DatabaseConnection();
$connection = $database_connection->getConnection();

$review_statement = $connection->prepare($sql);
$review_statement->bind_param("i", $news_id);
$review_statement->execute();
$result_set = $review_statement->get_result();

$database_connection->closeConnection();

echo '<div class="well">';
while ($row = $result_set->fetch_assoc()) {
    echo '<p>[ '.$row["publish_time"].' ] [ '.$row["ip"].' ]：'.$row["content"].'</p>';
}
echo "</div>";
?>
<hr>


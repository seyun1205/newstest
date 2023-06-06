<?php
header("content-Type: text/html; charset=Utf-8");
include_once("functions/database.php");
include_once("functions/is_login.php");
if (!session_id()) {
    session_start();
}

$news_id = $_GET["news_id"];

$database_connection = new DatabaseConnection();
$connection = $database_connection->getConnection();

// Fetch news details
$news_detail_statement = $connection->prepare("SELECT * FROM news WHERE news_id = ?");
$news_detail_statement->bind_param("i", $news_id);
$news_detail_statement->execute();
$result_news = $news_detail_statement->get_result();
$news = $result_news->fetch_assoc();

// Fetch categories
$categories_statement = $connection->prepare("SELECT * FROM category");
$categories_statement->execute();
$result_category = $categories_statement->get_result();

$database_connection->closeConnection();
?>

<form action="news_update.php" method="post">
    标题:
    <input type="text" name="title" size="60" value="<?php echo $news['title']?>">
    <br/>
    内容:
    <textarea cols="60" rows="16" name="content"><?php echo html_entity_decode($news['content'], ENT_QUOTES)?></textarea>
    <br/>
    类别:
    <select name="category_id" size="1">
        <?php while ($category = $result_category->fetch_assoc()): ?>
            <option value="<?php echo $category['category_id'];?>" <?php echo ($news['category_id'] == $category['category_id'])?"selected":""?>><?php echo $category['name'];?></option>
        <?php endwhile; ?>
    </select>
    <br/>
    <br/>
    <input type="hidden" name="news_id" value="<?php echo $news_id?>">
    <input type="submit" name="修改" value="修改">
    <input type="button" value="取消" onclick="window.history.back();">
</form>

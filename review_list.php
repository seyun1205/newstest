<?php
header("content-Type: text/html; charset=Utf-8");
include_once("functions/database.php");
include_once("functions/page.php");
include_once("functions/is_login.php");

if (!is_admin()) {
    echo "请管理员登录,管理评论";
    return;
}

$page_size = 3;
$page_current = isset($_GET["page_current"]) ? $_GET["page_current"] : 1;
$start = ($page_current - 1) * $page_size;

$database_connection = new DatabaseConnection();
$connection = $database_connection->getConnection();

// 获取评论记录总数
$total_records = $connection->query("SELECT COUNT(*) FROM review")->fetch_row()[0];

// 查询评论列表
$sql = "SELECT * FROM review ORDER BY review_id DESC LIMIT ?, ?";
$statement = $connection->prepare($sql);
$statement->bind_param("ii", $start, $page_size);
$statement->execute();
$result_set = $statement->get_result();

echo "<table class='table table-bordered' style='margin: 10px 0;'> <thead> <tr> <th>评论内容</th> <th>日期</th> <th>ip地址</th> <th>状态</th>";

// 判断是否为管理员，如果是，则添加操作列
if (is_admin()) {
    echo "<th>操作</th>";
}

echo "</tr> </thead><tbody>";

while ($row = $result_set->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["content"] . "</td>";
    echo "<td>" . $row["publish_time"] . "</td>";
    echo "<td>" . $row["ip"] . "</td>";
    echo "<td>" . $row["state"] . "</td>";

    // 判断是否为管理员，如果是，则添加操作链接
    if (is_admin()) {
        echo "<td>";
        echo "<a href='review_delete.php?review_id=" . $row["review_id"] . "'>删除</a>";
        if ($row["state"] == "未审核") {
            echo " | ";
            echo "<a href='review_verify.php?review_id=" . $row["review_id"] . "'>审核</a>";
        }
        echo "</td>";
    }

    echo "</tr>";
}
echo "</tbody></table>";

$database_connection->closeConnection();

$url = "index.php?url=review_list.php";
page($total_records, $page_size, $page_current, $url, "");
?>

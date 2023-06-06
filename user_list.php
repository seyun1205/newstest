<?php
    header("content-Type: text/html; charset=Utf-8");
    include_once("functions/database.php");
    include_once("functions/page.php");
    include_once("functions/is_login.php");

    session_start();

    if(isset($_GET["message"])){
        echo $_GET["message"]."<br/>";
    }

    if(!is_admin()){
        echo "请管理员登录，管理用户";
        return;
    }

    $database_connection = new DatabaseConnection();
    $connection = $database_connection->getConnection();
    $result_set = mysqli_query($connection, "SELECT * FROM users");

    $total_records = mysqli_num_rows($result_set);
    $page_size = 3;

    $page_current = isset($_GET["page_current"]) ? $_GET["page_current"] : 1;
    $start = ($page_current - 1) * $page_size;

    $result_set = mysqli_query($connection, "SELECT * FROM users LIMIT $start, $page_size");
    $database_connection->closeConnection();

    if(mysqli_num_rows($result_set) == 0){
        exit("暂无记录！");
    }
?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>用户名</th>
            <th>密码</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = mysqli_fetch_array($result_set)): ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td>
                    <?php if (is_admin()): ?>
                        <a href="index.php?url=user_delete.php&user_id=<?php echo $row['user_id']; ?>" onclick="return confirm('确定删除吗？');">删除</a>
                    <?php else: ?>
                        /
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php
$url = "index.php?url=user_list.php";
page($total_records, $page_size, $page_current, $url, "");
?>

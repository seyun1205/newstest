<?php
    header('Content-type:text/html;charset=utf-8');
    include_once("functions/is_login.php");
    if (!session_id()) {
        session_start();
    }
    if (!is_login()) {
        echo "请您登录系统后,再访问该页面!";
        return;
    }
?>

<head>
    <title>Sample CKEditor Site</title>
    <style>
        .body {
            height:max-content;
        }
    </style>
    <script type="text/javascript" src="javascript/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script type="text/javascript">
        window.onload = function() {
            CKEDITOR.replace('content'); //content是textarea的名称
            CKEDITOR.WIDTH = 550;
            $("#form_test").submit(function(e) {
                var fileInput = $('#file_test').get(0).files[0];
                if (fileInput) {
                    return true;
                } else {
                    alert("没有上上传文件，请上传文件");
                    return false;
                }
            });
        };
    </script>
</head>

<body>
    <form method="post" enctype="multipart/form-data" action="news_save.php" charset="Utf-8" id="form_test">
        <div class="form-group">
            <label>标题：</label>
            <input type="text" name="title" class="form-control" placeholder="请输入标题">
        </div>
        <div class="form-group">
            <label>内容:</label>
            <textarea name="content"></textarea>
        </div>
        <div class="form-group">
            <label>类型:</label>
            <select class="form-control" name="category_id">
                <?php
                include_once("functions/database.php");
                $database_connection = new DatabaseConnection();
                $connection = $database_connection->getConnection();
                $sql = "select * from category";
                $result_set = mysqli_query($connection, $sql);
                $database_connection->closeConnection();
                while ($row = mysqli_fetch_array($result_set)) {
                    echo "<option value='" . $row['category_id'] . "'>" . $row['name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label>附件:</label>
            <input type="file" name="news_file" size="50" id="file_test">
            <input type="hidden" name="MAX_FILE_SIZE" value="10485760">
        </div>
        <button type="submit" class="btn btn-primary">提交</button>
        <button type="reset" class="btn btn-default">重置</button>
    </form>
</body>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8">
	<title>欢迎访问新闻发布系统！</title>
    <link rel="stylesheet" type="text/css" href="javascript/bootstrap/css/bootstrap.min.css">
	<!--<link rel="stylesheet" type="text/css" href="css/news.css">-->
    <link rel="stylesheet" href="css/swiper.min.css">
    <style type="text/css">
	    #sidebar{
	      overflow: hidden;
	      width:300px;
	      float: right;
		  padding: 10px;
        }
        .carousel-image {
           width: 100%;
           height: 50%;
           border-radius: 5px;
     }
		#mainbody{
	       box-sizing: border-box;
           overflow: auto;
	       text-align: left;
	       width:760px;
	       padding: 5px;
	       float: left;
        }

        #footer {
            width: 100%;
            bottom: 0;
            height: 80px;
            text-align: center;
            background: #035671;
            color: #FFF;
        }
        #footer ul {
            margin-top: 15px;
            padding-top: 15px;
        }
        #footer li {
            display: inline-block;
            list-style: none;
        }
        #footer li a {
            color: #FFF;
        }
        .login {
            margin: 10px 0;
        }
      
        .on {
            color: #035671 !important;
        }
    </style>
</head>
<body>
	<?php 
		if(isset($_GET['url'])) {
			$t = $_GET['url'];
		} else {
			$t = 'news_list.php';
		}
		$keyword = "";
    if(isset($_GET["keyword"])){
	$keyword = trim($_GET["keyword"]);
	$search_sql = "select * from news where title like '%$keyword%' or content like '%$keyword%' order by news_id desc";
}
	?>
    <nav class="navbar navbar-default">
        <div class="container">
            <marquee  direction="left"  behavior="scroll"  scrollamount="6"  scrolldelay="10"  loop="-1"    height="50"  bgcolor="#2C3539" >
	        <font  face="隶书"  color="#F0F0F0"  size="6">欢迎访问新闻发布系统！&nbsp;&nbsp;&nbsp;&nbsp;欢迎您的到来！</font>
			</marquee>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> 
                <a class="navbar-brand" href="#" co>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;新闻发布系统</a>
                <ul class="nav navbar-nav">
                    <li><a href="index.php?url=news_list.php" <?php if($t == 'news_list.php') echo "class='on'"; ?>>首页</a></li>
                    <li><a href="index.php?url=review_list.php" <?php if($t == 'review_list.php') echo "class='on'"; ?>>评论管理</a></li>
                    <li><a href="index.php?url=category_list.php" <?php if($t == 'category_list.php') echo "class='on'"; ?>>分类浏览</a></li>
                    <li><a href="index.php?url=news_add.php" <?php if($t == 'news_add.php') echo "class='on'"; ?>>新闻发布</a></li>
                    <li><a href="index.php?url=category_add.php" <?php if($t == 'category_add.php') echo "class='on'"; ?>>添加分类</a></li>
                    <li><a href="index.php?url=user_list.php" <?php if($t == 'user_list.php') echo "class='on'"; ?>>用户管理</a></li>
                    <li><a href="javascript:;" data-toggle="modal" data-target="#myModal">用户注册</a></li>
                </ul>
              
		<form class="navbar-form navbar-left" action = "index.php?url=news_list.php" method="get">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="form-group">
          <input type="text" class="form-control" name="keyword" value="<?php echo $keyword?>" placeholder="输入查找关键字">
        </div>
       <div class="form-group">
	    <button type="submit" class="btn btn-default">搜索  <spna class="glyphicon glyphicon-search "></spna></button>
        </div>
      </form>
            </div>
        </div>
    </nav>

    <div class="container" style="position:relative;">
   	<div id = "banner">
			     <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                </ol>
                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="images/02.jpg" alt="..." class="carousel-image">
                    </div>
                    <div class="item">
                        <img src="images/03.jpg" alt="..." class="carousel-image">
                    </div>
					<div class="item">
                        <img src="images/04.jpg" alt="..." class="carousel-image">
                    </div>
					<div class="item">
                        <img src="images/05.jpg" alt="..." class="carousel-image">
                    </div>
					<div class="item">
                        <img src="images/06.jpg" alt="..." class="carousel-image">
                    </div>
					<div class="item">
                        <img src="images/07.jpg" alt="..." class="carousel-image">
                    </div>
                </div>
				 <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
			</div>
		</div>
		
    <div class="main">
		<div id="sidebar">
            <div class="login">
                <?php include_once("login.php"); ?>
            </div>
		</div>
		<div id = "mainbody">
				<div id = "mainfunction">
            <hr>
            <?php
                if(isset($_GET["url"])){
                    $url = $_GET["url"];
                }else{
                    $url = "news_list.php";
                }
                @include_once($url);
            ?>
               </div>
				<div style="clear: both;"></div>
		</div>
    </div>
  </div>

        <div id="footer">
            <ul>
                <li><a href="">版权信息</a></li>&nbsp;&nbsp;
                <li><a href="">联系方式</a></li>&nbsp;&nbsp;
                <li><a href="">相关法律</a></li>&nbsp;&nbsp;
                <li><a href="">举报违法信息</a></li>
            </ul>
            <p >&nbsp;&nbsp;&nbsp;&nbsp;版权所有 092220138</p>
        </div>
<!-- 注册页面 -->
<?php
    // 注册处理逻辑
    $registrationSuccess = false; // 默认注册失败

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];

        // 检查用户名和密码是否都存在
        if (!empty($username) && !empty($password)) {
            // 处理注册逻辑，假设注册成功后设置 $registrationSuccess 变量为 true
            $registrationSuccess = true;
        }
    }
?>
<!-- 注册模态框 -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">请注册</h4>
            </div>
            <div class="modal-body">
                <form action="register.php" method="post">
                    <div class="input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
                        <input type="text" name="username" class="form-control" placeholder="用户名" aria-describedby="sizing-addon1" required>
                    </div>
                    <br/>
                    <div class="input-group input-group-md">
                        <span class="input-group-addon" id="sizing-addon1"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="密码" aria-describedby="sizing-addon1" required>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary">注册</button>
                </form>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                    <?php if ($registrationSuccess): ?>
                        <div class="alert alert-success mt-3">注册成功！</div>
                    <?php else: ?>
                        <div class="alert alert-danger mt-3">请输入用户名和密码。</div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<script src="javascript/jquery-3.3.1.min.js"> </script>
<script src="javascript/bootstrap/js/bootstrap.min.js"> </script>
<script src="javascript/swiper.min.js"> </script>
<script>
	var mySwiper = new Swiper('.swiper-container', {
        autoplay: true,
        pagination: {
            el: '.swiper-pagination',
        }
    })
	var sidebarHeight = document.getElementById("sidebar").clientHeight;
	var mainbodyHeighy = document.getElementById("mainbody").clientHeight;
	if(sidebarHeight < 400 & mainbodyHeighy < 400){
		document.getElementById("sidebar").style.height = "400px";
		document.getElementById("mainbody").style.height = "400px";
	}else{
		if(sidebarHeight < mainbodyHeighy){
			document.getElementById("sidebar").style.height=mainbodyHeighy + "px";
		}else{
			document.getElementById("mainbody").style.height=sidebarHeight + "px";
		}
	}
</script>

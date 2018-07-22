<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>首页</title>
		<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
		<script src="/static/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="/static/css/style.css"/>
	</head>
	<style type="text/css">
		.container .text_header .text_info span{
			padding-left:20px;
		}
		.container .text_header .text_title{
			line-height: 28px;
		}
		.container .text_body{
			padding:20px 0px;
		}
		.container .text_header{
			height: 80px;
			border-bottom: 1px solid gainsboro;
		}
	</style>
	<body>
		<div class="header">
			<div class="w-1200">
				<div class="logo">
					<?php echo ($COMPANY_NAME); ?>
				</div>
				<div class="search">
					<input type="text" class="form-control" placeholder="搜索" aria-describedby="basic-addon1">
					<span class="start_search glyphicon glyphicon-search"></span>
				</div>
				<div class="userinfo">欢迎您，<?php echo $_SESSION['REAL_NAME']; ?></div>
			</div>
		</div>
		<!--容器布局start-->
		<div class="container">
			<div class="text_header">
				<div class="text_title"><h1><?php echo ($title); ?></h1></div>
				<div class="text_info"><span class="glyphicon glyphicon-user"><?php echo ($user); ?></span><span class="glyphicon glyphicon-tint"><?php echo ($time); ?></span></div>
			</div>
			<div class="text_body">
				<?php echo ($content); ?>
			</div>
		</div>
		<!--页脚start-->
		<div class="footer">
				<?php echo '© '.date("Y");?> <?php echo ($FOOTER_TEXT); ?>
		</div>
		<!--页脚end-->
	</body>
</html>
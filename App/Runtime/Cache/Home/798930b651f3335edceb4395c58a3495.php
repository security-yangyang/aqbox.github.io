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
			margin:20px 0px;
			height:auto;
		}
		.container .text_body{
			padding:20px 0px;
		}
		.container .text_header{
			height: auto;
			border-bottom: 1px solid gainsboro;
		}
		.container .text_info{
			margin:10px 0px;
		}
		.container .text_info span{
			font-size:14px;
			padding:5px;
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
				<div class="userinfo"><?php echo $_SESSION['REAL_NAME'].'&nbsp;&nbsp';if(!empty($_SESSION['REAL_NAME'])){echo '<span class="glyphicon glyphicon-log-out"><a style="color:white;" href="/Home/Login/act?act=logout">注销</a></span>';} ?></div></div>
			</div>
		</div>
		<!--容器布局start-->
		<div class="container" style="background:ghostwhite">
			<div class="text_header">
				<div class="text_title"><h1><?php echo ($title); ?></h1></div>
				<div class="text_info"><span style="padding-left:0px;"><a href="/"><返回</a></span><span class="glyphicon glyphicon-user"><?php echo ($user); ?></span><span class="glyphicon glyphicon-time"><?php echo ($time); ?></span><?php echo ($edit); echo ($delete); ?></div>
			</div>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">警告</h4>
			      </div>
			      <div class="modal-body">
			        操作不可逆，确认删除？
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary enter_del">确认删除</button>
			      </div>
			    </div>
			  </div>
			</div>
			<div class="text_body">
				<?php echo ($content); ?>
			</div>
			<p style="width:80%;background:#272822;float:left;color:white;line-height:30px;padding-left:10px;"><storng>提示：</storng>本站内容均来自第三方平台，如有侵权，请联系删除！<p style="background:#272822;line-height:30px;width:20%;color:white;float:right;text-align:right;padding-right:10px;">联系邮箱：<a href="mailto://hi@168linux.cn">hi@168linux.cn</a></p></p>
		</div>
		<!--页脚start-->
		<div class="footer">
				<?php echo '© '.date("Y");?> <?php echo ($FOOTER_TEXT); ?>
		</div>
		<!--页脚end-->
	</body>
	<script src="/static/js/public.js"></script> 
</html>
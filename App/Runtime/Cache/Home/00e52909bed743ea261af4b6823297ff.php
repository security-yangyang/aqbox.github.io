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
				<div class="userinfo">
				<?php echo $_SESSION['REAL_NAME'].'&nbsp;&nbsp';if(!empty($_SESSION['REAL_NAME'])){echo '<span class="glyphicon glyphicon-log-out"><a style="color:white;" href="/Home/Login/act?act=logout">注销</a></span>';} ?></div>
			</div>
		</div>
		<!--容器布局start-->
		<div class="container"">
			<!--导航栏start-->
			<div class="navBar">
				<ul class="true">
					<li class="ms news"><span class="l glyphicon glyphicon-fire"></span> 行业资讯</li>
				</ul>
				<ul>
					<li class="ms dbzx"><span class="l glyphicon glyphicon-lamp"></span> 等保咨询<span class="ic dbzx_icon glyphicon glyphicon-chevron-down"></span></li>
					<li class="two dbzx2 zzdj two-true"><span class="l glyphicon glyphicon-bell"></span> 自主定级</li>
					<li class="two dbzx2 dbmn"><span class="l glyphicon glyphicon-bell"></span> 等保模拟</li>
					<li class="two dbzx2 dbzc"><span class="l glyphicon glyphicon-bell"></span> 等保自查</li>
				</ul>
				<ul>
					<li class="ms bztx"><span class="l glyphicon glyphicon-menu-hamburger"></span> 标准体系<span class="ic bztx_icon glyphicon glyphicon-chevron-down"></span></li>
					<li class="two bztx2 lgb two-true"><span class="l glyphicon glyphicon-bell"></span> 老国标（等保1.0）</li>
					<li class="two bztx2 xgb"><span class="l glyphicon glyphicon-bell"></span> 新国标（等保2.0）</li>
					<li class="two bztx2 hybz"><span class="l glyphicon glyphicon-bell"></span> 行业标准体系</li>
				</ul>
				<ul>
					<li class="ms zsk"><span class="l glyphicon glyphicon-book"></span> 知识库</li>
				</ul>
				<ul>
					<li class="ms lxw"><span class="l glyphicon glyphicon-map-marker"></span> 联系我</li>
				</ul>
			</div>
			<!--导航栏end-->
			<!--正文start-->
			<div class="content"></div> 
			<!--正文end-->
		</div>
		<!--容器布局end-->
		<!--页脚start-->
		<div class="footer">
				<?php echo '© '.date("Y");?> <?php echo ($FOOTER_TEXT); ?>
		</div>
		<!--页脚end-->
	</body>
	<script src="/static/js/navBar.js" type="text/javascript" charset="utf-8"></script>
	<script src="/static/js/page_load.js" type="text/javascript" charset="utf-8"></script>
	<script src="/static/js/public.js"></script> 
</html>
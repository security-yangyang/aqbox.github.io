<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"> -->
		<title>后台首页</title>
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/static/css/style.css"/> 
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
		<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
	</head>
	<body>
		<div class="header">
			<div class="w-1200">
				<div class="logo">
					<?php echo ($COMPANY_NAME); ?>-后台管理系统
				</div>
				<div class="userinfo">
				<?php echo $_SESSION['MANAGER'].'&nbsp;&nbsp';if(!empty($_SESSION['MANAGER'])){echo '<span class="glyphicon glyphicon-log-out"><a style="color:white;" href="/Manager/Login/act?act=logout">注销</a></span>';} ?></div>
			</div>
		</div>
		<!--容器布局start-->
		<div class="container" style="width: 1170px;max-width: none !important; ">
			<!--导航栏start-->
			<div class="navBar">
				<ul class="true">
					<li class="ms zxfb"><span class="l glyphicon glyphicon-fire"></span> 资讯发布</li>
				</ul>
				<!-- <ul>
					<li class="ms dbzx"><span class="l glyphicon glyphicon-lamp"></span> 等保咨询<span class="ic dbzx_icon glyphicon glyphicon-chevron-down"></span></li>
					<li class="two dbzx2 zzdj two-true"><span class="l glyphicon glyphicon-bell"></span> 自主定级</li>
					<li class="two dbzx2 dbmn"><span class="l glyphicon glyphicon-bell"></span> 等保模拟</li>
					<li class="two dbzx2 dbzc"><span class="l glyphicon glyphicon-bell"></span> 等保自查</li>
				</ul>
				 -->
				<ul>
					<li class="ms bzgl"><span class="l glyphicon glyphicon-menu-hamburger"></span> 标准管理<span class="ic bztx_icon glyphicon glyphicon-chevron-down"></span></li>
					<li class="two bztx2 lgb two-true"><span class="l glyphicon glyphicon-bell"></span> 老国标（等保1.0）</li>
					<li class="two bztx2 xgb"><span class="l glyphicon glyphicon-bell"></span> 新国标（等保2.0）</li>
					<li class="two bztx2 hybz"><span class="l glyphicon glyphicon-bell"></span> 行业标准体系</li>
				</ul>
				<ul>
					<li class="ms yhgl"><span class="l glyphicon glyphicon-book"></span> 用户管理</li>
				</ul>
				<ul>
					<li class="ms xtsz"><span class="l glyphicon glyphicon-map-marker"></span> 系统设置</li>
				</ul>
			</div>
			<!--导航栏end-->
			<!--正文start-->
			<div class="content" style="padding:30px;"></div> 
			<!--正文end-->
		</div>
		<!--容器布局end-->
		<!--页脚start-->
		<div class="footer">
				<?php echo '© '.date("Y");?> <?php echo ($FOOTER_TEXT); ?>
		</div>
		<!--页脚end-->
	</body>
	<script type="text/javascript" charset="utf-8">
	$height = $(window).height()-140;
	$width = $(window).width();
	$('.navBar').css('height',$height+'px');
	$('.content').css('height',$height+'px');
	
	$('.bzgl').click(function(){
		$('.bzgl_icon').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
		$('.bztx2').show();
	})
	$('.ms').click(function(){
		$(this).parent().addClass('true').siblings().removeClass('true');
	})
	$('.two').click(function(){
		$(this).addClass('two-true').siblings().removeClass('two-true');
	})
	$('.zxfb,.yhgl,.xtsz').click(function(){
		$('.dbzx_icon,.bztx_icon').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
		$('.dbzx2,.bztx2').hide();
	})
	</script>
	<script src="/static/js/mgr_load.js" type="text/javascript" charset="utf-8"></script>
</html>
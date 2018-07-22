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
	<style>
.w-930{
		width:930px;
		margin:0 auto;
		padding-top:100px;
	}
	.loginBox{
		width:360px;
		height: 400px;
		height:auto;
		margin:0 auto;
		box-shadow: 1px 2px 20px black;
		padding-bottom: 30px;
	}
	a:focus{
		outline: none;
	}
	.nav_tag{
		width:50%;
		text-align: center;
	}
	.acTitle{
		font-family: "微软雅黑";
		font-size: 28px;
		color:black;
		text-align: center;
		padding-top:20px;
		line-height: 50px;
	}
	.input-box{
		width:300px;
		margin:0px 30px;
	}
	.uic{
		display: inline-block;
		top:30px;
		left:15px;
		z-index: 9;
		position: relative;
	}
	.user{
		padding-left:40px;
	}
	.err{
		display: inline-block;
		color:red;
		display: none;
	}
		
	</style>
	<body>
		<div class="header">
			<div class="w-1200">
				<div class="logo">
					<?php echo ($COMPANY_NAME); ?>
				</div>
				<div class="userinfo"><?php echo $_SESSION['MANAGER']; ?></div>
			</div>
		</div>
		<!--容器布局start-->
		<div class="container">
			<!--正文start-->
			<div class="w-930">
				<div class="loginBox">
					<p class="acTitle">用户登录</p>
					<div class="input-box">
						<span class="uic glyphicon glyphicon-user"></span>
						<input type="text" class="user form-control username" placeholder="用户名" />
					</div>
					<div class="input-box">
						<span class="uic glyphicon glyphicon-lock"></span>
						<input type="password" class="user form-control password" placeholder="密码" />
					</div>
					<?php echo ($vertify); ?>
					<?php echo ($err_btn); ?>
				</div>
			</div> 
			<!--正文end-->
		</div>
		<!--容器布局end-->
	</body>
	<script>
		$('.username').focus();
		$('input').focus(function(){
			$('.err').hide();
		})
		$('.login_btn').click(function(){
			var data = {'username':$('.username').val(),'password':$('.password').val(),'vertify':$('.vertify').val()};
			$.ajax({
				type:"post",
				url:"/Manager/Login/act?act=Login",
				data:data,
				dataType:"json",
				success:function(e){
					if(e.code == 200){
						$('.userinfo').text(e.data.username);
						window.location.href="/Manager/Index/index";
					}else{
						$('.err').show().text('*'+e.msg);
					}
				}
			})
		})
	</script>
	<script src="/static/js/public.js"></script>
</html>
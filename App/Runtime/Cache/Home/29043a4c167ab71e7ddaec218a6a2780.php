<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
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
	.err,.reg_err{
		display: inline-block;
		color:red;
		display: none;
	}
</style>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
<div class="w-930">
	<div class="loginBox">
		<p class="acTitle">用户登录</p>
		<ul class="nav nav-tabs">
			<li class="active nav_tag"><a href="#btn_login" class="to_login" data-toggle="tab">用户登录</a></li>
			<li class="nav_tag"><a href="#btn_register" class="to_register" data-toggle="tab">用户注册</a></li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade in active" id="btn_login">
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
			<div class="tab-pane fade" id="btn_register">
				<div class="input-box">
					<span class="uic glyphicon glyphicon-user"></span>
					<input type="text" class="user form-control reg_username" placeholder="用户名" />
				</div>
				<div class="input-box">
					<span class="uic glyphicon glyphicon-envelope"></span>
					<input type="text" class="user form-control reg_email" placeholder="邮箱" />
				</div>
				<div class="input-box">
					<span class="uic glyphicon glyphicon-lock"></span>
					<input type="password" class="user form-control reg_password1" placeholder="密码" />
				</div>
				<div class="input-box">
					<span class="uic glyphicon glyphicon-lock"></span>
					<input type="password" class="user form-control reg_password2" placeholder="确认密码" />
				</div>
				<?php echo ($vertify); ?>
				<?php echo ($reg_btn); ?>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.to_login').click(function(){
		$('.acTitle').html('立即登录');
	})
	$('.to_register').click(function(){
		$('.acTitle').html('立即注册');
	})
	$('.username').focus();
	$('.username,.password').focus(function(){
		$('.err').hide();
	})
</script>
<script>
	$('.login_btn').click(function(){
		var data = {'username':$('.username').val(),'password':$('.password').val(),'vertify':$('.vertify').val()};
		$.ajax({
			type:"post",
			url:"/Home/Login/act?act=Login",
			data:data,
			dataType:"json",
			success:function(e){
				if(e.code == 200){
					$('.userinfo').text('欢迎您，'+e.data.username);
				}else{
					$('.err').show().text('*'+e.msg);
				}
			}
		})
	})
</script>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>后台首页</title>
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/static/css/style.css"/>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
		<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
		<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
		<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
		<style>
			.editor{
				height:300px;
				overflow:scroll;
				overflow-x:hidden;
			}
			input{
				margin:20px 0px;
			}
		</style>
	</head>
	<body>
		<div class="header">
			<div class="w-1200">
				<div class="logo_ht">
					<?php echo ($COMPANY_NAME); ?>-后台管理系统
				</div>
				<div class="userinfo"><?php echo $_SESSION['MANAGER'];if(!empty($_SESSION['MANAGER'])){echo '<span class="glyphicon glyphicon-log-out"><a style="color:white;" href="/Manager/Login/act?act=logout">注销</a></span>';} ?></div>
			</div>
		</div>
		<div class="container">
			<div style="margin-top:20px;display:none;" class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				文章修改成功,2s后自动跳转！
			</div>
			<input type="hidden" class="id" value="<?php echo ($text_id); ?>" /> 
			<input type="text" class="form-control title" value="<?php echo ($title); ?>"  placeholder="请输入标题" />
			<input type="text" class="form-control url" value="<?php echo ($url); ?>"  placeholder="请输入图片链接" />
			<div class="editor summernote"><?php echo ($content); ?></div>
			<button class="save_text btn btn-primary">保存</button>
		</div>
	</body>
	<script>
		$(document).ready(function() {
			$('.summernote').summernote();
		});
		$('.summernote').summernote({
			  height: 300,                 // set editor height
			  minHeight: null,             // set minimum height of editor
			  maxHeight: null,             // set maximum height of editor
			  focus: true                  // set focus to editable area after initializing summernote
		});
		$('.save_text').click(function(){
			var $title = $('.title').val();
			var $url = $('.url').val();
			var $content = $('.summernote').summernote('code');

			var $re1 = new RegExp("<.+?>","g");//匹配html标签的正则表达式，"g"是搜索匹配多个符合的内容
			var $ltt_msg = $content.replace($re1,'');//执行替换成空字符
			
			$.ajax({
				url:"/Manager/Index/modify?id="+$('.id').val(),
				type:"post",
				data:{'title':$title,'url':$url,'content':$content,'head_text':$ltt_msg},
				dataType:"json",
				success:function(ret){
					if(ret.code == 200){
						$('.alert').show();
						setTimeout(function(){
							$('.alert').hide();
							window.location.href="/Home/News/view?id="+$('.id').val();
						},2000);
					}
				}
			})
		})
	</script>
	<script src="/static/js/public.js"></script> 
</html>
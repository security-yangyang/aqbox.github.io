<?php if (!defined('THINK_PATH')) exit();?>		<style>
			.editor{
				height:300px;
				overflow:scroll;
				overflow-x:hidden;
			}
			input{
				margin:20px 0px;
			}
		</style>
			<h4>资讯发布</h4>
			<div style="margin-top:20px;display:none;" class="alert alert-info alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<input type="text" class="form-control title"  placeholder="请输入标题" />
			<input type="text" class="form-control url"  placeholder="请输入图片链接" />
			<div class="editor summernote"></div>
			<button class="save_text btn btn-primary">保存</button>
		</div>
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
				url:"/Manager/Index/addContent",
				type:"post",
				data:{'title':$title,'url':$url,'content':$content,'head_text':$ltt_msg},
				dataType:"json",
				success:function(ret){
					if(ret.code == 200){
						$('.alert').show().html('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>文章发布成功！');
						$('.title,.url').val('');
						$('.summernote').summernote('reset');
						setTimeout(function(){
							$('.alert').hide();
						},2000);
					}else{
						$('.alert').show().addClass('alert-warning').html('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+ret.msg);
					}					
				}
			})
		})
		$('.title,.url,.summernote').focus(function(){
			$('.alert').hide();
		})
	</script>
</html>
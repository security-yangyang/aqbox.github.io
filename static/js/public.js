$('.logo').click(function(){
	window.location.href="/";
}).hover(function(){
	$(this).attr('title','安全盒');
})
$('.enter_del').click(function(){
	$url = $('.delete').attr('src');
	$.ajax({
		url:$url,
		type:'get',
		dataTyle:'json',
		success:function(ret){
			if(ret.code == 200){
				$(this).hide();
				alert('删除成功');
				window.location.href="/";				
			}
		}
	})
})
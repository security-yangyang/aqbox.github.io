function reset(){
	$.ajax({
		type:"get",
		url:"/Home/Login/index",
		dataType:"html",
		success:function(ret){
			$('.content').html(ret);
		}
	});
}
$.ajax({
	type:"get",
	url:"/Home/News/index",
	dataType:"html",
	success:function(ret){
		$('.content').html(ret);
	}
});
$('.news').click(function(){
	$.ajax({
		type:"get",
		url:"/Home/News/index",
		dataType:"html",
		success:function(ret){
			$('.content').html(ret);
		}
	});
})

$('.dbzx,.zzdj').click(function(){
	$.ajax({
		type:"get",
		url:"/Home/Dengbao/zzdj",
		dataType:"html",
		success:function(ret){
			if(ret == 400){
				reset();
			}else{
				$('.content').html(ret);				
			}
		}
	});
})

$('.dbmn').click(function(){
	$.ajax({
		type:"get",
		url:"/Home/Dengbao/dbmn",
		dataType:"html",
		success:function(ret){
			if(ret == 400){
				reset();
			}else{
				$('.content').html(ret);				
			}
		}
	});
})

$('.dbzc').click(function(){
	$.ajax({
		type:"get",
		url:"/Home/Dengbao/dbzc",
		dataType:"html",
		success:function(ret){
			if(ret == 400){
				reset();
			}else{
				$('.content').html(ret);				
			}
		}
	});
})

$('.bztx,.lgb').click(function(){
	$.ajax({
		type:"get",
		url:"/Home/Biaozhun/lgb",
		dataType:"html",
		success:function(ret){
			if(ret == 400){
				reset();
			}else{
				$('.content').html(ret);				
			}
		}
	});
})

$('.xgb').click(function(){
	$.ajax({
		type:"get",
		url:"/Home/Biaozhun/xgb",
		dataType:"html",
		success:function(ret){
			if(ret == 400){
				reset();
			}else{
				$('.content').html(ret);				
			}
		}
	});
})

$('.hybz').click(function(){
	$.ajax({
		type:"get",
		url:"/Home/Biaozhun/hybz",
		dataType:"html",
		success:function(ret){
			$('.content').html(ret);
		}
	});
})

$('.zsk').click(function(){
	$.ajax({
		type:"get",
		url:"/Home/Wiki/wiki",
		dataType:"html",
		success:function(ret){
			$('.content').html(ret);
		}
	});
})

$('.lxw').click(function(){
	$.ajax({
		type:"get",
		url:"/Home/About/about",
		dataType:"html",
		success:function(ret){
			$('.content').html(ret);
		}
	});
})
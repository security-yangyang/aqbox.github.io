$height = $(window).height()-140;
$width = $(window).width();
$('.navBar').css('height',$height+'px');
$('.content').css('height',$height+'px');


$('.dbzx').click(function(){
	$('.dbzx_icon').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
	$('.dbzx2').show();
	$('.bztx_icon').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
	$('.bztx2').hide();
	$('.two').eq(0).addClass('two-true').siblings().removeClass('two-true');
})
$('.bztx').click(function(){
	$('.bztx_icon').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
	$('.bztx2').show();
	$('.dbzx_icon').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
	$('.dbzx2').hide();
	$('.two').eq(3).addClass('two-true').siblings().removeClass('two-true');
})
$('.ms').click(function(){
	$(this).parent().addClass('true').siblings().removeClass('true');
})
$('.two').click(function(){
	$(this).addClass('two-true').siblings().removeClass('two-true');
})
$('.news,.zsk,.lxw').click(function(){
	$('.dbzx_icon,.bztx_icon').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
	$('.dbzx2,.bztx2').hide();
})
$height = $(window).height()-140;
$width = $(window).width();
$('.navBar').css('height',$height+'px');
$('.content').css('height',$height+'px');
$('.w-930').css('height',$height+'px').css('width',$width+'px');

$('.dbzx').click(function(){
	$('.dbzx_icon').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
	$('.dbzx2').show();
	$('.bztx_icon').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
	$('.bztx2').hide();
})
$('.bztx').click(function(){
	$('.bztx_icon').removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
	$('.bztx2').show();
	$('.dbzx_icon').removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
	$('.dbzx2').hide();
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
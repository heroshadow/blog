
$(function(){
	//导航隐藏
	$('#daohang').css('display','none');
	//鼠标移入事件显示导航
	$('.orderDivMain').mouseover(function(){
		$('.orderDivId').css('display','block');
	})
	//鼠标离开事件 用mouserleave 
	$('.orderDivId,').mouseleave(function(){
		$('.orderDivId').css('display','none');
	})
})

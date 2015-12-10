$(function(){
		//分类导航
	$('.orderDivId dl').hover(function(){
		//索引
		var n = $(this).index();
		//dd的top值
		var j = n*62-2+'px';
		//索引n的 dl和dd的top值相加 大于orderDivId高度 为负 小于为正
		var x = $('.orderDivId dl dd').eq(n).height();
		if((parseInt(j))+x<=580){
			j = n*62-2+'px';
		}else{
			j=  (556-x+'px');
		}
		$(this).addClass('hov').children('dd').css('top',j).siblings('dl').removeClass('hov');
	},function(){
		$(this).removeClass('hov');
	})
})

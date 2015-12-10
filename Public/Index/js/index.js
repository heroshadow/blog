$(function(){
	//轮播图
	//定义一个参数 自动轮播时候调用
	n=0;
	$('.slide_control a').mouseover(function(){
		n = $(this).index();
		$(this).addClass('mall_dot_hover').siblings('a').removeClass(' mall_dot_hover');
		$('.bannerWrap li').eq(n).addClass('on').fadeIn().css('display','list-item').siblings('li').removeClass('on').fadeOut();
	})
	//自动轮播
	function aaa(){
		n++
		if(n==5){
			n=0;
		}
		$('.slide_control a').eq(n).addClass('mall_dot_hover').siblings('a').removeClass(' mall_dot_hover');
		$('.bannerWrap li').eq(n).addClass('on').fadeIn().css('display','list-item').siblings('li').removeClass('on').fadeOut();
	}
	time = setInterval(aaa,2000);
	
	//移入停止轮播 显示左右箭头
	$('.mtsBanner').hover(function(){
		clearInterval(time);
		$('.move_left').css('display','inline');
		$('.move_right').css('display','inline');
	},function(){
		$('.move_left').css('display','none');
		$('.move_right').css('display','none');
		time = setInterval(aaa,2000);
	})
	//左右切换箭头轮播
	$('.move_left').click(function(){
		n--;
		if(n==-1){
			n=4
		}
		$('.slide_control a').eq(n).addClass('mall_dot_hover').siblings('a').removeClass(' mall_dot_hover');
		$('.bannerWrap li').eq(n).addClass('on').fadeIn().css('display','list-item').siblings('li').removeClass('on').fadeOut();
	})
	$('.move_right').click(function(){
		n++;
		if(n==5){
			n=0
		}
		$('.slide_control a').eq(n).addClass('mall_dot_hover').siblings('a').removeClass(' mall_dot_hover');
		$('.bannerWrap li').eq(n).addClass('on').fadeIn().css('display','list-item').siblings('li').removeClass('on').fadeOut();
	})
	
	//鼠标移入首页列表图透明度变化
	$('.section img').mouseover(function(){
		$(this).stop().animate({opacity:'0.8'},400,function(){
			$(this).animate({opacity:'1'},400);
		})
	})
	
	
	
	
})

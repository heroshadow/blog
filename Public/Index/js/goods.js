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
	
	//小图鼠标移入事件 给a链接添加class显 四边框框效果
	$('.move_box a').mouseover(function(){
		var n = $(this).index();
		$(this).addClass('on').siblings('a').removeClass('on');
		$('.info_l dt img').eq(n).css('display','block').siblings('img').css('display','none');
	})
	//tab切换页
	$('.s-left-list ul li').click(function(){
		var n = $(this).index();
		$(this).addClass('link-suit-select').siblings('li').removeClass('link-suit-select');
		if(n==0){
			//布局原因  product-detail-div'不在同一级 分开抓取
			$('.product-detail-div').css('display','none');
			$('.product-detail-div:first').css('display','block');	
		}else{
			$('.product-detail-div:first').css('display','none');
			$('.product-detail-div').eq(n).css('display','block').siblings().css('display','none');
		}
	})
	//点击添加class on
		$('.shopSize li').click(function(){
		//点击添加curclass
		$(this).addClass('on').siblings('li').removeClass('on');
		var len = $('.shopSize').length;
		var blueLen = $('.shopSize .on').length;
		//长度相等 循环所有带.cur 元素 获取商品属性 组合查货品列表库存和附加价格
		if(len==blueLen){
			var data = '';
			$.each($('.shopSize .on'),function($v,$k){
				data+= $(this).attr('gaid')+',';
			})
			$.ajax({
				type:"post",
				url:gurl,
				data:'merge='+data,
				dataType:'json',
				success:function(phpData){
					if(!phpData.kucun){
						$('.kucun').text('商品库存不足');
						//移除class 防止点击事件
						$('#tocart').removeClass('tocart');
						$('#topanic').removeClass('topanic');
					}else{
						
						//添加class 点击事件
						$('#tocart').addClass('tocart');
						$('#topanic').addClass('topanic');
						//商品规格相加库存
						$('.kucun').text('库存'+phpData.kucun+'件');
						//给span添加自定义 元素kucun 抓取用
						$('.kucun').attr('kucun',phpData.kucun);
						//id用货品列表glid 防止同一样商品不同规格添加购物车重复 之后根据glid减库存
						$("input[name='id']").val(phpData.glid);
						//商品价格+颜色规格附加价格赋给元素
						var price = (sprice+phpData.ex);
						$('#secooPriceJs').text(price );
						//存入隐藏域 添加购物车时抓取
						$("input[name='price']").attr('value',price);
					}
					
				}
			});
		}
	})
	
	//加减商品数量
	$('.up').click(function(){
		var n=$('#num').val();
		if(n==$('.kucun').attr('kucun')) return;
		n++
		$('#num').attr('value',n);
		$("input[name='num']").attr('value',n);
	})
	//减少商品
	$('.down').click(function(){
		var n=$('#num').val();
		
		if(n==1){
			return;
		}else{
			n--;
			$('#num').val(n);
			$("input[name='num']").attr('value',n);
		}
	})
//	$('.down,.up').change(function(){
//		if(n==1){
//			$('.down').css('cursor','not-allowed');
//		}else{
//			$('.down').css('cursor','pointer');
//		}
//	});
	
	//数量输入失去焦点获得value 赋给隐藏域
	$('#num').blur(function(){
		var num =$(this).val();
		$('input[name="num"]').attr('value',num);
	}
	)
	//添加商品到购物车
	$('.tocart').click(function(){
		//获取规格长度
		var len = $('.shopSize').length;
		//获取有.on这个class元素的个数
		var blueLen = $('.shopSize .on').length;
		//相等发送ajax
		if(len==blueLen){
			
			$.each($('.on a span'), function($k,$v) {
		//循环定义变量 赋给 input
				var name = $(this).parent().parent().parent().parent().siblings('div').text()
				var value=$(this).text();
				$('input[name="options[]"]').eq($k).val(name+':'+value);
			});
			var goodsData = $('.goods').serialize();
			$.ajax({
				type:'post',
				url:cart_url,
				data:goodsData,				
				dataType:'json',
				success:function(phpData){
					$('.love_tips').css('display','block');
					var height=$(document.body).height();
					$('.newblackMask').css({'height':height,'opacity':0.5}).fadeIn();
					$('#cat').text('('+phpData.cart.total_rows+')')
				}
			})
		}else{
			alert('请选择规格和尺寸');
		}
			
	})
	//立即抢购
		$('.topanic').click(function(){
		//获取规格长度
		var len = $('.shopSize').length;
		//获取有.on这个class元素的个数
		var blueLen = $('.shopSize .on').length;
		//相等发送ajax
		if(len==blueLen){
			$.each($('.on a span'), function($k,$v) {
		//循环定义变量 赋给 input
				var name = $(this).parent().parent().parent().parent().siblings('div').text()
				var value=$(this).text();
				$('input[name="options[]"]').eq($k).val(name+':'+value);
			});
			var goodsData = $('.goods').serialize();
			$.ajax({
				type:'post',
				url:cart_url,
				data:goodsData,				
				dataType:'json',
				success:function(phpData){
					$('.cart span').text('('+phpData.total_rows+')')
					//添加成功直接跳转购物车地址
					location.href=loca_url;
				}
			})
		}else{
			alert('请选择规格和尺寸');
		}
			
	})
	
	//点击关闭弹出窗口
	$('.winboxClose').click(function(){
		$('.love_tips').css('display','none');
		$('.newblackMask').fadeOut();
	})
	//套用winboxClose点击事件
	$('.buy').click(function(){
		$('.winboxClose').click();
	})
$(document.body).height()
})

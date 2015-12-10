$(function(){
	//删除商品 更新购物车
	$('.del').click(function(){
		if(confirm('确认删除这件商品么?')){
			var sid = $(this).attr('sid');
			$(this).parent().parent('.addChecked').css('display','none');
			$.ajax({
				type:"post",
				url:url_update,
				data:{'num':0,'sid':sid},
				dataType:'json',
				success:function(phpData){
					$('.goodsNum').text('商品数量总计：'+phpData.total_rows+'件');	
					$('.totalPriceBottom strong').text(phpData.total);
					if(phpData.total_rows==0){
						$('.nullCart').css('display','block');
						$('.centerBox').css('display','none');
					}
				}
			});
		}
	})
	//异步增加商品数量
		$('.cMinus').click(function(){
			//获取当前元素下的input的值 ++
			var num =$(this).siblings('div').find('.Num').val();
			num++;
			//++后赋给当前input
			$(this).siblings('div').find('.Num').val(num);
			//获取购物车类商品唯一id
			var sid = $(this).siblings('div').find('.Num').attr('sid');
			//发送ajax 更新购物车
			var mythis = $(this);
			$.ajax({
				type:"post",
				url:url_update,
				data:{'num':num,'sid':sid},
				dataType:'json',		
				success:function(phpData){
					//把小计,总价格通过ajax修改
					$('.goodsNum').text('商品数量总计：'+phpData.total_rows+'件');	
					$('.totalPriceBottom strong').text(phpData.total);
					//找到当前商品的小计价钱
					mythis.parent().parent().siblings('td').find('.xiaoji').text(phpData.xiaoji);
					
				}
			});
		})
	//异步减少商品数量
	$('.cPlus').click(function(){
		var num =$(this).siblings('div').find('.Num').val();
		//当num为1的时候 点击删除商品 隐藏当前行的tr
		if(num==1){
			$(this).parent().parent('td').siblings('td').find('.del').click();
		}else{
			//获取input值--			
			num--;	
			//--后赋给input
			$(this).siblings('div').find('.Num').val(num);
			//获取购物车添加时的商品唯一id
			var sid = $(this).siblings('div').find('.Num').attr('sid');
			//定义$(this) ajax里不能直接用$(this)
			var mythis = $(this);
			$.ajax({
				type:"post",
				url:url_update,
				data:{'num':num,'sid':sid},
				dataType:'json',
				success:function(phpData){
					//把小计,总价格通过ajax修改
					$('.goodsNum').text('商品数量总计：'+phpData.total_rows+'件');	
					$('.totalPriceBottom strong').text(phpData.total);
					//找到当前父级.heji 添加每个商品小计价钱
					mythis.parent().parent().siblings('td').find('.xiaoji').text(phpData.xiaoji);
				}
			});
		}	
	})
	$('.Num').focus(function(){
		//定义一个常量 保存获得焦点时候商品数量
		 n =$(this).val();	
	})
	//数量输入框 失去焦点发异步
	$('.Num').blur(function(){
		var num =$(this).val();
		if(num>0){
			var sid =$(this).attr('sid');
			var mythis = $(this);
			$.ajax({
				type:"post",
				url:url_update,
				data:{'num':num,'sid':sid},
				dataType:'json',
				success:function(phpData){
					//把小计,总价格通过ajax修改
					$('.goodsNum').text('商品数量总计：'+phpData.total_rows+'件');	
					$('.totalPriceBottom strong').text(phpData.total);
					//找到当前父级.heji 添加每个商品小计价钱
					mythis.parent().praent().parent('td').siblings('td').find('.xiaoji').text(phpData.xiaoji);
				}
			});
		}else if(num=0){
			$(this).parent().parent().parent('td').siblings('td').find('.del').click();
		}else{
			alert('请输入正确商品数量');
			$('.Num').val(n);
		}
	})
	//全部选中复选框
	$('input:[name="choseAll"]').click(function(){	
		if ($(this).attr("checked")) {
		$("input[name='choseAll']").attr("checked", "checked");
		$("input[name='sel']").attr("checked", "checked");
		}
		else {
		$("input[name='choseAll']").attr("checked", null);
		$("input[name='sel']").attr("checked", null);
		}
	})
	
	//商品不选中 全选中框不选中
	$("input[name='sel']").click(function(){
//		if($(this).attr("checked")){
//			alert(1);
//		}
		
//		if ($(this).attr("checked")){
//			$("input[name='choseAll']").attr("checked", "checked");
//			$(this).attr("checked", "checked");
//			$(this).parent().parent('tr').addClass('addChecked');
//		}else{
////			$("input[name='choseAll']").attr("checked", null);
//			$(this).attr("checked", null);
//			$(this).parent().parent('.addChecked').removeClass('addChecked');
//		}
			
	})
	
	//删除选中商品
	$('.delChose').click(function(){
		if(confirm('确认删除选中商品?')){
			//$.each 循环删除
			$.each($("input[name='sel']"),function($k,$v){
				//如果是被选中的属性删除
				if($(this).attr("checked")){
					var sid = $(this).parent('td').siblings('td').find('.del').attr('sid');		
					$(this).parent().parent('.addChecked').remove();
					$.ajax({
						type:"post",
						url:url_update,
						data:{'num':0,'sid':sid},
						dataType:'json',
						success:function(phpData){
							$('.goodsNum').text('商品数量总计：'+phpData.total_rows+'件');	
							$('.totalPriceBottom strong').text(phpData.total);
							if(phpData.total_rows==0){
								$('.nullCart').css('display','block');
								$('.centerBox').css('display','none');
							}
						}
					});
				}

			})
		}
	})
	
	//结算按钮 选中的结算
	$('.a02').click(function(){
		if(!uemail&&!uid){
			alert('请登录');
			$('a02')
			return false;
		}else{
			var sids = ''
			$.each($("input[name='sel']"),function($k,$v){
				//如果是被选中的属性删除
				if($(this).attr("checked")){
					sids += $(this).parent('td').siblings('td').find('.del').attr('sid')+',';
				}
			})
			$('input[name="sids"]').val(sids);
//			location.href=orderUrl;
		}

	})
	
})

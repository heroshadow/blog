$(function(){
	//当 填写新地址的表单为隐藏状态时 a04按钮作用为选取旧地址作为收货地址
	//遍历所有phover下的input  抓取被选中地址的value值	
		//获取到地址的addid
		$('.a04').click(function(){
			if($('input[name="confirm"]').val()==1){
				$.each($(".phover input[name='userShipping']"), function($k,$v){
					if($(this).attr('checked')){
						addid = $(this).val();
					}		
				})
				$.ajax({
					type:"post",
					url:url_addConfirm,
					data:{'addid':addid},
					dataType:'json',
					success:function(phpData){
						//修改隐藏于 地址为选中地址
						$('input[name="area"]').val(phpData.area);
						//修改收货人信息为当前选中地址信息
						$('.mCon01 .p1').text(phpData.consignee+' '+phpData.cellphone);
						$('.mCon01 .p2').text(phpData.area+' '+phpData.add);
						$('.mConBtn').text('[修改]');
						//修改表单value值
						$('input[name="consignee"]').val(phpData.consignee);
						$('input[name="add"]').val(phpData.add);
						$('input[name="cellphone"]').val(phpData.cellphone);
						//修改添加地址 input表单内容
						$('.mCon').removeClass(' bgcf9 marTop10');
						
						$('.mCon02').slideUp(function(){
							$('.mCon01').slideDown();
						})
					}
				});
			}else{
				//获取 区域值
			value=$('input[name="value"]').val();
			var area = $('#s1').val() + '省,' + $('#s2').val() + '市,' + $('#s3').val();
			//收货人信息
			var consignee =$('input[name="consignee"]').val();
			//收货人地址
			var add = $('input[name="add"]').val();
			//收货人手机号
			var cellphone = $('input[name="cellphone"]').val();
			$('input[name="area"]').val(area);
			$('.mCon01 .p1').text(consignee+' '+cellphone);
			$('.mCon01 .p2').text(area);
			$('.mConBtn').text('[修改]');
			//使用新地址被选中时发送ajax;
				$.ajax({
					type:"post",
					url:url_add,
					data:{'area':area,'consignee':consignee,'cellphone':cellphone,'add':add,'user_uid':uid},
					dataType:'json',
					success:function(phpData){
						//添加class
						$('.mCon').removeClass(' bgcf9 marTop10');
						//回调函数 上拉 下拉完成后异步添加地址
						$('.mCon02').slideUp(function(){
							$('.mCon01').slideDown(function(){
									//组合字符串 添加到选择地址中
									//默认地址为1和不为1分俩种情况
									if(phpData.daddres==1){
										var x = '<p class="pHover active">'+
												'<label>'+
													'<input type="radio" name="userShipping"/ checked="" value="'+phpData.addid+'">'+phpData.consignee+
													'<span>'+phpData.area+'</span>'+
													'<span>'+phpData.cellphone+'</span>'+									
												'</label>'+
												'<span>默认地址</span>'+
												'<a href="">编辑</a>'+
												'<a href="">删除</a>'+
												'</p>'
									}else{
										var x = '<p class="pHover">'+
												'<label>'+
													'<input type="radio" name="userShipping"/ checked="" value="'+phpData.addid+'">'+phpData.consignee+
													'<span>'+phpData.area+'</span>'+
													'<span>'+phpData.cellphone+'</span>'+									
												'</label>'+
												'<a href="" class="color7f69b3" style="display:none">默认地址</a>'+
												'<a href="" class="color7f69b3" style="display:none">编辑</a>'+
												'<a href="" class="color7f69b3" style="display:none">删除</a>'+
												'</p>'
									}
									//地址添加
									$('.adress01').append(x);
									//清空表单
									$('input[name="consignee"]').val('');
									$('input[name="add"]').val('');
									$('input[name="cellphone"]').val('');
									//让使用新地址显示
									$('.xin').css('display','block');
									//
									$('input[name="confirm"]').val(1);
							});
						});
					}		
				});
			}
		})
	//点击添加值
	$.each($(".phover input[name='userShipping']"), function($k,$v){
		$(this).click(function(){
			$('input[name="confirm"]').val(1);
		})
	})
		
	//点击修改
	$('.mConBtn').click(function(){
		//点击添加class改变背景颜色
		$('.mCon').addClass(' bgcf9 marTop10')
		//回调函数
		$('.mCon01').slideUp('normal',function(){
			$('.mCon02').slideDown();
		});
		$('#xin').css('display','none');
		
		
	})

	$('.adress01 p').live('click',function(){
		//如果使用新地址是被选中状态  填写地址formslide上拉消失
		if($('.xin input[name="userShipping"]').attr('checked')){
			$('#xin').slideUp();
		}
		
	})
	
	//使用新地址 点击事件
	$('.adress02 input').click(function(){
		
		//清空地址
		$('input[name="confirm"]').val(0);
		$('#xin').slideDown();
		
		$('input[name="value"]').attr('value','');
	})
	//异步查询地址
	$.ajax({
		type:"post",
		url:url,
		data:{'uid':uid},
		dataType:'json',
		success:function(phpData){
			//如果有默认地址 显示默认地址 否则显示添加地址页面
			if(phpData){
				$('.mCon01').slideDown();
				$('.mCon01 .p1').text(phpData.consignee+' '+phpData.cellphone);
				$('.mCon01 .p2').text(phpData.area+' '+phpData.add);
//				$('.xiugai').text('[修改]')
				$('input[name="confirm"]').val(1);
			}else{
				$('.mCon02').css('display','block');
				$('.xin').css('display','none');
				$('#xin').slideDown();
				$('input[name="confirm"]').val(0);
			}
		}
	});
})

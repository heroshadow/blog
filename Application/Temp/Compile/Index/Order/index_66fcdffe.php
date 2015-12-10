<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>填写核对订单</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/my_shop/9.11converse/hdphp/Public/Index/css/index.css"/>
	<link rel="stylesheet" type="text/css" href="http://localhost/my_shop/9.11converse/hdphp/Public/Index/css/cart.css"/>
	<script src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/js/address.js" type="text/javascript" charset="utf-8"></script>
	<script src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/js/order.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var s=["s1","s2","s3"];
		var opt0 = ["请选择省","请选择市","请选择县（区）"];
		function setup(){
		 for(i=0;i<s.length-1;i++)
		  document.getElementById(s[i]).onclick=new Function("change("+(i+1)+")");
		 change(0);
		}
		window.onload=function(){
		setup()	
			
		};
		$(function(){
			
			$('.dj').live('click',function(){
				var dj = $('#s1').val() + '省,' + $('#s2').val() + '市,' + $('#s3').val();
				alert(dj);	
			})
		})
	</script>
	<script type="text/javascript">
		var uid = "<?php echo $hd['session']['uid'];?>"
		var url_add = "<?php echo U('Order/addAdd');?>";
		var url = "<?php echo U('Order/shipAdd');?>";
		var url_addConfirm="<?php echo U('Order/addConfirm');?>"
	</script>
</head>
<body class="newCartBody">
	<div class="carHeader">
		<div class="carHeaderCon clearfix">
			<div class="logo fl">
				<a href="http://localhost/my_shop/9.11converse/hdphp">
					<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/logo.png" width="30" height="70"/>
				</a>
			</div>
			<div class="fr" >
				<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/c_10.jpg" alt="" width="350" height="70" />
			</div>
		</div>
	</div>
	<div class="center">
		<form action="<?php echo U('Order/addOrder');?>" method="post">
		<div class="centerBox">
			<div class="cartSmsg">
				<h3 class="ch3">收货相关信息</h3>
				<div class="mList01">
					<div class="mCon">
						<h4><strong class="color666 padRight15">收货人信息</strong>
							<a href="javascript:;" class="color7f69b3 mConBtn xiugai" style="display: inline;"></a>
						</h4>
						<div class="mCon01" style="display: none;">
							<p class="p1"><?php echo $defaultAdd['consignee'];?>&nbsp;&nbsp;<?php echo $defaultAdd['cellphone'];?></p>
							<p class="p2"><?php echo $defaultAdd['area'];?>&nbsp;<?php echo $defaultAdd['add'];?></p>
						</div>
						<div class="mCon02" style="display: none;">
							<div class="adress01" style="">
								<?php foreach ($add as $k=>$v){?>
									    <?php if($v['daddres']==1){ ?>
										<p class="phover active">
											<label>
												<input type="radio" name="userShipping"/ checked="" value="<?php echo $v['addid'];?>"><?php echo $v['consignee'];?>
												<span><?php echo $v['area'];?></span>
												<span><?php echo $v['cellphone'];?></span>
											</label>
											<!--<span style="display: inline;">默认地址</span>
											<a href="" style="display: inline;" class="color7f69b3 ">编辑</a>
											<a href="" style="display: inline;" class="color7f69b3 ">删除</a>-->
										</p>
									<?php }else{ ?>
										<p class="phover">
											<label>
												<input type="radio" name="userShipping"/ checked="" value="<?php echo $v['addid'];?>"><?php echo $v['consignee'];?>
												<span><?php echo $v['area'];?></span>
												<span><?php echo $v['cellphone'];?></span>
											</label>
											<a style="display: none;" href="" class="color7f69b3">默认地址</a>
											<a href="" style="display: none;" class="color7f69b3 ">编辑</a>
											<a href="" style="display: none;" class="color7f69b3 ">删除</a>
										</p>
									<?php } ?>
								<?php }?>
							</div>
							<div class="adress02" style="">
								<div style="" class="xin">
									<label>
										<input type="radio" name="userShipping" id="new" />
										使用新地址
									</label>
								</div>
								
								
								<div class="padTop10" id="xin" style="display: none;">
									<table border="0" cellspacing="0" cellpadding="0" class="adrTable">
										<tbody>
											<tr>
												<td width="85" align="right">
													<span class="colord90057 reBitian">*</span>收 货 人：
												</td>
												<td>
													<input type="text" class="adrInput" name="consignee" />
												</td>
											</tr>
											<tr>
												<td width="85" align="right">
													<span class="colord90057 reBitian">*</span>所在地区:
												</td>
												<td>
													<select id="s1" name="province">
														<option>省份</option>
													</select>
													<select id="s2" name="city">
														<option>地级市</option>
													</select>
													<select id="s3" name="county">
														<option>市、县级市、县</option>
													</select>
												</td>
											</tr>
											<tr>
												<td width="85" align="right">
													<span class="colord90057 reBitian">*</span>详细地址：
												</td>
												<td>
													<input type="text" class="adrInput w362"  name="add"/>
												</td>
											</tr>
											<tr>
												<td width="85" align="right">
													<span class="colord90057 reBitian">*</span>手机号码：
												</td>
												<td>
													<input type="text" class="adrInput" name="cellphone" id="cellphone" />
												</td>
											</tr>
										</tbody>
									</table>
								</div>
								<div class="adrBtn mCbtn">
									<a href="javascript:;" class="a04">确认收货地址</a>
									<input type="hidden" name="value" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--商品明细-->
			<div class="cartSlist marTop5">
				<table class="carTable carTable01">
					<tbody>
						<tr>
							<th align="left" colspan="10"><strong class="color666" style="padding-left: 24px;">商品明细</strong></th>
						</tr>
						<tr>
							<td class="text01" width="35"></td>
							<td class="text01">
								<p style="text-align: left;">商品名称</p>
							</td>
							<td class="text01" width="100">发货站</td>
							<td class="text01" width="100">会员价</td>
							<td class="text01" width="100">数量</td>
							<td class="text01" width="100">运费</td>
							<td class="text01" width="100">小计</td>
							<td class="text01" width="45"></td>
						</tr>
						<?php foreach ($goodsData['goods'] as $k=>$v){?>
						<tr class="" sid="<?php echo $k;?>">
							<td valign="top"></td>
							<td valign="top" align="left">
								<p class="namePro" style="text-align: left;">
									<a href=""><?php echo $v['name'];?> </a>
								</p>
								<p style="text-align:left" class="namePro"><?php foreach ($v['options'] as $kk=>$vv){?><?php echo $vv;?>&nbsp;&nbsp;<?php }?></p>
							</td>
							<td valign="top">中国大陆</td>
							<td valign="top"><?php echo $v['price'];?></td>
							<td valign="top"><?php echo $v['num'];?></td>
							<td valign="top">0</td>
							<td valign="top" class="colore93"><?php echo $v['total'];?></td>
							<td class="text01" width="45" valign="top"></td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
			<!--商品明细end-->
			<div class="cartPrice">
				<div class="billTitle">
					<p><?php echo $goodsData['total_rows'];?>件商品，商品金额总计：<?php echo $goodsData['totalPrice'];?>元</p>
				</div>
				<p class="marT" style="margin-top:10px;">应付总额：<strong><?php echo $goodsData['totalPrice'];?></strong><em>元</em></p>
				<p class="clearfix">
					<a href="<?php echo U('Cart/index');?>" class="fl a01 marTop12">返回修改购物车</a>
					
					<button class="fr a02" type="submit" style="cursor: pointer;border: none;">提交订单</button>
				</p>
			</div>
		</div>
		<input type="hidden" value="<?php echo $goodsData['totalPrice'];?>"  name="tprice"/>
		<input type="hidden" name="area" value="" />
		<input type="hidden" name="confirm" value="" />
		</form>
	</div>
	<!--底部-->
	<div class="footer">
		<div class="footerListTop clearfix">
			<div class="listTopCon">
				<div class="listTop01 fl">
					<div class="topIcon">
						<ul class="clearfix">
							<li>
								<a href=""></a>
								<div class="topIconBg">
									<p class="i01 pngfix"></p>
									<p class="i01s pngfix"></p>
								</div>
								<div class="text">正品保障</div>
							</li>
							<li class="hr"></li>
							<li>
								<a href=""></a>
								<div class="topIconBg">
									<p class="i02 pngfix"></p>
									<p class="i02s pngfix"></p>
								</div>
								<div class="text">七天退修</div>
							</li>
							<li class="hr"></li>
							<li>
								<a href=""></a>
								<div class="topIconBg">
									<p class="i03 pngfix"></p>
									<p class="i03s pngfix"></p>
								</div>
								<div class="text">维修保养</div>
							</li>
							<li class="hr"></li>
							<li>
								<a href=""></a>
								<div class="topIconBg">
									<p class="i04 pngfix"></p>
									<p class="i04s pngfix"></p>
								</div>
								<div class="text">权威保障</div>
							</li>
							<li class="hr"></li>
							<li>
								<a href=""></a>
								<div class="topIconBg">
									<p class="i05 pngfix"></p>
									<p class="i05s pngfix"></p>
								</div>
								<div class="text">管家服务</div>
							</li>
							<li class="hr"></li>
						</ul>
					</div>
				</div>
				<div class="listTop02 fl">
					<ul class="clearfix">
						<li>
							<a href="" class="toptext">关注寺库微信</a>
							<span class="weixinPic"><img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/weixin.jpg" alt="" / width="86" height="86"></span>
							<a href="" class="bottomtext">扫一扫有惊喜</a>
						</li>
						<li>
							<a href="" class="toptext">下载寺库APP</a>
							<span class="weixinPic"><img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/app.jpg" alt="" / width="86" height="86"></span>
							<a href="" class="bottomtext">扫一扫有惊喜</a>
						</li>
					</ul>
				</div>
				<div class="listTop03 fl">
					<p style="height: 125px;margin: 15px auto 0px;">
						<a href="">加入寺库</a>
						<a href="">关于寺库</a>
						<a href="">联系我们</a>
						<a href="">支付方式</a>
						<a href="">帮助中心</a>
						<a href="">售后服务</a>
						<a href="">免责声明</a>
						<a href="">礼品采购</a>
						<a href="">寺库微博</a>
						<a href="">友情链接</a>
					</p>
				</div>
			</div>
		</div>
		<div class="footerListBottom">
			<div class="footerListBottom01">
				京ICP备09084709号-3 京公网安备110105004373号 
				<a href=""><img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/foot_pic01.png" alt="" /></a>
				<a href=""><img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/foot_pic02.png" alt="" /></a>
				<a href=""><img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/gongshangju.png" alt="" /></a>
			</div>
		</div>
	</div>
	<!--底部-->
</body>
</html>

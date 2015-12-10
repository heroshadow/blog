<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>我的购物车</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/my_shop/9.11converse/hdphp/Public/Index/css/index.css"/>
	<link rel="stylesheet" type="text/css" href="http://localhost/my_shop/9.11converse/hdphp/Public/Index/css/cart.css"/>
	<script src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/js/cart.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var url_update="<?php echo U('Cart/update');?>";
		var url_delAll="<?php echo U('Cart/delAll');?>";
		var uid = "<?php echo $hd['session']['uid'];?>";
		var uemail ="<?php echo $hd['session']['uemail'];?>";
		var orderUrl = "<?php echo U('Order/index');?>";
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
				<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/c_05.jpg" alt="" width="350" height="70" />
			</div>
		</div>
	</div>
	<div class="center">
		<div class="centerBox">
			<!--空购物车-->
			    <?php if(!$_SESSION['cart']['goods']){ ?>
			<div class="nullCart" >
				<div class="nullText">
					<p class="cText01">购物车内暂时没有商品，您可以：</p>
					<p class="cText02"><a href="http://localhost/my_shop/9.11converse/hdphp" class="a02">返回首页挑选商品</a></p>
				</div>
			</div>
			<!--空购物车end-->
			<?php }else{ ?>
			<div class="cartNav clearfix">
				<div class="fl navLogin padLeft18">
					    <?php if(!$_SESSION['uemail']&&!$_SESSION['uid']){ ?>
					现在<a href="<?php echo U('Member/login');?>">登录</a>您购物车中的商品将被永久保存
					<?php }else{ ?>
					<?php echo $_SESSION['uemail'];?>
					<?php } ?>
				</div>
			</div>
			<div class="cartBox">
				<div class="cartSlist">
					<table border="0" cellspacing="0" cellpadding="0" class="carTable">
						<thead>
							<tr>
								<th width="75">
									<input type="checkbox" name="choseAll" id="" value="" checked />
									<label for="choseAll">全选</label>
								</th>
								<th width="355" colspan="2">商品名称</th>
								<th width="96">发货站</th>
								<th width="96">会员价</th>
								<th width="140">数量</th>
								<th width="110">金额小计</th>
								<th width="110">操作</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($data['goods'] as $k=>$v){?>
							<tr class="addChecked">
								<td><input type="checkbox" checked="" name="sel"/></td>
								<td width="97" valign="top">
									<div class="cartPic fl padRight15">
										<a href="">
											<img src="http://localhost/my_shop/9.11converse/hdphp/<?php echo $v['img'];?>" alt="" width="80" height="80"/>
										</a>
									</div>
								</td>
								<td valign="top">
									<div class="cartNames fl">
										<p class="namePro">
											<a href="<?php echo U('Goods/index',array('gid'=>$v[gid]));?>"><?php echo $v['name'];?></a>
										</p>
									</div>
									<div class="cartNames fl">
										
											<p class="namePro color999 pad45"><?php foreach ($v['options'] as $kk=>$vv){?><?php echo $vv;?>&nbsp;&nbsp;<?php }?></p>
										
									</div>
								</td>
								<td valign="top">中国大陆</td>
								<td valign="top"><span class="rmb">￥</span><?php echo $v['price'];?></td>
								<td valign="top">
									<div class="countNum clearfix">
										<div class="cPlus fl">-</div>
										<div class="cInput fl"><input type="text" class="Num" value="<?php echo $v['num'];?>" sid="<?php echo $k;?>"></div>
										<div class="cMinus fl">+</div>
									</div>
								</td>
								<td valign="top">
									<strong class="colore93">
										<span clrmb colore93>￥</span><span class="xiaoji"><?php echo $v['total'];?></span>元
									</strong>
								</td>
								<td valign="top">
									<a href="javascript:;" class="del" sid="<?php echo $k;?>">删除</a>
								</td>
							</tr>
							<?php }?>
						</tbody>
					</table>
				</div>
				<!--结算-->
				<div class="cartPrice">
					<div class="cartAno">
						<div class="ano01 fl">
							<input type="checkbox" name="choseAll" checked/>
							<label for="choseAll">全选</label>
						</div>
						<div class="ano02 fl delSp">
							<a href="javascript:;" class="delChose">删除选中商品</a>
						</div>	
					</div>
					<p class="goodsNum">商品数量总计：<?php echo $data['total_rows'];?>件</p>
					<p class="totalPriceBottom">商品金额总计（不含运费）：<strong><?php echo $total;?></strong></p>
					<form action="<?php echo U('Order/index');?>" method="post">
						<p class="clearfix">
							<a href= "http://localhost/my_shop/9.11converse/hdphp" class="fl a01 marTop12">继续购物</a>
							<button type="submit" href="" class="fr a02" style="border: none;cursor: pointer;">立即结算</button>
							<input type="hidden" name="sids" />
						</p>
					</form>
				</div>
				<?php } ?>
				<!--结算-->
			</div>
		</div>
		<div style="margin:0 auto; width:990px;">
			<!--<div class="cartSmsg" style="margin-top: 30px;">
				<h3 class="ch3">猜你喜欢</h3>
				<div class="mList01" style="position:relative; overflow:visible; height:225px;">
					<div class="mostWanted zIndex02" style="width:988px">
						<div class="carousel es-carousel-wrapper">
							<div class="es-carousel">
								<ul style="width: 1666px;display: block;margin-left: 0px;">
									<li style="margin-right: 0px; width: 154px;">
										<div class="epic"><a href=""> <img width="120"height="120" alt="" src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/11335013.jpg" />  </a></div>
										<div class="ename">
											<a href="">VERSACE/范思哲 中性时尚光学眼镜 0VE3186A-GB1</a>
										</div>
										<div class="eprice">
											<p class="eskprice">
												<strong>1140</strong>元
											</p>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>-->
			<div class="cartSmsg" style="margin-top: 30px;">
				<h3 class="ch3">最近浏览</h3>
				<div class="mList01" style="position:relative; overflow:visible; height:225px;">
					<div class="mostWanted zIndex02" style="width:988px">
						<div class="carousel es-carousel-wrapper">
							<div class="es-carousel">
								<ul style="width: 1666px;display: block;margin-left: 0px;">
									<li style="margin-right: 0px; width: 154px;">
										<div class="epic"><a href=""> <img width="120"height="120" alt="" src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/11335013.jpg" />  </a></div>
										<div class="ename">
											<a href="">VERSACE/范思哲 中性时尚光学眼镜 0VE3186A-GB1</a>
										</div>
										<div class="eprice">
											<p class="eskprice">
												<strong>1140</strong>元
											</p>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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
</body>
</html>
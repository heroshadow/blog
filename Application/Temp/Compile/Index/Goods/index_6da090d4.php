<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>商品页</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/my_shop/9.11converse/hdphp/Public/Index/css/goods.css"/>
	<!--头部广告end-->
	<!--头部-->
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
	<link rel="stylesheet" type="text/css" href="http://localhost/my_shop/9.11converse/hdphp/Public/Index/css/common.css"/>
	<script src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/js/common.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<!--头部广告-->
	<div class="" style="background:url(http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/150921dt.jpg) no-repeat center top; width:100%; height:50px; display:none;">
	</div>
	<!--头部广告end-->
	<!--头部-->
	<div class="header">
		<div class="top-bar">
			<div class="top-bar-con clearfix">
				<a href="<?php echo U('Cart/index');?>" class="turl cart fr">
					    <?php if($_SESSION['cart']['total_rows']){ ?>
					<b></b>购物车<span id="cat">(<?php echo $_SESSION['cart']['total_rows'];?>)</span>
					<?php }else{ ?>
					<b></b>购物车<span id="cat">(0)</span>
					<?php } ?>
				</a>
				<span class="turlb fr">|</span>
				<a href="" class="fr turl">
					客户服务
					<i class="harrow"></i>
				</a>
				<a href="" class="fr turl">
					我的寺库
					<i class="harrow"></i>
				</a>
				<a href="<?php echo U('Personal/order');?>" class="fr turl">
					我的订单					
				</a>
				<span class="turlb fr">|</span>
				<span class="turl Chead-welcome fr">
					欢迎光临寺库 &nbsp;<?php echo $_SESSION['uemail'];?>
					    <?php if(!$_SESSION['uemail']&&!$_SESSION['uid']){ ?>
					<a href="<?php echo U('Member/login');?>">请登录</a>
					<a href="<?php echo U('Member/register');?>">免费注册</a>
					<?php }else{ ?>
					<a href="<?php echo U('Member/out');?>">退出</a>
					<?php } ?>
					
				</span>
			</div>
			<div class="Chead-logo">
				<div style="position: absolute;right: 5px;top: 15px; width:120px; height:100px;">
					<div style="style="cursor: hand;background:url(about:blank); position:absolute; top:0px; width:120px; height:100px; z-index:1; visibility: visible; text-align:center;"">
						<a href="http://localhost/my_shop/9.11converse/hdphp" style="display:block;background:url(about:blank); width:179px; height:123px;">
							<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/logogif_1012.gif" width="120" height="100" alt="" style="position:absolute; top:0; left:0;right:0px"  />
						</a>
					</div>
				</div>
				<a href="http://localhost/my_shop/9.11converse/hdphp" class="logo"></a>
			</div>
		</div>
		<div class="search-box">
			<div class="serach-con clearfix">
				<div type="text" class="search-input fl"/>
					<input type="" class="typeInput ac_input" id="" value="" style="color: rgb(102, 102, 102);"/>
				</div>
					<div class="nbtn fl">
					<a href="" class="nbtn01">搜索</a>
				</div>
			</div>
			<div class="head_navBar">
				<a href="">
					<span>
						<i>首页</i>
					</span>
				</a>
				<?php foreach ($category as $k=>$v){?>
					<a href="<?php echo U('List/index',array('cid'=>$v['cid']));?>">
						<span><i><?php echo $v['cname'];?></i></span>
					</a>
				<?php }?>
			</div>
		</div>
			<div class="float-list">
				<div class="orderDivMain">
					<a href="">
						全部奢品
						<i></i>
					</a>
				</div>
				<div class="orderDivId" id="daohang">
					<?php foreach ($category as $k=>$v){?>
					<dl class="    <?php if($k%2!=0){ ?>odd<?php } ?>" >
						<dt >
							<strong><a href="<?php echo U('List/index',array('cid'=>$v['cid']));?>"><?php echo $v['cname'];?></a></strong>
							
							<p>
								        <?php
        //初始化
        $hd['list']['n'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($category[$k]['son'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($category[$k]['son'] as $n) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=3)break;
                //第几个值
                $hd['list'][n]['index']++;
                //第1个值
                $hd['list'][n]['first']=($listId == 0);
                //最后一个值
                $hd['list'][n]['last']= (count($category[$k]['son'])-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
								<a href="<?php echo U('List/index',array('cid'=>$n['cid']));?>"><?php echo $n['cname'];?></a>
								<?php }}?>
							</p>
							
						</dt>
						
						<dd style="top: -2px;">
							<ul>
								<li>
									<strong>分类</strong>
									<div class="float-list-cont">
										<?php foreach ($category[$k]['son'] as $kk=>$vv){?>
										<a href="<?php echo U('List/index',array('cid'=>$vv['cid']));?>">
											<?php echo $vv['cname'];?>
											<em>|</em>
										</a>
										<?php }?>
									</div>
								</li>

							</ul>
						</dd>
					</dl>
					<?php }?>
				</div>
			</div>
	</div>
	<!--头部end-->
	<script src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/js/goods.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		var sprice=<?php echo $goods['sprice'];?>;
		var gurl ="<?php echo U('Goods/goodsList');?>";
		var cart_url = "<?php echo U('Goods/cart');?>";
		var loca_url = "<?php echo U('Cart/index');?>"
	</script>
	<!--头部end-->
	<div class="sopdetailsCon">
		<div class="smallNav">
			<!--<p>
				<a href="">首页</a>
				>
				<a href="">包袋</a>
				>
				<a href="">手提包</a>
				>
				<a href="">珑骧</a>
				>
				<a href="">Longchamp/珑骧 女士尼龙折叠包长柄手提包 2605 紫水晶</a>
			</p>-->
		</div>
		<!--商品-->
		<div class="contents clearfix">
			<div class="info_l">
				<dl class="clearfix">
					<dd class="">
						<div class="move_box">
							<div>
								        <?php
        //初始化
        $hd['list']['v'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($goods['s_img'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($goods['s_img'] as $v) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][v]['index']++;
                //第1个值
                $hd['list'][v]['first']=($listId == 0);
                //最后一个值
                $hd['list'][v]['last']= (count($goods['s_img'])-1 <= $listId);
                //总数
                $hd['list'][v]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
									    <?php if($hd['list']['v']['first']){ ?>
										<a href="" class="imgselect on"><img src="http://localhost/my_shop/9.11converse/hdphp/<?php echo $v;?>" height="80" width="80"/><i></i></a>
									<?php }else{ ?>
										<a href="" class="imgselect "><img src="http://localhost/my_shop/9.11converse/hdphp/<?php echo $v;?>" height="80" width="80"/><i></i></a>
									<?php } ?>
								<?php }}?>
							</div>
						</div>
					</dd>
					<dt>
						        <?php
        //初始化
        $hd['list']['v'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($goods['m_img'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($goods['m_img'] as $v) {
                //开始值
                if ($listId<0) {
                    $listId++;
                    continue;
                }
                //步长
                if($listId!=$listNextId){$listId++;continue;}
                //显示条数
                if($listShowNum>=100)break;
                //第几个值
                $hd['list'][v]['index']++;
                //第1个值
                $hd['list'][v]['first']=($listId == 0);
                //最后一个值
                $hd['list'][v]['last']= (count($goods['m_img'])-1 <= $listId);
                //总数
                $hd['list'][v]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
							    <?php if($hd['list']['v']['first']){ ?>
								<img src="http://localhost/my_shop/9.11converse/hdphp/<?php echo $v;?>" alt="" width="400" height="400" style="display: block;"/>
							<?php }else{ ?>
								<img src="http://localhost/my_shop/9.11converse/hdphp/<?php echo $v;?>" alt="" width="400" height="400" style="display: none;"/>
							<?php } ?>
						<?php }}?>
					</dt>
				</dl>
				<div class="share_box clearfix">
					<div class="share_text fl">
						<span class="sh1"><i></i><a href="">正品保障</a></span>
						<span class="sh2"><i></i><a href="">七天退换</a></span>
						<span class="sh3"><i></i><a href="">权威保证</a></span>
					</div>
					<div class="share_icon fl">
						<span class="sh4"><a href=""><i></i>分享</a></span>
					</div>
					<div class="live_icon fl">
						<span class="sh5"><a href=""><i></i>收藏</a></span>
					</div>
				</div>
			</div>
			<div class="info_r">
				<div class="proName">
					<h2><?php echo $goods['gname'];?></h2>
					<h3></h3>
				</div>
				<div class="proDetails">
					<div class="proList clearfix">
						<div class="pdt fl" style="line-height: 42px; *line-height: 48px; height:33px;">
							寺库价
						</div>
						<div class="pdd fl" style="min-height: 32px;*height:auto">
							<span class="Dprice">
								<b><span class="rmb">￥</span></b>
							</span>
							<span class="Dprice" id="secooPriceJs"><?php echo $goods['sprice'];?></span>
							<span class="sale"><?php echo $goods['zhekou'];?>折</span>
							<span class="mprice">市场价<span class="rmb">￥</span><span class="rmb" style="font-family: tahoma;"><?php echo $goods['mprice'];?></span></span>
						</div>
					</div>
					<div class="proList clearfix">
						<div class="pdt fl">发货地</div>
						<div class="pdd fl">
							<div class="tips_hover">
								<span class="fl">
									<em class="location-t">大陆&nbsp;<i>有货</i></em>
								</span>	
							</div>
							<span class="delivery">
								<i>
									预计下单后会在<span class="color9d0">5-7</span>天内发货 全场包邮
								</i>
							</span>
						</div>
					</div>
					<div class="proList clearfix">
						<div class="pdt fl">温馨提示</div>
						<div class="pdd fl"><span>本商品不支持货到付款</span></div>
					</div>
				</div>
				<div class="proList_box clearfix">
					<?php foreach ($spec as $k=>$v){?>
					<div class="proList clearfix psize">
						<div class="pdt fl"><?php echo $v['taname'];?></div>
						<div class="pdd fl">
							<ul class="shopSize">
								<?php foreach ($spec[$k]['opt'] as $kk=>$vv){?>
									<li class="" gaid="<?php echo $vv['gaid'];?>"><a href="javascript:;"><span><?php echo $vv['gavalue'];?></span><label></label></a></li>
								<?php }?>
							</ul>
						</div>
					</div>
					<?php }?>
					<div class="proList clearfix pNum">
						<div class="pdt fl">购买数量</div>
						<div class="pdd fl">
							<div class="countNm">
								<a href= "javascript:;" class="down fl"></a>
								<span class="num fl"><input type="text" value="1" id="num"/></span>
								<a href="javascript:;" class="up fl nMinus"></a>
							</div>
							<span style="margin-left: 20px;" class="kucun" kucun="<?php echo $goods['inventory'];?>">库存<?php echo $goods['inventory'];?>件</span>
						</div>
					</div>
					<div class="prompt clearfix pselected"></div>
					<div class="prompt clearfix">
						<a href="javascript:;" class="topanic fl" id="topanic"></a>
						<a href="javascript:;" class="tocart fl" id="tocart"></a>
					</div>
					<form action="" method="post" class="goods">
						<input type="hidden" name="id" value="" />
						<input type="hidden" name="gid" value="<?php echo $goods['gid'];?>" />
						<?php foreach ($spec as $k=>$v){?>
							<input type="hidden" name="options[]" value=""/>
						<?php }?>
						<input type="hidden" name="price" value="" />
						<input type="hidden" name="num" value="1">
						<input type="hidden" name="img" value="<?php echo $goods['listimg'];?>" />
						<input type="hidden" name="name" value="<?php echo $goods['gname'];?>" />
					</form>
				</div>
			</div>
		</div>
		<!--商品end-->
		<!--商品详情-->
		<div class="showAdds clearfix">
			<!--商品详情左侧-->
			<div class="showAddsLeft fl">
				<h3>大家都在买</h3>
				<div class="showLeftCon showLeftCon02">
					<ul>
						<?php foreach ($hot as $k=>$v){?>
						<li class="clearfix">
							<div class="sPic fl">
								<img src="http://localhost/my_shop/9.11converse/hdphp/<?php echo $v['listimg'];?>" alt="" width="50" height="50"/>
							</div>
							<div class="sbox fr">
								<div class="sName"><?php echo $v['gname'];?></div>
								<div class="sPri">
									<strong><span class="rmb">￥</span><?php echo $v['sprice'];?></strong>
								</div>
							</div>
							<a href="<?php echo U('Goods/index',array('gid'=>$v['gid']));?>"></a>
						</li>
						<?php }?>
					</ul>
				</div>
				<!--<h3 class="marTop_15">相关商品</h3>
				<div class="showLeftCon showLeftCon02">
					<ul>
						<li class="clearfix">
							<div class="sPic fl">
								<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/12856610.jpg" alt="" width="50" height="50"/>
							</div>
							<div class="sbox fr">
								<div class="sName">iPhone 苹果6S 正品国行公开版 全网通 64G A1700</div>
								<div class="sPri">
									<strong><span class="rmb">￥</span>6,088</strong>
								</div>
							</div>
							<a href=""></a>
						</li>
						<li class="clearfix">
							<div class="sPic fl">
								<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/12856610.jpg" alt="" width="50" height="50"/>
							</div>
							<div class="sbox fr">
								<div class="sName">iPhone 苹果6S 正品国行公开版 全网通 64G A1700</div>
								<div class="sPri">
									<strong><span class="rmb">￥</span>6,088</strong>
								</div>
							</div>
							<a href="<?php echo U('Goods/index',array('gid'=>$v['gid']));?>"></a>
						</li>
					</ul>
				</div>-->
				<h3 class="marTop_15">最近浏览商品</h3>
				<div class="showLeftCon showLeftCon02">
					<ul>
						<?php foreach ($goodsData as $k=>$v){?>
						<li class="clearfix">
							<div class="sPic fl">
								<img src="http://localhost/my_shop/9.11converse/hdphp/<?php echo $v['listimg'];?>" alt="" width="50" height="50"/>
							</div>
							<div class="sbox fr">
								<div class="sName"><?php echo $v['gname'];?></div>
								<div class="sPri">
									<strong><span class="rmb">￥</span><?php echo $v['sprice'];?></strong>
								</div>
							</div>
							<a href="<?php echo U('Goods/index',array('gid'=>$v['gid']));?>"></a>
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
			<!--商品详情左侧end-->
			<!--商品详情右侧-->
			<div class="showAddsRight fr">
				<div class="s-left-list">
					<ul>
						<li class="link-suit-select">
							<a href="javascript:;">商品详情</a>
						</li>
						<li>
							<a href="javascript:;">商品鉴定</a>
						</li>
						<li>
							<a href="javascript:;">售后服务</a>
						</li>
						<li class="">
							<a href="javascript:;">购买须知</a>
						</li>
						<li class="">
							<a href="javascript:;" class="to_cart" style="display: block;"></a>
						</li>
					</ul>
				</div>
				<div class="s-left-box">
					<div class="product-detail-div clearfix" style="display: block;">
						<div class="product-detail-banner">
							<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/zhcx_pic_1.jpg" alt="" width="911" height="60" style="display: inline;"/>
						</div>

						<!--品牌说明end-->
						<!--商品详情-->
						<div class="moudle_details">
							<div class="moudle_top">
								<span class="sp_show"></span>
							</div>
							<p style="text-align: center;">
								<?php echo $goods['detail'];?>
							</p>
						</div>
						<!--商品详情end-->
						<!--<div class="moudle_details">
							<div class="moudle_top">
								<span class="sp_main">保养说明</span>
							</div>
							<div class="moudle_center txc">
								<div style="padding: 20px 0;">
									<li>
										<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/0aecf84459cf4fd39a52732e82a19e33.jpg" alt="" />
									</li>
								</div>
							</div>
						</div>-->
						<!--<div class="moudle_details">
							<div class="moudle_top">
								<span class="sp_com">评论或咨询</span>
							</div>
							<div class="productReview clearfix">
								<div class="reviewLeft fl">感谢您对寺库网的关注！请您写下对商品或寺库网的评论或者建议， 或直接拨打电话400-875-6789。<br />您的意见对我们很重要！衷心感谢！</div>				<div class="reviewRight fl"><a href="">我要评论</a></div>	
							</div>
						</div>-->
					</div>
					<!--tab切换页-->
					<div id="helpInfoContent">
						<div class="product-detail-div clear" style="display: none;">
							<div class="checkUp">
								<div class="checkUp_list01 clearfix">
									<div class="checkUp_text fl">
										<h3><img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/jd_02.gif" alt="" /></h3>
										<h4>"对每一件奢侈品，我们都十足挑剔。"</h4>
										<p>
											·全国权威奢侈品鉴定评估机构，为您带来专业的奢侈品鉴定评估技术服务。<br />
											<span style="display:block;padding-left:5px;">SECOO奢侈品鉴定评估技术中心的每一项鉴定工艺，都遵循严苛的标准和严谨的服务流程，通过仪器设备材质分析和人工手检验结合的方式，确保每一件商品均为正品。</span>
										</p>
										<p>·与国家皮革制品质量监督检验中心联合成立至一工作站</p>
										<p>·中国315电子商务诚信平台官方指定唯一奢侈品鉴定评估中心</p>
										<p>·ISO9001质量管理体系认证的权威奢侈品鉴定中心（证书编号：00114Q20094R0S/1100）</p>
									</div>
									<div class="checkUp_text fr" style="width:409px;padding-top:20px;">
										<p style="padding-top:30px;">
											<strong>贵宾专线：</strong>
											400-87-56789
										</p>
										<p>
											<strong>线下旗舰店鉴定中心：</strong>
											400-87-56789
										</p>
										<p>北京市 东城区金宝街18-8号</p>
										<p>上海市 南京西路758号F1-F3</p>
										<p>成都市 人民南路111号航天科技大厦3层</p>
										<p>香港 九龙尖沙咀弥敦道23-25号 彩星中心12层整层</p>
										<p><strong>奢侈品鉴定养护科研中心：</strong>中国 北京市 亦庄研发中心</p>
										<p><strong>营业时间：</strong>早10：00--晚19：00 （节假日不休）</p>
									</div>
									<div class="checkUp_jd fl" style="width:100%;padding-top:25px;">
										<p class="fl marRight_10">
											<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/njd_01.jpg" alt="" width="460" height="282" />
										</p>
										<p class="clearfix fl" style="width: 437px;">
											<span class="fl marBottom_10">
												<img src= "http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/njd_02.jpg" alt=""  width="437" height="136"/>
											</span>
											<span class="fl clearfix">
												<span class="fl marRight_10">
													<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/njd_03.jpg" alt="" width="216" height="136"/>
												</span>
													<span class="fl">
													<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/njd_04.jpg" alt="" width="211" height="136"/>
												</span>
											</span>
										</p>
									</div>
								</div>
								<div class="checkUp_list03" style="padding-top:30px;">
									<h4>
										<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/jd_01.jpg" alt="" width="257" height="38"/>
									</h4>
									<p>
										SECOO奢侈品鉴定评估技术中心是目前国内领先的奢侈品鉴定评估机构，拥有国内专业的技术检测设备，完善的检测管理流程，汇集国内资深的专家顾问团队，通过仪器设备检验和人工结合的方法为您购买的每一件商品进行鉴定。<br />
										汇集国内外专业的资深鉴定师，包括美国GIA鉴定师、日本高级鉴定师、国家资深鉴定专家、国家鉴定估价师（员）等，部分为国家皮革制品质量监督检验中心、中国钟表协会收藏研究委员会等机构的高级工程师。
									</p>
								</div>
								<div class="checkUp_list03" style="padding-top:30px;">
									<h4>
										<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/jd_01_01.png" alt="" width="268" height="37"/>
									</h4>
									<p>
										寺库www.secoo.com承诺在售的所有商品均为正品，并由中华联合财产保险股份有限公司为您购买的每一件商品进行承保，请您安心购买！
									</p>
								</div>
							</div>
						</div>
						<div class="product-detail-div clear" style="display: none;">
							<div class="moudle_center clearfix" >
								<div class="moudle_pic fl">
									<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/wear_s.gif" width="272" height="242">
								</div>
								<div class="moudle_con fr" style="margin:0px;padding:0px;font-size:12px;float:right;width:650px;color:#666666;font-family:arial, 宋体;">
								<div class="moudle_con_list01">
									<div class="moudle_title clearfix">
										<span class="s01 fl pngfix"></span>7天无忧退货
									</div>
									<dl class="moudle_dl" style="margin:0px;padding:0px;list-style:none;line-height:25px;font-family:'microsoft yahei';">
										<dt style="margin:0px;padding:5px 0px;list-style:none;font-weight:bold;color:#333333;">一、退货说明：</dt>
										<dd style="margin:0px;padding:0px;list-style:none;">1.自商品售出之日（以商品实际签收日期为准）起7日内提出退货请求。</dd>
							
										<dl></dl>
										<p><br /></p>
									</dl>
									<div class="moudle_con_list01">
										<dl class="moudle_dl" style="margin:0px;padding:0px;list-style:none;line-height:25px;font-family:'microsoft yahei';">
											<dt style="margin:0px;padding:5px 0px;list-style:none;font-weight:bold;color:#333333;">二、商品如若出现以下情况，则视为无法退换货：</dt>
											<dd style="margin:0px;padding:0px;list-style:none;">1.商品防损吊牌出现变形、破损、断裂等与出库原貌不同的。</dd>
										</dl>
									</div>
									<div class="moudle_con_list01" style="padding-top:15px;">
										<dl class="moudle_dl" style="margin:0px;padding:0px;list-style:none;line-height:25px;font-family:'microsoft yahei';">
											<dt style="margin:0px;padding:5px 0px;list-style:none;font-weight:bold;color:#333333;">三、温馨提示：</dt>
											<dd style="margin:0px;padding:0px;list-style:none;">1.因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物存在色差，此类情况不属质量问题</dd>
											<dd style="margin:0px;padding:0px;list-style:none;">2.遇过敏问题产生退货需要提供医院的相关证明。</dd>
										</dl>
									</div>
									<div class="moudle_con_list01">
										<div class="moudle_title clearfix">
											<span class="s02 fl pngfix">
											</span>退货流程
										</div>
										<div class="moudle_liuc">
											<p>一、在线申请退货流程：</p>
											<ul class="clearfix list-paddingleft-2">
												<li>
													<p style="padding:0;line-height:20px">登录寺库官网</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">进入我的寺库</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">点击申请退货</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">客服审核通过</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">物品寄回寺库</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">审核退货商品</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">办理退款</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">退货完成</p>
												</li>
											</ul>
										</div>
									</div>
								</div>
								</div>
							</div>	
						</div>
						<div class="product-detail-div clear" style="display: none;">
							<div class="moudle_center clearfix" >
								<div class="moudle_pic fl">
									<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/wear_s.gif" width="272" height="242">
								</div>
								<div class="moudle_con fr" style="margin:0px;padding:0px;font-size:12px;float:right;width:650px;color:#666666;font-family:arial, 宋体;">
								<div class="moudle_con_list01">
									<div class="moudle_title clearfix">
										<span class="s01 fl pngfix"></span>七天无忧退货
									</div>
									<dl class="moudle_dl" style="margin:0px;padding:0px;list-style:none;line-height:25px;font-family:'microsoft yahei';">
										<dt style="margin:0px;padding:5px 0px;list-style:none;font-weight:bold;color:#333333;">一、退货说明：</dt>
										<dd style="margin:0px;padding:0px;list-style:none;">1.自商品售出之日（以商品实际签收日期为准）起7日内提出退货请求。</dd>
										<dd style="margin:0px;padding:0px;list-style:none;">2.商品未经使用，原质原貌。</dd>
										<dd style="margin:0px;padding:0px;list-style:none;">3.请您务必保证商品所有附属配件资料完好齐全（如产品标识、包装、吊牌、三包卡、说明书、发票、赠品、配件、鉴定证书等）。如果寄回商品出现缺少附件或包装破损/丢失等情况，即便在退换货期内，也无法为您办理。</dd>
										<dd style="margin:0px;padding:0px;list-style:none;">4.腕表、黄金、珠宝、一口价、孤品等标有“本商品无质量问题不支持退换货”的商品，如无质量问题，不支持退货。</dd>
										<dd style="margin:0px;padding:0px;list-style:none;">5.对于套装商品或者组合销售商品，无法为您办理部分商品退货。</dd>
										<dd style="margin:0px;padding:0px;list-style:none;">6.出于安全和卫生考虑，贴身用品如内衣裤，袜子，泳衣类商品，一经售出不予退货，经权威部门检测商品存在质量问题者除外。</dd>
										<dd style="margin:0px;padding:0px;list-style:none;">7.拍卖类商品，一经售出无质量问题不予退货。</dd>
										<dd style="margin:0px;padding:0px;list-style:none;"> 8.全球购商品退货政策请参见各海外站购物说明。</dd>
										<dl></dl>
										<p><br /></p>
									</dl>
									<div class="moudle_con_list01">
										<dl class="moudle_dl" style="margin:0px;padding:0px;list-style:none;line-height:25px;font-family:'microsoft yahei';">
											<dt style="margin:0px;padding:5px 0px;list-style:none;font-weight:bold;color:#333333;">二、商品如若出现以下情况，则视为无法退换货：</dt>
											<dd style="margin:0px;padding:0px;list-style:none;">1.商品防损吊牌出现变形、破损、断裂等与出库原貌不同的。</dd>
											<dd style="margin:0px;padding:0px;list-style:none;">2.商品产品标识、包装、吊牌、三包卡、说明书、发票、赠品、配件等缺失的。</dd>
											<dd style="margin:0px;padding:0px;list-style:none;">3.商品任何因不当使用及未妥善保管而导致的质量问题的。</dd>
											<dd style="margin:0px;padding:0px;list-style:none;">4.商品经使用、洗涤、遭污损、损坏等情形的。</dd>
											<dd style="margin:0px;padding:0px;list-style:none;">5.因使用或保管不当，造成磨损、破损或有明显穿着痕迹的（如鞋面褶皱、鞋底磨痕、商品上的金属制品使用后出现氧化、褪色、商品装饰掉落），均不予退货。。</dd>
											<dd style="margin:0px;padding:0px;list-style:none;">6.因个人原因造成的商品损坏（如自行修改尺寸，洗涤，皮具打油，刺绣，长时间穿着等），不予退货。</dd>
										</dl>
									</div>
									<div class="moudle_con_list01" style="padding-top:15px;">
										<dl class="moudle_dl" style="margin:0px;padding:0px;list-style:none;line-height:25px;font-family:'microsoft yahei';">
											<dt style="margin:0px;padding:5px 0px;list-style:none;font-weight:bold;color:#333333;">三、温馨提示：</dt>
											<dd style="margin:0px;padding:0px;list-style:none;">1.因拍摄灯光及不同显示器色差等问题可能造成商品图片与实物存在色差，此类情况不属质量问题</dd>
											<dd style="margin:0px;padding:0px;list-style:none;">2.遇过敏问题产生退货需要提供医院的相关证明。</dd>
										</dl>
									</div>
									<div class="moudle_con_list01">
										<div class="moudle_title clearfix">
											<span class="s02 fl pngfix">
											</span>退货流程
										</div>
										<div class="moudle_liuc">
											<p>一、在线申请退货流程：</p>
											<ul class="clearfix list-paddingleft-2">
												<li>
													<p style="padding:0;line-height:20px">登录寺库官网</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">进入我的寺库</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">点击申请退货</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">客服审核通过</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">物品寄回寺库</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">审核退货商品</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">办理退款</p>
												</li>
												<li class="jt"><p><br /></p></li>
												<li>
													<p style="padding:0;line-height:20px">退货完成</p>
												</li>
											</ul>
										</div>
									</div>
								</div>
								</div>
							</div>	
						</div>
					</div>
					<!--tab切换页end-->
				</div>
				<!--<div class="s-left-box">
					<div class="addRevi">
						<div class="moudle_details">
							<div class="moudle_top">
								<span class="sk_ent">评论或咨询</span>
							</div>
						</div>
					</div>
				</div>-->
			</div>
			<!--商品详情右侧end-->
		</div>
		<!--商品详情-->
	</div>
	<div class="love_tips popwinBox_jrgwc">
		<div class="love_tips_title">
			加入购物车成功<a href="javascript:;" class="winboxClose"></a>
		</div>
		<div class="love_tips_text">添加成功</div>
		<div class="love_tips_btn">
			<a href="<?php echo U('Cart/index');?>" class="toCart">去购物车结算</a>
			<a href="javascript:;" class="buy">继续购物</a>
		</div>
	</div>
	<div class="newblackMask"></div>
	<!--底部-->
	<div class="n-footer">
		<div class="service clearfix">
			<dl class="first">
				<dt>
					<strong>新手指南</strong>
					<dd>
						<div><a href="">注册新用户</a></div>
						<div><a href="">网上订购流程</a></div>
						<div><a href="">海外站购买说明</a></div>
						<div><a href="">优惠券使用说明</a></div>
						<div><a href="">美国站购买说明</a></div>
					</dd>
				</dt>
			</dl>
			<dl class="">
				<dt>
					<strong>新手指南</strong>
					<dd>
						<div><a href="">注册新用户</a></div>
						<div><a href="">网上订购流程</a></div>
						<div><a href="">海外站购买说明</a></div>
						<div><a href="">优惠券使用说明</a></div>
						<div><a href="">美国站购买说明</a></div>
					</dd>
				</dt>
			</dl>
			<dl class="">
				<dt>
					<strong>新手指南</strong>
					<dd>
						<div><a href="">注册新用户</a></div>
						<div><a href="">网上订购流程</a></div>
						<div><a href="">海外站购买说明</a></div>
						<div><a href="">优惠券使用说明</a></div>
						<div><a href="">美国站购买说明</a></div>
					</dd>
				</dt>
			</dl>
			<dl class="">
				<dt>
					<strong>新手指南</strong>
					<dd>
						<div><a href="">注册新用户</a></div>
						<div><a href="">网上订购流程</a></div>
						<div><a href="">海外站购买说明</a></div>
						<div><a href="">优惠券使用说明</a></div>
						<div><a href="">美国站购买说明</a></div>
					</dd>
				</dt>
			</dl>
			<dl class="last">
				<dt><strong>境外体验店</strong></dt>
				<dd>
					<div class="txt">
						寺库通过在全球多地设立体验店和办事机构的方式，为高端消费者提供最贴心的全球奢侈品一站式服务
					</div>
					<div>
						<span class="pr65 "><a href="">北京</a></span>
						<span><a href="">香港</a></span>
					</div>
					<div>
						<span class="pr65 "><a href="">上海</a></span>
						<span><a href="">米兰</a></span>
					</div>
					<div>
						<span class="pr65 "><a href="">成都</a></span>
					</div>
				</dd>
			</dl>
		</div>
		<div class="footer-nav">
			<div class="bd">
				<ul class="clearfix">
					<li class="nf-1">
						<i></i>100%正品保证
					</li>
					<li class="nf-2">
						<i></i>7天退换货
					</li>
					<li class="nf-3">
						<i></i>专业维修保养
					</li>
					<li class="nf-4">
						<i></i>权威奢侈品鉴定
					</li>
					<li class="nf-5">
						<i></i>贴心管家物流
					</li>
				</ul>
			</div>
		</div>
		<div class="footer-aboat">
			<div class="aboat-bd">
				<div class="links">
					<p class="clearfix">
						<a href="">寺库网</a>
						<a href="">寺库金融</a>
						<a href="">寺库奢侈品养护</a>
					</p>
				</div>
				<div class="copyright">
					<p class="clearfix">
						<span>营业执照注册号110102011888762</span>
						<span>京公安备11010102001392</span>
						<span>京ICP证110119号 京ICP备09084709号-3</span>
						<span>ISO9001中国质量管理体系认证</span>
					</p>
				</div>
				<div class="links">
					<p class="clearfix">
						<a href="">加入寺库</a>
						<a href="">联系我们</a>
						<a href="">关于寺库</a>
						<a href="">帮助中心</a>
						<a href="">寺库微博</a>
						<a href="">友情链接</a>
						<a href="">奢侈品热词</a>
						<a href="">奢侈品资讯</a>
					</p>
				</div>
				<div class="copyright">
					<p class="clearfix">
						<span>COPYRIGHT © 2010-2015 北京寺库商贸有限公司 版权所有</span>
					</p>
				</div>
				<div class="authentication clearfix">
					<a href=""><img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/f_01.jpg" alt="" /></a>
					<a href=""><img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/f_04.jpg" alt="" /></a>
					<a href=""><img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/kx_02.jpg" alt="" /></a>
					<a href=""><img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/kexin.jpg" alt="" /></a>
					<a href=""><img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/f_03.jpg" alt="" /></a>
				</div>
				<div class="authentication clearfix">
					<ul class="ewm clearfix">
						<li>
							<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/app_ewm0827.jpg" alt="" />
							<p>手机客户端</p>
						</li>
						<li>
							<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/sk_ewm0827.jpg" alt="" />
							<p>官方微信</p>
						</li>
					</ul>
				</div>
			</div>	
		</div>
	</div>
	<!--底部end-->
</body>
</html>

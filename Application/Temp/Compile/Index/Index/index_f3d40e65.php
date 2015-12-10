<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>Document</title>
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
	<link rel="stylesheet" type="text/css" href="http://localhost/my_shop/hdphp/Public/Index/css/common.css"/>
	<script src="http://localhost/my_shop/hdphp/Public/Index/js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="http://localhost/my_shop/hdphp/Public/Index/js/common.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<!--头部广告-->
	<div class="" style="background:url(http://localhost/my_shop/hdphp/Public/Index/images/150921dt.jpg) no-repeat center top; width:100%; height:50px; display:none;">
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
						<a href="http://localhost/my_shop/hdphp" style="display:block;background:url(about:blank); width:179px; height:123px;">
							<img src="http://localhost/my_shop/hdphp/Public/Index/images/logogif_1012.gif" width="120" height="100" alt="" style="position:absolute; top:0; left:0;right:0px"  />
						</a>
					</div>
				</div>
				<a href="http://localhost/my_shop/hdphp" class="logo"></a>
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
	<script src="http://localhost/my_shop/hdphp/Public/Index/js/index.js" type="text/javascript" charset="utf-8"></script>
	<!--内容区-->
	<!--轮播区-->
	<div class="nContanier">
		<div class="skSlider">
			<div class="mtsBanner" style="position: relative; z-index: 0; overflow: hidden; height: 400px;">
				<div class="slide_control" style="margin-left: -50px;">
					<a href="" class="mall_dot mall_dot_hover">1</a>
					<a href="" class="mall_dot">2</a>
					<a href="" class="mall_dot ">3</a>
					<a href="" class="mall_dot ">4</a>
					<a href="" class="mall_dot">5</a>
				</div>
				<a href="javascript:;" class="move_left" style="display: none;"></a>
				<a href="javascript:;" class="move_right" style="display: none;"></a>
				<div class="bannerWrap" style="position: relative; z-index: 0; margin: 0px; padding: 0px; overflow: hidden; width: 100%;">
					<li class="on" style="background-color: rgb(254, 232, 233); position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; display: list-item;">
						<div>
							<a href="">
								<img src="http://localhost/my_shop/hdphp/Public/Index/images/344171fd2b9c4b3cba7b813c20e0aff9.jpg" alt="" class="mts_big" />
								<img src="http://localhost/my_shop/hdphp/Public/Index/images/0c3049e907d94556bf4e544230a24788.png" alt="" class="mts_small" />
							</a>
						</div>
					</li>
					<li class="" style="background-color: rgb(0, 121, 167); position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; display: none;">
						<div>
							<a href="">
								<img src="http://localhost/my_shop/hdphp/Public/Index/images/91d010c1e9904a8a977d63a4cbc97b56.jpg" alt="" class="mts_big" />
								<img src="http://localhost/my_shop/hdphp/Public/Index/images/a60ad9ed1c7b4e19be4095ca2c40f6d0.png" alt="" class="mts_small" />
							</a>
						</div>
					</li>
					<li class="" style="background-color: rgb(83, 11, 36); position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; display: none;">
						<div>
							<a href="">
								<img src="http://localhost/my_shop/hdphp/Public/Index/images/027b1d8313e74706a17acd3b86a298af.jpg" alt="" class="mts_big" />
								<img src="http://localhost/my_shop/hdphp/Public/Index/images/313eebe197804778980afbe9ab4f4289.png" alt="" class="mts_small" />
							</a>
						</div>
					</li>
					<li class="" style="background-color:  rgb(0, 0, 0); position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; display: none;">
						<div>
							<a href="">
								<img src="http://localhost/my_shop/hdphp/Public/Index/images/a7e3c3644e304984ad119f7ffb177dad.jpg" alt="" class="mts_big" />
								<img src="http://localhost/my_shop/hdphp/Public/Index/images/845a61ae35324bd1bc33df2a91b32625.png" alt="" class="mts_small" />
							</a>
						</div>
					</li>
					<li class="" style="background-color: rgb(220, 211, 193); position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; display: none;">
						<div>
							<a href="">
								<img src="http://localhost/my_shop/hdphp/Public/Index/images/69e14a2393f34ab6907a31d2d41bb68c.jpg" alt="" class="mts_big" />
								<!--<img src="http://localhost/my_shop/hdphp/Public/Index/images/0c3049e907d94556bf4e544230a24788.png" alt="" class="mts_small" />-->
							</a>
						</div>
					</li>
				</div>
			</div>
		</div>
		<!--轮播end-->
		<!--楼层-->
		<div class="floorList">
			<div class="floor01">
				<p>
					<a href="">
						<img src="http://localhost/my_shop/hdphp/Public/Index/images/bc7463d117554d0b8353450ba39d2bb2.jpg" alt="" />
					</a>
				</p>
				<p>
					<a href="">
						<img src="http://localhost/my_shop/hdphp/Public/Index/images/df4561226b1846f1a5b10a72652f02bf.jpg" alt="" />
					</a>
				</p>
				<p>
					<a href="">
						<img src="http://localhost/my_shop/hdphp/Public/Index/images/2bc847138a9e432ca4adc8754cfa4720.jpg" alt="" />
					</a>
				</p>
			</div>
			        <?php
        //初始化
        $hd['list']['v'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($floor)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($floor as $v) {
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
                $hd['list'][v]['last']= (count($floor)-1 <= $listId);
                //总数
                $hd['list'][v]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
			<div class="floor">
				    <?php if($hd['list']['v']['first']){ ?>
				<div class="m-tit">
					<a href="" class="t t4"></a>
					<div class="tbd"><span>今日上新: 1377单</span></div>
				</div>
				<?php } ?>
				<div class="f-tit clearfix">
					<a href=""><strong><?php echo $v['cname'];?></strong></a>

					<a class="more-link" href="">
						更多<?php echo $v['cname'];?>
						<i>></i>
					</a>
				</div>
				<div class="section">
					<ul class="goods-list clearfix">
						<li class="item-first">
							<a href="<?php echo U('List/index',array('cid'=>$v['cid']));?>">
								<img src="http://localhost/my_shop/hdphp/<?php echo $v['cimg'];?>"  style="opacity: 1;display: inline;"/>
							</a>
							<div class="text-con">
								<h3><?php echo $v['tips1'];?></h3>
								<h4><?php echo $v['tips2'];?></h4>
								<span class="value"><?php echo $v['tips3'];?></span>
							</div>
						</li>
						        <?php
        //初始化
        $hd['list']['n'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($v['goods'])) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($v['goods'] as $n) {
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
                $hd['list'][n]['index']++;
                //第1个值
                $hd['list'][n]['first']=($listId == 0);
                //最后一个值
                $hd['list'][n]['last']= (count($v['goods'])-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
						    <?php if($hd['list']['n']['first']){ ?>
						<li class="item-big">
							<a href="<?php echo U('Goods/index',array('gid'=>$n['gid']));?>" class="small">
								<div class="text-con">	
									<h3><?php echo $n['enname'];?></h3>
									<h4><?php echo $n['cnname'];?></h4>
									<span class="value">
										<i>¥</i><?php echo $n['sprice'];?> 
									</span>
								</div>
								
								<img src="http://localhost/my_shop/hdphp/<?php echo $n['img_big'];?>" alt="" />
							</a>
						</li>
						<?php }else{ ?>
						<li class="">
							<a href= "<?php echo U('Goods/index',array('gid'=>$n['gid']));?>" class="small">
								<div class="text-con">
									<h3><?php echo $n['cnname'];?></h3>
									<h4><?php echo $n['enname'];?></h4>
									<span class="value">
										<i>¥</i><?php echo $n['sprice'];?>                           
									</span>
								</div>
								<img src="http://localhost/my_shop/hdphp/<?php echo $n['img_small'];?>" alt="" width="240" height="163" />
							</a>
						</li>
						<?php } ?>
						<?php }}?>
					</ul>
				</div>
			</div>
			<?php }}?>
			<!--<div class="m-tit p61">
				<div class="tbd">
					<span><a href="" class="t t5"></a></span>
				</div>
			</div>-->
			<!--<div class="slide-m" id="slideM1">
				<div class="slide">
					<ul class="slide-con clearfix" style="width:5980px;">
						<li>
							<a href="">
								<div class="box"><img src="http://localhost/my_shop/hdphp/Public/Index/images/11253799.jpg" alt="" /></div>
								<p class="name">澳洲Downia 5%白鸭绒羽绒床垫 舒适蓬松加厚羽绒床垫6600克 白色  180*200+7CM</p>
								<span class="price">
									<i>￥</i>
									1316
								</span>
							</a>
						</li>
						<li>
							<a href="">
								<div class="box"><img src="http://localhost/my_shop/hdphp/Public/Index/images/11253799.jpg" alt="" /></div>
								<p class="name">澳洲Downia 5%白鸭绒羽绒床垫 舒适蓬松加厚羽绒床垫6600克 白色  180*200+7CM</p>
								<span class="price">
									<i>￥</i>
									1316
								</span>
							</a>
						</li>
						<li>
							<a href="">
								<div class="box"><img src="http://localhost/my_shop/hdphp/Public/Index/images/11253799.jpg" alt="" /></div>
								<p class="name">澳洲Downia 5%白鸭绒羽绒床垫 舒适蓬松加厚羽绒床垫6600克 白色  180*200+7CM</p>
								<span class="price">
									<i>￥</i>
									1316
								</span>
							</a>
						</li>
						<li>
							<a href="">
								<div class="box"><img src="http://localhost/my_shop/hdphp/Public/Index/images/11253799.jpg" alt="" /></div>
								<p class="name">澳洲Downia 5%白鸭绒羽绒床垫 舒适蓬松加厚羽绒床垫6600克 白色  180*200+7CM</p>
								<span class="price">
									<i>￥</i>
									1316
								</span>
							</a>
						</li>
						<li>
							<a href="">
								<div class="box"><img src="http://localhost/my_shop/hdphp/Public/Index/images/11253799.jpg" alt="" /></div>
								<p class="name">澳洲Downia 5%白鸭绒羽绒床垫 舒适蓬松加厚羽绒床垫6600克 白色  180*200+7CM</p>
								<span class="price">
									<i>￥</i>
									1316
								</span>
							</a>
						</li>
					</ul>
				</div>
			</div>-->
		</div>
		<!--楼层end-->
	</div>
	<!--内容区end-->
	<!--底部-->
	<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!--底部-->
	<div class="n-footer">
		
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
					<a href=""><img src="http://localhost/my_shop/hdphp/Public/Index/images/f_01.jpg" alt="" /></a>
					<a href=""><img src="http://localhost/my_shop/hdphp/Public/Index/images/f_04.jpg" alt="" /></a>
					<a href=""><img src="http://localhost/my_shop/hdphp/Public/Index/images/kx_02.jpg" alt="" /></a>
					<a href=""><img src="http://localhost/my_shop/hdphp/Public/Index/images/kexin.jpg" alt="" /></a>
					<a href=""><img src="http://localhost/my_shop/hdphp/Public/Index/images/f_03.jpg" alt="" /></a>
				</div>
				<div class="authentication clearfix">
					<ul class="ewm clearfix">
						<li>
							<img src="http://localhost/my_shop/hdphp/Public/Index/images/app_ewm0827.jpg" alt="" />
							<p>手机客户端</p>
						</li>
						<li>
							<img src="http://localhost/my_shop/hdphp/Public/Index/images/sk_ewm0827.jpg" alt="" />
							<p>官方微信</p>
						</li>
					</ul>
				</div>
			</div>	
		</div>
	</div>
	<!--底部end-->

	<!--底部end-->
</body>
</html>

<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>我的订单</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/my_shop/9.11converse/hdphp/Public/Index/css/personal.css"/>
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
	<script src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/js/block.js" type="text/javascript" charset="utf-8"></script>
	<!--头部-->
	<div class="mySecooNew clearfix">
		<div id="car_content">
			<div class="mySecooNew_l">
				<h2><a href="" class="my_secoo_a">我的寺库</a></h2>
				<div class="line"></div>
				<dl>
					<dt>帐号中心</dt>
					<dd><a href="" class="onhover">我的订单</a></dd>
					<dd><a href="">账户信息</a></dd>
					<dd><a href="">收货地址</a></dd>
				</dl>
			</div>
			<!--右边部分-->
			<div class="mySecooNew_r w870">
				<table class="order_table order_table_md">
					<colgroup>
						<col class="goods"></col>
						<col class="price"></col>
						<col class="quantity"></col>
						<col class="item-operate"></col>
						<col class="amount"></col>
						<col class="trade-status"></col>
						<col class="trade-operate"></col>
					</colgroup>
					<thead>
						<tr>
							<th scope="col">商品</th>
							<th scope="col" class="alignleft">商品</th>
							<th scope="col">数量</th>
							<th scope="col">商品操作</th>
							<th scope="col">实付款</th>
							<th scope="col">订单状态</th>
							<th scope="col">操作</th>
						</tr>
					</thead>
					<tbody class="">
						<?php foreach ($data as $k=>$v){?>
						<tr class="order_hd">
							<td class="" colspan="7">
								<div class="pos_r">
									<span class="marRight_30">主订单号：<?php echo $v['number'];?></span>
									<span>下单时间：<?php echo date('Y-m-d',$v['time']);?></span>
									<a href="" class="deleteOrder"></a>
								</div>
							</td>
						</tr>
						<?php foreach ($v['list'] as $kk=>$vv){?>
						<tr class="last_tr">
							<td class="norborder">
								<dl class="order_dl">
									<dt>
										<a href="">
											<img src="http://localhost/my_shop/9.11converse/hdphp/<?php echo $vv['thumb'];?>" alt="" />
										</a>
									</dt>
									<dd>
										<p class="p_name"><a href=""><?php echo $vv['name'];?></a></p>
									</dd>
								</dl>
							</td>
							<td class="norborder alignleft">
								<span class="price_sk"><i>￥</i><?php echo $vv['subtotal'];?></span>
							</td>
							<td class="norborder"><?php echo $vv['num'];?></td>
							<td></td>
							<td class="norborder" rowspan="1">
								<span class="price_sk"><i>￥</i><?php echo $vv['subtotal'];?></span>
								<span class="dbk">在线支付</span>
							</td>
							<td class="norborder" rowspan="1" colspan="1">
								    <?php if($v['state']==1){ ?>
								<span class="dbk color_red">已支付</span>
								<?php }else{ ?>
								<span class="dbk color_red">未支付</span>
								<!--<a href="" class="dbk">订单详情</a>-->
								<?php } ?>
							</td>
							<td class="last_td_r last_td_b" rowspan="1">
								    <?php if($v['state']==0){ ?>
								<a href="<?php echo U('Pay/payFor',array('oid'=>$v['oid']));?>" class="btn_red dbk">立即支付</a>
								<?php } ?>
								<a href="<?php echo U('Pay/cancle',array('oid'=>$v['oid']));?>">取消订单</a>
							</td>
						</tr>
						<?php }?>
						<?php }?>
					</tbody>
				</table>
			</div>
			<!--右边部分-->
		</div>
	</div>
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

	<!--底部end-->

</html>
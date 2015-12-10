<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>列表页</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/my_shop/9.11converse/hdphp/Public/Index/css/list.css"/>
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
	<script src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/js/list.js" type="text/javascript" charset="utf-8"></script>
	<!--搜索条件区域-->
	<div class="clearfix" id="listPageContent">
		<div class="pageTitle" id="pageTitle">
			<span>共<b><?php echo $count;?></b>件商品</span>
			<a href="http://localhost/my_shop/9.11converse/hdphp">首页</a>
			<em></em>
			        <?php
        //初始化
        $hd['list']['n'] = array(
            'first' => false,
            'last'  => false,
            'total' => 0,
            'index' => 0
        );
        if (empty($fatherData)) {
            echo '';
        } else {
            $listId = 0;
            $listShowNum=0;
            $listNextId=0;
            foreach ($fatherData as $n) {
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
                $hd['list'][n]['last']= (count($fatherData)-1 <= $listId);
                //总数
                $hd['list'][n]['total']++;
                //增加数
                $listId++;
                $listShowNum++;
                $listNextId+=1
                ?>
				    <?php if(!$hd['list']['n']['last']){ ?>
					<a href="<?php echo U('List/index',array('cid'=>$n['cid']));?>"><?php echo $n['cname'];?></a>
					<em></em>
				<?php }else{ ?>
					<a href="<?php echo U('List/index',array('cid'=>$n['cid']));?>"><h1><?php echo $n['cname'];?></h1></a>
				<?php } ?>
			<?php }}?>
		</div>
		<div class="selectCondition" id="selectCondition" style="box-shadow: 0px 2px 5px #CCC;">
			<!--<dl>
				<dt>已选择:</dt>
				<dd>
					<div class="categoryDd">
						<a href="" class="on">类目:包袋<i></i></a>
						<a href="" class="on">手提包<i></i></a>
					</div>
				</dd>
				<a href="" class="reset"><i></i>清除条件</a>
			</dl>-->
			<!--<dl class="brand_dl">
				<dt>品牌:</dt>
				<dd>
					<div class="smallList brand">
						<a href="">PRADA/普拉达</a>
						<a href="">PRADA/普拉达</a>
						<a href="">PRADA/普拉达</a>
						<a href="">PRADA/普拉达</a>
						<a href="">PRADA/普拉达</a>
						<a href="">PRADA/普拉达</a>
						<a href="">PRADA/普拉达</a>
						<a href="">PRADA/普拉达</a>
						<a href="">PRADA/普拉达</a>
						<a href="">PRADA/普拉达</a>
					</div>
					<div class="bigList"></div>
				</dd>
				<a href="" class="brandChoice">更多</a>
				<a href="" class="brandmore">多选</a>
			</dl>-->
			<?php foreach ($attr as $k=>$v){?>
					<?php
						$temp = $param;
						//全部为0的时候
						$temp[$k] = 0;
					?>
			<dl>
				<dt><?php echo $v['name'];?></dt>
				<dd>
					<div class="smallList">
						<a href="<?php echo U('index',array('cid'=>$_GET['cid'],'param'=>implode('-',$temp)));?>"     <?php if($param[$k]==0){ ?>class="hover"<?php } ?> >全部</a>
						<?php foreach ($v['value'] as $kk=>$vv){?>
							<?php 
								$temp[$k]=$vv['gaid'];	
							?>
							
							<a href="<?php echo U('index',array('cid'=>$_GET['cid'],'param'=>implode('-',$temp)));?>"     <?php if($param[$k]==$vv['gaid']){ ?>class="hover"<?php } ?>><?php echo $vv['gavalue'];?></a>
						<?php }?>
					</div>
				</dd>
			</dl>
			<?php }?>
		</div>
	</div>
	<!--搜索条件区域-->
	<!--商品列表-->
	<div class="product_box" style="box-shadow: 0px 2px 5px rgb(204, 204, 204);">
		<div class="product_tips">
			<a href="" class="on">商城(3601)</a>
		</div>
		<!--条件区-->
		<div class="product_control" id="J_Filter">
			<div class="product_control_btn">
				<a href="" class="on">综合<i></i></a>
				<a href="">人气<i></i></a>
				<a href="">新品<i></i></a>
				<a href="">销量<i></i></a>
				<a href="">折扣<i></i></a>
				<a href="">价格<i class="p"></i></a>
			</div>
			<div class="product_control_price">
				<div>
					<span>
						<input type="text" />	
					</span>
					<i></i>
					<span>
						<input type="text" />	
					</span>
				</div>
			</div>
			<div class="product_control_page">
				<a href="" class="page-prev off"><i></i></a>
				<span><b>1</b> / 90</span>
				<a href="" class="page-next"><i></i></a>
			</div>
		</div>
		<!--条件区end-->
		<!--商品区-->
		<div class="commodity-list clearfix">
			    <?php if($goods){ ?>
			<?php foreach ($goods as $k=>$v){?>
			<dl class="">
				<div class="show_tips">
					<dt>
						<a href="<?php echo U('Goods/index',array('gid'=>$v['gid']));?>">
							<img src="http://localhost/my_shop/9.11converse/hdphp/<?php echo $v['listimg'];?>" alt=""  width="240" height="240"/>
						</a>
						<strong class="sg"></strong>
					</dt>
					<dd class="dl_tips">
						<span class="s2">直降</span>
					</dd>
					<dd class="dl_name">
						<a href="<?php echo U('Goods/index',array('gid'=>$v['gid']));?>" ><?php echo $v['gname'];?></a>
					</dd>
					<dd class="dl_price clearfix">
						<span><i>￥</i><?php echo $v['sprice'];?></span>
						<del id>销量：<i><?php echo $v['click'];?></i>件</del>
					</dd>
					<dd class="add_cart">
						<a href="">加入购物车</a>
					</dd>
					<span class="loveHeart">
						<i>收藏</i>
					</span>
				</div>
			</dl>
			<?php }?>
			<?php }else{ ?>
			<div class="nothingSearch2 clearfix">
				<p class="nts_title">很抱歉，没有找到符合条件的商品</p>
				<p>建议您：</p>
				<p>1、适当减少筛选条件，可以获得更多结果</p>
				<p>2、变更商品品牌</p>
				<p>3、调整价格区间</p>
			</div>
			<?php } ?>
		</div>
		<!--商品区end-->
		<!--分页-->
		<div class="product_page">
			<!--{<a href="" class="prev off">上一页</a>
			<a class="on">1</a>
			<a >2</a>
			<a href="" class="next off">下一页</a>}-->
			<?php echo $page;?>
		</div>
		<!--分页end-->
		<!--最近浏览-->
		<!--<div class="product_more hide">
			<div class="product_more_title J_more_tab">
				<a href="" class="act">最近浏览 <i></i></a>
			</div>
			<div class="list-con">
				<div class="product_more_list hide" style="display: block;">
					<dl>
						<dt>
							<a href="">
								<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/12529024.jpg" alt="" width="160" height="160" style="display: inline;"/>
							</a>
						</dt>
						<dd class="dl_pm_name">
							<a href="">KENZO/高田贤三 男士卫衣</a>
						</dd>
						<dd class="dl_pm_price">
							<span>
								<i>￥</i>
								2899
							</span>
						
						</dd>
					</dl>
					<dl>
						<dt>
							<a href="">
								<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/12529024.jpg" alt="" width="160" height="160" style="display: inline;"/>
							</a>
						</dt>
						<dd class="dl_pm_name">
							<a href="">KENZO/高田贤三 男士卫衣</a>
						</dd>
						<dd class="dl_pm_price">
							<span>
								<i>￥</i>
								2899
							</span>
						
						</dd>
					</dl>
					<dl>
						<dt>
							<a href="">
								<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/12529024.jpg" alt="" width="160" height="160" style="display: inline;"/>
							</a>
						</dt>
						<dd class="dl_pm_name">
							<a href="">KENZO/高田贤三 男士卫衣</a>
						</dd>
						<dd class="dl_pm_price">
							<span>
								<i>￥</i>
								2899
							</span>
						
						</dd>
					</dl>
					<dl>
						<dt>
							<a href="">
								<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/12529024.jpg" alt="" width="160" height="160" style="display: inline;"/>
							</a>
						</dt>
						<dd class="dl_pm_name">
							<a href="">KENZO/高田贤三 男士卫衣</a>
						</dd>
						<dd class="dl_pm_price">
							<span>
								<i>￥</i>
								2899
							</span>
						
						</dd>
					</dl>
					<dl>
						<dt>
							<a href="">
								<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/12529024.jpg" alt="" width="160" height="160" style="display: inline;"/>
							</a>
						</dt>
						<dd class="dl_pm_name">
							<a href="">KENZO/高田贤三 男士卫衣</a>
						</dd>
						<dd class="dl_pm_price">
							<span>
								<i>￥</i>
								2899
							</span>
						
						</dd>
					</dl>
					<dl>
						<dt>
							<a href="">
								<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/12529024.jpg" alt="" width="160" height="160" style="display: inline;"/>
							</a>
						</dt>
						<dd class="dl_pm_name">
							<a href="">KENZO/高田贤三 男士卫衣</a>
						</dd>
						<dd class="dl_pm_price">
							<span>
								<i>￥</i>
								2899
							</span>
						
						</dd>
					</dl>
				</div>
			</div>
		</div>-->
		<!--最近浏览end-->
		<!--<div class="bgf padBottom_40">
			<div class="search-like"></div>
		</div>
		<div class="bgf">
			<div class="search-other clearfix">
				<div class="searchInput fl">
					<input type="text" class="typeInput ac_input"/>
				</div>
				<div class="nbtn fl">
					<a href="" class="nbtn01">搜索</a>
				</div>
			</div>
		</div>-->
	</div>
	<!--商品列表end-->
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
</body>
</html>

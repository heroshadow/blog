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
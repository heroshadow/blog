<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<link rel="stylesheet" type="text/css" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Index/css/re.css"/>
<link rel="stylesheet" type="text/css" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Index/css/common.css"/>
	<script src="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Index/Js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Index/Js/script.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<!--顶部↓-->
	<header class="top-box">
		<!--导航条↓-->
		<aside class="top-bar">
			<div class="container">
				<div class="top-left">
					您好,欢迎来到罗技官方商城&nbsp;&nbsp;&nbsp;
					<a href="<?php echo U('Member/login');?>">请登录</a>
					|
					<a href="">注册</a>
				</div>
				<!--购物车↓-->
				<div class="top-right">
					<a href="" class="user-account">
						<i class="icon-account"></i>我的账户</a>
					<span class='fl'>|</span>
					<div class="user-cart">
						<a href="" class="user-account">
							<i class="icon-cart">
								<em id="jishu" class="number">2</em>
							</i>购物车<i class="cartarrow"></i>
						</a>
						<div class="cart" style="display: none;">
							<em class="cart-arr"></em>
							<h3 class="title">最新加入商品</h3>
							<ul id="cartInfo" class="cart-ul">
								<li>
									<div class="cart-img">
										<a href="">
											<img src="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Index/images/4200-0004-001.jpg" width="50" height="50" alt="" />
										</a>
									</div>
									<div class="cart-text">
										<p class="p1">
											<a href="">【放假起来嗨】Logitech MK100 二代</a>
										</p>
										<a href="javascript:;" class="delete">删除</a>
									</div>
								</li>
							</ul>
							
						</div>
					</div>
					<span class="phone">
						<i></i>
						400-6260-228
					</span>
				</div>
				<!--购物车↑-->
			</div>
		</aside>
		<!--导航条↑-->
		<!--logo 搜索区-->
		<div class="logosearch">
			<a href="http://127.0.0.1/my_shop/9.11converse/hdphp" class="logo"></a>
			<div class="topsearch">
				<div class="serachbox">
					<input type="text" placeholder="罗技游戏节" />
					<a href="javascript:;" class="searchbutton"></a>
				</div>
				<p class="meat">
					热门搜索:
					<a href="" target="_blank">g910+机械键盘</a>
					<a href="" target="_blank">g502鼠标</a>
					<a href="" target="_blank">g502鼠标</a>
					<a href="" target="_blank">游戏键盘</a>
				</p>
			</div>
			<a href="" class="top-banner">
				<img src="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Index/images/master.gif" alt="" />
			</a>
		</div>
		<!--logo 搜索区end-->
	</header>
	<!--顶部↑-->
	<!--nav-->
	<nav class="top-nav">
		<div class="container">
			<ul id="nav" class="nav clearfix">
				<li class="classify">
					<a href="" class="nav-a">全部产品分类</a>
					<div class="classify-nav">
						<dl>
							<?php foreach ($category as $k=>$v){?>
							<dt>
								<a href="<?php echo U('List/index',array('cid'=>$v['cid']));?>">
									<i class="icon-classify-01"></i>
									<?php echo $v['cname'];?>
								</a>
							</dt>
							<dd>
								<?php foreach ($category[$k]['son'] as $kk=>$vv){?>
								<a href="<?php echo U('List/index',array('cid'=>$vv['cid']));?>"><?php echo $vv['cname'];?></a>
								<?php }?>
							</dd>
							<?php }?>
						</dl>
					</div>
				</li>
				<?php foreach ($category as $k=>$v){?>
				<li>
					<a href="<?php echo U('List/index',array('cid'=>$v['cid']));?>" class="nav-a"><?php echo $v['cname'];?></a>
				</li>
				<?php }?>
			</ul>
		</div>
	</nav>
	<!--nav end-->

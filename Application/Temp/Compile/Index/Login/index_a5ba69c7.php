<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>登录界面</title>
	<link rel="stylesheet" type="text/css" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Index/css/login.css"/>
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
					<a href="<?php echo U('Login/index');?>">请登录</a>
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

	<!--登录注册头部 end-->
	<section style="position: relative;">
		<div class="login-content">
			<div style="position: relative;" class="container">
				<ul class="list-ul">
					<li>
						<a href="">
							<img src="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Index/images/M280_02.jpg" alt="" />
						</a>
					</li>
				</ul>
			</div>
			<div class="login-box clearfix">
				<h3 class="h3-title">
					<span class="span-rinfo">登录罗技官方商城</span>
					<span class="toregister">还有没有帐号?<a href="">立即注册</a></span>
				</h3>
				<ul class="login-ul">
					<li>
						<input type="text" class="login-name" placeholder="用户名/手机/邮箱"/>
						<i class="icon-login-user"></i>
					</li>
					<li>
						<input type="text" class="login-password" placeholder="密码"/>
						<i class="icon-login-password"></i>
					</li>
					<li>
						<input type="text" class="login-code" placeholder="验证码" style="width: 120px;padding-left: 5px;"/>
						<img src="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Index/images/Captcha.aspx.gif" class="cart" alt="" style="width: 65px;height: 30px;position: relative;top: 10px;left: 10px;"/>
					</li>
					<li>
						<label class="remeber-me">
							<input type="checkbox" name="" id="" />
							自动登录
						</label>
						<a href="" class="forget-password">忘记密码</a>
					</li>
					<li>
						<a href="" class="login-btn">登录</a>
					</li>
					<em class="icon-corner"></em>
				</ul>
			</div>
		</div>
	</section>
	<!--底部-->
	<footer class="footer-box ">
		<aside class="footer-wrap">
			<div class="footer-content container">
				<span>
					<i class="servers-01"></i>
					快递送货 产品直达
				</span>
				<span>
					<i class="servers-02"></i>
					独家优惠 丰富活动
				</span>
				<span>
					<i class="servers-03"></i>
					官方网购 正品保证 
				</span>
				<span>
					<i class="servers-04"></i>
					多种类型 方便支付 
				</span>
				<span>
					<i class="servers-05"></i>
					所有产品 均有售后 
				</span>
			</div>
		</aside>
		<aside class="footer-wrap ">
			<div class="container help">
				<dl class="help-dl">
					<dt>| 新手指南</dt>
					<dd><a href="">如何注册</a></dd>
					<dd><a href="">购买流程</a></dd>
					<dd><a href="">积分政策</a></dd>
				</dl>
				<dl class="help-dl">
					<dt>| 支付方式</dt>
					<dd><a href="">银行汇款</a></dd>
					<dd><a href="">发票问题</a></dd>
					<dd><a href="">在线支付</a></dd>
				</dl>
				<dl class="help-dl">
					<dt>| 配送方式</dt>
					<dd><a href="">配送范围及说明</a></dd>
					<dd><a href="">EMS配送</a></dd>
					<dd><a href="">圆通配送</a></dd>
				</dl>
				<dl class="help-dl">
					<dt>| 售后服务</dt>
					<dd><a href="">罗技售后网店</a></dd>
					<dd><a href="">售后服务承诺</a></dd>
					<dd><a href="">退款说明</a></dd>
				</dl>
				<dl class="help-dl">
					<dt>| 罗技官方网站</dt>
					<dd><a href="">常见问题</a></dd>
					<dd><a href="">技术支持</a></dd>
					<dd><a href="">交易条款</a></dd>
				</dl>
				<div class="helpphone">
					<p class="p-phone">400-6260-228</p>
					<p class="p-time">周一到周五9:00-18:00</p>
					<p class="p-custom"><a href="">联系客服</a></p3>
				</div>
			</div>
		</aside>
		<aside>
			<div class="copyright container">
				<p>罗技官方商城由罗技（中国）科技有限公司授权双齐国际贸易（上海）有限公司负责经营 2015 , all rights reserved</p>
				<p>
					<a href="">罗技官方网站</a>
					<a href="">联系方式</a>
					<a href="">隐私声明</a>
					<a href="">用户服务协议</a>
					<a href="">沪ICP备10200262号</a>
				</p>
			</div>
			<div class="copyright container" style="text-align: center;padding: 0px;">
				<span>
					<a href="">
						<img src="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Index/images/pic.gif" alt="" />
					</a>
				</span>
				
			</div>
		</aside>
	</footer>
	<!--底部 end-->
</body>
</html>

<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title>登录</title>
	<link rel="stylesheet" type="text/css" href="http://localhost/my_shop/9.11converse/hdphp/Public/Index/css/common.css"/>
	<link rel="stylesheet" type="text/css" href="http://localhost/my_shop/9.11converse/hdphp/Public/Index/css/register.css"/>
</head>
<body>
	<div class="secondHeader">
		<div class="secondHeaderCenter clearfix">
			<div class="sheaderLeft fl">
				<img src="http://localhost/my_shop/9.11converse/hdphp/Public/Index/images/logo.png" alt="" />
			</div>
			<div class="sheaderRight fr">
				<a href="">寺库首页</a>
			</div>
		</div>
	</div>
	<div class="bgcolor">
		<form action="" method="post">
		<div class="login_center clearfix">
			<div class="login_in fr">
				<h1>欢迎登录</h1>
				<ul class="clearfix">
					<li>
						<div class="login_tips ltips01">
							<input type="text"  class="in_style" border: 1px solid rgb(222, 222, 222); placeholder="邮箱" name="email"/>
							<i class="picUser picUserClick"></i>
						</div>
					</li>
					<li>
						<div class="login_tips ltips02">
							<input type="password"  class="in_style" border: 1px solid rgb(222, 222, 222); placeholder="密码" name="password"/>
							<i class="picPassWord picUserClick"></i>
						</div>
					</li>
					<li>
						<label class="rememberMe">
							<input type="checkbox" name=""  checked="" value="" />记住帐号
						</label>
					</li>
				</ul>
				<div class="btn_submit">
					<input type="submit" class="input_sub login_btn" value="立即登录" id="input_sub"/>
				</div>
				<div class="msg clearfix">
					<span class="fl">还不是寺库会员?<a href="<?php echo U('Member/register');?>" class="active">免费注册</a></span>
					<span class="fr"><a href="">忘记密码?</a></span>
				</div>
			</div>
		</div>
		</form>	
	</div>
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

</body>
</html>
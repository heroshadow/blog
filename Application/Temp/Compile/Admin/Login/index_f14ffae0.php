<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" type="text/css" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Css/login.css" />
	<script type="text/javascript" src="http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">
		var images = "http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Images/";
		var act = "{:U(GROUP_NAME.'/Login/checkverify')}";
	</script>
	<script type="text/javascript" src="http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Js/login.js"></script>
</head>
<body>
	<div id="top">
		CC&nbsp;&nbsp;SHOP
		<a href="<?php echo U(('Index/Index/index'));?>" target="_blank">-商城首页-</a>
	</div>
	<div id="logbox">
		<img id="log" src="http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Images/welcome.png" alt="" />
		<form action="" method="post">
			<input type="text" name="username" id="username" />
			<input type="password" name="password" id="password" />
			<img src="<?php echo U(('Login/code'));?>" alt="" id="code" />
			<input type="text" name="code" id="verify" />
			<input type="submit" value="" id="sub" name="sub" />
			<input type="reset" value="" id="reset" />
		</form>
		<p id="info">
			<span id="username_info"></span>
			<span id="password_info"></span>
			<span id="verify_info"></span>
		</p>
	</div>
</body>
</html>
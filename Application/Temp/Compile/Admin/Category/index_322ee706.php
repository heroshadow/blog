<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Bootstrap/Css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Css/common.css" />
	<script type="text/javascript" src="http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Js/jquery-1.7.2.min.js"></script>
</head>
<body>
	<form action="{:U('Common/sort')}" method="post">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>
									分类ID
								</th>
								<th>
									分类名称
								</th>
								<th>
									排序
								</th>
								<th>
									操作
								</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($cate as $k=>$v){?>
							<tr class="info" pid='<?php echo $v['pid'];?>'     <?php if($v['pid']>0){ ?>style='display:none'<?php } ?>>
								<td>
									<?php echo $v['cid'];?>
								</td>
								<td class='open' cid='<?php echo $v['cid'];?>'>
									<?php echo $v['_name'];?>
								</td>
								<td>
									<input type="text" name='<?php echo $v['cid'];?>' value='<?php echo $v['sort'];?>'/>
								</td>
								<td>
									<a href="<?php echo U('add', array('pid' => $v['cid']));?>" class="btn btn-success"><i class="icon-edit icon-white"></i>添加子分类</a>
									<a href="<?php echo U('edit', array('cid' => $v['cid']));?>" class="btn btn-warning"><i class="icon-pencil icon-white"></i>修改</a>
									<a href="<?php echo U('del', array('cid' => $v['cid']));?>" class="btn btn-danger"><i class="icon-trash icon-white"></i>删除</a>
								</td>
							</tr>
							<?php }?>
							<tr>
								<td colspan='4' align='center'>
									<input type="hidden" name='table' value='category' />
									<input type="submit" value='排序' class="btn btn-primary"/>
								</td>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</form>

<script type="text/javascript">
$(function(){
	$('.open').toggle(function(){
		var cid = $(this).attr('cid');
		$('tr[pid=' + cid + ']').fadeIn(600);
	}, function(){
		var cid = $(this).attr('cid');
		$('tr[pid=' + cid + ']').fadeOut(600);
	});
});
</script>
</body>
</html>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Bootstrap/Css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Css/common.css" />
	<style type="text/css">
		body{
			margin-bottom: 100px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
	<div class="row-fluid">
	<div class="span12">

	<table class="table table-bordered table-hover">
		<tr>
			<th>ID</th>
			<th>订单号</th>
			<th>收货人</th>
			<th>总价格</th>
			<th>生成时间</th>
			<th>订单状态</th>
			<th>操作</th>
		</tr>

		<?php foreach ($data as $k=>$v){?>
			<tr class="info">
				<td><?php echo $v['oid'];?></td>
				<td>
					<a href="" target='_blank'><?php echo $v['number'];?></a>
				</td>
				<td>
					<?php echo $v['consignee'];?>
				</td>
				<td>
					<?php echo $v['tprice'];?>
				</td>
				<td><?php echo date("Y-m-d",$v['time']);?></td>
				<td><?php echo $v['state'];?></td>
				<td>
					<a href="<?php echo U('orderList',array('oid'=>$v['oid']));?>" class="btn btn-success">订单列表</a>
					<a href="<?php echo U('edit', array('gid' => $v['gid']));?>" class="btn btn-warning"><i class="icon-pencil icon-white"></i>修改</a>
					<a href="<?php echo U('del', array('gid' => $v['gid']));?>" class="btn btn-danger"><i class="icon-trash icon-white"></i>删除</a>
				</td>
			</tr>
		<?php }?>
	</table>

	</div>
	</div>
	</div>
</body>
</html>
<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Bootstrap/Css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Css/common.css" />
</head>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>
								类型ID
							</th>
							<th>
								类型名称
							</th>
							<th>
								操作
							</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($data as $key=>$v){?>
						<tr class="info">
							<td>
								<?php echo $v['tid'];?>
							</td>
							<td>
								<?php echo $v['tname'];?>
							</td>
							<td>
								<a href="<?php echo U('TypeAttr/index', array('tid' => $v['tid']));?>" class="btn btn-success"><i class="icon-th icon-white"></i>属性列表</a>
								<a href="<?php echo U('edit', array('tid' => $v['tid']));?>" class="btn btn-warning"><i class="icon-pencil icon-white"></i>修改</a>
								<a href="<?php echo U('del', array('tid' => $v['tid']));?>" class="btn btn-danger"><i class="icon-trash icon-white"></i>删除</a>
							</td>
						</tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>
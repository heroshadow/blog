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

	<form action="{:U('Common/sort')}" method='post'>
		<table class="table table-bordered table-hover">
			<thead>	
				<tr>
					<th>品牌ID</th>
					<th>品牌名称</th>
					<th>LOGO</th>
					<th>排序</th>
					<th>是否热门</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($brandData as $k=>$v){?>
					<tr class="info">
						<td><?php echo $v['bid'];?></td>
						<td><?php echo $v['bname'];?></td>
						<td>
							<img src="http://127.0.0.1/my_shop/9.11converse/hdphp/<?php echo $v['logo'];?>" alt="" style="height: 50px;width: 200px;" />
						</td>
						<td>
							<input type="text" name='<?php echo $v['bid'];?>' value='<?php echo $v['sort'];?>'/>
						</td>
						<td>
							    <?php if($v['is_hot']==1){ ?>是<?php }else{ ?>否<?php } ?>
						</td>
						<td>
							<a href="<?php echo U('Brand/edit',array('bid'=>$v['bid']));?>" class="btn btn-warning"><i class="icon-pencil icon-white"></i>修改</a>
							<a href="<?php echo U('Brand/del',array('bid'=>$v['bid']));?>" class="btn btn-danger"><i class="icon-trash icon-white"></i>删除</a>
						</td>
					</tr>
				<?php }?>
				<tr>
					<td colspan='6' align='center'>
						<input type="hidden" name='table' value='brand'/>
						<input type="submit" value='排序' class="btn btn-success" />
					</td>
				</tr>
				</tbody>
		</table>
	</form>
	
	</div>
	</div>
	</div>
</body>
</html>
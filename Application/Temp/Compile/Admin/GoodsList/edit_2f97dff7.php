<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Bootstrap/Css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Css/common.css" />
	<script type="text/javascript" src='http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Js/jquery-1.7.2.min.js'></script>
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


	<form action="" method='post'>

		<table class='table table-bordered table-hover'>
			<tr>
				<th>货品ID</th>

				<?php foreach ($spec as $k=>$v){?>
					<th><?php echo $v['taname'];?></th>
				<?php }?>

				<th>库存</th>
				<th>货号</th>
			</tr>

		

			<!-- 如果已添加数目小于可能情况数目，才出现添加货品的输入框 -->
			
			<tr class="info">
				<td>修改</td>
		
				<?php foreach ($spec as $k=>$v){?>
					<td>
						<select name="spec[]">
							<option value="0">-请选择-</option>
							<?php foreach ($v['opt'] as $kk=>$vv){?>
								<option    <?php if(in_array($vv['gaid'],$oldData['merge']) ){ ?>selected<?php } ?> value="<?php echo $vv['gaid'];?>"><?php echo $vv['gavalue'];?></option>
							<?php }?>
						</select>
					</td>
				<?php }?>


				<td>
					<input type="text" name='kucun' value="<?php echo $oldData['kucun'];?>"/>
				</td>
				<td>
					<input type="text" name='number' value="<?php echo $oldData['number'];?>" />
				</td>
				<td></td>
			</tr>
		
		</table>
		<input type="hidden" name='gid' value='<?php echo $oldData['goods_gid'];?>'/>
		<input type="hidden" name='tid' value='<?php echo $hd['get']['tid'];?>'/>
		<input type="hidden" name="glid" value="<?php echo $oldData['glid'];?>" />
		<input type="submit" value='修改' class="btn btn-primary"/>
		</form>


	</div>
	</div>
	</div>


<script type="text/javascript">
	var sel = $('select[name="spec[]"]');
	var len = sel.length;
	sel.change(function () {
		var remote = {
			'gid' : <?php echo $Think['get']['gid'];?>,
			'spec' : {}
		};
		for (var i = 0; i < len; ++i)
		{
			if (sel.eq(i).val() == 0)
			{
				return;
			}
			else
			{
				remote.spec[i] = sel.eq(i).val();
			}
		}
		$.ajax({
			url : '{:U("check")}',
			type : 'get',
			data : remote,
			dataType : 'json',
			success : function(data)
			{
				if (data == 0)
				{
					alert('货品已存在，如果要修改库存，请点击修改');
					for (var i = 0; i < len; ++i)
					{
						sel.eq(i).val(0);
					}
				}
			}
		});
	});
</script>
</body>
</html>
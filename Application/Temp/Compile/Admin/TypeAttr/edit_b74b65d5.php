<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Bootstrap/Css/bootstrap.min.css" />
</head>
<body>
	<form action="" method="post">
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<table class="table table-bordered table-hover">
						<tr>
							<td>
								属性名称
							</td>
							<td>
								<input type="text" name='taname' value="<?php echo $oldAttr['taname'];?>"/>
							</td>
						</tr>
						<tr class="success">
							<td>
								属性类别
							</td>
							<td>
								<label><input type="radio" value="0"     <?php if($oldAttr['class']==0){ ?>checked="checked"<?php } ?> name="class" />&nbsp;属性</label>
								
								&nbsp;&nbsp;
								<label><input type="radio" value="1" name="class"      <?php if($oldAttr['class']==1){ ?>checked="checked"<?php } ?> />&nbsp;规格</label>
							</td>
						</tr>
						<tr class="error">
							<td>
								属性值(多个值用 竖线 | 分隔)
							</td>
							<td>
								<textarea name="tavalue" cols="100" rows="4"><?php echo $oldAttr['tavalue'];?></textarea>
							</td>
						</tr>
						<tr class="warning">
							<td colspan="2">
								<input type="hidden" name='type_tid' value='<?php echo $oldAttr['type_tid'];?>'/>
								<input type="hidden" name='taid' value='<?php echo $hd['get']['taid'];?>'/>
								<input type="submit" class="btn btn-primary" value="修改属性" />
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</form>
</body>
</html>
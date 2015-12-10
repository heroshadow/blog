<?php if(!defined('HDPHP_PATH'))exit;C('SHOW_NOTICE',FALSE);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Bootstrap/Css/bootstrap.min.css" />
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Css/common.css" />
	<script type="text/javascript" src='http://127.0.0.1/my_shop/9.11converse/hdphp/Application/Admin/View/Public/Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/jquery.uploadify.min.js'></script>
	<link rel="stylesheet" href="http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/uploadify.css" />
	<style type="text/css">
		li{
			list-style: none;
		}
	</style>
</head>
<body>
	<form action="" method='post'>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<fieldset>
					<legend>添加商品分类</legend> 
					<table class="table table-bordered table-hover">
						
							<tr class="info">
								<td >所属类型</td>
								<td colspan="3">
									<select name="type_tid" >
										<option value="0">请选择</option>
										<?php foreach ($typeData as $k=>$v){?>
											<option value="<?php echo $v['tid'];?>"     <?php if($v['tid']==$oldCate['type_tid']){ ?>selected<?php } ?> ><?php echo $v['tname'];?></option>
										<?php }?>
									</select>
								</td>
							</tr>
							<tr class="info">
								<td>所属分类</td>
								<td colspan="3">
									<select name="pid" >
										<option value="0">请选择</option>
										<?php foreach ($data as $k=>$v){?>
											<option     <?php if($v['cid']==$oldCate['pid']){ ?>selected<?php } ?> value="<?php echo $v['cid'];?>"><?php echo $v['_name'];?></option>
										<?php }?>
									</select>
								</td>
							</tr>
						
						<tr class="info">
							<td>分类名称</td>
							<td colspan="3">
								<input type="text" name='cname' value=<?php echo $oldCate['cname'];?>>
							</td>
						</tr>
						<tr class="info">
							<td>分类小标题1</td>
							<td colspan="3">
								<input type="text" name='tips1' value=<?php echo $oldCate['tips1'];?>>
							</td>
						</tr>
						<tr class="info">
							<td>分类小标题2</td>
							<td colspan="3">
								<input type="text" name='tips2' value=<?php echo $oldCate['tips2'];?>>
							</td>
						</tr>	<tr class="info">
							<td>分类小标题3</td>
							<td colspan="3">
								<input type="text" name='tips3' value=<?php echo $oldCate['tips3'];?>>
							</td>
						</tr>	<tr class="info">
							<td>分类图片</td>
							<td>
								<input type="file" name='cimg' id='cimg'/>
							</td>
							<script type="text/javascript">
				                $(function() {
				                    $('#cimg').uploadify({
				                        'formData'     : {//POST数据
				                            '<?php echo session_name();?>' : '<?php echo session_id();?>',
				                        },
				                        'fileTypeDesc' : '上传文件',//上传描述
				                        'fileTypeExts' : '*.jpg;*.png',
				                        'swf'      : 'http://127.0.0.1/my_shop/9.11converse/hdphp/Public/Uploadify/uploadify.swf',
				                        'uploader' : '<?php echo U("upload");?>',
				                        'buttonText':'选择文件',	              
				                        'fileSizeLimit' : '2000KB',
				                        'uploadLimit' : 1,//上传文件数
				                        'width':130,
				                        'height':30,
				                        'successTimeout':10,//等待服务器响应时间
				                        'removeTimeout' : 0.2,//成功显示时间
				                        'onUploadSuccess' : function(file, data, response) {
				                        		//把变量转为json
				                            data=$.parseJSON(data);
				                            var li="<li path='"+data.path+"' url='"+data.url+"'><img src='"+data.url+"' style='width:130px;height:130px' class='img-thumbnail'/><a href='javascript:;' id='hehe' onclick='aaa()'>X</a><input type='hidden' name='cimg' value='"+data.path+"' /></li>";
				                            $('#logo-wrap').empty().append(li).fadeIn(2000);
				                        }
				                    });
				                });
	            			</script>
	            			<td>
	            				<div id='logo-wrap' style='display:none'></div>
	            			</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="hidden" name="cid" value="<?php echo $oldCate['cid'];?>" />
								<input type="submit" value="修改分类" class="btn btn-primary" />
							</td>
						</tr>
					</table>
					</fieldset>
				</div>
			</div>
		</div>
	</form>
</body>
</html>
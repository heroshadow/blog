<?php 
/**
 * 商品模型
 */
class GoodsModel extends Model{
    public $table ='goods' ;
    /*自动完成*/
    public $auto = array(
		array('time','time','function',2,1),
		
	);
    
	
	/*验证*/
    public $validate = array(
		array('gname','nonull','商品名不能为空',2,3),
	);
    
	/**
	 * 添加商品
	 */
	public function addGoods(){
		if(!$this->create()) return false;
		
		$gid=$this->add();
		$attr = isset($_POST['attr'])? $_POST['attr']: array();
		$data = array();
		foreach($attr as $k=>$v){
			$data[] = array(
				'gavalue'	=> $v,
				'eprice' => 0,
				'type_attr_taid'=> $k,
				'goods_gid'=>$gid
			);
		}
		//循环提交的数组 插入到attr
		$spec = isset($_POST['spec']) ? $_POST['spec'] : array();
		foreach ($spec as $k => $v){
			for ($i = 0; $i < count($v['tavalue']); $i++){
				$data[] = array(
					'gavalue' => $v['tavalue'][$i],
					'eprice' => (int) $v['added'][$i],
					'type_attr_taid'	=> $k,
					'goods_gid'=>$gid
					);
			}
		}
	
		//添加商品属性
		foreach($data as $v){
			M('goods_attr')->add($v);
		}
		
		//商品详细表添加
		$detail= array();
		$img = array();
		$str1='';
		$str2='';
		$str3='';
		foreach($_POST['pic'] as $v){
				$str1.=$v.",";
				$str2.=dirname($v) . '/middle_' . basename($v).",";
				$str3.=dirname($v) . '/small_' . basename($v).",";
		}
			$detail =array(
				'service'=>$_POST['service'],
				'detail'=>$_POST['detail'],
				's_img'=>rtrim($str3,','),
				'm_img'=>rtrim($str2,','),
				'l_img'=>rtrim($str1,','),
				'goods_gid'=>$gid,
			
			);
			M('goods_detail')->add($detail);
		return true;
	}



	/**
	 * 编辑商品
	 */
    public function editGoods(){
    	if(!$this->create()) return false;
		$this->update();
		$gid = Q('get.gid',0,'intval');
		//先删除在添加
		M('goods_attr')->where("goods_gid=$gid")->del();
		$attr = isset($_POST['attr'])? $_POST['attr']: array();
		$data = array();
		foreach($attr as $k=>$v){
			$data[] = array(
				'gavalue'	=> $v,
				'eprice' => 0,
				'type_attr_taid'=> $k,
				'goods_gid'=>$gid
			);
		}
		//循环提交的数组 插入到attr
		$spec = isset($_POST['spec']) ? $_POST['spec'] : array();
		foreach ($spec as $k => $v){
			for ($i = 0; $i < count($v['tavalue']); $i++){
				$data[] = array(
					'gavalue' => $v['tavalue'][$i],
					'eprice' => (int) $v['added'][$i],
					'type_attr_taid'=> $k,
					'goods_gid'=>$gid
				);
			}
		}
		
		//编辑商品属性
		foreach($data as $v){
			M('goods_attr')->add($v);
		}
		//商品详细表添加
		$detail= array();
		$str1='';
		$str2='';
		$str3='';
		foreach($_POST['pic'] as $v){
			$str1.=$v.",";
			$str2.=dirname($v) . '/middle_' . basename($v).",";
			$str3.=dirname($v) . '/small_' . basename($v).",";
		}
			$detail =array(
				'service'=>$_POST['service'],
				'detail'=>$_POST['detail'],
				's_img'=>rtrim($str3,','),
				'm_img'=>rtrim($str2,','),
				'l_img'=>rtrim($str1,','),
				'goods_gid'=>$gid,
				'gdid'=>Q('post.gdid',0,'intval')
			
			);
			M('goods_detail')->update($detail);
		
		return true;
    }
 }
 
 
 
 
 
 
 
 
 
 
 






 ?>
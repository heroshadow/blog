<?php 
/**
 * 分类模型
 */
class CategoryModel extends Model{
    public $table ="category" ;

    public $validate = array(
		array('cname','nonull','分类名称不能空',2,3),
	);
    
    public function addCate(){
    	if(!$this->create()) return false;
		$_POST['pid']= Q('get.pid',0,'intval');
		return $this->add($_POST);
    }
	
	public function editCate(){
		if(!$this->create()) return false;
		$this->update();
		return true;
	}
	/**
	 * 递归获得$cid对应的所有子集
	 */
	 public function getSon($cid,$allData){
	 	$temp = array();
		foreach($allData as $v){
			if($v['pid']==$cid){
				$temp[]= $v['cid'];
				$temp = array_merge($temp,$this->getSon($v['cid'],$allData));
			}
		}
		return $temp;
	 }
	 
	 /**
	  * 通过cid找到所有的商品
	  */
	public function cidtoGid($cids,$cid){
		//调取缓存
		$gids = S("{$cid}_gid");
		//如果缓存失效
		if(!$gids){
			$gids = K('Goods')->where("category_cid IN(".implode(',', $cids).")")->getField('gid',true);
			S("{$cid}_gid");
		}
		return $gids;
	}
	/**
	 * 通过cid递归找父级cid 用于面包屑导航 筛选
	 */
	public function _getFatherCids($cid,$data){
		$temp = array();
		foreach($data as $v){
			if($v['cid']==$cid){
				$temp[]= $v;
				$temp = array_merge($temp,$this->_getFatherCids($v['pid'], $data));
			}
		}
		return $temp;
	}
	/**
	 * 递归获得子集不包括自己
	 */
	public function getCids($cid,$data){
		$temp = array();
		foreach($data as $v){
			if($v['pid']==$cid){
				$temp[]=$v['cid'];
				$temp = array_merge($temp,$this->getCids($v['cid'],$data));
			}
		}
		return $temp;
	}
	
	
	
	
	
	
	
	
	
 }
 
 
 
 
 
 
 
 
 
 
 




 ?>
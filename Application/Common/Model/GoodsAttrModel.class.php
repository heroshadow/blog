<?php 
/**
 * 商品属性管理模型
 */
class GoodsAttrModel extends Model{
    public $table ="goods_attr" ;
    
    public $auto = array();
    
    public $validate = array();
 
	/**
	 * 通过商品$gids获取商品属性
	 */ 
 	public function getAttr($gids){
 		$attr = $this->where("goods_gid IN(".implode(',', $gids).")")->group('gavalue')->all();
		$temp1=array();
		foreach($attr as $k=>$v){
			$temp1[$v['type_attr_taid']][]= $v;
		}
		//找到商品属性对应的类型属性taname
		$temp2=array();
		$model= M('type_attr');
		foreach($temp1 as $k=>$v){
			$temp2[]=array(
				'name'=>$model->where("taid=$k")->getField('taname'),
				'value'=>$v,
			);
		}
		return $temp2;
		
	}
 
 	/**
	 *	通过筛选参数,筛选gid
	 */
 	public function filterGids($param,$gids){
 		$gid = array();
		foreach($param as $gaid){
			//不是选择0的全部的时候
			if($gaid){
				$gid[]= M()->join('__goods_attr__ ga1 JOIN __goods_attr__ ga2 ON ga1.gavalue=ga2.gavalue')->where("ga1.gaid=$gaid")->getField('ga2.goods_gid',true);
			}
		}
		if($gid){
			foreach($gid as $k=>$value){
				if($k==0){
					$temp=$value;
				}else{
					$temp = array_intersect($value, $temp);
				}
			}
			$gids = array_intersect($temp, $gids);
		}
			return $gids;
 	}
 
 
 
 
 
 
 
 
    
    
 }
 
 
 
 
 
 
 
 
 
 
 
 
 




 ?>
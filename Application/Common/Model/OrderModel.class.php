<?php 
/**
 * 订单模型
 */
class OrderModel extends Model{
    public $table = 'od';
    
     /*自动完成*/
    public $auto = array(
		array('time','time','function',2,1),
		array('state',0,'string',2,1),
		array('number','getId','method',2,1),
		array('user_uid','getUid','method',2,1),
	);
	//获得商品订单号
	public function getId(){
		return Cart::getOrderId();
	}
	//获得当前用户id
	public function getUid(){
		return $_SESSION['uid'];
	}
	//循环添加订单列表
	public function addData(){
		//触发自动完成和验证 create()方法
		if(!$this->create()) return false;
		//返回自增id
		$oid = $this->add();
		//循环session被选中商品结算数组
		$data = $_SESSION['goodslinshi']['goods'];
		foreach($data as $k=>$v){
			//组合数组添加到订单列表
			$data = array(
				'num'=>$v['num'],
				'subtotal'=>$v['total'],
				'goods_gid'=>$v['gid'],
				'od_oid'=>$oid,
				'thumb'=>$v['img'],
				'name'=>$v['name'],
				'options'=>implode(',', $v['options']),
			);
			M('od_list')->add($data);
		}
		//清空购物车
		Cart::delAll();
		//返回自增id
		return $oid; 
	} 
		
	
 }
 
 
 
 
 
 
 
 
 
 
 




 ?>
 
 
 
 
 
 
 
 
 
 

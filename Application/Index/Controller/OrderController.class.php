<?php 
/**
 * 订单控制器
 */
class OrderController extends Controller{
	private $model;
	public function __init(){
		parent::__init();
		$this->model=K('Order');
	}
    /**
     * 订单信息
     */
    public function index(){
    	//post提交的要选择结算的商品sid 去点,变成数组
    	$sids = rtrim($_POST['sids'],',');
		$sids = explode(',', $sids);
		//定义一个空数组 保存要结算商品数据
		$goodsData = array();
		//如果session里的商品sid 在提交过来的sids数组里有对应值 就插入当前商品数据当$goodsData;
		foreach($_SESSION['cart']['goods'] as $k=>$v){
			if(in_array($k, $sids)){
				$goodsData['goods'][$k]= $v;
			}	
		}
		//用户id
    	$uid = $_SESSION['uid'];
		//定义俩个变量 保存总商品数和总价格
		$a=0;
		$b=0;
		//获得所有购物车商品信息
		foreach($goodsData['goods'] as $k=>$v){
			$a= $a+$v['num'];
			$b= $b+$v['total'];
		}
		$goodsData['total_rows']=$a;
		$goodsData['totalPrice']=$b;
		$this->assign('goodsData',$goodsData);
		$_SESSION['goodslinshi']=$goodsData;
		//查询用户地址
		$add = M('address')->where("user_uid=$uid")->all();
		$this->assign('add',$add);
        $this->display(); 
    }
	/**
	 * 异步添加地址
	 */
	 public function addAdd(){
	 	if(!IS_AJAX) return;
		$uid = Q('post.user_uid',0,'intval');
		//查询这个用户所有的地址id
		$add = M('address')->where("user_uid=$uid")->find();
		//为真 添加这个用户的其它地址 默认地址字段为0
		if($add){
			$daddres=0;
		//否则添加的第一个地址为默认地址
		}else{
			$daddres=1;
		}
		/*组合数组*/
	 	$data = array(
			'consignee' =>Q('post.consignee'),
			'area' => Q('post.area'),
			'cellphone' => Q('post.cellphone'),
			'add' =>Q('post.add'),
			'user_uid' => Q('post.user_uid'),
			'daddres'=>$daddres,
		);
		//数据库添加返回自增id
		$addid = M('address')->add($data);
		//查询并ajax返回这条地址数据
		$data = M('address')->where("addid=$addid")->find();
		$this->ajax($data);
	}
	 
	/**
	 * 提交订单
	 */
	public function addOrder(){
		if(IS_POST){
			if(!($oid = $this->model->addData())) $this->error($this->model->error);
			
			$this->success('提交成功',U('Pay/index',array('oid'=>$oid)));
		}	
	} 
	/**
	 * 异步查询收货地址地址
	 */ 
	public function shipAdd(){
		if(!IS_AJAX) return;
		$uid = Q('post.uid');
		$data = M('address')->where("user_uid=$uid&&daddres=1")->find();
		if($data){
			$this->ajax($data);
		}else{
			$this->ajax(0);
		}	
	}	  
	
	/**
	 * 异步根据所选addid地址查询
	 */
	public function addConfirm(){
		if(!IS_AJAX) return;
		$addid = Q('post.addid');
		$data = M('address')->where("addid=$addid")->find();
		if($data){
			$this->ajax($data);
		}else{
			$this->ajax(0);
		}
	}
}
 
 
 
 
 
 
 
 
 
 
 




 ?>
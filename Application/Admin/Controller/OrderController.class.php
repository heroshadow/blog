<?php 
/**
 * 订单管理控制器
 */
class OrderController extends AuthController{
	private $model;
	public function __init(){
		parent::__init();
		$this->model=K('Order');
	}
    /**
     * 订单
     */
    public function index(){
    	$data = $this->model->all();
		$this->assign('data',$data);
        $this->display(); 
    }
	/**
	 * 订单列表
	 */
	public function orderList(){
		$oid = Q('get.oid',0,'intval');
		p($oid);
		$data = M('od_list')->where("od_oid=$oid")->all();
		p($data);
		$this->assign('data',$data);
		$this->display('orderlist');
	}
	/**
	 * 删除订单
	 */
	public function delOrder(){
		
	} 
	 
	 
 }
 
 
 
 
 
 
 
 
 
 
 




 ?>
<?php 
/**
 * 购物车控制器
 */
class CartController extends Controller{
    /**
     * 默认控制器
     */
    public function index(){
       	$d = cart::getGoods();
		$_SESSION['allNum']= Cart::getTotalNums();
		//获取商品所有数据
    	$data = cart::getAllData();
		$this->assign('data',$data);
		//获取总价格
		$total = cart::getTotalPrice();
		$this->assign('total',$total);
        $this->display(); 
    }
	/**
	 * 更新购物车
	 */
	public function update(){
		//不是ajax提交返回
		$sid = $_POST['sid'];
		if(!IS_AJAX) return;
		//购物车更新
		Cart::update($_POST);
		//获得所有商品数据
		$total = Cart::getAllData();
		$total['xiaoji'] = $total['goods'][$sid]['total'];
		$this->ajax($total);	
		
	}
}
 
 
 
 
 
 
 
 
 
 
 





 ?>
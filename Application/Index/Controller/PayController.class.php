<?php 
/**
 * 支付控制器
 */
class PayController extends Controller{
    /**
     * 支付页面
     */
    public function index(){
    	
    	$oid = Q('get.oid',0,'intval');
		$odData = M('od')->where("oid=$oid")->find();
		$this->assign('odData',$odData);
        $this->display(); 
    }
	/**
	 * ajax付款
	 */
	public function pay(){
		$oid = $_POST['oid'];
		$data = array('oid'=>$oid,'state'=>1);
		M('od')->update($data);
		$this->ajax(1);
	}
	/**
	 * 个人中心订单页面支付
	 */
	public function payFor(){
		$oid=$_GET['oid'];
		$data = array('oid'=>$oid,'state'=>1);
		M('od')->update($data);
		$this->success('支付成功',U('Personal/order'));
	}
	/**
	 * 取消订单
	 */
	public function cancle(){
		$oid=$_GET['oid'];
		//删除订单
		M('od')->where("oid=$oid")->del();
		//删除订单相关订单列表数据
		M('od_list')->where("od_oid=$oid")->del();
		$this->success('取消订单成功',U('Personal/order'));
	}
 }
 
 
 
 
 
 
 
 
 
 
 




 ?>
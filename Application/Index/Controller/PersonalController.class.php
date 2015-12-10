<?php 
/**
 * 个人中心控制器
 */
class PersonalController extends CommonController{
    /**
     * 个人中心欢迎页面
     */
    public function index(){
    	//顶级分类
    	$this->topCategory();
        $this->display(); 
    }
	
	/**
	 * 订单管理
	 */
	public function order(){
		$this->topCategory();
		if(!isset($_SESSION['uid'])){
			$this->error('请登录');
		} 
		//用户id
		$uid = $_SESSION['uid'];
		//查找用户相关订单
		$data = M('od')->where("user_uid=$uid")->all();
		//订单先关订单列表
		foreach($data as $k=>$v){
			$where = array('od_oid'=>$v['oid']);
			$data[$k]['list']=M('od_list')->where($where)->all();
		}
		//分配数据
		$this->assign('data',$data);
		//模版
 		$this->display('order');

 	}
 }
 

 
 
 
 
 
 
 
 
 




?>
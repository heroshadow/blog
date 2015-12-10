<?php 
/**
 * 登录控制器
 */
class LoginController extends Controller{
    /**
     * 后台登录
     */
    public function index(){
    	if(IS_POST){
    		//查找用户名
    		$username = Q('post.username');
			$userData = M('user')->where("username='{$username}'")->find();
			if(!$userData) $this->error('用户名或密码错误');
			if($userData['is_admin']==0) $this->error('没有管理员权限');
			
			//比对密码
			if($userData['password']!=Q('post.password','','md5')) $this->error('用户名或密码错误');
			if(session('code')!=Q('post.code','','strtoupper')) $this->error('验证码错误');
			
			//登录成功存入session
			session('aname',$userData['username']);
			session('aid',$userData['uid']);
			$this->success('登录成功',U('Admin/Index/index'));
    	}
       $this->display(); 
    }
	
	/**
	 * 验证码
	 */
	 public function code(){
	 	$code = new Code;
		$code->show();
	 }
	 /**
	  * 退出
	  */
	 
	 public function logout(){
	 	session(null);
		$this->success('退出成功',U('Index/index'));
	 }

 }
 
 
 
 
 
 
 
 
 
 
 








 ?>
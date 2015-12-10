<?php 
/**
 * 登录,注册控制器
 */
class MemberController extends Controller{
	private $model;
	public function __init(){
		parent::__init();
		$this->model=K('User');
	}
    /**
     * 登录
     */
    public function login(){
    	if(IS_POST){
    		if(!$this->model->lo()) $this->error($this->model->error);
			//处理提交的邮箱,和密码 用于比对数据库
			$email=Q('post.email');
			$password=Q('post.password',0,'md5');
			$userData = $this->model->where("email='{$email}'")->find();
			if(!$userData) $this->error('邮箱或密码错误');
			if($userData['password']!=$password) $this->error('邮箱或密码错误');
			//比对成功存入session
			session('uemail',$userData['email']);
			session('uid',$userData['uid']);
			$this->success('登录成功',U('Index/index'));
    	}
       $this->display('login'); 
    }
	/**
	 * 注册
	 */
	public function register(){
		
		if(IS_POST){
			//验证输入内容
			if(!$this->model->re()) $this->error($this->model->error);
			//通过验证比对查找数据库注册邮箱是否已被注册
			$email = Q('post.email');
			$userData = $this->model->where("email='$email'")->find();
			if($userData) $this->error('邮箱已被注册');
			//检验验证码输入是否正确
			$code=Q('post.code',0,'strtoupper');
			if(!$code==session('code')) $this->error('验证码输入错误');
			//组合数组插入数据库
			$data = array(
				'email'=>$email,
				'password'=>Q('post.password1',0,'md5'),
			);
			$this->model->add($data);
			$this->success('注册成功',U('Index/index'));
		}
		$this->display('register');
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
	public function out(){
		session(null);
		$this->success('退出成功',U('Index/index'));
	} 
	 
	 
 }
 
 
 
 
 
 
 
 
 
 
 



 ?>
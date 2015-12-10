<?php 
/**
 * 用户模型
 */
class UserModel extends Model{
    public $table ='user';
    
    
    public $validate = array(
		array('email','nonull','邮箱不能为空',1,3),
		array('email','email','邮箱格式不正确',1,1),
		array('password','nonull','密码不能为空',1,1),
		array('password1','nonull','密码不能为空',1,3),
		array('password2','confirm:password1','俩次密码不一致',1,3),
		array('cellphone','nonull','手机号不能为空',1,3),
	);
	
	/**
	 * 注册用户验证
	 */
    public function re(){
    	if(!$this->create()) return false;
		return true;
    }
    /**
	 * 登录用户验证
	 */
	 public function lo(){
	 	if(!$this->create()) return false;
		return true;
	 }
 }
 
 
 
 
 
 
 
 
 
 
 



 ?>
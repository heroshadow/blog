<?php 
/**
 * 登录验证控制器
 */
class AuthController extends Controller{

    public function __init(){
       if(!session('aid') || !session('aname'))
       {
       	 go(U('Login/index'));
       }  
    }
 }
 
 
 
 
 
 
 
 
 
 
 





 ?>
<?php
class IndexController extends AuthController{
	
    public function index(){
        //显示视图
        $this->display();
    }
	/**
	 * 信息
	 */
	 public function info(){
	 	$this->display();
	 }
}

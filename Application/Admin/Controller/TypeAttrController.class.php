<?php 
/**
 * 类型属性控制器
 */
class TypeAttrController extends AuthController{
	private $model;
	public function __init(){
		parent::__init();
		$this->model=K('TypeAttr');
	}
    /**
     * 类型属性默认显示
     */
    public function index(){
    	$tid =Q('get.tid',0,'intval');
    	$data = $this->model->where("type_tid={$tid}")->all();
		$this->assign('data',$data);
       	$this->display(); 
	   
    }
	/**
	 * 添加类型属性
	 */
	 public function add(){
	 	if(IS_POST){
	 		if(!$this->model->addAttr()) $this->error($this->model->error);
			$this->success('添加成功',U('index',array('tid'=>Q('get.tid',0,'intval'))));
			
	 	}
	 	$this->display();
	 }
	 
	 public function edit(){
	 	if(IS_POST){
	 		if(!$this->model->editAttr()) $this->error($this->model->error);
			$this->success('修改成功',U('index',array('tid'=>Q('post.type_tid',0,'intval'))));
	 	}
		$taid = Q('get.taid','0','intval');
		$oldAttr = $this->model->where("taid={$taid}")->find();
		$this->assign('oldAttr',$oldAttr);	
		$this->display();
	 }
	 
	 public function del(){
	 	$taid = Q('get.taid',0,'intval');
		$this->model->where("taid={$taid}")->del();
		$this->success('删除成功',U('index',array('tid'=>Q('get.tid',0,'intval'))));
	 }
 }
 
 
 
 
 
 
 
 
 
 
 




 ?>
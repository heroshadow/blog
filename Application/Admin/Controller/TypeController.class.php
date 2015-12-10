<?php 
/**
 * 类型控制器
 */
class TypeController extends AuthController{
	private $model;
	
	public function __init(){
		parent::__init();
		$this->model=K('Type');
		
	}
    /**
     * 显示类型页面
     */
    public function index(){
    	$data = $this->model->all();
		$this->assign('data',$data);
        $this->display(); 
    }
	
	/**
	 * 添加类型
	 */
	 public function add(){
	 	if(IS_POST){
	 		if(!$this->model->addType()) $this->error($this->model->error);
			$this->success('添加类型成功','Type/index');
	 	}
	 	$this->display();
	 }
	 /**
	  * 删除类型
	  */
	  public function del(){
	  	$tid = Q('tid',0,'intval');
		$this->model->where("tid={$tid}")->del();
		$this->success('删除类型成功',U('index'));
	  }
	  
	  /**
	   * 编辑类型
	   */
	   public function edit(){
			if(IS_POST){
				if(!$this->model->editType())	$this->error($this->model->error);
				$this->success('编辑成功',U('index'));
			}
			$tid = Q('tid','','intval');
			//获得旧数据
			$oldData = $this->model->where("tid={$tid}")->find();
			$this->assign('oldData',$oldData);
			$this->display();
	   }
	   
 }
 
 
 
 
 
 
 
 
 
 
 



 ?>
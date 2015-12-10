<?php 
/**
 * 品牌管理控制器
 */
class BrandController extends AuthController{
 	private $model;
	public function __init(){
		parent::__init();
		$this->model= K('Brand');
	}
 	
    public function index(){
       
	   $brandData = $this->model->all();
	   $this->assign('brandData',$brandData);
	   $this->display();
    }
	
	/**
	 * 添加品牌
	 */
	 public function add(){
	 	if(IS_POST){
	 		if(!$this->model->addBrand()) $this->error($this->model->error);
			$this->success('添加成功',U('Brand/index'));
	 	}
		$category = K('Category')->field('cname,cid')->where('pid=0')->all();
		$this->assign('category',$category);
		$this->display();
	 }
	 
	/*修改品牌*/
	public function edit(){
		if(IS_POST){
			if(!$this->model->editBrand()) $this->error($this->model->error);
			$this->success('编辑成功',U('Brand/index'));
		}
		$bid = Q('get.bid',0,'intval');
		$oldBrand = $this->model->where("bid=$bid")->find();
		$this->assign('oldBrand',$oldBrand);
		$this->display();
	}
	
	
	 /*删除品牌*/
	 public function del(){
	 	$bid = Q('get.bid',0,'intval');
		$this->model->where("bid=$bid")->del();
		$this->success('删除成功','index');
	 }
	 /**
	  * 图片上传类
	  */
	public function upload(){
		$upload = new Upload('./Uploads/Logo/');
		$file = $upload->upload();
		if(empty($file)){
			//相当于 echo json_code('上传失败');exit;
			$this->ajax('上传失败');
		}else{
			$data = $file[0];
			$this->ajax($data);
		}
	}
	
	/*删除图片*/
	public function delimage(){
		//接受图片路径
		$path = Q('post.p');
		//删除图片
		unlink($path);
	}
 }
 
 
 
 
 
 
 
 
 
 
 





 ?>
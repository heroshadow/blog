<?php 
/**
 * 分类管理控制器
 */
class CategoryController extends AuthController{
	private $model;
	public function __init(){
		parent::__init();
		$this->model=K('Category');
	}


    public function index(){
    	$cate = $this->model->all();
		$cate = Data::tree($cate,'cname');
		$this->assign('cate',$cate);
       	$this->display(); 
    }
	
	//添加分类,子分类
	public function add(){
		//分类类型
		if(IS_POST){
			if(!$this->model->addCate()) $this->error($this->model->error);
			$this->success('添加成功',U('Category/index'));
		}
		$typeData = M('type')->all();
		$this->assign('typeData',$typeData);
		$this->display();
	}
	
	public function del(){
		//删除分类
		$cid = Q('get.cid',0,'intval');
		if($this->model->where("pid=$cid")->find()) $this->error('请先删除子分类');
		$this->model->where("cid=$cid")->del();
		$this->success('删除成功',U('Category/index'));
	}
	
	public function edit(){
		//修改分类
		if(IS_POST){
			if(!$this->model->editCate()) $this->error($this->model->error);
			$this->success('修改成功',U('Category/index'));
		}
		$cid = Q('get.cid',0,'intval');
		
		//类型循环分配
		$type = M('type')->all();
		$this->assign('typeData',$type);
		
		//旧数据
		$oldCate = $this->model->where("cid=$cid")->find();
		$this->assign('oldCate',$oldCate);
		
		//处理分类
		$allData = $this->model->all();
		$cid = Q('cid',0,'intval');
		$cids = $this->getSon($cid,$allData);
		$cids[]=$cid;
		$data = $this->model->where("cid NOT IN(" .implode(',', $cids). ")")->all();
		$data = Data::tree($data,'cname');
		$this->assign('data',$data);
		$this->display();
	}
	/**
	 * 图片上传类
	 */
	public function upload(){
		if(IS_AJAX) return;
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
 }
 
 
 
 
 
 
 
 
 
 
 






 ?>
<?php 
/**
 * 商品信息管理控制器
 */
class GoodsController extends AuthController{
	private $model;
	
	public function __init(){
		parent::__init();
		$this->model=K('Goods');
	}
	/**
	 * 商品列表
	 */
    public function index(){
    	$goodsData = $this->model->all();
		$this->assign('goodsData',$goodsData);
        $this->display(); 
    }


    /**
     * 添加商品
     */
    public function add(){
		if(IS_POST)
		{
			if(!$this->model->addGoods()) $this->error($this->model->error);
			$this->success('添加成功',U('index'));
		}
    	//所属分类
    	$typeData = M('category')->all();
		$typeData = Data::tree($typeData,'cname');
		$this->assign('typeData',$typeData);
		
		//所属品牌
		$brandData = M('brand')->all();
		$this->assign('brandData',$brandData);

    	$this->display();
    }
	
	
	/**
	 * 异步获取分类属性值
	 */
	public function getAttr(){
	 	$tid = Q('post.tid',0,'intval');
		$attr = M('type_attr')->where("type_tid=$tid")->all();

		$this->ajax($attr,"JSON");
	 }
	 
	/**
     * upload上传插件处理
	 * 商品列表图
	 */
	public function uploadList(){
		$upload = new Upload('Upload/Content/listImg/' .date('y/m'));
		$file = $upload->upload();
		if(empty($file)){
			$this->ajax('上传失败');
		}else{
			$data = $file[0];
			$this->ajax($data);
		}
	}
	/**
	 * 首页循环大图,和小图上传处理
	 */
	public function uploadImg(){
		$upload = new Upload('Upload/Content/Img/'.date('y/m'));
		$file = $upload->upload();
		if(empty($file)){
			$this->ajax('上传失败');
		}else{
			$data = $file[0];
			$this->ajax($data);
		}
	}
	/**
	 * 异步删除列表图
	 */
	 public function del_listimg(){
	 	$path = Q('post.path');
		unlink($path);
	 }

	/**
	 * 商品图册(小,中,大)
	 */
	public function uploadPic(){
	  	$upload = New Upload('Upload/Content/pic/' .date('y/m'));
		$file = $upload->upload();
		if(empty($file)){
			$this->ajax('上传失败');
		}else{
			$data = $file[0];
			/*缩略图操作*/
			$image = new Image;
			$smallPath = dirname($data['path']).'/small_'.basename($data['path']);
			$image->thumb($data['path'],$smallPath,80,80,6);
			$middlePath = dirname($data['path']).'/middle_'.basename($data['path']);
			$image->thumb($data['path'],$middlePath,480,480,6);
			$this->ajax($data);
		}
	  }
	
	/**
	 * 异步删除商品图册
	 */
	public function del_picimg(){
	  	$path = Q('post.path');
		unlink($path);
		$smallPath = dirname($path).'/small_'.basename($path);
		unlink($smallPath);
		$middlePaht = dirname($path).'/middle_'.basename($path);
		unlink($middlePaht);
	}
	
	/**
	 * 删除商品
	 */
	public function del(){
		$gid = Q('gid',0,'intval');
		//删除列表图
		$goods=$this->model->where("gid=$gid")->find();
		unlink($goods['listimg']);
		//删除商品图册
		$detail = M('goods_detail')->where("goods_gid=$gid")->find();
		
		
		$img = explode(',', $detail['l_img']);
		//循环组合删除图片
		foreach ($img as $v){
			unlink($v);
			$small = dirname($v) . '/small_' . basename($v);
			unlink($small);
			$middle = dirname($v) . '/middle_' . basename($v);
			unlink($middle);		
		}
		
		$this->model->where("gid={$gid}")->del();
		M('goods_attr')->where("goods_gid={$gid}")->del();
		M('goods_detail')->where("goods_gid={$gid}")->del();
		$goods=K('Goods')->where("gid=$gid")->find();
		
		$this->success('删除成功',U('index'));
		
	}
	
	/**
	 * 修改商品
	 */
	public function edit(){
		if(IS_POST){
			if(!$this->model->editGoods()) $this->error($this->model->error);
		
			$this->success('修改成功',U('index'));
		}
		//所属分类
		$typeData = M('category')->all();
		$typeData = Data::tree($typeData,'cname');
		$this->assign('typeData',$typeData);
		//所属品牌
		$brandData = M('brand')->all();
		$this->assign('brandData',$brandData);
		//商品和商品详细表关联查询旧数据
		$gid = Q('get.gid',0,'intval');
		$oldData = M()->join("__goods__ g JOIN __goods_detail__ gd ON g.gid=gd.goods_gid")->where("gid=$gid")->find();
		$this->assign('oldData',$oldData);
		
		//关联商品属性和类型属性表获得旧规格和属性
		$goodsArr = M()->join('__goods_attr__ ga JOIN __type_attr__ ta on ga.type_attr_taid=ta.taid')->where("ga.goods_gid=$gid")->all();
		
		foreach($goodsArr as $k=>$v){
			if(!$v['tavalue']==''){
				$goodsArr[$k]['tavalue']=explode(',', $v['tavalue']);
			}
			
		}
		$this->assign('goodsArr',$goodsArr);
		//旧列表和商品图册
		$img = explode(',', $oldData['l_img']);
		$this->assign('img',$img);
		
		
		$this->display();
	}
	
	
	
 }
 
 
 
 
 
 
 
 
 
 
 



 ?>
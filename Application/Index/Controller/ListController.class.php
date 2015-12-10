<?php 
/**
 * 列表页控制器控制器
 */
class ListController extends CommonController{
	private $model;
	
	public function __init(){
		parent::__init();
		$this->model=K('Category');
	}
	/*列表页*/
    public function index(){
    	//顶级分类
    	$this->topCategory();
		//通过cid 面包屑导航
		$cid = Q('cid',0,'intval');
		$data = $this->model->select();
		//或许当前分类所有父级分类
		$faterData = $this->model->_getFatherCids($cid,$data);
		//反转数组
		$faterData = array_reverse($faterData);
		$this->assign('fatherData',$faterData);
		
		/*筛选*/
		//获取所有子分类cid 
		$cids = $this->model->getCids($cid,$data);
		//压入自己
		$cids[]=$cid;
		//通过cid找到所有商品gid
		$gids = $this->model->cidtoGid($cids,$cid);
		if($gids){
			$attr = K('GoodsAttr')->getAttr($gids);
			$this->assign('attr',$attr );
			$total = count($attr);
			$param = isset($_GET['param'])?explode('-',  $_GET['param']):array_fill(0, $total, 0);
			//防止用户乱改参数
			if(count($param)!=$total) $param=array_fill(0, $total, 0);
			$this->assign('param',$param);
			//通过$param $gids 筛选商品
			$lastGids = K('GoodsAttr')->filterGids($param,$gids);
		}else{
			$lastGids = array();
		}
		// 显示分类下所有商品
		if($lastGids){
			$goods = M('goods')->where("gid IN(".implode(',', $lastGids).")")->select();
		}else{
			$goods = array();
		}
		//分页处理
		if($goods){
			$total  = count($goods);
			$pageobj = new Page($total,8,5);
			$page = $pageobj->show();
			$goods = M('goods')->where("gid IN(".implode(',', $lastGids).")")->limit($pageobj->limit())->select();
			$this->assign('page',$page);
		}
		//商品总数
		$count = isset($goods)?count($goods):0;
		$this->assign('count',$count);
		
		$this->assign('goods',$goods);
       	$this->display(); 
    }
 }
 
 
 
 
 
 
 
 
 
 
 




 ?>
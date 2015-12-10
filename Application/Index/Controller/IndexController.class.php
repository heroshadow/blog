<?php 
/**
 * 默认主页控制器
 */
class IndexController extends CommonController{
	private $model;
	public function __init(){
		parent::__init();
		$this->model=K('category');
	}
    /**
     * 显示页面,分类
     */
    public function index(){
    	//显示顶级分类
    	$this->topCategory();
		//查询所有顶级分类
		$floor = $this->model->where("pid=0")->select();
		//分类所有数据
		$data =$this->model->select();
		//获得当前分类下的所有子分类
		foreach($floor as $k=>$v){
			$floor[$k]['cids'] = $this->model->getCids($v['cid'],$data);
			$floor[$k]['cids'][]=$v['cid'];
		}
		//获得所有子分类下的商品的gid
		foreach ($floor as $k=>$v){
			$floor[$k]['gids']= $this->model->cidtoGid($v['cids'],$v['cid']);
		}
		//根据gid调取分类下所有商品
		foreach ($floor as $k=>$v){
			if($floor[$k]['gids']){
				$floor[$k]['goods']=M('goods')->where("gid IN(".implode(',', $floor[$k]['gids']).")")->limit(5)->select();
			}else{
				$floor[$k]['goods']=array();
			}
		}
		$this->assign('floor',$floor);
        $this->display(); 
    }
 }
 
 
 
 
 
 
 
 
 
 
 





 ?>
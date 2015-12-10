<?php 
/**
 * 商品控制器
 */
class GoodsController extends CommonController{
    /**
     * 显示商品详情
     */
    public function index(){
    	//顶级分类
    	$this->topCategory();
		//大中小图处理
		$gid = Q('get.gid',0,'intval');
		$goods = M()->join('__goods__ g JOIN __goods_detail__ gd ON g.gid=gd.goods_gid')->where("g.gid=$gid")->find();
		$goods['m_img']= explode(',', $goods['m_img']);
		$goods['l_img']= explode(',', $goods['l_img']);
		$goods['s_img']= explode(',', $goods['s_img']);
		//折扣
		$goods['zhekou'] = round($goods['sprice']/$goods['mprice'],2)*10;
		//总库存
		$kucun = M('goods_list')->where("goods_gid=$gid")->select();
		//查询货品列表 每种货品列表组合的库存相加
		$inventory = '';
		foreach($kucun as $v){
			$inventory+= $v['kucun'];
		}
		$goods['inventory'] = $inventory;
		//分配
		$this->assign('goods',$goods);
		//获得商品tid
		$tid = $goods['type_tid'];
		//获得当前商品的类型属性 class为1的规格
		$spec = M('type_attr')->where("type_tid=$tid&&class=1")->all();
		$db = M("goods_attr");
		//遍历此函数
		foreach ($spec as $k => $v)
		{
			$where = array('goods_gid' => $gid, 'type_attr_taid' => $v['taid']);
			$spec[$k]['opt'] = $db->where($where)->select();
			
		}		
		$this->assign('spec',$spec);
		//最近浏览商品
		$_SESSION['gid'][]=$gid;
		//去掉重复循环
		foreach(array_unique($_SESSION['gid']) as $k=>$v){
			//根据gid找商品
			$goodsData[]=M('goods')->where("gid={$v}")->find();
		}
		$this->assign('goodsData',$goodsData);
		/*相关商品 随机选取几件商品*/
		/*大家都在买 销量=点击率最高的商品*/
		$hot = M('goods')->limit('5')->order('click desc')->all();
		$this->assign('hot',$hot);
        $this->display(); 
    }
	/**
	 * 异步检测库存和附加价格
	 */
	public function goodsList(){
		if(!IS_AJAX) return;
		//组合提交的数组
		$merge = $_POST['merge'];
		//去除右边的点
		$merge = rtrim($merge,',');
		//查询货品列表相关数据
		$list = M('goods_list')->where("merge='{$merge}'")->find();
		//拆分货品属性id 查询相关附加价格
		$gaid = explode(',', $merge);
		$add = array();
		foreach($gaid as $k=>$v){
			$add[]= M('goods_attr')->where("gaid=$gaid[$k]")->getField('eprice');
		}
		$ex = 0;
		foreach($add as $k=>$v){
			$ex = $ex+$v;
		}
		$list['ex'] = $ex;
		$this->ajax($list);
	}
	
	/**
	 * 添加购物车类
	 */
	public function cart(){
		if(!IS_AJAX) return;
		cart::add($_POST);
		$data = $_SESSION;
		$this->ajax($data);	
	}
	 




 }
 
 
 
 
 
 
 
 
 
 
 



 ?>
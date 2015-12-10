<?php 
/**
 * 公共控制器
 */
class CommonController extends Controller{
    /**
     * 显示顶级分类
     */
	public function topCategory(){
		//获取顶级分类
		$category = M('category')->where("pid=0")->select();
		//顶级分类下的子分类
		foreach($category as $k=>$v)
		{
			$where = array('pid'=>$v['cid']);	
			$category[$k]['son'] = M('category')->where($where)->select();
		}
		$this->assign('category',$category);
	}
}
 
 
 
 
 
 
 
 
 
 
 





 ?>
<?php 
/**
 *  货品控制器
 */
class GoodsListController extends AuthController{
    /**
     * 货品列表
     */
    public function index(){

    	$gid = Q('get.gid',0,'intval');
		$tid = Q('get.type_tid',0,'intval');
		//查询类型属性表 taid taname字段 存入变量
		$spec = M('type_attr')->field('taid,taname')->where("type_tid=$tid&&class=1")->all();
		$db = M("goods_attr");
		//遍历此函数
		$field = array('gaid','gavalue');
		foreach ($spec as $k => $v)
		{
			$where = array('goods_gid' => $gid, 'type_attr_taid' => $v['taid']);
			$spec[$k]['opt'] = $db->where($where)->field($field)->select();
			
		}

//		$attr = M()->join('__goods_attr__ ga JOIN __type_attr__ ta ON ga.type_attr_taid=ta.taid ')->where("class=1&&ta.type_tid=$tid")->all();
		
		$this->assign('spec',$spec);
   
	   /*显示已经添加货品列表*/
	    $list = M('goods_list')->where("goods_gid=$gid")->select();
	    foreach ($list as $k=>$v)                                                                                                                                                                                                                                                                                                          
	    {
		    $where = array('gaid'=>array('in',$v['merge']));
	   		$list[$k]['spec']= M('goods_attr')->where($where)->getField('gavalue',true);
			
	    }
	    $this->assign('list',$list); 
	   
	    $this->display(); 
	}	
	
	/**
	 * 货品添加
	 */
	 public function add(){
	 	if ($_POST['number'] == '')
		{
			$_POST['number'] = date('ymd') . $_POST['gid'] . implode('', $_POST['spec']);
		}
		
		$_POST['merge'] = implode(',', $_POST['spec']);
		$_POST['goods_gid']=$_POST['gid'];
		M('goods_list')->add($_POST);
		$this->success('添加成功',U('index',array('gid'=>$_POST['gid'],'type_tid'=>$_POST['tid'])));
	}
	 
	 
	 /**
	  * 货品编辑
	  */
	public function edit(){
		if(IS_POST){
			// p($_POST);die;
			if ($_POST['number'] == '')
			{
				$_POST['number'] = date('ymd') . $_POST['gid'] . implode('', $_POST['spec']);
		    }
		    $_POST['merge'] = implode(',', $_POST['spec']);
			$_POST['goods_gid']=$_POST['gid'];
			M('goods_list')->update($_POST);
			$this->success('修改成功',U('index',array('gid'=>$_POST['gid'],'type_tid'=>$_POST['tid'])));
		}
		//获得旧数据
		$glid = Q('get.glid',0,'intval');
		$oldData = M('goods_list')->where("glid=$glid")->find();
		$gid = $oldData['goods_gid'];
		//获得货品列表名称
		$tid = Q('get.tid',0,'intval');
		$spec = M('type_attr')->where("type_tid=$tid&&class=1")->all();
		$db = M('goods_attr');
		$field = array('gaid','gavalue');
		foreach ($spec as $k => $v){
			$where = array('goods_gid' => $gid, 'type_attr_taid' => $v['taid']);
			$spec[$k]['opt'] = $db->where($where)->field($field)->select();
		}

		$this->assign('spec',$spec);
		$oldData['merge'] = explode(',', $oldData['merge']);

		$this->assign('oldData',$oldData);
		$this->display();

	}
	  
	  
	  
	  
	 /**
	  * 货品删除
	  */
	  public function del(){
	  	$glid = Q('get.glid',0,'intval');
		M('goods_list')->where("glid=$glid")->del();
		$this->success('删除成功');
	  }
	 
 }
 
 
 
 
 
 
 
 
 
 
 






 ?>
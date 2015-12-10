<?php 
/**
 * 类型属性模型
 */
class TypeAttrModel extends Model{
    public $table ='type_attr' ;
    
    public $auto = array();
    
    public $validate = array(
		array('taname','nonull','类型属性名字不能为空',2,3),
	);
    /**
	 * 添加类型属性验证
	 */
    public function addAttr(){
    	if(!$this->create()) return false;
		$_POST['tavalue'] = str_replace(' ', ',', trim($_POST['tavalue']));
		$this->add($_POST);
		return true;
    }
	
	
	public function editAttr(){
    	if(!$this->create()) return false;
		$_POST['tavalue'] = str_replace(' ', ',', trim($_POST['tavalue']));
		$this->update($_POST);
		return true;
    }
 }
 
 
 
 
 
 
 
 
 
 
 




 ?>
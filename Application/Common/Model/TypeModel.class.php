<?php 
/**
 * 类型模型
 */
class TypeModel extends Model{
    public $table = 'type';
    
    
    
    public $validate = array(
		array('tname','nonull','类型名不能为空',2,3),
	);
    //添加类型验证
    public function addType(){
    	if(!$this->create()) return false;
		return $this->add();
    }
	//编辑类型验证
	public function editType(){
		if(!$this->create()) return false;
		$this->update();
		return true;
	}
 }
 
 
 
 
 
 
 
 
 
 
 




 ?>
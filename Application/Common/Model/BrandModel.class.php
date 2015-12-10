<?php 
/**
 * 品牌模型
 */
class BrandModel extends Model{
    public $table = 'brand' ;
    
    
    
    public $validate = array(
		array('bname','nonull','品牌名不能为空',2,3),
	);
	
	
	/**
	 * 品牌添加验证
	 */
    public function addBrand(){
    	if(!$this->create()) return false;
		return $this->add();
    }

    /**
     * 品牌修改验证
     */
    public function editBrand(){
    	if(!$this->create()) return false;
    	$this->update();
    	return true;
    }
    
 }
 
 
 
 
 
 
 
 
 
 
 





 ?>
 
 
 
 
 
 
 
 
 
 
 

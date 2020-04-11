<?php 
namespace Cloud\Newmodule\Model\ResourceModel\DataExample;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection{
	public function _construct(){
		$this->_init("Cloud\Newmodule\Model\DataExample","Cloud\Newmodule\Model\ResourceModel\DataExample");
	}
}
 ?>
<?php


class Favorites extends Model {
	private $_user_id = NULL;			//用户ID
	function __construct(){
		parent::__construct();
		$this->_user_id = Login::getUserId();
	}
	/**
	 * 返回查询结果
	 */
	function getFavorites(){
		$field = array(
			
		);
		$this->clear();
		
	}
}

?>
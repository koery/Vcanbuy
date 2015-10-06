<?php
class Index extends Model {	
	
	
	function getfields(){
	
		$field = array(
				'*',
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_index_banner1');
		$data = $this->select();
		if($data)
			return $data;
	
	}
	
	function getdatas(){
	
		$field = array(
				'*',
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_index_banner1');
		$data = $this->select();
		if($data)
			return $data;
	
	}
	
	

	/**
	 * 
	 * 获取banner1 数据
	 */
	function getBanner1(){
		
		$field = array(
				'banner_id',
				'img_path',
				
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_index_banner1');	
		$data = $this->select();
		if($data)
			return $data;
		
	}
	
	
	/**
	 *
	 * 获取banner2 数据
	 */
	function getBanner2(){
		
		$field = array(
				'banner_id',
				'img_path',
		
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_index_banner2');
		$data = $this->select();
		if($data)
			return $data;
	}
	
	
	/**
	 *
	 * 获取websites 数据
	 */
	function getWebsites(){
		
		$field = array(
				'website_id',
				'img_path',
				'img_url',
		
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_index_website');
		$data = $this->select();
		if($data)
			return $data;
	}
	
}

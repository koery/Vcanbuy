<?php
class Address extends Model {	

	/**
	 * 数据定义
	 */
	private $_config = array(
			'cn' => array(
					'10000' => '-',
					'30000' => '已停用',
					'50000' => '已删除',
			),
			'th' => array(
					'10000' => '-',
					'30000' => 'ปิดตัวลง',
					'50000' => 'ที่ถูกลบ',
			),
	);
	/**
	 * 返回国家列表
	 * @access public
	 * @param mixed $id 查询ID
	 * @return array
	 */
	function getCountry($countryId =null){
		$field = array (
				'country_id',
				'country',
				'status',
				'orders' 
		);
		$this->clear();											
		$this->setField ( $field );									
		$this->setTable ( 'vcb_address_country' );						
		$this->setWhere('status', '!=', '50000');						
		if ($countryId != null){
			$this->setWhere('country_id', '=', $countryId);
		}
		$this->setOrderBy ( 'orders' );									
		$data = $this->select();										
		
		//状态标题
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			$status = $data[$i]['status'];
			$data[$i]['status_name'] = $this->getStatus($status);
		}

		return $data;
	}

	/**
	 * 返回大区
	 * @access public
	 * @param string $id 查询ID
	 * @return array
	 */
	function getRegion($countryId) {
		$field = array('region_id','region','status','orders');
		$this->clear();
		$this->setField ( $field );										
		$this->setTable ( 'vcb_address_region' );						
		$this->setWhere('status', '=', '10000');						
		$this->setWhere('country_id', '=', $countryId);
		$this->setOrderBy ( 'orders' );									
		$data = $this->select();										
		
		//状态标题
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			//已启用
			$status = $data[$i]['status'];
			$data[$i]['status_name'] = $this->getStatus($status);
			
		}
		return $data;
	}
	
	function getProvince($regionId){
		
		$field = array (
				'province_id',
				'province' 
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_address_province' );
		$this->setWhere('status', '!=', '50000');
		$this->setWhere('region_id', '=', $regionId);
		$data = $this->select();
	
		return $data;
	}
	function getCity($provinceId){
	
		$field = array (
				'city_id',
				'city'
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_address_city' );
		$this->setWhere('status', '!=', '50000');
		$this->setWhere('province_id', '=', $provinceId);
		$data = $this->select();
	
		return $data;
	}
	
	function getStatus($status) {
		$lang = strtolower(LANGUAGE);
		return  $this->_config[$lang][$status];
	}

	/**
	 * 生成js文件
	 * @param string $path 路径
	 * @param string $name 文件名
	 */
	function saveJavascrit($path,$name){
		
	}
}

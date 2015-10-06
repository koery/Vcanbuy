<?php
class Floor extends Model {
	private $_status = array (
			'cn' => array (
					'10000' => '未审核',
					'20000' => '已审核',
					'30000' => '已发布',
					'40000' => '已下架',
					'50000' => '已关闭',
					'60000' => '已删除' 
			),
			'th' => array (
					'10000' => 'ไม่ได้รับการตรวจสอบ',
					'20000' => 'ผ่านการตรวจสอบ',
					'30000' => 'ตีพิมพ์',
					'40000' => 'มีการเก็บรักษา',
					'50000' => 'ปิด',
					'60000' => 'ที่ถูกลบ' 
			) 
	);
	private $_floor_1_id = array(
			'10000'=>'1F 服装内衣 ',
			'20000'=>'2F 鞋包·配饰',
			'30000'=>'3F 孕·婴·童',
			'40000'=>'4F 电子·数码',
			'50000'=>'5F 化妆品',
			'60000'=>'6F 车饰·安防',
	);
	
	function getStatus($lang,$key) {
		return $this->_status[$lang][$key];
	}
	
	/**
	 * 返回类别ID
	 * @return multitype:string
	 */
	function getFloor_1_id() {
		return $this->_floor_1_id;
	}
	/**
	 * 返回类别名称
	 * @param unknown $name
	 * @return multitype:string
	 */
	function getfloor_1($name) {
		return $this->_floor_1_id[$name];
	}
	
	function getFloor_2($floor_1_id){
		$field = array (
				'floor_2_id',
				'floor_2_cn',
				'floor_2_th',
				'floor_1_id',
				'status',
				'orders',
				'created',
				'created_name',
				'audit_name',
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_floor_2' );
		$this->setWhere('status', '!=', '60000');
		$this->setWhere('floor_1_id', '=', $floor_1_id);
		$this->setOrderBy ( 'orders' );
		$data = $this->select();
	
		//状态标题
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			$status = $data[$i]['status'];
			$data[$i]['status_cn'] = $this->getStatus('cn',$status);
			$data[$i]['status_th'] = $this->getStatus('th',$status);
			$data[$i]['floor_1'] = $this->getfloor_1($data[$i]['floor_1_id']);
		}
	
		return $data;
	}
	/**
	 * 
	 * @param string $floor_2_id		floor_2_id
	 * @param string $floor_3_id		floor_3_id
	 * @param string $floor_3			floor_3 关键字
	 * @return unknown
	 */
	function getFloor_3($floor_2_id = NULL, $floor_3_id = NULL, $floor_3 = NULL) {
		$field = array (
				'floor_2.floor_1_id',
				'floor_2.floor_2_id',
				'floor_2.floor_2_cn',
				'floor_2.floor_2_th',
				'floor_3.floor_3_id',
				'floor_3.floor_3_cn',
				'floor_3.floor_3_th',
				'floor_3.orders',
				'floor_3.status',
				'floor_3.created',
				'floor_3.created_name',
				'floor_3.audit_name',
				'floor_3.start_time',
				'floor_3.end_time' 
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_floor_3 AS floor_3' );
		$this->setJoin('vcb_product_floor_2 as floor_2','floor_2.floor_2_id=floor_3.floor_2_id');
		$this->setWhere('floor_3.status', '!=', '60000');
		if ($floor_2_id != null){
			$this->setWhere('floor_3.floor_2_id', '=', $floor_2_id);
		}
		if ($floor_3_id != null){
			$this->setWhere('floor_3.floor_3_id', '=', $floor_3_id);
		}
		if ($floor_3 != null){
			$this->setWhere('floor_3.floor_3_cn', 'LIKE', '%'.$floor_3.'%','AND','(');
			$this->setWhere('floor_3.floor_3_th', 'LIKE', '%'.$floor_3.'%','OR',')');
		}

		$this->setOrderBy ( array(
				'floor_2.orders' =>'ASC',
				'floor_3.orders' =>'ASC',
			
		) );
		$data = $this->select();
	
		//状态标题
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			$status = $data[$i]['status'];
			$data[$i]['status_cn'] = $this->getStatus('cn',$status);
			$data[$i]['status_th'] = $this->getStatus('th',$status);
			$data[$i]['floor_1'] = $this->getfloor_1($data[$i]['floor_1_id']);
		}
	
		return $data;
	}
}

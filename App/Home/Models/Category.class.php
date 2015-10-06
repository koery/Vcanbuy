<?php
class Category extends Model {
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
	private $_category_1_id = array(
			'10000'=>'服饰 ',
			'20000'=>'美妆',
			'30000'=>'母婴',
			'40000'=>'电子数码',
			'50000'=>'安防',
			'60000'=>'车饰',
	);
	
	function getStatus($lang,$key) {
		return $this->_status[$lang][$key];
	}

	/**
	 * 返回类别ID
	 * @return multitype:string
	 */
	function getCategory_1_id() {
		return $this->_category_1_id;
	}
	/**
	 * 返回类别名称
	 * @param unknown $name
	 * @return multitype:string
	 */
	function getCategory_1($name) {
		return $this->_category_1_id[$name];
	}
	
	function getCategory_2(){
		$field = array (
				'category_2_id',
				'category_2_cn',
				'category_2_th',
				'category_1_id',
				'status',
				'category_2_url',

		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_category_2' );
		//$this->setWhere('category_1_id', '=', $id);
		$this->setWhere('status', '!=', '60000');
		$this->setOrderBy ( 'orders' );
		$data = $this->select();
	
		//状态标题
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			$status = $data[$i]['status'];
			$data[$i]['status_cn'] = $this->getStatus('cn',$status);
			$data[$i]['status_th'] = $this->getStatus('th',$status);
			$data[$i]['category_1'] = $this->getCategory_1($data[$i]['category_1_id']);
		}
	
		return $data;
	}
function getCategory_2_list($id){
		$field = array (
				'category_2_id',
				'category_2_cn',
				'category_2_th',
				'category_1_id',
				'status',
				'category_2_url',

		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_category_2' );
		$this->setWhere('category_1_id', '=', $id);
		$this->setWhere('status', '!=', '60000');
		$this->setLimit(3);
		$this->setOrderBy ( 'orders' );
		$data = $this->select();
	
		//状态标题
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			$status = $data[$i]['status'];
			$data[$i]['status_cn'] = $this->getStatus('cn',$status);
			$data[$i]['status_th'] = $this->getStatus('th',$status);
			$data[$i]['category_1'] = $this->getCategory_1($data[$i]['category_1_id']);
		}
	
		return $data;
	}
	
	function getCategory_3(){
		$field = array (
				//'category_2.category_1_id',
				'category_2.category_2_id',
				//'category_2.category_2_cn',
				//'category_2.category_2_th',
				'category_3.category_3_id',
				'category_3.category_3_cn',
				'category_3.category_3_th',
				'category_3.category_3_url',
				'category_3.orders',
				'category_3.status',
				//'category_3.created',
				//'category_3.created_name',
				//'category_3.audit_name',
				'category_3.start_time',
				'category_3.end_time' 
				
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_category_3 AS category_3' );
		$this->setJoin('vcb_product_category_2 as category_2','category_2.category_2_id=category_3.category_2_id');
		$this->setWhere('category_3.status', '!=', '60000');
		$this->setOrderBy ( array(
				'category_2.orders' =>'ASC',
				'category_3.orders' =>'ASC',
					
		) );
		$data = $this->select();
	
		//状态标题
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			$status = $data[$i]['status'];
			$data[$i]['status_cn'] = $this->getStatus('cn',$status);
			$data[$i]['status_th'] = $this->getStatus('th',$status);
		}
	
		return $data;
	}
	
	
function getCategory_3_list(){
		$field = array (
				//'category_2.category_1_id',
				'category_2.category_2_id',
				//'category_2.category_2_cn',
				//'category_2.category_2_th',
				'category_3.category_3_id',
				'category_3.category_3_cn',
				'category_3.category_3_th',
				'category_3.category_3_url',
				'category_3.orders',
				'category_3.status',
				//'category_3.created',
				//'category_3.created_name',
				//'category_3.audit_name',
				'category_3.start_time',
				'category_3.end_time' 
				
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_category_3 AS category_3' );
		$this->setJoin('vcb_product_category_2 as category_2','category_2.category_2_id=category_3.category_2_id');
		$this->setWhere('category_3.status', '!=', '60000');
		$this->setOrderBy ( array(
				'category_2.orders' =>'ASC',
				'category_3.orders' =>'ASC',
					
		) );
		$data = $this->select();
	
		//状态标题
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			$status = $data[$i]['status'];
			$data[$i]['status_cn'] = $this->getStatus('cn',$status);
			$data[$i]['status_th'] = $this->getStatus('th',$status);
		}
	
		return $data;
	}
	
	
	
	
	
	
}

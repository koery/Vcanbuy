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
	
	function getStatus($lang,$key) {
		return $this->_status[$lang][$key];
	}

	
	function  getcategory1Date(){
		
		
		$field = array (
				'category_1_id',			
				'category_1_cn',
				'category_1_th',
				'category_1_url',
				'status',
				'orders'
				
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_category_1' );
		$this->setWhere('status', '!=', '60000');		
		$this->setOrderBy ( 'orders' );
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
	
	
	function  getcategory1UpdateDate($id){
	
	
		$field = array (
				'category_1_id',				
				'category_1_cn',
				'category_1_th',
				'category_1_url',
				'status',
				'orders'
	
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_category_1' );		
		$this->setWhere('status', '!=', '60000');
		$this->setWhere('category_1_id', '=', $id);
		$this->setOrderBy ( 'orders' );
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
	
	function  getcategory2UpdateDate($id){
	
	
		$field = array (
				'category_2_id',
				'category_2_cn',
				'category_2_th',
				'category_2_url',
				'category_1_id',
				'category_1_cn',
				'category_1_th',
				'status',
				'orders'
	
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_category_2' );
		$this->setWhere('status', '!=', '60000');
		$this->setWhere('category_2_id', '=', $id);
		$this->setOrderBy ( 'orders' );
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
	
	function  getcategory3UpdateDate($id){
	
	
		$field = array (
				'category_1_id',
				'category_1_cn',
				'category_1_th',
				'category_2_id',
				'category_2_cn',
				'category_2_th',
				'category_3_id',
				'category_3_cn',
				'category_3_th',
				'category_3_url',			
				'status',
				'orders'
	
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_category_3' );
		$this->setWhere('status', '!=', '60000');
		$this->setWhere('category_3_id', '=', $id);
		$this->setOrderBy ( 'orders' );
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
	
	function  getcategory2Date(){
	
	
		$field = array (
				'category_2_id',
				'category_2_cn',
				'category_2_th',
				'category_2_url',
				'category_1_id',
				'category_1_cn',
				'category_1_th',
				'status',
				'orders'
	
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_category_2' );
		$this->setWhere('status', '!=', '60000');
		$this->setOrderBy ( 'orders' );
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
	
	
	
	function getCategory_2($category_1_id){
		$field = array (
				'category_2_id',
				'category_2_cn',
				'category_2_th',
				'category_1_id',
				'status',
				'orders',
				'created',
				'created_name',
				'audit_name',
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_category_2' );
		$this->setWhere('status', '!=', '60000');
		$this->setWhere('category_1_id', '=', $category_1_id);
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
	
	function getCategory_3($category_2_id){
		$field = array (
				'category_2.category_1_id',
				'category_2.category_2_id',
				'category_2.category_2_cn',
				'category_2.category_2_th',
				'category_3.category_3_id',
				'category_3.category_3_cn',
				'category_3.category_3_th',
				'category_3.orders',
				'category_3.status',
				'category_3.created',
				'category_3.created_name',
				'category_3.audit_name',
				'category_3.start_time',
				'category_3.end_time' 
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_category_3 AS category_3' );
		$this->setJoin('vcb_product_category_2 as category_2','category_2.category_2_id=category_3.category_2_id');
		$this->setWhere('category_3.status', '!=', '60000');
		$this->setWhere('category_2.category_2_id', '=', $category_2_id);
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
	
	
	
	
	function  getcategory3Date(){
	
	
		$field = array (
				
				'category_1_id',
				'category_1_cn',
				'category_1_th',
				'category_2_id',
				'category_2_cn',
				'category_2_th',
				'category_3_id',
				'category_3_cn',
				'category_3_th',
				'category_3_url',			
				'status',
				'orders'
	
		);
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_product_category_3' );
		$this->setWhere('status', '!=', '60000');
		$this->setOrderBy ( array(
				'category_1_id' =>'ASC',
				'category_2_id' =>'ASC',
					
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

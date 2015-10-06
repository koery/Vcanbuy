<?php
class Products extends Model {
	
	function getproductslistdata(){
		
		$field = array(
		
				'product_id',
				'created',
				'start_time',
				'end_time',
				'category_1_cn',
				'category_2_cn',
				'category_3_cn',
				'title_cn',
				'product_url',
				'status',
				'img_path',
		);
		
		$this->clear();
		$this->setTable('vcb_product');     //设置表名
		$this->setField($field);
		$data = $this->select();
		
		if($data){
			
			return $data;
			
		}
	
	}
	
	
	/**
	 *getProImgDetail()
	 */
	function getProImgDetail($productId) {
		$field = array(
				'id',
				'product_id',
				'imgShowPath',
				'imgDetailPath',
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_img_detail');
		$this->setWhere('product_id', '=', $productId);
		$this->setWhere('status', '!=', '60000');
		$data = $this->select();
		if($data)
			return $data;
	}
	
	/**
	 *getProImgSelect()
	 */
	function getProImgSelect($productId) {
		$field = array(
				'id',
				'product_id',
				'imgShowPath',
				'imgSelectPath',
				'property',
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_img_select');
		$this->setWhere('product_id', '=', $productId);
		$this->setWhere('status', '!=', '60000');
		$data = $this->select();
		if($data)
			return $data;
	}
	
	/**
	 * 获取产品sku信息
	 *getProInfoSku()
	 */
	function getProInfoSku($productId) {
	
		$field = array(
				'id',
				'sku_code',
				'sku_name_cn',
				'qty',
				'sales_price',
				'old_price'
				
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_sku');
		$this->setWhere('product_id', '=', $productId);
		$this->setWhere('status', '!=', '60000');
		$data = $this->select();
		if($data)
			return $data;
	}
	
	/**
	 * 获取产品sku列表
	 */
	function getproductskudata($sku_code){
		
		print_r($sku_code);
		foreach ($sku_code as $key=>$data){
			
			$field = array(
					'id',
					'property',
					'pid',
					'name',
			
			
			);
			$this->clear();
			$this->setField($field);
			$this->setTable('vcb_product_property');
			$this->setWhere('property', '=',$data);
			$this->setWhere('status', '!=', '60000');
			$data1 = $this->select();

			$field = array(
					'id',
					'property',
					'pid',
					'name',
						
						
			);
			$this->clear();
			$this->setField($field);
			$this->setTable('vcb_product_property');
			$this->setWhere('pid', '=', $data1[0]['id']);
			$this->setWhere('status', '!=', '60000');
			$data2 = $this->select();
				
			if($data2){
			
			$data3[$data]=$data2;
			
	      }

		}
	    return $data3;
		
	}
	
	
	/**
	 * 获取产品sku列表
	 */
	function getproductskudata1(){
	
		$field = array(
				'id',
				'property',
				'pid',
				'name',
	
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_property');
		$this->setWhere('pid', '=', 0);
		$this->setWhere('status', '!=', '60000');
		$data = $this->select();
	
		foreach ($data as $key=>$data1){
				
			$field = array(
					'id',
					'property',
					'pid',
					'name',
						
						
			);
			$this->clear();
			$this->setField($field);
			$this->setTable('vcb_product_property');
			$this->setWhere('pid', '=', $data1['id']);
			$this->setWhere('status', '!=', '60000');
			$data2 = $this->select();
				
			if($data2){
	
				$data[$key]['value']= $data2;
	
			}
		}
		if($data)
			return $data;
	
	
	
	
	}
	
	
	
	/**
	 * 获取产品p-sku列表
	 */
	function getaddproductskudata(){
	
		$field = array(
				'id',
				'property',
				'pid',
				'name',
	
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_property');
		$this->setWhere('pid', '=', 0);
		$this->setWhere('status', '!=', '60000');
		$data = $this->select();
	
		if($data)
			return $data;
	
	
	
	
	}
	
	
	
	function getProInfoSkuRemark($productId) {
		$field = array(
				'id',
				'product_id',
				'sku_code',
				'sku_name',
				'remark_cn',
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_remark');
		$this->setWhere('product_id', '=', $productId);
		$this->setWhere('status', '!=', '60000');
		$data = $this->select();
		if($data)
			return $data;
	}
	
	

	function getProInfoSkuRemarkitem($id) {
		
		$field = array(
				'id',
				'product_id',
				'sku_code',
				'sku_name',
				'remark_cn',
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_remark');
		$this->setWhere('id', '=', $id);
		$this->setWhere('status', '!=', '60000');
		$data = $this->select();
		if($data)
			return $data;
	}
	
	function getproductsku(){
		
		$field = array(
				'id',
				'property',
				'pid',
				'name',
		
		
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_property');
		$this->setWhere('pid', '=', 0);
		$this->setWhere('status', '!=', '60000');
		$data = $this->select();
		
		if($data)
			return $data;
		
		
	}
	function getproductskunamedata($sku_codenew){
		
		$sku_name=array();
		foreach ($sku_codenew as $key=>$data){
			
			$field = array(
					'id',
					'property',
					'pid',
					'name',
			
			
			);
			$this->clear();
			$this->setField($field);
			$this->setTable('vcb_product_property');
			$this->setWhere('property', '=', $data);
			$this->setWhere('status', '!=', '60000');
			$data1 = $this->select();
			
			$sku_name[$key]=$data1[0]['name'];
		}
		return $sku_name;
	}
	
	
	function getcategory1data(){	
		
		$field = array(
				'category_1_id',
				'category_1_cn',
			
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_category_1');		
		$this->setWhere('status', '!=', '60000');
		$data = $this->select();
		
		if($data)
			return $data;
	}
	function getcategory2data(){

		$field = array(
				'category_2_id',
				'category_2_cn',
					
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_category_2');
		$this->setWhere('status', '!=', '60000');
		$data = $this->select();
		
		if($data)
			return $data;
	}
	function getcategory3data(){
		
		$field = array(
				'category_3_id',
				'category_3_cn',
					
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_category_3');
		$this->setWhere('status', '!=', '60000');
		$data = $this->select();
		
		if($data)
			return $data;
	}
	
	
}//Products.class结束

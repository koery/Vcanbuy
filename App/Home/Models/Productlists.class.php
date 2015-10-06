<?php
class Productlists extends Model {	

	/**
     * getCategory1Productlist()获得目录数据
     * @access public
     */
     function getCategoryProductlist(){
     	
     	$field = array(
     			'category_1_id',
     			'category_1_code',
     			'category_1_cn',
     			'category_1_th',
     			'category_1_url',    			
     			'status',
     	);
     	$this->clear();
     	$this->setField($field);
     	$this->setTable('vcb_product_category_1');
     	$this->setOrderBy ( 'orders' );
     	$data = $this->select();
     	if($data){
     		foreach ($data as $key=>$data1){
     			
     			$field = array(
     					'category_2_id',
     					'category_1_id',
     					'category_2_cn',
     					'category_2_th',
     					'category_2_url',
     					'status',
     			);
     			$this->clear();
     			$this->setField($field);
     			$this->setTable('vcb_product_category_2');
     			$this->setWhere('category_1_id', '=', $data1['category_1_id']);
     			$data2 = $this->select();
     			 
     			if($data2){
     			
     				foreach ($data2 as $key1=>$data3){
     			
     					$field = array(
     							'category_3_id',
     							'category_2_id',
     							'category_3_cn',
     							'category_3_th',
     							'category_3_url',
     							'status',
     					);
     					$this->clear();
     					$this->setField($field);
     					$this->setTable('vcb_product_category_3');
     					$this->setWhere('category_2_id', '=', $data3['category_2_id']);
     					//$this->setOrderBy ( 'category_3_id' );
     					$data4 = $this->select();
     			
     					if($data4){    						
     						$data2[$key1]['category3']=$data4;
     					}
     			
     			     //print_r($data4);
     			    // echo "----------------------------------------------------------";
     				}
     				 
     				 
     			}
     			$data[$key]['category2'] = $data2;
     			
     		}
     		
     		//print_r($data);
     		return $data;
     	}
	
     }
  
     /**
      * getProductlist()获得产品列表数据
      * @access public
      */
     function getProductlist(){
     	
     	$field = array(
     			'product_id',
     			'sales_price',
     			'title_cn',
     			'image_path'   			
     			
     	);
     	$this->clear();
     	$this->setField($field);
     	$this->setTable('vcb_product');
     	//$this->setWhere('status', '=', 10000);
     	//$this->setOrderBy ( 'category_3_id' );
     	$data = $this->select();
     	
     	if($data)
     		return $data;
     }
}

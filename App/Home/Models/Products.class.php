<?php

class Products extends Model {
	/**
	 * getProBaseInfo()
	 */
	function getProBaseInfo($productId) {
		$field = array(
                'product_id',
                'title_cn',
                'title_th',
                'sales_price',
                'old_price', 
				'loves',                                       
                'status',               
        );
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product');
		$this->setWhere('product_id', '=', $productId);
		$data = $this->select();
		if($data)
			return $data;
	}
	
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
		$data = $this->select();
		if($data)
			return $data;
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
		$data = $this->select();
		if($data)
			return $data;
	}
	

	function getProFreight($productId) {
		
	}
	
	
	
	function getProInfoSkuRemark($productId) {
		$field = array(
				'sku_code',
				'remark_cn',
				
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_remark');
		$this->setWhere('product_id', '=', $productId);
		$data = $this->select();
		if($data)
			return $data;
	}
	
	
	
	function getProNavigation($productId) {
		$field = array(
				'product_id',
				'category_1_cn',
				'category_2_cn',
				'category_3_cn',
				'title_cn',
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product');
		$this->setWhere('product_id', '=', $productId);
		$data = $this->select();
		
		
		if($data)
			return $data;
	}
		
		function getProNavigationUrl($productId) {
			$field = array(
					'product_id',
					'category_1_url',
					'category_2_url',
					'category_3_url',
					'product_url',
			);
			$this->clear();
			$this->setField($field);
			$this->setTable('vcb_product_navigation');
			$this->setWhere('product_id', '=', $productId);
			$data = $this->select();
			if($data)
				return $data;
	
	}
	
	
	
	
	
	function addToCart($user_id,$sku_id,$product_id,$qtynum,$img_path,$product_title){
		
		
		//扫描购物车 如果sku_id相同 则直接增加 数量就好
		$field = array(
				'sku_id',
                 'qtynum'
		);//此处要加上状态
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_cart');
		$this->setWhere('user_id', '=', $user_id);
		$this->setWhere('status', '=', 10000);
		$data = $this->select();
		
		if($data){
			foreach ($data as $data_skuid){
				
				if($data_skuid['sku_id']==$sku_id){
					
					$field = array(
							
							'qtynum'=>$qtynum+$data_skuid['qtynum']
					);//此处要加上状态 状态已默认
					$this->clear();
					$this->setField($field);
					$this->setTable('vcb_cart');
					$this->setWhere('sku_id', '=', $sku_id);
					$data = $this->update();
					if($data)
					   return $data;
				}
				
			}
		}
		
		
		
		
		
		
		//echo $user_id.$sku_id.$product_id.$qtynum.$img_path.$product_title;
		//通过sku_id 获得sku_code  sku_name    price
		$field = array(
				'sku_code',
				'sku_name_cn',				
				'sales_price',
				
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_sku');
		$this->setWhere('product_id', '=', $product_id);
		$this->setWhere('id', '=', $sku_id);
		//$this->setWhere('status', '=', 10000);
		$data = $this->select();
		//print_r($data);
		$field = array(
				'product_id'=>$product_id,
				'user_id'=>$user_id,
				'sku_id'=>$sku_id,
				'qtynum'=>$qtynum,
				'img_path'=>$img_path,
				'sku_code'=>$data[0]['sku_code'],
				'sku_name'=>$data[0]['sku_name_cn'],
				'sales_price'=>$data[0]['sales_price'],
				'product_title_cn'=>$product_title,
				'created'=> date('Y-m-d H:i:s', time())
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_cart');
		$data = $this->insert();
		if($data)
			return $data;
	    else return false;
	}
	
	
	
	
	
	
	
	
	function addLoves($product_id){
	
		
		$field = array(
				
				'loves',
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product');
		$this->setWhere('product_id', '=', $product_id);
		$data=$this->select();
		
		if($data){
			$loves=$data[0]['loves'];
			$loves++;
			
			$field = array(
			
					'loves'=>$loves,
			
			);
			$this->clear();
			$this->setField($field);
			$this->setTable('vcb_product');
			$this->setWhere('product_id', '=', $product_id);
		    $this->update();
			
		}
			
	}
	
	function addFavorites($user_id,$product_id,$sku_id,$img_path){
		$field = array(
				'product_id'=>$product_id,
				'user_id'=>$user_id,
				'sku_id'=>$sku_id,
				'img_path'=>$img_path,				
				'created'=> date('Y-m-d H:i:s', time()),
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_favorites');
		$data = $this->insert();
		if($data)
			return $data;
		else return false;
	}
	
	
	
    private $_website_id = array(
        '10000' => '淘宝',
        '20000' => '天猫',
        '30000' => '阿里巴巴',
    );

    /*
     * 根据id返回字段
     */

    function getproducts_id($id) {
        $field = array(
            'product_url',
            'title_cn',
            'title_th',
            'category_3_id',
            'floor_3_id',
            'image_url',
            'product_url',
            'shop',
            'shop_id',
            'shop_url',
            'product_id',
            'shop_site',
            'shop_username',
            'status',
            'category_1_id',
            'sales_price',
        );
        $this->clear();
        $this->setField($field);
        $this->setTable(' vcb_product ');
        $this->setWhere('product_id', '=', $id);
        $data = $this->select();
        return $data;
    }

//根据id返回产品别名表
    function getoname_byid($id) {

        $field = array(
            'byname',
            'property',
        );
        $this->clear();
        $this->setField($field);
        $this->setTable(' vcb_property_byname ');
        $this->setWhere('product_id', '=', $id);
        $data = $this->select();
        if (!empty($data)) {
            return $data;
        } else {
            return null;
        }
    }

}

<?php

/**
 * 保存数据
 * @author xxx
 *
 */
class Carts extends Model {
	
	
	function getMycartBaseInfo($username){//获得购车基本信息
		
		$field = array(
				'cart_id',
				'user_id',
				'sku_id',
				'product_id',
				'status',
				'qtynum',
				'img_path',
				'sku_code',
				'sku_name',
				'product_title_cn',
				'sales_price',
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_cart');
		$this->setWhere('user_id', '=', $username);
		$this->setWhere('status', '=', 10000);
		$this->setOrderBy('product_id');
		$data = $this->select();
		//echo "data";
		//print_r($data);
		if($data)
			return $data;

		
	}
	

	function getMycartSkuRemark($productId){//获得产品别名
	
		//print_r($productId);
		$productSkuRemark = array();
		foreach ($productId as $key=>$productIdItem){
			
			//echo "productIdItem=>".$key.'=>'.$productId[$key];
			$field = array(
					
					'sku_code',
					'remark_cn',
					
			);
			$this->clear();
			$this->setField($field);
			$this->setTable('vcb_product_remark');
			$this->setWhere('product_id', '=', $productId[$key]);
			$data = $this->select();	
			if($data){
				//print_r($data);
				$productSkuRemark[$productId[$key]]=$data;
			}
			
			//print_r($productSkuRemark);
			
			
		}
		return $productSkuRemark;
	}//getMycartSkuRemark()结束
	

	function getMycartSkuQty($skuId){//获得产品库存
	
		//print_r($skuId);
		$productSkuQty = array();
		foreach ($skuId as $key=>$skuIdItem){
				
			
			$field = array(						
					'qty',	
			);
			$this->clear();
			$this->setField($field);
			$this->setTable('vcb_product_sku');
			$this->setWhere('id', '=', $skuId[$key]);
			$data = $this->select();
			if($data){
				//print_r($data);
				$productSkuQty[$skuId[$key]]=$data[0];
			}
				
			
				
				
		}
		if($productSkuQty)
			return $productSkuQty;
	}//getMycartSkuQty()结束
	
	
	/**
	 *getCartProImgSelect()
	 *
	 *
	 *
	 */
	function getCartProImgSelect($productId) {
		
		//echo "cart get productId=>";
		//print_r($productId);
		$cartProImgSelect = array();
		foreach ($productId as $key=>$productIdItem){
			
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
			$this->setWhere('product_id', '=', $productId[$key]);
			$data = $this->select();
			if($data){
				//echo $productId[$key];
				
				$cartProImgSelect[$productId[$key]]=$data;
				//print_r($cartProImgSelect);
			}
			
		}
		if($cartProImgSelect){
			//print_r($cartProImgSelect);
			return $cartProImgSelect;
		}
		
	}
	
	
	
	function getCartProInfoSku($productId) {
		$cartProInfoSku = array();
		
		foreach ($productId as $key=>$productIdItem){
		$field = array(
				'id',
				'sku_code',
				'sku_name_cn',
				'qty',
				'sales_price',
				
				
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_product_sku');
		$this->setWhere('product_id', '=', $productId[$key]);
		$data = $this->select();
		if($data)
			$cartProInfoSku[$productId[$key]]=$data;
			
	  }
	
	  if($cartProInfoSku){
	  	//print_r($cartProImgSelect);
	  	return $cartProInfoSku;
	  }
	  
	}
	
	//01/07/2015 17:16:27 PM    	
 	
	
	//删除一条记录
	
    function deleteCart($cart_id) {
    	
        $user_id = 1;
        
        $field = array(
            'status' => 100000
        );
        $this->clear();
        $this->setField($field);
        $this->setTable('vcb_cart');
        $this->setWhere('cart_id', '=', $cart_id);
        $this->setWhere('user_id', '=', $user_id);        
        $data = $this->update();
        
        if($data){
        	
        	return true;
        }
    }
	
    //恢复Recovery
    function recoveryCart($cart_id) {
    	 
    	$user_id = 1;
    
    	$field = array(
    			'status' => 10000
    	);
    	$this->clear();
    	$this->setField($field);
    	$this->setTable('vcb_cart');
    	$this->setWhere('cart_id', '=', $cart_id);
    	$this->setWhere('user_id', '=', $user_id);
    	$data = $this->update();
    
    	if($data){
    		 
    		return true;
    	}
    }
    
    
	
	//修改数量
    function modifyQty($cart_id, $qty) {
    	
    	//echo $cart_id;
    	//echo $qty;
    	$field = array(
    			'qtynum' => $qty
    	);
    	$this->clear();
    	$this->setField($field);
    	$this->setTable(' vcb_cart ');
    	$this->setWhere('cart_id', '=', $cart_id);
    	$data = $this->update();
    	
    	if($data)
    		return true;
    		
    	
    }
	
	//修改属性
    function modifySku($cart_id, $sku_id,$img_path) {
    	
    	$field = array(
    			   			
    			'sku_code',
    			'sku_name_cn',
    	);
    	$this->clear();
    	$this->setField($field);
    	$this->setTable(' vcb_product_sku ');
    	$this->setWhere('id', '=', $sku_id);
    	$data = $this->select();
    	 //获得sku_code,sku_name_cn
    	
    	//echo $data['sku_code'];
    	//echo $data["sku_name_cn"];
    	//print_r($data);
    	//echo $img_path;
    	
    	$field = array(
    			'sku_id' => $sku_id,
    			'sku_code'=>$data[0]["sku_code"],
    			'sku_name'=>$data[0]["sku_name_cn"],
    			'img_path'=>$img_path
    	);
    	$this->clear();
    	$this->setField($field);
    	$this->setTable(' vcb_cart ');
    	$this->setWhere('cart_id', '=', $cart_id);
    	$data = $this->update();
    	
    	if($data)
    	   return true;
    	
    	 
    }
	
	
	
	
	
	
	
	
	
	

    function save_cart($user_id = NULL, $tourists_id = NULL) {
        $sku = get_post_value('sku');
        $data = $this->verify($sku, $user_id, $tourists_id);
        if ($data == 0) {
            return $this->addCart($user_id, $tourists_id);
        } else {
            return $this->updateCart($user_id, $tourists_id, $data);
        }
    }

    function modifyCart($id, $qty) {
        $field = array(
            'qty' => $qty,
        );
        $this->clear();
        $this->setField($field);
        $this->setTable(' vcb_cart ');
        $this->setWhere('cart_id', '=', $id);
        $this->update();
    }

    function getCartInfo() {
        $user_id = Login::getUserId();
        $tourists_id = Login::getTouristsId();


        $this->clear();
        $this->setTable('vcb_cart');
        $this->setWhere('user_id', '=', $user_id);
        if ($user_id == null) {
            $this->setWhere('tourists_id', '=', $tourists_id);
        }
        $this->setWhere('status', '=', '10000');

        $data = $this->getFieldValue('SUM(qty)');
        if ($data == null) {
            $data = 0;
        }
        return $data;
    }

//     function deleteCart($id) {
//         $user_id = Login::getUserId();
//         $tourists_id = Login::getTouristsId();
//         $field = array(
//             'status' => '30000'
//         );
//         $this->clear();
//         $this->setField($field);
//         $this->setTable('vcb_cart');
//         $this->setWhere('cart_id', '=', $id);
//         $this->setWhere('user_id', '=', $user_id);
//         if ($user_id == null) {
//             $this->setWhere('tourists_id', '=', $tourists_id);
//         }
//         $data = $this->update();
//     }

    /**
     * 返回购物车列表
     */
    function getCartList() {
        $user_id = Login::getUserId();
        $tourists_id = Login::getTouristsId();


        $field = array(
            'cart_id',
            'shop_username',
            'shop_url',
            'product_url',
            'product_id',
            'product',
            'image_url',
            'product',
            'price',
            'sku_name',
            'qty',
        );
        $orderby = array(
            'shop_username',
            'cart_id',
        );
        $this->clear();
        $this->setField($field);
        $this->setTable('vcb_cart');
        $this->setWhere('user_id', '=', $user_id);
        if ($user_id == null) {
            $this->setWhere('tourists_id', '=', $tourists_id);
        }
        $this->setWhere('status', '=', '10000');
// 		/$this->setGroupBy('shop_username');
        $this->setOrderBy($orderby);

        $data = $this->select();
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['price_cn'] = $data[$i]['price'];
            $data[$i]['price_th'] = $data[$i]['price'] * RATE;
        }
        return $data;
    }

    private function addCart($user_id, $tourists_id) {
        $shop_site = get_post_value('shop_site');
        $image_url = get_post_value('image_url');
//$product = get_post_value('product');
        $product_url = get_post_value('product_url');
        $product_id = get_post_value('product_id');
        $shop_url = get_post_value('shop_url');
        $shop_username = get_post_value('shop_username');
        $property_1 = get_post_value('property_1');
        $property_2 = get_post_value('property_2');
        $qty = get_post_value('qty');
        $sku = get_post_value('sku');
        $sku_name = get_post_value('sku_name');
        $price = get_post_value('price_cn');
        $shop_id = get_post_value('shop_id');

// 保存数据
        $field = array(
            'created' => date('Y-m-d H:i:s', time()),
            'user_id' => $user_id,
            'tourists_id' => $tourists_id,
            'shop_username' => $shop_username,
            'shop_url' => $shop_url,
            'product_id' => $product_id,
            'product_url' => $product_url,
            'shop_url' => $shop_url,
            'shop_username' => $shop_username,
            'property_1' => $property_1,
            'property_2' => $property_2,
            'qty' => $qty,
            'sku' => $sku,
            'sku_name' => $sku_name,
            'status' => '10000',
            'product' => $product,
            'image_url' => $image_url,
            'price' => $price,
            'shop_id' => $shop_id,
            'shop_site' => $shop_site,
        );
        $this->clear();
        $this->setField($field);
        $this->setTable('vcb_cart');
        $data = $this->insert();
        return $data;
    }

    private function updateCart($user_id, $tourists_id, $oldQty) {
        $qty = get_post_value('qty');
        $sku = get_post_value('sku');

        $field = array(
            'qty' => $qty + $oldQty,
        );
        $this->clear();
        $this->setField($field);
        $this->setTable('vcb_cart');
        $this->setWhere('sku', '=', $sku);
        $this->setWhere('status', '=', '10000');
        $this->setWhere('user_id', '=', $user_id);
        $this->setWhere('tourists_id', '=', $tourists_id);
        $data = $this->update();
        return $data;
    }

    /**
     * 保存前判断
     * @param string $user_id
     * @param string $tourists_id
     */
    private function verify($sku, $user_id = NULL, $tourists_id = NULL) {
        $this->clear();
        $this->setTable('vcb_cart');
        $this->setWhere('user_id', '=', $user_id);
        $this->setWhere('tourists_id', '=', $tourists_id);
        $this->setWhere('sku', '=', $sku);
        $this->setWhere('status', '=', '10000');

        $data = $this->getFieldValue('qty');

        if ($data == null) {
            return 0;
        } else {
            return $data;
        }
    }

//根据id返回购物车数据
    function getCart_id($id) {
        $field = array(
            'cart_id',
            'shop_username',
            'shop_url',
            'product_url',
            'product_id',
            'product',
            'image_url',
            'product',
            'price',
            'sku_name',
            'qty',
        );
        $this->clear();
        $this->setField($field);
        $this->setTable('vcb_cart');
        $this->setWhere('cart_id', '=', $id);
        $this->setWhere('status', '=', '10000');
        $data = $this->select();
        $count = count($data);
        for ($i = 0; $i < $count; $i++) {
            $data[$i]['price_cn'] = $data[$i]['price'];
            $data[$i]['price_th'] = $data[$i]['price'] * RATE;
        }
        return $data;
    }

}

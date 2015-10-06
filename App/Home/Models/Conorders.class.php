<?php

/**
 * 保存数据
 * @author xxx
 *
 */
class Conorders extends Model {
	
	
	
	function getMyConorderBaseInfo($exchangeCartId){//获得产品别名
	
		//print_r($exchangeCartId);
		$myConorderBaseInfo = array();
		foreach ($exchangeCartId as $key=>$data1){
			
			//echo $data1;
			
			$field = array(
					
					'cart_id',
					'sku_id',
					'product_id',
					'img_path',
					'sku_code',
					'sku_name',
					'qtynum',
					'product_title_cn',
					'sales_price',
					
			);
			$this->clear();
			$this->setField($field);
			$this->setTable('vcb_cart');
			$this->setWhere('cart_id', '=', $data1);
			$data = $this->select();	
			if($data){
				//print_r($data);
				$myConorderBaseInfo[$exchangeCartId[$key]]=$data[0];
			}
			
			
			
			
		}
		return $myConorderBaseInfo;
	}
	
	
	function getUserAddress($user_id){//获得用户地址列表
	
		

			$field = array(
						
					'id',
					'province',
					'city',
					'district',
					'address',
					'postcode',
					'username',
					'tel',					
					'status'
						
			);
			$this->clear();
			$this->setField($field);
			$this->setTable('vcb_user_address');
			$this->setWhere('user_id', '=', $user_id);
			$this->setOrderBy ( 'id DESC' );
			$data = $this->select();
			if($data){
				
				//print_r($data);
				return $data;
			}
				
	
		
	}
	
	/**
	 * 
	 *修改默认地址
	 */
	function modifyDefaultAddress($addressIdtoDefaultAddr, $defaultAddressId){
	   
         //echo $addressIdtoDefaultAddr;
        // echo $defaultAddressId;
	         
	    if($defaultAddressId){   
		$field = array(
				
				'status'=>10000
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_user_address');
		$this->setWhere('id', '=', $defaultAddressId);
		$data1 = $this->update();
	    }
		

		$field = array(
		
				'status'=>100000
		
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_user_address');
		$this->setWhere('id', '=', $addressIdtoDefaultAddr);
		$data = $this->update();
		
		
		
		if($data){	
			return true;
		}

	}
	
	
	
	
	
	/**
	 *
	 *新增地址
	 */
	function addNewAddress($province,$city,$district,$address,$postcode,$username,$tel,$user_id){
	
		
	
		$field = array(
						
					'user_id'=>$user_id,
					'province'=>$province,
					'city'=>$city,
					'district'=>$district,
					'address'=>$address,
					'postcode'=>$postcode,
					'username'=>$username,
					'tel'=>$tel,					
					'status'=>10000
						
			);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_user_address');
		
		$data = $this->insert();
	
		if($data){
			return $data;//返回增加的地址address_id
		}
	
	}
	
	

	/**
	 *
	 *修改地址
	 */
	function modifyAddress($addressId,$province,$city,$district,$address,$postcode,$username,$tel,$user_id){
	
	
		//echo $addressId.$province.$city.$district.$address.$postcode.$username.$tel;
		$field = array(
	            
				
				'province'=>$province,
				'city'=>$city,
				'district'=>$district,
				'address'=>$address,
				'postcode'=>$postcode,
				'username'=>$username,
				'tel'=>$tel
				
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_user_address');
		$this->setWhere('id', '=', $addressId);
		$data = $this->update();
	
		if($data){
			return true;
		}
	
	}
	
	/**
	 * 保存订单信息  修改对应购物车信息
	 * savaOrder
	 */
	function savaOrder($order_addressId,$order_productId,$order_total_price,$user_id){
	
// 		echo $order_addressId;
// 		print_r($order_productId);
		$cart_id=implode('|',$order_productId);
		//print_r($order_productId);
		$field = array(
				
				'user_id'=>$user_id,
				'cart_id'=>$cart_id,
				'address_id'=>$order_addressId,
				'order_total_price'=>$order_total_price,
				'order_no'=>'TH20145689',
	            'created'=>date('Y-m-d H:i:s', time())
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_order');		
		$data = $this->insert();
		
		if($data){//保存成功  
			
			foreach ($order_productId as $order_cartId){
			//echo $order_cartId;	
			$field = array(
						
					'status'=>20000,				
			);
			
			$this->clear();
			$this->setField($field);
			$this->setTable('vcb_cart');
			$this->setWhere('cart_id', '=', $order_cartId);
			$data1 = $this->update();
			
			}
			
			if($data1)
 			return $data;
		}
	
	}
}

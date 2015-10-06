<?php
class Myorders extends Model {	

	//初始化语言设置
	private $_lang = array(
		'cn'=>array(
				    '10000' => "等待审核",
					'20000' => "等待付款",
					'30000' => "付款成功",
					'40000' => "卖家已发货",
					'50000' => "交易成功",
					'60000' => "交易关闭",				
					'100000' => "已删除",
		),

	);
	
	
	/**
	 * 返回交易状态
	 * @param srtring $lang :语言版本
	 * @param string $name :名称
	 */
	function getStatus($lang,$name) {
		return $this->_lang[$lang][$name];
	}
	
	
	/**
	 * Myorders基本数据读取
	 * @access public
	 */
	function getMyorderBaseInfo($user_id){
		
		$field = array(
				
				'order_id',
				'order_no',
				'cart_id',
				'address_id',	
				'order_total_price',
				'created',
				'status'				
				
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_order');
		$this->setWhere('user_id', '=', $user_id);		
		$this->setOrderBy('order_id DESC');
		$data = $this->select();
		
		//print_r($data);
		if($data){
			
			/**
			 * 成功取得订单信息，解析cartId数组获得
			 * 对应sui_id属性 图片地址，标题，属性值，价格，数量
			 * 			
			 */
			foreach ($data as $key=>$myOrderItem){
				
				//echo $myOrderItem['cart_id'];
				$cart_id = explode('|', $myOrderItem['cart_id']);
				//print_r($cart_id);
				
				foreach ($cart_id as $key1=>$cart_id_item){
					
					//echo $cart_id_item;
					
					$field = array(
					
							'cart_id',
							'product_id',
							'img_path',
							'sku_code',
							'sku_name',
							'qtynum',
							'product_title_cn',
							'sales_price'					
					);
					$this->clear();
					$this->setField($field);
					$this->setTable('vcb_cart');
					$this->setWhere('cart_id', '=', $cart_id_item);
					$dataOfCartItem = $this->select();
					
					if($dataOfCartItem){
						
						$cart_id[$key1] = $dataOfCartItem[0];
					}
				}
				
				//print_r($cart_id);
				$data[$key]['cart_id'] = $cart_id;
				
				
			}
			
			//print_r($data);
			
			return $data;
		}
			
		
	}
	
	
	

	/**
	 * cancelMyOrder取消订单
	 * @access public
	 */
	function cancelMyOrder($user_id,$orderId){
		
		
		$field = array(
					
				'status'=>60000
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_order');
		$this->setWhere('user_id', '=', $user_id);
		$this->setWhere('order_id', '=', $orderId);		
		$data = $this->update();
	
		//print_r($data);
		if($data){
			
			return $data;
		}
	}
	
	/**
	 * getWaitingPaymentBaseInfo基本数据读取
	 * @access public
	 */
	function getWaitingPaymentBaseInfo($user_id){
	
		$field = array(
	
				'order_id',
				'order_no',
				'cart_id',
				'address_id',
				'order_total_price',
				'created',
				'status'
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_order');
		$this->setWhere('user_id', '=', $user_id);
		$this->setWhere('status', '=', 20000);
		$this->setOrderBy('order_id DESC');
		$data = $this->select();
	
		//print_r($data);
		if($data){
				
			/**
			 * 成功取得订单信息，解析cartId数组获得
			 * 对应sui_id属性 图片地址，标题，属性值，价格，数量
			 *
			 */
			foreach ($data as $key=>$myOrderItem){
	
				//echo $myOrderItem['cart_id'];
				$cart_id = explode('|', $myOrderItem['cart_id']);
				//print_r($cart_id);
	
				foreach ($cart_id as $key1=>$cart_id_item){
						
					//echo $cart_id_item;
						
					$field = array(
								
							'cart_id',
							'product_id',
							'img_path',
							'sku_code',
							'sku_name',
							'qtynum',
							'product_title_cn',
							'sales_price'
					);
					$this->clear();
					$this->setField($field);
					$this->setTable('vcb_cart');
					$this->setWhere('cart_id', '=', $cart_id_item);
					$dataOfCartItem = $this->select();
						
					if($dataOfCartItem){
	
						$cart_id[$key1] = $dataOfCartItem[0];
					}
				}
	
				//print_r($cart_id);
				$data[$key]['cart_id'] = $cart_id;
	
	
			}
				
			//print_r($data);
				
			return $data;
		}
			
	
	}
	
	/**
	 * getWaitingCheckoutBaseInfo基本数据读取
	 * @access public
	 */
	function getWaitingCheckoutBaseInfo($user_id){
	
		$field = array(
	
				'order_id',
				'order_no',
				'cart_id',
				'address_id',
				'order_total_price',
				'created',
				'status'
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_order');
		$this->setWhere('user_id', '=', $user_id);
		$this->setWhere('status', '=', 10000);
		$this->setOrderBy('order_id DESC');
		$data = $this->select();
	
		//print_r($data);
		if($data){
	
			/**
			 * 成功取得订单信息，解析cartId数组获得
			 * 对应sui_id属性 图片地址，标题，属性值，价格，数量
			 *
			 */
			foreach ($data as $key=>$myOrderItem){
	
				//echo $myOrderItem['cart_id'];
				$cart_id = explode('|', $myOrderItem['cart_id']);
				//print_r($cart_id);
	
				foreach ($cart_id as $key1=>$cart_id_item){
	
					//echo $cart_id_item;
	
					$field = array(
	
							'cart_id',
							'product_id',
							'img_path',
							'sku_code',
							'sku_name',
							'qtynum',
							'product_title_cn',
							'sales_price'
					);
					$this->clear();
					$this->setField($field);
					$this->setTable('vcb_cart');
					$this->setWhere('cart_id', '=', $cart_id_item);
					$dataOfCartItem = $this->select();
	
					if($dataOfCartItem){
	
						$cart_id[$key1] = $dataOfCartItem[0];
					}
				}
	
				//print_r($cart_id);
				$data[$key]['cart_id'] = $cart_id;
	
	
			}
	
			//print_r($data);
	
			return $data;
		}
			
	
	}
	
	
	/**
	 * getSendingBaseInfo基本数据读取
	 * @access public
	 */
	function getSendingBaseInfo($user_id){
	
		$field = array(
	
				'order_id',
				'order_no',
				'cart_id',
				'address_id',
				'order_total_price',
				'created',
				'status'
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_order');
		$this->setWhere('user_id', '=', $user_id);
		$this->setWhere('status', '=', 40000);
		$this->setOrderBy('order_id DESC');
		$data = $this->select();
	
		//print_r($data);
		if($data){
	
			/**
			 * 成功取得订单信息，解析cartId数组获得
			 * 对应sui_id属性 图片地址，标题，属性值，价格，数量
			 *
			 */
			foreach ($data as $key=>$myOrderItem){
	
				//echo $myOrderItem['cart_id'];
				$cart_id = explode('|', $myOrderItem['cart_id']);
				//print_r($cart_id);
	
				foreach ($cart_id as $key1=>$cart_id_item){
	
					//echo $cart_id_item;
	
					$field = array(
	
							'cart_id',
							'product_id',
							'img_path',
							'sku_code',
							'sku_name',
							'qtynum',
							'product_title_cn',
							'sales_price'
					);
					$this->clear();
					$this->setField($field);
					$this->setTable('vcb_cart');
					$this->setWhere('cart_id', '=', $cart_id_item);
					$dataOfCartItem = $this->select();
	
					if($dataOfCartItem){
	
						$cart_id[$key1] = $dataOfCartItem[0];
					}
				}
	
				//print_r($cart_id);
				$data[$key]['cart_id'] = $cart_id;
	
	
			}
	
			//print_r($data);
	
			return $data;
		}
			
	
	}
	
	/**
	 * getSucceedBaseInfo基本数据读取
	 * @access public
	 */
	function getSucceedBaseInfo($user_id){
	
		$field = array(
	
				'order_id',
				'order_no',
				'cart_id',
				'address_id',
				'order_total_price',
				'created',
				'status'
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_order');
		$this->setWhere('user_id', '=', $user_id);
		$this->setWhere('status', '=', 50000);
		$this->setOrderBy('order_id DESC');
		$data = $this->select();
	
		//print_r($data);
		if($data){
	
			/**
			 * 成功取得订单信息，解析cartId数组获得
			 * 对应sui_id属性 图片地址，标题，属性值，价格，数量
			 *
			 */
			foreach ($data as $key=>$myOrderItem){
	
				//echo $myOrderItem['cart_id'];
				$cart_id = explode('|', $myOrderItem['cart_id']);
				//print_r($cart_id);
	
				foreach ($cart_id as $key1=>$cart_id_item){
	
					//echo $cart_id_item;
	
					$field = array(
	
							'cart_id',
							'product_id',
							'img_path',
							'sku_code',
							'sku_name',
							'qtynum',
							'product_title_cn',
							'sales_price'
					);
					$this->clear();
					$this->setField($field);
					$this->setTable('vcb_cart');
					$this->setWhere('cart_id', '=', $cart_id_item);
					$dataOfCartItem = $this->select();
	
					if($dataOfCartItem){
	
						$cart_id[$key1] = $dataOfCartItem[0];
					}
				}
	
				//print_r($cart_id);
				$data[$key]['cart_id'] = $cart_id;
	
	
			}
	
			//print_r($data);
	
			return $data;
		}
			
	
	}
	
	/**
	 * getClosedBaseInfo基本数据读取
	 * @access public
	 */
	function getClosedBaseInfo($user_id){
	
		$field = array(
	
				'order_id',
				'order_no',
				'cart_id',
				'address_id',
				'order_total_price',
				'created',
				'status'
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_order');
		$this->setWhere('user_id', '=', $user_id);
		$this->setWhere('status', '=', 60000);
		$this->setOrderBy('order_id DESC');
		$data = $this->select();
	
		//print_r($data);
		if($data){
	
			/**
			 * 成功取得订单信息，解析cartId数组获得
			 * 对应sui_id属性 图片地址，标题，属性值，价格，数量
			 *
			 */
			foreach ($data as $key=>$myOrderItem){
	
				//echo $myOrderItem['cart_id'];
				$cart_id = explode('|', $myOrderItem['cart_id']);
				//print_r($cart_id);
	
				foreach ($cart_id as $key1=>$cart_id_item){
	
					//echo $cart_id_item;
	
					$field = array(
	
							'cart_id',
							'product_id',
							'img_path',
							'sku_code',
							'sku_name',
							'qtynum',
							'product_title_cn',
							'sales_price'
					);
					$this->clear();
					$this->setField($field);
					$this->setTable('vcb_cart');
					$this->setWhere('cart_id', '=', $cart_id_item);
					$dataOfCartItem = $this->select();
	
					if($dataOfCartItem){
	
						$cart_id[$key1] = $dataOfCartItem[0];
					}
				}
	
				//print_r($cart_id);
				$data[$key]['cart_id'] = $cart_id;
	
	
			}
	
			//print_r($data);
	
			return $data;
		}
			
	
	}
	
	/**
	 * confirmGoods确认收货
	 * @access public
	 */
	function confirmGoods($user_id,$orderId){
	
	
		$field = array(
					
				'status'=>50000
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_order');
		$this->setWhere('user_id', '=', $user_id);
		$this->setWhere('order_id', '=', $orderId);
		$data = $this->update();
	
		//print_r($data);
		if($data){
				
			return $data;
		}
	}
	
}//Myorders.class结束

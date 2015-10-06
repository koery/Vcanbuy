<?php


class Pays extends Model {
	
	/**
	 * 支付页面基本信息
	 * @param unknown $payId
	 * 
	 * 余额
	 * 订单总额
	 * 时间
	 */
	function myPayBaseInfo($payId){
					
			$field = array(
		
					'order_id',
					'order_no',
					'cart_id',
					'address_id',				
					'order_total_price',
					'created'
					
		
			);
			$this->clear();
			$this->setField($field);
			$this->setTable('vcb_order');
			$this->setWhere('order_id', '=', $payId);	
			$data = $this->select();
            
			$myPayBaseInfo=$data[0];
			//print_r($myPayBaseInfo);
			//print_r($data[0]["cart_id"]);
			$cartId = explode('|', $data[0]["cart_id"]);
			$product_title = array();
			foreach ($cartId as $cartIdItem ){
				
				$field = array(
				
						'product_title_cn',
						
				
				);
				$this->clear();
				$this->setField($field);
				$this->setTable('vcb_cart');
				$this->setWhere('cart_id', '=', $cartIdItem);
				$dataOfroductTitle = $this->select();

				if($myPayBaseInfo){
					$product_title[$cartIdItem] = $dataOfroductTitle[0];
				}
					
				
			}
			$myPayBaseInfo['cart_id']=$product_title;
			
			
			//组合地址
			$field = array(
								
					'province',
					'city',
					'district',
					'address',	
					'postcode',
					'username',
					'tel'															
			);
			$this->clear();
			$this->setField($field);
			$this->setTable('vcb_user_address');
			$this->setWhere('id', '=', $myPayBaseInfo['address_id']);
			$dataOfAddress = $this->select();
			if($dataOfAddress){
				
				$myPayBaseInfo['address'] = $dataOfAddress[0];
				
			}
			
			
				
			
			if($myPayBaseInfo)
				return $myPayBaseInfo;
      
		}//myPayBaseInfo() END
		
	/**
	 * 获取用户余额信息
	 * 
	 */
	function getMyBalance($user_id){
		
		$field = array(
				
				'balance'

	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_user');
		$this->setWhere('user_id', '=', $user_id);
		$data = $this->select();
		
		
		if($data)
			return $data;
		
	}

	/**
	 * 获取用户初始密码
	 *
	 */
	function getMyPayPwd($user_id){
	
		$field = array(
	
				'pay_password',
				'password',
	
	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_user');
		$this->setWhere('user_id', '=', $user_id);
		$data = $this->select();
	
	    
		if($data){
			
			if($data[0]['pay_password']==$data[0]['password'])
				return TRUE;
			else return FALSE;
		}
			
	
	}	

	
	
	/**
	 * 获取用户支付密码状态
	 *
	 */
	function getMyPayPwdStatus($user_id){
		
		
	
		$field = array(
	
				'pay_status',
				'pay_status_time'	
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_user');
		$this->setWhere('user_id', '=', $user_id);
		$data = $this->select();
	
		 //print_r($data);
		if($data){
				
			if($data[0]['pay_status']==20000){
				
				$hour=floor((time()-strtotime($data[0]['pay_status_time']))/3600);
				if($hour>=2){//2小时解锁
					
					$field = array(
					
							'pay_status'=>10000,
							'pay_status_time'=>date('Y-m-d H:i:s', time())
					);
					$this->clear();
					$this->setField($field);
					$this->setTable('vcb_user');
					$this->setWhere('user_id', '=', $user_id);
					$data = $this->update();
					
					if(data)
					   return $data[0]['pay_status'];
				}else{
					
					return $data[0]['pay_status'];					
				}
				
			}else return $data[0]['pay_status'];
		}
			
	
	}
	/**
	 * 支付密码检测
	 */
	function checkPayPwd($payPwd,$user_id){
		
		//echo $payPwd.$user_id;
		
		$field = array(
					
				'pay_password'				
		
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_user');
		$this->setWhere('user_id', '=', $user_id);
		$data = $this->select();
		
		if($data[0]['pay_password']==md5($payPwd)){
		
			
			return TRUE;
		}else 
			return FALSE;
		
		
	}	
	
	
	
	
	/**
	 * 锁定支付密码
	 */
	function lockPayStatus($user_id){
	
		$field = array(
					
				'pay_status'=>20000,
				'pay_status_time'=>date('Y-m-d H:i:s', time())
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_user');
		$this->setWhere('user_id', '=', $user_id);
		$this->update();	    
		
	}
	
	
}//Pays.class结束

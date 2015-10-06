<?php
/*
 * 
 * @author yanghw
 * @access public
 * Model Member/Model/Account
 */
class Account extends Model{
	/*
	 * 获取user_id
	 */
	static function getUserId(){
		if (isset ( $_SESSION ['user_id'] )){
			$user_id = $_SESSION ['user_id'] ;
		}else{
			$user_id = null;
		}
	
		return $user_id;
	}
	/*
	 * 验证是否有收货地址
	 */
	function verify($user_id)
	{
		$field = array(
				'country',
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_user_address');
		$this->setWhere('user_id', '=', $user_id);
		$data = $this->select();
		return $data;
	}
	
	/*
	 * 更新地址
	 */
	function save($country,$region,$province,$city,$district,$address,$postcode,$mobile,$tel,$user_id){

		$field = array(
				'country',
				'region',
				'province',
				'city',
				'district',
				'address',
				'postcode',
				'mobile',
				'tel',
		);
		$this->clear();
		$this->setField($field);
		$this->setTable ( 'vcb_user_address' );
		$this->setWhere('user_id', '=', trim ( $user_id ));
		$data = $this->select();	
			$field = array(
				'country' => trim ( $country ),
				'region' => trim ( $region ),
				'province' => trim ( $province ),
				'city' => trim ( $city ),
				'district' => trim ( $district ),
				'address' => trim ( $address ),
				'postcode' => trim ( $postcode ),
				'mobile' => trim ( $mobile ),
				'tel' => trim ( $tel ),
				'created' => date("Y-m-d H:i:s",time()),
		);
		
		
		$this->clear();
		$this->setField($field);
		$this->setTable ( 'vcb_user_address' );
		$this->setWhere('user_id', '=', trim ( $user_id ));
		$data = $this->update();
		return $data;
	}
	
	/*
	 * 添加地址
	 */
	function add($country,$region,$province,$city,$district,$address,$postcode,$mobile,$tel,$user_id)
	{
		$field = array(
				'user_id' => trim ( $user_id ),
				'country' => trim ( $country ),
				'region' => trim ( $region ),
				'province' => trim ( $province ),
				'city' => trim ( $city ),
				'district' => trim ( $district ),
				'address' => trim ( $address ),
				'postcode' => trim ( $postcode ),
				'mobile' => trim ( $mobile ),
				'tel' => trim ( $tel ),
				'created' => date("Y-m-d H:i:s",time()),
		);
		$this->clear();
		$this->setTable ( 'vcb_user_address' );					
		$this->setField ( $field );				
		$data = $this->insert ();	
		return $data;
	}
}


?>
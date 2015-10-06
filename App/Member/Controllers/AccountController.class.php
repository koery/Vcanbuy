<?php
class AccountController extends Controller {
	
	function beforeAction() {

	}

	function afterAction() {
	
	}
	/*
	 * 用户信息修改页面显示
	 */
	function update(){
		$user_id = Login::getUserId();
		$field = array(
				'name',
				'email',
				'sex',
				'language',
				'country',
				'region',
				'province',
				'city',
				'district',
				'address',
				'username',
		);
		$m = new Login();
		$m->clear();
		$m->setField($field);
		$m->setTable('vcb_user');
		$m->setWhere('user_id', '=', $user_id);
		$data = $m->select();
		$this->assign('data', $data);
	}
	
	/*
	 * 
	 * 修改用户信息
	 */
	function edituserinfo(){
		$user_id = Login::getUserId();
		$this->doNotRenderHeader = 1;
		$name = get_post_value('name');
		$sex = get_post_value('sex');
		$field = array(
				'name' => trim ( $name ),
				'sex'=>$sex,
		);
		$m = new Login();
		$m->clear();
		$m->setField($field);
		$m->setTable('vcb_user');
		$m->setWhere('user_id', '=', $user_id);
		$data = $m->update();
		if (!empty($data)){
			header("location:info_success");
		}else{
			echo '信息修改失败';
		}
	}
	
	/*
	 * 
	 * 修改收货地址页面显示
	 */
	function address(){
		$user_id = Account::getUserId();
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
		$m = new Account();
		$m->clear();
		$m->setField($field);
		$m->setTable('vcb_user_address');
		$m->setWhere('user_id', '=', $user_id);
		$data = $m->select();
		if(empty($data)){
			header("location:transfer");
		}
		$this->assign('data',$data);
	
	}
	
	/*
	 * 检查是否已有数据显示页面
	 * 
	 */
	function address_add(){
		
		$user_id = Account::getUserId();
		
		$m = new Account();
		$data = $m->verify($user_id);
		if(!empty($data)){
			header("location:address");
		}
		$this->assign('data',$data);
	
	}
	/*
	 * 
	 * 
	 * 添加收货地址
	 */
	function inaddress()
	{
		$user_id = Account::getUserId();
		$country = get_post_value('country');
		$region = get_post_value('region');
		$province = get_post_value('province');
		$city = get_post_value('city');
		$district = get_post_value('district');
		$address = get_post_value('address');
		$postcode = get_post_value('postcode');
		$mobile = get_post_value('mobile');
		$tel = get_post_value('tel');
		$m = new Account();
		$data = $m->add($country,$region,$province,$city,$district,$address,$postcode,$mobile,$tel,$user_id);
		if(!empty($data))
		{
			header("location:addr_success");
		}
	}
	
	/*
	 * 
	 * 修改收货地址
	 */
	function editaddress(){
		
		$user_id = Account::getUserId();
		$this->doNotRenderHeader = 1;	
		$m = new Account();
		$country = get_post_value('country');
		$region = get_post_value('region');
		$province = get_post_value('province');
		$city = get_post_value('city');
		$district = get_post_value('district');
		$address = get_post_value('address');
		$postcode = get_post_value('postcode');
		$mobile = get_post_value('mobile');
		$tel = get_post_value('tel');
		$data = $m->save($country,$region,$province,$city,$district,$address,$postcode,$mobile,$tel,$user_id);
		//var_dump($data);
		if(!empty($data))
		{
			header("location:addr_success");
		}
		$this->assign('data', $data);
	}
	
	
	
}

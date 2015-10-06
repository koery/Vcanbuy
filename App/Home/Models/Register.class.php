<?php
class Register extends Model{
	private $_config = array(
		'cn' =>array(
			'status' =>'E-mail已验证。',
			'created' =>'验证已失效。'
		),
		'th' =>array(
					'status' =>'E-mail ได้รับการตรวจสอบ ',
					'created' =>'การตรวจสอบหมดอายุ'
			)
	);
	/**
	 * 保存前判断
	 * @param string $user_id
	 * @param string $tourists_id
	 */
	 function verifyEmail($email){
		$this->clear();
		$this->setTable ( 'vcb_user' );
		$this->setWhere('email', '=', $email);
		// $this->setWhere('status', '=', '10000');
		$data = $this->getFieldValue ( 'count(*)' );
		return $data == 0 ? true : false;
	
	}
	

	function verify_code($code){
		$field = array(
				'status',
				'created',
				'email',
				'password',
				//'mobile',
				'intro',
		);
		
		$this->clear();
		$this->setField($field);
		$this->setTable ( 'vcb_user_temp' );
		$this->setWhere('code', '=', $code);
		$data = $this->select();
		//print_r($data);
		if ($data[0]['status'] !='10000'){
			return $this->getMessage('status');
		}
		$email = $data[0]['email'];
		$password = $data[0]['password'];
		//$mobile = $data[0]['mobile'];
		$intro = $data[0]['intro'];
		
		//数据是否已生成.
		$this->clear();
		$this->setTable ( 'vcb_user' );
		$this->setWhere('email', '=', $email);
		$data = $this->getFieldValue('count(*)');
		if ($data >0){
			return $this->getMessage('status');
		}
		
		$no = $this->getUsername();
		//echo $no;
		//保存数据
		$field = array(
				'status' =>'10000',
				'created'=>date('Y-m-d H:i:s', time()),
				'email' =>$email,
				'password' =>$password,
				'pay_password'=>$password,//支付初始密码为登录密码
				//'mobile' =>$mobile,
				'intro' =>$intro,
				'language'=>LANGUAGE,
				'username'=>$no,
		);
		$this->clear();
		$this->setField($field);
		$this->setTable ( 'vcb_user' );
		$userid = $this->insert();
		//echo $userid;
		
		//更新
		$field = array(
				'status' =>'30000',
		);
		$this->clear();
		$this->setField($field);
		$this->setTable ( 'vcb_user_temp' );
		$this->setWhere('code', '=', $code);
		$this->update();

		
		return array(
				'user_id' =>$userid,
				'username'=>$no,
				'vip' =>'',
				'language' =>DEFAULT_LANGUAGE,
			);
		

	}
	/**
	 * 返回用户编号
	 */
	private function getUsername(){
		$field = array (
				'length',
				'encoding',
				'current_no',
				'bill_mark' 
		);
		$this->clear();
		$this->setField($field);
		$this->setTable ( 'vcb_bill' );
		$this->setWhere('bill_type', '=', '10000');
		$data = $this->select();
		
		//按流水号
		if ($data[0]['encoding']==10000){
			$current_no = $data[0]['current_no'] +1;
			$no = $current_no;
			
			for($i = strlen($no); $i < $data[0]['length']; $i ++) {
				$no = '0' . $no;
			}
			$no = $data[0]['bill_mark'].$no;
			
			$field = array (
					'current_no' =>$current_no,
			);
			$this->clear();
			$this->setField($field);
			$this->setTable ( 'vcb_bill' );
			$this->setWhere('bill_type', '=', '10000');
			$this->update();
			
			return $no;
		}
	}
	private function getMessage($name){
		$lang =strtolower(LANGUAGE);
		return $this->_config[$lang][$name];
	}
	
	function saveRegister($user,$psw){
		if (strpos($user, '@') > 0){
			
			$field = array(
					'email'=>$user,
					'password' =>  $psw,					
					'status' =>'10000',				
			);
			
		}
			
		else {
			$field = array(
					'mobile'=>$user,
					'password' =>  $psw,
					'status' =>'10000',
			);
			
			
		}
		
	
		$this->clear();
		$this->setField($field);
		$this->setTable ( 'vcb_user_temp' );
		$data = $this->insert();
	
		if ($data >0){
			return true;
		}else{
			return false;
		}
	}
	
	
	function save($email,$psword,$intro){
		
		if (!$this->verifyEmail($email)){
			return '';
		}//没必要  在填写之前已经验证过正式表中不存在
				
		$t = time();
		$code = md5 ( time().$email );		
		$field = array(
				'email' => trim ( $email ),
				'created' => $t,
				'code' => $code,
				'password' => md5 ( $psword ),
				//'mobile' => trim ( $mobile ),
				'status' =>'10000',
				'intro' => trim ( $intro ) 
		);
		
		$this->clear();
		$this->setField($field);
		$this->setTable ( 'vcb_user_temp' );
		$data = $this->insert();
		
		if ($data >0){
			return $code;
		}else{
			return '';
		}
	}
	
	
	function saveAgain($email){
		
		//更新原有注册码			
		$t = time();
		$code = md5 ( time().$email );
		$field = array(				
				'created' => $t,
				'code' => $code			
			
		);
			
		$this->clear();
		$this->setField($field);
		$this->setTable ( 'vcb_user_temp' );
		$this->setWhere('email', '=', trim ( $email ));
		$this->setWhere('status' , '=', '10000');
		$data = $this->update();
	
		if ($data){
			return $code;
		}else{
			return false;
		}
	}
	
	
	
}
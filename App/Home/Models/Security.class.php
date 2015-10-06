<?php

class Security extends Model {
	
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
	
	function check($email){
		
	 	$field = array(
            'username',          
        );
        $this->clear();
        $this->setField($field);
        $this->setTable('vcb_user');
      
        if (strpos($email, '@') > 0) {
            $this->setWhere('email', '=', trim($email));
        } else {
            $this->setWhere('username', '=', trim($user));
        }
        $this->setWhere('status', '=', '10000');
        $data = $this->select();
       
        if (count($data) == 1 )         	
        	return true;       	
       else
            return false;       
	}
	
	function sava($email){
	
		$t = time();
		$code = md5 ( time().$email );	
			
		$field = array(
				'email' => trim ( $email ),
				'created' => $t,
				'code' => $code,			
				'status' =>'10000'				 
		);
		
		$this->clear();
		$this->setField($field);
		$this->setTable ( 'vcb_user_temp' );
		$data = $this->insert();
		
		if ($data >0){
			return $code;
		}else{
			return false;
		}
	}
	
	function verifyCode($code){
		$field = array(
				'status',
				'created',
				'email'
				
		);
	
		$this->clear();
		$this->setField($field);
		$this->setTable ( 'vcb_user_temp' );
		$this->setWhere('code', '=', $code);
		$data = $this->select();
		if ($data[0]['status'] !='10000'){
			return $this->getMessage('status');
		}
		$email = $data[0]['email'];
		if($data)
			return $email;
		else 
			return false;

	}
	
	
	private function getMessage($name){
		$lang =strtolower(LANGUAGE);
		return $this->_config[$lang][$name];
	}
	
	
	function resetPwd($email,$resetPwd){
	
		$field = array(
				'password' =>md5($resetPwd)
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_user');
		$this->setWhere('email', '=', trim($email));	
		$this->setWhere('status', '=', '10000');
		$data = $this->update();
		
		if($data){		
			//更新
			$field = array(
					'status' =>'30000',
			);
			$this->clear();
			$this->setField($field);
			$this->setTable ( 'vcb_user_temp' );
			$this->setWhere('email', '=', $email);
			$data=$this->update();
			
			if($data)return true;
			else return false;		
		}
	  return false;
	}
	
	
}

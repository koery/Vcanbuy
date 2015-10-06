<?php
class SecurityController extends Controller {
	/**
	 * 系统函数
	 * @access public
	 */
	function beforeAction() {
		
	}
	/**
	 * 系统函数
	 * @access public
	 */
	function afterAction() {
	}
	/**
	 * 
	 * 
	 */
	function checkEmail(){
        
		$email = get_post_value('email');
		$m = new Security();
		$data = $m->check($email);		
		if ($data){
			$this->assign('message', 'emailExist');
			$this->setReturnType('message');
			    
		}else{				
				$this->assign('message', 'emailNotExist');
				$this->setReturnType('message');
				
			}
	
	}
	
	function checkVerifCode(){	
		$verifCode = get_post_value('verifCode');
		if($verifCode!=$_SESSION['verifCode']){
			$this->assign('message', 'verifCodeFalse');
			$this->setReturnType('message');
						 
		}else{
			$this->assign('message', 'verifCodeTrue');
			$this->setReturnType('message');
	
		}
	
	}
	
	function findPwdStepTwo(){	
		$email = get_post_value('email');
		//echo $email;
		$m = new Security();
		$data = $m->sava($email);
		//echo $data;
		if ($data){
			$_SESSION["emailForPwd"]=$email;
			$this->sendEmail($data);
			$this->assign('email', $this->emailHide($email));
			$this->assign('mail', $this->getMail($email));
		}else{
			//未完善
			 			$this->assign('message', "重置失败,联系客服");
			
		}
	
	}
	
	
	function findPwdStepThree(){
		
		$code = get_post_value('code');
		//echo $code;
		$m =new Security();
		$email = $m ->verifyCode($code);
		if($email){
			$this->assign('email', $email);
		}
		else {
			
			$this->assign('message', "重置失败,联系客服");
		}
	}

	
	function findPwdStepFour(){
	    $email=$_SESSION["emailForPwd"];
		$newPwd = get_post_value('newPwd');
		//echo $code;
		$m =new Security();
		$data = $m ->resetPwd( $email,$newPwd);
		if($data){
			$this->assign('data', $data);
		}
		else {
				
			$this->assign('message', "重置失败,联系客服");
		}
	}
	/**
	 *
	 *
	 */
	
	
	
	
/**
 * 
 * 验证码 
 */	
	function verifCode(){
		session_start();
		$this->doNotRenderHeader = 1;
		$_vc = new ValidateCode();  //实例化一个对象
		$_vc->setFonts('AGENTORANGE.TTF'); 	
		$_vc->setSize(90,36);
	    $_vc->getCodeImg();
		$_SESSION['verifCode'] = $_vc->getCode();//验证码保存到SESSION中
		
		
	}	
	
	function sendEmail($code){
		$smtp = new Smtp("smtp.qq.com","25",true,"719193930","hyd123456");
		$smtp->debug= FALSE;
		$smtp->sendmail($_SESSION["emailForPwd"], "719193930@qq.com", "vcanbuy_test", $this->mailMessage($code), "HTML");
	
	}
	
	function mailMessage($str){
		$message="
			欢迎加入Vcanbuy！<br>
		请点击下面的链接完成注册：<br>
		http://localhost/home/security/findPwdStepThree?code=".$str."<br>
		如果以上链接不可点击，可以尝试将链接拷贝至浏览器（如IE）地址栏进入Vcanbuy。<br>
		如果您没有申请注册Vcanbuy，请忽略此邮件。<br>
		<a  target='_blank' style='text-decoration:none' href='http://localhost/home/index/index'>Vcanbuy</a><br>
	
		(本邮件由系统自动发送，请勿回复。)";
		return $message;
	}
	
	//邮箱加密
	function emailHide($email){
			
		$email = explode('@',$email);
		$emailName= $email[0];
		$emailLen = strlen($emailName);
			
		if($emailLen>=7)
			$emailName = substr($emailName , 0 , 2)."****".substr($emailName , -3);
		if($emailLen==6)
			$emailName = substr($emailName , 0 , 2)."****".substr($emailName , -2);
		if($emailLen==5)
			$emailName = substr($emailName , 0 , 2)."***".substr($emailName , -1);
		if($emailLen<=4&&$emailLen>=2)
			$emailName = substr($emailName , 0 , 1)."**".substr($emailName , -1);
		if($emailLen == 1)
			$emailName = "*".$emailName."*";
			
		return $emailName."@".$email[1];
	}
	
	function getMail($str){
		$email = explode('@',$str);
		return "mail.".$email[1];
	}
	

	function sendEmailAgain(){
		$this->doNotRenderHeader = 1;
		$email = $_SESSION["emailForPwd"];
		//echo $email;
		$m = new Security();
		$data = $m->sava($email);
		if($data){
				$this->sendEmail($data);
				$this->assign('message',"true");
				$this->setReturnType('message');
			
		}
		else {
			$this->assign('message',"false");
			$this->setReturnType('message');
		}
	}
	
}

<?php
class RegisterController extends Controller {
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

	function send(){
		//保存数据
		session_start();
		$this->doNotRenderHeader = 1;
		$email = get_post_value('email');
		$_SESSION["email"]=$email;
		$psword = get_post_value('psword');
		//$mobile = get_post_value('mobile');
		$intro = get_post_value('intro');
		
		$m = new Register();
		$data = $m->save($email, $psword, $intro);
		if ($data!=''){//正式表不存在且成功保存在注册过渡表中
			$this->sendEmail($data);
			$this->assign('email', $this->emailHide($email));
			$this->assign('mail', $this->getMail($email));
		}else{
			//未完善
			$this->assign('error',"注册失败");
		}
	}
	function check_email(){
		$this->doNotRenderHeader = 1;
		$email = get_post_value('email');
		
		$m = new Register();
		$data = $m->verifyEmail($email);
		$this->assign('message', $data?0:1);
		$this->setReturnType('message');
	}
	function check_mobile(){
		$this->doNotRenderHeader = 1;
		$mobile = get_post_value('mobile');
	
		$m = new Register();
		$data = $m->verify($mobile);
		$this->assign('message', $data?0:1);
		$this->setReturnType('message');
	}
	function save(){
		$this->doNotRenderHeader = 1;
		$user = get_post_value('user');
	    $psw = get_post_value('psw');
		$m = new Register();
		$data = $m->saveRegister($user,$psw);
		$this->assign('message', $data?1:0);
		$this->setReturnType('message');
	}
	function verify_code(){
		//session_start();
		$code = get_post_value('code');
		//echo $code;
		$m =new Register();
		$data = $m ->verify_code($code);
		if(!isset( $data['username'])){
			$this->assign('username', $data);
			return ;
		}
		//print_r($data);
		$username = $data['username'];
		$user_id = $data['user_id'];
		$vip = $data['vip'];
		$language = $data['language'];
		$_SESSION["username"]=$username;
		$_SESSION['user_id']=$user_id;
		$_SESSION['vip'] = $vip;
		$_SESSION['language'] = $language;
		//print_r($_SESSION);
// 		$m = new Login();
// 		$m->setSession($user_id, $username, $vip, $language);
// 		echo $_SESSION[$username];
		$this->assign('username', $username);
		

 		
// 		$m->updateCart();
	}
	
	function getMail($str){
		$email = explode('@',$str);
		return "mail.".$email[1];
	}
	
	function sendEmail($code){
		$smtp = new Smtp("smtp.qq.com","25",true,"719193930","hyd123456");
		$smtp->debug= FALSE;	
		$smtp->sendmail($_SESSION["email"], "719193930@qq.com", "vcanbuy_test", $this->mailMessage($code), "HTML");
	
	}
	
	function mailMessage($str){
		$message="
			欢迎加入Vcanbuy！<br>
		请点击下面的链接完成注册：<br>
		http://localhost/home/register/verify_code?code=".$str."<br>
		如果以上链接不可点击，可以尝试将链接拷贝至浏览器（如IE）地址栏进入Vcanbuy。<br>
		如果您没有申请注册Vcanbuy，请忽略此邮件。<br>
		<a style='text-decoration:none' href='http://localhost/home/register/index'>Vcanbuy</a><br>
				
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
	
	function sendEmailAgain(){		
		$this->doNotRenderHeader = 1;
		$email = $_SESSION["email"];
		//echo $email;			
		$m = new Register();
		$data = $m->verifyEmail($email);
		if($data){
			$code = $m->saveAgain($email);
			if ($code){
				$this->sendEmail($code);
				$this->assign('message',"true");
				$this->setReturnType('message');
			}
		}
		else echo "已经注册";
	}

}

<?php
class LoginController extends Controller {
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

	function index(){
		//echo "cookie=";
		//print_r($_COOKIE);
		$this->doNotRenderHeader = 1;
		if( isset($_SESSION["countErrorTimes"])){
						
			$errorTimes=$_SESSION["countErrorTimes"];
			$this->assign('errorTimes', $errorTimes);			
		}
		
		if(isset($_COOKIE["user"])){
			//echo $_COOKIE["user"];
		$this->assign('data', $_COOKIE["user"]);
		}else 
			$this->assign('data', "请输入手机或邮箱");
	}
	
    /**
     * 登陆检测函数
     */	
	function login(){
		$this->doNotRenderHeader = 1;
		$user = get_post_value('user');
		$pwd = get_post_value('pwd');
		$remenber=get_post_value('remenber');
		$verifCode=get_post_value('verifCode');
		//echo "verifCode=".$verifCode;
		//echo $this->verifCodeCheck($verifCode);
		if($verifCode!=null&&$this->verifCodeCheck($verifCode)=="false"){

			$this->assign('message', 'false');
			$this->setReturnType('message');
			return;
		}
 		//echo "user=".$user;
 		//echo "pwd=".$pwd;
		//echo "remenber=".$remenber;
		$m = new Login();
		$data = $m->loginIn($user, $pwd);
		//echo "data:".$data;
	if ($data){//登陆验证成功
		    session_start();
		    if( isset($_SESSION["countErrorTimes"]))
		    	$_SESSION["countErrorTimes"]=0;   
		    if($remenber=="checked"){
		   		setcookie("username",$data, time()+3600*240,'/');
		   	 	setcookie("user",$user, time()+3600*240,'/');	   	
		    }	
		  
		    $this->assign('message', 0);
		    $this->setReturnType('message');
	}else{//登录验证失败，错误次数加1
		    session_start();
		    if( isset($_SESSION["countErrorTimes"])){
		         $_SESSION["countErrorTimes"]=$_SESSION["countErrorTimes"]+1;
		         $errorTimes=$_SESSION["countErrorTimes"];
		    }
		    else {
		    	$_SESSION["countErrorTimes"]=1;
		    	$errorTimes=$_SESSION["countErrorTimes"];
		    }
		    
			$this->assign('message', $errorTimes);
			$this->setReturnType('message');
		}
		
	}	
	function quit(){
		login::quit();
		header("Location: ../index/index"); 
		exit;
		
	}
	
	/**
	 *
	 * 验证码 
	 */
	function verifCode(){
		session_start();
		$this->doNotRenderHeader = 1;
		$vc = new ValidateCode();  //实例化一个对象
		//$vc->setFonts('BambergOutline-Regular.ttf'); 
		//$vc->setFonts('sketchy.ttf');
	    $vc->getCodeImg();
	    $_SESSION['verifCode']=$vc->getCode();
	    
	    //echo $_vc->getInfo();	    
	}
	
	function verifCodeCheck($verifCode){		
		if($_SESSION['verifCode']==$verifCode){
		   return "true";			
		}
		else return "false";
	}
	
	
}

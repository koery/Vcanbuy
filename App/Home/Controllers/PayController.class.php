<?php

class PayController extends Controller {

    /**
     * 系统函数beforeAction 定义在该类中进行操作之前的动作
     * @access public
     */
    function beforeAction() {}

    /**
     * 系统函数afterAction 定义在该类中进行操作之后的动作
     * @access public
     */
    function afterAction() {}
 
  /**
   * pay()
   * 支付页面基本信息
   * 
   * 订单orderId  余额  订单详情
   * 
   * 支付密码是否改变
   */
    function pay(){
    	
    	$payId = get_post_value("orderId");
    	$user_id = 1 ;//user_id 默认测试1
    	
    	$pay = new Pays();
    	
    	$myPayBaseInfo = $pay->myPayBaseInfo($payId);//基本信息
    	 
    	if($myPayBaseInfo){
    	     
    		
    		 $this->assign('myPayBaseInfo', $myPayBaseInfo);
    		 
    	}
    	
    	//获取用余额
    	
    	$myBalance = $pay->getMyBalance($user_id);//用户余额
    	
    	if($myBalance){
    	
    	
    		$this->assign('myBalance', $myBalance);
    		 
    	}
    	
       //获取初始密码与登陆密码的比较值
       $myPayPwd = $pay->getMyPayPwd($user_id);
    	
       if(!empty($myPayPwd)){
       	
       	$this->assign('myPayPwd', $myPayPwd);
       	
       }
       
       //检测是否被锁定
       $myPayPwdStatus = $pay->getMyPayPwdStatus($user_id);
        
       if($myPayPwdStatus){
       
       	$this->assign('myPayPwdStatus', $myPayPwdStatus);
       
       }
       
       
       //支付密码错误检测
       $errorTimes = 0;
       
       if( isset($_SESSION["countPayErrorTimes"])){ 

       	   if($myPayPwdStatus){
       	   	$_SESSION["countPayErrorTimes"] = 0;
       	   }
       		$errorTimes=$_SESSION["countPayErrorTimes"];      
         }
         
         
        $this->assign('errorTimes', $errorTimes);
    }
    
    /**
     * 
     * 支付密码检测
     */
     function checkPayPwd(){
     	
     	$payPwd = get_post_value('payPwd');
     	//echo 'payPwd=>'.$payPwd;
     	$user_id = 1;//测试user_id
     	$pay = new Pays();
     	
     	$checkPayPwd = $pay->checkPayPwd($payPwd,$user_id);
     	
     	if($checkPayPwd){//检验支付密码正确
     		
     		session_start();
     		if( isset($_SESSION["countPayErrorTimes"])){
     			$_SESSION["countPayErrorTimes"]=0;
     			$errorTimes=$_SESSION["countPayErrorTimes"];
     		}
     		
     		$this->assign('message', $errorTimes);
     		$this->setReturnType('message');
     	}else{
     		
     		session_start();
     		if( isset($_SESSION["countPayErrorTimes"])){
     			$_SESSION["countPayErrorTimes"]=$_SESSION["countPayErrorTimes"]+1;
     			
     			if($_SESSION["countPayErrorTimes"]>=5){//错误次数大于5次 修改支付状态
     				
     				$this->lockPayStatus();
     				
     			}
     			$errorTimes=$_SESSION["countPayErrorTimes"];
     			
     		}
     		else {
     			$_SESSION["countPayErrorTimes"]=1;
     			$errorTimes=$_SESSION["countPayErrorTimes"];
     		}
     		
     		$this->assign('message', $errorTimes);
     		$this->setReturnType('message');
     		
     	}
	
     }
     /**
      * 锁定支付密码
      * 
      */
     function  lockPayStatus(){
     	
     	$user_id = 1;//测试user_id
     	$pay = new Pays();
     	
     	$lockPayStatus = $pay->lockPayStatus($user_id);
     	
     	print_r($lockPayStatus);
     }
    
     
}//

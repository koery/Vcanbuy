<?php

class MyordersController extends Controller {

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
     * myorders基本数据读取
     * @access public
     */
    function myorders() {
    	
    	
    	$user_id = 1;//默认测试user_id为1
    	
    	$myorder = new Myorders();
    	 
    	$MyorderBaseInfo = $myorder->getMyorderBaseInfo($user_id);
    	
    	if($MyorderBaseInfo){
    		//print_r($MyorderBaseInfo);
    		
    		
    		//状态转换
    		$count = count($MyorderBaseInfo);
    		for ($i = 0; $i < $count; $i ++) {
    			$MyorderBaseInfo[$i]['status_cn'] = $myorder->getStatus('cn', $MyorderBaseInfo[$i]['status']);
    			//$MyorderBaseInfo[$i]['status_th'] = $myorder->getStatus('th', $MyorderBaseInfo[$i]['status']);
    				
    		}
    		//print_r($MyorderBaseInfo);   		
    		$this->assign('MyorderBaseInfo', $MyorderBaseInfo);   		
    	}
    }
    
    /**
     * cancelMyOrder 操作
     * @access public
     */
    function cancelMyOrder() {
    	 
    	 
    	$user_id = 1;//默认测试user_id为1
    	$orderId = get_post_value('orderId');
    	 
    	$myorder = new Myorders();
    
    	$cancelMyOrder = $myorder->cancelMyOrder($user_id,$orderId);
    	 
    	if($cancelMyOrder){
    		
    		$this->assign('message', $cancelMyOrder);
    		$this->setReturnType('message');
    	}
    }
    
    /**
     * waitingpayment基本数据读取
     * @access public
     */
	function waitingpayment() {
    	
    	
    	$user_id = 1;//默认测试user_id为1
    	
    	$myorder = new Myorders();
    	 
    	$waitingPaymentBaseInfo = $myorder->getWaitingPaymentBaseInfo($user_id);
    	
    	if($waitingPaymentBaseInfo){
    		//print_r($waitingPaymentBaseInfo);
    		
    		
    		//状态转换
    		$count = count($waitingPaymentBaseInfo);
    		for ($i = 0; $i < $count; $i ++) {
    			$waitingPaymentBaseInfo[$i]['status_cn'] = $myorder->getStatus('cn', $waitingPaymentBaseInfo[$i]['status']);
    			//$waitingPaymentBaseInfo[$i]['status_th'] = $myorder->getStatus('th', $waitingPaymentBaseInfo[$i]['status']);
    				
    		}
    		//print_r($waitingPaymentBaseInfo);
    		
    		$this->assign('MyorderBaseInfo', $waitingPaymentBaseInfo);   		
    	}
    }
    
    /**
     * waitingcheckout基本数据读取
     * @access public
     */
    function waitingcheckout() {
    	 
    	 
    	$user_id = 1;//默认测试user_id为1
    	 
    	$myorder = new Myorders();
    
    	$waitingCheckoutBaseInfo = $myorder->getWaitingCheckoutBaseInfo($user_id);
    	 
    	if($waitingCheckoutBaseInfo){
    		//print_r($waitingPaymentBaseInfo);
    
    
    		//状态转换
    		$count = count($waitingCheckoutBaseInfo);
    		for ($i = 0; $i < $count; $i ++) {
    			$waitingCheckoutBaseInfo[$i]['status_cn'] = $myorder->getStatus('cn', $waitingCheckoutBaseInfo[$i]['status']);
    			//$waitingCheckoutBaseInfo[$i]['status_th'] = $myorder->getStatus('th', $waitingCheckoutBaseInfo[$i]['status']);
    
    		}
    		//print_r($waitingCheckoutBaseInfo);
    
    		$this->assign('MyorderBaseInfo', $waitingCheckoutBaseInfo);
    	}
    }
    
    /**
     * sending基本数据读取
     * @access public
     */
    function sending() {
    	 
    	 
    	$user_id = 1;//默认测试user_id为1
    	 
    	$myorder = new Myorders();
    
    	$sendingBaseInfo = $myorder->getSendingBaseInfo($user_id);
    	 
    	if($sendingBaseInfo){
    		//print_r($waitingPaymentBaseInfo);
    
    
    		//状态转换
    		$count = count($sendingBaseInfo);
    		for ($i = 0; $i < $count; $i ++) {
    			$sendingBaseInfo[$i]['status_cn'] = $myorder->getStatus('cn', $sendingBaseInfo[$i]['status']);
    			//$sendingBaseInfo[$i]['status_th'] = $myorder->getStatus('th', $sendingBaseInfo[$i]['status']);
    
    		}
    		//print_r($sendingBaseInfo);
    
    		$this->assign('MyorderBaseInfo', $sendingBaseInfo);
    	}
    }
    
    /**
     * succeed基本数据读取
     * @access public
     */
    function succeed() {
    	 
    	 
    	$user_id = 1;//默认测试user_id为1
    	 
    	$myorder = new Myorders();
    
    	$succeedBaseInfo = $myorder->getSucceedBaseInfo($user_id);
    	 
    	if($succeedBaseInfo){
    		//print_r($waitingPaymentBaseInfo);
    
    
    		//状态转换
    		$count = count($succeedBaseInfo);
    		for ($i = 0; $i < $count; $i ++) {
    			$succeedBaseInfo[$i]['status_cn'] = $myorder->getStatus('cn', $succeedBaseInfo[$i]['status']);
    			//$succeedBaseInfo[$i]['status_th'] = $myorder->getStatus('th', $succeedBaseInfo[$i]['status']);
    
    		}
    		//print_r($succeedBaseInfo);
    
    		$this->assign('MyorderBaseInfo', $succeedBaseInfo);
    	}
    }
    
    /**
     * closed基本数据读取
     * @access public
     */
    function closed() {
    	 
    	 
    	$user_id = 1;//默认测试user_id为1
    	 
    	$myorder = new Myorders();
    
    	$closedBaseInfo = $myorder->getClosedBaseInfo($user_id);
    	 
    	if($closedBaseInfo){
    		//print_r($closedBaseInfo);
    
    
    		//状态转换
    		$count = count($closedBaseInfo);
    		for ($i = 0; $i < $count; $i ++) {
    			$closedBaseInfo[$i]['status_cn'] = $myorder->getStatus('cn', $closedBaseInfo[$i]['status']);
    			//$closedBaseInfo[$i]['status_th'] = $myorder->getStatus('th', $closedBaseInfo[$i]['status']);
    
    		}
    		//print_r($closedBaseInfo);
    
    		$this->assign('MyorderBaseInfo', $closedBaseInfo);
    	}
    }
    
    
    /**
     * confirmGoods()操作
     * @access public
     */
    function confirmGoods() {
    
    
    	$user_id = 1;//默认测试user_id为1
    	$orderId = get_post_value('orderId');
    
    	$myorder = new Myorders();
    
    	$confirmGoods = $myorder->confirmGoods($user_id,$orderId);
    
    	if($confirmGoods){
    
    		$this->assign('message', $confirmGoods);
    		$this->setReturnType('message');
    	}
    }
    
}

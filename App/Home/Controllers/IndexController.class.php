<?php

class IndexController extends Controller {

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
	 * 页面初始化
	 * 
	 */
    
    /*
     * 获得字段 及数据
     * 
     */
    function excel() {
    	
    	
    	$excel = new Index();
    	 
    	$fields = $excel->getfields();   	 
    	if($fields){    		 
    		$this->assign('fields', $fields);	 
    	}
    	
    	$data = $excel->getdatas();
    	
    	if($data){
    		$this->assign('data', $data);
    	}
    	
    }
    function Index() {
    	
    	
    	
    	//print_r($_SESSION);
    	//print_r($_COOKIE);
    	/**
    	 * session cookie tourists
    	 * 
    	 * 1.判断是登陆，服务器是否保留session
    	 * 2.如果没有session可取，判断是否本地保存cookie
    	 * 3.如果session cookie 都没有值可取采用游客登录
    	 * 
    	 */
    	if (isset($_SESSION['username'])&&!empty($_SESSION['username'])) {  //检测session
    		
    		$this->assign('username', $_SESSION['username'] );
    	}else if(!empty($_COOKIE["username"])){//检测cookie
    		
    		$userCookie=$_COOKIE["username"];
    		$this->assign('username', $userCookie);
    	}else{//游客登陆
    		
    		$tourists_id = Login::getTouristsId();
    		if ($tourists_id == null) {
    			Login::setTouristsId();
    		}
    		
    	}
    	/**
    	 * 获取顶部banner1数据
    	 * 
    	 */
    	    	
	    $index = new Index();
	    
	    $banner1 = $index->getBanner1();
	    
	    if($banner1){
	        	 
	    	$this->assign('banner1', $banner1);
	    	 
	    }	
	    	
    	
    	
	    /**
	     * 获取banner2数据
	     *
	     */	  
	     
	    $banner2 = $index->getBanner2();
	     
	    if($banner2){
	    	 
	    	$this->assign('banner2', $banner2);
	    	 
	    }
    	
    	
	    /**
	     * 获取website数据
	     *
	     */
	    
	    $websites = $index->getWebsites();
	    
	    if($websites){
	    	 
	    	$this->assign('websites', $websites);
	    	 
	    }
    	
    }


}

<?php

class ConorderController extends Controller {

    /**
     * 系统函数beforeAction 定义在该类中进行操作之前的动作
     * @access public
     */
    function beforeAction() {

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
    }

    /**
     * 系统函数afterAction 定义在该类中进行操作之后的动作
     * @access public
     */
    function afterAction() {}
 
  
    /** 
     * 控制conorder基本数据输出
     * 
     * 测试默认use_id=1
     */
    function conorder() {
    	
    	
    	$exchangeCartId = get_post_value('exchangeCartId');
    	    	
    	$exchangeCartId = explode(',', $exchangeCartId);//拆分字符串
    	
    	//print_r($exchangeCartId);
    	
    	//$exchangeCartId = array(3,9,10,14,15,16);//测试数组
    	$user_id=1;//测试数据
    	
    	$conorder = new Conorders();
    	 
     	$myConorderBaseInfo = $conorder->getMyConorderBaseInfo($exchangeCartId);//基本信息
    	
     	if($myConorderBaseInfo){
    		
     		
     		$this->assign('myConorderBaseInfo', $myConorderBaseInfo);
     		
     	}
     	
     	$myAddress = $conorder->getUserAddress($user_id);//获得用户地址列表
     	
     	if($myAddress){
     		 
     		//print_r($myAddress);
     		$this->assign('myAddress', $myAddress);
     		 
     	}
     	
    	
    }
    
    
    function modifyDefaultAddress() {//重设默认地址
    	
    	$addressIdtoDefaultAddr = get_post_value('addressIdtoDefaultAddr');
    	$defaultAddressId = get_post_value('defaultAddressId');
    	//echo $addressIdtoDefaultAddr;
    	
    	
    	$conorder = new Conorders();
    	
    	$modifyDefaultAddress = $conorder->modifyDefaultAddress($addressIdtoDefaultAddr, $defaultAddressId);
    	
    	if($modifyDefaultAddress){
    		
    		$this->assign('message', $modifyDefaultAddress);
  		    $this->setReturnType('message');
    	}
    }
  
  /**
   * 新增地址addNewAddress()
   */
  
    function addNewAddress() {
    	 
    	$province = get_post_value('province');
    	$city = get_post_value('city');
    	$district = get_post_value('district');
    	$address = get_post_value('address');
    	$postcode = get_post_value('postcode');
    	$username = get_post_value('username');
    	$tel = get_post_value('tel');
    	$user_id=1 ;//默认user_id=1  测试
    	//echo $province.$city.$district.$address.$postcode.$username.$tel;
    	
    	$conorder = new Conorders();
    	 
    	$addNewAddress = $conorder->addNewAddress($province,$city,$district,$address,$postcode,$username,$tel,$user_id);
    	 
    	if($addNewAddress){
   
    		$this->assign('message', $addNewAddress);
    		$this->setReturnType('message');
    	}
    }
    

    
    
    /**
     * 修改地址modifyAddress()
     */
    
    function modifyAddress() {
    	
    	$addressId = get_post_value('addressId');
    	$province = get_post_value('province');
    	$city = get_post_value('city');
    	$district = get_post_value('district');
    	$address = get_post_value('address');
    	$postcode = get_post_value('postcode');
    	$username = get_post_value('username');
    	$tel = get_post_value('tel');
    	$user_id=1 ;//默认user_id=1  测试
    	//echo $addressId.$province.$city.$district.$address.$postcode.$username.$tel;
    	 
    	$conorder = new Conorders();
    
    	$modifyAddress = $conorder->modifyAddress($addressId,$province,$city,$district,$address,$postcode,$username,$tel,$user_id);
    
    	if($modifyAddress){
    		 
    		$this->assign('message', $modifyAddress);
    		$this->setReturnType('message');
    	}
    }
    
    
    
    /**
     * 
     * 提交订单 保存订单信息
     * 
     * SavaOrder()
     * 
     */
    
    function savaOrder() {
    	 
    	$order_addressId = get_post_value('order_addressId');
    	$order_productId = get_post_value('order_productId');
    	$order_total_price = get_post_value('order_total_price');
    	$user_id=1 ;//默认user_id=1  测试
    	
    	//echo $order_addressId;
    	//print_r($order_productId);
    
    	$conorder = new Conorders();
    
    	$savaOrder = $conorder->savaOrder($order_addressId,$order_productId,$order_total_price,$user_id);
    
    	if($savaOrder){
    		
    		$this->assign('message',$savaOrder);
    		$this->setReturnType('message');
    	}
    }
    
    
    
    
    
    
    
    
    
    
    function index() {

        if (!Login::verifyLogin()) {
            header("Location:../error/login_error");
        } else {
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
                if (!empty($user_id)) {
                    $user_data = Login::verify_login($user_id);
                    if (!empty($user_data)) {                        
                        $this->assign('user_data', $user_data);
                    }
                }
                $m = new Cart();
                $data = $m->getCartList();
                $this->assign('data', $data);
            }
        }
    }

    function delete() {
        $id = get_post_value('id');
        if (!Login::verifyLogin()) {
            header("Location:../error/login_error");
        } else {
            $m = new Cart();
            $m->deleteCart($id);
            header("Location: index");
        }
    }

    function deleteall() {
        $strid = get_post_value('id');
        $id = explode(",", $strid);
        $m = new Cart();
        foreach ($id as $idd) {
            $m->deleteCart($idd);
        }
    }

    function modify() {
        $id = get_post_value('id');
        $qty = get_post_value('qty');
        $m = new Cart();
        $m->modifyCart($id, $qty);
    }

    function to_favorites() {
        $id = get_post_value('id');
        $m = new Favorites();
        $data = $m->cartToFavorites($id);

        $this->assign('message', '1');
        $this->setReturnType('message');
    }

    function logout() {
        Login::logout();
    }

}

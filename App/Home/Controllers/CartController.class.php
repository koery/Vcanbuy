<?php

class CartController extends Controller {

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
 
    function cart(){//我的购物车显示页面数据
    
    	//检测session
//     	$username=$this->getSession('username');
//     	if($username){
//     		$this->assign('username', $username);
//     	}
    	$username=1;
    	
    	$cart = new Carts();
    	
    	$mycartBaseInfo = $cart->getMycartBaseInfo($username);
    	//echo "mycartBaseInfo";
    	//print_r($mycartBaseInfo);
    	if($mycartBaseInfo){
    		
    		$dataOfMycart = array();
    		$productId = array();
    		$skuId = array();
    		foreach ($mycartBaseInfo as $key=>$mycart){
    			//print_r($mycart);
    			$dataOfMycart[$mycart['product_id']][]=$mycart;  
    			$productId[]=$mycart['product_id'];
    			$skuId[]=$mycart['sku_id'];
    		}
    		$this->assign('dataOfMycart', $dataOfMycart);
    		
    		
    	
    	$productId=array_unique($productId);//去重
    	$productId=array_values($productId);//更新键值
    	//print_r($productId);
    	
    	
    	$skuId=array_unique($skuId);//去重
    	$skuId=array_values($skuId);//更新键值
    	//print_r($skuId);
    	
    	
    	$mycartSkuRemark = $cart->getMycartSkuRemark($productId);
    	if($mycartSkuRemark){
    		$this->assign('mycartSkuRemark', $mycartSkuRemark);
    		//print_r($mycartSkuRemark);
    	}
    	
    	$mycartSkuQty = $cart->getMycartSkuQty($skuId);
    	if($mycartSkuQty){
    		$this->assign('mycartSkuQty', $mycartSkuQty);
    		//print_r($mycartSkuQty);
    	}
    	
    	/*
    	 * 重新获取产品数组内的 产品信息
    	 * 
    	 * 选择大图表
    	 * 选择小图表
    	 * 
    	 * 属性名表
    	 * 属性名代码
    	 * 
    	 * 属性值表
    	 * 属性值代码
    	 * 
    	 * 条件表
    	 * 12/29/2014 17:51:50 PM    	
    	 */
    	
    	   $cartProImgSelect = $cart->getCartProImgSelect($productId);//获得选择产品图片
            if($cartProImgSelect){
            	//print_r($cartProImgSelect);
            	$this->assign('cartProImgSelect', $cartProImgSelect);
            }
    	
    	
            $cartProInfoSku = $cart->getCartProInfoSku($productId);//获得选择产品sku
            if($cartProInfoSku){
            	//print_r($cartProInfoSku);
            	//$this->assign('cartProInfoSku', $cartProInfoSku);
            	
            	
            	$price_cart=array();
            	$qty_cart=array();
            	$sku_id_cart=array();
            	$numOfQty_cart=array();            	
            	$sku_name3_cart=array();	
            	$sku_name6_cart=array();
            	$sku_code3_cart=array();
            	$sku_code4_cart=array();
            	$sku_code6_cart=array();
            	$code_name_cart=array();
            	foreach ($cartProInfoSku as $KEY=>$proInfoSku){
            		
            		//print_r($proInfoSku);
            		
            		$price=array();
            		foreach ($proInfoSku as $key=>$sku){
            			$price[$sku['id']]['sales_price']=$sku['sales_price'];
            			//$price[$sku['id']]['old_price']=$sku['old_price'];
            		}
            		
            		
            		
            		
            		//print_r($price);
            		 
            		$qty=array();
            		foreach ($proInfoSku as $key=>$sku){
            			$qty[$sku['id']]=$sku['qty'];
            		}
            		//print_r($qty);
            		$sku_id=array();
            		foreach ($proInfoSku as $key=>$sku){
            			$sku_id[]=$sku['id'];
            		}
            		//             	print_r($suk_id);
            		//             	$this->assign('sku_id', $suk_id);
            		 
            		 
//             		$numOfQty=0;
//             		for($i=0;$i<count($qty);$i++)
//             			$numOfQty += $qty[$i];
            			
       
            			 
            			 
            		$sku_name=array();
            			foreach ($proInfoSku as $key=>$sku){
            			$sku_name[]=$sku['sku_name_cn'];
            		}
            		//print_r($sku_name);
            		 
            		 
            		$sku_name1=array();
            		foreach ($sku_name as $key=>$data){
            		//print_r($data);
            		$sku_name1[]=explode("|", $data);
            		//print_r($sku_code1);
            		}
            		 
            		$sku_name2=array();
            		foreach ($sku_name1 as $key=>$data)
            			foreach ($data as $key=>$data){
            			//print_r($data);
            			$sku_name2[]=explode(":", $data);
            			 
            		}
            		$sku_name3=array();
            		$sku_name5=array();
            		$sku_name6=array();
            		foreach ($sku_name2 as $key=>$data)
            		{
            		$sku_name3[]=$data[0];
            		$sku_name5[$data[0]][]=$data[1];
            		$sku_name6[$data[0]]=array_unique($sku_name5[$data[0]]);
            			$sku_name6[$data[0]]=array_values($sku_name6[$data[0]]);
            		}
            		$sku_name3=array_unique($sku_name3);//去重
            		$sku_name3=array_values($sku_name3);//更新键值
            		 
            		 
            		 
            		 
            		$sku_code=array();
            		foreach ($proInfoSku as $key=>$sku){
            		$sku_code[]=$sku['sku_code'];
            		}  //得到sku_code
            			 
            			$sku_code1=array();
            			foreach ($sku_code as $key=>$data){
            			//print_r($data);
            			$sku_code1[]=explode("|", $data);
            			//print_r($sku_code1);
            		}
            		 
            		$sku_code2=array();
            			foreach ($sku_code1 as $key=>$data)
            				foreach ($data as $key=>$data){
            			//print_r($data);
            			$sku_code2[]=explode(":", $data);
            		
            		}
            		
            			$sku_code3=array();
            			$sku_code4=array();
            			$sku_code5=array();
            			$sku_code6=array();
            			foreach ($sku_code2 as $key=>$data)
            			{
            			$sku_code3[]=$data[0];
            			$sku_code4[]=$data[1];
            			$sku_code5[$data[0]][]=$data[1];
            			$sku_code6[$data[0]]=array_unique($sku_code5[$data[0]]);
            			$sku_code6[$data[0]]=array_values($sku_code6[$data[0]]);
            		}
            		        $sku_code3=array_unique($sku_code3);
            				$sku_code3=array_values($sku_code3);
            				$num=count($sku_code3);
            				//$sku_code5=array_unique($sku_code5);
            				$sku_code4 = array_chunk($sku_code4, $num);
            				//echo "sku_code3";
//             				print_r($sku_id);
             				//print_r($sku_name3);
             				
             				//print_r($sku_code3);
             				
             				$code_name=array();
             				foreach ($sku_name3 as $key1=>$data1)
             					foreach ($sku_code3 as $key2=>$data2){
             						if($key1==$key2)
             							$code_name[$data2]=$data1;
             					
             				}
             				
             				//print_r($code_name);
//             				print_r($sku_code4);
//             				//$helloJson_sku_code = json_encode($sku_code4);
//             					print_r($sku_name6);
//             					print_r($sku_code6);
            					 
            					
            					$price_cart[$KEY]=$price;
            					//$numOfQty_cart[$KEY]=$numOfQty;          					
            					$qty_cart[$KEY]=$qty;
            					$sku_id_cart[$KEY]=$sku_id;          					           
            					$sku_name3_cart[$KEY]=$sku_name3;           	
            					$sku_name6_cart[$KEY]=$sku_name6;
            					$sku_code3_cart[$KEY]=$sku_code3;
            					$sku_code4_cart[$KEY]=$sku_code4;
            					$sku_code6_cart[$KEY]=$sku_code6;
            					$code_name_cart[$KEY]=$code_name;
            					
            					
            						
            	}
//             	echo "%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%";
            	
//             	 print_r($sku_id_cart);
//                  print_r($qty_cart);
//                  print_r($sku_name3_cart);
//                  print_r($sku_code3_cart);
//                  print_r($sku_code4_cart);
//                  print_r($sku_name6_cart);
//                  print_r($sku_code6_cart);
                 
            	$this->assign('price_cart', $price_cart);
            	//$this->assign('numOfQty_cart', $numOfQty_cart);
            	$this->assign('sku_id_cart', $sku_id_cart);
            	$this->assign('qty_cart', $qty_cart);
            	$this->assign('name_cart', $sku_name3_cart);
            	$this->assign('code_cart', $sku_code3_cart);
            	$this->assign('sku_code4_cart', $sku_code4_cart);
            	$this->assign('sku_name_cart', $sku_name6_cart);
            	$this->assign('sku_code_cart', $sku_code6_cart);
            	$this->assign('code_name_cart', $code_name_cart);
            	//print_r($code_name_cart);
            	 	
	
            }
	
    }
    
  }   
    
  //删除一条
  function deleteOne() {
  	
  		$cart_id = get_post_value("cart_id");
  		$cart = new Carts();
  		$deleteOne=$cart->deleteCart($cart_id);
  		
        if($deleteOne){
        	
        	$this->assign('message', $deleteOne);
        	$this->setReturnType('message');	
        }
  }
  //恢复
  function recoveryCart() {
  	 
  	$cart_id = get_post_value("cart_id");
  	$cart = new Carts();
  	$recoveryCart=$cart->recoveryCart($cart_id);
  
  	if($recoveryCart){
  		 
  		$this->assign('message', $recoveryCart);
  		$this->setReturnType('message');
  	}
  }
  
  //批量删除
  function deleteMany() {
  	
  	$cart_ids = get_post_value('cart_ids');
  	$cart = new Cart();
  	
  	foreach ($cart_ids as $cart_id){
  		
  	    $deleteMany=$cart->deleteCart($cart_id);
  	    
  	    if($deleteMany){
  	    
  	    	$this->assign('message', $deleteMany);
  	    	$this->setReturnType('message');
  	    }
  	}
  	
  }
  
  //修改数量
  function modifyQty() {
  	
   
  	$cart_id = get_post_value('cart_id');
  	$qty = get_post_value('qty');
  	
//   	echo $cart_id;
//   	echo $qty;
  	
  	$cart = new Carts();
  	$modifyQty=$cart->modifyQty($cart_id, $qty);
  	
  	if($modifyQty){
  		

  		$this->assign('message', $modifyQty);
  		$this->setReturnType('message');
  	}
  }
  
  //修改属性
  
  function modifySku() {
  	 
  	$cart_id = get_post_value('cart_id');
  	$sku_id = get_post_value('sku_id');
  	$img_path = get_post_value('img_path');
  	
  	//echo $cart_id;
  	//echo $sku_id;
  	//echo $img_path;
  	$cart = new Carts();
  	$modifySku=$cart->modifySku($cart_id,$sku_id,$img_path);
  	 
  	if($modifySku){
   
  		$this->assign('message', $modifySku);
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

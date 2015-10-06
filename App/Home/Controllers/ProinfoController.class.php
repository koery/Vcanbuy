<?php
class ProinfoController extends Controller {

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

    
    public function Proinfo() {

	   //检测session
       $username=$this->getSession('username');
       if($username){
       	     $this->assign('username', $username);
       }
        
        
       if (empty(get_post_value('productId'))) {
            //header("Location:error.php");
       } else {
        	
        	$product = new Products();        	
        	$productId = get_post_value('productId');
        	
            $proBaseInfo = $product->getProBaseInfo($productId);//获得产品基本信息
            if($proBaseInfo)
            	$this->assign('proBaseInfo', $proBaseInfo);
            
            $proImgDetail = $product->getProImgDetail($productId);//获得介绍产品图片
            if($proImgDetail)
            	$this->assign('proImgDetail', $proImgDetail);  
            
            $proFreight = $product->getProFreight($productId);//获得产品运费
            if($proFreight)
            	$this->assign('proFreight', $proFreight);
            
            
            $proNavigation = $product->getProNavigation($productId);//获得导航信息
            if($proNavigation)
            	$this->assign('proNavigation', $proNavigation );
            
            $proNavigationUrl = $product->getProNavigationUrl($productId);//获得导航信息
            if($proNavigationUrl)
            	$this->assign('proNavigationUrl', $proNavigationUrl );
            
            $proInfoSkuRemark = $product->getProInfoSkuRemark($productId);//获得产品属性备注
            if($proInfoSkuRemark)
            	$this->assign('proInfoSkuRemark', $proInfoSkuRemark );
//*******************************            
            $proInfoSku = $product->getProInfoSku($productId);//获得产品sku
            if($proInfoSku){
            	//print_r($proInfoSku);
            	
            	$price=array();
            	foreach ($proInfoSku as $key=>$sku){
            		$price[$sku['id']]['sales_price']=$sku['sales_price'];
            		$price[$sku['id']]['old_price']=$sku['old_price'];
            	}
            	$this->assign('price', $price );
            	//print_r($price);
            	
            	$qty=array();
            	foreach ($proInfoSku as $key=>$sku){
            		$qty[]=$sku['qty'];
            	}           	
            	//print_r($qty);
            	$sku_id=array();
            	foreach ($proInfoSku as $key=>$sku){
            		$sku_id[]=$sku['id'];
            	}
//             	print_r($suk_id);
//             	$this->assign('sku_id', $suk_id);
            	
            	
            	$numOfQty=0;
            	for($i=0;$i<count($qty);$i++)
            		$numOfQty += $qty[$i];
            	$this->assign('numOfQty', $numOfQty );
            	
            	
            	
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
            	// print_r($sku_id);
            	// print_r($sku_name3);
            	//print_r($sku_code3);
            	//print_r($sku_code4);
            	 //$helloJson_sku_code = json_encode($sku_code4);
            	// print_r($sku_name6);
            	// print_r($sku_code6);
            	
            	 $this->assign('sku_id', $sku_id);
            	 $this->assign('qty', $qty);
            	 $this->assign('name', $sku_name3);
            	 $this->assign('code', $sku_code3);
            	 $this->assign('sku_code4', $sku_code4);
            	 $this->assign('sku_name', $sku_name6);
            	 $this->assign('sku_code', $sku_code6);
            	 
            	 
            }  
            
            $proImgSelect = $product->getProImgSelect($productId);//获得选择产品图片
            if($proImgSelect){
            	$this->assign('proImgSelect', $proImgSelect);
            }

//********************************
       }
}
    
		//加入购物车 12/22/2014 17:22:20 PM    	
 	
        function  addToCart(){
        	
        	$user_id = get_post_value("user_id");
        	$sku_id = get_post_value("sku_id");
        	$product_id = get_post_value("product_id");	
        	$qtynum=get_post_value("qtynum");
        	$img_path=get_post_value("img_path");
        	$product_title=get_post_value("product_title_cn");
        	
        	
        	$loves=get_post_value("loves");
        	$collect=get_post_value("collect");
        	
        	$product = new Products();
        	
        	
        	if($loves)//增加喜欢人数;
        		$product->addLoves($product_id);
        	if($collect)//加入收藏夹
        		$product->addFavorites($user_id,$product_id,$sku_id,$img_path);
        	
        	
        	
        	$sava= $product->addToCart($user_id,$sku_id,$product_id,$qtynum,$img_path,$product_title);
        	if($sava){
        		$this->assign('message', $sava);
        		$this->setReturnType('message');
        	}
//         	else{       		
//         		$this->assign('message', $sava);
//         		$this->setReturnType('message');
//         	}
        }
    
        
     

    function add_cart() {
    	
        $shop_site = get_post_value('shop_site');
        $image_url = get_post_value('image_url');
        $product = get_post_value('product');
        $product_url = get_post_value('product_url');
        $product_id = get_post_value('product_id');
        $shop_url = get_post_value('shop_url');
        $shop_username = get_post_value('shop_username');
        $qty = get_post_value('qty');
        $sku = get_post_value('sku');
        $sku_name = get_post_value('sku_name');
        $price = get_post_value('price_cn');
        $shop_id = get_post_value('shop_id');


        if (!Login::verifyLogin()) {

            // var_dump($cart_array);
            if (empty($_COOKIE['shop_cart_info'])) {
                //   $cart_info[0]['shop_site'] = $shop_site;
                $cart_info[0]['image_url'] = $image_url;
                //   $cart_info[0]['product'] = $product;
                //   $cart_info[0]['product_url'] = $product_url;
                $cart_info[0]['product_id'] = $product_id;
                // $cart_info[0]['shop_url'] = $shop_url;
                //$cart_info[0]['shop_username'] = $shop_username;
                $cart_info[0]['qty'] = $qty;
                $cart_info[0]['sku'] = $sku;
                $cart_info[0]['sku_name'] = $sku_name;
                // $cart_info[0]['price'] = $price;
                //$cart_info[0]['shop_id'] = $shop_id;
                setcookie("shop_cart_info", serialize($cart_info), time() + 3600 * 24, '/');
                $this->assign('message', 2);
                $this->setReturnType('message');
            } else {
                $cart_array = unserialize(stripslashes($_COOKIE['shop_cart_info']));
                $ar_keys = array_keys($cart_array);
                rsort($ar_keys);
                $max_array_keyid = $ar_keys[0] + 1;

                //  $cur_cart_array[$max_array_keyid]['shop_site'] = $shop_site;
                $cart_array[$max_array_keyid]['image_url'] = $image_url;
                // $cur_cart_array[$max_array_keyid]['product'] = $product;
                // $cur_cart_array[$max_array_keyid]['product_url'] = $product_url;
                $cart_array[$max_array_keyid]['product_id'] = $product_id;
                // $cur_cart_array[$max_array_keyid]['shop_url'] = $shop_url;
                // $cur_cart_array[$max_array_keyid]['shop_username'] = $shop_username;
                $cart_array[$max_array_keyid]['qty'] = $qty;
                $cart_array[$max_array_keyid]['sku'] = $sku;
                $cart_array[$max_array_keyid]['sku_name'] = $sku_name;
                //  $cur_cart_array[$max_array_keyid]['price'] = $price;
                // $cur_cart_array[$max_array_keyid]['shop_id'] = $shop_id;

                setcookie("shop_cart_info", serialize($cart_array), time() + 3600 * 24, '/');
                $this->assign('message', 2);
                $this->setReturnType('message');
            }
        } else {
            if (isset($_SESSION['user_id'])) {
                $user_id = $_SESSION['user_id'];
            } else {
                $this->assign('message', 0);
                $this->setReturnType('message');
                exit();
            }


            // 保存数据
            $m = new Cart();
            $field = array(
                'created' => date('Y-m-d H:i:s', time()),
                'user_id' => $user_id,
                'shop_username' => $shop_username,
                'shop_url' => $shop_url,
                'product_id' => $product_id,
                'product_url' => $product_url,
                'shop_url' => $shop_url,
                'shop_username' => $shop_username,
                'qty' => $qty,
                'sku' => $sku,
                'sku_name' => $sku_name,
                'status' => '10000',
                'product' => $product,
                'image_url' => $image_url,
                'price' => $price,
                'shop_id' => $shop_id,
                'shop_site' => $shop_site,
            );
            $m->clear();
            $m->setField($field);
            $m->setTable('vcb_cart');
            $data = $m->insert();
            if (!empty($data)) {
                $data = 1;
            } else {
                $data = 0;
            }
            $this->assign('message', 1);
            $this->setReturnType('message');
        }
    }

    function logout() {
        Login::logout();
    }
}


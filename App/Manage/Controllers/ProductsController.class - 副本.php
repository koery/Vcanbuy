<?php

class ProductsController extends Controller {

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
     * 返回产品信息列表
     * @access public
     */
    function productslist() {
    	
    	
    	
    	$productslist = new Products();
    	$productslistdata = $productslist->getproductslistdata();
    	if($productslistdata){
    		
    		$this->assign('productslist', $productslistdata);
    	}
    	
       
    }

    

    /**
     * 增加新产品
     * @access public
     */
    function addproduct() {
    	 
    	 
    	
    	 
    }
    
    /**
     * 获得对应产品ID的详细信息
     * @access public
     */
    function productinfo() {
    
   
    
    $product = new Products();
    $productId = get_post_value('id');
   // echo  $productId;

    
     $proImgDetail = $product->getProImgDetail($productId);//获得介绍产品图片
     if($proImgDetail){
     	//print_r($proImgDetail);
     	$this->assign('proImgDetail', $proImgDetail);
     }
     
     $proImgSelect = $product->getProImgSelect($productId);//获得介绍产品图片
     if($proImgSelect){
     	
     	//print_r($proImgSelect);
     	$m = new Products();
     	foreach ($proImgSelect as $key=>$data){
     		
     		
     		
     		$field = array(
     		
     				'pid' ,
     				'name' ,
     				'property'
     		);
     		 
     		$m->clear();
     		$m->setTable('vcb_product_property');     //设置表名
     		$m->setField($field);
     		$m->setWhere('property', '=', $data['property']);
     		$m->setWhere('status', '!=', '60000');
     		$data1=$m->select();
     		
     		$proImgSelect[$key]['name']=$data1[0]['name'];
     	}
     		$this->assign('proImgSelect', $proImgSelect);
     }
     	
    
     
//     $proBaseInfo = $product->getProBaseInfo($productId);//获得产品基本信息
//     if($proBaseInfo)
//     	$this->assign('proBaseInfo', $proBaseInfo);

     
//     $proFreight = $product->getProFreight($productId);//获得产品运费
//     if($proFreight)
//     	$this->assign('proFreight', $proFreight);
    
    
//     $proNavigation = $product->getProNavigation($productId);//获得导航信息
//     if($proNavigation)
//     	$this->assign('proNavigation', $proNavigation );
    
//     $proNavigationUrl = $product->getProNavigationUrl($productId);//获得导航信息
//     if($proNavigationUrl)
//     	$this->assign('proNavigationUrl', $proNavigationUrl );
    
     $proInfoSkuRemark = $product->getProInfoSkuRemark($productId);//获得产品属性备注
    if($proInfoSkuRemark)
    	$this->assign('proInfoSkuRemark', $proInfoSkuRemark );
//     //*******************************
      $proInfoSku = $product->getProInfoSku($productId);//获得产品sku
            if($proInfoSku){
            	//print_r($proInfoSku);
            	

            	$proInfoSkunew=array();
            	foreach($proInfoSku as $key=>$data){
            	
            		$sku_name_new=array();
            		$sku_name_new=explode("|", $data['sku_name_cn']);
            	
            		$sku_name2_new=array();
            		foreach ($sku_name_new as $key2=>$data1){
            	
            			$sku_name2_new=explode(":", $data1);
            			$sku_name_new[$key2] = $sku_name2_new[1];
            		}
            	
            		$sku_code_new=array();
            		$sku_code_new=explode("|", $data['sku_code']);
            	
            		$sku_code2_new=array();
            		foreach ($sku_code_new as $key3=>$data3){
            	
            			$sku_code2_new=explode(":", $data3);
            			$sku_code_new[$key3] = $sku_code2_new[1];
            		}
            	
            	
            	
            		$data['sku_name_cn'] = $sku_name_new;
            		$data['sku_code'] = $sku_code_new;
            		$proInfoSkunew[$key]= $data;
            	
            	}
            	 
            	$this->assign('proInfoSku', $proInfoSkunew);
            	 
            	 
            	
            	
            	
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
//             	 print_r($sku_id);
//             	 print_r($sku_name3);
//             	print_r($sku_code3);
//             	//print_r($sku_code4);
//             	 //$helloJson_sku_code = json_encode($sku_code4);
//             	 print_r($sku_name6);
//             	 print_r($sku_code6);
            	
//             	 $this->assign('sku_id', $sku_id);
//             	 $this->assign('qty', $qty);
             	 $this->assign('name', $sku_name3);
             	 $this->assign('code', $sku_code3);
             	 $this->assign('sku_code4', $sku_code4);
            	 $this->assign('sku_name', $sku_name6);
            	 $this->assign('sku_code', $sku_code6);
            	 
            	 
            }  
            
            
    }
    
    /**
     * 新增详细说明图片
     * 
     */
    function adddetail(){
    	
    	
    	$productID = get_post_value('id');
    	
    	$this->assign('productID', $productID);
    	
    	$upload = new Upload();
    	$this->assign('upload', $upload->show());
    	
    }
   
    
    /**
     * 新增产品属性图片
     *
     */
    function addselect(){
    	 
    	 
    	$productID = get_post_value('id');
    	$this->assign('productID', $productID);
    	 $product = new Products();
        $proInfoSku = $product->getProInfoSku($productID);//获得产品sku
            if($proInfoSku){
            	//print_r($proInfoSku);
            	

            	$proInfoSkunew=array();
            	foreach($proInfoSku as $key=>$data){
            	
            		$sku_name_new=array();
            		$sku_name_new=explode("|", $data['sku_name_cn']);
            	
            		$sku_name2_new=array();
            		foreach ($sku_name_new as $key2=>$data1){
            	
            			$sku_name2_new=explode(":", $data1);
            			$sku_name_new[$key2] = $sku_name2_new[1];
            		}
            	
            		$sku_code_new=array();
            		$sku_code_new=explode("|", $data['sku_code']);
            	
            		$sku_code2_new=array();
            		foreach ($sku_code_new as $key3=>$data3){
            	
            			$sku_code2_new=explode(":", $data3);
            			$sku_code_new[$key3] = $sku_code2_new[1];
            		}
            	
            	
            	
            		$data['sku_name_cn'] = $sku_name_new;
            		$data['sku_code'] = $sku_code_new;
            		$proInfoSkunew[$key]= $data;
            	
            	}
            	 
            	$this->assign('proInfoSku', $proInfoSkunew);
            	 
            	 
            	
            	
            	
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
//             	 print_r($sku_id);
//             	 print_r($sku_name3);
//             	print_r($sku_code3);
//             	//print_r($sku_code4);
//             	 //$helloJson_sku_code = json_encode($sku_code4);
//             	 print_r($sku_name6);
//             	 print_r($sku_code6);
            	
//             	 $this->assign('sku_id', $sku_id);
//             	 $this->assign('qty', $qty);
             	 $this->assign('name', $sku_name3);
             	 $this->assign('code', $sku_code3);
             	 $this->assign('sku_code4', $sku_code4);
            	 $this->assign('sku_name', $sku_name6);
            	 $this->assign('sku_code', $sku_code6);
            	 
            	 
            }  
    	 
    	$upload = new Upload();
    	$this->assign('upload', $upload->show());
    	 
    }
    
    function add_save_detail_show(){
    
    	
    	$filename = get_post_value('filename');
    	$productID = get_post_value('productID');
    	
         echo $productID;
    	$num = count($filename);
    	print_r($filename);
    	$m = new Products();
    	if ($filename!='' && count($filename)>0){
    		
    		for($i=0;$i<$num/2;$i++) {
    			$field = array(
    					
    					'product_id' => $productID,
    					'imgShowPath' => '/Upload/'.$filename[$i],
    					'imgDetailPath' => '/Upload/'.$filename[$i+$num/2],
    					
    					
    			);
    
    			$m->clear();
    			$m->setTable ( 'vcb_product_img_detail' );
    			$m->setField ( $field );
    			$product_id = $m->insert ();
    			
    		}
    	}
    
    	if (!$product_id){
    		echo '<br>保存失败<br>';
    	}else{
    		echo '<br>保存成功，<a href="adddetail?id='.$productID.'">继续添加</a>,<a href="productinfo?id='.$productID.'">返回</a><br>';
    	}
    }
    
    function add_save_select_show(){
    
    	 
    	$filename = get_post_value('filename');
    	$productID = get_post_value('productID');
    	$sku_code=get_post_value('sku_code');
    	
    	echo $productID;
    	echo $sku_code;
    	$num = count($filename);
    	echo $num;
    	print_r($filename);
    	$m = new Products();
    	$imgshowpath = $filename[0];
    	if($num==2)
    		$imgselectpath= $filename[1];
    	else $imgselectpath='';
    			$field = array(
    						
    					'product_id' => $productID,
    					'imgshowpath' => $imgshowpath,
    					'imgselectpath' => $imgselectpath,
    					'property'=>$sku_code	
    						
    			);
    
    			$m->clear();
    			$m->setTable ( 'vcb_product_img_select' );
    			$m->setField ( $field );
    			$product_id = $m->insert ();    	
    
    	if (!$product_id){
    		echo '<br>保存失败<br>';
    	}else{
    		echo '<br>保存成功，<a href="addselect?id='.$productID.'">继续添加</a>,<a href="productinfo?id='.$productID.'">返回</a><br>';
    	}
    }
    /**
     * 删除详情显示对应图片
     * @access public
     */
    function deletedetail() {
  
    	
    	$productID = get_post_value('product_id');
		$id = get_post_value('id');
		$field = array (
				'status' => '60000'
		);
		$m = new Products();
		$m->clear();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_product_img_detail' );					//设置表名
		$m->setWhere('id','=',$id);				//设置Where条件
		$product_id=$m->update();
	
		if($product_id){
			
			echo '<br>操作成功,<a href="productinfo?id='.$productID.'" >返回</a><br>';
		}
		
	}
	
	/**
	 * 删除选择显示对应图片
	 * @access public
	 */
	function deleteselect() {
	
		 
		$productID = get_post_value('product_id');
		$id = get_post_value('id');
		$field = array (
				'status' => '60000'
		);
		$m = new Products();
		$m->clear();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_product_img_select' );					//设置表名
		$m->setWhere('id','=',$id);				//设置Where条件
		$product_id=$m->update();
	
		if($product_id){
				
			echo '<br>操作成功,<a href="productinfo?id='.$productID.'" >返回</a><br>';
		}
	
	}
    /**
     * 获取产品sku信息
     * productsku
     * 
     */
    function productsku(){
    	
    	$productsku = new Products();
    	$productskudata=$productsku->getproductskudata();
    	if($productskudata){
    		
    		$this->assign('productsku', $productskudata);
    	}
    	
    	
    	
    }

    /**
     * 获取产品sku别名信息
     * productsku
     *
     */
    function updateproinfoskuremark(){
    	 

    	$id = get_post_value('id');
    	$product_id = get_post_value('product_id');
    	$productsku = new Products();
	    	
	     $proInfoSkuRemark = $productsku->getProInfoSkuRemarkitem($id);//获得产品属性备注
	    if($proInfoSkuRemark)
	    	$this->assign('proInfoSkuRemark', $proInfoSkuRemark );
	    	 
	    	 
    	 
    }
    
    /**
     * 获取产品sku信息
     * 
     *
     */
    function updateproductskuitem(){
    
    
    	$id = get_post_value('id');
    	$product_id = get_post_value('product_id');
    	echo $id;
    	echo $product_id;
    	$product=new Products();
    	$proInfoSku = $product->getProInfoSku($product_id);//获得产品sku
    	
    	if($proInfoSku){
    		print_r($proInfoSku);
    		 
    	
    		$proInfoSkunew=array();
    		foreach($proInfoSku as $key=>$data){
    			 
    			$sku_name_new=array();
    			$sku_name_new=explode("|", $data['sku_name_cn']);
    			 
    			$sku_name2_new=array();
    			foreach ($sku_name_new as $key2=>$data1){
    				 
    				$sku_name2_new=explode(":", $data1);
    				$sku_name_new[$key2] = $sku_name2_new[1];
    			}
    			 
    			$sku_code_new=array();
    			$sku_code_new=explode("|", $data['sku_code']);
    			 
    			$sku_code2_new=array();
    			foreach ($sku_code_new as $key3=>$data3){
    				 
    				$sku_code2_new=explode(":", $data3);
    				$sku_code_new[$key3] = $sku_code2_new[1];
    			}
    			 
    			 
    			 
    			$data['sku_name_cn'] = $sku_name_new;
    			$data['sku_code'] = $sku_code_new;
    			$proInfoSkunew[$key]= $data;
    			 
    		}
    		print_r($proInfoSkunew);
    		$this->assign('proInfoSku', $proInfoSkunew);
    	
    	
    		 
    		 
    		 
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
    			//             	 print_r($sku_id);
    			//             	 print_r($sku_name3);
    			//             	print_r($sku_code3);
    				//             	//print_r($sku_code4);
    				//             	 //$helloJson_sku_code = json_encode($sku_code4);
    				//             	 print_r($sku_name6);
    				//             	 print_r($sku_code6);
    				 
    				//             	 $this->assign('sku_id', $sku_id);
    				//             	 $this->assign('qty', $qty);
    				$this->assign('name', $sku_name3);
    				$this->assign('code', $sku_code3);
    				$this->assign('sku_code4', $sku_code4);
    				$this->assign('sku_name', $sku_name6);
    				$this->assign('sku_code', $sku_code6);
    	
    	}
    
    }
    
    
    /**
     * 新增产品属性
     * addproductsku
     *
     */
    function addproductsku(){
    	 
    	$addproductsku = new Products();
    	$addproductskudata=$addproductsku->getaddproductskudata();
    	if($addproductskudata){
    
    		$this->assign('addproductskudata', $addproductskudata);
    	}
    	 
    	 
    	 
    }
    
    
    function addsavaproductsku() {
    	
    	$pid = get_post_value('pid');
    	$name = get_post_value('name');
    	$property = get_post_value('property');
    	
    
    	$field = array(
    			
    			'pid' => $pid,
    			'name' => $name,
    			'property' => $property,
    	);
    	$m = new Products();
    	$m->clear();
    	$m->setTable('vcb_product_property');     //设置表名
    	$m->setField($field);    //设置更新字段及值，(键值数组)
    	$data = $m->insert();     //插入数据
    
    	if (!$data) {          //插入数据是否成功。
    		echo '<br>保存失败<br>';
    	} else {
    		echo '<br>保存成功,<a href="productsku">返回</a><br>';
    	}
    }
    
   /**
    * 保存更新的别名记录
    * 
    */
    function updatedateproinfoskuremarksave() {
    	 
    	$id = get_post_value('id');
    	$product_id = get_post_value('product_id');
    	$sku_code = get_post_value('sku_code');
    	$sku_name = get_post_value('sku_name');
    	$remark_cn = get_post_value('remark_cn');
    	 
    
    	$field = array(
    			 
    			'id' => $id,
    			'product_id' => $product_id,
    			'sku_code' => $sku_code,
    			'sku_name'=>$sku_name,
    			'remark_cn'=>$remark_cn
    	);
    	$m = new Products();
    	$m->clear();
    	$m->setTable('vcb_product_remark');     //设置表名
    	$m->setField($field);    //设置更新字段及值，(键值数组)
    	$m->setWhere('id', '=', $id);
    	$data = $m->update();     //插入数据
    
    	if (!$data) {          //保存数据是否成功。
    		echo '<br>保存失败<br>';
    	} else {
    		echo '<br>操作成功,<a href="productinfo?id='.$product_id.'" >返回</a><br>';
    	}
    }
    
    function deleteproductsku() {
    	 
    	$id = get_post_value('id');
       
    	$field = array(
    			
    			'status' => '60000'
    	);
    	$m = new Products();
    	$m->clear();
    	$m->setTable('vcb_product_property');     //设置表名
    	$m->setField($field);    //设置更新字段及值，(键值数组)
    	$m->setWhere('id', '=', $id);
    	$data = $m->update();     //插入数据
    
    	if (!$data) {          //插入数据是否成功。
    		echo '<br>操作失败<br>';
    	} else {
    		echo '<br>操作成功，<a href="productsku">返回</a><br>';
    	}
    }
    
   
    

    /**
     * 新增一条sku
     * addproductskuitem
     *
     */
    function addproductskuitem(){
    	$product_id = get_post_value('id');
       	
    	$product=new Products();
    	$proInfoSku = $product->getProInfoSku($product_id);//获得产品sku
    	 
    	   if($proInfoSku){
    		   print_r($proInfoSku);
    			$sku_code=explode("|", $proInfoSku[0]['sku_code']);
    			$sku_codenew=array();
    			foreach ($sku_code as $key=>$data){
    				
    				$sku_code1=explode(":",$data);  
    				$sku_codenew[$key]=$sku_code1[0];
    			}
    			
    			
    			$sku_name=explode("|", $proInfoSku[0]['sku_name_cn']);
    			$sku_namenew=array();
    			foreach ($sku_name as $key=>$data){
    			
    				$sku_name1=explode(":",$data);
    				$sku_namenew[$key]=$sku_name1[0];
    			}
    			
    			$addproductskuitemdata=$product->getproductskudata($sku_codenew);

    			if($addproductskuitemdata){
    			
    				$this->assign('product_id', $product_id);
    				$this->assign('addproductskuitemdata', $addproductskuitemdata);
    			}
    			$this->assign('sku_codenew', $sku_codenew);
    			$this->assign('sku_namenew', $sku_namenew);
    			
    			
    		}
    	
    	
    	 
    	}
    	
    	
    	/**
    	 * 新增一条sku
    	 * addproductskuitemnew
    	 *
    	 */
    	function addproductskuitemnew(){
    		$product_id = get_post_value('id');
    	    $sku_codenew=  get_post_value('name');
    		echo $product_id;
    		 print_r($sku_codenew);
    		 $product=new Products();
    		 $addproductskuitemdata=$product->getproductskudata($sku_codenew);
    		 
    		 if($addproductskuitemdata){
    		 	 
    		 	$this->assign('product_id', $product_id);
    		 	$this->assign('addproductskuitemdata', $addproductskuitemdata);
    		 }
    		 
    		 $namedata=$product->getproductskunamedata($sku_codenew);
    		  
    		 if($namedata){
    		 	
    		 	$this->assign('sku_namenew', $namedata);
    		 }
    		
    		   $this->assign('sku_codenew', $sku_codenew);
    		   
    		   
    		   
    	} 
  
    
    function addsavaproductskuitem() {
    	 
    	$price = get_post_value('price');
    	$name = get_post_value('name');
    	$qty = get_post_value('qty');
    	print_r($name);
    	$product_id= get_post_value('product_id');
    	$m = new Products();
    	
    	$namestr = null;
    	$codestr = null;
    	foreach ($name as $id){
    		
    		echo $id;
    		 $field = array(
    		
    		    	'pid' ,
    		    	'name' ,
    		    	'property'
    		  );
    		 
    		  $m->clear();
    		  $m->setTable('vcb_product_property');     //设置表名
    		  $m->setField($field);
    		  $m->setWhere('id', '=', $id);
    		  $m->setWhere('status', '!=', '60000');
    		  $data=$m->select();
    		  
    		 print_r($data);
    		 
    		  $field = array(
    		  
    		  		'pid' ,
    		  		'name' ,
    		  		'property'
    		  );
    		   
    		  $m->clear();
    		  $m->setTable('vcb_product_property');     //设置表名
    		  $m->setField($field);
    		  $m->setWhere('id', '=', $data[0]['pid']);
    		  $m->setWhere('status', '!=', '60000');
    		  $data1=$m->select();
    		  print_r($data1);
    		  
    		   $namestr.=$data1[0]['name'].":".$data[0]['name']."|";
    		   $codestr.=$data1[0]['property'].":".$data[0]['property']."|";
    	}
        $namestr = substr($namestr, 0, -1);
        $codestr = substr($codestr, 0, -1);
       
        $field = array(
        
        		'product_id'=>$product_id ,
        		'sku_code'=>$codestr,
        		'sku_name_cn'=>$namestr,
        		'sales_price'=>$price,
        		'qty'=>$qty
        );
        	
        $m->clear();
        $m->setTable('vcb_product_sku');     //设置表名
        $m->setField($field);    
        $addsavaproductskuitem=$m->insert();
        
        if (!$addsavaproductskuitem) {          //插入数据是否成功。
    		echo '<br>操作失败<br>';
    	} else {
    		echo '<br>操作成功,<a href="productinfo?id='.$product_id.'" >返回</a><br>';
    	}
    	

    }
    
    
    /**
     * 
     * 新增别名
     */
    function addproinfoskuremark(){
    	
    	$productId = get_post_value('product_id');
    	$product = new Products;
    	
    	$proInfoSku = $product->getProInfoSku($productId);//获得产品sku
    	if($proInfoSku){
    		//print_r($proInfoSku);
    		 
    	
    		$proInfoSkunew=array();
    		foreach($proInfoSku as $key=>$data){
    			 
    			$sku_name_new=array();
    			$sku_name_new=explode("|", $data['sku_name_cn']);
    			 
    			$sku_name2_new=array();
    			foreach ($sku_name_new as $key2=>$data1){
    				 
    				$sku_name2_new=explode(":", $data1);
    				$sku_name_new[$key2] = $sku_name2_new[1];
    			}
    			 
    			$sku_code_new=array();
    			$sku_code_new=explode("|", $data['sku_code']);
    			 
    			$sku_code2_new=array();
    			foreach ($sku_code_new as $key3=>$data3){
    				 
    				$sku_code2_new=explode(":", $data3);
    				$sku_code_new[$key3] = $sku_code2_new[1];
    			}
    			 
    			 
    			 
    			$data['sku_name_cn'] = $sku_name_new;
    			$data['sku_code'] = $sku_code_new;
    			$proInfoSkunew[$key]= $data;
    			 
    		}
    	
    		$this->assign('proInfoSku', $proInfoSkunew);
    	
    	
    		 
    		 
    		 
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
    			//             	 print_r($sku_id);
    			//             	 print_r($sku_name3);
    			//             	print_r($sku_code3);
    				//             	//print_r($sku_code4);
    				//             	 //$helloJson_sku_code = json_encode($sku_code4);
    				//             	 print_r($sku_name6);
    				//             	 print_r($sku_code6);
    				 
    				//             	 $this->assign('sku_id', $sku_id);
    				//             	 $this->assign('qty', $qty);
    				$this->assign('name', $sku_name3);
    				$this->assign('code', $sku_code3);
    				$this->assign('sku_code4', $sku_code4);
    				$this->assign('sku_name', $sku_name6);
    				$this->assign('sku_code', $sku_code6);
    	
    	}
    	
    }
    
    /**
     * 保存新增的别名
     */
    
    
    function addproinfoskuremarksave() {
    
    	$product_id = get_post_value('product_id');
    	$sku_code = get_post_value('sku_code');
    	$remark_cn = get_post_value('remark_cn');
    	echo $product_id;
    	echo $sku_code;
    	echo $remark_cn;
    	$m = new Products();

    		$field = array(
    				'name'
    		);   		 
    		$m->clear();
    		$m->setTable('vcb_product_property');     //设置表名
    		$m->setField($field);
    		$m->setWhere('property', '=', $sku_code);
    		$m->setWhere('status', '!=', '60000');
    		$data=$m->select();
    
    		print_r($data);
    		 
    		
    	$field = array(
    
    			'product_id'=>$product_id ,
    			'sku_code'=>$sku_code,
    			'remark_cn'=>$remark_cn,
    			'sku_name'=>$data[0]['name']
    	);
    	 
    	$m->clear();
    	$m->setTable('vcb_product_remark');     //设置表名
    	$m->setField($field);
    	$addproinfoskuremarksave=$m->insert();
    
    	if (!$addproinfoskuremarksave) {          //插入数据是否成功。
    		echo '<br>操作失败<br>';
    	} else {
    		echo '<br>操作成功,<a href="productinfo?id='.$product_id.'" >返回</a><br>';
    	}
    	 
    
    }
    
    
    
    /**
     * 保存新增的sku
     */
    
    
    function savaupdateproductskuitem() {
    	
    	$product_id=get_post_value('product_id');
        $id=get_post_value('id');
    	$name = get_post_value('name');
    	$price = get_post_value('price');
    	$qty = get_post_value('qty');
    	print_r($name);
    	echo $price;
    	echo $qty;
    	
    	
    $m = new Products();
    	
    	$namestr = null;
    	$codestr = null;
    	foreach ($name as $property){
    		
    		echo $id;
    		 $field = array(
    		
    		    	'pid' ,
    		    	'name' ,
    		 		'property'
    		  );
    		 
    		  $m->clear();
    		  $m->setTable('vcb_product_property');     //设置表名
    		  $m->setField($field);
    		  $m->setWhere('property', '=', $property);
    		  $m->setWhere('status', '!=', '60000');
    		  $data=$m->select();
    		  
    		 print_r($data);
    		 
    		  $field = array(
    		  
    		  		'pid' ,
    		  		'name' ,
    		  		'property'
    		  );
    		   
    		  $m->clear();
    		  $m->setTable('vcb_product_property');     //设置表名
    		  $m->setField($field);
    		  $m->setWhere('id', '=', $data[0]['pid']);
    		  $m->setWhere('status', '!=', '60000');
    		  $data1=$m->select();
    		  print_r($data1);
    		  
    		   $namestr.=$data1[0]['name'].":".$data[0]['name']."|";
    		   $codestr.=$data1[0]['property'].":".$data[0]['property']."|";
    	}
        $namestr = substr($namestr, 0, -1);
        $codestr = substr($codestr, 0, -1);
       echo $namestr;
       echo $codestr;
        $field = array(
        
        		'product_id'=>$product_id ,
        		'sku_code'=>$codestr,
        		'sku_name_cn'=>$namestr,
        		'sales_price'=>$price,
        		'qty'=>$qty
        );
        	
        $m->clear();
        $m->setTable('vcb_product_sku');     //设置表名
        $m->setField($field);    
        $addsavaproductskuitem=$m->insert();
        
        if (!$addsavaproductskuitem) {          //插入数据是否成功。
    		echo '<br>操作失败<br>';
    	} else {
    		echo '<br>操作成功,<a href="productinfo?id='.$product_id.'" >返回</a><br>';
    	}
    	
    }
    
    
    
    /**
     * 删除选定商品的sku
     */
    function deleteproductskuitem(){
    	
    	$id = get_post_value('id');
    	$product_id = get_post_value('product_id');
    	 
    	$field = array(
    			 
    			'status' => '60000'
    	);
    	$m = new Products();
    	$m->clear();
    	$m->setTable('vcb_product_sku');     //设置表名
    	$m->setField($field);    //设置更新字段及值，(键值数组)
    	$m->setWhere('id', '=', $id);
    	$data = $m->update();     //更新数据
    	
    	if (!$data) {          //更新数据是否成功。
    		echo '<br>操作失败<br>';
    	} else {
    		echo '<br>操作成功，<a href="productinfo?id='.$product_id.'">返回</a><br>';
    	}
    	
    	
    }
    
    
    
    /**
     * 删除选定商品的sku别名
     */
    function deleteproinfoskuremark(){
    	 
    	$id = get_post_value('id');
    	$product_id = get_post_value('product_id');
    
    	$field = array(
    
    			'status' => '60000'
    	);
    	$m = new Products();
    	$m->clear();
    	$m->setTable('vcb_product_remark');     //设置表名
    	$m->setField($field);    //设置更新字段及值，(键值数组)
    	$m->setWhere('id', '=', $id);
    	$data = $m->update();     //更新数据
    	 
    	if (!$data) {          //更新数据是否成功。
    		echo '<br>操作失败<br>';
    	} else {
    		echo '<br>操作成功，<a href="productinfo?id='.$product_id.'">返回</a><br>';
    	}
    	 
    	 
    }
    
    /**
     * 获得产品属性
     */
    function selectproductsku(){
    	
    	
    	$product = new Products();
    	$productskudata=$product->getproductsku();
    	//print_r($productskudata);
    	if($productskudata){
    		
    		$this->assign('productskudata', $productskudata);
    	}
    }
    
    
    function add2() {
        $url = strtolower(get_post_value('url'));
        if (substr($url, 0, 7) != 'http://') {
            $url = 'http://' . $url;
        }

        $product_url = null;
        if (substr($url, 0, 22) == 'http://item.taobao.com') {
            $taobao = new Taobao($url);
            $product_url = $taobao->getProductUrl();
            $data = $taobao->getData();

            $this->assign('product_url', $product_url);
            $this->assign('data', $data);
        } else {

        }

        $upload = new Upload();
        $this->assign('upload', $upload->show());
    }

    function upload() {
        $upload = new Upload();
        $data = $upload->save('Products');
        //$data = fn_upload('banner');
        $this->assign('message', $data);
        $this->setReturnType('message');
    }

    /**
     *
     *
     * @access public
     */
    
    
    function add_save() {
        $product_url = get_post_value('product_url');
        $title_cn = get_post_value('title_cn');
        $title_th = get_post_value('title_th');
        $category_1 = get_post_value('category_1');
        $category_2 = get_post_value('category_2');
        $category_3 = get_post_value('category_3');
        $floor_1 = get_post_value('floor_1');
        $floor_2 = get_post_value('floor_2');
        $floor_3 = get_post_value('floor_3');
        $purchase_price = trim(get_post_value('purchase_price'));
        $sales_price = trim(get_post_value('sales_price'));
        $start_time = get_post_value('start_time');
        $end_time = get_post_value('end_time');
        $image_url = get_post_value('image_url');
        $product_url = get_post_value('product_url');
        $shop_id = get_post_value('shop_id');
        $shop = get_post_value('shop');
        $shop_url = get_post_value('shop_url');
        $preferential_price = get_post_value('preferential_price');

        $field = array(
            'product_url' => trim($product_url),
            'title_cn' => trim($title_cn),
            'title_th' => trim($title_th),
            'category_3_id' => trim($category_3),
            'floor_3_id' => trim($floor_3),
            'purchase_price' => intval($purchase_price),
            'sales_price' => intval($sales_price),
            'preferential_price' => intval($preferential_price),
            'image_url' => trim($image_url),
            'product_url' => trim($product_url),
            //'shop_id'=>trim($shop_id),
            'shop' => trim($shop),
            //'shop_url'=>trim($shop_url),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'hits' => '0',
            'buys' => '0',
            'favorites' => '0',
            'created' => date('Y-m-d H:i:s', time()),
            'created_name' => '',
            'upload_name' => '',
            'status' => '10000',
            'category_1_id' => $category_1,
        );
        $m = new Products();
        $m->clear();
        $m->setTable('vcb_product');     //设置表名
        $m->setField($field);    //设置更新字段及值，(键值数组)
        $data = $m->insert();     //插入数据

        if (!$data) {          //插入数据是否成功。
            echo '<br>保存失败<br>';
        } else {
            echo '<br>保存成功，<a href="add1">继续添加</a>,<a href="index">返回</a><br>';
        }
    }

    /**
     * 删除国家
     * @access public
     */
    function delete() {
        $id = get_post_value('id');
        $field = array(
            'status' => '50000'
        );
        $m = new Products();
        $m->clear();
        $m->setField($field);        ///设置更新字段及值，(键值数组)
        $m->setTable('vcb_product');     //设置表名
        $m->setWhere('product_id', '=', $id);    //设置Where条件
        $m->update();

        //返回
        echo '<br>操作成功,<a href="index" >返回</a><br>';
    }

    /**
     * 返回更新国家信息
     * @access public
     */
    function update() {
        $id = get_post_value('id');
        $field = array(
            'product_url',
            'title_cn',
            'title_th',
            'category_3_id',
            'floor_3_id',
            'purchase_price',
            'image_url',
            'product_url',
            'shop_id',
            'shop_url',
            'product_id',
            'status',
            'shop',
            'sales_price',
            'purchase_price',
            'preferential_price',
        );
        $m = new Products();
        $m->clear();
        $m->setTable('vcb_product');     //设置表名
        $m->setWhere('product_id', '=', $id);
        $m->setField($field);
        $data = $m->select();
        var_dump($data);
        $this->assign('data', $data);
        $upload = new Upload();
        $this->assign('upload', $upload->show());
    }

    /**
     * 更新国家信息
     * @access public
     */
    function update_save() {
        $id = get_post_value('product_id');
        $product_url = get_post_value('product_url');
        $title_cn = get_post_value('title_cn');
        $title_th = get_post_value('title_th');
        $category_1 = get_post_value('category_1');
        $category_2 = get_post_value('category_2');
        $category_3 = get_post_value('category_3');
        $floor_1 = get_post_value('floor_1');
        $floor_2 = get_post_value('floor_2');
        $floor_3 = get_post_value('floor_3');
        $purchase_price = trim(get_post_value('purchase_price'));
        $sales_price = trim(get_post_value('sales_price'));
        $start_time = get_post_value('start_time');
        $end_time = get_post_value('end_time');
        $image_url = trim(get_post_value('image_url')) == '' ? get_post_value('image_url_old') : get_post_value('image_url');
        $product_url = get_post_value('product_url');
        $shop_id = get_post_value('shop_id');
        $shop = get_post_value('shop');
        $shop_url = get_post_value('shop_url');
        $preferential_price = get_post_value('preferential_price');
        $field = array(
            //'product_url' =>trim($product_url),
            'title_cn' => trim($title_cn),
            'title_th' => trim($title_th),
            'category_3_id' => trim($category_3),
            'floor_3_id' => trim($floor_3),
            'purchase_price' => intval($purchase_price),
            'sales_price' => intval($sales_price),
            'preferential_price' => intval($preferential_price),
            'image_url' => trim($image_url),
            'product_url' => trim($product_url),
            //'shop_id'=>trim($shop_id),
            'shop' => trim($shop),
            //'shop_url'=>trim($shop_url),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'hits' => '0',
            'buys' => '0',
            'favorites' => '0',
            'created' => time(),
            'created_name' => '',
            'upload_name' => '',
            'status' => '10000',
            'category_1_id' => $category_1,
        );
        $m = new Products();
        $m->clear();
        $m->setTable('vcb_product');     //设置表名
        $m->setField($field);        ///设置更新字段及值，(键值数组)
        $m->setWhere('product_id', '=', $id);      //设置Where条件
        $m->update();


        //返回
        echo '<br>操作成功,<a href="index" >返回</a><br>';
    }

    //商品种类页面
    function kind() {
        $id = get_post_value('id');
        $ve = $this->verify($id);
        if (!empty($ve)) {
            $field = array(
                'id',
                'product_id',
                'product_color',
                'created',
                'status',
                'image_url',
            );
            $m = new Products();
            $m->clear();
            $m->setField($field);
            $m->setTable(' vcb_product_kind ');
            $m->setWhere('product_id', '=', $id);
            $data = $m->select();
            $this->assign('data', $data);
            $this->assign('pro_id', $id);
        } else {
            header('Location:error.php');
        }
    }

    //添加商品页面

    function add_kind() {
        $id = get_post_value('id');
        $ve = $this->verify($id);
        if (!empty($ve)) {
            $field = array(
                'id',
            );
            $m = new Products();
            $m->clear();
            $m->setField($field);
            $m->setTable(' vcb_product_kind ');
            $m->setWhere('product_id', '=', $id);
            $data = $m->select();
            $this->assign('pro_id', $id);
            $upload = new Upload();
            $this->assign('upload', $upload->show());
        } else {
            header('Location:error.php');
        }
    }

    //添加商品种类保存
    function add_kindsave() {
        $id = get_post_value('id');
        $ve = $this->verify($id);
        $color = trim(get_post_value('color'));
        $sku = trim(get_post_value('sku'));
        $sku_name = trim(get_post_value('sku_name'));
        // var_dump($size);
        $image_url = trim(get_post_value('image_url'));
        var_dump($ve_kind);
        if (!empty($ve)) {
            $field = array(
                'product_id' => $id,
                'product_color' => $color,
                'created' => date('Y-m-d H:i:s', time()),
                'sku_name' => $sku_name,
                'sku' => $sku,
                'status' => 10000,
                'image_url' => $image_url,
            );
            var_dump($field);
            $m = new Products();
            $m->clear();
            $m->setField($field);
            $m->setTable(' vcb_product_kind ');
            $data = $m->insert();
            if (empty($data)) {
                header('Location:error.php');
            } else {
                // header('Location:kind?id=' . $id);
                echo "<a href='add_kind?id=" . $id . "'>继续添加</a>";
            }
        } else {
            header('Location:error.php');
        }
    }

    //商品种类修改
    function update_kind() {
        $id = get_post_value('id');
        $field = array(
            'id',
            'product_id',
            'product_color',
            'image_url',
        );
        var_dump($field);
        $m = new Products();
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product_kind ');
        $m->setWhere('id', '=', $id);
        $data = $m->select();
        $this->assign('data', $data);
        $upload = new Upload();
        $this->assign('upload', $upload->show());
    }

    //商品种类修改保存

    function update_kindsave() {
        $id = get_post_value('id');
        $color = trim(get_post_value('color'));
        $image_url = trim(get_post_value('image_url')) != '' ? trim(get_post_value('image_url')) : trim(get_post_value('image_url_old'));
        $field = array(
            'product_color' => $color,
            'image_url' => $image_url,
        );
        var_dump($field);
        $m = new Products();
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product_kind ');
        $m->setWhere('id', '=', $id);
        $data = $m->update();
        if (empty($data)) {
            header('Location:error.php');
        } else {

            //echo "<a href='kind?id=" . $_SERVER['HTTP_REFERER'] . "'>点击返回</a>";
            header('Location:index');
        }
    }

    function add_size() {
        $id = get_post_value('id');
        $ve = $this->verify_kind($id);
        if (empty($ve)) {
            header('Location:error.php');
        }
        $m = new Products();
        $field = array(
            'id',
            'size',
            'sku',
            'sku_name',
        );
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product_ksize ');
        $m->setWhere('product_kind_id', ' = ', $id);
        $data = $m->select();
        $this->assign('data', $data);
        $this->assign('pro_k_id', $id);
    }

    function add_sizesave() {
        $size = trim(get_post_value('size'));
        $sku = trim(get_post_value('sku'));
        $sku_name = trim(get_post_value('sku_name'));
        $pro_k_id = get_post_value('pro_k_id');
        //echo $pro_k_id;
        $ve = $this->verify_kind($pro_k_id);
        // var_dump($ve);
        if (empty($ve)) {
            header('Location:error.php');
        }
        //  $arr_size = explode(',', $size);
        var_dump(count($arr_size));
        //  for ($i = 0; $i < count($arr_size); $i++) {
        $m = new Products();
        $field = array(
            'size' => $size,
            'sku' => $sku,
            'sku_name' => $sku_name,
            'product_kind_id' => $pro_k_id,
        );
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product_ksize ');
        $data = $m->insert();
        //}
        if (!empty($data)) {
            header('Location:add_size?id=' . $pro_k_id);
        }
    }

    function update_sizesave() {
        $size = trim(get_post_value('u_size'));
        $id = get_post_value('id');
        //echo $pro_k_id;
        $ve = $this->verify_kind($id);
        // var_dump($ve);
        if (empty($ve)) {
            header('Location:error.php');
        }
        $m = new Products();
        $field = array(
            'size' => $size,
        );
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product_ksize ');
        $m->setWhere('id', '=', $id);
        $data = $m->update();
        if (!empty($data)) {
            header('Location:add_size?id=' . $id);
        }
    }

    function get_category_2() {
        $category_1 = get_post_value('category_1');
        $m = new Category();
        $data = $m->getCategory_2($category_1);

        $this->assign('json', $data);

        $this->setReturnType('json');
    }

    function get_category_3() {
        $category_2 = get_post_value('category_2');
        $m = new Category();
        $data = $m->getCategory_3($category_2);

        $this->assign('json', $data);

        $this->setReturnType('json');
    }

    function get_floor_2() {
        $floor_1 = get_post_value('floor_1');
        $m = new Floor();
        $data = $m->getFloor_2($floor_1);

        $this->assign('json', $data);

        $this->setReturnType('json');
    }

    function get_floor_3() {
        $floor_2 = get_post_value('floor_2');
        $m = new Floor();
        $data = $m->getFloor_3($floor_2);
        $this->assign('json', $data);
        $this->
                setReturnType('json');
    }

    //判断商品是否存在
    private function verify($id) {
        $m = new Products();
        $field = array(
            'product_id',
            'title_cn',
        );
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product ');
        $m->setWhere('product_id', ' = ', $id);

        $data = $m->select();
        return $data;
    }

    private function verify_kind($id) {
        $m = new Products();
        $field = array(
            'id',
        );
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product_kind ');
        $m->setWhere('id', ' = ', $id);

        $data = $m->select();
        return $data;
    }
    
    

}

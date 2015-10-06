
<div class="shop_header">    	
        <h1 class="con_logo"><a href="../index/index"><img src="<?php echo APP_IMAGE_PUBLIC_PATH ?>VCB LOGO.png"/></a></h1>
        <div class="status">
            <ul class="process clearfix">
            	<li class="step1">
                	<span>1</span>
                	<div></div>
                </li>
            	<li class="step2">
                	<span>2</span>
                	<div></div>
                </li>
            	<li class="step3">
                	<span>3</span>
                	<div></div>
                </li>
            	<li class="step4">
                	<span>4</span>
                </li>
            </ul>
            <div class="status_text">
            	<span class="status_text_one">购物车</span>
            	<span class="status_text_two">确认订单</span>
            	<span class="status_text_three">支付</span>
            	<span class="nomargin">完成</span>
            </div>
        </div>
</div>
<!--------------------------->
<div class="status_top clearfix">
	<span>我的购物车</span>	
</div>


<div class="cart clearfix" style="display:;" id="mycart">
        <table>
        		<thead>
                  <tr>
                    <th width="55px" class="first">
                    	<input type="checkbox" class="allChecked" id="mycart_fistAll"/>
                        <label for="mycart_fistAll">全选</slect>
                        
                    </th>
                    <th width="254px" class="second">
                    	<span class="inverse_btn">
                        	<input type="checkbox" class="reverse" id="mycart_reverseAll"/>
                        	<label for="mycart_reverseAll">反选</slect>
                        </span>
                    	<span class="goods_info">商品信息</span>
                    </th>
                    <th width="120px"></th>
                    <th width="150px">单价（元）</th>
                    <th width="130px">数量</th>
                    <th width="135px">小计（元）</th>
                    <th class="last">操作</th>
                  </tr>
                  <tr><th colspan="7" class="blank"></th></tr>
              </thead>
              
<?php 

//print_r($dataOfMycart);//我的购物车基本信息表

$code_dataOfMycart=array();
foreach($dataOfMycart as $key7=>$data4){
	
    foreach ($data4 as $key8=>$data5){
    	
             //echo $data5["sku_code"];
             $data6=explode('|', $data5["sku_code"]);
             //print_r($data6);
             foreach ($data6 as $key8=>$data9){
               $data7=explode(':', $data9);
               $code_dataOfMycart[$data5["cart_id"]][]=$data7;
             }

    }

}

//print_r($code_dataOfMycart);//


//print_r($mycartSkuQty);//单条库存
//print_r($mycartSkuRemark);//别名表


//echo "******************************我是分割线**********************<br>";
//print_r($cartProImgSelect);

//print_r($cartProInfoSku);


//echo "aaaaaaaaaaaaaaaaaaaaaaaaaaaa";

//print_r($price_cart);
//print_r($numOfQty_cart);
//print_r($qty_cart);
//print_r($sku_id_cart);
//echo "name";
// print_r($name_cart);
// print_r($code_cart);
// print_r($sku_code4_cart);
// print_r($sku_name_cart);
// print_r($sku_code_cart);

$listOfSku=array();
$numOfSku=array();
foreach ($sku_code4_cart as $aaa=>$dataaa){
	
     $listOfSku[$aaa]=count($dataaa);
     $numOfSku[$aaa]=count($dataaa[0]);

}
// echo "FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFF";
// print_r($listOfSku);
// print_r($numOfSku);

$sku_code4_cart=json_encode($sku_code4_cart);
$listOfSku = json_encode($listOfSku);
$numOfSku = json_encode($numOfSku);
$code_dataOfMycart=json_encode($code_dataOfMycart);
$sku_id_cart=json_encode($sku_id_cart);
$qty_cart=json_encode($qty_cart);
$price_cart=json_encode($price_cart);
echo
"<script>
qty_cart=$qty_cart;
price_cart=$price_cart;
sku_id_cart=$sku_id_cart;
code_dataOfMycart=$code_dataOfMycart;
sku_code = $sku_code4_cart;
listOfSku = $listOfSku;
numOfSku = $numOfSku;
</script>";

?>              
              
<?php 
if($dataOfMycart)
foreach ($dataOfMycart as $key1=> $MycartOfProduct){

    $numOfItem=count($MycartOfProduct);
//     echo '<br>'.$numOfItem;
    
    //if($MycartOfProduct)
    foreach ($MycartOfProduct as $key2=>$MycartOfProductSku){
//             echo "key2=>".$key2.'<br>';
//             if($numOfItem==1){
//  ?>
<!--    <tbody>  -->
 <?php 
//             	echo  "<tr class='info first last'  cartId=".$MycartOfProductSku['cart_id'].">";
//             }else{
            	
// 				if($key2==0)
// 					echo  "<tr class='info first' cartId=".$MycartOfProductSku['cart_id'].">";
// 				else if($key2==$numOfItem-1)
// 					echo  "<tr class='info last'  cartId=".$MycartOfProductSku['cart_id'].">";
// 				else echo  "<tr class='info'  cartId=".$MycartOfProductSku['cart_id'].">";

//             }
            
?>
            
             <tbody> 
             
<?php 
             $cartId=$MycartOfProductSku['cart_id'];
             echo  "<tr class='info first last productItem'  sku_id=".$MycartOfProductSku['sku_id']." cartId=".$MycartOfProductSku['cart_id']." show=true>";
?>
             <td class="first">
                    	<input type="checkbox" class="eachChecked" cartId=<?php echo $cartId;?> show=true />
                        <label for=""></slect>
                    </td>
                    <td class="g_content">
                    	<a href="../proinfo/proinfo?productId=<?php echo $MycartOfProductSku['product_id']?>" class="g_content_img" target="_blank"><span><img cartId=<?php echo $cartId?> src="<?php
                    	
                    	$img_name=explode('.', $MycartOfProductSku['img_path']);
                    	echo $img_name[0].'80x80.'.$img_name[1];                  	
                    	?>"/></span></a>
                    	
                    	<!--------动态创建img的220x200的显示---------->
                       <div  id="img_big_box"  class="clearfix" style="display:none;">
		                 <span class="imgarrow_edit"></span>
                         <div class="imgbox_wrap"><img cartId=<?php echo $cartId?> src="<?php echo $img_name[0].'220x220.'.$img_name[1];  ?>"/></div>
                       </div>
                    	
                    	
                    	
                    	
                        <a href="../proinfo/proinfo?productId=<?php echo $MycartOfProductSku['product_id']?>" class="g_content_name" target="_blank"><?php echo $MycartOfProductSku['product_title_cn']; ?></a>
                    </td>
                    <td class="order_detail" >
                    	<div class="order_detail_wrap">
                        	<span class="order_detail_info" >
                        	
                        	<?php 
                        	$sku_name1=$MycartOfProductSku['sku_name'];                        	
                        	$sku_name2=explode('|', $sku_name1);
                        	
                        	$sku_code1=$MycartOfProductSku['sku_code'];
                        	$sku_code2=explode('|', $sku_code1);
                        	//print_r($sku_code2);
                        	foreach ($sku_code2 as $key1=>$sku_code3)
	                        	foreach ($sku_name2 as $key2=>$sku_name3){
                                    if($key1==$key2){
                                       
                                        
		                        		$sku_name=explode(':', $sku_name3);
		                        		$sku_code=explode(':', $sku_code3);
		                        		//print_r($sku_name);
		                        		//print_r($sku_code);
		                        		//echo $sku_code[1];
		                        		//echo $sku_name[1];
		                        		//echo $MycartOfProductSku['product_id'];
		                        		
		                        		    foreach ($mycartSkuRemark as $key3=>$skuRemark){
                                                    if($key3==$MycartOfProductSku['product_id']){
															//echo $MycartOfProductSku['product_id'].$key3;
															//print_r($skuRemark);
                                                              foreach ($skuRemark as $key4=>$remark){
                                                              	   if($sku_code[1]==$remark['sku_code']){
																      echo "<span class='order_info_item' sku=$sku_code[1] cartId=$cartId sku_code=$sku_code[0]>$sku_name[0]：<span class='sku_name'>$sku_name[1][".$remark['remark_cn']."]</span></span>";
																      break 3;
																      }
                                                              }
                                                              		                                                            
		                                                }
		                                    }
		                                    echo "<span class='order_info_item' sku=$sku_code[1] cartId=$cartId sku_code=$sku_code[0]>$sku_name[0]：<span class='sku_name'>$sku_name[1]</span></span>";
		                                    
	                                }
	                        	}
                        	
                        	?>
                                <!--  <span class="order_info_item">颜色：蓝色(毛衣+衬衫)</span>
                                <span class="order_info_item">尺码：XL</span>
                                -->                                                                                            
                                <span class="edit" ></span>
                              </span>
                              <div class="order_detail_edit" cartId="<?php  echo $MycartOfProductSku['cart_id'];?>" productId="<?php echo $MycartOfProductSku['product_id']?>" style="display:none;"><!--再次编辑属性信息-->
                              		<span class="arrow_edit"></span>
                                    <div class="goods_info_wrapper">
                                    	<div class="info_panel">
                                    	
 <!-- 重新编辑属区 开始-->                                  	
                                    	<!-- 
                                        	<dl class="clearfix">
                                            	<dt>颜色</dt>
                                                <dd>
                                                	<a href="#">红色</a>
                                                	<a href="#">深色</a>
                                                	<a href="#">藏青色</a>
                                                	<a href="#">图片色</a>
                                                </dd>
                                            </dl>
                                        	<dl class="clearfix">
                                            	<dt>尺码</dt>
                                                <dd>
                                                	<a href="#">XL</a>
                                                	<a href="#">S</a>
                                                	<a href="#">M</a>
                                                	<a href="#">L</a>
                                                </dd>
                                            </dl>
print_r($qty);
print_r($sku_id);
print_r($name);
print_r($code);
print_r($sku_code4);
print_r($sku_name);
print_r($sku_code);         
-->                                 
                                 <?php 
                              $arr1 = array();
                               foreach ($code_name_cart as $KEY3=>$code_nameItem)
                                 foreach ($sku_code_cart as $KEY1=>$codeItem)
                                     foreach ($sku_name_cart as $KEY2=>$nameItem){
											
                                     	     //print_r($nameItem) ;
                                     	    
                                             if($KEY1==$KEY2&&$KEY1==$KEY3&&$KEY1==$MycartOfProductSku['product_id']){
                                                     // print_r($nameItem) ;
                                                  
   											
                                                foreach ($codeItem as $key_2=>$codeitem)
                                             	  foreach ($nameItem as $key_1=>$nameitem){
                                                         
                                                            if($code_nameItem[$key_2]==$key_1){
	                                                            echo "<dl class='clearfix'>";
	                                                            echo "<dt  class=$key_2 >$key_1</dt>";
	                                                            echo "<dd class=sku>";
	                                                          foreach ($codeitem as $key_3=>$data1)  
	                                                            foreach ($nameitem as $key_4=>$data2){
	                                                            	    if($key_3==$key_4){
																				$data_mark=true;
																				foreach ($cartProImgSelect as $key_5=>$proImgSelect){
																					 
																					if($key_5==$MycartOfProductSku['product_id']){
																				
																						//print_r($proImgSelect);
																						
																						foreach ($mycartSkuRemark as $KEY4=>$cartSkuRemark){
																								
																							if($KEY4==$MycartOfProductSku['product_id']){
																								foreach ($cartSkuRemark as $skuremark)
																									if($skuremark["sku_code"]==$data1){
																									$data2 = $data2.'['.$skuremark["remark_cn"].']';
																						
																								}
																						
																							}
																						
																						}
																						foreach ($proImgSelect as $data3){
																				
																							if($data3["property"]==$data1&&$data3["imgshowpath"]){
																								
																								//echo "<a class=$data1 href='javascript:void(0);'>$data2</a>";
																								$img_name=explode('.', $data3["imgshowpath"]);
																								//echo IMG_UPLOAD_PATH.$img_name[0].'220x220.'.$img_name[1];
																								
																								//print_r($sku_code2);
																								
																								foreach ($sku_code2 as $key6=>$data_code){
																									
																									$arr=explode(':', $data_code);
																									//print_r($arr);
																									$arr1[$key6]=$arr[1];

																								}
																								//print_r($arr1);
																								if(in_array($data1,$arr1)){

																									echo "<a class='$cartId$data1 colorImg  colorImg_active ' cartId=$cartId value1=$key_2 id=$data1 value2=$data1   name=$key_1 title=$data2 href='javascript:void(0);' >
																									<img class=imgSelect img_name=".IMG_UPLOAD_PATH."$img_name[0] img_type=$img_name[1] src=".IMG_UPLOAD_PATH.$img_name[0].'44x44.'.$img_name[1]."></a>";
																									$data_mark=false;
																								}
																								
																								else{	
																							    echo "<a class='$cartId$data1 colorImg ' value1=$key_2 cartId=$cartId  value2=$data1 id=$data1 name=$key_1 title=$data2 href='javascript:void(0);' >
																							    <img class=imgSelect  img_name=".IMG_UPLOAD_PATH."$img_name[0]  img_type=$img_name[1] src=".IMG_UPLOAD_PATH.$img_name[0].'44x44.'.$img_name[1]."></a>";
																							    $data_mark=false;
																							    }
																							}
																						}
																					}
																				
																				}

                                                                               if($data_mark){
																					if(in_array($data1,$arr1))
																						echo "<a class='$cartId$data1   size_active'  cartId=$cartId value1=$key_2  value2=$data1 id=$data1 name=$key_1 title=$data2 href='javascript:void(0);'>$data2</a>";
																					else	
                                                                               			echo "<a class='$cartId$data1 ' value1=$key_2 cartId=$cartId  value2=$data1 id=$data1 name=$key_1 title=$data2 href='javascript:void(0);'>$data2</a>";
                                                                               }
																			  	
																		}
	                                                            }
	
		                                              	                                                   	        
		                                              	        echo "</dd>";
		                                              	        echo "</dl>";
	                                              	        }
                                             	  }

                                              }

                                     }
                                 
                                 
                                 ?>       
                                            
                                            
                                            
                                            
 <!-- 重新编辑属区 结束-->                                             
                                        	<dl class="clearfix">
                                            	<dt class="price">价格</dt>
                                              <dd class="sales_price" cartId=<?php echo $cartId?>>
                        						  <?php  echo $MycartOfProductSku['sales_price']?>
                                              </dd>
                                            </dl>
                                            
                                             
                                              
                                        	<dl class="clearfix panel_btns">
                                            	<input type="button" class="panel_sumbit" value="确定" cartId=<?php echo $cartId?>>
                                            	<input type="button" class="panel_canel" value="取消">
                                            </dl>
                                        </div>
                                         <div class="info_pre" >
                                         
                                         <img class="img imgDefault" cartId=<?php echo $cartId?> src="<?php                                                                               
                                           $img_name=explode('.', $MycartOfProductSku['img_path']);
                    						echo $img_name[0].'220x220.'.$img_name[1];                                      
                                          ?>"/>
                                       
                                        <?php 
                                        foreach ($cartProImgSelect as $key=>$proImgSelect){
                                        	
                                                 if($key==$MycartOfProductSku['product_id']){
                                                 	 foreach ($cartProImgSelect[$key] as $imgSelect){
                                                 	    // echo      $imgSelect["imgshowpath"];
                                                 	 ?>
                                          <img cartId=<?php echo $cartId?> style="display:none" class="img" sku="<?php echo $cartId.$imgSelect["property"]?>" src="<?php 
                                          $img_name=explode('.', $imgSelect["imgshowpath"]);                                         
                                          echo IMG_UPLOAD_PATH.$img_name[0].'220x220.'.$img_name[1];
                                          
                                          ?>"/>
                                               	 
                                                 	 <?php 
                                                 	 }

                                                 }
                                        }
                                        
                                        ?>
                                        
                                        </div>
                                    </div>
                              </div>
                        </div>
                    </td>
                    <td>
                    	<span class="g_price" cartId=<?php echo $cartId?>><?php  echo $MycartOfProductSku['sales_price']?></span>	
                    </td>
                    
                    
                    <td class="order_amount">
                    	<p class="clearfix amount_val">
                            <span class="reduce_amount" cartId=<?php echo $cartId?>><a href="javascript:void(0);">-</a></span>	
                            <input type="text"  cartId=<?php echo $cartId?>  class="qtynum" qty="<?php 
                        
                        foreach($mycartSkuQty as $key5=>$skuQty){
                        	
                               if($key5==$MycartOfProductSku['sku_id'])
                               	echo $skuQty['qty'];

                        }
                        
                        ?>" value="<?php echo $MycartOfProductSku['qtynum']?>"/>
                            <span class="add_amount" cartId=<?php echo $cartId?>><a href="javascript:void(0);">+</a></span>	
                        </p>
                    	<p class="clearfix amount_tip" cartId=<?php echo $cartId?> style="display:none">库存只有<?php 
                        
                        foreach($mycartSkuQty as $key5=>$skuQty){
                        	
                               if($key5==$MycartOfProductSku['sku_id'])
                               	echo $skuQty['qty'];

                        }
                        
                        ?>件</p>
                    </td>
                    
                    
                    
                    
                    
                    
                    <td><span class="price_total" cartId=<?php echo $cartId?>><?php  echo  sprintf('%.2f', $MycartOfProductSku['sales_price']*$MycartOfProductSku['qtynum'])?></span></td>
                    <td class="last"><a href="javascript:void(0)" class="delete" cartId=<?php echo $MycartOfProductSku['cart_id']?>>删除</a></td>
                  </tr>

	               
                   
                    
                
   </tbody>
                  <tbody  style="display:none;">
                   <tr class="undo first last info" cartId=<?php echo $MycartOfProductSku['cart_id']?>>
                  		<td  colspan="7">
                    		<div class="delete_meg">成功删除<span class="delete_num">1</span>件商品，如有误，可<a href="javascript:void(0);" class="beforeDelete" cartId=<?php echo $MycartOfProductSku['cart_id']?>>撤销本次删除</a></div>
                 	 </td>
                     </tr> 
                  </tbody>
<?php                  
   }
		
}
?> 
             <!--     
              <tbody>
              
              
                  <tr class="info first last">
                    <td class="first">
                    	<input type="checkbox" class="selectalll" id="selectAll"/>
                        <label for="selectAll">全选</slect>
                    </td>
                    <td class="g_content">
                    	<a href="#" class="g_content_img" target="_blank"><span><img src="<?php //echo APP_MODULE_IMAGE_PATH?>ImgCart/jd50x50.jpg"/></span></a>
                        <a href="#" class="g_content_name" target="_blank">秋冬新款女士韩版修身百搭蕾丝花边拼接长袖翻领打底衫 上衣</a>
                    </td>
                    <td class="order_detail">
                    	<div class="order_detail_wrap">
                        	<span class="order_detail_info">
                                <span class="order_info_item">颜色：蓝色(毛衣+衬衫)</span>
                                <span class="order_info_item">尺码：XL</span>
                                <span class="order_info_edit">编辑</span>
                              </span>
                              <div class="order_detail_edit" style="display:none;"><!--再次编辑属性信息--
                              		<span class="arrow_edit"></span>
                                    <div class="goods_info_wrapper">
                                    	<div class="info_panel">
                                        	<dl class="clearfix">
                                            	<dt>颜色</dt>
                                                <dd>
                                                	<a href="#">红色</a><a href="#">深色</a><a href="#">藏青色</a><a href="#">图片色</a>
                                                </dd>
                                            </dl>
                                        	<dl class="clearfix">
                                            	<dt>尺码</dt>
                                                <dd>
                                                	<a href="#">XL</a><a href="#">S</a><a href="#">M</a><a href="#">L</a>
                                                </dd>
                                            </dl>
                                        	<dl class="clearfix">
                                            	<dt>价格</dt>
                                              <dd>1999.00</dd>
                                            </dl>
                                        	<dl class="clearfix panel_btns">
                                            	<input type="button" class="panel_sumbit" value="确定">
                                            	<input type="button" class="panel_canel" value="取消">
                                            </dl>
                                        </div>
                                        <div class="info_pre"><img src="<?php //echo APP_MODULE_IMAGE_PATH?>ImgCart/mycart/542127f7N06c9056d.jpg"/></div>
                                    </div>
                              </div>
                        </div>
                    </td>
                    <td>
                    	<span class="g_price">199.00</span>	
                    </td>
                    <td class="order_amount">
                    	<span class="reduce_amount">-</span>	
                        <input type="text" value="1" class=""/>
                        <span class="add_amount">+</span>	
                    </td>
                    <td><span class="price_total">199.00</span></td>
                    <td class="last"><a href="#" class="">删除</a></td>
                  </tr>
              </tbody>
              
              
            
              <tbody>
                  <tr class="undo  first  last info"  style="diaplay:none">
                  		<td  colspan="7">
                    		<div class="delete_meg">成功删除<span>1</span>件商品，如有误，可撤销<a href="#">本次删除</a></div>
                 	 </td>
                  </tr>
               </tbody>  
               
               
               
             
              
              
             
              <tbody>
              
              
                  <tr class="info first">
                    <td class="first">
                    	<input type="checkbox" class="selectalll" id="selectAll"/>
                        <label for="selectAll">全选</slect>
                    </td>
                    <td class="g_content">
                    	<a href="#" class="g_content_img" target="_blank"><span><img src="<?php //echo APP_MODULE_IMAGE_PATH?>ImgCart/547440c2N15a00d6b.jpg"/></span></a>
                        <a href="#" class="g_content_name" target="_blank">秋冬新款女士韩版修身百搭蕾丝花边拼接长袖翻领打底衫 上衣</a>
                    </td>
                    <td class="order_detail">
                    	<div class="order_detail_wrap">
                        	<span class="order_detail_info">
                            	<span class="order_info_item">颜色：蓝色</span>
                            	<span class="order_info_item">尺码：XL</span>
                            	<span class="order_info_item">库存：XL</span>
                            	<span class="order_info_item">尺码：XL</span>
                            	<span class="order_info_edit">编辑</span>
                            </span>
                        </div>
                    </td>
                    <td>
                    	<span class="g_price">199.00</span>	
                    </td>
                    <td class="order_amount">
                    	<span class="reduce_amount">-</span>	
                        <input type="text" value="1" class=""/>
                        <span class="add_amount">+</span>	
                    </td>
                    <td><span class="price_total">199.00</span></td>
                    <td class="last"><a href="#" class="">删除</a></td>
                  </tr>
                  
                  
                  <tr class="info">
                    <td class="first">
                    	<input type="checkbox" class="selectalll" id="selectAll"/>
                        <label for="selectAll">全选</slect>
                    </td>
                    <td class="g_content">
                    	<a href="#" class="g_content_img" target="_blank"><span><img src="<?php //echo APP_MODULE_IMAGE_PATH?>ImgCart/547440c2N15a00d6b.jpg"/></span></a>
                        <a href="#" class="g_content_name" target="_blank">秋冬新款女士韩版修身百搭蕾丝花边拼接长袖翻领打底衫 上衣</a>
                    </td>
                    <td class="order_detail">
                    	<div class="order_detail_wrap">
                        	<span class="order_detail_info">
                            	<span class="order_info_item">颜色：白色</span>
                            	<span class="order_info_item">尺码：S</span>
                            	<span class="order_info_item">库存：S</span>
                            	<span class="order_info_item">尺码：S</span>
                            	<span class="order_info_edit">编辑</span>
                            </span>
                        </div>
                    </td>
                    <td>
                    	<span class="g_price">199.00</span>	
                    </td>
                    <td class="order_amount">
                    	<span class="reduce_amount">-</span>	
                        <input type="text" value="1" class=""/>
                        <span class="add_amount">+</span>	
                    </td>
                    <td><span class="price_total">199.00</span></td>
                    <td class="last"><a href="#" class="">删除</a></td>
                  </tr>
                  
                  
                  
                  <tr class="info last">
                    <td class="first">
                    	<input type="checkbox" class="selectalll" id="selectAll"/>
                        <label for="selectAll">全选</slect>
                    </td>
                    <td class="g_content">
                    	<a href="#" class="g_content_img" target="_blank"><span><img src="<?php //echo APP_MODULE_IMAGE_PATH?>ImgCart/547440c2N15a00d6b.jpg"/></span></a>
                        <a href="#" class="g_content_name" target="_blank">秋冬新款女士韩版修身百搭蕾丝花边拼接长袖翻领打底衫 上衣</a>
                    </td>
                    <td class="order_detail">
                    	<div class="order_detail_wrap">
                        	<span class="order_detail_info">
                            	<span class="order_info_item">颜色：黑色</span>
                            	<span class="order_info_item">尺码：M</span>
                            	<span class="order_info_item">库存：M</span>
                            	<span class="order_info_item">尺码：M</span>
                            	<span class="order_info_edit">编辑</span>
                            </span>
                        </div>
                    </td>
                    <td>
                    	<span class="g_price">199.00</span>	
                    </td>
                    <td class="order_amount">
                    	<span class="reduce_amount">-</span>	
                        <input type="text" value="1" class=""/>
                        <span class="add_amount">+</span>	
                    </td>
                    <td><span class="price_total">199.00</span></td>
                    <td class="last"><a href="#" class="">删除</a></td>
                  </tr>
                  
                  
              </tbody>
              --> 

          
              <tfoot>
                  <tr class="empty"><td colspan="7" class="blank"></td></tr>
                  <tr class="goods_total">
                    <td class="first" width="55px;">
                    	<input type="checkbox" class="allChecked" id="mycart_lastAll"/>
                        <label for="mycart_lastAll">全选</slect>
                    </td>
                    <td width="254px" class="second">
                    	<span class="inverse_btn">
                        	<input type="checkbox" class="reverse" id="mycart_lastReverse"/>
                        	<label for="mycart_lastReverse">反选</slect>
                        </span>
                    	<a href="javascript:void(0);" class="delete">批量删除</span>
                    </td>
                    <td colspan="5" class="last clearfix">
                    	<a class="exchange" href="javascript:void(0);"></a>
                        <span class="total_price">￥0.00</span>
                    	<span class="total_text">共：</span>
                    	<!--<span class="post_total">邮费：<a href="#">￥10.00</a></span>-->
                    	<span class="amount_total">已选<a href="javascript:void(0);" class="numOfProduct">0</a>件商品</span>
                    </td>
                  </tr>
              </tfoot>
    </table>
</div>



<!--------清空购物车开始---------->
<div class="empty_cart" style="display:none;">
       <div class="cart_wrap">
       		<div class="icon"></div>
       		<p class="description">您的购物车还空着呢，赶紧去<a href="login.html">逛逛</a>吧！</p>
       </div>
</div>
<!--------清空购物车结束---------->






















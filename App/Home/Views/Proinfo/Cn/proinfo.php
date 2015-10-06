<?php 
// echo "proBaseInfo=";
// print_r($proBaseInfo);
// echo "proInfoSku=";
// print_r($proInfoSku);
//echo "<br>proImgSelect=";
//print_r($proImgSelect);

// echo "<br>proImgDetail=";
// print_r($proImgDetail);

// echo "<br>proNavigation=";
// print_r($proNavigation);
// echo "<br>proNavigationUrl=";
// print_r($proNavigationUrl);

//  echo "<br>proInfoSkuRemark=";
//  print_r($proInfoSkuRemark);
//  echo count($proInfoSkuRemark);
?>
<?php 
     //foreach ($proNavigation as $dataOfproNavigation); 
     	//echo $dataOfproNavigation['title_cn'];
?>

<!----------内容----------------->
<div class="w1010">
<!----------导航开始----------------->
        <p class="goods_name">
         <?php 	 
         foreach ($proNavigation as $dataOfproNavigation);	
         foreach ($proNavigationUrl as $dataOfproNavigationUrl);
	     ?>
            <span class="cloth"><a href="<?php echo $dataOfproNavigationUrl['category_1_url'];?>"><?php echo $dataOfproNavigation['category_1_cn'];?></a></span><span class="apart">></span><a href="<?php echo $dataOfproNavigationUrl['category_2_url'];?>"><?php echo $dataOfproNavigation['category_2_cn'];?></a><span class="apart">></span><a href="<?php echo $dataOfproNavigationUrl['category_3_url'];?>"><?php echo $dataOfproNavigation['category_3_cn'];?></a><span class="apart">></span><a href="<?php echo $dataOfproNavigationUrl['product_url'];?>"><?php echo $dataOfproNavigation['title_cn'];?></a>	    
        </p>
        
<!----------导航结束----------------->     
        <div class="goods_info clearfix"> 
        	    <div class="picture">
                        <div class="bigbox"><!--这里大图片默认的大小是500x500 -->
                            
                            <!-- 大图显示开始 -->
                            <!-- 大图+细节图片 -->
                            <?php                               
                                 foreach ($proImgDetail as $dataOfproImgDetail){  
                           	      
                             ?>
                             <table class="imgshow" style="display: "  class="imgDetail<?php echo $dataOfproImgDetail['id'];?>">
                              	<tr>
                               		 <td><img src="<?php echo IMG_UPLOAD_PATH.$dataOfproImgDetail['imgshowpath']; ?>" /></td>
                              	</tr>
                            </table>
                                 	
                              <?php  	
                                 }                                	
                              ?>
              
              
                             <?php                               
                                 foreach ($proImgSelect as $dataOfproImgSelect){                                	
                             ?>
                             <table class="imgshow" style="display: " id="<?php echo $dataOfproImgSelect['property'] ?>">
                              	<tr>
                               		 <td><img src="<?php echo IMG_UPLOAD_PATH.$dataOfproImgSelect['imgshowpath']; ?>" /></td>
                              	</tr>
                            </table>
                                 	
                              <?php  	
                                 }                                	
                              ?>
              
              
              
                            <!-- 大图显示结束 -->
                        </div>
                        <ul class="thumb"><!--这里小图片最多显示5张大小60x60-->
                        
                             <?php 
                              foreach ($proImgDetail as $dataOfproImgDetail){
                             ?>
                             <li class="imgDetail"  id= "imgDetail<?php echo $dataOfproImgDetail['id'];?>"><a href="javascript:void(0)"><img src="<?php echo IMG_UPLOAD_PATH.$dataOfproImgDetail['imgdetailpath'];?>"/></a></li>
                             <?php }?>                            
                     
                        </ul>
        		</div>
                  <div class="item_sale">
                                <h3 class="goods_title"><?php echo $proBaseInfo[0]['title_cn'];?></h3>
                                <div class="goods_price goods_pro">
                                        <dl>
                                            <dt>原价</dt>
                                            <dd class="price_y">¥<?php echo $proBaseInfo[0]['old_price'];?></dd>
                                        </dl>
                                        <dl>
                                            <dt class="price_n">现价</dt>
                                            <dd class="">
                                                <span class="price_u">￥</span>
                                                <span class="price_ut"><?php echo $proBaseInfo[0]['sales_price'];?></span>
                                          </dd>
                                        </dl>
                                </div>
                                <div class="goods_meta goods_pro">
                                       <!-- <dl>
                                            <dt>优惠</dt>
                                          <dd class="discount">
                                                <span>全店铺满2件减5元</span><b class="more"></b>
                                                <div class="dis_list" style="display:none;">
                                                    <a href="javascript:;"><span>▪</span>全店铺满2件减5元</a>
                                                    <a href="javascript:;"><span>▪</span>全店铺满2件减5元</a>
                                                    <a href="javascript:;"><span>▪</span>全店铺满223元送优惠劵</a>
                                                    <b class="up"></b>
                                                </div>
                                             </dd>
                                        </dl>-->
                                        <dl>
                                            <dt>快递</dt>
                                          <dd class="express">
                                                    <div class="destination">中国<span class="to">至</span><a href="javascript:void(0)" class="city"><span>重庆庆</span><i></i></a></div>	
                                                    <div class="charge">快递：10.00</div>	
                                             </dd>
                                        </dl>
                                </div>
                                <div class="goods_important ">
                                		<div class="goods_content">	
                                        		<div class="pannel_title" style="display:none;"><b>x</b></div>
                                        		<!--products_sku-->  
                                                <div class="goods_sku goods_pro">
                                                     <!--  
                                                        <dl>
                                                            <dt>颜色</dt>
                                                            <dd class="">
                                                            	<ul class="clearfix">
                                                            	
                                                                
                                                                	
                                                                    <li class="colorImg imgactive"><a title="KOERY" href="javascript:void(0)" ><img src=""/></a></li>
                                                                    
                                                                 </ul>
                                                            </dd>
                                                        </dl>
                                                        <dl>
                                                            <dt>颜色</dt>
                                                            <dd class="clearfix">
                                                                	<a href="javascript:void(0)" class="word active">青色 005</a>
                                                                	<a href="javascript:void(0)" class="word">枣红色 06</a>
                                                                	<a href="javascript:void(0)" class="word">淡紫色 4103</a>
                                                               		<a href="javascript:void(0)" class="word">深红色</a>
                                                               		<li class="wordImg"><a href="javascript:void(0)" class="wordImg">深红色</a><li>
                                                               		
                                                                 </ul>
                                                            </dd>
                                                        </dl>
                                                        <dl>
                                                            <dt>尺码</dt>
                                                            <dd class="clearfix">
                                                                <a href="javascript:void(0)" class="letDig active">SL</a>
                                                                <a href="javascript:void(0)" class="letDig">S</a>
                                                                <a href="javascript:void(0)" class="letDig">M</a>
                                                                <a href="javascript:void(0)" class="letDig">L</a>
                                                                <a href="javascript:void(0)" class="letDig">XL</a>
                                                            </dd>
                                                        </dl>
                                                        -->
<?php                                                       
//print_r($qty);
// print_r($code);
// print_r($name);
//print_r($sku_id);
 $code_name=array();
 $code_name=array_combine($code,$name);
// print_r($code_name);
// print_r($sku_name);
//print_r($sku_code); 
// print_r($proImgSelect);
//echo "%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%";
//print_r($sku_code4);

?>                            
 <?php 
 
$numOfSku=count($name);
$listOfSku=count($sku_code4);
$numOfImg=count($proImgSelect);
$sku_code4=json_encode($sku_code4);
$sku_id=json_encode($sku_id);
$qty=json_encode($qty);
$price=json_encode($price);
$product_id=$proBaseInfo[0]['product_id'];
echo
"<script>
sku_id=$sku_id;
qty = $qty;
price = $price;
sku_code = $sku_code4;
numOfSku = $numOfSku;
listOfSku=$listOfSku;
product_id=$product_id;
</script>";
//echo "属性个数：".$numOfSku;
//echo "属性条数：".$listOfSku;
//echo "小图个数：".$numOfImg;


foreach ($sku_name as $key1=>$dataOfSkuName)
foreach ($sku_code as $key2=>$dataOfSkuCode){ 
//echo    $code_name[$key2]."---".$key1;
      if($code_name[$key2]==$key1){                                                             	
?>			
        <dl>
        <dt><?php echo $key1;?></dt>
           <dd class="clearfix" class="<?php echo $key2;?>">
          <?php  
        	for($i=0;$i<count($dataOfSkuName);$i++){ 
				if($numOfImg){
                for($j=0;$j<$numOfImg;$j++){
                   if($dataOfSkuCode[$i]==$proImgSelect[$j]['property']&&$proImgSelect[$j]['imgselectpath']){
                     ?>               	
                    <li class="colorImg item " value1="<?php echo $key2;?>" value2="<?php echo $dataOfSkuCode[$i]; ?>" id="<?php echo $dataOfSkuCode[$i]; ?>"><a title="
                    <?php 
                    echo $dataOfSkuName[$i];
                    for($k=0;$k<count($proInfoSkuRemark);$k++)
                    	if($proInfoSkuRemark[$k]['sku_code']==$dataOfSkuCode[$i])
                    		echo '［'. $proInfoSkuRemark[$k]['remark_cn'] .'］';
                    
                    ?>" href="javascipt:void(0);" ><img src="<?php echo IMG_UPLOAD_PATH.$proImgSelect[$j]['imgselectpath'];?>"/></a></li>                                                                 
                    <?php 
                    break;
                  }
                } 
                if($j==$numOfImg){
                	
                    ?>
                     <li class="wordImg " value1="<?php echo $key2;?>" value2="<?php echo $dataOfSkuCode[$i]; ?>" id="<?php echo $dataOfSkuCode[$i]; ?>"><a href="javascipt:void(0);" id="<?php echo $dataOfSkuCode[$i]; ?>"><?php 
                    echo $dataOfSkuName[$i];
                    for($k=0;$k<count($proInfoSkuRemark);$k++)
                    	if($proInfoSkuRemark[$k]['sku_code']==$dataOfSkuCode[$i])
                    		echo '<span class="word">［'. $proInfoSkuRemark[$k]['remark_cn'] .'］</span>';
                    
                    ?></a><li>
                    <?php 
                    
                }
               }
               else{  
              
            	?>
    <li class="wordImg" value1="<?php echo $key2;?>" value2="<?php echo $dataOfSkuCode[$i]; ?>" id="<?php echo $dataOfSkuCode[$i];?>"><a href="javascipt:void(0);" id="<?php echo $dataOfSkuCode[$i]; ?>"><?php 
                    echo $dataOfSkuName[$i];
                    for($k=0;$k<count($proInfoSkuRemark);$k++)
                    	if($proInfoSkuRemark[$k]['sku_code']==$dataOfSkuCode[$i])
                    		echo '<span class="word">［'. $proInfoSkuRemark[$k]['remark_cn'] .'］</span>';
                    
                    ?></a><li>
                <?php

           
           }  
           }                                                      	
           ?>                                                     
       </dd>
     </dl>
<?php 
	}
}
                               	
?>                        
                                                  <dl>
                                                            <dt>数量</dt>
                                                            <dd class="clearfix">
                                                                <div class="goods_num">
                                                                    <a href="javascript:void(0);" class="reduce"></a>
                                                                    <input type="text" class="qty" value="1"/>
                                                                    <a href="javascript:void(0);" class="add"></a>
                                                                </div>	
                                                                <div class="goods_stock">[库存<span id="qty"><?php echo $numOfQty;?></span>件]</div>	
                                                                <div class="goods_stock_tip" style="display: none">您所填写的商品数量超过库存！</div>	
                                                            </dd>
                                                        </dl>
                                                </div>
                                           <!--products_sku-->
                                        		<div class="pannel_action" style="display:none">
                                                	<span class="pannel_tips">请选择你要的商品信息</span>
                                                	<a href="javascript:void(0);" class="pannel_ok" style="display:none;"></a>
                                                </div>
                                        </div> 
                                        <div class="goods_buy goods_pro" style="display:;">
                                            <a href="javascript:void(0);" class="buynow">立刻购买</a><a href="javascript:void(0);" class="buycart">加入购物车</a>
                                         </div>
                                </div>  
                                <div class="goods_social goods_pro">
                                    <div href="javascript:void(0);" class="fav "><b></b><span>喜欢(<span class="loves"><?php echo $proBaseInfo[0]['loves'];?></span>)</span></div>
                                    <div href="javascript:void(0);" class="collect "><b></b><span>收藏宝贝</span></div>
                                 </div>
                                <div class="goods_service goods_pro">
                                    <a href="javascript:void(0);" target="_blank" class="baoyou"></a>
                                    <a href="javascript:void(0);" target="_blank" class="yunfei"></a>
                                    <a href="javascript:void(0);" target="_blank"  class="tuihuo"></a>
                                    <a href="javascript:void(0);" target="_blank" class="fahuo"></a>
                                 </div>
                  </div>      
        </div>
       
</div>

<div class="light_box" id="" style="display:none">
	<div class="box_content " >
		  <div class="delay clearfix ">
   	     	<img src="<?php echo APP_MODULE_IMAGE_PATH;?>imgProductInfo/loading_w72X72.gif"> 
         </div>  
    	<div class="lg_title clearfix"  style="display:none">
        	<a href="javascript:void(0);" class="lg_close"></a>
         </div>
    	<div class="lg_con clearfix"  style="display:none">
        	<p class="addcart">已将商品添加到购物车</p>
            <div class="module">
            	<a href="javascript:void(0)" class="to_cart">去结算<b></b></a>
                <a href="javascript:void(0)" class="shopping">继续购物</a>
            </div>
         </div>
    </div>
</div>
<!--遮罩层-->
<div class="proinfo_overlay"  style="display:none;"></div>
<!--遮罩层-->


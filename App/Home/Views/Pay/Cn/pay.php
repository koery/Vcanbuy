
<?php 

echo
"<script>
errorTimes=$errorTimes;
</script>";
?>

<!---------search------------------>
<div class="pay_header">    	
        <h1 class="con_logo"><a href="index.html"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgPay/pay_logo.png"/></a></h1>
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
<!-------------------->
<div class="container clearfix">
	<div class="w960">
    	<div class="myorder">
    		<div class="order_wrap  clearfix">
        	<div class="o_title">订单提交成功，请您尽快付款！ 订单号：<?php echo $myPayBaseInfo['order_no']?> </div>
        	<div class="o_right">
            	<div class="o_price">
                	<em>应付金额：</em><strong><?php echo $myPayBaseInfo['order_total_price']?></strong><em>元</em>
                </div>
                <div class="o_detail">
                	<a href="javascript:void(0);">查看详情<i></i></a>
                </div>
            </div>
        	<div class="o_clr"></div>

        	<div class="o_list" style="display:none;">
            	<table>
            		<tbody>
            		<tr>
            			<th>商品名称：</th>
            			<td>
            				<ul>
            				<?php 
            				     $numOfProduct = count($myPayBaseInfo['cart_id']);
            				     
            				     if(count($myPayBaseInfo['cart_id'])<=3){
            				     	
                                       foreach ($myPayBaseInfo['cart_id'] as $data){
                                       	
                                            echo "<li>".$data['product_title_cn']."</li>";
                                       }
            				     }else{
            				     	
                                       $i = 0;
                                        foreach ($myPayBaseInfo['cart_id'] as $data){

											echo "<li>".$data['product_title_cn']."</li>";
                                             $i++;
                                             if($i>3)
                                             	break;
										}
                                       echo   "<li>......</li>";
                                       echo    "<li>共计".$numOfProduct."件</li>";
            				     }
            				
            				?>
            					
            				</ul>            			
            			</td>
            		</tr>
            		<tr>
            			<th>购买时间：</th>
            			<td><?php echo $myPayBaseInfo['created']?></td>
            		</tr>
            		<tr>
            			<th>交易金额：</th>
            			<td><?php echo $myPayBaseInfo['order_total_price']?></td>
            		</tr>
            		            		<tr>
            			<th>收货地址：</th>
            			<td>
            			<?php
            			 echo $myPayBaseInfo['address']['province'];
            			 echo $myPayBaseInfo['address']['city'];
            			 echo $myPayBaseInfo['address']['district'];
            			 echo $myPayBaseInfo['address']['address'];
            			?>          			
            			&nbsp邮编(<?php echo $myPayBaseInfo['address']['postcode']?>)
            			&nbsp<?php echo $myPayBaseInfo['address']['username']?>
            			&nbsp<?php echo $myPayBaseInfo['address']['tel']?>
            			</td>
            		</tr>
            		
            		
            		</tbody>
            	</table>
            </div>
       </div>
       		<div class="pay clearfix">
       		<div class="count">
            	<span class="payment">余额支付</span><span class="balance">账户可用余额：<span><?php echo $myBalance[0]['balance']?></span>元</span>
            </div>
       		<div class="psd">
            	<label for="" class="ui_label">支付密码：</label>
                <div class="psd_containter clearfix">
                   
             <?php 
                
            	if($myPayPwdStatus == 10000){
            		
            ?>
                	<input type="password" class="payPwd  " value=""  /><span class="forgetPayPwd">忘记密码？</span>
             <?php 
             }else{
             ?>	
             		<input type="password" class="payPwd " value=""  disabled="disabled"/><span class="forgetPayPwd">忘记密码？</span>
           
             <?php  
             }
             ?>
                </div>
            </div>
            <?php 
            
            	if($myPayPwd){
            		
            ?>
             <div class="tips" style="display: ">初始支付密码为登陆密码,请及时<span class="tips1">修改</span></div>           
            <?php 
            	}
            		
            ?>
             <?php 
            
            	if(!$myPayPwdStatus == 20000){
            		
            ?>
             <div class="tips2" style="display: ">支付账户已被锁定，请<span class=tips1>找回密码</span></div>           
            <?php 
            	}else{
            		
           ?>
            <div class="tips2" style="display:none "></div>
           <?php 
            	}
            		
            ?>
           
            <div class="tips3" style="display:none "></div>        
       		<div class="orderFoot clearfix">
       			<a href="javascript:void(0);" class="J_sumbit">确认并付款</a>
       		</div>
       </div>
       </div>
    </div>
</div>



<!--success -->
<div class="light_box_bg" style="display:none;"></div>
<div class="light_box" style="display:none;">
	<div class="title">
    	<a href="#" class="title_close"></a>
    </div>
	<div class="content_wrap">
    	<div class="content">
        	<div class="success_tips">
            	<h3>恭喜你，支付成功</h3>
            </div>
        	<div class="action">
            	<a href="#" class="primary">已完成付款</a>
                <a href="#" class="cancel">跳转页面</a>
            </div>
        	<div class="more">
            	<p class="tag">
                	<a href="#" class="question">支付遇到问题</a><span class="line">|</span><a href="#" class="admin">联系管理员</a>
                </p>
            </div>
        </div>
    </div>
</div>






















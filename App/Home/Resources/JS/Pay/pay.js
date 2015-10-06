/**
 * 文件名称： pay.js 
 * 版 本 号： 0 
 * 创建日期： 01/14/2015 17:21:07 PM    	 	
 * 作	者： coco
 * 功能说明： 支付逻辑处理
 */
$(function (){//文档加载开始
	
	/*
	 * 查看订单详情
	 */
	
	$(".o_detail").click(function(){
		
		
		$(".o_list").slideToggle();
		
	});
	
	$('.payPwd').focus(function(){
		
		$('.tips3').hide();
	});
	
	/**
	 * 
	 * 错误次数检测
	 */
	//alert(errorTimes);
	if(errorTimes>=5){
		
		
		$('.tips2').show().html("支付账户已被锁定，请<span class=tips1>找回密码</span>");
		
	}
	if(errorTimes<5&&errorTimes>0){

		var leftTimes = 5-errorTimes ;
		$('.tips2').show().html("支付密码错误，剩余"+leftTimes+"次");
		
	}
	/**
	 * 确认并付款
	 */
	$('.J_sumbit').click(function(){
		
		var payPwd = $('.payPwd').val();
		//alert(payPwd);
		if(payPwd==''){
			$('.tips3').show().html("请输入支付密码");
			return;
		}
		if(errorTimes>=5)	return ;
		$.ajax({
     		url: "checkPayPwd",
     		type:'POST',
     		data:{
     			
                'payPwd':payPwd
     		},
     		success:function(data){
     		     
     			//alert(data);
     			if(data==0){     				
     				$('.light_box_bg').show();
     				$('.light_box').show();
     				$('.tips2').hide();			
     			}else if(data>=5){
     				
     				$('.payPwd').attr('value','');
     				$('.payPwd').attr('disabled','disabled');
     				$('.tips2').show().html("支付账户已被锁定，请<span class=tips1>找回密码</span>");
     				
     			}else if(data<5&&data>0){

     				var leftTimes = 5-data ;
     				$('.tips2').show().html("支付密码错误，剩余"+leftTimes+"次");
     				
     			}
     			
     		}
     	});
		
	});
});//文档加载函数结束	
	
	
	
	
	
	
	



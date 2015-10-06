/**
 * 文件名称： myorders.js 
 * 版 本 号： 0 
 * 创建日期： 01/16/2015 14:14:42 PM    	   		   	
 * 作	者： coco
 * 功能说明： 我的订单js
 */
$(function(){

	/**
	 * 
	 * 鼠标mousover  阴影+边框特效
	 */
	$('table').mouseover(function(){
		
		$(this).addClass('hover');
		
	}).mouseout(function(){
		
		$(this).removeClass('hover');
		
	});
	
	/*
	 * 取消订单 
	 * 01/16/2015 17:31:42 PM    		
	 * 
	 */
	var orderId = null;
     $('.cancelMyOrder').click(function(){
    	 
    	 alert("取消订单");
    	 $(".lightbox").show();
    	 $(".dialogLayer").show();
    	 orderId=$(this).attr('orderId');
     });
     
     $(".dialogBtn_right,.close").click(function(){
    	 
    	 $(".lightbox").hide();
    	 $(".dialogLayer").hide();
     });
     
     
    $(".dialogBtn_left").click(function(){

    	 $.ajax({
      		url: "cancelMyOrder",
      		type:'POST',
      		data:{
      			'orderId':orderId,               
      		},
      		success:function(data){
      			
      			//alert(data);
      			if(data){//成功取消
      				
      				//修改操作区
      				$('.cancelMyOrder').each(function(){
      					
      					if($(this).attr('orderId') == orderId){
      						
      						$(this).hide();
      					}
      					
      				});
      				$('.payment').each(function(){
      					
      					if($(this).attr('orderId') == orderId){
      						
      						$(this).hide();
      					}
      					
      				});
      				
      				//修改状态区
      				$('.tradingStatus').each(function(){
      					
      					if($(this).attr('orderId') == orderId){
      						
      						$(this).html('交易关闭');
      					}
      					
      				});
      				
      				 $(".lightbox").hide();
      		    	 $(".dialogLayer").hide();
      				
      			}
      		}
      	}); 
     });
	
	
     /**
 	 * 
 	 * 点击付款
 	 */
 	$('.payment').click(function(){	
 		//alert($(this).attr('orderId'));
 		window.location.href="../pay/pay?orderId="+$(this).attr('orderId');
 		
 	});
     
 	
 	/**
 	 * 点击确认收货
 	 * 
 	 * 1=>弹出确认弹框
 	 * 2=>取消，关闭,弹窗消失
 	 * 3=>点击确认，修改货物状态，修改显示
 	 * 
 	 */
 $('.confirm_receipt').click(function(){
    	 
    	 
    	 $(".lightbox").show();
    	 $(".dialogLayer").show();
    	 orderId=$(this).attr('orderId');
     });
     
     $(".dialogBtn_right,.close").click(function(){
    	 
    	 $(".lightbox").hide();
    	 $(".dialogLayer").hide();
     });
     
     
    $(".dialogBtn_left").click(function(){

    	 $.ajax({
      		url: "confirmGoods",
      		type:'POST',
      		data:{
      			'orderId':orderId,               
      		},
      		success:function(data){
      			
      			//alert(data);
      			if(data){//成功确认收货
      				
      				//修改操作区
      				$('.confirm_receipt').each(function(){
      					
      					if($(this).attr('orderId') == orderId){
      						
      						$(this).hide();
      					}
      					
      				});
      				
      				
      				//修改状态区
      				$('.tradingStatus').each(function(){
      					
      					if($(this).attr('orderId') == orderId){
      						
      						$(this).html('交易成功');
      					}
      					
      				});
      				
      				 $(".lightbox").hide();
      		    	 $(".dialogLayer").hide();
      				
      			}
      		}
      	}); 
     });
	
 	
	
});

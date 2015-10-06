/**
 * 文件名称： header.js 
 * 版 本 号： 0 
 * 创建日期： 02/05/2015 14:33:29 PM    			 
 * 作	者： coco
 * 功能说明： 头部js
 */
$(function(){
		
	/**
	 * 消息栏滑动效果
	 * 
	 */
	var timer=null;
	$('.topbaritem').mouseover(function(){
		
		$(this).next('div').slideDown(300);
	}).mouseout(function(){
		
		var obj=$(this);
	     timer=setTimeout(function(){
	    	
	    	 obj.next('div').slideUp(30);		 
		 },100);	
	});

	$('.topbarinfo').mouseover(function(){
		
		clearTimeout(timer);
		$(this).show();
	}).mouseout(function(){
		//alert('hi');
		//$(this).slideUp(300);
		$(this).hide();
		
	});
  
	$('.topbarinfo>a').mouseover(function(){
		
		$(this).addClass('on');
		
	}).mouseout(function(){
		
		$(this).removeClass('on');
		
	});
	
	

});


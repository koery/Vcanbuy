/**
 * 文件名称： banner.js 
 * 版 本 号： 0 
 * 创建日期： 02/04/2015 15:38:35 PM    	
	 		 
 * 作	者： coco
 * 功能说明： banner特效js
 */
$(function(){
		
	/**
	 * 图层渐变
	 * 
	 */

	var num = $('.banner>li').length;
	var timerFlashing;
	
	
	
	timerFlashing=setInterval(function(){
		
		var index_show = null;
		var obj = null;
		$('.banner').find('li').each(function(){
			
					
			if($(this).hasClass("banner_show")){
				
				index_show = $(this).index();
				obj = $(this);
				//$(this).fadeOut(500);
			}
		});
				
		//alert(index_show);
		if(index_show == 0){
			
			//alert('if');
			obj.animate({'z-index':"0",opacity:"0"},2000);
			$('.banner>li :last').addClass("banner_show");
			$('.banner>li :last').animate({'z-index':"2",opacity:"1"},2000);
			//alert($('.banner>li :first').attr('class'));
			obj.removeClass("banner_show");
			
			
		}else{
			//alert('else');
			obj.animate({'z-index':"0",opacity:"0"},2000);
			obj.prev('li').addClass("banner_show");
			obj.prev('li').animate({'z-index':"2",opacity:"1"},2000);
			//alert($('.banner_show').next('li').attr('class'));
			obj.removeClass("banner_show");
			
			
		}
				
			
		
		
	},5000);
	

});


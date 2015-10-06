/**
 * 文件名称： category.js 
 * 版 本 号： 0 
 * 创建日期： 01/23/2015 14:44:35 PM    		 
 * 作	者： coco
 * 功能说明： 目录特效
 */
$(function(){
	
/**
 * 目录特效
 */
	$(".sec_attr > li").mouseover(function(){
		$(".sec_attr").css("opacity","1");
		/**
		 * 检测是否已经有显示的subnav_content层
		 * 
		 */
//		var show=false;
//		$('.subnav_content').each(function(){
//			
//			if($(this).css('display')=='block'){
//				
//				show=true;
//			}
//				
//		});
//		//alert(show);
//		if(show){
//			
//		}else{
			
			$(this).addClass("unit_selected");
			//$(this).find('.subnav_content_wrap').show();
			$(this).find('.subnav_content_wrap').show();//.css({"width":"0px"}).animate({width:"500px"},1000);
			$(this).find('.subnav_content').show();
		//}
		
		
	}).mouseout(function(){
		$(this).removeClass("unit_selected");
		$(this).find('.subnav_content_wrap').hide();
		$(this).find('.subnav_content').hide();
		$(".sec_attr").css("opacity","0.5");
	});
	
	
	//$(".content").show().css({"width":"0px"}).animate({width:"500px"},1000);
	
});


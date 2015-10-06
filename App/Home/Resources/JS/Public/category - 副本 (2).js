/**
 * 文件名称： category.js 
 * 版 本 号： 0 
 * 创建日期： 01/23/2015 14:44:35 PM    		 
 * 作	者： coco
 * 功能说明： 目录特效
 */
$(function(){
	

	//目录特效
	$(".sec_attr > li").mouseover(function(){

	/**
	 * 左边侧鼠标移动变色
	 */
	$(".list_unit").mouseover(function(){

		$(this).addClass("unit_selected");

		$(this).children("div").show();
		
	}).mouseout(function(){
		$(this).removeClass("unit_selected");
		$(this).children("div").hide();
	});
	
	
	

		
	}).mouseout(function(){
		
		$(".list_unit").removeClass("unit_selected");
		
	});
	
	
	/*
	 * 右侧对应二级目录滑出
	 * 1 显示区域隐藏则滑出
	 * 2显示区域存在则对应二级目录显示
	 */
	$(".list_unit").mouseover(function(){
			
			var subnav_content_name=$(this).find('i').attr("class");
			if($('.category_content').css('display')=='none'){
				
				$('.subnav_content').each(function(){
					
					if($(this).attr('class').indexOf(subnav_content_name)>=0){
						//alert('hello');
						//$('.category_content').css({"width":"0px","visibility":"visible"}).stop().animate({width:"500px"},300);
						$('.subnav_content').hide();
						$(this).show();
						$('.category_content').show().css({"width":"0px"}).animate({width:"500px"},500);
					}
					
				});
			}else{
				
					$('.subnav_content').each(function(){
					
					if($(this).attr('class').indexOf(subnav_content_name)>=0){
						//alert('hello');
						//$('.category_content').css({"width":"0px","visibility":"visible"}).stop().animate({width:"500px"},300);
						$('.subnav_content').hide();
						$(this).show();
					}
					
				});	
			}
			
		});
	   $('.top_box').mouseout(function(){
			
		   $('.category_content').css('display','none');
			
		});

});


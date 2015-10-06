/**
 * 文件名称： search.js 
 * 版 本 号： 0 
 * 创建日期： 12/22/2014 13:50:25 PM    	
 * 作	 者： coco
 * 功能说明： 搜索栏处理
 */
$(function(){
	
	$('.t_text').focus(function(){	
		
		if($(this).val()=="输入商品名称")
			$(this).val('');	
	}).blur(function(){
		
		if($(this).val()=='')
			$(this).val("输入商品名称");	
		
	});
//	$('.sub_btn').click(function(){
//	
//
//	});
});

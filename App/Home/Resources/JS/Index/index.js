/**
 * 文件名称： index.js 
 * 版 本 号： 0 
 * 创建日期： 01/23/2015 14:44:35 PM    		 
 * 作	者： coco
 * 功能说明： 首页逻辑处理
 */
$(function(){
	
	/**
	 * 顶栏横幅鼠标移动 渐变
	 * 
	 */
	$('.category').mouseover(function(){

		$(this).animate({opacity:"0.6"},100);
		$(this).next('.up').show();
		var id=$(this).attr('id1');
		//alert($(this).attr('id1'));
		//alert(id);
		$('#'+id).slideDown();
		//$('.detail_list').slideDown();
	}).mouseout(function(){	
	   
		$(this).animate({opacity:"1"},100);	
		$(this).next('.up').hide();
		var id=$(this).attr('id1');
		$('#'+id).hide();
		
		//$('.detail_list').slideUp();
	});
	

});


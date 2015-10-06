/**
 * 文件名称： left.js 
 * 版 本 号： 0 
 * 创建日期：03/25/2015 09:17:34 AM    	 		 
 * 作	者： coco
 * 功能说明： 后台左侧边栏特效js
 */

$(function(){
	
	/*
	 * 调节左侧边栏的高度
	 */
	var client_height=0;
	client_height = document.documentElement.clientHeight || document.body.clientHeight;	  
	
    var y= client_height +'px';
	$('.sidebar-wrap').css("height",y);	
	/**
	 * 初始关闭，点击toggle
	 */
	$('.sidebar-list').children('li').children('a').click(function(){
		
		$(this).next('.sub-menu').slideToggle();
	});
	
})// 后台左侧边栏特效js结束
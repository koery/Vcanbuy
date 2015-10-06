/**
 * 文件名称： myHome.js 
 * 版 本 号： 0 
 * 创建日期： 01/15/2015 16:44:27 PM    		   	
 * 作	者： coco
 * 功能说明： 我的主页区共享部分的js
 */
$(function(){
	
	//alert("hi myHome js document");
	
	/**
	 * myHome 公共部分包括
	 * 
	 * header  seacher    顶部横栏  我的主页侧边栏
	 */
	
	
	/**
	 * 顶部横栏渐变
	 */
	
	$('.channel_nav_list').find('a').mouseover(function(){

			$(this).animate({opacity:"0.6"},100);	
	}).mouseout(function(){	
		   
			$(this).animate({opacity:"1"},100);	
	});
    
	
	/**
	 * 我的主页侧边栏
	 */
	
	//一级目录滑动
	$('.mu_nav_title').click(function(){
				
		
		//对每一个一级目录扫描，不含selected则收缩
		$('.mu_nav_con').each(function(){
					
			var show = 'false';//初始显示为FALSE;			
			$(this).find('li').each(function(){
								
				if($(this).attr("class")=='active')
					show = 'true';
			});
			
			if(show=='false'){
				
				$(this).slideUp();
			}
			
		});
		
		if($(this).next('.mu_nav_con').css('display')=='none')
			$(this).next('.mu_nav_con').slideDown();//本条展开
	});
	
	
	//二级目录点击改变颜色
	$('.mu_nav_con>li').click(function(){
		
		$('.mu_nav_con>li').removeClass('active');
		$(this).addClass('active');
		
		//对每一个一级目录扫描，不含selected则收缩
		$('.mu_nav_con').each(function(){
					
			var show = 'false';//初始显示为FALSE;			
			$(this).find('li').each(function(){
								
				if($(this).attr("class")=='active')
					show = 'true';
			});
			
			if(show=='false'){
				
				$(this).slideUp();
			}
			
		});
	});
	
	/**
	 * 边侧栏跳转
	 * 01/19/2015 09:25:10 AM    	
	 */
	    
     $('.mu_nav_con>li').click(function(){
    	 
    	 
    	 window.location.href="../myorders/"+$(this).attr('id'); 
     });
	
});

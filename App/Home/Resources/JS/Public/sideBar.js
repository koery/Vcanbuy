/**
 * 文件名称： sideBar.js 
 * 版 本 号： 0 
 * 创建日期： 02/06/2015 14:52:50 PM    	 	
 * 作	 者： coco
 * 功能说明： 边侧栏处理
 */
$(function(){
	
	/**
	 * sideBarItem
	 * 动画效果
	 * 
	 */
	$('.sideBarItem').bind("mouseenter",function(event){
				
		$(this).find('.hover_tip').css({"left":"-150px","visibility":"visible","opacity":"0.5"})
		.stop().animate({left:"-92px",opacity:"1"},300);
		event.stopPropagation();
		
	}).bind("mouseleave",function(event){
		
		$(this).find('.hover_tip').stop().animate({left:"-150px",opacity:"0"},300,function(){
			
			$(this).css({"left":"-92px","visibility":"hidden","opacity":"0"});
		})
		event.stopPropagation();		
	});
	
	

	

	/*侧边栏点击弹出登陆框*/
		var $oli=$('.ibar_main_panel').find('li');
		var num=$oli.length;
		var scroll_top = 0;

		  window.onscroll = function () { 
			   scroll_top = document.documentElement.scrollTop || document.body.scrollTop;
			  if (scroll_top > 0) { 

				  $(".returnToTop").show();
			  } else { 
				  $(".returnToTop").hide();
			  } 
			}
		  
		  
		$('.ibar_main_panel').find('li').each(function() {
			
			/*
			 * 手机客户端 回滚图标不显示登陆
			 */
			
			$(this).click (function(event){
				/*
				 * hasLogIn=ture 开启默认事件
				 * 否则 关闭默认事件
				 */
				
				
				if(hasLogIn){
				
					
				}else{
					
					
				event.preventDefault(); 
			
					
				//event.preventDefault();
				//alert('hi');
				//window.event.returnValue = false;
//				alert($(this).attr('class'));
//				alert($(this).attr('class').indexOf('ibar_client'));
//				alert($(this).attr('class').indexOf('ibar_toTop'));
				if($(this).attr('class').indexOf('ibar_client')>=0||$(this).attr('class').indexOf('ibar_toTop')>=0){
				//	alert('hi');
					return ;
				};
				if($(this).index()==1){	
					var y= $(this).offset().top - scroll_top+10 +'px';
					$(this).parent().parent().next('.ibar_login_box').show().css("top",y);	

				}else{
					var y= $(this).offset().top - scroll_top +'px';
					$(this).parent().parent().next('.ibar_login_box').show().css("top",y);	
				}
					
				}

			});
					
		})


		
		$('.ibar_main_panel').find('li').each(function() {
			$(this).mouseleave (  
				function(){$(this).parent().parent().next('.ibar_login_box').hide();}
			)
	    });
		
		$('.ibar_login_box').mouseover(function(){
			$(this).show();	
			
		})
		
		
		$('.ibar_login_box').mouseout(function(){
			$(this).hide();	
		})
	
	/**
	 * 返回顶部按钮
	 * 
	 */
	  
	
	    $(".returnToTop").click(function(){

		  $('body,html').animate({ scrollTop: 0 }, 400); 
		  return false; 
   	
	    });
	    
	    
})//sideBar.js 结束



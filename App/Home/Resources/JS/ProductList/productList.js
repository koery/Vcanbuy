/**
 * 文件名称： productInfo.js 
 * 版 本 号： 0 
 * 创建日期： 2014.12.15 
 * 作	者： MISS chen,coco
 * 功能说明： 产品详情页逻辑处理
 */

$(function(){
	
//	/**
//	 * 一级目录区鼠标点击效果
//	 * 
//	 */
//	$('.category1>li').click(function(){
//		
//		$('.category1>li').removeClass('on');
//		$(this).addClass('on');
//		
//		var category1=$(this).attr('category1');
//		$('.clearfix').each(function(){
//
//				/**
//				 * 隐藏非选中子项
//				 * 
//				 */
//				$('.nav_section').each(function(){
//					
//					$(this).hide();
//					if($(this).attr('category1')==category1)
//						$(this).show();		
//				});
//				
//			
//			
//		});
//			
//		
//	});
			
//	/**
//	 * 三级目录区鼠标点击效果
//	 * 
//	 */
//	$('.clearfix>dd').click(function(){
//	
//		$('.clearfix>dd').find('a').removeClass('active');
//		$(this).find('a').addClass('active');
//	});
	
	/**
	 * 
	 * 初始选中 一级和三级目录
	 * 
	 * 选中一级目录  一级目录 加上class 
	 * 选中二级目录  该项parent 加上class
	 * 选中三级目录  本项 及本项的一级目录加上对应class
	 */	
	//alert(KEY+":"+VALUE);
	if(KEY == 'category_1_code'){
		
		$('.category1>li').each(function(){
			
			if($(this).attr('category1')==VALUE){
				$(this).addClass('on');
			    //alert($(this).find('a').html());
			    $('title').html($(this).find('a').html()+"-Vcanbuy");
			    $('h3').html($(this).find('a').html());
			}
		});	
		/**
		 * 隐藏非选中子项
		 * 
		 */
		$('.nav_section').each(function(){
			
			$(this).hide();
			if($(this).attr('category1')==VALUE)
				$(this).show();		
		});
		
		
	}else if(KEY == 'category_2_id'){
		
		
		$('.clearfix').each(function(){
			
			if($(this).attr('category2')== VALUE){
				
				var category1=$(this).parent().attr('category1');
				$('.category1>li').each(function(){
					
					if($(this).attr('category1')==category1)
						$(this).addClass('on');
						
					
				});	
				/**
				 * 隐藏非选中子项
				 * 
				 */
				$('.nav_section').each(function(){
					
					$(this).hide();
					if($(this).attr('category1')==category1)
						$(this).show();		
				});
				
				 //alert($(this).find('a').html());
			    $('title').html($(this).find('a').html()+"-Vcanbuy");
			    $('h3').html($(this).find('a').html());
				
			}
			
		});
			
	}else if(KEY == 'category_3_id'){
		
		$('.clearfix>dd').each(function(){
			
			if($(this).attr('category3')==VALUE){
				
				$(this).find('a').addClass('active');
				//alert($(this).attr('class'));
				var category1=$(this).attr('category1');
				$('.category1>li').each(function(){
					
					if($(this).attr('category1')==category1)
						$(this).addClass('on');
					
				});	
				/**
				 * 隐藏非选中子项
				 * 
				 */
				$('.nav_section').each(function(){
					
					$(this).hide();
					if($(this).attr('category1')==category1)
						$(this).show();		
				});
				
				//alert($(this).find('a').html());
			    $('title').html($(this).find('a').html()+"-Vcanbuy");
			    $('h3').html($(this).find('a').html());
				
			}
			
		});
			
	}
	
	
	
	
	
})//全局结束








/**
 * 文件名称： productInfo.js 
 * 版 本 号： 0 
 * 创建日期： 2014.12.15 
 * 作	者： MISS chen,coco
 * 功能说明： 产品详情页逻辑处理
 * 
 * 文件名称： productInfo.js 
 * 版 本 号： 0.1 
 * 创建日期： 2014.12.16
 * 作	者：  coco
 * 修改内容： i.详情选择图片对应大图
 * 
 * 文件名称： productInfo.js 
 * 版 本 号： 0.2 
 * 创建日期： 2014.12.17
 * 作	者：  coco
 * 修改内容： i.选择小图对应大图切换
 * 
 * 文件名称： productInfo.js 
 * 版 本 号： 0.3 
 * 创建日期： 2014.12.18
 * 作	者：  coco
 * 修改内容： i.选择条件
 * 
 * 
 * 文件名称： productInfo.js 
 * 版 本 号： 0.3.1 
 * 创建日期： 12/23/2014 14:32:59 PM    	
 * 作	者：  coco
 * 修改内容： i.小bug
 */

$(function(){
	
	//顶部横栏渐变
	$('.channel_nav_list').find('a').mouseover(function(){

			$(this).animate({opacity:"0.6"},100);	
	}).mouseout(function(){	
		   
			$(this).animate({opacity:"1"},100);	
	});
    
	
    //详细图片对应切换大图js部分 12/16/2014 20:35:45 PM    	
 	
	$('.thumb').find('li').siblings('li').removeClass('imgDetail');
	$('.thumb').find('li').mouseover(function(){
		
		var num=$(this).index();
		$(this).siblings('li').removeClass('imgDetail');
		$(this).addClass('imgDetail');
		$('.bigbox').find('table').eq(num).siblings("table").css("display","none");
		$('.bigbox').find('table').eq(num).css("display","block");
	});
 	
	//选择小图对应大图切换 12/17/2014 19:46:54 PM    	
 	
   $('.clearfix>li').click(function(){
		//alert("hello");
	   //alert( $(this).attr('class'));
	   if($(this).attr('class').indexOf("nofocus") >= 0)
	    {
	       return false;
	    }
	  
	  
	   if($(this).attr('class').indexOf("colorImg") >= 0){
	    $(this).siblings().removeClass('imgactive');
	    $(this).siblings().removeClass('wordactive');
		$(this).toggleClass('imgactive');
	   }
	   if($(this).attr('class').indexOf("wordImg") >= 0){
		   $(this).siblings().removeClass('wordactive');
		   $(this).siblings().removeClass('imgactive');
		   // alert( $(this).attr('class'));
			$(this).toggleClass('wordactive');    
	   }
	   if($(this).attr('class').indexOf("letDig") >= 0){
		   $(this).siblings().removeClass('wordactive');
		   $(this).siblings().removeClass('imgactive');
		   //alert( $(this).attr('class'));
			$(this).toggleClass('wordactive');    
	   }
		// alert( $(this).attr('class'));
		var value=$(this).attr('id');		
		if(value){
		$('.bigbox').find("table").each(function(){
			
			if($(this).attr('id')==value){
				//alert($(this).attr('id'));
				$('.imgshow').css("display","none");
				$('.imgshow').removeClass('selected');
				$(this).css("display","block");
				$(this).addClass('selected');
				
			}
			
		});
		}
	});
	
   //选择条件12/18/2014 09:33:47 AM  
   var condition=new Array();
   var numOfSelect=0;
   $('.clearfix>li').click(function(){
	//alert("welcome to sku!");
	   if($(this).attr('class').indexOf("nofocus") >= 0)
	    {
	       return false;
	    }
	     
		//当前选择状态数组
		var value1=$(this).attr('value1');
		var value2=$(this).attr('value2');
		//alert(value1+':'+value2);
		//alert("a="+a)
		//for(i=0;i<numOfSku;i++)
		   // alert(condition[i]);
		if($.inArray(value1, condition)>=0){
			if(condition[$.inArray(value1, condition)+1]==value2){	
				condition[$.inArray(value1, condition)+1]=null;
				
				for(j=0;j<listOfSku;j++){
					if($.inArray(value2, sku_code[j])==-1){
			 			 for(k=0;k<numOfSku;k++){			 				 			 				 			 				 
			 					$("#"+sku_code[j][k]).removeClass('nofocus');
                                                             

			 			 }
			 		 }	
			 	}
				
				
				
				
			}
			
			else condition[$.inArray(value1, condition)+1]=value2;
			
		}	
		else 
			{
			condition.push(value1,value2);
			}
		var state=new Array();
		for(i=1;i<numOfSku*2;i+=2){
			if(condition[i]!=null)
		      state.push(condition[i]);
			
		}
		//if(state.length=='')
			//$(".choose").find(".item").siblings(".item").css("display","block");
		var str='';
		for(i=0;i<numOfSku;i++)
			{
		     str +=state[i];
			}
		//alert("用户选择条件str="+str);//选择条件
//库存数量随着状态改变 12/19/2014 14:49:17 PM  
		 numOfSelect=state.length;
		 var qtymark=new Array();
	 		for(i=0;i<listOfSku;i++){
	 			
	 			for(j=0;j<state.length;j++){
	 				
	 				if($.inArray(state[j], sku_code[i])>=0);
	 				
	 				else break;
	 			}
	 			
	 			if(j==state.length){
	 				
	 				qtymark.push(i);
	 			}
	 		}
	 		numOfqty=0;	 		
	 		for(i=0;i<qtymark.length;i++){
	 			numOfqty += parseInt(qty[qtymark[i]]);
		        
	 		}
	 		$('#qty').html(numOfqty);
//根据选择状态数组查询显示内容	
		//alert('row='+row);
		//alert('条件表d='+d);
		//for(i=0;i<row;i++)
		 //alert(d[i]);
		 //alert(d[i]);
		//document.getElementsByName("item").style.display='none';
		//$(".choose").find(".item").siblings(".item").css("display","none");
		var showBox=new Array();
		
		 for(i=0;i<numOfSku;i++){
		 //对状态表的每一条数据处理
			 var showBoxTemp=new Array();
			 if(i==0){
		 	if(state[i]!=null){
		 		 //alert("当前处理状态"+state[i]);
		 		var str1=state[i].substring(0,2);
		 		//alert(str);
				 //alert(state[i]);
		 		$('.clearfix>li').each(function(){
		 			var val=$(this).attr("value1");
		 			//alert("当前状态分类"+val);
		 			if(val==str1)
		 				//$(this).css("display","none");
		 				showBox.push($(this).attr("value2"));
		 			
		 		});
		 	
		 		
		 	for(j=0;j<listOfSku;j++){
		 		//alert(state[i]+'：'+d[j])
		 		 if($.inArray(state[i], sku_code[j])>-1){
		 			 for(k=0;k<numOfSku;k++){
		 				 //alert(d[j][k]);
		 				 if(sku_code[j][k]!=state[i]){
	 					 
		 					 //document.getElementById(d[j][k]).style.display='block';
		 					showBox.push(sku_code[j][k]);
		 					
		 					
		 				 }
		 				 
		 			 }
		 		 }	
		 	}
		 }
		 	//alert("showBox.lenth="+showBox.length);	
		 	
		 		//alert(showBox.join(":"));
	  }
			 else {
				 
				
				 if(state[i]!=null){
					
			 		 //alert("当前处理状态"+state[i]);
			 		var str1=state[i].substring(0,2);
			 		//alert(str);
					 //alert(state[i]);
			 		$('.clearfix>li').each(function(){
			 			var val=$(this).attr("value1");
			 			//alert("当前状态分类"+val);
			 			if(val==str1)
			 				//$(this).css("display","none");
			 				showBoxTemp.push($(this).attr("value2"));
			 			
			 			
			 		});
			 	
			 		
			 	for(j=0;j<listOfSku;j++){
			 		//alert(state[i]+'：'+d[j])
			 		 if($.inArray(state[i], sku_code[j])>-1){
			 			 for(k=0;k<numOfSku;k++){
			 				 //alert(d[j][k]);
			 				 if(sku_code[j][k]!=state[i]){
		 					 
			 					 //document.getElementById(d[j][k]).style.display='block';
			 					showBoxTemp.push(sku_code[j][k]);
			 					
			 					
			 				 }
			 				 
			 			 }
			 		 }	
			 	}
			 }	
				
		      if(showBoxTemp.length!=0)	{
		    	    //alert(showBoxTemp.join(":"));
					 showBox=arrayIntersection ( showBox,showBoxTemp);
					 //alert(showBox.join(":"));
		      }
		      //alert("showBox.lenth111="+showBox.length);
		     // alert("showBoxTemp.lenth="+showBoxTemp.length);
		      function arrayIntersection ( a, b )
				 {
		    	   // alert("are you  come in??");
				     var ai=0, bi=0;
				     var result = new Array();
				     for(ai=0;ai<a.length;ai++)
				    	 for(bi=0;bi<b.length;bi++){
				    		 //alert(a[ai]+":"+b[bi]);
				    		 if(a[ai]==b[bi]){
				    			 //alert(a[ai]+":"+b[bi]);
				    		     result.push(a[ai]);
				    		     //alert(result.join(":"));
				    		 }
				    	 }
				     return result;
				 }
  }	 
//求交集			
			// alert("showBox.lenth="+showBox.length);
			 //alert("showBoxTemp.lenth=");
			 
			 
			 
			
			
			 
//			 
	 }
		
		// alert("showBox.lenth=");
		 $('.clearfix>li').addClass('nofocus');
		
		 for(t=0;t<showBox.length;t++){
			
			 $('.clearfix>li').each(function(){
		 			var val=$(this).attr("value2");
		 			
		 			if(val==showBox[t])
		 				$(this).removeClass('nofocus');		
                                      
		 		});
			 	 
		 }
		 
		 if(showBox.length==0)
			 $('.clearfix>li').removeClass('nofocus'); 
	   
		 
		 if(numOfSelect==numOfSku){
			 
			
			    for(i=0;i<listOfSku;i++){
		 			
		 			for(j=0;j<numOfSelect;j++){
		 				
		 				if($.inArray(state[j], sku_code[i])>=0);		 							 				
		 				else break;
		 			}
		 			
		 			if(j==numOfSelect){		 				
		 				skuId=sku_id[i];
		 				//alert(skuId);
		 				//alert(price[skuId]['sales_price']);
		 				//alert(price[skuId]['old_price']);
		 				$('.price_y').html(price[skuId]['old_price']);
		 				$('.price_ut').html(price[skuId]['sales_price']);
		 				
		 			}
		 		}
			    
		 }
		 
		 if($('.goods_important').attr('class').indexOf("goods_pannel") >= 0){
			 
			 if(checkSku()){
				 
				 $('.pannel_ok').css('display','block');
				 $('.pannel_tips').css('display','none');
				 	
			 }
			 else{
				 $('.pannel_action').css('display','block');
				 $('.pannel_action').css('display','block');
				 $('.pannel_ok').css('display','none');
			 }
		 }
		 
		 
		 
   });
   
   //选择数量12/18/2014 16:35:04 PM    	
	
   $('.add').click(function(){
	   var qtynum=$('.qty').attr('value');
	   qtynum++;
	   //alert($('#qty').text());
	   var qtyall=$('#qty').html();
	   //qtyall=document.getElementById('qty').html();
	   //alert("qtyall"+qtyall);
	   if(qtynum>qtyall){
		   $('.goods_stock_tip').css('display','block');
		   return;
	   }
	   $('.qty').attr('value',qtynum);
	   //alert($('.qty').attr('value'));
   });
   $('.reduce').click(function(){
	   $('.goods_stock_tip').css('display','none');
	   var qtynum=$('.qty').attr('value');
	   qtynum--;
	   if(qtynum<=0)
		   qtynum=1;
	   $('.qty').attr('value',qtynum);
	   
	   //alert($('.qty').attr('value'));
   });
   
   $('.qty').focus(function(){	 
	   //alert("hh");
	   $(this).val(null); 
	   $('.goods_stock_tip').css('display','none');
   }).blur(function(){
	   //alert($(this).val());
	   if($(this).val()==''){
		   $(this).val('1');
		   return ;
	   }
	   else {
		   
		   num=parseInt($(this).val());
		   //alert("num"+num);
		   //alert(positiveCheck(num));
		   if(!positiveCheck(num)){
			   $(this).val('1');
			   return;	   
		   }		   
		   
		     if($('.goods_important').attr('class').indexOf("goods_pannel") >= 0){
				 
				 if(checkSku())
					 $('.pannel_ok').css('display','block');			
				 else{
					 $('.pannel_action').css('display','block');
					 $('.pannel_ok').css('display','none');
				 }
			 }
		     
		     //alert(checkSku());
		     if(checkSku())
		    	 $('.goods_stock_tip').css('display','none');
			
	   }	   
	  
   });
   
   
  
 	
 	
 	
	//取消选框 12/19/2014 17:49:18 PM    	
 	
 	$('.pannel_title').click(function(){
 		$('.goods_important').removeClass('goods_pannel');
 		$('.pannel_action').css('display','none');
 		$('.pannel_title').css('display','none');
 		$('.goods_buy').css('display','block');
 		
 	});
	
	
	
	
   //自然数检测函数
   function positiveCheck(num){
	   
	   if(  /^([0-9]*[1-9][0-9]*)$/.test(num)) return true;
	   else return false;   
   }
     
   //属性选择是否完备检测  12/20/2014 09:44:28 AM    	
	function checkSku(){
		
		 var qtyall=$('#qty').html();
		 var qtynum=$('.qty').val();
		// alert(qtyall);
		//alert(qtynum);
	    if(numOfSelect<numOfSku){
	    	//$('.pannel_action').css('display','block');
	    	return false;
	    	
	    }
	    else if(parseInt(qtynum)>parseInt(qtyall)){	 		
			$('.goods_stock_tip').css('display','block');
		     return false;
		    }
	    else return true;
	}
   
	
	
	//确认点击  直接加入购物车
	$('.pannel_ok').click(function(){		
		
		$('.goods_important').removeClass('goods_pannel');
 		$('.pannel_action').css('display','none');
 		$('.pannel_title').css('display','none');
 		$('.goods_buy').css('display','block');
		$('.light_box').css('display','block');	
		
		

	    $('.delay').css('display','block'); 
		$('.lg_title').css('display','none');
		$('.lg_con').css('display','none');
	//加入到购物车ajax开始 12/20/2014 11:27:55 AM    	
		
		 var qtynum=$('.qty').val();
		 
		 if($('.fav').attr('class').indexOf("mark") >= 0){
				 
				 var favNotes=true;
			 }	
			 else favNotes=false;
			 
			if($('.collect').attr('class').indexOf("mark") >= 0){
				
				var collectNotes=true;
		 }	
		 else collectNotes=false;
		 
		//获得选择的产品对应的图片路径
			var img_path;
		   $('.imgshow').each(function(){
				//alert("hello");
			   if($(this).attr('class').indexOf("selected") >= 0){
				   img_path=$(this).find('img').attr('src');					 
			   }
		   });
		   var product_title_cn=$('.goods_title').html();  
//	    alert(product_title_cn);
//		alert("skuId:"+skuId+"product_id"+product_id+"qtynum"+qtynum+"favNotes"+favNotes+"collectNotes"+collectNotes);
//		alert("img_path"+img_path);
			$.ajax({
				url: "addToCart",
				type:'POST',
				data: {
					"user_id":1,
					"sku_id":skuId,
					"product_id":product_id,
					"qty":qtynum,
					'img_path':img_path,
					'product_title_cn':product_title_cn,
					"loves":favNotes,
				    "collect":collectNotes,
					
					},
					success:function(data){ 
					     // alert(data);
					    $('.delay').css('display','none'); 
		 				$('.lg_title').css('display','block');
		 				$('.lg_con').css('display','block');
					
					}         
		                      
		                     
			});
		
		
		
		
 	});


	//加入购物车 12/19/2014 16:47:05 PM    	
 	$('.buycart').click(function(){
 		
 		//alert(numOfSelect+":"+numOfSku);
 		if(numOfSelect<numOfSku){
 			$('.pannel_ok').css('display','none');
 			$('.goods_important').addClass('goods_pannel');
 			$('.pannel_action').css('display','block');
 			$('.goods_buy').css('display','none');
 			$('.pannel_title').css('display','block');
 			
 		}
 		else{
 			 var qtyall=$('#qty').html();
 			 var qtynum=$('.qty').val();
 			  //alert(qtyall);
 			  //alert(qtynum);
 			 if(parseInt(qtynum)>parseInt(qtyall)){
		 		  
 				   $('.goods_stock_tip').css('display','block');
 				   return;
 			   }
 			 else{
 				
 				$('.light_box').css('display','block'); 
 				$('.delay').css('display','block'); 
 				$('.lg_title').css('display','none');
 				$('.lg_con').css('display','none');
 		//加入到购物车ajax开始 12/20/2014 11:27:55 AM    	
 				
 				 if($('.fav').attr('class').indexOf("mark") >= 0){
 					 
 					 var favNotes=true;
 				 }	
 				 else favNotes=false;
 				 
 				if($('.collect').attr('class').indexOf("mark") >= 0){
 	 				
 					var collectNotes=true;
				 }	
				 else collectNotes=false;
 				
 				
 				
 				
 				
 				//获得选择的产品对应的图片路径
 				var img_path;
 			   $('.imgshow').each(function(){
 					//alert("hello");
 				   if($(this).attr('class').indexOf("selected") >= 0){
 					   img_path=$(this).find('img').attr('src');					 
 				   }
 			   });
 				
 			  var product_title_cn=$('.goods_title').html();
 			 //  alert(product_title_cn);
 			  // alert("skuId:"+skuId+"product_id"+product_id+"qtynum"+qtynum+"favNotes"+favNotes+"collectNotes"+collectNotes);
 			  //alert("img_path"+img_path);
 				
 				
 				
 				
 				$.ajax({
 					url: "addToCart",
 					type:'POST',
 					data: {
 						"user_id":1,
 						"sku_id":skuId,
 						"product_id":product_id,
 						"qtynum":qtynum,
 						'img_path':img_path,
 						'product_title_cn':product_title_cn,
 					    "loves":favNotes,
 					    "collect":collectNotes,
 						},
 						success:function(data){ 
 						     //alert(data);
 						    $('.delay').css('display','none'); 
 			 				$('.lg_title').css('display','block');
 			 				$('.lg_con').css('display','block');
 						
 						}         
 			                       			                     
 				});
 				 
 				
 				
 				 
 		//加入到购物车结束		 
 				 
 			 }
 			
 		} 				
 	});
 	
	//取消购物车选框 12/19/2014 17:50:49 PM    	
 	$('.lg_close,.shopping').click(function(){		
 		$('.light_box').css('display','none');				
 	});
 	//去结算 到我的购物车to_cart
 	$('.to_cart').click(function(){		
 		window.location.href="../cart/cart";				
 	});
 	
 	 //喜欢12/19/2014 13:58:39 PM    	
	$('.fav').click(function(){
		
		var loves=parseInt($('.loves').html());
		if($(this).attr('class').indexOf("mark") >= 0){
			loves--;
			$('.loves').html(loves);
		}
		else {
			
			loves++;
			$('.loves').html(loves);
		}
		
		$(this).toggleClass('mark');
		
		
	});
	
	//收藏夹 12/19/2014 14:39:01 PM    	
 	
	$('.collect').click(function(){					
			$(this).toggleClass('mark');			
		});
	
 	
 	
})//全局结束







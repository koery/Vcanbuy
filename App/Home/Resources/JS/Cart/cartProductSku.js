/**
 * 文件名称： cartProductSku.js 
 * 版 本 号： 0 
 * 创建日期： 12/30/2014 19:52:07 PM    		   	 	
 * 作	者：  coco
 * 功能说明： 购物车重新编辑产品属性逻辑处理
 */ 

$(function(){

	//  小图 切换到对应大图12/30/2014 19:53:10 PM    	
 	
	$("dd>a").click(function(){
		
		//alert($(this).attr("class"));
		var img_sku=$(this).attr("class");
		//alert(img_sku);
		$(".img").each(function(){	
			
			//alert($(this).attr("sku"));
			if(img_sku.indexOf($(this).attr("sku"))>=0){
				//alert($(this).attr("sku"));
				//alert(img_sku);
				$(".img").hide();
				$(this).show();
				return;
			}
	
		});
	});
	
	
    //点击属性  选中框变化
	
	$("dd>a").click(function(){
		
		//alert($(this).attr("class"));
		
		if($(this).attr('class').indexOf("nofocus") >= 0)
	    {
	       return false;
	    }
		
		if($(this).attr("class").indexOf("colorImg")>=0){			
		  $(this).siblings().removeClass("colorImg_active");
		  $(this).siblings().removeClass("size_active");
		  $(this).toggleClass("colorImg_active");
		}
		else{
			$(this).siblings().removeClass("size_active");
			$(this).siblings().removeClass("colorImg_active");
			$(this).toggleClass("size_active");
		}
		  		
		});
	
	
	
	 //选择条件 01/02/2015 13:58:21 PM  
	
	var condition=new Array();	
	var cartId=null;
	var productId=null;
	 var numOfSelect=0;
	 var sales_price=null;
	 
	 var numOfProduct=0;
	$(".order_detail_info").click(function(){//每次打开编辑区
		//alert("hi");
		 var arr1=new Array();//重新初始化数组
		 cartId=$(this).next("div.order_detail_edit").attr("cartId");
		 productId=$(this).next("div.order_detail_edit").attr("productId");	
		 numOfSelect=0;
		// alert(code_dataOfMycart[cartId]);
		 arr1=code_dataOfMycart[cartId];
		 //alert(arr1);
		 //alert(arr1.length);
		 condition=new Array();
		 for(i=0;i<arr1.length;i++)
			 for(j=0;j<2;j++)
				 condition.push(arr1[i][j]);
		 
		//alert(condition);
		
		//初始加上选中框
		$("dd>a").each(function(){
			 if($(this).attr("cartId")==cartId){
				 
				 for(i=1;i<condition.length;i+=2){
					 
					 if($(this).attr("value2")==condition[i]){
						   if($(this).attr("class").indexOf("colorImg")>=0){			
							  $(this).siblings().removeClass("colorImg_active");
							  $(this).siblings().removeClass("size_active");
							  $(this).addClass("colorImg_active");
							}
							else{
								$(this).siblings().removeClass("size_active");
								$(this).siblings().removeClass("colorImg_active");
								$(this).addClass("size_active");
							}
					 }
				 }
			 }
		});
		
		//初始化 显示默认大图
		$(".img").hide();
		$(".imgDefault").show();
		
		
		// alert(condition.length);
		// for(i=0;i<=code_dataOfMycart[cartId].length;i++)
		// alert(condition);
	     //alert(cartId+":"+productId);
	     
	     //alert(listOfSku[productId]);
	     //alert(numOfSku[productId]);
	     //alert(sku_code[productId][1][1]);
		 
//		//当前选择状态数组
//		var value1=$(this).attr('value1');
//		var value2=$(this).attr('value2');
		//alert(value1+':'+value2);
		//alert("a="+a)
		//for(i=0;i<numOfSku;i++)
		   // alert(condition[i]);
//		if($.inArray(value1, condition)>=0){
//			if(condition[$.inArray(value1, condition)+1]==value2){	
//				condition[$.inArray(value1, condition)+1]=null;
//				
//				for(j=0;j<listOfSku[productId];j++){
//					if($.inArray(value2, sku_code[productId][j])==-1){
//			 			 for(k=0;k<numOfSku[productId];k++){
//			 				    if($(this).attr("cartId")==cartId)
//			 					$("#"+sku_code[productId][j][k]).removeClass('nofocus');
//                                                             
//
//			 			 }
//			 		 }	
//			 	}
//				
//				
//				
//				
//			}
//			
//			else condition[$.inArray(value1, condition)+1]=value2;
//			
//		}	
//		else 
//			{
//			condition.push(value1,value2);
//			}
		var state=new Array();
		for(i=1;i<numOfSku[productId]*2;i+=2){
			if(condition[i]!=null)
		      state.push(condition[i]);
			
		}
		//if(state.length=='')
			//$(".choose").find(".item").siblings(".item").css("display","block");
		var str='';
		for(i=0;i<numOfSku[productId];i++)
			{
		     str +=state[i];
			}
		//alert("用户选择条件str="+str);//选择条件
//库存数量随着状态改变 12/19/2014 14:49:17 PM  
		 numOfSelect=state.length;
		 
//根据选择状态数组查询显示内容	
		//alert('row='+row);
		//alert('条件表d='+d);
		//for(i=0;i<row;i++)
		 //alert(d[i]);
		 //alert(d[i]);
		//document.getElementsByName("item").style.display='none';
		//$(".choose").find(".item").siblings(".item").css("display","none");
		var showBox=new Array();
		
		 for(i=0;i<numOfSku[productId];i++){
		 //对状态表的每一条数据处理
			 var showBoxTemp=new Array();
			 if(i==0){
		 	if(state[i]!=null){
		 		 //alert("当前处理状态"+state[i]);
		 		var str1=state[i].substring(0,2);
		 		//alert(str);
				 //alert(state[i]);
		 		$("dd>a").each(function(){
		 			 if($(this).attr("cartId")==cartId){
		 			var val=$(this).attr("value1");
		 			//alert("当前状态分类"+val);
		 			if(val==str1)
		 				//$(this).css("display","none");
		 				showBox.push($(this).attr("value2"));
		 			 }
		 		});
		 	
		 		
		 	for(j=0;j<listOfSku[productId];j++){
		 		//alert(state[i]+'：'+d[j])
		 		 if($.inArray(state[i], sku_code[productId][j])>-1){
		 			 for(k=0;k<numOfSku[productId];k++){
		 				 //alert(d[j][k]);
		 				 if(sku_code[productId][j][k]!=state[i]){
	 					 
		 					 //document.getElementById(d[j][k]).style.display='block';
		 					showBox.push(sku_code[productId][j][k]);
		 					
		 					
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
			 		$("dd>a").each(function(){
			 		  if($(this).attr("cartId")==cartId){
			 			var val=$(this).attr("value1");
			 			//alert("当前状态分类"+val);
			 			if(val==str1)
			 				//$(this).css("display","none");
			 				showBoxTemp.push($(this).attr("value2"));
			 			 }
			 			
			 		});
			 	
			 		
			 	for(j=0;j<listOfSku[productId];j++){
			 		//alert(state[i]+'：'+d[j])
			 		 if($.inArray(state[i], sku_code[productId][j])>-1){
			 			 for(k=0;k<numOfSku[productId];k++){
			 				 //alert(d[j][k]);
			 				 if(sku_code[productId][j][k]!=state[i]){
		 					 
			 					 //document.getElementById(d[j][k]).style.display='block';
			 					showBoxTemp.push(sku_code[productId][j][k]);
			 					
			 					
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
		 $("dd>a").each(function(){
			 if($(this).attr("cartId")==cartId)
				 $(this).addClass('nofocus');
		 });
		
		 for(t=0;t<showBox.length;t++){
			
			 $("dd>a").each(function(){
				 if($(this).attr("cartId")==cartId){
		 			var val=$(this).attr("value2");
		 			
		 			if(val==showBox[t])
		 				$(this).removeClass('nofocus');		
				 }                 
		 		});
			  	 
		 }
		 
		 if(showBox.length==0){
			 $("dd>a").each(function(){
				 if($(this).attr("cartId")==cartId)
					 $(this).removeClass('nofocus');
			 });
		 }
		 
		 if(numOfSelect==numOfSku[productId]){
			 
				
			    for(i=0;i<listOfSku[productId];i++){
		 			
		 			for(j=0;j<numOfSelect;j++){
		 				//alert("comin");
		 				//alert(state[j]);
		 				//alert(sku_code[productId][i]);
		 				if($.inArray(state[j], sku_code[productId][i])>=0);		 							 				
		 				else break;
		 			}
		 			
		 			if(j==numOfSelect){		 				
		 				skuId=sku_id_cart[productId][i];
		 				
		 				//alert(price_cart[productId][skuId]['sales_price']);
		 				//alert(qty_cart[productId][skuId]);
		 				//alert($(this).attr("class"));
		 				$(".sales_price").each(function(){
		 					
		 					if($(this).attr("cartId")==cartId)
		 						$(this).html(price_cart[productId][skuId]['sales_price']);
		 					    sales_price=price_cart[productId][skuId]['sales_price'];
		 					
		 				});
		 				
		 				//$('.price_ut').html(price[skuId]['sales_price']);
		 				
		 			}
		 		}
			    
		 }
	
		 
	});
	
	
	
	  
	   $("dd>a").click(function(){
		  // alert(cartId+":"+productId);
		   //alert("welcome to sku!");
		   //alert(sku_code[productId]);
		   //alert(listOfSku[productId]);
		   //alert(numOfSku[productId]);
		   //alert($(this).attr('class'));
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
					
					for(j=0;j<listOfSku[productId];j++){
						if($.inArray(value2, sku_code[productId][j])==-1){
				 			 for(k=0;k<numOfSku[productId];k++){
				 				    if($(this).attr("cartId")==cartId)
				 					$("#"+sku_code[productId][j][k]).removeClass('nofocus');
	                                                             

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
			for(i=1;i<numOfSku[productId]*2;i+=2){
				if(condition[i]!=null)
			      state.push(condition[i]);
				
			}
			//if(state.length=='')
				//$(".choose").find(".item").siblings(".item").css("display","block");
			var str='';
			for(i=0;i<numOfSku[productId];i++)
				{
			     str +=state[i];
				}
			//alert("用户选择条件str="+str);//选择条件
	
			 numOfSelect=state.length;
			 
	//根据选择状态数组查询显示内容	
			//alert('row='+row);
			//alert('条件表d='+d);
			//for(i=0;i<row;i++)
			 //alert(d[i]);
			 //alert(d[i]);
			//document.getElementsByName("item").style.display='none';
			//$(".choose").find(".item").siblings(".item").css("display","none");
			var showBox=new Array();
			
			 for(i=0;i<numOfSku[productId];i++){
			 //对状态表的每一条数据处理
				 var showBoxTemp=new Array();
				 if(i==0){
			 	if(state[i]!=null){
			 		 //alert("当前处理状态"+state[i]);
			 		var str1=state[i].substring(0,2);
			 		//alert(str);
					 //alert(state[i]);
			 		$("dd>a").each(function(){
			 			 if($(this).attr("cartId")==cartId){
			 			var val=$(this).attr("value1");
			 			//alert("当前状态分类"+val);
			 			if(val==str1)
			 				//$(this).css("display","none");
			 				showBox.push($(this).attr("value2"));
			 			 }
			 		});
			 	
			 		
			 	for(j=0;j<listOfSku[productId];j++){
			 		//alert(state[i]+'：'+d[j])
			 		 if($.inArray(state[i], sku_code[productId][j])>-1){
			 			 for(k=0;k<numOfSku[productId];k++){
			 				 //alert(d[j][k]);
			 				 if(sku_code[productId][j][k]!=state[i]){
		 					 
			 					 //document.getElementById(d[j][k]).style.display='block';
			 					showBox.push(sku_code[productId][j][k]);
			 					
			 					
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
				 		$("dd>a").each(function(){
				 		  if($(this).attr("cartId")==cartId){
				 			var val=$(this).attr("value1");
				 			//alert("当前状态分类"+val);
				 			if(val==str1)
				 				//$(this).css("display","none");
				 				showBoxTemp.push($(this).attr("value2"));
				 			 }
				 			
				 		});
				 	
				 		
				 	for(j=0;j<listOfSku[productId];j++){
				 		//alert(state[i]+'：'+d[j])
				 		 if($.inArray(state[i], sku_code[productId][j])>-1){
				 			 for(k=0;k<numOfSku[productId];k++){
				 				 //alert(d[j][k]);
				 				 if(sku_code[productId][j][k]!=state[i]){
			 					 
				 					 //document.getElementById(d[j][k]).style.display='block';
				 					showBoxTemp.push(sku_code[productId][j][k]);
				 					
				 					
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
			 $("dd>a").each(function(){
				 if($(this).attr("cartId")==cartId)
					 $(this).addClass('nofocus');
			 });
			
			 for(t=0;t<showBox.length;t++){
				
				 $("dd>a").each(function(){
					 if($(this).attr("cartId")==cartId){
			 			var val=$(this).attr("value2");
			 			
			 			if(val==showBox[t])
			 				$(this).removeClass('nofocus');		
					 }                 
			 		});
				  	 
			 }
			 
			 if(showBox.length==0){
				 $("dd>a").each(function(){
					 if($(this).attr("cartId")==cartId)
						 $(this).removeClass('nofocus');
				 });
			 }
			 
			 if(numOfSelect==numOfSku[productId]){
				 
					
					    for(i=0;i<listOfSku[productId];i++){
				 			
				 			for(j=0;j<numOfSelect;j++){
				 				//alert("comin");
				 				//alert(state[j]);
				 				//alert(sku_code[productId][i]);
				 				if($.inArray(state[j], sku_code[productId][i])>=0);		 							 				
				 				else break;
				 			}
				 			
				 			if(j==numOfSelect){		 				
				 				skuId=sku_id_cart[productId][i];
				 				
				 				//alert(price_cart[productId][skuId]['sales_price']);
				 				//alert(qty_cart[productId][skuId]);
				 				//alert($(this).attr("class"));
				 				$(".sales_price").each(function(){
				 					
				 					if($(this).attr("cartId")==cartId){
				 						$(this).html(price_cart[productId][skuId]['sales_price']);
				 						sales_price=price_cart[productId][skuId]['sales_price'];
				 					}
				 					
				 				});
				 				
				 				//$('.price_ut').html(price[skuId]['sales_price']);
				 				
				 			}
				 		}
					    
				 }
			 
	   });
	   
	
	//再次编辑框  确定取消 按钮设定 01/05/2015 11:45:28 AM    	
	 	$(".panel_canel").click(function(){
	 		
	 		$("div.order_detail_edit").each(function(){
       			//alert($(this).css("display"));
       			//alert($(this).attr('class'));
       			if($(this).attr('class').indexOf("selected")>=0){
       				$("div.order_detail_edit").hide().removeClass("selected");
       				$(this).parent().find(".edit").removeClass("order_info_edit selected").html("");
       				$(this).parent().find(".order_detail_info").removeClass("order_detail_info_new selected");
       				
       				return ;
       			}
       			
       		 });
	 	});
	/*
	 * 再次编辑表修改点击确认之后
	 * 
	 * 判断是否与已经存在的产品重复，重复则该选项消失,在重复项数量增一
	 * 
	 * 修改购物车信息
	 * 
	 * 修改列表显示信息
	 * 
	 * 
	 */
	   $(".panel_sumbit").click(function(){
		   
		   if(numOfSelect==numOfSku[productId]){
			   
		  // alert("确定");
		   //alert($(this).attr("cartId"));
		  //alert(skuId);
		 // alert(qty_cart[productId][skuId]);
		  $(".info").each(function(){
			  
			  if($(this).attr("sku_id")==skuId&&$(this).attr("cartId")!=cartId){
				  
				 var qtycartId=$(this).attr("cartId");
				  $(".qtynum").each(function(){
						var b=null;
					  $(".qtynum").each(function(){
						  
						  if($(this).attr("cartId")==cartId){
							  
							  b=parseInt($(this).attr("value"));
						  }
					  });
						if($(this).attr("cartId")==qtycartId){
							
							var a=parseInt($(this).attr("value"));
							
							if(a+b>=qty_cart[productId][skuId]){
								
								 modifyQty(qtycartId,qty_cart[productId][skuId]);					
								 $(this).attr("value",qty_cart[productId][skuId]);
								 $(".amount_tip").each(function(){
										
										if($(this).attr("cartId")==qtycartId){
											
											$(this).show();
										}
										
									});
							
							}else{
								
								modifyQty(qtycartId,a+b);					
								$(this).attr("value",a+b);
								
							}
							    
							
							
							 //更新小计价格
							  
				        	   $(".g_price").each(function(){
				        		   
				        		   if($(this).attr("cartId")==qtycartId){
				        			   
				        			  var priceItem=$(this).html();
				        			  
				        			   var priceTotal=changeTwoDecimal_f((a+b)*parseInt(priceItem));
				        			   //alert(priceTotal);
				        			   $(".price_total").each(function(){
				        				   
				        				  if($(this).attr("cartId")==qtycartId){
				        					  
				        					 $(this).html(priceTotal);
				        				  }
				        			   });
				        			   
				        		   }
				        	   });
				         	 // 更新小计价格结束
							
							
							
							//删除多余项
							
							$("tr.info:not(tr.undo)").each(function(){
				        		  
				        		  if($(this).attr("cartId")==cartId){
				        			  
				        			  //$(this).fadeTo("fast",0).slideUp("slow");
				        			  //$(this).fadeOut("slow").slideUp(5000);
				        			  //alert("hi");
				        			  //$(this).parent().parent().slideUp(5000);
				        			//$(this).animate.({left:'250px'});slideUp(800);
				        			  deleteOne(cartId);
				        			  
				        			  $(this).parent().fadeOut("slow",function(){
				        				  $(".eachChecked").each(function(){
				            				  
				            				  if($(this).attr("cartId")==cartId){
				            					  
				            					  $(this).attr("show","false");
				            				  }
				            			  });
				        				  
				        				  //选中产品数量统计
				        	                numOfProduct=0;
				        	                $(".eachChecked").each(function(){
				        	               	 
				        	               	 if ($(this).attr("checked") == "checked"&&$(this).attr("show")=="true") {
				        	               		 numOfProduct++;
				        	                    }
				        	               	 
				        	                });
				        	               // alert(numOfProduct);
				        	                $(".numOfProduct").html(numOfProduct);
				        	                
				        	                //计算总价
				        	                
				        	               $(".eachChecked").each(function(){
				        	               	 
				        	               	 if ($(this).attr("checked") == "checked"&&$(this).attr("show")=="true") {
				        	               		 var cartid=$(this).attr("cartId");
				        	               		 $(".price_total").each(function(){
				        	               			 
				        	               			 if($(this).attr("cartId")==cartid){
				        	               				 
				        	               				 var priceItem=$(this).html();
				        	               				 numOfPrice =parseInt(numOfPrice)+parseInt(priceItem);
				        	               			 }
				        	               		 });
				        	               		 
				        	               		 
				        	                    }
				        	               	 
				        	                });
				        	               //alert(numOfPrice); 
				        	               $(".total_price").html("￥"+changeTwoDecimal_f(numOfPrice));
				        	               
				        	               
				        				  
				        				 // alert(empty_cart());       			  
				            			  if(empty_cart()){
				            	             	 $(".cart").hide();
				            	             	 $(".empty_cart").show(); 
				            	             	 
				            	              } 
				        				  
				        				  
				        			  });
				        		  }
							});
							//删除多余项结束
							
						}
						
					});
				  
			  }
			  
		  });
		  
		
		  var img_path=null;
		 
		  $("dd>a").each(function(){
				
				//alert($(this).attr("class"));
			   if($(this).attr("cartId")==cartId){
					if($(this).attr("class").indexOf("colorImg_active")>=0){
						
						var  img_name=$(this).find("img").attr("img_name");
						var  img_type=$(this).find("img").attr("img_type");
						
						 img_path=img_name+'.'+img_type;
					}
			   }
			});
		  
		
		 modifySku(cartId,skuId,img_path);
		  
		  		
		  
		  //修改本sku_id
		  $(".info").each(function(){
				
				if($(this).attr("cartId")==cartId){
					
					$(this).attr("sku_id",skuId);
				}
				
			});
		  
		  //修改库存
		  $(".qtynum").each(function(){
				
				if($(this).attr("cartId")==cartId){
					
					$(this).attr("qty",qty_cart[productId][skuId]);
				}
				
			});
		  //alert(productId+":"+skuId+qty_cart[productId][skuId]);
		  //修改库存提示
		  $(".amount_tip").each(function(){
				
				if($(this).attr("cartId")==cartId){
					
					$(this).html("库存只有"+qty_cart[productId][skuId]+"件");
				}
				
			});
		  
		   var condition_change=new Array();
		   $("dd>a").each(function(){
				
				//alert($(this).attr("class"));
			   if($(this).attr("cartId")==cartId){
					if($(this).attr("class").indexOf("colorImg_active")>=0){
						//alert($(this).attr("value1")+":"+$(this).attr("title"));
						var namecode=$(this).attr("value1");
						var namevalue=$(this).attr("value2");
						
						condition_change.push(namecode,namevalue);
						var name=$(this).attr("title");
						//alert($(this).find("img").attr("img_name"));
						var img_name=$(this).find("img").attr("img_name");
						var img_type=$(this).find("img").attr("img_type");
						
						$(".g_content").find("img").each(function(){
							
							if($(this).attr("cartId")==cartId){
								
								$(this).attr("src",img_name+"80x80."+img_type);
							}
							
						});
						
							$(".imgbox_wrap").find("img").each(function(){
														
								if($(this).attr("cartId")==cartId){
									
									$(this).attr("src",img_name+"220x220."+img_type);
								}
								
						});
						
							
							$(".g_price").each(function(){
								
								
								if($(this).attr("cartId")==cartId){
									//alert($(this).attr("cartId"));
									//alert(sales_price);
									$(this).html(sales_price);
								}
								
						});
							
							$(".imgDefault").each(function(){
								
								if($(this).attr("cartId")==cartId){
									
									$(this).attr("src",img_name+"220x220."+img_type);
								}
								
						});
						
						$(".order_info_item").each(function(){
							
							 if($(this).attr("cartId")==cartId&&$(this).attr("sku_code")==namecode){
								 
								 $(this).find("span").html(name);
							 }
							
						});
					}
					if($(this).attr("class").indexOf("size_active")>=0){
						//alert($(this).attr("value1")+":"+$(this).attr("title"));
						var namecode=$(this).attr("value1");
						var namevalue=$(this).attr("value2");
						var name=$(this).attr("title");
						condition_change.push(namecode,namevalue);
						$(".order_info_item").each(function(){
							
							 if($(this).attr("cartId")==cartId&&$(this).attr("sku_code")==namecode){
								 
								 $(this).find("span").html(name);
							 }
							
						});
					}
				   } 		
			   });	
		   
		   
		   
		   //alert(condition_change);
		  
		   for(i=0;i<code_dataOfMycart[cartId].length;i++)
			   for(j=0;j<2;j++){
				   
				   code_dataOfMycart[cartId][i][j]=condition_change[i*2+j];
				   
			   }
		  // alert(code_dataOfMycart[cartId]);
		   }  
		   $("div.order_detail_edit").each(function(){
      			//alert($(this).css("display"));
      			//alert($(this).attr('class'));
      			if($(this).attr('class').indexOf("selected")>=0){
      				$("div.order_detail_edit").hide().removeClass("selected");
      				$(this).parent().find(".edit").removeClass("order_info_edit selected").html("");
      				$(this).parent().find(".order_detail_info").removeClass("order_detail_info_new selected");
      				
      				return ;
      			}
      			
      		 });
		   
	   });
	
	   //结算  提交数据
	   $(".exchange").click(function(){
		      var exchangeCartId = new Array();
		      $(".eachChecked").each(function(){
             	 
             	 if ($(this).attr("checked") == "checked"&&$(this).attr("show")=="true") {
             		 var cartid=$(this).attr("cartId");
             		 
             		exchangeCartId.push(cartid);
                  }
             	 
              });
		      //alert(exchangeCartId.length);
		      if(exchangeCartId.length == 0)
		    	  return ;
		      //alert(exchangeCartId);
//		   
//		      $.ajax({
//	         		url: "../Conorder/conorder",
//	         		type:'POST',
//	         		data:{
//	         			'exchangeCartId':exchangeCartId,	                    
//	         		}
//	         		
//	         	});  
//		      
//		      
		      
		  	//js调用post方法    
		    post('../Conorder/conorder',exchangeCartId);
		    
		    
		      function post(URL, PARAMS) {        
		    	    var temp = document.createElement("form");        
		    	    temp.action = URL;        
		    	    temp.method = "post";        
		    	    temp.style.display = "block";        
		    	          
		    	   var opt = document.createElement("input");        
		    	       opt.name = 'exchangeCartId';        
		    	       opt.value = exchangeCartId;        
		    	      //alert( opt.value);
		    	      temp.appendChild(opt);
		    	      document.body.appendChild(temp);        
		    	      temp.submit();        
		    	      return temp;        
		    	}        
		    	       
		      
		          
	   });
	   
	   
	   
	   
	   
	   
	   //删除一条
       function deleteOne(cart_id){
         // alert(cart_id);
          
      	 
       	$.ajax({
       		url: "deleteOne",
       		type:'POST',
       		data:{
       			'cart_id':cart_id,
                  
       		},
       		success:function(data){
       		     
       			
       		}
       	});
       } 
       
       //修改购物车数量
       function modifyQty(cart_id,qty){
           //alert(qty);
           //alert(cart_id);
          // var dataOfReturn=null;
       	$.ajax({
       		url: "modifyQty",
       		type:'POST',
       		data:{
       			'cart_id':cart_id,
                  'qty':qty,
       		},
       		success:function(data){
       			
       			
       		}
       	});      	
       	
       }
	   
       
       //修改属性
       function modifySku(cart_id,sku_id,img_path){
          //alert(cart_id);
          //alert(sku_id);
         // alert(img_path);
      	 
       	$.ajax({
       		url: "modifySku",
       		type:'POST',
       		data:{
       			'cart_id':cart_id,                 
                 'sku_id':sku_id,
                 'img_path':img_path,
                  
       		},
       		success:function(data){
       		     
       			//alert(data);
       		}
       	});
       } 
       
	   //保留2位小数
       function changeTwoDecimal_f(x)
       {
          var f_x = parseFloat(x);
          if (isNaN(f_x))
          {
             //alert('function:changeTwoDecimal->parameter error');
             return false;
          }
          var f_x = Math.round(x*100)/100;
          var s_x = f_x.toString();
          var pos_decimal = s_x.indexOf('.');
          if (pos_decimal < 0)
          {
             pos_decimal = s_x.length;
             s_x += '.';
          }
          while (s_x.length <= pos_decimal + 2)
          {
             s_x += '0';
          }
          return s_x;
       }   
})//js文档结束










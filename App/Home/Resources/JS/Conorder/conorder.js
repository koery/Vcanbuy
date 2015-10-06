/**
 * 文件名称： conorder.js 
 * 版 本 号： 0 
 * 创建日期： 01/08/2015 16:37:48 PM    		    	 	
 * 作	者： coco
 * 功能说明： 订单确认页面逻辑处理
 */ 
$(function(){
	

	//地址列表 区
	
	
	//鼠标mouseovsr 显示设为默认地址
	
	$('.unit').mouseover(function(){
		
		//alert($(this).find(".defaultAddr").css("display"));
		if($(this).find(".defaultAddr").css("display")=="none"){
			
			$(this).find(".set_defaultAddr").show();
		}
		
		
	}).mouseout(function(){
		
		$(this).find(".set_defaultAddr").hide();
		
	});
	
	//选中 地址条目
	$("div.add1_input:not(div.add)").click(function(){
		
		//alert($(this).attr("class"));
		//alert($(this).attr("checked"));		
		$(".radio").attr("checked",false);//去掉所有选中
		$(this).find("input").attr("checked","checked");//该选项加上 选中
		
		$(".unit").removeClass("addressItemSeleted");//去掉所有红框 
	    $(this).parent().addClass("addressItemSeleted");
	    
	    $(".add1_input").removeClass("myaddressSeleted");//去掉所有大字体
	    $(this).addClass("myaddressSeleted");
	    
	    $('.add1_edit').hide();//隐藏所有修改字样
	    $(this).parent().find('.add1_edit').show();
	    
	    
	    //对应提交出显示改变
	    $(".havaAddress").hide();
	    $(".newAddress").show();
	    var province = $(this).find(".addressItem").find(".province").html();
		var city = $(this).find(".addressItem").find(".city").html();
		var district = $(this).find(".addressItem").find(".district").html();
		var address = $(this).find(".addressItem").find(".address").html();		
	    var username = $(this).find(".username").html();
	    var telphone = $(this).find(".telphone").html();
	   
	    	   
	    $(".newaddr_detail>.province").html(province);
	    $(".newaddr_detail>.city").html(city);
	    $(".newaddr_detail>.district").html(district);
	    $(".newaddr_detail>.address").html(address);
	    $(".newusername").html(username);
	    $(".newtelphone").html(telphone);
	    
	    
	    
	});
	
	
	//点击使用新地址  地址编辑表滑动效果
	
	$(".addNewAddress").click(function(){
		
		$('.new_form').slideToggle();
		
	});
	
	
	//修改默认地址
	
	$('.set_defaultAddr').click(function(){
		
		//alert($(this).attr('addressId'));
		
		var addressIdtoDefaultAddr = $(this).attr('addressId');
	    //alert(defaultAddressId);
		$.ajax({
     		url: "modifyDefaultAddress",
     		type:'POST',
     		data:{
     			'addressIdtoDefaultAddr':addressIdtoDefaultAddr,
                'defaultAddressId':defaultAddressId,
     		},
     		success:function(data){
     			
     			//alert(data);
     			
     			$('.defaultAddr').hide();
     			$('.defaultAddr').each(function(){
     				
     				if($(this).attr("addressId")==addressIdtoDefaultAddr)
     					$(this).show();
     			});
     			
     			defaultAddressId = addressIdtoDefaultAddr;
     			
     		}
     	}); 
		
	});
	
	//新增地址
	
	//下拉待检测
	
	//街道地址
	
	$("#addressStreet,#modifyaddressStreet ").focus(function(){
		
		$(this).next("span").hide();
	}).blur(function(){
		
		if($(this).val()==""){
			
			$(this).next("span").show().html("街道地址不能为空");
			$(this).parent().attr("check","false");
		}
		else
			$(this).parent().attr("check","true");	
	});
	
	//邮编
$("#addressPost,#modifyaddressPost").focus(function(){
		
		$(this).next("span").hide();
	}).blur(function(){
		
		if($(this).val()==""){
			
			$(this).next("span").show().html("邮编不能为空");
			$(this).parent().attr("check","false");
		}
		else
			$(this).parent().attr("check","true");
			
	});
	
//收件人
$("#addressUser,#modifyaddressUser").focus(function(){
		
		$(this).next("span").hide();
	}).blur(function(){
		
		if($(this).val()==""){
			
			$(this).next("span").show().html("收件人不能为空");
			$(this).parent().attr("check","false");
		}else
			$(this).parent().attr("check","true");
		
			
	});
//联系电话
$("#addressTel,#modifyaddressTel").focus(function(){
		
		$(this).next("span").hide();
	}).blur(function(){
		
		if($(this).val()==""){
			
			$(this).next("span").show().html("联系电话不能为空");
			$(this).parent().attr("check","false");
		}
		else
			$(this).parent().attr("check","true");	
	});

//点击取消
$(".nBtn").click(function(){
	
//	    $(".info").find("p").find("select").each(function(){
//	    	alert($(this).attr("value"));
//	    });
	$(".info").find("p").find("select").attr("value",0);
	$(".info").find("p").find("input").attr("value",null);
	$(".info").find("p").find("span").hide();
	$('.new_form').slideUp();

});

//点击保存
$(".yBtn").click(function(){
 
	var OK=true;
	$(".info").find("p").each(function(){
		
		//alert($(this).attr("check"));
		if($(this).attr("check")=="false"){
			
			OK=false ;
			$(this).find("span").show().html("请完善信息");
		}
			
		
	});   
	//alert(OK);
	
	if(OK){//新增地址检测完备  加入地址列表
		
		//alert(OK);
		// $(".info").find("p").find("select>option:selected").each(function(){
			// alert($(this).options[$(this).selectedIndex].text);
//			 alert($(this).selectedIndex);
//		    	alert($(this).attr("value"));
//		    	alert($(this).val());
			// alert($(this).text());
		   // });
		 
		 var province = $("#addressPid>option:selected").text();
		 var city = $("#addressCid>option:selected").text();
		 var district = $("#addressDid>option:selected").text();
		 var address = $("#addressStreet").val();
		 var postcode = $("#addressPost").val();
		 var username = $("#addressUser").val();
		 var tel = $("#addressTel").val();	
		 //alert(province+city+district+address+postcode+username+tel);
		$.ajax({
     		url: "addNewAddress",
     		type:'POST',
     		data:{
     			'province':province,
                'city':city,
                'district':district,
                'address':address,
                'postcode':postcode,
                'username':username,
                'tel':tel,  
     		},
     		success:function(data){
     			
     			//alert(data);
     			//js  重新创建form   
     			
     			$oDiv1=$('<div class="unit clearfix" addressId='+data+'></div>');
     			
     			$('.addr').prepend($oDiv1);
     			$oDiv2=$('<div class="add1_input"></div>');
     			$oP1=$('<p class="set_defaultAddr" addressId='+data+' style="display:none;">设为默认地址</p>');
     			$oP2=$('<p class="defaultAddr" addressId='+data+' style="display:none;">默认地址</p>');
     			$oP3=$('<p class="add1_edit" addressId='+data+' style="display:none;">[修改]</p>');
     			//$oDiv2.appendTo($oDiv1);
     			$($oDiv1).append($oDiv2,$oP1,$oP2,$oP3);
     			$oDiv2.append('<input type="radio" class="radio"/>');
     			$oP4=$('<p></p>');
     			$oP4.appendTo($oDiv2);
     			$oP4.append('<span class="addressItem"><span class="province">'+province+'</span><span class="city">'+city+'</span><span class="district">'+district+'</span><span class="address">'+address+'</span><span class="postcode" style="display: none">'+postcode+'</span> </span>');
     			$oP4.append('<span class="username">'+username+'</span>');
     			$oP4.append('<span class="telphone">'+tel+'</span>');
     			
     			$(".info").find("p").find("select").attr("value",0);
     			$(".info").find("p").find("input").attr("value",null);
     			$(".info").find("p").find("span").hide();
     			$('.new_form').slideUp();
     			
//     			
//     			 //获得订单  商品数组
//     			var exchangeCartId=new Array();
//     			$(".goods").each(function(){
//     				
//     				//alert($(this).attr("cartId"));
//     				var cartId = $(this).attr("cartId")
//     				exchangeCartId.push(cartId);
//     			});
//     			//alert(exchangeCartId);
//     			//js调用post方法    
//    		    post('../Conorder/conorder',exchangeCartId);
//    		    
//    		    
//    		      function post(URL, PARAMS) {        
//    		    	    var temp = document.createElement("form");        
//    		    	    temp.action = URL;        
//    		    	    temp.method = "post";        
//    		    	    temp.style.display = "block";        
//    		    	          
//    		    	   var opt = document.createElement("input");        
//    		    	       opt.name = 'exchangeCartId';        
//    		    	       opt.value = exchangeCartId;        
//    		    	      //alert( opt.value);
//    		    	      temp.appendChild(opt);
//    		    	      document.body.appendChild(temp);        
//    		    	      temp.submit();        
//    		    	      return temp;        
//    		    	}  
//     			
     			
     			location.reload(true);
     			
     			
     		}
     		
     	}); 
		
	}
});

//修改地址
var addressId=null;
 $(".add1_edit").click(function(){
	 
	 $(".add_addr").hide();
	 $(".modify_addr").show();
	 $(".modify_addr").find(".new_form").slideToggle();
	 
	 //获得需要修改的详细信息
	 addressId=$(this).attr("addressId");
	 var province = $(this).parent().find(".add1_input").find(".addressItem").find(".province").html();
	 var city = $(this).parent().find(".add1_input").find(".addressItem").find(".city").html();
	 var district = $(this).parent().find(".add1_input").find(".addressItem").find(".district").html();
	 var address = $(this).parent().find(".add1_input").find(".addressItem").find(".address").html();		
	 var postcode = $(this).parent().find(".add1_input").find(".addressItem").find(".postcode").html();				
	 var username = $(this).parent().find(".add1_input").find(".username").html();
	 var tel = $(this).parent().find(".add1_input").find(".telphone").html();	
	 
//	 alert(province);
//	 alert(city);
//	 alert(district);
//	 alert(address);
//	 alert(postcode);
//	 alert(username);
//	 alert(tel);
	 
	 $("#modifyaddressPid>option").each(function(){
		 if($(this).text()==province){			
			 $(this).attr('selected','selected');
		 }			
	 });
	 
	 $("#modifyaddressCid>option").each(function(){
		 if($(this).text()==city){			
			 $(this).attr('selected','selected');
		 }			
	 });
	 
	 $("#modifyaddressDid>option").each(function(){
		 if($(this).text()==district){			
			 $(this).attr('selected','selected');
		 }			
	 });
	 
	 $("#modifyaddressStreet").val(address);
	 $("#modifyaddressPost").val(postcode);
	 $("#modifyaddressUser").val(username);	 
	 $("#modifyaddressTel").val(tel);
	 
 
 });

//修改后点击保存
 $(".modifyyBtn").click(function(){
  
 	var OK=true;
 	$(".modifyinfo").find("p").each(function(){
 		
 		//alert($(this).attr("check"));
 		if($(this).attr("check")=="false"){
 			
 			OK=false ;
 			$(this).find("span").show().html("请完善信息");
 		}
 			
 		
 	});   
 	//alert(OK);
 	
 	if(OK){//新增地址检测完备  加入地址列表
 		
 		//alert(OK);
 		// $(".info").find("p").find("select>option:selected").each(function(){
 			// alert($(this).options[$(this).selectedIndex].text);
// 			 alert($(this).selectedIndex);
// 		    	alert($(this).attr("value"));
// 		    	alert($(this).val());
 			// alert($(this).text());
 		   // });
 		
 		//alert("addressId"+addressId);
 		 var province = $("#modifyaddressPid>option:selected").text();
 		 var city = $("#modifyaddressCid>option:selected").text();
 		 var district = $("#modifyaddressDid>option:selected").text();
 		 var address = $("#modifyaddressStreet").val();
 		 var postcode = $("#modifyaddressPost").val();
 		 var username = $("#modifyaddressUser").val();
 		 var tel = $("#modifyaddressTel").val();	
 		 //alert(province+city+district+address+postcode+username+tel);
 		$.ajax({
      		url: "modifyAddress",
      		type:'POST',
      		data:{
      			'addressId':addressId,
      			'province':province,
                 'city':city,
                 'district':district,
                 'address':address,
                 'postcode':postcode,
                 'username':username,
                 'tel':tel,  
      		},
      		success:function(data){
      			
      			$(".unit").each(function(){
      				
      				if($(this).attr("addressId")==addressId){
      					
      				//alert("ok");
      				 $(this).find(".add1_input").find(".addressItem").find(".province").html(province);
      	      	     $(this).find(".add1_input").find(".addressItem").find(".city").html(city);
      	      	     $(this).find(".add1_input").find(".addressItem").find(".district").html(district);
      	      	     $(this).find(".add1_input").find(".addressItem").find(".address").html(address);		
      	      		 $(this).find(".add1_input").find(".addressItem").find(".postcode").html(postcode);				
      	      		 $(this).find(".add1_input").find(".username").html(username);
      	      		 $(this).find(".add1_input").find(".telphone").html(tel);
      	      		
      	      		 
      	      	 //对应提交处显示改变
      	   	    $(".havaAddress").hide();
      	   	    $(".newAddress").show();
 
      	   	    $(".newaddr_detail>.province").html(province);
      	   	    $(".newaddr_detail>.city").html(city);
      	   	    $(".newaddr_detail>.district").html(district);
      	   	    $(".newaddr_detail>.address").html(address);
      	   	    $(".newusername").html(username);
      	   	    $(".newtelphone").html(tel);
      	   	    
      	 
  	     	     $(".modify_addr").find(".new_form").slideUp();     	     	     
     	         $(".modify_addr").hide();
     	         $(".add_addr").show();
     	         
     	     
  					
      				}
      				
      			});
      				
      			
      		}
      	}); 
 		
 	}
 });

  //地址列表结束
	
	//计算每种产品的价格
	
	var total_price = 0; //总的价格
	$('.cart_alcenter').each(function(){
		
		var cart_alcenter=null;
		var cartId=$(this).attr('cartId');
			$('.qty').each(function(){
				
				if($(this).attr('cartId')==cartId){
					
					var qty = $(this).html();//获得数量
					$('.price').each(function(){
						
						if($(this).attr('cartId')==cartId){
							
							var price = $(this).html();//获得价格
							
							 cart_alcenter = changeTwoDecimal_f(parseInt(qty)*parseInt(price));
							
							
						}
					
					
				
			      });
		       }
		
		  });
			total_price = changeTwoDecimal_f(parseInt(total_price)+parseInt(cart_alcenter));
			$(this).html(cart_alcenter);
			
	});
	
	//alert(total_price);
	$('.userPrice').html('￥'+total_price);
	$('.goodsSum').html('￥'+total_price);
	
	
	
	/**
	 * 提交订单
	 * 
	 * cartId 数组=>商品信息
	 * 用户地址Id=>收获地址
	 * 订单总额
	 * 时间=>系统下单时间
	 * 订单编号=> 规则
	 * js 捕获数据  cartId,地址ID
	 */
	
	$(".cart_surebtn").click(function(){
		
		//获得订单  商品数组
		var order_productId=new Array();
		$(".goods").each(function(){
			
			//alert($(this).attr("cartId"));
			var cartId = $(this).attr("cartId")
			order_productId.push(cartId);
		});
		//alert(order_productId);
		
		//获得地址id		
		//alert($(".addressItemSeleted").attr("addressId"));
		//alert(total_price);
		var order_addressId = $(".addressItemSeleted").attr("addressId");
		
		$.ajax({
      		url: "savaOrder",
      		type:'POST',
      		data:{
      			
      			'order_addressId':order_addressId,
      			'order_productId':order_productId,
      			'order_total_price':total_price,
      			
               
      		},
      		success:function(data){
      				
      				if(data){
      					
      					
      					window.location.href="../myorders/myorders";
      				};
      			
      				}
      				
      	});
		
		
		
		
		
	});
	
	
		
		 //保留2位小数
	    function changeTwoDecimal_f(x){
	   
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
	         
});
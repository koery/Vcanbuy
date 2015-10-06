/**
 * 文件名称： cart.js 
 * 版 本 号： 0 
 * 创建日期： 12/25/2014 20:56:37 PM    	 	
 * 作	者： MISS chen,coco
 * 功能说明： 购物车逻辑处理
 */ 

$(function(){

	
	
	
	//鼠标离开编辑区
	
	   $('td:not(td.order_detail)').click(function(){
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
         return; 
		});
	   


	   
	  
	   document.onclick=function(e){  
           var e=e?e:window.event;  
           var tar = e.srcElement||e.target;
     
          //alert($(tar).attr("class"));
           if($(tar).attr("class")==null){ 
        	  // alert($(tar).attr("class"));
        	 // alert("我在外面")
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
   			
             
           }       
     }  	   	   
//	   $("div:not()").click(function(){
//			 alert(222);
//			});
//	   $("div.order_detail_edit").mouseover(function(){
//		   //alert("111");
//	   }).mouseout(function(){
//		   //alert("222");
//		   $("*").click(function(){
//			   $("div.order_detail_edit").hide().removeClass("selected");
//			   //alert($("div.order_detail_edit").attr("class"));
//			   return;
//			   });
//	  
//	   });
	   
	   
	   
	   
	//显示重新编辑区
	$('span.order_detail_info').click(function(){
		
		//alert("hello");
		$('.order_detail_info').removeClass("selected");//开始之前去掉所有的selected
		$('.edit').removeClass("selected");//开始之前去掉所有的selected
		
		$(this).addClass("order_detail_info_new selected");//加红框
		//alert($(this).attr("class"));
		$(this).find(".edit").addClass("order_info_edit  selected").html("编辑");//显示编辑字体
		
		
		$('.order_detail_info').each(function(){
			
			//alert($(this).attr("class"));
			if($(this).attr('class').indexOf("selected")>=0)
				return;
			else $(this).removeClass("order_detail_info_new");//去掉红框
			
		});
		
        $('.edit').each(function(){
			
			//alert($(this).attr("class"));
			if($(this).attr('class').indexOf("selected")>=0)
				return;
			else $(this).removeClass("order_info_edit").html("");//去掉编辑字体
			
		});
		
		if($(this).next("div.order_detail_edit").css("display")=="block")  
			$(".order_detail_edit").hide().removeClass("selected");
		
		else {
			$(".order_detail_edit").hide().removeClass("selected");
			//alert("hi");
			$(this).next("div.order_detail_edit").show().addClass("selected");
			//alert($(this).next("div.order_detail_edit").attr("class"));
			//$(this).next("div.order_detail_edit").focus();
		}
		
		
	});
//	
//	$(".order_detail_edit").blur(function(){
//		
//		alert("hell");
//	});
	
	
	
	
    //显示 编辑图标
	$('tr.info').mouseover(function(){
			
		$(this).find("span.edit").addClass("pen");		
	}).mouseout(function(){
		
		$(this).find("span.edit").removeClass("pen");	
	});
	
	//显示编辑文字 和 红色的边框
	
	$('td.order_detail').mouseover(function(){
		
		
		
		
		$(this).find("span.edit").addClass("order_info_edit").html("编辑");
		$(this).find("span.order_detail_info").addClass("order_detail_info_new");		

	}).mouseout(function(){
		
		if($(this).find("div.order_detail_edit").css("display")=="block")
				return;
		$(this).find("span.edit").removeClass("order_info_edit").html("");	
		$(this).find("span.order_detail_info").removeClass("order_detail_info_new");		

	});
	
	
	
	//显示大图
$('.g_content_img').mouseover(function(){
		

		
		$(this).parent().find("div.clearfix").show();		

	}).mouseout(function(){
		
		$(this).parent().find("div.clearfix").hide();
	});
	
	//文字链接变红


$('.g_content_name').mouseover(function(){
	
	
	$(this).css("color","#ff5683");		

}).mouseout(function(){
	
	$(this).css("color","#666");	
});
	
	
     var numOfProduct=0;
     
     var numOfPrice=0.00;
	//全选  反选开始
	 $(".allChecked").click(function () {
                //alert($(this).attr("checked"));
                $(".reverse").attr("checked", false);
                if ($(this).attr("checked") == "checked") {
                    $(".eachChecked").attr("checked", true);
                    $(".allChecked").attr("checked", true);
                }
                else {
                	$(".eachChecked").each(function(){
                    	
                    	if($(this).attr("show")=="true")
                    		$(this).attr("checked", false);
                    	
                    });
                    $(".allChecked").attr("checked", false);
                }
                
                
                
                //选中产品数量统计
               numOfProduct=0;
                $(".eachChecked").each(function(){
               	 
               	 if ($(this).attr("checked") == "checked"&&$(this).attr("show")=="true") {
               		 numOfProduct++;
                    }
               	 
                });
                //alert(numOfProduct);
                if(numOfProduct!=0){
                	
                	$(".exchange").css({"background":"url(../../App/Home/Resources/Img/ImgCart/charge-btn.png)"});
                }else{
                	
                	$(".exchange").css({"background":"url(../../App/Home/Resources/Img/ImgCart/uncharge-btn.png)"});
                }
                	
                $(".numOfProduct").html(numOfProduct);
                
                //计算总价
                numOfPrice=0;
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
                 
                
                
                
                

            });

            $(".eachChecked").click(function () {
                //alert($(this).attr("checked"));
                $(".reverse").attr("checked", false);
                if($(this).attr("show")=="true"){
	                if ($(this).attr("checked") != "checked") {
	                    $(".allChecked").attr("checked", false);
	                }
	                else {
	
	                    // alert($(this).attr("checked"));
	                    $(".allChecked").attr("checked", true);
	                    $(".eachChecked").each(function () {
	                        if ($(this).attr("checked") != "checked"&&$(this).attr("show")=="true") {
	                            $(".allChecked").attr("checked", false);
	                        }
	                    });
	                }
               } 
                
                
                //选中产品数量统计
               numOfProduct=0;
                $(".eachChecked").each(function(){
               	 
               	 if ($(this).attr("checked") == "checked"&&$(this).attr("show")=="true") {
               		 numOfProduct++;
                    }
               	 
                });
               // alert(numOfProduct);
                if(numOfProduct!=0){
                	
                	$(".exchange").css({"background":"url(../../App/Home/Resources/Img/ImgCart/charge-btn.png)"});
                }else{
                	
                	$(".exchange").css({"background":"url(../../App/Home/Resources/Img/ImgCart/uncharge-btn.png)"});
                }
                	
                    
                $(".numOfProduct").html(numOfProduct);
                
                //计算总价
                numOfPrice=0;
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
               
            });

            $(".reverse").click(function () {//反选
                //alert($(this).attr("checked"));
                if ($(this).attr("checked") == "checked") {
                    $(".reverse").attr("checked", true);
                }
                else
                    $(".reverse").attr("checked", false);
                $(".eachChecked").each(function () {
                	if($(this).attr("show")=="true")
                		$(this).attr("checked", !$(this).attr("checked"));
                });

                $(".allChecked").attr("checked", true);
                $(".eachChecked").each(function () {
                	
                    if ($(this).attr("checked") != "checked"&&$(this).attr("show")=="true") {
                        $(".allChecked").attr("checked", false);
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
                if(numOfProduct!=0){
                	
                	$(".exchange").css({"background":"url(../../App/Home/Resources/Img/ImgCart/charge-btn.png)"});
                }else{
                	
                	$(".exchange").css({"background":"url(../../App/Home/Resources/Img/ImgCart/uncharge-btn.png)"});
                }
                	
                $(".numOfProduct").html(numOfProduct);
                
                //计算总价
                numOfPrice=0;
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
            });
              //全选  反选结束      
            
            
          //购物车 数量加减  更新小计价格  
            
            $('.add_amount').click(function(){
         	   var qtynum=$(this).parent().find("input").attr('value');
         	   qtynum++;
         	   //alert($('#qty').text());
         	   var qtyall=$(this).parent().find("input").attr('qty');
         	   //qtyall=document.getElementById('qty').html();
         	   //alert("qtyall"+qtyall);
         	   if(qtynum>qtyall){
         		  $(this).parent().parent().find(".amount_tip").css('display','block');
         		   return;
         	   }
         	   
         	  var cart_id=$(this).attr("cartId");
         	   modifyQty(cart_id,qtynum);
         	   
         	   
         	   $(this).parent().find("input").attr('value',qtynum);
         	   //alert($('.qty').attr('value'));
         	   
         	   
         	   var cart_id=$(this).attr("cartId");
         	   $(".g_price").each(function(){
         		   
         		   if($(this).attr("cartId")==cart_id){
         			   
         			  var priceItem=$(this).html();
         			  
         			   var priceTotal=changeTwoDecimal_f(qtynum*parseInt(priceItem));
         			   //alert(priceTotal);
         			   $(".price_total").each(function(){
         				   
         				  if($(this).attr("cartId")==cart_id){
         					  
         					 $(this).html(priceTotal);
         				  }
         			   });
         			   
         		   }
         	   });
         	   
         	   
         	 
              
              //计算总价
         	  numOfPrice=0;
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
         	   
         	    
         	   
            });
            $('.reduce_amount').click(function(){
               $(this).parent().parent().find(".amount_tip").css('display','none');
         	   var qtynum=$(this).parent().find("input").attr('value');
         	   qtynum--;
         	   if(qtynum<=0){
         		   qtynum=1;
         		   return;
         	   }
         	   
         	   var cart_id=$(this).attr("cartId");
        	   modifyQty(cart_id,qtynum);
        	   
        	   
         	  $(this).parent().find("input").attr('value',qtynum);
         	   
         	   //alert($('.qty').attr('value'));
         	  
         	//更新小计价格  
          var cart_id=$(this).attr("cartId");
       	   $(".g_price").each(function(){
       		   
       		   if($(this).attr("cartId")==cart_id){
       			   
       			  var priceItem=$(this).html();
       			  
       			   var priceTotal=changeTwoDecimal_f(qtynum*parseInt(priceItem).toFixed(2));
       			   //alert(priceTotal);
       			   $(".price_total").each(function(){
       				   
       				  if($(this).attr("cartId")==cart_id){
       					  
       					 $(this).html(priceTotal);
       				  }
       			   });
       			   
       		   }
       	   });
         //更新小计价结束
       	   
       	   
       	$(".numOfProduct").html(numOfProduct);
        
        //计算总价
        numOfPrice=0;
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
       	   
       	   
       	   
            });
            
            var qtynum=null;
            $('.qtynum').focus(function(){	 
         	   //alert("hh");
         	   qtynum=$(this).attr('value');
      	  
         	   //$(this).parent().parent().find(".amount_tip").css('display','none');
            }).blur(function(){
         	   //alert($(this).val());
         	   
         	   if($(this).val()==''){
         		   $(this).val(qtynum);
         		   return ;
         	   }
         	   else {
         		   
         		   num=parseInt($(this).val());
         		  var  qtyall=parseInt($(this).attr('qty'));
         		// alert("num"+num);
         		  // alert("qtyall"+qtyall);
         		  //alert(positiveCheck(num)); 
         		 
         		   if(!positiveCheck(num)){
         			   
         			   $(this).val(qtynum);
         			   return;	   
         		   }		   
         		   else if(num>qtyall){
         			   //alert(num+">"+qtyall);
         			  $(this).val(qtyall);
         			  $(this).parent().parent().find(".amount_tip").show();
            		   return;
            	   }
         		   
         		  
              	  var cart_id=$(this).attr("cartId");
              	   modifyQty(cart_id,num);
              	   
         		  $(this).parent().parent().find(".amount_tip").css('display','none');
         	   }	 
         	   
         	   
         	  //更新小计价格
         	  var cart_id=$(this).attr("cartId");
        	   $(".g_price").each(function(){
        		   
        		   if($(this).attr("cartId")==cart_id){
        			   
        			  var priceItem=$(this).html();
        			  
        			   var priceTotal=changeTwoDecimal_f(num*parseInt(priceItem).toFixed(2));
        			   //alert(priceTotal);
        			   $(".price_total").each(function(){
        				   
        				  if($(this).attr("cartId")==cart_id){
        					  
        					 $(this).html(priceTotal);
        				  }
        			   });
        			   
        		   }
        	   });
         	 // 更新小计价格结束
        	   
        	   $(".numOfProduct").html(numOfProduct);
               
               //计算总价
        	   numOfPrice=0;
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
        	   
        	   
            });
            
            
            
            
         //购物车加减结束   
            
            
            //自然数检测函数
              function positiveCheck(num){
           	   
           	   if(  /^([0-9]*[1-9][0-9]*)$/.test(num)) return true;
           	   else return false;   
              }
                    
            
         //删除   
          $(".delete").click(function(){
        	  
        	  //alert($(this).attr("cartId"));
        	  var cartId = $(this).attr("cartId");
        	  
        	  deleteOne(cartId);
        	  $(".undo").parent().hide();
        	 
                $("tr.undo").each(function(){
        		  
        		  if($(this).attr("cartId")==cartId){
        			 // alert($(".undo").attr("class"));
        			 // alert($(this).attr("cartId"));
        			  //$(this).fadeIn();
        			  $(this).parent().fadeIn("slow");
        			  //$(this).slideUp("slow");
        		  }
        		  
        		  
        	  });
        	  
        	  $("tr.info:not(tr.undo)").each(function(){
        		  
        		  if($(this).attr("cartId")==cartId){
        			  
        			  //$(this).fadeTo("fast",0).slideUp("slow");
        			  //$(this).fadeOut("slow").slideUp(5000);
        			  //alert("hi");
        			  //$(this).parent().parent().slideUp(5000);
        			//$(this).animate.({left:'250px'});slideUp(800);
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
                      numOfPrice=0;
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
                     
                      
        			  $(this).parent().fadeOut("slow",function(){
        				  
        				 // alert(empty_cart());       			  
            			  if(empty_cart()){
            	             	 $(".cart").hide();
            	             	 $(".empty_cart").show(); 
            	             	 
            	              } 
        				  
        				  
        			  });
        			  
        			
        		  }
        		       
        	  });
        	  
                
    
          });	  
            //删除结束
          
       
            
         //撤销删除
          $(".beforeDelete").click(function(){
        	  
        	  var cartId = $(this).attr("cartId");
        	  recoveryCart(cartId);
         	  $(".undo").parent().hide();
         	  
         	  
         	 $("tr.info:not(tr.undo)").each(function(){
       		  
       		  if($(this).attr("cartId")==cartId){
       			  
       			  $(this).parent().fadeIn("slow");
       			  
       			  //$(this).slideUp("slow");
	       			$(".eachChecked").each(function(){
	  				  
	  				  if($(this).attr("cartId")==cartId){
	  					  
	  					  $(this).attr("show","true");
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
	                numOfPrice=0;
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
	       			
	       			
       		  }

       	     });
  	  
          });
          
 
	     //撤销删除结束
          
          
          
          
         //购物车为空
          function empty_cart(){
        	  
        	  var empty_cart=true;
              $("tr.info:not(tr.undo)").each(function(){
        		  //alert($(this).parent().css("display"));
        		  if($(this).parent().css("display")=="table-row-group"){
        			  empty_cart=false;
       			     	return ;		 
        		  }
        		  if($(this).parent().css("display")=="block"){
        			  empty_cart=false;
       			     	return ;		 
        		  }
        		  
        		  
        	  });
              return empty_cart;
        	  
          }
          
         //alert(empty_cart());
         if(empty_cart()){
        	 $(".cart").hide();
        	 $(".empty_cart").show(); 
        	 
         }         	  
     			
         
//         //选中产品数量统计
//         var numOfProduct=0;
//         $(".eachChecked").each(function(){
//        	 
//        	 if ($(this).attr("checked") == "checked"&&$(this).attr("show")=="true") {
//        		 numOfProduct++;
//             }
//        	 
//         });
//         $(".numOfProduct").html(numOfProduct);
//         
//         //计算总价
//         
//        $(".eachChecked").each(function(){
//        	 
//        	 if ($(this).attr("checked") == "checked"&&$(this).attr("show")=="true") {
//        		 var cartid=$(this).attr("cartId");
//        		 $(".price_total").each(function(){
//        			 
//        			 if($(this).attr("cartId")==cartid){
//        				 
//        				 var priceItem=$(this).html();
//        				 numOfPrice +=changeTwoDecimal_f(num*parseInt(priceItem).toFixed(2));
//        			 }
//        		 });
//        		 
//        		 
//             }
//        	 
//         });
//        alert(numOfPrice); 
//        $(".total_price").html("￥"+numOfPrice);
         
         
       
         
         
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
         function modifySku(cart_id,img_path,sku_code,sku_name){
            alert(cart_id);
            alert(img_path);
        	alert(sku_code);
        	alert(sku_name);
        	 
         	$.ajax({
         		url: "modifySku",
         		type:'POST',
         		data:{
         			'cart_id':cart_id,
                    'img_path':img_path,
                    'sku_code':qsku_codety,
                    'sku_name':sku_name,
         		},
         		success:function(data){
         		     
         			
         		}
         	});
         } 
         
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
         
       //恢复
         function recoveryCart(cart_id){
           // alert(cart_id);
            
        	 
         	$.ajax({
         		url: "recoveryCart",
         		type:'POST',
         		data:{
         			'cart_id':cart_id,
                    
         		},
         		success:function(data){
         		     
         			
         		}
         	});
         } 
         //批量删除
         function deleteMany(cart_ids){
            alert(cart_id);
         	$.ajax({
         		url: "deleteMany",
         		type:'POST',
         		data:{
         			'cart_ids':cart_ids,
                    
         		},
         		success:function(data){
         		     
         			return data;
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










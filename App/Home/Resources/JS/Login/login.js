/**
 * 文件名称： login.js 
 * 版 本 号： 0 
 * 创建日期： 2014.11.28 
 * 作	者： MISS chen,coco
 * 功能说明： 登陆页面逻辑处理
 * 
 * 版 本 号： 0.1 
 * 修改时间： 2014.11.29
 * 修改作者：coco
 * 修改内容： i.增加密码框提示
 * 	         ii.增加输入字符样式		
 * 
 * 版 本 号：0.2
 * 修改时间：2014.12.1
 * 修改作者：coco
 * 修改内容： i.增加验证码   
 * 
 * 版 本 号：0.3
 * 修改时间：2014.12.5
 * 修改作者：coco
 * 修改内容： i.增加验证码检测 
 * 			 ii.完善登陆功能  
 * 
 * 版 本 号：0.3.1
 * 修改时间：2014.12.5
 * 修改作者：coco
 * 修改内容： i.解决验证码验证登陆验证不流畅问题
 * 
 * 
 * 版 本 号：0.3.2
 * 修改时间：2014.12.5
 * 修改作者：coco
 * 修改内容： i.解决验证码刷新问题
 * 	
 * 版 本 号：0.4
 * 修改时间：2014.12.9
 * 修改作者：coco
 * 修改内容： i.加载时是否开启验证码检测	 
 */
$(function (){//文档加载开始
	//判断是否开启验证码
	//alert($('#login_code').attr("errorTimes"));
	if($('#login_code').attr("errorTimes")>=3){		 
		$(".lg_item1").css("display","block");
	}
	console.log("Hello Console.log");
	
//	用户名
	$('#login_username').focus(function(){
		
		if($(this).val()=="请输入手机或邮箱")
		$(this).val("");
		$(this).css("color","#000");
		$(this).css("borderColor","#aaa");
		$('.error_tip').hide();
		$('.lg_item_pwd').hide();
		$('#login_psd').val("");
		$('.lg_item_pwd_text').show();
		
	}).blur(function(){
		if($(this).val()==""){
			$(this).css("color","#999");
			$(this).val("请输入手机或邮箱");
			$(this).css("borderColor","#ccc");
		}
		 
	});	
// 密码
	$('#login_psd_text').focus(function(){
		$('.lg_item_pwd_text').hide();
		$('.lg_item_pwd').show();
		$('#login_psd').focus();
	});
	$('#login_psd').focus(function(){	
		$(this).css("color","#000");
		$('.error_tip').hide();
		$(this).css("borderColor","#aaa");
	}).blur(function(){
		if($(this).val()==""){
			$('.lg_item_pwd').hide();
			$('.lg_item_pwd_text').show();
			
		}
	});
	

// 验证码
	$('#login_code').focus(function(){
		$('.error_tip').hide();
		if($(this).val()=="请输入验证码")
		$(this).val("");
		$(this).css("borderColor","#aaa");
	}).blur(function(){
		if($(this).val()==""){
			$(this).val("请输入验证码");
			$(this).css("borderColor","#ccc");
		}		
	});
	
	$('.changeVerifCode').mouseover(function(){
		$(this).css("color","#FF5151");
		}).mouseout(function(){
			$(this).css("color","#999");
	});
	
//	$('.changeVerifCode').click(function(){		
//		
//		$('.verifCode').attr("src","verifCode/+Math.random()");
//		
//		});
	$('.identifying').click(function(){		
				
			$('.verifCode').attr("src","verifCode/+Math.random()");
			
	});

	$('.identifying').mouseover(function(){		
				
			$(this).css("cursor","pointer");
			
	});
	
	
	
	
// 登陆按钮	
	$(".lg_sub").click(function(){
//		alert($('#login_username').val());
//		alert($('#login_psd').val());
//		alert($('#login_code').attr("check"));
//		alert($('.lg_item1').css("display"));
		if($('#login_username').val()=="请输入手机或邮箱"){			
				$('.error_tip').html("用户名不能为空").show();
			    return;
			}
		
		if($('#login_psd').val()==""){
			$('.error_tip').html("密码不能为空").show();
			  return;
		}
		
		if($('.lg_item1').css("display")=="block"&&$('#login_code').val()=="请输入验证码"){
			$('.error_tip').html("验证码不能为空").show();
			$('.verifCode').attr("src","verifCode/+Math.random()");
			  return;
		}
		//alert($(".lg_item1").css("display"));
		//alert($("#login_code").attr("check"));
	 	verifyData();
	 });
 
	/**
	 * 登陆用户名和密码处理验证码检测
	 */
	function verifyData(){
		//alert("hello verify");
		if($("#login_code").val()!="请输入验证码")
			$verifCode=$("#login_code").val();
		else $verifCode=null;
//		alert($('#login_username').val());
//		alert($('#login_psd').val());
//		alert($('#login_code').attr("check"));
//		alert($('.lg_item1').css("display"));
//		alert($("#lg10245").attr("checked"));		
		$.ajax({
				url: "login",
				type:'POST',
				data: {
					"user":$("#login_username").val(),
					"pwd":$("#login_psd").val(),
					"remenber":$("#lg10245").attr("checked"),
					"verifCode":$verifCode
					},
					success:function(data){ 
						//alert(data);
						if(data == 0){
							//alert("hello");
							$("#form").submit();
							 window.location.href="../index/index";     
							
			             }
						else if(data=="false"){
							$('.error_tip').html("验证码错误").show(); 
							$('.verifCode').attr("src","verifCode/+Math.random()");
						
						}
						else if(data <= 2){
							$('.error_tip').html("用户名或密码错误").show();	
							
						}
						
						else {
							$('.error_tip').html("用户名或密码错误").show(); 
							$('.verifCode').attr("src","verifCode/+Math.random()");
							$(".lg_item1").css("display","block");
							
						}
					
					}         
		                      
		                     
			});
	}
	
	
	$('.lg_foret newregister').mouseover(function(){
		$(this).css("color","#FF5151");
		}).mouseout(function(){
			$(this).css("color","#999");
	});
	
//	$('.lg_foret').click(function(){
//		
//		window.location.href="../security/findpwdStepOne";
//	
//		});
//	
//	$('.newregister').click(function(){
//		
//		window.location.href="../register/index";
//	
//		});
//	
});//文档加载函数结束	
	
	
	
	
	
	
	



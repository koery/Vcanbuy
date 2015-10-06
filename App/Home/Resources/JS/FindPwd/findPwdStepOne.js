/**
 * 文件名称： findPwdStepOne.js
 * 版 本 号： 0  
 * 创建日期： 2014.11.29
 * 作	者： MISS chen,Coco
 * 功能说明： 密码重置step1页面逻辑处理 
 * 
 * 版 本 号：0.1
 * 创建日期：2014.12.2
 * 作	者： coco
 * 修改内容：i.修改验证码输入框效果
 * 
 * *版 本 号：0.2
 * 创建日期：2014.12.9
 * 作	者： coco
 * 修改内容：i.验证码，用户名同时提交
 */
$(function(){
	$('#userinfo').focus(function(){
	
		$(this).css("border-color","#000");
		if($(this).val()=="请输入邮箱")
			$(this).val("");
		$(this).css("color","#000");
		$(this).siblings('span').text("").removeClass('errortip').removeClass('successtip');
		}).blur(function(){
			
			if($(this).val()==""){
				$(this).val("请输入邮箱");
				$(this).css("color","#999");
				$(this).css("border-color","");
			}
			else if(!checkEmail($(this).val())){
				
				$('#userinfo').siblings('span').text("格式错误").addClass('errortip');
				$('#userinfo').attr("check","false");
			
				
			}
			else{
				$.ajax({
					url: "checkEmail",
					type:'POST',
					data: {
						 "email":$('#userinfo').val()					 
						},
					success:function(data){
						//alert(data);				
						if(data=="emailNotExist"){			
							$('#userinfo').siblings('span').text("用户名错误").addClass('errortip');							
							$('#userinfo').attr("check","false");
						}
						else {
							$('#userinfo').siblings('span').text("用户名有效").addClass('successtip');
							 $('#userinfo').attr("check","true");
						}
					}				
			   });
			}
      });	
//验证码检测
	$('#verifCode').focus(function(){
		    $(this).css("border-color","#000");
			if($(this).val()=="请输入验证码")
				$(this).val("");
			$(this).css("color","#000");
			$('.verifCodeTips').text("").addClass('errortip');removeClass('errortip').removeClass('successtip');
			
	}).blur(function(){
			if($(this).val()==""){
				$(this).val("请输入验证码");
				$(this).css("color","#999");
				$(this).css("border-color","");
			}			
	});	
	
	
	$('.changeVerifCode').mouseover(function(){
		$(this).css("color","#FF5151");
		}).mouseout(function(){
			$(this).css("color","#999");
	});
	
	$('.changeVerifCode,.imgcodeCheck').click(function(){
	
		$('.verifCode').attr("src","verifCode/+Math.random()");
		
		});
	$('.imgcodeCheck').mouseover(function(){		
		
		$(this).css("cursor","pointer");
		
});
	//验证码检测结束
	
	//点击下一步
	
	$('.subbox').click(function(){
	//
	    
		if($('#userinfo').val()=="请输入邮箱"||$('#userinfo').attr("check")=="false"){	 
			$('#userinfo').css("border-color","#E4393C");
			
		}
		if($('#verifCode').val()=="请输入验证码"){	 
			$('#verifCode').css("border-color","#E4393C");			
		}	
		else{
			$.ajax({
				url: "checkVerifCode",
				type:'POST',
				data: {
					 "verifCode":$('#verifCode').val()					 
					},
				success:function(data){
					//alert(data);				
					if(data=="verifCodeFalse"){			
						$('.verifCodeTips').text("验证码错误").addClass('errortip');
						$('.verifCode').attr("src","verifCode/+Math.random()");
						$('#verifCode').attr("check","false");
					}
					else {
						$('.verifCodeTips').text("验证码正确").addClass('successtip');
						 $('#verifCode').attr("check","true");
						 if($('#userinfo').attr("check")=="true")
							 $("#form").submit();
					}
				}				
		   });
		}
		
		
	});

	
	//判断邮箱格式函数
	/**
	* 功能：判断用户输入的邮箱格式是否正确 
	* 传参：无 
	* 返回值：true or false 
	*/ 
	function checkEmail(email) { 
	if(!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(email))  return false;  
	return true; 
	} 
	//判断邮箱格式函数结束
	

});//文档加载结束


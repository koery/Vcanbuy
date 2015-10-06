/**
 * 文件名称： findPwdStepThree.js 
 * 作	者： MISS chen,Coco
 * 版 本 号： 1.0 
 * 创建日期： 2014.12.2
 * 功能说明： 密码重置step3页面逻辑处理 
 * 
 */
$(function(){
	
	$('#renewpsd_text').focus(function(){
		
		$('.renewpsd_text').hide();
		$('.renewpsd').show();
		$('#renewpsd').focus();
	});
	
	$('#renewpsd').focus(function(){
		
		$(this).siblings('span').text("").removeClass('errortip');
		$(this).siblings('span').text("").removeClass('successtip');
		$(this).css("border-color","#000");
		$(this).css("color","#000");
		
	}).blur(function(){
		
			if( $(this).val()==""){ 			
				
				$('.renewpsd').hide();	
				$('.renewpsd_text').show();
				$('#renewpsd_text').css("border-color","#000");
				
				}
			else{
				var pwd=$(this).val();
				//alert(pwd+":"+pwd.length+":"+checkPwd(pwd));
				
				if(pwd.length<6){
					$(this).siblings('span').text('密码长度不足6位,请重新输入').addClass('errortip');
					$(this).css("border-color","#E4393C");
					$('#renewpsd').attr("check","false");
				}
				else if(pwd.length>20){
					$(this).siblings('span').text('密码长度超过20位,请重新输入').addClass('errortip');
					$(this).css("border-color","#E4393C");
					$('#renewpsd').attr("check","false");
				}
				else if(!checkPwd(pwd)){			
					$(this).siblings('span').text('密码格式错误,请重新输入').addClass('errortip');
					$(this).css("border-color","#E4393C");
					$('#renewpsd').attr("check","false");
				}
				else {
					$(this).siblings('span').text('新密码有效').addClass('successtip');
					$(this).css("border-color","#000");
					$('#renewpsd').attr("check","true");
				}
			}
			if($("#renewpsd1").val()!=""){
				
				var pwd=$('#renewpsd').val();
				var pwdR=$("#renewpsd1").val();
				//alert(pwd+":"+pwdR);
				//alert(checkPwd(pwd)+":"+checkPwd(pwdR));
				if(pwd.length>6&&pwd.length<=20&&pwdR.length>6&&pwdR.length<=20&&checkPwd(pwd)&&checkPwd(pwdR)){
					//alert(pwd+":"+pwdR);
					if(pwd != pwdR){
						$('#renewpsd1').siblings('span').text('').removeClass('successtip');
						$('#renewpsd1').siblings('span').text('两次密码不匹配,请重新输入').addClass('errortip');
						$('#renewpsd1').css("border-color","#E4393C");
						$('#renewpsd1').attr("check","false");
					}
					else{
						$('#renewpsd1').siblings('span').text('新密码有效').addClass('successtip');
						$('#renewpsd').siblings('span').text('新密码有效').addClass('successtip');
						$('#renewpsd1').css("border-color","#000");
						$(this).css("border-color","#000");
						$('#renewpsd1').attr("check","true");
					}
				}
			}
				
			
	});	
	
	$('#renewpsd1_text').focus(function(){
		
		$('.psdrepeat_text').hide();
		$('.psdrepeat').show();
		$('#renewpsd1').focus();
	});
	
	$('#renewpsd1').focus(function(){
		
		$(this).siblings('span').text("").removeClass('blurtip');
		$(this).siblings('span').text("").removeClass('successtip');
		$(this).css("border-color","#000");
		$(this).css("color","#000");
		
	}).blur(function(){
		
			if( $(this).val()==""){ 			
				
				$('.psdrepeat').hide();	
				$('.psdrepeat_text').show();
				$('#renewpsd1_text').css("border-color","#000");
				
				}
			else{
				var pwd=$(this).val();
				//alert(pwd+":"+pwd.length+":"+checkPwd(pwd));
				
				if(pwd.length<6){
					$(this).siblings('span').text('密码长度不足6位,请重新输入').addClass('errortip');
					$(this).css("border-color","#E4393C");
					$('#renewpsd1').attr("check","false");
				}
				else if(pwd.length>20){
					$(this).siblings('span').text('密码长度超过20位,请重新输入').addClass('errortip');
					$(this).css("border-color","#E4393C");
					$('#renewpsd1').attr("check","false");
				}
				else if(!checkPwd(pwd)){			
					$(this).siblings('span').text('密码格式错误,请重新输入').addClass('errortip');
					$(this).css("border-color","#E4393C");
					$('#renewpsd1').attr("check","false");
				}
				else {
					$(this).siblings('span').text('新密码有效').addClass('successtip');
					$(this).css("border-color","#000");
					$('#renewpsd1').attr("check","true");
				}
			}
			if($("#renewpsd").val()!=""){
				
				var pwd=$('#renewpsd').val();
				var pwdR=$("#renewpsd1").val();
				//alert(pwd+":"+pwdR);
				//alert(checkPwd(pwd)+":"+checkPwd(pwdR));
				if(pwd.length>6&&pwd.length<=20&&pwdR.length>6&&pwdR.length<=20&&checkPwd(pwd)&&checkPwd(pwdR)){
					//alert(pwd+":"+pwdR);
					if(pwd != pwdR){
						$('#renewpsd1').siblings('span').text('').removeClass('successtip');
						$('#renewpsd1').siblings('span').text('两次密码不匹配,请重新输入').addClass('errortip');
						$('#renewpsd1').css("border-color","#E4393C");
						$('#renewpsd1').attr("check","false");
					}
					else{
						$('#renewpsd1').siblings('span').text('新密码有效').addClass('successtip');
						$('#renewpsd').siblings('span').text('新密码有效').addClass('successtip');
						$('#renewpsd').css("border-color","#000");
						$(this).css("border-color","#000");
						$('#renewpsd1').attr("check","true");
					}
				}
			}
			
	});	
	 
	$('.reset').click(function(){
		if($("#renewpsd").val()=="")
			$('#renewpsd_text').css("border-color","#E4393C");
		 if($('#renewpsd').attr("check")=="false")		
			  $('#renewpsd').css("border-color","#E4393C");
		if($("#renewpsd1").val()=="")
			$('#renewpsd1_text').css("border-color","#E4393C");
		if($('#renewpsd1').attr("check")=="false")		
			  $('#renewpsd1').css("border-color","#E4393C");
		
		 if($('#renewpsd').attr("check")=="true"&&$('#renewpsd1').attr("check")=="true"){	
			 $("#form").submit(); 
				
		 }
	});
	
	//判断密码格式函数
	/**
	* 功能：判断用户输入的密码号格式是否正确 
	* 传参：无 
	* 返回值：true or false 
	*/ 
	function checkPwd(pwd) { 
		if(!/^[A-Za-z0-9]+$/.test(pwd))  return false;  
		return true; 
		} 
	//判断密码格式函数结束
	

});
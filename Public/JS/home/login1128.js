$(function (){
	
	$('.login_username').focus(function(){
		
		$(this).val("");
		$(this).css("borderColor","#aaa");
		$('.error_tip1').css("display","none");
		$('.error_tip2').css("display","none");
		$('.error_tip3').css("display","none");
	}).blur(function(){
		if($(this).val()==""){
			$(this).val("请输入手机或邮箱");
		$(this).css("borderColor","#ccc");
		}
		 
	});	
	$('#login_psd').focus(function(){
		$('.error_tip1').css("display","none");
		$('.error_tip2').css("display","none");
		$('.error_tip3').css("display","none");
		$(this).css("borderColor","#aaa");
	}).blur(function(){
		$(this).css("borderColor","#ccc");
	});
    
	$(".lg_sub").click(function(){
		//alert($('#login_username').val());
		//alert($('#login_psd').val());
		if($('#login_username').val()==""||$('#login_username').val()=="请输入手机或邮箱"){
			
				$('.error_tip1').css("display","block");
			    return;
			}
		else $('.error_tip1').css("display","none");
		if($('#login_psd').val()==""){
			$('.error_tip2').css("display","block");
			  return;
		}
		else  $('.error_tip2').css("display","none");
	 	verifyData();
	 });
 
	/**
	 * 登陆用户名和密码处理
	 */
	function verifyData(){
		//alert("hello verify");
	$.ajax({
			url: "login",
			type:'POST',
			data: {
				"user":$("#login_username").val(),
				"psw":$(".lg_psd").val(),
				"remenber":$(".remenber").attr("checked")
				},
				success:function(data){ 
					//alert(data);
				if(data =='false'){
					$('.error_tip3').css("display","block");
	                         
	                      }
				if(data =='true'){
					 window.location.href="../index/index"; 
	                         
	                      }
				}         
	                      
	                     
		});
	}
	
});//文档加载函数结束	
	
	
	
	
	
	
	



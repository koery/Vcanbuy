// JavaScript Document
//第1部分
$(function(){
	$('#userinfo').focus(function(){
		$(this).val("");
		$(this).siblings('span').removeClass('errortip').removeClass('successtip').text('请输入邮箱/昵称');
		}).blur(function(){
			$(this).siblings('span').removeClass('errortip,successtip');
			if( $(this).val()==""){ 
				$(this).siblings('span').text("请填写正确的邮箱/昵称").addClass('errortip');}
			else if($(this).val()!=="" ){
					$(this).siblings('span').text("请填写").removeClass('errortip').addClass('successtip');}
		})	
});
//第3部分
$(function(){
	$('#renewpsd').focus(function(){
		$(this).val("");
		$(this).siblings('span').removeClass('errortip').removeClass('successtip').text('6-20个字符，可以是数字、字母和符号');
		}).blur(function(){
			$(this).siblings('span').removeClass('errortip,successtip');
			if( $(this).val()==""){ 
				$(this).siblings('span').text("密码需要是字母或数字，最小6位，最大20位").addClass('errortip');}
			else if($(this).val()!=="" ){
					$(this).siblings('span').text("请填写").removeClass('errortip').addClass('successtip');}
	})	
	
	$('#renewpsd1').focus(function(){
		$(this).val("");
		$(this).siblings('span').removeClass('errortip').removeClass('successtip').text("");
		}).blur(function(){
			$(this).siblings('span').removeClass('errortip,successtip');
			if( $(this).val()==""){ 
				$(this).siblings('span').text("2次输入的密码不一致").addClass('errortip');}
			else if($(this).val()!=="" ){
					$(this).siblings('span').text("请填写").removeClass('errortip').addClass('successtip');}
	})	
});
























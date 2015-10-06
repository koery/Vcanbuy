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
//第2部分邮件重发弹窗
$(function(){
//1.发送成功的情况
	$('.gostep3_right').click(function(){
		$('.lg_thick').show();
		var $mesbox=$('<div class="mes"></div>');
		$mesbox.appendTo('body');
		var $mestitle=$('<div class="mes_title"></div>');
		$mestitle.appendTo($mesbox);
		var $tipUp=$('<div class="tipUp">温馨提示</div>');
		var $aClose=$('<a href="#" class="close">x</a>');
		$mestitle.append($tipUp,$aClose);
		var $mesCon=$('<div class="mesSuccess"></div>');
		$mesCon.appendTo($mesbox);
		var $tip=$('<div class="tip1">发送成功</div>');
		$mesCon.append($tip);
		var $chashou=$('<div class="tip2">请前往<span>4066*@qq.com</span>邮箱进行查收</div>');+
		$mesCon.append($chashou);
		var $yanzheng=$('<a href="login.html" class="tip3">去邮箱验证</a>');
		$mesCon.append($yanzheng);
		//close
		$('.close').click(function(){
			$('.lg_thick').hide();
			$(this).parents(".mes").remove(); 
		})
		$('.tip3').click(function(){
			$('.lg_thick').hide();
			$(this).parents(".mes").remove(); 
			$(this).attr('target','_blank');
		})
	})
	
//发送失败的情况
/*	  $('.gostep3_right').click(function(){
	  $('.lg_thick').show();
	  var $mesbox=$('<div class="mes"></div>');
	  $mesbox.appendTo('body');
	  var $mestitle=$('<div class="mes_title"></div>');
	  $mestitle.appendTo($mesbox);
	  var $tipUp=$('<div class="tipUp">温馨提示</div>');
	  var $aClose=$('<a href="#" class="close">x</a>');
	  $mestitle.append($tipUp,$aClose);
	  var $mesCon=$('<div class="mesError"></div>');
	  $mesCon.appendTo($mesbox);
	  var $tip=$('<div class="errortip1">邮件发送失败，请联系客服！</div>');
	  $mesCon.append($tip);
	  var $a1=$('<a href="#" class="errortip2">确定</a>');
	  $mesCon.append($a1);
	  //close
	  $('.close').click(function(){
		  $('.lg_thick').hide();
		  $(this).parents(".mes").remove(); 
	  })
	  $('.errortip2').click(function(){
		  $('.lg_thick').hide();
		  $(this).parents(".mes").remove(); 
	  })
  })
*/  
  
  
})
























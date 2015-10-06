/**
 * 文件名称：send.js 
 * 版 本 号： 0
 * 创建日期： 2014.12.8
 * 作	者： MISS chen,coco
 * 功能说明： 邮件发送页面逻辑处理  
 */
$(function(){
	
	$('.goback').click(function(){		
		window.location.href="index";
	});
	
	
	$('.once').click(function(){
		
			$.ajax({
				url: "sendEmailAgain",
				type:'POST',				
				success:function(data){
					
					if (data=="true"){
						
						$('.lg_thick').show();
						var $mesbox=$('<div class="mes"></div>');
						$mesbox.appendTo('body');
						var $mestitle=$('<div class="mes_title"></div>');
						$mestitle.appendTo($mesbox);
						var $tipUp=$('<div class="tipUp">温馨提示</div>');
						var $aClose=$('<a href="javascript:void(0);" class="close">x</a>');
						$mestitle.append($tipUp,$aClose);
						var $mesCon=$('<div class="mesSuccess"></div>');
						$mesCon.appendTo($mesbox);
						var $tip=$('<div class="tip1">发送成功</div>');
						$mesCon.append($tip);
						var $chashou=$('<div class="tip2">请前往<span>'+$(".emailbox02").html()+'</span>邮箱进行查收</div>');
						$mesCon.append($chashou);
						var $yanzheng=$('<a  href="'+$(".yanzheng").attr("href")+'" class="tip3">去邮箱验证</a>');
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
					}else{
						 $('.lg_thick').show();
						  var $mesbox=$('<div class="mes"></div>');
						  $mesbox.appendTo('body');
						  var $mestitle=$('<div class="mes_title"></div>');
						  $mestitle.appendTo($mesbox);
						  var $tipUp=$('<div class="tipUp">温馨提示</div>');
						  var $aClose=$('<a href="javascript:void(0);" class="close">x</a>');
						  $mestitle.append($tipUp,$aClose);
						  var $mesCon=$('<div class="mesError"></div>');
						  $mesCon.appendTo($mesbox);
						  var $tip=$('<div class="errortip1">邮件发送失败，请联系客服！</div>');
						  $mesCon.append($tip);
						  var $a1=$('<a href="javascript:void(0);" class="errortip2">确定</a>');
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
					}
				}
			});
	});
	

	$('.goback,.once').mouseover(function(){
		$(this).css("color","#FF5151");
		}).mouseout(function(){
			$(this).css("color","#999");
	});
});






































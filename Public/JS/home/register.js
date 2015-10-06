/**
 * 文件名称： register.js 
 * 版 本 号： 0
 * 创建日期： 2014.11.28
 * 作	者： MISS chen,coco
 * 功能说明： 注册页面逻辑处理  
 * 
 * 版 本 号： 0.1 
 * 创建日期： 2014.12.6
 * 作	者： coco
 * 修改内容： i.完善密码确认
 *  		 ii.增加邮件验证  
 */

$(function(){
//用户名检测	
$('#regtel').focus(function(){
	$(this).siblings('span').removeClass('blurtip');
	$(this).siblings('span').removeClass('successtip');
	$(this).siblings('span').html('');
	$(this).css("border-color","#000");
	if($(this).val()=="请输入邮箱")
		$(this).val("");
	$(this).css("color","#000");
	}).blur(function(){
		var user=$(this).val();
		if(user==""){
			$(this).css("color","#999");
			$(this).val("请输入邮箱");
			$('#regtel').siblings('span').html('');
			return false;
			}
		if (user.indexOf("@") > -1) {
			if(checkEmail(user)){
				
				$.ajax({
					url: "check_email",
					type:'POST',
					data: {
						"email":user
						},
					success:function(data){
						if (data==0){//不存在
							$('#regtel').siblings('span').html('').addClass('successtip');
							$('#regtel').attr("check","true");
						}else{//存在
							$('#regtel').siblings('span').html('该用户名已注册,请重新选择').addClass('blurtip');
							$('#regtel').attr("check","false");
						}
					}
				});
							
			}
			else 	{
				$(this).siblings('span').html('邮箱格式错误').addClass('blurtip');
				$('#regtel').attr("check","false");
			}
			
        } //检验邮箱结束  
		
/**
 * 手机注册模块  
 */		
		else {
			
			if(checkMobile(user)) {
				$.ajax({
					url: "check_mobile",
					type:'POST',
					data: {
						"mobile":user
						},
					success:function(data){
						if (data==0){//不存在
							$('#regtel').siblings('span').html('').addClass('successtip');
							$('#regtel').attr("check","true");
						}else{//存在
							$('#regtel').siblings('span').html('该用户名已注册,请重新选择').addClass('blurtip');
							$('#regtel').attr("check","false");
						}
					}
				});
			}
			else 	$('#regtel').siblings('span').html('邮箱格式错误').addClass('blurtip');
			 
           
        }//检验手机结束  
		
});		
//用户名检测结束

//密码检测

$('#regpsd_text').focus(function(){
	$('#regpsd_text').css("border-color","#000");
	$('.regpsd_text').hide();
	$('#regpsd').css("border-color","#000");
	$('.regpsd').show();
	$('#regpsd').focus();
	
	
});

$('#regpsd').focus(function(){
	$(this).siblings('span').removeClass('blurtip');
	$(this).siblings('span').removeClass('successtip');
	$(this).siblings('span').html('');
	$(this).css("border-color","#000");
	$('#psdrepeat').siblings('span').html('');
	$(this).css("color","#000");
}).blur(function(){
	if($(this).val()==""){		
		$('#regpsd_text').css("color","#999");
		$('.regpsd').hide();
		$('#regpsd_text').css("border-color","#000");
		$('.regpsd_text').show();
		
	}
	else{
		var pwd=$(this).val();
		//alert(pwd+":"+pwd.length+":"+checkPwd(pwd));
		
		if(pwd.length<6){
			$(this).siblings('span').html('密码长度不足6位,请重新输入').addClass('blurtip');
			$('#regpsd').attr("check","false");
		}
		else if(pwd.length>20){
			$(this).siblings('span').html('密码长度超过20位,请重新输入').addClass('blurtip');	
			$('#regpsd').attr("check","false");
		}
		else if(!checkPwd(pwd)){			
			$(this).siblings('span').html('密码格式错误,请重新输入').addClass('blurtip');	
			$('#regpsd').attr("check","false");
		}
		else {
			$(this).siblings('span').html('').addClass('successtip');
			$('#regpsd').attr("check","true");
		}
	}
	if($("#psdrepeat").val()!=""){
		
		var pwd=$('#regpsd').val();
		var pwdR=$("#psdrepeat").val();
		//alert(pwd+":"+pwdR);
		//alert(checkPwd(pwd)+":"+checkPwd(pwdR));
		if(pwd.length>6&&pwd.length<=20&&pwdR.length>6&&pwdR.length<=20&&checkPwd(pwd)&&checkPwd(pwdR)){
			//alert(pwd+":"+pwdR);
			if(pwd != pwdR){
				$('#psdrepeat').siblings('span').html('').removeClass('successtip');
				$('#psdrepeat').siblings('span').html('两次密码不匹配,请重新输入').addClass('blurtip');
				$('#psdrepeat').css("border-color","#E4393C");
				$('#psdrepeat').attr("check","false");
			}
			else{
				$('#psdrepeat').siblings('span').html(' ').addClass('successtip');
				$('#regpsd').siblings('span').html(' ').addClass('successtip');
				$('#psdrepeat').css("border-color","#000");
				$(this).css("border-color","#000");
				$('#psdrepeat').attr("check","true");
			}
		}
	}
	
});


$('#psdrepeat_text').focus(function(){
	$('.psdrepeat_text').hide();
	$('.psdrepeat').show();
	$('#psdrepeat').css("border-color","#000");
	$('#psdrepeat').focus();
});
$('#psdrepeat').focus(function(){
	$(this).siblings('span').removeClass('blurtip');
	$(this).siblings('span').removeClass('successtip');
	$(this).siblings('span').html('');
	$(this).css("border-color","#000");
	$(this).css("color","#000");
}).blur(function(){
	
	if( $(this).val()==""){ 			
		
		$('.psdrepeat').hide();	
		$('.psdrepeat_text').show();
		$('#psdrepeat_text').css("border-color","#000");
		
		}
	else{
		var pwd=$(this).val();
		//alert(pwd+":"+pwd.length+":"+checkPwd(pwd));
		
		if(pwd.length<6){
			$(this).siblings('span').html('密码长度不足6位,请重新输入').addClass('blurtip');
			$(this).css("border-color","#E4393C");
			$('#psdrepeat').attr("check","false");
		}
		else if(pwd.length>20){
			$(this).siblings('span').html('密码长度超过20位,请重新输入').addClass('blurtip');
			$(this).css("border-color","#E4393C");
			$('#psdrepeat').attr("check","false");
		}
		else if(!checkPwd(pwd)){			
			$(this).siblings('span').html('密码格式错误,请重新输入').addClass('blurtip');
			$(this).css("border-color","#E4393C");
			$('#psdrepeat').attr("check","false");
		}
		else {
			$(this).siblings('span').html(' ').addClass('successtip');
			$(this).css("border-color","#000");
			$('#psdrepeat').attr("check","true");
		}
	}
	if($("#regpsd").val()!=""){
		
		var pwd=$('#regpsd').val();
		var pwdR=$("#psdrepeat").val();
		//alert(pwd+":"+pwdR);
		//alert(checkPwd(pwd)+":"+checkPwd(pwdR));
		if(pwd.length>6&&pwd.length<=20&&pwdR.length>6&&pwdR.length<=20&&checkPwd(pwd)&&checkPwd(pwdR)){
			//alert(pwd+":"+pwdR);
			if(pwd != pwdR){
				$('#psdrepeat').siblings('span').html('').removeClass('successtip');
				$('#psdrepeat').siblings('span').html('两次密码不匹配,请重新输入').addClass('blurtip');
				$('#psdrepeat').css("border-color","#E4393C");
				$('#psdrepeat').attr("check","false");
			}
			else{
				$('#psdrepeat').siblings('span').html(' ').addClass('successtip');
				$('#regpsd').siblings('span').html(' ').addClass('successtip');
				$('#regpsd').css("border-color","#000");
				$(this).css("border-color","#000");
				$('#psdrepeat').attr("check","true");
			}
		}
	}
		
});		
//密码检测结束

//介绍人代号检测   未完善
$('#intro_code').focus(function(){
	$(this).val("");
	$(this).siblings('span').removeClass('blurtip');
	$(this).siblings('span').removeClass('successtip');
	$(this).siblings('span').html('');
	$(this).css("border-color","#000");
	$(this).css("color","#000");
}).blur(function(){
	
	if($(this).val()==""){
		$(this).css("color","#999");
		$(this).val("请输入介绍人代号");
		$('#intro_code').siblings('span').html('');
		}
	else {
		$('#intro_code').siblings('span').html('').addClass('successtip');
		$('#intro_code').attr("check","ture");
	}
});

//介绍人代号检测结束
$("#rg2014_agreement").click(function(){
  
	$("#rg2014_agreement").attr("checked","checked");
	//alert($("#rg2014_agreement").attr("checked"));
});

//注册检测
$('.rg_button').mouseover(function(){
	$(this).css("background-position","0 -46px");
	}).mouseout(function(){
	$(this).css("background-position","0 0");
});

$('.rg_button').click(function(){
	  alert("hello");
	  alert("用户名:"+$('#regtel').attr("check")+
			"密码:"+$('#regpsd').attr("check")+
			"重复密码:"+$('#psdrepeat').attr("check")+
			"协议:"+$('#rg2014_agreement').attr("checked")	
	  );
	  
	  if($('#regtel').val()=="请输入邮箱"||$('#regtel').attr("check")=="false")
		  $('#regtel').css("border-color","#E4393C");
	  
	  if($('#regpsd').val()=="")		 
		  $('#regpsd_text').css("border-color","#E4393C");
	  if($('#regpsd').attr("check")=="false")		
		  $('#regpsd').css("border-color","#E4393C");
	  
	  if($('#psdrepeat').val()=="")		 
		  $('#psdrepeat_text').css("border-color","#E4393C");
	  if($('#psdrepeat').attr("check")=="false")	
		  $('#psdrepeat').css("border-color","#E4393C");
	  
	  if($(' #intro_code').val()=="请输入介绍人代号"||$('#intro_code').attr("check")!="ture")		 
		  $('#intro_code').css("border-color","#E4393C");
	  
	
	  if($('#psdrepeat').attr("check")=="true"&&$('#regtel').attr("check")=="true"){
		  $("#form").submit();
//	  alert($('#psdrepeat').attr("check"));
//	  alert($('#regtel').attr("check"));
//	  alert("用户名："+$('#regtel').val()+"密码："+$('#psdrepeat').val());
//	  $.ajax({
//			url: "send",
//		    type:'POST',
//		    data: {
//			"email":$('#regtel').val(),
//			"psword":$('#psdrepeat').val(),
//			"intro":$(' #intro_code').val()
//			}
////		    success:function(data){	
////		    	        if(data!=1)
////		    	        	{
////		    	        	window.location.href="../register/registerSucceed"; 		    	        	
////		    	        	}
////			        	if(data == 1){
////			        		$('#regtel').siblings('span').html('该用户名已注册,请重新选择').addClass('blurtip');
////							$('#regtel').attr("check","false");
////			        	}        
////					}
//			});
		  
	  }
});		  
//注册检测结束

//查看协议
$('#showagree').click(function(){
	$('.lg_thick').show();
	var $odiv1=$( '<div class="lg_thickbox"></div>' );
	$('.lg_thick').after($odiv1);
	var $odiv2=$( '<div class="lg_thicktitle"></div>' );
	var $odiv3=$( '<div class="lg_thickcon"></div>' );
	var $ospan1=$( '<span>Vcanbuy用户注册协议</span>' );
	var $oa1=$( '<a href="javascript:void(0);" id="closethickbox">x</a>' );
	$odiv1.append($odiv2,$odiv3);
	$odiv2.append($ospan1,$oa1);
	$odiv4=$( '<div class="register_bor"></div>' );
	$odiv3.append($odiv4);
	var $odiv5=$( '<div class="protocol_con"></div>' );
	var $odiv6=$( '<div class="btnt" id="savebox"></div>' );
	$odiv4.append($odiv5,$odiv6);
	$odiv5.append( '<h4>Vcanbuy用户注册协议</h4>' );
	$odiv5.append( '<p>本协议是您与京东网站（简称"本站"，网址：www.jd.com）所有者（以下简称为"京东"）之间就京东网站服务等相关事宜所订立的契约，请您仔细阅读本注册协议，您点击"同意并继续"按钮后，本协议即构成对双方有约束力的法律文件。</p>' );
	$odiv5.append( '<h4>第1条 本站服务条款的确认和接纳</h4>' );
	$odiv5.append( '<p>1.1&nbsp;本站的各项电子服务的所有权和运作权归京东所有。用户同意所有注册协议条款并完成注册程序，才能成为本站的正式用户。用户确认：本协议条款是处理双方权利义务的契约，始终有效，法律另有强制性规定或双方另有特别约定的，依其规定。</br>1.2&nbsp;用户点击同意本协议的，即视为用户确认自己具有享受本站服务、下单购物等相应的权利能力和行为能力，能够独立承担法律责任。</br>1.3&nbsp;如果您在18周岁以下，您只能在父母或监护人的监护参与下才能使用本站。</br>1.4&nbsp;京东保留在中华人民共和国大陆地区法施行之法律允许的范围内独自决定拒绝服务、关闭用户账户、清除或编辑内容或取消订单的权利。</p>' );
	$odiv5.append( '<h4>第2条 本站服务</h4>' );
	$odiv5.append( '<p> 2.1京东通过互联网依法为用户提供互联网信息等服务，用户在完全同意本协议及本站规定的情况下，方有权使用本站的相关服务。</br>2.2用户必须自行准备如下设备和承担如下开支：（1）上网设备，包括并不限于电脑或者其他上网终端、调制解调器及其他必备的上网装置；（2）上网开支，包括并不限于网络接入费、上网设备租用费、手机流量费等。 </p>' );
	$odiv5.append( '<h4>第3条 用户信息</h4>' );
	var $p3=$('<p></p>');
	$odiv5.append($p3);
	$p3.html('3.1用户应自行诚信向本站提供注册资料，用户同意其提供的注册资料真实、准确、完整、合法有效，用户注册资料如有变动的，应及时更新其注册资料。如果用户提供的注册资料不合法、不真实、不准确、不详尽的，用户需承担因此引起的相应责任及后果，并且京东保留终止用户使用京东各项服务的权利。</br>3.2用户在本站进行浏览、下单购物等活动时，涉及用户真实姓名/名称、通信地址、联系电话、电子邮箱等隐私信息的，本站将予以严格保密，除非得到用户的授权或法律另有规定，本站不会向外界披露用户隐私信息。</br>3.3用户注册成功后，将产生用户名和密码等账户信息，您可以根据本站规定改变您的密码。用户应谨慎合理的保存、使用其用户名和密。用户若发现任何非法使用用户账号或存在安全漏洞的情况，请立即通知本站并向公安机关报案。</br>3.4用户同意，京东拥有通过邮件、短信电话等形式，向在本站注册、购物用户、收货人发送订单信息、促销活动等告知信息的权利。</br>3.5用户不得将在本站注册获得的账户借给他人使用，否则用户应承担由此产生的全部责任，并与实际使用人承担连带责任。</br>3.6用户同意，京东有权使用用户的注册信息、用户名、密码等信息，登录进入用户的注册账户，进行证据保全，包括但不限于公证、见证等。');
	$odiv5.append( '<h4>第4条 用户依法言行义务</h4>' );
	var $p4=$('<p></p>');
	$odiv5.append($p4);
	$p4.html( '本协议依据国家相关法律法规规章制定，用户同意严格遵守以下义务：</br>（1）不得传输或发表：煽动抗拒、破坏宪法和法律、行政法规实施的言论，煽动颠覆国家政权，推翻社会主义制度的言论，煽动分裂国家、破坏国家统一的的言论，煽动民族仇恨、民族歧视、破坏民族团结的言论；</br>（2）从中国大陆向境外传输资料信息时必须符合中国有关法规；</br>（3）不得利用本站从事洗钱、窃取商业秘密、窃取个人信息等违法犯罪活动；</br>（4）不得干扰本站的正常运转，不得侵入本站及国家计算机信息系统；</br>（5）不得传输或发表任何违法犯罪的、骚扰性的、中伤他人的、辱骂性的、恐吓性的、伤害性的、庸俗的，淫秽的、不文明的等信息资料；</br>（6）不得传输或发表损害国家社会公共利益和涉及国家安全的信息资料或言论；</br>（7）不得教唆他人从事本条所禁止的行为；</br>（8）不得利用在本站注册的账户进行牟利性经营活动；</br>（9）不得发布任何侵犯他人著作权、商标权等知识产权或合法权利的内容；</br>用户应不时关注并遵守本站不时公布或修改的各类合法规则规定。</br>本站保有删除站内各类不符合法律政策或不真实的信息内容而无须通知用户的权利。</br>若用户未遵守以上规定的，本站有权作出独立判断并采取暂停或关闭用户帐号等措施。用户须对自己在网上的言论和行为承担法律责任。' );
	$odiv5.append( '<h4>第5条 商品信息</h4>' );
	var $p4=$('<p></p>');
	$odiv5.append($p4);
	$p4.html( '本站上的商品价格、数量、是否有货等商品信息随时都有可能发生变动，本站不作特别通知。由于网站上商品信息的数量极其庞大，虽然本站会尽最大努力保证您所浏览商品信息的准确性，但由于众所周知的互联网技术因素等客观原因存在，本站网页显示的信息可能会有一定的滞后性或差错，对此情形您知悉并理解；京东欢迎纠错，并会视情况给予纠错者一定的奖励。为表述便利，商品和服务简称为"商品"或"货物"。' );
	$odiv5.append( '<h4>第5条 商品信息</h4>' );
	var $p4=$('<p></p>');
	$odiv5.append($p4);
	$p4.html( '本站上的商品价格、数量、是否有货等商品信息随时都有可能发生变动，本站不作特别通知。由于网站上商品信息的数量极其庞大，虽然本站会尽最大努力保证您所浏览商品信息的准确性，但由于众所周知的互联网技术因素等客观原因存在，本站网页显示的信息可能会有一定的滞后性或差错，对此情形您知悉并理解；京东欢迎纠错，并会视情况给予纠错者一定的奖励。为表述便利，商品和服务简称为"商品"或"货物"。' );
	
	
	$('#closethickbox,#savebox').click(function(){
		$('#rg2014_agreement').attr("checked","checked");
		$('.lg_thickbox').remove();
		$('.lg_thick').hide();
	});

});	  
//查看协议结束

//判断手机号码格式函数开始
/** 
* 功能：判断用户输入的手机号格式是否正确 
* 传参：无 
* 返回值：true or false 
*/ 
function checkMobile(mobile) {  
if (/^[1][0-9][0-9]{9}$/.test(mobile)) return true; 
return false; 
} 
//判断手机号码格式函数结束

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




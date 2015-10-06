/**
 * 文件名称： update_psw.js 
 * 版 本 号： 0 
 * 创建日期： 03/28/2015 11:05:30 AM    	   		 
 * 作	者： coco
 * 功能说明： 首页逻辑处理
 */

$(function(){
	
	/*
	 * 点击提交按钮
	 */
	
	/*
	 * 1 密码为空 给出提示
	 * 2 密码不为空比较是否相同
	 * 3 密码长度
	 */
	
	$('.btn-primary').click(function(){
		
		var password=$('#password').val();
		var password_again=$('#password_again').val();
		if(password==''){
			alert("输入密码不能为空");
			return false;
		}
		if(password_again==''){
			alert("请再次确认密码");
			return false;
		}
		if(password!=''&&password_again!=''){
			
			if(password!=password_again){
				
				alert("两次密码不同，请重新确认");
				$('#password').val('');
				$('#password_again').val('');
				return false;
			}else{
				
			   if(confirm("确定修改密码")){
				   
				  
				   $.ajax({
						url: "update_psw_save",
						type:'POST',
						data: {
							 'password':$('#password').val(),
							 'id':$('#id').val()
							},
						success:function(data){
				               // alert(data);
				                if(data){
				                	
				                	 window.location.href="../manager/manager"; 
				                	
				                }else{
				                	
				                	alert('修改失败');
				                } 
						}
					});
			   }
				
			}
		}
	});
	
	
})//update_psw.js结束


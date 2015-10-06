/**
 * 文件名称： add.js 
 * 版 本 号： 0 
 * 创建日期：   	   		 
 * 作	者： coco
 * 功能说明： 
 */

$(function(){
	
	$('.btn-primary').click(function(){
	
		var username=$('#username').val();
		var password=$('#password').val();
		var name=$('#name').val();		
		var email=$('#email').val();
		var sex=$('#sex').val();
		var language=$('#language').val();
		if(username==''){
			alert("输入用户名不能为空");
			return false;
		}
		if(password==''){
			alert("输入密码不能为空");
			return false;
		}
		
		if(name==''){
			alert("输入真实用户名不能为空");
			return false;
		}
		if(email==''){
			alert("输入Email不能为空");
			return false;
		}
		if(sex==''){
			alert("输入性别不能为空");
			return false;
		}
		if(language==''){
			alert("输入语言不能为空");
			return false;
		}
		 if(confirm("确定")){
			   
			  
			   $.ajax({
					url: "add_save",
					type:'POST',
					data: {
						'username':username,
						 'password':password,
						 'name':name,
						 'email':email,
						 'sex':sex,
						 'language':language,
						 
						},
					success:function(data){
			               // alert(data);
			                if(data==3){
			                	
			                	 window.location.href="../manager/manager"; 
			                	
			                }else if(data==1){
			                	
			                	alert('新增失败,用户名已经存在');
			                }else{
			                	
			                	alert('插入数据失败');
			                }
					}
				});
		   }
			
		
	});
	
})//update_psw.js结束


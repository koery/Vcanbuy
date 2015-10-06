/**
 * 文件名称： update_psw.js 
 * 版 本 号： 0 
 * 创建日期：   	   		 
 * 作	者： coco
 * 功能说明： 
 */

$(function(){
	
	/*
	 * 点击提交按钮
	 * 获取数据，异步传输处理		
	 */
	
	$('.btn-primary').click(function(){
		
		 $.ajax({
				url: "update_save",
				type:'POST',
				data: {
					
					 'name':$('#name').val(),
					 'email':$('#email').val(),
					 'sex':$('#sex').val(),
					 'language':$('#language').val(),
					 'status':$('#status').val(),
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
	});
	
	
})//update_psw.js结束


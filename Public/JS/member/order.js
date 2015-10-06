function removeorder(id){
 
	$.ajax({
		url: "delete",
		type:'POST',
		data:{
			'id':id
		},
		success:function(data){
                       $('.tb_' + id).remove();
		}
	});
}

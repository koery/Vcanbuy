function addFavorites(){
	$.ajax({
		url: "add_favorites",
		type:'POST',
		data: {
			"shop_site":$("#shop_site").val(),
			"image_url":$("#image_url").val(),
			"product":$("#product").val(),
			"product_url":$("#product_url").val(),
			"product_id":$("#product_id").val(),
			"shop_id":$("#shop_id").val(),
			"shop_url":$("#shop_url").val(),
			"shop_username":$("#shop_username").val()
			},
		success:function(data){
			alert('已加入收藏夹。');
		}
	});
}

function toFavorites(id){
	$.ajax({
		url: "to_favorites",
		type:'POST',
		data: {
			"id":id
			},
		success:function(data){
			$('#tr_'+id).remove();//删除表格行 
		}
	});
}
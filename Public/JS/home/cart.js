function addCart(){
//    alert("shop_site"+$("#shop_site").val());
//    alert("image_url"+$("#image_url").val());
//    alert("product"+$("#product").val());
//    alert("product_url"+$("#product_url").val());
//    alert("product_id"+$("#product_id").val());
//    alert("shop_id"+$("#shop_id").val());
//    alert("shop_url"+$("#shop_url").val());
//    alert("shop_username"+$("#shop_username").val());
//    alert("ku_num"+$(".ku_num").html());
//    alert($("#sku").val());
//    alert("price_th"+$("#price_cn").val());
//    //alert($(".dd_price").val());
//    alert("buynum"+$("#buynum").val());
    
    
	$.ajax({
		url: "add_cart",
		type:'POST',
		data: {
			"shop_site":$("#shop_site").val(),
			"image_url":$("#spec_n1").attr('src'),
			"product":$("#product").val(),
			"product_url":$("#product_url").val(),
			"product_id":$("#product_id").val(),
			"shop_id":$("#shop_id").val(),
			"shop_url":$("#shop_url").val(),
			"shop_username":$("#shop_username").val(),
			"sku":$(".ku_num").html(),
			"sku_name":$("#sku").val(),
			//"price_th":$("#price_th").val(),
			"price_cn":$("#price_cn").val(),
			"qty":$("#buynum").val(),
			},
		success:function(data){
                // alert(data);
			if(data ==1){
                            $('#mod_carttip').hide();
                            $('#mod_carttip').show();
                        }
                        if(data ==0){
                            alert('添加失败');
                        }
                        
                        if(data ==2){
                           alert('请先登录');
                        }
			refreshCart();
		}
	});
}
/*
 * 移出购物车
 */
function removeCart(id){
	$.ajax({
		url: "delete",
		type:'POST',
		data:{
			'id':id
		},
		success:function(data){
		
		}
	});
}
//批量删除购物车
    function delall(strid){
        $.ajax({
		url: "deleteall",
		type:'POST',
		data:{
			'id':strid
		},
		success:function(data){
		
		}
	});
    }
//修改购物车数量
function modifyCart(q,id){
  //  alert(q);
    //alert(id);
	$.ajax({
		url: "modify",
		type:'POST',
		data:{
			'id':id,
                        'qty':q,
		},
		success:function(data){
		
		}
	});
}
//
/**
 * 刷新购物车
 */
function refreshCart(){
	$.ajax({
		url: "get_cart",
		type:'POST',
		success:function(data){
			$('#mycart').text(data);
			//clearWin();
		}
	});
}
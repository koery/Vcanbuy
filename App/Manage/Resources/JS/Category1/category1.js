function verifyData() {
    if( document.getElementById("category_1").value =="") {
    	document.getElementById("category_1").focus();
    	document.getElementById("msg_category_1").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_category_1").style.display ='none';
    }
    
    if( document.getElementById("category_2_cn").value =="") {
    	document.getElementById("category_2_cn").focus();
    	document.getElementById("msg_category_2_cn").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_category_2_cn").style.display ='none';
    }
    
    if( document.getElementById("category_2_th").value =="") {
    	document.getElementById("category_2_th").focus();
    	document.getElementById("msg_category_2_th").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_category_2_th").style.display ='none';
    }
    return true;
}



function setOrders(){
	$.ajax({
		url: "get_orders",
		type:'POST',
		data:"category_1="+document.getElementById('category_1').value,
		success:function(data){
			
			document.getElementById('orders').value =data;
		}
	})
}

function verifyData() {
    if( document.getElementById("floor_1").value =="") {
    	document.getElementById("floor_1").focus();
    	document.getElementById("msg_floor_1").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_floor_1").style.display ='none';
    }
    
    if( document.getElementById("floor_2_cn").value =="") {
    	document.getElementById("floor_2_cn").focus();
    	document.getElementById("msg_floor_2_cn").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_floor_2_cn").style.display ='none';
    }
    
    if( document.getElementById("floor_2_th").value =="") {
    	document.getElementById("floor_2_th").focus();
    	document.getElementById("msg_floor_2_th").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_floor_2_th").style.display ='none';
    }
    return true;
}



function setOrders(){
	$.ajax({
		url: "get_orders",
		type:'POST',
		data:"floor_1="+document.getElementById('floor_1').value,
		success:function(data){
			document.getElementById('orders').value =data;
		}
	})
}

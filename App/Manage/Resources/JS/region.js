function verifyData() {
    if( document.getElementById("country").value =="") {
    	document.getElementById("country").focus();
    	document.getElementById("msg_country").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_country").style.display ='none';
    }
    if( document.getElementById("region").value =="") {
    	document.getElementById("region").focus();
    	document.getElementById("msg_region").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_region").style.display ='none';
    }
    return true;
}
function setOrders(){
	$.ajax({
		url: "get_orders",
		type:'POST',
		data:"country="+document.getElementById('country').value,
		success:function(data){
			document.getElementById('orders').value =data;
		}
	})
}

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
    if( document.getElementById("province").value =="") {
    	document.getElementById("province").focus();
    	document.getElementById("msg_province").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_province").style.display ='none';
    }
    return true;
}
function setRegion(){
	$.ajax({
		url: "get_region",
		type:'POST',
		data:"country="+document.getElementById('country').value,
		success:function(data){
			var a = eval(data);		//数组转换
			var region = document.getElementById('region');
			region.options.length = 0;
			region.options.add(new Option('',''));   
			for(var i=0;i<a.length;i++){
				var item = new Option(a[i]['region'], a[i]['region_id']);      
				region.options.add(item);   
			}
		}
	})
}

function setOrders(){
	$.ajax({
		url: "get_orders",
		type:'POST',
		data:"region="+document.getElementById('region').value,
		success:function(data){
			document.getElementById('orders').value =data;
		}
	})
}

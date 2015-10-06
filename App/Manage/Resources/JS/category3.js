function verifyData() {
     
    
    
    if( document.getElementById("category_1").value =="") {
    	document.getElementById("category_1").focus();
    	document.getElementById("msg_category_1").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_category_1").style.display ='none';
    }
    
    if( document.getElementById("category_2").value =="") {
    	document.getElementById("category_2").focus();
    	document.getElementById("msg_category_2").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_category_2").style.display ='none';
    }
    
    if( document.getElementById("category_3_cn").value =="") {
    	document.getElementById("category_3_cn").focus();
    	document.getElementById("msg_category_3_cn").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_category_3_cn").style.display ='none';
    }
    
    if( document.getElementById("category_3_th").value =="") {
    	document.getElementById("category_3_th").focus();
    	document.getElementById("msg_category_3_th").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_category_3_th").style.display ='none';
    }
    
    if( document.getElementById("start_time").value =="") {
    	document.getElementById("start_time").focus();
    	document.getElementById("msg_start_time").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_start_time").style.display ='none';
    }
    
    if( document.getElementById("end_time").value =="") {
    	document.getElementById("end_time").focus();
    	document.getElementById("msg_end_time").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_end_time").style.display ='none';
    }
    //yanghw
     //var re =new RegExp("^[a-zA-z]+://(\\w+(-\\w+)*)(\\.(\\w+(-\\w+)*))*(\\?\\S*)?$"); 
     var re = new RegExp("^[A-Za-z]+://[A-Za-z0-9-_]+\\.[A-Za-z0-9-_%&\?\/.=]+$");
     if(!re.test(document.getElementById("category_3_url").value)) {
        
              
    	document.getElementById("category_3_url").focus();
    	document.getElementById("msg_category_3_url").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_category_3_url").style.display ='none';
    }
    return true;
}


function setCategory_1(){
	$.ajax({
		url: "get_category_2",
		type:'POST',
		data:"category_1="+document.getElementById('category_1').value,
		success:function(data){
			var a = eval(data);		//数组转换
			var category_2 = document.getElementById('category_2');
			category_2.options.length = 0;
			category_2.options.add(new Option('',''));   
			for(var i=0;i<a.length;i++){
				var item = new Option(a[i]['category_2_cn'], a[i]['category_2_id']);      
				category_2.options.add(item);   
			}
		}
	})
}
function setOrders(){
	$.ajax({
		url: "get_orders",
		type:'POST',
		data:"category_2="+document.getElementById('category_2').value,
		success:function(data){
			document.getElementById('orders').value =data;
		}
	})
}

function verifyData() {
	//title
    if( document.getElementById("img_url").value =="") {
    	document.getElementById("img_url").focus();
    	document.getElementById("msg_img_url").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_img_url").style.display ='none';
    }
    //start_time
    if( document.getElementById("website_name_cn").value =="") {
    	document.getElementById("website_name_cn").focus();
    	document.getElementById("msg_website_name_cn").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_website_name_cn").style.display ='none';
    }
    //end_time
    if( document.getElementById("website_name_th").value =="") {
    	document.getElementById("website_name_th").focus();
    	document.getElementById("msg_website_name_th").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_website_name_th").style.display ='none';
    }

    //type
    if( document.getElementById("order").value =="") {
    	document.getElementById("order").focus();
    	document.getElementById("msg_order").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_order").style.display ='none';
    }

    //lan
    if( document.getElementById("language").value =="") {
    	document.getElementById("language").focus();
    	document.getElementById("msg_language").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_language").style.display ='none';
    }


    return true;
}
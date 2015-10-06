function verifyData() {
	//title
    if( document.getElementById("title").value =="") {
    	document.getElementById("title").focus();
    	document.getElementById("msg_title").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_title").style.display ='none';
    }
    //start_time
    if( document.getElementById("start_time").value =="") {
    	document.getElementById("start_time").focus();
    	document.getElementById("msg_start_time").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_start_time").style.display ='none';
    }
    //end_time
    if( document.getElementById("end_time").value =="") {
    	document.getElementById("end_time").focus();
    	document.getElementById("msg_end_time").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_end_time").style.display ='none';
    }

    //type
    if( document.getElementById("type").value =="") {
    	document.getElementById("type").focus();
    	document.getElementById("msg_type").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_type").style.display ='none';
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
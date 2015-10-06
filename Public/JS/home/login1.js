function verifyData(){
    if( document.getElementById("user").value =="") {
    	document.getElementById("user").focus();
    	document.getElementById("msg_user").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_user").style.display ='none';
    }
    
    if( document.getElementById("psw").value =="") {
    	document.getElementById("psw").focus();
    	document.getElementById("msg_psw").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_psw").style.display ='none';
    }
    return true;
}
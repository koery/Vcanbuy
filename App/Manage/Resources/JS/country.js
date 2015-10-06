function verifyData() {
    if( document.getElementById("country").value =="") {
    	document.getElementById("country").focus();
    	document.getElementById("msg_country").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_country").style.display ='none';
    }

    return true;
}
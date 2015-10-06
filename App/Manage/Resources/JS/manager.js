function verifyData() {
    if( document.getElementById("username").value =="") {
    	document.getElementById("username").focus();
    	document.getElementById("msg_username").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_username").style.display ='none';
    }
    if( document.getElementById("password").value =="") {
    	document.getElementById("password").focus();
    	document.getElementById("msg_password").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_password").style.display ='none';
    }
    if( document.getElementById("email").value !="") {
    	var email =document.getElementById("email").value;
    	var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
    	if (!reg.test(email)){
    		document.getElementById("email").focus();
    		document.getElementById("msg_email").style.display ='';
    		return false;
    	}else{
    		document.getElementById("msg_email").style.display ='none';
    	}
     }

    return true;
}
function verifyDataPsw() {
    if( document.getElementById("psw1").value =="") {
    	document.getElementById("psw1").focus();
    	document.getElementById("msg_psw1").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_psw1").style.display ='none';
    }
    
    if( document.getElementById("psw2").value != document.getElementById("psw1").value) {
    	document.getElementById("psw2").focus();
    	document.getElementById("msg_psw2").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_psw2").style.display ='none';
    }

    return true;
}
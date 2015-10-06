function check_email(){
	var email =document.getElementById("email").value;
	var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
	if (!reg.test(email)){
		document.getElementById("email").focus();
		document.getElementById("msg_email_1").style.display ='';
		return false;
	}else{
		document.getElementById("msg_email_1").style.display ='none';
	}
	

	
	$.ajax({
		url: "check_email",
		type:'POST',
		data: {
			"email":$("#email").val()
			},
		success:function(data){
			if (data>0){
				document.getElementById("msg_email_2").style.display ='';
				document.getElementById("msg_email_3").style.display ='none';
			}else{
				document.getElementById("msg_email_2").style.display ='none';
				document.getElementById("msg_email_3").style.display ='';
			}
		}
	});
}

function verifyData(){
	var email =document.getElementById("email").value;
	var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
	if (!reg.test(email)){
		document.getElementById("email").focus();
		document.getElementById("msg_email_1").style.display ='';
		return false;
	}else{
		document.getElementById("msg_email_1").style.display ='none';
	}
	
	if (document.getElementById("msg_email_1").style.display ==''){
		return false;
	}
	
    if( document.getElementById("psword").value =="") {
    	document.getElementById("psword").focus();
    	document.getElementById("msg_psword").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_psword").style.display ='none';
    }
    
    if( document.getElementById("psword2").value != document.getElementById("psword").value) {
    	document.getElementById("psword2").focus();
    	document.getElementById("msg_psword2").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_psword2").style.display ='none';
    }
    
	return true;
}
function accpet(){
	if( document.getElementById("ac").checked){
		document.getElementById("button").disabled ='';
	}else{
		document.getElementById("button").disabled ='disabled';
	}
}
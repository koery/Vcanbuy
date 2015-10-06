$(function(){
	var timer;
	var i=10;
	timer=setInterval(function(){
		if(i==0){
			window.location.href="../login/index";
			clearInterval(timer);
			
		}
		$('#countdown').find('span').text(i);
		i--;
	},1000);
	
	
	var timerFlashing;
	var k=1;
	var str="";
	timerFlashing=setInterval(function(){
		if(k>=5){
			k=1;
		}
		str="";
		for(j=0;j<k;j++){			
			str +=".";		
		}
		    
		$('.flashing').html(str);
		k++;
	},1000);
	
	
	
})


















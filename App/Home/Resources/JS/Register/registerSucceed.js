$(function(){
	var timer;
	var i=10;
	timer=setInterval(function(){
		if(i==0){
			window.location.href="../index/index";
			clearInterval(timer);
		}
		$('#countdown').find('span').text(i);
		i--;
	},1000);
})











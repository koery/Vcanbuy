function verifyData1() {
    if( document.getElementById("url").value =="") {
    	document.getElementById("url").focus();
    	document.getElementById("msg_url").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_url").style.display ='none';
    }
    
    return true;
}
function verifyData2() {
    
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
function setCategory_2(){
	$.ajax({
		url: "get_category_3",
		type:'POST',
		data:"category_2="+document.getElementById('category_2').value,
		success:function(data){
			var a = eval(data);		//数组转换
			var category_3 = document.getElementById('category_3');
			category_3.options.length = 0;
			category_3.options.add(new Option('',''));   
			for(var i=0;i<a.length;i++){
				var item = new Option(a[i]['category_3_cn'], a[i]['category_3_id']);      
				category_3.options.add(item);   
			}
		}
	})
}
function setFloor_1(){
	$.ajax({
		url: "get_floor_2",
		type:'POST',
		data:"floor_1="+document.getElementById('floor_1').value,
		success:function(data){
			var a = eval(data);		//数组转换
			var floor_2 = document.getElementById('floor_2');
			floor_2.options.length = 0;
			floor_2.options.add(new Option('',''));   
			for(var i=0;i<a.length;i++){
				var item = new Option(a[i]['floor_2_cn'], a[i]['floor_2_id']);      
				floor_2.options.add(item);   
			}
		}
	})
}
function setFloor_2(){
	$.ajax({
		url: "get_floor_3",
		type:'POST',
		data:"floor_2="+document.getElementById('floor_2').value,
		success:function(data){
			var a = eval(data);		//数组转换
			var floor_3 = document.getElementById('floor_3');
			floor_3.options.length = 0;
			floor_3.options.add(new Option('',''));   
			for(var i=0;i<a.length;i++){
				var item = new Option(a[i]['floor_3_cn'], a[i]['floor_3_id']);      
				floor_3.options.add(item);   
			}
		}
	})
}
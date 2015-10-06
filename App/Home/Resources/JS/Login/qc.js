/**
 * 文件名称： qc.js 
 * 版 本 号： 1.0 
 * 创建日期： 03/04/2015 19:17:39 PM    		
 * 作	者： coco
 * 功能说明： 1计算收到货物数量
 *  		2显示总数随填写改变变动	 
 */
$(function (){//文档加载开始
	
	
	
	/*
	 * 计算总量
	 */
	var getGoods = 0;
	$(".getGoods").each(function(){
		
		getGoods += parseInt($(this).val());
			
	});
	$("#getGoods").html("总发货数："+getGoods);
	alert(getGoods);
	
	/*
	 * 显示随着输入改变
	 */
	var getGoodsOld = 0;
	var getGoodsNew = 0;
   $(".getGoods").focus(function(){
	   
	   //alert(parseInt($(this).val()));
	   getGoodsOld = parseInt($(this).val());
	 
   }).blur(function(){
	   
	  // alert(parseInt($(this).val()));
	   getGoodsNew = parseInt($(this).val());
	   getGoods = getGoods - getGoodsOld + getGoodsNew;
	   $("#getGoods").html("总发货数："+getGoods);
   });
	
	
	
});//文档加载函数结束	
	
	
	
	
	
	
	



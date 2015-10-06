$(function() {
	$(".zonghepaixu a")
			.click(
					function() {
						var order = $(this).attr("data");
						var idee = $('.category_ajax_id').val();
						$
								.ajax( {
									url : "index?id=" + idee + "&order="
											+ order,
									type : 'post',
									data : {
										"order" : order
									// "id":idee
									},
									success : function(json) {
										var a = eval(json); // 数组转换

										// floor_2.options.add(new
										// Option('',''));
										// alert(a.length);
										// alert(json);
										var str = "";
										var page = "<ul><li>&lt;&lt;</li>";
										var i;
										for (i = 1; i < a.length + 1; i++) {
											// alert(a[0]['product_url']);
											// str += "<div
											// class='list_content_up'>";
											if (i % 5 != 0) {
												str += "<dl class='list_content01'>";
											} else {
												str += "<dl class='list_content01 list_content02'>";
												page += "<li><span>" + i
														+ "<span></li>";
											}
											str += "<dt><a target='__blank' href=../proinfo/index?id="
													+ a[i - 1]['product_id']
													+ "><img src=/upload/"
													+ a[i - 1]['image_url']
													+ " width='220' height='220' /></a></dt>";
											str += "<dd>";
											str += "<p class='price_l'>";
											str += "<span class='pricezong'><strong>"
													+ a[i - 1]['sales_price']
													+ "</strong></span>";
											str += "<span class='priceshou'>已售1254件</span>";
											str += "</p>";
											str += "<p class='price_c'><a target='__blank' href=";
											str += a[i - 1]['product_url'];
											str += ">" + a[i - 1]['title_cn']
													+ "</a></p>";
											str += "<p class='price_z'>"
													+ a[i - 1]['shop'] + "</p>";
											str += "</dd>";
											str += "</dl>";
										}
										if (i = a.length) {
											var e = eval(a[i - 1]['page']);
											// alert(e);
										}
										$('.list_content_up').html(str);
										$('.page').html(e);
									}
								});
						return flase;
					});
	/*
	 * $(".page a").mousedown(function(){ return false; }); $(".page
	 * a").click(function(){ return flase; var order = $(this).attr("data"); var
	 * idee = $('.category_ajax_id').val(); $.ajax({ url:
	 * "index?id="+idee+"&order="+order+"&page="+$(this).hyml(), type:'post',
	 * data: { "order":order //"id":idee }, success:function(json){ var a =
	 * eval(json); //数组转换
	 * 
	 * //floor_2.options.add(new Option('','')); //alert(a.length); alert(a);
	 * var str=""; var page = "<ul><li>&lt;&lt;</li>"; var i; for(i=1;i<a.length+1;i++){
	 * //alert(a[0]['product_url']); // str += "<div class='list_content_up'>";
	 * if(i%5!=0) { str +="<dl class='list_content01'>"; } else { str +="<dl class='list_content01 list_content02'>";
	 * page+="<li><span>"+i+"<span></li>"; } str +="<dt><a
	 * target='__blank' href="+a[i-1]['product_url']+"><img
	 * src=/upload/"+a[i-1]['image_url']+" width='220' height='220' /></a></dt>"
	 * str +="<dd>"; str +="<p class='price_l'>"; str +="<span
	 * class='pricezong'><strong>"+a[i-1]['sales_price']+"</strong></span>";
	 * str +="<span class='priceshou'>已售1254件</span>"; str +="</p>"; str +="<p class='price_c'><a
	 * target='__blank' href="; str +=a[i-1]['product_url']; str
	 * +=">"+a[i-1]['title_cn']+"</a></p>"; str +="<p class='price_z'>"+a[i-1]['shop']+"</p>";
	 * str +="</dd>"; str +="</dl>"; } if(i=a.length) { var e =
	 * eval(a[i-1]['page']); alert(e); } $('.list_content_up').html(str);
	 * $('.page').html(e); } }); });
	 */
});
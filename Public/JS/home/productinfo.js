$(function() {
	$("#selectedcolor .item")
			.click(
					function() {
                                            
						var idee = $(this).attr('data');
                                              //  alert(idee);
						$
								.ajax( {
									url : "get_size?id=" + idee,
									type : 'get',
									data : {
                                                                                "id":idee,
									},
									success : function(json) {
										var a = eval(json); // 数组转换

										// floor_2.options.add(new
										// Option('',''));
										 
                                                                                   // alert(a[0]['product_size']);
                                                                                   // var str = a[0]['product_size'];
                                                                                   // var image = a[0]['image_url'];
                                                                                 // var arr=str.split(",");
                                                                                  //alert(arr[0]);
										var str1 = "";
										// $('#spec_n1').attr('src','/upload/'+image);
										//var i;
										for (i = 0; i < a.length; i++) {
											
											str1 += "<div class='item'>"+a[i]['size']+"</div>";
											
										}
										
										$('#selectedsize').html(str1);
                                                                              //$('#spec_n1').attr('src','/upload/'+image);
                                                                               $('#selectedcolor>div,#selectedsize>div').click(function(){
		$(this).siblings().removeClass('selecteditem');
		$(this).addClass('selecteditem');
	});
									}
								});
					});
});
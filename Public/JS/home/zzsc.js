(function($){
	$.scrollContent = function(obj){
		var posList = [];
		var posNum = 0;
		var timer = 0;
		var direction = 0;
		var delay = 5000;
		var activeClass = "list_on"
		if(obj.delay){
			delay = obj.delay;
		}
		function showPos(num){
			obj.content.animate({
				"left": "-" + posList[num] + "px"
			});	
			if(obj.btn){
				obj.btn.removeClass(activeClass);
				obj.btn.eq(num).addClass(activeClass);
			}
		}
		function viewNext(){
			posNum ++;
			if(posNum >= posList.length){
				posNum = 0;	
			}
			showPos(posNum);
		}
		function viewPrev(){
			posNum --;
			if(posNum < 0){
				posNum = posList.length - 1;	
			}
			showPos(posNum);
		}
		function autoShow(){
			timer = setInterval(function(){
				if(direction && obj.direct){
					viewPrev();
				}
				else{
					viewNext();
				}
			}, delay);
		}
		function resetScroll(){
			clearInterval(timer);
			autoShow();	
		}
		obj.content.css("width", function(){
			var boxWidth = 0;
			var child = $(this).children();
			for(var i = 0; i < child.length; i ++){
				boxWidth += child.eq(i).outerWidth();
			}
			return boxWidth + "px";
		}).children().each(function(i){
			posList[i] = $(this).position().left;
		}).bind("mouseover", function(){
			clearInterval(timer);	
		}).bind("mouseout", function(){
			autoShow();	
		});
		if(obj.btn){
			obj.btn.each(function(i){
				$(this).bind("mouseover", function(){
					showPos(i);
					posNum = i;
					resetScroll();
				});
			});
		}
		if(obj.next){
			obj.next.bind("mouseover", function(){
				direction = 0;
				viewNext();
				resetScroll();
			});
		}
		if(obj.prev){
			obj.prev.bind("mouseover", function(){
				direction = 1;
				viewPrev();
				resetScroll();
			});
		}
		showPos(0);
		autoShow();
	}
})(jQuery);

(function($){
	$.fn.featureList = function(options) {
		var tabs	= $(this);
		var output	= $(options.output);

		new jQuery.featureList(tabs, output, options);

		return this;	
	};
	$.featureList = function(tabs, output, options) {
		function slide(nr) {
			if (typeof nr == "undefined") {
				nr = visible_item + 1;
				nr = nr >= total_items ? 0 : nr;
			}

			tabs.removeClass('list_on').filter(":eq(" + nr + ")").addClass('list_on');

			output.stop(true,true).filter(":visible").fadeOut();
			output.filter(":eq(" + nr + ")").fadeIn(100,function() {
				visible_item = nr;	
			});
		}
		var options			= options || {}; 
		var total_items		= tabs.length;
		var visible_item	= options.start_item || 0;
		options.pause_on_hover		= options.pause_on_hover		|| true;
		options.transition_interval	= options.transition_interval	|| 5000;
		output.hide().eq( visible_item ).show();
		tabs.eq( visible_item ).addClass('list_on');
		tabs.mouseover(function() {
			if ($(this).hasClass('list_on')) {
				return false;	
			}

			slide(tabs.index(this));
		});
		if (options.transition_interval > 0) {
			var timer = setInterval(function () {
				slide();
			}, options.transition_interval);

			if (options.pause_on_hover) {
				tabs.mouseenter(function() {
					clearInterval( timer );

				}).mouseleave(function() {
					clearInterval( timer );
					timer = setInterval(function () {
						slide();
					}, options.transition_interval);
				});
			}
		}
	};
})(jQuery);

$(document).ready(function(){
	(function(){
		var timer1, timer2;
		var link_more = $("[rel=js_more_link]"), link_content = $("#js_more_link_content");
		link_more.bind("mouseover", function(){
			clearTimeout(timer2);
			timer1 = setTimeout(function(){
				link_content.fadeIn()
			}, 600);
		}).bind("mouseout", function(){
			clearTimeout(timer1);
			timer2 = setTimeout(function(){
				link_content.fadeOut()
			}, 900);
		});
	});
		
	$(".col-sub ul li").first().addClass("first-child").end().last().addClass("last-child");
	$(".invest-box, .events-list").last().addClass("no-border");
	
	(function(){
		setInterval(function(){
			$("[rel=js_toggle_img]").children().toggle();
		}, 7000)
	})();
	
	$.scrollContent({
		content: $("[rel=scroll_box_content]"),
		btn: $("[rel=js_btn_list]"),
		prev: $("[rel=js_btn_prev]"),
		next: $("[rel=js_btn_next]"),
		delay: 2000,
		direct: true
	});
	
	$.featureList(
	$("[rel=feature_list_btn]"),
	$("[rel=feature_list]"), {
		start_item:	0,
		transition_interval: 6000
		}
	);
	
});

 $(document).ready(function(){
  /*-------------------------------*/	
  $(function(){
 
	  $(".logo_c21 ul").hide();
	  
	  $(".logo_c21").hover(function(){
		  $(this).find("ul").stop(true,true);
		  $(this).find("ul").show();
	  },function(){
		  $(this).find("ul").stop(true,true);
		  $(this).find("ul").hide();
	  });
	  
  })
  
  /*-------------------------------*/	
  //var rnum=$(".main_list_div ul li").size();//获得li的个数；
  var rnum=2;
  var cnum=0;
  //$(".mke_ns2").html(rnum);
  //$(".mkeUl ul").width(rnum*588);
  $("#leftbtn1").click(function(){
	  
	  cnum++;
	  if(cnum>(rnum-1)){
	  cnum=0	
	  }
	  //alert(cnum);
	  $("#mian_list_div1 ul").animate({"left":-cnum*253},300);
	  
	  //$(".mke_ns1").html(cnum+1);
  });
  $("#rightbtn1").click(function(){
	  cnum--;
	  if(cnum<0){
	  cnum=rnum-1;	
	  }
	  //alert(cnum);
	  $("#mian_list_div1 ul").animate({"left":-cnum*253},300);
	  //$(".mke_ns1").html(cnum+1);
  });
  
  /*-------------------------------*/	
  var rnum=2;
  var cnum=0;
  //$(".mke_ns2").html(rnum);
  //$(".mkeUl ul").width(rnum*588);
  $("#leftbtn2").click(function(){
	  
	  cnum++;
	  if(cnum>(rnum-1)){
	  cnum=0	
	  }
	  //alert(cnum);
	  $("#mian_list_div2 ul").animate({"left":-cnum*253},300);
	  
	  //$(".mke_ns1").html(cnum+1);
  });
  $("#rightbtn2").click(function(){
	  cnum--;
	  if(cnum<0){
	  cnum=rnum-1;	
  }
	  //alert(cnum);
	  $("#mian_list_div2 ul").animate({"left":-cnum*253},300);
	  //$(".mke_ns1").html(cnum+1);
  });
  /*-------------------------------*/	
  var rnum=2;
  var cnum=0;
  //$(".mke_ns2").html(rnum);
  //$(".mkeUl ul").width(rnum*588);
  $("#leftbtn3").click(function(){
	  
	  cnum++;
	  if(cnum>(rnum-1)){
	  cnum=0	
	  }
	  //alert(cnum);
	  $("#mian_list_div3 ul").animate({"left":-cnum*253},300);
	  
	  //$(".mke_ns1").html(cnum+1);
  });
  $("#rightbtn3").click(function(){
	  cnum--;
	  if(cnum<0){
	  cnum=rnum-1;	
	  }
	  //alert(cnum);
	  $("#mian_list_div3 ul").animate({"left":-cnum*253},300);
	  //$(".mke_ns1").html(cnum+1);
  });
  /*-------------------------------*/	
  $(".list_content01").mouseover(function(){
	$(this).css("border-color","#eb5386");
  });
  
  $(".list_content01").mouseout(function(){
	$(this).css("border-color","#e2e2e2");
  });
  
 /*-----------------------------*/
  $(function(){
  $(".suozai").mouseover(function(){
		  $(this).find("ul").stop(true,true);
		  $(this).find("ul").css({display:'block'});
	  
	  });
  $(".suozai").mouseout(function(){
		  $(this).find("ul").stop(true,true);
		  $(this).find("ul").css({display:'none'});
	  
	  });
  
  })
  /*-----------------------------*/
  var a;
  $(".list_content_down li").mouseover(function(){
		  a=$(this).position().left;
		  //alert(a);
	  
	  $(".hongkuang").stop(true,true).animate({"left":a},"fast");
  
	  });
  /*-----------------------------*/
  var a;
	$('.zonghepaixu>li').click(
			function(){
				a=$(this).index();
				$(this).addClass("zonghe");
				$('.zonghepaixu>li').not($(this)).removeClass('zonghe');
				if(a==0){$(this).css("borderLeft","none");}
				
				}
	) 
  /*-----------------------------*/
	$('#order_navbar>li').mouseover(function(){
		var b=$(this).index();
		if(b!=5){$(this).parent().next().children().css({ top: 0, left: 110*b });}
		else if(b==5) {$(this).parent().next().children().css({ top: 0, left: 700});}
	});	
  /*-----------------------------*/
	$("#order_lmenu dt").click(function(){
		$(this).parent().toggleClass("close");
		$(this).nextAll().toggle();
		})
  /*-----------------------------*/
	$('#shortcut_list dl').bind('mouseover mouseout', function() {
 		 $(this).toggleClass('myvcb_sethover');
	});
  /*-----------------------------*/
	$("#category2014").mouseover(function(){
		$(this).find("div.order_mc").show();
	})
	$("#category2014").mouseout(function(){
		$(this).find("div.order_mc").hide();
	})
  /*-----------------------------*/
		$("#category2014").find('div.order_item1').live('mouseover',function(){
			$(this).find("ul").show();
			$(this).addClass("hoveritem");	
		})	
		$("#category2014").find('div.order_item1').live('mouseout',function(){
			$(this).find("ul").hide();
			$(this).removeClass("hoveritem");	
		})	
 
  /*-----------------------------*/
  $('#special li img').mouseover(function(){
	  //var c=$(this).index();
          var c = $(this).attr('src');
        //  alert(c);
          var imgSrc_big = c;
//	  c+=1;
//	  var imgSrc_big='/public/images/home/images1/w'+c+'.jpg';
	  $('#spec_n1').attr("src",imgSrc_big);
	  $(this).find('img').siblings().removeClass('imghover');
	  $(this).find('img').addClass('imghover');
	});
  $('#special li').mouseout(function(){
	  $(this).find('img').removeClass('imghover');
	});
        
        
          /*------------yanghw-----------------*/
 	$('#selectedcolor>div').click(function(){
           
            var index = $(this).index();
		//$(this).siblings().removeClass('selecteditem');
                $('.selecteditem').removeClass('selecteditem');
		$(this).addClass('selecteditem');
                $('.choose').find('.choosesize').eq(index+1).css('display','block').siblings('.choosesize').css('display','none');
              
            
             var c = $('#special li img').eq(index+1).attr('src');
            // alert(c);
             var imgSrc_big = c;
            $('#spec_n1').attr("src",imgSrc_big);
	});
        for(var i =0;i<type_key.length;i++){
          $('#'+type_key[i]).click(function (){
               if($(this).attr('class')=="item nofocus")
                {
                   return false;
                }
            var index =  $(this).index(); 
            var path = $('.spec_items_wrap li img').eq(index+1).attr('src');
            $('.jqzoom img').attr('src',path);
          });
          }  ;

       /*----------------heyd-------------*/  
        
 	var condition=new Array();
 	 /*-----------------------------*/
 	$('.colordd>div').click(function(){
 	   // alert("comin");
            
 	   // alert('属性个数num='+num);
            if($(this).attr('class')=="item nofocus")
                {
                   return false;
                }
		$(this).siblings().removeClass('selecteditem');
               
		 $(this).toggleClass('selecteditem');
		//当前选择状态数组
		var value1=$(this).attr('value1');
		var value2=$(this).attr('value2');
		//alert(value1+':'+value2);
		//alert("a="+a)
		//for(i=0;i<num;i++)
		    //alert(condition[i]);
		if($.inArray(value1, condition)>=0){
			if(condition[$.inArray(value1, condition)+1]==value2){	
				condition[$.inArray(value1, condition)+1]=null;
				
				for(j=0;j<row;j++){
					if($.inArray(value2, d[j])==-1){
			 			 for(k=0;k<num;k++){			 				 			 				 			 				 
			 					$("#"+d[j][k]).removeClass('nofocus');
                                                               

			 			 }
			 		 }	
			 	}
				
				
				
				
			}
			
			else condition[$.inArray(value1, condition)+1]=value2;
			
		}	
		else 
			{
			condition.push(value1,value2);
			}
		var state=new Array();
		for(i=1;i<num*2;i+=2){
			if(condition[i]!=null)
		      state.push(condition[i]);
			
		}
		//if(state.length=='')
			//$(".choose").find(".item").siblings(".item").css("display","block");
		var str='';
		for(i=0;i<num;i++)
			{
		     str +=state[i];
			}
		//alert("用户选择条件str="+str);//选择条件
//根据选择状态数组查询显示内容	
		//alert('row='+row);
		//alert('条件表d='+d);
		//for(i=0;i<row;i++)
		 //alert(d[i]);
		 //alert(d[i]);
		//document.getElementsByName("item").style.display='none';
		//$(".choose").find(".item").siblings(".item").css("display","none");
		var showBox=new Array();
		
		 for(i=0;i<num;i++){
		 //对状态表的每一条数据处理
			 var showBoxTemp=new Array();
			 if(i==0){
		 	if(state[i]!=null){
		 		 //alert("当前处理状态"+state[i]);
		 		var str1=state[i].substring(0,2);
		 		//alert(str);
				 //alert(state[i]);
		 		$(".item").each(function(){
		 			var val=$(this).attr("value1");
		 			//alert("当前状态分类"+val);
		 			if(val==str1)
		 				//$(this).css("display","none");
		 				showBox.push($(this).attr("value2"));
		 			
		 		});
		 	
		 		
		 	for(j=0;j<row;j++){
		 		//alert(state[i]+'：'+d[j])
		 		 if($.inArray(state[i], d[j])>-1){
		 			 for(k=0;k<num;k++){
		 				 //alert(d[j][k]);
		 				 if(d[j][k]!=state[i]){
	 					 
		 					 //document.getElementById(d[j][k]).style.display='block';
		 					showBox.push(d[j][k]);
		 					
		 					
		 				 }
		 				 
		 			 }
		 		 }	
		 	}
		 }
		 	//alert("showBox.lenth="+showBox.length);	
		 	
		 		//alert(showBox.join(":"));
	  }
			 else {
				 
				
				 if(state[i]!=null){
					
			 		 //alert("当前处理状态"+state[i]);
			 		var str1=state[i].substring(0,2);
			 		//alert(str);
					 //alert(state[i]);
			 		$(".item").each(function(){
			 			var val=$(this).attr("value1");
			 			//alert("当前状态分类"+val);
			 			if(val==str1)
			 				//$(this).css("display","none");
			 				showBoxTemp.push($(this).attr("value2"));
			 			
			 			
			 		});
			 	
			 		
			 	for(j=0;j<row;j++){
			 		//alert(state[i]+'：'+d[j])
			 		 if($.inArray(state[i], d[j])>-1){
			 			 for(k=0;k<num;k++){
			 				 //alert(d[j][k]);
			 				 if(d[j][k]!=state[i]){
		 					 
			 					 //document.getElementById(d[j][k]).style.display='block';
			 					showBoxTemp.push(d[j][k]);
			 					
			 					
			 				 }
			 				 
			 			 }
			 		 }	
			 	}
			 }	
				
		      if(showBoxTemp.length!=0)	{
		    	    //alert(showBoxTemp.join(":"));
					 showBox=arrayIntersection ( showBox,showBoxTemp);
					 //alert(showBox.join(":"));
		      }
		      //alert("showBox.lenth111="+showBox.length);
		     // alert("showBoxTemp.lenth="+showBoxTemp.length);
		      function arrayIntersection ( a, b )
				 {
		    	   // alert("are you  come in??");
				     var ai=0, bi=0;
				     var result = new Array();
				     for(ai=0;ai<a.length;ai++)
				    	 for(bi=0;bi<b.length;bi++){
				    		 //alert(a[ai]+":"+b[bi]);
				    		 if(a[ai]==b[bi]){
				    			 //alert(a[ai]+":"+b[bi]);
				    		     result.push(a[ai]);
				    		     //alert(result.join(":"));
				    		 }
				    	 }
				     return result;
				 }
    }	 
//求交集			
			// alert("showBox.lenth="+showBox.length);
			 //alert("showBoxTemp.lenth=");
			 
			 
			 
			
			
			 
//			 
	 }
		
		// alert("showBox.lenth=");
		 $(".choose").find(".item").siblings(".item").addClass('nofocus');
		
		 for(t=0;t<showBox.length;t++){
			
			 $(".item").each(function(){
		 			var val=$(this).attr("value2");
		 			
		 			if(val==showBox[t])
		 				$(this).removeClass('nofocus');		
                                        
		 		});
			 	 
		 }
		 
		 if(showBox.length==0)
			 $(".choose").find(".item").siblings(".item").removeClass('nofocus');
                  
});    
        //end heyd


        //yanghw
      //  alert(d.length);
      var str_per = "";
          $('.colordd>div').click(function(){
             var pr_arr = new Array();
             
             var ku_num_show = 0;
             for(var j=0;j<d.length;j++){
               //  alert( parseInt(d[j][d[j].length-1]));
                 ku_num_show = ku_num_show + parseInt(d[j][d[j].length-1]);
             }
         var pcount =  $('.selecteditem').size();
         
         //alert(num);
         var i=0 ;
          
         for(i=0;i<pcount;i++){
             //alert($('.selecteditem').eq(i).attr('value2'));
            }
            if(i == num){
                 for(i=0;i<pcount;i++){
                        // alert($('.selecteditem').eq(i).attr('value2'));
                        if(i==pcount-1)
                        {
                              str_per += $('.selecteditem').eq(i).parent().prev().attr('value')+":"+$('.selecteditem').eq(i).parent().prev().html()+":"
                                 +$('.selecteditem').eq(i).attr('value2')+":"+$('.selecteditem').eq(i).html();
                        }
                        else{
                        str_per += $('.selecteditem').eq(i).parent().prev().attr('value')+":"+$('.selecteditem').eq(i).parent().prev().html()+":"
                                 +$('.selecteditem').eq(i).attr('value2')+":"+$('.selecteditem').eq(i).html()+";";
                     }
                            // alert(str_per);
                             $('#sku').val(str_per);
                         
                         pr_arr.push($('.selecteditem').eq(i).attr('value2'));
                          size++;
                 }
                
               // alert(pr_arr);
                for(var j=0;j<d.length;j++){
                            // alert(pr_arr);
                             //alert(d[j]);
                             for(i=0;i<pcount;i++){
                             if($.inArray(pr_arr[i],d[j])<0 )
                             {
                                break;
                             }
                               //alert(parseInt(d[j][d[j].length-1]));
                               ku_num_show = parseInt(d[j][d[j].length-1]);
                         }
                     }
            }
             var size=$('.selecteditem').size() ;
            if(size == num ||size == 0){
                  $('.ku_num').html(ku_num_show);
                  $('.show_tie').css('display', 'none');
                    $('.choose').css('border', 'none');
                  
                      if(size == 0){ $('.choosebutts11').css('display', 'block');$('.choosebutts12').css('display', 'none');}
                 //     alert($('.choosebutts11').attr('style'));
                      if(size == num &&  !$('.choosebutts11').is(':visible')){$('.choosebutts12').css('display', 'block');}
            }
          
       //  alert(pr_arr);
       
      });
});







 	
 	

























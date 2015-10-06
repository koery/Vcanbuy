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
 	$('#selectedsize>div').click(function(){
		$(this).siblings().removeClass('selecteditem');
		$(this).addClass('selecteditem');
	});
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
        
        
        
        
});






























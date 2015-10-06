function searchURL(){
	var key = document.getElementById('key').value;
	if (key==""){
		alert('请输入查询网址');
		document.getElementById('key').focus();
		return false;
	}
	$.ajax({
		url: "taobao",
		type:'POST',
		dataType:"html",
		data: {"key":key},
		success:function(data){
		     $('.bg').fadeIn(200);
		     $('.content').fadeIn(400);
		     $('.content').html(data);
		     $('#msg').val('');
		}
	})
}



$(document).ready(function () {

    $('.sousuo').focus(
            function () {
                $(this).val(" ");
            });

    $('.sousuo').blur(
            function () {
                var x = this.defaultValue;
                $current = $(this).val();
                if ($current == " ") {
                    $(this).val(x);
                }
                else {
                    $(this).val($current);
                }
                //alert( x );
            });


    $(function () {

        $(".logo_c21 ul").hide();

        $(".logo_c21").hover(function () {
            $(this).find("ul").stop(true, true);
            $(this).find("ul").show();
        }, function () {
            $(this).find("ul").stop(true, true);
            $(this).find("ul").hide();
        });

    })




    //轮播图效果
    var PicTotal = 4;
    var CurrentIndex;
    var ToDisplayPicNumber = 0;

    $("ul.lubonum li").click(DisplayPic);
    function DisplayPic() {// 测试是父亲的第几个儿子
        //alert('ok');
        CurrentIndex = $(this).index();// 删除所有同级兄弟的类属性
        $(this).siblings().removeClass("onnum")// 为当前元素添加类

        $(this).addClass("onnum");// 隐藏全部图片

        //var Pic = $(this).parent().parent().children().eg(0);

        $('ul.luboimg').children().removeClass("onli");// 显示指定图片
        //alert('ok');
        $('ul.luboimg').children().eq(CurrentIndex).addClass("onli");

    }

    function PicNumClick() {

        $("ul.lubonum li").eq(ToDisplayPicNumber).trigger("click");

        ToDisplayPicNumber = (ToDisplayPicNumber + 1) % PicTotal;
    }

    setInterval(PicNumClick, 4000);

    //setInterval(autoPlay,3000);


    //横切效果
    $("#f1change>span").mouseenter(function () {

        index = $("#f1change>span").index(this);
        $(this).addClass("changecolor").siblings().removeClass("changecolor");

        $("#f1_down2_outchange>ul").hide();
        $("#f1_down2_outchange>ul").eq(index).show();

    });

    $("#f1change>span").mouseleave(function () {
        // index = $("#f1change>span").index(this);

        //$(".f1_down2_out>ul").eq(index).hide();
        //$(".f1_down2_out>ul").eq(index).next().show();
        $(this).removeClass("changecolor");
    });


    $("#f2change>span").mouseenter(function () {

        index = $("#f2change>span").index(this);
        $(this).addClass("changecolor").siblings().removeClass("changecolor");

        $("#f2_down2_outchange>ul").hide();
        $("#f2_down2_outchange>ul").eq(index).show();

    });



    $("#f2change>span").mouseleave(function () {
        // index = $("#f1change>span").index(this);

        //$(".f1_down2_out>ul").eq(index).hide();
        //$(".f1_down2_out>ul").eq(index).next().show();
        $(this).removeClass("changecolor");
    });

    $("#f3change>span").mouseenter(function () {

        index = $("#f3change>span").index(this);
        $(this).addClass("changecolor").siblings().removeClass("changecolor");

        $("#f3_down2_outchange>ul").hide();
        $("#f3_down2_outchange>ul").eq(index).show();

    });



    $("#f3change>span").mouseleave(function () {
        // index = $("#f1change>span").index(this);

        //$(".f1_down2_out>ul").eq(index).hide();
        //$(".f1_down2_out>ul").eq(index).next().show();
        $(this).removeClass("changecolor");
    });


    /*左侧导航*/
    var n;
    $(function () {
        var currY;//定义所选项top值
        var currH;//定义所选的高度
        var currW;//滴定仪所选的宽度
        var objL;//获取当前对象
        //  var strY

        /**
         * 设置当前位置的值
         * @param obj 当前对象名称
         */
        function setInitValue(obj) {
            currY = obj.offset().top;
            currH = obj.height();
            currW = obj.width();
        }

        //设置鼠标滑过事件
        $(".ul_one>li").mouseover(function () {
            n = $('.ul_one>li').index(this);
            n = n + 1;
            //alert(n+1);
            objL = $(this);
            setInitValue(objL);

            // var allY=currY-currH+'px';
            // console.log(allY);
            $(".ul_one li").removeClass('activeli');
            objL.addClass('activeli');
            // 'url(/dygk/images/'+picnum+'.jpg)'
            objL.css("background-image", "url(../../../public/images/home/images/bg" + n + "1.png)");


            $(".ul_one div").hide();
            objL.next('div').show();
            objL.next('div').offset({top: currY});

        });

        $(".ul_one>li").mouseout(function () {
            $(this).removeClass('activeli');

            objL.css("background-image", "url(../../../public/images/home/images/bg" + n + ".png)");
            //$(".ul_one>li").first().css("background-image","url(images/bg11.png)");
            //alert('ok');
            objL.next('div').hide();

        });
        $(".category").hover(function () {
            $(this).show();
            objL = $(this).prev('li');//
            setInitValue(objL);
            objL.addClass('activeli');
            objL.css("background-image", "url(../../../public/images/home/images/bg" + n + "1.png)");

        }, function () {
            $(this).hide();
            $(this).prev('li').removeClass('activeli');
            //$(".ul_one li").first().addClass('activeli');
            objL.css("background-image", "url(../../../public/images/home/images/bg" + n + ".png)");
        });

        /*----------------*/
        $(function () {
            $(".example2").luara({width: '1400', interval: 6000, selected: "seleted", deriction: "left"});

        });

    });

    /*--------f1--------*/
    for (var i = 1; i < 7; i++) {
        var obj1 = '#product_top' + i + '>li';
        var obj2 = '#product' + i + '>ul';
        show(obj1, obj2);
    }
    function show(obj1, obj2) {
        $(obj1).mouseover(function () {
            var m = $(this).index();
            $(this).siblings().removeClass('activep');
            $(this).addClass('activep');
            $(obj2).eq(m).siblings().hide();
            $(obj2).eq(m).show();
        })
    }

});




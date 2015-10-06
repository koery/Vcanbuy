<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>我的购物车-Vcanbuy</title>
        <link rel="stylesheet" href="<?php echo APP_MODULE_CSS_PATH?>style.css" type="text/css">
            <script src="<?php echo APP_MODULE_JS_PATH ?>cart.js" type="text/javascript"></script>
            <script src="<?php echo APP_MODULE_JS_PATH ?>jquery-1.8.3.min.js"></script>
            <script src="<?php echo APP_MODULE_JS_PATH?>favorites.js" type="text/javascript"></script>
    </head>
    <body>
        <!-------------顶头----------------------------->
        <div id="deng_out">
            <?php
            $count = 0;
            foreach ($data as $a) {
                $count = $count + $a['qty'];
            }
            ?>
            <div class="deng">
                <div class="deng_l">
                    <p>欢迎光临VCB，<?php
                        if (!empty($user_data)) {
                            foreach ($user_data as $a) {
                                echo $a['username'] . '<a href="logout">退出</a>';
                            }
                        } else {
                            ?>
                            请
                            <a class = "a2" target = "_blank" href = "../login/index">登录</a>&nbsp;
                            &nbsp;
                            <a class = "a3" target = "_blank" href = "../register/index">免费注册</a>
                        <?php } ?>
                    </p>
                </div>
                <ul class="deng_r" id="yougowu" >
                    <li><a href="#"><img src="<?php echo APP_MODULE_IMAGE_PATH  ?>images/res-LNTH.jpg" width="20" height="14" /></a></li>
                    <li><a href="#"><img src="<?php echo APP_MODULE_IMAGE_PATH  ?>images/res-LNCN3.png" width="20" height="14" /></a></li>
                    <li><a href="#">帮助</a></li>
                    <li><a href="#">在线咨询</a></li>
                    <li><a target="_blank"  href="../../Member/index/index">我的VCB</a> </li>
                    <li><a target="_blank"  href="../cart/index">购物车(0)</a></li>
                    <li><a href="#">我的箱子</a></li>
                    <li><a href="#">电子钱包</a></li>
                    <li class="lione"><a href="#">收藏夹</a></li>
                </ul>
            </div>

        </div>

        <!-------------标志----------------------------->
        <div class="gouwuchelogo w9">
            <h1 class="gouwuchelogo_wrap"><img src="<?php echo APP_MODULE_IMAGE_PATH  ?>imageche/VCB LOGO.png" width="206" height="54" /></h1>
            <div class="gouwubuzhou">
                <span class="gouwubuzhou1">1.查看看购物车</span>
                <span class="gouwubuzhou1">2.确认订单信息</span>
                <span class="gouwubuzhou1">3.付款到电子钱包</span>
                <span class="gouwubuzhou1">4.确认收货</span>

            </div>

        </div>
        <!-------------我的购物车----------------------------->
        <form id="subform" action="../conorder/index" method="post">
            <div id="chakangouwuche">
                <div class="chakangouwuche_text">
                    <h2 class="cart_hd"></h2>
                </div>
                <?php if (empty($data)) { ?>
                    <div class="no_cartw"> 购物车内暂时没有商品，<a style="color:red" href="../login/index">登录</a>后，将显示您之前加入的商品
                        去<a style="color:red" href="../index/index">首页</a>挑选喜欢的商品</div>
                <?php } else { ?>
                    <div class="cart-inner" id="cart2014_inner">
                        <div class="cart-thead">
                            <div class="col t_checkbox">
                                <span class="totalgoods">
                                    <input type="checkbox" value="" class="allChecked" id="toggle_checkboxes"/>
                                    <label for="toggle_checkboxes" class="">全选</label>
                                </span>
                                <span class="reversegoods">
                                    <input type="checkbox" value=""  class="reverse" id="reverse_checkboxes">
                                        <label for="reverse_checkboxes">反选</label>
                                </span>
                            </div>
                            <div class="col t_goods">商品</div>
                            <div class="col t_price">价格</div>
                            <div class="col t_promotion">优惠</div>
                            <div class="col t_inventory"></div>
                            <div class="col t_quantity">数量</div>
                            <div class="col t_action">操作</div>
                        </div>

                        <div class = "cart_tbody">
                            <?php
                            $shop_username = null;
                            $total_cn = 0;
                            $total_th = 0;
                            foreach ($data as $a) {
                                $total_cn += $a['qty'] * $a['price_cn'];
                                $total_th += $a['qty'] * $a['price_th'];
                                ?>
                                <div class = "cartitem cartitem_selected cartitem_<?php echo $a['cart_id'] ?>">
                                    <div class = "item_form">
                                        <div class = "cell p_checkbox"><input type = "checkbox" name="ocart_array[]" value="<?php echo $a['cart_id'] ?>" class = "eachChecked"/></div>
                                        <dl class = "cell p_goods">
                                            <dt><a target = "_blank" href = "../proinfo/index?id=<?php echo $a['product_id'] ?>">
                                                    <img src = "<?php echo $a['image_url'] ?>" width = "50" height = "50" /></a></dt>
                                            <dd><a target = "_blank" href = "../proinfo/index?id=<?php echo $a['product_id'] ?>">
                                                    <?php echo $a['product'] ?>
                                                    <?php
                                                    $sku_name = explode(';', $a['sku_name']);
                                                    foreach ($sku_name as $s) {
                                                        $s = explode(':', $s);
                                                        echo "&nbsp;&nbsp;&nbsp" . $s[3];
                                                    }
                                                    ?>
                                                </a></dd>
                                        </dl>
                                        <div class = "cell cell_price" id="total_price_cn_<?php echo $a['cart_id'] ?>">
                                            <?php echo "￥" . $a['price_cn'] * $a['qty'] ?>
                                        </div>
                                        <input type="hidden" name="price_cn" id="price_cn_<?php echo $a['cart_id'] ?>" value="<?php echo $a['price_cn'] ?>"/>
                                        <div class = "cell p_promotion"></div>
                                        <div class = "cell p_inventory">有货</div>
                                        <div class = "cell p_quantity">
                                            <div class = "quantity_form">                                          
                                                <a type="button" class = "decrement" name="btn_plus" id="btn_plus" onclick="pi_2(-1,<?php echo $a['cart_id'] ?>)">-</a>
                                                <input name="qty" class = "quantitytext" type="text" id="qty_<?php echo $a['cart_id'] ?>" value="<?php echo $a['qty'] ?>" size="3" onkeyup="pi_2(0,<?php echo $a['cart_id'] ?>)">
                                                    <a type="button" class = "increment" name="btn_add" id="btn_add" value="+"  onclick="pi_2(1,<?php echo $a['cart_id'] ?>)" >+</a>
                                            </div>
                                        </div>
                                        <div class = "cell p_remove"><a style="cursor:pointer;" onclick="javascript:remove_c(<?php echo $a['cart_id'] ?>)">删除</a></div>
                                    </div>
                                    <div class = "item_extra"></div>
                                </div>
                                <?php
                            }
                            ?>
                            <div class = "cart_toolbar">
                                <div class = "cart_total fr">
                                    <p>
                                        <span class = "totalprice">总计：</span>
                                        <span id = "total_cartprice" class = "totalprice1" ><?php echo '￥' . $total_cn ?></span>
                                        <input id = "total_cartprice1" name="order_count" type="hidden" value="<?php echo '￥' . $total_cn ?>">
                                    </p>
                                    <p>
                                        <span class = "totalprice">运费：</span>
                                        <span id = "total_cartcost" class = "totalprice1">￥0.00</span>
                                    </p>
                                </div>
                                <div class = "cart_total_amount fr"><span id = "selectedcount"><?php echo $count ?></span>件商品</div>
                            </div>
                            <div class = "cart_dibu">
                                <div class = "cart_total2014">
                                    <div class="cart_button2014">
                                        <a onclick="document.getElementById('subform').submit();" ></a>
                                    </div>

                                    <div class = "total1108 fr">总计:<span  id="total_cn"><?php echo '￥' . $total_cn ?></span></div>
                                </div>
                                <div class = "fdibu">
                                    <div class="cartlast_check">
                                        <input type="checkbox" value="" class="allChecked" id="toggle_checkboxes_down" />
                                        <label for="toggle_checkboxes_down">全选</label>
                                    </div>
                                    <div class="cartlast_check cartlast_r">
                                        <input type="checkbox" value="" class="reverse" id="reverse_checkboxes_down" />
                                        <label for="reverse_checkboxes_down">反选</label>
                                    </div>
                                    <div class = "cart_shopping">
                                        <b></b>
                                        <a target = "_blank" onclick="deleteall()" style="color:red;cursor: pointer">批量删除</a>
                                        <b></b>
                                        <a target = "_blank" href = "../index/index">继续购物</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p style = "display:none;" class = "no_cartw cartempty_mes">购物车内暂时没有商品，您可以<a target = "_blank" href = "index.html">去首页</a>挑选喜欢的商品</p>
                <?php } ?>
            </div>
        </form>
        <!---------------------------------------->
        <div class = "thickbox" style = "display:none;">
            <div class = "thickwrap">
                <div class = "ftx04">确定从购物车中删除此商品？</div>
                <div class = "op_btns">
                    <a class = "btn1" href = "#">确定</a>
                    <a class = "btn1 mg1" href = "#">取消</a>
                </div>
            </div>

            <span class = "thickclose"></span>
        </div>


        <script type="text/javascript">
            function pi_2(v, id) {
                var q = document.getElementById("qty_" + id);
                var mun = Number(q.value);
                if (isNaN(mun)) {
                    mun = 1;
                } else {
                    mun = mun + v;
                }
                if (mun <= 0) {
                    mun = 1;
                }
                q.value = mun;
                //  var th = document.getElementById("price_th_" + id).value;
                var cn = document.getElementById("price_cn_" + id).value;
                // document.getElementById("total_price_th_" + id).innerHTML = Math.round(th * mun * 100) / 100;
                document.getElementById("total_price_cn_" + id).innerHTML = "￥" + Math.round(cn * mun * 100) / 100;
                //var price_th = document.getElementsByName('price_th');
                var price_cn = document.getElementsByName('price_cn');
                var qty = document.getElementsByName('qty');
                //var v_1 = 0;
                var v_2 = 0;
                var count = 0;
                for (var i = 0; i < qty.length; i++) {
                    //   v_1 += price_th[i].value * qty[i].value;
                    v_2 += price_cn[i].value * qty[i].value;
                    count = parseInt(qty[i].value) + parseInt(count);
                }
                //     alert(count);
                //document.getElementById("total_th").innerHTML = Math.round(v_1 * 100) / 100;
                document.getElementById("total_cn").innerHTML = "￥" + Math.round(v_2 * 100) / 100;
                document.getElementById("total_cartprice").innerHTML = "￥" + Math.round(v_2 * 100) / 100;
                document.getElementById("total_cartprice1").value = "￥" + Math.round(v_2 * 100) / 100;
                document.getElementById("selectedcount").innerHTML = count;

                //var q = $('#qty_'.id).val();
                //   alert(q.value);
                modifyCart(q.value, id);

            }
            function deleteall() {

                var strid = "";

                var i = 1;
                $('.eachChecked:checked').each(function () {
                    if (i == $('.eachChecked:checked').length)
                    {
                        strid = strid + $(this).val();
                    }
                    else {
                        strid = strid + $(this).val() + ",";
                    }
                    $('.cartitem_' + $(this).val()).remove();
                    i++;
                });
                if ($('.eachChecked:checked').length == 0) {
                    $('.cartempty_mes').css("display", "block");
                    $('.cart-inner').css("display", "none");
                }
                delall(strid);
            }
        </script>
        <script>
            //全选反选功能
            // alert($("#toggle_checkboxes_down,#toggle_checkboxes").attr("checked"));
            // $("#toggle_checkboxes_down,#toggle_checkboxes").attr("checked",true)
            // $(".p_checkbox :checkbox").each(function(){
            // 	alert($(this).attr("checked"));
            //     if($(this).attr("checked") != "checked")
            //     	$("#toggle_checkboxes_down,#toggle_checkboxes").attr("checked",false)


            // });



            $(".allChecked").click(function () {
                //alert($(this).attr("checked"));
                $(".reverse").attr("checked", false);
                if ($(this).attr("checked") == "checked") {
                    $(".p_checkbox :checkbox").attr("checked", true);
                    $(".allChecked").attr("checked", true);
                }
                else {
                    $(".p_checkbox :checkbox").attr("checked", false);
                    $(".allChecked").attr("checked", false);
                }

            });

            $(".eachChecked").click(function () {
                //alert($(this).attr("checked"));
                $(".reverse").attr("checked", false);
                if ($(this).attr("checked") != "checked") {
                    $(".allChecked").attr("checked", false);
                }
                else {

                    // alert($(this).attr("checked"));
                    $(".allChecked").attr("checked", true);
                    $(".eachChecked").each(function () {
                        if ($(this).attr("checked") != "checked") {
                            $(".allChecked").attr("checked", false);
                        }
                    });
                }

            });

            $(".reverse").click(function () {//反选
                //alert($(this).attr("checked"));
                if ($(this).attr("checked") == "checked") {
                    $(".reverse").attr("checked", true);
                }
                else
                    $(".reverse").attr("checked", false);
                $(".p_checkbox :checkbox").each(function () {

                    $(this).attr("checked", !$(this).attr("checked"));
                });

                $(".allChecked").attr("checked", true);
                $(".eachChecked").each(function () {
                    if ($(this).attr("checked") != "checked") {
                        $(".allChecked").attr("checked", false);
                    }
                });


            });
            //

        </script>












        <script type = "text/javascript">
            function remove_c(id) {
                $('.thickbox').show();
                $('.mg1:contains("取消")').click(function () {
                    $(this).parent().parent().parent().hide();
                    return false;
                });
                $('.btn1:contains("确定")').click(function () {
                    $(this).parent().parent().parent().hide();
                    $('.cartitem_' + id).remove();
                    var price_cn = document.getElementsByName('price_cn');
                    var qty = document.getElementsByName('qty');
                    //var v_1 = 0;
                    var v_2 = 0;
                    var i;
                    for (i = 0; i < qty.length; i++) {
                        //   v_1 += price_th[i].value * qty[i].value;
                        v_2 += price_cn[i].value * qty[i].value;
                    }

                    document.getElementById("total_cn").innerHTML = "￥" + Math.round(v_2 * 100) / 100;
                    document.getElementById("total_cartprice").innerHTML = "￥" + Math.round(v_2 * 100) / 100;
                    document.getElementById("selectedcount").innerHTML = document.getElementById("selectedcount").innerHTML - 1;

                    removeCart(id);
                });
            }



//            $(document).ready(function (e) {
//                $('.thickclose').click(function () {
//                    $(this).parent().hide();
//                })
//
//                $('.mg1:contains("取消")').click(function () {
//                    $(this).parent().parent().parent().hide();
//                    return false;
//                })
//
//                $('.btn1:contains("确定")').click(function () {
//                    $(this).parent().parent().parent().hide();
//                    return true;
//                })
//
//                $('.decrement').click(function () {
//                    var decrement = $('#decrement_1059243_0').val();
//                    decrement--;
//                    if (decrement < 1) {
//                        $('#decrement_1059243_0').val(1);
//                    }
//                    else {
//                        $('#decrement_1059243_0').val(decrement);
//                    }
//                })
//
//                $('.increment').click(function () {
//                    var decrement = $('#decrement_1059243_0').val();
//                    decrement++;
//                    $('#decrement_1059243_0').val(decrement);
//                })
//
//                var r = /^\+?[1-9][0-9]*$/;
//                $('#decrement_1059243_0').blur(function () {
//                    var decrementnum = $(this).val();
//                    if (!r.test(decrementnum)) {
//                        alert("输入的数量有误！请输入1-999");
//                        $(this).val(1);
//                    }
//                });
//                $('.p_remove>a:contains("删除")').click(function () {
//                    $('.thickbox').show();
//                })
//
//                //alert( $('#cart2014_inner').find('div.cartitem').length);
//                if ($('#cart2014_inner').find('div.cartitem').length <= 0) {
//                    $('#cart2014_inner').find('div').remove();
//                    $('#cart2014_inner').find('p.cartempty_mes').show();
//                }

            //          });
        </script>
        <!--------------支付方式----------------------------->
        <div class="foot_out">
            <div class="foot">
                <div >
                    <p>新手指南</p>
                    <ul>
                        <li>用户注册</li>
                        <li>购物指南</li>
                        <li>支付方式</li>
                        <li>会员制度</li>
                    </ul>
                </div>
                <div class="foot02">
                    <p>购物指南</p>
                    <ul>
                        <li>如何下单</li>
                        <li>如何查询</li>
                        <li>购物车管理</li>
                    </ul>
                </div>
                <div class="foot03">
                    <p>付款与配送</p>
                    <ul>
                        <li>关于配送</li>
                        <li>配送标准</li>
                        <li>验货与签收</li>
                    </ul>
                </div>
                <div class="foot04">
                    <p>售后服务</p>
                    <ul>
                        <li>关于退货</li>
                        <li>关于换货</li>
                        <li>关于维修</li>
                    </ul>
                </div>
                <div class="foot05">
                    <p>支付方式</p>
                    <ul>
                        <li>会员问题</li>
                        <li>站点问题</li>
                        <li>支付方式</li>
                    </ul>
                </div>
                <div class="foot06">
                    <p>关于VCB商城</p>
                    <ul>
                        <li>公司简介</li>
                        <li>品牌文化</li>
                        <li>诚聘英才</li>
                    </ul>
                </div>
            </div>

            <div class="footer">
                <dl >
                    <dt>泰国最大</dt>
                    <dd>在线购物</dd>
                </dl>

                <dl class="footer02">
                    <dt>100%</dt>
                    <dd>原装正品</dd>
                </dl>
                <dl class="footer03">
                    <dt>7天</dt>
                    <dd>无理由退换</dd>
                </dl>
                <dl class="footer04">
                    <dt>金牌服务</dt>
                    <dd>贴心呵护</dd>
                </dl>
                <dl class="footer05">
                    <dt>72小时</dt>
                    <dd>闪电发货</dd>
                </dl>
                <dl class="footer06">
                    <dt>精美包装</dt>
                    <dd>可靠呵护</dd>
                </dl>
                <dl class="footer07">
                    <dt>百万用户</dt>
                    <dd>口碑信赖</dd>
                </dl>
                <dl class="footer08">
                    <dt>众多明星</dt>
                    <dd>联袂推荐</dd>
                </dl>
            </div>

        </div>

        <!--------------版权----------------------------->
        <div class="banquan_out">
            <p>169/129-130 ตำบล กระทุ่มล้ม อำเภอ สามพราน จังหวัด นครปฐม</br>
                หมายเลขโทรศัพท์ 02-8140484 หมายเลขโทรสาร 02-8140169 หมายเลขโทรศัพท์มือถือ 090-1201200, 090-1231200, 090-0501200, E-mail:cs@vcanbuy.com</p>


        </div>

    </body>
    <style type="text/css">

        .quantity_form a, .cell p_remove a:hover{
            cursor:pointer;
        }
        .quantity_form a:hover{
            text-decoration:none;
        }
    </style>
</html>



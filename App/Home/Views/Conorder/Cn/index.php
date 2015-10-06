<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>订单结算-Vcanbuy</title>
        <link rel="stylesheet" href="<?php echo CSS_MODULE_PATH ?>style.css" type="text/css">
            <script src="<?php echo JS_MODULE_PATH ?>cart.js" type="text/javascript"></script>
            <script src="<?php echo JS_MODULE_PATH ?>jquery-1.8.3.min.js"></script>
            <script src="<?php echo JS_MODULE_PATH ?>favorites.js" type="text/javascript"></script>
    </head>
    <body>
        <!-------------顶头----------------------------->
        <div id="deng_out">
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
                    <li><a href="#"><img src="<?php echo IMAGE_MODULE_PATH ?>images/res-LNTH.jpg" width="20" height="14" /></a></li>
                    <li><a href="#"><img src="<?php echo IMAGE_MODULE_PATH ?>images/res-LNCN3.png" width="20" height="14" /></a></li>
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
            <h1 class="gouwuchelogo_wrap"><img src="<?php echo IMAGE_MODULE_PATH ?>imageche/VCB LOGO.png" width="206" height="54" /></h1>
            <div class="gouwubuzhou">
                <span class="gouwubuzhou1">1.查看看购物车</span>
                <span class="gouwubuzhou1">2.确认订单信息</span>
                <span class="gouwubuzhou1">3.付款到电子钱包</span>
                <span class="gouwubuzhou1">4.确认收货</span>
            </div>

        </div>
        <!-------------购物车结算页面----------------------------->
        <div id="orderinfo_checkout">
            <h2 class="orderinfo_title"><img src="<?php echo IMAGE_MODULE_PATH ?>images1/checkout-title.gif" width="162" height="19" /></h2>
            <div class="infocheck_steps">
                <div class="infocheck_step" id="infocheck_step1" >
                    <div class="step_title">
                        <strong>收货人信息</strong>
                        <span class="step_action"><a id="editinfo" href="javascript:;">[修改]</a></span>
                    </div>
                    <div class="step_content">
                        <div class="sbox_wrap">
                            <div class="sbox">
                                <div class="s_cont">
                                    <p>王小姐 <font style="font-family:Arial;">1385731428</font></br>广东 广州市 白云区 广州市白云区三元里大道909至911号粤海商务中心806房 </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="infocheck_step" id="infocheck_step2">
                    <div class="step_title">
                        <strong>支付及配送方式</strong>
                        <span class="step_action"><a href="javascript:;">[修改]</a></span>
                    </div>
                    <div class="step_content">
                        <div class="sbox_wrap">
                            <div class="sbox">
                                <div class="s_cont">
                                    <div class="payment_selected">在线支付</div>
                                    <div class="way_item">普通快递&nbsp;中小件商品&nbsp;<span style="color:#ff6600;">工作日、双休日与假日均可送货</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                $count = 0;
                $count_m = 0;
                $_SESSION['order_data'] = $data;
                if (!empty($data)) {
                    foreach ($data as $a) {
                        $count = $count + $a['qty'];
                        $count_m = $count_m + ($a['price_cn'] * $a['qty']);
                    }
                }
                ?>
                <form>
                    <div class="infocheck_step" id="infocheck_step3">
                        <div class="step_title">
                            <strong>商品清单</strong><a href="../cart/index" class="return_cartedit">返回修改购物车</a>
                        </div>
                        <?php if (!empty($data)) { ?>
                            <div class="step_content">
                                <div class="sbox_wrap">
                                    <div class="sbox">
                                        <div class="order_review">
                                            <div class="order_reviewlist">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="reviewlist_fore1">商品</td>
                                                            <td class="reviewlist_fore2">京东价</td>
                                                            <td class="reviewlist_fore3">优惠</td>
                                                            <td class="reviewlist_fore4">数量</td>
                                                            <td class="reviewlist_fore5">库存状态</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="order_reviewbody">
                                                <table>
                                                    <?php
                                                    foreach ($data as $a) {
                                                        ?>
                                                        <tbody>
                                                            <tr>
                                                                <td class="reviewbody_fore1">
                                                                    <dl class="review_goods">
                                                                        <dt><a href="<?php echo $a['product_url']; ?>" target="_blank"><img src="<?php echo $a['image_url'] ?>" width="50" height="50" /></a></dt>
                                                                        <dd>
                                                                            <a class="review_goodsname" href="../proinfo/index?id=<?php echo $a['product_id'] ?>" target="_blank"> <?php echo $a['product'] ?>
                                                                                <?php
                                                                                $sku_name = explode(';', $a['sku_name']);
                                                                                foreach ($sku_name as $s) {
                                                                                    $s = explode(':', $s);
                                                                                    echo "&nbsp;&nbsp;&nbsp" . $s[3];
                                                                                }
                                                                                ?></a>
                                                                        </dd>
                                                                    </dl>
                                                                    <div class="review_extra">[赠品] 雷神（ThundeRobot）游戏本战斗包 ×1</div>
                                                                </td>
                                                                <td class="reviewbody_fore2"> <?php echo $a['price_cn'] * $a['qty'] ?></td>
                                                                <td class="reviewbody_fore3"></td>
                                                                <td class="reviewbody_fore4"><?php echo $a['qty'] ?></td>
                                                                <td class="reviewbody_fore5">有货</td>
                                                            </tr>
                                                        </tbody>
                                                    <?php } ?>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="order_summary">
                                            <div class="summary_form">
                                                <div class="showorder_safe">
                                                    <!--<input class="hookbox" type="checkbox" id="selectOrderBalance"/>
                                                    <label for="selectOrderBalance">使用余额（账户当前余额：31.20元）</label>-->
                                                </div>
                                            </div>
                                            <div class="statistic">
                                                <div class="statistic_list">
                                                    <span><?php echo $count ?>件商品，总金额：</span>
                                                    <em id="warePriceId"><?php echo $count_m ?></em>
                                                </div>
                                                <div class="statistic_list">
                                                    <span>运费：</span>
                                                    <em id="freightPriceId">￥00.00</em>
                                                </div>
                                                <div class="statistic_list">
                                                    <span>应付总额：</span>
                                                    <em id="sumPayPriceId"><?php echo $count_m ?></em>
                                                </div>
                                            </div>
                                            <div class="order_coupon">
                                                <!--<div class="password_pay">
                                                <div class="password_payname">支付密码：</div>
                                                <div class="password_paycheck">
                                                        <input type="password" value=""/><a href="#">开启支付密码</a>
                                                </div>
                                            </div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout_buttons">
                                    <button class="checkout_submit">提交订单<b></b></button>
                                    <span class="checkout_buttons_total">应付总额：<em id="payPriceId"><?php echo $count_m ?></em>元</span>
                                </div>
                            </div>
                            <?php
                        } else {
                            ?>
                            <p class="no_cartw">你并没有选择商品</p>
                        <?php } ?>
                    </div>
                </form>
            </div>
        </div>
        <script language="javascript" type="text/javascript">
            $('.checkout_submit').click(function () {
                window.location.href = "../Member/orders/index";
            });


        </script>
        <!---------------------------------------->
        <div class="thickbox" style="display:none;">
            <div class="thickwrap">
                <div class="ftx04">确定从购物车中删除此商品？</div>
                <div class="op_btns">
                    <a class="btn1" href="#">确定</a>
                    <a class="btn1 mg1"  href="#">取消</a>
                </div>
            </div>
            <span class="thickclose"></span>
        </div>
        <script type="text/javascript">
            $(function () {
                $('#editinfo').click(function () {
                    $('#infocheck_step1').addClass('stepcurrent');
                    $(this).text('');

                    $('#infocheck_step1 div.s_cont').remove();
                    var $div1 = $('<div class="newaddress_form"></div>');
                    $("#infocheck_step1 div.sbox").append($div1);
                    var $div2 = $('<div class="newaddress_item"></div>');
                    $div1.append($div2);
                    var $div3 = $('<input type="radio" id="consignee" checked="checked"/><label for="consignee"/>请使用新地址</label>');
                    $div2.append($div3);
                    var $div4 = $('<div class="consignee_form"></div>');
                    $("#infocheck_step1 div.sbox").append($div4);
                    var $div5 = $('<div id="newname_div" class="list"></div>');
                    var $div6 = $('<div id="newarea_div" class="list"></div>');
                    var $div7 = $('<div id="newaddress_div" class="list"></div>');
                    var $div8 = $('<div id="newcall_div" class="list"></div>');
                    var $div9 = $('<div id="newemail_div" class="list"></div>');
                    $($div4).append($div5, $div6, $div7, $div8, $div9);
                    var $span1 = $('<span class="label">收货人：</span>');
                    var $input1 = $('<input type="text" class="newname_input" value=""/>');
                    $div5.append($span1, $input1);
                    var $span2 = $('<span class="label">详细地址：</span>');
                    var $input2 = $('<input type="text" class="newname_input newaddress_input" value=""/>');
                    $div7.append($span2, $input2);
                    var $span3 = $('<span class="label">手机号码：</span>');
                    var $div12 = $('<div class="newfield"></div>');
                    var $input3 = $('<input type="text" class="newname_input" value="" maxlength="11"  id="consignee_mobile"/>');
                    var $em1 = $('<em>或</em>');
                    var $span1 = $('<span class="fixed_line">固定电话：</span>');
                    var $input5 = $('<input type="text" class="newname_input" value="" maxlength="11"/>');
                    $div8.append($span3, $div12);
                    $div12.append($input3, $em1, $span1, $input5);

                    var $span4 = $('<span class="label">邮箱：</span>');
                    var $input4 = $('<input type="text" class="newname_input" value=""/>');
                    $div9.append($span4, $input4);
                    var $div10 = $('<div class="save_newinfo"><a href="#none">保存收货人信息</a></div>');
                    $div4.append($div10);
                    var $span5 = $('<span class="label">所在地区：</span>');
                    var $div11 = $('<div class="newfield"></div>');
                    $div6.append($span5, $div11);
                    //省的选择
                    var $span6 = $('<span></span>');
                    var $select1 = $('<select class="newfield_pro"></select>');
                    var $option11 = $('<option value="">请选择:</option>');
                    var $option12 = $('<option value="11">北京</option>');
                    var $option13 = $('<option value=12>天津</option>');
                    var $option14 = $('<option value="13">上海</option>');
                    var $option14 = $('<option value="14">南京</option>');
                    $div11.append($span6);
                    $span6.append($select1);
                    $select1.append($option11, $option12, $option13, $option14);
                    //市的选择
                    var $span7 = $('<span></span>');
                    var $select2 = $('<select class="newfield_pro"></select>');
                    var $option21 = $('<option value="">请选择:</option>');
                    var $option22 = $('<option value="11">广州市</option>');
                    $div11.append($span7);
                    $span7.append($select2);
                    $select2.append($option21, $option22);
                    //区的选择
                    var $span8 = $('<span></span>');
                    var $select3 = $('<select class="newfield_pro"></select>');
                    var $option31 = $('<option value="">请选择:</option>');
                    var $option32 = $('<option value="11">白云区</option>');
                    var $option33 = $('<option value="11">四环到五环之间</option>');
                    $div11.append($span8);
                    $span8.append($select3);
                    $select3.append($option31, $option32, $option33);

                    $('#newname_div :input').blur(function () {
                        if ($(this).val() == "") {
                            if ($(this).parent().has('span.newname_tip').length <= 0) {
                                $(this).parent().append('<span class="newname_tip">请您填写收货人的姓名</span>');
                            }
                        }
                        if ($(this).val() != "") {
                            $(this).parent().find(".newname_tip").remove();
                        }
                    });

                    $('#newaddress_div :input').blur(function () {
                        if ($(this).val() == "") {
                            if ($(this).parent().has('span.newname_tip').length <= 0) {
                                $(this).parent().append('<span class="newname_tip">请您填写收货人的详细地址</span>');
                            }
                        }
                        if ($(this).val() != "") {
                            $(this).parent().find(".newname_tip").remove();
                        }
                    });

                    $('#newcall_div :input').blur(function () {
                        if ($(this).val() == "") {
                            if ($(this).parent().has('span.newname_tip').length <= 0) {
                                $(this).parent().append('<span class="newname_tip">请您填写收货人的手机号码</span>');
                            }
                        }
                        if ($(this).val() != "") {
                            var mobileNum = $(this).val();
                            if (checkMobile(mobileNum) == true) {
                                $(this).parent().find(".newname_tip").remove();
                            }
                            else {
                                $(this).parent().find(".newname_tip").remove();
                                $(this).parent().append('<span class="newname_tip">手机号码格式错误</span>');
                            }

                        }
                    });

                    $('#newemail_div :input').blur(function () {
                        if ($(this).val() == "") {
                            $(this).parent().find(".newname_tip").remove();
                        }
                        if ($(this).val() != "") {
                            var email = $(this).val();
                            if (checkEmail(email) == true) {
                                $(this).parent().find(".newname_tip").remove();
                            }
                            else {
                                $(this).parent().find(".newname_tip").remove();
                                $(this).parent().append('<span class="newname_tip">邮箱格式错误</span>');
                            }

                        }
                    });
                    return false;
                });
                //判断手机号码格式函数开始
                /*
                 * 功能：判断用户输入的手机号格式是否正确
                 * 传参：无
                 * 返回值：true or false
                 */
                function checkMobile(mobile) {
                    if (/^[1][0-9][0-9]{9}$/.test(mobile))
                        return true;

                    return false;

                }
                //判断手机号码格式函数结束

                //判断邮箱格式函数
                /*
                 * 功能：判断用户输入的邮箱格式是否正确
                 * 传参：无
                 * 返回值：true or false
                 */
                function checkEmail(email) {
                    if (!/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(email))
                        return false;
                    return true;
                }
                //判断邮箱格式函数结束
                $('#infocheck_step2').find('a:contains("修改")').click(function () {
                    $(this).html("保存支付及配送方式");
                    $(this).parent().parent().next().find('div.sbox').remove();
                    //创建支付方式
                    var $odiv1 = $('<div class="newpayment"></div>');
                    $('#infocheck_step2').find('div.sbox_wrap').append($odiv1);
                    var $oh3 = $('<h3 class="newitem_title">支付方式</h3>');
                    var $odiv2 = $('<div class="newpay_item"></div>');
                    $odiv1.append($oh3, $odiv2);
                    var $odiv3 = $('<div class="newpay_item1"></div>');
                    $odiv2.append($odiv3);
                    var $odiv4 = $('<div class="newpay_item_label"></div>');
                    var $odiv5 = $('<div class="newpay_item_con"></div>');
                    $odiv3.append($odiv4, $odiv5);
                    $odiv4.append('<input type="radio" value="" id="pay_method1" class="method_title" /><label for="pay_method1" class="method_name">银行转账</label>');
                    $odiv5.append('<span class="newtip">通过快钱平台转账 转帐后1-3个工作日内到帐</span><a href="#">查看帐户信息</a>');
                    var $odiv6 = $('<div class="newpay_item1"></div>');
                    $odiv2.append($odiv6);
                    var $odiv7 = $('<div class="newpay_item_label"></div>');
                    var $odiv8 = $('<div class="newpay_item_con"></div>');
                    $odiv7.append('<input type="radio" value="" id="pay_method2" class="method_title"/><label for="pay_method2" class="method_name">邮局汇款</label>');
                    $odiv8.append('<span class="newtip">通过快钱平台转账 转帐后1-3个工作日内到帐</span><a href="#">查看帐户信息</a>');
                    $odiv6.append($odiv7, $odiv8);
                    //创建运送方式
                    var $sdiv1 = $('<div class="newshipment"></div>');
                    $('#infocheck_step2').find('div.sbox_wrap').append($sdiv1);
                    var $sh3 = $('<h3 class="newitem_title">运送方式</h3>');
                    var $sdiv2 = $('<div class="newpay_item"></div>');
                    $sdiv1.append($sh3, $sdiv2);
                    var $sdiv3 = $('<div class="newpay_item1"></div>');
                    $sdiv2.append($sdiv3);
                    var $sdiv4 = $('<div class="newship_item_label"></div>');
                    var $sdiv5 = $('<div class="newpay_item_con"></div>');
                    $sdiv3.append($sdiv4, $sdiv5);
                    $sdiv4.append('<input type="radio" value="" id="ship_method1" class="method_title"/><label for="ship_method1" class="method_name">普通快递</label>');
                    $sdiv5.append('<span class="specify_time">指定送货时间：</span><input type="text" value="" class="specify_time1"/>');
                    var $sdiv6 = $('<div class="save_paymethod"></div></br>');
                    $sdiv1.append($sdiv6);
                    $sdiv6.append('<a href="javscript:;" class="save_info">保存支付及配送方式</a>');
                    return false;
                })

            })
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
</html>





































































































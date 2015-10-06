<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
        <title>我的订单——vcanbuy</title>
        <link rel="stylesheet" href="<?php echo CSS_MODULE_PATH ?>style.css" type="text/css">
            <script src="<?php echo JS_MODULE_PATH ?>jquery-1.8.3.min.js"></script>
            <script src="<?php echo JS_MODULE_PATH ?>zzsc.js" type=text/javascript></script>
            <script src="<?php echo JS_MODULE_PATH ?>order.js" type=text/javascript></script>
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
                            <a class = "a2" target = "_blank" href = "../../homelogin/index">登录</a>&nbsp;
                            &nbsp;
                            <a class = "a3" target = "_blank" href = "../../home/register/index">免费注册</a>
                        <?php } ?>
                    </p>
                </div>
                <ul class="deng_r" id="yougowu" >
                    <li><a href="#"><img src="<?php echo IMAGE_MODULE_PATH ?>images/res-LNTH.jpg" width="20" height="14" /></a></li>
                    <li><a href="#"><img src="<?php echo IMAGE_MODULE_PATH ?>images/res-LNCN3.png" width="20" height="14" /></a></li>
                    <li><a href="#">帮助</a></li>
                    <li><a href="#">在线咨询</a></li>
                    <li><a target="_blank"  href="../index/index">我的VCB</a> </li>
                    <li><a target="_blank"  href="../../home/cart/index">购物车(0)</a></li>
                    <li><a href="#">我的箱子</a></li>
                    <li><a href="#">电子钱包</a></li>
                    <li class="lione"><a href="#">收藏夹</a></li>
                </ul>
            </div>

        </div>

        <!-------------标志----------------------------->
        <div id="logo_out">
            <div class="myorder_logo">
                <h1 class="logo_title"><img src="<?php echo IMAGE_MODULE_PATH ?>images/VCB LOGO.png" /></h1>
                <div class="logo_c">
                    <div class="logo_c1">
                        <a class="a01" href="#">商品链接</a><a href="#">VCB优选</a><a href="#">特价销售</a>
                    </div>
                    <div class="logo_c2">
                        <div class="logo_c21">
                            <span>全部分类</span>
                            <ul>
                                <li><a href="#">服饰</a></li>
                                <li><a href="#">美妆</a></li>
                                <li><a href="#">电子数码</a></li>
                                <li><a href="#">车饰</a></li>
                                <li><a href="#">母婴</a></li>
                                <li><a href="#">安防</a></li>
                            </ul>
                        </div>
                        <input type="text" class="sousuo" value="http://www.vcanbuy.com"/>
                        <input type="button" class="btn" value=""/>
                    </div>
                    <div class="logo_c3">
                        <a href="#">服饰</a><a href="#">母婴</a><a href="#">电子数码</a><a href="#">车饰</a><a href="#">安防</a>
                    </div>
                </div>
                <div class="logo_r">
                </div>

            </div>
        </div>

        <!-------------xin导航----------------------------->
        <div id="order_nav">
            <div class="order_navwrap">
                <div class="navwrap_r">
                    <div class="categorytitle" id="category2014">
                        <div class="order_mt">
                            <h3><a href="#">全部商品分类</a></h3>
                            <b></b>
                        </div>
                        <div class="order_mc">
                            <div class="order_item1">
                                <span>
                                    <h4><a href="#">男装、女装、内衣</a></h4>
                                    <s></s>
                                </span>
                                <ul class="i_mc"  >
                                    <li>
                                        <dl>
                                            <dt><a href="#">女装</a></dt>
                                            <dd><a href="#">连衣裙</a><a href="#">休闲裤</a><a href="#">牛仔裤</a><a href="#">正装裤</a><a href="#">打底裤</a><a href="#">打底裤</a><a href="#">吊带/背心</a><a href="#">T恤</a><a href="#">蕾丝/雪纺衫</a><a href="#">小西服</a><a href="#">马甲</a><a href="#">大码女装</a><a href="#">短裤</a><a href="#">半身裙</a></dd>

                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">男装</a></dt>
                                            <dd><a href="#">衬衫</a><a href="#">T恤</a><a href="#">POLO衫</a><a href="#">马甲/背心</a><a href="#">牛仔裤</a><a href="#">休闲裤</a><a href="#">西服</a><a href="#">西裤</a><a href="#">西服套装</a><a href="#">短裤</a><a href="#">卫裤/运动裤</a><a href="#">大码男装</a><a href="#">工装</a><a href="#">唐装/中山装</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">内衣</a></dt>
                                            <dd><a href="#">文胸</a><a href="#">睡衣/家居服</a><a href="#">文胸套装</a><a href="#">打底衫</a><a href="#">女式内裤</a><a href="#">男式内裤</a><a href="#">商务男袜</a><a href="#">情侣睡衣</a><a href="#">吊带/背心</a><a href="#">连裤袜/丝袜</a><a href="#">美腿袜</a><a href="#">打底裤袜</a><a href="#">大码内衣</a><a href="#">内衣配件</a><a href="#">少女文胸</a><a href="#">塑身美体</a><a href="#">泳衣抹胸</a></dd>
                                        </dl>
                                    </li>
                                </ul>
                            </div>
                            <div class="order_item1">
                                <span>
                                    <h4><a href="#">美体护肤</a></h4>
                                    <s></s>
                                </span>
                                <ul class="i_mc">
                                    <li>
                                        <dl>
                                            <dt><a href="#">面部护理</a></dt>
                                            <dd><a href="#">清洁</a><a href="#">护肤</a><a href="#">面膜</a><a href="#">剃须</a><a href="#">套装</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">洗发护发</a></dt>
                                            <dd><a href="#">洗发</a><a href="#">护发</a><a href="#">染发</a><a href="#">造型</a><a href="#">假发</a><a href="#">套装</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">身体护肤</a></dt>
                                            <dd><a href="#">沐浴</a><a href="#">润肤</a><a href="#">颈部</a><a href="#">手足</a><a href="#">纤体</a><a href="#">塑形</a><a href="#">美胸</a><a href="#">套装</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">口腔护理</a></dt>
                                            <dd><a href="#">牙膏/牙粉</a><a href="#">牙刷/牙线</a><a href="#">漱口水</a><a href="#">套装</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">女性护理</a></dt>
                                            <dd><a href="#">卫生巾</a><a href="#">卫生护垫</a><a href="#">私密护理</a><a href="#">脱毛膏</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">香水彩妆</a></dt>
                                            <dd><a href="#">香水</a><a href="#">底妆</a><a href="#">腮红</a><a href="#">眼部</a><a href="#">唇部</a><a href="#">美甲</a><a href="#">美容工具</a><a href="#">套装</a></dd>
                                        </dl>
                                    </li>
                                </ul>
                            </div>
                            <div class="order_item1">
                                <span>
                                    <h4><a href="#">母婴、玩具乐器</a></h4>
                                    <s></s>
                                </span>
                                <ul class="i_mc">
                                    <li>
                                        <dl>
                                            <dt><a href="#">精品童装</a></dt>
                                            <dd><a href="#">内衣裤</a><a href="#">童套装</a><a href="#">童T恤</a><a href="#">童裤</a><a href="#">亲子装</a><a href="#">童裙</a><a href="#">童衬衫</a><a href="#">童袜</a><a href="#">#运动鞋</a><a href="#">公主鞋</a><a href="#">帆布鞋</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">婴幼用品</a></dt>
                                            <dd><a href="#">尿不湿</a><a href="#">婴儿车</a><a href="#">睡袋</a><a href="#">奶瓶</a><a href="#">保温杯</a><a href="#">婴儿车</a><a href="#">连身衣</a><a href="#">围嘴围兜</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">宝宝食品</a></dt>
                                            <dd><a href="#">奶粉</a><a href="#">零食</a><a href="#">米粉</a><a href="#">果泥</a><a href="#">海苔</a><a href="#">鱼肝油</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">儿童玩具</a></dt>
                                            <dd><a href="#">益智</a><a href="#">电动车</a><a href="#">点滴画</a><a href="#">卡通</a><a href="#">自行车</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">孕产必备 </a></dt>
                                            <dd><a href="#">防辐射</a><a href="#">托腹裤</a><a href="#">哺乳衣</a><a href="#">束腹带</a><a href="#">暖奶器</a><a href="#">背带/学步带</a><a href="#">抱被</a><a href="#">孕妇装</a><a href="#">安全用品</a><a href="#">罩衣</a></dd>
                                        </dl>
                                    </li>
                                </ul>
                            </div>
                            <div class="order_item1">
                                <span>
                                    <h4><a href="#">手机、数码、通信</a></h4>
                                    <s></s>
                                </span>
                                <ul class="i_mc">
                                    <li>
                                        <dl>
                                            <dt><a href="#">手机</a></dt>
                                            <dd><a href="#">手机</a><a href="#">对讲机</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">手机配件</a></dt>
                                            <dd><a href="#">电池</a><a href="#">蓝牙耳机</a><a href="#">充电器/数据线</a><a href="#">手机耳机</a><a href="#">贴膜</a><a href="#">存储卡</a><a href="#">保护套</a><a href="#">车载</a><a href="#">iPhone配件</a><a href="#">创意配件</a><a href="#">便携/无线音箱</a><a href="#">手机饰品</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">摄影摄像</a></dt>
                                            <dd><a href="#">数码相机</a><a href="#">单电/微单相机</a><a href="#">单反相机</a><a href="#">拍立得</a><a href="#">运动相机</a><a href="#">摄像机</a><a href="#">镜头</a><a href="#">户外器材</a><a href="#">影棚器材</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">数码配件</a></dt>
                                            <dd><a href="#">存储卡</a><a href="#">读卡器</a><a href="#">滤镜</a><a href="#">闪光灯/手柄</a><a href="#">相机包</a><a href="#">三脚架/云台</a><a href="#">相机清洁</a><a href="#">相机贴膜</a><a href="#">机身附件</a><a href="#">镜头附件</a><a href="#">电池/充电器</a><a href="#">移动电源</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">智能设备</a></dt>
                                            <dd><a href="#">智能手环</a><a href="#">智能手表</a><a href="#">智能眼镜</a><a href="#">运动跟踪器</a><a href="#">健康监测</a><a href="#">智能配饰</a><a href="#">智能家居</a><a href="#">体感车</a><a href="#">其他配件</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">电子教育</a></dt>
                                            <dd><a href="#">电子词典</a><a href="#">电纸书</a><a href="#">录音笔</a><a href="#">复读机</a><a href="#">点读机/笔</a><a href="#">学生平板</a><a href="#">早教机</a></dd>
                                        </dl>
                                    </li>
                                </ul>
                            </div>
                            <div class="order_item1">
                                <span>
                                    <h4><a href="#">车饰</a></h4>
                                    <s></s>
                                </span>
                                <ul class="i_mc">
                                    <li>
                                        <dl>
                                            <dt><a href="#">维修保养</a></dt>
                                            <dd><a href="#">润滑油</a><a href="#">添加剂</a><a href="#">防冻液</a><a href="#">滤清器</a><a href="#">火花塞</a><a href="#">雨刷</a><a href="#">车灯后视镜</a><a href="#">轮胎</a><a href="#">轮毂</a><a href="#">刹车片/盘</a><a href="#">喇叭/皮带</a><a href="#">蓄电池</a><a href="#">底盘</a><a href="#">装甲/护板</a><a href="#">贴膜</a><a href="#">汽修工具</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">车载电器</a></dt>
                                            <dd><a href="#">导航仪</a><a href="#">安全预警仪</a><a href="#">行车记录仪</a><a href="#">倒车雷达</a><a href="#">蓝牙设备</a><a href="#">时尚影音</a><a href="#">净化器</a><a href="#">电源冰箱</a><a href="#">吸尘器</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">美容清洗</a></dt>
                                            <dd><a href="#">车蜡</a><a href="#">补漆笔</a><a href="#">玻璃水</a><a href="#">清洁剂</a><a href="#">洗车工具</a><a href="#">洗车配件</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">汽车装饰</a></dt>
                                            <dd><a href="#">脚垫</a><a href="#">座垫</a><a href="#">座套</a><a href="#">后备箱垫头</a><a href="#">枕腰靠</a><a href="#">香水</a><a href="#">空气净化</a><a href="#">车内饰品</a><a href="#">功能小件</a><a href="#">车身装饰件</a><a href="#">车衣</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">安全自驾</a></dt>
                                            <dd><a href="#">安全座椅</a><a href="#">胎压充气</a><a href="#">防盗设备</a><a href="#">应急救援</a><a href="#">应急救援</a><a href="#">保温箱</a><a href="#">储物箱</a><a href="#">自驾野营</a><a href="#">摩托车装备</a></dd>
                                        </dl>
                                    </li>
                                </ul>
                            </div>
                            <div class="order_item1">
                                <span>
                                    <h4><a href="#">运动户外</a></h4>
                                    <s></s>
                                </span>
                                <ul class="i_mc">
                                    <li>
                                        <dl>
                                            <dt><a href="#">运动鞋包</a></dt>
                                            <dd><a href="#">休闲鞋</a><a href="#">跑步鞋</a><a href="#">板鞋</a><a href="#">帆布鞋</a><a href="#">篮球鞋</a><a href="#">足球鞋</a><a href="#">乒羽网鞋</a><a href="#">专项运动鞋</a><a href="#">训练鞋</a><a href="#">拖鞋</a><a href="#">运动包</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">运动服饰</a></dt>
                                            <dd><a href="#">T恤</a><a href="#">乒羽网服</a><a href="#">训练服</a><a href="#">运动背心</a><a href="#">运动裤</a><a href="#">运动套装</a><a href="#">运动配饰</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">健身训练</a></dt>
                                            <dd><a href="#">跑步机</a><a href="#">健身车/动感单车</a><a href="#">综合训练器</a><a href="#">其他大型器械</a><a href="#">其他大型器械</a><a href="#">哑铃</a><a href="#">仰卧板/收腹机</a><a href="#">其他中小型器材</a><a href="#">武术搏击</a><a href="#">运动护具</a><a href="#">瑜伽舞蹈</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">骑行运动</a></dt>
                                            <dd><a href="#">山地车/公路车</a><a href="#">折叠车</a><a href="#">电动车</a><a href="#">其他整车</a><a href="#">骑行装备</a><a href="#">骑行服</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">体育用品</a></dt>
                                            <dd><a href="#">乒乓球</a><a href="#">羽毛球</a><a href="#">网球篮球</a><a href="#">足球</a><a href="#">高尔夫</a><a href="#">台球</a><a href="#">轮滑滑板</a><a href="#">排球</a><a href="#">棋牌麻将</a><a href="#">其它</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">户外装备</a></dt>
                                            <dd><a href="#">背包</a><a href="#">帐篷/垫子</a><a href="#">睡袋/吊床</a><a href="#">登山攀岩</a><a href="#">户外照明</a><a href="#">野餐烧烤</a><a href="#">便携桌椅床</a><a href="#">户外工具</a><a href="#">望远镜</a><a href="#">户外仪表</a><a href="#">旅游用品</a><a href="#">军迷用品</a><a href="#">救援装备</a><a href="#">滑雪装备</a><a href="#">极限户外</a><a href="#">冲浪潜水</a><a href="#">户外配饰</a></dd>
                                        </dl>
                                    </li>
                                </ul>
                            </div>
                            <div class="order_item1">
                                <span>
                                    <h4><a href="#">安防</a></h4>
                                    <s></s>
                                </span>
                                <ul class="i_mc">
                                    <li>
                                        <dl>
                                            <dt><a href="#">监控器材</a></dt>
                                            <dd><a href="#">监控摄像机</a><a href="#">集成系统</a><a href="#">监控支架</a><a href="#">监控配件</a><a href="#">监视器</a><a href="#">智能球编码器</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">消防设备</a></dt>
                                            <dd><a href="#">灭火器</a><a href="#">消防箱</a><a href="#">灭火毯</a><a href="#">消防水枪</a><a href="#">消防水带</a><a href="#">警示标志</a><a href="#">报警设备</a><a href="#">烟雾报警</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">劳保</a></dt>
                                            <dd><a href="#">防护手套</a><a href="#">防护鞋</a><a href="#">防护口罩</a><a href="#">防护服</a><a href="#">防护帽</a><a href="#">防护耳塞</a><a href="#">防护面罩</a><a href="#">防护眼镜</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">劳保</a></dt>
                                            <dd><a href="#">防护手套</a><a href="#">防护鞋</a><a href="#">防护口罩</a><a href="#">防护服</a><a href="#">防护帽</a><a href="#">防护耳塞</a><a href="#">防护面罩</a><a href="#">防护眼镜</a></dd>
                                        </dl>
                                    </li>
                                    <li>
                                        <dl>
                                            <dt><a href="#">劳保</a></dt>
                                            <dd><a href="#">防护手套</a><a href="#">防护鞋</a><a href="#">防护口罩</a><a href="#">防护服</a><a href="#">防护帽</a><a href="#">防护耳塞</a><a href="#">防护面罩</a><a href="#">防护眼镜</a></dd>
                                        </dl>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <ul class="navitem">
                        <li><a href="#">首页</a></li>
                        <li><a href="#">VCB优选</a></li>
                        <li><a href="#">VCB团购</a></li>
                        <li><a href="#">VCB特卖场</a></li>
                        <li><a href="#">48小时秒杀</a></li>
                        <li><a href="#">清仓</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-------------客服----------------------------->
        <div class="service_side" style="bottom: 50px;display:none;">
            <div class="chortcut" id="chortcut" >
                <img src="images/callcenter.jpg"style="cursor:pointer;width:90px; " />
                <p>
                    <a target="_blank" href="#"><img src="images/call1.gif" width="61" height="15"/>CS1</a></br>
                    <a target="_blank" href="#"><img src="images/call2.gif" width="61" height="15" />CS2</a></br>
                    <a target="_blank" href="#"><img src="images/call2.gif" width="61" height="15" />CS3</a></br>
                    <a target="_blank" href="#"><img src="images/call2.gif" width="61" height="15" />CS4</a> </br>
                    <a target="_blank" href="#"><img src="images/call2.gif" width="61" height="15" />CS5</a></br>
                    <a target="_blank" href="#"><img src="images/call1.gif" width="61" height="15" />CS6</a>
                </p>
                <p><a href="#">Hot Promotion</a></p>
                <p><a href="#">Vcanbuy TV</a></p>
                <p><a href="#">Gallery</a></p>
                <p><a href="#">Download Wallpaper</a></p>
            </div>
        </div>
        <!---------------------------订单页---------------------------------------------->
        <div class="container_out">
            <div class="container">
                <div class="vcb_shortcut" id="shortcut_list">
                    <div class="tit"><a href="#">我的账户</a></div>
                    <div class="mypage"><a href="#">个人主页</a></div>
                    <dl class="myvcb_set">
                        <dt><span>设置</span><b></b></dt>
                        <dd>
                            <a href="#">个人信息</a>
                            <a href="#">账户安全</a>
                            <a href="#">我的级别</a>
                            <a href="#">收货地址</a>
                            <a href="#">快捷支付</a>
                            <a href="#">手机绑定</a>
                            <a href="#">消费记录</a>
                            <a href="#">分享设置</a>
                        </dd>
                    </dl>
                    <div class="myvcb_info">消息</div>
                </div>
                <div class="vcb_main" id="order_lmenu">
                    <div class="trade_l">
                        <h4>我的交易</h4>
                        <dl class="fore1">
                            <dt><a href="#">我的购物车</a></dt>
                        </dl>
                        <dl class="fore1">
                            <dt><a href="#" class="cur">我的订单</a></dt>
                        </dl>
                        <dl class="fore1">
                            <dt><a href="#">购买过的店铺</a></dt>
                        </dl>
                        <dl class="fore1">
                            <dt><a href="#">我的收藏</a></dt>
                        </dl>
                        <dl class="fore1">
                            <dt><a href="#">我的积分</a></dt>
                        </dl>
                        <dl class="fore1">
                            <dt><a href="#">我的优惠信息</a></dt>
                        </dl>
                        <dl class="fore1">
                            <dt><a href="#">评价管理</a></dt>
                        </dl>
                        <dl class="fore1">
                            <dt class="hc"><a href="#">退款维权</a><b></b></dt>
                            <dd><a href="#">售后管理</a></dd>
                            <dd><a href="#">投诉管理</a></dd>
                            <dd><a href="#">举报管理</a></dd>
                            <dd><a href="#">咨询/回复</a></dd>
                        </dl>
                        <dl class="fore1">
                            <dt><a href="#">我的足迹</a></dt>
                        </dl>
                        <dl class="fore1">
                            <dt><a href="#">淘宝拍卖</a></dt>
                        </dl>
                        <dl class="fore1">
                            <dt><a href="#">女人市场</a></dt>
                        </dl>
                    </div>
                    <div class="trade_r">
                        <div class="trade_remind">
                            <ul class="order_list" id="order_navbar">
                                <li>
                                    <a class="order_link" href="#"><span>所有订单</span><i>|</i></a>
                                </li>
                                <li>
                                    <a class="order_link" href="#"><span>待付款</span><em>0</em><i>|</i></a>
                                </li>
                                <li>
                                    <a class="order_link" href="#"><span>待发货</span><em>0</em><i>|</i></a>
                                </li>
                                <li>
                                    <a class="order_link" href="#"><span>待收货</span><em>0</em><i>|</i></a>
                                </li>
                                <li>
                                    <a class="order_link" href="#"><span>待评价</span><em>0</em><i>|</i></a>
                                </li>
                                <li class="recycle">
                                    <a class="order_link" href="#">订单回收站</a>
                                </li>
                            </ul>
                            <div class="wrap_line"><span></span></div>
                        </div>
                        <div class="searchbar">
                            <div class="tyies">全部订单</div>
                            <div class="search01">
                                <input type="text" class="s_itxt" value="商品名称、商品编号、订单编号" onfocus="if (this.value == this.defaultValue)
                                            this.value = ''" onblur="if (this.value == '')
                                                        this.value = this.defaultValue"/><a class="btn_13" href="#">查询</a>
                            </div>
                        </div>
                        <div class="bl">
                            <table class = "buy_table">

                                <colgroup>
                                    <col class = "baobei">
                                        <col class = "price">
                                            <col class = "quantity">
                                                <col class = "amount">
                                                    <col class = "trade_status">
                                                        <col class = "trade_operate">
                                                            </colgroup>
                                                            <thead>
                                                                <tr class = "col_name">
                                                                    <th class = "baobei">宝贝</th>
                                                                    <th class = "price">单价(元)</th>
                                                                    <th class = "quantity">数量</th>
                                                                    <th class = "amount">实付款(元)</th>
                                                                    <th class = "trade_status">交易状态</th>
                                                                    <th class = "trade_operate">交易操作</th>
                                                                </tr>
                                                                <tr class = "sep_row">
                                                                    <td colspan = "6"></td>
                                                                </tr>
                                                                <tr class = "toolbar">
                                                                    <td colspan = "6">
                                                                        <div class = "operators">
                                                                            <label><input type = "checkbox" class = "all_selector">全选</label>
                                                                            <a class = "combinpay" href = "#">合并付款</a>
                                                                            <a class = "combinaligentpay" href = "#">合并代付</a>
                                                                            <a class = "makepoint" href = "#">批量确认收货</a>
                                                                        </div>
                                                                        <div class = "page_boxing"></div>
                                                                    </td>
                                                                </tr>
                                                            </thead>
                                                            <?php
                                                            if (!empty($order_data)) {
                                                                foreach ($order_data as $a) {
                                                                    ?>
                                                                    <tbody class="tb_<?php echo $a['id']; ?>">
                                                                        <tr class = "steprow">
                                                                            <td colspan = "6">&nbsp;
                                                                            </td></tr>
                                                                        <tr class = "orderhd">
                                                                            <td class = "first">
                                                                                <span class = "order_select"><input type = "checkbox" name="order_no[]"/></span>
                                                                                <span class = "order_number">订单号：<?php echo $a['order_no']; ?></span>
                                                                            </td>
                                                                            <td class = "column" colspan = "2"><a class = "shopname" href = "#"><?php echo $a['shop'] ?></a></td>
                                                                            <td class = "column"><a class = "wangwang" href = "#">&nbsp;
                                                                                </a></td>
                                                                            <td class = "last" colspan = "2">&nbsp;
                                                                            </td>
                                                                        </tr>
                                                                        <tr class = "order_bd">
                                                                            <td class = "baobei">
                                                                                <dl>
                                                                                    <dt><a href = "#"><img src = "<?php echo M_UPLOAD_PATH . $a['image_url'] ?>" width = "80" height = "80" /></a></dt>
                                                                                    <dd>
                                                                                        <a href = "#" class = "pic1name"><?php echo $a['title_cn'] ?></a>
                                                                                        <span class = "pic1size"> 颜色分类: 花灰 尺码: 均码 </span>
                                                                                        <span class = "goodicons"><a class = "seven_days" href = "http://www.tmall.com/market/mall/qttk.php?spm=a1z09.2.9.15.e4cr6o">&nbsp;
                                                                                            </a><a class = "protect" href = "http://www.taobao.com/go/act/315/xb_20100707.php?ad_id=&am_id=1300268931aef04f0cdc&cm_id=&pm_id=#rushi">&nbsp;
                                                                                            </a><a class = "brand" href = "http://www.taobao.com/go/act/315/xb_20100707.php?ad_id=&am_id=1300268931aef04f0cdc&cm_id=&pm_id=#peifu">&nbsp;
                                                                                            </a><a class = "certified" href = "http://www.taobao.com/go/act/315/xb_20100707.php?ad_id=&am_id=1300268931aef04f0cdc&cm_id=&pm_id=#zhenpin">&nbsp;
                                                                                            </a></span>
                                                                                    </dd>
                                                                                </dl>
                                                                            </td>
                                                                            <td class = "price"><?php echo $a['sales_price'] ?></td>
                                                                            <td class = "quantity"><?php echo $a['qty'] ?></td>
                                                                            <td class = "totalprice">
                                                                                <p class = "realprice"><?php echo $a['sales_price'] * $a['qty'] + $a['freight'] ?></p>
                                                                                <p class = "posttype">(含运费：<?php echo $a['freight'] ?>)</p>
                                                                            </td>
                                                                            <td class = "trade_status"><?php echo $a['status'] ?></td>
                                                                            <td class = "trade_operate"><a href = "detail?id=<?php echo $a['id'] ?>">订单详情</a><a style="cursor: pointer;" onclick = "removeorder(<?php ECHO $a['id'] ?>)">删除</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                    <?php
                                                                }
                                                            }
                                                            ?>
<!--<tbody>
<tr class = "steprow">
<td colspan = "6">&nbsp;
</td></tr>
<tr class = "orderhd">
<td class = "first">
    <span class = "order_select"><input type = "checkbox"/></span>
    <span class = "order_number">订单号：831005461644044</span>
</td>
<td class = "column" colspan = "2"><a class = "shopname" href = "#">VCANBUY</a></td>
<td class = "column"><a class = "wangwang" href = "#">&nbsp;
    </a></td>
<td class = "last" colspan = "2">&nbsp;
</td>
</tr>
<tr class = "order_bd">
<td class = "baobei">
    <dl>
        <dt><a href = "#"><img src = "images1/itempic3.jpg" width = "80" height = "80" /></a></dt>
        <dd>
            <a href = "#" class = "pic1name">2014春夏秋装新款女式潮装韩版甜美无袖大码工字打底白色小背心衫</a>
            <span class = "pic1size"> 颜色分类: 花灰 尺码: 均码 </span>
            <span class = "goodicons"><a class = "seven_days" href = "http://www.tmall.com/market/mall/qttk.php?spm=a1z09.2.9.15.e4cr6o">&nbsp;
                </a><a class = "protect" href = "http://www.taobao.com/go/act/315/xb_20100707.php?ad_id=&am_id=1300268931aef04f0cdc&cm_id=&pm_id=#rushi">&nbsp;
                </a><a class = "brand" href = "http://www.taobao.com/go/act/315/xb_20100707.php?ad_id=&am_id=1300268931aef04f0cdc&cm_id=&pm_id=#peifu">&nbsp;
                </a><a class = "certified" href = "http://www.taobao.com/go/act/315/xb_20100707.php?ad_id=&am_id=1300268931aef04f0cdc&cm_id=&pm_id=#zhenpin">&nbsp;
                </a></span>
        </dd>
    </dl>
</td>
<td class = "price">15.00</td>
<td class = "quantity">10</td>
<td class = "totalprice">
    <p class = "realprice">41.00</p>
    <p class = "posttype">(含运费：11.00)</p>
</td>
<td class = "trade_status">已完成</td>
<td class = "trade_operate"><a href = "#">订单详情</a><a href = "#">删除</a></td>
</tr>
</tbody>
<tbody>
<tr class = "steprow">
<td colspan = "6">&nbsp;
</td></tr>
<tr class = "orderhd">
<td class = "first">
    <span class = "order_select"><input type = "checkbox"/></span>
    <span class = "order_number">订单号：831005461644044</span>
</td>
<td class = "column" colspan = "2"><a class = "shopname" href = "#">VCANBUY</a></td>
<td class = "column"><a class = "wangwang" href = "#">&nbsp;
    </a></td>
<td class = "last" colspan = "2">&nbsp;
</td>
</tr>
<tr class = "order_bd">
<td class = "baobei">
    <dl>
        <dt><a href = "#"><img src = "images1/itempic1.jpg" width = "80" height = "80" /></a></dt>
        <dd>
            <a href = "#" class = "pic1name">2014春夏秋装新款女式潮装韩版甜美无袖大码工字打底白色小背心衫</a>
            <span class = "pic1size"> 颜色分类: 花灰 尺码: 均码 </span>
            <span class = "goodicons"><a class = "seven_days" href = "http://www.tmall.com/market/mall/qttk.php?spm=a1z09.2.9.15.e4cr6o">&nbsp;
                </a><a class = "protect" href = "http://www.taobao.com/go/act/315/xb_20100707.php?ad_id=&am_id=1300268931aef04f0cdc&cm_id=&pm_id=#rushi">&nbsp;
                </a><a class = "brand" href = "http://www.taobao.com/go/act/315/xb_20100707.php?ad_id=&am_id=1300268931aef04f0cdc&cm_id=&pm_id=#peifu">&nbsp;
                </a><a class = "certified" href = "http://www.taobao.com/go/act/315/xb_20100707.php?ad_id=&am_id=1300268931aef04f0cdc&cm_id=&pm_id=#zhenpin">&nbsp;
                </a></span>
        </dd>
    </dl>
</td>
<td class = "price">15.00</td>
<td class = "quantity">10</td>
<td class = "totalprice">
    <p class = "realprice">41.00</p>
    <p class = "posttype">(含运费：11.00)</p>
</td>
<td class = "trade_status">已完成</td>
<td class = "trade_operate"><a href = "#">订单详情</a><a href = "#">删除</a></td>
</tr>
</tbody>

                                                            --></table>
                                                            </div>
                                                             <div class="list_content_down">
            <div class='page'>
                <?php echo $showPage; ?>
            </div>
            <div class='pagetotal'>
            <?php echo $showTotal; ?>
            </div>
                                                            </div>
                                                            </div>
                                                            </div>
                                                            </div>

                                                            <!--------------支付方式----------------------------->
                                                            <div class = "foot_out">
                                                                <div class = "foot navfoot">
                                                                    <div >
                                                                        <p>新手指南</p>
                                                                        <ul>
                                                                            <li>用户注册</li>
                                                                            <li>购物指南</li>
                                                                            <li>支付方式</li>
                                                                            <li>会员制度</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class = "foot02">
                                                                        <p>购物指南</p>
                                                                        <ul>
                                                                            <li>如何下单</li>
                                                                            <li>如何查询</li>
                                                                            <li>购物车管理</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class = "foot03">
                                                                        <p>付款与配送</p>
                                                                        <ul>
                                                                            <li>关于配送</li>
                                                                            <li>配送标准</li>
                                                                            <li>验货与签收</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class = "foot04">
                                                                        <p>售后服务</p>
                                                                        <ul>
                                                                            <li>关于退货</li>
                                                                            <li>关于换货</li>
                                                                            <li>关于维修</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class = "foot05">
                                                                        <p>支付方式</p>
                                                                        <ul>
                                                                            <li>会员问题</li>
                                                                            <li>站点问题</li>
                                                                            <li>支付方式</li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class = "foot06">
                                                                        <p>关于VCB商城</p>
                                                                        <ul>
                                                                            <li>公司简介</li>
                                                                            <li>品牌文化</li>
                                                                            <li>诚聘英才</li>
                                                                        </ul>
                                                                    </div>
                                                                </div>

                                                                <div class = "footer navfooter">
                                                                    <dl >
                                                                        <dt>泰国最大</dt>
                                                                        <dd>在线购物</dd>
                                                                    </dl>

                                                                    <dl class = "footer02">
                                                                        <dt>100%</dt>
                                                                        <dd>原装正品</dd>
                                                                    </dl>
                                                                    <dl class = "footer03">
                                                                        <dt>7天</dt>
                                                                        <dd>无理由退换</dd>
                                                                    </dl>
                                                                    <dl class = "footer04">
                                                                        <dt>金牌服务</dt>
                                                                        <dd>贴心呵护</dd>
                                                                    </dl>
                                                                    <dl class = "footer05">
                                                                        <dt>72小时</dt>
                                                                        <dd>闪电发货</dd>
                                                                    </dl>
                                                                    <dl class = "footer06">
                                                                        <dt>精美包装</dt>
                                                                        <dd>可靠呵护</dd>
                                                                    </dl>
                                                                    <dl class = "footer07">
                                                                        <dt>百万用户</dt>
                                                                        <dd>口碑信赖</dd>
                                                                    </dl>
                                                                    <dl class = "footer08">
                                                                        <dt>众多明星</dt>
                                                                        <dd>联袂推荐</dd>
                                                                    </dl>
                                                                </div>

                                                            </div>

                                                            <!--------------版权----------------------------->
                                                            <div class = "banquan_out">
                                                                <p>169/129-130 ตำบล กระทุ่มล้ม อำเภอ สามพราน จังหวัด นครปฐม</br>
                                                                    หมายเลขโทรศัพท์ 02-8140484 หมายเลขโทรสาร 02-8140169 หมายเลขโทรศัพท์มือถือ 090-1201200, 090-1231200, 090-0501200, E-mail:cs@vcanbuy.com</p>


                                                            </div>

                                                            </body>
                                                            </html>





































































































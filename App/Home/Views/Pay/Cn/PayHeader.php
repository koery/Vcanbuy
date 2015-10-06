<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>收银台-Vcanbuy</title>
<link rel="stylesheet" href="<?php echo APP_MODULE_CSS_PATH?>Pay/pay.css" type="text/css">
<link rel="stylesheet" href="<?php echo APP_MODULE_CSS_PATH?>Pay/payHeader.css" type="text/css">
<link rel="stylesheet" href="<?php echo APP_MODULE_CSS_PATH?>Pay/payFooter.css" type="text/css">
<script src="<?php echo APP_JS_PUBLIC_PATH?>jquery-1.8.3.min.js"></script>
<script src="<?php echo APP_MODULE_JS_PATH?>Pay/pay.js"></script>
</head>
<body>

<?php 

$hasLogIn=flase;

	if(!empty($username)){
$hasLogIn = ture;

?>
<!--登陆和没有登录的区别，只有header栏不一样，登陆的情况-->

<div class="topbar_head" style="display:;">
	<div class="w960_head clearfix">
    	<div class="topbar_head_left">
        	<a href="../index/index" class="topbar_index">VCANBUY</a>
        </div>
        <div class="topbar_contry">
        	<a href="#" class="topbar_cn"></a>
            <a href="#" class="topbar_th"></a>
            <a href="#" class="topbar_usa"></a>
        </div>
        <ul class="topbar_status">
            <li class="topbar_status_line"></li>
        	<li class="topbar_status_myorder"><a href="">我的订单</a></li>
            <li class="topbar_status_line"></li>
        	<li class="topbar_status_mycart"><a href="">我的购物车</a><span>(10)</span></li>
            <li class="topbar_status_line"></li>
        	<li class="topbar_status_message">
            	<a href="javascript:void(0);" class="topbar_status_mes_tip topbaritem">消息</a>
                <div class="topbar_status_mes_info topbarinfo" style="display:none;">
                	<a href="#">系统消息</a>
                    <a href="#">系统消息</a>
                    <a href="#">系统消息</a>
                    <a href="#">系统消息</a>
                </div>
             </li>
            <li class="topbar_status_line"></li>
        	<li class="topbar_status_user">
            	<a href="javascript:void(0);" class="topbar_status_uesername topbaritem"><?php echo $username?></a>
                <div class="topbar_status_user_info topbarinfo" style="display:none;">
                	<a href="#">我的积分</a>
                    <a href="#">积分兑换</a>
                    <a href="#">账户与安全</a>
                    <a href="#">退出</a>
                </div>
             </li>
        </ul>
    </div>
</div>

<?php 
	}else{

?>
<!----------没有登陆的情况-------->
<div class="topbar_head" style="display:">
	<div class="w960_head clearfix">
    	<div class="topbar_head_left">
        	<a href="#" class="topbar_index">VCANBUY</a>
            <!--<a href="#" class="cn"></a>
            <a href="#" class="th"></a>-->
        </div>
        <div class="topbar_contry">
        	<a href="#" class="topbar_cn"></a>
            <a href="#" class="topbar_th"></a>
            <a href="#" class="topbar_usa"></a>
        </div>
        <ul class="topbar_status">
            <li class="topbar_status_line"></li>
        	<li class="topbar_status_login"><a href="" class="">注册</a></li>
            <li class="topbar_status_line"></li>
        	<li class="topbar_status_register"><a href="" class="">登陆</a></li>
        </ul>
    </div>
</div>
<?php 
    }
    $hasLogIn = json_encode($hasLogIn);
    echo
    "<script> 
    hasLogIn=$hasLogIn;
    </script>";
?>
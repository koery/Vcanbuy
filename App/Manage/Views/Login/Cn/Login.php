<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>admin_login.css"/>

</head>

<body>
<div class="login_body">
	<p class="con_title">后台管理系统</p>
    <ul class="admin_items">
        <li>
            <span class="admin_name"><i></i></span>
            <input type="text" value="" class="admin_inputname" />
        </li>
        <li>
            <span class="admin_psw"><i></i></span>
            <input type="password" value="" class="admin_inputpsw" />
        </li>
        <li>
            <span class="admin_verification"><i></i></span>
            <input type="text" value="" class="admin_verificate" />
            <span class="code_image"><img src="<?php echo APP_IMAGE_PUBLIC_PATH ?>verify_code.png"/></span>
        </li>
    </ul>
	<div class="submit_btn">
    	<a href="#" class="right">登录</a><a href="#" class="once">重置</a>
    </div>
</div>
</body>
</html>

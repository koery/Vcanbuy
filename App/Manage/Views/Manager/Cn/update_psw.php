<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VCANBUY后台管理系统</title>
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>common.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>main.css" rel="stylesheet" type="text/css" />
<script src="<?php echo APP_JS_PUBLIC_PATH?>jquery-1.8.3.min.js"></script>
<script src="<?php echo APP_MODULE_JS_PATH?>Manager/update_psw.js" type="text/javascript"></script>
</head>
<body>


<?php $a=$data[0];?>
<div class="container clearfix">
    
   
    <div class="main-wrap">
      <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="../right/right">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="../manager/manager">管理员列表</a><span class="crumb-step">&gt;</span><span>修改密码</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form   id="myform" name="myform" enctype="multipart/form-data" >
                    <table class="insert-tab" width="100%">
                        <tbody>
                         <tr>
                                <th><i class="require-red">*</i>用户名：</th>
                                <td>
                                    <?php echo $a['username']?>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>真实姓名：</th>
                                <td>
                                    <?php echo $a['name']?>
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>邮件：</th>
                                <td>
                                    <?php echo $a['email']?>
                                </td>
                            </tr>
                            <tr>
                                <th width="120"><i class="require-red">*</i>新密码：</th>
                                <td>
                                    <input class="common-text required" id="password" name="password" size="50" value="" type="password">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>再次确认密码：</th>
                                <td>
                                    <input class="common-text required" id="password_again" name="password_again" size="50" value="" type="password">
                                </td>
                            </tr>
  
                            <tr>
                                <th></th>
                                <td>
                                	<input type="hidden" name="id" id="id"  value='<?php echo $_GET['id']?>'/></div>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="button">
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>
</body>
</html>





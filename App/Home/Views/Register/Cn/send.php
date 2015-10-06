
<div id="body_wrap">
	<div class="rg_logo">
    	<a href="../index/index" class="logo_img"><img src="<?php echo APP_IMAGE_PUBLIC_PATH?>VCB LOGO.png" width="206" height="54" /></a>
        <p class="logo_right">已有账号了？去<a href="../login/index">登陆</a></p>
    </div>
	<div class="rg_bd">
    		<div class="rg_tip">还差一步即可完成注册！</div>
            <div class="emailbox">
                <p>
                   <span class="emailbox01">电子邮箱：</span><span class="emailbox02"><?php echo $email;?></span>
                </p>
                <p>验证邮箱已发往你的电子邮箱，请点击邮件中的链接完成验证！</p>
           </div>
          <div class="verification">
              <a  target="_blank" href="http://<?php echo $mail;?>" class="yanzheng">去邮箱验证</a><a href="javascript:void(0);" class="once">没收到，再发一次</a><a href="javascript:void(0);" class="goback">返回上一步</a>
          </div>
    </div>
</div>
<!-------------------------------->
<div class="lg_thick" style="display:none;"></div>


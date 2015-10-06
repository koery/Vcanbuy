
<div id="login_wrap">
	<div class="logo">
    	<a href="../index/index" class="logo_img"><img src="<?php echo APP_IMAGE_PUBLIC_PATH ?>VCB LOGO.png" width="206" height="54" /></a>
    </div>
  <div class="logo_con">
  	  <div class="lg_banner">
      		<a href="javascript:void(0);" target="_blank" class="lg_banner1"><img src="<?php echo APP_MODULE_IMAGE_PATH ?>ImgLogin/sdfbjsfv.jpg" width="400" height="300" /></a></div>
  	  <div class="lg_content">
      		<p class="lg_mod">登陆</p>         
             <div class="error_tip " style="display:none" ></div>

            <div class="lg_form">
            	<div class="mod_box">
                	<div class="lg_item">
                    	<b class="lg_icon"></b>
                    	 <form id="form" name="login" method="post" action="" autocomplete="on">
                        <input type="text" value="<?php echo $data;?>" class="lg_input" maxlength="40" id="login_username"/>
                        </form>
                    </div>
                    <div class="lg_item lg_item_pwd_text" style="display:block">
                    	<b class="lg_icon lg_icon1"></b>
                        <input type="text" value="请输入密码" class="lg_input" id="login_psd_text"/>
                    </div>
                	<div class="lg_item lg_item_pwd" style="display:none">
                    	<b class="lg_icon lg_icon1"></b>
                        <input type="password" value="" class="lg_input lg_psd" id="login_psd"/>
                    </div>
                	<div class="lg_item lg_item1" style="display: none">
						<span>                    	
                        		<b class="lg_icon lg_icon2"></b>
                        		<input type="text" value="请输入验证码" class="lg_input lg_identify" id="login_code" check="false" errorTimes="<?php echo $errorTimes;?>" />
						</span> 
						<span class="identifying"> 
                        	  <img class="verifCode" src="verifCode" width="88" height="36" /> 
                              <a class="changeVerifCode" href="javascript:void(0);">看不清,换一张</a>
                         </span> 
                    </div>
                </div>
            </div>
            <div class="lg_remenber">
            	<input id="lg10245" type="checkbox" class="" /><label for="lg10245">10天免登陆</label>  
            </div>
            <div class="lg_login">
            	<input type="submit" value="" class="lg_sub"/><a href="../security/findpwdStepOne"  target="_blank" class="lg_foret">忘记密码？</a><a href="../register/index" target="_blank" class="lg_foret newregister">新用户注册 </a>
            </div>
      </div>
  </div>
</div>




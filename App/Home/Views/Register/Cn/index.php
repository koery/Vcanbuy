
<div id="body_wrap">
	<div class="rg_logo">
    	<a href="index.html" class="logo_img"><img src="<?php echo APP_IMAGE_PUBLIC_PATH?>VCB LOGO.png" width="206" height="54" /></a>
    </div>
    <form id="form" name="form1" method="post" action="send" autocomplete="on">
	<div class="rg_bd">
    	<h3>新用户注册</h3>
        <ul>
        	<li>
            	<label class="rg_tel">邮箱：</label>
                <div class="rg_inputbox">
                	<input type="text" name="email" value="请输入邮箱" id="regtel" check="false" />
                    <span class="errortip"></span>
                </div>
            </li>
        	<li>
            	<label class="rg_tel">密码：</label>
                <div class="rg_inputbox regpsd_text">
                	<input type="text" value="6-16位密码,支持数字和字母" id="regpsd_text" />
                    <span class="errortip"></span>
                </div>
                <div class="rg_inputbox regpsd" style="display: none">
                	<input type="password" name="psword" value="" id="regpsd" check="false"/>
                    <span class="errortip"></span>
                </div>
            </li>
        	<li>
            	<label class="rg_tel">确认密码：</label>
            	<div class="rg_inputbox psdrepeat_text">
                	<input type="text" value="请再次输入密码" id="psdrepeat_text" />
                    <span class="errortip"></span>
                </div>
                <div class="rg_inputbox psdrepeat" style="display: none">
                	<input type="password" value="" id="psdrepeat" check="false"/>
                    <span class="errortip"></span>
                </div>
            </li>
        	<li>
            	<label class="rg_tel">介绍人代号：</label>
                <div class="rg_inputbox">
                	<input type="text" name="intro" value="请输入介绍人代号" id="intro_code"  check="true"/>
                    <span class="errortip"></span>
                </div>
            </li>
  </form>          
        	<li class="re_agreement">        		
            	<input type="checkbox"  id="rg2014_agreement" checked/>          	
                <label for="rg2014_agreement"/>我已看过并同意<a href="javascript:;" id="showagree">《Vcanbuy用户注册协议》</a></label>
            </li>
            
        </ul>
        <div class="rg_sumbmit">
        	<a href="javascript:void(0);" class="rg_button"></a><span class="btn_right"> 已经有账号了？去<a href="../login/index">登录</a></span>
        </div>
    </div>
</div>
<!-------------------------------->
<div class="lg_thick" style="display:none;"></div>
<!--------------------------->

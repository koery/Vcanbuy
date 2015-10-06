
<div id="containter">
		<div class="reg_box">            
                <div class="reg_hd">
                	<a href="#"><img src="<?php echo APP_IMAGE_PUBLIC_PATH ?>VCB LOGO.png" width="206" height="54" /></a>
                </div>
                 <div class="reg_bd">
                 		<h3 class="fz">安全设置-找回密码</h3>
                         <div class="step_box">
                            <ul>
                                <li class="y1">
                                    <span>输入登录名</span>
                                    <div></div>
                                 </li>
                                <li class="y2">
                                    <span>验证信息</span>
                                    <div class="sy3"></div>
                                 </li>
                                <li class="y3">
                                    <span>重置密码</span>
                                    <div></div>
                                 </li>
                                <li class="no4">
                                    <span>完成</span>
                                </li>
                            </ul>    
                         </div>
                     	<div class="formbox">
                        	<form  id="form" name="findPwdStepThree" method="post" action="findPwdStepFour" autocomplete="on">
                                    <ul>
                                        <li >
                                            <label>新密码：</label>
                                            <div class="formbox2 renewpsd_text" >
                                            	<input type="text" value="6-16位密码,支持数字和字母" class="normalPsw" id="renewpsd_text" maxlength="20"/>
                                                <span class="tips"></span>
                                            </div>
                                            <div class="formbox2 renewpsd" style="display:none ">
                                            	<input name="newPwd" type="password" value="" class="normalPsw" id="renewpsd" maxlength="20" check="false"/>
                                                <span class="tips"></span>
                                            </div>
                                         </li>
                                        <li >
                                            <label>请确认密码：</label>
                                          <div  class="psdrepeat_text" >
                                            	<input type="text" value="请再次输入密码" class="normalPsw1" maxlength="20" id="renewpsd1_text"/>
                                                <span class="tips"></span>
                                            </div>
                                            <div  class="psdrepeat" style="display:none ">
                                            	<input type="password" value="" class="normalPsw1" maxlength="20" id="renewpsd1" check="false"/>
                                                <span class="tips"></span>
                                            </div>
                                         </li>
                                    </ul>    
                            		<p class="subbox"><a class="reset" href="javascript:void(0);">重置密码</a></p>
                            </form>
                        </div>
                 </div>
		</div>        
</div>


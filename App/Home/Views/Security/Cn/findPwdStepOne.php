
<div id="containter">
		<div class="reg_box">            
                <div class="reg_hd">
                	<a href="../index/index"><img src="<?php echo APP_IMAGE_PUBLIC_PATH ?>VCB LOGO.png" width="206" height="54" /></a>
                </div>
                 <div class="reg_bd">
                 		<h3 class="fz">安全设置-找回密码</h3>
                         <div class="step_box">
                            <ul>
                                <li>
                                    <span>输入登录名</span>
                                    <div></div>
                                 </li>
                                <li class="no2">
                                    <span>验证信息</span>
                                    <div></div>
                                 </li>
                                <li class="no3">
                                    <span>重置密码</span>
                                    <div></div>
                                 </li>
                                <li class="no4">
                                    <span>完成</span>
                                </li>
                            </ul>    
                         </div>
                     	<div class="formbox">
                        	<form  id="form" name="findPwdStepOne" method="post" action="findPwdStepTwo" autocomplete="on">
                                    <ul>
                                        <li>
                                            <label>邮箱：</label>
                                            <div class="formbox2">
                                            	<input type="text"  name="email"  value="请输入邮箱" class="normalText" id="userinfo" check="false"/>
                                                <span class="tips"></span>
                                            </div>
                                         </li>
                                        <li>
                                            <label>验证码：</label>
                                            <div>
                                            	<input type="text" value="请输入验证码" class="imgcheck" id="verifCode" check="false"/>
                                                <span class="imgcodeCheck"><img class="verifCode" src="verifCode" width="90" height="36"  />
                                                <a href="javascript:void(0);"  class="changeVerifCode">看不清,换一张</a></span>
                                                 <span class="tips verifCodeTips"></span>
                                                
                                            </div>
                                         </li>
                                    </ul>    
                            		<span class="subbox"><a href="javascript:void(0);">下一步</a></span>
                            </form>
                        	
                        </div>
                 </div>
		</div>        
</div>


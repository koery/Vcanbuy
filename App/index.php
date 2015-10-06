<?php
defined( '_VALID_MOS' ) or die( 'Restricted access' );
// needed to seperate the ISO number from the language file constant _ISO
$iso = explode( '=', _ISO );
// xml prolog
echo '<?xml version="1.0" encoding="'. $iso[1] .'"?' .'>';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php mosShowHead(); ?>
<?php
if ( $my->id ) {
	initEditor();
}
$collspan_offset = ( mosCountModules( 'right' ) ) ? 2 : 1;
//right based combos
if ( mosCountModules( 'user1', 'user2' ) and ( empty( $_REQUEST['task'] ) || $_REQUEST['task'] != 'edit' ) ) {
	$user1 = 1;
	$user2 = 2;
}
?>
<meta http-equiv="Content-Language" content="en-us">
<link href="<?php echo $mosConfig_live_site;?>/templates/jm_medical/css/template_css.css" type="text/css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>

<body>
<div align="center">
	<table border="0" cellpadding="0" cellspacing="0" width="900" id="table1" class="main">
		<tr>
			<td style="height: 32px">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table2" style="height: 100%">
				<tr>
					<td valign="top" width="6"><img src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/left_top.png" /></td>
					<td valign="top" class="bac_top_left_menu">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table11">
						<tr>
							<td style="height: 32px" valign="top"><?php mosLoadModules ( 'user3', -1); ?></td>
							<td style="height: 32px" width="200" valign="middle"><?php mosLoadModules ( 'user4', -1); ?></td>
						</tr>
					</table>
					</td>
					<td valign="top" width="5"><img src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/right_top.png" /></td>
					<td valign="bottom" width="191">
					<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/top_logo2.png" /></td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td style="height: 224px" valign="top">
			<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table3">
				<tr>
					<td width="709" valign="top">
					<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/logo.jpg" /></td>
					<td valign="top" width="191">
					<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/middle_logo2.jpg" /></td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td>
			<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table4">
				<tr>
					<td width="185" class="bac_left_menu" valign="top"><?php mosLoadModules ( 'left', -2 ); ?></td>
					<td valign="top">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table7">
						<tr>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table8">
								<tr>
									<td valign="bottom" style="height: 22px" width="18">
									<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/left_top_app.png" /></td>
									<td valign="middle" class="bac_top_app">&nbsp;</td>
									<td width="121" style="height: 22px" valign="bottom">
									<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/right_top_app.png" /></td>
								</tr>
							</table>
							</td>
						</tr>
						<tr>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table9">
								<tr>
									<td>
									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table10">
										<tr>
											<td style="height: 89px" width="18">
											<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/left_mid_app.png" /></td>
											<td class="bac_mid_app"><?php mosPathway(); ?></td>
											<td style="height: 89px" width="121" valign="top">
											<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/right_mid_app.png" /></td>
										</tr>
									</table>
									</td>
								</tr>
								<tr>
									<td style="height: 8px" valign="top">
									<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/bot_app.png" /></td>
								</tr>
								<tr>
									<td>
									<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table12">
										<?php
										 if ($user1 == 1 || $user2 == 2){  
										 ?>
										<tr>
											<td>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table13">
												<tr>
													<td style="height: 237px" width="6">
													<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/left_flash.png" /></td>
													<td class="bac_flash" valign="top" width="257">
													<?php mosLoadModules ( 'user1', -3); ?></td>
													
													<td class="bac_flash" valign="top" width="257">
													<?php mosLoadModules ( 'user2', -3); ?></td>
													<td style="height: 237px" width="4">
													<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/right_flash.png" /></td>
												</tr>
											</table>
											</td>
										</tr> <?php
										 } 
										 ?>
										<tr>
											<td>
											<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table14">
												<tr>
													<td>
													<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table15">
														<tr>
															<td style="height: 26px" width="6">
															<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/left_space.png" /></td>
															<td class="bac_space">&nbsp;
															</td>
															<td style="height: 26px" width="5">
															<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/right_space.png" /></td>
														</tr>
													</table>
													</td>
												</tr>
												<tr>
													<td>
													<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table16">
														<tr>
															<td style="height: 2px" width="524" valign="middle">
															<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/top_main.png" /></td>
														</tr>
														<tr>
															<td class="bac_main" valign="top"><table cellpadding="2" cellspacing="2"><tr><td>
															<?php mosMainBody(); ?></td></tr></table></td>
														</tr>
														<tr>
															<td>
															<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table17">
																<tr>
																	<td style="height: 2px" width="524" valign="top">
																	<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/bot_main.png" /></td>
																</tr>
																<tr>
																	<td>
																	<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table18">
																		<tr>
																			<td style="height: 61px" width="7">
																			<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/left_footer.png" /></td>
																		<td class="bac_footer">
															<table align="center"> <tr><td><a href="http://www.studentsdesign.de" target="_blank" class="footer">
																design by 
																studentsdesign</a></td></tr><tr><td align="center"><?php mosLoadModules ( 'footer', -1); ?></td></tr></table></td>
																			<td style="height: 61px" width="4">
																			<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/right_footer.png" /></td>
																		</tr>
																	</table>
																	</td>
																</tr>
															</table>
															</td>
														</tr>
													</table>
													</td>
												</tr>
											</table>
											</td>
										</tr>
									</table>
									</td>
								</tr>
							</table>
							</td>
						</tr>
					</table>
					</td>
					<td width="191" valign="top">
					<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table5">
						<tr>
							<td valign="top" width="100%" style="height: 119px">
							<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/bot_logo2.jpg" /></td>
						</tr>
						<tr>
							<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table6">
								<tr>
									<td style="height: 2px" valign="top">
									<img border="0" src="<?php echo $mosConfig_live_site;?>/templates/jm_medical/images/top_right.png" /></td>
								</tr>
								<tr>
									<td valign="top" class="bac_right"><?php mosLoadModules ( 'right', -3 ); ?></td>
								</tr>
								</table>
							</td>
						</tr>
					</table>
					</td>
				</tr>
				</table>
			</td>
		</tr>
	</table>
</div>
</body>
</html>
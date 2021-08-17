<?php 
$bodyUserFollowEmailTemplate = <<<STARTEMAIL
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
<head>
	<!--[if gte mso 9]>
	<xml>
		<o:OfficeDocumentSettings>
		<o:AllowPNG/>
		<o:PixelsPerInch>96</o:PixelsPerInch>
		</o:OfficeDocumentSettings>
	</xml>
	<![endif]-->
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="format-detection" content="date=no" />
	<meta name="format-detection" content="address=no" />
	<meta name="format-detection" content="telephone=no" />
	<meta name="x-apple-disable-message-reformatting" />
    <!--[if !mso]><!-->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />
    <!--<![endif]-->
	<title>Email Template</title>
	<!--[if gte mso 9]>
	<style type="text/css" media="all">
		sup { font-size: 100% !important; }
	</style>
	<![endif]-->
	

	<style type="text/css" media="screen">
		/* Linked Styles */
		body { padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#f0f2f5; -webkit-text-size-adjust:none }
		a { color:#ffffff; text-decoration:none }
		p { padding:0 !important; margin:0 !important } 
		img { -ms-interpolation-mode: bicubic; /* Allow smoother rendering of resized image in Internet Explorer */ }
		.mcnPreviewText { display: none !important; }

				
		/* Mobile styles */
		@media only screen and (max-device-width: 480px), only screen and (max-width: 480px) {
			u + .body .gwfw { width:100% !important; width:100vw !important; }

			.m-shell { width: 100% !important; min-width: 100% !important; }
			
			.m-center { text-align: center !important; }
			
			.center { margin: 0 auto !important; }
			
			.td { width: 100% !important; min-width: 100% !important; }

			.m-br-15 { height: 15px !important; }
			.p10 { padding: 10px !important; }
			.p30-15 { padding: 30px 15px !important; }
			.p0-15-30 { padding: 0px 15px 30px 15px !important; }
			.pb25 { padding-bottom: 25px !important; }

			.text-button { padding: 10px !important; }

			.m-td,
			.m-hide { display: none !important; width: 0 !important; height: 0 !important; font-size: 0 !important; line-height: 0 !important; min-height: 0 !important; }

			.m-block { display: block !important; }

			.fluid-img img { width: 100% !important; max-width: 100% !important; height: auto !important; }

			.column,
			.column-top,
			.column-bottom { float: left !important; width: 100% !important; display: block !important; }


			.content-spacing { width: 15px !important; }
		}
	</style>
</head>
<body class="body" style="padding:0 !important; margin:0 !important; display:block !important; min-width:100% !important; width:100% !important; background:#f0f2f5; -webkit-text-size-adjust:none;">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f0f2f5" class="gwfw">
		<tr>
			<td align="center" valign="top" style="padding: 50px 10px;" class="p10">
				<table width="650" border="0" cellspacing="0" cellpadding="0" class="m-shell">
					<tr>
						<td class="td" bgcolor="#ffffff" style="border-radius: 12px; width:650px; min-width:650px; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
							<!-- Header -->
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td bgcolor="#d8dbdf" style="border-radius: 12px;">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<!-- Top Bar -->
											<tr>
												<td class="p30-15" style="padding: 20px 30px;">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td class="img" width="180" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="$siteLogoUrl" width="45" height="45" border="0" alt="" /></td>
															<td align="right">
																<table border="0" cellspacing="0" cellpadding="0">
																	<tr>
																		 
																	</tr>
																</table>
															</td>
														</tr>
													</table>
												</td>
											</tr>
											<!-- END Top Bar -->
											<!-- Person Info -->
											<tr>
												<td>
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<td bgcolor="#fab429" style="padding: 30px 30px 30px 50px; border-radius: 12px;" class="p30-15">
																<table width="100%" border="0" cellspacing="0" cellpadding="0">
																	<tr>
																		<td class="img" width="80" style="font-size:0pt; line-height:0pt; text-align:left;border-radius:50%;overflow:hidden;"><img src="$fuserAvatar" width="80" height="80" border="0" alt="" /></td>
																		<td class="content-spacing" width="30" style="font-size:0pt; line-height:0pt; text-align:left;"></td>
																		<td>
																			<table width="100%" border="0" cellspacing="0" cellpadding="0">
																				<tr>
																					<td class="h3" style="padding-bottom: 15px; color:#ffffff; font-family:'Raleway', Arial, sans-serif; font-size:22px; line-height:28px; text-align:left; font-weight:500;"><a href="$slugUrl" target="_blank">$lUserFullName</a></td>
																				</tr>
																				<tr>
																					<td class="h5" style="color:#ffffff; font-family:'Raleway', Arial, sans-serif; font-size:12px; line-height:16px; text-align:left; text-transform:uppercase;">$startedFollow</td>
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
											<!-- Person Info --> 
										</table>
									</td>
								</tr>
							</table>
							<!-- END Header --> 

							<!-- Footer -->
							<table width="100%" border="0" cellspacing="0" cellpadding="0">
								<tr>
									<td style="padding: 50px;" class="p30-15">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td style="padding-bottom: 32px;">
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<th class="column" width="170" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
																<table width="100%" border="0" cellspacing="0" cellpadding="0">
																	<tr>
																		<td class="img m-center" style="font-size:0pt; line-height:0pt; text-align:left;"><img src="$siteLogoUrl" width="45" height="45" border="0" alt="" /></td>
																	</tr>
																</table>
															</th>
															<th style="padding-bottom: 25px !important; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;" class="column" width="1"></th>
															<th class="column" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;">
																<table width="100%" border="0" cellspacing="0" cellpadding="0">
																	<tr>
																		<td align="right">
																			<table class="center" border="0" cellspacing="0" cellpadding="0">
                                                                                <tr>
                                                                                    <td class="img svg" width="25" style="font-size:0pt; line-height:0pt; text-align:left;padding:5px;"><a href="#" target="_blank">$facebookIcon</a></td>
                                                                                    <td class="img svg" width="25" style="font-size:0pt; line-height:0pt; text-align:left;padding:5px;"><a href="#" target="_blank">$twitterIcon</a></td>
                                                                                    <td class="img svg" width="25" style="font-size:0pt; line-height:0pt; text-align:left;padding:5px;"><a href="#" target="_blank">$instagramIcon</a></td>
                                                                                    <td class="img svg" width="25" style="font-size:0pt; line-height:0pt; text-align:left;padding:5px;"><a href="#" target="_blank">$linkedinIcon</a></td>
                                                                                </tr>
																			</table>
																		</td>
																	</tr>
																</table>
															</th>
														</tr>
													</table>
												</td>
											</tr>
											<tr>
												<td>
													<table width="100%" border="0" cellspacing="0" cellpadding="0">
														<tr>
															<th class="column-top" width="370" style="font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal; vertical-align:top;">
																<table width="100%" border="0" cellspacing="0" cellpadding="0">
																	<tr>
																		<td class="text-footer m-center" style="color:#889cbe; font-family:'Raleway', Arial, sans-serif; font-size:14px; line-height:28px; text-align:left; min-width:auto !important;">$businessAddress</td>
																	</tr>
																</table>
															</th>
															<th style="padding-bottom: 25px !important; font-size:0pt; line-height:0pt; padding:0; margin:0; font-weight:normal;" class="column" width="1"></th>
														</tr>
													</table>
												</td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
							<!-- END Footer -->
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>

STARTEMAIL;
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
	<title>{{ $user->first_name }} - Enrollment Confirmation</title>
</head>
<body>
	<!--[if mso]>
		<style type="text/css">
			
			.background_main, table, table td, p, div, h1, h2, h3, h4, h5, h6 {
				font-family: Arial, sans-serif !important;
			}
			
		</style>
	<![endif]-->

	<table width="100%" cellpadding="0" cellspacing="0" border="0" class="background_main" 
	       style="background-color: #ffffff; padding-top: 20px; color: #434245; width: 100%;">
		<tbody>
			<tr>
				<td valign="top" class="sm_full_width" style="margin: 0 auto; width: 600px; display: block;">
					<div class="sm_no_padding" style="margin: 0 auto; padding: 30px 0 40px; display: block; box-sizing: border-box;">
						<table style="width: 100%; color: #434245;" border="0" cellpadding="0" cellspacing="0">
							<tbody>
								<tr>
									<td style="box-sizing: border-box;">
										<table border="0" cellpadding="0" cellspacing="0">
											<tbody>
												<tr>
													<td>
														<!--[if mso]>
														<table cellpadding="0" cellspacing="0" border="0" style="padding: 0; margin: 0; width: 100%;">
															<tr>
																<td colspan="3" style="padding: 0; margin: 0; font-size: 20px; height: 20px;" height="20">&nbsp;</td>
															</tr>
															<tr>
																<td style="padding: 0; margin: 0;">&nbsp;</td>
																<td style="padding: 0; margin: 0;" width="540">
														<![endif]-->
														<img style="margin-left: 20px;" src="{{ env('APP_LOGO_300_64') }}">

														<h1 style="font-size: 30px; padding-right: 30px; padding-left: 30px;">Welcome To BTC Academy</h1>

														<p style="font-size: 17px; padding-right: 30px; padding-left: 30px;">
															Hi {{ $user->first_name }}, we would like to enroll you into being a part of something great! You are going to love it from here on. Lets get started by 
															<strong>activating your account.</strong> 
														</p>
														<!--[if mso]>
																</td>
																<td style="padding: 0; margin: 0;">&nbsp;</td>
															</tr>
															<tr>
																<td colspan="3" style="padding: 0; margin: 0; font-size: 20px; height: 20px;" height="20">&nbsp;</td>
															</tr>
														</table>
														<![endif]-->
														<!--[if mso]>
														<table cellpadding="0" cellspacing="0" border="0" style="padding: 0; margin: 0; width: 100%;">
															<tr>
																<td colspan="3" style="padding: 0; margin: 0; font-size: 20px; height: 20px;" height="20">&nbsp;</td>
															</tr>
															<tr>
																<td style="padding: 0; margin: 0;">&nbsp;</td>
																<td style="padding: 0; margin: 0;" width="540">
														<![endif]-->
														<div style="padding-right: 30px; padding-left: 30px; margin-bottom: 40px;">
															<a href="{{ env('APP_DOMAIN') }}/clients/activate/{{ $user->email }}/{{ $user->verifyToken }}" class="sm_auto_width sm_block button_link" 
															   style="min-width: 234px;border-radius: 0px;padding: 10px;background-color: #006230;font-size: 20px;color: #ffffff;display: inline-block;text-align: center;vertical-align: top;font-weight: 100;text-decoration: none!important;" target="_blank">
																Activate Account
															</a>
														</div>
														<!--[if mso]>
																</td>
																<td style="padding: 0; margin: 0;">&nbsp;</td>
															</tr>
															<tr>
																<td colspan="3" style="padding: 0; margin: 0; font-size: 20px; height: 20px;" height="20">&nbsp;</td>
															</tr>
														</table>
														<![endif]-->
														<!--[if mso]>
														<table cellpadding="0" cellspacing="0" border="0" style="padding: 0; margin: 0; width: 100%;">
															<tr>
																<td colspan="3" style="padding: 0; margin: 0; font-size: 20px; height: 20px;" height="20">&nbsp;</td>
															</tr>
															<tr>
																<td style="padding: 0; margin: 0;">&nbsp;</td>
																<td style="padding: 0; margin: 0;" width="540">
														<![endif]-->
														<div style="padding-right: 30px; padding-left: 30px;" class="sm_full_width sm_no_side_padding">
															<table border="0" cellpadding="0" cellspacing="0">
																<tbody>
																	<tr>
																		<td align="center" style="background-color: #F4F4F4;">
																			<img width="400" style="height: auto; display: block;" src="{{ env('AWS_URL') }}assets/icons/business_silhouettes_standing.jpg" alt="An illustration of a friendly bunch of sales people.">
																		</td>
																	</tr>
																</tbody>
															</table>
														</div>

														<!--[if mso]>
																</td>
																<td style="padding: 0; margin: 0;">&nbsp;</td>
															</tr>
															<tr>
																<td colspan="3" style="padding: 0; margin: 0; font-size: 20px; height: 20px;" height="20">&nbsp;</td>
															</tr>
														</table>
														<![endif]-->

														<table style="width: 100%;">
															<tbody>
																<tr>
																	<td style="box-sizing: border-box; padding: 0; padding-right: 30px; padding-left: 30px;">
																		<div style="color: #565759; text-align: left; width: 100%; font-size: 15px;">
																			<table border="0" cellpadding="0" cellspacing="0" style="display: inline-table; vertical-align: top; width: 100%;">
																				<tbody class="sm_full_width">
																					<tr class="sm_full_width">
																						<td class="sm_full_width" style="padding-top: 20px;">

																							<!--[if mso]>
																								<table cellpadding="0" cellspacing="0" border="0" style="padding: 0; margin: 0; width: 100%;">
																									<tr>
																										<td colspan="3" style="padding: 0; margin: 0; font-size: 20px; height: 20px;" height="20">&nbsp;</td>
																									</tr>
																									<tr>
																										<td style="padding: 0; margin: 0;">&nbsp;</td>
																										<td style="padding: 0; margin: 0;" width="540">
																							<![endif]-->

																								<table border="0" cellpadding="0" cellspacing="0" width="434" class="sm_full_width" style="display: inline-table; width: 434px; max-width: 100%;">
																									<tbody>
																										<tr>
																											<td width="38" style="width: 38px; padding-right: 15px; padding-top: 20px;">
																												<a href="/signin" style="margin: 6px 0 15px; display: block;" target="_blank">
																													<img alt="" src="{{ env('APP_LOGO_300_64') }}" style="height: 48px;">
																												</a>
																											</td>
																											<td width="378" class="sm_auto_width" style="padding-top: 0px; font-size: 15px;">
																												<br>
																												Support Email: {{ env('APP_EMAIL_SUPPORT') }}
																											</td>
																										</tr>
																									</tbody>
																								</table>

																							<div style="clear: both;"></div>

																							<!--[if mso]>
																									</td>
																									<td style="padding: 0; margin: 0;">&nbsp;</td>
																								</tr>
																								<tr>
																									<td colspan="3" style="padding: 0; margin: 0; font-size: 20px; height: 20px;" height="20">&nbsp;</td>
																								</tr>
																							</table>
																							<![endif]-->	

																						</td>
																					</tr>
																				</tbody>
																			</table>
																		</div>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</body>

</html>
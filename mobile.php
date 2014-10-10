<?php
include "blocks/function.php";
$actual_link = "$_SERVER[REQUEST_URI]";
$lang = true;
if (strpos($actual_link, 'de') !== false) {
	$lang = true;
} else {
	$lang = false;
}
$xml = loadFromXML();
@$app = $_POST['dir'] ? $_POST['dir'] : "";
?>
<!DOCTYPE html>

<html>
	<head>
		<title>Kosten für eine App schätzen</title>
		<meta name="Description" content="Jetzt herausfinden, was die Entwicklung einer App Webseite kostet!">

		<meta charset="utf8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
		<link rel="stylesheet" type="text/css" href="css/estimator.css" />
		<!-- scripts -->
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/jquery.validate.js" type="text/javascript"></script>
		<script type="text/javascript">
			var pth = parseInt('<?php echo $xml->price; ?>');
			$().ready(function() {
				// validate signup form on keyup and submit
				$("#submitForm").validate({
					rules: {
						ClientName: {
							required: true,
						},
						EMAIL: {
							required: true,
							email: true
						},
						mess: {
							required: true,
						}
					},
					messages: {
						ClientName: "Ihr Name",
						EMAIL: "Ihre E-Mail Adresse",
						mess: "Ihre Nachricht an uns",
					},
					submitHandler: function() {
						$.ajax({
							type: "POST",
							url: "estimate.php",
							data: $("#submitForm").serialize(),
							beforeSend: function() {
								$('#result').html('<img src="img/ajax_loader.gif" />');
							},
							success: function() {
								setTimeout(function() {
									$('#result').html("Wir haben Ihre Nachricht erhalten!");
								}, 3000)
							}
						});
					}
				});
			});
		</script>
		<script>
			var time = 0;
			var wtime = 0;
			setInterval(function() {
				time++;
				wtime++;
			}, 1000);

			$(document).click(function() {
				//console.log(time);
				time = 0;
			});
		</script>
		<script>
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-52113605-1']);
			_gaq.push(['_trackPageview']);

			(function() {
				var ga = document.createElement('script');
				ga.type = 'text/javascript';
				ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0];
				s.parentNode.insertBefore(ga, s);
			})();


			(function(i, s, o, g, r, a, m) {
				i['GoogleAnalyticsObject'] = r;
				i[r] = i[r] || function() {

					(i[r].q = i[r].q || []).push(arguments)
				}, i[r].l = 1 * new Date();
				a = s.createElement(o),
						m = s.getElementsByTagName(o)[0];
				a.async = 1;
				a.src = g;
				m.parentNode.insertBefore(a, m)

			})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');



			ga('create', 'UA-52113605-1', 'auto');

			ga('send', 'pageview');
		</script>
	</head>

	<body class="no-underline">
		<div class="table-wrapper">
			<div class="logo-winify">
				<a href="/<?php if(!$lang){?>en<?php }?>" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'C2WinifyHome', wtime]);"><img src="img/sur.1.png"></a>
			</div>
			<div class="cell-wrapper">

				<div class="entry js-entry" id="start">
					<div class="wrapper featured">
						<!-- First page start-->

						<!-- First page end -->
					</div> <!-- close .wrapper -->
				</div> <!-- close .js-entry -->


				<!-- bar $$ estimate start!-->
				<div class="fluid-container">
					<div class="entry">
						<div class="wrapper">
							<div id="output" style="display: none;">
								<div class="progress progress-success">
									<!---<h3 class="js-average heading">&euro; <span>0</span></h3>--->
									<div class="bar js-bar" style="width: 0%;"></div>
								</div> <!-- close .progress .progress-success -->
							</div> <!-- close #output -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->
				</div> <!-- close .wrapper -->
				<!-- bar $$ estimate estimate!-->



				<!-- QUESTION 1 -->
				<div class="js-question">	
					<div class="entry js-entry" data-method="type" data-description="<?php echo $xml->type->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->type->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span2">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M1iOS', time]);">
										<div>
											<div class="flip-container" data-value="<?php echo $xml->type->answer1->desc; ?>" data-constant="<?php echo $xml->type->answer1->hour; ?>" >
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/ios-icon.png" class="front" alt="Build an iPhone app">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->type->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span2">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M1Android', time]);">
										<div>
											<div class="flip-container" data-value="<?php echo $xml->type->answer2->desc; ?>" data-constant="<?php echo $xml->type->answer2->hour; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/android-icon.png" class="front" alt="Build an iPad app">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->type->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span2">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M1Win', time]);">
										<div>
											<div class="flip-container" data-value="<?php echo $xml->type->answer3->desc; ?>" data-constant="<?php echo $xml->type->answer3->hour; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/windows-phone-icon.png" class="front" alt="Build an iOS app">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->type->answer3->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span2">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M1iOS+Android', time]);">
										<div>
											<div class="flip-container" data-value="<?php echo $xml->type->answer4->desc; ?>" data-constant="<?php echo $xml->type->answer4->hour; ?>" data-multiplier="<?php echo $xml->type->answer4->percent; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/ios+android-icon.png" class="front" alt="Build an Android app">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->type->answer4->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span2">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M1iOS+Android+Win', time]);">
										<div>
											<div class="flip-container" data-value="<?php echo $xml->type->answer5->desc; ?>" data-constant="<?php echo $xml->type->answer5->hour; ?>" data-multiplier="<?php echo $xml->type->answer5->percent; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/ios+adroid+win-icon.png" class="front" alt="Build an Android app">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->type->answer5->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

					<!-- QUESTION: DEVICE -->
					<div class="entry js-entry" data-method="device" data-description="<?php echo $xml->device->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->device->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M2HandyOptimized', time]);">
										<div>
											<div class="flip-container" data-value="<?php echo $xml->device->answer1->desc; ?>" data-constant="0">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/iphone-icon.png" class="front" alt="Stock/Default interface">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->device->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M2TabletOptimized', time]);">
										<div>
											<div class="flip-container" data-value="<?php echo $xml->device->answer2->desc; ?>" data-constant="0">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/ipad-icon.png" class="front" alt="New Custom interface">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->device->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M2BothOptimized', time]);">
										<div>
											<div class="flip-container getPercent" data-both="<?php echo $xml->device->answer3->percent; ?>" data-value="<?php echo $xml->device->answer3->desc; ?>" data-constant="0">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/both-icon.png" class="front" alt="Match interface with existing brand">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->device->answer3->name; ?></h2>
											</div>
										</div>
									</a>
								</div>

							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->


					<!-- QUESTION: INTERFACE -->
					<div class="entry js-entry" data-method="interface" data-description="<?php echo $xml->interface->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->interface->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M3StandardOSLook', time]);">
										<div>
											<div class="flip-container addPercent" data-constant="<?php echo $xml->interface->answer1->hour; ?>" data-value="<?php echo $xml->interface->answer1->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/stock-interface-icon.png" class="front" alt="Stock/Default interface">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->interface->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M3CustomOSLook', time]);">
										<div>
											<div class="flip-container addPercent" data-constant="<?php echo $xml->interface->answer2->hour; ?>" data-value="<?php echo $xml->interface->answer2->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/custom-new-interface-icon.png" class="front" alt="New Custom interface">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->interface->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M3NotSureOSLook', time]);">
										<div>
											<div class="flip-container addPercent" data-constant="<?php echo $xml->interface->answer3->hour; ?>" data-value="<?php echo $xml->interface->answer3->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/idk-interface-icon.png" class="front" alt="Match interface with existing brand">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->interface->answer3->name; ?></h2>
											</div>
										</div>
									</a>
								</div>

							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

					<!-- QUESTION -->
					<div class="entry js-entry" data-method="login" data-description="<?php echo $xml->login->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->login->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span3">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M4wSocialLogin', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->login->answer1->hour; ?>" data-value="<?php echo $xml->login->answer1->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/social-login-icon.png" class="front" alt="Include a social and email login system">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->login->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span3">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M4E-mailLogin', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->login->answer2->hour; ?>" data-value="<?php echo $xml->login->answer2->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/email-login-icon.png" class="front" alt="Include just an email login">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->login->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span3" id="noLogin">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M4NoLLogin', time]);">
										<div>
											<div class="flip-container"  data-constant="<?php echo $xml->login->answer3->hour; ?>" data-value="<?php echo $xml->login->answer3->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/no.png" class="front" alt="Don't include any login system">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->login->answer3->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span3">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M4NotSureLogin', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->login->answer4->hour; ?>" data-value="<?php echo $xml->login->answer4->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/idk.png" class="front" alt="I don't know if I need a login system">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->login->answer4->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

					<!-- QUESTION: IN-APP PAYMENTS -->
					<div class="entry js-entry" data-method="payments" data-description="<?php echo $xml->payments->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->payments->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M5wPayments', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->payments->answer1->hour; ?>" data-value="<?php echo $xml->payments->answer1->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/payments-icon.png" class="front" alt="Include in-app payments">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->payments->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M5NoPayments', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->payments->answer2->hour; ?>" data-value="<?php echo $xml->payments->answer2->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/no.png" class="front" alt="Don't include in-app payments">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->payments->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M5NotSurePayments', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->payments->answer3->hour; ?>" data-value="<?php echo $xml->payments->answer3->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/idk.png" class="front" alt="We might need in-app payments">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->payments->answer3->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

					<!-- QUESTION -->
					<div class="entry js-entry no-login" data-method="sync" data-description="<?php echo $xml->sync->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->sync->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M6wSync', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->sync->answer1->hour; ?>" data-value="<?php echo $xml->sync->answer1->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/sync-icon.png" class="front" alt="Include device syncing">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->sync->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M6NoSync', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->sync->answer2->hour; ?>" data-value="<?php echo $xml->sync->answer2->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/no.png" class="front" alt="Don't include device syncing">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->sync->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M6NotSureSync', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->sync->answer3->hour; ?>" data-value="<?php echo $xml->sync->answer3->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/idk.png" class="front" alt="I don't know if I need device syncing">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->sync->answer3->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

					<!-- QUESTION: RATINGS/REVIEWS -->
					<div class="entry js-entry no-login" data-method="ratings" data-description="<?php echo $xml->rate->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->rate->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M7wRating', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->rate->answer1->hour; ?>" data-value="<?php echo $xml->rate->answer1->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/ratings-icon.png" class="front" alt="Include user ratings or reviews">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->rate->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M7NoRating', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->rate->answer2->hour; ?>" data-value="<?php echo $xml->rate->answer2->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/no.png" class="front" alt="Don't include user ratings or reviews">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->rate->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>

								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M7NotSureRating', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->rate->answer3->hour; ?>" data-value="<?php echo $xml->rate->answer3->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/idk.png" class="front" alt="I don't know if I need user ratings or reviews">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->rate->answer3->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

					<!-- QUESTION: USER PROFILES -->
					<div class="entry js-entry no-login" data-method="profiles" data-description="<?php echo $xml->profiles->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->profiles->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">

								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M8wProfiles', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->profiles->answer1->hour; ?>" data-value="<?php echo $xml->profiles->answer1->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/profile-icon.png" class="front" alt="Include user profiles">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->profiles->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>

								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M8NoProfiles', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->profiles->answer2->hour; ?>" data-value="<?php echo $xml->profiles->answer2->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/no.png" class="front" alt="Don't include user profiles">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->profiles->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>

								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M8NotSureProfiles', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->profiles->answer3->hour; ?>" data-value="<?php echo $xml->profiles->answer3->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/idk.png" class="front" alt="I don't know if I need user profiles">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->profiles->answer3->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->
					<!-- QUESTION -->
					<div class="entry js-entry" data-method="design" data-description="<?php echo $xml->design->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->graphics->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span6">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M9wDesign', time]);">
										<div>
											<div class="flip-container addPercent" data-constant="<?php echo $xml->graphics->answer1->hour; ?>" data-value="<?php echo $xml->graphics->answer1->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/design-icon.png" class="front" alt="Include graphic design">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->design->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span6">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M9NoDesign', time]);">
										<div>
											<div class="flip-container addPercent" data-constant="<?php echo $xml->graphics->answer2->hour; ?>" data-value="<?php echo $xml->graphics->answer2->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/no.png" class="front" alt="Don't include graphic design">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->graphics->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>

							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

					<!-- PROGRESS QUESTION -->		
					<div class="entry js-entry" data-method="progress" data-description="<?php echo $xml->project->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->project->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span4">
									<a href="#" <?php
									if ($app == "web") {
										echo "class='final-question'";
									}
									?>  onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M10Idea', time]);">
										<div>
											<div class="flip-container" data-value="<?php echo $xml->project->answer1->desc; ?>" data-multiplier="<?php echo $xml->project->answer1->percent; ?>" data-constant="0" data-percent="<?php echo $xml->project->answer1->percent; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/idea-icon.png" class="front" alt="The idea stage">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->project->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" <?php
									if ($app == "web") {
										echo "class='final-question'";
									}
									?>  onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M10Sketch', time]);">
										<div>
											<div class="flip-container" data-value="<?php echo $xml->project->answer2->desc; ?>" data-multiplier="<?php echo $xml->project->answer2->percent; ?>" data-constant="0" data-percent="<?php echo $xml->project->answer2->percent; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/sketches-icon.png" class="front" alt="The sketches stage">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->project->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" <?php
									if ($app == "web") {
										echo "class='final-question'";
									}
									?> onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M10Prototype', time]);">
										<div>
											<div class="flip-container" data-value="<?php echo $xml->project->answer3->desc; ?>" data-multiplier="<?php echo $xml->project->answer3->percent; ?>" data-constant="0" data-percent="<?php echo $xml->project->answer3->percent; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/development-icon.png" class="front" alt="The in-development stage">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->project->answer3->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

<?php if (!$app == "web") { ?>
						<!-- QUESTION: INTEGRATED/STANDALONE -->
						<div class="entry js-entry" data-method="integration" data-description="<?php echo $xml->website->description; ?>" style="display: none;">
							<div class="wrapper">
								<div class="row-fluid">
									<div class="centered">
										<h1 class="heading"><?php echo $xml->website->title; ?></h1>
									</div>
								</div> <!-- close .row-fluid -->
								<div class="row-fluid">
									<div class="span4">
										<a href="#" id="websiteProject" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M11wSite', time]);">
											<div>
												<div class="flip-container" data-value="<?php echo $xml->website->answer1->desc; ?>">
													<div class="flipper">
														<img src="img/check.png" class="empty-image">
														<img src="img/integrated-icon.png" class="front" alt="Integrate app with a website">
														<img src="img/check.png" class="back" alt="Selected!">
													</div> <!-- close .flipper -->
												</div> <!-- close .flip-container -->
												<div class="centered">
													<h2><?php echo $xml->website->answer1->name; ?></h2>
												</div>
											</div>
										</a>
									</div>
									<div class="span4">
										<a href="#" class='final-question' onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M11NoSite', time]);">
											<div>
												<div class="flip-container"  data-constant="<?php echo $xml->website->answer2->hour; ?>" data-value="<?php echo $xml->website->answer2->desc; ?>">
													<div class="flipper">
														<img src="img/check.png" class="empty-image">
														<img src="img/no.png" class="front" alt="Standalone app">
														<img src="img/check.png" class="back" alt="Selected!">
													</div> <!-- close .flipper -->
												</div> <!-- close .flip-container -->
												<div class="centered">
													<h2><?php echo $xml->website->answer2->name; ?></h2>
												</div>
											</div>
										</a>
									</div>
									<div class="span4">
										<a href="#" class='final-question' onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'M11NotSureSite', time]);">
											<div>
												<div class="flip-container" data-constant="<?php echo $xml->website->answer3->hour; ?>" data-value="<?php echo $xml->website->answer3->desc; ?>">
													<div class="flipper">
														<img src="img/check.png" class="empty-image">
														<img src="img/idk.png" class="front" alt="I don't know if my app needs to be integrated with a website">
														<img src="img/check.png" class="back" alt="Selected!">
													</div> <!-- close .flipper -->
												</div> <!-- close .flip-container -->
												<div class="centered">
													<h2><?php echo $xml->website->answer3->name; ?></h2>
												</div>
											</div>
										</a>
									</div>
								</div> <!-- close .row-fluid -->
							</div> <!-- close .wrapper -->
						</div> <!-- close .entry -->
<?php } ?>

					<!-- QUESTION -->
					<div class="entry js-entry-final" style="display: none;">
						<div class="wrapper">
							<div id="estimate">
								<div class="invoice well">
									<div class="head-winify">
										<a href="/<?php if(!$lang){?>en<?php }?>" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'C3WinifyHomeHd', time]);"><img src="img/winify-color.png"></a>
										<hr>
									</div>
<?php
if ($app == "web") {
	require_once("before.php");
}
?>
									<div class="clearfix first-line">
										<h1 class="heading weight-bold"><?php if($lang){ ?>Unsere Kostenschätzung für Ihr Projekt <?php }else{ ?>OUR ESTIMATE FOR YOUR PROJECT <?php }?>- Mobile Application</h1>
										<!-- <a href="#" class="btn btn-small btn-primary" id="share" title="Share your estimate and scope with a friend">Share</a> -->
									</div> <!-- close .clearfix -->
									<ul class="unstyled js-scope">
										<li class="clearfix">
											<div class="image">
												<img src="img/holder.png">
											</div> <!-- close .image -->
											<div class="text">
												<p>Projects</p>
												<span>desc</span>
											</div> <!-- close .text -->
										</li>
									</ul>
									<hr>
									<h1 class="descriptor"><?php if($lang){ ?>Geschätzte Kosten:<?php }else{ ?>ESTIMATED COSTS:<?php }?></h1>
									<h1 class="total">&euro;<span class="data">1000</span><span class="label-price"></span></h1>
									<br>							

									<div class="result-block">
										<?php if($lang){ ?><img src="img/bg-result.png" alt="text"><?php }else{ ?><img src="img/kontaktieren.png" alt=""/><?php }?>
									</div>
									<div class="helper" id="result">
										<form action="" method="post" id="submitForm"  onsubmit='return false;' name="mc-embedded-subscribe-form" class="validate subscribe-form">
											<?php echo isset($_POST['features']) ? "<input type='hidden' name='before' value='$_POST[type]/-/$_POST[features]'>" : ""; ?>
											<?php echo isset($_POST['features']) ? "<input type='hidden' name='beforeDesc' value='$_POST[description]/-/$_POST[descriptions]'>" : ""; ?>
											<?php echo isset($_POST['features']) ? "<input type='hidden' name='obudget' value='$_POST[budget]'>" : ""; ?>
											<input type="hidden" value="1" name="type">
											<input type="hidden" value="sendMail" name="send">
											<input type="text" value="" name="ClientName" class="required inputtext"  placeholder="<?php if($lang){ ?>Ihr Name<?php }else{ ?>Name<?php }?>">
											<input type="text" value="" name="EMAIL" class="required email"  placeholder="<?php if($lang){ ?>Ihre E-Mail Adresse<?php }else{ ?>Email<?php }?>">
											<textarea name="mess" placeholder="<?php if($lang){ ?>Ihre Nachricht an uns.<?php }else{ ?>Message<?php }?>"></textarea>
											<button type="submit" href="#" class="btn btn-block btn-danger" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'C3CalcSubmit', time]);"><?php if($lang){ ?>Absenden<?php }else{ ?>SUBMIT YOUR PROJECT<?php }?></button>
										</form>
									</div> <!-- close .helper -->
									<p class="light" style="margin-top: 10px; margin-bottom: 0; text-align: right; font-size: 12px; font-style: italic;"><a href="index.php"><?php if($lang){ ?>Noch einmal / Ein anderes Projekt durchrechnen<?php }else{ ?>Estimate another project<?php }?></a></p>
									<br>
									<div class="foot-winify">
										<a href="/<?php if(!$lang){?>en<?php }?>" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'C3WinifyHomeFt', time]);"><img src="img/winify-color.png"></a>
									</div>
									<div class="contact">
										<p><strong><?php if($lang){ ?>Kontakt:<?php }else{ ?>Contact:<?php }?></strong></p>
										<p>+41 41 511 2684 (Schweiz)</p>
										<p>+49 177 88 458 12 (Deutschland)</p>
									</div>
									<div class="clearfix"></div>
								</div> <!-- close .invoice -->
							</div> <!-- close #estimate -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->
				</div> <!-- close .js-question -->
			</div> <!-- close .cell -->
		</div> <!-- close .table -->

		<script src="js/estimator-build.min.js"></script>
		<script src="js/estimator.js"></script>

		<!-- Segment.io analytics -->
		<script>
											$("#noLogin").click(function() {
												$(".no-login").empty();
												$(".no-login").removeClass("entry js-entry");
												numView += 3;
											});

											$(".getPercent").click(function() {
												var p = $(".getPercent").attr("data-both");

												$(".addPercent").each(function() {
													$(this).attr("data-constant", $(this).attr("data-constant") * p);
												});

											});
		</script>

		<script>
			jQuery(function($) {
				var cache = {
					start: $('#js-estimate-start'),
					submit: $('#submit'),
					finalQuestion: $('.final-question')
				};




			});
		</script>

	</body>

</html>

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
		<title>Kosten für eine Webseite schätzen</title>
		<meta name="Description" content="Mit dem Projektrechner in nur wenigen Minuten herausfinden, was ihre Website kosten wird!">
		<meta charset="utf8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
		<link rel="stylesheet" type="text/css" href="css/estimator.css" />
		<!-- scripts -->
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/jquery.validate.js" type="text/javascript"></script>
		<script type="text/javascript">
			var pth = parseInt('<?php echo $xml->price; ?>');
			var textMessage = <?php if($lang){ ?>"Wir haben Ihre Nachricht erhalten!";<?php }else{ ?>"Thanks, We have received your message! We will reply promptly with the result.";<?php }?>
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
						}
					},
					messages: {
						ClientName: "Ihr Name",
						EMAIL: "Ihre E-Mail Adresse",
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
									$('#result').html();
									$('.message-block').html(textMessage);
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
									<!--<h3 class="js-average heading">&euro;<span>0</span></h3>--->
									<div class="bar js-bar" style="width: 0%;"></div>
								</div> <!-- close .progress .progress-success -->
							</div> <!-- close #output -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->
				</div> <!-- close .wrapper -->
				<!-- bar $$ estimate estimate!-->

				<!-- QUESTION 1 -->
				<div class="js-question">	
					<div class="entry js-entry" data-method="wtype" data-description="<?php echo $xml->wtype->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->wtype->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="row">
									<div class="span2">
										<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W1Informational', time]);">
											<div>
												<div class="flip-container" data-value="<?php echo $xml->wtype->answer1->desc; ?>" data-constant="<?php echo $xml->wtype->answer1->hour; ?>">
													<div class="flipper">
														<img src="img/check.png" class="empty-image">
														<img src="img/informational-icon.png" class="front" alt="Build an informational website">
														<img src="img/check.png" class="back" alt="Selected!">
													</div> <!-- close .flipper -->
												</div> <!-- close .flip-container -->
												<div class="centered">
													<h2><?php echo $xml->wtype->answer1->name; ?></h2>
												</div>
											</div>
										</a>
									</div>
									<div class="span2">
										<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W1E-commerce', time]);">
											<div>
												<div class="flip-container" data-value="<?php echo $xml->wtype->answer4->desc; ?>" data-constant="<?php echo $xml->wtype->answer4->hour; ?>">
													<div class="flipper">
														<img src="img/check.png" class="empty-image">
														<img src="img/commerce-icon.png" class="front" alt="Build an commerce website">
														<img src="img/check.png" class="back" alt="Selected!">
													</div> <!-- close .flipper -->
												</div> <!-- close .flip-container -->
												<div class="centered">
													<h2><?php echo $xml->wtype->answer4->name; ?></h2>
												</div>
											</div>
										</a>
									</div>
									<div class="span2">
										<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W1Social', time]);">
											<div>
												<div class="flip-container" data-value="<?php echo $xml->wtype->answer2->desc; ?>" data-constant="<?php echo $xml->wtype->answer2->hour; ?>">
													<div class="flipper">
														<img src="img/check.png" class="empty-image">
														<img src="img/comunity-icon.png" class="front" alt="Build an community website">
														<img src="img/check.png" class="back" alt="Selected!">
													</div> <!-- close .flipper -->
												</div> <!-- close .flip-container -->
												<div class="centered">
													<h2><?php echo $xml->wtype->answer2->name; ?></h2>
												</div>
											</div>
										</a>
									</div>
									<div class="span2">
										<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W1Portal', time]);">
											<div>
												<div class="flip-container" data-value="<?php echo $xml->wtype->answer3->desc; ?>" data-constant="<?php echo $xml->wtype->answer3->hour; ?>">
													<div class="flipper">
														<img src="img/check.png" class="empty-image">
														<img src="img/business-icon.png" class="front" alt="Build an business website">
														<img src="img/check.png" class="back" alt="Selected!">
													</div> <!-- close .flipper -->
												</div> <!-- close .flip-container -->
												<div class="centered">
													<h2><?php echo $xml->wtype->answer3->name; ?></h2>
												</div>
											</div>
										</a>
									</div>						
									<div class="span2">
										<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W1Other', time]);">
											<div>
												<div class="flip-container" data-value="<?php echo $xml->wtype->answer5->desc; ?>" data-constant="<?php echo $xml->wtype->answer5->hour; ?>">
													<div class="flipper">
														<img src="img/check.png" class="empty-image">
														<img src="img/other-icon.png" class="front" alt="Build an other website">
														<img src="img/check.png" class="back" alt="Selected!">
													</div> <!-- close .flipper -->
												</div> <!-- close .flip-container -->
												<div class="centered">
													<h2><?php echo $xml->wtype->answer5->name; ?></h2>
												</div>
											</div>
										</a>
									</div>
								</div>
								<div class="row-fluid">
									<div class="span2">
										<div class="descrip">
											<?php if($lang){ ?>
												<p>Ein Internet Auftritt mit Multimedia Funktionalitäten.</p>
											<?php }else{ ?>
												<p>An internet presence with multimedia features.</p>
											<?php }?>
										</div>
									</div>
									<div class="span2">
										<div class="descrip">
											<?php if($lang){ ?>
												<p>Eine Webseite, auf der das Kaufen und Verkaufen von digitalen und physischen Waren möglich ist. User Management und Bezahlmöglichkeiten sind enthalten.</p>
											<?php }else{ ?>
												<p>A website where you can buy and sell digital as well as physical goods. User management and payment options are included.</p>
											<?php }?>
										</div>
									</div>
									<div class="span2">
										<div class="descrip">
											<?php if($lang){ ?>
												<p>Eine dynamische Webseite, die verschiedene Möglichkeiten bietet, mit dem User zu interagieren. User können Kundenkonten anlegen und untereinander in Kontakt treten.</p>
											<?php }else{ ?>
												<p>A dynamic website which allows you to interact with the users. Users can create their own accounts and contact each other.</p>
											<?php }?>
										</div>
									</div>
									<div class="span2">
										<div class="descrip">
											<?php if($lang){ ?>
												<p>Ein Web Portal mit umfangreichen dynamischen Elementen. User Management und Bezahlmöglichkeiten sind enthalten.</p>
											<?php }else{ ?>
												<p>A web portal with numerous dynamic elements. User management and payment options are included.</p>
											<?php }?>
											
										</div>
									</div>						
									<div class="span2">
										<div class="descrip">
											<?php if($lang){ ?>
												<p>Ich habe etwas ganz anderes vor oder würde gerne Teile der genannten Möglichkeiten mischen.</p>
											<?php }else{ ?>
												<p>I have something completely different in mind and would like to merge some of the mentioned options.</p>
											<?php }?>
										</div>
									</div>
								</div>
							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

					<!-- QUESTION: BASED -->
					<div class="entry js-entry" data-method="based" data-description="<?php echo $xml->based->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->based->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W2wCMS', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->based->answer1->hour; ?>" data-value="<?php echo $xml->based->answer1->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/cms-icon.png" class="front" alt="Based CMS">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->based->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W2customCMS', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->based->answer2->hour; ?>" data-value="<?php echo $xml->based->answer2->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/custom-new-interface-icon.png" class="front" alt="Yes">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->based->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W2NotSureCMS', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->based->answer3->hour; ?>" data-value="<?php echo $xml->based->answer3->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/idk.png" class="front" alt="IDK">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->based->answer3->name; ?></h2>
											</div>
										</div>
									</a>
								</div>

							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

					<!-- QUESTION -->
					<div class="entry js-entry" data-method="languages" data-description="<?php echo $xml->languages->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->languages->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W3Lang1', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->languages->answer1->hour; ?>" data-value="<?php echo $xml->languages->answer1->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/lang-icon.png" class="front" alt="Include a 1 language">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->languages->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W3Lang2', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->languages->answer2->hour; ?>" data-value="<?php echo $xml->languages->answer2->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/2-lang-icon.png" class="front" alt="Include 2-3 languages">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->languages->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W3Lang3+', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->languages->answer3->hour; ?>" data-value="<?php echo $xml->languages->answer3->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/more-lang-icon.png" class="front" alt="Include more languages">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->languages->answer3->name; ?></h2>
											</div>
										</div>
									</a>
								</div>

							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

					<!-- QUESTION: IN-APP PAYMENTS -->
					<div class="entry js-entry" data-method="responsive" data-description="<?php echo $xml->responsive->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->responsive->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W4MobileResponsive', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->responsive->answer1->hour; ?>" data-value="<?php echo $xml->responsive->answer1->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/responsive-icon.png" class="front" alt="Responsive website">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->responsive->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W4NotMobileResponsive', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->responsive->answer2->hour; ?>" data-value="<?php echo $xml->responsive->answer2->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/no.png" class="front" alt="Don't responsive website">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->responsive->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W4NotSureResponsive', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->responsive->answer3->hour; ?>" data-value="<?php echo $xml->responsive->answer3->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/idk.png" class="front" alt="IDK">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->responsive->answer3->name; ?></h2>
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
									<h1 class="heading"><?php echo $xml->design->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span6">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W5wDesign', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->design->answer1->hour; ?>" data-value="<?php echo $xml->design->answer1->desc; ?>">
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
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W5NotDesign', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->design->answer2->hour; ?>" data-value="<?php echo $xml->design->answer2->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/no.png" class="front" alt="Don't include graphic design">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->design->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>

							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

					<!-- QUESTION: RATINGS/REVIEWS -->
					<div class="entry js-entry" data-method="marketing" data-description="<?php echo $xml->marketing->description; ?>" style="display: none;" >
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->marketing->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W6YesSEOSEM', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->marketing->answer1->hour; ?>" data-value="<?php echo $xml->marketing->answer1->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/seo-icon.png" class="front" alt="Include SEO promotion">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->marketing->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W6NoSEOSEM', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->marketing->answer2->hour; ?>" data-value="<?php echo $xml->marketing->answer2->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/no.png" class="front" alt="Don't include SEO promotion">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->marketing->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>

								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W6NotSureSEO', time]);">
										<div>
											<div class="flip-container" data-constant="<?php echo $xml->marketing->answer3->hour; ?>" data-value="<?php echo $xml->marketing->answer3->desc; ?>">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/idk.png" class="front" alt="I don't know if I need SEO promotion">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->marketing->answer3->name; ?></h2>
											</div>
										</div>
									</a>
								</div>
							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

					<!-- QUESTION: -->
					<div class="entry js-entry" data-method="wproject" data-description="<?php echo $xml->wproject->description; ?>" style="display: none;">
						<div class="wrapper">
							<div class="row-fluid">
								<div class="centered">
									<h1 class="heading"><?php echo $xml->wproject->title; ?></h1>
								</div>
							</div> <!-- close .row-fluid -->
							<div class="row-fluid">

								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W7Idea', time]);">
										<div>
											<div class="flip-container" data-percent="<?php echo $xml->wproject->answer1->percent; ?>" data-multiplier="<?php echo $xml->wproject->answer1->percent; ?>" data-value="<?php echo $xml->wproject->answer1->desc; ?>" data-constant="0">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/idea-icon.png" class="front" alt="Idea">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->wproject->answer1->name; ?></h2>
											</div>
										</div>
									</a>
								</div>

								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W7Sketch', time]);">
										<div>
											<div class="flip-container" data-percent="<?php echo $xml->wproject->answer2->percent; ?>" data-multiplier="<?php echo $xml->wproject->answer2->percent; ?>" data-value="<?php echo $xml->wproject->answer2->desc; ?>" data-constant="0">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/sketches-icon.png" class="front" alt="Sketches">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->wproject->answer2->name; ?></h2>
											</div>
										</div>
									</a>
								</div>

								<div class="span4">
									<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W7Development', time]);">
										<div>
											<div class="flip-container" data-percent="<?php echo $xml->wproject->answer3->percent; ?>" data-multiplier="<?php echo $xml->wproject->answer3->percent; ?>" data-value="<?php echo $xml->wproject->answer3->desc; ?>" data-constant="0">
												<div class="flipper">
													<img src="img/check.png" class="empty-image">
													<img src="img/development-icon.png" class="front" alt="Development">
													<img src="img/check.png" class="back" alt="Selected!">
												</div> <!-- close .flipper -->
											</div> <!-- close .flip-container -->
											<div class="centered">
												<h2><?php echo $xml->wproject->answer3->name; ?></h2>
											</div>
										</div>
									</a>
								</div>

							</div> <!-- close .row-fluid -->
						</div> <!-- close .wrapper -->
					</div> <!-- close .entry -->

					<?php if (!$app == "app") { ?>
						<!-- QUESTION: INTEGRATED/STANDALONE -->
						<div class="entry js-entry" data-method="app" data-description="<?php echo $xml->app->description; ?>" style="display: none;">
							<div class="wrapper">
								<div class="row-fluid">
									<div class="centered">
										<h1 class="heading"><?php echo $xml->app->title; ?></h1>
									</div>
								</div> <!-- close .row-fluid -->
								<div class="row-fluid">
									<div class="span4">
										<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W8wMobApp', time]);">
											<div>
												<div class="flip-container" data-value="<?php echo $xml->app->answer1->desc; ?>." data-constant="0">
													<div class="flipper">
														<img src="img/check.png" class="empty-image">
														<img src="img/integrated-icon.png" class="front" alt="Integrate app with a website">
														<img src="img/check.png" class="back" alt="Selected!">
													</div> <!-- close .flipper -->
												</div> <!-- close .flip-container -->
												<div class="centered">
													<h2><?php echo $xml->app->answer1->name; ?></h2>
												</div>
											</div>
										</a>
									</div>
									<div class="span4">
										<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W8NoMobApp', time]);">
											<div>
												<div class="flip-container" data-value="<?php echo $xml->app->answer2->desc; ?>" data-constant="0">
													<div class="flipper">
														<img src="img/check.png" class="empty-image">
														<img src="img/no.png" class="front" alt="Standalone app">
														<img src="img/check.png" class="back" alt="Selected!">
													</div> <!-- close .flipper -->
												</div> <!-- close .flip-container -->
												<div class="centered">
													<h2><?php echo $xml->app->answer2->name; ?></h2>
												</div>
											</div>
										</a>
									</div>
									<div class="span4">
										<a href="#" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'W8NotSureMobApp', time]);">
											<div>
												<div class="flip-container" data-value="<?php echo $xml->app->answer3->desc; ?>" data-constant="0">
													<div class="flipper">
														<img src="img/check.png" class="empty-image">
														<img src="img/idk.png" class="front" alt="Standalone app">
														<img src="img/check.png" class="back" alt="Selected!">
													</div> <!-- close .flipper -->
												</div> <!-- close .flip-container -->
												<div class="centered">
													<h2><?php echo $xml->app->answer3->name; ?></h2>
												</div>
											</div>
										</a>
									</div>

								</div> <!-- close .row-fluid -->
							</div> <!-- close .wrapper -->
						</div> <!-- close .entry -->
					<?php } ?>
					<!-- QUESTION -->
					<div class="entry js-entry-final" style="display: none;" >
						<div class="wrapper">
							<div id="estimate">
								<div class="invoice well">
									<div class="head-winify">
										<a href="/<?php if(!$lang){?>en<?php }?>" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'C3WinifyHomeHd', time]);"><img src="img/winify-color.png"></a>
										<hr>
									</div>
									<?php
									if ($app == "app") {
										require_once("beforeb.php");
									}
									?>

									<div class="clearfix first-line">
										<h1 class="heading weight-bold"><?php if($lang){ ?>Unsere Kostenschätzung für Ihr Projekt <?php }else{ ?>OUR ESTIMATE FOR YOUR PROJECT <?php }?>- Website</h1>
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
									<?php /*
									<h1 class="descriptor"><?php if($lang){ ?>Geschätzte Kosten:<?php }else{ ?>ESTIMATED COSTS:<?php }?></h1>
									<h1 class="total">&euro;<span class="data">1000</span><span class="label-price"></span></h1>
									<br>
									
									<div class="result-block">
										<?php if($lang){ ?><img src="img/bg-result.png" alt="text"><?php }else{ ?><img src="img/kontaktieren.png" alt=""/><?php }?>
									</div>
									 * 
									 */?>
									<div class="message-block">
										<?php if($lang){ ?>
											Bitte senden Sie uns Ihre E-mail Adresse. Wir antworten umgehend mit dem Ergebnis.
										<?php }else{ ?>
											Please send us your e-mail address. We will reply promptly with the result. 
										<?php }?>
									</div>
									<div class="helper" id="result">
										<form action="" method="post" id="submitForm" onsubmit='return false;' name="mc-embedded-subscribe-form" class="validate subscribe-form">
											<?php echo isset($_POST['features']) ? "<input type='hidden' name='before' value='$_POST[type]/-/$_POST[features]'>" : ""; ?>
											<?php echo isset($_POST['features']) ? "<input type='hidden' name='obudget' value='$_POST[budget]'>" : ""; ?>
											<?php echo isset($_POST['features']) ? "<input type='hidden' name='beforeDesc' value='$_POST[description]/-/$_POST[descriptions]'>" : ""; ?>
											<input type="hidden" value="sendMail" name="send">
											<input type="hidden" value="versionB" name="true">
											<input type="text" value="" name="ClientName" class="required inputtext"  placeholder="<?php if($lang){ ?>Ihr Name<?php }else{ ?>Name<?php }?>">
											<input type="text" value="" name="EMAIL" class="required email"  placeholder="<?php if($lang){ ?>Ihre E-Mail Adresse<?php }else{ ?>Email<?php }?>">
											
											<button type="submit" href="#" class="btn btn-block btn-danger" onclick="_gaq.push(['_trackEvent', 'WebRep', 'Click', 'WebRepSubmit', 1]);"><?php if($lang){ ?>Absenden & Ergebnis erhalten<?php }else{ ?>Submit & Get result<?php }?></button>
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
											jQuery(function($) {
												var cache = {
													start: $('#js-estimate-start'),
													submit: $('#submit'),
													finalQuestion: $('.final-question'),
													subscribe: ('#mc-embedded-subscribe')
												};


											});


		</script>

	</body>

</html>

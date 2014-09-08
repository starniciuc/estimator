<!DOCTYPE html>
<html>

	<head>
		<title>Software Projektrechner</title>
		<meta name="Description" content="Schätzen Sie die Kosten für Ihre Webseite oder Mobile App jetzt mit wenigen Klicks ab.">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<meta charset="utf8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
		<!-- scripts -->
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script>
			function startEstimator() {
				$("#start").fadeOut("slow", function() {
					$("#platform").fadeIn("slow");
				});

			}

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
</head>

<body>
	<div class="wrapper">
		<div class="logo-winify">
			<a href="/" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'C2WinifyHome', wtime]);" ><img src="img/sur.1.png"></a>
		</div>
		<div class="header"></div>
		<div class="indexContent">

			<div id="start" style="display: block;">
				<div class="titleQuestion">
					<h2>Mir ist klar, dass es sich bei den Angaben um Schätzwerte handelt.</h2>
				</div>

				<div class="answerContent2">   
					<a href="javascript:startEstimator()" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'C1ClearYes', time]);">
						<div class="answer">
							<div class="imgContent"><img src="img/check.png"></div> 
							<div class="inputBlock"><h1>Ja</h1> </div>
						</div>
					</a> 
					<a href="/" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'C1ClearNo', time]);">
						<div class="answer">
							<div class="imgContent"><img src="img/no.png"></div> 
							<div class="inputBlock"><h1>Nein</h1></div>
						</div>
					</a>
				</div>
			</div>

			<div id="platform" style="display: none;">
				<div class="titleQuestion">
					<h2>Für welches Produkt möchten Sie die Kosten schätzen?</h2>
				</div>

				<div class="answerContent2">   
					<a href="mobile.php" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'C2Mobile', time]);">
						<div class="answer">
							<div class="imgContent"><img src="img/mobile.png"></div> 
							<div class="inputBlock"><h1>Mobile Application</h1> </div>
						</div>
					</a> 
					<a href="website.php" onclick="_gaq.push(['_trackEvent', 'PCalculator', 'CalcClick', 'C2Website', time]);">
						<div class="answer">
							<div class="imgContent"><img src="img/website.png"></div> 
							<div class="inputBlock"><h1>Website</h1></div>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
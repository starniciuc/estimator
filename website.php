<?php
    include "blocks/function.php";
    $xml = loadFromXML();
    @$app = $_POST['dir']?$_POST['dir']:"";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Projektrechner :: Winify</title>
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/estimator.css" />
    <!-- scripts -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <script type="text/javascript">
        var pth = parseInt('<?php echo $xml->price;?>');
        
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
					submitHandler: function(){
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
</head>

<body class="no-underline">
<div class="table-wrapper">
	
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
                            <h3 class="js-average heading">&euro;<span>0</span></h3>
						  	<div class="bar js-bar" style="width: 0%;"></div>
						</div> <!-- close .progress .progress-success -->
					</div> <!-- close #output -->
				</div> <!-- close .wrapper -->
			</div> <!-- close .entry -->
		</div> <!-- close .wrapper -->
        <!-- bar $$ estimate estimate!-->

		<!-- QUESTION 1 -->
		<div class="js-question">	
            <div class="entry js-entry" data-method="wtype" data-description="<?php echo $xml->wtype->description;?>" style="display: none;">
				<div class="wrapper">
					<div class="row-fluid">
						<div class="centered">
							<h1 class="heading"><?php echo $xml->wtype->title; ?></h1>
						</div>
					</div> <!-- close .row-fluid -->
					<div class="row-fluid">
						<div class="span2">
							<a href="#">
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
							<a href="#">
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
							<a href="#">
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
							<a href="#">
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
							<a href="#">
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
					</div> <!-- close .row-fluid -->
				</div> <!-- close .wrapper -->
			</div> <!-- close .entry -->

			<!-- QUESTION: BASED -->
			<div class="entry js-entry" data-method="based" data-description="<?php echo $xml->based->description;?>" style="display: none;">
				<div class="wrapper">
					<div class="row-fluid">
						<div class="centered">
							<h1 class="heading"><?php echo $xml->based->title; ?></h1>
						</div>
					</div> <!-- close .row-fluid -->
					<div class="row-fluid">
						<div class="span4">
							<a href="#">
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
							<a href="#">
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
							<a href="#">
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
			<div class="entry js-entry" data-method="languages" data-description="<?php echo $xml->languages->description;?>" style="display: none;">
				<div class="wrapper">
					<div class="row-fluid">
						<div class="centered">
							<h1 class="heading"><?php echo $xml->languages->title; ?></h1>
						</div>
					</div> <!-- close .row-fluid -->
					<div class="row-fluid">
						<div class="span4">
							<a href="#">
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
							<a href="#">
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
							<a href="#">
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
			<div class="entry js-entry" data-method="responsive" data-description="<?php echo $xml->responsive->description;?>" style="display: none;">
				<div class="wrapper">
					<div class="row-fluid">
						<div class="centered">
							<h1 class="heading"><?php echo $xml->responsive->title; ?></h1>
						</div>
					</div> <!-- close .row-fluid -->
					<div class="row-fluid">
						<div class="span4">
							<a href="#">
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
							<a href="#">
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
							<a href="#">
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
			<div class="entry js-entry" data-method="design" data-description="<?php echo $xml->design->description;?>" style="display: none;">
				<div class="wrapper">
					<div class="row-fluid">
						<div class="centered">
							<h1 class="heading"><?php echo $xml->design->title; ?></h1>
						</div>
					</div> <!-- close .row-fluid -->
					<div class="row-fluid">
						<div class="span6">
							<a href="#">
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
							<a href="#">
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
			<div class="entry js-entry" data-method="marketing" data-description="<?php echo $xml->marketing->description;?>" style="display: none;" >
				<div class="wrapper">
					<div class="row-fluid">
						<div class="centered">
							<h1 class="heading"><?php echo $xml->marketing->title; ?></h1>
						</div>
					</div> <!-- close .row-fluid -->
					<div class="row-fluid">
						<div class="span4">
							<a href="#">
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
							<a href="#">
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
							<a href="#">
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
			<div class="entry js-entry" data-method="wproject" data-description="<?php echo $xml->wproject->description;?>" style="display: none;">
				<div class="wrapper">
					<div class="row-fluid">
						<div class="centered">
							<h1 class="heading"><?php echo $xml->wproject->title; ?></h1>
						</div>
					</div> <!-- close .row-fluid -->
					<div class="row-fluid">
                    
						<div class="span4">
							<a href="#">
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
							<a href="#">
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
							<a href="#">
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

            <?php if(!$app == "app"){?>
			<!-- QUESTION: INTEGRATED/STANDALONE -->
			<div class="entry js-entry" data-method="app" data-description="<?php echo $xml->app->description;?>" style="display: none;">
				<div class="wrapper">
					<div class="row-fluid">
						<div class="centered">
							<h1 class="heading"><?php echo $xml->app->title; ?></h1>
						</div>
					</div> <!-- close .row-fluid -->
					<div class="row-fluid">
						<div class="span4">
							<a href="#">
								<div>
									<div class="flip-container" data-value="<?php echo $xml->app->answer1->desc; ?>" data-constant="0">
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
							<a href="#">
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
							<a href="#">
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
            <?php }?>
			<!-- QUESTION -->
			<div class="entry js-entry-final" style="display: none;" >
				<div class="wrapper">
			    	<div id="estimate">
                                    <div class="invoice well">
                            
                            <?php
                                if($app == "app")
                                {
                                    require_once("before.php");
                                }
                            ?>
                        
                                        <div class="clearfix first-line">
                                                <h1 class="heading weight-bold">Unsere Kostenschätzung für Ihr Projekt:</h1>
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
									<h1 class="descriptor">Geschätzte Kosten:</h1>
									<h1 class="total">&euro;<span class="data">1000</span></h1>
									<p class="info_price">Bitte beachten Sie, dass es sich hierbei um eine nicht bindende, grobe Einschätzung der Kosten für Ihr Projekt handelt.</p>
									<br>
									<p class="light" style="margin-top: 20px; margin-bottom: 0; text-align: right; font-size: 12px; font-style: italic;"><a href="index.php">Noch einmal / Ein anderes Projekt durchrechnen</a></p>
									<div class="helper" id="result">
                                            <form action="" method="post" id="submitForm" onsubmit='return false;' name="mc-embedded-subscribe-form" class="validate subscribe-form">
                                                <?php echo isset($_POST['features'])?"<input type='hidden' name='before' value='$_POST[type]+$_POST[features]'>":""; ?>
                                                <?php echo isset($_POST['features'])?"<input type='hidden' name='obudget' value='$_POST[budget]'>":""; ?>
												<input type="hidden" value="sendMail" name="send">
												<input type="text" value="" name="ClientName" class="required inputtext"  placeholder="Ihr Name">
                                                <input type="text" value="" name="EMAIL" class="required email"  placeholder="Ihre E-Mail Adresse">
												<textarea name="mess" placeholder="Ihre Nachricht an uns."></textarea>
                                                <button type="submit" href="#" class="btn btn-block btn-danger">Absenden</button>
                                            </form>
                                        </div> <!-- close .helper -->
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

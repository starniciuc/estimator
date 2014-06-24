<!DOCTYPE html>
<html>

<head>
    <title>Projektrechner :: Winify</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
	<meta charset="utf8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1" />
    <!-- scripts -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script>
        function startEstimator(){
            $("#start").fadeOut("slow", function(){
                $("#platform").fadeIn("slow"); 
            }); 
            
        }
    </script>
</head>

<body>
<div class="wrapper">
<div class="header"></div>
<div class="indexContent">

    <div id="start" style="display: block;">
        <div class="titleQuestion">
	   <h2>Mir ist klar, dass es sich bei den Angaben um Schätzwerte handelt.</h2>
        </div>
    
        <div class="answerContent2">   
            <a href="javascript:startEstimator()">
                <div class="answer">
                    <div class="imgContent"><img src="img/check.png"></div> 
                    <div class="inputBlock"><h1>Ja</h1> </div>
                </div>
            </a> 
            <a href="/">
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
            <a href="mobile.php">
                <div class="answer">
                    <div class="imgContent"><img src="img/mobile.png"></div> 
                    <div class="inputBlock"><h1>Mobile Application</h1> </div>
                </div>
            </a> 
            <a href="website.php">
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
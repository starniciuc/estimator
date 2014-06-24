<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

@$page = $_GET['page']?$_GET['page']:null;
include "blocks/function.php";
$xml = loadFromXML();?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin!</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <meta http-equiv="expires" content="-1"><meta charset="utf8">
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.numeric.js" type="text/javascript"></script>
    <script>
        $(".price").numeric({ negative : false });
    </script>
</head>
<body>
<div class="wrapper">
<div class="header"></div>

<div class="content"> 
    <form action="" method="POST">
    <?php
        switch($page){
            case "type":{include "blocks/type.php"; $count = 5; break;}
            case "interface":{include "blocks/interface.php"; $count = 3; break;}
            case "login":{include "blocks/login.php"; $count = 4; break;}
            case "payments":{include "blocks/payments.php"; $count = 3; break;}
            case "sync":{include "blocks/sync.php"; $count = 3; break;}
            case "rate":{include "blocks/rate.php"; $count = 3; break;}
            case "profiles":{include "blocks/profiles.php"; $count = 3; break;}
            case "website":{include "blocks/website.php"; $count = 3; break;}
            case "device":{include "blocks/device.php"; $count = 3; break;}
            case "wtype":{include "blocks/wtype.php"; $count = 5; break;}
            case "based":{include "blocks/based.php"; $count = 3; break;}
            case "languages":{include "blocks/languages.php"; $count = 3; break;}
            case "responsive":{include "blocks/responsive.php"; $count = 3; break;}
            case "project":{include "blocks/project.php"; $count = 3; break;}
            case "design":{include "blocks/design.php"; $count = 2; break;}
            case "graphics":{include "blocks/graphics.php"; $count = 2; break;}
            case "marketing":{include "blocks/marketing.php"; $count = 3; break;}
            case "wproject":{include "blocks/wproject.php"; $count = 3; break;}
            case "app":{include "blocks/app.php"; $count = 3; break;}
            default:{include "blocks/list.php"; break;}
        }
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(!$_POST['setPrice'] == "Change"){
                if(saveChangeInXML($page,readPost($page,$count),$count) == 1){
                    questChange($page);             
                }
                else
                {
                    echo " <div class='errorContent'>Nothing has changed</div>";
                }  
            }
        }
    ?>
    </form>
    <script>
        $(".price").numeric({ decimal: false, negative: false }, function() { alert("Positive integers only"); this.value = ""; this.focus(); });
    </script>
</div>

<div class="footer"></div>
</div>
</body>
</html>


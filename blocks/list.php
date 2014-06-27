<?php
if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['setPrice'] == "Change")
{
    $price = $_POST['ehour']*1;
    if($price>=20 && $price<=50){
        $setPrice = $price;
        }
}                  
?>
<div class="listQuest">
    <div class="titleQuestion">
	   <h1>Choose...</h1>
	</div>
    <ul>
        <!--Money USD to hour -->
        <li class="money">
            <div class="setPrice">
                <form action="" method="POST">
                    <label>Price/hour <input type="text" name="ehour" value="<?php echo $setPrice?$setPrice:$xml->price; ?>" class="price" maxlength="2"/></label>
                    <input type="submit" value="Change" name="setPrice"/>
                </form>
                <?php
                if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['setPrice'] == "Change")
                {
                    $price = $_POST['ehour']*1;
                    if($price>=10 && $price<=50){
                        saveNewPrice($price);
                        echo "<h1>New price is set successfully.</h1>";
                    }else{   
                        echo "<h2>Price should be higher than 10 and lower than 50!</h2>";
                    }
                    
                }                  
                ?>
            </div>
        </li>
        <!--List for app project -->
        <li class="mobile"><a href="?page=type"><?php echo $xml->type->title; ?></a><?php if($_COOKIE['SaveChange'] == 'type'){ ?><div class="check"></div><?php }?></li>
        <li class="mobile"><a href="?page=device"><?php echo $xml->device->title; ?></a><?php if($_COOKIE['SaveChange'] == 'device'){ ?><div class="check"></div><?php }?></li>
        <li class="mobile"><a href="?page=interface"><?php echo $xml->interface->title; ?></a><?php if($_COOKIE['SaveChange'] == 'interface'){ ?><div class="check"></div><?php }?></li>
		<li class="mobile"><a href="?page=login"><?php echo $xml->login->title; ?></a><?php if($_COOKIE['SaveChange'] == 'login'){ ?><div class="check"></div><?php }?></li>
        <li class="mobile"><a href="?page=payments"><?php echo $xml->payments->title; ?></a><?php if($_COOKIE['SaveChange'] == 'payments'){ ?><div class="check"></div><?php }?></li>
        <li class="mobile"><a href="?page=sync"><?php echo $xml->sync->title; ?></a><?php if($_COOKIE['SaveChange'] == 'sync'){ ?><div class="check"></div><?php }?></li>
        <li class="mobile"><a href="?page=rate"><?php echo $xml->rate->title; ?></a><?php if($_COOKIE['SaveChange'] == 'rate'){ ?><div class="check"></div><?php }?></li>
        <li class="mobile"><a href="?page=profiles"><?php echo $xml->profiles->title; ?></a><?php if($_COOKIE['SaveChange'] == 'profiles'){ ?><div class="check"></div><?php }?></li>
        <li class="mobile"><a href="?page=graphics"><?php echo $xml->graphics->title; ?></a><?php if($_COOKIE['SaveChange'] == 'graphics'){ ?><div class="check"></div><?php }?></li>
        <li class="mobile"><a href="?page=project"><?php echo $xml->project->title; ?></a><?php if($_COOKIE['SaveChange'] == 'project'){ ?><div class="check"></div><?php }?></li>
		<li class="mobile"><a href="?page=website"><?php echo $xml->website->title; ?></a><?php if($_COOKIE['SaveChange'] == 'website'){ ?><div class="check"></div><?php }?></li>
        <!--List for web project -->
		
        <li class="web"><a href="?page=wtype"><?php echo $xml->wtype->title; ?></a><?php if($_COOKIE['SaveChange'] == 'wtype'){ ?><div class="check"></div><?php }?></li>
        <li class="web"><a href="?page=based"><?php echo $xml->based->title; ?></a><?php if($_COOKIE['SaveChange'] == 'based'){ ?><div class="check"></div><?php }?></li>
        <li class="web"><a href="?page=languages"><?php echo $xml->languages->title; ?></a><?php if($_COOKIE['SaveChange'] == 'languages'){ ?><div class="check"></div><?php }?></li>
        <li class="web"><a href="?page=responsive"><?php echo $xml->responsive->title; ?></a><?php if($_COOKIE['SaveChange'] == 'responsive'){ ?><div class="check"></div><?php }?></li>
        <li class="web"><a href="?page=marketing"><?php echo $xml->marketing->title; ?></a><?php if($_COOKIE['SaveChange'] == 'marketing'){ ?><div class="check"></div><?php }?></li>
		<li class="web"><a href="?page=design"><?php echo $xml->design->title; ?></a><?php if($_COOKIE['SaveChange'] == 'design'){ ?><div class="check"></div><?php }?></li>
        <li class="web"><a href="?page=wproject"><?php echo $xml->wproject->title; ?></a><?php if($_COOKIE['SaveChange'] == 'wproject'){ ?><div class="check"></div><?php }?></li>
        <li class="web"><a href="?page=app"><?php echo $xml->app->title; ?></a><?php if($_COOKIE['SaveChange'] == 'app'){ ?><div class="check"></div><?php }?></li>
    </ul>
</div>

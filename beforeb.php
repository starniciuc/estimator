<?php
    $listSelectedText = explode('/-/',$_POST['features']);
    $listSelectedImage = explode('/-/',$_POST['images']);
    $listSelectedDescription = explode("/-/", $_POST['descriptions']);
    ($_POST['dir'] == "app")?$title = "Mobile Application":$title="Website";
?>
<div class="clearfix first-line">
			<h1 class="heading weight-bold"><?php if($lang){ ?>Unsere Kostenschätzung für Ihr Projekt <?php }else{ ?>OUR ESTIMATE FOR YOUR PROJECT <?php }?>- <?php echo $title; ?></h1>
<!-- <a href="#" class="btn btn-small btn-primary" id="share" title="Share your estimate and scope with a friend">Share</a> -->
</div> <!-- close .clearfix -->

<ul class="unstyled ">
<li class="clearfix">
		<div class="image">
			<img src="<?php echo $_POST['image'];?>">
		</div> <!-- close .image -->
		<div class="text">
			<p><?php echo $_POST['type'];?></p>
                        <span><?php echo $_POST['description'];?></span>
		</div> <!-- close .text -->
	</li>
<?php for($i=0; $i<count($listSelectedText)-1; $i++){
    ?>
	<li class="clearfix">
		<div class="image">
			<img src="<?php echo $listSelectedImage[$i];?>">
		</div> <!-- close .image -->
		<div class="text">
			<p><?php echo $listSelectedText[$i];?></p>
                        <span><?php echo $listSelectedDescription[$i];?></span>
		</div> <!-- close .text -->
	</li>
<?php }?>
</ul>
<hr>
<br>
<br>
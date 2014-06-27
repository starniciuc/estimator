<div class="backButton">
    <a href="admin.php">back</a>
</div>
<div class="titleQuestion">
   <input type="text" name="qestTitle" value="<?php echo $xml->wtype->title; ?>"/>
</div>
<div class="titleQuestion description"><input type="text" name="qestDescription" value="<?php echo $xml->wtype->description; ?>"/></div>
<div class="answerContent5">   
    <div class="answer">
    	<div class="imgContent">
    		<img src="img/informational-icon.png">		
    	</div> 
		<div class="inputBlock">
            <h3>Name</h3>
			<input type="text" name="answeName1" value="<?php echo $xml->wtype->answer1->name; ?>"/>
        </div>
        <div class="inputBlock">
            <h3>Description</h3>
            <input type="text" name="answeDesc1" value="<?php echo $xml->wtype->answer1->desc; ?>"/>
		</div>
        <div class="inputBlock">
            <h3>Hour</h3>
            <input type="text" name="answeHour1" value="<?php echo $xml->wtype->answer1->hour; ?>" class="price" maxlength="3"/>
		</div>
    </div>
     
    <div class="answer">
    	<div class="imgContent">
    		<img src="img/commerce-icon.png">		
    	</div> 
		<div class="inputBlock">
            <h3>Name</h3>
			<input type="text" name="answeName4" value="<?php echo $xml->wtype->answer4->name; ?>"/>
		</div>
        <div class="inputBlock">
            <h3>Description</h3>
            <input type="text" name="answeDesc4" value="<?php echo $xml->wtype->answer4->desc; ?>"/>
		</div>
        <div class="inputBlock">
            <h3>Hour</h3>
            <input type="text" name="answeHour4" value="<?php echo $xml->wtype->answer4->hour; ?>" class="price" maxlength="3"/>
		</div>
    </div>
	
    <div class="answer">
    	<div>
    		<img src="img/comunity-icon.png">		
    	</div> 
		<div class="inputBlock">
            <h3>Name</h3>
			<input type="text" name="answeName2" value="<?php echo $xml->wtype->answer2->name; ?>"/>
		</div>
        <div class="inputBlock">
            <h3>Description</h3>
            <input type="text" name="answeDesc2" value="<?php echo $xml->wtype->answer2->desc; ?>"/>
		</div>
        <div class="inputBlock">
            <h3>Hour</h3>
            <input type="text" name="answeHour2" value="<?php echo $xml->wtype->answer2->hour; ?>" class="price" maxlength="3"/>
		</div>
    </div>
      
    <div class="answer">
    	<div class="imgContent">
    		<img src="img/business-icon.png">		
    	</div> 
		<div class="inputBlock">
            <h3>Name</h3>
			<input type="text" name="answeName3" value="<?php echo $xml->wtype->answer3->name; ?>"/>
		</div>
        <div class="inputBlock">
            <h3>Description</h3>
            <input type="text" name="answeDesc3" value="<?php echo $xml->wtype->answer3->desc; ?>"/>
		</div>
        <div class="inputBlock">
            <h3>Hour</h3>
            <input type="text" name="answeHour3" value="<?php echo $xml->wtype->answer3->hour; ?>" class="price" maxlength="3"/>
		</div>
    </div>  
       
    <div class="answer">
    	<div class="imgContent">
    		<img src="img/other-icon.png">		
    	</div> 
		<div class="inputBlock">
            <h3>Name</h3>
			<input type="text" name="answeName5" value="<?php echo $xml->wtype->answer5->name; ?>"/>
		</div>
        <div class="inputBlock">
            <h3>Description</h3>
            <input type="text" name="answeDesc5" value="<?php echo $xml->wtype->answer5->desc; ?>"/>
		</div>
        <div class="inputBlock">
            <h3>Hour</h3>
            <input type="text" name="answeHour5" value="<?php echo $xml->wtype->answer5->hour; ?>" class="price" maxlength="3"/>
  	  </div>
    </div>
</div> 
<div class="submitContent">
    <input type="submit" name="submit" value="Submit quest"/>
    <input type="reset" value="Cancel" class="resetButton">
</div>
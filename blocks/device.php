<div>
    <div class="backButton">
        <a href="admin.php">back</a>
    </div>
    <div class="titleQuestion">
        <input type="text" name="qestTitle" value="<?php echo $xml->device->title; ?>"/>
    </div>
    <div class="titleQuestion description"><input type="text" name="qestDescription" value="<?php echo $xml->device->description; ?>"/></div>
    <div class="answerContent3">   
        <div class="answer">
        	<div class="imgContent">
        		<img src="img/iphone-icon.png">		
        	</div> 
    		<div class="inputBlock">
                <h3>Name</h3>
    			<input type="text" name="answeName1" value="<?php echo $xml->device->answer1->name; ?>"/>
            </div>
            <div class="inputBlock">
                <h3>Description</h3>
                <input type="text" name="answeDesc1" value="<?php echo $xml->device->answer1->desc; ?>"/>
    		</div>
            
        </div>
        
        <div class="answer">
        	<div>
        		<img src="img/ipad-icon.png">		
        	</div> 
    		<div class="inputBlock">
                <h3>Name</h3>
    			<input type="text" name="answeName2" value="<?php echo $xml->device->answer2->name; ?>"/>
    		</div>
            <div class="inputBlock">
                <h3>Description</h3>
                <input type="text" name="answeDesc2" value="<?php echo $xml->device->answer2->desc; ?>"/>
    		</div>
            
        </div>
          
        <div class="answer">
        	<div class="imgContent">
        		<img src="img/both-icon.png">		
        	</div> 
    		<div class="inputBlock">
                <h3>Name</h3>
    			<input type="text" name="answeName3" value="<?php echo $xml->device->answer3->name; ?>"/>
    		</div>
            <div class="inputBlock">
                <h3>Description</h3>
                <input type="text" name="answeDesc3" value="<?php echo $xml->device->answer3->desc; ?>"/>
    		</div>
            <div class="inputBlock">
                <h3>Percent</h3>
                <input type="text" name="answePercent3" value="<?php echo (float)$xml->device->answer3->percent*100; ?>" class="price" maxlength="3"/>
    		</div>
        </div>  
      
    </div> 
    <div class="submitContent">
        <input type="submit" name="submit" value="Submit quest"/>
        <input type="reset" value="Cancel" class="resetButton">
    </div>             
</div>
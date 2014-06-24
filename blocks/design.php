<div>
    <div class="backButton">
        <a href="admin.php">back</a>
    </div>
    <div class="titleQuestion">
	   <input type="text" name="qestTitle" value="<?php echo $xml->design->title; ?>"/>
    </div>
    <div class="titleQuestion description"><input type="text" name="qestDescription" value="<?php echo $xml->design->description; ?>"/></div>
    <div class="answerContent2">   
        <div class="answer">
        	<div class="imgContent">
        		<img src="img/design-icon.png">		
        	</div> 
    		<div class="inputBlock">
                <h3>Name</h3>
    			<input type="text" name="answeName1" value="<?php echo $xml->design->answer1->name; ?>"/>
            </div>
            <div class="inputBlock">
                <h3>Description</h3>
                <input type="text" name="answeDesc1" value="<?php echo $xml->design->answer1->desc; ?>"/>
    		</div>
            <div class="inputBlock">
                <h3>Hour</h3>
                <input type="text" name="answeHour1" value="<?php echo $xml->design->answer1->hour; ?>" class="price" maxlength="3"/>
    		</div>
        </div>
        
        <div class="answer">
        	<div>
        		<img src="img/no.png">		
        	</div> 
    		<div class="inputBlock">
                <h3>Name</h3>
    			<input type="text" name="answeName2" value="<?php echo $xml->design->answer2->name; ?>"/>
    		</div>
            <div class="inputBlock">
                <h3>Description</h3>
                <input type="text" name="answeDesc2" value="<?php echo $xml->design->answer2->desc; ?>"/>
    		</div>
            <div class="inputBlock">
                <h3>Hour</h3>
                <input type="text" name="answeHour2" value="<?php echo $xml->design->answer2->hour; ?>" class="price" maxlength="3"/>
    		</div>
        </div>
          
    </div> 
    <div class="submitContent">
        <input type="submit" name="submit" value="Submit quest"/>
        <input type="reset" value="Cancel" class="resetButton">
    </div>             
</div>
<div>
    <div class="backButton">
        <a href="admin.php">back</a>
    </div>
    <div class="titleQuestion">
	   <input type="text" name="qestTitle" value="<?php echo $xml->app->title; ?>"/>
    </div>
    <div class="titleQuestion description"><input type="text" name="qestDescription" value="<?php echo $xml->app->description; ?>"/></div>
    <div class="answerContent3">   
        <div class="answer">
        	<div class="imgContent">
        		<img src="img/iphone-icon.png">		
        	</div> 
    		<div class="inputBlock">
                <h3>Name</h3>
    			<input type="text" name="answeName1" value="<?php echo $xml->app->answer1->name; ?>"/>
            </div>
            <div class="inputBlock">
                <h3>Description</h3>
                <input type="text" name="answeDesc1" value="<?php echo $xml->app->answer1->desc; ?>"/>
    		</div>
        </div>
        
        <div class="answer">
        	<div>
        		<img src="img/no.png">		
        	</div> 
    		<div class="inputBlock">
                <h3>Name</h3>
    			<input type="text" name="answeName2" value="<?php echo $xml->app->answer2->name; ?>"/>
    		</div>
            <div class="inputBlock">
                <h3>Description</h3>
                <input type="text" name="answeDesc2" value="<?php echo $xml->app->answer2->desc; ?>"/>
    		</div>
        </div>
		
		 <div class="answer">
            <div class="imgContent">
        		<img src="img/idk.png">		
        	</div> 
    		<div class="inputBlock">
                <h3>Name</h3>
    			<input type="text" name="answeName3" value="<?php echo $xml->app->answer3->name; ?>"/>
    		</div>
            <div class="inputBlock">
                <h3>Description</h3>
    			<input type="text" name="answeDesc3" value="<?php echo $xml->app->answer3->desc; ?>"/>
    		</div>
        </div>  
          
    </div> 
    <div class="submitContent">
        <input type="submit" name="submit" value="Submit quest"/>
        <input type="reset" value="Cancel" class="resetButton">
    </div>             
</div>
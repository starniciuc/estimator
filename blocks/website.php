<div>
    <div class="backButton">
        <a href="admin.php">back</a>
    </div>
    <div class="titleQuestion">
        <input type="text" name="qestTitle" value="<?php echo $xml->website->title; ?>"/>
    </div>
    <div class="titleQuestion description"><input type="text" name="qestDescription" value="<?php echo $xml->website->description; ?>"/></div>
    <div class="answerContent3">   
        <div class="answer">
        	<div class="imgContent">
        		<img src="img/integrated-icon.png">		
        	</div> 
    		<div class="inputBlock">
                <h3>Name</h3>
    			<input type="text" name="answeName1" value="<?php echo $xml->website->answer1->name; ?>"/>
    		</div>
            <div class="inputBlock">
                <h3>Description</h3>
    			<input type="text" name="answeDesc1" value="<?php echo $xml->website->answer1->desc; ?>"/>
    		</div>
            
        </div>
        
        <div class="answer">
        	<div class="imgContent">
        		<img src="img/no.png">		
        	</div> 
    		<div class="inputBlock">
                <h3>Name</h3>
    			<input type="text" name="answeName2" value="<?php echo $xml->website->answer2->name; ?>"/>
    		</div>
            <div class="inputBlock">
                <h3>Description</h3>
    			<input type="text" name="answeDesc2" value="<?php echo $xml->website->answer2->desc; ?>"/>
    		</div>
        </div>
          
        <div class="answer">
            <div class="imgContent">
        		<img src="img/idk.png">		
        	</div> 
    		<div class="inputBlock">
                <h3>Name</h3>
    			<input type="text" name="answeName3" value="<?php echo $xml->website->answer3->name; ?>"/>
    		</div>
            <div class="inputBlock">
                <h3>Description</h3>
    			<input type="text" name="answeDesc3" value="<?php echo $xml->website->answer3->desc; ?>"/>
    		</div>
            <div class="inputBlock">
                <h3>Hour</h3>
                <input type="text" name="answeHour3" value="<?php echo $xml->website->answer3->hour; ?>" class="price" maxlength="3"/>
    		</div>
        </div>  
    </div> 
    <div class="submitContent">
        <input type="submit" name="submit" value="Submit quest"/>
        <input type="reset" value="Cancel" class="resetButton">
    </div>             
</div>
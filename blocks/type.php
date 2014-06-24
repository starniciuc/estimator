<div class="backButton"><a href="admin.php">back</a></div>
<div class="titleQuestion"><input type="text" name="qestTitle" value="<?php echo $xml->type->title; ?>"/></div>
<div class="titleQuestion description"><input type="text" name="qestDescription" value="<?php echo $xml->type->description; ?>"/></div>
<div class="answerContent5">   
    <div class="answer">
            <div class="imgContent"><img src="img/ios-icon.png"></div> 
            <div class="inputBlock"><h3>Name</h3><input type="text" name="answeName1" value="<?php echo $xml->type->answer1->name; ?>"/>            </div>
        <div class="inputBlock"><h3>Description</h3><input type="text" name="answeDesc1" value="<?php echo $xml->type->answer1->desc; ?>"/></div>
        <div class="inputBlock"><h3>Hour</h3><input type="text" name="answeHour1" value="<?php echo $xml->type->answer1->hour; ?>" class="price" maxlength="3"/></div>
    </div>
    <div class="answer">
            <div><img src="img/android-icon.png"></div> 
            <div class="inputBlock"><h3>Name</h3><input type="text" name="answeName2" value="<?php echo $xml->type->answer2->name; ?>"/></div>
        <div class="inputBlock"><h3>Description</h3><input type="text" name="answeDesc2" value="<?php echo $xml->type->answer2->desc; ?>"/></div>
        <div class="inputBlock"><h3>Hour</h3>
            <input type="text" name="answeHour2" value="<?php echo $xml->type->answer2->hour;?>" class="price" maxlength="3"/>
            </div>
    </div>
    <div class="answer">
            <div class="imgContent"><img src="img/windows-phone-icon.png"></div> 
            <div class="inputBlock"><h3>Name</h3><input type="text" name="answeName3" value="<?php echo $xml->type->answer3->name; ?>"/></div>
        <div class="inputBlock"><h3>Description</h3>
            <input type="text" name="answeDesc3" value="<?php echo $xml->type->answer3->desc; ?>"/>
            </div>
        <div class="inputBlock"><h3>Hour</h3>
            <input type="text" name="answeHour3" value="<?php echo $xml->type->answer3->hour; ?>" class="price" maxlength="3"/>
            </div>
    </div>  
    <div class="answer">
            <div class="imgContent"><img src="img/ios+android-icon.png"></div> 
            <div class="inputBlock"><h3>Name</h3>
                    <input type="text" name="answeName4" value="<?php echo $xml->type->answer4->name;?>"/>
            </div>
        <div class="inputBlock"><h3>Description</h3>
            <input type="text" name="answeDesc4" value="<?php echo $xml->type->answer4->desc;?>"/>
            </div>
        <div class="inputBlock"><h3>Hour</h3>
            <input type="text" name="answeHour4" value="<?php echo $xml->type->answer4->hour;?>" class="price" maxlength="3"/>
            </div>
        <div class="inputBlock"><h3>Percent</h3>
            <input type="text" name="answePercent4" value="<?php echo (float)$xml->type->answer4->percent*100;?>" class="price" maxlength="3"/>
            </div>
    </div>
    <div class="answer">
        <div class="imgContent"><img src="img/ios+adroid+win-icon.png"></div>
        <div class="inputBlock"><h3>Name</h3>
                    <input type="text" name="answeName5" value="<?php echo $xml->type->answer5->name;?>"/>
            </div>
        <div class="inputBlock"><h3>Description</h3>
            <input type="text" name="answeDesc5" value="<?php echo $xml->type->answer5->desc;?>"/>
            </div>
        <div class="inputBlock"><h3>Hour</h3><input type="text" name="answeHour5" value="<?php echo $xml->type->answer5->hour;?>" class="price" maxlength="3"/></div>
        <div class="inputBlock"><h3>Percent</h3><input type="text" name="answePercent5" value="<?php echo (float)$xml->type->answer5->percent*100;?>" class="price" maxlength="3"/></div>
    </div>
</div> 
<div class="submitContent"><input type="submit" name="submit" value="Submit quest"/><input type="reset" value="Cancel" class="resetButton"/></div>
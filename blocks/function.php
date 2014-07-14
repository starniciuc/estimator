<?php
error_reporting(E_ERROR | E_WARNING | E_PARS); 
ini_set("display_errors", 1);
function questChange($quest){
    setcookie("SaveChange",$quest,time()+300);
    header("LOCATION: admin.php");
}

    /**
    *Save data into xml file
    */
    function saveChangeInXML($quest,$data,$count){
        $edit = 0;
        
        if (file_exists('quest.xml')) {
        $xml = simplexml_load_file('quest.xml');
           
            if($data[$quest]['title'] != "")
            {
                if($xml->$quest->title != $data[$quest]['title'])
                {
                   $edit = 1;
                   $xml->$quest->title = $data[$quest]['title']; 
                }
                
            }
            
            if($data[$quest]['description'] != "")
            {
                if($xml->$quest->description != $data[$quest]['description'])
                {
                   $edit = 1;
                   $xml->$quest->description = $data[$quest]['description']; 
                }
                
               
            }
            
            for($i=1; $i<=$count;$i++){
                
                $answer = "answer$i";
                if(isset($data[$quest][$i]['name']))
                {
                    if($xml->$quest->$answer->name != $data[$quest][$i]['name'])
                    {
                        $edit = 1;
                        $xml->$quest->$answer->name = $data[$quest][$i]['name'];
                    }
                    
                }
                    
                if(isset($data[$quest][$i]['desc']))
                {
                    if($xml->$quest->$answer->desc != $data[$quest][$i]['desc'])
                    {
                        $edit = 1;
                        $xml->$quest->$answer->desc = $data[$quest][$i]['desc'];
                    }
                    
                }
                    
                if(isset($data[$quest][$i]['hour']))
                {
                    if($xml->$quest->$answer->hour != $data[$quest][$i]['hour'])
                    {
                        $edit = 1;
                        $xml->$quest->$answer->hour = $data[$quest][$i]['hour'];
                        
                    }
                }
                    
                if(isset($data[$quest][$i]['percent']))
                {
                    if($xml->$quest->$answer->percent != $data[$quest][$i]['percent'])
                    {
                        $edit = 1;
                        $xml->$quest->$answer->percent = $data[$quest][$i]['percent'];
                    }
                     
                }
            }
            
        }else {
            exit('Failed to open xml');
        }
        
        if($edit == 1){
            return $xml->saveXML('quest.xml');
        }
        else
        {
            return 0;
        }
        
    }
    /**
     * Save new price
     */
     function saveNewPrice($p){
        if(file_exists('quest.xml')){
            $xml = simplexml_load_file('quest.xml');
            $xml->price = $p;
            
        }else{
            exit("Failed to open xml");
        }
        
        return $xml->asXML('quest.xml');
     }
    /**
     *Load data from xml file. 
    */
    function loadFromXML(){
        if(file_exists('quest.xml')){
            $xml = simplexml_load_file('quest.xml');
        }
        return $xml;
    }
    
    /**
     * Read data from post method.
     */
    function readPost($quest, $countAnswer){
        
        if($_POST['qestTitle'] != ""){
            $data[$quest]['title'] = $_POST['qestTitle'];
        }
        
        if($_POST['qestDescription'] != ""){
            $data[$quest]['description'] = $_POST['qestDescription'];
        }
            
        for($i=1;$i<=$countAnswer;$i++){
            if($_POST['answeName'.$i] != ""){
                $data[$quest][$i]['name']=$_POST['answeName'.$i];
            }
            if($_POST['answeHour'.$i] != ""){
                $data[$quest][$i]['hour']=$_POST['answeHour'.$i];    
            }
            if($_POST['answeDesc'.$i] != ""){
                $s = str_replace("+","-",$_POST['answeDesc'.$i]);
                $data[$quest][$i]['desc']=$_POST['answeDesc'.$i];
            }
            if($_POST['answePercent'.$i] != ""){
                $p = ($_POST['answePercent'.$i]*1) / 100;
                if($p <1 && $p>0){
                    $p += 1;
                }
                $data[$quest][$i]['percent']=$p;
            }
        }
        
        return $data;
    }
    
    function makeMail($data, $arr){
        if (file_exists('quest.xml')) {
            $xml = simplexml_load_file('quest.xml');
           
            $quest = 'device';
			$message = "<table style='border: none; border-collapse: collapse; color:#222; margin-bottom:30px; width:600px;'>"
						. "<tr>"
							."<td style=' background-color:#efefef; border-bottom:1px solid #ccc; padding:5px; '><strong>Client info</strong></td>"
							."<td style=' background-color:#efefef; border-bottom:1px solid #ccc; padding:5px; '></td>"
						. "</tr>"
						. "<tr>"
							."<td style=' background-color:#fafafa; border-bottom:1px solid #ccc; padding:5px; '>Client name:</td>"
							."<td style=' background-color:#fafafa; border-bottom:1px solid #ccc; padding:5px; color:#0BB5FF; '>$arr[name]</td>"
						. "</tr>"
						. "<tr>"
							."<td style=' background-color:#fafafa; border-bottom:1px solid #ccc; padding:5px; '>Client email:</td>"
							."<td style=' background-color:#fafafa; border-bottom:1px solid #ccc; padding:5px; color:#0BB5FF;'>$arr[email]</td>"
						. "</tr>"
						. "<tr>"
							."<td style=' background-color:#fafafa; border-bottom:1px solid #ccc; padding:5px; '>Client message:</td>"
							."<td style=' background-color:#fafafa; border-bottom:1px solid #ccc; padding:5px; color:#0BB5FF;'>$arr[message]</td>"
						. "</tr>"
					. "</table>";
            $message .= "<table style='border:none; border-collapse: collapse; color:#444; width:600px;'>";
            foreach($data as $title => $reply )
            {
                for($i=1; $i<=5;$i++){

                    $answer = "answer$i";
                    
                    if(($xml->device->$answer->desc == $title))
                    {
                        $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->device->$a->desc && $xml->device->$a->desc != null){
                               $all .= $xml->device->$a->name."<br>";
                           }
                       }
                        
                        $message .= "<tr>"
                        . "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->device->title."</td>"
                        . "<td  style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->device->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->type->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->type->$a->desc && $xml->type->$a->desc != null){
                               $all .= $xml->type->$a->name."<br>";
                           }
                       }
					   $bg = $arr['type']*1 == 1?$arr['budget']:$arr['obudget'];
                       $message .= "<tr>"
							   . "<td style=' background-color:#efefef; border-bottom:1px dotted #aaa; padding:5px; '>"
							   . "<strong>Application</strong>"
							   . "</td>"
							   . "<td style='background-color:#efefef; border-bottom:1px dotted #aaa; padding:5px;'>".$bg
							   . "&euro;</td>"
							   . "</tr><tr>"."<td style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->type->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->type->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->interface->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->interface->$a->desc && $xml->interface->$a->desc != null){
                               $all .= $xml->interface->$a->name."<br>";
                           }
                       }
                       $message .= "<tr>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->interface->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->interface->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->payments->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->payments->$a->desc && $xml->payments->$a->desc != null){
                               $all .= $xml->payments->$a->name."<br>";
                           }
                       }
                       $message .= "<tr>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->payments->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->payments->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->login->description == $title ))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->login->$a->desc && $xml->login->$a->desc != null){
                               $all .= $xml->login->$a->name."<br>";
                           }
                       }
                       $message .= "<tr>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->login->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->login->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->sync->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->sync->$a->desc && $xml->sync->$a->desc != null){
                               $all .= $xml->sync->$a->name."<br>";
                           }
                       }
                       $message .= "<tr>"
                        . "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->sync->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->sync->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->rate->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->rate->$a->desc && $xml->rate->$a->desc != null){
                               $all .= $xml->rate->$a->name."<br>";
                           }
                       }
                       $message .= "<tr>"
                        . "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->rate->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->rate->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->graphics->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->graphics->$a->desc && $xml->graphics->$a->desc != null){
                               $all .= $xml->graphics->$a->name."<br>";
                           }
                       }
                       $message .= "<tr>"
                        . "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->graphics->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->graphics->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->profiles->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->profiles->$a->desc && $xml->profiles->$a->desc != null){
                               $all .= $xml->profiles->$a->name."<br>";
                           }
                       }
                       $message .= "<tr>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->profiles->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->profiles->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->project->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->project->$a->desc && $xml->project->$a->desc != null){
                               $all .= $xml->project->$a->name."<br>";
                           }
                       }
                       $message .= "<tr>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->project->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->project->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->wtype->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->wtype->$a->desc && $xml->wtype->$a->desc != null){
                               $all .= $xml->wtype->$a->name."<br>";
                           }
                       }
					   $bg = $arr['type']*1 == 1?$arr['obudget']:$arr['budget'];
                       $message .= "<tr>"
							   . "<td style=' background-color:#efefef; border-bottom:1px dotted #aaa; padding:5px; '>"
							   . "<strong>Website</strong>"
							   . "</td>"
							   . "<td style='background-color:#efefef; border-bottom:1px dotted #aaa; padding:5px;'>"
							   . "$bg&euro;</td>"
							   . "</tr><tr>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->wtype->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->wtype->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->based->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->based->$a->desc && $xml->based->$a->desc != null){
                               $all .= $xml->based->$a->name."<br>";
                           }
                       }
                       $message .= "<tr>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->based->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->based->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->languages->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->languages->$a->desc && $xml->languages->$a->desc != null){
                               $all .= $xml->languages->$a->name."<br>";
                           }
                       }
                       $message .= "<tr>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->languages->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->languages->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->responsive->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->responsive->$a->desc && $xml->responsive->$a->desc != null){
                               $all .= $xml->responsive->$a->name."<br>";
                           }
                       }
                       $message .= "<tr>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->responsive->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->responsive->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->design->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->design->$a->desc && $xml->design->$a->desc != null){
                               $all .= $xml->design->$a->name."<br>";
                           }
                       }
                       $message .= "<tr>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->design->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->design->$answer->name."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                    if(($xml->marketing->description == $title))
                    {
                         $all = "";
                       for($j=1; $j<=5; $j++){
                           $a = "answer$j";
                           if($i == $j)  continue;
                           if($xml->marketing->$a->desc && $xml->marketing->$a->desc != null){
                               $all .= $xml->marketing->$a->name."<br>";
                           }
                       }
                       $message .= "<tr>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'>".$xml->marketing->title."</td>"
                        . "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>".$xml->marketing->$answer->desc."</strong><br>".$all."</td>"
                    . "</tr>";
                    }
                }
                
                
            }
            $message .= "</table>";
        }
        return $message;
    }
	
	function sender($m, $email){
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html;  charset=UTF-8' . "\r\n";

		if(isset($m)){
			if(mail("mailto:customer@winify.com","Estimate your project. Winify",$m,$headers)){
				mail($email,"Estimate your project. Winify",$m,$headers);
				mail("sb@winify.com","Estimate your project. Winify",$m,$headers);
				//header("LOCATION: index.php");
			}
		}
		
	}
	
	function autoSender($m, $ip){
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html;  charset=UTF-8' . "\r\n";

		if(isset($m)){
			if(mail("mailto:mstarniciuc@winify.com","Project estimation | AutoSender [$ip] ",$m,$headers)){
				//mail("mailto:icojuhari@winify.com","Project estimation | AutoSender [$ip] ",$m,$headers);
				
			}
		}
		
	}
?>
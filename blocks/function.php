<?php

error_reporting(E_ERROR | E_WARNING | E_PARS);
ini_set("display_errors", 1);

function questChange($quest) {
	setcookie("SaveChange", $quest, time() + 300);
	header("LOCATION: admin.php");
}

/**
 * Save data into xml file
 */
function saveChangeInXML($quest, $data, $count) {
	$edit = 0;

	if (file_exists('quest.xml')) {
		$xml = simplexml_load_file('quest.xml');

		if ($data[$quest]['title'] != "") {
			if ($xml->$quest->title != $data[$quest]['title']) {
				$edit = 1;
				$xml->$quest->title = $data[$quest]['title'];
			}
		}

		if ($data[$quest]['description'] != "") {
			if ($xml->$quest->description != $data[$quest]['description']) {
				$edit = 1;
				$xml->$quest->description = $data[$quest]['description'];
			}
		}

		for ($i = 1; $i <= $count; $i++) {

			$answer = "answer$i";
			if (isset($data[$quest][$i]['name'])) {
				if ($xml->$quest->$answer->name != $data[$quest][$i]['name']) {
					$edit = 1;
					$xml->$quest->$answer->name = $data[$quest][$i]['name'];
				}
			}

			if (isset($data[$quest][$i]['desc'])) {
				if ($xml->$quest->$answer->desc != $data[$quest][$i]['desc']) {
					$edit = 1;
					$xml->$quest->$answer->desc = $data[$quest][$i]['desc'];
				}
			}

			if (isset($data[$quest][$i]['hour'])) {
				if ($xml->$quest->$answer->hour != $data[$quest][$i]['hour']) {
					$edit = 1;
					$xml->$quest->$answer->hour = $data[$quest][$i]['hour'];
				}
			}

			if (isset($data[$quest][$i]['percent'])) {
				if ($xml->$quest->$answer->percent != $data[$quest][$i]['percent']) {
					$edit = 1;
					$xml->$quest->$answer->percent = $data[$quest][$i]['percent'];
				}
			}
		}
	} else {
		exit('Failed to open xml');
	}

	if ($edit == 1) {
		return $xml->saveXML('quest.xml');
	} else {
		return 0;
	}
}

/**
 * Save new price
 */
function saveNewPrice($p) {
	if (file_exists('quest.xml')) {
		$xml = simplexml_load_file('quest.xml');
		$xml->price = $p;
	} else {
		exit("Failed to open xml");
	}

	return $xml->asXML('quest.xml');
}

/**
 * Load data from xml file. 
 */
function loadFromXML() {
	if (file_exists('quest.xml')) {
		$xml = simplexml_load_file('quest.xml');
	}
	return $xml;
}

/**
 * Read data from post method.
 */
function readPost($quest, $countAnswer) {

	if ($_POST['qestTitle'] != "") {
		$data[$quest]['title'] = $_POST['qestTitle'];
	}

	if ($_POST['qestDescription'] != "") {
		$data[$quest]['description'] = $_POST['qestDescription'];
	}

	for ($i = 1; $i <= $countAnswer; $i++) {
		if ($_POST['answeName' . $i] != "") {
			$data[$quest][$i]['name'] = $_POST['answeName' . $i];
		}
		if ($_POST['answeHour' . $i] != "") {
			$data[$quest][$i]['hour'] = $_POST['answeHour' . $i];
		}
		if ($_POST['answeDesc' . $i] != "") {
			$s = str_replace("+", "-", $_POST['answeDesc' . $i]);
			$data[$quest][$i]['desc'] = $_POST['answeDesc' . $i];
		}
		if ($_POST['answePercent' . $i] != "") {
			$p = ($_POST['answePercent' . $i] * 1) / 100;
			if ($p < 1 && $p > 0) {
				$p += 1;
			}
			$data[$quest][$i]['percent'] = $p;
		}
	}

	return $data;
}

function makeMail($data, $arr) {
	if (file_exists('quest.xml')) {
		$xml = simplexml_load_file('quest.xml');

		$quest = 'device';
		$message = "<table style='border: none; border-collapse: collapse; color:#222; margin-bottom:30px; width:600px;'>"
				. "<tr>"
				. "<td style=' background-color:#efefef; border-bottom:1px solid #ccc; padding:5px; '><strong>Client info</strong></td>"
				. "<td style=' background-color:#efefef; border-bottom:1px solid #ccc; padding:5px; '></td>"
				. "</tr>"
				. "<tr>"
				. "<td style=' background-color:#fafafa; border-bottom:1px solid #ccc; padding:5px; '>Client name:</td>"
				. "<td style=' background-color:#fafafa; border-bottom:1px solid #ccc; padding:5px; color:#0BB5FF; '>$arr[name]</td>"
				. "</tr>"
				. "<tr>"
				. "<td style=' background-color:#fafafa; border-bottom:1px solid #ccc; padding:5px; '>Client email:</td>"
				. "<td style=' background-color:#fafafa; border-bottom:1px solid #ccc; padding:5px; color:#0BB5FF;'>$arr[email]</td>"
				. "</tr>"
				. "<tr>"
				. "<td style=' background-color:#fafafa; border-bottom:1px solid #ccc; padding:5px; '>Client message:</td>"
				. "<td style=' background-color:#fafafa; border-bottom:1px solid #ccc; padding:5px; color:#0BB5FF;'>$arr[message]</td>"
				. "</tr>"
				. "</table>";
		$message .= "<table style='border:none; border-collapse: collapse; color:#444; width:600px;'>";

		foreach ($data as $title => $reply) {

			if ($xml->device->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->device->$a->desc ==  $reply) {
						$all .= $xml->device->$a->name . "<br>";
					}elseif($xml->device->$a->desc & $xml->device->$a->desc !=null){
						$all .= $xml->device->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->device->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->type->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->type->$a->desc ==  $reply) {
						$all .= $xml->type->$a->name . "<br>";
					}elseif($xml->type->$a->desc & $xml->type->$a->desc !=null){
						$all .= $xml->type->$a->name . "<br>";
					}
				}
				$bg = $arr['type'] * 1 == 1 ? $arr['budget'] : $arr['obudget'];
				$message .= "<tr>"
						. "<td style=' background-color:#efefef; border-bottom:1px dotted #aaa; padding:5px; '>"
						. "<strong>Application</strong>"
						. "</td>"
						. "<td style='background-color:#efefef; border-bottom:1px dotted #aaa; padding:5px;'>" . $bg
						. "&euro;</td>"
						. "</tr><tr>" . "<td style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->type->title . "</td>"
						. "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>". $all . "</td>"
						. "</tr>";
			}
			if ($xml->interface->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->interface->$a->desc ==  $reply) {
						$all .= $xml->interface->$a->name . "<br>";
					}elseif($xml->interface->$a->desc & $xml->interface->$a->desc !=null){
						$all .= $xml->interface->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->interface->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->payments->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->payments->$a->desc ==  $reply) {
						$all .= $xml->payments->$a->name . "<br>";
					}elseif($xml->payments->$a->desc & $xml->payments->$a->desc !=null){
						$all .= $xml->payments->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->payments->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->login->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->login->$a->desc ==  $reply) {
						$all .= $xml->login->$a->name . "<br>";
					}elseif($xml->login->$a->desc & $xml->login->$a->desc !=null){
						$all .= $xml->login->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->login->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->sync->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->sync->$a->desc ==  $reply) {
						$all .= $xml->sync->$a->name . "<br>";
					}elseif($xml->sync->$a->desc & $xml->sync->$a->desc !=null){
						$all .= $xml->sync->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->sync->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->rate->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->rate->$a->desc ==  $reply) {
						$all .= $xml->rate->$a->name . "<br>";
					}elseif($xml->rate->$a->desc & $xml->rate->$a->desc !=null){
						$all .= $xml->rate->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->rate->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->graphics->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->graphics->$a->desc ==  $reply) {
						$all .= $xml->graphics->$a->name . "<br>";
					}elseif($xml->graphics->$a->desc & $xml->graphics->$a->desc !=null){
						$all .= $xml->graphics->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->device->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->profiles->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->profiles->$a->desc ==  $reply) {
						$all .= $xml->profiles->$a->name . "<br>";
					}elseif($xml->profiles->$a->desc & $xml->device->$a->desc !=null){
						$all .= $xml->profiles->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->profiles->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->project->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->project->$a->desc ==  $reply) {
						$all .= $xml->project->$a->name . "<br>";
					}elseif($xml->project->$a->desc & $xml->device->$a->desc !=null){
						$all .= $xml->project->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->project->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->wtype->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->wtype->$a->desc ==  $reply) {
						$all .= $xml->wtype->$a->name . "<br>";
					}elseif($xml->wtype->$a->desc & $xml->wtype->$a->desc !=null){
						$all .= $xml->wtype->$a->name . "<br>";
					}
				}
				$bg = $arr['type'] * 1 == 1 ? $arr['obudget'] : $arr['budget'];
				$message .= "<tr>"
						. "<td style=' background-color:#efefef; border-bottom:1px dotted #aaa; padding:5px; '>"
						. "<strong>Website</strong>"
						. "</td>"
						. "<td style='background-color:#efefef; border-bottom:1px dotted #aaa; padding:5px;'>"
						. "$bg&euro;</td>"
						. "</tr><tr>"
						. "<td style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->wtype->title . "</td>"
						. "<td style='border-bottom:1px dotted #aaa; padding:5px;'><strong>" . $xml->wtype->$answer->name . "</strong><br>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->based->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->based->$a->desc ==  $reply) {
						$all .= $xml->based->$a->name . "<br>";
					}elseif($xml->based->$a->desc & $xml->based->$a->desc !=null){
						$all .= $xml->based->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->based->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->languages->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->languages->$a->desc ==  $reply) {
						$all .= $xml->languages->$a->name . "<br>";
					}elseif($xml->languages->$a->desc & $xml->device->$a->desc !=null){
						$all .= $xml->languages->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->languages->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->responsive->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->responsive->$a->desc ==  $reply) {
						$all .= $xml->responsive->$a->name . "<br>";
					}elseif($xml->responsive->$a->desc & $xml->device->$a->desc !=null){
						$all .= $xml->responsive->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->responsive->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->design->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->design->$a->desc ==  $reply) {
						$all .= $xml->design->$a->name . "<br>";
					}elseif($xml->design->$a->desc & $xml->design->$a->desc !=null){
						$all .= $xml->design->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->design->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->marketing->title == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->marketing->$a->desc ==  $reply) {
						$all .= $xml->marketing->$a->name . "<br>";
					}elseif($xml->marketing->$a->desc & $xml->marketing->$a->desc !=null){
						$all .= $xml->marketing->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->marketing->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
		}

		$message .= "</table>";
	}
	return $message;
}

function sender($m, $email) {
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html;  charset=UTF-8' . "\r\n";

	if (isset($m)) {
		if (mail("mailto:customer@winify.com", "Estimate your project. Winify", $m, $headers)) {
			mail($email, "Estimate your project. Winify", $m, $headers);
			mail("sb@winify.com", "Estimate your project. Winify", $m, $headers);
			//header("LOCATION: index.php");
		}
	}
}

function autoSender($m, $ip) {
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html;  charset=UTF-8' . "\r\n";

	if (isset($m)) {
		if (mail("mailto:mstarniciuc@winify.com", "Project estimation | AutoSender [$ip] ", $m, $headers)) {
			//mail("mailto:icojuhari@winify.com","Project estimation | AutoSender [$ip] ",$m,$headers);
		}
	}
}

?>
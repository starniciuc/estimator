<?php

//error_reporting(E_ERROR | E_WARNING | E_PARS);
//ini_set("display_errors", 0);

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
		$actual_link = "$_SERVER[REQUEST_URI]";
		if (strpos($actual_link, 'de') !== false) {
			if (file_exists('quest.xml')) {
				$xml = simplexml_load_file('quest.xml');
			}
		} else {
			if (file_exists('quest-en.xml')) {
				$xml = simplexml_load_file('quest-en.xml');
			}
		}

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
		$actual_link = "$_SERVER[REQUEST_URI]";
		if (strpos($actual_link, 'de') !== false) {
			return $xml->saveXML('quest.xml');
		} else {
			return $xml->saveXML('quest-en.xml');
		}
		
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
		$xml2 = simplexml_load_file('quest-en.xml');
		
		$xml->price = $p;
		$xml2->price = $p;
	} else {
		exit("Failed to open xml");
	}
	$xml2->asXML('quest-en.xml');
	return $xml->asXML('quest.xml');
}

/**
 * Load data from xml file. 
 */
function loadFromXML() {

	$actual_link = "$_SERVER[REQUEST_URI]";
	if (strpos($actual_link, 'de') !== false) {
		if (file_exists('quest.xml')) {
			$xml = simplexml_load_file('quest.xml');
		}
	} else {
		if (file_exists('quest-en.xml')) {
			$xml = simplexml_load_file('quest-en.xml');
		}
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

		$actual_link = "$_SERVER[REQUEST_URI]";
		if (strpos($actual_link, 'de') !== false) {
			if (file_exists('quest.xml')) {
				$xml = simplexml_load_file('quest.xml');
			}
		} else {
			if (file_exists('quest-en.xml')) {
				$xml = simplexml_load_file('quest-en.xml');
			}
		}
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

			if ($xml->device->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->device->$a->desc == $reply) {
						$all .= "<strong>" . $xml->device->$a->name . "</strong><br>";
					} elseif ($xml->device->$a->desc) {
						$all .= $xml->device->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->device->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			
			if ($xml->type->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->type->$a->desc == $reply) {
						$all .= "<strong>" . $xml->type->$a->name . "</strong><br>";
					} elseif ($xml->type->$a->desc) {
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
						. "</tr><tr><td style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->type->title . "</td>"
						. "<td style='border-bottom:1px dotted #aaa; padding:5px;'>" . $all . "</td>"
						. "</tr>";
			}
			
			if ($xml->payments->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->payments->$a->desc == $reply) {
						$all .= "<strong>" . $xml->payments->$a->name . "</strong><br>";
					} elseif ($xml->payments->$a->desc) {
						$all .= $xml->payments->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->payments->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->login->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->login->$a->desc == $reply) {
						$all .= "<strong>" . $xml->login->$a->name . "</strong><br>";
					} elseif ($xml->login->$a->desc) {
						$all .= $xml->login->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->login->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa;'>" . $all . "</td>"
						. "</tr>";
			}

			if ($xml->sync->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->sync->$a->desc == $reply) {
						$all .= "<strong>" . $xml->sync->$a->name . "</strong><br>";
					} elseif ($xml->sync->$a->desc) {
						$all .= $xml->sync->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->sync->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->rate->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->rate->$a->desc == $reply) {
						$all .= "<strong>" . $xml->rate->$a->name . "</strong><br>";
					} elseif ($xml->rate->$a->desc) {
						$all .= $xml->rate->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->rate->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->graphics->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->graphics->$a->desc == $reply) {
						$all .= "<strong>" . $xml->graphics->$a->name . "</strong><br>";
					} elseif ($xml->graphics->$a->desc) {
						$all .= $xml->graphics->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->graphics->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->profiles->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->profiles->$a->desc == $reply) {
						$all .= "<strong>" . $xml->profiles->$a->name . "</strong><br>";
					} elseif ($xml->profiles->$a->desc) {
						$all .= $xml->profiles->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->profiles->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->project->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->project->$a->desc == $reply) {
						$all .= "<strong>" . $xml->project->$a->name . "</strong><br>";
					} elseif ($xml->project->$a->desc) {
						$all .= $xml->project->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->project->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->website->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->website->$a->desc == $reply) {
						$all .= "<strong>" . $xml->website->$a->name . "</strong><br>";
					} elseif ($xml->website->$a->desc) {
						$all .= $xml->website->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->website->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->wtype->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->wtype->$a->desc == $reply) {
						$all .= "<strong>" . $xml->wtype->$a->name . "</strong><br>";
					} elseif ($xml->wtype->$a->desc) {
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
						. "<td style='border-bottom:1px dotted #aaa;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->based->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->based->$a->desc == $reply) {
						$all .= "<strong>" . $xml->based->$a->name . "</strong><br>";
					} elseif ($xml->based->$a->desc) {
						$all .= $xml->based->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->based->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->languages->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->languages->$a->desc == $reply) {
						$all .= "<strong>" . $xml->languages->$a->name . "</strong><br>";
					} elseif ($xml->languages->$a->desc) {
						$all .= $xml->languages->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->languages->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->responsive->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->responsive->$a->desc == $reply) {
						$all .= "<strong>" . $xml->responsive->$a->name . "</strong><br>";
					} elseif ($xml->responsive->$a->desc) {
						$all .= $xml->responsive->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->responsive->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa; '>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->design->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->design->$a->desc == $reply) {
						$all .= "<strong>" . $xml->design->$a->name . "</strong><br>";
					} elseif ($xml->design->$a->desc) {
						$all .= $xml->design->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->design->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->marketing->description == $title) {
				$all = "";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->marketing->$a->desc == $reply) {
						$all .= "<strong>" . $xml->marketing->$a->name . "</strong><br>";
					} elseif ($xml->marketing->$a->desc) {
						$all .= $xml->marketing->$a->name . "<br>";
					}
				}

				$message .= "<tr>"
						. "<td  style='border-bottom:1px dotted #aaa; padding:5px;'>" . $xml->marketing->title . "</td>"
						. "<td  style='border-bottom:1px dotted #aaa;'>" . $all . "</td>"
						. "</tr>";
			}
			if ($xml->interface->description == $title) {
				$all = " ";
				for ($j = 1; $j <= 5; $j++) {
					$a = "answer$j";
					if ($xml->interface->$a->desc == $reply) {
						$all .= "<strong>" . $xml->interface->$a->desc . "</strong><br>";
					} elseif ($xml->interface->$a->desc) {
						$all .= $xml->interface->$a->desc . "<br>";
					}
				}
				$message .= "<tr><td style='border-bottom:1px dotted #aaa;'>" . $xml->interface->title
						. "</td><td style='border-bottom:1px dotted #aaa;'>" . $all
						. "</td></tr>";
			}
		}

		$message .= "</table>";
	}
	return $message;
}

function sender($m, $email, $v2) {
	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html;  charset=UTF-8' . "\r\n";
	$subject =  $v2?"Estimate your project. Winify-B":"Estimate your project. Winify";
	if (isset($m)) {
		if (mail("mailto:customer@winify.com", $subject , $m, $headers)) {
			mail($email, "Estimate your project. Winify", $m, $headers);
			//mail("sb@winify.com", $subject, $m, $headers);
			echo $subject;
			//header("LOCATION: index.php");
		}
	}
}

function autoSender($m, $ip) {

	$headers .= 'Content-type: text/html;  charset=UTF-8' . "\r\n";

	if (isset($m)) {
		if (mail("mailto:customer@winify.com", "Project estimation | AutoSender [$ip] ", $m, $headers)) {
			//mail("mailto:sb@winify.com", "Project estimation | AutoSender [$ip] ", $m, $headers);
		}
	}
}

?>
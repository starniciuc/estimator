<?php

require_once 'blocks/function.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['send'] == 'sendMail') {
	$message = "<html><head></head><body>";
	$selected = isset($_POST['before']) ? $_POST['before'] . "/-/" : "";
	$selected .= isset($_POST['values']) ? $_POST['values'] : "";

	$selectedDesc = isset($_POST['beforeDesc']) ? $_POST['beforeDesc'] . "/-/" : "";
	$selectedDesc .= isset($_POST['valuesDesc']) ? $_POST['valuesDesc'] : "";

	$sel_desc = explode('/-/', $selectedDesc);
	$sel = explode('/-/', $selected);
		
	$select = array_combine($sel_desc, $sel);
	
	$arr = array(
		'name' => $_POST['ClientName'],
		'email' => $_POST['EMAIL'],
		'message' => $_POST['mess'],
		'obudget' => isset($_POST['obudget']) ? $_POST['obudget'] : "0",
		'budget' => $_POST['budget'],
		'type' => isset($_POST['type']) ? $_POST['type'] : "0"
	);
	$message .= makeMail($select, $arr);
	$message .= "</body></html>";
	$ver = $_POST['versionB'] ? true : false;
	sender($message, $_POST['EMAIL'], $ver);
}
?>
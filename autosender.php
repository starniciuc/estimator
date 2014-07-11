<?php
require_once 'blocks/function.php';

$message = "<html><head></head><body>";
$selected = isset($_POST['before']) ? $_POST['before'] . "+" : "";
$selected .= isset($_POST['values']) ? $_POST['values'] : "";

$arr = array(
	'name' => "IP-".$_SERVER['REMOTE_ADDR'],
	'email' => "no-email",
	'message' => $_POST['mess'],
	'obudget' => isset($_POST['obudget']) ? $_POST['obudget'] : "0",
	'budget' => $_POST['budget'],
	'type' => isset($_POST['type']) ? $_POST['type'] : "0"
);
$message .= makeMail($selected, $arr);
$message .= "</body></html>";

autoSender($message);

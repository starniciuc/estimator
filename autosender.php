<?php
require_once 'blocks/function.php';

$message = "<html><head></head><body>";
$selected = isset($_POST['before']) ? $_POST['before'] . "+" : "";
$selected .= isset($_POST['values']) ? $_POST['values'] : "";

$arr = array(
	'name' => $_SERVER['HTTP_X_FORWARDED_FOR'],
	'email' => "no-email",
	'message' => "This message is auto send",
	'obudget' => isset($_POST['obudget']) ? $_POST['obudget'] : "0",
	'budget' => $_POST['budget'],
	'type' => isset($_POST['type']) ? $_POST['type'] : "0"
);
$message .= makeMail($selected, $arr);
$message .= "</body></html>";

autoSender($message, $_SERVER['HTTP_X_FORWARDED_FOR']);

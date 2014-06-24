<?php
require_once 'blocks/function.php';
////echo $_GET['type']."<br>";
////echo $_GET['features']."<br>";
////$selected = explode('+',$_GET['features']);
//
//$selected = isset($_POST['before'])?$_POST['before']."+":"";
//$selected .= isset($_POST['values'])?$_POST['values']:"";
//
////$before = "Mobile device+Default Interface+Social Login+In app payments+Device Sync+User Profiles+Ratings/Reviews+At the idea stage++";
////$values = "Informational website+Website based on CMS+One language+Website to be responsive+Graphic-Design assistance+Marketing+At the idea stage+";
////$selected = $before.$values;
////echo "<strong>Client name:</strong> ".$_POST['ClientName']."<br>";
////echo "<strong>Client EMAIL:</strong> ".$_POST['EMAIL']."<br>";
////echo "<strong>Client Message:</strong> ".$_POST['mess']."<br><br>";
////echo "<strong>Estimate price for 1:</strong> ".$_POST['obudget']."<br>";
////echo "<strong>Estimate price for 2:</strong> ".$_POST['budget']."<br><br>";
//$arr = array(
//	'name' => $_POST['ClientName'],
//	'email' => $_POST['EMAIL'],
//	'message' => $_POST['mess'],
//	'obudget' => isset($_POST['obudget'])?$_POST['obudget']:"0",
//	'budget'=> $_POST['budget'],
//	'type' => isset($_POST['type'])?$_POST['type']:"0"
//);
//echo makeMail($selected, $arr);
////echo $_GET['budget']."<br>";

if($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['send'] == 'sendMail'){
		$message = "<html><head></head><body>";
		$selected = isset($_POST['before'])?$_POST['before']."+":"";
		$selected .= isset($_POST['values'])?$_POST['values']:"";

		$arr = array(
			'name' => $_POST['ClientName'],
			'email' => $_POST['EMAIL'],
			'message' => $_POST['mess'],
			'obudget' => isset($_POST['obudget'])?$_POST['obudget']:"0",
			'budget'=> $_POST['budget'],
			'type' => isset($_POST['type'])?$_POST['type']:"0"
		);
		$message .= makeMail($selected, $arr);
		$message .= "</body></html>";
		
		sender($message, $_POST['EMAIL']);
		echo "Succes";
		}

?>
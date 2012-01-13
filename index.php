<?php
// WordBot
require_once("../../dev.php"); // REMEMBER TO CHANGE THE DATABASE!


$page = $core->clean($_GET['page']);
include ("includes/header.php"); // HTML Stuff

if($page)  // Check for an input
{
		if(file_exists("content/" . $page . '.php')) {
			$thepage = "content/" . $page . '.php';
		} else {
			$thepage = "content/". 'error.php'; 
		}
} else {
	$thepage = "content/" . 'home.php';
}
include($thepage); // Main Content

include ("includes/footer.php"); // HTML Stuff

?>
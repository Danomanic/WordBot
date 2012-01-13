<?php
// WordBot
require_once("includes/glob.php");

$page = $core->clean($_GET['page']);

if($page)  // Check for an input
{
		if(file_exists("ajax/" . $page . '.php')) {
			$thepage = "ajax/" . $page . '.php';
		} else {
			$thepage = "ajax/". 'error.php'; 
		}
		
		include($thepage); // Main Content
} 

?>
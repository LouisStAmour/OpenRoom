<?php
	session_start();
	
	include("includes/or-theme.php");
	
	//Check for and enforce SSL
	// NB Should put server-port in configuration.php GS
	if($settings["https"] == "true" && $_SERVER["SERVER_PORT"] != "443"){
		header("HTTP/1.1 301 Moved Permanently");
		header("Location: https://". $settings["instance_url"]);
		exit();
	}
	
	include($_SESSION["themepath"] ."header.php");
	
	
	if(!(isset($_SESSION["username"])) || $_SESSION["username"] == ""){
		include("modules/login.php");
	}
	elseif($_SESSION["systemid"] == "" || !(isset($_SESSION["systemid"])) || $_SESSION["systemid"] != $settings["systemid"]){
		include("modules/login.php");
	}
	else{
		include($_SESSION["themepath"] ."content.php");
	}
	
	include($_SESSION["themepath"] ."footer.php");
?>

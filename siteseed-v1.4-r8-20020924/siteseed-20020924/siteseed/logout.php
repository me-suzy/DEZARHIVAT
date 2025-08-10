<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: logout.php
Last modified: 20013103

***************************************/ 
require_once "whoisthis.php";
require_once "include/db_connect.php";

if ($session_id)
{
	// we dont want quotes in session_id, do we?
	$session_id = AddSlashes(StripSlashes($session_id));
	
	// clean the database entry
	$query = mysql_query ("	UPDATE users SET session_id='' WHERE session_id='$session_id'");
	
	// kill the damn cookie
	setcookie ("session_id");
	
	# Data Mining
	recordsession("logout.php","ok",$HTTP_USER_AGENT,$remoteip,$datamining);	
}

// go back to homepage
header ("Location: index.php");
?>

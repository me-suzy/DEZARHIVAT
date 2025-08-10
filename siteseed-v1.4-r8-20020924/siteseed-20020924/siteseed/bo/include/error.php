<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/include/error.php
Last modified: 20013103

***************************************/


function error ($string) 
{
	// log ("logname", $string)
	print nl2br("<li> $string");
	
	exit;
}
?>

<?
/**************************************
Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: whoisthis.php
Last modified: 20020420 (security code audit by pls)
Category: publicly accessible file that can be called directly.
***************************************/
require_once "config.php";

if($datamining=="on")
{
	$sessionid=ereg_replace('/', '', $sessionid);
	$sessionid=ereg_replace('\.', '', $sessionid);
	$sessionid=ereg_replace('\'', '', $sessionid);
	$sessionid=ereg_replace('"', '', $sessionid);
	
	$lifetime=time() + 8640*30*3650; # track users for 10 years
	
	if(strlen($sessionid)>5)	#session exists
	{
		setcookie("sessionid", "$sessionid", $lifetime, "/", "$HTTP_SERVER_VARS[SERVER_NAME]");
		$allowwrite=1;
	}
	else
	{
		if ($REMOTE_ADDR == "127.0.0.1") {     $remoteip=$HTTP_X_FORWARDED_FOR; } else {   $remoteip=$REMOTE_ADDR; }
		$newsessionid=md5(time() . "$remoteip");
		setcookie("sessionid", "$newsessionid", $lifetime, "/", "$HTTP_SERVER_VARS[SERVER_NAME]");
		$sessionid=$newsessionid;
	}
}

function recordsession($origen="", $action="",$user_agent="",$remote="",$datamining="")
{
	if($datamining=="on")
	{
		$dia=date ("Ymd");
		global $sessionid;
		global $allowwrite;
		
		if($allowwrite>0)
		{	
			if(!file_exists("dm/$dia"))
			{
				mkdir("dm/$dia", 0777);
			}
			
			if($file=fopen("dm/$dia/$sessionid", "a"))
			{
				$string=gmdate("M d Y H:i:s") . "\t$remote\t$origen\t$user_agent\t$action\n";
				fwrite($file, $string, strlen($string));
				fclose($file);
			}
		}
	}
}
?>

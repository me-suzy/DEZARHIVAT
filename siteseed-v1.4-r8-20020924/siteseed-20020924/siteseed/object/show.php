<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: object/show.php
Last modified: 20013103

***************************************/

require_once "config.php";
require_once "article/comon.php";
require_once "include/box.php";

$headid=$headline;
$headid=addslashes($headid);

if($headid==0)	{$headid=1;}

if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
	mysql_select_db (DB_NAME);
	
	$content="";	
	
#
# Am I in cache?
#
	$cached=mysql_query("SELECT content from CACHE where cachetype=0 and id=$headid and expire_on>now()");
	while($row = mysql_fetch_object($cached))
	{
		$content=		$row -> content;
	}			
	
	if( strlen($content)>0 )
	{
		if($evalme==1)
		{
			eval ("?>$content<?");
			$evalme=0;
		}
		else
		{
			print "$content";
		}		
	}
	else
	{
		$hl_content="";

		if($headid>0)
		{
#
# Load the headline base settings
#
			
			if($result=mysql_query("SELECT * from HEADLINEbase where id=$headid", $dblink))
			{
				while($row = mysql_fetch_object($result))
				{
					$hl_title=		$row -> title;  
					$hl_content=		$row -> content;
				}			
			}
			else
			{
				print "Error: no such object ($headid).";
				exit;
			}
		}
		
		if($renderer_declared<1)
		{
			require "object/renderer.php";
		}
		
		$content=renderer($hl_content,$visual,$area_id,$headline);

                if($evalme==1)
                {
                        eval ("?>$content<?");
			$evalme=0; 
                }
		else
		{
			print "$content";
		}
		
#
# Cache me pleeeease
#
		if($HEADLINE_CACHE>0)
		{
			mysql_query("DELETE from CACHE where cachetype=0 and expire_on<now()");
			$content=stripslashes($content);
			$content=addslashes($content);
			mysql_query("INSERT into CACHE 
			SET cachetype=0,
			id=$headid, 
			content='$content', 
			expire_on=DATE_ADD( now(), interval $HEADLINE_CACHE minute)");
		}
	}
}			
?>

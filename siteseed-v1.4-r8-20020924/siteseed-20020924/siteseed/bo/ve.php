<?
require "whoisthis_bo.php";
require_once "../config.php";
require "./staff_details.php";
require "../include/strings.php";

$whoami=$_SERVER['REMOTE_USER'];
$id=addslashes($id);
?>
<HTML><HEAD><TITLE>HTML editor</TITLE></head><body><?
$field_name = "ve";

if($editor_height<300)
{
	$editor_height = 300;
}
if($editor_width<750)
{
	$editor_width= 750;
}
$action_submit = "article_write.php";

if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
	if($result=mysql_db_query("$projecto","SELECT stuff from ARTICLEcontent where artigo=$id and type=$field", $dblink))
	{
		if($result)
		{			
			while($row = mysql_fetch_object($result))
			{
				$conteudo=                $row -> stuff;
			}
		}
	}
	
	
}
else
{
	exit();
}


$conteudo=ereg_replace("\n", "<br>", $conteudo);
$conteudo=ereg_replace("\r", "", $conteudo);

$content_inicial = "$conteudo";
print "<center>";
require "visual_editor.php";
print "</center>";
#print htmlentities($conteudo);

# Data Mining
$string="";
reset($HTTP_GET_VARS);
$key=key($HTTP_GET_VARS);
$value=current($HTTP_GET_VARS);
while( list($key,$value) = each($HTTP_GET_VARS) )
{
	$string.="$key\t$value\t";
}
recordsession_bo("ve.php",$string,$_SERVER['REMOTE_USER'],$HTTP_USER_AGENT,$_SERVER['REMOTE_ADDR'],$datamining);

?></body>

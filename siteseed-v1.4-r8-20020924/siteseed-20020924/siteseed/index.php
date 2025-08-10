<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: index.php
Last modified: 20020420 (security code audit by pls)
Category: publicly accessible file that can be called directly.

***************************************/ 
require "whoisthis.php";

# am I on disk?
$QUERY_STRING = $_SERVER["QUERY_STRING"];

$QUERY_STRING=ereg_replace("\.", "", $QUERY_STRING);
$QUERY_STRING=ereg_replace("/", "", $QUERY_STRING);
$QUERY_STRING=ereg_replace("'", "", $QUERY_STRING);
$QUERY_STRING=ereg_replace("&", "", $QUERY_STRING);
$QUERY_STRING=ereg_replace("=", "", $QUERY_STRING);

# Data Mining
$string="";
reset($HTTP_GET_VARS);
$key=key($HTTP_GET_VARS);
$value=current($HTTP_GET_VARS);
while( list($key,$value) = each($HTTP_GET_VARS) )
{
	$string.="$key\t$value\t";
}
recordsession("index.php",$string,$HTTP_USER_AGENT,$remoteip,$datamining);

if(strlen($QUERY_STRING)==0) {	$quepagina="homepage";	}
else			{	$quepagina=$QUERY_STRING;	}

$cachetime=0;
if($cacher[$quepagina]>0)	{	$cachetime=$cacher[$quepagina];	}
else 				{	$cachetime=$GLOBAL_CACHE;	}


if($cachetime>0 && $REQUEST_METHOD != "POST" && !$session_id)
{
	if(file_exists("$pathtodm" . "cache/$quepagina"))
	{
		# is the cache still valid OR database server is unavailable?
		if(filemtime("$pathtodm" . "cache/$quepagina")+$cachetime > time() or !mysql_pconnect(DB_HOST, DB_USER, DB_PASSWORD))
		{
			if($file=fopen("$pathtodm" . "cache/$quepagina", "r"))	
			{
				fpassthru($file);
				exit();
			}
		}
		else
		{
			$ACTIVE_CACHE=1;
			ob_start("make_output");
		}
	}
	else
	{
		$ACTIVE_CACHE=1;
		ob_start("make_output");
	}
}

# this is called on recordings...
function make_output($buffer) 
{
}

require "include/db_connect.php";
require "bo/include/defaults.php";
require "include/users.php";

if($optimize_html>0)
{
	require_once "include/optimizer.php";
}

$skin+=0;
$visual+=0;
if(!$skin){$skin=$visual;}


# Insert a comment if a comment's form is submited

if(!$pubcom_nome){$pubcom_nome="";}
if(!$pubcom_email){$pubcom_email="";}
if(!$pubcom_class){$pubcom_class=0;}
if(!$pubcom_title){$pubcom_title="";}
if(!$pubcom_texto){$pubcom_texto="";}

$pubcom_class+=0;
$pubcom_nome=str_replace("\'","`",$pubcom_nome);
$pubcom_email=str_replace("\'","`",$pubcom_email);
$pubcom_title=str_replace("\'","`",$pubcom_title);
$pubcom_texto=str_replace("\'","`",$pubcom_texto);
$pubcom_nome=str_replace("#","`",$pubcom_nome);
$pubcom_email=str_replace("#","`",$pubcom_email);
$pubcom_title=str_replace("#","`",$pubcom_title);
$pubcom_texto=str_replace("#","`",$pubcom_texto);
$pubcom_nome=addslashes($pubcom_nome);
$pubcom_email=addslashes($pubcom_email);
$pubcom_title=addslashes($pubcom_title);
$pubcom_texto=addslashes($pubcom_texto);
$article_comment+=0;

if($pubcom_nome!="" && $session_id) $pubcom_nome.=$PUBCOM_NOME_FLAG;


if($article_comment)
{
	mysql_query("INSERT into ARTICLEpubcom SET article='$article_comment',aprovado=0,submission_on=now(),nome='$pubcom_nome',email='$pubcom_email',class=$pubcom_class,title='$pubcom_title',texto='$pubcom_texto'");
}

# objects are not evaluated by default...
$evalme=0;

if (	isset($id) && $visual<1 && $article<1 && $headline<1 && $anuncio<1) 
{
	// validate data
	$id += 0;
	
	// fetch section data
	$query = mysql_query ("	SELECT name, section_type, type_id, url, skin FROM areas WHERE id=$id");
	if (!$query) 
        { 
		exit; 
	}
	else if (mysql_num_rows($query))
	{
		list ( $area_name, $section_type, $type_id, $url, $skin ) = mysql_fetch_row ($query);
		
		$name = StripSlashes ($name);
		$url = StripSlashes ($url);
	}
	
	// fetch skin data
	if (!$skin) $skin = 1;
	
	$query = mysql_query ("SELECT prefix, suffix FROM skins WHERE id=$skin");
	
	if (!$query)
        { 
		exit; 
	}
	else if (mysql_num_rows($query))
	{
		list ($prefix, $suffix) = mysql_fetch_row ($query);
		
		$prefix = StripSlashes ($prefix);
		$suffix = StripSlashes ($suffix);
	}
}
else
{
	if($headline) 
	{
		$section_type = 1; 
		$type_id = $headline;
		
	}
	else if($article)
	{
		$section_type = 2;
		$type_id = $article;
		
	}
	else if($anuncios)
	{
		$section_type = 3; 
		$type_id = $anuncios;
	}
	else 
	{
		$area_name = read_config ("main title");
		$section_type = read_config ("main section type");
		$type_id = read_config ("main type id");
		$skin = read_config ("main skin");		
	}
	
	
	$section_type += 0;
	$type_id += 0;
	$skin += 0;
	
	$query = mysql_query ("	SELECT prefix, suffix FROM skins WHERE id=$skin");
	
	if (!$query)
        { 
		exit; 
	}
	else if (mysql_num_rows($query))
	{
		list ($prefix, $suffix) = mysql_fetch_row ($query);
		
		$prefix = StripSlashes ($prefix);
		$suffix = StripSlashes ($suffix);
	}
}



// if there's an optional url, redirect the user
if ($url) header ("Location: $url");
else 
{
        if($optimize_html>0)	{	$prefix=optimizer($prefix);	}
	eval ("?>$prefix<?");
	
	$visual = $skin;
	$area_id = $id;
	
	switch ($section_type) 
	{
		case 1:
		$headline = $type_id;
		require "object/show.php";
		break;
		case 2:
		$article = $type_id;
		require "article/show.php";
		break;
		case 3:
		$anuncio = $type_id;
		require "article/search.php";
		break;
	}
	
	if($article_comment)
	{
		$agradecimento  = "<center><br><table width=50%><tr><td>";
		$agradecimento .= box("$AGRADECIMENTOBOX","",$AGRADECIMENTOPUBCOM,"","",1);
		$agradecimento .= "</td></tr></table><br><CENTER>";	
		print($agradecimento);
		
	}
	
        if($optimize_html>0)	{	$suffix=optimizer($suffix);	}
	eval ("?>$suffix<?");
	
	if($ACTIVE_CACHE==1)	
	{
		$new_version_output=ob_get_contents(); 
		ob_end_flush();	
		echo "$new_version_output";
		if($file=fopen("$pathtodm" . "cache/$quepagina", "w"))
		{
			fwrite($file, "$new_version_output", strlen($new_version_output));
			fclose($file);
		}
	}
}
?>

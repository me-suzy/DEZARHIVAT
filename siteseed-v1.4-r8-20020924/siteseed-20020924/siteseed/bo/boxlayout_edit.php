<?
require "whoisthis_bo.php";
require_once "../config.php";
require_once "../include/box.php";
$minstatus=3;
$op=0;
$det=2; 
require_once "./staff_details.php";
require_once "../include/strings.php";
require "../include/strings.php"
?>

<HTML>
<BODY>

<TITLE><? print "$strArticlesLayout" ?></TITLE>

<?

$counter=1;
$alldone=0;
$serial=0;
$id +=0;

?>		
<center><a href=index.php?listar=boxlayout><? echo "$strList"; ?></a></center>
<?
if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
	$macros ="<tr><td bgcolor=#AAAAAA align=left><b>\$0\$</b></td><td bgcolor=#AAAAAA align=right>$strArticleTitle</td><tr>";
	
	while($alldone==0)
	{
		$result=mysql_db_query("$projecto","SELECT * from ARTICLEtypetxt where serial=$counter", $dblink);
		
		$gotdefs=0;
		while($row = mysql_fetch_object($result))
		{
			if($row -> serial == $counter)  # we have data
			{
				$serial=		$row -> serial;
				$legenda=		$row -> legenda;				
				$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$$serial\$</b></td><td bgcolor=#AAAAAA align=right>$legenda</td><tr>";
				$gotdefs=1;
			}
		}			
		
		if($serial<$counter)
		{
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$ds\$</b></td><td bgcolor=#AAAAAA align=right>$strSubmissionDate</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$da\$</b></td><td bgcolor=#AAAAAA align=right>$strAprovallDate</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$dc\$</b></td><td bgcolor=#AAAAAA align=right>$strLastChangedDate</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$days_dc\$</b></td><td bgcolor=#AAAAAA align=right>$strElapsedLastChangedDate</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$autor\$</b></td><td bgcolor=#AAAAAA align=right>$strAuthorLogin</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$autornome\$</b></td><td bgcolor=#AAAAAA align=right>$strAuthorName</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$autormail\$</b></td><td bgcolor=#AAAAAA align=right>$strAuthorMail</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$classificacao\$</b></td><td bgcolor=#AAAAAA align=right>$strClassification</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$id\$</b></td><td bgcolor=#AAAAAA align=right>$strArticleId</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$link\$</b></td><td bgcolor=#AAAAAA align=right>$strArticleLink</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$pubcom\$</b></td><td bgcolor=#AAAAAA align=right>$strArticleVotes</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$pubcom_nr\$</b></td><td bgcolor=#AAAAAA align=right>$strPubcom_nrExplained</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$approved_pubcom_nr\$</b></td><td bgcolor=#AAAAAA align=right>$strApproved_pubcom_nrExplained</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$print\$</b></td><td bgcolor=#AAAAAA align=right>$strPrintArticle</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$send\$</b></td><td bgcolor=#AAAAAA align=right>$strSendArticle</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$pageticker_prev\$</b></td><td bgcolor=#AAAAAA align=right>$strPageTickerPrev</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$pageticker_pause\$</b></td><td bgcolor=#AAAAAA align=right>$strPageTickerPause</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$pageticker_next\$</b></td><td bgcolor=#AAAAAA align=right>$strPageTickerNext</td><tr>";
			$macros .="<tr><td bgcolor=#AAAAAA align=left><b>\$checkfield</b><i>n1,n2,...,nn</i><b>\$</b></td><td bgcolor=#AAAAAA align=right>$strCheckfieldMacroExplained</td><tr>";
			$alldone=1;
		}
		$counter++;
	}
	
	
	
	
	
	
	
	$serial=0;
	$alldone=0;
	$counter=1;
	
	print "<table width=0% border=0 cellpadding=20><tr><td width=100% valign=\"top\">";
	
	print "<table width=0% border=0 cellpadding=20><tr><td width=50% valign=\"top\">";
	
#
# load the available setup...
#
	$result=mysql_db_query("$projecto","SELECT * from ARTICLEboxsetup where serial=$id", $dblink);
	
	$gotdefs=0;
	while($row = mysql_fetch_object($result))
	{
		if($row -> serial == $id)  # we have settings
		{
			$serial=		$row -> serial;
			$legenda=		$row -> legenda;				
			$title_area=		$row -> title_area;				
			$header_area=		$row -> header_area;				
			$content_area=		$row -> content_area;				
			$footer_area=		$row -> footer_area;				
		}
		
		$gotdefs=1;
	}			
	
	if($gotdefs==0)
	{
		$serial++;
		$legenda="$strNewLayout";			
		$title_area	="";
		$header_area	="";
		$content_area	="";
		$footer_area	="";
		
		
		if($id==0 && $id_new==0) # there is a new data record to be saved!
		{		
#
# Create a record
#
			$result=mysql_db_query("$projecto","INSERT INTO ARTICLEboxsetup SET legenda=\"$legenda\"", $dblink); 
			$id=mysql_insert_id($dblink);
		}
	}
	
#
# Is there new data to replace the preferences?
#
	
	if($id_new>0) # there is data to be saved!
	{
		$id=$id_new;		
		$legenda_new=		addslashes(stripslashes($legenda_new));
		$title_area_new=	addslashes(stripslashes($title_area_new));
		$header_area_new=	addslashes(stripslashes($header_area_new));
		$content_area_new=	addslashes(stripslashes($content_area_new));
		$footer_area_new=	addslashes(stripslashes($footer_area_new));
		
#
#	set record values
#
		$result=mysql_db_query("$projecto","UPDATE ARTICLEboxsetup 
		SET legenda	='$legenda_new',
		title_area	='$title_area_new', 
		header_area	='$header_area_new', 
		content_area='$content_area_new', 
		footer_area	='$footer_area_new'  
		WHERE serial=$id", $dblink);
		
		$serial		=stripslashes($id_new);
		$legenda	=stripslashes($legenda_new);
		$title_area	=stripslashes($title_area_new);
		$header_area	=stripslashes($header_area_new);
		$content_area	=stripslashes($content_area_new);
		$footer_area	=stripslashes($footer_area_new);
		
# delete from the cache all articles using this layout!
		mysql_db_query("$projecto","DELETE FROM CACHE where cachetype=1 and layout=$id", $dblink);
	}
	
	$outputform = "<FORM NAME=\"preferencias\" METHOD=\"post\">";
	$outputform .= "<INPUT NAME=\"id_new\" TYPE=\"hidden\" VALUE=\"$id\">";
	$outputform .= "<b>$strName</b><br><INPUT NAME=\"legenda_new\" TYPE=\"text\" VALUE=\"$legenda\"><br>";
	$outputform .= "<b>$strTitleArea</b> (apenas para caixas com moldura!)<br><TEXTAREA NAME=\"title_area_new\" ROWS=2 COLS=55 WRAP=PHYSICAL>$title_area</TEXTAREA><br>";
	$outputform .= "<b>$strHeaderArea</b><br><TEXTAREA NAME=\"header_area_new\" TYPE=\"textarea\" ROWS=10 COLS=55 WRAP=PHYSICAL>$header_area</TEXTAREA><br>";
	$outputform .= "<b>$strTextArea</b><br><TEXTAREA NAME=\"content_area_new\" TYPE=\"textarea\" ROWS=20 COLS=55 WRAP=PHYSICAL>$content_area</TEXTAREA><br>";
	$outputform .= "<b>$strFooterArea</b><br><TEXTAREA NAME=\"footer_area_new\" TYPE=\"textarea\" ROWS=10 COLS=55 WRAP=PHYSICAL>$footer_area</TEXTAREA><br>";
	$outputform .= "";			
	
	box(	"0",
	"<center<b>$legenda</b> ($id)</center>", 
	"$outputform", 
	"<div align=right><INPUT NAME=\"$strSave\" TYPE=\"submit\" VALUE=\"$strSave\"></div>");
	
	print "</FORM>";
	
	print "</td></tr></table><br>";
	
	
	
	print "</td><td valign=top>";
	
	box(	"0",
	"MACRO</td><td bgcolor=\"#C9C9B5\" align=right>$strShow",
	"</td>$macros<td>");
	
	print "</td></tr></table><br>";
	
}
else
{
	print "ARTICLE: No connection to database";
}

# Data Mining

$string="";
reset($HTTP_POST_VARS);
$key=key($HTTP_POST_VARS);
$value=current($HTTP_POST_VARS);
while( list($key,$value) = each($HTTP_POST_VARS) )
{
	$string.="$key\t$value\t";
}
recordsession_bo("boxlayout_edit.php",$string,$_SERVER['REMOTE_USER'],$HTTP_USER_AGENT,$_SERVER['REMOTE_ADDR'],$datamining);

?>

<BODY>
</HTML>


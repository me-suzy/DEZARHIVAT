<?
require_once "whoisthis_bo.php";
require_once "../config.php";
require_once "../include/box.php";
$minstatus=3;
$op=0;
$det=3;                                                                                               
require_once "./staff_details.php";
require_once "../include/strings.php";
?>

<HTML>
<BODY>

<TITLE>ARTICLE setup - components</TITLE>

<?

$counter=1;
$alldone=0;
$serial=0;


if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
	while($alldone==0)
	{	
#
# Allways load the available components...
#
		$result=mysql_db_query("$projecto","SELECT * from ARTICLEtypetxt where serial=$counter", $dblink);
		
		$gotdefs=0;
		while($row = mysql_fetch_object($result))
		{
			if($row -> serial == $counter)  # we have settings
			{
				$serial=		$row -> serial;
				$legenda=		$row -> legenda;				
				$indexable=		$row -> indexable;
				$ordem=			$row -> ordem;
				$xsize=			$row -> xsize;
				$ysize=			$row -> ysize;
				$dsize=			$row -> dsize;
			}
			
			$gotdefs=1;
		}			
		
		if($gotdefs==0)
		{
			$alldone=1;
			$serial++;
			$legenda="$strUnusedComponent";			
			
			
			if($id_new==$counter) # there is data to be saved!
			{		
#
# Create a record
#
				$result=mysql_db_query("$projecto","INSERT INTO ARTICLEtypetxt SET legenda=\"$legenda\"", $dblink); 
			}
		}
		
#
# Is there new data to replace the preferences?
#
		
		if($id_new==$counter) # there is data to be saved!
		{	
			$legenda_new=stripslashes($legenda_new);
			$legenda_new=addslashes($legenda_new);
			$ordem_new+=0;
			$xsize_new+=0;
			$ysize_new+=0;
			$dsize_new+=0;
			
			if($indexable_new == "on")
			{
				$indexable_new=1;
			}
			else
			{
				$indexable_new=0;
			}
			
#
#	set record values
#
			$result=mysql_db_query("$projecto","UPDATE ARTICLEtypetxt 
			SET legenda	='$legenda_new',
			indexable   ='$indexable_new', 
			ordem   	=$ordem_new, 
			xsize   	=$xsize_new, 
			ysize   	=$ysize_new, 
			dsize   	=$dsize_new 
			WHERE serial=$counter", $dblink);
			
			$serial		=$id_new;
			$legenda	=$legenda_new;
			$indexable	=$indexable_new;
			$ordem		=$ordem_new;
			$xsize		=$xsize_new;
			$ysize		=$ysize_new;
			$dsize		=$dsize_new;
		}
		
		$outputform .= "<br><FORM NAME=\"preferencias\" METHOD=\"get\">";
		$outputform .= "<INPUT NAME=\"id_new\" TYPE=\"hidden\" VALUE=\"$counter\">";
		if($indexable >0)
		{
			$outputform .= "$strSearch <INPUT NAME=\"indexable_new\" TYPE=\"CHECKBOX\" CHECKED> ";
		}
		else
		{
			$outputform .= "$strSearch <INPUT NAME=\"indexable_new\" TYPE=\"CHECKBOX\"> ";
		}
		$outputform .= "<INPUT NAME=\"legenda_new\" TYPE=\"text\" VALUE=\"$legenda\">";
		$outputform .= " $strOrder: <INPUT NAME=\"ordem_new\" TYPE=\"text\" SIZE=3 VALUE=\"$ordem\">";
		$outputform .= " $strColumns: <INPUT NAME=\"xsize_new\" TYPE=\"text\" SIZE=3 VALUE=\"$xsize\">";
		$outputform .= " $strRows: <INPUT NAME=\"ysize_new\" TYPE=\"text\" SIZE=3 VALUE=\"$ysize\">";
		$outputform .= " $strBytes: <INPUT NAME=\"dsize_new\" TYPE=\"text\" SIZE=5 VALUE=\"$dsize\">";
		$outputform .= "<INPUT NAME=\"$strSave\" TYPE=\"submit\" VALUE=\"$strSave\"></FORM>";
		
		$counter++;
	}
	
	print "<center><table width=0% border=0 cellpadding=20><tr><td width=50% valign=\"top\">";
	
	box(	"0",
	"<center><b>$strArticleStructure</b></center>", 
	"<center>$outputform</center>",
	"");
	print "</td></tr></table></center>";
	
}
else
{
	print "ARTICLE: No connection to database";
}

# Data Mining

$string="";
reset($HTTP_GET_VARS);
$key=key($HTTP_GET_VARS);
$value=current($HTTP_GET_VARS);
while( list($key,$value) = each($HTTP_GET_VARS) )
{
	$string.="$key\t$value\t";
}
recordsession_bo("article_componentes.php",$string,$_SERVER['REMOTE_USER'],$HTTP_USER_AGENT,$_SERVER['REMOTE_ADDR'],$datamining);

?>

<BODY>
</HTML>


<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/interfaces/index.php

***************************************/

require "../include/db_connect.php";
require "../../include/strings.php";
require "../include/defaults.php";
require "../../include/users.php";
$minstatus=3;
$op=0;
$det=6;
require "../../bo/staff_details.php";                                                                         


// print menu inside skin if previewing

if ($skin) 
{
	$skin += 0;
	
	$query_skin = mysql_query("SELECT prefix, suffix FROM skins WHERE id=$skin");
	if (!$query_skin) error (mysql_error());
	
	if (mysql_num_rows($query_skin)) list($prefix,$suffix) = mysql_fetch_row($query_skin);
	
	$prefix = StripSlashes($prefix);
	$suffix = StripSlashes($suffix);
	
	eval ("?>$prefix<?");
	
} 
else 
{
	?>
	<html>
	<body bgcolor="#FFFFFF">
	<?
}

?>
<font face="Arial, Helvetica, Sans-serif" size=2>
<?

print "<h2>$strSkinEditor</h2><blockquote>\n";

$query = mysql_query("SELECT id, name FROM skins ORDER BY id");

if ($query) 
{
	$counter = 1;
	
	while (list($id, $name) = mysql_fetch_row($query)) 
	{	
		$name = StripSlashes ($name);
		
		print 	"<p><b>$id. $name</b> ".
		"<font size=1>".
		"[<a href=\"edit.php?id=$id\">$strModify</a>]&nbsp;".
		"[<a href=\"index.php?skin=$id\">$strSee</a>]&nbsp;".
		"[<a href=\"copy.php?id=$id\">$strCopy</a>]&nbsp;".
		"[<a href=\"remove.php?id=$id\" onclick=\"return confirm('$strDelSkinConfirm');\">$strRemove</a>]".
		"</font>".
		"</p>";
		
		$counter++;
	}
}
?>
</blockquote>
[<a href="add.php"><? print $strNewSkin; ?></a>]
</font>
<?

if ($skin) 
{
	eval ("?>$suffix<?");
	
} 
else 
{
	?>
	</body>
	</html>
	<?
}
?>

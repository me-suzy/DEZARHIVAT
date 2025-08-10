<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/sections/index.php

***************************************/ 

require "../include/db_connect.php";
require "../../include/strings.php";
require "../../include/areas.php";
require "../include/defaults.php";
$minstatus=3;
$op=0;
$det=5;
require "../../bo/staff_details.php";                                                                         

?>
<html>
<body bgcolor="#FFFFFF">
<?

$main_title = read_config("main title");

if ($main_title) $strMain = $main_title;


// select threads from this $parent
if (! $parent) 
{ 
	$parent = 0; 
}

$sql = "SELECT id, name, weight FROM areas
WHERE parent=$parent ORDER BY weight, id";

$query = mysql_query ($sql);


// cant access table
if (! $query) error (mysql_error()."\nwhen selecting threads from sections");


// print "up one level" link
if ($parent != 0)
{
	$query2 = mysql_query ("SELECT parent, name FROM areas WHERE id=$parent");
	
	if (! $query2) error (mysql_error());
	
	list ($grand_parent, $area_title) = mysql_fetch_row($query2);
	
	$area_title = StripSlashes ($area_title);
	
	$id = $parent;
	
	print 	"<a href=\"index.php?parent=$grand_parent\">".
	"<img src=\"../imagesbo/folder_up.png\" border=0 alt=\"../\">".
	"</a>".
	"<font face=\"Arial, Helvetica, Sans-serif\" size=2>".
	back_navigation_bar("index.php?parent=").
	"$area_title / ..</font>".
	"<hr>".
	"<blockquote><p><font size=5><b>$area_title</b> ($parent) ".
	"\n<font face=\"Verdana, Helvetica, Sans-serif\" size=1>".
	"[<a href=\"edit.php?id=$parent\">$strModify</a>] ".
	"[<a href=\"remove.php?id=$parent\" onClick=\"return confirm('$strDelThreadConfirm');\">$strRemove</a>] ".
	"[<a href=\"move.php?id=$parent\">$strMove</a>]".
	"</font>";
} 
else
{
	print 	"<blockquote><br><br><br>".
	"<font size=5><b>$strMain</b></font>\n".
	"<font face=\"Verdana, Helvetica, Sans-serif\" size=1>".
	"[<a href=\"edit_main.php\">$strModify</a>] ".
	"</font><br>";
}


// print links
print	"\n<blockquote><p><font face=\"Verdana, Helvetica, Sans-serif\" size=1>".
"[<a href=\"add.php?weight=1&parent=$parent\">$strInsertThread</a>]".
"</font></p>";


while (list ($id, $name, $weight) = mysql_fetch_row($query))
{
	$new_weight = $weight + 1;
	
	print 	"\n<font face='Arial, Helvetica, Sans-serif' size=2>".
	"<b>$weight. ".
	"<a href=\"index.php?parent=$id\"><img src=\"../imagesbo/folder.png\" alt=\"-\" border=0></a> ".
	"<a href=\"index.php?parent=$id\">$name</a> ($id)</b> &nbsp;".
	"\n<br><br>".
	"\n<font face=\"Verdana, Helvetica, Sans-serif\" size=1>".
	"[<a href=\"add.php?weight=$new_weight&parent=$parent\">$strInsertThread</a>]".
	"</font><br><br>";
}

?>
</blockquote></blockquote>
</body>
</html>

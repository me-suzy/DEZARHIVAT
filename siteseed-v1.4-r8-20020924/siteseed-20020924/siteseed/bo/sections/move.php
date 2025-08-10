<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/sections/move.php

***************************************/ 

require "../include/db_connect.php";
require "../include/tree.php";
require "../../include/strings.php";


if ($moveto)
{
	// thread will be max(weight)+1 under new parent
	$query = mysql_query ("SELECT max(weight) FROM areas WHERE parent=$moveto");
	if (!$query) error(mysql_error());
	
	$new_weight = mysql_result ($query, 0);
	$new_weight += 1;
	
	
	// move it
	$query = mysql_query ("UPDATE areas SET parent=$moveto, weight=$new_weight WHERE id=$id");
	
	header ("Location: index.php?parent=$moveto");
}
else
{
	?>
	<html>
	<body bgcolor="#FFFFFF">
	<font size=2><a href="index.php?parent=<? print $parent; ?>"><? print $strBack; ?></a></font><br>
	<font face="Arial, Helvetica, Sans-serif" size=2>
	<font size=4><b><? print $strMoveTo; ?></b></font>
	<?
	print_tree_unlink (0, "areas", "name", "move.php?id=$id&moveto=", $id);
}

?>
</font>
</body>
</html>

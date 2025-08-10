<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/sections/edit.php

***************************************/ 

require "../include/db_connect.php";
require "../include/sql2html.php";
require "../../include/strings.php";
require "form.php";

if (isset($skin)) 
{
	// validate data
	$parent += 0;
	$weight += 0;
	$skin += 0;
	$type_id += 0;
	$section_type += 0;
	
	$name = AddSlashes (StripSlashes($name));
	$url = AddSlashes (StripSlashes($url));
	
	
	// save the data
	$query = mysql_query ("	UPDATE areas SET 
	name='$name', skin=$skin,
	section_type=$section_type,
	type_id=$type_id,
	url='$url', comments='$comments', comments_layout='$comments_layout' WHERE id=$id");
	
	header ("location: index.php?parent=$id");
}
else
{
	?>
	<html>
	<body bgcolor="#FFFFFF">
	<small><a href="index.php?parent=<? print $parent; ?>"><? print $strBack; ?></a></small>
	<font face="Arial, Helvetica, Sans-serif" size=2>
	<?
	// display the form
	print_area_form ($id);
	?>
	</font>
	</body>
	</html>
	<?	
}
?>

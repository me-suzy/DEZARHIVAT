<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/sections/edit_main.php

***************************************/ 

require "../include/db_connect.php";
require "../include/sql2html.php";
require "../../include/strings.php";
require "../include/defaults.php";


if (isset($skin)) 
{
	// validate data
	$skin += 0;
	$type_id += 0;
	$section_type += 0;
	
	$name = AddSlashes (StripSlashes($name));
	$url = AddSlashes (StripSlashes($url));
	
	
	// save the data
	save_config ("main title", $name);
	save_config ("main skin", $skin);
	save_config ("main section type", $section_type);
	save_config ("main type id", $type_id);
	
	header ("location: index.php");
	
}
else
{
	$name = read_config ("main title");
	$skin = read_config ("main skin");
	$section_type = read_config ("main section type");
	$type_id = read_config ("main type id");
	
	?>
	<html>
	<body bgcolor="#FFFFFF">
	<small><a href="index.php?parent=<? print $parent; ?>"><? print $strBack; ?></a></small>
	<font face="Arial, Helvetica, Sans-serif" size=2>
	<hr>
	<form method=post>
	<? print $strName; ?>: <input type=text name=name size=40 maxlenght=255 value="<? print $name; ?>"><br>
	<? print $strSkin; ?>: <? print select_to_list("skin", "id", "name", "skins", $skin); ?><br>
	<? print $strSectionType; ?>:
	<select name="section_type">
	<option value=0 <? if ($section_type==0) print "selected"; ?>><? print $strNothing; ?>
	<option value=1 <? if ($section_type==1) print "selected"; ?>><? print $strSection; ?>
	<option value=2 <? if ($section_type==2) print "selected"; ?>><? print $strArticle; ?>
	<option value=3 <? if ($section_type==3) print "selected"; ?>><? print $strClassifieds; ?>
	</select>
	<? print $strSectionId; ?>: <input type=text name="type_id" size=10 maxlenght=10 value="<? print $type_id; ?>">
	<br><br><br>
	<hr>
	<input type=submit value="<? print $strModify; ?>">
	</form>
	</font>
	</body>
	</html>
	<?	
}
?>

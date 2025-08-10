<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/interfaces/edit.php

***************************************/

require "../include/db_connect.php";
require "../../include/strings.php";
require "../include/defaults.php";
require "form.php";
require "../../include/users.php";


if (isset($name)) 
{
	if ($preview) 
	{
		// validate data
		$name = StripSlashes ($name);
		$suffix = StripSlashes ($suffix);
		$prefix = StripSlashes ($prefix);
		
		// preview
		eval ("?>$prefix<?");
		
		print 	"<small><a href=\"index.php\">$strBack</a></small>".
		"<font face=\"Arial, Helvetica, Sans-serif\" size=2>";
		
		// display the form
		print_skin_form ($id, $name, $prefix, $suffix);
		
		print "</font>";
		
		eval ("?>$suffix<?");
	} 
	else 
	{
		// validate data
		$id += 0;
		$name = AddSlashes (StripSlashes($name));
		$suffix = AddSlashes (StripSlashes($suffix));
		$prefix = AddSlashes (StripSlashes($prefix));
		
		
		// save the data
		$query = mysql_query ("	UPDATE skins SET name='$name',
		suffix='$suffix', prefix='$prefix'
		WHERE id=$id");
		
		header ("location: index.php");
	}
	
	
} 
else 
{
	?>
	<html>
	<body>
	<small><a href="index.php"><? print $strBack; ?></a></small>
	<font face="Arial, Helvetica, Sans-serif" size=2>
	<?
	
	// display the form
	print_skin_form ($id);
	?>
	</font>
	</body>
	</html>
	<?	
}
?>

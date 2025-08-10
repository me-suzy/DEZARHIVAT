<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/interfaces/copy.php
Last modified: 20013103

***************************************/


require "../include/db_connect.php";
require "../../include/strings.php";


if ($new_name) 
{
	// first validate data
	if (!$id) header ("Location: index.php");
	else $id += 0;
	
	$new_name = AddSlashes(StripSlashes($new_name));
	
	// lets copy it
	$query = mysql_query ("SELECT prefix, suffix FROM skins WHERE id=$id");
	if (!$query) error(mysql_error());
	
	if (mysql_num_rows($query)) list($prefix,$suffix) = mysql_fetch_row($query);
	
	$prefix = AddSlashes(StripSlashes($prefix));
	$suffix = AddSlashes(StripSlashes($suffix));
	
	$query = mysql_query ("INSERT INTO skins SET name='$new_name', prefix='$prefix', suffix='$suffix'");
	
	header ("Location: index.php");
} 
else 
{
	// let's ask a name
	// first validate date
	
	if (!$id) header ("Location: index.php");
	else $id += 0;
	
	$query = mysql_query ("SELECT name FROM skins WHERE id=$id");
	if (!$query) error(mysql_error());
	
	if (mysql_num_rows($query)) $default = StripSlashes(mysql_result($query, 0));
	
	
	?>
	<html>
	<body>
	<form method="post">
	<b><? print $strCopyTo ?></b>: <input type="text" name="new_name" value="<? print $default; ?>">
	<input type="hidden" name="id" value="<? print $id; ?>">
	<input type="submit" value="Ok">
	</form>
	</body>
	</html>
	<?
}
?>

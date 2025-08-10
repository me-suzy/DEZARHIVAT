<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/users/remove_field.php

***************************************/ 

require "../include/db_connect.php";
require "../../include/strings.php";

// validate data
$id += 0;

// get field name
$query = mysql_query ("SELECT field_name FROM user_fields WHERE id=$id");
if (!$query) error(mysql_error());

if (mysql_num_rows($query)) $field = mysql_result ($query, 0);
else header ("Location: fields.php");

// check if field has values
$query = mysql_query ("SELECT count($field) FROM users WHERE $field != ''");
if (!$query) error(mysql_error());

if (mysql_num_rows($query)) list($values) = mysql_fetch_row ($query);
else header ("Location: fields.php");

if ($values == 0) $ok = "ok";

if ($id)
{
	if ($ok == "ok")
	{
		$query = mysql_query ("DELETE FROM user_fields WHERE id=$id");	
		if (!$query) error(mysql_error());
		
		$query = mysql_query ("ALTER TABLE users DROP COLUMN $field");
		if (!$query) error(mysql_error());		
		
		header ("Location: fields.php");
	}
	else if ($ok == "cancel") 
	{
		header ("Location: fields.php");
	}
	else
	{
		?>
		<html>
		<body>
		<form method=post>
		<? print $strDelFieldConfirm; ?><br>
		<? print "$strNumberOfEntries: $values"; ?>
		<select name=ok>
		<option value="ok"><? print $strRemove; ?>
		<option value="cancel" selected><? print $strCancel; ?>
		</select><br>
		<input type=submit value="<? print $strOK; ?>">
		<input type=hidden name=id value=<? print $id; ?>>
		</form>
		</body>
		</html>
		<?
	}
} else header ("Location: fields.php");
?>

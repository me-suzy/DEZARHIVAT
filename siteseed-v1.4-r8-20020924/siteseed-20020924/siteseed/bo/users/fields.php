<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/users/fields.php

***************************************/ 

require "../include/db_connect.php";
require "../../include/strings.php";
$minstatus=3;
$op=0;
$det=9;
require "../../bo/staff_details.php";                                                                         

$query = mysql_query ("	SELECT id, field_name, field_type,
field_lenght, required_to_login,
required_to_register, mandatory_to_register,
must_be_unique
FROM user_fields ORDER BY id");

if (!$query) error(mysql_error());

if (mysql_num_rows($query))
{
	?>
	<html>
	<body bgcolor="#FFFFFF">
	<font face="Arial, Helvetica, Sans-serif" size=2>
	<table cellspacing=0 cellpadding=5 border=1>
	<tr bgcolor="#DDDDDD">
	<td><font face="Arial, Helvetica, Sans-serif" size=2><? print $strName; ?></font></td>
	<td><font face="Arial, Helvetica, Sans-serif" size=2><? print $strType; ?></font></td>
	<td><font face="Arial, Helvetica, Sans-serif" size=2><? print $strLenght; ?></font></td>
	<td><font face="Arial, Helvetica, Sans-serif" size=2><? print $strRequiredToLogin; ?></font></td>
	<td><font face="Arial, Helvetica, Sans-serif" size=2><? print $strRequiredToRegister; ?></font></td>
	<td><font face="Arial, Helvetica, Sans-serif" size=2><? print $strMandatoryToRegister; ?></font></td>
	<td><font face="Arial, Helvetica, Sans-serif" size=2><? print $strUnique; ?></font></td>    
	<td>&nbsp;</td>
	</tr>
	<?
	while ( list($id, $name, $type, $lenght,
	$login, $register, $mandatory, $unique) = mysql_fetch_row($query))
	{
		
		if (!$name) $name = "&nbsp;";
		if (!$type) $type = "&nbsp;";
		if (!$lenght) $lenght = "&nbsp;";
		?>	
		<tr>
		<td><font face="Arial, Helvetica, Sans-serif" size=2><? print $name; ?></font></td>
		<td><font face="Arial, Helvetica, Sans-serif" size=2><? print $type; ?></font></td>
		<td><font face="Arial, Helvetica, Sans-serif" size=2><? print $lenght; ?></font></td>
		<td><font face="Arial, Helvetica, Sans-serif" size=2><? if ($login=="1") print $strYes; else print $strNo; ?></font></td>
		<td><font face="Arial, Helvetica, Sans-serif" size=2><? if ($register=="1") print $strYes; else print $strNo; ?></font></td>
		<td><font face="Arial, Helvetica, Sans-serif" size=2><? if ($mandatory=="1") print $strYes; else print $strNo; ?></font></td>    
		<td><font face="Arial, Helvetica, Sans-serif" size=2><? if ($unique=="1") print $strYes; else print $strNo; ?></font></td>
		<td>
		<font size=1 face="Arial, Helvetica, Sans-serif">
		[<a href="remove_field.php?id=<? print $id; ?>" onclick="return confirm('<? print $strDelFieldConfirm; ?>');"><? print $strRemove; ?></a>]
		[<a href="edit_field.php?id=<? print $id; ?>"><? print $strEdit; ?></a>]
		</font>
		</td>
		</tr>
		<?
	}
	?>
	</table>
	<br>
	<form method=get action="add_field.php">
	<? print $strAddNewField; ?>:
	<select name=after>
	<option value=""><? print $strBeginningOfTable; ?></option>
	<?
	mysql_data_seek($query, 0);
	
	$counter = 1;
	
	while ( list($id, $name, $type,
	$lenght, $login, $register) = mysql_fetch_row($query))
	{
		if ($counter == mysql_num_rows($query)) $plus = " selected";
		
		print "    <option value=$id$plus>$strAfter \"$name\"</option>\n";
		
		$counter++;
	}		
	?>
	</select>
	<input type=submit value=<? print $strOK; ?>>
	</form>
	</font>
	</body>
	</html>
	<?
}
else
{
	header ("Location: add_field.php");
}
?>

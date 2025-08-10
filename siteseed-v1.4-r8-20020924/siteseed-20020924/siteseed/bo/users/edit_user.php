<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/users/edit_user.php

***************************************/ 

require "../include/db_connect.php";
require "../../include/strings.php";

if (!$id) header ("Location: index.php");

// validate data
$id += 0;


function form_field ($id, $name, $type, $lenght)
{
	// get saved value
	$query2 = mysql_query ("SELECT $name FROM users WHERE id=$id");	
	
	list ($value) = mysql_fetch_row ($query2);
	
	$value = StripSlashes ($value);
	
	
	// return field in html
	$html = $name;
	
	if ($type == "date" || $type == "datetime") $html .= " (dd/mm/yyyy)";
	
	$html .= ": ";
	
	
	if ($size <= 255) 
	{
		$html .= "<input type=text name=$name value=\"$value\"";
		
		if ($type != "date" && $type != "datetime")
		{
			$html .= " maxlenght=$lenght ";
			if ($lenght > 50) $html .= "size=50";
			else $html .= "size=$lenght";
		} 
		else $html .= " maxlenght=10 size=10";
		
		$html .= "><br>";
		
	} 
	else $html .= "<textarea name=$name cols=50 rows=7></textarea><br>";
	
	return $html;
}


if ($save)
{
	// what are the available fields?
	$query = mysql_query ("SELECT field_name, field_type FROM user_fields ORDER BY id");
	
	while (list ($field, $type) = mysql_fetch_row ($query))
	{
		$$field = AddSlashes(StripSlashes($$field));
		
		$query2 = mysql_query ("UPDATE users SET $field='".$$field."' WHERE id=$id");		
	}
	
	header ("Location: index.php");
}
else
{
	?>
	<html>
	<body>
	<form method=post>
	<?
	
	// what are the available fields?
	$query = mysql_query ("	SELECT field_name, field_type, field_lenght
	FROM user_fields ORDER BY id");
	
	while (list($name, $type, $lenght) = mysql_fetch_row($query))
	{
		print form_field ($id, $name, $type, $lenght);
	}
	
	?>
	<input type=hidden name=id value=<? print $id; ?>>
	<input type=submit name="save" value="<? print $strSave; ?>">
	</form>
	</body>
	</html>
	<?
}
?>

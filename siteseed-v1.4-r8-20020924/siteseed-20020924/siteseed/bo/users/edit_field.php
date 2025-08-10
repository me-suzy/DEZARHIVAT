<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/users/edit_field.php

***************************************/ 

require "../include/db_connect.php";


if ($ok && $name && $type)
{
	// validate data
	$id += 0;
	$name = addslashes (stripslashes($name));
	$type = addslashes (stripslashes($type));
	
	
	$lenght += 0;
	if ($lenght >= 256) $lenght = 65535;
	
	if ($after) $after += 0;
	else $after = 1;
	
	
	// lets create the definition
	switch ($type)
	{
		case "int":
		$definition = "INT";
		$lenght = "NULL";
		break;
		
		case "text":
		if (!$lenght) $lenght = 30;
		if ($lenght <= 255) $definition = "CHAR($lenght)";
		else $definition = "TEXT";
		break;
		
		case "password":
		if (!$lenght) $lenght = 16;
		if ($lenght <= 255) $definition = "CHAR($lenght)";
		else $definition = "TEXT";
		break;
		
		case "date":
		$definition = "DATE";
		$lenght = "NULL";
		break;
		
		case "datetime":
		$definition = "DATETIME";
		$lenght = "NULL";
		break;
	}
	
	
	if ($login || $register) $definition .= " NOT NULL";
	
	
	// get field name
	$query = mysql_query ("SELECT field_name FROM user_fields WHERE id=$id");
	if (!$query) error(mysql_error());
	
	if (mysql_num_rows($query)) $field = mysql_result ($query, 0);
	else header ("Location: fields.php");
	
	
	// add the field to the "users" table
	$query = mysql_query ("ALTER TABLE users CHANGE $field $name $definition");
	
	
	// alter the field in the "user_fields" table
	$query = mysql_query ("	UPDATE user_fields SET field_name='$name',
	field_type='$type', field_lenght='$lenght',
	required_to_login='$login',
	required_to_register='$register',
	mandatory_to_register='$mandatory',
	must_be_unique='$unique'
	WHERE id=$id");
	
	
	header ("Location: fields.php");
}
else
{
	?>
	<html>
	<body>
	<?
	
	$id += 0;
	
	// get data
	$query = mysql_query ("	SELECT field_name, field_type, field_lenght,
	required_to_login, required_to_register,
	mandatory_to_register, must_be_unique
	FROM user_fields WHERE id=$id");
	
	if (!$query) error(mysql_error());
	
	
	// print form if data found
	if (mysql_num_rows($query))
	{
		list (	$name, $type, $lenght,
		$login, $register, $mandatory, $unique ) = mysql_fetch_row($query);
		
		$name = StripSlashes ($name);
		
		require "form.php";
	}
	else error ("User field with id $id not found!");
	
	?>
	</body>
	</html>
	<?
}
?>

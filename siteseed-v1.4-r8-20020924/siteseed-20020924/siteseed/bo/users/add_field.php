<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/users/add_field.php

***************************************/ 

require "../include/db_connect.php";



if ($ok && $name && $type)
{
	// validate data
	$name = AddSlashes (StripSlashes($name));
	$type = AddSlashes (StripSlashes($type));
	$login += 0;
	$register += 0;
	$unique += 0;
	
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
	
	
	// add the field to the "users" table
	$query = mysql_query ("ALTER TABLE users ADD COLUMN $name $definition");
	
	
	// add the field to the "user_fields" table
	$query = mysql_query ("UPDATE user_fields SET id=id+1 WHERE id>$after");
	
	
	$query = mysql_query ("	INSERT INTO user_fields SET id=$after+1,
	field_name='$name', field_type='$type',
	field_lenght=$lenght,
	required_to_login='$login',
	required_to_register='$register',
	mandatory_to_register='$mandatory',
	must_be_unique='$unique'");
	
	header ("Location: fields.php");
}
else
{
	?>
	<html>
	<body>
	<?
	require "form.php";
	
	?>
	</body>
	</html>
	<?
}
?>

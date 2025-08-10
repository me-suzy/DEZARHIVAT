<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/users/include/defaults.php
Last modified: 20013103

***************************************/ 

// reads the value associated to $value
// from the config table
function read_config ($name) 
{
	$name = AddSlashes (StripSlashes($name));
	
	$query_cfg = mysql_query ("SELECT value FROM config WHERE name='$name'");
	
	if (!$query_cfg)
	{
		error(mysql_error(). "\nwhile reading config table");
	}
	else if (mysql_num_rows($query_cfg))
	{
		return StripSlashes(mysql_result ($query_cfg, 0));
	}
}


// updates (or inserts) $name
// in the table with $value
function save_config ($name, $value) 
{
	$name = AddSlashes (StripSlashes($name));
	$value = AddSlashes (StripSlashes($value));
	
	$query_cfg = mysql_query ("SELECT value FROM config WHERE name='$name'");
	
	if (!$query_cfg) error(mysql_error()."\nwhile saving to config table");
	else 
	{
		if (mysql_num_rows($query_cfg)) 
		{
			// name exists, lets update it
			$query_update = mysql_query ("	UPDATE config SET value='$value'
			WHERE name='$name' ");
		} 
		else 
		{
			// name doesnt exists, lets insert it
			$query_insert = mysql_query ("	INSERT INTO config
			SET name='$name', value='$value'");
		}			
	}
}
?>

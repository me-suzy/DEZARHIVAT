<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/interfaces/include/db_connect.php

***************************************/ 

require_once "config.php";
require "bo/include/error.php";

if (! DB_HOST) error ("please define DB_HOST");


// if we cant connect to mysql host
if (! mysql_connect (DB_HOST, DB_USER, DB_PASSWORD)) 
{
	error (mysql_error());
}


if (! DB_NAME) error ("You must define DB_NAME");


// lets try to find DB_NAME
$query = mysql_list_dbs();

for ($x = 0; $x <= mysql_num_rows($query)-1; $x++) 
{
	$db_name = mysql_tablename($query, $x);
	
	if ($db_name == DB_NAME) $found_db = 1;
}


// lets try to select the db
if (! mysql_select_db (DB_NAME)) 
{
	error (mysql_error()."\nwhile selecting database");
}
?>

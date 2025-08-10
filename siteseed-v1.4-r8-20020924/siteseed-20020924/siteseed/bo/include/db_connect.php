<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/users/include/db_connect.php
Last modified: 20013103

***************************************/

require_once "../../config.php";
require "../include/error.php";

if (! DB_HOST) error ("please define DB_HOST");

// if we cant connect to mysql host
if (! mysql_pconnect (DB_HOST, DB_USER, DB_PASSWORD)) 
{
	error (mysql_error());
}



if (! DB_NAME) error ("You must define a DB_NAME to be created");

// lets try to find DB_NAME
$query = mysql_list_dbs();

for ($x = 0; $x <= mysql_num_rows($query)-1; $x++) 
{
	$db_name = mysql_tablename($query, $x);
	
	if ($db_name == DB_NAME) $found_db = 1;
}

// lets create the database
if (! $found_db) 
{
	if (mysql_create_db (DB_NAME)) mysql_select_db (DB_NAME);
	else error (mysql_error());
}



// lets try to select the db
if (! mysql_select_db (DB_NAME)) 
{
	error (mysql_error()."\nwhile selecting database");
}



// lets try to find the tables
$query = mysql_list_tables (DB_NAME);

for ($x = 0; $x <= mysql_num_rows($query)-1; $x++) 
{
	$table_name = mysql_tablename($query, $x);
	
	if ($table_name == "areas") $found_areas = 1;
	if ($table_name == "skins") $found_skins = 1;
	if ($table_name == "config") $found_config = 1;
	if ($table_name == "user_fields") $found_user_fields = 1;
	if ($table_name == "users") $found_users = 1;
	if ($table_name == "surveys") $found_surveys = 1;
	if ($table_name == "survey_options") $found_survey_options = 1;
	if ($table_name == "survey_votes") $found_survey_votes = 1;
}


// lets create the missing tables
if (! $found_areas)
{
	$sql_create = "	CREATE TABLE areas (
	id int(11) DEFAULT '0' NOT NULL auto_increment,
	parent int(11) DEFAULT '0' NOT NULL,
	weight int(11) DEFAULT '0' NOT NULL,
	name char(255) DEFAULT '' NOT NULL,
	skin int(11) DEFAULT '0' NOT NULL,
	section_type int(11) DEFAULT '0' NOT NULL,
	type_id int(11) DEFAULT '0' NOT NULL,
	url char(255) NOT NULL,
	PRIMARY KEY(id),
	KEY id(id),
	UNIQUE id_2(id),
	comments int(11) DEFAULT '0' NOT NULL,
	comments_layout int(11) DEFAULT '0' NOT NULL)";
	
	if (! mysql_query($sql_create)) 
	{
		error (mysql_error()."\nwhile trying to create table 'areas'");
	}
}
else
{
	$table_info=mysql_list_fields($projecto, "areas");
	$columns = mysql_num_fields($table_info);
	if($columns==8)
	{
		mysql_query("ALTER TABLE areas add column (comments int(11) DEFAULT '2' NOT NULL, comments_layout int(11) DEFAULT '0' NOT NULL)");
	}
}

if (! $found_skins) 
{
	$sql_create = "	CREATE TABLE skins (
	id INT not null AUTO_INCREMENT,
	name CHAR (255) not null ,
	prefix TEXT NOT NULL,
	suffix TEXT NOT NULL,
	PRIMARY KEY (id),
	INDEX (id),
	UNIQUE (id) ) ";
	
	if (! mysql_query($sql_create)) 
	{
		error (mysql_error()."\nwhile trying to create table 'skins'");
	}
}


if (! $found_config) 
{
	$sql_create = "	CREATE TABLE config (
	name VARCHAR(30) NOT NULL,
	value VARCHAR(255) NOT NULL )";
	
	if (! mysql_query($sql_create)) 
	{
		error (mysql_error()."\nwhile trying to create table 'config'");
	}
}


if (! $found_user_fields) 
{
	$sql_create = "	CREATE TABLE user_fields (
	id INT(11) DEFAULT '0' NOT NULL,
	field_name CHAR(20) NOT NULL,
	field_type CHAR(20) NOT NULL,
	field_lenght INT(11),
	required_to_login CHAR(1),
	required_to_register CHAR(1),
	mandatory_to_register CHAR(1),
	must_be_unique CHAR(1))";
	
	if (! mysql_query($sql_create)) 
	{
		error (mysql_error()."\nwhile trying to create table 'user_fields'");
	}
}
else
{
	$table_info=mysql_list_fields($projecto, "user_fields");
	$columns = mysql_num_fields($table_info);
	if($columns==10)
	{
		mysql_query("ALTER TABLE user_fields drop column code_login");
		mysql_query("ALTER TABLE user_fields drop column code_register");
	}
}


if (! $found_users) 
{
	$sql_create = "	CREATE TABLE users (
	id BIGINT(20) unsigned NOT NULL auto_increment,
	session_id CHAR(32),
	PRIMARY KEY (id),
	KEY id (id),
	UNIQUE id_2 (id))";
	
	if (! mysql_query($sql_create)) 
	{
		error (mysql_error()."\nwhile trying to create table 'user_fields'");
	}
}


if (! $found_surveys) 
{
	$sql_create = "	CREATE TABLE surveys (
	id int(11) DEFAULT '0' NOT NULL auto_increment,
	name char(120) NOT NULL,
	question char(255) NOT NULL,
	PRIMARY KEY (id),
	KEY id (id),
	UNIQUE id_2 (id))";
	
	if (! mysql_query($sql_create)) 
	{
		error (mysql_error()."\nwhile trying to create table 'surveys'");
	}
}


if (! $found_survey_options) 
{
	$sql_create = "	CREATE TABLE survey_options (
	survey_id int(11) DEFAULT '0' NOT NULL,
	option_id tinyint(4) DEFAULT '0' NOT NULL,
	option_text char(255) NOT NULL,
	color char(7) NOT NULL,
	image char(50) NOT NULL)";
	
	if (! mysql_query($sql_create)) 
	{
		error (mysql_error()."\nwhile trying to create table 'survey_options'");
	}
}



if (! $found_survey_votes) 
{
	$sql_create = "	CREATE TABLE survey_votes (
	survey_id int(11) DEFAULT '0' NOT NULL,
	option_id tinyint(4) DEFAULT '0' NOT NULL,
	counter bigint(20) DEFAULT '0' NOT NULL)";
	
	if (! mysql_query($sql_create)) 
	{
		error (mysql_error()."\nwhile trying to create table 'survey_votes'");
	}
}
?>

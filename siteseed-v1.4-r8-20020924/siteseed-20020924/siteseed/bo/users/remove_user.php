<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/users/remove_user.php

***************************************/

require "../include/db_connect.php";

// validate data
$id += 0;

if ($id)
{
	$query = mysql_query ("DELETE FROM users WHERE id=$id");
}

header ("Location: index.php");
?>

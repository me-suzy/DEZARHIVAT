<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/interfaces/remove.php

***************************************/ 

require "../include/db_connect.php";
require "../../include/strings.php";


$id += 0;

$query = mysql_query("DELETE FROM skins WHERE id=$id");

header ("Location: index.php");
?>

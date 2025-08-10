<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/surveys/remove_survey.php

***************************************/

require "../include/db_connect.php";


// validate data
$id += 0;


// kill the damn bastard!
$query = mysql_query ("DELETE FROM surveys WHERE survey_id=$survey_id");
if (!$query) error (mysql_error());


// go home
header ("Location: index.php");
?>

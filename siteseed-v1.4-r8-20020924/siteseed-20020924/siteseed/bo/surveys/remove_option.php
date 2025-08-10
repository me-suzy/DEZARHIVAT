<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/surveys/remove_option.php

***************************************/ 

require "../include/db_connect.php";

// validate data
$id += 0;
$survey_id += 0;
$question_id +=0;

if (!$id || !$survey_id || !$question_id) header ("Location: index.php");

// kill the damn bastard!
$query = mysql_query ("	DELETE FROM survey_options
WHERE option_id=$id
AND survey_id=$survey_id AND question_id=$question_id");
if (!$query) error (mysql_error());


$query = mysql_query ("	DELETE FROM survey_votes
WHERE option_id=$id
AND survey_id=$survey_id AND question_id=$question_id");
if (!$query) error (mysql_error());



// go home
header ("Location: edit_survey.php?survey_id=$survey_id");
?>

<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/surveys/add_survey.php

***************************************/ 

require "../include/db_connect.php";
require "../../include/strings.php";


if ($name && $question) 
{
	// validate data
	$name = AddSlashes(StripSlashes($name));
	$question = AddSlashes(StripSlashes($question));

	$scan_query= mysql_query("SELECT MAX(survey_id) FROM surveys");
	$next_survey = mysql_result($scan_query,0) + 1;
	
	// save the new survey
	$query = @mysql_query ("INSERT INTO surveys SET name='$name', question='$question', question_id=1, survey_id=$next_survey");
	
	//go to edit page
	header ("Location: edit_survey.php?survey_id=$next_survey");
} 
else
{
	?>
	<html>
	<body bgcolor="#FFFFFF">
	<font face="Arial, Helvetica, Sans-serif" size=2>
	<a href="index.php"><? print $strBack ?></a>
	<hr>
	<form method="post">
	<? print $strName; ?>:<br><input type="text" name="name" size=50 maxlenght=120 value="<? print $name ?>"><br>
	<? print $strQuestion; ?>:<br><input type="text" name="question" size=70 maxlenght=255 value="<? print $question ?>"><br>
	<input type="submit" value="<? print $strSave; ?>">
	</form>
	</font>
	</body>
	</html>
	<?
}
?>

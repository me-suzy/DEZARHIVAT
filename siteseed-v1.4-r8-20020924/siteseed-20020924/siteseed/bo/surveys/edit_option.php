<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/surveys/edit_option.php

***************************************/

require "../include/db_connect.php";
require "../../include/strings.php";


if ($option_text && $option_id && $survey_id && $question_id) 
{
	// validate data
	$option_text = AddSlashes(StripSlashes($option_text));
	$color = AddSlashes(StripSlashes($color));
	$image = AddSlashes(StripSlashes($image));
	$survey_id += 0;
	$option_id += 0;
	$question_id += 0;
	
	if (!$survey_id || !$question_id) header ("Location: index.php");
	
	
	// save the option
	$query = mysql_query ("	UPDATE survey_options
	SET option_text='$option_text', color='$color', image='$image'
	WHERE option_id=$option_id AND survey_id=$survey_id AND question_id=$question_id");
	
	if (!$query) error (mysql_error());
	
	
	// go back home
	header ("Location: edit_survey.php?survey_id=$survey_id");
} 
else
{
	if (!$id || !$survey_id || !$question_id) header ("Location: index.php");
	
	$id += 0;
	$survey_id += 0;
	$question_id +=0;
	
	$query = mysql_query ("	SELECT option_text, color, image
	FROM survey_options
	WHERE option_id=$id AND survey_id=$survey_id AND question_id=$question_id");
	
	if (!$query) error (mysql_error());
	
	if (mysql_num_rows($query)) 
	{
		list ($option_text, $color, $image) = mysql_fetch_row($query);
	}
	?>
	<html>
	<body bgcolor="#FFFFFF">
	<font face="Arial, Helvetica, Sans-serif" size=2>
	<a href="index.php"><? print $strBack ?></a>
	<hr>
	<form method="post">
	<? print $strAnswer; ?>:<br><input type="text" name="option_text" size=50 maxlenght=255 value="<? print $option_text ?>"><br>
	<? print $strImage; ?>:<br><input type="text" name="image" size=40 maxlenght=50 value="<? print $image ?>"><br>
	<? print $strColor; ?>:<br><input type="text" name="color" size=7 maxlenght=7 value="<? print $color ?>"><br>
	<input type="hidden" name="survey_id" value="<? print $survey_id; ?>">
	<input type="hidden" name="option_id" value="<? print $id; ?>">
	<input type="hidden" name="question_id" value="<? print $question_id; ?>">
	<input type="submit" value="<? print $strSave; ?>">
	</form>
	</font>
	</body>
	</html>
	<?
}
?>

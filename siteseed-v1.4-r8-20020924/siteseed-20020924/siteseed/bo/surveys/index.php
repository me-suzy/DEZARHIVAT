<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/surveys/index.php

***************************************/ 

require "../include/db_connect.php";
require "../../include/strings.php";

$query = mysql_query ("SELECT id FROM surveys");
if (!$query) (mysql_error());

if (!$newquery=mysql_query ("SELECT survey_id FROM surveys"))
{
	mysql_query ("ALTER TABLE surveys ADD COLUMN survey_id int(11) DEFAULT '0'NOT NULL");
}

if (!$newquery = mysql_query ("SELECT question_id FROM surveys"))
{
	@mysql_query ("ALTER TABLE surveys ADD COLUMN question_id int(11) DEFAULT '0' NOT NULL");
}
if (!$newquery = mysql_query ("SELECT question_id FROM survey_options"))
{
	@mysql_query ("ALTER TABLE survey_options ADD COLUMN question_id int(11) DEFAULT '0' NOT NULL");
}
if (!$newquery = mysql_query ("SELECT question_id FROM survey_votes"))
{
	@mysql_query ("ALTER TABLE survey_votes ADD COLUMN question_id int(11) DEFAULT '0' NOT NULL");
}

$query = mysql_query ("SELECT survey_id, name FROM surveys WHERE question_id=1");
if (mysql_num_rows($query))
{
	?>
	<html>
	<body bgcolor="#FFFFFF">
	<font face="Arial, Helvetica, Sans-serif" size=2>
	<b><font size=3><? print $strSurveys; ?>:</font></b><hr>
	<?
	
	while (list($survey_id, $name) = mysql_fetch_row($query)) 
	{
		print	"<b>$survey_id</b>. $name ".
		"<font face=\"Verdana, Helvetica, Sans-serif\" size=1>".
		"[<a href=\"edit_survey.php?survey_id=$survey_id\">$strEdit</a>]".
		"[<a href=\"remove_survey.php?survey_id=$survey_id\" onclick=\"return confirm('$strDelSurveyConfirm');\">$strRemove</a>]".
		"</font>";
		
		
		$query_votes = mysql_query ("SELECT sum(counter) FROM survey_votes WHERE survey_id=$survey_id");
		if (!$query_votes) (mysql_error());
		
		list ($votes) = mysql_fetch_row($query_votes);
		
		if ($votes) print " (<b>$votes</b> $strVotes)";
		
		print "<br><br>";
	}
	
	print "<br>[<a href=\"add_survey.php\">$strAddNewSurvey</a>]";
	
	?>
	</font>
	</body>
	</html>
	<?
}
else
{
	header ("Location: add_survey.php");
}
?>

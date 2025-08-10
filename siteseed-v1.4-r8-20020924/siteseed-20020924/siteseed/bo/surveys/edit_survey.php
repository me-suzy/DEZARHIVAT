<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/surveys/edit_survey.php

***************************************/ 

require "../include/db_connect.php";
require "../../include/strings.php";

$survey_id += 0;
$question_id +=0;

if ($change_name && $name && $survey_id>0)
{
	$name = AddSlashes(StripSlashes($name));
	$query = @mysql_query ("UPDATE surveys SET name='$name' WHERE survey_id=$survey_id");
}
else if ($change_question && $question && $question_id>0 && $survey_id>0)
{
	$question = AddSlashes(StripSlashes($question));
	$query = @mysql_query ("UPDATE surveys SET question='$question' WHERE survey_id=$survey_id and question_id=$question_id");
}
else if ($add_question && $survey_id>0 && $name)
{
	$name = AddSlashes(StripSlashes($name));
	$scan_query= mysql_query("SELECT MAX(question_id) FROM surveys WHERE survey_id=$survey_id");
	$next_question = mysql_result($scan_query,0) + 1;
	$query = @mysql_query ("INSERT INTO surveys SET name='$name', question='-- $strNewQuestion --', survey_id=$survey_id, question_id=$next_question");
}
else if ($remove_question && $survey_id>0 && $question_id>0)
{
	$query = mysql_query ("	DELETE FROM surveys
	WHERE survey_id=$survey_id AND question_id=$question_id");
	if (!$query) error (mysql_error());
	
	$query = mysql_query ("	DELETE FROM survey_options
	WHERE survey_id=$survey_id AND question_id=$question_id");
	if (!$query) error (mysql_error());

	$query = mysql_query ("	DELETE FROM survey_votes
	WHERE survey_id=$survey_id AND question_id=$question_id");
	if (!$query) error (mysql_error());
}


// get survey data
if ($query = mysql_query ("SELECT name, question, question_id FROM surveys WHERE survey_id=$survey_id ORDER BY question_id ASC"))
{
	$row = mysql_fetch_row($query);
	$name = $row[0];
	$name = htmlentities(StripSlashes($name));
	@mysql_data_seek($query,0);
?>
	<html>
	<body bgcolor="#FFFFFF">
	<font face="Arial, Helvetica, Sans-serif" size=2>
	<a href="index.php"><? print $strBack ?></a></font>
	<hr>
	
	<table cellspacing=10 cellpadding=5 bgcolor="#ffffff">
	<tr bgcolor="#CCCCCC">
	<td><form method="post">
	<font face="Arial, Helvetica, Sans-serif" size=2><b>
	<?print $strName; ?>:</b><br><input type="text" name="name" size=50 maxlenght=120 value="<? print $name ?>">&nbsp;<input type="submit" name="change_name" value="<? print $strModify; ?>"><input type="hidden" name="survey_id" value="<? print $survey_id; ?>"></font></form>
	</td>
	</tr>

<?
	while($row = mysql_fetch_object($query))
	{
		$question=		$row -> question;
		$question_id=		$row -> question_id;
		
		$question = htmlentities(StripSlashes($question));
		$question_id+=0;

		?><tr bgcolor="#CCCCCC"><td><b><?print $strQuestion." ".$question_id; ?>:</b><br><form method="post"><input type="text" name="question" size=70 maxlenght=255 value="<? print $question ?>">&nbsp;<input type="submit" name="change_question" value="<? print $strModify; ?>">&nbsp;<input type="submit" name="remove_question" value="<? print $strRemove; ?>" onclick="return	 confirm('<? print $strDelQuestionConfirm; ?>');"><input type="hidden" name="survey_id" value="<? print $survey_id; ?>"><input type="hidden" name="question_id" value="<? print $question_id; ?>"></form><br>
		<b><? print $strQuestion." ".$question_id." ".$strOptions; ?></b>:<br><br><?
	
		if ($option_query = mysql_query ("	SELECT option_id, option_text FROM survey_options WHERE survey_id=$survey_id and question_id=$question_id ORDER BY option_id"))
		{
			if (mysql_num_rows($option_query))
			{
				print "<table cellspacing=5>";
			
				while (list($option_id, $option_text) = mysql_fetch_row($option_query))
				{
										
					// display option
				
					print	"<tr><td><font face=\"Arial, Helvetica, Sans-serif\" size=2>".
					"<b>$option_id</b>. $option_text ".
					"</font></td><td>".
					"<font face=\"Verdana, Helvetica, Sans-serif\" size=1>".
					"[<a href=\"edit_option.php?id=$option_id&survey_id=$survey_id&question_id=$question_id\">$strEdit</a>]".
					"[<a href=\"remove_option.php?id=$option_id&survey_id=$survey_id&question_id=$question_id\" onclick=\"return	 confirm('$strDelOptionConfirm');\">$strRemove</a>]".
					"</font></td>";
			
					// display votes
		
					if ($query_votes = mysql_query ("	SELECT counter
					FROM survey_votes
					WHERE survey_id=$survey_id
					AND option_id=$option_id AND question_id=$question_id"))
					{		
						list ($votes) = mysql_fetch_row($query_votes);
			
						print "<td><font face=\"Arial, Helvetica, Sans-serif\" size=2>";
			
						if ($votes) print " (<b>$votes</b> $strVotes)";
			
						print "&nbsp;</font></td>";
					}
					print "</tr>";
				}
				print "</table>";
			}
			else
			{
				print $strNoOptions;
			}
		}
		print "<br><br>";
		print "[<a href=\"add_option.php?survey_id=$survey_id&question_id=$question_id\">".$strAddNewOption.
		"</a>]</td></tr>";
	}
?>
	<tr><td><br><br>
	<form action="" method=post><input type="submit" name="add_question" value="<? print $strNewQuestion ?>"><input type=hidden name="survey_id" value="<? print $survey_id; ?>"><input type=hidden name="name" value="<? print $name; ?>"></form>
	</td></tr></table></body></html>
<?
}
else
{
	header ("Location: index.php");
}
?>
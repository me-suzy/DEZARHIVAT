<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: vote.php
Last modified: 20020420 (security code audit by pls)
Category: publicly accessible file that can be called directly.
***************************************/

require "include/db_connect.php";
require "bo/include/defaults.php";

// validade data
$survey_id += 0;
if (!$url) $url = "index.php";

$cookie_name = "poll$survey_id";
$vote_count=0;

// keep vote if user has not voted yet
if (!$$cookie_name)
{
	reset ($_POST);
	while (list ($key, $val) = each ($_POST))
	{
		if(ereg("question(([0-9])+)-option_id",$key,$regs))
		{
			$question_id = $regs[1] + 0;
			$option_id["question$question_id"] = $val + 0;
			if ($option_id["question$question_id"]) $wasvoted["question$question_id"]=1;
			$answered_questions = count($wasvoted);
		}
		else if(ereg("option_id",$key,$regs))
		{
			$question_id = 1;
			$option_id["question$question_id"] = $val + 0;
			$answered_questions = 1;
		}
	}
	
	$query = mysql_query ("SELECT * FROM surveys WHERE survey_id=$survey_id");
	$quest_count=mysql_num_rows($query);
	if ($quest_count != $answered_questions)
	{
		header ("Location: $url");
	}

	for ($i=1; $i<=count($option_id); $i++)
	{
		//check if record already exists in database
		$query = mysql_query ("SELECT counter FROM survey_votes WHERE survey_id=$survey_id AND option_id=".$option_id["question$i"]." AND question_id=$i");
	
		if (mysql_num_rows($query))
		{
			$query = mysql_query ("UPDATE survey_votes SET counter=counter+1 WHERE survey_id=$survey_id AND option_id=".$option_id["question$i"]." AND question_id=$i");
		}
		else
		{
			$query = mysql_query ("INSERT INTO survey_votes SET counter=1, survey_id=$survey_id, option_id=".$option_id["question$i"].", question_id=$i");
		}
		
	}
	setcookie ("$cookie_name", "1");
}
header ("Location: $url");
?>

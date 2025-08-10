<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: include/surveys.php
Last modified: 20013103

***************************************/ 

function survey ($survey_id, $url="index.php", $strVote="Votar", $strViewResults="", $urlViewResults="")
{
	// validate data
	$survey_id += 0;
	
	if ($strViewResults && $urlViewResults) 
	{
		$link = "<a href=\"$urlViewResults\">$strViewResults</a>";
	}
	
	$html="";

	if ($query2 = mysql_query ("SELECT question, question_id FROM surveys 
	WHERE survey_id=$survey_id ORDER BY question_id ASC"))
	{
		while($row = mysql_fetch_object($query2))
		{
			$question=		$row -> question;
			$question_id=		$row -> question_id;
		
			$question = htmlentities(StripSlashes($question));
			$question_id+=0;
			
						
			// what are the options?
			$query = mysql_query ("	SELECT option_id, option_text
			FROM survey_options
			WHERE survey_id=$survey_id AND question_id=$question_id	
			ORDER BY option_id");
	
			if (!$query) error(mysql_error());

			if (mysql_num_rows($query)) 
			{
				$html .=	"\n<form method=post action=\"vote.php\">".
				"\n$question<br><br>";
		
				// return html radio buttons
		
				while (list($option_id, $option_text) = mysql_fetch_row($query)) 
				{
					$html .="\n<input type=radio name=question$question_id-option_id value=$option_id>".
					"$option_text<br>";
				}
				$html .="<hr><br>";
			}
		}
		$html .= "\n<center>\n<font size=1>$link<br><br></font>";
		
		if (	strstr ($strVote, ".gif") ||
				strstr ($strVote, ".jpg") ||
				strstr ($strVote, ".png"))
		{
		$html .= "\n<input type=image border=0 src=\"$strVote\">";
		} 
		else
		{
			$html .= "\n<input type=submit border=0 value=\"$strVote\">";
		}
		
		$html .=	"\n</center>".
				"\n<input type=hidden name=survey_id value=$survey_id>".
				"\n<input type=hidden name=url value=\"$url\">".
				"\n</form>";
		}
	return $html;
}




function survey_results ($survey_id, $strBeforeVote="", $strAfterVote="", $question_id=0)
{
	// validate data
	$survey_id += 0;
	$question_id +=0;
	$filter_question="";
	if ($question_id > 0) $filter_question=" AND question_id=$question_id";
	
	// get survey question
	if ($query2 = mysql_query ("SELECT question, question_id FROM surveys 
	WHERE survey_id=$survey_id $filter_question ORDER BY question_id ASC"))
	{
		while($row = mysql_fetch_object($query2))
		{
			$question=		$row -> question;
			$question_id=		$row -> question_id;
		
			$question = htmlentities(StripSlashes($question));
			$question_id+=0;
		
			$html .= "\n<br><br>$question<br><br>";
	
			// get vote count
			$query_votes = mysql_query ("SELECT sum(counter) FROM survey_votes WHERE survey_id=$survey_id AND question_id=$question_id");
			if (!$query_votes) (mysql_error());
	
			list ($total_votes) = mysql_fetch_row($query_votes);
	
	
			// calculate votes per percentage
			if ($total_votes) $vote_multiplier = 100 / $total_votes;
			else return;
	
	
			// get survey options
			$query = mysql_query ("SELECT option_id, option_text, color, image FROM survey_options WHERE survey_id=$survey_id AND question_id=$question_id ORDER BY option_id ASC");
	
			if (!$query) error (mysql_error());
	
			if (mysql_num_rows($query))
			{
				while (list($option_id, $option_text, $color, $image) = mysql_fetch_row($query))
				{
					$query_votes = mysql_query ("	SELECT counter
					FROM survey_votes
					WHERE survey_id=$survey_id
					AND option_id=$option_id AND question_id=$question_id");
					if (!$query_votes) (mysql_error());
			
					list ($votes) = mysql_fetch_row($query_votes);
					$votes += 0;
			
			
					// calculate bar width
					$width = round($votes * $vote_multiplier);
					$negative_width = 100-$width;
			
			
					// set bar params
					$cell_param =	"width=$width% ";
			
					if ($color || $image)
					{
						if ($color) $cell_param .= " bgcolor='$color'";
						if ($image) $cell_param .= " background='$image'";
				
					} else $cell_param .= " bgcolor=#000000";
			
			
					// if ... display votes
					if ($strBeforeVote || $strAfterVote)
					{
						$plus = $strBeforeVote.$votes.$strAfterVote;
					}
			
					$html .=	"\n$option_text $plus ($width%)".
					"\n<table width=100% background=\"images/default/1pix.gif\" cellspacing=0 cellpading=0>".
					"<tr>".
					"<td $cell_param>&nbsp;</td>".
					"<td width=$negative_width%>&nbsp;</td>".
					"</tr>".
					"</table>";
				}
			}
		}
	}
	return $html;
}
?>

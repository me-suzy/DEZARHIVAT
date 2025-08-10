<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/viewnote.php
Last modified: 20010814

***************************************/ 

require_once "../config.php";
require_once "./staff_details.php";
require_once "../include/strings.php";

$id=addslashes($id);
$a=addslashes($a);


if(!$param=="rm")
{
	if($query=mysql_db_query("$projecto","SELECT * from notes WHERE id=$id", $dblink))
	{
		
		$row = mysql_fetch_object($query);
		
		$note_id =     			$row -> id;
		$note_date = 			$row -> date;
		$note_author =			$row -> author;
		$note_recipient_id =		$row -> recipient_id;
		$note_recipient_type =		$row -> recipient_type;
		$note_subject = 			$row -> subject;
		$note_text = 			$row -> main_text;
		
		
		
		if(strlen($a)>0 && $topic_result=mysql_db_query("$projecto","SELECT * from ARTICLEtopic WHERE artigo=$a ORDER BY topic", $dblink))
		{
			$inibit=1;			
			
			while($row = mysql_fetch_object($topic_result) || $inibit==1)
			{
				$topic_serial=		$row -> topic; 
				
				
				if($limittopic[$topic_serial]==0)
				{
					$inibit=0;
				}
			}			
		}
		
		if(strlen($o)>0)
		{
			$inibit=1;			
			
			if(!$limitobject[$o]==1)
			{
				$inibit=0;
			}
			
		}
		
		
		
		if(($note_recipient_type=='a' || $note_recipient_type=='o') && $inibit==0)
		{
			$query_author = mysql_db_query("$projecto","SELECT login from STAFFbase WHERE id=$note_author", $dblink);
			
			if($row = mysql_fetch_object($query_author))
			{
				$note_author = $row -> login;
			}
			
			
			$result=mysql_db_query("$projecto","UPDATE notes SET received = 1 WHERE id=$id", $dblink);		
			
			
			$content_output ="<table width='98%' border='1'>
			<tr> 
			<td colspan='2'><b>" . $strAuthor . "</b></td>
			<td width='73%'><b>" . $strDate . "</b></td>
			</tr>
			<tr> 
			<td colspan='2'>" . $note_author . "</td>
			<td width='73%'>" . $note_date . "</td>
			</tr>
			<tr> 
			<td colspan='3'><b>" . $strEmailSubject. "</b></td>
			</tr>
			<tr> 
			<td colspan='3'>" . $note_subject . "</td>
			</tr>
			<tr> 
			<td colspan='3'><b>" . $strNote . "</b></td>
			</tr>
			<tr> 
			<td colspan='3'>" . $note_text . "</td>
			</tr>
			</table>";
			
			if(strlen($a)>0)
			{
				$content_output .= '<br><div align="center"><a href="?param=rm&id=' . $note_id . '&a=' . $a . '">' . $strDeleteNote . '</a></div>';			
			}
			else
			{
				$content_output .= '<br><div align="center"><a href="?param=rm&id=' . $note_id . '&o=' . $o . '">' . $strDeleteNote . '</a></div>';			
				
			}
		}
		else
		{
			$content_output = "$strPermissionDenied";
		}
		
	}
}


#Delete notes
if($param=='rm')
{
	
	if($query=mysql_db_query("$projecto","SELECT * from notes WHERE id=$id", $dblink));
	{
		
		$row = mysql_fetch_object($query);
		
		$note_id =     		$row -> id;
		$note_recipient_id =	$row -> recipient_id;
		$note_recipient_type =	$row -> recipient_type;
		
		if($a>0 && $topic_result=mysql_db_query("$projecto","SELECT * from ARTICLEtopic WHERE artigo=$a ORDER BY topic", $dblink))
		{
			$inibit=1;			
			
			while($row = mysql_fetch_object($topic_result) || $inibit==1)
			{
				$topic_serial=		$row -> topic; 
				
				
				if($limittopic[$topic_serial]==0)
				{
					$inibit=0;
				}
			}			
		}
		
		if(strlen($o)>0)
		{
			$inibit=1;			
			
			if(!$limitobject[$o]==1)
			{
				$inibit=0;
			}
			
		}
		
		
		
		if(($note_recipient_type=='a' || $note_recipient_type=='o') && $inibit==0)
		{
			$note_delete = mysql_db_query("$projecto","DELETE from notes WHERE id=$id", $dblink);
			
			$content_output ="$strNoteDeleted";			
			
		}
		else
		{
			$content_output = "$strPermissionDenied";
		}
		
	}
	
}



$output = '<body bgcolor="#FFFFCC">' . $content_output . '</body>';

print $output;

?>



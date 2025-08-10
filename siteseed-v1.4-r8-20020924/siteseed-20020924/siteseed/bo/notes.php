<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: notes.php
Last modified: 20010814

***************************************/ 

require_once "../config.php";
require "./staff_details.php";
require "../include/strings.php";


$param=addslashes($param);


if($param == 'new')
{
	
	$content_output ="<table width='98%' border='0' cellpadding='10'> 
	<tr bgcolor='#FFFFFF' valign='top'> 
	<td bordercolor='#FFFFFF' colspan='2'> 
	<form method='get'  name='Submit'>
	<input name='param' TYPE='hidden' VALUE='save_note'>
	<p align='left'><b>$strRecipient</b></p>
	<p align='left'>$strUser: 
	<select name='user'>
	<option value=''>&nbsp;</option>";
	
	$authors_query=mysql_db_query("$projecto","SELECT id,login from STAFFbase ORDER by login", $dblink);
	
	while($row = mysql_fetch_object($authors_query))
	{
		$login_id = $row->id;
		$login = $row->login;
		
		$content_output .= "<option value=\"$login_id\">$login</option>";
		
	}
	
	
	$content_output .=           			"</select>
	$strArticleID: 
	<input type='text' name='article' size='4' maxlength='7' value=" . $a . ">
	<br>$strPageObjectID: 
	<select name='pobject'>
	<option value=''>&nbsp;</option>";
	
	$objects_query=mysql_db_query("$projecto","SELECT id, title from HEADLINEbase ORDER by title", $dblink);
	
	while($row = mysql_fetch_object($objects_query))
	{
		$object_id = $row->id;
		$object = 	substr($row->title,0,30);
		
		if($object_id == $o)
		{
			$content_output .= "<option value=\"$object_id\" selected>$object</option>";
			
		}
		else
		{
			$content_output .= "<option value=\"$object_id\">$object</option>";
		}
	}
	
	
	$content_output .=  			     "</select>
	</p>
	<hr>
	<p><b>$strEmailSubject:</b> 
	<input type='text' name='subject' size='50' maxlength='80'>
	</p>
	<p v align='top'><b>$strText :</b>      
	<textarea name='main_text' cols='60' rows='5'></textarea>
	</p>
	<hr>
	<p>&nbsp;</p>
	<p align='center'>
	<input type='submit' name='Submit' value=\"$strSend\">
	</p>
	</form>
	<p align='center'>&nbsp;</p>
	</td>
	</tr>
	</table>";
	
}

if ($param=='in')
{
	if($query=mysql_db_query("$projecto","SELECT id, date, author, subject, received from notes WHERE recipient_id=$user_id AND recipient_type='u' ORDER BY date DESC", $dblink));
	{
		
		$content_output = "<div align='right'><i>$strInbox</i></div><hr>";
		
		
		if($query)
		{
			while($row = mysql_fetch_object($query))
			{
				$note_id =     	$row -> id;
				$note_date = 		$row -> date;
				$note_author =		$row -> author;
				$note_subject = 	substr($row -> subject,0,50);
				$note_received = 	$row -> received;
				
				
				$query_author = mysql_db_query("$projecto","SELECT login from STAFFbase WHERE id=$note_author", $dblink);
				
				if($row = mysql_fetch_object($query_author))
				{
					$note_author = $row -> login;
				}		
				
				
				if($note_received == 0)
				{
					$content_output .= '<font color="#990000"><b>';	
				}
				else
				{
					$content_output .= '<font color="#000000">';
				}	
				
				$content_output .= $note_author . ' | ' . $note_subject . ' | ' . $note_date . ' </b></font>';
				
				$content_output .= "<a href=\"?param=view&id=" . $note_id . "\">($strView)</a>&nbsp;&nbsp;&nbsp;<a href=\"?param=rm&id=" . $note_id . "\">($strToDelete)</a><br><br>";
			}
		}
		
	}
	
}


if ($param=='out')
{
	if($query=mysql_db_query("$projecto","SELECT id, date, subject, recipient_id, recipient_type, received from notes WHERE author=$user_id ORDER BY date DESC", $dblink));
	{
		
		$content_output = "<div align='right'><i>$strOutbox</i></div><hr>";
		
		
		if($query)
		{
			while($row = mysql_fetch_object($query))
			{
				$note_id =     		$row -> id;
				$note_date = 			$row -> date;
				$note_subject = 		substr($row -> subject,0,50);
				$note_recipient_id =		$row -> recipient_id;
				$note_recipient_type =	$row -> recipient_type;
				$note_received = 		$row -> received;
				
				
				if($note_recipient_type=='u')
				{
					$query_recipient = mysql_db_query("$projecto","SELECT login from STAFFbase WHERE id=$note_recipient_id", $dblink);
					
					if($row = mysql_fetch_object($query_recipient))
					{
						$note_recipient = $row -> login;
					}		
				}
				else
				{
					if($note_recipient_type=='o')
					{	
						$note_recipient = "Page object " . $note_recipient_id; 
					}
					
					if($note_recipient_type=='a')
					{
						$note_recipient = "Article " . $note_recipient_id; 
					}
					
				}
				
				if($note_received == 0)
				{
					$content_output .= '<font color="#990000"><b>';	
				}
				else
				{
					$content_output .= '<font color="#000000">';
				}
				
				$content_output .= $note_recipient . ' | ' . $note_subject . ' | ' . $note_date . ' </b></font>';
				
				$content_output .= '<a href="?param=outview&id=' . $note_id . '">(' . $strView. ')</a><br><br>';
			}			
		}
	}
	
}




if ($param=='save_note')
{	
	if($user || $pobject || $article)
	{
		
		$subject = addslashes($subject);
		$main_text = addslashes($main_text);
		
		$error=0;
		
		if($user)
		{
			if(!mysql_db_query("$projecto","INSERT INTO notes 
			SET 	date=now(),
			author=$user_id,
			recipient_type='u',
			recipient_id=$user,
			subject='$subject',
			main_text='$main_text'", $dblink))
			{
				$error=1;
			}
			
		}
		
		if($pobject)
		{
			if(!mysql_db_query("$projecto","INSERT INTO notes 
			SET 	date=now(),
			author='$user_id',
			recipient_type='o',
			recipient_id=$pobject,
			subject='$subject',
			main_text='$main_text'", $dblink))
			{
				$error=1;
			}
			
		}
		
		if($article)
		{
			if(!mysql_db_query("$projecto","INSERT INTO notes 
			SET 	date=now(),
			author='$user_id',
			recipient_type='a',
			recipient_id=$article,
			subject='$subject',
			main_text='$main_text'", $dblink))
			{
				$error=1;
			}
			
		}
		
		if($error==1)
		{
			$content_output = "<br><b>$strErrorINSERTonDB</b>";				
		}
		else
		{
			$content_output = "<br><b>$strNoteSent</b>";
		}				
		
	}
	else
	{
		$content_output = "<br><b>$strSelectOneRecipient</b>";
	}
}


if($param=='view' || $param=='outview')
{
	if($query=mysql_db_query("$projecto","SELECT * from notes WHERE id=$id", $dblink));
	{
		
		$row = mysql_fetch_object($query);
		
		$note_id =     			$row -> id;
		$note_date = 			$row -> date;
		$note_author =			$row -> author;
		$note_recipient_id =		$row -> recipient_id;
		$note_recipient_type =		$row -> recipient_type;
		$note_subject = 			$row -> subject;
		$note_text = 			$row -> main_text;
		
		if($note_recipient_type=='a')
		{
			$inibe=2;
		}
		
		if($note_recipient_type=='o')
		{
			$inibe=3;
		}
		
		$inibe_result=0;	
		
		if($query_permissions=mysql_db_query("$projecto","SELECT login,inibe,area from STAFFdetails WHERE login=$user_id AND area=$id AND inibe=$inibe", $dblink))	
		{
			$inibe_result=1;
		}		
		
		
		if(($note_recipient_id==$user_id && $note_recipient_type=='u') || ($note_recipient_type=='a' && $inibe_result==0) || ($note_recipient_type=='o' && $inibe_result==0) || $note_author==$user_id )
		{
			$query_author = mysql_db_query("$projecto","SELECT login from STAFFbase WHERE id=$note_author", $dblink);
			
			if($row = mysql_fetch_object($query_author))
			{
				$note_author = $row -> login;
			}
			
			if($param=='view')
			{
				$result=mysql_db_query("$projecto","UPDATE notes SET received = 1 WHERE id=$id", $dblink);		
			}
			
			$content_output ="<table width='98%' border='1'>
			<tr> 
			<td colspan='2'><b>" . $strAuthor . "</b></td>
			<td width='73%'><b>" . $strDate. "</b></td>
			</tr>
			<tr> 
			<td colspan='2'>" . $note_author . "</td>
			<td width='73%'>" . $note_date . "</td>
			</tr>
			<tr> 
			<td colspan='3'><b>" . $strEmailSubject . "</b></td>
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
			
			
			if($param=='view')
			{
				$content_output .= "<br><div align=\"center\"><a href=\"?param=rm&id=" . $note_id . "\">$DeleteNote</a></div>";			
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
		
		
		
		if($note_recipient_id==$user_id && $note_recipient_type=='u')
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


# Prepare and print HTML output

$output= "	<table width='98%' height='100%' border='0' cellpadding='10'>
<tr>
<td width='120' valign='top' bgcolor='#CCCCCC' bordercolor='#FFFFFF'>
<p><a href='notes.php?param=new'>$strNewNote</a></p>
<p><a href='notes.php?param=in'>$strInbox</a></p>
<p><a href='notes.php?param=out'>$strOutbox</a></p>
</td>
<td  align='left' valign='top'>";


if($content_output)
{
	$output .= $content_output;
}
else
{
	$output .= "&nbsp;";
}


$output .=	'</td></tr></table>';


print($output);

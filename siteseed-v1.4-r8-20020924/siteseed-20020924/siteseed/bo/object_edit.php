<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/object_edit.php
Last modified: 20010815

***************************************/ 



require "whoisthis_bo.php";
require_once "../config.php";
require "../include/box.php";
require "../article/comon.php";
require "./staff_details.php";
require "../include/strings.php";
require "../include/users.php";

$whoami="pls";

$id=addslashes($id);

require "../object/renderer.php";



if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{


	#include CSS

	$css_query=mysql_db_query("$projecto","SELECT name from css_files", $dblink);

	while($css_row=mysql_fetch_object($css_query))
	{
        	$name=$css_row->name;
        	print"<link rel=\"stylesheet\" href=\"../css/$name.css\" type=\"text/css\">\n";
	}



        if($id>0)
        {
                if($EDITORDEFAULTOBJECTS>0 || $EDITORDEFAULTOBJECTOBJECTS[$id]>0)
                {
                        #default
                        $objectid=$EDITORDEFAULTOBJECTS;
                        #exception for this id
                        if($EDITORDEFAULTOBJECTOBJECTS[$id]>0) { $objectid=$EDITORDEFAULTOBJECTOBJECTS[$id]; }
 
                        $myobj="";
                        $objcached=mysql_db_query("$projecto", "SELECT content from HEADLINEbase where id=$objectid", $dblink);
                        while($row = @mysql_fetch_object($objcached))
                        {
                                $myobj=               $row -> content;
                        }
                }
        }
	
# internal message system
	if($query=mysql_db_query("$projecto","SELECT id, date, author, subject, received from notes WHERE recipient_id=$id AND recipient_type='o' ORDER BY date DESC", $dblink));
	{
		
		while($row = @mysql_fetch_object($query))
		{
			$note_id =     		$row -> id;
			$note_date = 		$row -> date;
			$note_author =		$row -> author;
			$note_subject = 		substr($row -> subject,0,50);
			$note_received = 		$row -> received;
			
			
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
			
			
			
			$content_output .= "<a href=\"viewnote.php?id=" . $note_id . "&o=" . $id . "\" target=\"Note\">($strView)</a><br><br>";
			
			
		}
		
		if(strlen($content_output)>0)
		{
			
			$content_output = "<div align=\"left\"><b>$strNotes:</b></div><hr>" . $content_output;
			
			
		}
		
		print($content_output);	
		
	}
	
	if($id>0 && $gravar != $strSave)
	{
#
# Load the object base settings
#
		
		if($result=mysql_db_query("$projecto","SELECT * from HEADLINEbase where id=$id", $dblink))
		{
			while($row = mysql_fetch_object($result))
			{
				$hl_title=		$row -> title;  
				$hl_content=		$row -> content;
			}			
		}
		else
		{
			print "Error: no such object ($id).";
			exit;
		}
	}
	
	
#
# Reconstruct the variable hl_content_new if "Save" or "Preview" under HideHTML
#
	if( $gravar2 != "" )
	{
		$hl_content_new=ereg_replace("\r","",$hl_content_new);
		$hl_content_new=ereg_replace("\n{2,}","\n",$hl_content_new);
		$linha=explode("\n",$hl_content_new);
		$counter_l=0;
		$counter = 0;
		while( each($linha) )
		{
			if( ereg("^INSERIR",$linha[$counter_l]) || ereg("^INSERT",$linha[$counter_l]))
			{
				$hl_content_new = ereg_replace($linha[$counter_l],$$counter,$hl_content_new);
				$counter++;
			}
			$counter_l++;	
		}
		
	}
	
	
	
	
#
#  Save form results if ordered
#
	if( $gravar == $strSave || $gravar2==$strSave )
	{	
		
		
		$hl_title_new=str_replace("'","`",$hl_title_new);
		$hl_content_new=ereg_replace("'",'"',$hl_content_new);
		$hl_title_new		=addslashes($hl_title_new);
		$hl_content_new		=addslashes($hl_content_new);
		$hl_content_new=ereg_replace("\r","",$hl_content_new);
		$hl_content_new=ereg_replace("\n{2,}","\n",$hl_content_new);
		
		if($id<1) # Is this a new object?
		{
			$result=mysql_db_query("$projecto","INSERT INTO HEADLINEbase 
			SET 	title='$hl_title_new'", $dblink);
			$id=mysql_insert_id($dblink);					 
		}
		
		$result=mysql_db_query("$projecto","UPDATE HEADLINEbase 
		SET 	title	  	='$hl_title_new',
		content	 	='$hl_content_new'   
		WHERE id=$id", $dblink);						
		
		$hl_title_new		=stripslashes($hl_title_new);
		$hl_content_new		=stripslashes($hl_content_new);
		
		mysql_db_query("$projecto","delete from CACHE where cachetype=0 and id=$id");
	}		
	
	if(strlen($myobj)>0)    {       print "$myobj"; $myobj=""; }

	if($gravar != "" || $gravar2 != "") 
	{
		
		
		$hl_title=		$hl_title_new;  
		$hl_content=	$hl_content_new; 
		
#
# Make the strings and print the box...
#
		$content	=renderer($hl_content_new);
		
		if( $gravar == $strPreview || $gravar=="Normal" || $gravar2==$strPreview )
		{
			box(	"0",
			"<B>$strPagePreview</B>");
		}
		
		if($gravar == $strSave || $gravar2 == $strSave)
		{
			box(	"0",
			"<B>$strPageSaved</B>");
		}

		print "<br><br><center><TABLE width=80% bgcolor=$EDITORSBGCOLOR><tr><td>";
		print "$content";
		print "</td></tr></table></center><br><br><br>";			
	}
	else
	{
#
# Make the strings and print the box...
#
		$content	=renderer($hl_content);
		
		box(	"0",
		"<B>$strActualPage</B>");
		
		print "<br><br><center><TABLE width=80% bgcolor=$EDITORSBGCOLOR><tr><td>";
		print "$content";
		print "</td></tr></table></center><br><br><br>";			
		
	}
	
#
#  GENERATE A FORM WITH OR WITHOUT HTML
#	
	
	$titulo_outputform  = "<INPUT NAME=\"hl_title_new\" TYPE=\"text\" VALUE='$hl_title' MAXLENGTH=40 SIZE=30>";
	$content_outputform = "<TEXTAREA NAME=\"hl_content_new\" ROWS=20 COLS=60>$hl_content</TEXTAREA>";
	
	if($id==0)
	{
		box(	"0",
		"<B>$strEditing</B>");
	}
	else
	{
		box(	"0",
		"<B>$strEditing $hl_title ($id)...</B>");
	}
	
	print "<FORM NAME=\"preferencias\" METHOD=\"post\">";
	print "<INPUT NAME=\"id\" TYPE=\"hidden\" VALUE=\"$id\">";
	print "<CENTER><TABLE WIDTH=0 cellspacing=20><TR><TD valign=top>";
	
	box(	"0",
	"$strPageTitle",
	"$titulo_outputform");
	print "<br>";
	
	
	
	if( $gravar2!="" || $id!="" & ( $filter=="$strHideHtml" || ( $filter=="" && $gravar!=$strSave && $gravar!=$strPreview )  ) )
	{
		$hl_content=ereg_replace("'",'"',$hl_content);
		$linha=explode("\n",$hl_content);
		$counter_c=0;
		$counter_l=0;
		while( each($linha) )
		{
			
			
			if( ereg("^INSERIR",$linha[$counter_l]) || ereg("^INSERT",$linha[$counter_l]) )
			{
				
				if( ereg("^<!--",$linha[$counter_l-1])!="" )
				{
					$comment = ereg_replace("^<!--","",$linha[$counter_l-1]);
					$comment = ereg_replace("!>","",$comment);
				}	
				else
				{
					$comment = "$strCommand";
					
				}
				
				$content_outputform = "<INPUT NAME=\"$counter_c\" TYPE=\"text\" VALUE='$linha[$counter_l]' MAXLENGTH=1000 SIZE=80>"; 
				box(	"0",
				"$comment",
				"$content_outputform");
				print "<br>";
				
				$counter_c++;
			}	
			
			
			$counter_l++;
		}
		
		
	}
	else
	{
		box(	"0",
		"$strPageProgram",
		"$content_outputform");
		print "<br>";
		
	}
	
	
	print "</TD><TD valign=top>";	
	
#create layout list...
	if($result=mysql_db_query("$projecto","SELECT serial,legenda from ARTICLEboxsetup ORDER BY legenda ASC", $dblink))
	{
		$visual_list = "<table width=100% border=1>";
		while($row = mysql_fetch_object($result))
		{
			$serial=	$row -> serial; 				 
			$visual_name=	$row -> legenda;				
			
			$visual_name=str_replace("Headline ","",$visual_name);
			
			$visual_list .="<tr><td align=left><b>$serial</b></td><td align=left>$visual_name</td></tr>";
		}
		$visual_list .= "</table>";
	}
	
# get sections...
	if($result=mysql_db_query("$projecto","SELECT * from ARTICLEtopictxt ORDER BY legenda ASC", $dblink))
	{
		while($row = mysql_fetch_object($result))
		{
			$serial=                $row -> serial;
			$topicos_name[$serial]= $row -> legenda;
			$topicos_lista .= "$topicos_name[$serial] ($serial)<br>";
		}
	}                                                                                           
	
	box( "0",
	"$strNotes",
	"<a href=\"notes.php?param=new&o=$id\" target=Notes>$strWriteNote</a>");
	print("<br>");
	
	box(	"0",
	"Manual",
	"<a href=\"http://www.siteseed.org/manual/article20visual1.html\" target=manual>$strEditPages</a>");
	print "<br>";
	
	box(	"0",
	"$strLayouts",
	"$visual_list");
	print "<br>";
	
	box(	"0",
	"$strArticleSubjects",
	"$topicos_lista");
	print "<br>";
	
	print "</TR></TABLE></CENTER>";
	
	
	
	
	if($id!="")
	{
		if( $filter=="$strHideHtml" || ( $filter=="" && $gravar!=$strSave && $gravar!=$strPreview) )
		{
			print "<TABLE width=100%><TR><TD align=left><INPUT NAME=\"gravar2\" TYPE=\"submit\" VALUE=\"$strSave\"></TD>";	
			print "<INPUT NAME=\"hl_content_new\" TYPE=\"hidden\" VALUE='$hl_content'>";
			print "<TD align=center><INPUT NAME=\"filter\" TYPE=\"submit\" VALUE=\"$strViewHtml\"></TD>";
			print "<TD align=right><INPUT NAME=\"gravar2\" TYPE=\"submit\" VALUE=$strPreview></TD></TR></TABLE>";				
		}
		else
		{
			print "<TABLE width=100%><TR><TD align=left><INPUT NAME=\"gravar\" TYPE=\"submit\" VALUE=$strSave></TD>";
			print "<TD align=center><INPUT NAME=\"filter\" TYPE=\"submit\" VALUE=\"$strHideHtml\"></TD>";
			print "<TD align=right><INPUT NAME=\"gravar\" TYPE=\"submit\" VALUE=$strPreview></TD></TR></TABLE>";
		}
	}
	else
	{
		print "<TABLE width=100%><TR><TD align=left><INPUT NAME=\"gravar\" TYPE=\"submit\" VALUE=$strSave></TD>";	
		print "<TD align=right><INPUT NAME=\"gravar\" TYPE=\"submit\" VALUE=$strPreview></TD></TR></TABLE>";
	}
	
	
	print "</FORM>";	
	
	
}			

# Data Mining

$string="";
reset($HTTP_GET_VARS);
$key=key($HTTP_GET_VARS);
$value=current($HTTP_GET_VARS);
while( list($key,$value) = each($HTTP_GET_VARS) )
{
	$string.="$key\t$value\t";
}
recordsession_bo("object_edit.php",$string,$_SERVER['REMOTE_USER'],$HTTP_USER_AGENT,$_SERVER['REMOTE_ADDR'],$datamining);

?>

<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/article_write.php
Last modified: 20010830

***************************************/ 
require "whoisthis_bo.php";
require_once "../config.php";
require "../include/box.php";
require "../article/comon.php";
require "./staff_details.php";                                                                                
require "../include/strings.php";
require "../include/html_check.php";

$whoami=$_SERVER['REMOTE_USER'];
$id=addslashes($id);

$realtime=0;

#include CSS

$css_query=@mysql_db_query("$projecto","SELECT name from css_files", $dblink);

while($css_row=@mysql_fetch_object($css_query))
{
        $name=$css_row->name;
        print"<link rel=\"stylesheet\" href=\"../css/$name.css\" type=\"text/css\">\n";
}



function editor_replace($texto)
{
	global $projecto;
	global $dblink;
	global $base_serial;
        global $DEFAULT_VISUAL;
		global $LOCATE_LAYOUT;

	mysql_select_db ("$projecto");
	
	$linha=explode("\n", $texto);
	
	$qual=0;
	while(each($linha))
	{
		if(ereg('^.LOCATE ', $linha[$qual]) && strlen($linha[$qual])>8)
		{
#
# Internal search engine for related links
#
			$conteudoidx=substr($linha[$qual], 8);
			
			if(strlen($conteudoidx)>0)
			{
				$conteudoidx=str_replace("'","`",$conteudoidx);
				$conteudoidx=str_replace("\r","",$conteudoidx);
				$conteudoidx=str_replace("\n","",$conteudoidx);
				$conteudoidx=str_replace("\"","",$conteudoidx);
				$conteudoidx=str_replace("\t","",$conteudoidx);
				$conteudoidx=str_replace("  "," ",$conteudoidx);

				$arguments=split("\|",$conteudoidx);

				for($counter=1; $counter<count($arguments)+1; $counter++)
				if(strlen($arguments[$counter])>0)
				{
					// limit by number
					if(eregi('NLIMIT ', $arguments[$counter]))
					{
						$arguments[$counter]=eregi_replace("NLIMIT ", "", $arguments[$counter]);
						$nlimit=$arguments[$counter];
						$nlimit += 0;
					}

					// limit by days
					if(eregi('DLIMIT ', $arguments[$counter]))
					{
						$arguments[$counter]=eregi_replace("DLIMIT ", "", $arguments[$counter]);
						$dlimit=$arguments[$counter];
						$dlimit += 0;
					}
				}

				$conteudoidx=$arguments[0];
				$conteudoidx=strip_tags($conteudoidx);

				if($dlimit>0)	{	$qdlimit="and ARTICLEbase.lastchanged >= DATE_SUB(now(), INTERVAL $dlimit DAY)";	}
				else		{	$qdlimit="";	}
				$query="SELECT ARTICLEkeywords.article as article FROM ARTICLEbase,ARTICLEkeywords WHERE ARTICLEbase.serial=ARTICLEkeywords.article and ARTICLEkeywords.palavra like \"$conteudoidx%\" and ARTICLEbase.aprovado >= 1 and ARTICLEbase.lastchanged <= now() $qdlimit GROUP BY ARTICLEbase.serial ORDER BY ARTICLEbase.lastchanged DESC";
				if($nlimit>0)	{	$query .= " LIMIT 0,$nlimit";	}

				$resultado=mysql_query("$query", $dblink);
				
				$previous=0;
				while($row = mysql_fetch_object($resultado))
				{
					$hit=	$row -> article; 				 
					
					if($hit != $previous && $hit != $base_serial)
					{
						if($articledata=mysql_query("SELECT title,lastchanged from ARTICLEbase where serial=$hit", $dblink))
						{
							while($articlerow = mysql_fetch_object($articledata))
							{
								$titulo=	$articlerow -> title;  
								$lastchanged=	$articlerow -> lastchanged;

								$locate_output=$LOCATE_LAYOUT;
								$locate_output=str_replace("--LINK--","index.php?article=$hit&visual=$DEFAULT_VISUAL",$locate_output);
								$locate_output=str_replace("--ARTICLETITLE--",$titulo,$locate_output);
								$locate_output=str_replace("--DATE--",$lastchanged,$locate_output);
								
								$novotexto .= "$locate_output" . "\n";
							}
						}
						
						$previous=$hit;
					}
				}				
			}
			
		}
		else
		{
			if(strlen($linha[$qual])>0)
			{
				$novotexto .= $linha[$qual] . "\n";
			}
		}
		
		$qual++;
	}
	
	return($novotexto);
}


if($veid>0)
{
	$id=$veid;
	$ve_content_html=eregi_replace("<p>", "", $ve_content_html);
	$ve_content_html=eregi_replace("</p>", "<br><br>", $ve_content_html);
	$ve_content_html=eregi_replace("\n", "", $ve_content_html);
	$ve_content_html=eregi_replace("\r", "", $ve_content_html);
	$ve_content_html=eregi_replace("<br>", "\n", $ve_content_html);
	$ve_content_html=eregi_replace("<em>", "<i>", $ve_content_html);	
	$ve_content_html=eregi_replace("</em>", "</i>", $ve_content_html);
	$ve_content_html=eregi_replace("<strong>", "<b>", $ve_content_html);	
	$ve_content_html=eregi_replace("</strong>", "</b>", $ve_content_html);
	$ve_content_html=eregi_replace("src=\"(".$imagesURL.")+images", "src=\"images", $ve_content_html);
	$ve_content_html=eregi_replace("src=(".$imagesURL.")+images", "src=images", $ve_content_html);
}


if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
	mysql_select_db ("$projecto");

# get the object from cache, regardless of the expiry date, if calling an article
	if($id>0)
	{
		if($EDITORDEFAULTOBJECTS>0 || $EDITORDEFAULTARTICLEOBJECTS[$id]>0)
		{
			#default
			$objectid=$EDITORDEFAULTOBJECTS;
			#exception for this id
			if($EDITORDEFAULTARTICLEOBJECTS[$id]>0)	{ $objectid=$EDITORDEFAULTARTICLEOBJECTS[$id]; }	

			$myobj="";
		        $objcached=mysql_query("SELECT content from HEADLINEbase where id=$objectid", $dblink);
		        while($row = @mysql_fetch_object($objcached))
		        {
       		 	        $myobj=               $row -> content;
      		 	}
		}
	
		# internal message scan	
		if($query=mysql_query("SELECT id, date, author, subject, received from notes WHERE recipient_id=$id AND recipient_type='a' ORDER BY date DESC", $dblink));
		{
			if($query)
			{
				while($row = mysql_fetch_object($query))
				{
					$note_id =     		$row -> id;
					$note_date = 		$row -> date;
					$note_author =		$row -> author;
					$note_subject = 		substr($row -> subject,0,50);
					$note_received = 		$row -> received;
				
				
					$query_author = mysql_query("SELECT login from STAFFbase WHERE id=$note_author", $dblink);
				
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
				
					$content_output .= "<a href=viewnote.php?id=" . $note_id . "&a=" . $id . " target=Note>($strView)</a><br><br>";
				}
			}
		}
		
		if(strlen($content_output)>0)
		{
			$content_output = "<div align=\"left\"><b>$strNotes:</b></div><hr>" . $content_output;
		}
		
		print($content_output);	
		
	}
	
	if($id>0 && $gravar != "$strSave")
	{

#
# Load the article base settings
#
		if($result=mysql_query("SELECT * from ARTICLEbase where serial=$id", $dblink))
		{
			while($row = mysql_fetch_object($result))
			{
				$base_serial=		$row -> serial;
				$base_title=		$row -> title;  
				$base_boxsetup=		$row -> boxsetup; 				 
				$base_boxtype=		$row -> boxtype; 				 
				$base_class=$row->class;
				$base_debate=		$row -> debate;
				$base_forum=		$row -> forum;
				$base_submission_on=	$row -> submission_on;  
				$base_submited_by=	$row -> submited_by;
				$base_approval_on= 	$row -> approval_on;
				$base_approved_by=	$row -> approved_by;
				$base_aprovado=		$row -> aprovado;
				$base_lastchanged=	$row -> lastchanged;
				$base_restricted=		$row -> restricted;
				$base_html=		$row-> html;
				$base_unsearchable=	$row-> unsearchable;
			}			
		}
		else
		{
			print "$strFatalError: $strArticleInex ($id).";
			exit;
		}
		
#
# Load the article contents (if any)
#		
		if($result=mysql_query("SELECT * from ARTICLEcontent where artigo=$id", $dblink))
		{
			while($row = mysql_fetch_object($result))
			{
				$type=			$row -> type; 				 
				$item_text[$type]=	$row -> stuff;
				
				if($type==$vefield && $vefield>0)
				{
					$veform_submission="ve_content_html";					
					$item_text[$type]=$$veform_submission;
				}
			}			
		}
		
#
#  Load the box setup, so that we how the article should be 
# displayed on screen...
#
		if($result=mysql_query("SELECT * from ARTICLEboxsetup where serial=$base_boxsetup", $dblink))
		{
			while($row = mysql_fetch_object($result))
			{
				$bs_title_area=		$row -> title_area; 				 
				$bs_header_area=	$row -> header_area;
				$bs_content_area=	$row -> content_area;
				$bs_footer_area=	$row -> footer_area;
			}			
		}		
		
		
# tematic sections...
		$quantos_topicos=0;
		$granted=0;
		
		if($result=mysql_query("SELECT article,topic from ARTICLEtopic WHERE article=$id", $dblink))
		{
			while($row = mysql_fetch_object($result))
			{
				$topic=		$row -> topic; 				 
				
				$topico[$topic]=$topic;
				
				$quantos_topicos++;
				if($topic==$security_areastatus)
				{
					$granted=1;
				}
			}			
		}
		
		if($quantos_topicos>0 && $granted==0 && $security_areastatus>0)
		{
			print "$strArticleNotClass";
			exit;
		}
		
#
# Make the strings and print the box...
#
		$article=$id;

		box(	"0",
		"<B>$strActualArticle</B>");

		if(strlen($myobj)>0)	{	$tooutput=$myobj; $myobj="";	}		
		else 			{	$tooutput=""; }
		
		print "<br><br><center><TABLE width=80% bgcolor=$EDITORSBGCOLOR><tr><td>";
		$tooutput.=box(	"$base_boxtype",
		"$bs_header_area",
		"$bs_content_area",
		"$bs_footer_area",
		"$bs_title_area",1);
		$tooutput=replace_macros($tooutput);
		
		
		if(html_check("$tooutput",1)<2)
		{
			print "$tooutput";
		}
		
		print "</td></tr></table></center><br><br><br>";			
	}
	
	$agora=getdate();
	
	$hora=$agora['hours'];
	$minutos=$agora['minutes'];
	$segundos=$agora['seconds'];		
	$dia=$agora['mday'];
	$mes=$agora['mon'];
	$ano=$agora['year'];
	
	
#
#  Save form results if ordered
#
	if($gravar == "$strSave")
	{
		$base_title_new=str_replace("'","`",$base_title_new);
		
				
		$base_title_new		=addslashes($base_title_new);
		$base_class_new		=addslashes($base_class_new);
		$base_debate_new	=addslashes($base_debate_new);
		$base_forum_new         =addslashes($base_forum_new);
		$base_boxsetup_new	=addslashes($base_boxsetup_new);
		$base_boxtype_new	=addslashes($base_boxtype_new);
		$base_aprovado_new	=addslashes($base_aprovado_new);
		$whoami			=addslashes($whoami);
		$hora_new		=addslashes($hora_new);
		$minutos_new		=addslashes($minutos_new);
		$segundos_new		=addslashes($segundos_new);		
		$dia_new		=addslashes($dia_new);
		$mes_new		=addslashes($mes_new);
		$ano_new		=addslashes($ano_new);
		$base_restricted_new	=addslashes($base_restricted_new);
		$base_html_new		+=0;
		$base_unsearchable_new          +=0;
		if($id<1) # Is this a new article?
		{
			$result=mysql_query("INSERT INTO ARTICLEbase 
			SET 	title='$base_title_new',
			lastchanged=now(),
			submission_on = now()", $dblink);
			$id=mysql_insert_id($dblink);
		}
		
		$result=mysql_query("UPDATE ARTICLEbase 
		SET 	title	  	='$base_title_new',
		class	  	='$base_class_new',
		debate	  	='$base_debate_new',
		forum		='$base_forum_new',
		boxsetup	='$base_boxsetup_new', 
		boxtype		='$base_boxtype_new', 
		submited_by   	='$whoami',
		restricted		='$base_restricted_new',
		html		='$base_html_new',
		unsearchable	='$base_unsearchable_new' 
		WHERE serial=$id", $dblink);						
		
		if($security_status>1) # editors can approve articles and change publishing dates
		{
			if($alterar_data==1)
			{
				$result=mysql_query("UPDATE ARTICLEbase 
				SET 	approved_by  	='$whoami',
				approval_on	= now(),
				lastchanged	= '$ano_new-$mes_new-$dia_new $hora_new-$minutos_new-$segundos_new',   
				aprovado	='$base_aprovado_new'   
				WHERE serial=$id", $dblink);						
			}
			else
			{
				$result=mysql_query("UPDATE ARTICLEbase 
				SET 	approved_by  	='$whoami',
				approval_on	= now(),
				aprovado	='$base_aprovado_new'   
				WHERE serial=$id", $dblink);						
			}
			
		}
		
		if($base_aprovado<1 && $alterar_data==1) # Jornalists can change dates on articles that are not yet approved
		{
			$result=mysql_query("UPDATE ARTICLEbase 
			SET 	lastchanged	= '$ano_new-$mes_new-$dia_new $hora_new-$minutos_new-$segundos_new'
			WHERE serial=$id", $dblink);						
		}
		
# article components
		if($result=mysql_query("SELECT serial from ARTICLEtypetxt", $dblink))
		{
			while($row = mysql_fetch_object($result))
			{
				$serial=		$row -> serial; 				 
				
#delete old contents (if any)
				mysql_query("DELETE from ARTICLEcontent 
				WHERE artigo=$id AND type=$serial", $dblink);
				
#save new contents (if any)
				$vname="item_text$serial";
				$conteudo=$$vname;
				
				$conteudo=editor_replace($conteudo);
				
				$conteudo	=addslashes($conteudo);
				
				
				if(!mysql_query("INSERT INTO ARTICLEcontent 
				SET 	artigo=\"$id\",
				stuff =\"$conteudo\",
				type=\"$serial\"", $dblink))
				{
					print "Error: field id $serial<br>";
				}					 
				
				$conteudo	=stripslashes($conteudo);
			}			
		}			
		
# tematic sections...
		if($result=mysql_query("SELECT * from ARTICLEtopictxt", $dblink))
		{
#delete old contents (if any)
			mysql_query("DELETE from ARTICLEtopic 
			WHERE article=$id", $dblink);
			
			while($row = mysql_fetch_object($result))
			{
				$serial= $row -> serial; 				 
				
				$vname="topico$serial";
				$conteudo=$$vname;
				$topico[$serial]=$conteudo;	
				
				if($topico[$serial] != "")
				{
					if(!mysql_query("INSERT INTO ARTICLEtopic 
					SET 	article=$id,
					topic=$serial", $dblink))
					{
						print "Erro de gravaçao de topicos (topico: $serial)<br>";
					}
				}							
			}			
		}
		
		$base_title_new		=stripslashes($base_title_new);
		$base_class_new		=stripslashes($base_class_new);
		$base_debate_new	=stripslashes($base_debate_new);
		$base_forum_new         =stripslashes($base_forum_new);
		$base_boxsetup_new	=stripslashes($base_boxsetup_new);
		$base_boxtype_new	=stripslashes($base_boxtype_new);
		$base_aprovado_new	=stripslashes($base_aprovado_new);
		$whoami			=stripslashes($whoami);
		$hora_new		=stripslashes($hora_new);
		$minutos_new		=stripslashes($minutos_new);
		$segundos_new		=stripslashes($segundos_new);		
		$dia_new		=stripslashes($dia_new);
		$mes_new		=stripslashes($mes_new);
		$ano_new		=stripslashes($ano_new);
		$base_restricted_new	=stripslashes($base_restricted_new);
		
#
# Search engine feeding...
#
		
		$conteudoidx="$base_title_new ";
		
# article componentes
		if($result=mysql_query("SELECT serial,indexable from ARTICLEtypetxt", $dblink))
		{
			while($row = mysql_fetch_object($result))
			{
				$serial=		$row -> serial; 				 
				$indexable=		$row -> indexable; 				 
				
#grab contents (if any)
				if($indexable == 1)
				{ 
					$vname="item_text$serial";
					$conteudoidx .= $$vname;
				}
			}			
		}
		
		$conteudoidx=str_replace("'","`",$conteudoidx);
		$conteudoidx=str_replace("\r","",$conteudoidx);
		$conteudoidx=str_replace("\n"," ",$conteudoidx);
		$conteudoidx=str_replace("\"","",$conteudoidx);
		$conteudoidx=str_replace(".","",$conteudoidx);
		$conteudoidx=str_replace(",","",$conteudoidx);
		$conteudoidx=str_replace(";","",$conteudoidx);
		$conteudoidx=str_replace(":","",$conteudoidx);
		
		
		$conteudoidx=str_replace("\t","",$conteudoidx);
		$conteudoidx=str_replace("  "," ",$conteudoidx);
		
		$conteudoidx=strip_tags($conteudoidx);
		
		$palavras=explode(" ", $conteudoidx);
		$quantas=count($palavras);
		
#
# delete previous data for this article
#

		mysql_query("DELETE FROM ARTICLEkeywords 
		WHERE 	article=\"$id\"", $dblink);
		
	if($base_unsearchable_new!=1)
        {

		$qual=0;
		while(each($palavras))
		{
			$guardar=$palavras[$qual];
			$done=0;
			$offset=1;
			while(strlen($guardar)<35 && $done==0)
			{
				if($qual+$offset<$quantas)
				{
					$guardar .= " " . $palavras[$qual+$offset];
				$offset++; 				}
				else
				{
					$done=1;
				}
			}			
			
			if(strlen($guardar)>0 && strlen($guardar)<50)
			{				
#
# Save the strings to be searched
#
				if(!mysql_query("INSERT INTO ARTICLEkeywords 
				SET 	article=\"$id\",
				palavra ='$guardar'", $dblink))
				{
					print "Erro de gravaçao de strings para pesquisa<br>";
				}					 
				
			}
			
			$qual++;
		}
	   }	
       }		
	
	if($gravar != "") 
	{
		$base_title=		$base_title_new;  
		$base_class=		$base_class_new;  
		$base_debate=		$base_debate_new;  
		$base_forum=            $base_forum_new;
		$base_boxsetup=		$base_boxsetup_new;
		$base_boxtype=		$base_boxtype_new;
		$base_aprovado=		$base_aprovado_new;
		$hora=			$hora_new;
		$minutos=		$minutos_new;
		$segundos=		$segundos_new;		
		$dia=			$dia_new;
		$mes=			$mes_new;
		$ano=			$ano_new;
		$base_restricted=	$base_restricted_new;
		$base_html=		$base_html_new;	
		$base_unsearchable=	$base_unsearchable_new;	

		if($gravar=="$strSave")
		{
			if($result=mysql_query("SELECT * from ARTICLEbase where serial=$id", $dblink))
			{
				while($row = mysql_fetch_object($result))
				{
					$base_submission_on=	$row -> submission_on;  
					$base_submited_by=	$row -> submited_by;
					$base_approval_on= 	$row -> approval_on;
					$base_approved_by=	$row -> approved_by;
					$base_lastchanged=	$row -> lastchanged;
				}			
			}
		}
		
# article components
		if($result=mysql_query("SELECT serial from ARTICLEtypetxt", $dblink))
		{
			while($row = mysql_fetch_object($result))
			{
				$serial=		$row -> serial; 				 
				
				$vname="item_text$serial";
				$conteudo=$$vname;
				
				$conteudo=editor_replace($conteudo);
				
				$item_text[$serial]=	$conteudo;
			}
		}
		
# tematic sections...
		if($result=mysql_query("SELECT * from ARTICLEtopictxt", $dblink))
		{
			while($row = mysql_fetch_object($result))
			{
				$serial=		$row -> serial; 				 
				
				$vname="topico$serial";
				$conteudo=$$vname;
				
				if($conteudo != "")
				{
					$topico[$serial]=$serial;
				}
			}			
		}
		
#
#  Load the box setup, so that we how the article should be 
# displayed on screen...
#
		if($result=mysql_query("SELECT * from ARTICLEboxsetup where serial=$base_boxsetup", $dblink))
		{
			while($row = mysql_fetch_object($result))
			{
				$bs_title_area=		$row -> title_area; 				 
				$bs_header_area=	$row -> header_area;
				$bs_content_area=	$row -> content_area;
				$bs_footer_area=	$row -> footer_area;
			}			
		}			
		
#
# Make the strings and print the box...
#
		$article=$id;
		
		if($gravar == "$strPreview")
		{
			box(	"0",
			"<B>$strArticlePreview</B>");
		}
		
		if($gravar == "$strSave")
		{
			box(	"0",
			"<B>$strActualArticle</B>");
		}
		
		print "<br><br><center><TABLE width=80%  bgcolor=$EDITORSBGCOLOR><tr><td>";

		if(strlen($myobj)>0)	{	$tooutput=$myobj; $myobj="";	}		
		else 			{	$tooutput="";			}
		
		$tooutput.=box(	"$base_boxtype",
		"$bs_header_area",
		"$bs_content_area",
		"$bs_footer_area",
		"$bs_title_area",1);

		if(eregi('\$days_dc\$', $tooutput) || eregi('\$checkfield[0-9]+(,[0-9]+)*\$', $tooutput) || eregi('\$approved_pubcom_nr\$', $tooutput) || eregi('\$pubcom_nr\$', $tooutput))
		{
			$realtime=1;
		}
		
		$tooutput=replace_macros($tooutput);
		
		if(html_check("$tooutput",1)<2)
		{
			print "$tooutput";
			
			if($gravar == "$strSave" && $id>0 && $realtime==0) # save article rendered to cache
			{
				$tooutput=addslashes($tooutput);
				$base_boxsetup +=0;
				$base_boxtype+=0;
				
				mysql_query("DELETE from CACHE 
				WHERE cachetype=1 AND id=$id", $dblink);
				
				mysql_query("INSERT INTO CACHE 
				(expire_on,cachetype,id,content,layout,box) VALUES
				(now(),1,$id,'$tooutput',$base_boxsetup,$base_boxtype)", $dblink);
				
			}
		}
		
		print "</td></tr></table></center><br><br><br>";
	}
	
#
#  GENERATE A NEW FORM...
#	
	
	$titulo_outputform = "<INPUT NAME=\"base_title_new\" TYPE=\"text\" VALUE='$base_title' MAXLENGTH=200 SIZE=63>";
	
	if($result=mysql_query("SELECT serial,legenda,xsize,ysize,dsize from ARTICLEtypetxt ORDER BY ordem", $dblink))
	{
		while($row = mysql_fetch_object($result))
		{
			$serial=		$row -> serial; 				 
			$legenda[$serial]=	$row -> legenda;
			$xsize[$serial]=	$row -> xsize;
			$ysize[$serial]=	$row -> ysize;
			$dsize[$serial]=	$row -> dsize;
		}			
	}
	
	while(list ($serial, $nome) = each ($legenda) )
	{
		$sizechars[$serial]=strlen($item_text[$serial]);
		
		$item_text[$serial]=ereg_replace("\r", "", $item_text[$serial]);
		
		if(eregi("text", $nome))
		{
			$item_text[$serial] .= $wordimport;
			if($xsize[$serial]==0)	{	$xsize[$serial]=63;	}
			if($ysize[$serial]==0)	{	$ysize[$serial]=30;	}
			
			$item_outputform[$serial] = "<CENTER><TEXTAREA NAME=\"item_text$serial\" ROWS=$ysize[$serial] COLS=$xsize[$serial] WRAP=virtual>" . htmlentities($item_text[$serial]) . "</TEXTAREA></center>";
		}
		else
		{
			if($xsize[$serial]==0)	{	$xsize[$serial]=63;	}
			if($ysize[$serial]==0)	{	$ysize[$serial]=15;	}
			$item_outputform[$serial] = "<CENTER><TEXTAREA NAME=\"item_text$serial\" ROWS=$ysize[$serial] COLS=$xsize[$serial] WRAP=virtual>" . htmlentities($item_text[$serial]) . "</TEXTAREA></center>";
		}
	}
	
	if($result=mysql_query("SELECT * from ARTICLEtopictxt ORDER BY legenda ASC", $dblink))
	{
		while($row = mysql_fetch_object($result))
		{
			$serial=		$row -> serial; 				 
			
			if($security_areastatus==0 || $security_areastatus==$serial)
			{
				$valor=$limittopic[$serial];
				if($valor==0 && !ereg("^_deleted_",$row -> legenda))
				{
					$topicos_name[$serial]=	$row -> legenda;
					$topicos_name[$serial] .= " ($serial)";				
				}
			}
		}			
	}
	
	while(list ($serial, $nome) = each ($topicos_name) )
	{
		if($topico[$serial]>0)
		{
			$topic_outputform .= "<INPUT NAME=\"topico$serial\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" CHECKED=TRUE> $topicos_name[$serial]<br>";
		}
		else
		{
			$topic_outputform .= "<INPUT NAME=\"topico$serial\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\"> $topicos_name[$serial]<br>";
		}
	}
	
	if($result=mysql_query("SELECT serial,legenda from ARTICLEboxsetup where legenda not like 'Headline%' ORDER BY legenda ASC", $dblink))
	{
		$serialcounter=0;
		while($row = mysql_fetch_object($result))
		{
			$serial=		$row -> serial; 				 
			$visual_name[$serial]=	$row -> legenda;				
			$serialcounter++;
			
			if($serial==$base_boxsetup)
			{
				$visual_outputform .="<option value=\"$serial\" selected>$visual_name[$serial]";
			}
			else
			{
				$visual_outputform .="<option value=\"$serial\">$visual_name[$serial]";
			}
		}
		if($serialcounter>0) { $visual_outputform="<select name=\"base_boxsetup_new\">" . "$visual_outputform" . "</select>"; }
		

		if($base_html)
		{
			$visual_outputform.="<br><br><table><tr><td align=left><input type=checkbox name=base_html_new value=1 checked> $strDoNotConvert</td></tr>";
		}
		else
		{
			$visual_outputform.="<br><br><table><tr><td align=left><input type=checkbox name=base_html_new value=1> $strDoNotConvert</td></tr>";
		}
	
		if($base_unsearchable)
		{
			$visual_outputform.="<tr><td align=left><input type=checkbox name=base_unsearchable_new value=1 checked> $strUnsearchable</td></tr></table>";
		}
		else
		{
			$visual_outputform.="<tr><td align=left><input type=checkbox name=base_unsearchable_new value=1> $strUnsearchable</td></tr></table>";
		}
	}
	
	
	if($result=mysql_query("SELECT id,title from BOXbase where title not like 'Headline%' ORDER BY title ASC", $dblink))
	{
		$box_outputform = "<option value=\"-1\">$strNone";
		$serialcounter=0;
		while($row = mysql_fetch_object($result))
		{
			$serial=		$row -> id; 				 
			$box_name[$serial]=	$row -> title;				
			$serialcounter++;
			
			if($serial==$base_boxtype)
			{
				$box_outputform .="<option value=\"$serial\" selected>$box_name[$serial]";
			}
			else
			{
				$box_outputform .="<option value=\"$serial\">$box_name[$serial]";
			}
		}
		if($serialcounter>0) { $box_outputform="<select name=\"base_boxtype_new\">" . "$box_outputform" . "</select>";	}
	}

	if($id<1) # use default forum options
	{
		$base_debate=$DEFAULT_DEBATE;
	}

	if($base_debate<1){$check2="checked";}else{$check2="";}
	if($base_debate==1){$check1="checked";}else{$check1="";}
	if($base_debate==2){$check3="checked";}else{$check3="";}
	if($base_debate==3){$check4="checked";}else{$check4="";}

	$debate_outputform .= "<input type=\"radio\" name=\"base_debate_new\" value=1 $check1>
    $strNone 
 <br>
    <input type=\"radio\" name=\"base_debate_new\" value=0 $check2>
    $strComments 
<br>
    <input type=\"radio\" name=\"base_debate_new\" value=2 $check3>
    $strFwithoutclass 
<br>
    <input type=\"radio\" name=\"base_debate_new\" value=3 $check4>
    $strFwithclass <select name=base_forum_new>";
	

if($result=mysql_query("SELECT serial,name from ARTICLEforum ", $dblink))
                

while($forum_row=mysql_fetch_object($result))
{	$check="";
      	if($base_forum==$forum_row->serial)$check="selected";
	$debate_outputform.="<option value=$forum_row->serial $check>$forum_row->name</option>";
}

$debate_outputform.="</select>";	
	
	
	$counter=0;
	while($counter<7)
	{
		if($counter==0) $valor="-";
		else		$valor=$counter-1;
		
		if($base_class==$counter)
		{
			$classificacao_outputform .="<option value=\"$counter\" selected>$valor";
		}
		else
		{
			$classificacao_outputform .="<option value=\"$counter\">$valor";
		}
		$counter++;
	}
	$classificacao_outputform="<select name=\"base_class_new\">" . "$classificacao_outputform" . "</select>";			
	
	
	
	if($id==0)
	{
		box(	"0",
		"<B>$strNewM $strArticle </B>");
	}
	else
	{
		box(	"0",
		"<B>$strEditing $strArticle $id...</B>");
	}
	
	print "<FORM NAME=\"preferencias\" METHOD=\"post\">";
	print "<INPUT NAME=\"id\" TYPE=\"hidden\" VALUE=\"$id\">";
	print "<CENTER><TABLE WIDTH=0 cellspacing=20><TR><TD valign=top>";
	
	$chars=strlen($base_title);
	box(	"0",
	"$strTitle <b><font size=-2>($chars chars)</font></b>",
	"$titulo_outputform");
	print "<br>";
	
	reset($legenda);
	while(list ($serial, $nome) = each ($legenda) )
	{
		$chars=$sizechars[$serial];
		if($dsize[$serial]>0)	{	$chars .= "/$dsize[$serial]";	}
		box(	"0",
		"$nome <b><font size=-2>($chars chars)</font></b>",
		"$item_outputform[$serial]",
		"<div align=right><small>$strVEmsg1: <a href=ve.php?id=$id&field=$serial>800x600</a> / <a href=ve.php?id=$id&field=$serial&editor_width=980&editor_height=475>1024x768</a></small></div>");
		print "<br>";
	}
	
	print "</TD><TD valign=top>";
	
	
	box( "0",
	"$strNotes",
	"<a href=\"notes.php?param=new&a=$id\" target=Notes>$strWriteNote</a>");
	print("<br>");
	
	
	if($security_status>1) # editores podem aprovar artigos e mudar datas
	{
		if($base_aprovado>0)
		{
			if($result=mysql_query("SELECT * from ARTICLEbase where serial=$id", $dblink))
			{
				while($row = mysql_fetch_object($result))
				{
					$base_lastchanged=	$row -> lastchanged;
				}			
			}
			$editor_outputform  .= "<font size=-1><b>$strPublishDate:</b><br>$base_lastchanged<br><br><b>$strNewDate:</b><br>";
			$editor_outputform  .= "$strDate: <INPUT NAME=\"ano_new\" TYPE=\"text\" VALUE=\"$ano\" MAXLENGTH=4 SIZE=4>:";
			$editor_outputform  .= "<INPUT NAME=\"mes_new\" TYPE=\"text\" VALUE=\"$mes\" MAXLENGTH=2 SIZE=2>:";
			$editor_outputform  .= "<INPUT NAME=\"dia_new\" TYPE=\"text\" VALUE=\"$dia\" MAXLENGTH=2 SIZE=2><br>";
			$editor_outputform  .= "$strHours: <INPUT NAME=\"hora_new\" TYPE=\"text\" VALUE=\"$hora\" MAXLENGTH=2 SIZE=2>:";
			$editor_outputform  .= "<INPUT NAME=\"minutos_new\" TYPE=\"text\" VALUE=\"$minutos\" MAXLENGTH=2 SIZE=2>:";
			$editor_outputform  .= "<INPUT NAME=\"segundos_new\" TYPE=\"text\" VALUE=\"$segundos\" MAXLENGTH=2 SIZE=2></font><br>";
			$editor_outputform  .= "<SELECT name=\"alterar_data\"><OPTION VALUE=0 SELECTED>$strKeepDate<OPTION VALUE=1>$strChangeDate</SELECT><br>";
		}
		
		if($base_aprovado>0)
		{
			$options= "<OPTION VALUE=1 SELECTED>$strApproved<OPTION VALUE=0>$strTo_be_Approved";
		}
		else
		{
			$options= "<OPTION VALUE=1>$strApproved<OPTION VALUE=0 SELECTED>$strTo_be_Approved";
		}
		
		$editor_outputform  .= "<SELECT name=\"base_aprovado_new\">$options</SELECT><br>";
		
		box(	"0",
		"$strEditorCorner",
		"<center>$editor_outputform</center>");
		print "<br>";
		$editor_outputform="";
	}
	
	if($id>0)
	{
		box(	"0",
		"$strWordImport",
		"<center><a href=\"wordupload.php?id=$id\">$strUpload</a></center>");
		print "<br>";
		
		box(	"0",
		"$strFiles",
		"<center><a href=\"upload.php?artigo=$id\" target=\"_imagens_upload_$id\" width=700>$strUpload</a><br><a href=\"browse_files.php?artigo=$id\" target=\"_images_list_$id\" width=300>$strList</a></center>");
		print "<br>";
	}
	else
	{
		box(	"0",
		"$strWordImport",
		"<center>$strSave $strBefore $strUpload</center>");
		print "<br>";
		
		box(	"0",
		"$strImages",
		"<center>$strSave $strBefore $strUpload $strImages</center>");
		print "<br>";
	}
	
	
	if($base_aprovado<1)
	{
		if($result=mysql_query("SELECT * from ARTICLEbase where serial=$id", $dblink))
		{
			while($row = mysql_fetch_object($result))
			{
				$base_lastchanged=	$row -> lastchanged;
			}			
		}
		
		$editor_outputform  .= "<font size=-1><b>$strPublishDate:</b><br>$base_lastchanged<br><br><b>$strNewDate</b><br>";
		$editor_outputform  .= "$strDate: <INPUT NAME=\"ano_new\" TYPE=\"text\" VALUE=\"$ano\" MAXLENGTH=4 SIZE=4>:";
		$editor_outputform  .= "<INPUT NAME=\"mes_new\" TYPE=\"text\" VALUE=\"$mes\" MAXLENGTH=2 SIZE=2>:";
		$editor_outputform  .= "<INPUT NAME=\"dia_new\" TYPE=\"text\" VALUE=\"$dia\" MAXLENGTH=2 SIZE=2><br>";
		$editor_outputform  .= "$strHours: <INPUT NAME=\"hora_new\" TYPE=\"text\" VALUE=\"$hora\" MAXLENGTH=2 SIZE=2>:";
		$editor_outputform  .= "<INPUT NAME=\"minutos_new\" TYPE=\"text\" VALUE=\"$minutos\" MAXLENGTH=2 SIZE=2>:";
		$editor_outputform  .= "<INPUT NAME=\"segundos_new\" TYPE=\"text\" VALUE=\"$segundos\" MAXLENGTH=2 SIZE=2></font><br>";
		$editor_outputform  .= "<SELECT name=\"alterar_data\"><OPTION VALUE=0 SELECTED>$strKeepDate<OPTION VALUE=1>$strChangeDate</SELECT><br>";
		
		box(	"0",
		"$strPublishDate",
		"<center>$editor_outputform</center>");
		print "<br>";
	}
	
	if($box_outputform !="")
	{
		box(	"0",
		"$strBoxes",
		"<center>$box_outputform</center>");
		print "<br>";
	}
	
	if($visual_outputform !="")
	{                                                                                           
		box(	"0",
		"$strLayout",
		"<center>$visual_outputform</center>");
		
		print "<br>";
	}
	
	
	box(	"0",
	"$strSubjects...",
	"$topic_outputform");
	
	print "<br>";			
	
	box(	"0",
	"$strComments",
	"$debate_outputform");
	
	print "<br>";			
	
	box(	"0",
	"$strClassification",
	"<center>$classificacao_outputform</center>");
	
	print "<br>";			
	
	$manualsitedoc="<a href=\"http://www.siteseed.org/manual/article10visual1.html\" target=\"manual\">$strArticleLinks</a>";
	
	box(	"0",
	"$strManual",
	"$manualsitedoc");
	
	
	$restricted="<TEXTAREA NAME=\"base_restricted_new\" ROWS=5 COLS=25 WRAP=virtual>$base_restricted</TEXTAREA>";
	
	print "<br>";
	
	box(	"0",
	"$strRestrictedArticleTo",
	"$restricted");
	
	
	print "</TD></TR></TABLE></CENTER>";	
	
	print "<TABLE width=100%><TR><TD align=left><INPUT NAME=\"gravar\" TYPE=\"submit\" VALUE=\"$strSave\"></TD>";
	
	print "<TD align=right><INPUT NAME=\"gravar\" TYPE=\"submit\" VALUE=\"$strPreview\"></TD></TR></TABLE>";				
	
	
	print "</FORM>";	
	
# Data Mining
	
	$string="";
	reset($HTTP_GET_VARS);
	$key=key($HTTP_GET_VARS);
	$value=current($HTTP_GET_VARS);
	while( list($key,$value) = each($HTTP_GET_VARS) )
	{
		$string.="$key\t$value\t";
	}
	recordsession_bo("article_write.php",$string,$_SERVER['REMOTE_USER'],$HTTP_USER_AGENT,$_SERVER['REMOTE_ADDR'],$datamining);
	
}			
?>

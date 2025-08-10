<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: article/show.php
Last modified: 20013103

***************************************/ 

require_once "article/comon.php";
require_once "include/box.php";
require "include/strings.php";

$article +=0;
$visual +=0;
$layout+=0;

$area_id +=0;

$print_article+=0;
$email_article+=0;

if($article>0)	{$id=$article;}
$id=addslashes($id);

$realtime=0;

if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
	mysql_select_db (DB_NAME);

	if($list>0 && $topico>0)
	{
		$id=0;
		
		if($listagem=mysql_query("SELECT DISTINCT ARTICLEbase.serial from ARTICLEbase,ARTICLEtopic WHERE ARTICLEbase.aprovado>0 AND ARTICLEtopic.topic=$topico AND ARTICLEtopic.article=ARTICLEbase.serial ORDER BY ARTICLEbase.lastchanged DESC LIMIT $list", $dblink))
		{
			while($row = mysql_fetch_object($listagem))
			{
				$base_serial=		$row -> serial;
				
				if($artigo=mysql_query("SELECT title,lastchanged from ARTICLEbase where serial=$base_serial", $dblink))
				{
					while($rowartigo = mysql_fetch_object($artigo))
					{
						$base_title=		$rowartigo -> title;  
						$base_lastchanged=	$rowartigo -> lastchanged;
					}			
				}
			}				
		}
	}
	
	
	if($id>0)
	{
#
# Load the article base settings
#
		
		if($result=mysql_query("SELECT * from ARTICLEbase where serial=$id AND aprovado>0", $dblink))
		{
			while($row = mysql_fetch_object($result))
			{
				$base_serial=		$row -> serial;
				$base_title=		$row -> title;  
				$basediv=		$row -> div; 
				$basefont=		$row -> font; 
				$base_boxsetup=		$row -> boxsetup; 				 
				$base_boxtype=		$row -> boxtype; 				 
				$base_class=$row->class;
				$base_debate=		$row -> debate;
				$forum_serial=		$row -> forum;
				$total_comments=	$row -> total_comments;
				$base_debate_class=	$row -> debate_class;
				$base_submission_on=	$row -> submission_on;  
				$base_submited_by=	$row -> submited_by;
				$base_approval_on= 	$row -> approval_on;
				$base_approved_by=	$row -> approved_by;
				$base_aprovado=		$row -> aprovado;
				$base_lastchanged=	$row -> lastchanged;
				$base_restricted=	$row -> restricted;
				$base_html=		$row -> html;
			}			
		}
		
		
# Restricted area
		$access_ok=0;
		if( $session_id && $base_restricted && strlen($_SERVER['REMOTE_USER'])==0)
		{
			$result=mysql_query("SELECT login from users where session_id='$session_id'", $dblink);
			$row=mysql_fetch_object($result);
			$logged_user=$row->login;
			
			$base_restricted=ereg_replace("\r", "", $base_restricted);
			$access_logins=explode("\n",$base_restricted);
			$counter=0;
			while( each($access_logins) )
			{
				if( $access_logins[$counter]==$logged_user || $access_logins[$counter]=="todos" || $access_logins[$counter]=="all")
				{
					$access_ok=1;
				}
				$counter++;
			}
		}
		
		
		if( ( $base_restricted && $access_ok ) || strlen($_SERVER['REMOTE_USER'])>0 || !$base_restricted ) 
		{
			if($base_aprovado>0)
			{	
# if the article rendered is in cache use it, otherwise render it and cache it!
				$base_boxsetup +=0;
				if ($layout>0)
				{
					if($layresult=mysql_query("SELECT * from ARTICLEboxsetup where serial=$layout", $dblink))
					{
						$base_boxsetup=$layout;					
					}
				}
				if ($box>0 || $box=="-1")
				{
					if($boxresult=mysql_query("SELECT * from BOXbase where id=$box", $dblink))
					{
						$base_boxtype=$box;					
					}
				}
				$base_boxtype +=0;
				
				$artcache=mysql_query("SELECT content from CACHE where cachetype=1 AND id=$base_serial AND layout=$base_boxsetup AND box=$base_boxtype", $dblink);
				$content='';
				while($row = @mysql_fetch_object($artcache))
				{
					$content= $row -> content;
				}
				
				$incache=0;
				if(strlen($content)>0 && !$myself)
				{
					print "$content";
					if($email_article)
					{	
						$content=ereg_replace("'", "", $content);
						$content=ereg_replace("\n", "", $content);
						print"<br><br><form action=\"email_article.php\" method=POST>\n$strEmailFrom : <input type=text name=\"who_sends\" maxlenght=30 size=20><br><br>$strTo : \n<input type=text name=\"who_receives\" maxlenght=30 size=20><br><br>$strEmailSubject : \n<input type=text name=\"subject\" maxlenght=30 size=30><br><br> $strEmailComment:<br>\n<TEXTAREA NAME=\"email_comment\" TYPE=\"textarea\" ROWS=10 COLS=50 WRAP=PHYSICAL>\n</TEXTAREA><br><br>\n<input type=submit name=gravar value=$strSend>\n<input type=hidden name=output_email value='$content'>\n</form>";
					}
					$incache=1;
				}
				else
				{                          
#
# Load the article contents (if any)
#		
					if($result=mysql_query("SELECT * from ARTICLEcontent where artigo=$id ORDER BY type", $dblink))
					{
						while($row = mysql_fetch_object($result))
						{
							$type=			$row -> type;
							$item_text[$type]=	$row -> stuff;
							$bdiv[$type]=		$row -> div;
							$bfont[$type]=		$row -> font;
							
							$campo="field$type";	
							$what=$$campo;
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
				}
				

				if($result=mysql_query("SELECT article,topic from ARTICLEtopic WHERE article=$id", $dblink))
				{
					while($row = mysql_fetch_object($result))
					{
						$topic=		$row -> topic; 				 
						
						$topico[$topic]=$topic;	
					}			
				}
				
#
# Does this record have forum and is it built-in?
#
				if ($nopubcom<1)
				{
					$pubcombox2="";
				
					$query=mysql_query("SELECT archive from ARTICLEforum where serial=$forum_serial",$dblink);
			                	$row=@mysql_fetch_object($query);
					$archive=$row->archive;




					if($area_id)
					{
						if( ($result=mysql_query("SELECT comments,comments_layout from areas where id=$area_id", $dblink) ) && $area_id!=0 )
						{
							$row=mysql_fetch_object($result);
							$comments_form=$row->comments;
							$comments_layout=$row->comments_layout;
						}
					}
					else
					{
						$result=mysql_query("SELECT serial from ARTICLEpubcomforms where type='comments'", $dblink);
						if($row=mysql_fetch_object($result))$comments_form=$row->serial;
					}
				
					if($comments_layout==0)
					{
						$query=mysql_query("SELECT serial from ARTICLEboxsetup where legenda='default comment layout'", $dblink);
						$row=mysql_fetch_object($query);
						$comments_layout=$row->serial;					
					}
				
				
					if($base_debate==0 && $comments_form!=0 && !$print_article && !$email_article || ($base_debate==3 && !$archive) || $base_debate==2)
					{
						if($resultform=mysql_query("SELECT * from ARTICLEpubcomforms where serial=$comments_form", $dblink))
						{
							while($rowform = mysql_fetch_object($resultform))		
							{
								$form_boxtype=		$rowform -> boxtype;
								$form_header=		$rowform -> header;
								$form_form=			$rowform -> form;
								$form_footer=		$rowform -> footer;
								$form_type=			$rowform -> type;

								$form_header=str_replace("-pubcom_myname-",$current_user, $form_header);
							
								if($session_id)
								{
									$current_user=get_user_data(login);
									$current_mail=get_user_data(email);
									$current_fullname=get_user_data(FullName);
                                    $form_form=ereg_replace('"',"",$form_form);
									$form_form=str_replace("VALUE=-pubcom_myname-","VALUE=$current_user readonly", $form_form);
								}
								else
								{
									$form_form=str_replace("-pubcom_myname-",$current_user, $form_form);
                                }
							
								$form_footer=str_replace("-pubcom_myname-",$current_user, $form_footer);

								$current_user=str_replace('"',"",$current_user);
								
								$readonly="";
								if ($current_fullname!="")
								{
									$readonly="readonly";
								}
								$form_header=preg_replace("/value[\s]*=[\s]*[\"']*[\s]*-pubcom_myfullname-[\s]*[\"']*/i","value='".$current_fullname."' ".$readonly,$form_header);
								$form_form=preg_replace("/value[\s]*=[\s]*[\"']*[\s]*-pubcom_myfullname-[\s]*[\"']*/i","value='".$current_fullname."' ".$readonly,$form_form);
								$form_footer=preg_replace("/value[\s]*=[\s]*[\"']*[\s]*-pubcom_myfullname-[\s]*[\"']*/i","value='".$current_fullname."' ".$readonly,$form_footer);

								$form_header=str_replace("-pubcom_myfullname-","$current_fullname readonly", $form_header);
								$form_form=str_replace("-pubcom_myfullname-","$current_fullname readonly", $form_form);
								$form_footer=str_replace("-pubcom_myfulname-","$current_fullname readonly", $form_footer);
																
								$form_header=str_replace("-pubcom_myemail-",$current_mail, $form_header);
								$form_form=str_replace("-pubcom_myemail-",$current_mail, $form_form);
								$form_footer=str_replace("-pubcom_myemail-",$current_mail, $form_footer);
								$form_header=str_replace("-article-",$article, $form_header);
								$form_form=str_replace("-article-",$article, $form_form);
								$form_footer=str_replace("-article-",$article, $form_footer);
								$form_header=str_replace("-visual-",$visual, $form_header);
								$form_form=str_replace("-visual-",$visual, $form_form);
								$form_footer=str_replace("-visual-",$visual, $form_footer);
								
								if($form_type == "old comments" )
								{
									$form_header	=stripslashes($form_header);
									$form_form	=stripslashes($form_form);
									$form_footer	=stripslashes($form_footer);				
								
								
									$pubcombox2=box("$form_boxtype",
									"$form_header",
									"$form_form",
									"$form_footer",
									"",1 );
								
									$pubcombox2="<center><table width=0><tr><td>" . $pubcombox2 . "</td></tr></table></center>";
								}
								else
								{
									if($myself)
									{
										$parent=$myself;
									}
									else
									{
										$parent=0;
									}
									$form_c.="<form method=post>$form_form<input type=hidden name=parent value=\"$parent\"><INPUT NAME=\"article\" TYPE=\"hidden\" VALUE=\"$article\"><INPUT NAME=\"visual\" TYPE=\"hidden\" VALUE=\"$visual\"></form>";
									$pubcombox2=box("-1","","$form_c","","",1);
									$pubcombox2="<center><table width=0><tr><td>" . $pubcombox2 . "</td></tr></table></center>";
								}
							}
						}
					}
				}			
				
#
# Make the strings and print the box...
#
				if($incache==0)
				{
					$savethis=box(	"$base_boxtype",
					"$bs_header_area",
					"$bs_content_area",
					"$bs_footer_area",
					"$bs_title_area",1);
					

					
					if(eregi('\$days_dc\$', $savethis) || eregi('\$checkfield[0-9]+(,[0-9]+)*\$', $savethis) || eregi('\$approved_pubcom_nr\$', $savethis) || eregi('\$pubcom_nr\$', $savethis))
					{
						$realtime=1;
					}


					$savethis=replace_macros($savethis,$visual,$area_id,$base_serial);
					
					if(!$myself)
					{
						print "$savethis";
					}
					
					if($email_article)
					{
						$savethis=ereg_replace("'", "", $savethis);
						$savethis=ereg_replace("\n", "", $savethis);
						print"<br><br><form action=\"email_article.php\" method=POST>$strEmailFrom : <input type=text name=\"who_sends\" maxlenght=30 size=20><br><br>$strTo : <input type=text name=\"who_receives\" maxlenght=30 size=20><br><br>$strSubject : <input type=text name=\"subject\" maxlenght=30 size=30><br><br> $strEmailComment:<br><TEXTAREA NAME=\"email_comment\" TYPE=\"textarea\" ROWS=10 COLS=50 WRAP=PHYSICAL></TEXTAREA><br><br><input type=submit name=gravar value=$strSend><input type=hidden name=output_email value='$savethis'></form>";
					}
					
					
					// save the cache
					if($realtime==0)
					{
						$savethis=addslashes($savethis);
						mysql_query("INSERT INTO CACHE
						(expire_on,cachetype,id,content,layout,box) VALUES
						(now(),1,$base_serial,'$savethis',$base_boxsetup,$base_boxtype)", $dblink);
					}
				}
				
				if( $comments_form!=0 && $base_debate==0 && !$print_article && !$email_article || $base_debate==3 || $base_debate==2)
				{
					if($resultform=mysql_query("SELECT * from ARTICLEboxsetup where serial=$comments_layout", $dblink))
					{
						$row=mysql_fetch_object($resultform);
						$form_boxtype=		$row -> box_type;
						$form_header=		$row -> header_area;
						$form_form=		$row -> content_area;
						$form_footer=		$rowform -> footer_area;
					}
					
					
					if($PUBCOMEXCEPTIO[$article]=="true")
					{
						$PUBCOMRESTRICT=$PUBCOMEXCEPTIONRESTRICT[$article];
						$PUBCOMORDER=$PUBCOMEXCEPTIONORDER[$article];
						$PUBCOMLIMIT=$PUBCOMEXCEPTIONLIMIT[$article];
					}
					
					$PUBCOMRESTRICT+=0;
					$PUBCOMORDER+=0;
					$PUBCOMLIMIT+=0;					
					
					if($PUBCOMRESTRICT==1 && !$myself)
					{
						$limitaprtovados="aprovado=1 and";
					}
					
					if($PUBCOMORDER==1)
					{
						$limitorder="DESC";
					}
					
					if($PUBCOMLIMIT>0)
					{
						$limitnumber="LIMIT 0,$PUBCOMLIMIT";
					}
					
					if($base_debate==3 || $base_debate==2)
					{
						if($myself)
						{
							$forum_query="serial=$myself AND";
						}
						else
						{
							$forum_query="serial=0 AND";
						}


					}
					else
					{
						$forum_query="";
					}
					


					if($pc_aprov_result=mysql_query("SELECT total_posts,submission_on,nome,email,title,texto from ARTICLEpubcom WHERE $forum_query $limitaprtovados article=$article ORDER BY submission_on $limitorder $limitnumber", $dblink))
					{					
						while($pc_aprov_row = mysql_fetch_object($pc_aprov_result))
						{
							$pc_aprov_submission_on	=$pc_aprov_row -> submission_on;
							$pc_aprov_nome		=$pc_aprov_row -> nome;
							$pc_aprov_email		=$pc_aprov_row -> email;
							$pc_aprov_title		=$pc_aprov_row -> title;
							$pc_aprov_texto		=$pc_aprov_row -> texto;
							$pc_aprov_total_posts         =$pc_aprov_row -> total_posts;							

							$pc_aprov_texto	=str_replace("\n","<br>", $pc_aprov_texto);
							
							global $DATE_FORMAT;
							$pc_aprov_submission_on=strtotime($pc_aprov_submission_on);
							$pc_aprov_submission_on=date($DATE_FORMAT,$pc_aprov_submission_on);
							
							if(ereg("@","$pc_aprov_email")>0)
							{
								if(strlen($pc_aprov_nome)>0)
								{
									$identificacao="<a href=\"mailto:$pc_aprov_email\">$pc_aprov_nome</a>";
								}
								else
								{
									$identificacao="<a href=\"mailto:$pc_aprov_email\">$pc_aprov_email</a>";
								}
							}
							else
							{
								if(strlen($pc_aprov_nome)>0)
								{
									$identificacao="$pc_aprov_nome";
								}
								else
								{
									$identificacao=$strAnonymous;
								}
							}
							
							$form_header2=$form_header;
							$form_form2=$form_form;
							$form_footer2=$form_footer;
							
							$form_header2	=str_replace("-titulo-",$pc_aprov_title, $form_header2);
							$form_form2	=str_replace("-titulo-",$pc_aprov_title, $form_form2);
							$form_footer2	=str_replace("-titulo-",$pc_aprov_title, $form_footer2);
							$form_header2	=str_replace("-identificacao-",$identificacao, $form_header2);
							$form_form2	=str_replace("-identificacao-",$identificacao, $form_form2);
							$form_footer2	=str_replace("-identificacao-",$identificacao, $form_footer2);
							$form_header2	=str_replace("-data-",$pc_aprov_submission_on, $form_header2);
							$form_form2	=str_replace("-data-",$pc_aprov_submission_on, $form_form2);
							$form_footer2	=str_replace("-data-",$pc_aprov_submission_on, $form_footer2);
							$form_header2	=str_replace("-texto-",$pc_aprov_texto, $form_header2);
							$form_form2	=str_replace("-texto-",$pc_aprov_texto, $form_form2);
							$form_footer2	=str_replace("-texto-",$pc_aprov_texto, $form_footer2);
							$form_header2	=str_replace("-email-",$pc_aprov_email, $form_header2);
							$form_form2	=str_replace("-email-",$pc_aprov_email, $form_form2);
							$form_footer2	=str_replace("-email-",$pc_aprov_email, $form_footer2);
										


							if( $pc_class=mysql_query("SELECT class FROM ARTICLEpubcom WHERE serial=$myself", $dblink) )
							{
								while( $row=mysql_fetch_object($pc_class) )
								{
									$class=$row->class;
									if( ereg("-",$class) )
									{
										$class=ereg_replace("-","",$class);
										$total_class=$total_class-$class;
									}
									else
									{
										$total_class+=$class;
									}
								}
							}
							
							$form_form2=str_replace("-pubcom_class-",$total_class,$form_form2);


							$form_header2	=stripslashes($form_header2);
							$form_form2		=stripslashes($form_form2);
							$form_footer2	=stripslashes($form_footer2);
							
							if($form_boxtype==""){$form_boxtype==0;}
							
							$pubcomaprovados .=box(	"$PUBCOMUSEBOX",
							"$form_header2",
							"$form_form2",
							"$form_footer2",
							"",1 );
							$pubcomaprovados .="<br>";
						}
					}
					
				}
#
# Receive & save comments...
#
				if(strlen($pubcom_texto)>0 || $pubcom_class>0)
				{
					$agradecimento  = "<center><br><table width=50%><tr><td>";
					$agradecimento .= box("$AGRADECIMENTOBOX","",$AGRADECIMENTOPUBCOM,"","",1);
					$agradecimento .= "</td></tr></table><br><CENTER>";
					
					$pubcom_nome=strip_tags($pubcom_nome);
					$pubcom_email=strip_tags($pubcom_email);
					$pubcom_title=strip_tags($pubcom_title);
					$pubcom_texto=strip_tags($pubcom_texto);
					
					$pubcom_nome=str_replace("\'","`",$pubcom_nome);
					$pubcom_email=str_replace("\'","`",$pubcom_email);
					$pubcom_title=str_replace("\'","`",$pubcom_title);
					$pubcom_texto=str_replace("\'","`",$pubcom_texto);
					
					$pubcom_nome=htmlentities($pubcom_nome);
					$pubcom_email=htmlentities($pubcom_email);
					$pubcom_title=htmlentities($pubcom_title);
					$pubcom_texto=htmlentities($pubcom_texto);
					
					$pubcom_nome=addslashes($pubcom_nome);
					$pubcom_email=addslashes($pubcom_email);
					$pubcom_title=addslashes($pubcom_title);
					$pubcom_texto=addslashes($pubcom_texto);
					
					
					$parent+=0;
					$pubcom_class += 0;
					
					if($checkresult=mysql_query("SELECT texto,article,class from ARTICLEpubcom ORDER BY submission_on DESC LIMIT 1", $dblink))
					{
						while($checkrow = mysql_fetch_object($checkresult))
						{
							$gravado_texto=$checkrow -> texto;
							$gravado_article=$checkrow -> article;
							$gravado_class=$checkrow->class;
							
						}
					}
					


					

					if($forum_serial)
        	                        {
						$query=mysql_query("SELECT points_post,points_post_un from ARTICLEforum where serial=$forum_serial",$dblink);
						$row=mysql_fetch_object($query);
						$points_post=$row->points_post;
						$points_post_un=$row->points_post_un;

                                                if($session_id)
                                                {
                                                        $query=mysql_query("SELECT  karma from users where session_id='$session_id'",$dblink);
                                                        $row=mysql_fetch_object($query);
                                                        $user_karma=$row->karma;
							$user_karma+=$points_post;
							$forum_class=$points_post;
                                                        mysql_query("UPDATE users SET karma=$user_karma where session_id='$session_id'",$dblink);

                                                }
                                                else
						{
                                                	$forum_class=$points_post_un;
						}


					}




					if(	($gravado_texto != $pubcom_texto ||
					$gravado_article <> $article ||
					$gravado_class <> $pubcom_class) &&
					(strlen($pubcom_nome)<80 && strlen($pubcom_email)<80 && strlen($pubcom_title)<255))
					{
						if(strlen($pubcom_title)==0 && strlen($pubcom_texto)==0)
						{						
							if($pubcom_class>0)
							{
#
# auto-approve and mark voting submissions
#
								mysql_query("INSERT into ARTICLEpubcom
								SET parent='$parent',
								article	= '$article',
								submission_on=now(),
								class='$pubcom_class',
								aprovado='2'", $dblink);
							
								if($myself)
                	                                        {
                        	                                        $pc_aprov_total_posts+=1;
                               	        	                         mysql_query("UPDATE ARTICLEpubcom
                               		                                 set total_posts=$pc_aprov_total_posts where serial=$myself",$dblink);
        	                                                }
	
						
								$total_comments+=1;
                                                        	mysql_query("UPDATE ARTICLEbase
                                                        	set total_comments=$total_comments where serial=$article",$dblink);
							}
						}
						else
						{
							if(strlen($pubcom_title)==0)
							{
								$pubcom_title=$strUnnamed;
							}							

							if($forum_serial)
							{
								$pubcom_class=$forum_class;
							}
							
							if($base_debate==2)
							{
								if($session_id)
								{
									$pubcom_class=1;
								}
								else
								{
									$pubcom_class=0;
								}
							}
							

							mysql_query("INSERT into ARTICLEpubcom
							SET parent='$parent',
							article= '$article',
							submission_on=now(),
							nome='$pubcom_nome',
							email='$pubcom_email',
							class=$pubcom_class,
							title='$pubcom_title',
							texto='$pubcom_texto'", $dblink);
	
							if($myself)
							{							
								$pc_aprov_total_posts+=1;
								mysql_query("UPDATE ARTICLEpubcom
                                                        	set total_posts=$pc_aprov_total_posts where serial=$myself",$dblink);
							}
							$total_comments+=1;
							mysql_query("UPDATE ARTICLEbase
							set total_comments=$total_comments where serial=$article",$dblink);
							
							

						}
					}
					
					if( $nopubcom<1 && $pubcomaprovados!="")
					{
						print "<br>$pubcomaprovados<br>";
					}
					
					if(($base_debate==3 || $base_debate==2) && $nopubcom<1)
					{
						require "article/forum.php";
                    }



					if(strlen($pubcombox2)>0) 
					{
						print "<br>$agradecimento<br>";
					}
					
				}
				else
				{
					if($nopubcom<1 && $pubcomaprovados!="")
					{
						print "<br>$pubcomaprovados<br>";
					}
					
					if(($base_debate==3 || $base_debate==2) && $nopubcom<1)
					{
						require "article/forum.php";
					}


					if(strlen($pubcombox2)>0) 
					{
						print "<br>$pubcombox2<br>";
					}
				}				
			}
		}
	}
}			

?>


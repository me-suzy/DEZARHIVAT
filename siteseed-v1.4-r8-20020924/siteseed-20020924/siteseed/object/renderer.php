<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: object/renderer.php 
Last modified: 20011405

***************************************/



$renderer_declared=1;

function renderer($string,$visualid=0,$area_id=0,$headline=0)
{
	
	global $REMOTE_USER;

	if(strlen($REMOTE_USER)>0)
	{
		require_once "../include/complete_url.php";
	}
	else
	{
		require_once "include/complete_url.php";
	}
	
	global $projecto;
	global $database_server;
	global $database_username;
        global $database_password;
	global $PUBCOMRESTRICT;
	global $PUBCOMORDER;
	global $PUBCOMUSEBOX;
	global $PUBCOMLIMIT;
	global $HEADLINE_CACHE;
	
	global $session_id;
	global $item_text;
	global $id_artigo;
	global $base_html;
	global $base_title;  
	global $base_class;
	global $base_submission_on; 
	global $base_submited_by;
	global $base_approval_on;
	global $base_approved_by;
	global $base_lastchanged;
	global $date_i;
	global $strm1;
        global $strm2;
        global $strm3;
        global $strm4;
        global $strm5;
        global $strm6;
        global $strm7;
        global $strm8;
        global $strm9;
        global $strm10;
        global $strm11;
        global $strm12;
        global $strSun;
        global $strMon;
        global $strTue;
        global $strWed;
        global $strThu;
        global $strFri;
        global $strSat;
				
	$realtime=0;

	$original_dblink=mysql_connect($database_server, $database_username, $database_password);
	$original_project=$projecto;

	$linha=explode("\n",$string);
	
	$counter=0;
	$novastring="";
	
	
#
# Check if there is any INSERT calendar
#

	while( each($linha) )
        {
		if(eregi("^INSERIR calendario", $linha[$counter] ) || eregi("^INSERT calendar", $linha[$counter] ) )
		{
			$linha[$counter]=ereg_replace("\r","",$linha[$counter]);
                        $param=explode(" ", $linha[$counter]);
                        
			$inserted_calendar=1;

			$qual=0;
			
#
# Defaults
#			print"$date_i<br>";
			if($date_i)
			{
				$date_i+=0;
				$backupdate_i=$date_i;
			}


			$font_size=2;
			$font_face="arial";
			$font_color="000000";
			$table_border=0;
			$table_size="100%";
		
                        while( each($param) )
                        {
           	             	
				
					if( eregi("date_i=",$param[$qual] ) )
                        		{
						$valores=explode("date_i=", $param[$qual]);
                                  		$tmp_date_i=$valores[1];
						$tmonth=substr($tmp_date_i,4,2);
                         	              	$tyear=substr($tmp_date_i,0,4);
						$tday=substr($tmp_date_i,6,2);
						if(checkdate($tmonth,$tday,$tyear))
						{
							$date_i=$tmp_date_i;
							$month_i=$tmonth;
							$year_i=$tyear;
							$day_i=$tday;
							
                             			}
					}
				

					if( eregi("date_f=",$param[$qual] ) )
                                	{
						$valores=explode("date_f=", $param[$qual]);
                                       		$tmp_date_f=$valores[1];
                                       		$tmonth=substr($tmp_date_f,4,2);
                                        	$tyear=substr($tmp_date_f,0,4);
                                        	$tday=substr($tmp_date_f,6,2);
                                        	if(checkdate($tmonth,$tday,$tyear))
                                        	{
                                              		$date_f=$tmp_date_i;
                                               		$month_f=$tmonth;
                                                	$year_f=$tyear;
                                               		$day_f=$tday;

                                        	}

                                	}
				
		
				if( eregi("font_size=",$param[$qual] ) )
                                {
                                        $valores=explode("font_size=", $param[$qual]);
                                        $font_size=$valores[1];

                                }

				if( eregi("font_color=",$param[$qual] ) )
                                {
                                        $valores=explode("font_color=", $param[$qual]);
                                        $font_color=$valores[1];

				}
				if( eregi("font_face=",$param[$qual] ) )
                                {
                                        $valores=explode("font_face=", $param[$qual]);
                                        $font_face=$valores[1];

                                }

				if( eregi("table_border=",$param[$qual] ) )
                                {
                                        $valores=explode("table_border=", $param[$qual]);
                                        $table_border=$valores[1];

				}
				if( eregi("table_size=",$param[$qual] ) )
                                {
                                        $valores=explode("table_size=", $param[$qual]);
                                        $table_size=$valores[1];

				}
				if( eregi("subjects=", $param[$qual] ) )
                                {
                                                $areasql="";
                                                $valores=explode("=", $param[$qual]);
                                                $areas=$valores[1];
                                                $areasdef=explode(",", $areas);

                                                $qualarea=0;
                                                while(each($areasdef))
                                                {
                                                        if($qualarea>0) { $areasql .=" OR ";}
                                                        else            { $areasql .=" AND (";}
                                                        $areasql .="ARTICLEtopic.topic=$areasdef[$qualarea]";
                                                        $qualarea++;
                                                }

                                                if($areasql != "") { $areasql .=") ";}
                                }


			
			$qual++;
			}

			if($backupdate_i)
			{
				$date_i=$backupdate_i;
				$month_i=substr($date_i,4,2);
                                $year_i=substr($date_i,0,4);
                                $day_i=substr($date_i,6,2);
				$date_f="";
			}


			if(!$date_i)
			{
				$date_i=time();
				$month_i=date("m");
				$year_i=date("Y");
				$day_i=date("d");
			}

			if(!$date_f)
			{
				$date_f=$date_i;
				$year_f=$year_i;
				$month_f=$month_i;
				$day_f=$day_i;
			}

			$sqlfilter_i=$year_i."-".$month_i."-".$day_i." 00:00:00";
			$sqlfilter_f=$year_f."-".$month_f."-".$day_f." 23:59:59";

			
#
# Make the Calendar
#

		$lastdmonth=28;

		for ($i=$lastdmonth;$i<32;$i++)
		{
      			if (checkdate($month_i, $i, $year_i))
      			{
	         		$lastdmonth = $i;
      			}
		}



		$sqldate_i=$year_i."-".$month_i."-01 00:00:00";
		$sqldate_f=$year_i."-".$month_i."-".$lastdmonth." 23:59:59";

		$article_query=mysql_db_query("$projecto","SELECT ARTICLEbase.serial, ARTICLEbase.lastchanged from 
ARTICLEbase,ARTICLEtopic where ARTICLEbase.lastchanged>=\"$sqldate_i\" AND  ARTICLEbase.lastchanged<=\"$sqldate_f\" AND  ARTICLEbase.lastchanged<now() 
AND aprovado=1 AND ARTICLEbase.serial=ARTICLEtopic.article $areasql",$original_dblink);

		$firstdweek= date("w", mktime(0, 0, 0, $month_i, 1, $year_i));


		if(ereg("%",$table_size))
		{
        		$table_size=ereg_replace("%","",$table_size);
        		$cell_size=$table_size/7;
        		$cell_size.="%";
        		$table_size.="%";
		}	
		else
		{
        		$cell_size=$table_size/7;
		}




		if ($month_i < 2)
   		{
      			$prevmonth = 12;
   			$prevyear = $year_i - 1;
   		}
  		else
		{
      			$prevmonth = $month_i - 1;
			if($prevmonth<10){$prevmonth="0".$prevmonth;}
      			$prevyear = $year_i;
   		}

   		if ($month_i > 11)
   		{
      			$nextmonth = "01";
      			$nextyear = $year_i + 1;
   		}
   		else
   		{
      			$nextmonth = $month_i + 1;
      			if($nextmonth<10){$nextmonth="0".$nextmonth;}
			$nextyear = $year_i;
   		}



		if($month_i=="01"){$strmonth=$strm1;}
		if($month_i=="02"){$strmonth=$strm2;}
		if($month_i=="03"){$strmonth=$strm3;}
		if($month_i=="04"){$strmonth=$strm4;}
		if($month_i=="05"){$strmonth=$strm5;}
		if($month_i=="06"){$strmonth=$strm6;}
		if($month_i=="07"){$strmonth=$strm7;}
		if($month_i=="08"){$strmonth=$strm8;}
		if($month_i=="09"){$strmonth=$strm9;}
		if($month_i=="10"){$strmonth=$strm10;}
		if($month_i=="11"){$strmonth=$strm11;}
		if($month_i=="12"){$strmonth=$strm12;}


		$calendar_string="<div align=center><table cellpading=10><tr><td><a href=index.php?headline=$headline&visual=$visualid&date_i=$prevyear$prevmonth"."31><<</a></td><td><font size=$font_size color=$font_color face=$font_face>$strmonth $year_i </font></td><td><a href=index.php?headline=$headline&visual=$visualid&date_i=$nextyear$nextmonth"."01>>></a></td></tr></table></div><br>";
		
		$calendar_string.="<table border=$table_border width=$table_size><tr><td align=center width=$cell_size><font size=$font_size color=$font_color face=$font_face>$strSun</font></td><td align=center width=$cell_size><font size=$font_size color=$font_color face=$font_face>$strMon</font></td><td align=center width=$cell_size><font size=$font_size color=$font_color face=$font_face>$strTue</font></td><td align=center width=$cell_size><font size=$font_size color=$font_color face=$font_face>$strWed</font></td><td align=center width=$cell_size><font size=$font_size color=$font_color face=$font_face>$strThu</font></td><td align=center width=$cell_size><font size=$font_size color=$font_color face=$font_face>$strFri</font></td><td align=center width=$cell_size><font size=$font_size color=$font_color face=$font_face>$strSat</font></td></tr>";

		$tmpday=1;


		while ( $tmpday <= $lastdmonth )
		{
        		$calendar_string.="<tr>";
        		for( $tmpweek=0; $tmpweek<7; $tmpweek++ )
        		{
                		if( $tmpday==1 )
                		{
                        		if( $firstdweek == $tmpweek )
                        		{	
						$link="";
						$urlday="";
						while( $row = @mysql_fetch_object ($article_query) )
						{
							$dd=$row->lastchanged;
                                                        $lasty=substr($dd,0,4);
							$lastm=substr($dd,5,2);
							$lastd=substr($dd,8,2);
							$lastd+=0;
							
                                                        if($lasty==$year_i && $lastm==$month_i && $lastd==$tmpday)
							{ 
								if(strlen($tmpday)==1)
                                                                {
                                                                        $urlday="0".$tmpday;
                                                                }
								else
								{
									$urlday=$tmpday;
								}
								$link="<a href=index.php?headline=$headline&visual=$visualid&date_i=$year_i$month_i$urlday>"; }
							}

						if($link)
						{
							$calendar_string.="<td align=center><font size=$font_size 
color=$font_color face=$font_face>$link$tmpday</a></font></td>";
                                		}
						else
						{
							$calendar_string.="<td align=center><font size=$font_size color=$font_color face=$font_face>$tmpday</font>";
						}
						$tmpday++;
                       			}
                        		else
                        		{
                                		$calendar_string.="<td>&nbsp;</td>";
                        		}
                		}
                		else
                		{
                        		if( $tmpday<=$lastdmonth )
                        		{
						$link="";
						$urlday="";
                                                @mysql_data_seek($article_query,0);
						while( $row = @mysql_fetch_object ($article_query) )
                                                {
							$dd=$row->lastchanged;
                                                        $lasty=substr($dd,0,4);
                                                        $lastm=substr($dd,5,2);
                                                        $lastd=substr($dd,8,2);
                                                        $lastd+=0;
							
                                                        if($lasty==$year_i && $lastm==$month_i && $lastd==$tmpday)
							{
								if(strlen($tmpday)==1)
								{
									$urlday="0".$tmpday;
								}
								else
                                                                {
                                                                        $urlday=$tmpday;
                                                                }

								$link="<a 
href=index.php?headline=$headline&visual=$visualid&date_i=$year_i$month_i$urlday>"; 
							}

                                                }

                                                if($link)
                                                {
                                                        $calendar_string.="<td align=center><font size=$font_size 
color=$font_color face=$font_face>$link$tmpday</a></font>";
                                                }
                                                else
                                                {
                                                        $calendar_string.="<td align=center><font size=$font_size color=$font_color  face=$font_face>$tmpday</font>";
                                                }
                                		$tmpday++;
                        		}
                        		else
                        		{
                               		 	$calendar_string.="<td>&nbsp;</td>";
                        		}

               		 	}
       		 	}
        		$calendar_string.="</tr>";
		   }

		   $calendar_string.="</table>";


		}
		$counter++;


	}


	$counter=0;
	$linha=explode("\n",$string);

	while( each($linha) )
	{
		$remote_db=0;
		
		if(eregi("^<!--", $linha[$counter]) )
		{
			$linha[$counter]="";
		}
			

		if(eregi("^INSERIR ", $linha[$counter]) || eregi("^INSERT ", $linha[$counter]) )
		{	
			
# connect to a remote database
			if( eregi("dbase_server", $linha[$counter]) && eregi("dbase_project", $linha[$counter]) )
			{
				$linha[$counter]=ereg_replace("\r","",$linha[$counter]);
				$param_db=explode(" ", $linha[$counter]);
				$counter_db=0;

				$cache="local";
				
				while( each($param_db) )
				{
					if( eregi("dbase_server=",$param_db[$counter_db] ) )
					{
						$valores=explode("=", $param_db[$counter_db]);
						$db_server=$valores[1];
					}
					
					if( eregi("dbase_username=",$param_db[$counter_db] ) )
					{
						$valores=explode("=", $param_db[$counter_db]);
						$db_username=$valores[1];
					}
					else
					{
						$db_username=$database_username;
					}					
					
					if( eregi("dbase_password=",$param_db[$counter_db] ) )
					{
						$valores=explode("=", $param_db[$counter_db]);
						$db_password=$valores[1];						
					}
					else
					{
						$db_password=$database_password;
					}
					
					if( eregi("dbase_project=",$param_db[$counter_db] ) )
					{
						$valores=explode("=", $param_db[$counter_db]);
						$db_project=$valores[1];
					}

					$counter_db++;
					
				}
						
				if($dblink){ mysql_close($dblink) ;}
				
				if( $dblink=mysql_connect($db_server, $db_username, $db_password) )
				{
					$projecto=$db_project;
					$remote_db=1;
				}
				else
				{
					print"Error accessing remote database !!!";
				}
			}
			else
			{
				if($dblink){ @mysql_close($dblink); }
				$projecto=$original_project; 
				$dblink=mysql_pconnect($database_server, $database_username, $database_password);
			}
			
			
			
			$parametros=explode(" ", $linha[$counter]);
			
			# "semlimites /  nolimits" overrides other INSERT parameters so that boxes are not used, no table is created surrounding the page object and no trailing <br> is inserted between articles

			if(eregi(" semlimites", $linha[$counter]) || eregi(" nolimits", $linha[$counter]) )
			{
			$nNolimits="1";
			}
			else
			{
			$nNolimits="";
			}

			if( eregi("cache=",$linha[$counter] ) )
			{
				$valores=explode("=", $linha[$counter]);
				$cache=$valores[1];
			}
			if ($cache!="remote" && $cache!="no") $cache="local";


			if( eregi(" calendario", $linha[$counter]) ||  eregi(" calendar", $linha[$counter]))
			{
				$novastring.=$calendar_string;
			}



			if( eregi(" form ", $linha[$counter]) )
			{
				$qual=0;
				while(each($parametros) )
				{
					if( eregi("id=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$n_form=$valores[1];
					}
					if( eregi("artigo=", $parametros[$qual] ) || eregi("article=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$article_comment=$valores[1];
					}
					
					$qual++;
				}
				
				$result=mysql_db_query("$projecto","SELECT * FROM ARTICLEpubcomforms where serial=$n_form", $dblink);
				if( $row=mysql_fetch_object($result) )
				{
					$form=$row->form;
					$type=$row->type;
					$header_form=$row->header;
					$footer_form=$row->footer;
				}
				
				
				if( $type=="login_users" || $type=="register_users" )
				{
					$result=mysql_db_query("$projecto","SELECT * from user_fields", $dblink);
					
					while($row = mysql_fetch_object($result))
					{     global $session_id;
						$macro="\\$$row->id\\$";
						$field_name=$row->field_name;
						$field_type=$row->field_type;
						$form=eregi_replace("name=$macro","name=$field_name",$form);
						$form=eregi_replace("name=\"$macro","name=\"$field_name",$form);
						$form=eregi_replace("type=$macro","type=$field_name",$form);	
						$form=eregi_replace("type=\"$macro","type=\"$field_name",$form);
						if($session_id)
						{
							$field=get_user_data($field_name);
						}
						else
						{	
							$field="";
						}
						
						$form=eregi_replace("value=$macro","value=$field",$form);
						$form=eregi_replace("value=\"$macro","value=\"$field",$form);
					}
					
					
					
				}
				
				
				if ($nNolimits!="1") $novastring.="<table><tr><td>";
				
				if( $type=="login_users" )
				{
					$novastring.="<form method=\"post\" action=\"login.php\"><input type=hidden name=visual value=$visualid><input type=hidden name=area_id value=$area_id>";
					
				}
				
				if( $type=="register_users" )
				{
					if($session_id)
					{
						$novastring.="<form method=\"post\" action=\"edit_account.php\"><input type=hidden name=visual value=$visualid><input type=hidden name=area_id value=$area_id>";
						
					}
					else
					{
						$novastring.="<form method=\"post\" action=\"register_user.php\"><input type=hidden name=visual value=$visualid><input type=hidden name=area_id value=$area_id>";
					}
				}
				
				if( $type=="email" )
				{
					$novastring.="<form method=\"post\" action=\"email_form.php\"><input name=visual type=hidden value=$visualid><input type=hidden name=area_id value=$area_id>";
					
				}
				
				if($type=="old comments")
				{
					$reg="<FORM NAME=\"pubcomform\" METHOD=\"post\">";
					$form=ereg_replace($reg,"",$form);
					$reg="<INPUT NAME=\"article\" TYPE=\"hidden\" VALUE=\"-article-\">";
					$form=ereg_replace($reg,"",$form);
					$reg="<INPUT NAME=\"visual\" TYPE=\"hidden\" VALUE=\"-visual-\">";
					$form=ereg_replace($reg,"",$form);
					
					$form=ereg_replace("</FORM>","",$form);
				}
				
				if( $type=="comments" || $type=="old comments" )
				{
					$novastring.="<form action=\"index.php\" method=\"post\"><input name=article_comment type=hidden value=$article_comment><input name=id type=hidden value=$area_id>";
				}	
				
				
				$novastring.=$form;
				
				
				if($type=="comments" || $type="old comments")
				{
					$novastring.="</form>";
					if ($nNolimits!="1") $novastring.="</td></tr></table>";
					
					
				}
				
				
			}
			
			if(eregi(" texto ", $linha[$counter]) || eregi(" artigo ", $linha[$counter]) || eregi(" artigos ", $linha[$counter]) || eregi(" article ", $linha[$counter]) || eregi(" articles ", $linha[$counter]) )
			{
				$id_artigo=0;
				if ($nNolimits=="1") $caixa=-1; else $caixa=0;
				$colunas=1;				
				
				$qual=0;
				while(each($parametros) )
				{			
					if( eregi("artigo=", $parametros[$qual] ) ||  eregi("article=", $parametros[$qual] ) || eregi("id=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$artigos=$valores[1];
					}
					
					if( eregi("size=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$table_size=$valores[1];
					}
					
					
					if ($nNolimits=="1") $caixasdef[0]=-1;
					else
					{
						if( eregi("caixa=", $parametros[$qual] ) || eregi("box=", $parametros[$qual] ) )
						{
							$valores=explode("=", $parametros[$qual]);
							$caixas=$valores[1];
							$caixasdef=explode(",", $caixas);
						}
					}
					
					if( eregi("layout=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$layouts=$valores[1];
						$layoutsdef=explode(",", $layouts);
					}
					
					if( eregi("colunas=", $parametros[$qual] ) || eregi("columns=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$colunas=$valores[1];	
					}

					if( eregi("into=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$into=$valores[1];
					}

					if( eregi("tickerpage=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$tickerpage=$valores[1];
					}

														
					$qual++;
				}
				
				$id_artigos="";
				$first_time=1;
				$artigos2=explode(",",$artigos);
				$counter1=0;
				while( each($artigos2) )
				{
					$artigos_id=explode("/", $artigos2[$counter1]);
					$qualid=count($artigos_id)-1;
					
					while($qualid>=0)
					{			
						$result=mysql_db_query("$projecto","SELECT serial from ARTICLEbase where lastchanged <= now() AND aprovado>0  AND serial=$artigos_id[$qualid]", $dblink);
						
						if( $row=@mysql_fetch_object($result) )
						{
							if( $first_time==1 ){$id_artigos.="serial=";}
							else{$id_artigos.=" OR serial=";}
							$id_artigos.=$row->serial;
							$qualid=0; # exit while
							$first_time=0;									
						}
						$qualid--;
					}
					
					$counter1++;
				}
				
				
				
				$width="";
				if($table_size != "")	{$width=" width=\"$table_size\"";}
				$layoutcur=0;
				$boxcur=0;
				$colunacur=1;
				
				
				$colwidth=" width=" . 100/$colunas ."%";
				
				
				if($result=mysql_db_query("$projecto","SELECT 
				ARTICLEbase.serial,
				ARTICLEbase.title,
				ARTICLEbase.div,
				ARTICLEbase.font, 
				ARTICLEbase.boxsetup,  
				ARTICLEbase.boxsetup,
				ARTICLEbase.boxtype,
				ARTICLEbase.class,
				ARTICLEbase.debate,
				ARTICLEbase.submission_on, 
				ARTICLEbase.submited_by,
				ARTICLEbase.approval_on,
				ARTICLEbase.approved_by,
				ARTICLEbase.lastchanged,
				ARTICLEbase.restricted,
				ARTICLEbase.html 
				from ARTICLEbase 
				WHERE $id_artigos", $dblink))
				{
					if ($nNolimits!="1") $novastring .= "<table$width><tr><td$colwidth valign=top>";
					while($rowmain = mysql_fetch_object($result))
					{
						
						$base_serial=		$rowmain -> serial;
						$base_title=		$rowmain -> title;  
						$basediv=			$rowmain -> div; 
						$basefont=			$rowmain -> font; 
						$base_boxsetup=		$rowmain -> boxsetup;
						$base_boxtype=		$rowmain -> boxtype;
						$base_class=$rowmain->class;
						$base_debate=		$rowmain -> debate;
						$base_submission_on=	$rowmain -> submission_on; 
						$base_submited_by=	$rowmain -> submited_by;
						$base_approval_on= 	$rowmain -> approval_on;
						$base_approved_by=	$rowmain -> approved_by;
						$base_lastchanged=	$rowmain -> lastchanged;
						$base_restricted=		$rowmain -> restricted;
						$base_html=		$rowmain -> html;						

						$id_artigo=$base_serial;
						
# Restricted area
						$access_ok=0;
						if( $session_id && $base_restricted && strlen($REMOTE_USER)==0)
						{
							$query=mysql_db_query("$projecto","SELECT login from users where session_id='$session_id'", $dblink);
							$row=mysql_fetch_object($query);
							$logged_user=$row->login;
							$base_restricted=ereg_replace("\r","",$base_restricted);			
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
						
						
						if( ( $base_restricted && $access_ok ) || strlen($REMOTE_USER)>0 || !$base_restricted ) 
						{
# if the article reandered is in cache use it, otherwise render it and cache it!
							$caixasdef[$boxcur] +=0;
							$layoutsdef[$layoutcur] +=0;
							
							if ($cache=="local")
							{
								$cache_db=$original_dblink;
								$cache_project=$original_project;
							}
							else if ($cache=="remote")
							{
								$cache_db=$dblink;
								$cache_project=$projecto;
							}
												
							if ($cache!="no")
							{
								$artcache=@mysql_db_query("$cache_project","SELECT content from CACHE where cachetype=1 AND id=$base_serial AND layout=$layoutsdef[$layoutcur] AND box=$caixasdef[$boxcur]", $cache_db);
							
								$content='';
								while($row = @mysql_fetch_object($artcache))
								{
									$content= $row -> content;
								}
							}

							if(strlen($content)>0 && $cache!="no")
							{
								$novastring .= "$content";
							}
							else
							{
#
#  Load the box setup, so that we how the article should be 
# displayed on screen...
#
								if($layresult=mysql_db_query("$projecto","SELECT * from ARTICLEboxsetup where serial=$layoutsdef[$layoutcur]", $dblink))
								{
									while($row = mysql_fetch_object($layresult))
									{
										$bs_title_area=	$row -> title_area;
										$bs_header_area=	$row -> header_area;
										$bs_content_area=	$row -> content_area;
										$bs_footer_area=	$row -> footer_area;
									}			
								}
								
#
# Load the article contents (if any)
#
								if($conresult=mysql_db_query("$projecto","SELECT * from ARTICLEcontent where artigo=$base_serial", $dblink))
								{
									$itcounter=0;
									while($rowcontents = mysql_fetch_object($conresult))
									{
										$type=			$rowcontents -> type; 
										$item_text[$type]=	$rowcontents -> stuff;
										$item_used[$itcounter]=$type;
										$itcounter++;
									}			
								}
								
#
# Make the strings and print the box...
#
								
								$tooutput = box("$caixasdef[$boxcur]", "$bs_header_area", "$bs_content_area", "$bs_footer_area", "$bs_title_area", "1",$projecto,$dblink,$remote_db);

								if(eregi('\$days_dc\$', $tooutput) || eregi('\$checkfield[0-9]+(,[0-9]+)*\$', $tooutput) || eregi('\$approved_pubcom_nr\$', $tooutput))
								{
										$realtime=1;
								}	
								$tooutput=replace_macros($tooutput,$visualid,$area_id,0,$projecto,$dblink,$remote_db);
								
								$itcounter=0;
								reset($item_used);
								while(each($item_used))
								{
									$valor=$item_used[$itcounter];
									$item_text[$valor]="";
									$itcounter++;
								}
								
								if($remote_db)
								{
									$remote_db_path="http://$db_server/$projecto";
									$tooutput=complete_url("img","src",$tooutput,$remote_db_path);
									$tooutput=complete_url("IMG","src",$tooutput,$remote_db_path);
									$tooutput=complete_url("A","href",$tooutput,$remote_db_path);
									$tooutput=complete_url("a","href",$tooutput,$remote_db_path);
									$tooutput=complete_url("TD","background",$tooutput,$remote_db_path);
									$tooutput=complete_url("td","background",$tooutput,$remote_db_path);
									$tooutput=complete_url("TABLE","background",$tooutput,$remote_db_path);
									$tooutput=complete_url("table","background",$tooutput,$remote_db_path);
								}
								
								$novastring.=$tooutput;
								$tooutput=addslashes($tooutput);
								
								// save the cache
								if ($cache!="no" && $realtime==0)
								{
									@mysql_db_query("$cache_project","INSERT INTO CACHE
									(expire_on,cachetype,id,content,layout,box) VALUES	(now(),1,$base_serial,'$tooutput',$layoutsdef[$layoutcur],$caixasdef[$boxcur])", $cache_db);
								}
							}
							
							if ($nNolimits!="1") $novastring .= "<br>";
							
							if($colunas>1 && $nNolimits!="1")
							{
								$novastring .="</td>";
								
								$colunacur++;
								if($colunacur>$colunas)
								{
									$colunacur=1;
									$novastring .="</tr><tr>";
								}			
								
								$novastring .="<td$colwidth valign=top>";													
							}
							
							$layoutcur++;
							if($layoutsdef[$layoutcur] == "")	{	$layoutcur=0;	}							
							$boxcur++;
							if($caixasdef[$boxcur] == "")	{	$boxcur=0;	}							
							
						}			
											}
					if ($nNolimits!="1") $novastring .=  "</td></tr></table>";
				}
				
			}
			


			
if(eregi(" ultimos ", $linha[$counter]) || eregi(" last ", $linha[$counter]) || eregi(" set ", $linha[$counter]))
			{
				$orderby="ARTICLEbase.lastchanged DESC";
												
				$quantos=10;				
				$colunas=1;
				$qual=0;
				$exclude+=0;
				while(each($parametros) )
				{			
					if( eregi("skip=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$skip=$valores[1];						
					}
					
					if( eregi("size=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$table_size=$valores[1];
						
					}
					
					if( eregi("quantos=", $parametros[$qual] ) || eregi("howmany=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$quantos=$valores[1];
					}
					
					if( eregi("colunas=", $parametros[$qual] ) || eregi("columns=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$colunas=$valores[1];
					}
					
					if ($nNolimits=="1") $caixasdef[0]=-1;
					else
					{	if( eregi("caixa=", $parametros[$qual] ) || eregi("box=", $parametros[$qual] ) )
						{
							$valores=explode("=", $parametros[$qual]);
							$caixas=$valores[1];
							$caixasdef=explode(",", $caixas);
						}
					}

					if( eregi("layout=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$layouts=$valores[1];
						$layoutsdef=explode(",", $layouts);
					}


			
					if( eregi("areas=", $parametros[$qual] ) || eregi("subjects=", $parametros[$qual] ) )
					{
						$areasql="";
						$valores=explode("=", $parametros[$qual]);
						$areas=$valores[1];
						$areasdef=explode(",", $areas);

						$qualarea=0;
						while(each($areasdef))
						{		
							if($qualarea>0)	{ $areasql .=" OR ";}
							else		{ $areasql .=" AND (";}	
							$areasql .="ARTICLEtopic.topic=$areasdef[$qualarea]";
							$qualarea++;
						}
						
						if($areasql != "") { $areasql .=") ";}
					}



					if( eregi("excluir=", $parametros[$qual] ) || eregi("exclude=", $parametros[$qual] ))
					{
						$areasqlexclude="";
						$valores=explode("=", $parametros[$qual]);
						$areas=$valores[1];
						$areasdef=explode(",", $areas);
						
						$qualarea=0;
						while(each($areasdef))
						{		
							if($qualarea>0)	{ $areasqlexclude .=" AND ";}
							else		{ $areasqlexclude .=" AND (";}	
							$areasqlexclude .="ARTICLEtopic.article!=$areasdef[$qualarea]";
							$qualarea++;
						}
						
						if($areasqlexclude != "") { $areasqlexclude .=") ";}
					}

					if( eregi("into=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$into=$valores[1];
					}

					if( eregi("tickertype=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$TickerType=$valores[1];
					}

					if( eregi("spacing=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$spacing=$valores[1];
					}

					if( eregi("speed=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$speed=$valores[1];
					}

					if( eregi("split=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$split=$valores[1];
					}

					if( eregi("date_i=", $parametros[$qual] ))
                                        {
                                                $valores=explode("=", $parametros[$qual]);
                                                $initdate=$valores[1];
                                                $initmonth=substr($initdate,4,2);
                                                $inityear=substr($initdate,0,4);
                                                $initday=substr($initdate,6,2);
                                                if(!checkdate($initmonth,$initday,$inityear))
                                                {
                                                        $initdate=time();
                                                        $initmonth=date("m");
                                                        $inityear=date("Y");
                                                        $initday=date("d");
                                                }

                                        }

					if( eregi("date_f=", $parametros[$qual] ))
                                        {
                                                $valores=explode("=", $parametros[$qual]);
                                                $finaldate=$valores[1];
                                                $finalmonth=substr($finaldate_i,4,2);
                                                $finalyear=substr($finaldate_i,0,4);
                                                $finalday=substr($finaldate_i,6,2);
                                                if(!checkdate($finalmonth,$finalday,$finalyear))
                                                {
                                                        $finaldate=time();
                                                        $finalmonth=date("m");
                                                        $finalyear=date("Y");
                                                        $finalday=date("d");
                                                }

                                        }
	


					if (eregi(" set ", $linha[$counter]) && eregi("order=(([a-z_]+) (asc|desc))", $linha[$counter], $regs))
					{
						$orderstring=$regs[1];
						$sort="";
						if (eregi("^([a-z_]+) (asc|desc)$",$orderstring,$regs))
						{
							if ($regs[1]=="date") $sort="ARTICLEbase.lastchanged";
							if ($regs[1]=="date_a") $sort="ARTICLEbase.approval_on";
							if ($regs[1]=="date_s") $sort="ARTICLEbase.submission_on";
							if ($regs[1]=="id") $sort="ARTICLEbase.serial";
							if ($regs[1]=="title") $sort="ARTICLEbase.title";
							if ($regs[1]=="author") $sort="ARTICLEbase.submited_by";
			
							if ($sort) $orderby="$sort $regs[2]";
						}
					}

					$qual++;
				}


				if($initdate)
                                {
                                        $sqlfilter_i=$inityear."-".$initmonth."-".$initday." 00:00:00";
                                        if(!$finaldate)
                                        {
                                                $finalyear=$inityear;
                                                $finalmonth=$initmonth;
                                                $finalday=$initday;
                                        }
                                        $sqlfilter_f=$finalyear."-".$finalmonth."-".$finalday." 23:59:59";
                                }

				
				$width="";
				if($table_size != "")	{$width=" width=\"$table_size\"";}
				
				$layoutcur=0;
				$boxcur=0;
				$colunacur=1;
				
				
				$colwidth=" width=" . 100/$colunas ."%";

				
				if($inserted_calendar || $initdate)
				{
					$filter_date=" AND ARTICLEbase.lastchanged>=\"$sqlfilter_i\" AND 
ARTICLEbase.lastchanged<=\"$sqlfilter_f\" ";
				}
				else
				{
					$filter_date="";
				}


				
				if($result=mysql_db_query("$projecto","SELECT 
				ARTICLEbase.serial,
				ARTICLEbase.title,
				ARTICLEbase.div,
				ARTICLEbase.font, 
				ARTICLEbase.boxsetup,  
				ARTICLEbase.boxsetup,
				ARTICLEbase.boxtype,
				ARTICLEbase.class,
				ARTICLEbase.debate,
				ARTICLEbase.submission_on, 
				ARTICLEbase.submited_by,
				ARTICLEbase.approval_on,
				ARTICLEbase.approved_by,
				ARTICLEbase.lastchanged,
				ARTICLEbase.restricted,
				ARTICLEbase.html 
				from ARTICLEbase,ARTICLEtopic 
				WHERE 	ARTICLEbase.serial=ARTICLEtopic.article 
				$areasql  $areasqlexclude
				AND ARTICLEbase.lastchanged <= now() AND ARTICLEbase.aprovado>0 $filter_date
				ORDER BY $orderby
				LIMIT 0,$quantos", $dblink))
				{
					if ($nNolimits!="1") $novastring .= "<table$width><tr><td$colwidth valign=top>";
					$nArticleCounter=0;
					$stylesheet="";
					while($rowmain = mysql_fetch_object($result))
					{
						
						$base_serial=		$rowmain -> serial;
						$base_title=		$rowmain -> title;  
						$basediv=		$rowmain -> div; 
						$basefont=		$rowmain -> font; 
						$base_boxsetup=		$rowmain -> boxsetup;
						$base_boxtype=		$rowmain -> boxtype;
						$base_class=$rowmain->class;
						$base_debate=		$rowmain -> debate;
						$base_submission_on=	$rowmain -> submission_on; 
						$base_submited_by=	$rowmain -> submited_by;
						$base_approval_on= 	$rowmain -> approval_on;
						$base_approved_by=	$rowmain -> approved_by;
						$base_lastchanged=	$rowmain -> lastchanged;
						$base_restricted=		$rowmain -> restricted;
						$base_html=		$rowmain -> html;						

						$id_artigo=$base_serial;
						
# Restricted area
						$access_ok=0;
						if( $session_id && $base_restricted && strlen($REMOTE_USER)==0)
						{
							$query=mysql_db_query("$projecto","SELECT login from users where session_id='$session_id'", $dblink);
							$row=mysql_fetch_object($query);
							$logged_user=$row->login;
							$base_restricted=ereg_replace("\r","",$base_restricted);
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
						
						
						if( ( $base_restricted && $access_ok ) || strlen($REMOTE_USER)>0 || !$base_restricted ) 
						{
							if($skip<=0)	
							{	
# if the article reandered is in cache use it, otherwise render it and cache it!
								$caixasdef[$boxcur] +=0;
								$layoutsdef[$layoutcur] +=0;
								
								if ($cache=="local")
								{
									$cache_db=$original_dblink;
									$cache_project=$original_project;
								}
								else if ($cache=="remote")
								{
									$cache_db=$dblink;
									$cache_project=$projecto;
								}
															
								if ($cache!="no" && !$into)
								{
									$artcache=@mysql_db_query("$cache_project","SELECT content from CACHE where cachetype=1 AND id=$base_serial AND layout=$layoutsdef[$layoutcur] AND box=$caixasdef[$boxcur]", $cache_db);
							
									$content='';
									while($row = @mysql_fetch_object($artcache))
									{
										$content= $row -> content;
									}
								}

								if(strlen($content)>0 && $cache!="no" && !$into)
								{
									$novastring .= "$content";
								}
								else
								{
#
#  Load the box setup, so that we how the article should be 
# displayed on screen...
#
									if($layresult=mysql_db_query("$projecto","SELECT * from ARTICLEboxsetup where serial=$layoutsdef[$layoutcur]", $dblink))
									{
										while($row = mysql_fetch_object($layresult))
										{
											$bs_title_area=		$row -> title_area; 				 
											$bs_header_area=	$row -> header_area;
											$bs_content_area=	$row -> content_area;
											$bs_footer_area=	$row -> footer_area;
										}			
									}
									
#
# Load the article contents (if any)
#
									if($conresult=mysql_db_query("$projecto","SELECT * from ARTICLEcontent where artigo=$base_serial", $dblink))
									{
										$itcounter=0;
										while($rowcontents = mysql_fetch_object($conresult))
										{
											$type=			$rowcontents -> type; 				 
											$item_text[$type]=	$rowcontents -> stuff;
											$item_used[$itcounter]=$type;
											$itcounter++;
										}			
									}
									
#
# Make the strings and print the box...
#
																	
									$tooutput = box("$caixasdef[$boxcur]", "$bs_header_area", "$bs_content_area", "$bs_footer_area", "$bs_title_area", "1",$projecto,$dblink,$remote_db);

									if(eregi('\$days_dc\$', $tooutput) || eregi('\$checkfield[0-9]+(,[0-9]+)*\$', $tooutput) || eregi('\$approved_pubcom_nr\$', $tooutput))
									{
										$realtime=1;
									}	
																	
									$tooutput=replace_macros($tooutput,$visualid,$area_id,0,$projecto,$dblink,$remote_db);
									
									$itcounter=0;
									reset($item_used);
									while(each($item_used))
									{
										$valor=$item_used[$itcounter];
										$item_text[$valor]="";
										$itcounter++;
									}
									
									if($remote_db)
									{
										$remote_db_path="http://$db_server/$projecto";
										$tooutput=complete_url("img","src",$tooutput,$remote_db_path);
										$tooutput=complete_url("IMG","src",$tooutput,$remote_db_path);
										$tooutput=complete_url("A","href",$tooutput,$remote_db_path);
										$tooutput=complete_url("a","href",$tooutput,$remote_db_path);
										$tooutput=complete_url("TD","background",$tooutput,$remote_db_path);
										$tooutput=complete_url("td","background",$tooutput,$remote_db_path);
										$tooutput=complete_url("TABLE","background",$tooutput,$remote_db_path);
										$tooutput=complete_url("table","background",$tooutput,$remote_db_path);
									}
									
			
									# if contents are to be inserted into a pageticker or marquee		

									if ($into && $TickerType=="pageticker")
									{
										if ($split<1) $split=1;
										$pageCounter=((int) ($nArticleCounter/$split))+1;
										if (is_int($nArticleCounter/$split))
										{
											$stylesheet.= "\n\n#ticker".$into."page".$pageCounter." {\n position: absolute;\n left: 0;\n top: 0;\n visibility: ";
											if ($pageCounter=="1") $stylesheet.="visible";
											else $stylesheet.="hidden";
											$stylesheet.="\n }\n\n";
											$novastring .="\n<div id=\"ticker".$into."page".$pageCounter."\">".$tooutput;
										}
										else $novastring .=$tooutput;
										if (is_int((($nArticleCounter+1)/$split))) $novastring.= "\n</div>";
									}
									else if ($into && $TickerType=="marquee" && $spacing>0)
									{
											$tooutput="<table cellspacing=0 cellpadding=0 align=left border=0><tr><td>".$tooutput;
											$tooutput.="</td><td>";
											for ($i=0; $i<$spacing; $i++) $tooutput .="&nbsp;";
											$tooutput.="</td></tr></table>";
											$novastring .=$tooutput;
									}	
									else $novastring .=$tooutput;
									
									$tooutput=addslashes($tooutput);
									
									// save the cache
									if ($cache!="no" && $realtime==0)
									{
										@mysql_db_query("$cache_project","INSERT INTO CACHE						(expire_on,cachetype,id,content,layout,box) VALUES					(now(),1,$base_serial,'$tooutput',$layoutsdef[$layoutcur],$caixasdef[$boxcur])", $cache_db);
									}
								}
								
								if ($nNolimits!="1")	$novastring .= "<br>";
								
								$layoutcur++;
								if($layoutsdef[$layoutcur] == "")	{	$layoutcur=0;	}							
								
								$boxcur++;
								if($caixasdef[$boxcur] == "")	{	$boxcur=0;	}							
								
								if($colunas>1 && $nNolimits!="1")
								{
									$novastring .="</td>";
									
									$colunacur++;
									if($colunacur>$colunas)
									{
										$colunacur=1;
										$novastring .="</tr><tr>";
									}			
									
									$novastring .="<td$colwidth valign=top>";													
								}
							}
							else
							{
								$skip--;
							}
						}
					
						$nArticleCounter++;
					}			
					
					if  ($into && $TickerType=="pageticker") $novastring = "\n".$stylesheet."</style>".$novastring;
					if ($nNolimits!="1") $novastring .=  "</td></tr></table>";
					
				}
				
			}
			

			if(eregi(" topforum ", $linha[$counter]) )
			{
				$quantos=10;				
				$colunas=1;
				$qual=0;
				while(each($parametros) )
				{			
										
					if( eregi("size=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$table_size=$valores[1];
						
					}
					
					if( eregi("quantos=", $parametros[$qual] ) || eregi("howmany=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$quantos=$valores[1];
					}
					
					if( eregi("colunas=", $parametros[$qual] ) || eregi("columns=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$colunas=$valores[1];
					}
					
					
					if ($nNolimits=="1") $caixasdef[0]=-1;
					else 
					{
						if( eregi("caixa=", $parametros[$qual] ) || eregi("box=", $parametros[$qual] ) )
						{
							$valores=explode("=", $parametros[$qual]);
							$caixas=$valores[1];
							$caixasdef=explode(",", $caixas);
						}
					}
					
					if( eregi("layout=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$layouts=$valores[1];
						$layoutsdef=explode(",", $layouts);
					}
					

					if( eregi("order=", $parametros[$qual] ) || eregi("ordenar=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$order=$valores[1];
					}
					
					if( eregi("excluir=", $parametros[$qual] ) || eregi("exclude=", $parametros[$qual] ))
					{
						$forumsqlexclude="";
						$valores=explode("=", $parametros[$qual]);
						$foruns=$valores[1];
						$forunsdef=explode(",", $foruns);
						
						$qualforum=0;
						while(each($forunsdef))
						{		
							if($qualforum>0)	{ $forumsqlexclude .=" AND ";}
							else		{ $forumsqlexclude .="where (";}	
							$forumsqlexclude .="article!=$forunsdef[$qualforum]";
							$qualforum++;
						}
						
						if($forumsqlexclude != "") { $forumsqlexclude .=") ";}
					}

					
					$qual++;
				}
				
				$width="";
				if($table_size != "")	{$width=" width=\"$table_size\"";}
				
				$layoutcur=0;
				$boxcur=0;
				$colunacur=1;
				
				
				$colwidth=" width=" . 100/$colunas ."%";
				
								

				if($result=mysql_db_query("$projecto","SELECT article,count(article) as top 
				from ARTICLEpubcom $forumsqlexclude  GROUP BY article order by top $order 
				LIMIT 0,$quantos", $dblink))
				{
					if ($nNolimits!="1") $novastring .= "<table$width><tr><td$colwidth valign=top>";
				
					while($rowmain = mysql_fetch_object($result))
					{
						$top_article=$rowmain->article;
						
						$result_top=mysql_db_query("$projecto","SELECT serial,title from ARTICLEbase where serial=$top_article",$dblink);
						
						$rowtop=mysql_fetch_object($result_top);
						
						$base_serial=		$rowtop -> serial;
						$id_artigo=		$base_serial;
						$base_title=		$rowtop -> title;  
						
			
#
#  Load the box setup, so that we how the article should be 
# displayed on screen...
#
									if($layresult=mysql_db_query("$projecto","SELECT * from ARTICLEboxsetup where serial=$layoutsdef[$layoutcur]", $dblink))
									{
										while($row = mysql_fetch_object($layresult))
										{
											$bs_title_area=		$row -> title_area; 				 
											$bs_header_area=	$row -> header_area;
											$bs_content_area=	$row -> content_area;
											$bs_footer_area=	$row -> footer_area;
										}			
									}
									
#
# Load the article contents (if any)
#
									if($conresult=mysql_db_query("$projecto","SELECT * from ARTICLEcontent where artigo=$base_serial", $dblink))
									{
										$itcounter=0;
										while($rowcontents = mysql_fetch_object($conresult))
										{
											$type=			$rowcontents -> type; 				 
											$item_text[$type]=	$rowcontents -> stuff;
											$item_used[$itcounter]=$type;
											$itcounter++;
										}			
									}
									
#
# Make the strings and print the box...
#
									
									$tooutput = box("$caixasdef[$boxcur]", "$bs_header_area", "$bs_content_area", "$bs_footer_area", "$bs_title_area", "1",$projecto,$dblink,$remote_db);
									$tooutput=replace_macros($tooutput,$visualid,$area_id,0,$projecto,$dblink,$remote_db);
									
									$itcounter=0;
									reset($item_used);
									while(each($item_used))
									{
										$valor=$item_used[$itcounter];
										$item_text[$valor]="";
										$itcounter++;
									}
									
									if($remote_db)
									{
										$remote_db_path="http://$db_server/$projecto";
										$tooutput=complete_url("img","src",$tooutput,$remote_db_path);
										$tooutput=complete_url("IMG","src",$tooutput,$remote_db_path);
										$tooutput=complete_url("A","href",$tooutput,$remote_db_path);
										$tooutput=complete_url("a","href",$tooutput,$remote_db_path);
										$tooutput=complete_url("TD","background",$tooutput,$remote_db_path);
										$tooutput=complete_url("td","background",$tooutput,$remote_db_path);
										$tooutput=complete_url("TABLE","background",$tooutput,$remote_db_path);
										$tooutput=complete_url("table","background",$tooutput,$remote_db_path);
									}
									
									$novastring .=$tooutput;
									$tooutput=addslashes($tooutput);
									
									
								}
								
								if ($nNolimits!="1")	$novastring .= "<br>";
								
								$layoutcur++;
								if($layoutsdef[$layoutcur] == "")	{	$layoutcur=0;	}							
								
								$boxcur++;
								if($caixasdef[$boxcur] == "")	{	$boxcur=0;	}							
								
								if($colunas>1 && $nNolimits!="1")
								{
									$novastring .="</td>";
									
									$colunacur++;
									if($colunacur>$colunas)
									{
										$colunacur=1;
										$novastring .="</tr><tr>";
									}			
									
									$novastring .="<td$colwidth valign=top>";													
								}			
					
					if ($nNolimits!="1") $novastring .=  "</td></tr></table>";
				}
				
			}






			if(eregi(" topcomments ", $linha[$counter]) || eregi(" topcomentarios ", $linha[$counter]) )
			{
				$quantos=10;				
				$colunas=1;
				$qual=0;
				while(each($parametros) )
				{			
										
					if( eregi("size=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$table_size=$valores[1];
						
					}
					
					if( eregi("quantos=", $parametros[$qual] ) || eregi("howmany=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$quantos=$valores[1];
					}
					
					if( eregi("colunas=", $parametros[$qual] ) || eregi("columns=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$colunas=$valores[1];
					}
					
					if ($nNolimits=="1") $caixasdef[0]=-1;
					else
					{
						if( eregi("caixa=", $parametros[$qual] ) || eregi("box=", $parametros[$qual] ) )
						{
							$valores=explode("=", $parametros[$qual]);
							$caixas=$valores[1];
							$caixasdef=explode(",", $caixas);
						}
					}
					
					if( eregi("layout=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$layouts=$valores[1];
						$layoutsdef=explode(",", $layouts);
					}
					

					if( eregi("order=", $parametros[$qual] ) || eregi("ordenar=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$order=$valores[1];
					}


					if( eregi("field=", $parametros[$qual] ) || eregi("campo=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$field=$valores[1];						
					}
					if( eregi("forum=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$forum=$valores[1];						
					}
					
					$qual++;
				}
				
				$width="";
				if($table_size != "")	{$width=" width=\"$table_size\"";}
				
				$layoutcur=0;
				$boxcur=0;
				$colunacur=1;
				
				
				$colwidth=" width=" . 100/$colunas ."%";
				

				if($field=="class")
				{
					if(!$forum)
	                        	{
       	                                	 $sqlforum="";
       		                        }
       	       		                else
                       		        {
                                        	 $sqlforum="where article=$forum ";
                                	}

					$result=mysql_db_query("$projecto","SELECT
                                	* from ARTICLEpubcom $sqlforum ORDER BY $field $order
                                	LIMIT 0,$quantos", $dblink);
				}
				
				if($field=="posts")
				{	
					if(!$forum)
	                                {
        	                                $sqlforum="";
                	                }
                        	        else
                                	{
                                	        $sqlforum=" AND article=$forum ";
                               		}

					$result=mysql_db_query("$projecto","SELECT parent,count(parent) as top
                                	from ARTICLEpubcom where parent<>'0' $sqlforum GROUP BY parent 
					order by top $order
                                	LIMIT 0,$quantos", $dblink);
				}

				if($result)
				{
					if ($nNolimits!="1") $novastring .= "<table$width><tr><td$colwidth valign=top>";
				

					while($rowmain = mysql_fetch_object($result))
					{
						
						if($field=="posts")
						{
							$top_posts=$rowmain->parent;
							$result_top=mysql_db_query("$projecto","SELECT
                                        		* from ARTICLEpubcom
                                        		WHERE  serial=$top_posts", $dblink);
							$rowtop=mysql_fetch_object($result_top);
						
							$base_serial=		$rowtop -> serial;
							$id_artigo=             $rowtop ->article;
							$base_title=		$rowtop -> title;  
						}
						else
						{
							$base_serial=           $rowmain -> serial;
                                                        $id_artigo=             $rowmain ->article;
							$base_title=            $rowmain -> title;
						}			

#
#  Load the box setup, so that we how the article should be 
# displayed on screen...
#
									if($layresult=mysql_db_query("$projecto","SELECT * from ARTICLEboxsetup where serial=$layoutsdef[$layoutcur]", $dblink))
									{
										while($row = mysql_fetch_object($layresult))
										{
											$bs_title_area=		$row -> title_area; 				 
											$bs_header_area=	$row -> header_area;
											$bs_content_area=	$row -> content_area;
											$bs_footer_area=	$row -> footer_area;
										}			
									}
									
#
# Load the article contents (if any)
#
									if($conresult=mysql_db_query("$projecto","SELECT * from ARTICLEcontent where artigo=$base_serial", $dblink))
									{
										$itcounter=0;
										while($rowcontents = mysql_fetch_object($conresult))
										{
											$type=			$rowcontents -> type; 				 
											$item_text[$type]=	$rowcontents -> stuff;
											$item_used[$itcounter]=$type;
											$itcounter++;
										}			
									}
									
#
# Make the strings and print the box...
#
									
									$tooutput = box("$caixasdef[$boxcur]", "$bs_header_area", "$bs_content_area", "$bs_footer_area", "$bs_title_area", "1",$projecto,$dblink,$remote_db);
									$tooutput=replace_macros($tooutput,$visualid,$area_id,0,$projecto,$dblink,$remote_db,$base_serial);
									
									$itcounter=0;
									reset($item_used);
									while(each($item_used))
									{
										$valor=$item_used[$itcounter];
										$item_text[$valor]="";
										$itcounter++;
									}
									
									if($remote_db)
									{
										$remote_db_path="http://$db_server/$projecto";
										$tooutput=complete_url("img","src",$tooutput,$remote_db_path);
										$tooutput=complete_url("IMG","src",$tooutput,$remote_db_path);
										$tooutput=complete_url("A","href",$tooutput,$remote_db_path);
										$tooutput=complete_url("a","href",$tooutput,$remote_db_path);
										$tooutput=complete_url("TD","background",$tooutput,$remote_db_path);
										$tooutput=complete_url("td","background",$tooutput,$remote_db_path);
										$tooutput=complete_url("TABLE","background",$tooutput,$remote_db_path);
										$tooutput=complete_url("table","background",$tooutput,$remote_db_path);
									}
									
									$novastring .=$tooutput;
									$tooutput=addslashes($tooutput);
									
									
								}
								
								if ($nNolimits!="1")	$novastring .= "<br>";
								
								$layoutcur++;
								if($layoutsdef[$layoutcur] == "")	{	$layoutcur=0;	}							
								
								$boxcur++;
								if($caixasdef[$boxcur] == "")	{	$boxcur=0;	}							
								
								if($colunas>1 && $nNolimits!="1")
								{
									$novastring .="</td>";
									
									$colunacur++;
									if($colunacur>$colunas)
									{
										$colunacur=1;
										$novastring .="</tr><tr>";
									}			
									
									$novastring .="<td$colwidth valign=top>";													
								}			
					
					if ($nNolimits!="1") $novastring .=  "</td></tr></table>";
				}
				
			}








			if(eregi(" ticker ", $linha[$counter]))
			{
				$quantos=10;				
				
				$qual=0;
				while(each($parametros) )
				{			
					if( eregi("scrollwidth=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$scrollwidth=$valores[1];						
					}
					
					if( eregi("lines=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$lines=$valores[1];						
					}
					
					if( eregi("bgcolor=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$bgcolor=$valores[1];						
					}
					
					if( eregi("fontsize=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$fontsize=$valores[1];						
					}
					
					if( eregi("useskin=", $parametros[$qual] ) || ereg("pageskin=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$useskin=$valores[1];						
					}
					
					if( eregi("skip=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$skip=$valores[1];						
					}
					
					if( eregi("chars=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$table_size=$valores[1];
					}
					
					if( eregi("quantos=", $parametros[$qual] ) || ereg("howmany=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$quantos=$valores[1];
					}
					
					if( eregi("target=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$target=$valores[1];
					}
					
					if( eregi("usefield=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$usefield=$valores[1];
					}
					
					if( eregi("areas=", $parametros[$qual] ) || ereg("subjects=", $parametros[$qual] ))
					{
						$areasql="";
						$valores=explode("=", $parametros[$qual]);
						$areas=$valores[1];
						$areasdef=explode(",", $areas);
						
						$qualarea=0;
						while(each($areasdef))
						{		
							if($qualarea>0)	{ $areasql .=" OR ";}
							else		{ $areasql .=" AND (";}	
							$areasql .="topic=$areasdef[$qualarea]";
							$qualarea++;
						}
						
						if($areasql != "") { $areasql .=") ";}
					}
					
					if( eregi("excluir=", $parametros[$qual] ) || ereg("exclude=", $parametros[$qual] ))
					{
						$areasqlexclude="";
						$valores=explode("=", $parametros[$qual]);
						$areas=$valores[1];
						$areasdef=explode(",", $areas);
						
						$qualarea=0;
						while(each($areasdef))
						{		
							if($qualarea>0)	{ $areasqlexclude .=" AND ";}
							else		{ $areasqlexclude .=" AND (";}	
							$areasqlexclude .="article!=$areasdef[$qualarea]";
							$qualarea++;
						}
						
						if($areasqlexclude != "") { $areasqlexclude .=") ";}
					}
					
					$qual++;
				}
				
				$quantosvi=0;
				$varcounter=0;
				$curlines=$lines;
				
				if($result=mysql_db_query("$projecto","SELECT serial,title from ARTICLEbase 
				WHERE 	lastchanged <= now() AND aprovado>0 
				ORDER BY lastchanged DESC", $dblink))
				{
					$novastring .= "<script language=\"JavaScript1.2\">\n";
					$novastring .= "var scrollerwidth=$scrollwidth\n";
					$novastring .= "var scrollerheight=$lines*16\n";
					$novastring .= "var scrollerbgcolor='$bgcolor'\n";
					$novastring .= "var scrollerbackground='imagens/184/ultimas_pageback2.gif'\n";
					$novastring .= "var messages=new Array()\n";
					
					while($row = mysql_fetch_object($result))
					{
						$base_serial=		$row -> serial;
						$base_title=		$row -> title;
						
#
# Load the article contents (if any)
#
						if($usefield>0)
						{
							if($conresult=mysql_db_query("$projecto","SELECT * from ARTICLEcontent where artigo=$base_serial and type=$usefield", $dblink))
							{
								while($rowcontents = mysql_fetch_object($conresult))
								{
									$base_title=	$rowcontents -> stuff;
									$base_title=chop($base_title);
								}			
							}
						}
						
						$id_artigo=$base_serial;
						
						if($quantosvi<$quantos)
						{
							
							if($selarea=mysql_db_query("$projecto","SELECT article from ARTICLEtopic 
							WHERE article=$base_serial $areasql $areasqlexclude 
							LIMIT 0,1", $dblink))
							{					
								
								while(($row = mysql_fetch_object($selarea)) && $quantosvi<$quantos)
								{
#
# We do have a candidate
#
									if($skip<=0)	
									{	
#
# Make the strings and print the box...
#
										
										if($lines<=1 || $curlines<1 || $tagopen==0)
										{
											
											$novastring .= "messages[$varcounter]=\"<font face='Arial, Helvetica, sans-serif'size=$fontsize'>";
											$tagopen=1;
										}
										
										$curlines--;
										
										$novastring .= "<a href='index.php?article=$base_serial&visual=$useskin'";
										if(strlen($target)>0)
										{
											$novastring .= "target=$target";
										}
										$novastring .= ">".htmlentities($base_title, ENT_QUOTES)."</a><br>";
										
										if($lines<=1 || $curlines<1 || $quantosvi==($quantos-1))
										{
											$novastring .= "</font>\"\n";
											$varcounter++;
											$tagopen=0;
											if($curlines<1)
											{
												$curlines=$lines;
											}
										}
										$quantosvi++;
									}
									else
									{
										$skip--;
									}
								}
								
							}
						} 
					}
					
					if($tagopen==1)
					{
						$novastring .= "</font>\"\n";
					}
					
					$novastring .= "if (messages.length>1)\n";
					$novastring .= "i=2\n";
					$novastring .= "else\n";
					$novastring .= "i=0\n";
					
					$novastring .= "function move1(whichlayer){\n";
						$novastring .= "tlayer=eval(whichlayer)\n";
						$novastring .= "if (tlayer.top>0&&tlayer.top<=5){\n";
							$novastring .= "tlayer.top=0\n";
							$novastring .= "setTimeout(\"move1(tlayer)\",3000)\n";
							$novastring .= "setTimeout(\"move2(document.main.document.second)\",3000)\n";
							$novastring .= "return\n";
						$novastring .= "}\n";
						$novastring .= "if (tlayer.top>=tlayer.document.height*-1){\n";
							$novastring .= "tlayer.top-=5\n";
							$novastring .= "setTimeout(\"move1(tlayer)\",100)\n";
						$novastring .= "}\n";
						$novastring .= "else{\n";
							$novastring .= "tlayer.top=scrollerheight\n";
							$novastring .= "tlayer.document.write(messages[i])\n";
							$novastring .= "tlayer.document.close(messages[i])\n";
							$novastring .= "if (i==messages.length-1)\n";
							$novastring .= "i=0\n";
							$novastring .= "else\n";
							$novastring .= "i++\n";
						$novastring .= "}\n";
					$novastring .= "}\n";
					
					$novastring .= "function move2(whichlayer){\n";
						$novastring .= "tlayer2=eval(whichlayer)\n";
						$novastring .= "if (tlayer2.top>0&&tlayer2.top<=5){\n";
							$novastring .= "tlayer2.top=0\n";
							$novastring .= "setTimeout(\"move2(tlayer2)\",3000)\n";
							$novastring .= "setTimeout(\"move1(document.main.document.first)\",3000)\n";
							$novastring .= "return\n";
						$novastring .= "}\n";
						$novastring .= "if (tlayer2.top>=tlayer2.document.height*-1){\n";
							$novastring .= "tlayer2.top-=5\n";
							$novastring .= "setTimeout(\"move2(tlayer2)\",100)\n";
						$novastring .= "}\n";
						$novastring .= "else{\n";
							$novastring .= "tlayer2.top=scrollerheight\n";
							$novastring .= "tlayer2.document.write(messages[i])\n";
							$novastring .= "tlayer2.document.close()\n";
							$novastring .= "if (i==messages.length-1)\n";
							$novastring .= "i=0\n";
							$novastring .= "else\n";
							$novastring .= "i++\n";
						$novastring .= "}\n";
					$novastring .= "}\n";
					
					$novastring .= "function move3(whichdiv){\n";
						$novastring .= "tdiv=eval(whichdiv)\n";
						$novastring .= "if (tdiv.style.pixelTop>0&&tdiv.style.pixelTop<=5){\n";
							$novastring .= "tdiv.style.pixelTop=0\n";
							$novastring .= "setTimeout(\"move3(tdiv)\",3000)\n";
							$novastring .= "setTimeout(\"move4(second2)\",3000)\n";
							$novastring .= "return\n";
						$novastring .= "}\n";
						$novastring .= "if (tdiv.style.pixelTop>=tdiv.offsetHeight*-1){\n";
							$novastring .= "tdiv.style.pixelTop-=5\n";
							$novastring .= "setTimeout(\"move3(tdiv)\",100)\n";
						$novastring .= "}\n";
						$novastring .= "else{\n";
							$novastring .= "tdiv.style.pixelTop=scrollerheight\n";
							$novastring .= "tdiv.innerHTML=messages[i]\n";
							$novastring .= "if (i==messages.length-1)\n";
							$novastring .= "i=0\n";
							$novastring .= "else\n";
							$novastring .= "i++\n";
						$novastring .= "}\n";
					$novastring .= "}\n";
					
					$novastring .= "function move4(whichdiv){\n";
						$novastring .= "tdiv2=eval(whichdiv)\n";
						$novastring .= "if (tdiv2.style.pixelTop>0&&tdiv2.style.pixelTop<=5){\n";
							$novastring .= "tdiv2.style.pixelTop=0\n";
							$novastring .= "setTimeout(\"move4(tdiv2)\",3000)\n";
							$novastring .= "setTimeout(\"move3(first2)\",3000)\n";
							$novastring .= "return\n";
						$novastring .= "}\n";
						$novastring .= "if (tdiv2.style.pixelTop>=tdiv2.offsetHeight*-1){\n";
							$novastring .= "tdiv2.style.pixelTop-=5\n";
							$novastring .= "setTimeout(\"move4(second2)\",100)\n";
						$novastring .= "}\n";
						$novastring .= "else{\n";
							$novastring .= "tdiv2.style.pixelTop=scrollerheight\n";
							$novastring .= "tdiv2.innerHTML=messages[i]\n";
							$novastring .= "if (i==messages.length-1)\n";
							$novastring .= "i=0\n";
							$novastring .= "else\n";
							$novastring .= "i++\n";
						$novastring .= "}\n";
					$novastring .= "}\n";			
					
					$novastring .= "function startscroll(){\n";
						$novastring .= "if (document.all){\n";
							$novastring .= "move3(first2)\n";
							$novastring .= "second2.style.top=scrollerheight\n";
							$novastring .= "second2.style.visibility='visible'\n";
						$novastring .= "}\n";
						$novastring .= "else if (document.layers){\n";
							$novastring .= "document.main.visibility='show'\n";
							$novastring .= "move1(document.main.document.first)\n";
							$novastring .= "document.main.document.second.top=scrollerheight+5\n";
							$novastring .= "document.main.document.second.visibility='show'\n";
						$novastring .= "}\n";
					$novastring .= "}\n";
					
					$novastring .= "window.onload=startscroll\n";
					$novastring .= "</script>\n";
					
					$novastring .= "<ilayer id=\"main\" width=&{scrollerwidth}; height=&{scrollerheight}; bgcolor=&{scrollerbgcolor}; background=&{scrollerbackground}; visibility=hide>\n";
					$novastring .= "<layer id=\"first\" left=0 top=1 width=&{scrollerwidth};>\n";
					$novastring .= "<script language=\"JavaScript1.2\">\n";
					$novastring .= "if (document.layers)\n";
					$novastring .= "document.write(messages[0])\n";
					$novastring .= "</script>\n";
					$novastring .= "</layer>\n";
					$novastring .= "<layer id=\"second\" left=0 top=0 width=&{scrollerwidth}; visibility=hide>\n";
					$novastring .= "<script language=\"JavaScript1.2\">\n";
					$novastring .= "if (document.layers)\n";
					$novastring .= "document.write(messages[1])\n";
					$novastring .= "</script>\n";
					$novastring .= "</layer>\n";
					$novastring .= "</ilayer>\n";
					$novastring .= "<script language=\"JavaScript1.2\">\n";
					$novastring .= "if (document.all){\n";
						$novastring .= "document.writeln('<span id=\"main2\" style=\"position:relative;width:'+scrollerwidth+';height:'+scrollerheight+';overflow:hiden;background-color:'+scrollerbgcolor+' ;background-image:url('+scrollerbackground+')\">')\n";
						$novastring .= "document.writeln('<div style=\"position:absolute;width:'+scrollerwidth+';height:'+scrollerheight+';clip:rect(0 '+scrollerwidth+' '+scrollerheight+' 0);left:0;top:0\">')\n";
						$novastring .= "document.writeln('<div id=\"first2\" style=\"position:absolute;width:'+scrollerwidth+';left:0;top:1;\">')\n";
						$novastring .= "document.write(messages[0])\n";
						$novastring .= "document.writeln('</div>')\n";
						$novastring .= "document.writeln('<div id=\"second2\" style=\"position:absolute;width:'+scrollerwidth+';left:0;top:0;visibility:hidden\">')\n";
						$novastring .= "document.write(messages[1])\n";
						$novastring .= "document.writeln('</div>')\n";
						$novastring .= "document.writeln('</div>')\n";
						$novastring .= "document.writeln('</span>')\n";
					$novastring .= "}\n";
					$novastring .= "</script>\n";
				}
			}
			


			if (eregi(" pageticker ", $linha[$counter]) || eregi(" marquee ", $linha[$counter]))
			{
				$TickerType="";
				if (eregi(" pageticker ", $linha[$counter])) $TickerType="pageticker";
				else if (eregi(" marquee ", $linha[$counter])) $TickerType="marquee";
				
				# timestamp to generate unique id for the current page ticker
				if (!$CurrentHeadline)
				{
					list($usec, $sec) = explode(" ",microtime());
					$CurrentHeadline = "H".$headline."_".substr($sec,6).intval($usec*1000);
				}

				if (!$CurrentTicker) $CurrentTicker=$CurrentHeadline."00";
				
				$wait=2000;
				$control="";
				$qual=0;
				$loop="yes";
				$split=1;
				$TickerContents="";
				$spacing=10;
				$speed=6;

				if ($TickerType=="pageticker") $tickerCount++;
				if ($TickerType=="marquee") $marqueeCount++;
				$CurrentTicker++;

				while(each($parametros) )
				{			
					if( eregi("width=", $parametros[$qual] ) || eregi("largura=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$width=$valores[1];						
					}
					
					if( eregi("height=", $parametros[$qual] ) || eregi("altura=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$height=$valores[1];						
					}

					if( eregi("contents=", $parametros[$qual] ) || eregi("conteudos=", $parametros[$qual] ) || eregi("conteúdos=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$content=$valores[1];						
					}

					if( eregi("wait=", $parametros[$qual] ) || eregi("espera=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$wait=$valores[1];						
					}

					if( eregi("control=", $parametros[$qual] ) || eregi("controlo=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$control=$valores[1];						
					}

					if( eregi("clip=", $parametros[$qual] ) || eregi("recorte=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$clip=$valores[1];						
					}

					if( eregi("loop=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$loop=$valores[1];						
					}

					if( eregi("split=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$split=$valores[1];						
					}

					if( eregi("speed=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$speed=$valores[1];						
					}

					if( eregi("spacing=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$spacing=$valores[1];						
					}
										
					$qual++;
				}

				$ctrlcount+=0;
				if ($spacing<0) $spacing=0;

				if ( eregi("yes", $control) || eregi("sim", $control))
				{
					$ctrlticker[$ctrlcount]=$CurrentTicker;
					$ctrlcount++;
				}

				if ($loop!="no") $loop="yes";


				# page contents defined by a page object command
							
				if  (eregi("ultimos", $content) || eregi("últimos", $content) || eregi("last", $content) || (eregi("set", $content) && eregi("order=(([a-z_]+) (asc|desc))", $linha[$counter])))
				{	
					$howmany=10;				
					$columns=1;
					$exclude=0;
					$qual=0;
					reset($parametros);
					while(each($parametros) )
					{			
						if( eregi("skip=", $parametros[$qual] ) )
						{
							$valores=explode("=", $parametros[$qual]);
							$skip=trim($valores[1]);						
						}
					
						if( eregi("size=", $parametros[$qual] ) )
						{
							$valores=explode("=", $parametros[$qual]);
							$size=trim($valores[1]);
						}
					
						if( eregi("quantos=", $parametros[$qual] ) || eregi("howmany=", $parametros[$qual] ) )
						{
							$valores=explode("=", $parametros[$qual]);
							$howmany=trim($valores[1]);
						}
						if( eregi("colunas=", $parametros[$qual] ) || eregi("columns=", $parametros[$qual] ) )
						{
							$valores=explode("=", $parametros[$qual]);
							$columns=trim($valores[1]);
						}

						if ($nNolimits=="1") {$box=-1; $noLimits="nolimits";} 
						else
						{	
							if( eregi("caixa=", $parametros[$qual] ) || eregi("box=", $parametros[$qual] ) )
							{
								$valores=explode("=", $parametros[$qual]);
								$box=trim($valores[1]);
							}
							$noLimits="";
						}
						if( eregi("layout=", $parametros[$qual] ) )
						{
							$valores=explode("=", $parametros[$qual]);
							$layout=trim($valores[1]);
						}
					
						if( eregi("areas=", $parametros[$qual] ) || eregi("subjects=", $parametros[$qual] ) )
						{
							$valores=explode("=", $parametros[$qual]);
							$subjects=trim($valores[1]);
						}
					
						if( eregi("excluir=", $parametros[$qual] ) || eregi("exclude=", $parametros[$qual] ))
						{
							$valores=explode("=", $parametros[$qual]);
							$exclude=trim($valores[1]);
						}
					
						$qual++;
					}

					if (eregi("set", $content) && eregi("order=(([a-z_]+) (asc|desc))", $linha[$counter], $regs)) $InsertCommand="set order=$regs[1]";
					else $InsertCommand="last";

					$RendererString="INSERT $InsertCommand skip=$skip howmany=$howmany columns=$columns box=$box layout=$layout subjects=$subjects exclude=$exclude $noLimits split=$split into=$CurrentTicker tickertype=$TickerType";

					if ($TickerType=="marquee") $RendererString.=" spacing=$spacing";

					$RenderedContents=renderer($RendererString);

					
					if ($TickerType=="pageticker")
					{
						$RenderedContentsArray=split("</style>",$RenderedContents);
						$stylesheet=$RenderedContentsArray[0];
						$TickerContents=$RenderedContentsArray[1];
					}
					else if ($TickerType=="marquee")
					{
						$RenderedContents = ereg_replace("\"","'",$RenderedContents);
						$RenderedContents = ereg_replace("\n","",$RenderedContents);
						$RenderedContents = ereg_replace("\r","",$RenderedContents);
						$TickerContents=$RenderedContents;
					}
				}
				else
				{
				# contents are drawn from a list of articles and page objects separated by commas
				
									
					$contparams=explode(",", $content);
					$TickerContents="";
					$cursource=0;
					$curpage=1;
					$stylesheet="";
					while(each($contparams))
					{
						$source=$contparams[$cursource];
						$RendererString="";
						$PageContents="";
						$sources=trim($source);
						if (eregi("a([0-9])+",$source))
						{							
							if (eregi("a(([0-9])+)l(([0-9])+)",$source,$regs))
							{
								$artid=$regs[1];
								$artlayout=$regs[3];
							}
							else
							{
								$artid=str_replace("a","",$source);
								$artid=str_replace("A","",$artid);
								if($result=mysql_db_query("$projecto","SELECT * from ARTICLEbase where serial=$artid AND aprovado>0", $dblink))
								{
									if( $row=mysql_fetch_object($result) )
									{
										if (!$artlayout) $artlayout=$row->boxsetup;
									}			
								}
							}
							
							$RendererString="INSERT article id=$artid layout=$artlayout nolimits";
							
							$PageContents=renderer($RendererString);

																			
							if ($TickerType=="pageticker")
							{
								$stylesheet .="\n\n#ticker".$CurrentTicker."page".$curpage."{\n position: absolute;\n left: 0;\n top: 0;\n visibility: ";										
							
								if ($curpage=="1") $stylesheet.="visible";
								else $stylesheet.="hidden";

								$stylesheet.="\n }\n\n";

								$TickerContents.= "\n<div id=\"ticker".$CurrentTicker."page".$curpage."\">".$PageContents."</div>";
									
								$curpage++;
							}
							else if ($TickerType=="marquee")
							{
								$PageContents = ereg_replace("\"","'",$PageContents);
								$PageContents = ereg_replace("\n","",$PageContents);
								$PageContents = ereg_replace("\r","",$PageContents);
								
								if ($spacing>0)
								{
									$TickerContents.="<table cellspacing=0 cellpadding=0 border=0 align=left><tr><td>".$PageContents;
									$TickerContents.="</td><td>";
									for ($i=0; $i<$spacing; $i++) $TickerContents .="&nbsp;";
									$TickerContents.="</td></tr></table>";
								}
								else $TickerContents.= $PageContents;
							}					
						}
						else
						{
														
							if (eregi("h([0-9])+",$source,$regs) || eregi("o([0-9])+",$source,$regs))
							{
								$objcontent="";
								$objid=str_replace("o","",$source);
								$objid=str_replace("O","",$objid);
								if($headresult=mysql_db_query("$projecto","SELECT * from HEADLINEbase where id=$objid", $dblink))
								{
									if( $row=mysql_fetch_object($headresult) )
									{
										$objcontent = $row->content;
									}			
								}
								$RendererString=$objcontent;
								if ($TickerType=="marquee") $RendererString.=" into=$CurrentTicker tickertype=$TickerType ";
								$PageContents=renderer($RendererString);

								if ($TickerType=="pageticker")
								{
									$stylesheet .="\n\n#ticker".$CurrentTicker."page".$curpage."{\n position: absolute;\n left: 0;\n top: 0;\n visibility: ";						
									if ($curpage=="1") $stylesheet.="visible";
									else $stylesheet.="hidden";
									$stylesheet.="\n }\n\n";
									$TickerContents.= "\n<div id=\"ticker".$CurrentTicker."page".$curpage."\">".$PageContents."\n</div>";
									$curpage++;
								}
								else if ($TickerType=="marquee")
								{
									$PageContents = ereg_replace("\"","'",$PageContents);
									$PageContents = ereg_replace("\n","",$PageContents);
									$PageContents = ereg_replace("\r","",$PageContents);

									if ($spacing>0)
									{
										$TickerContents.="<table cellspacing=0 cellpadding=0 align=left border=0><tr><td>".$PageContents;
										$TickerContents.="</td><td>";
										for ($i=0; $i<$spacing; $i++) $TickerContents .="&nbsp;";
										$TickerContents.="</td></tr></table>";
									}
									else $TickerContents.= $PageContents;
								}
							}
						}
						$cursource++;
					}
				}
									
				if ($TickerType=="pageticker")
				{
					
					$novastring.="\n<style type=\"text/css\">\n#ticker".$CurrentTicker." {\n position: relative;\n";
					if ($width) $novastring.= " WIDTH: ".$width.";\n";
					if ($height) $novastring.= " HEIGHT: ".$height.";\n";
					if (($clip!="no" && $clip!="yes") && $width && $height) $novastring.=" clip: rect(0px ".$width."px ".$height."px 0px);\n overflow: hidden;\n";
					$novastring.= " visibility: visible\n }\n\n".$stylesheet."</style>\n<div id=\"ticker".$CurrentTicker."\">";
					$novastring.=$TickerContents;
					$novastring.="\n</div>\n";

			
					# common pageticker functions
 
					if ($tickerCount=="1")
					{	
						$novastring.= "<script type=\"text/javascript\" src=\"";
						if(strlen($REMOTE_USER)>0)	$novastring.= "../layers.js\"></script>";
						else $novastring.= "layers.js\"></script>";
						
						$novastring.="
						<script>
						var tickernr;
						if (!tickernr)
						{	
							Tickers = new Array();
							numLayers = new Array();
							shownLayer = new Array();
							pause = new Array();
							TimerId = new Array();
							TimerDelay = new Array();
							Loop = new Array();
						}
						</script>
						";
					}
					
					# individual pageticker definitions
					$layernumber=substr_count($TickerContents,"<div id=\"ticker".$CurrentTicker."page");
				
					$novastring.="
					<script>
					if (!tickernr) tickernr=0;
					Tickers[tickernr]='".$CurrentTicker."';
					tickernr++;
					numLayers['ticker".$CurrentTicker."'] = ".$layernumber.";
					shownLayer['ticker".$CurrentTicker."'] = 1;
					pause['ticker".$CurrentTicker."'] = false;
					TimerId['ticker".$CurrentTicker."']= '0';
					TimerDelay['ticker".$CurrentTicker."'] = ".$wait.";
					Loop['ticker".$CurrentTicker."'] = '".$loop."';
					document.onload=RollTickers();
					</script>";
				}
				else if ($TickerType=="marquee")
				{
					# common marquee functions
					
					if ($marqueeCount=="1")
					{
						$novastring.= "<script type=\"text/javascript\" src=\"";
						if(strlen($REMOTE_USER)>0)	$novastring.= "../layers.js\"></script>";
						else $novastring.= "layers.js\"></script>";

						$novastring.="
						<script>
						var marqueenr;
						if (!marqueenr)
						{	
							Marquee = new Array;
							MarqueeWidth = new Array;
							MarqueeHeight = new Array;
							MarqueeSpeed = new Array;
							MarqueeDirection = new Array;
							MarqueeContents = new Array;
						}
						</script>
						";
					}
					# individual marquee definitions
					
					$novastring.="\n<style type=\"text/css\">\n#marquee".$CurrentTicker." {\n position: relative;\n";
					if ($width) $novastring.= " WIDTH: ".$width.";\n";
					if ($height) $novastring.= " HEIGHT: ".$height.";\n";
					if ($width && $height) $novastring.=" clip: rect(0px ".$width."px ".$height."px 0px);\n overflow: hidden;\n";
					$novastring.= " visibility: visible\n }\n\n";
					$novastring.="#marquee".$CurrentTicker."contents {\n position: absolute;\n";
					$novastring.= " LEFT: 0;\n";
					//if ($width) $novastring.= " WIDTH: ".$width.";\n";
					$novastring.= " WIDTH: 1000;\n";
					if ($height) $novastring.= " HEIGHT: ".$height.";\n";
					$novastring.= " visibility: visible\n }\n</style>";

					$novastring.= "
					<script>
					if (!marqueenr) marqueenr=0;
					Marquee[marqueenr]='".$CurrentTicker."';
					marqueenr++;
					MarqueeWidth['marquee".$CurrentTicker."'] = ".$width.";
					MarqueeHeight['marquee".$CurrentTicker."'] = ".$height.";
					MarqueeSpeed['marquee".$CurrentTicker."'] = ".$speed.";
					MarqueeDirection['marquee".$CurrentTicker."'] = -1;
					MarqueeContents['marquee".$CurrentTicker."']= \"".$TickerContents."\";
					
			
					if(IE4)
					{
						var os=navigator.platform;
						if (os.indexOf('Mac')>-1) { var scrollDelay=100; var scrollAmount=parseInt(MarqueeSpeed['marquee".$CurrentTicker."']/3)+1;} 
						else {var scrollDelay=50; var scrollAmount=MarqueeSpeed['marquee".$CurrentTicker."'];}
						document.write(\"<div id='marquee".$CurrentTicker."'><marquee id='marquee".$CurrentTicker."marquee' scrolldelay=\"+scrollDelay+\" scrollamount=\"+scrollAmount+\" height=\"+MarqueeHeight['marquee".$CurrentTicker."']+\" width=\"+MarqueeWidth['marquee".$CurrentTicker."']+\"><nobr>\"+MarqueeContents['marquee".$CurrentTicker."']+\"</nobr></marquee></div>\");
					}
					else if(NS4 || NG)
					{
						if (NS4)
						{
							document.write(\"<ilayer width=&{MarqueeWidth}; height=&{MarqueeHeight}; name='marquee".$CurrentTicker."'><layer name='marquee".$CurrentTicker."contents'><nobr>\"+MarqueeContents['marquee".$CurrentTicker."']+\"</nobr></layer></ilayer></div>\");
						}
						else if(!IE4)
						{
							
							document.write(\"<div id='marquee".$CurrentTicker."'><div id='marquee".$CurrentTicker."contents'><span id='contents'><nobr>\"+MarqueeContents['marquee".$CurrentTicker."']+\"</nobr></span></div></div>\");
							if (marqueenr==1)
							{	
								CurrPos = new Array;
								FarLeft = new Array;
							}
							var Marquee=getmylayer(\"marquee".$CurrentTicker."\");
						}
					}
					document.onload=StartMarquee(\"marquee".$CurrentTicker."\");
					</script>";
				}
			}
				
			
			
			if(eregi(" controlo ", $linha[$counter]) || eregi(" control ", $linha[$counter]))
			{
				$qual=0;
				$layout=0;
				while(each($parametros) )
				{			
					if( eregi("layout=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$layout=$valores[1];						
					}
					
					if ($nNolimits=="1") $caixa=-1;
					else
					{	if( eregi("caixa=", $parametros[$qual] ) || eregi("box=", $parametros[$qual] ) )
						{
							$valores=explode("=", $parametros[$qual]);
							$caixa=$valores[1];
						}
					}
						
					$qual++;
				}

				if ($layout>0)
				{
					if($layresult=mysql_db_query("$projecto","SELECT * from ARTICLEboxsetup where serial=$layout", $dblink))
					{
						while($row = mysql_fetch_object($layresult))
						{
							$bs_title_area=		$row -> title_area; 				 
							$bs_header_area=	$row -> header_area;
							$bs_content_area=	$row -> content_area;
							$bs_footer_area=	$row -> footer_area;
						}			
				

						$tooutput = box("$caixa", "$bs_header_area", "$bs_content_area", "$bs_footer_area", "$bs_title_area", "1",$projecto,$dblink,$remote_db);
						$tooutput=replace_macros($tooutput,$visualid,$area_id,0,$projecto,$dblink,$remote_db);
				
				
				
						if (eregi("-ptprev-",$tooutput))
						{
							$prevctrl="";
							for ($i=0; $i<count($ctrlticker); $i++)
							{
								$prevctrl.="prev('ticker".$ctrlticker[$i]."'); ";
							}
						}
						$tooutput=eregi_replace("-ptprev-","javascript:\" onClick=\"$prevctrl",$tooutput);


						if (eregi("-ptpause-",$tooutput))
						{
							$pausectrl="";
							for ($i=0; $i<count($ctrlticker); $i++)
							{
								$pausectrl.="pauseLayer('ticker".$ctrlticker[$i]."'); ";
							}
						}
						$tooutput=eregi_replace("-ptpause-","javascript:\" onClick=\"$pausectrl",$tooutput);


						if (eregi("-ptnext-",$tooutput))
						{
							$nextctrl="";
							for ($i=0; $i<count($ctrlticker); $i++)
							{
								$nextctrl.="next('ticker".$ctrlticker[$i]."'); ";
							}
						}
						$tooutput=eregi_replace("-ptnext-","javascript:\" onClick=\"$nextctrl",$tooutput);

						$novastring.=$tooutput;
					}
				}	
			}


			
			
						
			if(eregi(" comentarios ", $linha[$counter]) || eregi(" comments ", $linha[$counter]))
			{
				$quantos=10;	

				$qual=0;
				while(each($parametros) )
				{			
					
					if( eregi("artigo=", $parametros[$qual] ) || eregi("article=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$id_artigo=$valores[1];
					}
					
					if( eregi("size=", $parametros[$qual] ) )
					{
						$valores=explode("=", $parametros[$qual]);
						$table_size=$valores[1];
						
					}
					
					if( eregi("quantos=", $parametros[$qual] ) || eregi("howmany=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$quantos=$valores[1];
					}
					
					if( eregi("colunas=", $parametros[$qual] ) || eregi("columns=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$colunas=$valores[1];
					}
					
					if ($nNolimits=="1") $caixasdef[0]=-1;
					else
					{
						if( eregi("caixa=", $parametros[$qual] ) || eregi("box=", $parametros[$qual] ))
						{
							$valores=explode("=", $parametros[$qual]);
							$caixas=$valores[1];
							$caixasdef=explode(",", $caixas);
						}
					}
					
					if( eregi("br=sim", $parametros[$qual] ) || eregi("br=yes", $parametros[$qual] ))
					{
						$br="<br>";
					}
					
					if( eregi("layout=", $parametros[$qual] ))
					{
						$valores=explode("=", $parametros[$qual]);
						$layout=$valores[1];
					}					
					
					if( eregi("aprovados=sim", $parametros[$qual] ) || eregi("aprovados=yes", $parametros[$qual] ))
					{
						$aprovados="aprovado=1 AND";
					}
					
					$qual++;
				}

				$width="";
				if($table_size != "")	{$width=" width=\"$table_size\"";}
				
				$boxcur=0;
				$colunacur=1;
				$colwidth=" width=" . 100/$colunas ."%";
				
				
				global $page;
				global $PUBCOMLIMIT;
				global $PUBCOMORDER;

				$page +=0;
				if ($page<0) $page=0;
				$pagecur=$page+1;
				$startitem=0;
				

				if ($PUBCOMLIMIT<=0)
				{
					$query_limit="";
				}
				else
				{
					$startitem=$page*$PUBCOMLIMIT;
					$query_limit="LIMIT $startitem, $PUBCOMLIMIT";
				}

				if ($PUBCOMORDER==1)
				{
					$query_order="ASC";
				}
				else $query_order="DESC";
				
								
				# $quantosver=$quantos*10;
				$quantosvi=0;		
				
				
#
# Create a list of approved comments
#
				
				if($layout)
				{
					$comments_layout=$layout;
				}			
				else
				{
					if($result=mysql_db_query("$projecto", "SELECT serial from ARTICLEboxsetup where legenda='default comment layout'", $dblink))
					{
						$row=mysql_fetch_object($result);
						$comments_layout=$row->serial;
					}
					
					
					if($result=mysql_db_query("$projecto", "SELECT comments_layout from areas where id=$area_id", $dblink))
					{
						$row=mysql_fetch_object($result);
						if($row->comments_layout)$comments_layout=$row->comments_layout;
					}
				}
				
				if($result=mysql_db_query("$projecto", "SELECT * from ARTICLEboxsetup where serial=$comments_layout", $dblink))
				{
					$row=mysql_fetch_object($result);
					$form_header=		$row -> header_area;
					$form_form=			$row -> content_area;
					$form_footer=		$row -> footer_area;
					
				}


				if($contaosditos=mysql_db_query("$projecto", 
				"SELECT count(serial) from ARTICLEpubcom WHERE $aprovados article=$id_artigo", $dblink))
				{
					$row = mysql_fetch_array($contaosditos);
					$total_approved = $row[0];
				}

				if ($quantos>$total_approved) $quantos=$total_approved;

			
				# navigation
				if ($quantos>$PUBCOMLIMIT)
				{
					
					if(strlen($REMOTE_USER)>0)
					{
						require_once ("../include/strings.php");
					}
					else
					{
						require_once ("include/strings.php");
					}
					
															
					$nFirst_pubcom = $startitem+1;
					$nLast_pubcom = ($page+1)*$PUBCOMLIMIT;
					if ($nLast_pubcom>$quantos) $nLast_pubcom=$quantos;

					$navigation = "<table width=\"100%\"><tr><td>";
					$navigation.= "$strComments <b>$nFirst_pubcom-$nLast_pubcom</b> $strOf $quantos";
					$navigation.="</td><td><div align=right>";		
				
					global $HTTP_GET_VARS;
					$get_vars="";
					reset ($HTTP_GET_VARS);
					while (list ($key, $val) = each ($HTTP_GET_VARS))
					{
						if ($get_vars == "") $get_vars .= "$key=$val";
						else $get_vars .= "&"."$key=$val";
					}

					$get_vars = eregi_replace("&page=([0-9])+", "", $get_vars);
													
					if($page>0)
					{
						$pageant = $page-1;
						$navigation .= "<a href=\"index.php?$get_vars&page=$pageant\">$strPrevious</a>&nbsp;|&nbsp;";
					}
					
					$navigation .= "<b>$strPage $pagecur</b>";

					if( ($page+1)*$PUBCOMLIMIT<$quantos )
					{
						$pagepos = $page+1;
						$pagelast = $quantos/$PUBCOMLIMIT-1;
						$navigation .= "&nbsp;|&nbsp;<a href=\"index.php?$get_vars&page=$pagepos\">$strNext</a>";
					}
					
					$navigation.="</div></td></tr><tr><td></table>";

				}
				else $navigation ="";
				# end navigation
			
			
				if($pc_aprov_result=mysql_db_query("$projecto","SELECT submission_on,nome,email,title,texto from ARTICLEpubcom WHERE $aprovados article=$id_artigo ORDER BY submission_on $query_order $query_limit", $dblink))
				{
					
					$novastring .= $navigation."<hr><br>";
					
					if ($nNolimits!="1") $novastring .= "<table$width><tr><td$colwidth valign=top>";
					
					while($pc_aprov_row = mysql_fetch_object($pc_aprov_result))
					{
						if($quantosvi<$quantos)
						{
							$pc_aprov_submission_on	=$pc_aprov_row -> submission_on;
							$pc_aprov_nome		=$pc_aprov_row -> nome;
							$pc_aprov_email		=$pc_aprov_row -> email;
							$pc_aprov_title		=$pc_aprov_row -> title;
							$pc_aprov_texto		=$pc_aprov_row -> texto;
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
									$identificacao="Anónimo";
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
							
							$form_header2	=stripslashes($form_header2);
							$form_form2	=stripslashes($form_form2);
							$form_footer2	=stripslashes($form_footer2);
							
							
							$novastring .=box(	"$caixasdef[$boxcur]",
							"$form_header2",
							"$form_form2",
							"$form_footer2",
							"",1 );
							
							if(strlen($br)>0) {$novastring .="<br>";}
							$boxcur++;
							if($caixasdef[$boxcur] == "")	{	$boxcur=0;	}							
							
							if($colunas>1 && $nNolimits!="1")
							{
								$novastring .="</td>";
								
								$colunacur++;
								if($colunacur>$colunas)
								{
									$colunacur=1;
									$novastring .="</tr><tr>";
								}			
								
								$novastring .="<td$colwidth valign=top>";													
							}
							
							
							$quantosvi++;
						}
					}
					
					if ($nNolimits!="1") $novastring .=  "</td></tr></table>";
					$novastring .="<br><hr>".$navigation;	
				}
			}			
			
		}
		else
		{
			$novastring .= $linha[$counter];
		}
		
		$counter++;
	}

	if($dblink){ @mysql_close($dblink); }
        if($original_dblink){@mysql_close($original_dblink); }
        $dblink=mysql_pconnect($database_server, $database_username, $database_password);
	$projecto=$original_project;	
	return($novastring);
}

?>

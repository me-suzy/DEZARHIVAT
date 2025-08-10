<?	
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: article/comon.php
Last modified: 20013103

***************************************/ 

function replace_macros($string, $visualid=0, $area_id=0, $passed_article=0,$projecto="",$dblink="",$remote_db=0,$post=-1)
{
	global $optimize_html;
	global $base_html;
	global $DATE_FORMAT;

	if(!$remote_db)
	{
		global $dblink;
		global $projecto;
	}

	mysql_select_db ("$projecto");
	
	$result=mysql_query("SELECT serial from ARTICLEtypetxt", $dblink);
	
	global $item_text;
	while($row = mysql_fetch_object($result))
	{
		$serial=		$row -> serial;
		$legenda=		$row -> legenda;				
		
		$macros[$serial] ="\$$serial\$";
		
		if(!$base_html)
		{
			$replacement[$serial]=chop($item_text[$serial]);
			$replacement[$serial]=str_replace("\n","<br>",$replacement[$serial]);
		}
		else
		{
			$replacement[$serial]=$item_text[$serial];
		}
	}			
	
	$macros[0]="\$0\$";		
	global $base_title;
	$replacement[0]=$base_title;	
	$serial++;
	
	$macros[$serial]="\$ds\$"; 	
	global $base_submission_on;
	$ds_timestamp=strtotime($base_submission_on);
	$ds_replace=date($DATE_FORMAT,$ds_timestamp);
	$replacement[$serial]=$ds_replace;
	$serial++;

	$macros[$serial]="\$da\$";	
	global $base_approval_on;
	$da_timestamp=strtotime($base_approval_on);
	$da_replace=date($DATE_FORMAT,$da_timestamp);
	$replacement[$serial]=$da_replace;
	$serial++;

	$macros[$serial]="\$dc\$";	
	global $base_lastchanged;
	$dc_timestamp=strtotime($base_lastchanged);
	$dc_replace=date($DATE_FORMAT,$dc_timestamp);
	$replacement[$serial]=$dc_replace;
	$serial++;

	$macros[$serial]="\$days_dc\$";
	$date_today=time();
        $date_article=strtotime("$base_lastchanged");
        $temptime = DateDiff("d",$date_article, $date_today);
	if($temptime<0)	{$temptime=$temptime*-1;}
	$base_days_elapsed_lastchanged=$temptime;
	$replacement[$serial]=$base_days_elapsed_lastchanged;
	$serial++;
	
	$macros[$serial]="\$autor\$";	
	global $base_submited_by;
	$replacement[$serial]=$base_submited_by;
	$serial++;
	
	$macros[$serial]="\$classificacao\$";	
	global $base_class;
	$replacement[$serial]=$base_class-1;
	$serial++;
	
	if($result=mysql_query("SELECT name,email from STAFFbase where login like '$base_submited_by'", $dblink))
	{
		while($row = mysql_fetch_object($result))		
		{
			$security_name=		$row -> name;
			$security_email=	$row -> email;
		}
	}
	
	$macros[$serial]="\$autornome\$";		
	$replacement[$serial]=$security_name;
	$serial++;
	
	$macros[$serial]="\$autormail\$";	
	$replacement[$serial]=$security_email;
	$serial++;
	
	if($passed_article<1)
	{
		global $article;
		global $id_artigo;
		if($id_artigo>0 && $article<1)	{	$article=$id_artigo;	}
		if($id_artigo<1 && $article>0)	{	$id_artigo=$article;	}
	}
	else
	{
		$article=$passed_article;
		$id_artigo=$passed_article;
	}
	

	if($post!=-1)
	{
		$macros[$serial]="\$link\$";	
		$replacement[$serial]="?myself=$post&article=$id_artigo&visual=\$visual\$&id=\$area_id\$";
		$serial++;
	}
	else
	{
		$macros[$serial]="\$link\$";
        	$replacement[$serial]="?article=$id_artigo&visual=\$visual\$&id=\$area_id\$";
        	$serial++;
	}
		
	$macros[$serial]="\$id\$";	
	$replacement[$serial]="$id_artigo";
	$serial++;
	
	$macros[$serial]="\$print\$";
	$replacement[$serial]="index.php?article=$article&visual=-1&id=\$area_id\$&print_article=1";
	$serial++;
	
	$macros[$serial]="\$send\$";
	$replacement[$serial]="index.php?article=$article&visual=-1&id=\$area_id\$&email_article=1";
	$serial++;	

	$macros[$serial]="\$subject\$";
	$result=@mysql_query("SELECT legenda from ARTICLEtopictxt,ARTICLEtopic where article=$id_artigo AND topic=ARTICLEtopictxt.serial", $dblink);
	$obj=@mysql_fetch_object($result);
	$topic=$obj->legenda;
	$replacement[$serial]=$topic;
	$serial++;

	$macros[$serial]="\$subject_id\$";
	$result=@mysql_query("SELECT topic from ARTICLEtopic where article=$id_artigo", $dblink);
	$obj=@mysql_fetch_object($result);
	$topic_id=$obj->topic;
	$replacement[$serial]=$topic_id;
	$serial++;

	$macros[$serial]="\$headline_subject\$";
        $result=@mysql_query("SELECT id from HEADLINEbase where title='$topic'",$dblink);
        $obj=@mysql_fetch_object($result);
        $page_object=$obj->id;
	$replacement[$serial]="?headline=$page_object";
        $serial++;


	global $base_debate;
	global $base_debate_class;
	$formtouse=0;
	$pubcombox="";
	
	if($base_debate==0 && $base_debate_class==1) # comentarios + class
	{
		$formtouse=1;
	}
	
	if($base_debate==0 && $base_debate_class==0) # comentarios 
	{
		$formtouse=2;
	}
	
	if($base_debate==1 && $base_debate_class==1) # class 
	{
		$formtouse=3;
	}
	
	if($formtouse>0)
	{
		if($resultform=mysql_query("SELECT * from ARTICLEpubcomforms where serial=$formtouse", $dblink))
		{
			while($rowform = mysql_fetch_object($resultform))		
			{
				$form_boxtype=		$rowform -> boxtype;
				$form_header=		$rowform -> header;
				$form_form=		$rowform -> form;
				$form_footer=		$rowform -> footer;
				
				global $current_user;
				global $current_mail;
				
				$form_header=str_replace("-pubcom_myname-",$current_user, $form_header);
				$form_form=str_replace("-pubcom_myname-",$current_user, $form_form);
				$form_footer=str_replace("-pubcom_myname-",$current_user, $form_footer);
				$form_header=str_replace("-pubcom_myemail-",$current_mail, $form_header);
				$form_form=str_replace("-pubcom_myemail-",$current_mail, $form_form);
				$form_footer=str_replace("-pubcom_myemail-",$current_mail, $form_footer);
				
				global $article;
				global $visual;
				
				$article +=0;
				$visual	+=0;
				
				if($article==0 && $id_artigo>0)
				{
					$article=$id_artigo;
				}
				
				$form_header=str_replace("-article-",$article, $form_header);
				$form_form=str_replace("-article-",$article, $form_form);
				$form_footer=str_replace("-article-",$article, $form_footer);
				$form_header=str_replace("-visual-",$visual, $form_header);
				$form_form=str_replace("-visual-",$visual, $form_form);
				$form_footer=str_replace("-visual-",$visual, $form_footer);
				
				$form_header	=stripslashes($form_header);
				$form_form	=stripslashes($form_form);
				$form_footer	=stripslashes($form_footer);						
				
				$pubcombox=box(	"$form_boxtype",
				"$form_header",
				"$form_form",
				"$form_footer",
				"",1 );
			}
		}
	}
	
	global $pubcom_texto;
	global $pubcom_class;
	global $AGRADECIMENTOBOX;
	global $AGRADECIMENTOPUBCOM;
	if(strlen($pubcom_texto)>0 || $pubcom_class>0)
	{
		$pubcombox  ="<center><br><table width=50%><tr><td>";
		$pubcombox .=box("$AGRADECIMENTOBOX","",$AGRADECIMENTOPUBCOM,"","",1);
		$pubcombox .="</td></tr></table><br><CENTER>";
	}
	
	$macros[$serial]="\$pubcom\$";	
	$replacement[$serial]="$pubcombox";
	$serial++;

	$macros[$serial]="\$pageticker_prev\$";	
	$replacement[$serial]="-ptprev-";
	$serial++;

	$macros[$serial]="\$pageticker_pause\$";	
	$replacement[$serial]="-ptpause-";
	$serial++;

	$macros[$serial]="\$pageticker_next\$";	
	$replacement[$serial]="-ptnext-";
	$serial++;

	$macros[$serial]="\$approved_pubcom_nr\$";	
	if($query=mysql_query("SELECT count(serial) from ARTICLEpubcom WHERE aprovado=1 AND article=$id_artigo", $dblink))
	{
		$row = mysql_fetch_array($query);
		$approved_pubcom = $row[0];
	}
	$replacement[$serial]="$approved_pubcom";
	$serial++;

	$macros[$serial]="\$pubcom_nr\$";	
	if($query=mysql_query("SELECT count(serial) from ARTICLEpubcom WHERE article=$id_artigo", $dblink))
	{
		$row = mysql_fetch_array($query);
		$pubcom_nr = $row[0];
	}
	$replacement[$serial]="$pubcom_nr";
	$serial++;

	$serial=0;
	while(each($macros))
	{					
		$string=str_replace($macros[$serial],"$replacement[$serial]",$string);		
		$serial++;
	}
	
	$string=str_replace("\$visual\$","$visualid",$string);
	$string=str_replace("\$area_id\$","$area_id",$string);
	

    if (preg_match_all("/([$]checkfield[0-9]+(,[0-9]+)*[$])/",$string,$matches))
    {
		for ($m=0; $m<count($matches[1]); $m++)
		{
			$checkfield_return="true";
            ereg("[$]checkfield([0-9]+(,[0-9]+)*)[$]",$matches[1][$m],$regs);
            $fields=split(",",$regs[1]);
            $fieldnr=0;
            while (each($fields))
            {
				if($query = mysql_query("SELECT stuff from ARTICLEcontent
										WHERE artigo=$id_artigo
                                        AND type=$fields[$fieldnr]",$dblink))
				{
					$row = mysql_fetch_object($query);
					$stuff = $row -> stuff;
					if (!preg_match("/\S/",$stuff)) $checkfield_return="false";
                }
                $fieldnr++;
            }
			$pattern = $matches[1][$m];
			$pattern=str_replace("$","[$]",$pattern);
			$pattern = "/".$pattern."/";
            $string=preg_replace($pattern,"$checkfield_return",$string,1);
		}
    }

	if($optimize_html>0)
	{
		# strip double spaces
		while(ereg("  ",$string))	{	$string=ereg_replace("  ", " ", $string);	}

		# strip tabs
		while(ereg("\t",$string))	{	$string=ereg_replace("\t", "", $string);	}
	}
	
	return("$string\n");
}

function DateAdd ($interval,  $number, $date) 
{
	$date_time_array  = getdate($date);
                                   
        $hours =  $date_time_array["hours"];
        $minutes =  $date_time_array["minutes"];
        $seconds =  $date_time_array["seconds"];
        $month =  $date_time_array["mon"];
        $day =  $date_time_array["mday"];
        $year =  $date_time_array["year"];

        switch ($interval) 
	{
                case "yyyy":
	                $year +=$number;
        	        break;        

                case "q":
			$year +=($number*3);
                        break;        
                case "m":
                        $month +=$number;
                        break;        
                case "y":
                case "d":
                case "w":
                        $day+=$number;
                        break;        
                case "ww":
                        $day+=($number*7);
                        break;        
                case "h":
                        $hours+=$number;
                        break;        
                case "n":
                        $minutes+=$number;
                        break;        
                case "s":
                        $seconds+=$number;
                        break;        

	}    

        $timestamp =  mktime($hours ,$minutes, $seconds,$month ,$day, $year);
        return $timestamp;
}



Function DateDiff ($interval, $date1,$date2) 
{
        // get the number of seconds between the two dates
        $timedifference =  $date2 - $date1;
                              
        switch ($interval)
        {
        	case "w":
                      $retval  = sprintf("%d", $timedifference/604800);
                      break;
                case "d":
                      $retval  = sprintf("%d", $timedifference/86400);
                      break;
                case "h":
                      $retval = sprintf("%d", $timedifference/3600);
                      break;
                case "n":
                      $retval  = sprintf("%d", $timedifference/60);
                      break;
                case "s":
                      $retval  = $timedifference;
                      break;

        }    
        return $retval;
}

?>

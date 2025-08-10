<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: article/search.php
Last modified: 20010808 

***************************************/ 


require_once "config.php";
require_once "include/box.php";
require_once "article/comon.php";
require_once "include/strings.php";
	
$visualid=$visual;
$visualid +=0;
$area_id +=0;


$year_i+=0;
$year_f+=0;
$month_i+=0;
$month_f+=0;
$day_i+=0;
$day_f+=0;
$date_filter="";

if( $year_i && $month_i && $day_i )
{
        $date_i=$year_i."-".$month_i."-".$day_i;

        if( $year_f && $month_f && $day_f )
        {
                $date_f=$year_f."-".$month_f."-".$day_f;

                $date_filter=" date_format(ARTICLEbase.submission_on,'%Y-%m-%d') >= date_format('$date_i','%Y-%m-%d') AND date_format(ARTICLEbase.submission_on,'%Y-%m-%d') <= date_format('$date_f','%Y-%m-%d') AND ARTICLEbase.serial=ARTICLEkeywords.article AND ";
        }
        else
        {
                $date_filter="date_format(ARTICLEbase.submission_on,'%Y-%m-%d') = date_format('$date_i','%Y-%m-%d') AND ARTICLEbase.serial=ARTICLEkeywords.article AND ";
        }

}



if($search != "")
{
	$search=stripslashes($search);
	
	$search=str_replace(" a "," ",$search);
	$search=str_replace(" e "," ",$search);
	$search=str_replace(" i "," ",$search);
	$search=str_replace(" o "," ",$search);
	$search=str_replace(" u "," ",$search);

	$search=str_replace("\r","",$search);
	$search=str_replace("\n"," ",$search);
	$search=str_replace(".","",$search);
	$search=str_replace(",","",$search);
	$search=str_replace(";","",$search);
	$search=str_replace(":","",$search);
	
	$search=str_replace("\t","",$search);
	$search=str_replace("  "," ",$search);
	
	
	if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
	{
		mysql_select_db ("$projecto");

		$umresultado=1;
		
		$oldsearch=ereg_replace(' ', '%20', $search);
		$oldsearchtxt=$search;
		
		if($quantos = preg_match_all('/"\S[^"]+\S"/',$search,$substring));
		{
			$counter=0;
			
			$expression="";
			
			while($substring[0][$counter])
			{
				
				$substring[0][$counter]=str_replace('"','',$substring[0][$counter]);
				if($counter>0)
				{
					$expression .= "OR";
				}
				$expression .= " ARTICLEkeywords.palavra LIKE '" . $substring[0][$counter] . "%' ";
				
				$counter++;
				
			}	
			
			$search=preg_replace('/"\S[^"]+\S"/','',$search);
		}
		
		
		if(strlen($search))
		{
			$search=str_replace("'", "",$search);
			
			$rest_of_words=explode(" ", $search);
			
			$howmany=count($rest_of_words);
			
			for($counter=0; $counter<$howmany; $counter++)
			{
				$rest_of_words[$counter]=str_replace(" ", "",$rest_of_words[$counter]);
				
				if($rest_of_words[$counter])
				{
					if($expression != "")
					{
						$expression .= "OR";
					}			
					$expression .= " ARTICLEkeywords.palavra LIKE '" . $rest_of_words[$counter] . "%' ";
				}
			}			
		}
		
		$page +=0;
		$startlimit= $page * $SEARCHMAXRESULTS;
		
		if($qtresults==0)
		{
			if($searchtopic<1) # topic free search
			{
				$sql="SELECT ARTICLEkeywords.article as nresults from ARTICLEkeywords,ARTICLEbase WHERE $date_filter $expression GROUP BY article";
			}
			else
			{
				$sql="SELECT ARTICLEkeywords.article as nresults from ARTICLEkeywords,ARTICLEtopic,ARTICLEbase WHERE $date_filter ARTICLEkeywords.article=ARTICLEtopic.article and $expression and ARTICLEtopic.topic=$searchtopic GROUP BY ARTICLEkeywords.article";
			}
			
# print total number of results
			$qt=mysql_query("$sql", $dblink);
			while($row = @mysql_fetch_object($qt))
			{
				$qtarticle=	$row -> nresults;
				$qtresults++;
			} 
		}
		
		if ($qtresults==0)
                {
                        print ("<center>$strNoResultsMatchQuery '<i>$oldsearchtxt</i>'</center>");
                }
		else if($SEARCHMAXRESULTS>$qtresults)
		{
			$headfooter= "<center>$qtresults $strResultsMatchQuery '<i>$oldsearchtxt</i>'</center>";
		}
		else
		{
			$nbpage=$page+1;
			$totalpages=sprintf("%d", $qtresults/$SEARCHMAXRESULTS);
			$fptotalpages=$qtresults/$SEARCHMAXRESULTS;
			
			if($totalpages<$fptotalpages)
			{
				$totalpages++;
			}
			
			$headfooter = "<table width=100%><tr><td width=20%>";
			if($page>0)
			{
				$prevpage=$page-1;
				$headfooter .= "<a href=?search=$oldsearch&searchtopic=$searchtopic&id=$id&page=$prevpage&qtresults=$qtresults>$strPreviousResultsPage ($page)</a>";
			}
			
			$headfooter .= "</td><td width=60%>";
			$headfooter .= "<center>$qtresults $strResultsMatchQuery '<i>$oldsearchtxt</i>'<br><b>($strPage $nbpage $strOf $totalpages)</b></center>";
			$headfooter .= "</td><td width=20% align=right>";
			
			if($totalpages>$page+1)
			{
				$nextpage=$page+1;
				$shownextpage=$nextpage+1;
				
				$headfooter .= "<a href=?search=$oldsearch&searchtopic=$searchtopic&id=$id&page=$nextpage&qtresults=$qtresults>$strNextResultsPage (" . $shownextpage . ")</a>";
			}
			
			$headfooter .= "</td></tr></table>";
		}
		
		print "$headfooter<br>";

		if($SEARCHORDER<0)	{	$SEARCHORDER="ORDER by ARTICLEkeywords.article DESC";	}
		else			{	$SEARCHORDER="ORDER by ARTICLEkeywords.article ASC";	}
		
		if($searchtopic<1) # topic free search
		{
			$sql="SELECT ARTICLEkeywords.article as serial from ARTICLEkeywords,ARTICLEbase WHERE $date_filter $expression GROUP BY article $SEARCHORDER LIMIT $startlimit,$SEARCHMAXRESULTS";			
		}
		else
		{
			$sql="SELECT ARTICLEkeywords.article as serial from ARTICLEkeywords,ARTICLEtopic,ARTICLEbase WHERE $date_filter ARTICLEkeywords.article=ARTICLEtopic.article and $expression and ARTICLEtopic.topic=$searchtopic GROUP BY ARTICLEkeywords.article $SEARCHORDER LIMIT $startlimit,$SEARCHMAXRESULTS";
		}
		
		if($quais=mysql_query("$sql", $dblink))
		{
			
#
#  Load the box setup, so that we how the search results should be
# displayed on screen...
#
			
			if($layout_id)
			{
				$box_select = " Where serial=$layout_id ";
			}
			else
			{
				$box_select = " Where legenda like 'SEARCH%' ";
			}
			
			if($result=mysql_query("SELECT * from ARTICLEboxsetup $box_select", $dblink))
			{
				while($row = mysql_fetch_object($result))
				{
					$layout=		$row -> serial;
					$bs_title_area=         $row -> title_area;
					$bs_header_area=        $row -> header_area;
					$bs_content_area=       $row -> content_area;
					$bs_footer_area=        $row -> footer_area;  
				}                          
			}
			
			if($SEARCHBOXUSE>=0)
			{
				if($result=mysql_query("SELECT id from BOXbase $box_select", $dblink))
				{
					while($row = mysql_fetch_object($result))
					{
						$caixa=         $row -> id;
					}                          
				}
			}
			else
			{
				$caixa="-1";
			}

			while($rowquais = mysql_fetch_object($quais))
			{
				$umresultado= $rowquais -> serial;
				
				if($resultados=mysql_query("SELECT * from ARTICLEbase where serial=$umresultado AND aprovado=1", $dblink))
				{
					while($rowresultados = mysql_fetch_object($resultados))
					{
						
# if the article rendered is in cache use it, otherwise render it and cache it!
						$layout +=0;
						$caixa +=0;
						
						$artcache=mysql_query("SELECT content from CACHE where cachetype=1 AND id=$umresultado AND layout=$layout AND box=$caixa", $dblink);
						$content='';
						while($row = @mysql_fetch_object($artcache))
						{
							$content= $row -> content;
						}
						
						$incache=0;
						if(strlen($content)>0)
						{
							print "$content";
							$incache=1;
						}
						else
						{
							$base_serial=           $rowresultados -> serial;
							$base_title=            $rowresultados -> title;
							$base_lastchanged=      $rowresultados -> lastchanged;
							$base_submission_on=    $rowresultados -> submission_on;
							$base_submited_by=      $rowresultados -> submited_by;
							$base_approval_on=      $rowresultados -> approval_on;
							$base_approved_by=      $rowresultados -> approved_by;
							
#
# Load the article contents (if any)
#
							if($result=mysql_query("SELECT * from ARTICLEcontent where artigo=$umresultado", $dblink))
							{
								while($row = mysql_fetch_object($result))
								{
									$type=                  $row -> type;
									$item_text[$type]=      $row -> stuff;
									$bdiv[$type]=           $row -> div;
									$bfont[$type]=          $row -> font;
								}
							}
#
# Make the strings and print the box...
#
							
							$id_artigo=$base_serial;
							
							
							$savethis=box(	"$caixa", 
							"$bs_header_area", 
							"$bs_content_area", 
							"$bs_footer_area", 
							"$bs_title_area",1);
							
							$savethis=replace_macros($savethis,$visualid,$area_id);
							
							print "$savethis";
							
							// save the cache
							$savethis=addslashes($savethis);
							mysql_query("INSERT INTO CACHE
							(expire_on,cachetype,id,content,layout,box) VALUES
							(now(),1,$base_serial,'$savethis',$layout,$caixa)", $dblink);	
						}
						print "<br>";
					}
				}
			}
			
			
			print "$headfooter<br>";
		}
	}
}
?>

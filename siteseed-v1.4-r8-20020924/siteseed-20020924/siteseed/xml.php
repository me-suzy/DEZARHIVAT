<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: article/xml.php
Last modified: 20020612

***************************************/ 

require_once "config.php";
require_once "article/comon.php";

if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
	mysql_select_db ("$projecto");

	if($listagem=mysql_query("SELECT serial from ARTICLEbase WHERE aprovado>0 ORDER BY lastchanged DESC LIMIT 0,$XmlLimit", $dblink))
	{
		header("Content-type: text/xml"); 
		print "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n";
 		print "<!DOCTYPE CONTEXT SYSTEM \"siteseed.dtd\">\n";
		print "<CONTEXT NAME=\"$projecto\" GENDATE=\"" . gmdate("Y-m-d H:i:s") . "\" POWEREDBY=\"SiteSeed - http://www.siteseed.org\">\n";
		
		while($rowlista = mysql_fetch_object($listagem))
		{
			$serialid=		$rowlista -> serial;
			
			$article=$serialid;
			if($article>0)	{$id=$article;}
			$id=addslashes($id);

			if($id>0)
			{
			#
			# Load the article base settings
			#	
				if($result=mysql_query("SELECT * from ARTICLEbase where serial=$id AND aprovado>0", $dblink))
				{			
					$gotone=0;
					while($row = mysql_fetch_object($result))
					{
						$base_serial=		$row -> serial;
						$base_title=		$row -> title;  
						$base_lastchanged=	$row -> lastchanged;		
						$xmlart  ="\t<ARTICLE>\n";
						$xmlart .="\t\t<ID>$base_serial</ID>\n";
						$publishdate ="\t\t<PUBLISHDATE>$base_lastchanged</PUBLISHDATE>\n";
						$publishdate .="\t\t<EXPIRYDATE>" . gmdate("Y-m-d H:i:s", time()+60*60*24*31) . "</EXPIRYDATE>\n";
					}
		
		
			#
			# Load the article contents (if any)
			#		
					if($result=mysql_query("SELECT * from ARTICLEcontent where artigo=$id ORDER BY type", $dblink))
					{
						while($row = mysql_fetch_object($result))
						{
							$type=			$row -> type; 				 
							$item_text[$type]=	$row -> stuff;
							$campo="field$type";
							$what=$$campo;
							$item_text[$type]=strip_tags($item_text[$type]);
							$item_text[$type]=htmlentities($item_text[$type]);
							$item_text[$type]=ereg_replace("\n", " ", $item_text[$type]);
				
							if(strlen($base_title)>1)
							{
								$gotone++;
								
								$xmlart2	 ="\t\t<TITLE>$base_title</TITLE>\n";
								$xmlart2	.="\t\t<LINKURL>$project_path/$projecto/index.php?article=$id&amp;visual=27</LINKURL>\n";
							}
				
							if($type==1 && strlen($item_text[$type])>1)
							{
							$item_text[$type]=ereg_replace("\r", "", $item_text[$type]);
							$gotone++;
							$xmlart3	 ="\t\t<SHORTTEXT>$item_text[$type]</SHORTTEXT>\n";
							}
						}			
					}
		
					$xmlart4="\t\t<CATEGORIES>\n";

					if($result=mysql_query("SELECT article,topic from ARTICLEtopic WHERE article=$id", $dblink))
					{
						while($row = mysql_fetch_object($result))
						{
						$topic=		$row -> topic; 				 
						$topico[$topic]=$topic;
				
						if($resultado=mysql_query("SELECT legenda from ARTICLEtopictxt WHERE serial=$topic", $dblink))
						{
							while($row = mysql_fetch_object($resultado))
							{
								$tema=		$row -> legenda;			 
								$xmlart4 .="\t\t\t<CATEGORY>$tema</CATEGORY>\n";
							}
						}
					}			
				}
				$xmlart4 .="\t\t</CATEGORIES>\n";
		
				if($gotone>1)
				{
					print "$xmlart$xmlart2$xmlart3$publishdate$xmlart4\t</ARTICLE>\n";
				}
		
			}
}			
		}
		
		print "</CONTEXT>\n";				
	}
}	
?>
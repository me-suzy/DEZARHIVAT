<?
require "whoisthis_bo.php";
require_once "../config.php";
require "../include/box.php";
$minstatus=3;
$op=0;
$det=4;                                                                                               
require "./staff_details.php";
require "../include/strings.php";
?>

<HTML>
<HEAD>
<script language=JavaScript>

function confirm_delete()
{
	return (confirm("<?print"$strConfirmMessage";?>"));
}

</script>

</HEAD>
<BODY>

<TITLE>ARTICLE setup - topics</TITLE>

<?
$insert+=0;
$outputform="";
if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{

#
# Is there a new topic to insert?
#

	if($new_topic)
	{	
		$new_topic=addslashes($new_topic);
		mysql_db_query("$projecto","INSERT INTO ARTICLEtopictxt set legenda=\"$new_topic\" ",$dblink);
	}

	


	if($insert)
	{
		
		$outputform.="<form method=post action=\"article_topicos.php\"><input type=text name=new_topic value=\"\"> <input type=submit name=Save value=$strSave></form>";
		
	}
	else
	{



		if($Gravar==$strToDelete)
		{
		
		
			while($nValues!=0)
			{
				$var_check="checkbox$nValues";
				$nCheck=$$var_check;	

				if($nCheck)
				{
					$var_topic="topic_id$nValues";
					$nTopic=$$var_topic;
					
					mysql_db_query("$projecto","DELETE FROM ARTICLEtopictxt WHERE serial=$nTopic", $dblink);
					mysql_db_query("$projecto","DELETE FROM ARTICLEtopic WHERE topic=$nTopic", $dblink);
				}
			$nValues--;
			}
		
		}



		if($Gravar==$strSave)
		{
			
			while($nValues!=0)
			{
				$var_leg="legenda$nValues";
				$var_topic="topic_id$nValues";
				$sLegenda=$$var_leg;
				$nTopic=$$var_topic;
				$sLegenda=addslashes($sLegenda);
				$nTopic=addslashes($nTopic);
				mysql_db_query("$projecto","UPDATE ARTICLEtopictxt 
						    	SET legenda	=\"$sLegenda\"
							WHERE serial=$nTopic", $dblink);
					
			$nValues--;
			}

		}	


		$result=mysql_db_query("$projecto", "SELECT * from ARTICLEtopictxt ORDER BY legenda", $dblink);
		$topics_length=mysql_num_rows($result);
		$outputform.="<form method=post name=\"topics\">";
		if($topics_length)
		{
		$outputform.="<table width=220><tr><td>ID</td><td align=left>$strSubject</td><td align=right>$strToDelete</td></tr></table>";	
		}
		$counter=1;
		
		while($row = mysql_fetch_object($result))
		{
			
			$topic_id=$row->serial;
			$legenda=$row->legenda;
			$topic_id=stripslashes($topic_id);
			$legenda=stripslashes($legenda);
			
			$outputform .= "<table cellpadding=20><tr><td>$topic_id</td><td>";
			$outputform .= "<INPUT NAME=\"topic_id$counter\" TYPE=\"hidden\" VALUE=$topic_id>";
			$outputform .= "<INPUT NAME=\"legenda$counter\" TYPE=\"text\" VALUE=\"$legenda\"></td>";
			$outputform .= "<td><input type=\"checkbox\" name=\"checkbox$counter\" value=1></td></tr></table>";
			$counter++;
		}

		if($topics_length)
		{
			$outputform.="<input type=submit name=\"Gravar\" value=$strSave> <input type=submit OnClick=\"return confirm_delete()\" name=\"Gravar\" value=$strToDelete>";
		}
	

		$outputform.="<input type=hidden name=nValues value=$counter></form>";
	
	}
		
	box(	"0",
		"<center><b>$strSubject</b><br>($strUsedFor)</center>", 
		"<center><a href=article_topicos.php?insert=1>$strInsertSubject</a>$outputform</center>", 
		"");
	
   	
}
else
{
	print "ARTICLE: No connection to database";
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
recordsession_bo("article_topicos.php",$string,$_SERVER['REMOTE_USER'],$HTTP_USER_AGENT,$_SERVER['REMOTE_ADDR'],$datamining);

?>


</HTML>


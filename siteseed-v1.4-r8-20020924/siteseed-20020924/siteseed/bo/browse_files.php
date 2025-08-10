<?
require_once "../config.php";
require "whoisthis_bo.php";
require "../include/strings.php";


$artigo+=0;
$down+=0;
$file=ereg_replace("/","",$file);

# Data Mining

$string="";
reset($HTTP_GET_VARS);
$key=key($HTTP_GET_VARS);
$value=current($HTTP_GET_VARS);
while( list($key,$value) = each($HTTP_GET_VARS) )
{
	$string.="$key\t$value\t";
}
recordsession_bo("browse_files.php",$string,$_SERVER['REMOTE_USER'],$HTTP_USER_AGENT,$_SERVER['REMOTE_ADDR'],$datamining);





# Check permissions to delete files

if(($dblink=mysql_pconnect($database_server, $database_username, $database_password)) && $artigo > -1 )
{
	
	if ( $subj=mysql_db_query("$projecto","SELECT topic from ARTICLEtopic where article=$artigo", $dblink) )
	{
		
		
		$counter=0;
		$empty=1;
		
		while( $row = mysql_fetch_object($subj) )
		{
			$subject[$counter]=$row->topic;
			$empty=0;
			$counter++;
		}
		
		
		if( $empty==1 )
		{
			$permit_editor=1;
		}
		
	}
	
	if( $stat=mysql_db_query("$projecto","SELECT status from STAFFbase where login='$_SERVER[REMOTE_USER]'", $dblink) )
	{
		if( $row = mysql_fetch_object($stat) ){$status=$row->status;}
	}
	
	
	$counter=0;
	$counter_result=0;
	
	if($subject!="")
	{
		while( each($subject) )
		{	
			
			if( $res=mysql_db_query("$projecto","SELECT id from STAFFdetails where login='$_SERVER[REMOTE_USER]' AND area=$subject[$counter] AND inibe=2 ", $dblink) )
			{
				if( $row = mysql_fetch_object($res) ){$counter_result++;}	
			}
			$counter++;
		}
	}
	
	
	if( ( $status==2 ) && ( count($subject) != $counter_result ) )	
	{
		$permit_editor=1;
	}		
	
# Journalists
	
	if( $auth=mysql_db_query("$projecto","SELECT id from ARTICLEbase,STAFFbase where submited_by='$_SERVER[REMOTE_USER]' AND submited_by=login AND status='1' AND serial=$artigo", $dblink) )
	{
		if( $row = mysql_fetch_object($auth) ){$author=$row->id;}
	}
	
	if( $author > -1 )
	{
		$permit_journalist=1;
	}
}


# Browser


If ($OS_system=="Windows")
{
	$url="../images/articles";
}
else
{
	$url="images/articles";
}



$down+=0;
$article+=0;


if( $down==1 )
{
	chdir($url);
	$dir = opendir(".");
}
else
{
	$url.="/";
	$url.="$artigo";
	
	if ( !is_dir($url) )
	{
		$url="images/articles";
	}
	
	chdir($url);
	$dir = opendir(".");	
	if( $apagar!="" )
	{
		if( unlink($file) ){}
		else { print " Houve um erro ao apagar o ficheiro "; }
	}
	
}



echo("<b>$url</b><br><br>");

echo("<table width=100% border=0 cellspacing=5>");

echo("<tr><td><a href=browse_files.php?down=1><img src=imagesbo/folder_up.png border=0></a><br><br></td></tr>");


$first=1;

while ($file=readdir($dir))
{
	
	$type=filetype($file);
	
	if( filetype($file) == "file" )
	{
		if( $first )
		{
			echo("<tr><td><b>$strName</b></td><td align=center><b>$strSize</b></td><td align=center><b>$strDate</b></td></tr>");
		}
		$first=0;
		
		$size=filesize($file);
		$date=filectime($file);
		$date=date("Y M d H:i",$date);
		echo("<tr><td><a href=$url/$file target=_blank>$file</a></td><td align=center>$size</td><td align=center>$date</td><td align=right>");
		
		if( $permit_editor || $permit_journalist || $status==3 )
		{
			echo("<a href=browse_files.php?artigo=$artigo&file=$file&apagar=\"apagar\">$strRemove</a></td></tr>");
		}
		else
		{
			echo("</td></tr>");	
		}
	}
	if( filetype($file) == "dir" && $file!="." && $file!=".." )
	{
		echo("<tr><td><a href=browse_files.php?artigo=$file><img src=imagesbo/folder.png border=0>$file</a></td></tr>");
	}
	
}
echo("</table>");

?>

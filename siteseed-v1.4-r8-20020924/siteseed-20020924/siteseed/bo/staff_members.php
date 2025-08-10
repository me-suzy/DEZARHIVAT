<?
require_once "../config.php";
require "../include/box.php";
require "./staff_details.php";
?>

<HTML>
<BODY>

<TITLE>STAFF setup</TITLE>

<?

$counter=1;
$alldone=0;
$serial=0;


if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
	while($alldone==0)
	{	
#
# Allways load the available users...
#
		if($result=mysql_db_query("$projecto","SELECT * from STAFFbase where id=$counter", $dblink))
		{
			
			$gotdefs=0;
			while($row = mysql_fetch_object($result))
			{
				if($row -> id == $counter)  # we have settings
				{
					$serial=		$row -> id;
					$login=			$row -> login;				
					$name=			$row -> name;				
					$email=			$row -> email;				
					$status=		$row -> status;				
					$areastatus=		$row -> area;				
				}
				
				$gotdefs=1;
			}
		}			
		
		if($gotdefs==0)
		{
			$alldone=1;
			$serial++;
			$login="";			
			$name="";			
			$email="";			
			$status=0;			
			$areastatus=0;			
			
			
			if($id_new==$counter) # there is data to be saved!
			{		
#
# Create a record
#
				$result=mysql_db_query("$projecto","INSERT INTO STAFFbase SET name=\"$name\"", $dblink); 
			}
		}
		
#
# Is there new data to replace the preferences?
#
		
		if($id_new==$counter) # there is data to be saved!
		{	
			$login_new=stripslashes($login_new);	
			$name_new=stripslashes($name_new);	
			$email_new=stripslashes($email_new);	
			$status_new=stripslashes($status_new);	
			
			$login_new=addslashes($login_new);	
			$name_new=addslashes($name_new);	
			$email_new=addslashes($email_new);	
			$status_new=addslashes($status_new);
			
			$areastatus_new +=0;	
			$status_new +=0;
			
#
#	set record values
#
			$result=mysql_db_query("$projecto","UPDATE STAFFbase 
			SET 	login	='$login_new',
			name	='$name_new',
			email	='$email_new',
			area	=$areastatus_new,
			status	=$status_new
			WHERE id=$counter", $dblink);
			
			$serial		=$id_new;
			$login		=$login_new;
			$name		=$name_new;
			$email		=$email_new;
			$status		=$status_new;
			$areastatus	=$areastatus_new;
		}
		
		if($status<2)
		{
			$options="<OPTION VALUE=1 SELECTED>Jornalista<OPTION VALUE=2>Editor<OPTION VALUE=3>Técnico";
		}
		if($status==2)
		{
			$options="<OPTION VALUE=1>Jornalista<OPTION VALUE=2 SELECTED>Editor<OPTION VALUE=3>Técnico";
		}
		if($status==3)
		{
			$options="<OPTION VALUE=1>Jornalista<OPTION VALUE=2>Editor<OPTION VALUE=3 SELECTED>Técnico";
		}
		
#
# Area de ediçao
#
# as secções tematicas...
		$options_topicos ="";
		if($areastatus==0)	
		{
			$options_topicos ="<OPTION VALUE=0 SELECTED>ACESSO TOTAL";
		}
		else
		{
			$options_topicos ="<OPTION VALUE=0>ACESSO TOTAL";
		}
		
		
		if($result=mysql_db_query("$projecto","SELECT serial,legenda from ARTICLEtopictxt", $dblink))
		{
			while($row = mysql_fetch_object($result))
			{
				$serialtopic=	$row -> serial;
				$topic=         $row -> legenda;
				
				if($areastatus==$serialtopic)
				{
					$options_topicos .="<OPTION VALUE=$serialtopic SELECTED>$topic";
				}
				else
				{
					$options_topicos .="<OPTION VALUE=$serialtopic>$topic";
				}
			}
		}
		
		$outputform .= "<br><table border=0><tr><td><b>Login</b></td><td><b>Nome</b></td><td><b>E-mail</b></td><td><b>Status</b></td><td><b>Acesso a</b></td></tr><tr>";
		$outputform .= "<FORM NAME=\"preferencias\" METHOD=\"get\">";
		$outputform .= "<INPUT NAME=\"id_new\" TYPE=\"hidden\" VALUE=\"$counter\">";
		$outputform .= "<td valign=top><INPUT NAME=\"login_new\" TYPE=\"text\" VALUE=\"$login\" size=6>";
		$outputform .= "</td><td valign=top><INPUT NAME=\"name_new\" TYPE=\"text\" VALUE=\"$name\" size=15>";
		$outputform .= "</td><td valign=top><INPUT NAME=\"email_new\" TYPE=\"text\" VALUE=\"$email\" size=15>";
		$outputform .= "</td><td valign=top><SELECT NAME=status_new>$options</SELECT>";
		$outputform .= "</td><td valign=top><SELECT NAME=areastatus_new>$options_topicos</SELECT>";
		$outputform .= "</td><td valign=top><INPUT NAME=\"Gravar\" TYPE=\"submit\" VALUE=\"Gravar\"></FORM>";			
		$outputform .= "</td></tr></table>";
		
		$counter++;
	}
	
	print "<center><table width=0% border=0 cellpadding=20><tr><td width=50% valign=\"top\">";
	
	box(	"0",
	"<center><b>Staff</b></center>", 
	"<center>$outputform</center>", 
	"");
	print "</td></tr></table></center>";
	
}
else
{
	print "STAFF: No connection to database";
}
?>

<BODY>
</HTML>


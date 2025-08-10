<?

/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/form.php
Last modified: 20012509

***************************************/

require_once "../config.php";
require_once "../include/strings.php";
require_once "../object/renderer.php";
require_once "../include/box.php";	


?>

<HTML>
<BODY>

<TITLE>Forms</TITLE>

<?

$serial+=0;

if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
	
	
	
	if($save!="" && validate_form($new_form,$type,$projecto,$dblink))
	{
		
		$new_form=str_replace("'","`",$new_form);
		$new_form=ereg_replace("'",'"',$new_form);
		$new_form		=addslashes($new_form);
		$new_title		=addslashes($new_title);
		
		$form=$new_form;
		$title=$new_title;
		
		if($serial>0)
		{
			$result=mysql_db_query("$projecto","UPDATE ARTICLEpubcomforms SET form='$form',title='$title' where serial=$serial", $dblink);
		}
		else
		{
			$result=mysql_db_query("$projecto","INSERT INTO ARTICLEpubcomforms SET form='$form',title='$title',type='$type' ", $dblink);
			$serial=mysql_insert_id($dblink);
		}
		
	}
	else
	{
		if(!validate_form($new_form,$type,$projecto,$dblink)){echo("Os campos obrigatórios não estão todos no formulário!");}
		
		if( $preview=="" && $save=="" )
		{
			
			if( $result=mysql_db_query("$projecto","SELECT * from ARTICLEpubcomforms where serial=$serial", $dblink) )
			{
				$row = mysql_fetch_object($result);
				$form=$row->form;
				$title=$row->title;
				$type=$row->type;
				
			}
		}
		else
		{
			$title=$new_title;
			$form=$new_form;
		}
		
	}
	
	$form=stripslashes($form);
	$title=stripslashes($title);	
	
	$macros ="<table border=1><tr><td>Macros</td><td>$strUsersField</td><td>$strReqLog</td><td>$strReqReg</td></tr>";
	
	
	$result=mysql_db_query("$projecto","SELECT * from user_fields", $dblink);
	
	
	while($row = mysql_fetch_object($result))
	{
		$id=$row->id;
		$field=$row->field_name;
		if($row->required_to_login){$required_to_login="*";}else{$required_to_login="-";}
		if($row->required_to_register){$required_to_register="*";}else{$required_to_register="-";}
		
		$macros.="<tr><td align=center><b>\$$id\$</b></td><td>$field</td><td align=center>$required_to_login</td><td align=center>$required_to_register</td></tr>";			
	}			
	$macros.="</table>";
	
	
}


if($serial=="")
{
	box(	"0","<B>$strNewForm</B>");
}
else
{
	if($preview)
	{
		box(	"0","<B>$strPreviewForm</B>");
	}
	else
	{
		if($save)
		{
			box(	"0","<B>$strSaveForm</B>");
		}
		else
		{
			box(	"0","<B>$strActualForm</B>");
		}
		
	}
	
}


if($preview || $save)
{
	$new_form=stripslashes($new_form);
	$output=$new_form;
}
else
{
	$output=$form;
}
print "<br><br><center><TABLE width=80%><tr><td>";
box(	"0",	"","$output");
print "</td></tr></table></center><br><br><br>";



$form=htmlspecialchars($form);

if($serial==0)
{
	box(	"0","<B>$strEditForm</B>");
}
else
{
	box(	"0","<B>$strEditForm ($serial)</B>");
}

print"<FORM NAME=\"forms\" METHOD=\"post\"><br><center><table cellspacing=20><tr><td>";
box(	"0","Title","<INPUT NAME=\"new_title\" TYPE=\"text\" value=\"$title\">");

print"<INPUT NAME=\"serial\" TYPE=\"hidden\" VALUE=\"$serial\">";
print"<INPUT NAME=\"type\" TYPE=\"hidden\" VALUE=\"$type\"><br>";

box(	"0","HTML","<TEXTAREA NAME=\"new_form\" TYPE=\"textarea\" ROWS=20 COLS=55 WRAP=PHYSICAL>$form</textarea><br>");

if( $type==login_users )
{
	$ch_login="checked";
}
if( $type==register_users )
{
	$ch_register="checked";
}
if( $type==comments )
{
	$ch_comments="checked";
}
if( $type==email )
{
	$ch_email="checked";
}

if($serial=="")
{
	print"<br>";
	box("0","$strFormType","<table width=100%><tr><td>$strLoginForm<input type=\"radio\" name=\"type\" value=\"login_users\" $ch_login></td><td>$strRegisterForm<input type=\"radio\" name=\"type\" value=\"register_users\" $ch_register></td><td>$strCommentsForm<input type=\"radio\" name=\"type\" value=\"comments\" $ch_comments></td><td>$strEmailForm<input type=\"radio\" name=\"type\" value=\"email\" $ch_email></td></tr></table>");
}


print"</td><td valign=top>";
box("0","$strMacroUsers",$macros);
print"</td></tr><tr><td><table width=100%><tr><td align=left><INPUT NAME=\"save\" TYPE=\"submit\" VALUE=\"$strSave\"></td><td align=right><INPUT NAME=\"preview\" TYPE=\"submit\" VALUE=\"$strPreview\"></td></tr></table></FORM></td></tr></table></center>";




function validate_form($form,$type,$projecto,$dblink)
{
	if($type=="login_users")
	{
		$result=mysql_db_query("$projecto","SELECT id from user_fields where required_to_login=1", $dblink);
		while( $row=mysql_fetch_object($result) )
		{
			$macro="\\$$row->id\\$";
			if( !ereg($macro,$form ) )
			{
				return 0;
			}
		}
	}
	
	if($type=="register_users")
	{
		$result=mysql_db_query("$projecto","SELECT id from user_fields where required_to_register=1", $dblink);
		while( $row=mysql_fetch_object($result) )
		{
			$macro="\\$$row->id\\$";
			if( !ereg($macro,$form ) )
			{
				return 0;
			}
		}
	}
	return 1;
}

?>
</BODY>
</HTML>



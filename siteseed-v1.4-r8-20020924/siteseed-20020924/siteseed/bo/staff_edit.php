<?
require "whoisthis_bo.php";
require_once "../config.php";
require "../include/box.php";
require "../include/strings.php";
$minstatus=3;
$op=0;
$det=8;                                                                                               
require "./staff_details.php";
?>

<HTML>
<BODY>


<script> <!--  

function select_all_chkboxes (form_name, first_chkbox, last_chkbox) {
	var i;
	var first_chkbox;
	var last_chkbox;
	for (i=first_chkbox + shift; i < last_chkbox + shift +1; i++) 
	{
		if (window.document.preferencias.elements[i].checked == true)
		{ is_checked_box[i]=true;} else { is_checked_box[i]=false;}
		window.document.preferencias.elements[i].checked=true;
	}
	var i=0;
	var first_chkbox="";
	var last_chkbox="";
	
} 

function clear_all_chkboxes (form_name, first_chkbox, last_chkbox) {
	var i;
	var first_chkbox;
	var last_chkbox;
	for (i=first_chkbox + shift; i < last_chkbox + shift +1; i++) 
	{
		if (window.document.preferencias.elements[i].checked == true){ is_checked_box[i]=true;}
		else { is_checked_box[i]=false;}
		window.document.preferencias.elements[i].checked=false;
	}
	var i=0;
	var first_chkbox="";
	var last_chkbox="";
}


function undo (form_name, first_chkbox, last_chkbox) {
	var i;
	var first_chkbox;
	var last_chkbox;
	for (i=first_chkbox + shift; i < last_chkbox + shift +1; i++)
	{ window.document.preferencias.elements[i].checked = is_checked_box[i];}
	var i=0;
	var first_chkbox="";
	var last_chkbox="";
}


is_checked_box = new Object();
var shift=6; // the first checkbox is the 6th element of the form


// -->
</script>




<TITLE>STAFF editor</TITLE>

<center><a href=index.php?listar=staff><? print "$strActualList"; ?></a></center>

<?

if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
#
# Load user...
#
	if($result=mysql_db_query("$projecto","SELECT * from STAFFbase where id=$id", $dblink))
	{
		
		$gotdefs=0;
		while($row = mysql_fetch_object($result))
		{
			$serial=		$row -> id;
			$login=			$row -> login;				
			$name=			$row -> name;				
			$email=			$row -> email;				
			$status=		$row -> status;				
			$areastatus=		$row -> area;				
			
			$gotdefs=1;
		}
		
#inibitions
		if($result=mysql_db_query("$projecto", "SELECT * from STAFFdetails where login like '$login'", $dblink))        
		{
			while($row = mysql_fetch_object($result))
			{
				$inibe= $row -> inibe;
				$area=  $row -> area;
				
				$limitacao[$inibe][$area]=1;
			}
		}   
	}
	
	if($gotdefs==0)
	{
		$alldone=1;
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
			$result=mysql_db_query("$projecto","INSERT INTO STAFFbase SET name='$name'", $dblink);
			$serial=mysql_insert_id();
		}
	}
	
	
	
#
# Is there new data to replace the preferences?
#
	
	if($id_new>0) # there is data to be saved!
	{	
		$login_new=stripslashes($login_new);	
		$name_new=stripslashes($name_new);	
		$email_new=stripslashes($email_new);	
		$status_new=stripslashes($status_new);	
		
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
		WHERE id=$id_new", $dblink);
		
		$serial		=$id_new;
		$login		=$login_new;
		$name		=$name_new;
		$email		=$email_new;
		$status		=$status_new;
		$areastatus	=$areastatus_new;
	}
	
	if($status<2)
	{
		$options="<OPTION VALUE=1 SELECTED>$strJournalists<OPTION VALUE=2>$strPublishers<OPTION VALUE=3>$strProgrammers";
	}
	if($status==2)
	{
		$options="<OPTION VALUE=1>$strJournalists<OPTION VALUE=2 SELECTED>$strPublishers<OPTION VALUE=3>$strProgrammers";
	}
	if($status==3)
	{
		$options="<OPTION VALUE=1>$strJournalists<OPTION VALUE=2>$strPublishers<OPTION VALUE=3 SELECTED>$strProgrammers";
	}
	
#
# Areas inibitions
#

	$options_topicos ="";
	if($areastatus==0)	
	{
		$options_topicos ="<OPTION VALUE=0 SELECTED>$strAll";
	}
	else
	{
		$options_topicos ="<OPTION VALUE=0>$strAll";
	}
	
	
	if($result=mysql_db_query("$projecto","SELECT serial,legenda from ARTICLEtopictxt ORDER BY legenda", $dblink))
	{
		// start modif jpr
		$count_topic=0;
		// end  modif jpr
		
		while($row = mysql_fetch_object($result))
		{
			$serialtopic=	$row -> serial;
			$topic=         $row -> legenda;
			
#
# save data
#
			if($id_new>0) # there is data to be saved!
			{
				$varname="topicedit$serialtopic";			
				$este=$$varname;
				
				mysql_db_query("$projecto","delete from STAFFdetails 
				WHERE 	login like '$login_new' AND
				inibe=2 AND 
				area=$serialtopic", $dblink);
				
				if(strlen($este)>0)
				{
					mysql_db_query("$projecto","insert into STAFFdetails 
					SET 	login	='$login_new',
					inibe	=2,
					area	=$serialtopic", $dblink);
					
					$limitacao[2][$serialtopic]=1;
				}
				else
				{
					$limitacao[2][$serialtopic]=0;
				}
			}	
			
#
# Prepare form
#
			if($areastatus==$serialtopic)
			{
				$options_topicos .="<OPTION VALUE=$serialtopic SELECTED>$topic";
			}
			else
			{
				$options_topicos .="<OPTION VALUE=$serialtopic>$topic";
			}
			
			
			
			if($limitacao[2][$serialtopic]==1)
			{ $checked=" CHECKED=\"TRUE\"";}  else  { $checked="";}
			
			
			
			$topicedit .= "<INPUT NAME=\"topicedit$serialtopic\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>";
			
			$topicedit .= " $topic<br>";
			
			// start modif jpr
			$count_topic++;
			// end modif jpr				
		}
		
	}
	
	if($result=mysql_db_query("$projecto","SELECT id,title from HEADLINEbase ORDER BY title", $dblink))
	{
		
		// start modif jpr
		$count_headline=0;
		// end modif jpr
		
		while($row = mysql_fetch_object($result))
		{
			$headlineid=	$row -> id;
			$headlinetitle= $row -> title;
			
#
# save data
#
			if($id_new>0) # there is data to be saved!
			{
				$varname="headlineedit$headlineid";			
				$este=$$varname;
				
				mysql_db_query("$projecto","delete from STAFFdetails 
				WHERE 	login like '$login_new' AND
				inibe=3 AND 
				area=$headlineid", $dblink);
				
				if(strlen($este)>0)
				{
					mysql_db_query("$projecto","insert into STAFFdetails 
					SET 	login	='$login_new',
					inibe	=3,
					area	=$headlineid", $dblink);
					
					$limitacao[3][$headlineid]=1;
				}
				else
				{
					$limitacao[3][$headlineid]=0;
				}
			}	
			
#
# Prepare form
#
			
			
			if($limitacao[3][$headlineid]==1) { $checked=" CHECKED=\"TRUE\""; }	else { $checked="";}
			
			
			$headlineedit .= "<INPUT NAME=\"headlineedit$headlineid\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>";
			
			$headlineedit .= " $headlinetitle<br>";
			$count_headline++;        
		}
	}
	
	
	
#
# General permissions - save new
#
	if($id_new>0) # there is data to be saved!
	{
		for($qual=1; $qual<13; $qual++)
		{
			$varname="gerperm$qual";	
			$este=$$varname;
			
			mysql_db_query("$projecto","delete from STAFFdetails 
			WHERE 	login like '$login_new' AND
			inibe=0 AND 
			area=$qual", $dblink);
			
			if(strlen($este)>0)
			{
				mysql_db_query("$projecto","insert into STAFFdetails 
				SET 	login	='$login_new',
				inibe	=0,
				area	=$qual", $dblink);
				
				$limitacao[0][$qual]=1;
			}
			else
			{
				$limitacao[0][$qual]=0;
			}
		}		
	}
	
#
# create form
#
	
	$qualperm=1;
	if($limitacao[0][$qualperm]==1) { $checked=" CHECKED=\"TRUE\""; }	else { $checked="";}
	$gerperm = "<table width=100%><tr><td><INPUT NAME=\"gerperm$qualperm\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>$strBoxes <br>";
	
	$qualperm=2;
	if($limitacao[0][$qualperm]==1)	{ $checked=" CHECKED=\"TRUE\""; }	else { $checked="";}
	$gerperm .= "<INPUT NAME=\"gerperm$qualperm\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>$strObjects</td>";
	
	$qualperm=3;
	if($limitacao[0][$qualperm]==1) { $checked=" CHECKED=\"TRUE\""; }	else { $checked="";}
	$gerperm .= "<td><INPUT NAME=\"gerperm$qualperm\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>$strArticleFields<br>";
	
	$qualperm=4;
	if($limitacao[0][$qualperm]==1) { $checked=" CHECKED=\"TRUE\""; }	else { $checked="";}
	$gerperm .= "<INPUT NAME=\"gerperm$qualperm\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>$strSubjects</td></tr>";
	
	$qualperm=5;
	if($limitacao[0][$qualperm]==1) { $checked=" CHECKED=\"TRUE\""; }	else { $checked="";}
	$gerperm .= "<tr><td><INPUT NAME=\"gerperm$qualperm\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>$strSections<br>";
	
	$qualperm=6;
	if($limitacao[0][$qualperm]==1) { $checked=" CHECKED=\"TRUE\""; }	else { $checked="";}
	$gerperm .= "<INPUT NAME=\"gerperm$qualperm\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>$strPageSkins</td>";
	
	$qualperm=7;
	if($limitacao[0][$qualperm]==1) { $checked=" CHECKED=\"TRUE\""; }	else { $checked="";}
	$gerperm .= "<td><INPUT NAME=\"gerperm$qualperm\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>$strForms<br>";
	
	$qualperm=8;
	if($limitacao[0][$qualperm]==1) { $checked=" CHECKED=\"TRUE\""; }	else { $checked="";}
	$gerperm .= "<INPUT NAME=\"gerperm$qualperm\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>$strStaff</td></tr>";
	
	$qualperm=9;
	if($limitacao[0][$qualperm]==1) { $checked=" CHECKED=\"TRUE\""; }	else { $checked="";}
	$gerperm .= "<tr><td><INPUT NAME=\"gerperm$qualperm\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>$strUsers</td>";
	
	$qualperm=10;
	if($limitacao[0][$qualperm]==1) { $checked=" CHECKED=\"TRUE\""; }	else { $checked="";}
	$gerperm .= "<td><INPUT NAME=\"gerperm$qualperm\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>$strCreateCopy</td></tr>";

	$qualperm=11;
	if($limitacao[0][$qualperm]==1) { $checked=" CHECKED=\"TRUE\""; }	else { $checked="";}
	$gerperm .= "<tr><td><INPUT NAME=\"gerperm$qualperm\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>$strForum</td>";

	$qualperm=12;
        if($limitacao[0][$qualperm]==1) { $checked=" CHECKED=\"TRUE\""; }       else { $checked="";}
        $gerperm .= "<td><INPUT NAME=\"gerperm$qualperm\" TYPE=\"CHECKBOX\" VALUE=\"CHECKED\" $checked>$strCSS</td></tr></table>";

	
	$outputform .= "<br><table border=0><tr><td><b>Login</b></td><td><b>$strName</b></td><td><b>E-mail</b></td><td><b>Status</b></td><td><b>$strMayClass<br>$strArticlesAs</b></td></tr><tr>";
	$outputform .= "<FORM NAME=\"preferencias\" METHOD=\"post\">";
	$outputform .= "<INPUT NAME=\"id_new\" TYPE=\"hidden\" VALUE=\"$serial\">";
	$outputform .= "<td valign=top><INPUT NAME=\"login_new\" TYPE=\"text\" VALUE=\"$login\" size=6>";
	$outputform .= "</td><td valign=top><INPUT NAME=\"name_new\" TYPE=\"text\" VALUE=\"$name\" size=15>";
	$outputform .= "</td><td valign=top><INPUT NAME=\"email_new\" TYPE=\"text\" VALUE=\"$email\" size=15>";
	$outputform .= "</td><td valign=top><SELECT NAME=status_new>$options</SELECT>";
	$outputform .= "</td><td valign=top><SELECT NAME=areastatus_new>$options_topicos</SELECT></td></tr></table>";
	

	// captures http_get_vars and concatenates them in a string usable in a url	
	$get_vars="";
	reset ($HTTP_GET_VARS);
	while (list ($key, $val) = each ($HTTP_GET_VARS))
	{
		if ($get_vars == "") {$get_vars .= "$key=$val";}
		else { $get_vars .= "&"."$key=$val";}
	}
	
	
	$last_qualperm=-1;
	$last_headline=-1;
	$last_topic=-1;
	$string_checkbox_links ="";
	
	if($status==3)
	{
		$count_qualperm = $qualperm;
		
		if ($count_qualperm > 0)
		{
			$first_qualperm = 0;
			$last_qualperm = $first_qualperm + $count_qualperm-1;
			
			$string_checkbox_links ="<a href=\"javascript:void(null)\" onClick=\"select_all_chkboxes ('preferencias', $first_qualperm, $last_qualperm)\">$strSelectAll</a>&nbsp;|&nbsp;";
			$string_checkbox_links .="<a href=\"javascript:void(null)\" onClick=\"clear_all_chkboxes ('preferencias', $first_qualperm, $last_qualperm)\">$strClearAll</a>&nbsp;|&nbsp;";
			$string_checkbox_links .="<a href=\"javascript:void(null)\" onClick=\"undo ('preferencias', $first_qualperm, $last_qualperm)\">$strUndo</a>";
			
		}
		else
		{
			$last_qualperm=-1;
			$string_checkbox_links="";
		}
		
		
		$outputform .=box(	"0",
		"<center><b>$strDeniedTo</b></center>", 
		"$string_checkbox_links<br>$gerperm", 
		"","", 1);
	}
	
	if($status>1)
	{
		
		if ($count_headline>0)
		{ 
			$first_headline=$last_qualperm+1;
			$last_headline=$first_headline+$count_headline-1;
			
			$string_checkbox_links ="<a href=\"javascript:void(null)\" onClick=\"select_all_chkboxes ('preferencias', $first_headline, $last_headline)\">$strSelectAll</a>&nbsp;|&nbsp;";
			$string_checkbox_links .="<a href=\"javascript:void(null)\" onClick=\"clear_all_chkboxes ('preferencias', $first_headline, $last_headline)\">$strClearAll</a>&nbsp;|&nbsp;";
			$string_checkbox_links .="<a href=\"javascript:void(null)\" onClick=\"undo ('preferencias', $first_headline, $last_headline)\">$strUndo</a>";
			
		}
		else
		{
			$last_headline=$last_qualperm;
			$string_checkbox_links="";
		}
		
		
		
		$outputform .="<br>" . box(	"0",
		"<center><b>$strPageObjects: $strAcessDenied</b></center>", 
		"$string_checkbox_links<br>$headlineedit", 
		"","", 1);
	}
	
	
	
	if ($count_topic > 0)
	{ 
		$first_topic=$last_headline+1;
		$last_topic=$first_topic+$count_topic-1;
		
		$string_checkbox_links ="<a href=\"javascript:void(null)\" onClick=\"select_all_chkboxes ('preferencias', $first_topic, $last_topic)\">$strSelectAll</a>&nbsp;|&nbsp;";
		$string_checkbox_links .="<a href=\"javascript:void(null)\" onClick=\"clear_all_chkboxes ('preferencias', $first_topic, $last_topic)\">$strClearAll</a>&nbsp;|&nbsp;";
		$string_checkbox_links .="<a href=\"javascript:void(null)\" onClick=\"undo ('preferencias', $first_topic, $last_topic)\">$strUndo</a>";
		
	}
	else
	{
		$last_topic=$last_headline;
		$string_checkbox_links="";
	}
	
	
	$outputform .="<br>" . box(	"0",
	"<center><b>$strArticles: $strAcessDenied</b></center>", 
	"$string_checkbox_links<br>$topicedit", 
	"","", 1);
	
	
	$outputform .= "<table><tr><td valign=top align=right>";
	$outputform .= "<INPUT NAME=\"Gravar\" TYPE=\"submit\" VALUE=\"$strSave\">";
	$outputform .= "</FORM>";
	
	if (!($last_qualperm = 0 &&	$last_headline = 0 && $last_topic = 0))
	{
		$outputform .= "</td><td align=left>";
		$outputform .= "<FORM NAME=\"restore\" METHOD=\"post\" ACTION=\"staff_edit.php?$get_vars\">";
		$outputform .= "<INPUT NAME=\"Restore\" TYPE=\"submit\" VALUE=\"$strRestore\" >";	
		$outputform .= "</FORM>";
	}	
	
	$outputform .= "</td></tr></table>";
	
	
	print "<center><table width=0% border=0 cellpadding=20><tr><td width=50% valign=\"top\">";
	
	box(	"0",
	"<center><b>$strAcessEditor</b></center>", 
	"<center>$outputform</center>", 
	"");
	print "</td></tr></table></center>";
	
	
}
else
{
	print "STAFF: No connection to database";
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
recordsession_bo("staff_edit.php",$string,$_SERVER['REMOTE_USER'],$HTTP_USER_AGENT,$_SERVER['REMOTE_ADDR'],$datamining);

?>

<BODY>
</HTML>


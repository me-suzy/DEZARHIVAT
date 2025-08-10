<link rel="stylesheet" href="estilos.css" type="text/css">
<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/index.php
Last modified: 20010829

***************************************/ 
require "whoisthis_bo.php";
require_once "../config.php";
require "include/box.php";
require "../include/box.php";
require "./staff_details.php";
require "../include/strings.php";

$tema+=0;
#$author+="";


// Let's inform the user if the web server is not reading the .htaccess file at all
if(strlen($_SERVER['REMOTE_USER'])<1)
{
	print "Your web server is ignoring your .htaccess file. Please check your web server configuration.<br><br>";
	exit();
}

print "<table><tr><td valign=top class=texto>";

if($status>0) # level 1 interface
{	
	$artigos  = "<center><table><tr>";
	$artigos .= "<td nowrap><FORM NAME=\"pesquisa\" METHOD=\"get\"><input type=\"submit\" name=\"Submit\" value=\"$strList\"> |</td>";
	$artigos .= "<td nowrap class='links'> <a href=\"article_write.php\">$strNewM</a></td></tr></table><hr>";
	$artigos .= "<center><table><tr><td nowrap><center><INPUT NAME=\"listar\" TYPE=\"hidden\" VALUE=\"artigos\"><INPUT NAME=\"search\" TYPE=\"TEXT\" VALUE=\"$search\" SIZE=12></td></tr>";
	
	if($tema<=0)
	{
		$artigos .= "<tr><td><center><select name=\"tema\"><option value=\"0\" selected>$strAll</option>";
	}
	else
	{
		$artigos .= "<tr><td><center><select name=\"tema\"><option value=\"0\">$strAll</option>";
	}
	
	$topics_query=mysql_db_query("$projecto","SELECT serial,legenda from ARTICLEtopictxt ORDER by legenda", $dblink);
	
	if(!$topics_query)
	{
		print "Looks like you forgot to run <a href=setup.php>setup.php</a>... is this a fresh install?<br><bR>Either that or there is some serious trouble with your database. Either way please contact your systema administrator for help!<br><bR></td></tr></table>";
		exit;	
	}

	while($row = @mysql_fetch_object($topics_query))
	{
		$serial=	$row->serial;
		$legenda=	substr($row->legenda,0,25);
		
		if($tema==$serial)
		{
			$artigos .= "<option value=\"$serial\" selected>$legenda</option>";
		}
		else
		{
			$artigos .= "<option value=\"$serial\">$legenda</option>";
		}
		
	}
	
	
	$artigos .= "</select><br>";
	
	if($author<=0)
	{
		$artigos .= "<tr><td nowrap><center><select name=\"author\"><option value=\"\" selected>$strAll</option>";
	}
	else
	{
		$artigos .= "<tr><td nowrap><center><select name=\"author\"><option value=\"\">$strAll</option>";
	}
	
	$authors_query=mysql_db_query("$projecto","SELECT login from STAFFbase ORDER by login", $dblink);
	
	
	while($row = @mysql_fetch_object($authors_query))
	{
		$login = $row->login;
		
		if($author==$login)
		{
			$artigos .= "<option value=\"$login\" selected>$login</option>";
		}
		else
		{
			$artigos .= "<option value=\"$login\">$login</option>";
		}
		
	}
	
	
	$artigos .="</select>";
	
	if($status>1)
	{
		
		$artigos .= "<br><hr><select name=\"articles_edit\">";
		$artigos .= "<option>$strAll</option>";
		if($articles_edit==1)
		{
			$artigos .= "<option value=\"1\" selected>$strTo_be_Approved</option>";
			$artigos .= "<option value=\"2\">$strRemove</option>";
		}
		else
		{
			$artigos .= "<option value=\"1\">$strTo_be_Approved</option>";
			if($articles_edit==2)
			{
				$artigos .= "<option value=\"2\" selected>$strRemove</option>";
			}
			else
			{
				$artigos .= "<option value=\"2\">$strRemove</option>";
			}
		}
		$artigos .= "</select>";
		
		$artigos .="</center><hr><center><font class=texto2>$strFrom:
                <select name=\"data_ano1\" size=\"1\">
    		<option></option>
    		<option value=\"1990\">1990</option>
    		<option value=\"1991\">1991</option>
    		<option value=\"1992\">1992</option>
    		<option value=\"1993\">1993</option>
    		<option value=\"1994\">1994</option>
    		<option value=\"1995\">1995</option>
    		<option value=\"1996\">1996</option>
    		<option value=\"1997\">1997</option>
    		<option value=\"1998\">1998</option>
    		<option value=\"1999\">1999</option>
    		<option value=\"2000\">2000</option>
    		<option value=\"2001\">2001</option>
    		<option value=\"2002\">2002</option>
    		<option value=\"2003\">2003</option>
    		<option value=\"2204\">2004</option>
    		<option value=\"2205\">2005</option>
    		<option value=\"2006\">2006</option>
    		<option value=\"2007\">2007</option>
    		<option value=\"2008\">2008</option>
    		<option value=\"2009\">2009</option>
    		<option value=\"2010\">2010</option>
  		</select>
		
		<select name=\"data_mes1\">
    		<option></option>
    		<option value=\"1\">1</option>
    		<option value=\"2\">2</option>
    		<option value=\"3\">3</option>
    		<option value=\"4\">4</option>
    		<option value=\"5\">5</option>
    		<option value=\"6\">6</option>
    		<option value=\"7\">7</option>
    		<option value=\"8\">8</option>
    		<option value=\"9\">9</option>
    		<option value=\"10\">10</option>
    		<option value=\"11\">11</option>
    		<option value=\"12\">12</option>
  		</select>

		<select name=\"data_dia1\" size=\"1\">
	    <option></option>
	    <option value=\"1\">1</option>
	    <option value=\"2\">2</option>
	    <option value=\"3\">3</option>
	    <option value=\"4\">4</option>
	    <option value=\"5\">5</option>
	    <option value=\"6\">6</option>
	    <option value=\"7\">7</option>
	    <option value=\"8\">8</option>
	    <option value=\"9\">9</option>
	    <option value=\"10\">10</option>
	    <option value=\"11\">11</option>
	    <option value=\"12\">12</option>
	    <option value=\"13\">13</option>
	    <option value=\"14\">14</option>
	    <option value=\"15\">15</option>
	    <option value=\"16\">16</option>
	    <option value=\"17\">17</option>
	    <option value=\"18\">18</option>
	    <option value=\"19\">19</option>
	    <option value=\"20\">20</option>
	    <option value=\"21\">21</option>
	    <option value=\"22\">22</option>
	    <option value=\"23\">23</option>
	    <option value=\"24\">24</option>
	    <option value=\"25\">25</option>
	    <option value=\"26\">26</option>
	    <option value=\"27\">27</option>
	    <option value=\"28\">28</option>
	    <option value=\"29\">29</option>
	    <option value=\"30\">30</option>
	    <option value=\"31\">31</option>
	</select><br><br>

$strToA: <select name=\"data_ano2\" size=\"1\">
    <option></option>
    <option value=\"1990\">1990</option>
    <option value=\"1991\">1991</option>
    <option value=\"1992\">1992</option>
    <option value=\"1993\">1993</option>
    <option value=\"1994\">1994</option>
    <option value=\"1995\">1995</option>
    <option value=\"1996\">1996</option>
    <option value=\"1997\">1997</option>
    <option value=\"1998\">1998</option>
    <option value=\"1999\">1999</option>
    <option value=\"2000\">2000</option>
    <option value=\"2001\">2001</option>
    <option value=\"2002\">2002</option>
    <option value=\"2003\">2003</option>
    <option value=\"2204\">2004</option>
    <option value=\"2205\">2005</option>
    <option value=\"2006\">2006</option>
    <option value=\"2007\">2007</option>
    <option value=\"2008\">2008</option>
    <option value=\"2009\">2009</option>
    <option value=\"2010\">2010</option>
  </select>
		
		<select name=\"data_mes2\">
    	<option></option>
    	<option value=\"1\">1</option>
    	<option value=\"2\">2</option>
    	<option value=\"3\">3</option>
    	<option value=\"4\">4</option>
    	<option value=\"5\">5</option>
    	<option value=\"6\">6</option>
    	<option value=\"7\">7</option>
    	<option value=\"8\">8</option>
    	<option value=\"9\">9</option>
    	<option value=\"10\">10</option>
    	<option value=\"11\">11</option>
    	<option value=\"12\">12</option>
  	</select>



	<select name=\"data_dia2\" size=\"1\">
    <option></option>
    <option value=\"1\">1</option>
    <option value=\"2\">2</option>
    <option value=\"3\">3</option>
    <option value=\"4\">4</option>
    <option value=\"5\">5</option>
    <option value=\"6\">6</option>
    <option value=\"7\">7</option>
    <option value=\"8\">8</option>
    <option value=\"9\">9</option>
    <option value=\"10\">10</option>
    <option value=\"11\">11</option>
    <option value=\"12\">12</option>
    <option value=\"13\">13</option>
    <option value=\"14\">14</option>
    <option value=\"15\">15</option>
    <option value=\"16\">16</option>
    <option value=\"17\">17</option>
    <option value=\"18\">18</option>
    <option value=\"19\">19</option>
    <option value=\"20\">20</option>
    <option value=\"21\">21</option>
    <option value=\"22\">22</option>
    <option value=\"23\">23</option>
    <option value=\"24\">24</option>
    <option value=\"25\">25</option>
    <option value=\"26\">26</option>
    <option value=\"27\">27</option>
    <option value=\"28\">28</option>
    <option value=\"29\">29</option>
    <option value=\"30\">30</option>
    <option value=\"31\">31</option>
	</select>";


	}
	
	$artigos .="</center></form></td></tr></table>";          
	
		
	$comentarios = "<FORM NAME=\"pesquisa_pubcom\" METHOD=\"get\"><center><table><tr>";
	$comentarios .= "<td nowrap><center><font class=texto2>$strPubcomSearch:</font></center></td></tr>";
	$comentarios .="<tr><td><center><INPUT NAME=\"listar\" TYPE=\"hidden\" VALUE=\"comentarios\"><INPUT NAME=\"search\" TYPE=\"TEXT\" VALUE=\"$search\" SIZE=12></center></td></tr>";
	$comentarios .= "\n<tr><td><center><select name=\"quais\">";
	$comentarios .= "\n<option value=\"aprovados\" ";
	if ($quais=="aprovados") $comentarios .="selected";	
	$comentarios .=">$strApprovedPl";
	$comentarios .= "\n<option value=\"pendentes\" ";
	if ($quais=="pendentes" || $quais=="") $comentarios .="selected";	
	$comentarios .=">$strTo_be_Approved";
	$comentarios .= "\n</select></center></td></tr>";
	$comentarios .= "\n<tr><td>&nbsp;</td></tr>";
	$comentarios .= "\n<tr><td><center><input type=\"submit\" name=\"Submit\" value=\"$strList\">&nbsp;";
	$comentarios .= "\n<select name=\"paginacao\">";
	$comentarios .= "\n<option value=\"10\" ";
	if ($paginacao=="10" || $paginacao=="") $comentarios .="selected";
	$comentarios .="selected>10 $strPer $strPage";
	$comentarios .= "\n<option value=\"25\" ";
	if ($paginacao=="25") $comentarios .="selected";
	$comentarios .=">25 $strPer $strPage";
	$comentarios .= "\n<option value=\"50\" ";
	if ($paginacao=="50") $comentarios.="selected";
	$comentarios .=">50 $strPer $strPage";
	$comentarios .= "\n</select>&nbsp;&nbsp;";	
	$comentarios .= "</center></td></tr></table></center></form>";
		
	$cachecontrol  = "<a href=\"index.php?listar=cache\" class='links'>$strCacheDelete</a>";
	$cachecontrol .= "<br><a href=\"index.php?listar=cache&remover=tudo\" class='links'>$strCacheAllDelete</a>";
	
	$jornalista  = "<center><table><tr><td>";
	$jornalista .= bobox("<font class=texto2><center>$strArticles</center></font>", "$artigos", 2, "$BOSIMPLE");
	$jornalista .= "</td></tr><tr><td>";
	$jornalista .= bobox("<font class=texto2><center>$strComments</center></font>", "$comentarios", 2, "$BOSIMPLE");
	$jornalista .= "</td></tr><tr><td>";
	$jornalista .= bobox("<font class=texto2><center>$strCaches</center></font>", "$cachecontrol", 2, "$BOSIMPLE");
	$jornalista .= "</td></tr></table></center>";
	
	print bobox("<b><center><font class='texto'>$strJournalists</font></center></b>", "$jornalista", "", "$BOSIMPLE");
	print "<br>";
}

if($status>1) # level 2 interface
{
	
	if($limitacao[0][10]==0)
	{                               
		$headlines  = "<a href=\"index.php?listar=capas\" class=links>$strEdit</a> | <a href=\"object_edit.php\" class=links>$strNewM</a>";
		
	}
	else
	{
		$headlines  = "<table><tr><td><a href=\"index.php?listar=capas\" class='links'>$strEdit</a></td></tr></table>";
	}
	
	$users  = "<a href=\"users/\" class=links>$strEdit</a>";
	
	$sondagens   = "<a href=\"surveys\" class=links>$strEdit</a>";
	
	$editor  = "<center><table><tr><td>";
	$editor .= bobox("<font class=texto2><center>$strPageObjects</center></font>", "$headlines", 2, "$BOSIMPLE");
	$editor .= "</td></tr><tr><td>";
	$editor .= "</td></tr><tr><td>";
	$editor .= bobox("<font class=texto2><center>$strOpinionPool</center></font>", "$sondagens", 2, "$BOSIMPLE");
	$editor .= "</td></tr><tr><td>";
	$editor .= bobox("<font class=texto2><center>$strUsers</center></font>", "$users", 2, "$BOSIMPLE");
	$editor .= "</td></tr></table></center>";
	
	print bobox("<b><font class=texto><center>$strPublishers</center></font></b>", "$editor", "", "$BOSIMPLE");
	print "<br>";
}

print "</td><td width=100% valign=top>";


$about+=0;
if($about)
{
	
	print"<table width=100% cellspacing=0 cellpadding=20 border=1><tr><td valign=top>";
	include"about.html";
	print"</td></tr></table>";
}


# List new notes for the user
if(strlen($listar)<1)
{
	if($query=mysql_db_query("$projecto","SELECT id, date, author, subject, received from notes WHERE recipient_id=$user_id AND recipient_type='u' AND received=0 ORDER BY date DESC", $dblink));
	{
		
		$content_output = "<div align=\"right\"><i>$strInbox</i></div><hr>";
		
		
		if($query)
		{
			while($row = mysql_fetch_object($query))
			{
				$note_id =     	$row -> id;
				$note_date = 	$row -> date;
				$note_author =	$row -> author;
				$note_subject = 	substr($row -> subject,0,50);
				$note_received = 	$row -> received;
				
				
				$query_author = mysql_db_query("$projecto","SELECT login from STAFFbase WHERE id=$note_author", $dblink);
				
				if($row = mysql_fetch_object($query_author))
				{
					$note_author = $row -> login;
				}		
				
				
				if($note_received == 0)
				{
					$content_output .= '<font color="#990000"><b>';	
				}
				else
				{
					$content_output .= '<font color="#000000">';
				}
				
				$content_output .= $note_author . ' | ' . $note_subject . ' | ' . $note_date . ' </b></font>';	
				
				$content_output .= '<a href="notes.php?param=view&id=' . $note_id . "\">($strView)</a>&nbsp;&nbsp;&nbsp;<a href=\"notes.php?param=rm&id=" . $note_id . "\">($strToDelete)</a><br><br>";
				
				print $content_output;
			}
		}	
		
	}
}


if($listar=='forum')
{
        if($apagarforum>0)
        {
                mysql_db_query("$projecto", "DELETE from ARTICLEforum WHERE serial=$apagarforum", $dblink);
        }



        if($copiarforum>0)
        {

                if($result=mysql_db_query("$projecto", "SELECT * from ARTICLEforum WHERE serial=$copiarforum", $dblink))
                {
                        while($row = mysql_fetch_object($result))
                        {
                                $name=                		 $row->name;
                                $max_points=                	 $row->max_points;
                                $min_points=                     $row->min_points;
				$max_class =                     $row->max_class;
				$min_class =                     $row->min_class;
				$expiration_date=                $row->expiration_date;
				$archive=                        $row->archive;
				$total_posts=                    $row->total_posts;
				$points_post=			 $row->points_post;

                                mysql_db_query("$projecto", "INSERT into ARTICLEforum SET
                                name='$name',
                                max_points='$max_points',
                                min_points='$min_points',
				max_class='$max_class',
				min_class='$min_class',
				expiration_date='$expiration_date',
				archive='$archive',
				total_posts='$total_posts',
				points_post='$points_post'
                                ", $dblink);
                        }
                }
        }

        if($result=mysql_db_query("$projecto", "SELECT * from ARTICLEforum ORDER BY name", $dblink))
        {
                $output .="<table>";
                while($row = mysql_fetch_object($result))
                {
                        $serial=			$row->serial;
			$name=                           $row->name;

                        if(strlen($name)<1)    {       $title="$strUnnamed";   }

                        $output .= "<tr><td align=right nowrap>$serial </td><td><a href=\"forum_edit.php?serial=$serial\">$name</a></td nowrap><td>$type</td><td width=1% align=right><a href=\"index.php?listar=forum&copiarforum=$serial\">$strCopy</a></td><td nowrap width=1% align=right> | <a href=\"index.php?listar=forum&apagarforum=$serial\">$strRemove</a></td></tr>";
                }
                $output .="</table>";

        }

        box("0","","<center>$output</center>");
}




if($listar=='forms')
{
	if($apagarform>0)
	{
		mysql_db_query("$projecto", "DELETE from ARTICLEpubcomforms WHERE serial=$apagarform", $dblink);
	}
	
	
	
	if($copiarform>0)
	{
		
		if($result=mysql_db_query("$projecto", "SELECT * from ARTICLEpubcomforms WHERE serial=$copiarform", $dblink))
		{
			while($row = mysql_fetch_object($result))		
			{
				$title=			$row->title;
				$form=			$row->form;  				
				$type_form=			$row->type;
				
				mysql_db_query("$projecto", "INSERT into ARTICLEpubcomforms SET 
				title='$title', 
				form='$form',
				type='$type_form'
				", $dblink);
			}
		}
	}
	
	if($result=mysql_db_query("$projecto", "SELECT * from ARTICLEpubcomforms ORDER BY title", $dblink))
	{
		$output .="<table>";
		while($row = mysql_fetch_object($result))		
		{
			$title=	$row->title;
			$serial=	$row->serial;
			$type=	$row->type;
			
			if(strlen($title)<1)	{	$title="$strUnnamed";	}		
			
			$output .= "<tr><td align=right nowrap>$serial </td><td><a href=\"form.php?serial=$serial\">$title</a></td nowrap><td>$type</td><td width=1% align=right><a href=\"index.php?listar=forms&copiarform=$serial&type=$type\">$strCopy</a></td><td nowrap width=1% align=right> | <a href=\"index.php?listar=forms&apagarform=$serial&type=$type\">$strRemove</a></td></tr>";
		}
		$output .="</table>";
		
	}
	
	box("0","","<center>$output</center>");
}


if($listar=="cache" && $status>0)
{
	if(strlen($remover)>0)
	{
		$remover=ereg_replace("\.", "", $remover);
		$remover=ereg_replace(" ", "", $remover);
		$remover=ereg_replace("'", "", $remover);
		$remover=ereg_replace("/", "", $remover);
		
		if($remover=="tudo")
		{
			$dir=opendir("$pathtodm" . "cache/");
			while($file=readdir($dir))
			{
				if(!ereg("^\.", $file))
				{
					unlink("$pathtodm" . "cache/$file");
					print "<b>$file</b> deleted...<br>";
				}
			}
			closedir($dir);
		}
		else
		{
			unlink("$pathtodm" . "cache/$remover");		
		}
	}
	
	$dir=opendir("$pathtodm" . "cache/");
	while($file=readdir($dir))
	{                                                                                     
		if(!ereg("^\.", $file))
		{
			$output .= "<a href=\"index.php?listar=cache&remover=$file\">$file</a><br>";
		}
	}
	
	box("0","","$output");
}


if($listar=="staff" && $status>2 && $limitacao[0][8]==0)
{
	if(strlen($apagarstaffnome)>0)
	{
		mysql_db_query("$projecto", "DELETE from STAFFbase WHERE login like '$apagarstaffnome'", $dblink);
		mysql_db_query("$projecto", "DELETE from STAFFdetails WHERE login like '$apagarstaffnome'", $dblink);
	}
	
	if($result=mysql_db_query("$projecto", "SELECT login,id from STAFFbase ORDER BY login asc", $dblink))
	{
		$output .="<table width=100%>";
		while($row = mysql_fetch_object($result))		
		{
			$login=	$row->login;
			$id=	$row->id;
			
			if(strlen($login)<1)
			{
				$login="$strUnnamed";
				$output .= "<tr><td width=80%><a href=\"staff_edit.php?id=$id\">$login</a></td nowrap><td nowrap>-</td></tr>";
			}
			else
			{
				$output .= "<tr><td width=80%><a href=\"staff_edit.php?id=$id\">$login</a></td nowrap><td nowrap><a href=\"index.php?listar=staff&apagarstaffnome=$login\">$strRemove</a></td></tr>";
			}
			
		}
		$output .="</table>";
	}
	
	box("0","","<center>$output</center>");
}


if($listar=="css" && $status>2 && $limitacao[0][12]==0)
{
        $file_id+=0;

        if($file_id)
        {

                if($apagarcss>0)
                {
                        mysql_db_query("$projecto", "DELETE from css WHERE id=$apagarcss", $dblink);
                }

                if($copiarcss>0)
                {

                        if($result=mysql_db_query("$projecto", "SELECT * from css WHERE id=$copiarcss", $dblink))
                        {
                                while($row = mysql_fetch_object($result))
                                {
                                        $name=$row->name;
                                        $instance=$row->instance;
                                        $file_id=$row->file;
                                        $weight=$row->weight;
                                        $size=$row->size;
                                        $size_units=$row->size_units;
                                        $text_trans=$row->text_trans;
                                        $color=$row->color;
                                        $style=$row->style;
                                        $family=$row->family;
                                        $background=$row->background;
                                        $decoration=$row->decoration;
                                        $height=$row->height;
                                        $height_units->height_units;
					$text=$row->text;



                                mysql_db_query("$projecto", "INSERT into css SET
                                name='$name',
                                instance='$instance',
                                file='$file_id',
                                weight='$weight',
                                size=$size,
                                size_units='$size_units',
                                text_trans='$text_trans',
                                color='$color',
                                style='$style',
                                family='$family',
                                background='$background',
                                decoration='$decoration',
                                height=$height,
                                height_units='$height_units',
                                text='$text'", $dblink);

                                }
                        }
                }


		 if($result=mysql_db_query("$projecto", "SELECT * from css where file=$file_id ORDER BY name asc", $dblink))
                {
                        $output.="<center><a href=css_edit.php?file_id=$file_id>$strNewCSS</a>
 | <a href=index.php?listar=prev_all_css&file_id=$file_id>$strPreviewAllCSS</a></center><br>";
                        $output .="<table>";

                        while($row = mysql_fetch_object($result))
                        {
                                $name=$row->name;
                                $id=        $row->id;
                                $output .= "<tr><td align=right nowrap>$id </td><td width=80%>
<a href=\"css_edit.php?id=$id\">$name</a></td><td nowrap>
<a href=\"index.php?listar=css&copiarcss=$id&file_id=$file_id\">$strCopy
</a></td><td nowrap> | <a href=\"index.php?listar=css&apagarcss=$id&file_id=$file_id\">$strRemove</a></td></tr>";

                        }
                        $output .="</table>";
                }


                box("0","","<center>$output</center>");


        }
        else
        {
                $result=mysql_db_query("$projecto","SELECT * from css_files", $dblink);

                print"<center><br>";

                while( $row=mysql_fetch_object($result) )
                {
                        $id=$row->id;
                        $name=$row->name;

                        print"<a href=index.php?listar=css&file_id=$id>$name.css</a><br>";
                }
                print"</center>";

        }



}





if($listar=="prev_all_css" && $status>2 && $limitacao[0][12]==0)
{
        print"<center><br><br>";
        if($result=mysql_db_query("$projecto", "SELECT * from css where file=$file_id ORDER BY name", $dblink))
        {



                        while($row = mysql_fetch_object($result))
                        {
                                $id=$row->id;
                                $name=$row->name;
                                $instance=$row->instance;
                                $file_id=$row->file;
                                $weight=$row->weight;
                                $size=$row->size;
                                $size_units=$row->size_units;
                                $text_trans=$row->text_trans;
                                $color=$row->color;
                                $style=$row->style;
                                $family=$row->family;
                                $background=$row->background;
                                $decoration=$row->decoration;
                                $height=$row->height;
				$height_units->height_units;
                                $text=$row->text;

                                print"<style type=\"text/css\"><!--";
                                print"$name";
                                if($instance)print":$instance";
                                print"{";
                                if($color)print"color:$color;";
                                if($size)print"font-size:$size $size_units;";
                                if($weight!="none")print"font-weight:$weight;";
                                if($text_trans!="none")print"text-transform:$text_trans;";
                                if($style!="none")print"font-style:$style;";
                                if($family!="none")print"font-family:$family;";
                                if($background)print"background-color:$background;";
                                print"text-decoration:$decoration;";
                                if($height)print"height:$height$height_units;";

                                if($text!="")
                                {
                                        print"$text";
                                }

                                print"}";
                                print"--></style>";
                                $temp_name=ereg_replace("\.","",$name);
 
                                if($instance)
                                {
                                        print"<a href=# class=$temp_name>$temp_name</a><br>";

                                }
                                else
                                {
                                        print"<span class=$temp_name>$temp_name</span><br>";
                                }
                       }

        }

        print"</center>";
}








if($listar=="boxskins" && $status>2 && $limitacao[0][1]==0)
{
	if($apagarboxskin>0)
	{
		mysql_db_query("$projecto", "DELETE from BOXbase WHERE id=$apagarboxskin", $dblink);
	}
	
	if($copiarboxskin>0)
	{
		
		if($result=mysql_db_query("$projecto", "SELECT * from BOXbase WHERE id=$copiarboxskin", $dblink))
		{
			while($row = mysql_fetch_object($result))		
			{
				$title=			$row->title;
				$id=			$row->id;
				$color_border=		$row->color_border;
				$color_header=		$row->color_header;
				$color_content=		$row->color_content;
				$color_footer=		$row->color_footer;
				$size_border=		$row->size_border;
				$dist_border=		$row->dist_border;
				$image_top_left=	$row->image_top_left;
				$image_top_right=	$row->image_top_right;
				$image_top_row=		$row->image_top_row;
				$image_bot_left=	$row->image_bot_left;
				$image_bot_right=	$row->image_bot_right;
				$image_bot_row=		$row->image_bot_row;
				$image_right=		$row->image_right;
				$image_left=		$row->image_left;  				
				
				mysql_db_query("$projecto", "INSERT into BOXbase SET 
				title='$title', 
				color_border='$color_border',
				color_header='$color_header',
				color_content='$color_content',
				color_footer='$color_footer',
				size_border='$size_border',
				dist_border='$dist_border',
				image_top_left='$image_top_left',
				image_top_right='$image_top_right',
				image_top_row='$image_top_row',
				image_bot_left='$image_bot_left',
				image_bot_right='$image_bot_right',
				image_bot_row='$image_bot_row',
				image_right='$image_right',
				image_left='$image_left'", $dblink);
			}
		}
	}
	
	if($result=mysql_db_query("$projecto", "SELECT id,title from BOXbase ORDER BY title asc", $dblink))
	{
		$output .="<table>";
		while($row = mysql_fetch_object($result))		
		{
			$title=	$row->title;
			$id=	$row->id;
			
			$output .= "<tr><td align=right nowrap>$id </td><td width=80%><a href=\"boxskins_edit.php?id=$id\">$title</a></td nowrap><td><a href=\"index.php?listar=boxskins&copiarboxskin=$id\">$strCopy</a></td><td nowrap> | <a href=\"index.php?listar=boxskins&apagarboxskin=$id\">$strRemove</a></td></tr>";
		}
		$output .="</table>";
	}
	
	box("0","","<center>$output</center>");
}


if($listar=="boxlayout" && $status>2 && $limitacao[0][2]==0)
{
	if($apagarboxlayout>0)
	{
		mysql_db_query("$projecto", "DELETE from ARTICLEboxsetup WHERE serial=$apagarboxlayout", $dblink);
	}
	
	if($copiarboxlayout>0)
	{
		
		if($result=mysql_db_query("$projecto", "SELECT * from ARTICLEboxsetup WHERE serial=$copiarboxlayout", $dblink))
		{
			while($row = mysql_fetch_object($result))		
			{
				$legenda=			$row->legenda;
				$serial=			$row->serial;
				$title_area=            $row->title_area;
				$header_area=           $row->header_area;
				$content_area=          $row->content_area;
				$footer_area=           $row->footer_area;
				
				mysql_db_query("$projecto", "INSERT into ARTICLEboxsetup SET 
				legenda='$legenda', 
				title_area='$title_area',
				header_area='$header_area',
				content_area='$content_area',
				footer_area='$footer_area'", $dblink);
			}
		}
	}
	
	if($result=mysql_db_query("$projecto", "SELECT serial,legenda from ARTICLEboxsetup ORDER BY legenda asc", $dblink))
	{
		$output .="<table>";
		while($row = mysql_fetch_object($result))		
		{
			$legenda=	$row->legenda;
			$serial=	$row->serial;
			
			$output .= "<tr><td align=right nowrap>$serial </td><td width=80%><a href=\"boxlayout_edit.php?id=$serial\">$legenda</a></td><td nowrap><a href=\"index.php?listar=boxlayout&copiarboxlayout=$serial\">$strCopy</a></td><td nowrap> | <a href=\"index.php?listar=boxlayout&apagarboxlayout=$serial\">$strRemove</a></td></tr>";
		}
		$output .="</table>";
	}
	
	box("0","","<center>$output</center>");
}

if($listar=="capas" && $status>1)
{
	if($apagarcapa>0 && $limitacao[0][10]==0 && $status>2)
	{
		mysql_db_query("$projecto", "DELETE from HEADLINEbase WHERE id=$apagarcapa", $dblink);
	}
	
	if($copiarcapa>0 && $limitacao[0][10]==0 && $status>2)
	{
		
		if($result=mysql_db_query("$projecto", "SELECT * from HEADLINEbase WHERE id=$copiarcapa", $dblink))
		{
			while($row = mysql_fetch_object($result))		
			{
				$title=		$row -> title;
				$id=		$row -> id;
				$content= 	$row -> content;
				
				mysql_db_query("$projecto", "INSERT into HEADLINEbase SET title='$title', content='$content'", $dblink);
			}
		}
	}
	
	if($result=mysql_db_query("$projecto", "SELECT id,title from HEADLINEbase ORDER BY title asc", $dblink))
	{
		$output .="<table>";
		while($row = mysql_fetch_object($result))		
		{
			$title=	$row -> title;
			$id=	$row -> id;
			
			if($limitacao[0][10]==0 && $status>2)
			{
				if($limitacao[3][$id]==0)
				{
					$output .= "<tr><td align=right nowrap>$id </td><td width=80%><a href=\"object_edit.php?id=$id\">$title</a></td><td nowrap><a href=\"index.php?listar=capas&copiarcapa=$id\">$strCopy</a></td><td nowrap> | <a href=\"index.php?listar=capas&apagarcapa=$id\">$strRemove</a></td></tr>";
				}
				else
				{
					$output .= "<tr><td align=right nowrap>$id </td><td width=80%>$title</td><td nowrap>$strCopy</td><td nowrap> | $strRemove</td></tr>";
				}
			}
			else
			{
				if($limitacao[3][$id]==0)
				{
					$output .= "<tr><td align=right nowrap>$id </td><td width=80%><a href=\"object_edit.php?id=$id\">$title</a></td></tr>";
				}
				else
				{
					$output .= "<tr><td align=right nowrap>$id </td><td nowrap>$title</td></tr>";
				}
			}
		}
		$output .="</table>";
	}
	
	box("0","","<center>$output</center>");
}


if($listar=="apagar" && $status>1)
{
	if($apagar_artigo>0)
	{
#
# Delete the article
#
		
		mysql_db_query("$projecto","DELETE from ARTICLEbase 
		WHERE serial=$apagar_artigo", $dblink);
		
		mysql_db_query("$projecto","DELETE from ARTICLEcontent 
		WHERE artigo=$apagar_artigo", $dblink);
		
		mysql_db_query("$projecto","DELETE from ARTICLEtopic 
		WHERE article=$apagar_artigo", $dblink);
		
		mysql_db_query("$projecto","DELETE from ARTICLEkeywords 
		WHERE article=$apagar_artigo", $dblink);
	}
	
	$listar="artigos";
	$articles_edit=2;
	
	
}

if($listar=="artigos")
{
	$page +=0;
	$paginacao=20;
	
	$filtro="";


	#security

	$data_ano1+=0;
	$data_mes1+=0;
	$data_dia1+=0;
	$data_ano2+=0;
	$data_mes2+=0;
	$data_dia2+=0;

	
	if($tema>0)
	{
		$filtro = " LEFT JOIN ARTICLEtopic ON ARTICLEtopic.article=ARTICLEbase.serial ";
	}
	
	if($author!="")
	{
		$filtro .= " LEFT JOIN STAFFbase ON ARTICLEbase.submited_by=STAFFbase.login ";
	}
	
	if($articles_edit>0 && $status>1)
	{
		$filtro.="WHERE ARTICLEbase.aprovado<=0";
	}
	
	if(strlen($search)>0)
	{
		if($search>0)
		{
			if($articles_edit>0)
			{
				$filtro.=" AND ARTICLEbase.serial=$search";
			}
			else
			{
				$filtro.=" WHERE ARTICLEbase.serial=$search";
			}
		}
		else
		{
			if($articles_edit>0)
			{
				$filtro.=" AND ARTICLEbase.title like '%$search%'";
			}
			else
			{
				$filtro.=" WHERE ARTICLEbase.title like '%$search%'";
			}
		}
		
		if($tema>0)
		{
			$filtro.=" AND ARTICLEtopic.topic=$tema";     
		}  
		
		if($author!="")
		{
			$filtro.=" AND ARTICLEbase.submited_by=\"$author\"";     
		}  
		

		if ($data_ano1 && $data_mes1 && $data_dia1)
                {

                        $data1=$data_ano1."-".$data_mes1."-".$data_dia1;


                        if ( !$data_ano2 && !$data_mes2 && !$data_dia2 )
                        {

                                $filtro.=" AND date_format(ARTICLEbase.submission_on,'%Y-%m-%d') = date_format('$data1','%Y-%m-%d')";
                        }
                        else
                        {
                                $data2=$data_ano2."-".$data_mes2."-".$data_dia2;

                                $filtro.=" AND date_format(ARTICLEbase.submission_on,'%Y-%m-%d') >= date_format('$data1','%Y-%m-%d')
                                        AND date_format(ARTICLEbase.submission_on,'%Y-%m-%d') <= date_format('$data2','%Y-%m-%d')";
                        }

                }



	}
	else
	{
		
		if($tema>0)
		{
			
			if($articles_edit>0)
			{
				$filtro .= " AND ";
			}
			else
			{
				$filtro .= " WHERE ";
			}
			
			
			$filtro.="ARTICLEtopic.topic=$tema";
			
		}
		
		if($author!="")
		{
			if($tema>0 OR $articles_edit>0)
			{
				$filtro .= " AND ";
			}
			else
			{
				$filtro .= " WHERE ";
			}
			
			$filtro.="ARTICLEbase.submited_by=\"$author\"";
		}
		
		

		if ($data_ano1 && $data_mes1 && $data_dia1)
                {
                        if($tema>0 OR $articles_edit>0 OR $author != "")
                        {
                                $filtro .= " AND ";
                        }
                        else
                        {
                                $filtro .= " WHERE ";
                        }

                        $data1=$data_ano1."-".$data_mes1."-".$data_dia1;


                        if ( !$data_ano2 && !$data_mes2 && !$data_dia2 )
                        {

                                $filtro.="date_format(ARTICLEbase.submission_on,'%Y-%m-%d') = date_format('$data1','%Y-%m-%d')";
                        }
                        else
                        {
                                $data2=$data_ano2."-".$data_mes2."-".$data_dia2;

                                $filtro.="date_format(ARTICLEbase.submission_on,'%Y-%m-%d') >= date_format('$data1','%Y-%m-%d') 
					AND date_format(ARTICLEbase.submission_on,'%Y-%m-%d') <= date_format('$data2','%Y-%m-%d')";
                        }

                }


	}
	
	$startitem=$page*$paginacao;	
	
	if($contaosditos=mysql_db_query("$projecto", 
	"SELECT count(ARTICLEbase.serial) from ARTICLEbase $filtro", $dblink))
	{
		$row = mysql_fetch_array($contaosditos);
		$quantos = $row[0];
	}
	
	if($result=mysql_db_query("$projecto", 
	"SELECT ARTICLEbase.* from ARTICLEbase $filtro 
	ORDER BY lastchanged DESC
	LIMIT $startitem,$paginacao", $dblink))
	{
		$pagecur=$page+1;
		$output .= "<div align=right><b>$pagecur</b></div>";
		
		if($articles_edit<2)
		{
			while($row = mysql_fetch_object($result))		
			{
				$title		=$row -> title;
				$serial		=$row -> serial;
				$submited_by	=$row -> submited_by;
				$submission_on	=$row -> submission_on;
				$lastchanged	=$row -> lastchanged;
				$approved_by	=$row -> approved_by;
				$approval_on	=$row -> approval_on;
				$aprovado	=$row -> aprovado;
				
				if(strlen($title)==0) {$title="Untitled";}
				
				$output .= "($serial) <a href=\"article_write.php?id=$serial\"><b>$title</b></a>";
				$output .= "<small><br>$strFrom $submited_by ($submission_on -> $lastchanged)</small>";
				if($aprovado > 0)
				{
					$output .= "<small><br>$strApprovedBy $approved_by ($approval_on)</small>"; 
				}
				else
				{
					$output .= "<small><br>$strTo_be_Approved ...</small>";
				}
				
				$output .= "<br><br>";
			}
		}
		else
		{
			while($row = mysql_fetch_object($result))		
			{
				$title		=$row -> title;
				$serial		=$row -> serial;
				$output .= "<FORM NAME=\"apagar\" METHOD=\"get\"><INPUT NAME=\"listar\" TYPE=\"hidden\" VALUE=\"apagar\"><INPUT NAME=\"apagar_artigo\" TYPE=\"hidden\" VALUE=\"$serial\"><INPUT NAME=\"Remover\" TYPE=\"submit\" VALUE=\"$strRemove\"> ........ ($serial) <b>$title</b></form>";
				$output .= "<br>";
			}
		}
		
		$output .= "<center>";
		
                if($page>0)
                {
                        $pageant = $page-1;
                        $output .= "<a href=\"index.php?listar=artigos&page=$pageant&quais=$quais&tema=$tema&search=$search&data_ano1=$data_ano1&data_mes1=$data_mes1&data_dia1=$data_dia1&data_ano2=$data_ano2&data_mes2=$data_mes2&data_dia2=$data_dia2\">$strPrevious</a> |";
                }
                else
                {
                        $output .= "$strPrevious | ";
                }

                if( ($page+1)*$paginacao<=$quantos )
                {
                        $pagepos = $page+1;
                        $pagelast = $quantos/$paginacao-1;
                        $output .= "<a href=\"index.php?listar=artigos&page=$pagepos&quais=$quais&tema=$tema&search=$search&data_ano1=$data_ano1&data_mes1=$data_mes1&data_dia1=$data_dia1&data_ano2=$data_ano2&data_mes2=$data_mes2&data_dia2=$data_dia2\">$strNext</a>";
                }
                else
                {
                        $output .= "$strNext";
                }


		$output .= "</center>";
	}
	
	box("0","","$output");
}

/*
if($aprovpubcom>0)
{
	$result=mysql_db_query("$projecto", 
	"UPDATE ARTICLEpubcom 
	SET aprovado=1,
	approval_on=now(),
	approved_by='$_SERVER[REMOTE_USER]'
	where serial=$aprovpubcom", $dblink);
}

if($desaprovpubcom>0)
{
	$result=mysql_db_query("$projecto", 
	"UPDATE ARTICLEpubcom 
	SET aprovado=0
	where serial=$desaprovpubcom", $dblink);
}

if($deletepubcom>0)
{
	$result=mysql_db_query("$projecto",
	"DELETE from ARTICLEpubcom
	where serial=$deletepubcom", $dblink);
}

*/

if($pubcomalterid>0 && $status>1)
{
	$pubcomaltertext=addslashes($pubcomaltertext);
	
	$result=mysql_db_query("$projecto",
	"UPDATE ARTICLEpubcom
	SET texto='$pubcomaltertext'
	where serial=$pubcomalterid", $dblink);
}


while (list ($key, $val) = each ($HTTP_POST_VARS))
	{
		$query="";
		
		if (ereg("disapprove_",$key) && $val=="on")
		{
			$serial=ereg_replace("disapprove_","",$key);
			$query="UPDATE ARTICLEpubcom SET aprovado=0 where serial=$serial";
		}

		else if (ereg("approve_",$key) && $val=="on")
		{
			$serial=ereg_replace("approve_","",$key);
			$query="UPDATE ARTICLEpubcom SET aprovado=1, approval_on=now(), approved_by='$_SERVER[REMOTE_USER]' where serial=$serial";
		}
		
		else if (ereg("delete_",$key) && $val=="on")
		{
			$serial=ereg_replace("delete_","",$key);
			$query="DELETE from ARTICLEpubcom where serial=$serial";
		}

		if ($query!="")	$result=mysql_db_query("$projecto", "$query", $dblink);
                 
		if (ereg("pc_class_",$key)) 
                { 
                           $serial=ereg_replace("pc_class_","",$key); 
                           $result=mysql_db_query("$projecto", " 
                           UPDATE ARTICLEpubcom SET class=$val 
                           WHERE serial=$serial", $dblink); 
                }  

		



	}



if($listar=="comentarios")
{
	$page +=0;
	if ($paginacao)
	{
		$paginacao+=0;
	}
	else
	{
		$paginacao=10;
	}
	
	$startitem=$page*$paginacao;
		
		
	if ($order_by=="submission_onASC")
	{
		$query_order_by="submission_on ASC";
	}
	else
	{
		$order_by="submission_onDESC";
		$query_order_by="submission_on DESC";
	}
		
	
	$filtro="";
	
	if(strlen($search)>0)
	{
		if($search>0)
		{
			$filtro=" WHERE article=$search AND ";
		}
		else
		{
			$article_query=mysql_db_query("$projecto","SELECT serial from ARTICLEbase WHERE title like '%$search%' ORDER by lastchanged DESC", $dblink);

			$firstarticle=1;
			while($row = @mysql_fetch_object($article_query))
			{
				$serial = $row->serial;
				if ($firstarticle)
				{
				$filtro="WHERE article=$serial ";
				}
				else
				{
				$filtro.="OR article=$serial ";
				}
			$firstarticle=0;
			}
			$filtro.="AND ";
		}
	}
	else
	{
	$filtro="WHERE ";
	}
			
	
	if($quais=="pendentes")
	{
		$filtro.="aprovado<=0";
	}
	
	if($quais=="aprovados")
	{
		$filtro.="aprovado=1";
	}
	
			
	if($contaosditos=mysql_db_query("$projecto", 
	"SELECT count(serial) from ARTICLEpubcom $filtro", $dblink))
	{
		$row = mysql_fetch_array($contaosditos);
		$quantos = $row[0];
	}
	
	if($result=mysql_db_query("$projecto", 
	"SELECT * from ARTICLEpubcom $filtro 
	ORDER BY $query_order_by
	LIMIT $startitem,$paginacao", $dblink))
	{
		$pagecur=$page+1;
		
		$output .="<script language=JavaScript>

		function SelectAll(which)
		{
			for (i=0; i<pubcomalter.elements.length;i++)
			{
				if (pubcomalter.elements[i].name.indexOf(which)>=0) pubcomalter.elements[i].checked=true;
			}
		}
		
		function ClearAll(which)
		{
			for (i=0; i<pubcomalter.elements.length;i++)
			{
				if (pubcomalter.elements[i].name.indexOf(which)>=0) pubcomalter.elements[i].checked=false;
			}
		}
		</script>";
		

		if ($quantos>0)
		{
			$output .= "<FORM NAME=\"pubcomalter\" METHOD=\"post\" ACTION=\"index.php\"><INPUT NAME=\"listar\" TYPE=\"hidden\" VALUE=\"comentarios\"><INPUT NAME=\"quais\" TYPE=\"hidden\" VALUE=\"$quais\"><INPUT NAME=\"paginacao\" TYPE=\"hidden\" VALUE=\"$paginacao\"><INPUT NAME=\"search\" TYPE=\"hidden\" VALUE=\"$search\">";

			$nFirst_pubcom = $startitem+1;
			$nLast_pubcom = ($page+1)*$paginacao;
			if ($nLast_pubcom>$quantos) $nLast_pubcom=$quantos;

			
// top navigation
			$navigation = "<table width=\"100%\"><tr><td valign=top>";
			$navigation.="$strList ".strtolower($strComments)." <b>$nFirst_pubcom-$nLast_pubcom</b> $strOf $quantos ".strtolower($strBy)." ";
			$navigation.="<select name=\"order_by\" onChange=\" pubcomalter.order_by[0][this.selectedIndex].selected=true; pubcomalter.order_by[1][this.selectedIndex].selected=true; link='index.php?listar=comentarios&page=$page&paginacao=$paginacao&quais=$quais&search=$search&order_by='+this[selectedIndex].value; location=link\">";


			$navigation.="\n<option value=\"submission_onDESC\"";
			if ($order_by=="submission_onDESC") $navigation.=" selected";  
			$navigation.=">$strDate DESC";
			$navigation.="\n<option value=\"submission_onASC\"";
			if ($order_by=="submission_onASC") $navigation.=" selected";
			$navigation.=">$strDate ASC";
			$navigation.="\n</select>";

			$navigation.="</td><td valign=top><div align=right>";

			if($page>0)
			{
				$pageant = $page-1;
				$navigation .= "<a href=\"index.php?listar=comentarios&page=$pageant&paginacao=$paginacao&quais=$quais&search=$search&order_by=$order_by\">$strPrevious</a>&nbsp;&nbsp;";
			}
			else
			{
				$navigation .= "$strPrevious&nbsp;&nbsp;";
			}

			$navigation .="<select name=\"gotopage\" onChange=\"; pubcomalter.gotopage[0][this.selectedIndex].selected=true; pubcomalter.gotopage[1][this.selectedIndex].selected=true; link='index.php?listar=comentarios&page='+this[selectedIndex].value+'&paginacao=$paginacao&quais=$quais&search=$search&order_by=$order_by'; location=link\">";
		
			for ($nListpage=0; $nListpage*$paginacao<$quantos; $nListpage++)
			{
				$navigation.="<option value=\"$nListpage\"";
				if ($nListpage+1==$pagecur) $navigation.=" selected";  
				$navigation.=">$strPage ".($nListpage+1)."</option>";
			}
			$navigation.="</select>";
		
			if( ($page+1)*$paginacao<$quantos )
			{
				$pagepos = $page+1;
				$pagelast = $quantos/$paginacao-1;
				$navigation .= "&nbsp;&nbsp;<a href=\"index.php?listar=comentarios&page=$pagepos&paginacao=$paginacao&quais=$quais&search=$search&order_by=$order_by\">$strNext</a>";
			}
			else
			{
				$navigation .= "&nbsp;&nbsp;$strNext";
			}
												
			$navigation.="</div></td></tr><tr><td><br>";
					
			if($quais=="aprovados")
			{
				$navigation.= "\n<input type=\"checkbox\" name=\"disapprove_all\" onClick=\"if(this.checked) { SelectAll('disapprove'); ClearAll('delete');} else ClearAll('disapprove');\">$strDisapprove $strAll&nbsp;&nbsp;|&nbsp;&nbsp;";
				$navigation.= "\n<input type=\"checkbox\" name=\"delete_all\" onClick=\"if(this.checked) {SelectAll('delete'); ClearAll('disapprove');} else ClearAll('delete');\">$strRemove $strAll";
			}

			if($quais=="pendentes")
			{
				$navigation.= "\n<input type=\"checkbox\" name=\"approve_all\" onClick=\"if(this.checked){SelectAll('approve'); ClearAll('delete');} else ClearAll('approve');\">$strApprove $strAll&nbsp;&nbsp;|&nbsp;&nbsp;";
				$navigation.= "\n<input type=\"checkbox\" name=\"delete_all\" onClick=\"if(this.checked) {SelectAll('delete'); ClearAll('approve');} else ClearAll('delete');\">$strRemove $strAll";
			}
		
			$navigation.= "</td><td align=right>";
			$navigation.= "<br><input type=\"submit\" name=\"pubcom_top_submit\" value=\"$strSave $strChanges\"></td></tr></table>";
			
			$output.=$navigation;
			$output.="<hr><br>";
// end top navigation

		
			while($row = mysql_fetch_object($result))		
			{
				$pc_serial		=$row -> serial;          
				$pc_article        	=$row -> article;
				$pc_aprovado       	=$row -> aprovado;
				$pc_submission_on	=$row -> submission_on;
				$pc_approved_by		=$row -> approved_by;
				$pc_approval_on		=$row -> approval_on;
				$pc_nome		=$row -> nome;
				$pc_email		=$row -> email;
				$pc_class=$row->class;
				$pc_title		=$row -> title;
				$pc_texto		=$row -> texto;
			
				$pc_nome=stripslashes($pc_nome);
				$pc_email=stripslashes($pc_email);
				$pc_title=stripslashes($pc_title);
				$pc_texto=stripslashes($pc_texto);
			
				$forum=0;
				
				if($artresult=mysql_db_query("$projecto", 
				"SELECT serial,title,debate,forum from ARTICLEbase
				WHERE serial=$pc_article", $dblink))
				{
					while($artrow = mysql_fetch_object($artresult))		
					{
						$forum                        =$artrow -> debate;
						$n_forum		=$artrow -> forum;
						$art_title		=$artrow -> title;
					}
				}
			
				if ($forum==3) 
                                   { 
                                           if($ci_result=mysql_db_query("$projecto",  
                                           "SELECT max_points,min_points from ARTICLEforum 
                                           WHERE serial=$n_forum", $dblink)) 
                                           { 
                                                   while($classint_row = mysql_fetch_object($ci_result))                 
                                                   { 
                                                           $max_points                        =$classint_row -> max_points; 
                                                           $min_points                        =$classint_row -> min_points; 
                                                   } 
                                                   $ChangeClassOutput = "<select name=\"pc_class_$pc_serial\">"; 
                                                   $max_points+=0;
						   $min_points+=0;
						   $nSelclass=$min_points;
						   while($nSelclass<=$max_points) 
                                                   { 
                                                           $ChangeClassOutput .= "<option value=\"$nSelclass\""; 
                                                           if ($nSelclass==$pc_class) $ChangeClassOutput .= " selected";   
                                                           $ChangeClassOutput .= ">$nSelclass</option>"; 
	                                           	   $nSelclass++;
						    } 
						   $ChangeClassOutput .= "</select></small>";
					    }
                                   } 
                                   else 
                                   { 
                                           $ChangeClassOutput = "<input type=\"text\" name=\"pc_class_$pc_serial\" value=\"$pc_class\" size=\"2\">"; 
                                   } 
					
		
			



				$header = "<b>$pc_title</b> ($strComment \"<b>$art_title</b>\")";
				$header .= "<small><br>$strFrom: $pc_nome ($pc_submission_on)</small>";
				$header .= "<small><br>Email: $pc_email</small>";
				$header .= "<br><small>$strClassification: ".$ChangeClassOutput;

				$comandos = "<center>";
			
				if($pc_aprovado > 0)
				{
					$comandos .= "<input type=\"checkbox\" name=\"disapprove_$pc_serial\" onClick=\"ClearAll('all'); if(disapprove_$pc_serial.checked) {delete_$pc_serial.checked=false;}\">$strDisapprove   | ";
				}
				else
				{
					$comandos .= "<input type=\"checkbox\" name=\"approve_$pc_serial\"				onClick=\"ClearAll('all'); if(approve_$pc_serial.checked) {delete_$pc_serial.checked=false;}\">$strApprove   | ";
				}
			
				$pc_title_altered=rawurlencode($pc_title);
				$pc_texto_altered=rawurlencode($pc_texto);
			
				if($status>1)
				{
					$comandos .= "<a href=\"index.php?listar=comentarios&quais=$quais&page=$page&paginacao=$paginacao&order_by=$order_by&editpubcom=$pc_serial&search=$search\">$strEdit</a>   |   ";
				}
				$comandos .= "<a href=\"article_write.php?base_title_new=$pc_title_altered&item_text1=$pc_texto_altered&gravar=Preview\">$strCreateArticle</a>   |   ";


				if($pc_aprovado > 0)
				{
					$comandos .= "$strRemove<input type=\"checkbox\" name=\"delete_$pc_serial\" onClick=\"ClearAll('all'); if(delete_$pc_serial.checked) disapprove_$pc_serial.checked=false;\">";
				}
				else
				{
					$comandos .= "$strRemove<input type=\"checkbox\" name=\"delete_$pc_serial\" onClick=\"ClearAll('all'); if(delete_$pc_serial.checked) approve_$pc_serial.checked=false;\">";
				}


				$comandos .= "</center>";
			
				if($editpubcom==$pc_serial && $status>1)
				{
					$pc_texto="<center><INPUT NAME=\"pubcomalterid\" TYPE=\"hidden\" VALUE=\"$pc_serial\"><TEXTAREA NAME=\"pubcomaltertext\" TYPE=\"textarea\" ROWS=15 COLS=50 WRAP=PHYSICAL>$pc_texto</TEXTAREA><br><INPUT NAME=\"alterpubcomgravar\" TYPE=\"submit\" VALUE=\"$strSave\"></center>";

				}
				else
				{
					$pc_texto=str_replace("\n", "<br>", $pc_texto);
				}
	
				if($pc_aprovado > 0)
				{
					// check if comment was approved less than 1 hour ago. If so, approval info is displayed in red font color.
				
					ereg ("([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2}):([0-9]{2})", $pc_approval_on, $regs);
					$year=$regs[1];
					$month=$regs[2];
					$day=$regs[3];
					$hour=$regs[4];
					$minute=$regs[5];
					$second=$regs[6];
									
					$pc_approval_on_time=mktime($hour,$minute,$second,$month,$day,$year);
					$onehourago=mktime(date("H")-1);
					$now=mktime();
									
					if ($pc_approval_on_time>$onehourago)
					{ $comandos .= "<center><font color=#FF0000><small><br>$strApprovedBy $pc_approved_by ($pc_approval_on)</small></font></center>";
					}
					else
					{
					$comandos .="<center><small><br>$strApprovedBy $pc_approved_by ($pc_approval_on)</small><center>";
					}
				}
				else
				{
				$comandos .= "<center><small><br>$strTo_be_Approved ...</small></center>";
				}
			
				$output .=box("0","$header","$pc_texto","$comandos","",1);
				$output .= "<br><br>";
			}
		
						
// bottom navigation
			$output.="<br><hr>";
			$output.=$navigation;
// end bottom navigation
			
			$output .="</form>";
			
		}
		else
		{
			if ($quais=="aprovados")  $output="<center>$strNoCommentsApproved</center>";
			if ($quais=="pendentes")  $output="<center>$strNoCommentsToApprove</center>";
		}
	}

	box("0","","$output");
}

print "</td><td valign=top>";

if($status>2) # level 3 interface
{
	
	if($limitacao[0][1]==0)
	{
		$caixas  = "<a href=\"index.php?listar=boxskins\" class=links>$strBoxes</a> | <a href=\"boxskins_edit.php\" class=links>$strNew</a><br>";
	}
	if($limitacao[0][2]==0)
	{
		$caixas  .= "<a href=\"index.php?listar=boxlayout\" class=links>$strLayout</a> | <a href=\"boxlayout_edit.php\" class=links>$strNewM</a><br>";
	}

        if($limitacao[0][12]==0)
        {
                $caixas  .= "<a href=\"index.php?listar=css\" class=links>$strCSS</a> | <a href=\"css_files.php\" class=links>$strNew</a>";
        }
	
	$artigos="";
	if($limitacao[0][3]==0)
	{                                                                                                     
		$artigos  = "<a href=\"article_componentes.php\" class=links>$strArticleFields</a><br>";
	}
	if($limitacao[0][4]==0)
	{                                                                                                     
		$artigos .= "<a href=\"article_topicos.php\" class=links>$strSubjects</a>";
	}
	
	if($limitacao[0][8]==0)
	{                                                                                                     
		$staffm  = "<a href=\"index.php?listar=staff\" class=links>$strEdit</a> | <a href=\"staff_edit.php\" class=links>$strNewM</a>";
	}
	
	if($limitacao[0][5]==0)
	{                                                                                                     
		$tree  = "<a href=\"sections/\" class=links>$strEdit</a>";
	}
	
	if($limitacao[0][6]==0)
	{                                                                                                     
		$skins  = "<a href=\"interfaces/\" class=links>$strEdit</a>";
	}
	
	if($limitacao[0][7]==0)
	{                               
		$pubcom  = "<a href=\"index.php?listar=forms\" class=links>$strEdit</a> | <a href=form.php class=links>$strNewM</a>";
	}
	
	$users="";
	if($limitacao[0][9]==0)
	{                               
		$users  = "<a href=\"users/fields.php\"><font class='links'>$strUsersFields</a>";
	}
	
	if($limitacao[0][11]==0)
	{                               
		$forum  = "<a href=\"index.php?listar=forum\" class=links>$strEdit</a> | <a href=\"forum_edit.php\" class=links>$strNewM</a>";
	}

	$programador  = "<center><table><tr><td>";
	$programador .= bobox("<font class='texto2'><center>$strVisuals</center></font>", "$caixas", 2, "$BOSIMPLE");
	$programador .= "</td></tr><tr><td>";
	$programador .= bobox("<font class='texto2'><center>$strArticles</center></font>", "$artigos", 2, "$BOSIMPLE");
	$programador .= "</td></tr><tr><td>";
	$programador .= bobox("<font class='texto2'><center>$strSections</center></font>", "$tree", 2, "$BOSIMPLE");
	$programador .= "</td></tr><tr><td>";
	$programador .= bobox("<font class='texto2'><center>$strPageSkins</center></font>", "$skins", 2, "$BOSIMPLE");
	$programador .= "</td></tr><tr><td>";
	$programador .= bobox("<font class='texto2'><center>$strForms</center></font>", "$pubcom", 2, "$BOSIMPLE");
	$programador .= "</td></tr><tr><td>";
	$programador .= bobox("<font class='texto2'><center>$strStaff</center></font>", "$staffm", 2, "$BOSIMPLE");
	$programador .= "</td></tr><tr><td>";
	$programador .= bobox("<font class='texto2'><center>$strUsers</center></font>", "$users", 2, "$BOSIMPLE");
	$programador .= "</td></tr><tr><td>";
	$programador .= bobox("<font class=texto2><center>$strForum</center></font>", "$forum", 2, "$BOSIMPLE");
	$programador .= "</td></tr><tr><td>";
	$programador .= bobox("<font class='texto2'><center>XML</center></font>", "<a href=\"xmlhelp.php\" class=links>$strEdit</a>", 2, "$BOSIMPLE");
	$programador .= "</td></tr></table></center>";
	
	print bobox("<b><font class='texto'><center>$strProgrammers</center></font></b>", "$programador", "", "$BOSIMPLE");	
}


print "</td></tr></table>";

# Data Mining

$string="";
reset($HTTP_GET_VARS);
$key=key($HTTP_GET_VARS);
$value=current($HTTP_GET_VARS);
while( list($key,$value) = each($HTTP_GET_VARS) )
{
	$string.="$key\t$value\t";
}
if ($_SERVER['REMOTE_ADDR'] == "127.0.0.1") {     $remoteip=$HTTP_X_FORWARDED_FOR; } else {   $remoteip=$_SERVER['REMOTE_ADDR']; }
recordsession_bo("index.php",$string,$_SERVER['REMOTE_USER'],$HTTP_USER_AGENT,$remoteip,$datamining);

?>

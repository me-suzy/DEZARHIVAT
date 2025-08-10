<?
require "whoisthis_bo.php";
require_once "../config.php";
require "../include/box.php";
$minstatus=3;
$op=0;
$det=1;
require "./staff_details.php";
require "../include/strings.php";
?>

<HTML>
<HEAD><TITLE>BOX setup</TITLE></HEAD>
<BODY>



<center><a href=index.php?listar=boxskins><? print "$strList"; ?></a></center>

<?

$id +=0;

if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
	$result=mysql_db_query("$projecto","SELECT * from BOXbase where id=$id", $dblink);
	
	while($row = mysql_fetch_object($result))
	{
		if($row -> id == $id)  # we have settings
		{
			$id=			$row -> id;
			$title=			$row -> title;				
			$color_border= 		$row -> color_border;
			$color_header=		$row -> color_header;
			$color_content=		$row -> color_content;
			$color_footer=		$row -> color_footer;
			$size_border=		$row -> size_border;
			$dist_border=		$row -> dist_border;
			$image_top_left=	$row -> image_top_left; 
			$image_top_right=	$row -> image_top_right; 
			$image_top_row=		$row -> image_top_row;
			$image_bot_left=	$row -> image_bot_left;
			$image_bot_right=	$row -> image_bot_right; 
			$image_bot_row=		$row -> image_bot_row;
			$image_right=		$row -> image_right;
			$image_left=		$row -> image_left;
		}
		
		$gotdefs=1;
	}			
	
	if($gotdefs==0 && $id_new==0)
	{
		$alldone=1;
		$id="new";
		$title="$strNewObject";			
		$color_border=	"#000000";
		$color_header=	"#C9C9B5";
		$color_content=	"#FFFFFF";
		$color_footer=	"#C9C9B5";
		$size_border=	"1";
		$dist_border=	"5";
		$image_top_left= ""; 
		$image_top_right="";
		$image_top_row="";
		$image_bot_left="";
		$image_bot_right="";
		$image_bot_row="";
		$image_right="";
		$image_left="";
		
		
		if($id_new==0) # there is data to be saved!
		{		
#
# Create a record
#
			$result=mysql_db_query("$projecto","INSERT INTO BOXbase SET 
			title=\"$strNewObject\",
			color_border=	\"#000000\",
			color_header=	\"#C9C9B5\",
			color_content=	\"#FFFFFF\",
			color_footer=	\"#C9C9B5\",
			size_border=	1,
			dist_border=	5", $dblink);
			$id=mysql_insert_id($dblink);
		}
	}
	
#
# Is there new data to replace the preferences?
#
	if($id_new>0) # there is data to be saved!
	{
		if($box_size_border_new=="on")
		{
			$box_size_border_new="1";
		}
		else
		{
			$box_size_border_new="0";
		}
		
#
#	set record values
#
		$result=mysql_db_query("$projecto","UPDATE BOXbase 
		SET title	=\"$box_title_new\", 
		color_border	=\"$box_border_color_new\",
		color_header	=\"$box_header_color_new\",
		color_content   =\"$box_content_color_new\",
		color_footer    =\"$box_footer_color_new\",
		size_border     =\"$box_size_border_new\",
		dist_border     =\"$box_dist_border_new\",
		image_top_left	=\"$box_image_top_left_new\",
		image_top_right	=\"$box_image_top_right_new\",
		image_top_row	=\"$box_image_top_row_new\",
		image_bot_left	=\"$box_image_bot_left_new\",
		image_bot_right	=\"$box_image_bot_right_new\",
		image_bot_row	=\"$box_image_bot_row_new\",
		image_right	=\"$box_image_right_new\",
		image_left	=\"$box_image_left_new\"
		WHERE id=$id_new", $dblink);
		
		$id		=$id_new;
		$title		=$box_title_new;
		$color_border	=$box_border_color_new;
		$color_header	=$box_header_color_new;
		$color_content  =$box_content_color_new;
		$color_footer   =$box_footer_color_new;
		$size_border    =$box_size_border_new;
		$dist_border    =$box_dist_border_new;
		$image_top_left	=$box_image_top_left_new;
		$image_top_right=$box_image_top_right_new;
		$image_top_row	=$box_image_top_row_new;
		$image_bot_left	=$box_image_bot_left_new;
		$image_bot_right=$box_image_bot_right_new;
		$image_bot_row	=$box_image_bot_row_new;
		$image_right	=$box_image_right_new;
		$image_left	=$box_image_left_new;
		
		mysql_db_query("$projecto","DELETE FROM CACHE where cachetype=1 and box=$id", $dblink);
	}
	
	$id_new=$id;
	?>
	<table width=100% border=0 cellpadding=20><tr><td width=50% valign="top">
	<?
	print "<FORM NAME=\"preferencias\" METHOD=\"post\">";
	print "<INPUT NAME=\"box_title_new\" TYPE=\"text\" VALUE=\"$title\"> ($id)";
	print "<INPUT NAME=\"id_new\" TYPE=\"hidden\" VALUE=\"$id\">";
	box(	"$id",
	"$strHeadColor: <INPUT NAME=\"box_header_color_new\" TYPE=\"text\" VALUE=\"$color_header\">", 
	"$strContColor: <INPUT NAME=\"box_content_color_new\" TYPE=\"text\" VALUE=\"$color_content\">", 
	"$strFootColor: <INPUT NAME=\"box_footer_color_new\" TYPE=\"text\" VALUE=\"$color_footer\">");
	print "<br><table width=100%><tr><td align=left>$strBorderColor: <INPUT NAME=\"box_border_color_new\" TYPE=\"text\" VALUE=\"$color_border\" SIZE=8>";
	if($size_border > 0)
	{
		print "</td><td align=right><INPUT NAME=\"box_size_border_new\" TYPE=\"CHECKBOX\" CHECKED> 1 pixel border";
	}
	else
	{
		print "</td><td align=right><INPUT NAME=\"box_size_border_new\" TYPE=\"CHECKBOX\"> 1 pixel border";
	}
	print "<br>$strMargin <INPUT NAME=\"box_dist_border_new\" TYPE=\"text\" VALUE=\"$dist_border\" SIZE=2>";
	print "</td></tr></table></td><td>";
	print "Img/$strColor $strTop $strLeft:<br> <INPUT NAME=\"box_image_top_left_new\" TYPE=\"text\" VALUE=\"$image_top_left\"><br>";
	print "Img/$strColor $strTop $strLine:<br> <INPUT NAME=\"box_image_top_row_new\" TYPE=\"text\" VALUE=\"$image_top_row\"><br>";
	print "Img/$strColor $strTop $strRight:<br> <INPUT NAME=\"box_image_top_right_new\" TYPE=\"text\" VALUE=\"$image_top_right\"><br>";
	print "Img/$strColor $strLine $strLeft:<br> <INPUT NAME=\"box_image_left_new\" TYPE=\"text\" VALUE=\"$image_left\"></td><td>";
	print "Img/$strColor $strBottom $strLeft:<br> <INPUT NAME=\"box_image_bot_left_new\" TYPE=\"text\" VALUE=\"$image_bot_left\"><br>";
	print "Img/$strColor $strBottom $strLine:<br> <INPUT NAME=\"box_image_bot_row_new\" TYPE=\"text\" VALUE=\"$image_bot_row\"><br>";
	print "Img/$strColor $strBottom $strRight:<br> <INPUT NAME=\"box_image_bot_right_new\" TYPE=\"text\" VALUE=\"$image_bot_right\"><br>";
	print "Img/$strColor $strLine $strRight:<br> <INPUT NAME=\"box_image_right_new\" TYPE=\"text\" VALUE=\"$image_right\">";
	?>
	</td></tr><tr><td><INPUT NAME="Gravar alteracoes" TYPE="submit" VALUE="<? print $strSave; ?>"></FORM></td></tr></table>
	<?			
}
else
{
	print "BOX: No connection to database";
}

# Data Mining

$string="";
reset($HTTP_POST_VARS);
$key=key($HTTP_POST_VARS);
$value=current($HTTP_POST_VARS);
while( list($key,$value) = each($HTTP_POST_VARS) )
{
	$string.="$key\t$value\t";
}
recordsession_bo("boxskin_edit.php",$string,$_SERVER['REMOTE_USER'],$HTTP_USER_AGENT,$_SERVER['REMOTE_ADDR'],$datamining);

?>

<BODY>
</HTML>


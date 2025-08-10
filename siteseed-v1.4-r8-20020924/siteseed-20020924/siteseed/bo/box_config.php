<?
require "../include/box.php";
require "./staff_details.php";
?>

<HTML>
<BODY>

<TITLE>BOX setup</TITLE>

<?

$counter=1;
$alldone=0;
$id=0;

if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
	while($alldone==0)
	{	
#
# Use the preferences if available...
#
		$result=mysql_db_query("$projecto","SELECT * from BOXbase where id=$counter", $dblink);
		
		$gotdefs=0;
		while($row = mysql_fetch_object($result))
		{
			if($row -> id == $counter)  # we have settings
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
		
		if($gotdefs==0)
		{
			$alldone=1;
			$id++;
			$title="Nova caixa para editar";			
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
			
			
			if($id_new==$counter) # there is data to be saved!
			{		
#
# Create a record
#
				$result=mysql_db_query("$projecto","INSERT INTO BOXbase SET title=\"$title\"", $dblink); 
			}
		}
		
#
# Is there new data to replace the preferences?
#
		
		if($id_new==$counter) # there is data to be saved!
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
			WHERE id=$counter", $dblink);
			
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
		}
		?>
		<table width=100% border=0 cellpadding=20><tr><td width=50% valign="top">
		<?
		print "<FORM NAME=\"preferencias\" METHOD=\"get\">";
		print "<INPUT NAME=\"box_title_new\" TYPE=\"text\" VALUE=\"$title\"> ($counter)";
		print "<INPUT NAME=\"id_new\" TYPE=\"hidden\" VALUE=\"$counter\">";
		box(	"$id",
		"Cor Header: <INPUT NAME=\"box_header_color_new\" TYPE=\"text\" VALUE=\"$color_header\">", 
		"Cor Content: <INPUT NAME=\"box_content_color_new\" TYPE=\"text\" VALUE=\"$color_content\">", 
		"Cor Footer: <INPUT NAME=\"box_footer_color_new\" TYPE=\"text\" VALUE=\"$color_footer\">");
		print "<br><table width=100%><tr><td align=left>Cor Border: <INPUT NAME=\"box_border_color_new\" TYPE=\"text\" VALUE=\"$color_border\" SIZE=8>";
		if($size_border > 0)
		{
			print "</td><td align=right><INPUT NAME=\"box_size_border_new\" TYPE=\"CHECKBOX\" CHECKED> 1 pixel border";
		}
		else
		{
			print "</td><td align=right><INPUT NAME=\"box_size_border_new\" TYPE=\"CHECKBOX\"> 1 pixel border";
		}
		print "<br>Margem: <INPUT NAME=\"box_dist_border_new\" TYPE=\"text\" VALUE=\"$dist_border\" SIZE=2>";
		
		print "</td></tr></table></td><td>";
		print "Img/cor cima esq:<br> <INPUT NAME=\"box_image_top_left_new\" TYPE=\"text\" VALUE=\"$image_top_left\"><br>";
		print "Img/cor cima linha:<br> <INPUT NAME=\"box_image_top_row_new\" TYPE=\"text\" VALUE=\"$image_top_row\"><br>";
		print "Img/cor cima dir:<br> <INPUT NAME=\"box_image_top_right_new\" TYPE=\"text\" VALUE=\"$image_top_right\"><br>";
		print "Img/cor linha esq:<br> <INPUT NAME=\"box_image_left_new\" TYPE=\"text\" VALUE=\"$image_left\"></td><td>";
		print "Img/cor baixo esq:<br> <INPUT NAME=\"box_image_bot_left_new\" TYPE=\"text\" VALUE=\"$image_bot_left\"><br>";
		print "Img/cor baixo linha:<br> <INPUT NAME=\"box_image_bot_row_new\" TYPE=\"text\" VALUE=\"$image_bot_row\"><br>";
		print "Img/cor baixo dir:<br> <INPUT NAME=\"box_image_bot_right_new\" TYPE=\"text\" VALUE=\"$image_bot_right\"><br>";
		print "Img/cor linha dir:<br> <INPUT NAME=\"box_image_right_new\" TYPE=\"text\" VALUE=\"$image_right\">";
		?>
		</td></tr><tr><td><INPUT NAME="Gravar alteracoes" TYPE="submit" VALUE="Gravar alteracoes"></FORM></td></tr></table>
		<?			
		$counter++;
	}
}
else
{
	print "BOX: No connection to database";
}
?>

<BODY>
</HTML>


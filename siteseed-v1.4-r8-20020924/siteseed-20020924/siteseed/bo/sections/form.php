<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/sections/form.php

***************************************/ 

function print_area_form ($id="", $weight="", $parent="") 
{
	if ($id) 
	{
		$query = mysql_query ("	SELECT parent, weight, name, skin,
		section_type, type_id, url,comments,comments_layout FROM areas WHERE id=$id");
		
		if ($query) 
		{
			list (	$parent, $weight, $name, $skin,
			$section_type, $type_id, $url , $comments_db, $comments_layout_db) = mysql_fetch_row($query);
		}
		
		$name = StripSlashes ($name);
		$url = StripSlashes ($url);
		
	} 
	else
	{
		$type_id = $parent;
	}	
	
	
	require_once "../../config.php";
	require "../../include/strings.php";
	
	?>
	<hr>
	<form method=post>
	<? if ($id) { ?>
		<input type=hidden name=id value=<? print $id; ?>>
	<? } ?>
	<input type=hidden name=parent value=<? print $parent; ?>>
	<input type=hidden name=weight value=<? print $weight; ?>>
	<? print $strName; ?>: <input type=text name=name size=40 maxlenght=255 value="<? print $name; ?>"><br><br>
	<? print $strOptionalURL; ?>: <input type=text name=url size=40 maxlenght=255 value="<? print $url; ?>"><br><br>
	<? print $strSkin; ?>: <? print select_to_list("skin", "id", "name", "skins", $skin); ?><br><br>
	<? print $strSectionType; ?>:
	<select name="section_type">
	<option value=0 <? if ($section_type==0) print "selected"; ?>><? print $strNothing; ?>
	<option value=1 <? if ($section_type==1) print "selected"; ?>><? print $strSection; ?>
	<option value=2 <? if ($section_type==2) print "selected"; ?>><? print $strArticle; ?>
	<option value=3 <? if ($section_type==3) print "selected"; ?>><? print $strClassifieds; ?>
	</select>
	<? print $strSectionId; ?>: <input type=text name="type_id" size=10 maxlenght=10 value="<? print $type_id; ?>"><br><br>
	
	
	
	<? print"$strComments:"; ?> <select name="comments"><option value=0><? print"$strNoComments"; ?>
	<?
	
	$result=mysql_query ("SELECT title,serial from ARTICLEpubcomforms where type=\"comments\" OR type=\"old comments\" order by title");
	while( $row=@mysql_fetch_object($result))
	{
		$serial=$row->serial;
		$title=$row->title;
		print"<option value=$serial";
		if($serial==$comments_db){print" selected ";}
		print">$title($serial)";
		
	}
	?>
	</select>
	
	<? print"$strCommentsLayout:"; ?> <select name="comments_layout"><option value=0><? print"$strNone"; ?>
	<?
	
	$result=mysql_query ("SELECT legenda,serial from ARTICLEboxsetup order by legenda");
	while( $row=mysql_fetch_object($result))
	{
		$serial=$row->serial;
		$legenda=$row->legenda;
		print"<option value=$serial";
		if($serial==$comments_layout_db){print" selected ";}
		print">$legenda ($serial)";
		
	}
	?>
	</select>
	
	<br><br><hr><input type=submit value="<? if ($id) print $strModify; else print $strOK; ?>">
	</form>
	<?
}
?>

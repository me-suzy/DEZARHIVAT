<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/interfaces/form.php

***************************************/ 


function print_skin_form ($id="", $name="", $prefix="", $suffix="") 
{
	global $preview;
	
	if ($id && !$preview) 
	{
		$query = mysql_query ("SELECT name, prefix, suffix FROM skins WHERE id=$id");
		
		if ($query) 
		{	
			list ($name, $prefix, $suffix ) = mysql_fetch_row($query);
			
			$name = StripSlashes ($name);
			$suffix = StripSlashes ($suffix);
			$prefix = StripSlashes ($prefix);
		}
	} 
	
	require_once "../../config.php";
	require "../../include/strings.php";
	?>
	<hr>
	<form method=post>
	<? if ($id) { ?>
		<input type=hidden name=id value=<? print $id; ?>>
	<? } ?>
	<? print $strName; ?>: <input type=text name=name size=40 maxlenght=255 value="<? print $name; ?>"><br><br>
	<? print $strCodePrefix ;?>:<br> <textarea name=prefix rows=20 cols=90 wrap=off><? print $prefix; ?></textarea><br><br>
	<? print $strCodeSuffix ;?>:<br> <textarea name=suffix rows=20 cols=90 wrap=off><? print $suffix; ?></textarea>
	<br><br><hr>
	<input type=submit name=ok value="<? if ($id) print $strModify; else print $strOK; ?>">
	<input type=submit name=preview value=<? print $strPreview; ?>>
	</form>
	<?
}
?>

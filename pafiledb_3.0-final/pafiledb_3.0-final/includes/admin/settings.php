<?php
/*
  paFileDB 3.0
  ©2001/2002 PHP Arena
  Written by Todd
  todd@phparena.net
  http://www.phparena.net
  Keep all copyright links on the script visible
  Please read the license included with this script for more information.
*/
$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: $str[csettings]";
adlocbar($locbar,$user,$str);
adminlinks($str);

if ($settings == "do") {
	$pafiledb_sql->query($db, "UPDATE $db[prefix]_settings SET settings_dbname = '$form[dbname]', settings_dbdescription = '$form[desc]', settings_dburl = '$form[dburl]', settings_topnumber = '0', settings_homeurl = '$form[hpurl]', settings_newdays = '0', settings_timeoffset = '$form[offset]', settings_timezone = '$form[tz]', settings_header = 'header feature temporarily removed', settings_footer = 'footer feature temporarily removed', settings_style = '$form[style]', settings_stats = '$form[stats]', settings_lang = '$form[lang]' WHERE settings_id = '1'", 0);
	?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[csettings]; ?></b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
               <td width="95%" class="datacell"><?php echo $str[settingschanged]; ?></td></tr></table>
	<?php
}
if (empty($settings)) {
	$handle=opendir('./styles');
	while (false!==($dir = readdir($handle))) {
		if ($dir !== "." && $dir !== ".." && is_dir("./styles/$dir")) {
			if ($config[11] == "$dir") {
				$dropmenu .= "<option value=\"$dir\" selected>$dir</option>\n";
			} else {
				$dropmenu .= "<option value=\"$dir\">$dir</option>\n";
			}
		}
	}
	$handle=opendir('./lang');
	while (false!==($file = readdir($handle))) {
		if ($file !== "." && $file !== ".." && is_file("./lang/$file")) {
			$file = str_replace(".php", "", $file);
			if ($config[13] == "$file") {
				$langdropmenu .= "<option value=\"$file\" selected>$file</option>\n";
			} else {
				$langdropmenu .= "<option value=\"$file\">$file</option>\n";
			}
		}
	}
	if ($config[12] == 0) {
		$statsdropmenu .= "<option value=\"0\" selected>$str[no]</option>\n";
		$statsdropmenu .= "<option value=\"1\">$str[yes]</option>\n";
	} else {
		$statsdropmenu .= "<option value=\"0\">$str[no]</option>\n";
		$statsdropmenu .= "<option value=\"1\" selected>$str[yes]</option>\n";
	}
	?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<form action="pafiledb.php" method="post" name="form"><tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[csettings]; ?></b></center></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[dbname]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[dbname]" value="<?php echo $config[1]; ?>"><br><a class="small"><?php echo $str[dbnameinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[dbdesc]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[desc]" value="<?php echo $config[2]; ?>"><br><a class="small"><?php echo $str[dbdescinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[dburl]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[dburl]" value="<?php echo $config[3]; ?>"><br><a class="small"><?php echo $str[dburlinfo]; ?></td></tr>
<!--<tr><td width="50%" align="right" class="datacell"><?php echo $str[topnum]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="5" maxlength="5" name="form[top]" value="<?php echo $config[4]; ?>"><br><a class="small"><?php echo $str[topnuminfo]; ?></td></tr>-->
<tr><td width="50%" align="right" class="datacell"><?php echo $str[hpurl]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[hpurl]" value="<?php echo $config[5]; ?>"><br><a class="small"><?php echo $str[hpurlinfo]; ?></td></tr>
<!--<tr><td width="50%" align="right" class="datacell"><?php echo $str[nfdays]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="5" maxlength="5" name="form[new]" value="<?php echo $config[6]; ?>"><br><a class="small"><?php echo $str[nfdaysinfo]; ?></td></tr>-->
<tr><td width="50%" align="right" class="datacell"><?php echo $str[timeoffset]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="5" maxlength="5" name="form[offset]" value="<?php echo $config[7]; ?>"><br><a class="small"><?php echo $str[timeoffsetinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[tz]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[tz]" value="<?php echo $config[8]; ?>"><br><a class="small"><?php echo $str[tzinfo]; ?></td></tr>
<!--<tr><td width="50%" align="right" class="datacell"><?php echo $str[header]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[header]" value="<?php echo $config[9]; ?>"><br><a class="small"><?php echo $str[headerinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[footer]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[footer]" value="<?php echo $config[10]; ?>"><br><a class="small"><?php echo $str[footerinfo]; ?>td></tr>-->
<tr><td width="50%" align="right" class="datacell"><?php echo $str[styleset]; ?></td><td width="50%" align="left" class="datacell">
<select name="form[style]" class="forminput">
<?php echo $dropmenu; ?>
</select>
<br><a class="small"><?php echo $str[stylesetinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[stats2]; ?></td><td width="50%" align="left" class="datacell">
<select name="form[stats]" class="forminput">
<?php echo $statsdropmenu; ?>
</select>
<br><a class="small"><?php echo $str[statsinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[lang]; ?></td><td width="50%" align="left" class="datacell">
<select name="form[lang]" class="forminput">
<?php echo $langdropmenu; ?>
</select>
<br><a class="small"><?php echo $str[langinfo]; ?></td></tr>
<tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[csettings]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="settings">
<input type="hidden" name="settings" value="do"></td></tr>
</form>
</table>	
<?php
	
}
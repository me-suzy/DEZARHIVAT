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
$file = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_id = '$id'", 1);
$category = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_id = '$file[file_catid]'", 1);
if ($category[5] == 0) {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=category&id=$file[file_catid]\" class=\"small\">$category[cat_name]</a> :: $file[file_name]";
}
if ($category[5] > 0) {
	$parent = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_id = '$category[5]'", 1);
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=category&id=$parent[cat_id]\" class=\"small\">$parent[cat_name]</a> :: <a href=\"pafiledb.php?action=category&id=$category[cat_id]\" class=\"small\">$category[cat_name]</a> :: $file[file_name]";
}
if ($logged == 1) {
	adlocbar($locbar, $user, $str);
	adminlinks_viewfile($str,$id);
} else {
	locbar($locbar);
}
$offset = ($config[7] * 3600) + $file[file_time];
$time = date("g:i A n/j/y", $offset);
if ($file[file_last] == 0) {
	$last = "$str[never]";
} else {
	$lastoffset = ($config[7] * 3600) + $file[file_last];
	$last = date("g:i A n/j/y", $lastoffset);
}
$file[file_creator] = trim($file[file_creator]);
$file[file_version] = trim($file[file_version]);
$file[file_ssurl] = trim($file[file_ssurl]);
$file[file_docsurl] = trim($file[file_docsurl]);
if (!empty($file[file_creator])) { $creator = "<tr><td width=\"20%\" class=\"datacell\">$str[creator]:</td><td width=\"80%\" class=\"datacell\">$file[file_creator]</td></tr>"; }
if (!empty($file[file_version])) { $version = "<tr><td width=\"20%\" class=\"datacell\">$str[version]:</td><td width=\"80%\" class=\"datacell\">$file[file_version]</td></tr>"; }
if (!empty($file[file_ssurl])) { $ssurl = "<tr><td width=\"20%\" class=\"datacell\">$str[scrsht]:</td><td width=\"80%\" class=\"datacell\"><a href=\"$file[file_ssurl]\" target=\"ss_$id\">$file[file_ssurl]</a></td></tr>"; }
if (!empty($file[file_docsurl])) { $docsurl = "<tr><td width=\"20%\" class=\"datacell\">$str[docs]:</td><td width=\"80%\" class=\"datacell\"><a href=\"$file[file_docsurl]\" target=\"docs_$id\">$file[file_docsurl]</a></td></tr>"; }
$file[file_totalvotes] = $file[file_totalvotes] - 1;
if ($file[file_rating] == 0 or $file[file_totalvotes] == 0) { $rating = 0; } else {$rating = round($file[file_rating]/$file[file_totalvotes], 2); }
if ($file[file_license] == 0) {
	$downloadlink = "pafiledb.php?action=download&id=$id";
}
if ($file[file_license] > 0) {
	$downloadlink = "pafiledb.php?action=license&id=$file[file_license]&file=$id";
}
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="100%"  colspan="2" class="headercell"><center><b><?php echo $file[file_name]; ?></b></center></td></tr>
<tr><td width="20%" class="datacell"><?php echo $str[desc]; ?>:</td><td width="80%" class="datacell"><?php echo $file[file_longdesc]; ?></td></tr>
<?php echo "$creator\n$version\n$ssurl\n$docsurl"; ?>
<tr><td width="20%" class="datacell"><?php echo $str[date]; ?>:</td><td width="80%" class="datacell"><?php echo $time; ?></td></tr>
<tr><td width="20%" class="datacell"><?php echo $str[lastdl]; ?>:</td><td width="80%" class="datacell"><?php echo $last; ?></td></tr>
<tr><td width="20%" class="datacell"><?php echo $str[rating]; ?>:</td><td width="80%" class="datacell"><?php echo $rating; ?>/10 (<?php echo "$file[file_totalvotes] $str[votes]"; ?>)</td></tr>
<tr><td width="20%" class="datacell"><?php echo $str[dls]; ?>:</td><td width="80%" class="datacell"><?php echo $file[file_dls]; ?></td></tr>
<?php
	$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_customdata WHERE customdata_file = '$id'", 0);
	while ($custom = mysql_fetch_object($result)) {
		$field = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_custom WHERE custom_id = '$custom->customdata_custom'", 1);
		$custom->data = trim($custom->data);
		if (!empty($custom->data)) { echo "<tr><td width=\"20%\" class=\"datacell\">$field[custom_name]:</td><td width=\"80%\" class=\"datacell\">$custom->data</td></tr>"; }
	
	}
?>
</table><table width="100%" border="0" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="33%" class="datacell" align="center"><a href="<?php echo $downloadlink; ?>" class="head"><img src="styles/<?php echo $config[11]; ?>/images/download.gif" border="0"></a></td><td width="33%" class="datacell" align="center"><a href="pafiledb.php?action=rate&id=<?php echo $id; ?>" class="head"><img src="styles/<?php echo $config[11]; ?>/images/rate.gif" border="0"></a></td><td width="33%" class="datacell" align="center"><a href="pafiledb.php?action=email&id=<?php echo $id; ?>" class="head"><img src="styles/<?php echo $config[11]; ?>/images/email.gif" border="0"></a></td></tr>

</table>
<?php if ($logged == 1) { echo "</td></tr></table>"; } ?>
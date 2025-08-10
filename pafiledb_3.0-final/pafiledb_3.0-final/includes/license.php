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
$f = $file;
$file = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_id = '$f'", 1);
$category = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_id = '$file[file_catid]'", 1);
if ($category[5] == 0) {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=category&id=$file[file_catid]\" class=\"small\">$category[cat_name]</a> :: <a href=\"pafiledb.php?action=file&id=$f\" class=\"small\">$file[file_name]</a> :: $str[license]";
}
if ($category[5] > 0) {
	$parent = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_id = '$category[5]'", 1);
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=category&id=$parent[cat_id]\" class=\"small\">$parent[cat_name]</a> :: <a href=\"pafiledb.php?action=category&id=$category[cat_id]\" class=\"small\">$category[cat_name]</a> :: <a href=\"pafiledb.php?action=file&id=$f\" class=\"small\">$file[file_name]</a> :: License Agreement";
}
if ($logged == 1) {
	adlocbar($locbar, $user, $str);
	adminlinks($str);
} else {
	locbar($locbar);
}
$license = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_license WHERE license_id = '$id'", 1);
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="100%" class="headercell"><center><b><?php echo $license[license_name]; ?></b></center></td></tr>
<tr><td width="20%" class="datacell"><b><?php echo "$str[licensewarn] <i>$file[file_name]"; ?></b></i><p><?php echo $license[license_text]; ?></td></tr>
<tr><td width="100%" class="headercell"><center><b><a href="pafiledb.php?action=download&id=<?php echo $f; ?>" class="head"><?php echo $str[iagree]; ?></a> | <a href="pafiledb.php?action=file&id=<?php echo $f; ?>" class="head"><?php echo $str[dontagree]; ?></a></b></center></td></tr>
</table>
<?php if ($logged == 1) { echo "</td></tr></table>"; } ?>
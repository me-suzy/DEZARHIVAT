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
$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: $str[rdb]";
adlocbar($locbar,$user,$str);
adminlinks($str);
if ($restore == "do") {
	$backupdata = fread(fopen($dbfile, 'r'), filesize($dbfile));
	$queries = explode("#endquery", $backupdata);
	$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_admin", 0);
	$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_cat", 0);
	$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_custom", 0);
	$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_customdata", 0);
	$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_files", 0);
	$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_license", 0);
	$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_settings", 0);
	$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_votes", 0);
	foreach ($queries as $query) {
		$q = trim($query);
		if (!empty($q)) {
			$pafiledb_sql->query($db, $q, 0);
		}
	}
	?>
	<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
	<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[rdb]; ?></b></center></td></tr>
	<tr><td width="50%" align="left" class="datacell">
	<?php echo $str[rdbdone]; ?></td></tr></table>
	<?php
}
if (empty($restore)) {
	?>
	<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
	<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[rdb]; ?></b></center></td></tr>
	<tr><td width="50%" align="left" class="datacell">
	<FORM ENCTYPE="multipart/form-data" ACTION="pafiledb.php" METHOD=POST>
	<INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="100000000000">
	<?php echo $str[rdbinfo]; ?> <INPUT NAME="dbfile" TYPE="file" class="forminput"><br>
	<center><INPUT TYPE="submit" VALUE=">> <?php echo $str[rdb]; ?> <<"></center>
	<input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="restoredb">
	<input type="hidden" name="restore" value="do">
	</form></td></tr></table>
	<?php
}
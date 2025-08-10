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

$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: $str[stats]</a>";
if ($logged == 1) {
	adlocbar($locbar, $user, $str);
	adminlinks($str);
} else {
	locbar($locbar);
}
$num[cats] = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat", 2);
$num[files] = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files", 2);
$newest = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files ORDER BY file_time DESC", 1);

$oldest = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files ORDER BY file_time ASC", 1);

$popular = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_totalvotes > 0 ORDER BY (file_rating/(file_totalvotes-1)) DESC", 1);

$lpopular = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files ORDER BY (file_rating/file_totalvotes) ASC", 1);

$mostdl = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files ORDER BY file_dls DESC", 1);

$leastdl = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files ORDER BY file_dls ASC", 1);

$totaldls = $pafiledb_sql->query($db, "SELECT SUM(file_dls) FROM $db[prefix]_files", 1);
$avg1 = $pafiledb_sql->query($db, "SELECT SUM(file_rating) FROM $db[prefix]_files", 1);
$avg2 = $pafiledb_sql->query($db, "SELECT SUM(file_totalvotes) FROM $db[prefix]_files", 1);
$avg = @round($avg1[0]/$avg2[0]);
$avgdls = @round($totaldls[0]/$num[files]);
unset ($str);
$least = @round($lpopular[file_rating]/($lpopular[file_totalvotes]-1));
$most = @round($popular[file_rating]/($popular[file_totalvotes]-1));
require "./lang/$config[13].php";
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="100%" class="headercell"><center><b><?php echo $str[stats]; ?></b></center></td></tr>
<tr><td width="100%" class="datacell">
<?php echo $str[statstext]; ?>
</td></tr></table>
<?php if ($logged == 1) { echo "</td></tr></table>"; } ?>
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
$category = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_id = '$id'", 1);
if ($category[5] == 0) { $locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: $category[1]"; }
if ($category[5] > 0) {
	$parent = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_id = '$category[5]'", 1);
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=category&id=$parent[0]\" class=\"small\">$parent[1]</a> :: $category[1]";
}
if ($logged == 1) {
	adlocbar($locbar, $user,$str);
	adminlinks_viewcat($str,$id);
} else {
	locbar($locbar);
}
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '$id' ORDER BY cat_id", 0);
$n = mysql_num_rows($result);
if ($n > 0) {
	echo("<table width=\"100%\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\" class=\"headertable\" bordercolor=\"#000000\">
        <tr><td width=\"90%\" class=\"headercell\"><center><b>$str[category]</b></center></td><td width=\"10%\" class=\"headercell\"><center><b>$str[files]</b></center></td></tr>");
	#$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '$id' ORDER BY cat_id", 0);
	while ($sub = mysql_fetch_object($result)) {
		$filesincat = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_catid = '$sub->cat_id'", 2);
		echo "<tr><td width=\"90%\" class=\"datacell\"><a href=\"pafiledb.php?action=category&id=$sub->cat_id\">$sub->cat_name</a><br><a class=\"smalltext\">&raquo; $sub->cat_desc &laquo;</a></td><td width=\"10%\" class=\"datacell\"><center>$filesincat</center></td></tr>";
	}
	echo"</table><p>";
}
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_catid = '$id' AND file_pin = '1' ORDER BY file_id", 0);
/*PINNED*/
while ($pin = mysql_fetch_object($result)) {
	$date = date("n/j/y", $pin->file_time);
	$ntv = $pin->file_totalvotes - 1;
	if ($pin->file_rating == 0 or $ntv == 0) { $rating = 0; } else {$rating = round($pin->file_rating/$ntv, 2); }
	$filelist .= "<tr><td width=\"5%\" align=\"center\" class=\"datacell\"><img src=\"styles/$config[11]/images/pin.gif\"></td><td width=\"65%\" class=\"datacell\"><a href=\"pafiledb.php?action=file&id=$pin->file_id\" class=\"pin\">$pin->file_name</a><br><a class=\"smalltext\">&raquo; $pin->file_desc &laquo;</a></td><td width=\"10%\" class=\"datacell\"><center>$date</center></td><td width=\"10%\" class=\"datacell\"><center>$rating/10</center></td><td width=\"10%\" class=\"datacell\"><center>$pin->file_dls</center></td></tr>";
}
$start = trim($start);
if (empty($start)) {
	$start = 0;
}
if (empty($sortby)) { $sortby = "name"; }
if ($sortby == "name") {
	$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_pin = '0' AND file_catid = '$id' ORDER BY file_name ASC LIMIT $start,20", 0);
}
if ($sortby == "date") {
	$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_pin = '0' AND file_catid = '$id' ORDER BY file_time DESC LIMIT $start,20", 0);
}
if ($sortby == "downloads") {
	$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_pin = '0' AND file_catid = '$id' ORDER BY file_dls DESC LIMIT $start,20", 0);
}
if ($sortby == "rating") {
	$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_pin = '0' AND file_catid = '$id' ORDER BY (file_rating/file_totalvotes) DESC LIMIT $start,20", 0);
}
$filesincat = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_catid = '$id' AND file_pin = '0'", 2);
if ($filesincat == 0) {
	$filesincat = 1;
}
/*NOT PINNED*/
while ($file = mysql_fetch_object($result)) {
	$date = date("n/j/y", $file->file_time);
	$ntv = $file->file_totalvotes - 1;
	if ($file->file_rating == 0 or $ntv == 0) { $rating = 0; } else {$rating = round($file->file_rating/$ntv, 2); }
	if ($file->file_posticon == "none" or $file->file_posticon == "none.gif") {
		$posticon = "&nbsp;";
	} else {
		$posticon = "<img src=\"images/posticons/$file->file_posticon\">";
	}
	$filelist .= "<tr><td width=\"5%\" align=\"center\" class=\"datacell\">$posticon</td><td width=\"65%\" class=\"datacell\"><a href=\"pafiledb.php?action=file&id=$file->file_id\">$file->file_name</a><br><a class=\"smalltext\">&raquo; $file->file_desc &laquo;</a></td><td width=\"10%\" class=\"datacell\"><center>$date</center></td><td width=\"10%\" class=\"datacell\"><center>$rating/10</center></td><td width=\"10%\" class=\"datacell\"><center>$file->file_dls</center></td></tr>";
}
$numpages = ceil($filesincat / 20);
if ($start + 20 < $filesincat) {
	$newstart = $start + 20;
	$next = "<a href=\"pafiledb.php?action=category&id=$id&start=$newstart&sortby=$sortby\">$str[next] &raquo;</a>";
}
if ($start - 20 >= 0) {
	$newstart = $start - 20;
	$prev = "<a href=\"pafiledb.php?action=category&id=$id&start=$newstart&sortby=$sortby\">&laquo; $str[prev]</a>";
}
for ($i = 0; $i < $numpages; $i++) {
  $newstart = 20*$i;
  $pagenum = $i + 1;
  if ($newstart == $start) {
	 $pages .= "$pagenum ";
  } else {
	  $pages .= "<a href=\"pafiledb.php?action=category&id=$id&start=$newstart&sortby=$sortby\">$pagenum</a> ";
  }
}
$filelist = trim($filelist);
if (!empty($filelist)) {
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="5%" class="headercell"></td><td width="65%" class="headercell"><center><b><?php echo $str[file]; ?></b></center></td><td width="10%" class="headercell"><center><b><?php echo $str[date]; ?></b></center></td><td width="10%" class="headercell"><center><b><?php echo $str[rating]; ?></b></center></td><td width="10%" class="headercell"><center><b><?php echo $str[dls]; ?></b></center></td></tr>
<?php
echo $filelist;
?>
<form action="pafiledb.php" method="post"><input type="hidden" name="action" value="category"><input type="hidden" name="id" value="<?php echo $id; ?>">
<input type="hidden" name="start" value="<?php echo $start; ?>">
<tr><td width="100%" colspan="5" align="center" valign="middle" class="headercell"><?php echo $str[sortby]; ?>: 
<select name="sortby" style="vertical-align:middle">
<option value="name"><?php echo $str[name]; ?></option>
<option value="date"><?php echo $str[date]; ?></option>
<option value="rating"><?php echo $str[rating]; ?></option>
<option value="downloads"><?php echo $str[dls]; ?></option>
</select><input type="submit" value="<?php echo $str[sort]; ?>" style="vertical-align:middle"></center></td></tr></form>
</table>
<table width="100%" border="0" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="33%" class="datacell" align="left"><?php echo $prev; ?></td>
<td width="33%" class="datacell" align="center"><?php echo "$str[pagenums]: $pages"; ?></td>
<td width="34%" class="datacell" align="right"><?php echo $next; ?></td></tr>
</table>
<?php 
} else {
?><table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b>No Files Found</b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
               <td width="95%" class="datacell">No files are in this category.</td></tr></table><?php	
}
if ($logged == 1) { echo "</td></tr></table>"; } ?>
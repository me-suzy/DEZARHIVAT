<?php
/*
  paFileDB 3.0
  ©2001/2002 PHP Arena
  Written by Todd
  todd@phparena.net
  http://www.phparena.net
  Keep all copyright links on the script visible
  Sub category counting bug fix by Kron
  Please read the license included with this script for more information.
*/
$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: $str[mainpage]</a>";
if ($logged == 1) {
	adlocbar($locbar, $user,$str);
	adminlinks($str);
} else {
	locbar($locbar);
}

?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="90%" class="headercell"><center><b><?php echo $str[category]; ?></b></center></td><td width="10%" class="headercell"><center><b><?php echo $str[files]; ?></b></center></td></tr>
<?php
/*Begin Sub Cat counting bug fix. Thanx Kron!!!!!*/
$filesindb = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files", 2);
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat ORDER BY cat_order", 0);
while ($category = mysql_fetch_object($result)) {
$filesincat = 0;
if ($category->cat_parent == 0) {
 $filesincat = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_catid = '$category->cat_id'", 2);
   $subgroups = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = $category->cat_id", 0);
    while($i = mysql_fetch_row($subgroups)) {
     $filesincat += $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_catid = $i[0]", 2);
  }
}
if ($category->cat_parent == 0){
echo "<tr><td width=\"80%\" class=\"datacell\"><a href=\"pafiledb.php?action=category&id=$category->cat_id\">$category->cat_name</a><br><a class=\"smalltext\">&raquo; $category->cat_desc &laquo;</a></td><td width=\"10%\" class=\"datacell\"><center>$filesincat</center></td></tr>";
}
}
/*End Sub Cat counting bug fix.*/
?>
<tr><td width="90%" class="datacell"><a href="pafiledb.php?action=viewall"><?php echo $str[viewall]; ?></a><br><a class="smalltext">&raquo; <?php echo $str[vainfo]; ?> &laquo;</a></td><td width="10%" class="datacell"><center><?php echo $filesindb; ?></center></td></tr>
</table>
<?php if ($logged == 1) { echo "</td></tr></table>"; } ?>
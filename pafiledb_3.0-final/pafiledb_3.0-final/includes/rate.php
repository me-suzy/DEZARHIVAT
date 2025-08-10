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
$f = $id;
$file = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_id = '$f'", 1);
$category = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_id = '$file[file_catid]'", 1);
if ($category[5] == 0) {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=category&id=$file[file_catid]\" class=\"small\">$category[cat_name]</a> :: <a href=\"pafiledb.php?action=file&id=$f\" class=\"small\">$file[file_name]</a> :: $str[rate]";
}
if ($category[5] > 0) {
	$parent = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_id = '$category[5]'", 1);
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=category&id=$parent[cat_id]\" class=\"small\">$parent[cat_name]</a> :: <a href=\"pafiledb.php?action=category&id=$category[cat_id]\" class=\"small\">$category[cat_name]</a> :: <a href=\"pafiledb.php?action=file&id=$f\" class=\"small\">$file[file_name]</a> :: $str[rate]";
}
if ($logged == 1) {
	adlocbar($locbar, $user, $str);
	adminlinks($str);
} else {
	locbar($locbar);
}
?>

<?php
$ipaddy= getenv ("REMOTE_ADDR");
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_votes WHERE votes_ip = '$ipaddy'", 0);
while ($vote = mysql_fetch_object($result)) {
	if ($vote->votes_file == $id) {
		$check = 1;
	}
}
if ($check == 1) {
	?>
	<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
        <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[rate]; ?></b></center></td></tr>
        <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/error.gif" border="0"></td><td width="95%" class="datacell">
	<?php echo $str[rerror];
}
elseif ($rate == "dorate") {
	$conf = str_replace("{filename}", $file[file_name], $str[rconf]);
	$conf = str_replace("{rate}", $rating, $conf);
	if ($file[file_totalvotes] == 1) {
		$add = 0;
	} else {
		$add = 1;
	}
	$update = $pafiledb_sql->query($db, "UPDATE $db[prefix]_files SET file_rating=file_rating+$rating, file_totalvotes=file_totalvotes+1 WHERE file_id = '$id'", 0);
	$ipaddy = getenv ("REMOTE_ADDR");
	$insert = $pafiledb_sql->query($db, "INSERT INTO $db[prefix]_votes VALUES('$ipaddy', '$id')", 0);
	$file = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_id = '$id'", 1);
	if ($file[file_rating] == 0 or $file[file_totalvotes] == 0) { $nrating = 0; } else {$nrating = round($file[file_rating]/($file[file_totalvotes]-1), 2); }
	$conf = str_replace("{newrating}", $nrating, $conf);
	?>
	<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
        <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[rate]; ?></b></center></td></tr>
        <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
        <td width="95%" class="datacell">
        <?php
	echo $conf;
} else {
	$rateinfo = str_replace("{filename}", $file[file_name], $str[rateinfo]);
	?>
	<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
        <tr><td width="100%" class="headercell"><center><b><?php echo $str[rate]; ?></b></center></td></tr>
        <tr><td width="20%" class="datacell">
        <?php echo $rateinfo; ?>
	<form action="pafiledb.php" method="post">
	<select size="1" name="rating" class="forminput">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5" selected>5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <input type="hidden" name="action" value="rate">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="rate" value="dorate">
        </select><center><input type="submit" value=">> <?php echo $str[rate]; ?> <<" name="B1"></center></form>
		<?php
}
?>
</td></tr></table>
<?php if ($logged == 1) { echo "</td></tr></table>"; } ?>
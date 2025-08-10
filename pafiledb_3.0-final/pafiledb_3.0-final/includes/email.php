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
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=category&id=$file[file_catid]\" class=\"small\">$category[cat_name]</a> :: <a href=\"pafiledb.php?action=file&id=$f\" class=\"small\">$file[file_name]</a> :: $str[email]";
}
if ($category[5] > 0) {
	$parent = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_id = '$category[5]'", 1);
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=category&id=$parent[cat_id]\" class=\"small\">$parent[cat_name]</a> :: <a href=\"pafiledb.php?action=category&id=$category[cat_id]\" class=\"small\">$category[cat_name]</a> :: <a href=\"pafiledb.php?action=file&id=$f\" class=\"small\">$file[file_name]</a> :: $str[email]";
}
if ($logged == 1) {
	adlocbar($locbar, $user,$str);
	adminlinks($str);
} else {
	locbar($locbar);
}
if (empty($act)) {
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[email]; ?></b></center></td></tr>
<tr><td width="100%" class="datacell" colspan="2"><?php echo $str[emailinfo]; ?></td></tr>
<form action="pafiledb.php" method="post">
<tr><td width="20%" class="datacell"><?php echo $str[yname]; ?>:</td><td width="80%" class="datacell"><input type="text" size="50" name="sender[name]"></td></tr>
<tr><td width="20%" class="datacell"><?php echo $str[yemail]; ?>:</td><td width="80%" class="datacell"><input type="text" size="50" name="sender[email]"></td></tr>
<tr><td width="20%" class="datacell"><?php echo $str[fname]; ?>:</td><td width="80%" class="datacell"><input type="text" size="50" name="friend[name]"></td></tr>
<tr><td width="20%" class="datacell"><?php echo $str[femail]; ?>:</td><td width="80%" class="datacell"><input type="text" size="50" name="friend[email]"></td></tr>
<tr><td width="20%" class="datacell"><?php echo $str[esub]; ?>:</td><td width="80%" class="datacell"><input type="text" size="50" name="email[subject]" value="<?php echo $file[file_name]; ?>"></td></tr>
<tr><td width="20%" class="datacell"><?php echo $str[etext]; ?></td><td width="80%" class="datacell"><textarea cols="38" rows="10" name="email[message]"><?php echo $str[defaultmail]; ?> <?php echo $config[3]; ?>/pafiledb.php?action=file&id=<?php echo $id; ?></textarea></td></tr>
<tr><td width="100%" class="datacell" colspan="2" align="center"><input type="hidden" name="action" value="email"><input type="hidden" name="act" value="send"><input type="hidden" name="id" value="<?php echo $id; ?>"><input type="submit" value=">> <?php echo $str[semail]; ?> <<"></td></tr></form>
</table>
<?php
}
if ($act == "send") {
	$msg = str_replace("{dbname}", "$config[1]", $str[msg]);
	#$msg .= "Hello $friend[name],\n";
	#$msg .= "$email[message]\n\n";
	#$msg .= "----------\n";
	#$msg .= "This e-mail was sent through the \"$config[1]\" file database. The webmasters of the \"$config[1]\" file database take no responsibility for the e-mails sent through the database.";
	mail("$friend[email]","$email[subject]",$msg,"From: $sender[email]\r\nReply-to: $sender[email]");
	?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[email]; ?></b></center></td></tr>
<tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td><td width="95%" class="datacell"><?php echo $str[econf]; ?></td></tr>
</table>
<?php
}
if ($logged == 1) { echo "</td></tr></table>"; }
?>

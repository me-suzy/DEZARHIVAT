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
$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: $str[asettings]";
adlocbar($locbar,$user,$str);
adminlinks($str);

if ($options == "email") {
	?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[changeemail]; ?></b></center></td></tr>
<tr>
	<?php
	$pafiledb_sql->query($db, "UPDATE $db[prefix]_admin SET admin_email = '$form[email]' WHERE admin_username = '$user'", 0);
	?>
		<td width="5%" align="center" valign="center" class="datacell"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td><td width="95%" class="datacell"><?php echo $str[emailchanged]; ?></td></tr></table>
	<?php
}
if ($options == "password") {
	?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[changepass]; ?></b></center></td></tr>
<tr>
	<?php
	if ($pw[pass] !== $pw[confirm]) {
	?>
		<td width="5%" align="center" valign="center" class="datacell"><img src="styles/<?php echo $config[11]; ?>/images/error.gif" border="0"></td><td width="95%" class="datacell"><?php echo $str[changepasserror]; ?></td>
	<?php
	}
	if ($pw[pass] == $pw[confirm]) {
		$md5 = md5($pw[pass]);
		$pafiledb_sql->query($db, "UPDATE $db[prefix]_admin SET admin_password = '$md5' WHERE admin_username = '$user'", 0);
	?>
		<td width="5%" align="center" valign="center" class="datacell"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td><td width="95%" class="datacell"><?php echo $str[yourpasschanged]; ?></td>
	<?php
	}
	?>
	</tr></table>
	<?php
}
if (empty($options)) {
	$userdata = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_admin WHERE admin_username = '$user'", 1);
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[changepass]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
<tr><td width="50%" class="datacell" align="right"><?php echo $str[newpass]; ?></td><td width="50%" class="datacell"><input type="password" size="50" name="pw[pass]" class="forminput"></td></tr>
<tr><td width="50%" class="datacell" align="right"><?php echo $str[confpass]; ?></td><td width="50%" class="datacell"><input type="password" size="50" name="pw[confirm]" class="forminput"></td></tr>
<tr><td width="100%" class="datacell" colspan="2" align="center"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="options"><input type="hidden" name="options" value="password"><input type="submit" value=">> <?php echo $str[changepass]; ?> <<"></td></form></tr>
<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[changeemail]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
<tr><td width="50%" class="datacell" align="right"><?php echo $str[emailad]; ?></td><td width="50%" class="datacell"><input type="text" size="50" name="form[email]" class="forminput" value="<?php echo $userdata[admin_email]; ?>"></td></tr>
<tr><td width="100%" class="datacell" colspan="2" align="center"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="options"><input type="hidden" name="options" value="email"><input type="submit" value=">> <?php echo $str[changeemail]; ?> <<"></td></form></tr>
</table>
<?php
}
?>
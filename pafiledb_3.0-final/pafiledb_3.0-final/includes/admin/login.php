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
if ($showerr == "1") {
		?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[login]; ?></b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/error.gif" border="0"></td>
               <td width="95%" class="datacell"><?php echo $str[loginerror]; ?></td></tr></table><table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<form action="pafiledb.php" method="post">
<tr><td width="50%" align="right" class="datacell"><?php echo $str[username]; ?></td><td width="50%" align="left" class="datacell"><input type="text" size="50" name="formname" class="forminput"></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[password]; ?></td><td width="50%" align="left" class="datacell"><input type="password" size="50" name="formpass" class="forminput"></td></tr>
<tr><td width="50%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[login]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="login" value="do"></td></tr>
</form>
</table>
	<?php
			exit();
}
if ($login == "do") {
	$admin = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_admin WHERE admin_username = '$formname'", 1);
	$formpw = md5($formpass);
	if ($formpw == $admin[admin_password]) {
		$adminip = getenv ("REMOTE_ADDR");
		$ip = md5($adminip);
		$user = $formname;
		$pass = $formpw;
		if ($authmethod == "cookies") {
			$cookiedata = "$ip|$formname|$formpw";
			setcookie("pafiledbcookie", $cookiedata);
		}
        header("Location: admin.php");
} else {
	header("Location: pafiledb.php?action=admin&ad=login&showerr=1");
		}
} else {
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<form action="pafiledb.php" method="post"><tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[login]; ?></b></center></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[username]; ?></td><td width="50%" align="left" class="datacell"><input type="text" size="50" name="formname" class="forminput"></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[password]; ?></td><td width="50%" align="left" class="datacell"><input type="password" size="50" name="formpass" class="forminput"></td></tr>
<tr><td width="50%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[login]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="login" value="do"></td></tr>
</form>
</table>
<?php	
}
?>
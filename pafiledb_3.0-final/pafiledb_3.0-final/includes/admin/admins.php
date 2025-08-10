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
if ($admin[admin_status] != 1) {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: $str[amanage]";
	adlocbar($locbar,$user,$str);
	adminlinks($str);
	?>
		<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
		<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[amanage]; ?></b></center></td></tr>
		<tr>
		<td width="5%" align="center" valign="center" class="datacell"><img src="styles/<?php echo $config[11]; ?>/images/error.gif" border="0"></td><td width="95%" class="datacell"><?php echo $str[nopermission]; ?></td></tr></table>
	<?php
}
if ($admin[admin_status] == 1) {

	if ($admins == "add") {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=admins\" class=\"small\">$str[amanage]</a> :: $str[aadmin]n";
		adlocbar($locbar,$user,$str);
		adminlinks($str);
		
		?>
		<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
		<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[aadmin]; ?></b></center></td></tr>
		<?php
		if ($add == "do") {
			$form[username] = trim($form[username]);
			$check = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_admin WHERE admin_username = '$form[username]'", 1);
			if (!empty($check[1])) {
				?>
				<tr>
				<td width="5%" align="center" valign="center" class="datacell"><img src="styles/<?php echo $config[11]; ?>/images/error.gif" border="0"></td><td width="95%" class="datacell"><?php echo $str[aadderror]; ?></td></tr>
				<?php
			} else {
				$newpass = md5($form[password]);
				$pafiledb_sql->query($db, "INSERT INTO $db[prefix]_admin VALUES (NULL, '$form[username]', '$newpass', '$form[email]', '$form[status]')", 0);
				?>
				<tr>
				<td width="5%" align="center" valign="center" class="datacell"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td><td width="95%" class="datacell"><?php echo $str[adminadded]; ?></td></tr>
				<?php
			}
		}
		if (empty($add)) {
			?>
			<form action="pafiledb.php" method="post">
			<tr><td width="50%" class="datacell" align="right"><?php echo $str[un]; ?></td><td width="50%" class="datacell"><input type="text" size="50" name="form[username]" class="forminput"><br><a class="small"><?php echo $str[uninfo]; ?></a></td></tr>
			<tr><td width="50%" class="datacell" align="right"><?php echo $str[aemail]; ?></td><td width="50%" class="datacell"><input type="text" size="50" name="form[email]" class="forminput"><br><a class="small"><?php echo $str[aemailinfo]; ?></a></td></tr>
			<tr><td width="50%" class="datacell" align="right"><?php echo $str[apass]; ?></td><td width="50%" class="datacell"><input type="text" size="50" name="form[password]" class="forminput"><br><a class="small"><?php echo $str[apassinfo]; ?></a></td></tr>
			<tr><td width="50%" class="datacell" align="right"><?php echo $str[aeditperm]; ?></td><td width="50%" class="datacell"><select name="form[status]" class="forminput"><option value="0" selected"><?php echo $str[no]; ?></option><option value="1"><?php echo $str[yes]; ?></option></select><br><a class="small"><?php echo $str[aeditperminfo]; ?></a></td></tr>
			<tr><td width="100%" colspan="2" class="datacell" align="center"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="admins"><input type="hidden" name="admins" value="add"><input type="hidden" name="add" value="do"><input type="submit" value=">> <?php echo $str[aadmin]; ?> <<"></td></tr></form>
			<?php
		}
		?>
		</table>
		<?php
	}
	if ($admins == "edit") {
		if ($edit == "do") {
				$a = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_admin WHERE admin_id = '$eadmin'", 1);
				$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=admins\" class=\"small\">$str[amanage]</a> :: <a href=\"pafiledb.php?action=admin&ad=admins&admins=edit\" class=\"small\">$str[eadmin]</a> :: $a[admin_username]";
				adlocbar($locbar,$user,$str);
				adminlinks($str);
				
			if ($do == "password") {
				$md5p = md5($pw[pass]);
				$pafiledb_sql->query($db, "UPDATE $db[prefix]_admin SET admin_password = '$md5p' WHERE admin_id = '$eadmin'", 0);
				?>
				<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
				<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[eadmin]; ?></b></center></td></tr>
				<tr>
				<td width="5%" align="center" valign="center" class="datacell"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td><td width="95%" class="datacell"><?php echo $str[passchanged]; ?></td></tr></table>
				<?php
			}
			if ($do == "info") {
				$pafiledb_sql->query($db, "UPDATE $db[prefix]_admin SET admin_email = '$form[email]', admin_status = '$form[status]' WHERE admin_id = '$eadmin'", 0);
				?>
				<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
				<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[eadmin]; ?></b></center></td></tr>
				<tr>
				<td width="5%" align="center" valign="center" class="datacell"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td><td width="95%" class="datacell"><?php echo $str[infochanged]; ?></td></tr></table>
				<?php
			}
		}
		if ($edit == "form") {
			if (empty($select)) {
				$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=admins\" class=\"small\">$str[amanage]</a> :: $str[eadmin]";
				adlocbar($locbar,$user,$str);
				adminlinks($str);
				
				?>
				<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
				<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[eadmin]; ?></b></center></td></tr>
				<tr>
				<td width="5%" align="center" valign="center" class="datacell"><img src="styles/<?php echo $config[11]; ?>/images/error.gif" border="0"></td><td width="95%" class="datacell"><?php echo $str[editerror]; ?></td></tr></table>
				<?php
			} else {
				$a = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_admin WHERE admin_id = '$select'", 1);
				$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=admins\" class=\"small\">$str[amanage]</a> :: <a href=\"pafiledb.php?action=admin&ad=admins&admins=edit\" class=\"small\">$str[eadmin]</a> :: $a[admin_username]";
				adlocbar($locbar,$user,$str);
				adminlinks($str);
				
				if ($a[admin_status] == 0) {
					$drop .= "<option value=\"0\" selected>$str[no]</option>";
					$drop .= "<option value=\"1\">$str[yes]</option>";
				}
				if ($a[admin_status] == 1) {
					$drop .= "<option value=\"0\">$str[no]</option>";
					$drop .= "<option value=\"1\" selected>$str[yes]</option>";
				}
				?>
				<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
				<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[changepass]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
				<tr><td width="50%" class="datacell" align="right"><?php echo $str[newpass]; ?></td><td width="50%" class="datacell"><input type="text" size="50" name="pw[pass]" class="forminput"></td></tr>
				<tr><td width="100%" class="datacell" colspan="2" align="center"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="admins"><input type="hidden" name="admins" value="edit"><input type="hidden" name="edit" value="do"><input type="hidden" name="do" value="password"><input type="hidden" name="eadmin" value="<?php echo $select; ?>"><input type="submit" value=">> <?php echo $str[changepass]; ?> <<"></td></form></tr>
				<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[eadmin]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
				<tr><td width="50%" class="datacell" align="right"><?php echo $str[aemail]; ?></td><td width="50%" class="datacell"><input type="text" size="50" name="form[email]" class="forminput" value="<?php echo $a[admin_email]; ?>"></td></tr>
				<tr><td width="50%" class="datacell" align="right"><?php echo $str[aeditperm]; ?></td><td width="50%" class="datacell"><select name="form[status]" class="forminput"><?php echo $drop; ?></select><br><a class="small"><?php echo $str[aeditperminfo]; ?></td></tr>
				<tr><td width="100%" class="datacell" colspan="2" align="center"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="admins"><input type="hidden" name="admins" value="edit"><input type="hidden" name="edit" value="do"><input type="hidden" name="do" value="info"><input type="hidden" name="eadmin" value="<?php echo $select; ?>"><input type="submit" value=">> <?php echo $str[eadmin]; ?> <<"></td></form></tr>
				</table>
				<?php
			}
		}
		if (empty($edit)) {
			$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=admins\" class=\"small\">$str[amanage]</a> :: $str[eadmin]";
			adlocbar($locbar,$user,$str);
			adminlinks($str);
			
			?>
			<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
			<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[eadmin]; ?></b></center></td><form action="pafiledb.php" method="post"></tr>
			<?php
			$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_admin", 0);
			while ($a = mysql_fetch_object($result)) {
				echo "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"radio\" name=\"select\" value=\"$a->admin_id\"></td><td width=\"97%\" class=\"datacell\">$a->admin_username</td></tr>\n";
			}
			?>
			<tr><td width="100%" class="datacell" align="center" valign="middle" colspan="2"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="admins"><input type="hidden" name="admins" value="edit"><input type="hidden" name="edit" value="form"><input type="submit" name="submit" value=">> <?php echo $str[eadmin]; ?> <<"></td></tr></form>
			</table>
			<?php
		}
	}
	if ($admins == "delete") {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=admins\" class=\"small\">$str[amanage]</a> :: $str[dadmin]";
		adlocbar($locbar,$user,$str);
		adminlinks($str);
		
		if ($delete == "do") {
			?>
			<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
            <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[dadmin]; ?></b></center></td></tr>
            <?php
			if (empty($select)) {
				?>
               	<tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/error.gif" border="0"></td>
                <td width="95%" class="datacell">
			<?php echo $str[delerror];
			} else {
				foreach ($select as $key => $value) {
					$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_admin WHERE admin_id = '$key'", 0);
		        }
				?>
		        <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
                <td width="95%" class="datacell">
		        <?php echo $str[deleted];
			}
			?>
		</td></tr></table>
			<?php
		}
		if (empty($delete)) {
			$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_admin", 0);
			while ($a = mysql_fetch_object($result)) {
				$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"checkbox\" name=\"select[$a->admin_id]\" value=\"yes\"></td><td width=\"97%\" class=\"datacell\">$a->admin_username</td></tr>\n";
			}
			?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
           <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[dadmin]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
           <?php echo $row; ?>
           <tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[dadmin]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="admins">
           <input type="hidden" name="admins" value="delete"><input type="hidden" name="delete" value="do"></td></tr>
           </table>
		<?php
		}
		
	}
	if (empty($admins)) {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: $str[amanage]";
		adlocbar($locbar,$user,$str);
		adminlinks($str);
		
	?>
		<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
		<tr><td width="100%" class="headercell"><center><b><?php echo $str[amanage]; ?></b></center></td></tr>
		<tr>
		<td width="100%" class="datacell"><?php echo $str[aminfo]; ?><p><center><a href="pafiledb.php?action=admin&ad=admins&admins=add">[<?php echo $str[aadmin]; ?>]</a> - <a href="pafiledb.php?action=admin&ad=admins&admins=edit">[<?php echo $str[eadmin]; ?>]</a> - <a href="pafiledb.php?action=admin&ad=admins&admins=delete">[<?php echo $str[dadmin]; ?>]</a></center></td></tr></table>
	<?php
	}
}
?>
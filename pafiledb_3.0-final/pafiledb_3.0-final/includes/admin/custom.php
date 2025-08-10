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
if ($custom == "add") {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=custom\" class=\"small\">$str[cumanage]</a> :: $str[afield]";
        adlocbar($locbar,$user,$str);
		adminlinks($str);
        
        if ($add == "do") {
        	$pafiledb_sql->query($db, "INSERT INTO $db[prefix]_custom VALUES('NULL', '$form[name]', '$form[description]')", 0);
        	?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[afield]; ?></b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
               <td width="95%" class="datacell"><?php echo $str[fieldadded]; ?></td></tr></table>
	<?php
        }
        if (empty($add)) {
        	?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<form action="pafiledb.php" method="post"><tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[afield]; ?></b></center></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[fieldname]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[name]"><br><a class="small"><?php echo $str[fieldnameinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[fielddesc]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[description]"><br><a class="small"><?php echo $str[fielddescinfo]; ?></td></tr>
<tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[afield]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="custom">
<input type="hidden" name="custom" value="add"><input type="hidden" name="add" value="do"></td></tr>
</form>
</table>	
<?php
        }
	
}
if ($custom == "edit") {
	if ($edit == "do") {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=custom\" class=\"small\">$str[cumanage]</a> :: <a href=\"pafiledb.php?action=admin&ad=custom&custom=edit\" class=\"small\">$str[efield]</a> :: $form[name]";
                adlocbar($locbar,$user,$str);
				adminlinks($str);
                
                $pafiledb_sql->query($db, "UPDATE $db[prefix]_custom SET custom_name = '$form[name]', custom_description = '$form[description]' WHERE custom_id = '$id'", 0);
                ?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[efield]; ?></b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
               <td width="95%" class="datacell"><?php echo $str[fieldedited]; ?></td></tr></table>
	<?php
	}
	if ($edit == "form") {
		$field = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_custom WHERE custom_id = '$select'", 1);
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=custom\" class=\"small\">$str[cumanage]</a> :: <a href=\"pafiledb.php?action=admin&ad=custom&custom=edit\" class=\"small\">$str[efield]</a> :: $field[custom_name]";
        adlocbar($locbar,$user,$str);
		adminlinks($str);
        
        ?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<form action="pafiledb.php" method="post"><tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[efield]; ?></b></center></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[fieldname]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[name]" value="<?php echo $field[custom_name]; ?>"><br><a class="small"><?php echo $str[fieldnameinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[fielddesc]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[description]" value="<?php echo $field[custom_description]; ?>"><br><a class="small"><?php echo $str[fielddescinfo]; ?></td></tr>
<tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[efield]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="custom">
<input type="hidden" name="custom" value="edit"><input type="hidden" name="id" value="<?php echo $select; ?>"><input type="hidden" name="edit" value="do"></td></tr>
</form>
</table>	
<?php
	}
	if (empty($edit)) {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=custom\" class=\"small\">$str[cumanage]</a> :: $str[efield]";
        adlocbar($locbar,$user,$str);
		adminlinks($str);
        
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_custom", 0);
		while ($field = mysql_fetch_object($result)) {
			$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"radio\" name=\"select\" value=\"$field->custom_id\"></td><td width=\"97%\" class=\"datacell\">$field->custom_name<br><a class=\"small\">&raquo; $field->custom_description &laquo;</td></tr>\n";
		}
		?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[efield]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
               <?php echo $row; ?>
               <tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[efield]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="custom">
               <input type="hidden" name="custom" value="edit"><input type="hidden" name="edit" value="form"></td></tr>
               </table>
	<?php
	}
	
}
if ($custom == "delete") {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=custom\" class=\"small\">$str[cumanage]</a> :: $str[dfield]";
        adlocbar($locbar,$user,$str);
		adminlinks($str);
        
	if ($delete == "do") {
            if (empty($select)) { 
			?>
			   <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[dfield]; ?></b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/error.gif" border="0"></td>
               <td width="95%" class="datacell"><?php echo $str[dfielderror]; ?></td></tr></table>
			<?php
		} else {
		        foreach ($select as $key => $value) {
					$thisworld = "$db[prefix]_custom";
					$bastard = "custom_id";
					$osama = $key;
			        $pafiledb_sql->query($db, "DELETE FROM $thisworld WHERE $bastard = '$osama'", 0);
			        $pafiledb_sql->query($db, "DELETE FROM $db[prefix]_customdata WHERE customdata_custom = '$key'", 0);
		        }
		        ?>
			   <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[dfield]; ?></b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
               <td width="95%" class="datacell"><?php echo $str[fieldsdel]; ?></td></tr></table>
			<?php
		}
	}
	if (empty($delete)) {
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_custom", 0);
		while ($field = mysql_fetch_object($result)) {
			$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"checkbox\" name=\"select[$field->custom_id]\" value=\"yes\"></td><td width=\"97%\" class=\"datacell\">$field->custom_name<br><a class=\"small\">&raquo; $field->custom_description &laquo;</td></tr>\n";
		}
		?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[dfield]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
               <?php echo $row; ?>
               <tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[dfield]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="custom">
               <input type="hidden" name="custom" value="delete"><input type="hidden" name="delete" value="do"></td></tr>
               </table>
	<?php
	}
}
if (empty($custom)) {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: $str[cumanage]";
        adlocbar($locbar,$user,$str);
		adminlinks($str);
        
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="100%"><center><b><?php echo $str[cumanage]; ?></b></center></td></tr>
<tr><td width="100%" class="datacell"><?php echo $str[custominfo]; ?>
<center>
<a href="pafiledb.php?action=admin&ad=custom&custom=add">[<?php echo $str[afield]; ?>]</a> -
<a href="pafiledb.php?action=admin&ad=custom&custom=edit">[<?php echo $str[efield]; ?>]</a> -
<a href="pafiledb.php?action=admin&ad=custom&custom=delete">[<?php echo $str[dfield]; ?>]</a></center>
</td></tr></table>
<?php
	
}
?>
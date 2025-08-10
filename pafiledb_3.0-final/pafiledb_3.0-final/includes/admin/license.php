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
if ($license == "add") {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=license\" class=\"small\">$str[lmanage]</a> :: $str[alicense]";
        adlocbar($locbar,$user,$str);
        adminlinks($str);
        
        if ($add == "do") {
        	$text = str_replace("\n", "<br>", $form[text]);
        	$pafiledb_sql->query($db, "INSERT INTO $db[prefix]_license VALUES('NULL', '$form[name]', '$text')", 0);
        	?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[alicense]; ?>e</b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
               <td width="95%" class="datacell"><?php echo $str[licenseadded]; ?></td></tr></table>
	<?php
        }
        if (empty($add)) {
        	?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<form action="pafiledb.php" method="post"><tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[alicense]; ?></b></center></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[lname]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[name]"></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[ltext]; ?></td><td width="50%" align="left" class="datacell"><textarea name="form[text]" cols="50" rows="10" class="forminput"></textarea></td></tr>
<tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[alicense]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="license">
<input type="hidden" name="license" value="add"><input type="hidden" name="add" value="do"></td></tr>
</form>
</table>	
<?php
        }
	
}
if ($license == "edit") {
	if ($edit == "do") {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=license\" class=\"small\">$str[lmanage]</a> :: <a href=\"pafiledb.php?action=admin&ad=license&license=edit\" class=\"small\">$str[elicense]</a> :: $form[name]";
                adlocbar($locbar,$user,$str);
                adminlinks($str);
                
                $text = str_replace("\n", "<br>", $form[text]);
                $pafiledb_sql->query($db, "UPDATE $db[prefix]_license SET license_name = '$form[name]', license_text = '$text' WHERE license_id = '$id'", 0);
                ?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[elicense]; ?></b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
               <td width="95%" class="datacell"><?php echo $str[licenseedited]; ?></td></tr></table>
	<?php
	}
	if ($edit == "form") {
		$l = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_license WHERE license_id = '$select'", 1);
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=license\" class=\"small\">$str[lmanage]</a> :: <a href=\"pafiledb.php?action=admin&ad=license&license=edit\" class=\"small\">$str[elicense]</a> :: $l[license_name]";
                adlocbar($locbar,$user,$str);
                adminlinks($str);
                
                $text = str_replace("<br>", "\n", $l[license_text]);
                ?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<form action="pafiledb.php" method="post"><tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[elicense]; ?></b></center></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[lname]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[name]" value="<?php echo $l[license_name]; ?>"></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[ltext]; ?></td><td width="50%" align="left" class="datacell"><textarea name="form[text]" cols="50" rows="10" class="forminput"><?php echo $text; ?></textarea></td></tr>
<tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">><?php echo $str[elicense]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="license">
<input type="hidden" name="license" value="edit"><input type="hidden" name="edit" value="do"><input type="hidden" name="id" value="<?php echo $select; ?>"></td></tr>
</form>
</table>	
<?php
	}
	if (empty($edit)) {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=license\" class=\"small\">$str[lmanage]</a> :: $str[elicense]";
                adlocbar($locbar,$user,$str);
                adminlinks($str);
                
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_license", 0);
		while ($l = mysql_fetch_object($result)) {
			$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"radio\" name=\"select\" value=\"$l->license_id\"></td><td width=\"97%\" class=\"datacell\">$l->license_name</td></tr>\n";
		}
		?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[elicense]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
               <?php echo $row; ?>
               <tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[elicense]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="license">
               <input type="hidden" name="license" value="edit"><input type="hidden" name="edit" value="form"></td></tr>
               </table>
	<?php
	}
	
}
if ($license == "delete") {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=license\" class=\"small\">$str[lmanage]</a> :: $str[dlicense]";
        adlocbar($locbar,$user,$str);
        adminlinks($str);
        
	if ($delete == "do") {
		?>
	<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[dlicense]; ?></b></center></td></tr>
               
               <?php
               	if (empty($select)) { 
               		?>
               		<tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/error.gif" border="0"></td>
                        <td width="95%" class="datacell">
			
			<?php echo $str[lderror];
		} else {
		        foreach ($select as $key => $value) {
			        $pafiledb_sql->query($db, "DELETE FROM $db[prefix]_license WHERE license_id = '$key'", 0);
			        $pafiledb_sql->query($db, "UPDATE $db[prefix]_files SET file_license = '0' WHERE file_license = '$key'", 0);
		        }
		        ?>
		        <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
                        <td width="95%" class="datacell">
		        
		        <?php echo $str[ldeleted];
		}
	?>
	</td></tr></table>
	<?php
	}
	if (empty($delete)) {
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_license", 0);
		while ($l = mysql_fetch_object($result)) {
			$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"checkbox\" name=\"select[$l->license_id]\" value=\"yes\"></td><td width=\"97%\" class=\"datacell\">$l->license_name</td></tr>\n";
		}
		?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[dlicense]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
               <?php echo $row; ?>
               <tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[dlicense]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="license">
               <input type="hidden" name="license" value="delete"><input type="hidden" name="delete" value="do"></td></tr>
               </table>
	<?php
	}
}
if (empty($license)) {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: $str[lmanage]";
        adlocbar($locbar,$user,$str);
        adminlinks($str);
        
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="100%" class="headercell"><center><b><?php echo $str[lmanage]; ?></b></center></td></tr>
<tr><td width="100%" class="datacell"><?php echo $str[lmanageinfo]; ?>
<center>
<a href="pafiledb.php?action=admin&ad=license&license=add">[<?php echo $str[alicense]; ?>]</a> -
<a href="pafiledb.php?action=admin&ad=license&license=edit">[<?php echo $str[elicense]; ?>]</a> -
<a href="pafiledb.php?action=admin&ad=license&license=delete">[<?php echo $str[dlicense]; ?>]</a></center>
</td></tr></table>
<?php
	
}
?>
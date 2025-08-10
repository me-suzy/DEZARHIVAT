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
if ($category == "add") {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=category\" class=\"small\">$str[cmanage]</a> :: $str[acat]";
        adlocbar($locbar,$user,$str);
		adminlinks($str);
        
	if ($add == "do") {
		$pafiledb_sql->query($db, "INSERT INTO $db[prefix]_cat VALUES('NULL', '$form[name]', '$form[description]', '0', '0', '$form[parent]', '0')", 0);
		$cid = mysql_insert_id();
		$pafiledb_sql->query($db, "UPDATE $db[prefix]_cat SET cat_order = '$cid' WHERE cat_id = '$cid'", 0);
		?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[acat]; ?>y</b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
               <td width="95%" class="datacell"><?php echo $str[catadded]; ?></td></tr></table>
	<?php
	}
	if (empty($add)) {
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '0' ORDER BY cat_order", 0);
		while ($cat = mysql_fetch_object($result)) {
			$dropmenu .= "<option value=\"$cat->cat_id\">$cat->cat_name</option>\n";
		}
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<form action="pafiledb.php" method="post"><tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[acat]; ?></b></center></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[catname]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[name]"><br><a class="small"><?php echo $str[catnameinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[catdesc]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[description]"><br><a class="small"><?php echo $str[catdescinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[catparent]; ?></td><td width="50%" align="left" class="datacell">
<select name="form[parent]" class="forminput">
<option value="0" selected><?php echo $str[none]; ?></option>
<?php echo $dropmenu; ?>
</select>
<br><a class="small"><?php echo $str[catparentinfo]; ?></td></tr>
<tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[acat]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="category">
<input type="hidden" name="category" value="add"><input type="hidden" name="add" value="do"></td></tr>
</form>
</table>	
<?php
}

}
if ($category == "edit") {
	if ($edit == "do") {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=category\" class=\"small\">$str[cmanage]</a> :: <a href=\"pafiledb.php?action=admin&ad=category&category=edit\" class=\"small\">$str[ecat]</a> :: $form[name]";
                adlocbar($locbar,$user,$str);
				adminlinks($str);
                
		$pafiledb_sql->query($db, "UPDATE $db[prefix]_cat SET cat_name = '$form[name]', cat_desc = '$form[description]', cat_parent = '$form[parent]' WHERE cat_id = '$id'", 0);
		?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[ecat]; ?></b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
               <td width="95%" class="datacell"><?php echo $str[catedited]; ?></td></tr></table>
	<?php
		
	}
	if ($edit == "form") {
		$cat = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_id = '$select'", 1);
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '0' ORDER BY cat_order", 0);
		if ($cat[cat_parent] == 0) {
			$dropmenu .= "<option value=\"0\" selected>$str[none]</option>\n";
		} else {
			$dropmenu .= "<option value=\"0\">$str[none]</option>\n";
		}
		while ($parents = mysql_fetch_object($result)) {
		
			if ($cat[cat_parent] == $parents->cat_id) {
				$dropmenu .= "<option value=\"$parents->cat_id\" selected>$parents->cat_name</option>\n";
			} 
			if ($cat[cat_parent] !== $parents->cat_id && $cat[cat_parent] !== 0) {
				$dropmenu .= "<option value=\"$parents->cat_id\">$parents->cat_name</option>\n";
			}
		}
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=category\" class=\"small\">$str[cmanage]</a> :: <a href=\"pafiledb.php?action=admin&ad=category&category=edit\" class=\"small\">$str[ecat]</a> :: $cat[cat_name]";
                adlocbar($locbar,$user,$str);
				adminlinks($str);
                
                ?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<form action="pafiledb.php" method="post"><tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[ecat]; ?></b></center></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[catname]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[name]" value="<?php echo $cat[cat_name]?>"><br><a class="small"><?php echo $str[catnameinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[catdesc]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[description]" value="<?php echo $cat[cat_desc]?>"><br><a class="small"><?php echo $str[catdescinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[catparent]; ?></td><td width="50%" align="left" class="datacell">
<select name="form[parent]" class="forminput">
<?php echo $dropmenu; ?>
</select>
<br><a class="small"><?php echo $str[catparentinfo]; ?></td></tr>
<tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[ecat]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="category">
<input type="hidden" name="category" value="edit"><input type="hidden" name="edit" value="do"><input type="hidden" name="id" value="<?php echo $select; ?>"></td></tr>
</form>
</table>	
<?php
		
	}
	if (empty($edit)) {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=category\" class=\"small\">$str[cmanage]</a> :: $str[ecat]";
                adlocbar($locbar,$user,$str);
				adminlinks($str);
                
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat ORDER BY cat_order", 0);
		while ($cat = mysql_fetch_object($result)) {
			if ($cat->cat_parent == 0) {
			        $row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"radio\" name=\"select\" value=\"$cat->cat_id\"></td><td width=\"97%\" class=\"datacell\">$cat->cat_name<br><a class=\"small\">&raquo; $cat->cat_desc &laquo;</td></tr>\n";
			        $subs = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '$cat->cat_id'", 0);
			        while ($sub = mysql_fetch_object($subs)) {
			        	$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"radio\" name=\"select\" value=\"$sub->cat_id\"></td><td width=\"97%\" class=\"datacell\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$sub->cat_name<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"small\">&raquo; $sub->cat_desc &laquo;</td></tr>\n";
			        }
			}
		}
		?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[ecat]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
               <?php echo $row; ?>
               <tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[ecat]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="category">
               <input type="hidden" name="category" value="edit"><input type="hidden" name="edit" value="form"></td></tr>
               </table>
	<?php
		
	}
	
}
if ($category == "delete") {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=category\" class=\"small\">$str[cmanage]</a> :: $str[dcat]";
        adlocbar($locbar,$user,$str);
		adminlinks($str);
        
	if ($delete == "do") {
	?>
	<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[dcat]; ?></b></center></td></tr>
               
               <?php
		if (empty($select)) {
			?> 
			<tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/error.gif" border="0"></td>
                        <td width="95%" class="datacell">
			
			<?php echo $str[cdelerror];
		} else {
		        foreach ($select as $key => $value) {
			        $pafiledb_sql->query($db, "DELETE FROM $db[prefix]_cat WHERE cat_id = '$key'", 0);
			        if ($delfiles == "yes") {
			        	$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_files WHERE file_catid = '$key'", 0);
			        }
		        }
		        ?>
		        <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
                        <td width="95%" class="datacell">
		        <?php echo $str[catsdeleted];
		}
	?>
	</td></tr></table>
	<?php
	}
	if (empty($delete)) {
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '0' ORDER BY cat_order", 0);
		while ($cat = mysql_fetch_object($result)) {
			if ($check == $cat->cat_id) {
				$checkbox = " checked";
				$openbold = "<b>";
				$closebold = "</b>";
			} else {
				$checkbox = "";
				$openbold = "";
				$closebold = "";
			}
			$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"checkbox\" name=\"select[$cat->cat_id]\" value=\"yes\" $checkbox></td><td width=\"97%\" class=\"datacell\">$openbold$cat->cat_name<br><a class=\"small\">&raquo; $cat->cat_desc &laquo;$closebold</td></tr>\n";
			$subs = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '$cat->cat_id'", 0);
			while ($sub = mysql_fetch_object($subs)) {
				if ($check == $sub->cat_id) {
					$checkbox = " checked";
					$openbold = "<b>";
					$closebold = "</b>";
				} else {
					$checkbox = "";
					$openbold = "";
					$closebold = "";
				}
				$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"checkbox\" name=\"select[$sub->cat_id]\" value=\"yes\" $checkbox></td><td width=\"97%\" class=\"datacell\">$openbold&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$sub->cat_name<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"small\">&raquo; $sub->cat_desc &laquo;$closebold</td></tr>\n";
			}
		}
		?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[dcat]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
               <?php echo $row; ?>
               <tr><td width="100%" class="datacell" colspan="2"><?php echo $str[delfiles]; ?>&nbsp;&nbsp;<input type="radio" value="yes" checked name="delfiles"><?php echo $str[yes]; ?>&nbsp;&nbsp;<input type="radio" name="delfiles" value="no"><?php echo $str[no]; ?></td></tr>
               <tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[dcat]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="category">
               <input type="hidden" name="category" value="delete"><input type="hidden" name="delete" value="do"></td></tr>
               </table>
	<?php
		
	}
	
	
} 
if ($category == "order") {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=category\" class=\"small\">$str[cmanage]</a> :: $str[rcat]";
        adlocbar($locbar,$user,$str);
		adminlinks($str);
        
	if ($order == "do") {
		?>
	<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[rcat]; ?></b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
               <td width="95%" class="datacell">
               <?php
		foreach($num as $key => $value) {
			$pafiledb_sql->query($db, "UPDATE $db[prefix]_cat SET cat_order = '$value' WHERE cat_id = '$key'", 0);
		}
		echo $str[rcatdone];
	?>
	</td></tr></table>
	<?php
		
	}
	if (empty($order)) {
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '0' ORDER BY cat_order", 0);
		while ($cat = mysql_fetch_object($result)) {
			$rows .= "<tr><td width=\"5%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"text\" name=\"num[$cat->cat_id]\" value=\"$cat->cat_order\" size=\"2\"></td><td width=\"95%\" class=\"datacell\">$cat->cat_name<br><a class=\"small\">&raquo; $cat->cat_desc &laquo;</td></tr>\n";
		}
	?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[rcat]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
               <tr><td width="100%" align="center" class="datacell" colspan="2"><?php echo $str[rcatinfo]; ?></td></tr>
               <?php echo $rows; ?>
               <tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[rcat]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="category">
               <input type="hidden" name="category" value="order"><input type="hidden" name="order" value="do"></td></tr>
               </table>
	<?php
		
	}
}
if (empty($category)) {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: $str[cmanage]";
        adlocbar($locbar,$user,$str);
		adminlinks($str);
        
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="100%" class="headercell"><center><b><?php echo $str[cmanage]; ?></b></center></td></tr>
<tr><td width="100%" class="datacell"><?php echo $str[cmaninfo]; ?><p><center>
<a href="pafiledb.php?action=admin&ad=category&category=add">[<?php echo $str[acat]; ?>]</a> -
<a href="pafiledb.php?action=admin&ad=category&category=edit">[<?php echo $str[ecat]; ?>]</a> -
<a href="pafiledb.php?action=admin&ad=category&category=delete">[<?php echo $str[dcat]; ?>]</a> -
<a href="pafiledb.php?action=admin&ad=category&category=order">[<?php echo $str[rcat]; ?>]</a></center>
</td></tr></table>
<?php
}
?>
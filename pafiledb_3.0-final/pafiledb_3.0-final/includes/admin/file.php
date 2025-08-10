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
?>
<SCRIPT LANGUAGE='JAVASCRIPT' TYPE='TEXT/JAVASCRIPT'>
 <!--
/****************************************************
     AUTHOR: WWW.CGISCRIPT.NET, LLC
     URL: http://www.cgiscript.net
     Use the code for FREE but leave this message intact.
     Download your FREE CGI/Perl Scripts today!
     ( http://www.cgiscript.net/scripts.htm )
****************************************************/
var win=null;
function NewWindow(mypage,myname,w,h,pos,infocus){
if(pos=="random"){myleft=(screen.width)?Math.floor(Math.random()*(screen.width-w)):100;mytop=(screen.height)?Math.floor(Math.random()*((screen.height-h)-75)):100;}
if(pos=="center"){myleft=(screen.width)?(screen.width-w)/2:100;mytop=(screen.height)?(screen.height-h)/2:100;}
else if((pos!='center' && pos!="random") || pos==null){myleft=0;mytop=20}
settings="width=" + w + ",height=" + h + ",top=" + mytop + ",left=" + myleft + ",scrollbars=yes,location=no,directories=no,status=yes,menubar=no,toolbar=no,resizable=no";win=window.open(mypage,myname,settings);
win.focus();}
// -->
</script>
<?php
if ($file == "upload") {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=file\" class=\"small\">$str[fmanage]</a> :: $str[upload]";
    adlocbar($locbar,$user,$str);
    adminlinks($str);
    
	if ($upload == "do") {
	?>
	<script language="JavaScript">
        function seturl(url) {
        opener.document.form.dlurl.value = url;
	}
	</script>
	<?php
		if (file_exists("./uploads/$userfile_name")) {
			?>
			<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
           <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[upload]; ?></b></center></td></tr>
           <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/error.gif" border="0"></td><td width="95%" class="datacell"><?php echo $str[uploaderror]; ?>
           </td></tr></table>
			<?php
		} else {
		if (is_uploaded_file($userfile)) {
			move_uploaded_file($userfile, "./uploads/$userfile_name");
            $url = "http://$HTTP_SERVER_VARS[HTTP_HOST]".str_replace("pafiledb.php", "uploads/$userfile_name", $HTTP_SERVER_VARS[SCRIPT_NAME]);
		}
		   ?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
           <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[upload]; ?></b></center></td></tr>
           <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td><td width="95%" class="datacell"><?php echo "$str[uploaddone] $url<br><a href=\"javascript:seturl('$url')\">$str[uploaddone2]</a>"; ?>
           </td></tr></table>
	       <?php
	}
	}
	if (empty($upload)) {
		?>
		<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
		<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[upload]; ?></b></center></td></tr>
		<tr><td width="50%" align="left" class="datacell">
		<FORM ENCTYPE="multipart/form-data" ACTION="pafiledb.php" METHOD=POST>
		<INPUT TYPE="hidden" name="MAX_FILE_SIZE" value="100000000000">
		<?php echo $str[uploadinfo]; ?>: <INPUT NAME="userfile" TYPE="file" class="forminput"><br>
		<center><INPUT TYPE="submit" VALUE=">> <?php echo $str[upload]; ?> <<"></center>
		<input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="file">
		<input type="hidden" name="file" value="upload"><input type="hidden" name="upload" value="do">
		</form></td></tr></table>
		<?php
	}
}
if ($file == "add") {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=file\" class=\"small\">$str[fmanage]</a> :: $str[afile]";
        adlocbar($locbar,$user,$str);
        adminlinks($str);
        
	if ($add == "do") {
		$time = time();
		$pafiledb_sql->query($db, "INSERT INTO $db[prefix]_files VALUES('NULL', '$form[name]', '$form[shortdesc]', '$form[creator]', '$form[version]', '$form[longdesc]', '$form[ss]', '$dlurl', '$time', '$form[category]', '$form[posticon]', '$form[license]', '0', '0', '$form[pin]', '$form[docs]', '0', '1')", 0);
		$fid = mysql_insert_id();
		if (!empty($custom)) {
			foreach ($custom as $key => $value) {
				$value = trim($value);
				if (!empty($value)) { $pafiledb_sql->query($db, "INSERT INTO $db[prefix]_customdata VALUES('$fid', '$key', '$value')", 0); }
			}
		}
		?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[afile]; ?></b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
               <td width="95%" class="datacell"><?php echo $str[fileadded]; ?></td></tr></table>
	<?php
	}
	if (empty($add)) {
		$curicons = 1;
		$posticons .= "<input type=\"radio\" name=\"form[posticon]\" value=\"none\" checked><a class=\"small\">$str[none]</a>&nbsp;";
		$handle=opendir('./images/posticons');
		while (false!==($icon = readdir($handle))) {
			if ($icon !== "." && $icon !== "..") {
				$posticons .= "<input type=\"radio\" name=\"form[posticon]\" value=\"$icon\"><img src=\"images/posticons/$icon\">&nbsp;";
                                $curicons++;
                                if ($curicons == 8) {
                                	$posticons .= "<br>";
                                	$curicons = 0;
                                }
                        }
                }
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '0' ORDER BY cat_order", 0);
		while ($cat = mysql_fetch_object($result)) {
			$dropmenu .= "<option value=\"$cat->cat_id\">$cat->cat_name</option>\n";
			$result2 = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '$cat->cat_id' ORDER BY cat_id", 0);
			while ($sub = mysql_fetch_object($result2)) {
				$dropmenu .= "<option value=\"$sub->cat_id\">--$sub->cat_name</option>\n";
			}
		}
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_license ORDER BY license_id", 0);
		while ($license = mysql_fetch_object($result)) {
			$ldropmenu .= "<option value=\"$license->license_id\">$license->license_name</option>\n";
		}
		$path = str_replace("/pafiledb.php", "", $PHP_SELF);
		$dburl = "http://$HTTP_SERVER_VARS[HTTP_HOST]$path";
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<form action="pafiledb.php" method="post" name="form"><tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[afile]; ?></b></center></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filename]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[name]"><br><a class="small"><?php echo $str[filenameinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filesd]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[shortdesc]"><br><a class="small"><?php echo $str[filesdinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[fileld]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[longdesc]"><br><a class="small"><?php echo $str[fileldinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filecreator]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[creator]"><br><a class="small"><?php echo $str[filecreatorinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[fileversion]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[version]"><br><a class="small"><?php echo $str[fileversioninfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filess]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[ss]"><br><a class="small"><?php echo $str[filessinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filedocs]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[docs]"><br><a class="small"><?php echo $str[filedocsinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[fileurl]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="dlurl" value="<?php echo $dburl; ?>"><br><a class="small"><?php echo $str[fileurlinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filepi]; ?></td><td width="50%" align="left" class="datacell"><?php echo $posticons; ?><br><a class="small"><?php echo $str[filepiinfo]; ?></a></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filecat]; ?></td><td width="50%" align="left" class="datacell">
<select name="form[category]" class="forminput">
<?php echo $dropmenu; ?>
</select>
<br><a class="small"><?php echo $str[filecatinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filelicense]; ?></td><td width="50%" align="left" class="datacell">
<select name="form[license]" class="forminput">
<option value="0"><?php echo $str[none]; ?></option>
<?php echo $ldropmenu; ?>
</select>
<br><a class="small"><?php echo $str[filelicenseinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filepin]; ?></td><td width="50%" align="left" class="datacell">
<select name="form[pin]" class="forminput">
<option value="0" selected><?php echo $str[no]; ?></option>
<option value="1"><?php echo $str[yes]; ?></option>
</select>
<br><a class="small"><?php echo $str[filepininfo]; ?></td></tr>
<?php
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_custom", 0);
while ($field = mysql_fetch_object($result)) {
	echo "<tr><td width=\"50%\" align=\"right\" class=\"datacell\">$field->custom_name</td><td width=\"50%\" align=\"left\" class=\"datacell\"><input type=\"text\" size=\"50\" name=\"custom[$field->custom_id]\" class=\"forminput\"><br><a class=\"small\">$field->custom_description</td></tr>";
}	
?>
<tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[afile]; ?><<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="file">
<input type="hidden" name="file" value="add"><input type="hidden" name="add" value="do"></td></tr>
</form>
</table>	
<?php
	}
}
if ($file == "edit") {
	if ($edit == "do") {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=file\" class=\"small\">$str[fmanage]</a> :: <a href=\"pafiledb.php?action=admin&ad=file&file=edit\" class=\"small\">$str[efile]</a> :: $form[name]";
                adlocbar($locbar,$user,$str);
                adminlinks($str);
                
                $query .= "UPDATE $db[prefix]_files SET ";
                $query .= "file_name = '$form[name]', ";
                $query .= "file_desc = '$form[shortdesc]', ";
                $query .= "file_longdesc = '$form[longdesc]', ";
                $query .= "file_creator = '$form[creator]', ";
                $query .= "file_version = '$form[version]', ";
                $query .= "file_ssurl = '$form[ss]', ";
                $query .= "file_dlurl = '$dlurl', ";
                $query .= "file_catid = '$form[category]', ";
                $query .= "file_posticon = '$form[posticon]', ";
                $query .= "file_license = '$form[license]', ";
                $query .= "file_pin = '$form[pin]', ";
                $query .= "file_docsurl = '$form[docs]' ";
                $query .= "WHERE file_id = '$id'";
		$pafiledb_sql->query($db, $query, 0);
		if (!empty($custom)) {
		foreach ($custom as $key => $value) {
			$value = trim($value);
			$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_customdata WHERE customdata_file = '$id' AND customdata_custom = '$key'", 0);
			if (!empty($value)) {
				$pafiledb_sql->query($db, "INSERT INTO $db[prefix]_customdata VALUES('$id', '$key', '$value')", 0);
			}
		}
		}
		?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[efile]; ?></b></center></td></tr>
               <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
               <td width="95%" class="datacell"><?php echo $str[fileedited]; ?></td></tr></table>
	<?php
	}
	if ($edit == "form") {
		$f = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_id = '$id'", 1);
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=file\" class=\"small\">$str[fmanage]</a> :: <a href=\"pafiledb.php?action=admin&ad=file&file=edit\" class=\"small\">$str[efile]</a> :: $f[file_name]";
                adlocbar($locbar,$user,$str);
                adminlinks($str);
                
		$curicons = 1;
		if ($f[file_posticon] == "none" or $f[file_posticon] == "none.gif" or empty($f[file_posticon])) {
			$posticons .= "<input type=\"radio\" name=\"form[posticon]\" value=\"none\" checked><a class=\"small\">$str[none]</a>&nbsp;";
		} else {
			$posticons .= "<input type=\"radio\" name=\"form[posticon]\" value=\"none\"><a class=\"small\">$str[none]</a>&nbsp;";
		}
		$handle=opendir('./images/posticons');
		while (false!==($icon = readdir($handle))) {
			if ($icon !== "." && $icon !== "..") {
				if ($f[file_posticon] == "$icon") {
					$posticons .= "<input type=\"radio\" name=\"form[posticon]\" value=\"$icon\" checked><img src=\"images/posticons/$icon\">&nbsp;";
                                } else {
                                	$posticons .= "<input type=\"radio\" name=\"form[posticon]\" value=\"$icon\"><img src=\"images/posticons/$icon\">&nbsp;";
                                }
                                $curicons++;
                                if ($curicons == 8) {
                                	$posticons .= "<br>";
                                	$curicons = 0;
                                }
                        }
                }
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '0' ORDER BY cat_order", 0);
		while ($cat = mysql_fetch_object($result)) {
			if ($f[file_catid] == $cat->cat_id) {
				$dropmenu .= "<option value=\"$cat->cat_id\" selected>$cat->cat_name</option>\n";
			} else {
				$dropmenu .= "<option value=\"$cat->cat_id\">$cat->cat_name</option>\n";
			}
			$result2 = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '$cat->cat_id' ORDER BY cat_id", 0);
			while ($sub = mysql_fetch_object($result2)) {
				if ($f[file_catid] == $sub->cat_id) {
					$dropmenu .= "<option value=\"$sub->cat_id\" selected>--$sub->cat_name</option>\n";
				} else {
					$dropmenu .= "<option value=\"$sub->cat_id\">--$sub->cat_name</option>\n";
				}
			}
		}
		if ($f[file_license] == 0) {
			$ldropmenu .= "<option calue=\"0\" selected>$str[none]</option>\n";
		} else {
			$ldropmenu .= "<option calue=\"0\">$str[none]</option>\n";
		}
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_license ORDER BY license_id", 0);
		while ($license = mysql_fetch_object($result)) {
			if ($f[file_license] == $license->license_id) {
				$ldropmenu .= "<option value=\"$license->license_id\" selected>$license->license_name</option>\n";
			} else {
				$ldropmenu .= "<option value=\"$license->license_id\">$license->license_name</option>\n";
			}
		}
		if ($f[file_pin] == 0) {
			$pdropmenu .= "<option value=\"0\" selected>$str[no]</option>\n";
			$pdropmenu .= "<option value=\"1\">$str[yes]</option>\n";
		} else {
			$pdropmenu .= "<option value=\"0\">$str[no]</option>\n";
			$pdropmenu .= "<option value=\"1\" selected>$str[yes]</option>\n";
		}
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<form action="pafiledb.php" method="post" name="form"><tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[efile]; ?></b></center></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filename]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[name]" value="<?php echo $f[file_name]; ?>"><br><a class="small"><?php echo $str[filenameinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filesd]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[shortdesc]" value="<?php echo $f[file_desc]; ?>"><br><a class="small"><?php echo $str[filesdinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[fileld]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[longdesc]" value="<?php echo $f[file_longdesc]; ?>"><br><a class="small"<?php echo $str[fileldinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filecreator]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[creator]" value="<?php echo $f[file_creator]; ?>"><br><a class="small"><?php echo $str[filecreatorinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[fileversion]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[version]" value="<?php echo $f[file_version]; ?>"><br><a class="small"><?php echo $str[fileversioninfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filess]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[ss]" value="<?php echo $f[file_ssurl]; ?>"><br><a class="small"><?php echo $str[filessinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filedocs]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="form[docs]" value="<?php echo $f[file_docsurl]; ?>"><br><a class="small"><?php echo $str[filedocsinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[fileurl]; ?></td><td width="50%" align="left" class="datacell"><input type="text" class="forminput" size="50" name="dlurl" value="<?php echo $f[file_dlurl]; ?>"><br><a class="small"><?php echo $str[fileurlinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filepi]; ?></td><td width="50%" align="left" class="datacell"><?php echo $posticons; ?><br><a class="small"><?php echo $str[filepiinfo]; ?></a></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filecat]; ?></td><td width="50%" align="left" class="datacell">
<select name="form[category]" class="forminput">
<?php echo $dropmenu; ?>
</select>
<br><a class="small"><?php echo $str[filecatinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filelicense]; ?></td><td width="50%" align="left" class="datacell">
<select name="form[license]" class="forminput">
<?php echo $ldropmenu; ?>
</select>
<br><a class="small"><?php echo $str[filelicenseinfo]; ?></td></tr>
<tr><td width="50%" align="right" class="datacell"><?php echo $str[filepin]; ?></td><td width="50%" align="left" class="datacell">
<select name="form[pin]" class="forminput">
<?php echo $pdropmenu; ?>
</select>
<br><a class="small"><?php echo $str[filepininfo]; ?></td></tr>
<?php
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_custom", 0);
while ($field = mysql_fetch_object($result)) {
	$cust = $pafiledb_sql->query($db, "SELECT data FROM $db[prefix]_customdata WHERE customdata_file = '$id' AND customdata_custom = '$field->custom_id'", 1);
	echo "<tr><td width=\"50%\" align=\"right\" class=\"datacell\">$field->custom_name</td><td width=\"50%\" align=\"left\" class=\"datacell\"><input type=\"text\" size=\"50\" name=\"custom[$field->custom_id]\" value=\"$cust[data]\" class=\"forminput\"><br><a class=\"small\">$field->custom_description</td></tr>";
}	
?>
<tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[efile]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="file">
<input type="hidden" name="file" value="edit"><input type="hidden" name="id" value="<?php echo $id; ?>"><input type="hidden" name="edit" value="do"></td></tr>
</form>
</table>	
<?php
		
	}
	if (empty($edit)) {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=file\" class=\"small\">$str[fmanage]</a> :: $str[efile]";
                adlocbar($locbar,$user,$str);
                adminlinks($str);
                
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '0' ORDER BY cat_order", 0);
		while ($cat = mysql_fetch_object($result)) {
			$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\">&nbsp;</td><td width=\"97%\" class=\"datacell\">$cat->cat_name<br><a class=\"small\">&raquo; $cat->cat_desc &laquo;</td></tr>\n";
			$subs = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '$cat->cat_id'", 0);
			while ($sub = mysql_fetch_object($subs)) {
				$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\">&nbsp;</td><td width=\"97%\" class=\"datacell\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$sub->cat_name<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"small\">&raquo; $sub->cat_desc &laquo;</td></tr>\n";
				$subfiles = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_catid = '$sub->cat_id'", 0);
				while ($subf = mysql_fetch_object($subfiles)) {
					$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"radio\" name=\"id\" value=\"$subf->file_id\"></td><td width=\"97%\" class=\"datacell\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$subf->file_name<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"small\">&raquo; $subf->file_desc &laquo;</td></tr>\n";
				}
			}
			$catfiles = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_catid = '$cat->cat_id'", 0);
			while ($catf = mysql_fetch_object($catfiles)) {
				$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"radio\" name=\"id\" value=\"$catf->file_id\"></td><td width=\"97%\" class=\"datacell\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$catf->file_name<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"small\">&raquo; $catf->file_desc &laquo;</td></tr>\n";
			}
		}
		?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[efile]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
               <?php echo $row; ?>
               <tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[efile]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="file">
               <input type="hidden" name="file" value="edit"><input type="hidden" name="edit" value="form"></td></tr>
               </table>
	<?php
		
	}
}
if ($file == "delete") {
	if ($delete == "do") {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=file\" class=\"small\">$str[fmanage]</a> :: $str[dfile]";
                adlocbar($locbar,$user,$str);
                adminlinks($str);
                
                ?>
                <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
                <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[dfile]; ?></b></center></td></tr>
                <?php
                if (empty($select)) {
                	?>
                	<tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/error.gif" border="0"></td>
                        <td width="95%" class="datacell"><?php echo $str[fderror]; ?>
			<?php
		} else {
		        foreach ($select as $key => $value) {
		        	$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_files WHERE file_id = '$key'", 0);
		        	$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_votes WHERE votes_file = '$key'", 0);
		        	$pafiledb_sql->query($db, "DELETE FROM $db[prefix]_customdata WHERE customdata_file = '$key'", 0);
		        }
		        ?>
		        <tr><td width="5%" class="datacell" align="center" valign="middle"><img src="styles/<?php echo $config[11]; ?>/images/info.gif" border="0"></td>
                        <td width="95%" class="datacell">
               <?php echo $str[filesdeleted];
		}
		?>
	       
               </td></tr></table>
	<?php
	}
	
	if (empty($delete)) {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: <a href=\"pafiledb.php?action=admin&ad=file\" class=\"small\">$str[fmanage]</a> :: $str[dfile]";
                adlocbar($locbar,$user,$str);
                adminlinks($str);
                
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '0' ORDER BY cat_order", 0);
		while ($cat = mysql_fetch_object($result)) {
			$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\">&nbsp;</td><td width=\"97%\" class=\"datacell\">$cat->cat_name<br><a class=\"small\">&raquo; $cat->cat_desc &laquo;</td></tr>\n";
			$subs = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '$cat->cat_id'", 0);
			while ($sub = mysql_fetch_object($subs)) {
				$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\">&nbsp;</td><td width=\"97%\" class=\"datacell\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$sub->cat_name<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"small\">&raquo; $sub->cat_desc &laquo;</td></tr>\n";
				$subfiles = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_catid = '$sub->cat_id'", 0);
				while ($subf = mysql_fetch_object($subfiles)) {
					if ($check == $subf->file_id) {
						$checkbox = " checked";
						$openbold = "<b>";
						$closebold = "</b>";
					} else {
						$checkbox = "";
						$openbold = "";
						$closebold = "";
					}
					$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"checkbox\" name=\"select[$subf->file_id]\" value=\"yes\" $checkbox></td><td width=\"97%\" class=\"datacell\">$openbold&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$subf->file_name<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"small\">&raquo; $subf->file_desc &laquo;$closebold</td></tr>\n";
				}
			}
			$catfiles = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_catid = '$cat->cat_id'", 0);
			while ($catf = mysql_fetch_object($catfiles)) {
				if ($check == $catf->file_id) {
					$checkbox = " checked";
					$openbold = "<b>";
					$closebold = "</b>";
				} else {
					$checkbox = "";
					$openbold = "";
					$closebold = "";
				}
				$row .= "<tr><td width=\"3%\" class=\"datacell\" align=\"center\" valign=\"middle\"><input type=\"checkbox\" name=\"select[$catf->file_id]\" value=\"yes\" $checkbox></td><td width=\"97%\" class=\"datacell\">$openbold&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$catf->file_name<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class=\"small\">&raquo; $catf->file_desc &laquo;$closebold</td></tr>\n";
			}
		}
		?>
	       <table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
               <tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[dfile]; ?></b></center></td></tr><form action="pafiledb.php" method="post">
               <?php echo $row; ?>
               <tr><td width="100%" align="center" class="datacell" colspan="2"><input type="submit" value=">> <?php echo $str[dfile]; ?> <<" name="B1"><input type="hidden" name="action" value="admin"><input type="hidden" name="ad" value="file">
               <input type="hidden" name="file" value="delete"><input type="hidden" name="delete" value="do"></td></tr>
               </table>
	<?php
		
	}
}
if (empty($file)) {
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=admin\" class=\"small\">$str[admincenter]</a> :: $str[fmanage]";
        adlocbar($locbar,$user,$str);
        adminlinks($str);
        
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="100%" class="headercell"><center><b><?php echo $str[fmanage]; ?></b></center></td></tr>
<tr><td width="100%" class="datacell"><?php echo $str[fmanageinfo]; ?><p><center>
<a href="pafiledb.php?action=admin&ad=file&file=add">[<?php echo $str[afile]; ?>]</a> -
<a href="pafiledb.php?action=admin&ad=file&file=edit">[<?php echo $str[efile]; ?>]</a> -
<a href="pafiledb.php?action=admin&ad=file&file=delete">[<?php echo $str[dfile]; ?>]</a></center>
</td></tr></table>
<?php
}
?>
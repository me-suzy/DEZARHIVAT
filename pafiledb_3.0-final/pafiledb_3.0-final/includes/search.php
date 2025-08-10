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
if ($search == "do") {
	$string = strip_tags($string, '<a><b><i><u>');
	$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: <a href=\"pafiledb.php?action=search\" class=\"small\">$str[search]</a> :: $str[results] $string</a>";
	if ($logged == 1) {
		adlocbar($locbar, $user, $str);
		adminlinks($str);
	} else {
		locbar($locbar);
	}
	$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_name LIKE '%$string%' OR file_desc LIKE '%$string%' OR file_creator LIKE '%$string%' OR file_longdesc LIKE '%$string%' OR file_version LIKE '%$string%'", 0);
	$numhits = mysql_num_rows($result);
	?>
	<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
	<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[search]; ?></b></center></td></tr>
	<?php
		if ($numhits == 0) {
			?>
			<tr>
			<td width="5%" align="center" valign="center" class="datacell"><img src="styles/<?php echo $config[11]; ?>/images/error.gif" border="0"></td><td width="95%" class="datacell"><?php echo $str[nomatches]; ?> <b><?php echo $string; ?></b></td></tr>
			<?php
	    } else {
			?>
			<tr><td width="100%" class="datacell" align="center" colspan="2"><?php echo "$numhits $str[matches] <b> $string"; ?></b></td></tr>
			<?php
			while ($r = mysql_fetch_object($result)) {
				if ($r->file_posticon == "none" or $r->file_posticon == "none.gif" or empty($r->file_posticon)) {
					$posticon = "&nbsp;";
				} else {
					$posticon = "<img src=\"images/posticons/$r->file_posticon\">";
				}
				echo "<tr><td width=\"%5\" align=\"center\" class=\"datacell\">$posticon</td><td width=\"95%\" class=\"datacell\" align=\"left\"><a href=\"pafiledb.php?action=file&id=$r->file_id\">$r->file_name</a></td></tr>";
			}
		}
	echo "</table>";
}
if (empty ($search)) {
		$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: $str[search]</a>";
	if ($logged == 1) {
		adlocbar($locbar, $user, $str);
		adminlinks($str);
	} else {
		locbar($locbar);
	}
	?>
	<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
	<tr><td width="100%" colspan="2" class="headercell"><center><b><?php echo $str[search]; ?></b></center></td></tr>
	<tr><form action="pafiledb.php" method="post"><td width="50%" class="datacell" align="right"><?php echo $str[sfor]; ?>:</td><td width="50%" align="left" class="datacell"><input type="text" name="string" size="50" class="forminput"></td></tr>
	<tr><td width="100%" class="datacell" align="center" colspan="2"><input type="hidden" name="action" value="search"><input type="hidden" name="search" value="do"><input type="submit" value=">> <?php echo $str[search]; ?> <<">
	</td></form></tr></table>
	<?php
}
if ($logged == 1) { echo "</td></tr></table>"; }
?>
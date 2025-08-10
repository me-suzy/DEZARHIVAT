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
function jumpmenu($db, $pageurl,$pafiledb_sql,$str) {
	echo("<form name=\"form1\">
        <select name=\"menu1\" onChange=\"MM_jumpMenu('parent',this,0)\" class=\"forminput\">
        <option value=\"$pageurl\" selected>$str[jump]</option>
        <option value=\"$pageurl\">---------</option>");
        $result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '0' ORDER BY cat_order", 0);
        while ($cat = mysql_fetch_object($result)) {
        	echo "<option value=\"pafiledb.php?action=category&id=$cat->cat_id\">$cat->cat_name</option>";
        	$result2 = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat WHERE cat_parent = '$cat->cat_id' ORDER BY cat_parent", 0);
        	while ($sub = mysql_fetch_object($result2)) {
        		echo "<option value=\"pafiledb.php?action=category&id=$sub->cat_id\">--$sub->cat_name</option>";
        	}
        }
        echo "</select></form>";
}
function locbar($locbar) {
	echo("
	<table width=\"100%\" height=\"30\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\" class=\"locbar\">
        <tr>
        <td width=\"100%\" valign=\"center\" align=\"left\">
        $locbar
        </td></tr></table>
	");
}
function adlocbar($locbar, $user,$str) {
	echo("
	<table width=\"100%\" height=\"30\" border=\"0\" cellpadding=\"2\" cellspacing=\"0\" class=\"locbar\">
        <tr>
        <td width=\"50%\" valign=\"center\" align=\"left\">
        $locbar
        </td>
        <td width=\"50%\" valign=\"center\" align=\"right\">
        $str[logged] $user <a href=\"pafiledb.php?action=admin\" class=\"small\">[$str[admincenter]]</a> - <a href=\"pafiledb.php?action=admin&ad=logout\" class=\"small\">[$str[logout]]</a>
        </td>
        </tr></table>
	");
}
function adminlinks($str) {
	?>
	<table width="100%" cellpadding="2" cellspacing="0" border="0">
    <tr><td width="18%" class="datacell" valign="top">
	<table width="100%" cellpadding="2" cellspacing="0" border="1" class="headertable" bordercolor="#000000">
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[cmanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=category&category=add"><?php echo $str[acat]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=category&category=edit"><?php echo $str[ecat]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=category&category=delete"><?php echo $str[dcat]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=category&category=order"><?php echo $str[rcat]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[fmanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=file&file=add"><?php echo $str[afile]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=file&file=edit"><?php echo $str[efile]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=file&file=delete"><?php echo $str[dfile]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[cumanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=custom&custom=add"><?php echo $str[afield]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=custom&custom=edit"><?php echo $str[efield]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=custom&custom=delete"><?php echo $str[dfield]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[lmanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=license&license=add"><?php echo $str[alicense]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=license&license=edit"><?php echo $str[elicense]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=license&license=delete"><?php echo $str[dlicense]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[amanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=admins&admins=add"><?php echo $str[aadmin]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=admins&admins=edit"><?php echo $str[eadmin]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=admins&admins=delete"><?php echo $str[dadmin]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[settings]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=options"><?php echo $str[asettings]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=settings"><?php echo $str[pafdbsettings]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[utils]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=backupdb"><?php echo $str[bdb]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=restoredb"><?php echo $str[rdb]; ?></a></td></tr>
	</table>
	</td><td width="82%" class="datacell" valign="top">
	
	<?php
}
function adminlinks_viewfile($str,$id) {
	?>
	<table width="100%" cellpadding="2" cellspacing="0" border="0">
    <tr><td width="18%" class="datacell" valign="top">
	<table width="100%" cellpadding="2" cellspacing="0" border="1" class="headertable" bordercolor="#000000">
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[cmanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=category&category=add"><?php echo $str[acat]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=category&category=edit"><?php echo $str[ecat]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=category&category=delete"><?php echo $str[dcat]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=category&category=order"><?php echo $str[rcat]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[fmanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=file&file=add"><?php echo $str[afile]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=file&file=edit&edit=form&id=<?php echo $id; ?>"><?php echo $str[efile]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=file&file=delete&check=<?php echo $id; ?>"><?php echo $str[dfile]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[cumanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=custom&custom=add"><?php echo $str[afield]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=custom&custom=edit"><?php echo $str[efield]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=custom&custom=delete"><?php echo $str[dfield]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[lmanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=license&license=add"><?php echo $str[alicense]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=license&license=edit"><?php echo $str[elicense]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=license&license=delete"><?php echo $str[dlicense]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[amanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=admins&admins=add"><?php echo $str[aadmin]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=admins&admins=edit"><?php echo $str[eadmin]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=admins&admins=delete"><?php echo $str[dadmin]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[settings]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=options"><?php echo $str[asettings]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=settings"><?php echo $str[pafdbsettings]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[utils]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=backupdb"><?php echo $str[bdb]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=restoredb"><?php echo $str[rdb]; ?></a></td></tr>
	</table>
	</td><td width="82%" class="datacell" valign="top">
	
	<?php
}
function adminlinks_viewcat($str,$id) {
	?>
	<table width="100%" cellpadding="2" cellspacing="0" border="0">
    <tr><td width="18%" class="datacell" valign="top">
	<table width="100%" cellpadding="2" cellspacing="0" border="1" class="headertable" bordercolor="#000000">
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[cmanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=category&category=add"><?php echo $str[acat]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=category&category=edit&edit=form&select=<?php echo $id; ?>"><?php echo $str[ecat]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=category&category=delete&check=<?php echo $id; ?>"><?php echo $str[dcat]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=category&category=order"><?php echo $str[rcat]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[fmanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=file&file=add"><?php echo $str[afile]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=file&file=edit&edit=form&id=<?php echo $id; ?>"><?php echo $str[efile]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=file&file=delete&check=<?php echo $id; ?>"><?php echo $str[dfile]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[cumanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=custom&custom=add"><?php echo $str[afield]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=custom&custom=edit"><?php echo $str[efield]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=custom&custom=delete"><?php echo $str[dfield]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[lmanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=license&license=add"><?php echo $str[alicense]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=license&license=edit"><?php echo $str[elicense]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=license&license=delete"><?php echo $str[dlicense]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[amanage]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=admins&admins=add"><?php echo $str[aadmin]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=admins&admins=edit"><?php echo $str[eadmin]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=admins&admins=delete"><?php echo $str[dadmin]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[settings]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=options"><?php echo $str[asettings]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=settings"><?php echo $str[pafdbsettings]; ?></a></td></tr>
	<tr><td width="100%" valign="top" align="center" class="headercell"><b><?php echo $str[utils]; ?></b></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=backupdb"><?php echo $str[bdb]; ?></a></td></tr>
		<tr><td width="100%" valign="top" class="datacell"><a href="pafiledb.php?action=admin&ad=restoredb"><?php echo $str[rdb]; ?></a></td></tr>
	</table>
	</td><td width="82%" class="datacell" valign="top">
	
	<?php
}
function startdl() {
	header("Content-type: image/gif");
		echo base64_decode("R0lGODlhXgArAKIAAP///8zMzJmZmWZmZjMzMwAAAAAAAAAAACH5BAAAAAAALAAAAABeACsAAAP/CLrcviHKCWINj03pts2LIGJgaQpFqqoAUbRvia4pQQIzPYCuKpjAB4pALBJhSFnB2CuQhsbUzuEaBGa3YBCV1WBcJ2djpuA2XN3AMlSYarfiEljZBQwKPzMD9dvjGWsZVxEDBH0QhQQDfXoOIkkViYeNgAQ4cRB/JoEPajmcn1KXdQpgc2orlqMPYJSXhxl8IKhTd1MpjCmrrC9zuAq2uw13V5iXqoJks5xIsgvEUEylvS/O08J+xTRLpAs+JZ7ZFWNOoSxIpjFsIsZs2ttuHQN3mp3G4QoRAvTFAh7XYHCJEHGHHSkulAS4gJVBl6B7fwI0UVGsWzoA23y4Alau/x1GZCCsNVCTxRMqQ/4QegT4gpuHirywXTOBr0O9VwWzbWT5MZZHNTs2zgkBssJNDW0YEBs6DWZMMMSU2hAqZiMzOzdz2oujxlLUMimcUqF2LJOlhC5UUZJ4tKvZZVL4XWqjcAmenehipN33y1wNNhmLcjREjyHSQt841ohAd2XeZyty0TDkZ7JhyDUuZ/rxYWS3NxA+gwbSeZnm0ahTqza9urXr10ZPw55NWwPl2rhz697Nu7fv38CDCx9OvLjx48i9hFa+PHlqtkmNLjymKtGOrkcBOW8eLkAhO316YVgksZT38CDUObdhXuIOQ8hsqJL4CIfCBewv1C/XRx+JK//+6Gfff4PkM4IXAVYQIH04WIIHSiDd5U1+5XlDAhHzOAifP0SoxNdHRXAhkSJOAPXViNBsOASAFSqgjkL1ffQfMveVMoUNVeGIwT4J4shhGVbEQF4fi+QjpB7iDWgJCTEgdAg3+aiFyW3sRNliDBVVYwVjFdZ3xW1dKiSBfDvu0MuPJNk34YxGZZFflRXI580QYlbDRJhdzdOfWtGQ6WIxXvmjSYX0MSIoQ7ctgqWcLsaBIw5uRMBnkeBFWUaN47ypaQuwsEeeKvIZpsifi6b5YZsvqFEGoyLcZsiYl7JHUn7U2YAKRVAAg+GtYZUSIkZWGoFViE3aJemlUOj544Aidv1QSEmilVYaFRx0sGRzns0iGrbT4kartdvxZsUs8RiXAAA7");
		exit();
}
?>
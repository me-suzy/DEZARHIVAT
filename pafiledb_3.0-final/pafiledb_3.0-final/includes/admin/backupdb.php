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
header('Content-Type: application/octetstream');
header('Content-Disposition: filename="pafiledb3.sql"');
header('Pragma: no-cache');
header('Expires: 0');
$data .= "#paFileDB 3 Database Backup\r\n";
$data .= "#Server: $db[host]\r\n";
$data .= "#Database: $db[name]\r\n\r\n";

$data .= "#Table $db[prefix]_admin:\r\n";
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_admin", 0);
while ($a = mysql_fetch_array($result)) {
	foreach ($a as $key => $value) {
		$a[$key] = addslashes($a[$key]);
	}
	$data .= "INSERT INTO $db[prefix]_admin VALUES ('$a[admin_id]', '$a[admin_username]', '$a[admin_password]', '$a[admin_email]', '$a[admin_status]'); \r\n#endquery\r\n";
}

$data .= "\r\n#Table $db[prefix]_cat:\r\n";
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_cat", 0);
while ($c = mysql_fetch_array($result)) {
	foreach ($c as $key => $value) {
		$c[$key] = addslashes($c[$key]);
	}
	$data .= "INSERT INTO $db[prefix]_cat VALUES ('$c[cat_id]', '$c[cat_name]', '$c[cat_desc]', '$c[cat_files]', '$c[cat_1xid]', '$c[cat_parent]', '$c[cat_order]'); \r\n#endquery\r\n";
}

$data .= "\r\n#Table $db[prefix]_custom:\r\n";
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_custom", 0);
while ($cu = mysql_fetch_array($result)) {
	foreach ($cu as $key => $value) {
		$cu[$key] = addslashes($cu[$key]);
	}
	$data .= "INSERT INTO $db[prefix]_custom VALUES ('$cu[custom_id]', '$cu[custom_name]', '$cu[custom_description]'); \r\n#endquery\r\n";
}

$data .= "\r\n#Table $db[prefix]_customdata:\r\n";
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_customdata", 0);
while ($cud = mysql_fetch_array($result)) {
	foreach ($cud as $key => $value) {
		$cud[$key] = addslashes($cud[$key]);
	}
	$data .= "INSERT INTO $db[prefix]_customdata VALUES ('$cud[customdata_file]', '$cud[customdata_custom]', '$cud[data]'); \r\n#endquery\r\n";
}

$data .= "\r\n#Table $db[prefix]_files:\r\n";
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files", 0);
while ($f = mysql_fetch_array($result)) {
	foreach ($f as $key => $value) {
		$f[$key] = addslashes($f[$key]);
	}
	$data .= "INSERT INTO $db[prefix]_files VALUES ('$f[file_id]', '$f[file_name]', '$f[file_desc]', '$f[file_creator]', '$f[file_version]', '$f[file_longdesc]', '$f[file_ssurl]', '$f[file_dlurl]', '$f[file_time]', '$f[file_catid]', '$f[file_posticon]', '$f[file_license]', '$f[file_dls]', '$f[file_last]', '$f[file_pin]', '$f[file_docsurl]', '$f[file_rating]', '$f[file_totalvotes]'); \r\n#endquery\r\n";
}

$data .= "\r\n#Table $db[prefix]_license:\r\n";
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_license", 0);
while ($l = mysql_fetch_array($result)) {
	foreach ($l as $key => $value) {
		$l[$key] = addslashes($l[$key]);
	}
	$data .= "INSERT INTO $db[prefix]_license VALUES ('$l[license_id]', '$l[license_name]', '$l[license_text]'); \r\n#endquery\r\n";
}

$data .= "\r\n#Table $db[prefix]_settings:\r\n";
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_settings", 0);
while ($s = mysql_fetch_array($result)) {
	foreach ($s as $key => $value) {
		$s[$key] = addslashes($s[$key]);
	}
	$data .= "INSERT INTO $db[prefix]_settings VALUES ('$s[settings_id]', '$s[settings_dbname]', '$s[settings_dbdescription]', '$s[settings_dburl]', '$s[settings_topnumber]', '$s[settings_homeurl]', '$s[settings_newdays]', '$s[settings_timeoffset]', '$s[settings_timezone]', '$s[settings_header]', '$s[settings_footer]', '$s[settings_style]', '$s[settings_stats]', '$s[settings_lang]'); \r\n#endquery\r\n";
}

$data .= "\r\n#Table $db[prefix]_votes:\r\n";
$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_votes", 0);
while ($v = mysql_fetch_array($result)) {
	foreach ($v as $key => $value) {
		$v[$key] = addslashes($v[$key]);
	}
	$data .= "INSERT INTO $db[prefix]_votes VALUES ('$v[votes_ip]', '$v[votes_file]'); \r\n#endquery\r\n";
}

echo $data;
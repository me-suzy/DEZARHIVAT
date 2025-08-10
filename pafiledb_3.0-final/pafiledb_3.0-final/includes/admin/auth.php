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
if ($authmethod == "cookies") {
	$cdata = explode("|", $pafiledbcookie);
	$ip = $cdata[0];
	$user = $cdata[1];
	$pass = $cdata[2];
}
if (!empty($user)) {
	$admin = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_admin WHERE admin_username = '$user'", 1);
	$adminip = getenv ("REMOTE_ADDR");
	$md5ip = md5($adminip);
	if ($pass == $admin[admin_password] && $md5ip == $ip) {
		$logged = 1;
	}
} else {
	$logged = 0;
}
?>
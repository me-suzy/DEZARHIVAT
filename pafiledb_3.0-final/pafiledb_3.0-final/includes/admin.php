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
if ($authmethod == "sessions") {
	session_register("user");
	session_register("pass");
	session_register("ip");
}
if ($logged !== 1) {
	include "./includes/admin/login.php";
} else {
	?>
	
	<?php
	switch ($ad) {
		case logout:
			include "./includes/admin/logout.php";
		break;
		case category:
			include "./includes/admin/category.php";
		break;
		case file:
			include "./includes/admin/file.php";
		break;
		case custom:
			include "./includes/admin/custom.php";
		break;
		case license:
			include "./includes/admin/license.php";
		break;
		case settings:
			include "./includes/admin/settings.php";
		break;
		case options:
			include "./includes/admin/options.php";
		break;
		case admins:
			include "./includes/admin/admins.php";
		break;
		case restoredb:
			include "./includes/admin/restoredb.php";
		break;
		default:
			include "./includes/admin/main.php";
		break;
	}
	?>
	</td></tr></table>
	<?php
}
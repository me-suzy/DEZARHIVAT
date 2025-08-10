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
if (file_exists("./install.php")) { die("Error: The file install.php (paFileDB installer) still exists on the server! This is a security risk! Please delete the file to continue using paFileDB."); }
$starttime = microtime();	
$starttime = explode(" ",$starttime);
$starttime = $starttime[1] + $starttime[0];
$authmethod = "cookies"; //Set this to 'cookies' to use cookies to log you in (recommended.) If you're having problems with cookies, set this to 'sessions' and make sure a 'sessions' directory exists and is CHMODed to 777 (on *nix servers)
if ($authmethod == "sessions") {
	session_save_path("./sessions");
	session_start();
}
require "./includes/mysql.php";
require "./includes/functions.php";
$pafiledb_sql->connect($db);
$config = $pafiledb_sql->query($db,"SELECT * FROM $db[prefix]_settings",1);
require "./lang/$config[13].php";
if ($login == "do") { include "./includes/admin/login.php"; exit; }
if ($ad == "logout") { include "./includes/admin/logout.php"; exit; }
$logged = "";
require "./includes/admin/auth.php";
if ($action == "download") {
	include "./includes/download.php";
	exit();
}
if ($logged == 1 && $ad == "backupdb") {
	include "includes/admin/backupdb.php";
	exit();
}
?>
<html>
<head>
<!--Download database powered by paFileDB 3.0. Visit http://www.phparena.net/pafiledb for your own free copy!-->
<!--If you're actually reading these comments, then you need a life....................-->
<title>paFileDB 3.0</title>
<style type="text/css">
<?php include "./styles/$config[11]/style.css"; ?>
</style>
<script language="JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>
<body>
<center>
<!--Begin main table-->
<table width="100%" height="99%" border="0" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF" class="table">
<tr>
<td width="100%" height="100%" valign="top">
<!--Begin header table-->
<table width="100%" height="100" border="0" cellpadding="2" cellspacing="0" class="table">
<tr>
<td width="25%" valign="center" align="center">
<a href="pafiledb.php"><img src="styles/<?php echo $config[11]; ?>/images/logo.gif" border="0"></a>
</td><td width="75%" valign="center" align="right">
<a href="pafiledb.php?action=search"><img src="styles/<?php echo $config[11]; ?>/images/search.gif" border="0"></a>&nbsp;&nbsp;<a href="pafiledb.php?action=stats"><img src="styles/<?php echo $config[11]; ?>/images/stats.gif" border="0"></a>&nbsp;&nbsp;<a href="<?php echo $config[5]; ?>"><img src="styles/<?php echo $config[11]; ?>/images/homepage.gif" border="0"></a>
</td></tr></table>
<!--End header table-->
<!--Begin page table-->
<?php
if ($logged == 1 && $ad != "logout") {
	$width = 100;
} else {
	$width = 80;
}
?>
<table width="<?php echo $width; ?>%" height="30" border="0" cellpadding="2" cellspacing="0" class="table" align="center">
<tr>
<td width="100%" valign="top" align="left" colspan="2">
<?php
switch ($action) {
	case category:
		include "./includes/category.php";
	break;
	case file:
		include "./includes/file.php";
	break;
	case viewall:
		include "./includes/viewall.php";
	break;
	case search:
		include "./includes/search.php";
	break;
	case license:
		include "./includes/license.php";
	break;
	case rate:
		include "./includes/rate.php";
	break;
	case admin:
		include "./includes/admin.php";
	break;
	case email:
		include "./includes/email.php";
	break;
	case stats:
		include "./includes/stats.php";
	break;
	default:
		include "./includes/main.php";
	break;
}
?>
</td></tr>
<tr>
<td width="50%" align="left">
<?php jumpmenu($db,$HTTP_SERVER_VARS['REQUEST_URI'],$pafiledb_sql,$str); ?>
</td><td width="50%" align="right"><?php echo "$str[time] $config[8]"; ?></td></tr></table>
<!--End page table-->
<!--Begin footer table-->
<table width="100%" height="30" border="0" cellpadding="2" cellspacing="0" class="footer">
<tr>
<td width="100%" valign="center" align="center">
<?php echo $str[power]; ?> paFileDB 3<br>©2002 <a href="http://www.phparena.net" class="small" target="phparena">PHP Arena</a>
</td></tr>
<tr><td width="100%" valign="center" align="center">
<?php
$endtime = microtime();
$endtime = explode(" ",$endtime);
$endtime = $endtime[1] + $endtime[0];
$stime = $endtime - $starttime;
if ($config[12] == 1) {
?>
<table width="30%" border="1" cellpadding="2" class="stats" bordercolor="#000000">
<tr><td width="50%" align="left"><?php echo $str[exectime]; ?>:</td><td width="50%" align="right"><?php echo round($stime,4); ?> Seconds</td></tr>
<tr><td width="50%" align="left"><?php echo $str[numqueries]; ?>:</td><td width="50%" align="right"><?php echo $query_count; ?> Queries</td></tr>
</table>
<?php
if ($showqueries == 1) {
	?>
	<p>
	<table width="100%" border="1" cellpadding="2" class="headertable" bordercolor="#000000">
	<tr><td width="100%" class="headercell" align="center"><b>Queries Used</b></td></tr>
	<?php echo $queries_used; ?>
	</table>
<?php
}
}
?>
</table>
<!--End footer table-->
<!--End main table-->
</td></tr></table>
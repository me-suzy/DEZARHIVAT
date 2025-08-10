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
if ($authmethod == "sessions") { session_destroy(); }
if ($authmethod == "cookies") { setcookie("pafiledbcookie", "", time()-3600); }
header("Location: pafiledb.php");
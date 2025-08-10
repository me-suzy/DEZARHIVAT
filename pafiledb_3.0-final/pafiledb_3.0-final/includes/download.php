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
$file = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files WHERE file_id = '$id'", 1);
$time = time();
$update = $pafiledb_sql->query($db, "UPDATE $db[prefix]_files SET file_dls=file_dls+1, file_last=$time WHERE file_id = '$id'", 0);
if ($download == 1) { startdl(); exit; }
header("Location: $file[file_dlurl]");
?>
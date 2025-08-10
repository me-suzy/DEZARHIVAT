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
$show = "10"; //How many files do you want to show on the list
$template = "<b>{number}.</b> <a href=\"{filelink}\">{filename} ({info})</a><br>"; //Template for each line.
//Don't modify anything below this line.

require "./includes/mysql.php";
$pafiledb_sql->connect($db);
$config = $pafiledb_sql->query($db,"SELECT * FROM $db[prefix]_settings",1);
switch ($list) {
	case newest:
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files ORDER BY file_time DESC LIMIT 0,$show ", 0);
		$info = "Added on {date}";
	break;
	case downloads:
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files ORDER BY file_dls DESC LIMIT 0,$show ", 0);
		$info = "{downloads} Downloads";
	break;
	case rating:
		$result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_files ORDER BY file_rating/(file_totalvotes - 0) DESC LIMIT 0,$show", 0);
		$info = "{rating}/10 - {votes} Votes";
	break;
	default:
		die("You didn't select the type of list to show. Please see the paFileDB manual for more information");
	break;
}
$i = 1;
while ($file = mysql_fetch_object($result)) {
	$line = str_replace("{number}", $i, $template);
	$line = str_replace("{filelink}", "$config[3]/pafiledb.php?action=file&id=$file->file_id", $line);
	$line = str_replace("{filename}", $file->file_name, $line);
	if ($list == "newest") {  $infoline = str_replace("{date}", date("n/j/y", $file->file_time), $info); }
	if ($list == "downloads") {$infoline = str_replace("{downloads}", $file->file_dls , $info); }
	if ($list == "rating") { 
		$ntv = $file->file_totalvotes - 1;
		$infoline = str_replace("{rating}", @round($file->file_rating/$ntv,2), $info);
		$infoline = str_replace("{votes}", $ntv, $infoline);
	}
	$line = str_replace("{info}", $infoline, $line);
	echo $line;
	$i++;
}
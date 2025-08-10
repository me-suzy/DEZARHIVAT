<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/sections/remove.php

***************************************/ 

require "../include/db_connect.php";
require "../../include/strings.php";

// security measures
$id += 0;


// this function returns a array of the direct
// threads under this $parent and deletes them

// it's a copy of the function in include/tree.php
// with the print of the name added

function DeleteThreadsAndReturnIds ($parent)
{
	$id_array = "";
	
	$query = mysql_query ("SELECT id, name FROM areas WHERE parent=$parent");
	
	if ($query && mysql_num_rows($query)) 
	{	
		while (list($id, $name) = mysql_fetch_row($query))
		{		
			$name = StripSlashes ($name);
			
			$id_array[] = $id;
			print "$name<br><br>";
		}
		
		$query = mysql_query ("DELETE FROM areas WHERE parent=$parent");
	}
	
	return ($id_array);
}



// find out this thread's name and 
// weight (to use in reorder)

$query = mysql_query ("SELECT weight, name, parent FROM areas WHERE id=$id");

if (mysql_num_rows($query))
{
	list($weight, $name, $parent) = mysql_fetch_row ($query);
	$name = StripSlashes ($name);
}
else header ("Location: index.php");




// delete thread
$query = mysql_query ("DELETE FROM areas WHERE id=$id");



?>
<html>
<body bgcolor="#FFFFFF">
<font face="Arial, Helvetica, Sans-serif" size=2>
<a href="index.php?parent=<? print $parent; ?>"><? print $strBack; ?></a><br><br>
<font size=4><b><? print $strRemovedThreads ?>:</b></font><br><br>
<? print $name; ?><br><br>
<?

// reorder weights
$query = mysql_query ("	UPDATE areas SET weight=weight-1 
WHERE parent=$parent
AND weight>$weight");


// delete all recursive threads
$thread_array = DeleteThreadsAndReturnIds($id);

if ($thread_array)
{
	while ($thread_array)
	{
		
		$new_thread_array = "";
		
		while ($thread = each($thread_array)) {
			
			$sub_threads = DeleteThreadsAndReturnIds($thread);
			
			if ($sub_threads)
			{
				while ($each = each ($sub_threads))
				{
					$new_thread_array[] = $each;
				}
			}
		}
		
		$thread_array = $new_thread_array;
	}
}


?>
</font>
</body>
</html>

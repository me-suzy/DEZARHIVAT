<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/include/tree.php
Last modified: 20013103

***************************************/


// reorders the weight of the 
// threads under $parent on $sql_table
function reorder_threads ($parent, $sql_table) 
{	
	$sql = "SELECT id FROM $sql_table ORDER BY weight, id";
	
	$query = mysql_query ($sql);
	
	if ($query) 
	{		
		$counter = 1;
		
		while (list($id) = mysql_fetch_row($query)) 
		{			
			$sql = 	"UPDATE $sql_table ".
			"SET weight=$counter ".
			"WHERE id=$id";
			
			mysql_query ($sql);
			
			$counter ++;
		}			
	} 
	else 
	{		
		error (mysql_error()."\nwhile reordering threads");
	}
}







// this function prints the tree in $sql_table starting at $parent
// it prints $name_field linking to $link_prefix.$id
function print_tree ($parent=0, $sql_table, $name_field, $link_prefix) 
{
	$thread_array = mysql_query ("	SELECT id, $name_field FROM $sql_table
	WHERE parent=$parent ORDER BY weight");
	
	if (mysql_num_rows($thread_array)) 
	{	
		print "\n<ul>";
		
		while (list($id, $name)=mysql_fetch_row($thread_array)) 
		{		
			print "\n<li><a href=\"$link_prefix$id\">$name</a></li>";		
			print_tree ($id, $sql_table, $name_field, $link_prefix);
		}
		
		print "\n</ul>";
	}
}






// works like "print tree" function but it
// doesnt print links in $exclude and it's threads

// NOTE: dont use $link_flag it's used for internal use only
function print_tree_unlink ($parent=0, $sql_table, $name_field, $link_prefix, $exclude="", $link_flag=1) 
{
	$thread_array = mysql_query ("	SELECT id, $name_field, parent FROM $sql_table
	WHERE parent=$parent ORDER BY weight");
	
	if ($exclude && $parent == $exclude) $link_flag = 0;
	
	if (mysql_num_rows($thread_array)) 
	{	
		print "\n<ul>";
		
		while (list($id, $name, $parent)=mysql_fetch_row($thread_array)) 
		{
			if ($exclude == $id) $name = "<b>$name</b>";
			
			if ($link_flag && $exclude != $id && $exclude != $parent)
			{ 
				print "\n<li><a href=\"$link_prefix$id\">$name</a></li>";
			}
			else 
			{
				print "\n<li>$name</li>";
			}				
			
			print_tree_unlink ($id, $sql_table, $name_field, $link_prefix, $exclude, $link_flag);
		}
		
		print "\n</ul>";
	}
}



// this function returns a array of the direct
// threads under this $parent and deletes them
function delete_threads_and_return_ids ($parent, $sql_table) 
{
	$id_array = "";
	
	$query = mysql_query ("SELECT id FROM $sql_table WHERE parent=$parent");
	
	if ($query && mysql_num_rows($query)) 
	{	
		while (list($id) = mysql_fetch_row($query)) $id_array[] = $id;
		
		$query = mysql_query ("DELETE FROM $sql_table WHERE parent=$parent");
	}
	
	return ($id_array);
}





// this function deletes thread $id
// and all it's child threads

// this function depends on
// "delete_threads_and_return_ids" function
function recursively_delete ($id, $sql_table) 
{
	// find out this thread's weight
	// (to use in reorder)
	
	$query = mysql_query ("SELECT weight, parent FROM $sql_table WHERE id=$id");
	
	if (mysql_num_rows($query)) 
	{	
		list($weight, $parent) = mysql_fetch_row ($query);
	} 
	else 
	{
		return 0; 
	}
	
	
	
	// delete thread
	
	$query = mysql_query ("DELETE FROM $sql_table WHERE id=$id");
	
	
	
	// reorder weights
	
	$query = mysql_query ("	UPDATE $sql_table SET weight=weight-1 
	WHERE parent=$parent
	AND weight>$weight");
	
	
	// delete all recursive threads
	
	$thread_array = delete_threads_and_return_ids($id, $sql_table);
	
	if ($thread_array) 
	{
		while ($thread_array) 
		{
			$new_thread_array = "";
			
			while ($thread = each($thread_array)) 
			{
				$sub_threads = delete_threads_and_return_ids($thread, $sql_table);
				
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
}
?>

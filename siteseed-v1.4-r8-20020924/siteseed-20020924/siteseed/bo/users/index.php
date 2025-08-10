<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/users/index.php

***************************************/ 

require "../include/db_connect.php";
require "../../include/strings.php";

?>
<html>
<body bgcolor="#FFFFFF">
<font face="Arial, Helvetica, Sans-serif" size=2>
<?

if (isset($search) && $field) 
{
	// what are the fields to select ?
	$query_fields = mysql_query ("SELECT field_name FROM user_fields ORDER BY id");
	
	while (list($field_name) = mysql_fetch_row($query_fields))
	{
		$fields_to_select .= ",$field_name";
	}
	
	$num_fields = mysql_num_rows($query_fields);
	
	
	// search it!
	$query = mysql_query ("	SELECT id $fields_to_select
	FROM users
	WHERE $field LIKE '%$search%'");
	
	if (!$query) error(mysql_error());
	
	if (!mysql_num_rows($query))
	{
		// not found
		print "$strNotFound<hr>";
		
		// print search form
		require "search_form.php";
	}
	else
	{
		// print search form
		require "search_form.php";
		
		// print number of matches
		print	"$strNumberOfMatches: ".
		mysql_num_rows($query).
		"<hr>";
		
		// print table header
		mysql_data_seek ($query_fields, 0);
		
		print	"<table border=1 cellpadding=4 cellspacing=0>\n".
		"<tr bgcolor=#DDDDDD>";
		
		
		while (list($field_name) = mysql_fetch_row($query_fields))
		{
			if ($field_name == $field) $field_name = "<b>$field_name</b>";
			
			print "<td><font face=\"Arial, Helvetica, Sans-serif\" size=2>$field_name</font></td>";
		}
		
		print "<td>&nbsp;</td></tr>";
		
		
		// print users
		for ($counter=0; $counter<=mysql_num_rows($query)-1; $counter++)
		{
			print	"\n<tr>";
			
			$field_counter = 0;
			
			$id = mysql_result ($query, $counter, "id");
			
			mysql_data_seek ($query_fields, 0);
			
			while (list($field_name) = mysql_fetch_row($query_fields))
			{
				$data = mysql_result ($query, $counter, $field_name);
				
				if (!$data) $data = "&nbsp;";
				else $data = stripslashes($data);
				
				print "<td><font face=\"Arial, Helvetica, Sans-serif\" size=2>$data</font></td>";
				
				$field_counter ++;
			}
			
			if ($field_counter < $num_fields)
			{
				for ($n = $field_counter; $n <= $num_fields-1; $n++)
				{
					print "<td>&nbsp;</td>";
				}
			}
			
			print	"<td><font face=\"Verdana, Helvetica, Sans-serif\" size=1>".
			"[<a href=\"edit_user.php?id=$id\">$strEdit</a>]".
			"[<a href=\"remove_user.php?id=$id\" onclick=\"return confirm('$strDelUserConfirm');\">$strRemove</a>]".
			"</font></td></tr>";
		}
		
		print "</table>";
	}
}
else
{
	// print the search form
	require "search_form.php";
	
	// print the number of registered users
	$query_users = mysql_query ("SELECT count(id) FROM users");
	list($number_of_users) = mysql_fetch_row($query_users);
	
	print "<p><small>$strNumberOfUsers: $number_of_users</small></p>";
}
?>
</font>
</body>
</html>

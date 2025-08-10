<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/include/sql2html.php
Last modified: 20013103

***************************************/


function select_to_list ($name, $id_field, $title_field, $sql_table, $default)
{
	require "../../include/strings.php";
	
	$sql = "SELECT $id_field, $title_field FROM $sql_table";
	
	$query = mysql_query ($sql);
	
	if ($query) 
	{	
		$html = "\n<select name=\"$name\">";
		
		while (list($id, $title) = mysql_fetch_row($query)) 
		{			
			if ($id == $default) 
			{
				$html .= "\n\t<option selected value=\"$id\">$title";
			} 
			else 
			{
				$html .= "\n\t<option value=\"$id\">$title";
			}
		}
		
		if (mysql_num_rows($query) == 0) $html .= "\n\t<option>$strEmpty";
		
		$html .= "\n</select>\n";
		
	} 
	else 
	{	
		error (mysql_error()."\nwhile doing '$sql'");	
	}
	
	return $html;
}

?>

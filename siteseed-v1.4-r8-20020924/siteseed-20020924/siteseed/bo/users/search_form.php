<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/users/search_form.php

***************************************/
?>
<form method=get>
<font size=3><b><? print $strSearch; ?>:</b></font><br><br>
<select name=field>
<?

// print a select box with the field names
$query_fields = mysql_query ("SELECT field_name FROM user_fields ORDER BY id");

while (list($field_name) = mysql_fetch_row($query_fields))
{
	print "<option value='$field_name'>$field_name\n";
}
?>
</select>
<input type=text name=search>&nbsp;
<input type=submit value="<? print $strOK; ?>">
</form>

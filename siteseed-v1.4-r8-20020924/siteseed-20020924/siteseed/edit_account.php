<?
/**************************************
Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: edit_account.php
Last modified: 20020420 (security code audit by pls)
Category: publicly accessible file that can be called directly.
***************************************/ 

require "include/db_connect.php";
require "include/strings.php";
require "bo/include/defaults.php";


// validade data
$skin += 0;
$success_change+=0;
$visual+=0;
$area_id+=0;
$prefix="";
$suffix="";
$sql="";

if (!$url) $url = "index.php";
if (!$session_id) header ("Location: index.php");




// fetch skin data
if (!$skin) $skin = 1;

$query = mysql_query ("SELECT prefix, suffix FROM skins WHERE id=$skin");

if (!$query)
{
        exit;
}
else if (mysql_num_rows($query))
{
	
	list ($prefix, $suffix) = mysql_fetch_row ($query);
	
	$prefix = stripslashes ($prefix);
	$suffix = stripslashes ($suffix);
}




// what are the mandatory fields?
$query = mysql_query ("	SELECT field_name, field_type FROM user_fields WHERE mandatory_to_register='1'");
if (!$query) {	exit; }

// check for all mandatory fields
if (mysql_num_rows($query))
{
	while (list($field, $type) = mysql_fetch_row($query)) 
	{
		if (!$$field && $type!="date")
		{
			require "include/users.php";
			
			eval ("?>$prefix<?");
			print "<br>$strEAmissreq <i>$field</i><br>";
			eval ("?>$suffix<?");
			exit;
		}
	}
}



// what are the unique fields?
$query = mysql_query ("SELECT field_name FROM user_fields WHERE must_be_unique='1'");
if (!$query) { exit; }

// check all unique fields
if (mysql_num_rows($query))
{
	while (list($field) = mysql_fetch_row($query))
	{
		$query2 = mysql_query ("SELECT $field FROM users WHERE $field='".$$field."' AND session_id != '$session_id'");
		
		if (mysql_num_rows($query2))
		{
			require "include/users.php";
			
			eval ("?>$prefix<?");
			print "<br>$field <i>'".$$field."'</i> $strEAinuse<br>";
			eval ("?>$suffix<?");
			exit;
		}
	}
}



// what are the field names?
$query = mysql_query ("SELECT field_name, field_type FROM user_fields WHERE required_to_register='1'");
if (!$query) { exit; }

// check all fields and save
if (mysql_num_rows($query))
{
	while (list($field, $type) = mysql_fetch_row($query))
	{
		// validate data
		if ( ($type == "text" || $type == "password") && $field!="email" && $field!="Email" && $field!="login"&& $field!="Login")
		{
			// if its a password, confirm it
			
			if ($type == "password")
			{
				$confirmation_name = $field."_confirmation";
				
				if (isset($$confirmation_name))
				{
					if ($$confirmation_name != $$field)
					{
						require "include/users.php";
						
						eval ("?>$prefix<?");
						print "$strEApwmissmatch<br>";
						eval ("?>$suffix<?");
						exit;
					}
				}
			}
			
			$$field = AddSlashes(StripSlashes($$field));
			$sql .= "$before$field='".$$field."'";
			$before = ", ";
			
		} 
		else if ($type == "int") 
		{
			$$field += 0;
			$sql .= "$before$field='".$$field."'";
			$before = ", ";
		} 
		else if ($type == "date" || $type == "datetime")
		{
			$name_day = $field."_day";
			$name_month = $field."_month";
			$name_year = $field."_year";
			
			if ($$name_day && $$name_month && $$name_year)
			{
				$day = $$name_day;
				$month = $$name_month;
				$year = $$name_year;
			} 
			else
			{
				list ($day, $month, $year) = explode ("/", $$field);
			}
			
			$sql .= "$before$field='$year-$month-$day'";
			$before = ", ";
		}
	}
	
	$query = mysql_query ("UPDATE users SET $sql WHERE session_id='$session_id'");
}

$url="index.php?article=$success_change&visual=$visual&id=$area_id";
header ("Location: $url");
?>

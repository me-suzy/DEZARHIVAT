<?
/**************************************
Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: register_user.php
Last modified: 20020420 (security code audit by pls)
Category: publicly accessible file that can be called directly.
***************************************/

require_once "whoisthis.php";
require_once "include/db_connect.php";
require_once "include/strings.php";
require_once "bo/include/defaults.php";


// validade data
$visual+=0;
$area_id+=0;
$article+=0;
$skin = $visual;
$success_reg+=0;

if (!$url) $url = "index.php";


// fetch skin data
if (!$skin) $skin = 1;

$query = mysql_query ("SELECT prefix, suffix FROM skins WHERE id=$skin");

if (!$query)
{
	header("Location: $url");
	exit;
}
else if (mysql_num_rows($query))
{
	list ($prefix, $suffix) = mysql_fetch_row($query);
	
	$prefix = stripslashes ($prefix);
	$suffix = stripslashes ($suffix);
}

// what are the mandatory fields?
$query = mysql_query (" SELECT field_name, field_type FROM user_fields WHERE mandatory_to_register='1'");
if (!$query) {  exit; }

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
                $query2 = mysql_query ("SELECT $field FROM users WHERE $field='".$$field."'");

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
$query = mysql_query ("	SELECT field_name, field_type FROM user_fields WHERE required_to_register='1'");
if (!$query) { exit; }

// check all fields and save
if (mysql_num_rows($query))
{
	while (list($field, $type) = mysql_fetch_row($query))
	{
		// validate data
		if ($type == "text" || $type == "password")
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

				$rand_pass=md5(uniqid(rand()));		
				$n_rand=rand(0,30);
				if(strlen($$field)<4)
				{
					$length_needed=6-strlen($$field);
					$pass=substr($rand_pass,$n_rand,$length_needed);
				}
				else
				{
					$pass=substr($rand_pass,$n_rand,2);
				}
				$$field.=$pass;
				$password=$$field;
			}
			
			$$field = AddSlashes(StripSlashes($$field));
			$sql .= "$before$field='".$$field."'";
			$before = ", ";
		} 
		else if($type == "int") 
		{
			$$field += 0;
			$sql .= "$before$field='".$$field."'";
			$before = ", ";
			
		}
		else if($type == "date" || $type == "datetime")
		{
			$name_day = $field."_day";
			$name_month = $field."_month";
			$name_year = $field."_year";
			
			if($$name_day && $$name_month && $$name_year)
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
	
	
	if($query = mysql_query("INSERT INTO users SET $sql"))
	{
		if(mail("$email", "password for accessing $projecto" , "This is your password:$password" , "From:$projecto"))
		{
			$url="index.php?article=$success_reg&visual=$visual&id=$area_id";
			header ("Location: $url");
			# Data Mining
			recordsession("register_user.php","ok",$HTTP_USER_AGENT,$remoteip,$datamining);
		}
		else
		{
			print"Error sending email!";
		}
	}
	
}

header ("Location: $url");
?>

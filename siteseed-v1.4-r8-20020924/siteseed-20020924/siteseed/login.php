<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: login.php
Last modified: 20020821

***************************************/ 

require_once "whoisthis.php";
require_once "include/db_connect.php";
require_once "bo/include/defaults.php";
require_once "include/users.php";

$first=1;

// validate data
$success_log+=0;
$visual+=0;
$area_id+=0;
$url="index.php?article=$success_log&visual=$visual&id=$area_id";
$skin += 0;
$id += 0;
$query="";
$query2="";
$user_id="";

// what are the fields to check?
$query = mysql_query ("SELECT field_name, field_type FROM user_fields WHERE required_to_login='1'");

if (!$query)
{
	exit;
}

// check them
if (mysql_num_rows($query))
{
	while (list($field, $type) = mysql_fetch_row($query))
	{
		$form_value = addslashes($$field);

		if($type=="password" || $type=="text") $before = $after = "'";
		else $before = $after = ""; 

		if($user_id)
		{
			$query2 = mysql_query ("SELECT id FROM users
			WHERE $field=$before$form_value$after
			AND id=$user_id");
		}
		else
		{
			$query2 = mysql_query ("SELECT id FROM users
			WHERE $field=$before$form_value$after");
		}

		if(!$query2)
		{
			exit;
		}
		else
		{
			if (!mysql_num_rows($query2))
			{
				if (!$url_error)
				{
					// fetch skin data
             
					if (!$skin) $skin = 1;
            
                    $query = mysql_query ("SELECT prefix, suffix FROM skins WHERE id=$skin");
                                 
                    if (!$query) error (mysql_error()."\nwhile fetching skin data");

                    else if (mysql_num_rows($query))
                    {
						list ($prefix, $suffix) = mysql_fetch_row ($query);
             
                        $prefix = StripSlashes ($prefix);
                        $suffix = StripSlashes ($suffix);
					} 
					eval ("?>$prefix<?");

					print "Login error!<br>";
				}
		

# Data Mining

				if($first==1)
				{
					$first=0;
					recordsession("login.php","username incorrect\t$user_id",$HTTP_USER_AGENT,$remoteip,$datamining);
				}
				else
				{
					recordsession("login.php","password incorrect\t$user_id",$HTTP_USER_AGENT,$remoteip,$datamining);
				}

				if (!$url_error)
				{
					eval ("?>$suffix<?");
				}
				else header ("Location: $url_error");

				exit;
			}
			else
			{
				// correct value, continue
				list($user_id) = mysql_fetch_row($query2);

				if($first==1)
				{
					$first=0;
					recordsession("login.php","username ok\t$user_id",$HTTP_USER_AGENT,$remoteip,$datamining);
				}
				else
				{
					recordsession("login.php","password ok\t$user_id",$HTTP_USER_AGENT,$remoteip,$datamining);
				}
			}
		}
	}


	// generate session hash
	$session_hash = md5 (uniqid (rand()));

	// set session cookie
        if ($SESSION_ID_LIFETIME>0)
        {
                $lifetime=time() + $SESSION_ID_LIFETIME;
                setcookie ("session_id", $session_hash, $lifetime);
        }
        else
        {
                setcookie ("session_id", $session_hash);
        }

	
	// update users table
	$query = mysql_query ("UPDATE users SET session_id='$session_hash' WHERE id=$user_id");
	
	if (!$url_ok) header ("Location: $url");
	else header ("Location: $url_ok");

}
?>

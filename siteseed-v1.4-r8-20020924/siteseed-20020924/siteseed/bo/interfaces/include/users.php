<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/interfaces/include/users.php

***************************************/ 

// gets $param value from users table
// from the currently logged user

function get_user_data ($param="") 
{
	if (!$param) return;
	
	global $session_id;
	
	
	// check if param exists
	$query = mysql_query ("	SELECT field_name FROM user_fields
	WHERE field_name='$param'");
	
	if (!$query) error (mysql_error());
	
	if (mysql_num_rows($query)) 
	{
		// get the value from users table		
		$query2 = mysql_query ("SELECT $param FROM users WHERE session_id='$session_id'");
		
		if (!$query2) error (mysql_error());
		
		// got value? return it
		if (mysql_num_rows($query2)) 
		{		
			list ($value) = mysql_fetch_row ($query2);			
			return $value;
		}
		
	}
	else
	{
		return;
	}	
}



// prints a form with the fields that are
// required to login (login.php)
// then we redirect the user to $url if login is ok
// if $submit_image is set, it is used as a graphical
// submit button, or,
// if its not a image then it is used as the button string

function print_login_form ($url="", $submit_image="") 
{
	global $skin;
	global $id;
	
	
	// get fields required to register
	$query = mysql_query ("	SELECT field_name, code_login FROM user_fields
	WHERE required_to_login=1
	ORDER BY id");
	
	if (!$query) error (mysql_error());
	
	if (mysql_num_rows($query)) 
	{
		print "\n<form method=\"post\" action=\"login.php\">";
		
		while (list ($field_name, $code) = mysql_fetch_row($query)) 
		{
			$code = StripSlashes ($code);
			
			eval ("global $$field_name; ?>$code<?");
		}
		
		
		if ($submit_image) 
		{		
			if (	strstr ($submit_image, ".gif") ||
			strstr ($submit_image, ".jpg") || 
			strstr ($submit_image, ".png")) 
			{
				print "\n<input type=image border=0 src=\"$submit_image\">";
				
			} 
			else 
			{
				print "\n<input type=submit border=0 value=\"$submit_image\">";
			}			
		}
		else 
		{
			print "\n<input type=submit value=\"Entrar\">";
		}
		
		if ($url) print "\n<input type=hidden name=url value=\"$url\">";
		
		print 	"\n<input type=hidden name=skin value=\"$skin\">".
		"\n<input type=hidden name=id value=\"$id\">".
		"\n</form>\n";
	}
}




// prints a form with the fields that are required
// to register (register_user.php)
// then we redirect the user to $url if everything is ok
// if $submit_image is set, it is used as a graphical
// submit button, or,
// if its not a image then it is used as the button string

function print_register_form ($url="", $submit_image="") 
{
	global $skin;
	global $id;
	
	
	// get fields required to register
	$query = mysql_query ("	SELECT field_name, code_register FROM user_fields
	WHERE required_to_register=1
	ORDER BY id");
	
	if (!$query) error (mysql_error());
	
	
	if (mysql_num_rows($query)) 
	{
		print "\n<form method=\"post\" action=\"register_user.php\">";
		
		while (list ($field_name, $code) = mysql_fetch_row($query)) 
		{
			$code = StripSlashes ($code);
			
			eval ("global $$field_name; ?>$code<?");
		}
		
		
		if ($submit_image) 
		{
			if (	strstr ($submit_image, ".gif") ||
			strstr ($submit_image, ".jpg") || 
			strstr ($submit_image, ".png")) 
			{
				print "\n<input type=image border=0 src=\"$submit_image\">";
			} 
			else 
			{
				print "\n<input type=submit border=0 value=\"$submit_image\">";
			}			
		}
		else 
		{
			print "\n<input type=submit value=\"Registar\">";
		}
		
		if ($url) print "\n<input type=hidden name=url value=\"$url\">";
		
		
		print 	"\n<input type=hidden name=skin value=\"$skin\">".
		"\n<input type=hidden name=id value=\"$id\">".
		"\n</form>\n";
	}
}



// logs out current user

function log_out () 
{
	global $session_id;
	
	// kill the damn cookie
	setcookie ("session_id");
	
	// clean the database entry
	$query = mysql_query ("UPDATE users SET session_id=''");
	
	// clean the global variable
	$session_id = "";
}
?>

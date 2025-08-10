<?
/**************************************
Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: email_password.php
Last modified:  20020422 (security code audit by pls)
Category: publicly accessible file that can be called directly.
***************************************/

require_once "config.php";
require "include/strings.php";

$receiver_email="";
$subject="$projecto password";
$string="";
$success+=0;
$failure+=0;
$visual+=0;

$email=ereg_replace("\n", "", $email);
$email=ereg_replace(",", "", $email);
$email=ereg_replace(" ", "", $email);
$email=ereg_replace("%", "", $email);
$email=ereg_replace("#", "", $email);
$email=ereg_replace("<", "", $email);
$email=ereg_replace(">", "", $email);
$email=ereg_replace("\"", "", $email);

$email=addslashes($email);

if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
        mysql_select_db (DB_NAME);

        $login="";
        $password="";
	$result="";

        $result=mysql_query("SELECT login,password,email from users where email like '$email' limit 0,1");

        while($row = mysql_fetch_object($result))
        {
                $login=               $row -> login;
                $password=            $row -> password;
                $receiver_email=      $row -> email;

		$string="Login: $login\nPassword: $password";
		if(mail("$receiver_email", "$subject" , "$string" , "From :$projecto"))
		{
			header("Location: index.php?article=$success&visual=$visual");
			exit;
		}
        }
	header("Location: index.php?article=$failure&visual=$visual");
}
?>

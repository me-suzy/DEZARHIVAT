<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: email_form.php
Last modified:  20020420 (security code audit by pls)
Category: publicly accessible file that can be called directly.
***************************************/

require_once "config.php";
require "include/strings.php";

$string="";
reset($HTTP_POST_VARS);
$key=key($HTTP_POST_VARS);
$value=current($HTTP_POST_VARS);
while( list($key,$value) = each($HTTP_POST_VARS) )
{
	if($key=="email_sent" || $key=="receiver_email" || $key=="subject" || $key==$strSubmit || $key=="visual" || $key=="area_id" || $key==$strSend){}
	else
	{
		$string.="$key\t$value\n";
	}
}


$receiver_email=addslashes($receiver_email);
$subject=addslashes($subject);
$string=addslashes($string);
$email_sent+=0;
$visual+=0;
$area_id+=0;


if(mail("$receiver_email", "$subject" , "$string" , "From :$projecto"))
{
	header("Location: index.php?article=$email_sent&visual=$visual&id=$area_id");
}
else
{
	print"$strArticleNotSent";
}
?>

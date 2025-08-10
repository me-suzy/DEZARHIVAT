<?
require_once "config.php";
require "include/strings.php";
require "include/complete_url.php";		

if(ereg("@",$who_receives) && ereg("@",$who_sends))
{
	
	$output_email=complete_url("img","src",$output_email,$project_path);
	$output_email=complete_url("IMG","src",$output_email,$project_path);
	$output_email=complete_url("A","href",$output_email,$project_path);
	$output_email=complete_url("a","href",$output_email,$project_path);
	$output_email=complete_url("TD","background",$output_email,$project_path);
	$output_email=complete_url("td","background",$output_email,$project_path);
	$output_email=complete_url("TABLE","background",$output_email,$project_path);
	$output_email=complete_url("table","background",$output_email,$project_path);	
	
	
	$email_comment=eregi_replace("\n","<br>",$email_comment);
	
	$mail="$strArticleEmailText1<b>$SiteName</b>$strArticleEmailText3<b>$who_sends</b>$strArticleEmailText2";
	$mail.="<br><br><br><table bgcolor=#cccccc width=100% border=1 cellpadding=10><tr><td align=center>$email_comment</td></tr></table><br><hr><br><br>";
	$mail.="<HTML><HEAD></HEAD><BODY>";
	$mail.="$output_email";
	$mail.="</BODY></HTML>";
	$headers = "Content-Type: text/html; charset=iso-8859-1\n";
	$headers.="From:$who_sends"; 
	
	$who_receives=addslashes($who_receives);
	$subject=addslashes($subject);
	$mail=addslashes($mail);
	$headers=addslashes($headers);
	
	if(mail("$who_receives", "$subject", "$mail" , "$headers"))
	{
		print"$strArticleSent";
	}
	else
	{
		print"$strArticleNotSent";
	}
}
else
{
	print"$strInvalidEmail";
}
?>

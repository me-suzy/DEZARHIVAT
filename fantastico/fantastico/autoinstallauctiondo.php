<cpanel include="fantasticoheader.php">

<table width=100% class="TableMiddle">
              
<tr> 
                
<td>
<p class="TableMiddleHead">Install PHPauction (2/2)</p>
<!--
<cpanel Mysql="adddb($FORM{'db'})"> 
<cpanel Mysql="adduser($FORM{'dbuser'},$FORM{'password'})">
<cpanel Mysql="adduserdb($FORM{'connectdb'},$FORM{'connectuser'})">
-->


<?
$MYSQLUSER = $connectuser;
$MYSQLDB = $connectdb;
$MYSQLPASS = $password;
$USER = "<cpanel print="$user">";
$DOMAIN = "<cpanel print="DOMAIN">";
$USER_ROOT = "<cpanel print="$homedir">/public_html/";
$SCRIPTPATH = "<cpanel print="$homedir">/public_html/auction/";
$DEPOT = "/var/autoinstall/english/auction";
$SQLDATA = $SCRIPTPATH."data.sql";
$ADMIN = $admin;
$SITENAME = $sitename;
$SITEURL = "http://<cpanel print="DOMAIN">/auction/";
$ADMINNAME = $adminname;
$ADMINEMAIL = $adminemail;
$MAXUPLOADSIZE = $maxuploadsize;
$MD5_PREFIX = $MYSQLPASS;
$ADMINPASS = md5($MD5_PREFIX.$password);
$TODAY = date("Ymd");
$TODAYHOUR = date("YmdHis");
$LANGUAGE = $language;
$ADMINPASS_NOMD5 = $password;

//-----------------------------------------

if(!isset($USER)){
	die("<hr><b>No User defined!</b><hr>");
}
if(!isset($DEPOT)){
	die("<hr><b>No Depot defined!</b><hr>");
}
	$shell="cp -rfp ". $DEPOT ." ". $USER_ROOT;
	system($shell);

	$shell="cp -rfpd ".$SCRIPTPATH."languages/".$LANGUAGE."/messages.inc.php ". $SCRIPTPATH."includes/";
	system($shell);
// Copy O.K. Start Config...
$CONFIG_FILE[]=$SCRIPTPATH."includes/config.inc.php";
$CONFIG_FILE[]=$SCRIPTPATH."includes/passwd.inc.php";
$CONFIG_FILE[]=$SCRIPTPATH."phpAdsNew/config.inc.php";
$CONFIG_FILE[]=$SQLDATA;

foreach($CONFIG_FILE AS $FILE){
	if(is_file($FILE)){
		echo "<b>".$FILE."</b> configured<br>";
		$fd = fopen ($FILE, "r");
		$contents = fread ($fd, filesize ($FILE));
		$contents = str_replace("<MYSQLUSER>", $MYSQLUSER, $contents);
		$contents = str_replace("<MYSQLDB>", $MYSQLDB, $contents);
		$contents = str_replace("<MYSQLPASS>", $MYSQLPASS, $contents);		
		$contents = str_replace("<SCRIPTPATH>", $SCRIPTPATH, $contents);
		$contents = str_replace("<USER>", $USER, $contents);
		$contents = str_replace("<DOMAIN>", $DOMAIN, $contents);
		$contents = str_replace("<ADMIN>", $ADMIN, $contents);
		$contents = str_replace("<ADMINNAME>", $ADMIN, $contents);
		$contents = str_replace("<ADMINPASS>", $ADMINPASS, $contents);
		$contents = str_replace("<ADMINEMAIL>", $ADMINEMAIL, $contents);
		$contents = str_replace("<ADMINPASS_NOMD5>", $ADMINPASS_NOMD5, $contents);
		$contents = str_replace("<SITENAME>", $SITENAME, $contents);
		$contents = str_replace("<SITEURL>", $SITEURL, $contents);
		$contents = str_replace("<MAXUPLOADSIZE>", $MAXUPLOADSIZE, $contents);
		$contents = str_replace("<TODAY>", $TODAY, $contents);
		$contents = str_replace("<TODAYHOUR>", $TODAYHOUR, $contents);
		$contents = str_replace("<LANGUAGE>", $LANGUAGE, $contents);

		fclose ($fd);
		$fd = fopen ($FILE, "w");
		fputs($fd, $contents);
		fclose($fd);
	}else{
echo ++$i.") File:<b> ".$FILE."</b> [<span class='Hint'><i>Error </i></span>]<br>";
	}
}
	$shellsqlimport="mysql -u ". $MYSQLUSER ." -p". $MYSQLPASS." ".$MYSQLDB." < $SQLDATA";
	system($shellsqlimport);
?>
</td>
</tr>
               
            
</table>

<p align="center"><b>Please notice:</b></p>
<p align="left">We only offer auto-installation and auto-configuration of <span class="Emphasize">PHPauction</span> but do not offer any kind of support. If you need support, please visit the <a href="http://www.phpauction.org/" target="_blank">Support Forum</a>.</p>
<p align="left">Now you can enter the admin area and setup <span class="Emphasize">PHPauction</span>.</p>
<p class="BoldText" align="center">URL info:</p>
<p align="left">You need a username and a password to enter the admin area. Your username is <span class="Hint"><b>admin</b></span>. Your password is <span class="Hint"><b><cpanel print="$FORM{'password'}"></b></span>. The full URL to the admin area <span class="Hint"><b>(Bookmark this!)</b></span>: <a href="http://<cpanel print="DOMAIN">/auction/admin/" target="blank">http://<cpanel print="DOMAIN">/auction/admin/</a></p>
<p align="left">The full URL to <span class="Emphasize">PHPauction</span>: <a href="http://<cpanel print="DOMAIN">/auction/" target="blank">http://<cpanel print="DOMAIN">/auction/</a></p>
<p>&nbsp;</p>
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

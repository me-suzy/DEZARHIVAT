<cpanel include="fantasticoheader.php">
<table width=100% class="TableMiddle">
<tr> 
<td>
	  <p class="TableMiddleHead">Install Xoops (2/2)</p>
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
$SCRIPTPATH = "<cpanel print="$homedir">/public_html/xoops/";
$ROOTPATH = "<cpanel print="$homedir">/public_html/xoops";
$DEPOT = "/var/autoinstall/english/xoops";
$SITEURL = "http://<cpanel print="DOMAIN">/xoops";
$SQLDATA = $SCRIPTPATH."xoops.sql";
$ADMIN = $admin;
$ADMINPASS = md5($password);
$SITENAME = $sitename;
$SLOGAN = $slogan;
$ADMINEMAIL = $adminemail;
$LANGUAGE = $language;

$current_time = time();

//-----------------------------------------

if(!isset($USER)){
	die("<hr><b>No User defined!</b><hr>");
}
if(!isset($DEPOT)){
	die("<hr><b>No Depot defined!</b><hr>");
}
	$shell="cp -rfp ". $DEPOT ." ". $USER_ROOT;
	system($shell);


$CONFIG_FILE[]=$SCRIPTPATH."mainfile.php";
$CONFIG_FILE[]=$SQLDATA;
$CONFIG_FILE[]=$SCRIPTPATH."modules/system/cache/config.php";

foreach($CONFIG_FILE AS $FILE){
	if(is_file($FILE)){
		echo "<b>".$FILE."</b> configured<br>";
		$fd = fopen ($FILE, "r");
		$contents = fread ($fd, filesize ($FILE));
		$contents = str_replace("<MYSQLUSER>", $MYSQLUSER, $contents);
		$contents = str_replace("<MYSQLDB>", $MYSQLDB, $contents);
		$contents = str_replace("<MYSQLPASS>", $MYSQLPASS, $contents);		
		$contents = str_replace("<USER>", $USER, $contents);
		$contents = str_replace("<DOMAIN>", $DOMAIN, $contents);
		$contents = str_replace("<ADMIN>", $ADMIN, $contents);
		$contents = str_replace("<ADMINPASS>", $ADMINPASS, $contents);
		$contents = str_replace("<ROOTPATH>", $ROOTPATH, $contents);
		$contents = str_replace("<SITEURL>", $SITEURL, $contents);
		$contents = str_replace("<SITENAME>", $SITENAME, $contents);
		$contents = str_replace("<SLOGAN>", $SLOGAN, $contents);
		$contents = str_replace("<ADMINEMAIL>", $ADMINEMAIL, $contents);
		$contents = str_replace("<LANGUAGE>", $LANGUAGE, $contents);
		$contents = str_replace("<JOINED>", $current_time, $contents);

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
<p align="left">We only offer auto-installation and auto-configuration of <span class="Emphasize">Xoops</span> but do not offer any kind of support. If you need support, please visit the <a href="http://www.xoops.org/modules/newbb/" target="_blank">Support Forum</a>.</p>
<p align="left">Now you can enter the admin area and setup <span class="Emphasize">Xoops</span>.</p>
<p class="BoldText" align="center">URL info:</p>
<p align="left">The full URL to <span class="Emphasize">Xoops</span>: <a href="http://<cpanel print="DOMAIN">/xoops/" target="blank">http://<cpanel print="DOMAIN">/xoops/</a></p>
<p align="left">Log in with username <span class="Hint"><b>admin</b></span> and password <span class="Hint"><b><cpanel print="$FORM{'password'}"></b></span> to administrate Xoops.</p>
<p>&nbsp;</p>
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

<cpanel include="fantasticoheader.php">
            
<table width=100% class="TableMiddle">
              
<tr> 
                
<td>
<p class="TableMiddleHead">Install PHProjekt (2/2)</p>
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
$SCRIPTPATH = "<cpanel print="$homedir">/public_html/office/";
$DEPOT = "/var/autoinstall/english/office";
$SQLDATA = $SCRIPTPATH."office.sql";
$ADMIN = $admin;
$ADMINPASS = $password;
$ADMINNAME = $adminname;
$ADMINSURNAME = $adminsurname;
$REMINDER = $reminder;
$PAUSE = $pause;
$FIRSTHOUR = $firsthour;
$LASTHOUR = $lasthour;
$RTSSUPPORT = $rtssupport;
$RTSEMAIL = $rtsemail;
$RTSALLOWED = $rtsallowed;
//-----------------------------------------

if(!isset($USER)){
	die("<hr><b>No User defined!</b><hr>");
}
if(!isset($DEPOT)){
	die("<hr><b>No Depot defined!</b><hr>");
}
	$shell="cp -rfp ". $DEPOT ." ". $USER_ROOT;
	system($shell);

$CONFIG_FILE[]=$SCRIPTPATH."config.inc.php";
$CONFIG_FILE[]=$SQLDATA;

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
		$contents = str_replace("<ADMINNAME>", $ADMINNAME, $contents);
		$contents = str_replace("<ADMINSURNAME>", $ADMINSURNAME, $contents);
		$contents = str_replace("<REMINDER>", $REMINDER, $contents);
		$contents = str_replace("<PAUSE>", $PAUSE, $contents);
		$contents = str_replace("<FIRSTHOUR>", $FIRSTHOUR, $contents);
		$contents = str_replace("<LASTHOUR>", $LASTHOUR, $contents);
		$contents = str_replace("<RTSSUPPORT>", $RTSSUPPORT, $contents);
		$contents = str_replace("<RTSEMAIL>", $RTSEMAIL, $contents);
		$contents = str_replace("<RTSALLOWED>", $RTSALLOWED, $contents);
		$contents = str_replace("<SCRIPTPATH>", $SCRIPTPATH, $contents);

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
<p align="left">We only offer auto-installation and auto-configuration of <span class="Emphasize">PHProjekt</span> but do not offer any kind of support. If you need support, please visit the <a href="http://www.phprojekt.com/modules.php?op=modload&name=forum&file=index" target="_blank">Support Forum</a>.</p>
<p align="left">Now you can enter the admin area and setup <span class="BoldText">PHProjekt</span> workspace.</p>
<p class="BoldText" align="center">URL info:</p>
<p align="left">You need a username and a password to enter <span class="BoldText">PHProjekt</span>. Your username is <span class="Hint"><b>admin</b></span>. Your password is <span class="Hint"><b><cpanel print="$FORM{'password'}"></b></span>. The full URL to <span class="BoldText">PHProjekt</span> <span class="Hint"><b>(Bookmark this!)</b></span>: <a href="http://<cpanel print="DOMAIN">/office/" target="blank">http://<cpanel print="DOMAIN">/office/</a></p>
<p align="left">You may want to finetune the settings by visiting <a href="http://<cpanel print="DOMAIN">/office/setup.php" target="blank">http://<cpanel print="DOMAIN">/office/setup.php</a></p><p>&nbsp;</p>
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

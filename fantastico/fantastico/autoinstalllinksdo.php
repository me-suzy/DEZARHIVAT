<cpanel include="fantasticoheader.php">
            
<table width=100% class="TableMiddle">
              
<tr> 
                
<td>

<p class="TableMiddleHead">Install phpLinks (2/2)</p>

<!--
<cpanel Mysql="adddb($FORM{'db'})"> 
<cpanel Mysql="adduser($FORM{'dbuser'},$FORM{'password'})">
<cpanel Mysql="adduserdb($FORM{'connectdb'},$FORM{'connectuser'})">
<cpanel Fileman="fmmkdir($homedir,.htpasswds)">
<cpanel Fileman="fmmkdir($homedir/.htpasswds,$FORM{'linksfolder'})">
<cpanel Fileman="fmmkdir($homedir/.htpasswds/links,$FORM{'adminfolder'})">
<cpanel Fileman="fmmkdir($FORM{'userrootpath'},$FORM{'linksfolder'})">
<cpanel Fileman="fmmkdir($FORM{'scriptpath'},$FORM{'adminfolder'})">
<cpanel Htaccess="set_protect($FORM{'protectdir'},$FORM{'protected'},$FORM{'resname'})"> 
<cpanel Htaccess="set_pass($FORM{'protectdir'},$FORM{'admin'},$FORM{'password'})">            
-->

<?
$MYSQLUSER = $connectuser;
$MYSQLDB = $connectdb;
$MYSQLPASS = $password;
$USER = "<cpanel print="$user">";
$DOMAIN = "<cpanel print="DOMAIN">";
$USER_ROOT = $userrootpath;
$SCRIPTPATH = $scriptpath;
$DEPOT = "/var/autoinstall/english/links";
$SQLDATA = "<cpanel print="$FORM{'scriptpath'}">admin/phpLinks2.sql";
$ADMIN = "<cpanel print="$FORM{'admin'}">";
$ADMINPASS = "<cpanel print="$FORM{'password'}">";
$SITENAME = $sitename;
$ADMINNAME = $adminname;
$ADMINEMAIL = "<cpanel print="$FORM{'adminemail'}">";

//-----------------------------------------

if(!isset($USER)){
	die("<hr><b>No User defined!</b><hr>");
}
if(!isset($DEPOT)){
	die("<hr><b>No Depot defined!</b><hr>");
}
	$shell="cp -rfp ". $DEPOT ." ". $USER_ROOT;
	system($shell);
//	<MYSQLUSER>
//	<MYSQLDB>
//	<MYSQLPASS>
//  <USER>
//	<DOMAIN>
$CONFIG_FILE[]=$SCRIPTPATH."include/config.php";
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
		$contents = str_replace("<SITENAME>", $SITENAME, $contents);
		$contents = str_replace("<ADMINNAME>", $ADMINNAME, $contents);
		$contents = str_replace("<ADMINEMAIL>", $ADMINEMAIL, $contents);

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
<p align="left">We only offer auto-installation and auto-configuration of <span class="Emphasize">phpLinks</span> but do not offer any kind of support. If you need support, please visit the <a href="http://board.phplinks.org/" target="_blank">Support Forum</a>.</p>
<p align="left">Now you can enter the admin area and setup <span class="Emphasize">phpLinks</span>.</p>
<p class="BoldText" align="center">URL info:</p>
<p align="left">You need a username and a password to enter the admin area. Your username is <span class="Hint"><b>admin</b></span>. Your password is <span class="Hint"><b><cpanel print="$FORM{'password'}"></b></span>. The full URL to the admin area <span class="Hint"><b>(Bookmark this!)</b></span>: <a href="http://<cpanel print="DOMAIN">/links/admin/" target="blank">http://<cpanel print="DOMAIN">/links/admin/</a></p>
<p align="left">The full URL to phpLinks: <a href="http://<cpanel print="DOMAIN">/links/" target="blank">http://<cpanel print="DOMAIN">/links/</a></p>
<p>&nbsp;</p>
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

<cpanel include="fantasticoheader.php">
            
<table width=100% class="TableMiddle">
              
<tr> 
                
<td>
<p class="TableMiddleHead">Install b2 (2/2)</p>

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
$MYSQLPASS = $password;
$USER_ROOT = "<cpanel print="$homedir">/public_html/";
$SCRIPTPATH = "<cpanel print="$homedir">/public_html/blog/";
$DEPOT = "/var/autoinstall/english/blog";
$SQLDATA = $SCRIPTPATH."dump.sql";
$ADMIN = "admin";
$ADMINPASS = $password;
$ADMINNICKNAME = $adminnickname;
$SITENAME = $sitename;
$ADMINEMAIL = $adminemail;
$DESCRIPTION = $description;
$NEWCANBLOG = $newcanblog;
$NOTIFY = $notify;
//-----------------------------------------

if(!isset($USER)){
	die("<hr><b>No User defined!</b><hr>");
}
if(!isset($DEPOT)){
	die("<hr><b>No Depot defined!</b><hr>");
}
	$shell="cp -rfp ". $DEPOT ." ". $USER_ROOT;
system($shell);

$CONFIG_FILE[]=$SCRIPTPATH."b2config.php";
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
		$contents = str_replace("<SITENAME>", $SITENAME, $contents);
		$contents = str_replace("<ADMINEMAIL>", $ADMINEMAIL, $contents);
		$contents = str_replace("<ADMINNICKNAME>", $ADMINNICKNAME, $contents);
		$contents = str_replace("<DESCRIPTION>", $DESCRIPTION, $contents);
		$contents = str_replace("<NEWCANBLOG>", $NEWCANBLOG, $contents);		
		$contents = str_replace("<NOTIFY>", $NOTIFY, $contents);
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
<p align="left">We only offer auto-installation and auto-configuration of <span class="Emphasize">b2</span> but do not offer any kind of support. If you need support, please visit the <a href="http://cafelog.com/" target="_blank">official site</a>.</p>
<p align="left">Now you can enter <span class="Emphasize">b2</span>.</p>
<p class="BoldText" align="center">URL info:</p>
<p align="left">The full URL to <span class="Emphasize">b2</span>: <a href="http://<cpanel print="DOMAIN">/blog" target="blank">http://<cpanel print="DOMAIN">/blog</a>. </p>
<p align="left">Login with username <span class="Hint"><b>admin</b></span>, password <span class="Hint"><b><cpanel print="$FORM{'password'}"></b></span> to access the administration menu.</p>
<p>&nbsp;</p>
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

<cpanel include="fantasticoheader.php">
<?
$MYSQLUSER = str_replace("-","","<cpanel print="$user">_auction");
$MYSQLDB = str_replace("-","","<cpanel print="$user">_auction");

$DBMAX=<cpanel print="$CPDATA{'MAXSQL'}">;
$DBS=$DBMAX - <cpanel Mysql="countdbs()">;
if ($DBS == 0 && is_integer($DBMAX))
	{
	echo "<cpanel include="upgrade.php">";
	} else {
?>
    
<form action=autoinstallauctiondo.php>
<input type='hidden' name='dbuser' value='auction'>
<input type='hidden' name='admin' value='admin'>
<input type='hidden' name='db' value='auction'>
<input type='hidden' name='connectuser' value='<?=$MYSQLUSER?>'>
<input type='hidden' name='connectdb' value='<?=$MYSQLDB?>'>
<input type='hidden' name='siteurl' value='http://<cpanel print="DOMAIN">/auction/'>
<p align="center"><img src="images/phpauction.gif" width="241" height="70">
<p>
<table width=100% class='TableMiddle'>
<tr> 
<td colspan="2">
<p class="TableMiddleHead">Install PHPauction (1/2)</p>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>
<p>Your password (you need this to enter the protected admin area)</p>
</td>
<td>
<input type="password" name="password" size="8" maxlength="8">
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td colspan="2" class="Emphasize">
<p>Please enter the  base configuration data</p>
</td>
</tr>
<tr>
<td>Site name</td>
<td>
<input type="text" name="sitename" size="22" value="<cpanel print="DOMAIN">">
</td>
</tr>
<tr>
<td>Admin e-mail (add your e-mail here)</td>
<td>
<input type="text" name="adminemail" size="22" value="<cpanel print="$user">@<cpanel print="DOMAIN">">
</td>
</tr>
<tr>
<td>Max size of images allowed to be uploaded (bytes)</td>
<td>
<input type="text" name="maxuploadsize" size="8" value="50000" maxlength="6">
</td>
</tr>
    <tr>
	  <td>Preferred Language</td>
	  <td>
		<select name="language">
		  <option value="czech">Czech</option>
		  <option value="english" selected>English</option>
		  <option value="french">French</option>
		  <option value="german">German</option>
		  <option value="italian">Italian</option>
		  <option value="polish">Polish</option>
		  <option value="russian">Russian</option>
		  <option value="spanish">Spanish</option>
							  
		</select>
	  </td>
	</tr>
</table>
<p align="center">
<input type="submit" name="action" value="Install PHPauction">
</p>
</form>

    <?php
}
?>

<table width="100%" border="0" cellpadding="0">
<tr align="center"> 
<td><a href="index.php">Fantastico Auto-installer overview</a>
<cpanel include="fantasticofooter.php">

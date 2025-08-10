<cpanel include="fantasticoheader.php">

<?
$MYSQLUSER = str_replace("-","","<cpanel print="$user">_shop");
$MYSQLDB = str_replace("-","","<cpanel print="$user">_shop");

$DBMAX=<cpanel print="$CPDATA{'MAXSQL'}">;
$DBS=$DBMAX - <cpanel Mysql="countdbs()">;
if ($DBS == 0 && is_integer($DBMAX))
	{
	echo "<cpanel include="upgrade.php">";
	} else {
?>
    
<form action=autoinstallshopdo.php>
<input type='hidden' name='dbuser' value='shop'>
<input type='hidden' name='admin' value='admin'>
<input type='hidden' name='db' value='shop'>
<input type='hidden' name='connectuser' value='<?=$MYSQLUSER?>'>
<input type='hidden' name='connectdb' value='<?=$MYSQLDB?>'>
<input type='hidden' name='userrootpath' value='<cpanel print="$homedir">/public_html/'>
<input type='hidden' name='scriptpath' value='<cpanel print="$homedir">/public_html/shop/'>
<input type='hidden' name='shopfolder' value='shop'>
<input type='hidden' name='adminfolder' value='admin'>
<input type='hidden' name='resname' value='OS Commerce Admin-Bereich'>
<input type='hidden' name='protectdir' value='<cpanel print="$homedir">/public_html/shop/admin'>
<input type='hidden' name='protected' checked value='1'>
<p align="center"><img src="images/oscommerce.gif" width="231" height="45">
<p>
<table width=100% class='TableMiddle'>
<tr> 
<td colspan="2">
<p class="TableMiddleHead">Install OS Commerce (1/2)</p>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
<td>
<p>Your password (you need this to enter the protected admin area). You may change this later using the <span class="BoldText">&quot;Password Protect Directories&quot;</span> function of your domain control panel.
</p>
</td>
<td>
<input type="password" name="password" size="8" maxlength="8">
</td>
</tr>
<tr>
<td colspan="2">&nbsp;</td>
</tr>
<tr>
<td colspan="2" class="Emphasize">Please enter the  base configuration data</td>
</tr>
<tr>
<td>Shop name</td>
<td>
<input type="text" name="shopname" size="22">
</td>
</tr>
<tr>
<td>Owner's name</td>
<td>
<input type="text" name="owner" size="22">
</td>
</tr>
<tr>
<td>Email sender (will display in the &quot;FROM&quot; field in the emails sent by the shop)</td>
<td>
<input type="text" name="from" size="22">
</td>
</tr>

<tr>
<td>Your email address (copy of all orders will be sent to this address)</td>
<td>
<input type="text" name="email" size="22" value="<cpanel print="$user">@<cpanel print="DOMAIN">">
</td>
</tr>


<tr>
<td>Use SSL (secure transactions)</td>
<td>
<select name="ssl">
<option value="true">Yes</option>
<option value="false" selected>No</option>
</select>
</td>
</tr>

<tr>
<td>Secure server hostname in case you use SSL. Only hostname (and username in case of a shared certificate). Don't add 'https://' and don't use leading or trailing slash.</td>
<td>
<input type="text" name="sslserver" size="22" value="<cpanel print="DOMAIN">">
</td>
</tr>

<tr>
<td>Show prices incl. tax</td>
<td>
<select name="vat">
<option value="true" selected>Yes</option>
<option value="false">No</option>
</select>
</td>
</tr>
<tr>
<td class="BoldText">&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<td class="BoldText">When clients register:</td>
<td>&nbsp;</td>
</tr>
<tr>
<td>Require client's birthdate </td>
<td>
<select name="dob">
<option value="true">Yes</option>
<option value="false" selected>No</option>
</select>
</td>
</tr>
<tr>
<td>Require client's gender</td>
<td>
<select name="sex">
<option value="true">Yes</option>
<option value="false" selected>No</option>
</select>
</td>
</tr>
<tr>
<td>Require company name</td>
<td>
<select name="company">
<option value="true">Yes</option>
<option value="false" selected>No</option>
</select>
</td>
</tr>
<tr>
<td>Require suburb</td>
<td>
<select name="suburb">
<option value="true">Yes</option>
<option value="false" selected>No</option>
</select>
</td>
</tr>
<tr>
<td>Require State</td>
<td>
<select name="state">
<option value="true" selected>Yes</option>
<option value="false" selected>No</option>
</select>
</td>
</tr>
</table>
<p align="center">
<input type="submit" name="action" value="Install OS Commerce">
</p>
</form>

    <?php
}
?>

<table width="100%" border="0" cellpadding="0">
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

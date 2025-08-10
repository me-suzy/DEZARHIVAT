<cpanel include="fantasticoheader.php">

<?
$MYSQLUSER = str_replace("-","","<cpanel print="$user">_xoops");
$MYSQLDB = str_replace("-","","<cpanel print="$user">_xoops");

$DBMAX=<cpanel print="$CPDATA{'MAXSQL'}">;
$DBS=$DBMAX - <cpanel Mysql="countdbs()">;
if ($DBS == 0 && is_integer($DBMAX))
	{
	echo "<cpanel include="upgrade.php">";
	} else {
?>
    
<form action=autoinstallxoopsdo.php>
<input type='hidden' name='dbuser' value='xoops'>
<input type='hidden' name='admin' value='admin'>
<input type='hidden' name='db' value='xoops'>
<input type='hidden' name='connectuser' value='<?=$MYSQLUSER?>'>
<input type='hidden' name='connectdb' value='<?=$MYSQLDB?>'>

  <p align="center"><img src="images/xoops.gif" width="252" height="78">
  <p>
  <table width=100% class='TableMiddle'>
    <tr> 
	  <td colspan="2">
		<p class="TableMiddleHead">Install Xoops (1/2)</p>
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
		<td>Your site's slogan</td>
		<td>
		<input type="text" name="slogan" size="22">
		</td>
	</tr>
    <tr>
	  <td>Admin e-mail (add your e-mail here)</td>
	  <td>
		<input type="text" name="adminemail" size="22" value="<cpanel print="$user">@<cpanel print="DOMAIN">">
</td>
	</tr>
    <tr>
	  <td>Preferred Language</td>
	  <td>
		<select name="language">
		  <option value="tchinese">Chinese (Traditional)</option>
		  <option value="schinese">Chinese (Simplified)</option>
		  <option value="danish">Danish</option>
		  <option value="nederlands">Dutch</option>
		  <option value="english" selected>English</option>
		  <option value="french">French</option>
		  <option value="german">German</option>
		  <option value="italian">Italian</option>
		  <option value="japanese">Japanese</option>
		  <option value="spanish">Spanish</option>
		</select>
	  </td>
	</tr>

  </table>
<p align="center">
<input type="submit" name="action" value="Install Xoops">
</p>
</form>

    <?php
}
?>

<center>
  <a href="index.php">Fantastico Auto-installer overview</a>

</center>
<cpanel include="fantasticofooter.php">

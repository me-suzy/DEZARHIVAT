<cpanel include="fantasticoheader.php">

<?
$MYSQLUSER = str_replace("-","","<cpanel print="$user">_website");
$MYSQLDB = str_replace("-","","<cpanel print="$user">_website");

$DBMAX=<cpanel print="$CPDATA{'MAXSQL'}">;
$DBS=$DBMAX - <cpanel Mysql="countdbs()">;
if ($DBS == 0 && is_integer($DBMAX))
	{
	echo "<cpanel include="upgrade.php">";
	} else {
?>
    
<form action=autoinstallwebsitedo.php>
<input type='hidden' name='dbuser' value='website'>
<input type='hidden' name='admin' value='admin'>
<input type='hidden' name='db' value='website'>
<input type='hidden' name='connectuser' value='<?=$MYSQLUSER?>'>
<input type='hidden' name='connectdb' value='<?=$MYSQLDB?>'>

<p align="center"><img src="images/phpwebsite.gif" width="262" height="80">
<p>
<table width=100% class='TableMiddle'>
<tr> 
<td colspan="2">
<p class="TableMiddleHead">Install phpWebSite (1/2)</p>
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
<td colspan="2" class="Emphasize">Please enter the  base configuration data</td>
</tr>
<tr>
<td>Site name</td>
<td>
<input type="text" name="sitename" size="22" value="<cpanel print="DOMAIN">">
</td>
</tr>
<tr>
<td>Site URL (NO trailing slash)</td>
<td>
<input type="text" name="siteurl" size="22" value="http://<cpanel print="DOMAIN">/website">
</td>
</tr>
<tr>
<td>Title (will be appended to your site name in the browser's titlebar)</td>
<td>
<input type="text" name="title" size="22">
</td>
</tr>
<tr>
<td>Your site's slogan</td>
<td>
<input type="text" name="subtitle" size="22">
</td>
</tr>
<tr>
<td>Start date of the site</td>
<td>
<input type="text" name="begindate" size="22">
</td>
</tr>
<tr>
<td>Admin e-mail (your email address)</td>
<td>
<input type="text" name="adminemail" size="22" value="<cpanel print="$user">@<cpanel print="DOMAIN">">
</td>
</tr>
<tr>
<td>Title for Ultramode backend</td>
<td>
<input type="text" name="backendtitle" size="22">
</td>
</tr>
</table>
<p align="center">
<input type="submit" name="action" value="Install phpWebSite">
</p>
</form>

    <?php
}
?>

<p align="center"> 
<a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

<cpanel include="fantasticoheader.php">

<?
$MYSQLUSER = str_replace("-","","<cpanel print="$user">_links");
$MYSQLDB = str_replace("-","","<cpanel print="$user">_links");

$DBMAX=<cpanel print="$CPDATA{'MAXSQL'}">;
$DBS=$DBMAX - <cpanel Mysql="countdbs()">;
if ($DBS == 0 && is_integer($DBMAX))
	{
	echo "<cpanel include="upgrade.php">";
	} else {
?>
    
<form action=autoinstalllinksdo.php>
<input type='hidden' name='dbuser' value='links'>
<input type='hidden' name='admin' value='admin'>
<input type='hidden' name='db' value='links'>
<input type='hidden' name='connectuser' value='<?=$MYSQLUSER?>'>
<input type='hidden' name='connectdb' value='<?=$MYSQLDB?>'>

<input type='hidden' name='userrootpath' value='<cpanel print="$homedir">/public_html/'>
<input type='hidden' name='scriptpath' value='<cpanel print="$homedir">/public_html/links/'>
<input type='hidden' name='linksfolder' value='links'>
<input type='hidden' name='adminfolder' value='admin'>
<input type='hidden' name='resname' value='phpLinks Admin-Bereich'>
<input type='hidden' name='protectdir' value='<cpanel print="$homedir">/public_html/links/admin'>
<input type='hidden' name='protected'  value='1'>
<p align="center"><img src="images/phplinks.gif" width="200" height="49">
<p>
<table width=100% class='TableMiddle'>
<tr> 
<td colspan="2">
<p class="TableMiddleHead">Install phpLinks (1/2)</p>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
<td>
<p>Your password (you need this to enter the protected admin area). You may change this later using the <span class="BoldText">&quot;Password Protect Directories&quot;</span> function of your domain control panel.
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
<input type="text" name="sitename" size="22">
</td>
</tr>
<tr>
<td>Admin name</td>
<td>
<input type="text" name="adminname" size="22">
</td>
</tr>
<tr>
<td>Admin e-mail (add your e-mail here)</td>
<td>
<input type="text" name="adminemail" size="22">
</td>
</tr>
</table>
<p align="center">
<input type="submit" name="action" value="Install phpLinks">
</p>
</form>

    <?php
}
?>

<table width="100%" border="0" cellpadding="0">
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

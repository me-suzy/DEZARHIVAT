<cpanel include="fantasticoheader.php">

<?
$MYSQLUSER = str_replace("-","","<cpanel print="$user">_pnuke");
$MYSQLDB = str_replace("-","","<cpanel print="$user">_pnuke");

$DBMAX=<cpanel print="$CPDATA{'MAXSQL'}">;
$DBS=$DBMAX - <cpanel Mysql="countdbs()">;
if ($DBS == 0 && is_integer($DBMAX))
	{
	echo "<cpanel include="upgrade.php">";
	} else {
?>
    
<form action=autoinstallpostnukedo.php>
<input type='hidden' name='dbuser' value='pnuke'>
<input type='hidden' name='admin' value='admin'>
<input type='hidden' name='db' value='pnuke'>
<input type='hidden' name='connectuser' value='<?=$MYSQLUSER?>'>
<input type='hidden' name='connectdb' value='<?=$MYSQLDB?>'>

<p align="center"><img src="images/postnuke.gif" width="339" height="61">
<p>
<table width=100% class='TableMiddle'>
<tr> 
<td colspan="2">
<p class="TableMiddleHead">Install Post-Nuke (1/2)</p>
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
<td>Your site's slogan</td>
<td>
<input type="text" name="slogan" size="22">
</td>
</tr>
<tr>
<td>Search engines keywords</td>
<td>
<textarea name="keywords" cols="22" rows="6" wrap="VIRTUAL"></textarea>
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
<td>How many stories to display in Top page</td>
<td>
<input type="text" name="articlecount" size="6" value="10">
</td>
</tr>
<tr>
<td>How many stories to display in Home page</td>
<td>
<input type="text" name="articlecounthome" size="6" value="10">
</td>
</tr>

<tr>
<td>Footer (HTML allowed). Enter the text you want to display on the bottom of every page.</td>
<td>
<textarea name="footer" cols="22" wrap="VIRTUAL" rows="8">Enter your copyright notice or anything that should display on every page. HTML is allowed.</textarea>
</td>
</tr>

<tr>
<td>Title for XML/RDF backend</td>
<td>
<input type="text" name="backendtitle" size="22">
</td>
</tr>
<tr>
<td>Send new stories to admin</td>
<td>
<select name="sendemail">
<option value="1" selected>Yes</option>
<option value="0">No</option>
</select>
</td>
</tr>
<tr>
<td>Activate multilingual features (there are no language included in this distribution but you may download them from the support-forum whenever they are available)</td>
<td>
<select name="multilingual">
<option value="1">Yes</option>
<option value="0" selected>No</option>
</select>
</td>
</tr>
<tr>
<td>Show Flags for language menu</td>
<td>
<select name="useflags">
<option value="1">Yes</option>
<option value="0" selected>No</option>
</select>
</td>
</tr>

<tr>
<td>Allow unregistered users to post comments</td>
<td>
<select name="allowcomments">
<option value="0">Yes</option>
<option value="1" selected>No</option>
</select>
</td>
</tr>
</table>
<p align="center">
<input type="submit" name="action" value="Install Post-Nuke">
</p>
</form>

    <?php
}
?>

<table width="100%" border="0" cellpadding="0">
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

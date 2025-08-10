<cpanel include="fantasticoheader.php">

<?
$MYSQLUSER = str_replace("-","","<cpanel print="$user">_nuke");
$MYSQLDB = str_replace("-","","<cpanel print="$user">_nuke");

$DBMAX=<cpanel print="$CPDATA{'MAXSQL'}">;
$DBS=$DBMAX - <cpanel Mysql="countdbs()">;
if ($DBS == 0 && is_integer($DBMAX))
	{
	echo "<cpanel include="upgrade.php">";
	} else {
?>
    
<form action=autoinstallnukedo.php>
<input type='hidden' name='dbuser' value='nuke'>
<input type='hidden' name='admin' value='admin'>
<input type='hidden' name='db' value='nuke'>
<input type='hidden' name='connectuser' value='<?=$MYSQLUSER?>'>
<input type='hidden' name='connectdb' value='<?=$MYSQLDB?>'>

<p align="center"><img src="images/phpnuke.gif" width="335" height="81">
<p>
<table width=100% class='TableMiddle'>
<tr> 
<td colspan="2">
<p class="TableMiddleHead">Install PHP-Nuke (1/2)</p>
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
<input type="text" name="title" size="22">
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
<td>How many stories to display in main page</td>
<td>
<input type="text" name="articlecount" size="6" value="10">
</td>
</tr>
<tr>
<td>How many stories to display in Old Articles box</td>
<td>
<input type="text" name="oldarticlecount" size="6" value="10">
</td>
</tr>
<tr>
<td>Footer (HTML allowed). Enter the text you want to display on the bottom of every page.</td>
<td>
<textarea name="footer" cols="22" wrap="VIRTUAL" rows="8">Enter your copyright notice or anything that should display on every page. HTML is allowed.</textarea>
</td>
</tr>
<tr>
<td>Activate Ultramode plain text file backend syndication</td>
<td>
<select name="ultramode">
<option value="1" selected>Yes</option>
<option value="0">No</option>
</select>
</td>
</tr>
<tr>
<td>Title for Ultramode backend</td>
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
	  <td>Preferred Language
	  </td>
	  <td>
		<select name="language">
		  <option value="arabic">Arabic</option>
		  <option value="brazilian">Brazilian</option>
		  <option value="catala">Catala</option>
		  <option value="chinese">Chinese</option>
		  <option value="danish">Danish</option>
		  <option value="dutch">Dutch</option>
		  <option value="english" selected>English</option>
		  <option value="german">German</option>
		  <option value="indonesian">Indonesian</option>
		  <option value="italian">Italian</option>
		  <option value="norwegian">Norwegian</option>
		  <option value="polish">Polish</option>
		  <option value="portuguese">Portuguese</option>
		  <option value="slovak">Slovak</option>
		  <option value="spanish">Spanish</option>
		  <option value="thai">Thai</option>
		  <option value="turkish">Turkish</option>
		</select>
	  </td>
	</tr>
<tr>
<td colspan=2><span class='Hint'><b>ATTENTION:</b></span> In the admin panel of PHP-Nuke you will have the option to select additional languages. If you select any language other than the ones listed here, PHP will quit with "Fatal Error" warnings since some modules (Forums, Journal, Webmail) do not include the necessary language files. If you need one of the additional languages, you must add the language files for these 3 modules before switching or your site will not be operational!
</td>
</tr>
<tr>
<td>Activate multilingual features</td>
<td>
<select name="multilingual">
<option value="1" selected>Yes</option>
<option value="0">No</option>
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
<input type="submit" name="action" value="Install PHP-Nuke">
</p>
</form>

    <?php
}
?>

<table width="100%" border="0" cellpadding="0">
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

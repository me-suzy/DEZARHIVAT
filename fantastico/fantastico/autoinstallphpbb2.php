<cpanel include="fantasticoheader.php">

<?php
$MYSQLUSER = str_replace("-","","<cpanel print="$user">_bbforum");
$MYSQLDB = str_replace("-","","<cpanel print="$user">_bbforum");

$DBMAX=<cpanel print="$CPDATA{'MAXSQL'}">;
$DBS=$DBMAX - <cpanel Mysql="countdbs()">;
if ($DBS == 0 && is_integer($DBMAX))
	{
	echo "<cpanel include="upgrade.php">";
	} else {
?>
    
<form action=autoinstallphpbb2do.php>
<input type='hidden' name='dbuser' value='bbforum'>
<input type='hidden' name='admin' value='admin'>
<input type='hidden' name='db' value='bbforum'>
<input type='hidden' name='connectuser' value='<?=$MYSQLUSER?>'>
<input type='hidden' name='connectdb' value='<?=$MYSQLDB?>'>

<p align="center"><img src="images/phpbb2.gif" width="200" height="91">
<p>
<table width=100% class='TableMiddle'>
<tr> 
<td colspan="2">
<p class="TableMiddleHead">Install phpBB2 (1/2)</p>
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
<td>Small description</td>
<td>
<input type="text" name="smalldescription" size="22" value="Enter a short description here">
</td>
</tr>
<tr>
<td>E-Mail signature (will be attached to all emails sent by the forum)</td>
<td>
<input type="text" name="emailsignature" size="22" value="The Forum Management">
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
<option value="albanian">Albanian</option>
<option value="arabic">Arabic</option>
<option value="bulgarian">Bulgarian</option>
<option value="chinese_simplified">Chinese Simplified</option>
<option value="chinese_traditional_taiwan">Chinese Traditional</option>
<option value="danish">Danish</option>
<option value="dutch">Dutch</option>
<option value="english" selected>English</option>
<option value="finnish">Finnish</option>
<option value="french">French</option>
<option value="german">German</option>
<option value="hungarian">Hungarian</option>
<option value="italian">Italian</option>
<option value="norwegian">Norwegian</option>
<option value="polish">Polish</option>
<option value="portuguese">Portuguese</option>
<option value="russian">Russian</option>
<option value="spanish">Spanish</option>
<option value="swedish">Swedish</option>
<option value="turkish">Turkish</option>
</select>
</td>
</tr>

</table>
<p align="center">
<input type="submit" name="action" value="Install phpBB2">
</p>
</form>

    <?php
}
?>

<table width="100%" border="0" cellpadding="0">
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

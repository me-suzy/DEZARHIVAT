<cpanel include="fantasticoheader.php">

<?
$MYSQLUSER = str_replace("-","","<cpanel print="$user">_blog");
$MYSQLDB = str_replace("-","","<cpanel print="$user">_blog");

$DBMAX=<cpanel print="$CPDATA{'MAXSQL'}">;
$DBS=$DBMAX - <cpanel Mysql="countdbs()">;
if ($DBS == 0 && is_integer($DBMAX))
	{
	echo "<cpanel include="upgrade.php">";
	} else {
?>
    
<form action=autoinstallblogdo.php>
<input type='hidden' name='dbuser' value='blog'>
<input type='hidden' name='admin' value='admin'>
<input type='hidden' name='db' value='blog'>
<input type='hidden' name='connectuser' value='<?=$MYSQLUSER?>'>
<input type='hidden' name='connectdb' value='<?=$MYSQLDB?>'>

<p align="center"><img src="images/b2minilogo.png" width="50" height="50">
<p>
<table width=100% class='TableMiddle'>
<tr> 
<td colspan="2">
<p class="TableMiddleHead">Install b2 (1/2)</p>
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
<td>Blog name</td>
<td>
<input type="text" name="sitename" size="22" value="My web blog">
</td>
</tr>

<tr>
<td>Description</td>
<td>
<input type="text" name="description" size="22">
</td>
</tr>

<tr>
<td>Your nickname</td>
<td>
<input type="text" name="adminnickname" size="22" maxlength="50">
</td>
</tr>
<tr>
<td>Admin e-mail (your email address)</td>
<td>
<input type="text" name="adminemail" size="22" value="<cpanel print="$user">@<cpanel print="DOMAIN">">
</td>
</tr>
<tr>
<td>New users can blog after registration</td>
<td>
<select name="newcanblog">
<option value="1" selected>Yes</option>
<option value="0">No</option>
</select>
</td>
</tr>
<tr>
<td>Notify authors about comments on their posts</td>
<td>
<select name="notify">
<option value="1" selected>Yes</option>
<option value="0">No</option>
</select>
</td>
</tr>
</table>
<p align="center">
<input type="submit" name="action" value="Install b2">
</p>
</form>

    <?php
}
?>

<table width="100%" border="0" cellpadding="0">
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

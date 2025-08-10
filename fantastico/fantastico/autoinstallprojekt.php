<cpanel include="fantasticoheader.php">

<?
$MYSQLUSER = str_replace("-","","<cpanel print="$user">_office");
$MYSQLDB = str_replace("-","","<cpanel print="$user">_office");

$DBMAX=<cpanel print="$CPDATA{'MAXSQL'}">;
$DBS=$DBMAX - <cpanel Mysql="countdbs()">;
if ($DBS == 0 && is_integer($DBMAX))
	{
	echo "<cpanel include="upgrade.php">";
	} else {
?>
    
<form action=autoinstallprojektdo.php>
<input type='hidden' name='dbuser' value='office'>
<input type='hidden' name='admin' value='admin'>
<input type='hidden' name='db' value='office'>
<input type='hidden' name='connectuser' value='<?=$MYSQLUSER?>'>
<input type='hidden' name='connectdb' value='<?=$MYSQLDB?>'>

<p align="center"><img src="images/phprojekt.gif" width="86" height="39">
<p>
<table width=100% class='TableMiddle'>
<tr> 
<td colspan="2">
<p class="TableMiddleHead">Install PHProjekt (1/2)</p>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<tr>
<td>
<p>Your password (you need this to enter the protected admin area).</p>
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
<td>Admin name</td>
<td>
<input type="text" name="adminname" size="22">
</td>
</tr>
<tr>
<td>Admin surname</td>
<td>
<input type="text" name="adminsurname" size="22">
</td>
</tr>
<tr>
<td>Reminder</td>
<td>
<input type="text" name="reminder" size="6" value="30">
&nbsp;minutes before task</td>
</tr>
<tr>
<td>Leaving counts as</td>
<td>
<select name="pause">
<option value="1" selected>Pause</option>
<option value="0">Working time</option>
</select>
</td>
</tr>
<tr>
<td>First hour of the day</td>
<td>
<select name="firsthour">
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8" selected>8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
</select>
</td>
</tr>
<tr>
<td>Last hour of the day</td>
<td>
<select name="lasthour">
<option value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18" selected>18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
</select>
</td>
</tr>
<tr>
<td>Activate RTS (Request Tracker )</td>
<td>
<select name="rtssupport">
<option value="1" selected>Yes</option>
<option value="0">No</option>
</select>
</td>
</tr>

<tr>
<td>RTS email address</td>
<td>
<input type="text" name="rtsemail" size="22" value="support@<cpanel print="DOMAIN">">
</td>
</tr>
<tr>
<td>RTS Customer Authentification</td>
<td>
<select name="rtsallowed">
<option value="0" selected>Anybody</option>
<option value="1">Must be in contact list</option>
</select>
</td>
</tr>
</table>
<p align="center">
<input type="submit" name="action" value="Install PHProjekt">
</p>
</form>

    <?php
}
?>

<p align="center"> 
<a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

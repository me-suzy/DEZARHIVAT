<cpanel include="fantasticoheader.php">

<table class="TableMiddle" align="center">
              
<tr> 
                
<td>
<p class="TableMiddleHead">Removing installation</p>
<p>

<!--
<cpanel Mysql="deldb($FORM{'doremovedb'})">
-->
MySQL database <span class="Emphasize"><cpanel print="$FORM{'doremovedb'}"></span> was removed.<br />
<!--
<cpanel Mysql="deluser($FORM{'doremoveuser'})">
-->
MySQL user <span class="Emphasize"><cpanel print="$FORM{'doremoveuser'}"></span> was removed.<br />
<?
$USER_ROOT = "<cpanel print="$FORM{'doremovefolder'}">";
if(is_dir($USER_ROOT)){
	$shell="rm -rf ". $USER_ROOT;
	system($shell);
    echo "Directory <span class='Emphasize'><cpanel print="$FORM{'doremovefolder'}"></span> was removed.";
}else{
	die("<hr><b>No such directory: </b><span class='Emphasize'>".$USER_ROOT."</span>!");
}
?>
</td>
</tr>
               
            
</table>
<p>&nbsp;</p>
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

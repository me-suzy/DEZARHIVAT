<cpanel include="fantasticoheader.php">

<table width=100% class="TableMiddle" align="center">
              
<tr> 
                
<td>
<p class="TableMiddleHead">Last warning!</p>
<p>The directory<span class="BoldText"><cpanel print="$FORM{'removefolder'}"></span>, 
and the MySQL database and MySQL user named <span class="BoldText"><?=str_replace("-","","<cpanel print="$FORM{'removeuser'}">")?></span> will be deleted. 
<p><span class="Hint">You can't undo this! Click on <span class="BoldText">Remove <cpanel print="$FORM{'removeapp'}">
</span> to proceed.</span>
<p align='center'>
<form action="autoinstallremovedo.php">
<input type='hidden' name='doremovefolder' value='<cpanel print="$FORM{'removefolder'}">'>
<input type='hidden' name='doremoveapp' value='<cpanel print="$FORM{'removeapp'}">'>
<input type='hidden' name='doremoveuser' value='<?=str_replace("-","","<cpanel print="$FORM{'removeuser'}">")?>'>
<input type='hidden' name='doremovedb' value='<?=str_replace("-","","<cpanel print="$FORM{'removedb'}">")?>'>
<input type='submit' name='submit' value='Remove <cpanel print="$FORM{'removeapp'}">'>
</form>
</td>
</tr>
               
            
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0" align="center">
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

<cpanel include="fantasticoheader.php">
            
			    
<p align="center"><img src="images/xoops.gif" width="252" height="78">
<p>
<table width="100%" class="MainMenuItems" align="center">
<tr> 
<td align="center" class="BoldText">&nbsp;</td>
</tr>
<tr>
<td class="linieuntenaligncenter">
<div align='left'>
<p>&nbsp;
		<p>
<a href='http://<cpanel print="DOMAIN">/xoops/' target='_blank'>Enter Xoops</a>
<p>
<a href='http://www.xoops.org/modules/newbb/' target='_blank'>Visit the Xoops support forum</a> <br>
(We are not associated with the support forum)
<p>&nbsp;
<p class='Hint'><b>Remove Xoops</b>
<p>
<p>There is a directory called <span class="BoldText">xoops</span> in your web root directory. If this directory was created by you rather than by this auto-installer, then DO NOT attempt to remove it. If you click on &quot;Remove Xoops&quot;, then the directory called <span class="BoldText">xoops</span> and any existing MySQL database and MySQL user called <span class="BoldText"><?=str_replace("-","","<cpanel print="$user">_xoops")?></span> will be removed.</p>
<p class='Hint'>Notice! Clicking on &quot;Remove Xoops&quot; will remove the data even if they were not created by this auto-installer.</p>
<form action='autoinstallremoveconfirm.php'>
<p>
<input type='hidden' name='removefolder' value='<cpanel print="$homedir">/public_html/xoops'>
<input type='hidden' name='removeapp' value='Xoops'>
<input type='hidden' name='removeuser' value='<?=str_replace("-","","<cpanel print="$user">_xoops")?>'>
<input type='hidden' name='removedb' value='<?=str_replace("-","","<cpanel print="$user">_xoops")?>'>
</p>
<p class="ButtonPosition">
<input type='submit' name='Submit' value='Remove Xoops' class='ButtonDef'>
</p>
</form>
</div>
</td>
</tr>
</table>
<p>&nbsp;</p>
<center>
  <a href="index.php">Fantastico Auto-installer overview</a>

</center>
<cpanel include="fantasticofooter.php">

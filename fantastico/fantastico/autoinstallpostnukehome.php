<cpanel include="fantasticoheader.php">
           
			    
<p align="center"><img src="images/postnuke.gif" width="339" height="61">
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
<a href='http://<cpanel print="DOMAIN">/postnuke/' target='_blank'>Enter Post-Nuke</a>
<p>
<a href='http://<cpanel print="DOMAIN">/postnuke/admin.php' target='_blank'>Enter admin area</a>
<p>
<a href='http://www.postnuke.com/' target='_blank'>Visit Post-Nuke support forum</a> <br>
(We are not associated with the support forum)
<p>&nbsp;
<p class='Hint'><b>Remove Post-Nuke</b>
<p>
<p>There is a directory called <span class="BoldText">postnuke</span> in your web root directory. If this directory was created by you rather than by this auto-installer, then DO NOT attempt to remove it. If you click on &quot;Remove OS Commerce&quot;, then the directory called <span class="BoldText">postnuke</span> and any existing MySQL database and MySQL user called <span class="BoldText"><?=str_replace("-","","<cpanel print="$user">_pnuke")?></span> will be removed.</p>
<p class='Hint'>Notice! Clicking on &quot;Remove Post-Nuke&quot; will remove the data even if they were not created by this auto-installer.</p>
<form action='autoinstallremoveconfirm.php'>
<p>
<input type='hidden' name='removefolder' value='<cpanel print="$homedir">/public_html/postnuke'>
<input type='hidden' name='removeapp' value='Post-Nuke'>
<input type='hidden' name='removeuser' value='<cpanel print="$user">_pnuke'>
<input type='hidden' name='removedb' value='<cpanel print="$user">_pnuke'>
</p>
<p class="ButtonPosition">
<input type='submit' name='Submit' value='Remove Post-Nuke' class='ButtonDef'>
</p>
</FORM>
</div>
</td>
</tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0">
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

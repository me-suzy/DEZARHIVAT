<cpanel include="fantasticoheader.php">

			    
<p align="center"><img src="images/phprojekt.gif" width="86" height="39">
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
<a href='http://<cpanel print="DOMAIN">/office/' target='_blank'>Enter PHProjekt</a>
<p>
<a href='http://<cpanel print="DOMAIN">/office/setup.php' target='_blank'>Finetune PHProjekt settings</a>
<p>
<a href='http://www.phprojekt.com/modules.php?op=modload&name=forum&file=index' target='_blank'>Visit PHProjekt support forum</a><br>
(We are not associated with the support forum)
<p>&nbsp;
<p class='Hint'><b>Remove PHProjekt</b>
<p>
<p>There is a directory called <span class="BoldText">office</span> in your web root directory. If this directory was created by you rather than by this auto-installer, then DO NOT attempt to remove it. If you click on &quot;Remove OS Commerce&quot;, then the directory called <span class="BoldText">office</span> and any existing MySQL database and MySQL user called <span class="BoldText"><?=str_replace("-","","<cpanel print="$user">_office")?></span> will be removed.</p>
<p class='Hint'>Notice! Clicking on &quot;Remove PHProjekt&quot; will remove the data even if they were not created by this auto-installer.</p>
<form action='autoinstallremoveconfirm.php'>
<p>
<input type='hidden' name='removefolder' value='<cpanel print="$homedir">/public_html/office'>
<input type='hidden' name='removeapp' value='PHProjekt'>
<input type='hidden' name='removeuser' value='<cpanel print="$user">_office'>
<input type='hidden' name='removedb' value='<cpanel print="$user">_office'>
</p>
<p class="ButtonPosition">
<input type='submit' name='Submit' value='Remove PHProjekt' class='ButtonDef'>
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

<cpanel include="fantasticoheader.php">
			    
<p align="center"><img src="images/phpauction.gif" width="241" height="70">
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
<a href='http://<cpanel print="DOMAIN">/auction/' target='_blank'>Enter PHPauction</a>
<p>
<a href='http://<cpanel print="DOMAIN">/auction/admin.php' target='_blank'>Enter admin area</a>
<p>
<a href='http://www.phpauction.org/' target='_blank'>Visit PHPauction support forum</a> <br>
(We are not associated with the support forum)
<p>&nbsp;
<p class='Hint'><b>Remove PHPauction</b>
<p>
<p>There is a directory called <span class="BoldText">auction</span> in your web root directory. If this directory was created by you rather than by this auto-installer, then DO NOT attempt to remove it. If you click on &quot;Remove OS Commerce&quot;, then the directory called <span class="BoldText">auction</span> and any existing MySQL database and MySQL user called <span class="BoldText"><?=str_replace("-","","<cpanel print="$user">_auction")?></span> will be removed.</p>
<p class='Hint'>Notice! Clicking on &quot;Remove PHPauction&quot; will remove the data even if they were not created by this auto-installer.</p>
<form action='autoinstallremoveconfirm.php'>
<p>
<input type='hidden' name='removefolder' value='<cpanel print="$homedir">/public_html/auction'>
<input type='hidden' name='removeapp' value='PHPauction'>
<input type='hidden' name='removeuser' value='<cpanel print="$user">_auction'>
<input type='hidden' name='removedb' value='<cpanel print="$user">_auction'>
</p>
<p class="ButtonPosition">
<input type='submit' name='Submit' value='Remove PHPauction' class='ButtonDef'>
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

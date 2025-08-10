<cpanel include="fantasticoheader.php">
            
			    
<p align="center"><img src="images/iboard.jpg" width="150" height="44">
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
<a href='http://<cpanel print="DOMAIN">/iboard/' target='_blank'>Enter Invision Board</a>
<p>
<a href='http://<cpanel print="DOMAIN">/iboard/admin.php' target='_blank'>Enter admin area</a>
		<p>
<a href='http://forums.invisionboard.com/' target='_blank'>Visit the Invision Board support forum</a> <br>
(We are not associated with the support forum)
		<p><a href="http://www.invisionboard.com/?services" target="_blank">Purchase Invision Board Services</a><br>
(You may purchase Priority Support, Conversion Service, Copyright Output Removal or Managed Care which contains all of the above).

		<p>&nbsp;
<p class='Hint'><b>Remove Invision Board</b>
<p>
<p>There is a directory called <span class="BoldText">iboard</span> in your web root directory. If this directory was created by you rather than by this auto-installer, then DO NOT attempt to remove it. If you click on &quot;Remove Invision Board&quot;, then the directory called <span class="BoldText">iboard</span> and any existing MySQL database and MySQL user called <span class="BoldText"><?=str_replace("-","","<cpanel print="$user">_iboard")?></span> will be removed.</p>
<p class='Hint'>Notice! Clicking on &quot;Remove Invision Board&quot; will remove the data even if they were not created by this auto-installer.</p>
<form action='autoinstallremoveconfirm.php'>
<p>
<input type='hidden' name='removefolder' value='<cpanel print="$homedir">/public_html/iboard'>
<input type='hidden' name='removeapp' value='Invision Board'>
<input type='hidden' name='removeuser' value='<?=str_replace("-","","<cpanel print="$user">_iboard")?>'>
<input type='hidden' name='removedb' value='<?=str_replace("-","","<cpanel print="$user">_iboard")?>'>
</p>
<p class="ButtonPosition">
<input type='submit' name='Submit' value='Remove Invision Board' class='ButtonDef'>
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

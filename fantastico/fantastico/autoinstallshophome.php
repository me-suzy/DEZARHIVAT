<cpanel include="fantasticoheader.php">
           
			    
<p align="center"><img src="images/oscommerce.gif" width="231" height="45">
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
<a href='http://<cpanel print="DOMAIN">/shop/' target='_blank'>Enter Shop</a>
<p>
<a href='http://<cpanel print="DOMAIN">/shop/admin/' target='_blank'>Enter admin area</a>
<p>
<a href='http://www.oscommerce.com/community.php/' target='_blank'>Visit OS Commerce support forum</a> <br>
(We are not associated with the support forum)
<p>&nbsp;
<p class='Hint'><b>Remove OS Commerce</b>
<p>
<p>There is a directory called <span class="BoldText">shop</span> in your web root directory. If this directory was created by you rather than by this auto-installer, then DO NOT attempt to remove it. If you click on &quot;Remove OS Commerce&quot;, then the directory called <span class="BoldText">shop</span> and any existing MySQL database and MySQL user called <span class="BoldText"><?=str_replace("-","","<cpanel print="$user">_shop")?></span> will be removed.</p>
<p class='Hint'>Notice! Clicking on &quot;Remove OS Commerce&quot; will remove the data even if they were not created by this auto-installer.</p>
<form action='autoinstallremoveconfirm.php'>
<p>
<input type='hidden' name='removefolder' value='<cpanel print="$homedir">/public_html/shop'>
<input type='hidden' name='removeapp' value='OS Commerce'>
<input type='hidden' name='removeuser' value='<cpanel print="$user">_shop'>
<input type='hidden' name='removedb' value='<cpanel print="$user">_shop'>
</p>
<p class='ButtonPosition'>
<input type='submit' name='Submit' value='Remove OS Commerce' class='ButtonDef'>
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

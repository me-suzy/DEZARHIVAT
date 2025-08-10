<cpanel include="fantasticoheader.php">
            
			    
<p align="center"><img src="images/4images_logo.gif" width="198" height="52">
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
<a href='http://<cpanel print="DOMAIN">/gallery/' target='_blank'>Enter 4images Gallery</a>
<p>
<a href='http://<cpanel print="DOMAIN">/gallery/admin/' target='_blank'>Enter admin area</a>
		<p>
<a href='http://www.4homepages.de/forum/' target='_blank'>Visit the 4images Gallery support forum</a> <br>
(We are not associated with the support forum)
		<p><a href="http://shareit1.element5.com/product.html?cart=1&productid=157569&languageid=1&currency=all" target="_blank">Purchase a license for commercial/profit use</a><br>
(You need a license, in order to use <b>4images Gallery</b> on commercial or profit oriented websites).

		<p>&nbsp;
<p class='Hint'><b>Remove 4images Gallery</b>
<p>
<p>There is a directory called <span class="BoldText">gallery</span> in your web root directory. If this directory was created by you rather than by this auto-installer, then DO NOT attempt to remove it. If you click on &quot;Remove 4images Gallery&quot;, then the directory called <span class="BoldText">gallery</span> and any existing MySQL database and MySQL user called <span class="BoldText"><?=str_replace("-","","<cpanel print="$user">_gallery")?></span> will be removed.</p>
<p class='Hint'>Notice! Clicking on &quot;Remove 4images Gallery&quot; will remove the data even if they were not created by this auto-installer.</p>
<form action='autoinstallremoveconfirm.php'>
<p>
<input type='hidden' name='removefolder' value='<cpanel print="$homedir">/public_html/gallery'>
<input type='hidden' name='removeapp' value='4images Gallery'>
<input type='hidden' name='removeuser' value='<?=str_replace("-","","<cpanel print="$user">_gallery")?>'>
<input type='hidden' name='removedb' value='<?=str_replace("-","","<cpanel print="$user">_gallery")?>'>
</p>
<p class="ButtonPosition">
<input type='submit' name='Submit' value='Remove 4images Gallery' class='ButtonDef'>
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

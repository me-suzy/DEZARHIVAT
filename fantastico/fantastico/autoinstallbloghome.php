<cpanel include="fantasticoheader.php">
           
			    
<p align="center"><img src="images/b2minilogo.png" width="50" height="50">
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
<a href='http://<cpanel print="DOMAIN">/blog/' target='_blank'>Enter b2</a>
<p>
<a href='http://<cpanel print="DOMAIN">/blog/b2login.php' target='_blank'>Enter admin area</a>
<p>
<a href='http://cafelog.com/readme.html' target='_blank'>View b2 Read-Me file</a> <br>
<p>&nbsp;
<p class='Hint'><b>Remove b2</b>
<p>
<p>There is a directory called <span class="BoldText">blog</span> in your web root directory. If this directory was created by you rather than by this auto-installer, then DO NOT attempt to remove it. If you click on &quot;Remove b2&quot;, then the directory called <span class="BoldText">blog</span> and any existing MySQL database and MySQL user called <span class="BoldText"><?=str_replace("-","","<cpanel print="$user">_blog")?></span> will be removed.</p>
<p class='Hint'>Notice! Clicking on &quot;Remove b2&quot; will remove the data even if they were not created by this auto-installer.</p>
<form action='autoinstallremoveconfirm.php'>
<p>
<input type='hidden' name='removefolder' value='<cpanel print="$homedir">/public_html/blog'>
<input type='hidden' name='removeapp' value='b2'>
<input type='hidden' name='removeuser' value='<cpanel print="$user">_blog'>
<input type='hidden' name='removedb' value='<cpanel print="$user">_blog'>
</p>
<p class="ButtonPosition">
<input type='submit' name='Submit' value='Remove b2' class='ButtonDef'>
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

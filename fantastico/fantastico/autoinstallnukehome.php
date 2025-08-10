<cpanel include="fantasticoheader.php">
           
			    
<p align="center"><img src="images/phpnuke.gif" width="335" height="81">
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
<a href='http://<cpanel print="DOMAIN">/community/' target='_blank'>Enter PHP-Nuke</a>
<p>
<a href='http://<cpanel print="DOMAIN">/community/admin.php' target='_blank'>Enter admin area</a>
<p>
<a href='http://www.nukesupport.com/' target='_blank'>Visit PHP-Nuke support forum</a> <br>
(We are not associated with the support forum)


<!-- Begin PHP-Nuke Update routine -->

<?

$OLD_NUKE="<cpanel print="$homedir">/public_html/community/config.php";
if(is_file($OLD_NUKE))
	{
	include("$OLD_NUKE");
	if($Version_Num == "5.6")
		{
		echo "<p class='Hint'><b>You have PHP-Nuke 5.6 installed</b><br><a href='autoinstallnukeupgrade.php'>Upgrade to version 6.0 now!</a>";
		}
	}
?>

<!-- End PHP-Nuke Update routine -->


<p>&nbsp;
<p class='Hint'><b>Remove PHP-Nuke</b>
<p>
<p>There is a directory called <span class="BoldText">community</span> in your web root directory. If this directory was created by you rather than by this auto-installer, then DO NOT attempt to remove it. If you click on &quot;Remove OS Commerce&quot;, then the directory called <span class="BoldText">community</span> and any existing MySQL database and MySQL user called <span class="BoldText"><?=str_replace("-","","<cpanel print="$user">_nuke")?></span> will be removed.</p>
<p class='Hint'>Notice! Clicking on &quot;Remove PHP-Nuke&quot; will remove the data even if they were not created by this auto-installer.</p>
<form action='autoinstallremoveconfirm.php'>
<p>
<input type='hidden' name='removefolder' value='<cpanel print="$homedir">/public_html/community'>
<input type='hidden' name='removeapp' value='PHP-Nuke'>
<input type='hidden' name='removeuser' value='<cpanel print="$user">_nuke'>
<input type='hidden' name='removedb' value='<cpanel print="$user">_nuke'>
</p>
<p class="ButtonPosition">
<input type='submit' name='Submit' value='Remove PHP-Nuke' class='ButtonDef'>
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

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


<!-- Begin PHP-Nuke Update routine -->

<?

$OLD_NUKE="<cpanel print="$homedir">/public_html/community/config.php";
if(is_file($OLD_NUKE))
	{
	include("$OLD_NUKE");
	if($Version_Num != "5.6")
		{
		echo "<p>&nbsp;
<p class='Hint'><b>Hm, what are you doing here?</b><br><a href='index.php'>Back</a>";
		}
	else
		{
		$MYSQLDB = str_replace("-","","<cpanel print="$user">_nuke");
		echo "<p>&nbsp;<p class='Hint'><b>Upgrade your PHP-Nuke 5.6 to PHP-Nuke 6.0</b>";
		echo "<p><b>Notice:</b>";
		echo "<br />Before you update, switch the <b>language</b> of your PHP-Nuke to one of the following: Arabic, Brazilian, Catala, Chinese, Danish, Dutch, English, German, Indonesian, Italian, Norwegian, Polish, Portuguese, Slovak, Spanish, Thai, Turkish";
		echo "<p>Before you update, switch the <b>skin</b> of your PHP-Nuke to one of the following: 3D-Fantasy, Anagram, DeepBlue, ExtraLite, Kaput, Karate, Milo, NukeNews, Odyssey, Sand_Journey, Slash, SlashOcean, Sunset, Traditional";
		echo "<p>If you do not, no data will be lost but your site will not be operational.";
		echo "<p><b>Another notice:</b>";
		echo "<br />Your current '/community' directory will be renamed to 'community.old'. You will have to remove it manually (first check if everything works fine). Your data will be backuped into the file 'oldnuke.sql' within the 'community.old' directory. If you want to restore your old installation, rename 'community.old' to 'community'. Empty the <b>$MYSQLDB</b> database using your domain domain control panel and import the file 'oldnuke.sql' in it.";
		echo "<p><b>Last notice:</b>";
		echo "<br />Although this upgrade script has been tested and worked fine, we can not be held responsible for any data loss. You may want to make a manual backup of your '/community' directory and your <b>$MYSQLDB</b> database before proceeding.";
		echo "<p align=center><a href='autoinstallnukehome.php'>I need time to think. Bring me back to Nuke overview</a>";
		echo "<p align=center><a href='autoinstallnukeupgradedo.php'>I have switched the language and the skin to one of the mentioned above and want to upgrade NOW</a>";
		}
	}
?>

<!-- End PHP-Nuke Update routine -->


</div>
</td>
</tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellpadding="0">
              
<tr align="center"> 
                
<td><a href="index.php">Fantastico Auto-installer overview</a>

<cpanel include="fantasticofooter.php">

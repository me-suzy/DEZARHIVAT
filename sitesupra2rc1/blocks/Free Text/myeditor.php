<?
if(!defined('SU'))die();
$dialogData=Array(
	'title'	=>__('My Editor'),
	'w'=>420,
	'h'=>350,
	'r'=>1,
	'c'=>1,
);
if(getData())
{
	switch($what)
	{
		case 'TEST':
			sendData('Eddie');
	}
	exit;
}
?>
<script>
function init()
{
	alert(sendData('TEST'));
}
function z()
{
	alert(suDialog('user/Free Text/myeditor2.php'));
}
</script>
<table id=myDialog cellpadding=0 cellspacing=0 border=0 width=100% height=100% style="visibility:hidden">
<tr height=100%><td width=100%>
	<table class=tabpanel cellpadding=0 cellspacing=0 border=0 width=100% height=100%>
	<tr>
		<td>
			<button><?=__('_Config')?></button>
			<button><?=__('_Backup')?></button>
			<button><?=__('_Tools')?></button>
		</td>
	</tr>
	<tr height=100%>
		<td>
			<div style='height:100%'>
				<div>
					<fieldset id=securityFS name="<?=__('Security')?>">
					<table cellpadding=4 cellspacing=0 border=0 width=100%>
					<tr valign=top>
						<td>
							<input id=autoLogonC type=checkbox style="width:17;height:17"<br>
							<?=__('Three-level user access rights management system allows site administrators to maintain either user-based or role-based access control system, allowing fine-grained access control for Editors and Publishers.')?>
						</td>
					</tr>
					<tr>
						<td align=right><button wid=2 onclick=z()><?=__('Log Off...')?></button></td>
					</tr>
					</table>
					</fieldset>
				</div>
				<div>
					<div id=BackupDiv style="position:absolute;overflow:auto;width:100%;height:100%;border:2px inset white;background:white;color:black;padding:8px;"></div>
				</div>
				<div>
					<fieldset id=accessRightsFS name="<?=__('Access Rights')?>">
					<table cellpadding=4 cellspacing=0 border=0 width=100%>
					<tr valign=top>
						<td><img src=<?=suIMG?>repairsite.gif hspace=4 vspace=4></td>
						<td width=100%><?=__('Three-level user access rights management system allows site administrators to maintain either user-based or role-based access control system, allowing fine-grained access control for Editors and Publishers.')?></td>
					</tr>
					<tr>
						<td colspan=2 align=right><button wid=2><?=__('Set Access Rights')?></button></td>
					</tr>
					</table>
					</fieldset>

					<fieldset id=rereadConfFS name="<?=__('Re-read confs')?>">
					<table cellpadding=4 cellspacing=0 border=0 width=100%>
					<tr valign=top>
						<td><img src=<?=suIMG?>rereadconf.gif hspace=4 vspace=4></td>
						<td width=100%>???</td>
					</tr>
					<tr>
						<td colspan=2 align=right><button wid=2><?=__('Re-read confs')?></button></td>
					</tr>
					</table>
					</fieldset>

					<fieldset id=repairSiteFS name="<?=__('Repair Site Tree')?>">
					<table cellpadding=4 cellspacing=0 border=0 width=100%>
					<tr valign=top>
						<td><img src=<?=suIMG?>repairsite.gif hspace=4 vspace=4></td>
						<td width=100%><?=__('<b>WARNING!</b> This operation can destruct your site. Please Backup All before continuing. Continue?')?></td>
					</tr>
					<tr>
						<td colspan=2 align=right><button wid=2><?=__('Repair Site Tree')?></button></td>
					</tr>
					</table>
					</fieldset>
				</div>
			</div>
		</td>
	</tr>
	</table>
</td><td><img width=1 height=350></td></tr>
<tr>
	<td align=right style="padding:4" colspan=2>
		<img width=420 height=1><br>
		<button wid=1 onclick=dialogCancel()><?=__('Close')?></button>
	</td>
</tr>
</table>
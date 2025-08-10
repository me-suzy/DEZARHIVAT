<?
require_once "../config.php";
?>

<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="98">
<tr>
<td width="1%" valign=top><img src=imagesbo/siteseed.gif></td>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0" height="98">
<tr>
<td height="1%" valign="top" align="left">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td background="imagesbo/top_back.gif" align="left" valign="top"> 
<a href="index.php" target=conteudo><img src=imagesbo/menu.gif border="0"></a><img src=imagesbo/transp.gif width=40 height=1> 
<a href=http://www.siteseed.org/manual target=_blank><img src=imagesbo/manual.gif border="0"></a><img src=imagesbo/transp.gif width="40" height="1"> 
<a href="notes.php?param=in" target=conteudo>
<?
if($DEFAULT_LANGUAGE=="english")
{
	?>
	<img src=imagesbo/notes.gif border="0">
	<?
}
elseif($DEFAULT_LANGUAGE=="german")
{
	?>
	<img src=imagesbo/notes_german.gif border="0">
	<?
}
elseif($DEFAULT_LANGUAGE=="french")
{
	?>
	<img src=imagesbo/notes.gif border="0">
	<?
}
else
{
	?>
	<img src=imagesbo/notas_pt.gif border="0">
	<?
}
?>
 </a></td>
 <td background="imagesbo/top_back.gif" align="right" valign="top">
<?
	if($CUSTOM_LANGUAGE='on')
	{
?>
 <a href=custom_language.php target=conteudo><img src=imagesbo/babelfish.gif border="0"></a>
<?
	}
?>
 </td></tr>
 </table>
</td>
</tr>
<tr>
<td valign="top" align="left">
<?
if($DEFAULT_LANGUAGE=="english")
{
	?>
	<img src=imagesbo/copyright.gif border="0">
	<?
}
elseif($DEFAULT_LANGUAGE=="german")
{
	?>
	<a href=index.php?about=1 target=conteudo><img src=imagesbo/about_german.gif border="0"></a>
	<?
}
elseif($DEFAULT_LANGUAGE=="french")
{
	?>
	<a href=index.php?about=1 target=conteudo><img src=imagesbo/about_french.gif border="0"></a>
	<?
}
else
{
	?>
	<img src=imagesbo/copyright_pt.gif border="0">
	<?
}
?>
</td>
</tr>
</table>
</td>
</tr>
</table>
</body>
</html>

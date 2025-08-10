<?
require_once "../config.php";


/* Set Cookie */

if(isset($HTTP_GET_VARS['language']) and $CUSTOM_LANGUAGE='on')	
{	
	$DEFAULT_LANGUAGE = $HTTP_GET_VARS['language'];
	setcookie ("DEFAULT_LANGUAGE", "$DEFAULT_LANGUAGE",time()+(60*60*24*360));
}

if($language)
{
?>
<SCRIPT LANGUAGE="JavaScript">

<!-- Begin
function loadFrames(frame1,page1,frame2,page2) {
eval("parent."+frame1+".location='"+page1+"'");
eval("parent."+frame2+".location='"+page2+"'");
}
// End -->

</script>
<script>
loadFrames('menu','top.php','conteudo','index.php');
</script>
<?
exit;
}

/* Set Language Variables */

require_once "../include/strings.php";

?>
<html>
<head>
<title>Custom Language</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body bgcolor="#FFFFFF" text="#000000">

<h1><?=$strLanguageSetup?></h1>
<P><? print ("$strCurrentLanguage "); 
      print (ucfirst($DEFAULT_LANGUAGE));      
   ?></P>

<form name=language>
<table border="0" cellspacing="10" cellpadding="0" align="center">
<?

$loop = '0';
while (isset($AVAIL_LANGUAGE[$loop][0]) and isset($AVAIL_LANGUAGE[$loop][1]))	{

?>
  <tr>
    <td align="right"><img src=<? print("$imagesURL"); print("bo/imagesbo/"); print($AVAIL_LANGUAGE[$loop][1]);?> border="0"></td>
    <td align="left"><input <?if($DEFAULT_LANGUAGE==$AVAIL_LANGUAGE[$loop][0])print"checked";?> type=radio name=language value=<?=$AVAIL_LANGUAGE[$loop][0]?>><? print(ucfirst($AVAIL_LANGUAGE[$loop][0]))?></td>
  </tr>
<?

$loop=$loop+1;
}
?>

</table>
<center>
<?
print"<input type=Submit name=submit value=$strChange>";
?>
</center>
</form>
</body>
</html>

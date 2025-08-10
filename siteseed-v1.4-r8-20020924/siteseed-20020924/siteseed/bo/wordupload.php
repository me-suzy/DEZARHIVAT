<html>
<head>
<?
$id += 0;
$artigo=$id;

require_once "../config.php";
require_once "whoisthis_bo.php";
require_once "../include/strings.php";
?>
<title><? print "$strWordImport $artigo";?></title>

<SCRIPT LANGUAGE="JavaScript">
<!-- Begin
function CheckFill(FormFieldName, ErrorMessage)
{
	FileObject = eval ("document."+FormFieldName);
	FileValue=FileObject.value;
	if (FileValue=="")
	{
		alert (ErrorMessage);
		return false;
	}
	else return true;
}
//  End -->
</script>



<?


# Data Mining
$string="";
reset($HTTP_GET_VARS);
$key=key($HTTP_GET_VARS);
$value=current($HTTP_GET_VARS);
while( list($key,$value) = each($HTTP_GET_VARS) )
{
	$string.="$key\t$value\t";
}
recordsession_bo("wordupload.php",$string,$_SERVER['REMOTE_USER'],$HTTP_USER_AGENT,$_SERVER['REMOTE_ADDR'],$datamining);


function getFileExtension($str) 
{
	$i = strrpos($str,".");
	if (!$i) { return ""; }
	
	$l = strlen($str) - $i;
	$ext = substr($str,$i+1,$l);
	
	return $ext;
}

function word2html($filename,$tmpimg, $DCOM_Server){
     	global $strMsWordError, $strBack;
	if ($DCOM_Server=="na"){
         $word=new COM("Word.Application") or die("$strMSWordError<br><br><a href='javascript:history.go(-1)'>$strBack</a>");
	} else {
	  $word=new COM("Word.Application", $DCOM_Server) or die("$strMSWordError<br><br><a href='javascript:history.go(-1)'>$strBack</a>");
	}
	$word->visible=0;
	$word->Documents->Open($filename);
	$word->ActiveDocument->SaveAs($tmpimg,"8");  // save as HTML
	$word->quit(0); // quit without save
	$text = file($tmpimg);
	$text = implode("\r",$text);
	$text = stristr($text,"<body>");
	$text = eregi_replace("[[:space:]]+", " ", $text);
	$text = ereg_replace("<p [^>]*BodyTextIndent[^>]*>([^\n|\n\015|\015\n]*)</p>","<p>\\1</p>",$text);
	$text = eregi_replace("<p [^>]*margin-left[^>]*>([^\n|\n\015|\015\n]*)</p>","<blockquote>\\1</blockquote>",$text);
	$text = str_replace("&nbsp;","",$text);
	$text = eregi_replace("<p [^>]*>","<p>",$text);
	$text = eregi_replace("<li [^>]*>","<li>",$text);
	$text = eregi_replace("</?span[^>]*>","",$text);
	$text = eregi_replace("</?body[^>]*>","",$text);
	$text = eregi_replace("</?div[^>]*>","",$text);
	$text = eregi_replace("<\![^>]*>","",$text); 
	$text = eregi_replace("</?[a-z]\:[^>]*>","",$text);
	$text = str_replace("</HTML>","",$text);
	$text = str_replace("<br>","<br>\r\n",$text);
	unlink($tmpimg);
	$file=fopen($tmpimg,"a");
	fputs($file,$text);
	fclose($file);
}

if ($op>=1) 
{
	if ($imgfile=="none")
	{
		echo "$strUploadFileNotExists<br><br><a href='javascript:history.go(-1)'>$strBack</a>";
		exit();
	}
	
	$uploaddir = "../images/articles/$artigo";
	if (!is_dir($uploaddir))
	{
	mkdir($uploaddir,0755);
	}

	// get file extension (fn at bottom of script)
	$pext = getFileExtension($imgfile_name);
	
	$newfile = $uploaddir . "/$imgfile_name";
	
	if(strlen($imghere)==0)
	{
		if (!@copy($imgfile,$newfile)) 
		{
			echo "$strUploadError<br><br><a href='javascript:history.go(-1)'>$strBack</a>";
			exit();
		}
		
		unlink($imgfile);
	}
	
	if(strlen($imghere)==0)   
	{
		$imghere=$imgfile_name;
	}
	
	if ($pext == "DOC" || $pext == "doc") 
	{ 
		if ($WVWARE_PATH == "UseCOM")
		{
		word2html($newfile,$tmpimg,$DCOM_Server);
		}
		else
		{
		system("$WVWARE_PATH" . "wvWare $newfile | /usr/local/bin/striptags.pl >$tmpimg"); 
		}
	}
	else 
	{
		echo"$strUploadNotDOC<br><br><a href='javascript:history.go(-1)'>$strBack</a>";
		exit();
	}
	
	unlink($newfile);
	
	$filesize=filesize($tmpimg);
	
	if($filesize>0)
	{
		print "<b>" . "$strUploadDOCSuccess" . "</b>: $filesize " . "$strUploadDOCbytes" . "<br>";
		
		$file=fopen("$tmpimg", "r");
		$wordimport=fread($file, $filesize);
		fclose($file);
		?>
		<form action="article_write.php" method="POST">
		<input type="hidden" name="id" value="<? print "$id"; ?>">
		<input type="hidden" name="wordimport" value='<? print "$wordimport"; ?>'>
		<input type="submit" value="<? print "$strUploadReturnToEditor"; ?>">
		</form>
		<?
		
	}
	else
	{
		print "<b>$strUploadError</b><br>";
	}
}
else
{
	print "$strUploadToArticle $id";
	?>
	<br>
	<form name="form" action="<? print "wordupload.php"; ?>" method="POST" enctype="multipart/form-data" onSubmit="return CheckFill('form.imgfile', '<? print ($strUploadNoFileName); ?>')">
	<input type="hidden" name="MAX_FILE_SIZE" value="1024000">
	<input type="hidden" name="op" value="1">
	<input type="hidden" name="id" value=<? print "$id"; ?>>
	<input type="hidden" name="artigo" value="<? print "$artigo"; ?>">
	
	<p><input type="file" name="imgfile" value="<? print "$strUploadPickDOC"; ?>"><br>
	<br>
	<input type="submit" value="<? print "$strUpload"; ?>">
	</form>
	<?
}
?>

<html>
<head>

<?
require_once "../config.php";
require "whoisthis_bo.php";
require "../include/strings.php";
?>

<title><? print "$strFiles $strArticle $artigo";?></title>


<SCRIPT LANGUAGE="JavaScript">
<!-- 
function CheckFill(FormFieldName, ErrorMessage, CheckNum)
{
FileObject = eval ("document."+FormFieldName);
FileValue=FileObject.value;
FileValueParsed = parseInt(FileValue).toString();

if (FileValue=="" || FileValue==null)
{
  alert (ErrorMessage);
  return false;
}

if (CheckNum=="1")
{
        if (FileValueParsed.length == FileValue.length  && FileValue>0) return true;
        else
        {
                alert (ErrorMessage);
                return false;
        }
}
return true;
}
function ctrlA(el) {
with(el){
focus(); select() 
}
if(document.all){
txt=el.createTextRange()
txt.execCommand("Copy") 
window.status='Selected and copied to clipboard!'
}
else window.status='Press ctrl-c to copy the text to the clipboard'
setTimeout("window.status=''",3000)
} 

 -->
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
recordsession_bo("upload.php",$string,$_SERVER['REMOTE_USER'],$HTTP_USER_AGENT,$_SERVER['REMOTE_ADDR'],$datamining);


function getFileExtension($str) 
{
        $i = strrpos($str,".");
        
        if (!$i) 
        { 
                return ""; 
        }
        
        $l = strlen($str) - $i;
        $ext = substr($str,$i+1,$l);
        return $ext;
}


$artigo +=0 ;
$largura +=0;
$altura +=0;
$uploaddir = "../images/articles/$artigo";

If($OS_system=='Windows')
{
	$systemdir = $imagesDIR . "\\articles\\$artigo";
	if (!is_dir($systemdir))
	{
		mkdir("$systemdir",0755);
	}
}
else
{
	if (!is_dir($uploaddir))
	{
		mkdir("$uploaddir",0755);	
	}
}



$file_ext=getFileExtension( $imgfile_name );

if( $file_ext!="gif" && $file_ext!="jpg" && $file_ext!="png" && $op==1 && $file_ext!="PNG" && $file_ext!="JPG" && $file_ext!="GIF" && $file_ext!="swf" && $file_ext!="SWF")
{
        if ($imgfile=="none")
        {
                echo "$strUploadFileNotExists<br><br><a href='javascript:history.go(-1)'>$strBack</a>";
                exit();
        }
        $op=3;    
	$size = getImageSize($imgfile_name);
	$width = $size[0];
	$height = $size[1];

        $codigo="<a href=\"images/articles/$artigo/$imgfile_name\" width=\"$width\" height=\"$height\"  alt=\"$alt\">$imgfile_name</a>";
        $codigo=htmlentities("$codigo");
        
 
        print "<b>$strCopyCode</b><br><br>".
	      "<form name=select_all>".
              "<textarea name=text_area rows=1 nowrap cols=80>";
              
		    echo($codigo);
       
	 print "</textarea><br>".
              "<input type=button value=\"$strSelectCopy\" onClick=\"ctrlA(document.select_all.text_area);\" name=button></form>".
              "</center>";

        $newfile = $uploaddir . "/$imgfile_name";
        
        // move file to proper directory using the
        if (!@copy($imgfile,$newfile)) 
        {
                echo "$strUploadError<br><br><a href='javascript:history.go(-1)'>$strBack</a>";
                exit();
        }        
        
        // delete temp file
        unlink($imgfile);
}
else
{
if( $file_ext=="swf" || $file_ext=="SWF")
{        
        if ($imgfile=="none")
        {
                echo "$strUploadFileNotExists<br><br><a href='javascript:history.go(-1)'>$strBack</a>";
                exit();
        }
 
	$file = "$imgfile";
	$size = getImageSize($file);
	$width = $size[0];
	$height = $size[1];


        $codigo="<object classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\" codebase=\"http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=5,0,0,0\" width=\"$width\" height=\"$height\">".
                "<param name=movie value=\"images/articles/$artigo/$imgfile_name\">".
                "<param name=quality value=high>".
                "<embed src=\"images/articles/$artigo/$imgfile_name\" quality=high width=\"$width\" height=\"$height\">".
                "</embed>". 
                "</object>";
        print "<center>".
              "$codigo";

        $codigo=htmlentities("$codigo");
 
        print "<br><br><b>$strCopyCode<br><br></b>";
        print "<form name=select_all>".
              "<textarea name=text_area rows=9 cols=80>";
                 echo($codigo);
        print "</textarea><br>".
              "<input type=button value=\"$strSelectCopy\" onClick=\"ctrlA(document.select_all.text_area);\" name=button></form>".
              "</center>";         
        $newfile = $uploaddir . "/$imgfile_name";
        

        // move file to proper directory using the
        if (!@copy($imgfile,$newfile))
        {
                echo "$strUploadError<br><br><a href='javascript:history.go(-1)'>$strBack</a>";
                exit();
        }

        // delete temp file
        unlink($imgfile);
}
else
{

        
        if ($op>=1) {
                
                if ($imgfile=="none")
                {
                        echo "$strUploadFileNotExists<br><br><a href='javascript:history.go(-1)'>$strBack</a>";
                        exit();
                }
                
                if(strlen($imghere)>0)
                {
                        $imgfile_name=$imghere;
                }
                
                
                // REMINDER:
                // temporary filename (pointer): $imgfile
                // original filename           : $imgfile_name
                // size of uploaded file       : $imgfile_size
                // mime-type of uploaded file  : $imgfile_type
                
                // get file extension (fn at bottom of script)
                $pext = getFileExtension($imgfile_name);
                
		if(eregi(" |ç|á|à|é|í|ó|ú",$imgfile_name))
		{
			$imgfile_name=md5($imgfile_name) . "." . $pext;
		}

                $newfile = $uploaddir . "/$imgfile_name";
                
                if(strlen($imghere)==0)
                {
                        // move file to proper directory using the
                        if (!copy($imgfile,$newfile)) 
                        {
                                echo "$strUploadError";
                                exit();
                        }
                        
                        // delete temp file
                        unlink($imgfile);
                }
                
                
                if(strlen($imghere)==0)   
                {
                        $imghere=$imgfile_name;
                }
                
                
                //-- RE-SIZING UPLOADED IMAGE
                
                $imgsize = GetImageSize($newfile);
                
                $largura_original=$imgsize[0];
                $altura_original=$imgsize[1];
                
                if($op>1 && $op!=3)
                {
                        $imgsize = GetImageSize($newfile);
                        // check size
                        //0=width, 1=height

			$imgfile_name_new=eregi_replace(".jpg","",$imgfile_name);
			$imgfile_name_new=eregi_replace(".gif","",$imgfile_name_new);
			$imgfile_name_new=eregi_replace(".png","",$imgfile_name_new);
				
			if($OS_system=='Windows')
			{

				$pext =".".$largura."x".$altura.".".$pext;

				system("cmd /c copy $imagesDIR". "\\articles\\" . $artigo . "\\". $imgfile_name . " $imagesDIR" . "\\articles\\" . $artigo . "\\".  $imgfile_name_new . $pext);
					
				system("cmd /c $DJPEG_PATH" . "mogrify -geometry " . $largura . "x" . $altura . "!" . " $imagesDIR" . "\\articles\\" . $artigo . "\\". $imgfile_name_new . $pext);
                        	
				$resized_filename = $imgfile_name_new.$pext;
			}
			else
			{
				// using "convert" (if available) is the prefered method...
				// otherwise try other binary options
				if($CONVERT_PATH == "NA" || $CONVERT_PATH == "")
				{
				      	//where to store the tmp img file
		                       	$tmpimg = "$tmpconvimg";
                        
		                       	// CONVERT IMAGE TO PNM
		                       	if ($pext == "jpg") 
		                       	{ 
		                               	$imgfile_name_new=ereg_replace(".jpg","",$imgfile_name);
		                               	system("$DJPEG_PATH" . "djpeg $newfile >$tmpimg"); 
		                       	}
		                       	else if ($pext == "gif") 
		                       	{ 
		                               	$imgfile_name_new=ereg_replace(".gif","",$imgfile_name);
		                               	system("$GIFTOPNM_PATH" . "giftopnm $newfile >$tmpimg"); 
		                       	}
	       	 	               	else 
       		                	{
                	       	        	echo("$strUploadUnknownFormat");
	                                	exit();
	                       		}
                        
		                      	// New image is converted to jpg so it
		                       	// it has a jpg extension even if it started out as a gif
	        	               	$pext =$largura."x".$altura.".jpg";
                        
	                        	// new filename
	                       		$newfile = $uploaddir . "/$imgfile_name_new.$pext";
		                       	system("$PNMSCALE_PATH" . "pnmscale -xy $largura $altura $tmpimg | $CJPEG_PATH" . "cjpeg -smoo 1 -qual 50 >$newfile");              
                        		$resized_filename = "$imgfile_name_new.$pext";
				}
				else
				{
		                       	// New image is converted to jpg so it
		                       	// it has a jpg extension even if it started out as a gif
	        	               	$pext =$largura."x".$altura.".jpg";
                        
	                        	// new filename
					$oldfile = $newfile;
	                       		$newfile = $uploaddir . "/$imgfile_name_new.$pext";
                        
		                       	system("$CONVERT_PATH" . "convert -geometry $largura" ."x". "$altura $oldfile $newfile");
                        			
					$resized_filename = "$imgfile_name_new.$pext";
				}
			}
			$size = GetImageSize("images/articles/$artigo/$resized_filename");
	                $largura=$size[0];
         	        $altura=$size[1];

                        $url="<img src=\"images/articles/$artigo/$resized_filename\" width=\"$largura\" height=\"$altura\" alt=\"$alt\" border=0>";
                        $url=htmlentities("$url");
                        $arighturl="<img src=\"images/articles/$artigo/$resized_filename\" width=\"$largura\" height=\"$altura\" alt=\"$alt\" border=0 align=\"right\">";
                        $arighturl=htmlentities("$arighturl");
                        $alefturl="<img src=\"images/articles/$artigo/$resized_filename\" width=\"$largura\" height=\"$altura\" alt=\"$alt\" border=0 align=\"left\">";
                        $alefturl=htmlentities("$alefturl");
                        echo("<center>" .
                         "$strUploadNewImage" .":<br><img src=\"../images/articles/$artigo/$resized_filename\"  width=\"$largura\" height=\"$altura\"><br> $largura x $altura <br><i>" .
                         "$strRegularImageURL" . "</i><b><form name=select_all6><textarea name=text_area6 rows=2 cols=80>$url</textarea><br><input type=button value=\"$strSelectCopy\" onClick=\"ctrlA(document.select_all6.text_area6);\" name=button></form></b><br><i>" .
                         "$strARightImageURL" . "</i><b><form name=select_all7><textarea name=text_area7 rows=2 cols=80>$arighturl</textarea><br><input type=button value=\"$strSelectCopy\" onClick=\"ctrlA(document.select_all7.text_area7);\" name=button></form></b><br><i>" . 
                         "$strALeftImageURL" . "</i><b><form name=select_all8><textarea name=text_area8 rows=2 cols=80>$alefturl</textarea><br><input type=button value=\"$strSelectCopy\" onClick=\"ctrlA(document.select_all8.text_area8);\" name=button></form></b><br></center><br><br><hr><br>");
                        
                }
                
                $url="<img src=\"images/articles/$artigo/$imgfile_name\" width=\"$largura_original\" height=\"$altura_original\" alt=\"$alt\" border=0>";
                $url=htmlentities("$url");
                $arighturl="<img src=\"images/articles/$artigo/$imgfile_name\" width=\"$largura_original\" height=\"$altura_original\" alt=\"$alt\" align=\"right\">";
                $arighturl=htmlentities("$arighturl");
                $alefturl="<img src=\"images/articles/$artigo/$imgfile_name\" width=\"$largura_original\" height=\"$altura_original\" alt=\"$alt\" border=0 align=\"left\">";
                $alefturl=htmlentities("$alefturl");
                echo("<center>" . "$strUploadOriginal" . ":<br><img src=\"../images/articles/$artigo/$imgfile_name\" width=\"$largura_original\" height=\"$altura_original\"><br>$largura_original x $altura_original<br><i>" .
		     "$strRegularImageURL" . "<form name=select_all2><textarea name=text_area2 rows=2 cols=80>$url</textarea><br><input type=button value=\"$strSelectCopy\" onClick=\"ctrlA(document.select_all2.text_area2);\" name=button></form><br><i>" .
                     "$strARightImageURL" . "</i><b><form name=select_all3><textarea name=text_area3 rows=2 nowrap cols=80>$arighturl</textarea><br><input type=button value=\"$strSelectCopy\" onClick=\"ctrlA(document.select_all3.text_area3);\" name=button></form></b><br><i>" .
		     "$strALeftImageURL" . "</i><b><form name=select_all4><textarea name=text_area4 rows=2 nowrap cols=80>$alefturl</textarea><br><input type=button value=\"$strSelectCopy\" onClick=\"ctrlA(document.select_all4.text_area4);\" name=button></form></b><br></center><br><br><hr><br>");
        }
        
        
        if($op<1)
        {
                ?>
                </head>
                <body bgcolor="#FFFFFF">
                
                <? print "$strUploadNew"; ?><br>
                
                <form name="form_file_upload" action="<?echo $SCRIPT_NAME; ?>" method="POST" enctype="multipart/form-data" onSubmit="return CheckFill('form_file_upload.imgfile', '<? print ($strUploadNoFileName); ?>', 0)">
                <input type="hidden" name="MAX_FILE_SIZE" value="10240000">
                <input type="hidden" name="op" value="1">
                <input type="hidden" name="artigo" value="<? print "$artigo"; ?>">
                <p> <? print "$strFileName"; ?>: <input type="file" name="imgfile" value="<? print "$strPickFileName"; ?>"><br>
                <br>
                <? print "$strAltTextFileName"; ?>: <input type="text" name="alt" size=100 value=""><br>
                <br>    
                <input type="submit" value="<? print "$strSendFileName"; ?>">
                </form>
                
                </body>
                </html>
                <?
        }
        if($op==1)
        {
                ?>
                </head>
                <body bgcolor="#FFFFFF">
                
                <b><? print "$strUploadImageSize"; ?></b><br>
                
                <form name="form_img_resize1" action="<?echo $SCRIPT_NAME; ?>" method="POST" enctype="multipart/form-data" onSubmit="return (CheckFill('form_img_resize1.largura', '<? print ($strUploadNoImgWidth); ?>', 1) && CheckFill('form_img_resize1.altura', '<? print ($strUploadNoImgHeight); ?>', 1))">
                <input type="hidden" name="op" value="2">
                <input type="hidden" name="imghere" value="<? print "$imghere"; ?>">
                <input type="hidden" name="artigo" value="<? print "$artigo"; ?>">
                <input type="hidden" name="alt" value="<? print "$alt"; ?>">
                
                <p><? print "$strUploadNewSize"; ?>: <input type="text" name="largura" value="<?print "$largura_original";?>"> x <input type="text" name="altura" value="<? print "$altura_original";?>"><br>
                <br>
                <input type="submit" name=tamanho value="<? print "$strReSize"; ?>">
                </form>
                
                </body>
                </html>
                
                <?
        }
        if($op==2)
        {
                ?>
                </head>
                <body bgcolor="#FFFFFF">
                
                <b><? print "$strUploadImageSize"; ?></b><br>
                
                <form name="form_img_resize2" action="<?echo $SCRIPT_NAME; ?>" method="POST" enctype="multipart/form-data" onSubmit="return (CheckFill('form_img_resize2.largura', '<? print ($strUploadNoImgWidth); ?>', 1) &&  CheckFill('form_img_resize2.altura', '<? print ($strUploadNoImgHeight); ?>', 1))">
                <input type="hidden" name="op" value="2">
                <input type="hidden" name="imghere" value="<? print "$imghere"; ?>">
                <input type="hidden" name="artigo" value="<? print "$artigo"; ?>">
                <input type="hidden" name="alt" value="<? print "$alt"; ?>">
                
                <p><? print "$strUploadNewSize"; ?>: <input type="text" name="largura" value="<?print "$largura";?>"> x <input type="text" name="altura" value="<? print "$altura";?>"><br>
                <br>
                <input type="submit" name=tamanho value="<? print "$strReSize"; ?>">
                </form>
                
                <br><br>
                
                </body>
                </html>
                
                <?
        }
        
}
}
?>

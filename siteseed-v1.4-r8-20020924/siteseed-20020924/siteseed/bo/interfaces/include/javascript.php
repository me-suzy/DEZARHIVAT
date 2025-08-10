<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/interfaces/include/javascript.php

***************************************/
?>
<script language="JavaScript">
<!--
function swapImgRestore() {
	var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function preloadImages() {
	var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
		var i,j=d.MM_p.length,a=preloadImages.arguments; for(i=0; i<a.length; i++)
	if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function findObj(n, d) {
	var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
	d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
	if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
	for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=findObj(n,d.layers[i].document); return x;
}

function swapImage() {
	var i,j=0,x,a=swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
	if ((x=findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

//-->
</script>

<?
// prints an "over button" with $image1 (overs to $image2)
// linking to $link with $alt 

function over_button ($link, $image1, $image2, $area_id="", $target="", $alt="") 
{
	global $id;
	
	$name = md5 ("$image1$image2");
	
	if ($target) $target = " target=\"$target\"";
	
	if ($area_id) 
	{
		if ($area_id != $id) 
		{
			return 	"<a href=\"$link\" onMouseOut=\"swapImgRestore()\" ".
			"onMouseOver=\"swapImage('$name','','$image2',1)\">".
			"<img name=$name border=0 src=\"$image1\"$target alt=\"$alt\">".
			"</a>";
		} 
		else 
		{		
			return 	"<a href=\"$link\" onMouseOut=\"swapImgRestore()\" ".
			"<img name=$name border=0 src=\"$image2\"$target alt=\"$alt\">".
			"</a>";
		}
		
		
	} 
	else 
	{
		return 	"<a href=\"$link\" onMouseOut=\"swapImgRestore()\" ".
		"onMouseOver=\"swapImage('$name','','$image2',1)\">".
		"<img name=$name border=0 src=\"$image1\"$target alt=\"$alt\">".
		"</a>";
	}
}
?>

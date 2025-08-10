<?php
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/XMLhelp.php
Last modified: 20011303

***************************************/ 

require "../include/strings.php";
require "../include/xmlparse.php";

function XMLhelp($array, $arrName, $level = 0){
        if ($level==0 ){
	  echo "<pre>";
	}
        while ( list($key, $val) = each($array) ) {
                if (is_array($val)){
		   if (is_string($key)){
		     $var1="[\"";
		     $var2="\"]";
	           } else {
		     $var1="[";
		     $var2="]";
		   }
	          XMLhelp($val, $arrName . $var1 . $key . $var2, $level + 1);
        	} else {
                  echo '$' . $arrName . '["' . $key . '"] = "' . $val . "\"\n";
                }
        }
        if ($level==0){
	  echo "</pre>";
	}
}






function ShowXMLarray($file, $name){
	$array=XMLparse($file);
	XMLhelp($array, $name);
}
	
function ShowForm(){
	global $strXMLFileName, $strXMLFileExample, $strXMLname, $strXMLnameExample, $StrSubmit;
	?>
	<form name="form" method="post" action="xmlhelp.php">
	  <p><?php print($strXMLFileName) ?> 
 	   <input type="text" name="xmlfile" size="50">
 	     <?php print "$strXMLFileExample </p> <p> $strXMLname"?>
 	     <input type="text" name="xmlname" size="35">
	     <?php print "$strXMLnameExample"; ?></p>
	     </p>
	   <input type="submit" name="<?php $StrSubmit ?>" value="Submit">
	     </p>
	</form>
	<?php
}

if ($xmlfile && $xmlname){
   ShowXMLarray($xmlfile, $xmlname);
} else {
   ShowForm();
} 
?>
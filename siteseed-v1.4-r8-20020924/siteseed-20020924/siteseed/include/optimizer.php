<?
function optimizer($string="")
{
       	# strip double spaces
       	while(ereg("  ",$string))       {       $string=ereg_replace("  ", " ", $string);       }

       	# strip tabs
       	while(ereg("\t",$string))       {       $string=ereg_replace("\t", "", $string);       }
 
       	# strip cr
       	while(ereg("\r",$string))       {       $string=ereg_replace("\r", "", $string);       }
 
       	# strip double lfs
       	while(ereg("\n\n",$string))       {      $string=ereg_replace("\n\n", "\n", $string);       }

	return($string);
}
?>

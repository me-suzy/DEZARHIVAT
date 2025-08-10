<?
function html_check($content="", $verbose=0)
{
	global $strHCwarning;
	global $strHCnotice;
	global $strHCerror;
	global $strHCnotfollowedby;
	global $strHCbefore;
	
	
	// tags that may not be closed
	$level1errors=array("BR", "P", "B", "I", "TT", "H1", "H2", "H3", "H4", "H5", "H6", "FONT", "HR", "BLOCKQUOTE", "DIV", "UL", "OL", "LI", "DL", "DT", "DD", "IMG", "LINK", "!", "INPUT", "PARAM", "CENTER" );
	
	// tags that when not closed raise error level to 2
	$level2errors=array("TABLE", "FORM", "A", "TR", "TD", '?');
	
	$content=ereg_replace("\n", "\t", $content);		
	$content=ereg_replace(">", ">\n", $content);		
	
	preg_match_all("/<.+>/", $content,$tags);
	
	for($loopvar=0; $loopvar<sizeof($tags[0]); $loopvar++)
	{
		$ind_tag=$tags[0][$loopvar];
		$ind_tag=ereg_replace("<", "", $ind_tag);
		$ind_tag=ereg_replace(">", "", $ind_tag);
		
		$parameters=explode(" ", $ind_tag);
		$ind_tag=$parameters[0];				

		//strip out comments
		if(ereg("^!", $ind_tag))
		{
			$ind_tag="";
		}
		
		$ind_tag=strtoupper($ind_tag);
		
		if(ereg("^/", $ind_tag))
		{
			$tag_value=-1;
		}
		else
		{
			$tag_value=1;
		}
		
		$ind_tag=ereg_replace("/", "", $ind_tag);
		
		if(strlen($ind_tag)>0 ) // ignore empty tags or comments
		{
			$colected_tags[$ind_tag] += $tag_value;
			
			// closing a tag that has not been opened
			if($colected_tags[$ind_tag]<0)
			{
				$colected_tags[$ind_tag]=0; // if its opened later it needs to generate an error again...
				if($errorlevel<1)	{	$errorlevel=1;	}
				
				if($verbose>0)
				{
					$errormsg .= "<b>" . $strHCnotice . "</b> " . htmlentities("</$ind_tag>" . " $strHCbefore " . "<$ind_tag>") . "<br>";
				}
			}
		}
	}
	
	while( list($key,$value)= @each($colected_tags))
	{
		if($value>0)
		{
			// tags that may be left open
			$exempt=0;
			$thiserror=1;
			reset($level1errors);
			while( list($tagid,$tag)= each($level1errors))
			{
				if($key==$tag)	{ $exempt=1; }
			}
			
			reset($level2errors);
			while( list($tagid,$tag)= each($level2errors))
			{
				if($key==$tag)	{ $errorlevel=2; $thiserror=2;}
			}
			
			if($exempt==0)	
			{
				if($errorlevel<2)	{ $errorlevel=1;}
				if($verbose>0)
				{
					if($thiserror==1)
					{
						$errormsg .= "<b>$strHCwarning</b> " . htmlentities("<$key>" . " $strHCnotfollowedby " . "</$key>") . "<br>";
					}
					else
					{
						$errormsg .= "<b>$strHCerror</b> " . htmlentities("<$key>" . " $strHCnotfollowedby " . "</$key>") . "<br>";
					}
				}
			}
		}
	}
	
	$content=ereg_replace(">\n", ">", $content);		
	$content=ereg_replace("\t", "\n", $content);				
	
	if($errorlevel==1)
	{
		print "<center><table bgcolor=#DDDDDD cellspacing=10><tr><td nowrap>" . $errormsg . "</td></tr></table></center>";
	}
	if($errorlevel==2)
	{
		print "<center><table bgcolor=#FF0000 cellspacing=10><tr><td nowrap>" . $errormsg . "</td></tr></table></center>";
	}
	
	
	return($errorlevel);
}	
?>

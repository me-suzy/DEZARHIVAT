<?

function complete_url($tag="",$parametro="",$input="",$path="")
{
	
	$counter_tags=0;
	
	preg_match_all("/<$tag.+>/", $input,$tags);
	
	for($counter_tag=0; $counter_tag<sizeof($tags[0]); $counter_tag++)
	{
		$param=explode(" ",$tags[0][$counter_tag]);
		$counter_param=0;
		while(each($param))
		{
			if( eregi($parametro,$param[$counter_param]) )
			{
                        	$param_vals=explode("=",$param[$counter_param]);
                                $url=$param_vals[1];
				$url=ereg_replace('"',"",$url);
				$url=ereg_replace("'","",$url);
				if(!eregi("^http",$url) && !eregi("^https",$url) && !eregi("^ftp",$url) && !eregi("^mailto:",$url))
				{
					$new_tags[$counter_tag]=eregi_replace("$parametro=[^\s]+","$parametro=$path/$url",$tags[0][$counter_tag]);
				}
			}
			$counter_param++;
		}
		
	}
	
	
	
	
	for($counter=0; $counter<sizeof($tags[0]); $counter++)
	{
		
		if($new_tags[$counter])
		{
			$input=str_replace($tags[0][$counter],"$new_tags[$counter]",$input);
		}
		
	}	
	
	return $input;
	
}

?>

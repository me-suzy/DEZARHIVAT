<?

function recordsession_bo($origen="", $action="",$username="",$user_agent="",$remote="",$datamining="")
{
	if( $datamining == "on" )
	{
		$dia=date ("Ymd");
		
		
		if(!file_exists("../dm/$dia"))
		{
			mkdir("../dm/$dia", 0777);
		}
		if($file=fopen("../dm/$dia/$username", "a"))
		{
			$string=gmdate("M d Y H:i:s") . "\t$remote\t$origen\t$user_agent\t$action\n";
			fwrite($file, $string, strlen($string));
			fclose($file);
		}
		
	}
}

?>

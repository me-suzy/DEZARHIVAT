<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: include/box.php
Last modified: 20013103

***************************************/

function box($id="",$header="",$content="",$footer="",$toptitle="", $output=0,$projecto="",$dblink="",$remote_db=0)
{
	// the complete function is bypassed with negative values...
	if($id==-1)
	{
		$stringout="$header$content$footer";
		
		if($output>0)
		{
			return($stringout);
		}
		else
		{
			print $stringout;
			return;
		}
	}
	
	
	if(!$remote_db)
	{
		global $projecto;
		global $database_server;
		global $database_username;
		global $database_password;
	}			
	
	global $plsbox_title;
	global $plsbox_color_border;
	global $plsbox_color_header;
	global $plsbox_color_content;
	global $plsbox_color_footer;
	global $plsbox_size_border;
	global $plsbox_dist_border;
	global $plsbox_image_top_left; 
	global $plsbox_image_top_right;
	global $plsbox_image_top_row;
	global $plsbox_image_bot_left;
	global $plsbox_image_bot_right;
	global $plsbox_image_bot_row;
	global $plsbox_image_right;
	global $plsbox_image_left;	
	
	
#
# Set default parameters;
#
	$title=			$plsbox_title;
	$color_border=		$plsbox_color_border;
	$color_header=		$plsbox_color_header;
	$color_content=		$plsbox_color_content;
	$color_footer=		$plsbox_color_footer;
	$size_border=		$plsbox_size_border;
	$dist_border=		$plsbox_dist_border;
	$image_top_left= 	$plsbox_image_top_left;
	$image_top_right=	$plsbox_image_top_right;
	$image_top_row=		$plsbox_image_top_row;
	$image_bot_left=	$plsbox_image_bot_left;
	$image_bot_right=	$plsbox_image_bot_right;
	$image_bot_row=		$plsbox_image_bot_row;
	$image_right=		$plsbox_image_right;
	$image_left=		$plsbox_image_left;
	
	
#
# Use pre-defined settings if a box.id is given...
#
	if($id>0)
	{
		
		if(!$remote_db)
		{
			$dblink=mysql_pconnect($database_server, $database_username, $database_password);
		}
		
		if($dblink)
		{
			mysql_select_db ("$projecto");

			if($result=mysql_query("SELECT * from BOXbase where id=$id", $dblink))
			{
				while($row = mysql_fetch_object($result))		
				{
					if($row -> id == $id)  # we have settings
					{
						$color_border=      $row -> color_border;
						$color_header=      $row -> color_header;
						$color_content=     $row -> color_content;
						$color_footer=      $row -> color_footer;
						$size_border=       $row -> size_border;
						$dist_border=       $row -> dist_border;
						$image_top_left=    $row -> image_top_left; 
						$image_top_right=   $row -> image_top_right;
						$image_top_row=     $row -> image_top_row;
						$image_bot_left=    $row -> image_bot_left;
						$image_bot_right=   $row -> image_bot_right;
						$image_bot_row=	    $row -> image_bot_row;
						$image_right=       $row -> image_right;
						$image_left=        $row -> image_left;	
					}
				}
			}		
			mysql_free_result($result);
		}
	}
	
#
# draw the thing...
#
	if(	$image_top_left 	!= "" ||
	$image_top_right 	!= "" ||
	$image_top_row		!= "" ||
	$image_bot_left 	!= "" ||
	$image_bot_right 	!= "" ||
	$image_bot_row		!= "" ||
	$image_left	 	!= "" ||
	$image_right	 	!= "")
	{
		
		$stringout .= "\n<table border=0 cellpadding=0 cellspacing=0 align=center width=100%>";
		$stringout .= "\n<tr><td>";
		
		if($image_top_left != "")
		{
			$stringout .= "\n<img src=\"$image_top_left\" border=0>";
		}
		
		
		$stringout .= "</td>\n";
		
		if($image_top_row != "")
		{
			if($toptitle == "")
			{
				$toptitle="<font size=1>&nbsp;</font>";
			}
			
			if(ereg("#",$image_top_row))
			{
				$stringout .= "<td bgcolor=\"$image_top_row\">$toptitle";
			}
			else
			{
				$stringout .= "<td background=\"$image_top_row\">";
			}
		}
		else { $stringout .= "<td>\n"; }
		
		$stringout .= "</td><td>";
		
		if($image_top_right != "")
		{
			$stringout .= "<img src=\"$image_top_right\" border=0>";
		}
		
		$stringout .= "</td></tr>\n<tr>";
		
		if($image_left != "")
		{		
			if(ereg("#",$image_left))
			{
				$stringout .= "<td bgcolor=\"$image_left\"><font size=1>&nbsp;</font>";
			}
			else
			{
				$stringout .= "<td background=\"$image_left\">";
			}		
		}
		else { $stringout .= "<td>\n"; }
		
		$stringout .= "</td><td width=\"100%\">";
	}
	
	if($size_border > 0)
	{
		$stringout .= "\n<table border=0 cellpadding=0 cellspacing=0 align=center bgcolor=$color_border width=100%><tr><td>";
		$stringout .= "\n<table border=0 cellpadding=$dist_border cellspacing=1 width=100%>";
	}
	else
	{
		$stringout .= "\n<table border=0 cellpadding=$dist_border cellspacing=0 width=100%>";
	}
	
	if($header != "")
	{
		$stringout .= "<tr align=$align_header>\n<td bgcolor=$color_header>";
		$stringout .= "$header";
		$stringout .= "</td>\n</tr>";
	}
	
	if($content != "")
	{
		$stringout .= "<tr align=$align_content><td bgcolor=$color_content>";
		$stringout .= "$content";
		$stringout .= "</td>\n</tr>";
	}
	
	if($footer != "")
	{
		$stringout .= "<tr align=$align_footer><td bgcolor=$color_footer>";
		$stringout .= "$footer";
		$stringout .= "</td>\n</tr>";
	}
	
	$stringout .= "</table>";
	
	if($size_border > 0)
	{
		$stringout .= "</td>\n</tr></table>";
	}
	
	if(	$image_top_left 	!= "" ||
	$image_top_right 	!= "" ||
	$image_top_row		!= "" ||
	$image_bot_left 	!= "" ||
	$image_bot_right 	!= "" ||
	$image_bot_row		!= "" ||
	$image_left	 	!= "" ||
	$image_right 	 	!= "")
	{
		$stringout .= "</td>\n";
		
		if($image_right != "")
		{
			if(ereg("#",$image_right))
			{
				$stringout .= "<td bgcolor=\"$image_right\"><font size=1>&nbsp;</font>";
			}
			else
			{
				$stringout .= "<td background=\"$image_right\">";			
			}		
			$stringout .= "<td background=\"$image_right\">";
		}
		else { $stringout .= "<td>"; }
		
		$stringout .= "</td>\n</tr><tr><td>";
		
		if($image_bot_left != "")
		{
			$stringout .= "<img src=\"$image_bot_left\" border=0>";
		}
		
		$stringout .= "</td>\n";
		
		if($image_bot_row != "")
		{
			if(ereg("#",$image_bot_row))
			{
				$stringout .= "<td bgcolor=\"$image_bot_row\"><font size=1>&nbsp;</font>";
			}
			else
			{
				$stringout .= "<td background=\"$image_bot_row\">";
			}		
		}
		else { $stringout .= "<td>"; }
		
		$stringout .= "</td>\n<td>";	
		
		if($image_bot_right != "")
		{
			$stringout .= "<img src=\"$image_bot_right\" border=0>";
		}
		
		$stringout .= "</td>\n</tr></table>";	
	}
	
	if($output>0)
	{
		return($stringout);
	}
	else
	{
		print $stringout;
	}
}
?>

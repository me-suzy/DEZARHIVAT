<?
/**************************************
Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: box/bobox.php
Last modified: 20020214
by pls
***************************************/

function bobox($header="",$content="", $style="", $plain="0")
{
#
# Set default parameters;
#
	$color_border=        "#59657D";
	$color_header=        "E4E4D0";
	if($style==2)	{	$color_content=        "#F0F0E5";	}
	else		{	$color_content=        "#D9DFE9";	}
	$color_footer=        "#C9C9B5";
	$size_border=        "0";
	$dist_border=        "5";
	$image_top_left= "imagesbo/left_top_corner" . $style . ".gif";
	$image_top_right="imagesbo/right_top_corner" . $style . ".gif";
	$image_top_row="imagesbo/center_top" . $style . ".gif";
	$image_bot_left="imagesbo/left_bottom_corner" . $style . ".gif";
	$image_bot_right="imagesbo/right_bottom_corner" . $style . ".gif";
	$image_bot_row="imagesbo/center_bottom" . $style . ".gif";
	$image_right="imagesbo/center_right" . $style . ".gif";
	$image_left="imagesbo/center_left" . $style . ".gif";

#
# draw the thing...
#
	if($plain<1)
	{
		$stringout .= "\n\t<table border=0 cellpadding=0 cellspacing=0 align=center width=100%>";
		$stringout .= "\n\t\t<tr><td><img src=\"$image_top_left\" border=0></td><td background=\"$image_top_row\"></td><td><img src=\"$image_top_right\" border=0></td></tr>";
		$stringout .= "\n\t\t<tr background=\"$image_top_row.gif\"><td background=\"$image_left\"></td><td width=\"100%\">";
		$stringout .= "\n\t\t\t<table border=0 cellpadding=$dist_border cellspacing=0 width=100%>";
		$stringout .= "\n\t\t\t\t<tr><td background=imagesbo/back_top.gif nowrap>$header</td>\n</tr>";
		$stringout .= "\n\t\t\t\t<tr><td background=imagesbo/back_top2.gif>$content</td>\n</tr>";
		$stringout .= "\n\t\t\t</table>";
		$stringout .= "</td><td background=\"$image_right\"></td>\n</tr>\n";
		$stringout .= "<tr><td><img src=\"$image_bot_left\" border=0></td><td background=\"$image_bot_row\"></td>\n<td><img src=\"$image_bot_right\" border=0></td>\n</tr></table>\n\n";
	}
	else
	{
		$stringout .= "\n\t<table border=0 cellpadding=1 cellspacing=1 align=center width=100% bgcolor=#B7C56C><tr><td>";
		$stringout .= "\n\t\t\t<table border=0 cellpadding=$dist_border cellspacing=0 width=100%>";
		$stringout .= "\n\t\t\t\t<tr><td nowrap bgcolor=#B7C56C>$header</td>\n</tr>";
		$stringout .= "\n\t\t\t\t<tr><td bgcolor=#DFE5BD>$content</td>\n</tr>";
		$stringout .= "\n\t</table></td></tr></table>";
	}	
	return($stringout);
}
?>

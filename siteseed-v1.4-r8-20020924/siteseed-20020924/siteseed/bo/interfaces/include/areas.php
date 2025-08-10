<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/interfaces/include/areas.php

***************************************/ 

// this function returns a specific area name

function area_name ($area_id="") 
{
	global $id;
	$id += 0;
	
	if ($area_id==0) $area_id = $id;
	$area_id += 0;
	
	
	if ($area_id == 0) 
	{	
		return read_config ("main title");
	} 
	else 
	{	
		$query = mysql_query ("SELECT name FROM areas WHERE id=$area_id");
		
		if (!$query) error(mysql_error());
		
		if (mysql_num_rows($query)) return mysql_result ($query, 0);
	}
}




// this draws a back-navigation bar
// (ie.: Sports / Basketball / Players / Michael Jordan ... )
function back_navigation_bar ($link_prefix="?id=", $separator=" / ") 
{
	global $id;
	global $parent;
	
	if (!$id) $id = $parent;
	
	$query = mysql_query ("SELECT parent, name FROM areas WHERE id=$id");
	
	if ($query && mysql_num_rows($query))
	list ($parent, $name) = mysql_fetch_row($query);
	else return;
	
	while ($parent != 0) 
	{
		$query = mysql_query("SELECT id, parent, name FROM areas WHERE id=$parent");
		list ($idlink, $parent, $name) = mysql_fetch_row($query);
		
		$html = "<a href=\"$link_prefix$idlink\">$name</a>$separator" . $html;
	}
	
	return "<a href=\"\">".read_config("main title")."</a>$separator". $html;
}



// prints a button with $image1
// if $area is the current area
// else prints $image2

function area_button ($image1, $image2, $area, $alt="") 
{
	global $id;
	
	if (!$id) $id = 0;
	
	if ($area == $id) 
	{
		if ($image1) return "<a href=\"?id=$area\"><img src=\"$image1\" border=0 alt=\"$alt\"></a>";
		else return;
	} 
	else 
	{
		if ($area==0) return "<a href=\"\"><img src=\"$image2\" border=0 alt=\"$alt\"></a>";
		else return "<a href=\"?id=$area\"><img src=\"$image2\" border=0 alt=\"$alt\"></a>";
	}
}
?>

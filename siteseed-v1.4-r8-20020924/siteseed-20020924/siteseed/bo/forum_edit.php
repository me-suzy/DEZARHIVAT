<?
require "../config.php";
require "../include/strings.php";

if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{
$points_post_un += 0;

if($submit && !$serial)
{
	mysql_db_query("$projecto", "INSERT into ARTICLEforum SET
                                name='$name',
                                max_points='$max_points',
                                min_points='$min_points',
                                max_class='$max_class',
                                min_class='$min_class',
                                expiration_time='$expiration_time',
                                archive='$archive',
                                points_post='$points_post',
				points_post_un='$points_post_un',
				disappear='$disappear'
                                ", $dblink);

}


if($submit && $serial)
{
	mysql_db_query("$projecto", "UPDATE ARTICLEforum SET
                                name='$name',
                                max_points='$max_points',
                                min_points='$min_points',
                                max_class='$max_class',
                                min_class='$min_class',
                                expiration_time='$expiration_time',
                                archive='$archive',
                                points_post='$points_post',
				points_post_un='$points_post_un',
				disappear='$disappear'
                                 where serial=$serial", $dblink);

}



if($serial)
{

	$result=mysql_db_query("$projecto", "SELECT * from ARTICLEforum WHERE serial=$serial", $dblink);

         if($row = mysql_fetch_object($result))
         {
               $name=                           $row->name;
               $max_points=                     $row->max_points;
               $min_points=                     $row->min_points;
               $max_class =                     $row->max_class;
               $min_class =                     $row->min_class;
               $expiration_time=                $row->expiration_time;
               $archive=                        $row->archive;
               $points_post=                    $row->points_post;
	       $points_post_un=                 $row->points_post_un;
	       $disappear=			$row->disappear;
                                
         }

}

  print"<br><br><table width=100% cellpadding=30 cellspacing=0><tr><td><form method=\"post\"><input type=hidden name=serial value=$serial>
  <p>$strName 
    <input type=\"text\" name=\"name\" value='$name'>
  </p>
  <p> $strMax_class 
    <select name=\"max_class\">";
      
if(!$max_class)$max_class=1;
$counter=1;
while($counter<4)      
{
	if($counter==$max_class)
	{
		print"<option selected>$counter</option>";
      }
	else
	{
		print"<option>$counter</option>";
	} 
	$counter++;
}


    print"</select>
    $strMin_class 
    <select name=\"min_class\">";
     
if(!$min_class)$min_class=-1;
$counter=-1;
while($counter>-4)      
{
	if($counter==$min_class)
	{
		print"<option selected>$counter</option>";
      }
	else
	{
		print"<option>$counter</option>";
	} 
	$counter--;
}

    print"</select>
  </p>
  <p>$strMax_points 
    <select name=\"max_points\">";

if(!$max_points)$max_points=5;
$counter=1;
while($counter<11)      
{
	if($counter==$max_points)
	{
		print"<option selected>$counter</option>";
      }
	else
	{
		print"<option>$counter</option>";
	} 
	$counter++;
}
    

	print"</select>
    $strMin_points 
    <select name=min_points>";

if(!$min_points)$min_points=-5;
$counter=-1;
while($counter>-11)      
{
	if($counter==$min_points)
	{
		print"<option selected>$counter</option>";
      }
	else
	{
		print"<option>$counter</option>";
	} 
	$counter--;
}

    print"</select>
  </p>
  <p>$strPointspost 
    <select name=points_post>";
      
$counter=0;
while($counter<5)      
{
	if($counter==$points_post)
	{
		print"<option selected>$counter</option>";
      }
	else
	{
		print"<option>$counter</option>";
	} 
	$counter++;
}

    print"</select><br><br>
    $strPointspost_un 
    <select name=points_post_un>";
   
$counter=0;
while($counter<5)      
{
	if($counter==$points_post_un)
	{
		print"<option selected>$counter</option>";
        }
	else
	{
		print"<option>$counter</option>";
	} 
	$counter++;
}

    print"</select>
  </p>
  <p>$strDisappear 
    <select name=disappear>";
      
if(!$disappear)$disappear=0;
$counter=0;
while($counter>-4)      
{
	if($counter==$disappear)
	{
		print"<option selected>$counter</option>";
      }
	else
	{
		print"<option>$counter</option>";
	} 
	$counter--;
}

if($archive)$archive="checked";
else $archive="";

    print"</select>
  </p>
  <p>$strExpiration 
    <input type=\"text\" name=\"expiration_time\" value=\"$expiration_time\">
  </p>
  <p>$strArchive 
    <input type=\"checkbox\" name=\"archive\" value=1 $archive>
  </p>
  <p>
    <input type=\"submit\" name=\"submit\" value=\"$strSave\">
  </p>
</form></td></tr></table>";

}
else
{
	print"Error conectin to Database";
}

?>

<?
require_once "../config.php";
require_once "../include/strings.php";
require "../include/box.php";
$id+=0;
$id_new+=0;
$file_id+=0;
$name_new=ereg_replace(" ","",$name_new);

if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{


	$result=mysql_db_query("$projecto","SELECT * from css where id=$id", $dblink);

	$gotvalues=0;

	while( $row=mysql_fetch_object($result) )
	{

		$name=$row->name;
		$instance=$row->instance;
		$file_id=$row->file;
		$weight=$row->weight;
		$size=$row->size;
		$size_units=$row->size_units;
		$text_trans=$row->text_trans;
		$color=$row->color;
		$style=$row->style;
		$family=$row->family;
		$background=$row->background;
		$decoration=$row->decoration;
		$height=$row->height;
		$height_units=$row->height_units;
		$text=$row->text;
		$gotvalues=1;
	}


	if($gotvalues==0)
	{
		$name="$strNewCSS";
		$instance="";
		$weight="";
                $size=0;
                $size_units="";
                $text_trans="";
                $color="";
                $style="";
                $family="";
                $background="";
                $decoration="";
                $height=0;
		$height_units="";
		$text="";
	

		if($id==0 && $id_new==0) # there is a new data record to be saved!
		{
			mysql_db_query("$projecto","INSERT INTO css SET name='$name', file=$file_id", $dblink);
                	$id=mysql_insert_id($dblink);
		}
	}



	#
	# Is there new data to replace the preferences?
	#

		if($id_new>0) # there is data to be saved!
        	{
			$id=$id_new;
			$name_new=addslashes(stripslashes($name_new));
                	$instance_new=addslashes(stripslashes($instance_new));
			$file_id+=0;
			$weight_new=addslashes(stripslashes($weight_new));
                	$size_new+=0;
                	$size_units_new=addslashes(stripslashes($size_units_new));
                	$text_trans_new=addslashes(stripslashes($text_trans_new));
                	$color_new=addslashes(stripslashes($color_new));
                	$style_new=addslashes(stripslashes($style_new));
                	$family_new=addslashes(stripslashes($family_new));
                	$background_new=addslashes(stripslashes($background_new));
                	$decoration_new=addslashes(stripslashes($decoration_new));
                	$height+=0;
			$height_units=addslashes(stripslashes($height_units));
			$text_new=addslashes(stripslashes($text_new));
		

			$result=mysql_db_query("$projecto","UPDATE css 
				SET name='$name_new',
				instance='$instance_new',
				file=$file_new,
				weight='$weight_new',
				size=$size_new,
				size_units='$size_units_new',
				text_trans='$text_trans_new',
				color='$color_new',
				style='$style_new',
				family='$family_new',
				background='$background_new',
				decoration='$decoration_new',
				height=$height_new,
				height_units='$height_units_new',
				text='$text_new'   
				where id=$id_new",$dblink);
		
			
			$id=$id_new;
                        $name=stripslashes($name_new);
			$instance=stripslashes($instance_new);
			$file_id=$file_new;
                        $weight=stripslashes($weight_new);
                        $size=$size_new;
                        $size_units=stripslashes($size_units_new);
                        $text_trans=stripslashes($text_trans_new);
                        $color=stripslashes($color_new);
                        $style=stripslashes($style_new);
                        $family=stripslashes($family_new);
                        $background=stripslashes($background_new);
                        $decoration=stripslashes($decoration_new);
                        $height=$height_new;
			$height_units=stripslashes($height_units_new);
			$text=$text_new;


			$result=mysql_db_query("$projecto","SELECT name from css_files where id=$file_id",$dblink);
			$row=mysql_fetch_object($result);
			$file=$row->name;


			if($file=fopen("../css/$file.css", "w"))
                	{

				$result=mysql_db_query("$projecto","SELECT * from css where file=$file_id", $dblink);


		       		 while( $row=mysql_fetch_object($result) )
       			         {
					
                			$name_f=$row->name;
					$instance_f=$row->instance;
                			$weight_f=$row->weight;
                			$size_f=$row->size;
                			$size_units_f=$row->size_units;
                			$text_trans_f=$row->text_trans;
                			$color_f=$row->color;
                			$style_f=$row->style;
                			$family_f=$row->family;
                			$background_f=$row->background;
                			$decoration_f=$row->decoration;
                			$height_f=$row->height;
					$height_units_f=$row->height_units;
					$text_f=$row->text;		                	

						$string="$name_f";
						if($instance_f)$string.=":$instance_f";
						$string.="{";				
						if($color_f)$string.="color:$color_f;";
						if($size_f)$string.="font-size:$size_f$size_units_f;";
						if($weight_f!="none")$string.="font-weight:$weight_f;";
						if($text_trans_f!="none")$string.="text-transform:$text_trans_f;";
						if($style_f!="none")$string.="font-style:$style_f;";
						if($family_f!="none")$string.="font-family:$family_f;";
						if($background_f)$string.="background-color:$background_f;";
						$string.="text-decoration:$decoration_f;";
						if($height_f)$string.="height:$height_f$height_units_f;";
						if($text_f!="")
					        {
                					$string.=$text_f;
        					}


						$string.="}\n";
				
	                        	
					fwrite($file, $string, strlen($string));

		        	 }
                	
	                    	 fclose($file);

                	}


		}


}
print"<style type=\"text/css\">
<!--\n";

if($id>0)
{

	$string="";
	$string.="$name";
	if($instance)$string.=":$instance";
	$string.="{";
        if($color)$string.="color:$color;";
        if($size)$string.="font-size:$size$size_units;";
	if($weight!="none")$string.="font-weight:$weight;";
        if($text_trans!="none")$string.="text-transform:$text_trans;";
        if($style!="none")$string.="font-style:$style;";
        if($family!="none")$string.="font-family:$family;";
        if($background)$string.="background-color:$background;";
        $string.="text-decoration:$decoration;";
        if($height)$string.="height:$height$height_units;";

	if($text!="")
        {
                $string.=$text;
        }

        $string.="}";

	
}

print"$string";
print"\n--></style>";
box(    "0",
                        "<B>$strCSSPreview</B>");

$temp_name=ereg_replace("\.","",$name);


if($instance)
{
	 print"<br><center><a href=# class=$temp_name>$name</a></center>
        <br>";
}
else
{
	print"<br><center><span class=$temp_name>$name</span></center>
	<br>";
}

if($id)
{
	box( "0", "<B>$strEditing $name ($id)</B>");
}
else
{
	box( "0", "<B>$strEditing</B>");
}


?>
<form method=post name=css>
<table cellspacing=10 cellpadding=10 width=70%><tr><td>

<INPUT NAME=file_new TYPE=hidden VALUE="<?print"$file_id";?>">
<INPUT NAME=id_new TYPE=hidden VALUE="<?print"$id";?>">
<?print"$strName";?></td><td>
<input type="text" name="name_new" size="16" maxlength="50" value="<?print"$name";?>"> <?print" ( $strClassNameAdvise ) ";?>
</td></tr><tr><td>
Instance</td><td>
<input type="text" name="instance_new" size="16" maxlength="50" value="<?print"$instance";?>"> <?print"($strInstanceAdvice)";?>
</td></tr><tr><td>
Font-weight</td><td> 
<select name="weight_new" size="1">
  <option value="none"<?if($weight=="none")print" selected";?>>none</option>	
  <option value="normal"<?if($weight=="normal")print" selected";?>>normal</option>
  <option value="bold"<?if($weight=="bold")print" selected";?>>bold</option>
  <option value="bolder"<?if($weight=="bolder")print" selected";?>>bolder</option>
  <option value="lighter"<?if($weight=="lighter")print" selected";?>>lighter</option>
  <option value="100"<?if($weight==100)print" selected";?>>100</option>
  <option value="200"<?if($weight==200)print" selected";?>>200</option>
  <option value="300"<?if($weight==300)print" selected";?>>300</option>
  <option value="400"<?if($weight==400)print" selected";?>>400</option>
  <option value="500"<?if($weight==500)print" selected";?>>500</option>
  <option value="600"<?if($weight==600)print" selected";?>>600</option>
  <option value="700"<?if($weight==700)print" selected";?>>700</option>
  <option value="800"<?if($weight==800)print" selected";?>>800</option>
  <option value="900"<?if($weight==900)print" selected";?>>900</option>
</select>
</td></tr><tr><td>
Font-size</td><td>
<input type="text" name="size_new" size="4" maxlength="4" value="<?print"$size";?>">
units 
<select name="size_units_new">
  <option value="px"<?if($size_units=="px")print" selected";?>>px</option>
  <option value="ex"<?if($size_units=="ex")print" selected";?>>ex</option>
  <option value="em"<?if($size_units=="em")print" selected";?>>em</option>
  <option value="cm"<?if($size_units=="cm")print" selected";?>>cm</option>
  <option value="mm"<?if($size_units=="mm")print" selected";?>>mm</option>
  <option value="pc"<?if($size_units=="pc")print" selected";?>>pc</option>
  <option value="in"<?if($size_units=="in")print" selected";?>>in</option>
  <option value="pt"<?if($size_units=="pt")print" selected";?>>pt</option>
</select>
</td></tr><tr><td>
Text-transform</td><td>
<select name="text_trans_new">
  <option value="none"<?if($text_trans=="none")print" selected";?>>none</option>
  <option value="capitalize"<?if($text_trans=="capitalize")print" selected";?>>capitalize</option>
  <option value="uppercase"<?if($text_trans=="uppercase")print" selected";?>>uppercase</option>
  <option value="lowercase"<?if($text_trans=="lowercase")print" selected";?>>lowercase</option>
</select>
</td></tr><tr><td>
Color</td><td>
<input type="text" name="color_new" size="7" maxlength="7" value=<?print"$color";?>>
</td></tr><tr><td>
Font-style</td><td>
<select name="style_new">
  <option value="none"<?if($style=="none")print" selected";?>>none</option>
  <option value="normal"<?if($style=="normal")print" selected";?>>normal</option>
  <option value="italic"<?if($style=="italic")print" selected";?>>italic</option>
  <option value="oblique"<?if($style=="oblique")print" selected";?>>oblique</option>
</select>
</td></tr><tr><td>
Font-family</td><td>
<select name="family_new">
  <option value="none"<?if($family=="none")print" selected";?>>none</option>
  <option value="Arial, Helvetica, sans-serif"<?if($family=="Arial, Helvetica, sans-serif")print" selected";?>>Arial, Helvetica, sans-serif</option>
  <option value="Times New Roman, Times, serif"<?if($family=="Times New Roman, Times, serif")print" selected";?>>Times New Roman, Times, serif</option>
  <option value="Courier New, Courier, mono"<?if($family=="Courier New, Courier, mono")print" selected";?>>Courier New, Courier, mono</option>
  <option value="Georgia, Times New Roman, Times, serif"<?if($family=="Georgia, Times New Roman, Times, serif")print" selected";?>>Georgia, Times New Roman, Times, serif</option>
  <option value="Verdana, Arial, Helvetica, sans-serif"<?if($family=="Verdana, Arial, Helvetica, sans-serif")print" selected";?>>Verdana, Arial, Helvetica, sans-serif</option>
  <option value="Geneva, Arial, Helvetica, san-serif"<?if($family=="Geneva, Arial, Helvetica, san-serif")print" selected";?>>Geneva, Arial, Helvetica, san-serif</option>
</select>
</td></tr><tr><td>
Background-color</td><td>
<input type="text" name="background_new" size="7" maxlength="7" value=<?print"$background";?>>
</td></tr><tr><td>
Text-decoration</td><td>
<select name="decoration_new">
  <option value="none"<?if($decoration=="none")print" selected";?>>none</option>
  <option value="underline"<?if($decoration=="underline")print" selected";?>>underline</option>
  <option value="overline"<?if($decoration=="overline")print" selected";?>>overline</option>
  <option value="line-trough"<?if($decoration=="line-trough")print" selected";?>>line-trough</option>
  <option value="blink"<?if($decoration=="blink")print" selected";?>>blink</option>
</select>
</td></tr><tr><td>
Height</td><td>
<input type="text" name="height_new" size="4" maxlength="4" value=<?print"$height";?>>
units 
<select name="height_units_new">
  <option value="px"<?if($height_units=="px")print" selected";?>>px</option>
  <option value="ex"<?if($height_units=="ex")print" selected";?>>ex</option>
  <option value="em"<?if($height_units=="em")print" selected";?>>em</option>
  <option value="cm"<?if($height_units=="cm")print" selected";?>>cm</option>
  <option value="mm"<?if($height_units=="mm")print" selected";?>>mm</option>
  <option value="pc"<?if($height_units=="pc")print" selected";?>>pc</option>
  <option value="in"<?if($height_units=="in")print" selected";?>>in</option>
  <option value="pt"<?if($height_units=="pt")print" selected";?>>pt</option>
</select>
</td></tr><tr><td colspan=2>
<?print"$strAditionalProp";?><br>
<textarea name="text_new" rows="10" cols="50"><?print"$text";?></textarea>
</td></tr><tr><td colspan=2>
<input type=submit name=submit value=<?print"$strSave";?>>
</td></tr></table>
</form>
</body></html>
<?

?>

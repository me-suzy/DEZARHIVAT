<?

require "../include/strings.php";

if($file_name)
{

	require_once "../config.php";

	#security

	$file_name=ereg_replace("\.", "", $file_name);
	$file_name=ereg_replace(" ", "", $file_name);
	$file_name=ereg_replace("'", "", $file_name);
	$file_name=ereg_replace("/", "", $file_name);
	$file_name=ereg_replace("´", "", $file_name);
	$file_name=ereg_replace("`", "", $file_name);

	if(file_exists("../css/$file_name.css"))
	{
		print"File already exists!!";
	}
	else
	{
		if($file=fopen("../css/$file_name.css", "w"))
		{	
			if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
			{
				mysql_db_query("$projecto","INSERT INTO css_files SET name='$file_name'", $dblink);
		        	$id=mysql_insert_id($dblink);	

				header("Location:index.php?listar=css&file_id=$id");
			}
			else
			{
				print"ERROR!!";
			}
		}
		else
		{
			print"ERROR!!";
		}

	
	}

}
else
{

?>
<br><br>
<center><?print"$strFileName";?><br><br><form method=post name=file>
<?print"$strName";?> <input type="text" name="file_name" size="16" maxlength="50"><br>
<br><input type=submit name=submit value=<?print"$strSave";?>>
</form></center>

<?
}
?>

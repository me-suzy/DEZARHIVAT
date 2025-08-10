<?
$status=0;

if($dblink=mysql_pconnect($database_server, $database_username, $database_password))
{		
	mysql_select_db ("$projecto");

	$REMOTE_USER=$_SERVER['REMOTE_USER'];

	if($result=mysql_query("SELECT * from STAFFbase where login like '$REMOTE_USER'", $dblink))
	{
		while($row = mysql_fetch_object($result))		
		{
			$name=	$row -> name;
			$email=	$row -> email;
			$status=$row -> status;
			$areastatus=$row -> area;
			$user_id=       $row -> id;
			
			$security_name=$name;
			$security_email=$email;
			$security_status=$status;
		}
	}
	
	if($result=mysql_query("SELECT * from STAFFdetails where login like '$REMOTE_USER'", $dblink))
	{
		while($row = mysql_fetch_object($result))		
		{
			$inibe=	$row -> inibe;
			$area=	$row -> area;
			
			$limitacao[$inibe][$area]=1;
			if($inibe==2)
			{
				$limittopic[$area]=1;
			}
		}
	}
}
else
{
	print "Database access error...";
}


if($status==0)
{
	if($contastaff=mysql_query("SELECT count(id) from STAFFbase", $dblink))
	{
		$rowstaff = mysql_fetch_array($contastaff);
		$quantos = $rowstaff[0];
	}
	
	if($quantos==0)
	{
		$status=3;
		$name="setup user";
		$email="";
	}
}

if($minstatus>$status)
{
	print "The current staff member returned Access (Required: $minstatus / Current: $status) denied...";
	exit();
}

if($limitacao[$op][$det]==1)
{
	print "Acesso (Operation: $op + Detail: $det) denied...";
	exit();
}

?>

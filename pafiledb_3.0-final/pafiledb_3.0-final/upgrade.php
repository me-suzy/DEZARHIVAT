<?php
/*
  paFileDB 3.0
  ©2001/2002 PHP Arena
  Written by Todd
  todd@phparena.net
  http://www.phparena.net
  Keep all copyright links on the script visible
  Please read the license included with this script for more information.
*/
?>
<html>
<head>
<title>paFileDB 3 Upgrade</title>
</head>
<body>
<table width="100%" border="0" cellpadding="2" cellspacing="0"><tr><td width="100%" align="center">
<?php
require "./includes/mysql.php";
function printstep($step, $status) {
	echo "<font face=\"tahoma\" size=\"2\"><img src=\"images/installer/$status.gif\">&nbsp;$step&nbsp;&nbsp;";
}
if (empty($page) or $page == 1) {
	printstep("Welcome to paFileDB","current");
	printstep("Verify Database Settings","notdone");
	printstep("Set Options","notdone");
	printstep("Finish Upgrade","notdone");
}
if ($page == 2) {
	printstep("Welcome to paFileDB","done");
	printstep("Verify Database Settings","current");
	printstep("Set Options","notdone");
	printstep("Finish Upgrade","notdone");
}
if ($page == 3) {
	printstep("Welcome to paFileDB","done");
	printstep("Verify Database Settings","done");
	printstep("Set Options","current");
	printstep("Finish Upgrade","notdone");
}
if ($page == 4) {
	printstep("Welcome to paFileDB","done");
	printstep("Verify Database Settings","done");
	printstep("Set Options","done");
	printstep("Finish Upgrade","current");
}
echo "<hr></td></tr><tr><td width=\"100%\" align=\"left\"><p><font face=\"Tahoma\" size=\"2\">";
if (empty($page) or $page == 1) {
	?>
	Welcome to paFileDB 3.0! This script will guide you through the upgrade process. Please make sure you have properly configured the MySQL database settings in mysql.php which is in the 'includes' directory in the paFileDB zip file.<p><center><form method="POST" action="upgrade.php?page=2"><input type=Submit value=">> Continue <<"></center><p><b>Installing paFileDB on your server for the first time? <a href="install.php">Click Here!</a></b></form>
	<?php
}
if ($page == 2) {
	if ($action == verify) {
		?>
		paFileDB will now verify these settings to see if they are correct.<p>Connecting to MySQL Server: 
                <?php
                if($dbc = mysql_connect($db[host],$db[user],$db[pass])) { echo "OK"; } else { $pafiledb_sql->error("Error. Unable to connect to the database"); }
                echo "<br>Accessing MySQL database <b>$db[name]</b>: ";
                if(mysql_select_db($db[name],$dbc)) { echo "OK"; } else { $err = mysql_error(); $pafiledb_sql->error("Error: Unable to access the database <b>$db[name]</b>. MySQL returned this error: <b>$err</b>"); }
                echo "<center><form method=\"POST\" action=\"upgrade.php?page=3\"><input type=Submit value=\">> Continue <<\"></center></form>";
	}
	if (empty($action) or $action == show) {
		?>
		This page will allow you to double-check your database settings before paFileDB is upgraded.<br>Here are the MySQL settings you entered in mysql.php:<p>
		MySQL Server: <?php echo $db[host]; ?><br>
		MySQL Username: ****<br>
		MySQL Password: ****<br>
		MySQL Database: <?php echo $db[name]; ?><p>
		You also need a directory in your paFileDB directory called "sessions" that is CHMODded 777. CHMODs only apply on *NIX servers, if you're running on a Windows server, CHMODding is not needed.<p>
		<center><form method="POST" action="upgrade.php?page=2&action=verify"><input type=Submit value=">> Continue <<"></center></form>
                <?php
	}
}
if ($page == 3) {
	if ($action == "install") {
		
		$pafiledb_sql->connect($db);
		echo "The paFileDB upgrader is now configuring your MySQL database to run paFileDB 3<p>";
		
		if ($settings[installtype] < 3) {
			echo "Making changes to pafiledb_files: ";
			if ($settings[installtype] == 1) {
				$docsurl = "ADD file_docsurl text,";
				$catparent = "ADD cat_parent int(50) NULL,";
				$parent = "cat_parent = '0',";
			}
			if ($settings[installtype] == 2) {
				$docsurl = "";
				$catparent = "";
				$parent = "";
			}
			$query = "ALTER TABLE $db[prefix]_files $docsurl ADD file_rating text NOT NULL, ADD file_totalvotes text NOT NULL";
			$pafiledb_sql->query($db,$query,0);
			$pafiledb_sql->query($db, "UPDATE $db[prefix]_files SET file_rating = '0', file_totalvotes = '0'", 0);
			echo "Done<br>";
			echo "Making changes to pafiledb_cat: ";
			$query = "ALTER TABLE $db[prefix]_cat $catparent ADD cat_order int(50) NULL";
			$pafiledb_sql->query($db,$query,0);
			$pafiledb_sql->query($db, "UPDATE $db[prefix]_cat SET $parent cat_order = '0'", 0);
		    echo "Done<br>";
		
			echo "Creating table $db[prefix]_admin: ";
			$query = "
			CREATE TABLE $db[prefix]_admin (
                admin_id int(10) NOT NULL auto_increment,
                admin_username text,
                admin_password text,
                admin_email text,
                admin_status int(1) default NULL,
                PRIMARY KEY  (admin_id)
			)";
			$pafiledb_sql->query($db,$query,0);
			echo "Done<br>";
		 
			echo "Creating table $db[prefix]_custom: ";
			$query = "
			CREATE TABLE $db[prefix]_custom (
                custom_id int(50) NOT NULL auto_increment,
                custom_name text NOT NULL,
                custom_description text NOT NULL,
                PRIMARY KEY  (custom_id)
			 )";
			 $pafiledb_sql->query($db,$query,0);
			 echo "Done<br>";
                
			 echo "Creating table $db[prefix]_customdata: ";
			 $query = "
			 CREATE TABLE $db[prefix]_customdata (
                customdata_file int(50) NOT NULL default '0',
                customdata_custom int(50) NOT NULL default '0',
                data text NOT NULL
			 )";
			 $pafiledb_sql->query($db,$query,0);
			 echo "Done<br>";

			 echo "Creating table $db[prefix]_settings: ";
			 $query = "
			 CREATE TABLE $db[prefix]_settings (
                settings_id int(1) NOT NULL default '1',
                settings_dbname text NOT NULL,
                settings_dbdescription text NOT NULL,
                settings_dburl text NOT NULL,
                settings_topnumber int(5) NOT NULL default '0',
                settings_homeurl text NOT NULL,
                settings_newdays int(5) NOT NULL default '0',
                settings_timeoffset int(5) NOT NULL default '0',
                settings_timezone text NOT NULL,
                settings_header text NOT NULL,
                settings_footer text NOT NULL,
                settings_style text NOT NULL,
				settings_stats int(5) NOT NULL default '0'
			 )";
			 $pafiledb_sql->query($db,$query,0);
			 echo "Done<br>";

			 echo "Creating table $db[prefix]_votes: ";
			 $query = "
			 CREATE TABLE $db[prefix]_votes (
		            votes_ip VARCHAR (50) NOT NULL default '0',
			        votes_file int(50) NOT NULL default '0'
			 )";
			 $pafiledb_sql->query($db,$query,0);
			 echo "Done<br>";

			echo "Inserting paFileDB configuration into $db[prefix]_settings: ";
			 $query = "INSERT INTO $db[prefix]_settings VALUES ('1', '$settings[dbname]', '$settings[description]', '$settings[dburl]', '$settings[topfiles]', '$settings[homepage]', '$settings[newdays]', '$settings[offset]', '$settings[timezone]', '$settings[header]', '$settings[footer]', 'default', '$settings[stats]')";
			 $pafiledb_sql->query($db,$query,0);
			echo "Done<br>";

			$pass = md5($settings[adminpw]);
			 echo "Inserting admin info into $db[prefix]_admin: ";
			$query = "INSERT INTO $db[prefix]_admin VALUES (NULL, '$settings[adminun]', '$pass', '$settings[adminemail]', '1')";
			$pafiledb_sql->query($db,$query,0);
			echo "Done<p>";
		 }
		 if ($settings[installtype] == 3) {
			 echo "Making changed to $db[prefix]_settings: ";
			 $query = "ALTER TABLE $db[prefix]_settings ADD settings_lang text NOT NULL";
			 $pafiledb_sql->query($db,$query,0);
			 $pafiledb_sql->query($db, "UPDATE $db[prefix]_settings SET settings_lang = 'english'", 0);
			 echo "Done<br>";
			 echo "Making changed to $db[prefix]_files: ";
			 $pafiledb_sql->query($db, "UPDATE $db[prefix]_files SET file_totalvotes = '1' WHERE file_totalvotes = '0'", 0);
			 echo "Done<br>";
		 }
		 if ($settings[installtype] == 32) {
			 echo "Making changed to $db[prefix]_files: ";
			 $pafiledb_sql->query($db, "UPDATE $db[prefix]_files SET file_totalvotes = '1' WHERE file_totalvotes = '0'", 0);
			 echo "Done<br>";
		 }
		 echo "The paFileDB installer has finished setting up your MySQL database for paFileDB 3.";
         echo "<center><form method=\"POST\" action=\"upgrade.php?page=4\"><input type=Submit value=\">> Continue <<\"></center></form>";
	}
	if (empty($action) or $action == "form") {
		$path = str_replace("/upgrade.php", "", $PHP_SELF);
		$dburl = "http://$HTTP_SERVER_VARS[HTTP_HOST]$path";
		?>
		<form method="POST" action="upgrade.php">
      <table width="100%" cellspacing="0" border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111">
      <tr>
      <td width="29%" colspan="2">
      <p align="center"><font face="Tahoma"><b>Upgrade Type</b></font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Database Options</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <select size="1" name="settings[installtype]">
      <option value="1">I am upgrading from Version 2.0 Final or Version 2.0.x</option>
      <option value="2">I am upgrading from Version 2.1 or 2.11</option>
	  <option value="3">I am upgrading from Version 3 Beta 1</option>
	  <option value="32">I am upgrading from Version 3 Beta 2 or Beta 2.1</option>
      </select>
      <br>
      Choose which version of paFileDB you will be upgrading from. Upgrading from version 1.x is not supported yet. <b>If you are upgrading from version 3 Beta 1, 2, or 2.1, you do not need to fill out the form below, just scroll down and click the ">> Continue <<" button</b><br>
      </font></td>
    </tr>
      <tr>
      <td width="29%" colspan="2">
      <p align="center"><font face="Tahoma"><b>Admin Settings</b></font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Admin Username</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <input type="text" name="settings[adminun]" size="50" value="Admin"><br>
      Choose an admin username to use</font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Admin Password</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <input type="text" name="settings[adminpw]" size="50" value="password"><br>
      Choose an admin password to use. Make sure it is hard to guess what it is.</font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Admin Email Address</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <input type="text" name="settings[adminemail]" size="50" value="admin@mysite.com"><br>
      Enter your e-mail address</font></td>
    </tr>
    <tr>
      <td width="29%" colspan="2">
      <p align="center"><b><font face="Tahoma">paFileDB Settings</font></b></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Database Name</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <input type="text" name="settings[dbname]" size="50" value="My Files"><br>
      This is the name of the database, such as &quot;Windows Registry Hacks&quot;</font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Database Description</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <input type="text" name="settings[description]" size="50" value="A collection of files that you can download"><br>
      This is a description of the files in the database, such as &quot;Registry 
      hacks that actually make Windows useful&quot;</font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Database URL</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <input type="text" name="settings[dburl]" size="50" value="<?php echo "$dburl"; ?>"><br>
      This is the URL to the directory where paFileDB is installed.</font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Top Files</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <input type="text" name="settings[topfiles]" size="50" value="5" maxlength="5"><br>
      This is how many files will be displayed on the Top X Downloaded files 
      list</font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Homepage URL</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <input type="text" name="settings[homepage]" size="50" value="http://www.mysite.com"><br>
      This is the URL to your homepage</font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">New File Days</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <input type="text" name="settings[newdays]" size="50" value="5" maxlength="5"><br>
      How many days new a file has to be to be listed with a &quot;New File&quot; icon. If 
      this is set to 5, then all files added within the past 5 days will have 
      the &quot;New File&quot; icon</font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Time Offset</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <input type="text" name="settings[offset]" size="50" value="0" maxlength="3"><br>
      This is the time offset. For example, if the server is located in the 
      Eastern time zone but you want the times to be shown in Central Time, you 
      would set this to -1</font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Time Zone</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <input type="text" name="settings[timezone]" size="50" value="Central Time"><br>
      This is the time zone the times will be shown in</font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Header</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <input type="text" name="settings[header]" size="50" value="header.php"><br>
      The header file is shown before any of the paFileDB output is shown--this 
      file can contain CSS stylesheets, ect.</font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Footer</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <input type="text" name="settings[footer]" size="50" value="footer.php"><br>
      The footer file is shown after all of the paFileDB HTML.</font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Show Stats</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <select name="settings[stats]">
      <option value="0" selected>No</option>
      <option value="1">Yes</option>
      </select><br>
      Choose if you would like to show the script execution stats (Total number of MySQL queries and how long it took for the script to execute)</font></td>
    </tr>
  </table>

      <p align="center">
<input type="hidden" name="page" value="3">
<input type="hidden" name="action" value="install">
<input type="submit" value=">> Continue <<" name="Submit"></p>
      </p>
</form>
<?php
	}
	
}
if ($page == 4) {
	?>
	Thank you for using paFileDB. Enjoy using the script! If you ever need help with paFileDB, feel free to post on the <a href="http://forums.phparena.net">paFileDB Support Forums</a> to get a quick answer.
        <center><form method="POST" action="admin.php"><input type=Submit value=">> paFileDB Admin Center <<"></form><form method="POST" action="pafiledb.php"><input type=Submit value=">> paFileDB Main Page <<"></center>
        <?
}
	
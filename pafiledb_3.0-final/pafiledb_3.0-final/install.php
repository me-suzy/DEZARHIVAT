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
<title>paFileDB 3 Installer</title>
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
	printstep("Finish Install","notdone");
}
if ($page == 2) {
	printstep("Welcome to paFileDB","done");
	printstep("Verify Database Settings","current");
	printstep("Set Options","notdone");
	printstep("Finish Install","notdone");
}
if ($page == 3) {
	printstep("Welcome to paFileDB","done");
	printstep("Verify Database Settings","done");
	printstep("Set Options","current");
	printstep("Finish Install","notdone");
}
if ($page == 4) {
	printstep("Welcome to paFileDB","done");
	printstep("Verify Database Settings","done");
	printstep("Set Options","done");
	printstep("Finish Install","current");
}
echo "<hr></td></tr><tr><td width=\"100%\" align=\"left\"><p><font face=\"Tahoma\" size=\"2\">";
if (empty($page) or $page == 1) {
	?>
	Welcome to paFileDB 3.0! This script will guide you through the installation process. Please make sure you have properly configured the MySQL database settings in mysql.php which is in the 'includes' directory in the paFileDB zip file.<p><center><form method="POST" action="install.php?page=2"><input type=Submit value=">> Continue <<"></center><p><b>Upgrading paFileDB from an older version? <a href="upgrade.php">Click Here!</a></b></form>
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
                echo "<center><form method=\"POST\" action=\"install.php?page=3\"><input type=Submit value=\">> Continue <<\"></center></form>";
	}
	if (empty($action) or $action == show) {
		?>
		This page will allow you to double-check your database settings before paFileDB is installed.<br>Here are the MySQL settings you entered in mysql.php:<p>
		MySQL Server: <?php echo $db[host]; ?><br>
		MySQL Username: ****<br>
		MySQL Password: ****<br>
		MySQL Database: <?php echo $db[name]; ?><p>
		You also need a directory in your paFileDB directory called "sessions" that is CHMODded 777. CHMODs only apply on *NIX servers, if you're running on a Windows server, CHMODding is not needed.<p>
		<center><form method="POST" action="install.php?page=2&action=verify"><input type=Submit value=">> Continue <<"></center></form>
                <?php
	}
}
if ($page == 3) {
	if ($action == "install") {
		
		$pafiledb_sql->connect($db);
		echo "The paFileDB installer is now configuring your MySQL database to run paFileDB<p>";
		if ($settings[installtype] == 4) {
			if (empty($uninstall)) {
			?>
			You have chosen to uninstall paFileDB. This will delete everything in your database. Are you sure you want to do this?<br>
			<a href="install.php?action=install&page=3&type=4">Yes</a> | <a href="install.php?page=3">No</a>
		        <?php
		        }
		}
		if ($settings[installtype] == 3 or $type == 4) {
		echo "Deleting table $db[prefix]_admin: ";
		$pafiledb_sql->query($db, "DROP TABLE $db[prefix]_admin", 0);
		echo "Done<br>";
		echo "Deleting table $db[prefix]_cat: ";
		$pafiledb_sql->query($db, "DROP TABLE $db[prefix]_cat", 0);
		echo "Done<br>";
		echo "Deleting table $db[prefix]_custom: ";
		$pafiledb_sql->query($db, "DROP TABLE $db[prefix]_custom", 0);
		echo "Done<br>";
		echo "Deleting table $db[prefix]_customdata: ";
		$pafiledb_sql->query($db, "DROP TABLE $db[prefix]_customdata", 0);
		echo "Done<br>";
		echo "Deleting table $db[prefix]_files: ";
		$pafiledb_sql->query($db, "DROP TABLE $db[prefix]_files", 0);
		echo "Done<br>";
		echo "Deleting table $db[prefix]_license: ";
		$pafiledb_sql->query($db, "DROP TABLE $db[prefix]_license", 0);
		echo "Done<br>";
		echo "Deleting table $db[prefix]_settings: ";
		$pafiledb_sql->query($db, "DROP TABLE $db[prefix]_settings", 0);
		echo "Done<br>";
		echo "Deleting table $db[prefix]_votes: ";
		$pafiledb_sql->query($db, "DROP TABLE $db[prefix]_votes", 0);
		echo "Done<br>";
	        }
	        if ($type == 4) {
	        die("The paFileDB tables have been deleted. Thank you for using paFileDB");
	        }
	        if ($settings[installtype] == 2) {
		echo "Deleting table $db[prefix]_settings: ";
		$pafiledb_sql->query($db, "DROP TABLE $db[prefix]_settings", 0);
		echo "Done<br>";
	        }
	        if ($settings[installtype] != 2 and $settings[installtype] != 4) {
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
                
                echo "Creating table $db[prefix]_cat: ";
                $query = "
                CREATE TABLE $db[prefix]_cat (
                cat_id int(10) NOT NULL auto_increment,
                cat_name text,
                cat_desc text,
                cat_files int(10) default NULL,
                cat_1xid int(10) default NULL,
                cat_parent int(50) default NULL,
                cat_order int(50) default NULL,
                PRIMARY KEY  (cat_id)
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
                
                echo "Creating table $db[prefix]_files: ";
                $query = "
                CREATE TABLE $db[prefix]_files (
                file_id int(10) NOT NULL auto_increment,
                file_name text,
                file_desc text,
                file_creator text,
                file_version text,
                file_longdesc text,
                file_ssurl text,
                file_dlurl text,
                file_time int(50) default NULL,
                file_catid int(10) default NULL,
                file_posticon text,
                file_license int(10) default NULL,
                file_dls int(10) default NULL,
                file_last int(50) default NULL,
                file_pin int(2) default NULL,
                file_docsurl text,
                file_rating text NOT NULL,
                file_totalvotes text NOT NULL,
                PRIMARY KEY  (file_id)
                )";
                $pafiledb_sql->query($db,$query,0);
                echo "Done<br>";
                
                echo "Creating table $db[prefix]_license: ";
                $query = "
                CREATE TABLE $db[prefix]_license (
                license_id int(10) NOT NULL auto_increment,
                license_name text,
                license_text text,
                PRIMARY KEY  (license_id)
                )";
                $pafiledb_sql->query($db,$query,0);
                echo "Done<br>";
                 }
                if ($settings[installtype] != 4) {
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
				settings_stats int(5) NOT NULL default '0',
                settings_lang text NOT NULL
				)";
                $pafiledb_sql->query($db,$query,0);
                echo "Done<br>";
                }
                if ($settings[installtype] != 2 and $settings[installtype] != 4) {
                echo "Creating table $db[prefix]_votes: ";
                $query = "
                CREATE TABLE $db[prefix]_votes (
                votes_ip VARCHAR (50) NOT NULL default '0',
                votes_file int(50) NOT NULL default '0'
                )";
                $pafiledb_sql->query($db,$query,0);
                echo "Done<br>";
                }
                if ($settings[installtype] != 4) {
                echo "Inserting paFileDB configuration into $db[prefix]_settings: ";
                $query = "INSERT INTO $db[prefix]_settings VALUES ('1', '$settings[dbname]', '$settings[description]', '$settings[dburl]', '$settings[topfiles]', '$settings[homepage]', '$settings[newdays]', '$settings[offset]', '$settings[timezone]', '$settings[header]', '$settings[footer]', 'default', '$settings[stats]', 'english')";
                $pafiledb_sql->query($db,$query,0);
                echo "Done<br>";
                
                $pass = md5($settings[adminpw]);
                echo "Inserting admin info into $db[prefix]_admin: ";
                if ($settings[installtype] == 2) { $result = $pafiledb_sql->query($db, "SELECT * FROM $db[prefix]_admin WHERE admin_username = '$settings[adminun]'", 1); } else { $result[admin_username] = "temp"; }
                $aun = trim($result[admin_username]);
                if (empty($aun) or $settings[installtype] != 2) {
                $query = "INSERT INTO $db[prefix]_admin VALUES (NULL, '$settings[adminun]', '$pass', '$settings[adminemail]', '1')";
                $pafiledb_sql->query($db,$query,0);
                echo "Done<p>";
                } else {
        	echo "<b>Error:</b> The admin username $settings[adminun] already exists. The new admin account <b>was not</b> created<p>";
                }
                echo "The paFileDB installer has finished setting up your MySQL database for paFileDB.";
                echo "<center><form method=\"POST\" action=\"install.php?page=4\"><input type=Submit value=\">> Continue <<\"></center></form>";
                }
	}
	if (empty($action) or $action == "form") {
		$path = str_replace("/install.php", "", $PHP_SELF);
		$dburl = "http://$HTTP_SERVER_VARS[HTTP_HOST]$path";
		?>
		<form method="POST" action="install.php">
      <table width="100%" cellspacing="0" border="0" cellpadding="2" style="border-collapse: collapse" bordercolor="#111111">
      <tr>
      <td width="29%" colspan="2">
      <p align="center"><font face="Tahoma"><b>Installation Type</b></font></td>
    </tr>
    <tr>
      <td width="23%"><font size="2" face="Tahoma">Database Options</font></td>
      <td width="77%">
      <font size="1" face="Tahoma">
      <select size="1" name="settings[installtype]">
      <option value="1" selected>The database tables do not exist--create them for me</option>
      <option value="2">The database tables exist--keep the data in them</option>
      <option value="3">The database tables exist--clear the data in them</option>
      <option value="4">I would like to uninstall paFileDB--delete the tables</option>
      </select>
      <br>
      Choose what you want paFileDB to do with the MySQL database.<br>
      <b>NOTE:</b> If you choose to keep the data in the database, the current paFileDB settings in the database will be replaced with the options you set on this page, and a new admin will be added with the info you enter below.</font></td>
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
	
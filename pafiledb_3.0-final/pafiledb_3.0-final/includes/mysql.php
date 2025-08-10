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

/*You need to change these variables to get paFileDB working. If you are unsure of this information, please contact your host to obtain this information*/
$db[host] = "localhost"; //This is the MySQL server paFileDB will connect to
$db[user] = "root"; //This is the MySQL user name
$db[pass] = ""; //This is the MySQL password
$db[name] = "pafiledb"; //This is the MySQL database paFileDB will put it's information in

/*
This is the MySQL table name prefix. The default is "pafiledb" but if you wish to install multiple copies of
paFileDB on the same database, change this to something like "pafiledb2." All tables in the MySQL database will 
be named "$prefix_files," "$prefix_license" ect, for example: "pafiledb_files" and "pafiledb2_files." That will
allow multple copies of paFileDB on the same database. If you are only installing one copy of paFileDB, you dont 
need to change this. NOTE: Your host does not have this information, it is up to you to set it to what you want.
If you are upgrading from an older version of paFileDB, you MUST keep this as "pafiledb"
*/
$db[prefix] = "pafiledb"; //Table name prefix-explained above.

/*Don't mess with anything below here unless you know what you're doing!*/

class pafiledb_sql {
	function query($db,$query,$type) {
		$result = mysql_query($query);
		$error = mysql_error();
		global $query_count;
		global $queries_used;
		$query_count++;
		$queries_used .= "<tr><td width=\"100%\" align=\"left\" class=\"datacell\">$query</td></tr>";
		if (!empty($error)) {
			$errno = mysql_errno();
			$this->error("paFileDB was unable to successfully run a MySQL query.<br>MySQL Returned this error: <b>$error</b> Error number: <b>$errno</b><br>The query that caused this error was: <b>$query</b>");
		}
		if ($type == 0) {
			return $result;
		}
		if ($type == 1) {
			$array = mysql_fetch_array($result);
			return $array;
		}
		if ($type == 2) {
			$array = mysql_num_rows($result);
			return $array;
		}
		if ($type == 3) {
			$array = mysql_insert_id();
			return $array;
		}
		@mysql_free_result($result);
	}
	function error($error) {
		die($error);
	}
	function connect($db) {
		if(!($dbc = mysql_connect($db[host],$db[user],$db[pass]))) $this->error("paFileDB was unable to successfully connect to the MySQL database. Check your settings including the MySQL server, username, and password and try again.");
                if(!(mysql_select_db($db[name],$dbc))) $this->error("paFileDB was able to connect to the MySQL database, but was unable to select the database <b>$db[name]</b> to use.");
	}
}
$pafiledb_sql = new pafiledb_sql;
?>
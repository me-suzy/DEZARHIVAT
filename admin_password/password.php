<?PHP

require("global.php");

if ($cpassword == "") {

	print("
	<div align=\"center\"><table width=\"80%\" border=\"0\" cellspacing=\"0\" cellpadding=\"4\">
    <tr>
	<td><div align=\"center\"><img src=\"images/turnkeysolutions.gif\" width=\"236\" height=\"100\" border=\"0\" alt=\"\"></div><br><br>
	This script will change your administration password. Use the form below:<br><br>");
	if (isset($error) || $error != "") {
		print("<div align=\"center\"><font color=\"#FF0000\">$error</font></div><br><br>");
	}
	print("<form action=\"password.php\" method=\"post\"><table>
		<tr>
			<td>Current Password:</td>
			<td><input type=\"password\" name=\"cpassword\"></td>
		</tr>
		<tr>
			<td>New Password:</td>
			<td><input type=\"password\" name=\"npassword\"></td>
		</tr>
		<tr>
			<td>Retype Password:</td>
			<td><input type=\"password\" name=\"npassword2\"></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td><input type=\"submit\" name=\"Submit\" value=\"Continue\"></td>
		</tr>
    </table>
	</form>
	</tr>
	</table></div>
	");

} else {
	
	$query=$DB_site->query("SELECT password FROM ".$dbprefix."user where name='Admin_Account'");
	$row=$DB_site->fetch_array($query);
	
	if ($row[password] == $cpassword && $npassword == $npassword2) {
		$DB_site->query("UPDATE ".$dbprefix."user SET password='$npassword' where name='Admin_Account'");
	} elseif ($npassword != $npassword2) {
		header("location:password.php?error=Passwords%20did%20not%20match!");
		exit;
	} else {
		header("location:password.php?error=Invalid%20current%20password!");
		exit;
	}
	print("
	<div align=\"center\"><img src=\"images/turnkeysolutions.gif\" width=\"236\" height=\"100\" border=\"0\" alt=\"\"><br><br>
	Password change successful. Delete this file.</div>");

}

?>
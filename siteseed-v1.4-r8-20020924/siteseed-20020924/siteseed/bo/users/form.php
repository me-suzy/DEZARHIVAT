<?
/**************************************

Project: Siteseed (copyright MrNet 2001 - All right reserved)
Filename: bo/users/form.php

***************************************/ 	

require "../../include/strings.php";
?>
<form method="post">
<font face="Arial, Helvetica, Sans-serif" size=2>
<? print $strName; ?>: <input type=text name=name size=20 maxlenght=20<? if ($name) print " value=\"$name\""; ?>><br>
<? print $strType; ?>:
<select name=type>
<option value="int"<? if ($type=="integer") print " selected" ?>><? print "$strNumeric\n"; ?>
<option value="text"<? if ($type=="text") print " selected" ?>><? print "$strText\n"; ?>
<option value="password"<? if ($type=="password") print " selected" ?>><? print "$strPassword\n"; ?>
<option value="date"<? if ($type=="date") print " selected" ?>><? print "$strDate\n"; ?>
<option value="datetime"<? if ($type=="datetime") print " selected" ?>><? print "$strDatetime\n"; ?>
</select>
<? print $strLenght; ?>: <input type=lenght name=lenght size=5 maxlenght=5<? if ($lenght) print " value=\"$lenght\""; ?>><br>
<? print $strRequiredToLogin; ?>: <input type=checkbox name=login value=1<? if ($login) print " checked"; ?>><br>
<? print $strRequiredToRegister; ?>: <input type=checkbox name=register value=1<? if ($register) print " checked"; ?>><br>
<? print $strMandatoryToRegister; ?>: <input type=checkbox name=mandatory value=1<? if ($mandatory) print " checked"; ?>><br>
<? print $strUnique; ?>: <input type=checkbox name=unique value=1<? if ($unique) print " checked"; ?>><br><br>    

<?    
if ($id) 	
print 	"<input type=hidden name=id value=$id>".
"<input type=submit name=ok value=$strModify>";
else
print	"<input type=submit name=ok value=$strSave>";


if ($after) print "<input type=hidden name=after value=$after>";
?>

</font>
</form>

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
$locbar = "<a href=\"pafiledb.php\" class=\"small\">$config[1]</a> :: $str[admincenter]";
adlocbar($locbar,$user, $str);
adminlinks($str);
?>
<table width="100%" border="1" cellpadding="2" cellspacing="0" class="headertable" bordercolor="#000000">
<tr><td width="100%" class="headercell"><center><b><?php echo $str[admincenter]; ?></b></center></td></tr>
<tr><td width="100%" class="datacell"><?php echo $str[acinfo]; ?>
</td></tr></table>
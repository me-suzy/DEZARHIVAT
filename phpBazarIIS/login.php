<?
#################################################################################################                      
#                                                                                                                      
#  Project           : PHPBazar                                                                                        
#  File name         : login.php                                                                               
#  Last Modified By  : Erich Fuchs                                                                                     
#  e-mail            : erich.fuchs@netone.at                                                                           
#  Purpose           : Member's login                                                                            
#                                                                                                                      
#################################################################################################                      
                                                                                                                       
require ("library.php");                                                                                         

if (!$username || !$password) {
    header("Refresh: 0;url=$url_to_start/main.php?status=3");                                                                          
    exit;                                                                                                    
    } else {

    $login = $authlib->login($username, $password);
    
    if ($login!="2") {
	$errormessage=rawurlencode($login);
        header("Refresh: 0;url=$url_to_start/main.php?status=2&errormessage=$errormessage");                                                                          
	exit;                                                                                                    
        } else {
        header("Refresh: 0;url=$url_to_start/main.php?status=1");                                                                          
	exit;                                                                                                    
        }
    }
?>
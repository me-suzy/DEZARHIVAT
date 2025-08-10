<?
#################################################################################################                      
#                                                                                                                      
#  Project           : PHPBazar                                                                                        
#  File name         : logout.php                                                                               
#  Last Modified By  : Erich Fuchs                                                                                     
#  e-mail            : erich.fuchs@netone.at                                                                           
#  Purpose           : Member's logout                                                                            
#                                                                                                                      
#################################################################################################                      
                                                                                                                       

require ("library.php");                                                                                         

$authlib->logout();

header("Refresh: 0;url=$url_to_start/main.php?status=0");                                                                    
exit;                                                                                                        
	
?>
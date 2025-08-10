#####################################################################
#                                                                   #
#    Copyright © 1999-2001 CGISCRIPT.NET - All Rights Reserved     #
#                                                                   #
#####################################################################
#                                                                   #
#          THIS COPYRIGHT INFORMATION MUST REMAIN INTACT            #
#                AND MAY NOT BE MODIFIED IN ANY WAY                 #
#                                                                   #
#####################################################################
#
# When you downloaded this script you agreed to accept the terms 
# of this Agreement. This Agreement is a legal contract, which 
# specifies the terms of the license and warranty limitation between 
# you and CGISCRIPT.NET. You should carefully read the following 
# terms and conditions before installing or using this software.  
# Unless you have a different license agreement obtained from 
# CGISCRIPT.NET, installation or use of this software indicates 
# your acceptance of the license and warranty limitation terms
# contained in this Agreement. If you do not agree to the terms of this
# Agreement, promptly delete and destroy all copies of the Software.
#
# Versions of the Software 
# Only one copy of the registered version of CGISCRIPT.NET 
# may used on one web site.
# 
# License to Redistribute
# Distributing the software and/or documentation with other products
# (commercial or otherwise) or by other than electronic means without
# CGISCRIPT.NET's prior written permission is forbidden.
# All rights to the CGISCRIPT.NET software and documentation not expressly
# granted under this Agreement are reserved to CGISCRIPT.NET.
#
# Disclaimer of Warranty
# THIS SOFTWARE AND ACCOMPANYING DOCUMENTATION ARE PROVIDED "AS IS" AND
# WITHOUT WARRANTIES AS TO PERFORMANCE OF MERCHANTABILITY OR ANY OTHER
# WARRANTIES WHETHER EXPRESSED OR IMPLIED.   BECAUSE OF THE VARIOUS HARDWARE
# AND SOFTWARE ENVIRONMENTS INTO WHICH CGISCRIPT.NET MAY BE USED, NO WARRANTY 
# OF FITNESS FOR A PARTICULAR PURPOSE IS OFFERED.  THE USER MUST ASSUME THE
# ENTIRE RISK OF USING THIS PROGRAM.  ANY LIABILITY OF CGISCRIPT.NET WILL BE
# LIMITED EXCLUSIVELY TO PRODUCT REPLACEMENT OR REFUND OF PURCHASE PRICE.
# IN NO CASE SHALL CGISCRIPT.NET BE LIABLE FOR ANY INCIDENTAL, SPECIAL OR
# CONSEQUENTIAL DAMAGES OR LOSS, INCLUDING, WITHOUT LIMITATION, LOST PROFITS
# OR THE INABILITY TO USE EQUIPMENT OR ACCESS DATA, WHETHER SUCH DAMAGES ARE
# BASED UPON A BREACH OF EXPRESS OR IMPLIED WARRANTIES, BREACH OF CONTRACT,
# NEGLIGENCE, STRICT TORT, OR ANY OTHER LEGAL THEORY. THIS IS TRUE EVEN IF
# CGISCRIPT.NET IS ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. IN NO CASE WILL
# CGISCRIPT.NET' LIABILITY EXCEED THE AMOUNT OF THE LICENSE FEE ACTUALLY PAID
# BY LICENSEE TO CGISCRIPT.NET.
#####################################################################
#                                                                   #
# Credits:                                                          #
# Andy Angrick - Programmer - angrick@cgiscript.net                 #
# Mike Barone  - Developer  - mbarone@cgiscript.net                 #
#                                                                   #
# For information about this script or other scripts please see :   #
# http://www.cgiscript.net                                          #
#                                                                   #
# Thank you for trying out our script.                              #
# If you have any suggestions or ideas for a new innovative script  #
# please direct them to suggest@cgiscript.net.   Thanks.            #
#                                                                   #
#####################################################################

Description:

csPassword is an automated system for creating and maintaining apache style
.htaccess files to password protect website directories.

Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. Apache webserver or webserver that uses apache style
   .htaccess files.

Installation:

1. Unzip the file and transfer to your server with the following
   directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/csPassword <-- csPassword directory
   /cgi-script/csPassword/images <-- image directory.

  csPassword.cgi should be located at 
  [root url]/cgi-script/csPassword/csPassword.cgi where [root url]
  is the URL to your website. Example:
  http://www.mycompany.com/cgi-script/csPassword/csPassword.cgi

2. Chmod csPassword.cgi to executable (chmod 755)
   Ask your server administrator for assistance if required.

3. If your perl executable is not located at /usr/bin/perl, edit
   the first line of csPassword.cgi to reflect the true location.

4. Go to
   http://www.yoursite.com/cgi-script/csPassword/csPassword.cgi
   to initiate the automatic setup. Replace www.yoursite.com with
   your domain name.


Normal Installation Instructions:

In most cases, the script is already configured. Change the $username and 
$password variables to your liking and click 'Save'. If the setup portion 
of the script cannot find your sites variables automatically, you will might 
have to enter those in the above text area.

CGI-BIN Installation Instructions:

If your hosting service will not let your run scripts outside your cgi-bin 
directory, then follow these procedures:

Copy all the *.cgi files to a directory in your cgi-bin directory, making 
sure they are chmod'd to 755. For example, you could create a 
/cgi-bin/csPassword/ directory and place csPassword.cgi, libs.cgi, and 
setup.cgi if this file exists.

Create a directory outside your cgi-bin directory and copy all the remaining 
files and subdirectories there. For example, you could create a 
/cgi-script/csPassword and place the files there.

Edit the above variables (or manually edit setup.cgi) to the following:
$cgiurl = URL to the csPassword directory INSIDE 
          your cgi-bin directory (where the script is installed).
$cgipath = FULL PATH to the csPassword directory INSIDE your cgi-bin 
           directory (where the script is installed).
$rooturl = Full URL to your website
$rootpath = Full PATH to your website directory
ADD THE FOLLOWING VARIABLES TO THE ABOVE CONFIGURATION OR MANUALLY EDIT setup.cgi:
$htmlurl =  FULL URL to the csPassword directory OUTSIDE your cgi-bin 
            directory (where the remaining files where installed) 
$htmlpath = FULL PATH to the csPassword directory OUTSIDE your cgi-bin 
            directory (where the remaining files where installed)
            
For Example, your new setup.cgi file might look something like this:
$cgiurl='http://www.cgiscript.net/cgi-bin/csPassword';
$cgipath='/www/vhosts/cgiscript.net/cgi-bin/csPassword';
$rooturl='http://www.cgiscript.net';
$rootpath='/www/vhosts/cgiscript.net';
$htmlurl='http://www.cgiscript.net/cgi-script/csPassword';
$htmlpath='/www/vhosts/cgiscript.net/cgi-script/csPassword';
$username='myusername';
$password=',mypassword';
1;

(note: the '1' at the end is to prevent errors from perl if $password was left empty)


Password Protecting Directories:

1. Enter the URL of csPassword.cgi in your webbrowser. Enter your
   username and password configured with the $username and $password variables.

2. Click 'Create New Access File'

3. Enter a title for the protected area. This will appear in the 'Realm' of the popup 
   window that will prompt for the username and password in the client's webbrowser.

4. Either manually enter a path in the 'Identify Directory to Protect' field or
   press the 'browse' button. If you press the browse button, navigate to the directory
   that you want to protect, click the radio button next to it, and then select
   'set directory and return' in the action dropdown. If you manually type in a path,
   click the 'refresh' button.

5. Enter the usernames and passwords for who you want to give access to this directory.
   Enter each combination on a new line. Separate the usernames and passwords with a
   colon. 
   
7. Click 'Submit' when you are finished.

Managing Protected Areas.
Once you have a protection specified in the database, you can edit or delete. 

--------
If you have any comments, questions, concerns or new script ideas go 
to http://www.cgiscript.net and submit Contact Form. Installation 
is available.

This is only one of many cool scripts we have, check 
out http://www.cgiscript.net

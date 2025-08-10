#####################################################################
#                                                                   #
#    Copyright © 1999-2001 CGISCRIPTS.NET - All Rights Reserved     #
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
# you and CGISCRIPTS.NET. You should carefully read the following 
# terms and conditions before installing or using this software.  
# Unless you have a different license agreement obtained from 
# CGISCRIPTS.NET, installation or use of this software indicates 
# your acceptance of the license and warranty limitation terms
# contained in this Agreement. If you do not agree to the terms of this
# Agreement, promptly delete and destroy all copies of the Software.
#
# Versions of the Software 
# Only one copy of the registered version of CGISCRIPTS.NET 
# may used on one web site.
# 
# License to Redistribute
# Distributing the software and/or documentation with other products
# (commercial or otherwise) or by other than electronic means without
# CGISCRIPTS.NET's prior written permission is forbidden.
# All rights to the CGISCRIPTS.NET software and documentation not expressly
# granted under this Agreement are reserved to CGISCRIPTS.NET.
#
# Disclaimer of Warranty
# THIS SOFTWARE AND ACCOMPANYING DOCUMENTATION ARE PROVIDED "AS IS" AND
# WITHOUT WARRANTIES AS TO PERFORMANCE OF MERCHANTABILITY OR ANY OTHER
# WARRANTIES WHETHER EXPRESSED OR IMPLIED.   BECAUSE OF THE VARIOUS HARDWARE
# AND SOFTWARE ENVIRONMENTS INTO WHICH CGISCRIPTS.NET MAY BE USED, NO WARRANTY 
# OF FITNESS FOR A PARTICULAR PURPOSE IS OFFERED.  THE USER MUST ASSUME THE
# ENTIRE RISK OF USING THIS PROGRAM.  ANY LIABILITY OF CGISCRIPTS.NET WILL BE
# LIMITED EXCLUSIVELY TO PRODUCT REPLACEMENT OR REFUND OF PURCHASE PRICE.
# IN NO CASE SHALL CGISCRIPTS.NET BE LIABLE FOR ANY INCIDENTAL, SPECIAL OR
# CONSEQUENTIAL DAMAGES OR LOSS, INCLUDING, WITHOUT LIMITATION, LOST PROFITS
# OR THE INABILITY TO USE EQUIPMENT OR ACCESS DATA, WHETHER SUCH DAMAGES ARE
# BASED UPON A BREACH OF EXPRESS OR IMPLIED WARRANTIES, BREACH OF CONTRACT,
# NEGLIGENCE, STRICT TORT, OR ANY OTHER LEGAL THEORY. THIS IS TRUE EVEN IF
# CGISCRIPTS.NET IS ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. IN NO CASE WILL
# CGISCRIPTS.NET' LIABILITY EXCEED THE AMOUNT OF THE LICENSE FEE ACTUALLY PAID
# BY LICENSEE TO CGISCRIPTS.NET.
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

Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. The ability to run perl scripts outside your cgi-bin directory.

Installation and Instructions:

1. Unzip the file and transfer to your server with the following
   directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/CSFileshare <-- CSFileshare directory
   /cgi-script/CSFileshare/images <-- image directory for script.
   /cgi-script/CSFileshare/data <-- directory containing drive information. 
   /cgi-script/CSFileshare/desc <-- directory containing file descriptions.
   /cgi-script/CSFileshare/drives <-- directory containing the actual uploaded files.
   /cgi-script/CSFileshare/owner <-- directory containing file ownershiop.

  CSFileshare should be located at 
  [root url]/cgi-script/CSFileshare/CSFileshare.cgi where [root url]
  is the URL to your website. Example:
  http://www.mycompany.com/cgi-script/CSFileshare/CSFileshare.cgi

2. Chmod CSFileshare.cgi to executable (chmod 755)
   Ask your server administrator for assistance if required.

3. If your perl executable is not located at /usr/bin/perl, edit
   the first line of CSFileshare.cgi to reflect the true location.

4. Edit the following variables in the file setup.cgi (descriptions below):

   $cgiurl = 'http://www.cgiscript.net/cgi-script/CSFileshare/CSFileshare.cgi';
   $rooturl = 'http://www.cgiscript.net/cgi-script/CSFileshare/'; 
   $rootpath = '/www/vhosts/cgiscript.net/cgi-script/CSFileshare/';
   
   $cgiurl is the URL of CSFileshare
  (ex. http://www.cgiscript.net/cgi-script/CSFileshare/CSFileshare.cgi).
   
   $rooturl is the root URL directory of CSFileshare.
   (ex. http://www.cgiscript.net/cgi-script/CSFileshare/).
   Make sure you add trailing forward slash '/' to end of this variable
   
   $rootpath is the path to the root directory of CSFileshare
  (ex. /home/httpd/html/mycompany/cgi-script/CSFileshare/).
   Make sure you add a trailing forward slash '/' to the end of this variable.


5. Edit the file users.dat for the main admin's username and password. The file is 
   a colon separated database. The first field is the login, the second is the 
   password and the third is the security level. There are 2 security levels: 'user'
   and 'admin'. A login with 'admin' privileges will have access to the
   CSFileshare control panel to add, configure, edit, and delete shared drives. A
   sample users.dat file is provided with the default admin login as 'admin' and default
   password is 'password'.

   If the configuration variable $anonupload is set to '1', no password or username is
   required to use CSFileshare.

   If the configuration variable $anonupload is set to '0', usernames and passwords from
   users.dat are required.

6. Go to [root url]/cgi-script/CSFileshare/CSFileshare.cgi and click on management.You'll be 
   asked for your admin username and password. Enter those and click on the management icon 
   again once the page refreshes.


7. Click 'Add a Drive'.
   Enter the name, short description, file type limits, quotas, and autopurge date. Click
   Submit when you are finished. Now you have a Shared drive.


8. Click 'Go Home'.
   This will take you back to the main page of CSFileshare where you should now see your
   shared drive. Click on the drive to enter.

If you have any comments, questions, concerns or new script ideas go to http://www.cgiscript.net 
and submit Contact Form. Installation is available.

This is only one of many cool scripts we have, check out http://www.cgiscript.net
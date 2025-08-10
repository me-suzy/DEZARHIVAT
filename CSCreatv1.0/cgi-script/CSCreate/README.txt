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
Create, Edit and Manage web pages using your web browser!

CSCreate allows you to cruise your server directories to select the
file you want to edit. It also allows you to create new files on 
the fly. Directory creation is also possible for the users 
convenience. Other powerful features you have come to expect 
from CGI Script.net:

   * Online ASCII editor to make it easy to modify your files.
   * Create feature adds all basic HTML data to the file by default.
     (METADATA, Title, Head, etc.)
   * Easy to use web based management system.
   * Files are listed in one location for easy retrieval.
   * Delete file permanently or simply remove them from the
     CSCreate list.

Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. The ability to run perl scripts outside your cgi-bin directory.
4. The webserver must be able to write and edit files in your directory.

Installation:

1. Unzip the file and transfer to your server with the following
   directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/CSCreate <-- CSCreate directory
   /cgi-script/CSCreate/images <-- image directory.


  CSCreate.cgi should be located at 
  [root url]/cgi-script/CSCreate/CSCreate.cgi where [root url]
  is the URL to your website. Example:
  http://www.mycompany.com/cgi-script/CSCreate/CSCreate.cgi

2. Chmod CSCreate.cgi to executable (chmod 755)
   Ask your server administrator for assistance if required.

3. If your perl executable is not located at /usr/bin/perl, edit
   the first line of CSCreate.cgi to reflect the true location.

4. Edit the following variables in the file setup.cgi (descriptions below):

$cgiurl = 'http://www.yoursite.net/cgi-script/CSCreate/CSCreate.cgi'; #<--URL of this script
$rooturl = 'http://www.yoursite.net/'; #<-- URL of your site
$cgipath = '/www/vhosts/yoursite.net/'; #<-- path to your root directory
$makebackups=1;
$username = 'demo';
$password = 'demo';

$cgiurl is the URL to CSCreate.cgi

$cgirootpath is the path to the CSCreate directory.

$rooturl is the base URL you will be creating and editing the pages for.

$cgipath is the path to the directory where you will be creating and
editing the pages.

$makebackups controls whether or not to make a backup when a file is edited
or deleted. If set to '1' a backup is made. If set to '0' then no backups are
made. Backups are saved in the format file.ext.backup. For example, the backup
to index.html would be index.html.backup.

$username and $password controls the access to CSCreate.


Instructions.
1. Go to [$cgiurl]/CSCreate.cgi where [$cgiurl] is the URL to the CSCreate
   directory. Enter your username and password.
   
2. This will take you to a list of files that you will be managing. At first,
   this list is empty since you haven't tagged or created any files for
   management.

3. To create a new page, click the "Create New Page" button. Browse to the directory
   where you want to new page to exist. Click the dropdown menu and choose the
   option to create a new file. Enter a filename (ex. index.htm) and a title for the
   page. This will create a blank page and take you back to the list. You should
   see this file in the list now. To change the contents of this file, click the
   edit button.
   
4. To import an existing file so you can edit it, click the 'Import Exising Page'
   button. Navigate to the file you want to import. Click the radio button
   next to the file. Click the dropdown menu and select 'Import a File'. The file 
   will now appear in the list. To edit this file, click the appropriate edit 
   button next to the file.


--------
If you have any comments, questions, concerns or new script ideas go 
to http://www.cgiscript.net and submit Contact Form. Installation 
is available.

This is only one of many cool scripts we have, check 
out http://www.cgiscript.net
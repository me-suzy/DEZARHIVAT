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

Description:
csFiler is an all purpose file manager for managing your website
through a browser instead of ftp. You can: create directories,
upload files, change permissions and more!

Manage your entire server using your web browser. 
Administer your web pages from your web browser. 
Lists all files/directories in a directory. 
Move through your entire server one directory at a time. 
Editing text or HTML files or create new files or directories. 
Upload binary or ASCII (text) files. 
Change file permissions (CHMOD). 
Deleting files or rename files. 

Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. The ability to run perl scripts outside your cgi-bin directory.
4. (optional) The ability to run server side includes (SSI)
5. Your webserver must be able to read, write, and
   modify the files in your website's directory.

Installation:

1. Unzip the file and transfer to your server with the following
   directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/CSFiler <-- CSFiler directory
   /cgi-script/CSFiler/images <-- images directory.

  CSFiler.cgi should be located at 
  [root url]/cgi-script/CSFiler/CSFiler.cgi where [root url]
  is the URL to your website. Example:
  http://www.mycompany.com/cgi-script/CSFiler/CSFiler.cgi

2. Chmod CSFiler.cgi to executable (chmod 755)
   Ask your server administrator for assistance if required.

3. If your perl executable is not located at /usr/bin/perl, edit
   the first line of CSFiler.cgi to reflect the true location.

4. Edit the following variables in the file setup.cgi (descriptions below):
$cgipath = "/www/vhosts/cgiscript.net/cgi-script/CSFiler/";
   #
   #---> path to CSFiler directory. Add trailing '/'
   #
$cgiurl = "http://www.cgiscript.net/cgi-script/CSFiler/";
   #
   #---> URL to CSFiler directory. Add trailing '/'
   #     NOTE: DO NOT add CSFiler.cgi to the $cgiurl variable
   #
$rootdir = '/www/vhosts/cgiscript.net';
   #
   #---> startup directory for CSFiler. Leave off trailing '/'
   #
$paranoid = 1;
   #
   #--->0 = Delete directories and entire contents
   #--->1 = Only Delete emply directories
   #
$username='demo';
   #
   #---> Username to enter CSFiler
   #
$password='demo';
   #
   #---> Password to enter CSFiler
   #
   
$cgipath is the real path to the CSFiler directory.

$cgiurl is the URL to the CSFiler directory. This should not be
set to the full URL to CSFiler.cgi. It should be set to the directory
where CSFiler is installed. For example, if the URL to CSFiler.cgi is
http://www.cgiscript.net/cgi-script/CSFiler/CSFiler.cgi
then this variable should be set to
http://www.cgiscript.net/cgi-script/CSFiler/

$rootdir is the directory where CSFiler starts. This should be the
root directory of your website.

The paranoid variable controls how directories are deleted. If its set to '1',
only empty directories will be deleted. If its set to '0', the 
directory and ALL of its contents will be deleted.

$username is the username to operate CSFiler.

$password is the password to operate CSFiler.

Instructions:

Go to:
[cgiurl]/CSFiler.cgi where cgiurl is the variable you set above. Example,
http://www.cgiscript.net/cgi-script/CSFiler/CSFiler.cgi

The dropdown menu at both the top and the bottom of the directory
listing contains the various functions available to CSFiler. If the
particular function makes an action on a file or directory, click
the radio button next to the appropriate file then click the drop down
to the function you wish to perform.

--------
If you have any comments, questions, concerns or new script ideas go 
to http://www.cgiscript.net and submit Contact Form. Installation 
is available.

This is only one of many cool scripts we have, check 
out http://www.cgiscript.net
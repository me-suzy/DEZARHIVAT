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
csUpload is an automated script that allows the user to upload files 
to your server and have them automatically added to an HTML file for 
viewing from a web site.

* Create multiple pages/sets of file uploads. 
* Upload files and add descriptions that act as links to that file. 
* Add, Modify, Delete links to the files from an easy to understand 
  management page. 
* HTML files use template files that can be modified to match your web site. 
* All style settings are adjusted using a web based interface. 
* Include code added to management page for easy reference. 
* This script really saves time, check it out. 
* Advanced security settings for administration.


Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. The ability to run perl scripts outside your cgi-bin directory.
4. (optional) The ability to run server side includes (SSI)

Installation:

1. Unzip the file and transfer to your server with the following
   directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/CSUpload <-- CSUpload directory
   /cgi-script/CSUpload/upload <-- contains the upload documents.
   /cgi-script/CSUpload/images <-- images directory.

  CSUpload.cgi should be located at 
  [root url]/cgi-script/CSUpload/CSUpload.cgi where [root url]
  is the URL to your website. Example:
  http://www.mycompany.com/cgi-script/CSUpload/CSUpload.cgi

2. Chmod CSUpload.cgi to executable (chmod 755)
   Ask your server administrator for assistance if required.

3. If your perl executable is not located at /usr/bin/perl, edit
   the first line of CSUpload.cgi to reflect the true location.

4. Edit the following variables in the file setup.cgi (descriptions below):
     $cgiurl = "http://www.cgiscript.net/cgi-script/CSUpload/CSUpload.cgi";
     $cgipath = "/www/vhosts/cgiscript.net/cgi-script/CSUpload/";
     $username='demo';
     $password='demo';

   $cgiurl is the URL to CSUpload.cgi

   $cgipath is the full path the CSUpload.cgi directory (don't forget to 
   add a trailing '/')

   $username and $password are used to enter the control panel as the
   main admin.

Instructions:

Creating Upload Databases
1. Go to [root url]/CSUpload.cgi where [root url] is the location of the script. 
   Example:
   http://www.cgiscript.net/cgi-script/CSUpload/CSUpload.cgi

2. Click the 'login' button.

3. Enter the username and password that were configured with the $username 
   and $password variables in setup.cgi. The default is demo/demo

4. At this point, you can either use the default upload database or 
   create a new database. 

5. You can click the 'advance settings/security' button to fine tune the
   appearance and functionality of the upload database. You can also
   specify usernames and passwords that have the ablity to manage that
   particular database.


Displaying Upload Databases

There are many different options for displaying the various upload databases
and individual upload items. The easiest approach is to go directly to the URL
for CSUpload.cgi. This will give you a simple index, along with a link to 
login and manage a particular upload database.

To display the main index for an individual upload database:

1. When you are in the management screen for a particular upload database,
   clicking the 'Master Links' button will give you the code for a 
   direct link to the upload index and the server side include (SSI)
   code for the same view.

To display an individual upload item within an upload database:

1. When you are in the management screen for a particular upload database,
   clicking the 'Direct Links' button next to the item will give 
   you the code for a direct link to the item and the server side
   include (SSI) code for the same view.

In addition to displaying an individual upload item, you can display its
full page by adding ',FULL' at the end of the url. Example:
http://www.cgiscript.net/cgi-script/CSUpload/CSUpload.cgi?database=test%2edb&command=viewnews&id=2,FULL

This would display the full page view for the item with id='2' in the test
upload database.

To display the first item in the list:

1. When you are in the management screen for a particular upload database,
   clicking the 'First Links' button next to the item will give 
   you the code for a direct link to the first upload item of the list and
   the server side include (SSI) code for the same view.

Displaying the first item of the list is useful for having an upload item
displayed on your page that is updated on a regular basis. As you add 
items, they become the first one on the list moving the previous first 
one down. The index view of the upload database could then be used as 
an archive. 


Note: If you have the 'allow public upload' option checked in the
advanced settings of the upload database, a button will appear at
the bottom of the upload index page that allows the public to upload
files. This feature only appears if the 'allow public upload' box 
is checked.

--------
If you have any comments, questions, concerns or new script ideas go 
to http://www.cgiscript.net and submit Contact Form. Installation 
is available.

This is only one of many cool scripts we have, check 
out http://www.cgiscript.net
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

CSIncludes is a content management system to easily manage the server
side includes on your website. Many professionals use server side
includes on their websites for content that is the same from page to page
or changes on a regular basis. Server side includes allows you
to have one copy and distribute it among many pages, making it much easier
to manage. CSIncludes allows you to easily add, modify, and delete the 
contents of your server side includes (SSI).

Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. The ability to run perl scripts outside your cgi-bin directory.
4. The ability to run server side includes (SSI)

Installation:

1. Unzip the file and transfer to your server with the following
   directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/CSIncludes <-- CSIncludes directory
   /cgi-script/CSIncludes/images <-- image directory.

  CSIncludes.cgi should be located at 
  [root url]/cgi-script/CSIncludes/CSIncludes.cgi where [root url]
  is the URL to your website. Example:
  http://www.mycompany.com/cgi-script/CSIncludes/CSIncludes.cgi

2. Chmod CSIncludes.cgi to executable (chmod 755)
   Ask your server administrator for assistance if required.

3. If your perl executable is not located at /usr/bin/perl, edit
   the first line of CSIncludes.cgi to reflect the true location.

4. Edit the following variables in the file setup.cgi (descriptions below):
   $cgiurl = 'http://www.cgiscript.net/cgi-script/CSIncludes/CSIncludes.cgi'; #<--script URL
   $cgipath = "/www/vhosts/cgiscript.net/cgi-script/CSIncludes/"; #<-- path to directory
   $username = 'demo';
   $password = 'demo';

   $cgiurl is the URL to CSIncludes.cgi

   $basedir is the full path the CSIncludes.cgi (don't forget to add a trailing '/')

   $username and $password are used to enter the control panel.

Instructions:

Creating New Includes
1. Go to [$cgiurl]?command=manage where [$cgiurl] is the URL of CSIncludes.cgi. Enter your
   username and password configured with the $username and $password variables.

2. Click 'Create New Include'

3. Enter an identifier and description for the include. The identifier should contain 
   alphanumeric characters and no spaces.

4. Enter your content for the include in the text area. If your text contains html, wrap the entire
   block of text with <html> </html>. Example:
  <html>
  <h1>This page contains html<hr></h1>
  </html>

7. Click 'Save' when you are finished.

Managing Includes.
Once you have an include entered in the database, you can edit, delete, or view it. To see your
include in action, click the 'view' link.

Displaying Includes.
The SSI code is shown on the management screen for each include. The basic format is:
<!--#include virtual="[$cgiurl]?id=[identifier]"-->
where [$cgiurl] is the URL to CSIncludes.cgi WITHOUT http://www.domain.com and identifier 
is the identifier you configured when you create the include. Example:
<!--#include virtual="/cgi-script/CSIncludes/CSIncludes.cgi?id=test"-->


--------
If you have any comments, questions, concerns or new script ideas go 
to http://www.cgiscript.net and submit Contact Form. Installation 
is available.

This is only one of many cool scripts we have, check 
out http://www.cgiscript.net

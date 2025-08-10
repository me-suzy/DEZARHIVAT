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

CSRandomText is a content management system for displaying blocks of 
text (or html) in random order, in true order, or refreshed every
'n' days. Uses include random display of customer kudos, joke of the 
day, recipe of the day, tip of the week, etc. It can also be used to 
display banners or other images in random order.

Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. The ability to run perl scripts outside your cgi-bin directory.
4. The ability to run server side includes (SSI)

Installation:

1. Unzip the file and transfer to your server with the following
   directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/CSRandomText <-- CSRandomText directory
   /cgi-script/CSRandomText/images <-- image directory.

  CSRandomText.cgi should be located at 
  [root url]/cgi-script/CSRandomText/CSRandomText.cgi where [root url]
  is the URL to your website. Example:
  http://www.mycompany.com/cgi-script/CSRandomText/CSRandomText.cgi
  Note: Following this URL will give a blank page. This is normal.

2. Chmod CSRandomText.cgi to executable (chmod 755)
   Ask your server administrator for assistance if required.

3. If your perl executable is not located at /usr/bin/perl, edit
   the first line of CSRandomText.cgi to reflect the true location.

4. Edit the following variables (descriptions below):
   $cgiurl = 'http://www.cgiscript.net/cgi-script/CSRandomText/CSRandomText.cgi'; #<--script URL
   $cgipath = "/www/vhosts/cgiscript.net/cgi-script/CSRandomText/"; #<-- path to directory
   $username = 'demo';
   $password = 'demo';

   $cgiurl is the URL to CSRandomText.cgi

   $basedir is the full path the CSRandomText.cgi (don't forget to add a trailing '/')

   $username and $password are used to enter the control panel.

Instructions:

Creating Random Text Blocks
1. Go to [$cgiurl]?command=manage where [$cgiurl] is the URL of CSRandomText.cgi. Enter your
   username and password configured with the $username and $password variables.

2. Click 'Add New Random Text Block'

3. Enter and identifier and description for the new block. The identifier should contain 
   alphanumeric characters and no spaces.

4. Enter your block of text if the text area and indicate if it contains html. Each block of text is
   separated by '###' all on a line by itself. For example:
  
   Random block number 1
   ###
   Random block number 2
   ###
   Random block number 3

   would create 3 random lines.

5. Select the display order. If sequential order is selected, the text will be display in the order
   they are listed. In the above example, 'Random block number 1' would be listed first and followed by
   'Random block number 2' and then 'Random block number 3'.

6. Select the refresh rate. This can be either each visit or every 'n' days. Something that you want to
   change only once a week should be set for a refresh rate of every 7 days. If you want the visitor
   to see a new block of text each time they visit the site or hit their refresh button, select
   'Each Visit'

7. Click 'Save' when you are finished.

NOTE: If you set a block as sequential order, then you can only place one of those blocks
on a page. If you need to have 2 sequential ordered blocks on the same page, then create
2 different blocks (the contents of the blocks can be identical) and call them accordingly.
If you set the block as random display, then you can call as many of them on the same 
page as you want.

Managing Random Text Blocks.
Once you have a block of text entered in the database, you can edit, delete, or view it. To see your
block in action, click the 'view' link and then right click the refresh the page. Depending on how you
have this particular block configured, you should see the text change accordinly.


Displaying Random Text Blocks.
The SSI code is show on the management screen for each block. The basic format is:
<!--#include virtual="[$cgiurl]?id=[identifier]"-->
where [$cgiurl] is the URL to CSRandomText.cgi WITHOUT http://www.domain.com
and identifier is the identifier you configured when you create the new block.
Example:
<!--#include virtual="/cgi-script/CSRandomText/CSRandomText.cgi?id=[identifier]"-->


--------
If you have any comments, questions, concerns or new script ideas go 
to http://www.cgiscript.net and submit Contact Form. Installation 
is available.

This is only one of many cool scripts we have, check 
out http://www.cgiscript.net

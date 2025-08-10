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
Update and maintain news items on your web site with this full-featured
and flexible news updating script. Includes support for unlimited users,
easy web-based administration and configuration. 

Features include: 
Unlimited users
Add, modify, delete news items
Many ways to view the news, SSI, popup window, etc.
Easy to modify template files
Easily inigrated into your web site
Easy web based administration
Change the order of the archives list display
You can use HTML is news articles
Too many to list 
Uses for this script:
Post press releases
List latest site revisions
What's New listing
List series of articles
Virtually anything you need to list and link to

Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. The ability to run perl scripts outside your cgi-bin directory.
4. (optional) The ability to run server side includes (SSI)

Installation:

1. Unzip the file and transfer to your server with the following
   directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/CSNews <-- CSNews directory
   /cgi-script/CSNews/newsdir <-- contains the bodies of news items directory.
   /cgi-script/CSNews/images <-- images directory.

  CSNews.cgi should be located at 
  [root url]/cgi-script/CSNews/CSnews.cgi where [root url]
  is the URL to your website. Example:
  http://www.mycompany.com/cgi-script/CSNews/CSNews.cgi

2. Chmod CSNews.cgi to executable (chmod 755)
   Ask your server administrator for assistance if required.

3. If your perl executable is not located at /usr/bin/perl, edit
   the first line of CSNews.cgi to reflect the true location.

4. Edit the following variables in the file setup.cgi (descriptions below):
     $cgiurl = "http://www.cgiscript.net/cgi-script/CSNews/CSNews.cgi";
     $cgipath = "/www/vhosts/cgiscript.net/cgi-script/CSNews/";
     $username='demo';
     $password='demo';

   $cgiurl is the URL to CSNews.cgi

   $cgipath is the full path the CSNews.cgi directory (don't forget to 
   add a trailing '/')

   $username and $password are used to enter the control panel as the
   main admin.

Instructions:

Creating News Databases
1. Go to [root url]/CSNews.cgi where [root url] is the location of the script. 
   Example:
   http://www.cgiscript.net/cgi-script/CSNews/CSNews.cgi

2. Click the 'login' button.

3. Enter the username and password that were configured with the $username 
   and $password variables in setup.cgi. The default is demo/demo

4. At this point, you can either use the default news database or 
   create a new database. 

5. You can click the 'advance settings/security' button to fine tune the
   appearance and functionality of this news databases. You can also
   specify usernames and passwords that have the ablity to manage that
   particular database.


Displaying News Databases

There are many different options for displaying the various news databases
and individual news items. The easiest approach is to go directly to the URL
for CSNews.cgi. This will give you a simple index, along with a link to 
login and manage a particular news database.

To display the main index for an individual news database:

1. When you are in the management screen for a particular news database,
   clicking the 'Master Links' button will give you the code for a 
   direct link to the news index and the server side include (SSI)
   code for the same view.

To display an individual news item within a news database:

1. When you are in the management screen for a particular news database,
   clicking the 'Direct Links' button next to the news item will give 
   you the code for a direct link to the news item and the server side
   include (SSI) code for the same view.

In addition to displaying an individual news item, you can display its
full page by adding ',FULL' at the end of the url. Example:
http://www.cgiscript.net/cgi-script/CSNews/CSNews.cgi?database=test%2edb&command=viewnews&id=1,FULL

This would display the full page view for the news item with id='1'

To display the first item in the list:

1. When you are in the management screen for a particular news database,
   clicking the 'First Links' button next to the news item will give 
   you the code for a direct link to the first news item of the list and
   the server side include (SSI) code for the same view.

Displaying the first item of the list is useful for having a news item
displayed on your page that is updated on a regular basis. One example
would be 'news of the week'. The news item that is the first one in
the list would be displayed. As you add new items, they become the first
one on the list moving the previous first one down. The index view of the
news database could then be used as an archive. 

--------
If you have any comments, questions, concerns or new script ideas go 
to http://www.cgiscript.net and submit Contact Form. Installation 
is available.

This is only one of many cool scripts we have, check 
out http://www.cgiscript.net
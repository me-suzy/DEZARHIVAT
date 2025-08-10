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

CSLinks is a management system for displaying links on
your website.

Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. The ability to run perl scripts outside your cgi-bin directory.
4. (optional) The ability to run server side includes (SSI)

Installation:

1. Unzip the file and transfer to your server with the following
   directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/CSLinks <-- CSLinks directory
   

  CSLinks.cgi should be located at 
  [root url]/cgi-script/CSLinks/CSLinks.cgi where [root url]
  is the URL to your website. Example:
  http://www.mycompany.com/cgi-script/CSLinks/CSLinks.cgi
  (note: following this URL should give a blank page. This is normal.)

2. Chmod CSLinks.cgi to executable (chmod 755)
   Ask your server administrator for assistance if required.

3. If your perl executable is not located at /usr/bin/perl, edit
   the first line of CSLinks.cgi to reflect the true location.

4. Edit the following variables in the file setup.cgi (descriptions below):
   $cgiurl = 'http://www.cgiscript.net/cgi-script/CSLinks/CSLinks.cgi';
   $cgipath = '/www/vhosts/cgiscript.net/cgi-script/CSLinks/'; #<-- path to scrip dir.. Add trailing '/'
   $username = 'demo';
   $password = 'demo';

   $cgiurl is the URL to CSLinks.cgi

   $basedir is the full path the CSLinks.cgi (don't forget to add a trailing '/')

   $username and $password are used to enter the control panel.

Instructions:

Adding/Managing Links
1. Go to [$cgiurl]?command=manage where [$cgiurl] is the URL of CSLinks.cgi. Enter your
   username and password configured with the $username and $password variables.

2. Enter a description for the link and the link itself to the form. Hit the 'Add this Link'
   button when you are finished, the newly added link should now be displayed in the lower
   portion of the management page.

3. Once you have a link in the database, you can modify or delete it.

Displaying Links.
You can display the links with either server side include code (SSI) or a direct link.
  SSI:
    The SSI code is shown on the management screen for CSLinks. The format is:
    <!--#include virtual="[$cgiurl]?command=view"-->
    where [$cgiurl] is the URL to CSLinks.cgi WITHOUT http://www.yourdomainname.com
    Example:
    <!--#include virtual="/cgi-script/CSLinks/CSLinks.cgi?command=view"-->
  Direct Link:
    The direct link is also shown on the management screen. The format is:
    http://[$cgiurl]/cgi-script/CSLinks/CSLinks.cgi?command=view
    where [$cgiurl] is the  URL of your website.

Modifying the Display
The output of CSLinks is controlled by the file t_links.htm. in(linkdesc) is replaced
by the link description and in(link) is replaced by the link for each record in the
database. Examine the t_links.htm file for an example of how to create your own template
by modifying the t_links.htm file.

--------
If you have any comments, questions, concerns or new script ideas go 
to http://www.cgiscript.net and submit Contact Form. Installation 
is available.

This is only one of many cool scripts we have, check 
out http://www.cgiscript.net

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
csMailto is an automated script that allows the user to build and
manage multiple mailto forms within a web site. Build your own mailto
forms without having to learn Perl.

* Manage all your web site CGI mailto forms from one location. 
* Easy to use management screen. 
* Build your own mailto forms without having to learn Perl. 
* Choose from a pre-determined list of fields or create any
  number of your own fields: 
    Text Area 
    Drop Down 
    Text Box 
    Check Box Lists 
    Radio Lists 
* Add, Modify, Delete and even View your forms from one easy to understand
* management screen. 
* Include code added to management page for easy reference. 
* Allow users to send email attachments from the form.
* Advanced autoresponse configuration which has an option for file attachments.


Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. The ability to run perl scripts outside your cgi-bin directory.
4. (optional) The ability to run server side includes (SSI)

Installation:

1. Unzip the file and transfer to your server with the following
   directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/CSMailto <-- CSMailto directory
   /cgi-script/CSMailto/attach <-- contains the uploaded attachments.
   /cgi-script/CSMailto/export <-- export file directory.
   /cgi-script/CSMailto/forms <-- forms directory.

  CSMailto.cgi should be located at 
  [root url]/cgi-script/CSMailto/CSMailto.cgi where [root url]
  is the URL to your website. Example:
  http://www.mycompany.com/cgi-script/CSMailto/CSMailto.cgi

2. Chmod CSMailto.cgi to executable (chmod 755)
   Ask your server administrator for assistance if required.

3. If your perl executable is not located at /usr/bin/perl, edit
   the first line of CSMailto.cgi to reflect the true location.

4. Edit the following variables in the file setup.cgi (descriptions below):
     $cgipath = '/www/vhosts/cgiscript.net/cgi-script/CSMailto/';
     $cgiurl = 'http://www.cgiscript.net/cgi-script/CSMailto/';
     $sendmail = '/usr/sbin/sendmail';
     $username = 'demo';
     $password = 'demo';

$cgipath is the path the the CSMailto DIRECTORY.

$cgiurl is the URL to the CSMailto DIRECTORY.

$sendmail is the path to your sendmail program.

$username and $password are used to gain access to the control panel.

Instructions:

Creating A New Form.
1. Go to [$cgiurl]/CSMailto.cgi where [$cgiurl] is the URL to the CSMailto
   directory. Enter your username and password.
   
2. Click the 'Create New Form' button at the top. Select the options and 
   fields for this form. There are many options available and instructions
   are on the page for each section.

3. Click the 'Create Form' button at the bottom of the page when finished. 
   The form should now appear in the management list. You can delete,
   modify, or test each form. There is also a popup window for each form
   to show the different urls to place the form on your website.


Displaying Forms.

The most affective way to place the forms on your website is to use server 
side includes. If you click the 'view' link next to the form name on the
form list, it will give you an example of the server side include code 
used to display the form. You would cut/paste this url directly into the
html page you want the form to appear. The 'Grab' button on the links popup
window will hightlight the text to make it easier to copy. Click 'Grab', go
to edit->copy on your browser, and then go to edit->paste in your html
page where you want the form to appear.

There is also a direct link to the form shown from the 'view' popup window
on the management page.

--------
If you have any comments, questions, concerns or new script ideas go 
to http://www.cgiscript.net and submit Contact Form. Installation 
is available.

This is only one of many cool scripts we have, check 
out http://www.cgiscript.net
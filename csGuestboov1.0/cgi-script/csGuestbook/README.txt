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

csGuestbook is an automated script that allows the user to manage one
or more guestbooks from one location.

* Add, Modify, Delete and even View your Guestbook(s) from one easy to
  understand management screen.  
* Option to automatically purge guestbook entries after so many days.
* Option to Approve messages before they are posted to the guestbook.
* Email notification of new entries.
* Add/Modify/Delete Guestbook entries. 
* Advanced style editing allows you to change the look and feel as often
  as desired.
* Template capabilities that make it easier than ever to incorporate
  a guestbook into your website site.
* Each Guestbook can have a look of it's own. 


Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. Your web server must have write capabilities to the installed directory.


Installation:

Unzip the file and transfer to your server with the following
directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/csGuestbook<-- csGuestbookdirectory
   /cgi-script/csGuestbook/lists <-- contains the export files.
   /cgi-script/csGuestbook/images <-- images directory.

  csGuestbook.cgi should be located at 
  [root url]/cgi-script/csGuestbook/csGuestbook.cgi where [root url]
  is the URL to your website. Example:
  http://www.mycompany.com/cgi-script/csGuestbook/csGuestbook.cgi

Chmod csGuestbook.cgi to executable (chmod 755)
Ask your server administrator for assistance if required.

If your perl executable is not located at /usr/bin/perl, edit
the first line of csGuestbook.cgi to reflect the true location.

View the script with your webbrowser.
Example:
http://www.cgiscript.net/cgi-script/csGuestbook/csGuestbook.cgi
   
This will bring up an editing window with the current configuration
file. Definition of the variables are as follows:
      
   $cgiurl = Full URL to the csGuestbook DIRECTORY
   $cgipath = Full PATH to the csGuestbook DIRECTORY
   $username = username to enter management screens
   $password = password to enter management screens
   $sendmail = full path to your sendmail program


Normal Installation Instructions:

In most cases, the script is configured automatically. Change the $username and
$password variables to your liking and click 'Save'. If the setup portion
of the script cannot find your site's variables automatically, you will might
have to enter those in the editing window.

CGI-BIN Installation Instructions:

If your hosting service will not let your run scripts outside your cgi-bin
directory, then follow these procedures:

Copy all the *.cgi files to a directory in your cgi-bin directory, making
sure they are chmod'd to 755. For example, you could create a
/cgi-bin/csGuestbook/ directory and place csGuestbook.cgi, libs.cgi, and
setup.cgi if this file exists.

Create a directory outside your cgi-bin directory and copy all the remaining
files and subdirectories there. For example, you could create a
/cgi-script/csGuestbook and place the files there.

Edit the variables (or manually edit setup.cgi) to the following:
$cgiurl = URL to the csGuestbook directory INSIDE your cgi-bin
          directory (where the script is installed).
$cgipath = FULL PATH to the csGuestbook directory INSIDE your cgi-bin
           directory (where the script is installed).
           
ADD THE FOLLOWING VARIABLES TO THE ABOVE CONFIGURATION OR MANUALLY EDIT setup.cgi:

$htmlurl =  FULL URL to the csGuestbook directory OUTSIDE your cgi-bin
            directory (where the remaing files where installed) 
$htmlpath = FULL PATH to the csGuestbook directory OUTSIDE your cgi-bin
            directory (where the remaing files where installed)
            
For Example, your new setup.cgi file might look something like this:

$cgiurl='http://www.cgiscript.net/cgi-bin/csGuestbook';
$cgipath='/www/vhosts/cgiscript.net/cgi-bin/csGuestbook';
$htmlurl='http://www.cgiscript.net/cgi-script/csGuestbook';
$htmlpath='/www/vhosts/cgiscript.net/cgi-script/csGuestbook';
$sendmail='/usr/sbin/sendmail';
$username='myusername';
$password=',mypassword';
1;

(note: the '1' at the end is to prevent errors from perl if $password was left empty)


Instructions:

Creating Guestbooks
1. Go to [root url]/csGuestbook.cgi?command=manage where [root url] is the
   location of the script. 
   Example:
   http://www.cgiscript.net/cgi-script/csGuestbook/csGuestbook.cgi?command=manage

3. Enter the username and password that was configured with the $username 
   and $password variables. The default is demo/demo

4. At this point, you can either use the default guestbook or 
   create a new guestbook. 

5. You can click the 'advance settings' button to fine tune the
   appearance and functionality of this FAQ databases. Additional instructions
   are provided on the advanced settings screens.
   


Displaying Guestbooks

When you are logged into the control panel for the current guestbook, a 
URL is provided to access the guestbook. The appearance of the guestbook
will be determined by your settings in the advanced section of the
guestbook. The most effective way to incorporate a guestbook into your
website is to use a template. Create an html file and add
<!-- CGIScript Me --> where you want the guestbook to appear. All the
href and img settings on your page must an absolute url. Relative URLs
will not work. For example, instead of using 'images/logo.gif', you must
use '/images/logo.gif' (assuming the images folder is in your root directory).
In the advanced settings section for the questbook, there is a field for
template. Upload the template to your server and modify the template field
to reflect the absolution path (NOT url) of the html file.


--------
If you have any comments, questions, concerns or new script ideas go 
to http://www.cgiscript.net and submit Contact Form. Installation 
is available.

This is only one of many cool scripts we have, check 
out http://www.cgiscript.net
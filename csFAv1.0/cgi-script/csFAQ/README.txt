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

csFAQ is an automated system for displaying FAQs (frequently asked
questions) on your website.

Features:

 * Central Administration done through the web browser  
 * Easily create/edit/delete Q&A Categories & Questions 
 * Automated user submission form.
 * Fully configurable Auto-Response
 * Email notification of submission (may be disabled).
 * Icons for each submission (may be disabled).
 * 'Pending' area keep users from submitting to wrong category.
 * Create unlimited categories. 
 * Add unlimited questions and answers.
 * Easily rearrange FAQ's.
 * HTML templates to customize look. 
 * All style settings are adjusted using a web based interface. 
 * Include code added to management page for easy reference. 
 * Advanced security settings for administration.


Requirements:

1. Perl 5.005 or higher.
2. Unix based operating system (Unix, Linux, FreeBSD, etc).
3. The ability to run perl scripts outside your cgi-bin directory.
4. Your webserver must have read/write access to your website's files
   and directories.
5. (optional) The ability to run server side includes (SSI)

Installation:

1. Unzip the file and transfer to your server with the following
   directory structure:
   /cgi-script <-- cgiscript.net script directory
   /cgi-script/csFAQ <-- csFAQ directory
   /cgi-script/csFAQ/FAQdir <-- contains the bodies of FAQ items directory.
   /cgi-script/csFAQ/images <-- images directory.

  csFAQ.cgi should be located at 
  [root url]/cgi-script/csFAQ/CSFAQ.cgi where [root url]
  is the URL to your website. Example:
  http://www.mycompany.com/cgi-script/csFAQ/csFAQ.cgi

2. Chmod csFAQ.cgi to executable (chmod 755)
   Ask your server administrator for assistance if required.

3. If your perl executable is not located at /usr/bin/perl, edit
   the first line of csFAQ.cgi to reflect the true location.

4. Edit the following variables in the file setup.cgi (descriptions below):
     $cgiurl = "http://www.cgiscript.net/cgi-script/csFAQ/csFAQ.cgi";
     $cgipath = "/www/vhosts/cgiscript.net/cgi-script/csFAQ/";
     $sendmail = '/usr/sbin/sendmail';
     $username='demo';
     $password='demo';

   $cgiurl is the URL to csFAQ.cgi

   $cgipath is the full path the csFAQ.cgi directory 
   
   $sendmail is the full path to the sendmail program on your server

   $username and $password are used to enter the control panel as the
   main admin.

Instructions:

The question submit form is called into your site using SSI or you can link
to it directly. The user fills out the form and submits it. An email goes to
the you, the administrator, saying you got a FAQ submission. Email
notifications can be disabled (we have one site that get over 500
submissions a day). The submissions go into a holding area with all pending
FAQ submissions.

You can create as many categories as you want the primary FAQ listing will
show all the categories in one list. When you look at the pending
submissions you MOVE them to the appropriate category and the script places
you into edit mode where you add the appropriate response.

Each submission can have an image representing. You can disable the images
in the advanced features area for each category (thread). After all the
FAQ's are added to categories you can go into management page and edit,
reorder, delete and change the look and feel of any submission or category
thread.

Nothing in our scripts is permanent. All HTML pages are templatized so you
can match the look and feel of your own site easily.

Logging into the control panel:
Go to:
[URL]?command=login where URL is the URL to the csFAQ.cgi file on your
server. Example:
http://www.mycompany.com/cgi-script/csFAQ/csFAQ.cgi?command=login
Log in with the username and password you entered in the setup.cgi file.

Adding an FAQ Category:
Click the 'Add FAQ Category' button. Enter the name and click the submit
button. The new category will appear in the dropdown list.


Adding an FAQ to a category:
In additional to people being able to send you an FAQ to approve and enter
in a category, you can also manually add an FAQ. Once you have a particular
catagory open in the management screen, you can add an FAQ by clicking the
'Add FAQ' button. You can also edit or delete an existing FAQ. To reorder
the FAQs, select the desired number in the dropdown menu next to the FAQ. 
For example, if you take #5 and drop it down to #1, it becomes the first
FAQ.



Displaying FAQ Catagories

There are many different options for displaying the various FAQ categories
and individual FAQ items. 

To display all the FAQ categories

   When you are in the management screen for any FAQ, buttons are provided
   to display the link to the main index of all the categories. There are 2
   options. The default option wraps the categories within a table, the 
   'plain' option just prints out the categories.

To display the main index for an individual FAQ category:

   When you are in the management screen for a particular FAQ category,
   clicking the 'Master Links' button will give you the code for a 
   direct link to the FAQ index and the server side include (SSI)
   code for the same view.

To display an individual FAQ item within a FAQ category:

   When you are in the management screen for a particular FAQ category,
   clicking the 'Direct Links' button next to the FAQ item will give 
   you the code for a direct link to the FAQ item and the server side
   include (SSI) code for the same view.

In addition to displaying an individual FAQ item, you can display its
full page by adding ',FULL' at the end of the url. Example:
http://www.cgiscript.net/cgi-script/csFAQ/csFAQ.cgi?database=test%2edb&command=viewFAQ&id=1,FULL

This would display the full page view for the FAQ item with id='1'

To display the first item in the list:

1. When you are in the management screen for a particular FAQ category,
   clicking the 'First Links' button will give you the code for a direct link 
   to the first FAQ item of the list and the server side include (SSI) 
   code for the same view.

Displaying the first item of the list is useful for having a FAQ item
displayed on your page that is updated on a regular basis. One example
would be 'FAQ of the week'. The FAQ item that is the first one in
the list would be displayed. As you add new items, they become the first
one on the list moving the previous first one down. The index view of the
FAQ category could then be used as an archive. 


Troubleshooting:

500 Internal Server Error.

Make sure the cgi files where uploaded in asci format and not binary format. 
Make sure you have the correct path to perl.
If you have access to your error log. Look in that file to
see if there are any clues as to what is happening. Missing perl modules
can also cause this error

I can't view any images or html files.

You probably installed it in a cgi-bin directory or other directory that is 
specifically designed to only run cgis. Install the script in another 
directory.

I get a forbidden error when i try to access the script.

Chmod the script to 755 to make it executable. If you are not familiar with
changing file permissions, ask your server administrator for some assistance.

It doesn't appear to be saving anything.

Your webserver might not have write access to your directory. A quick fix is
to chmod the csFAQ and subdirectories to 777 to give the webserver right access,
however this opens the directory for write access to other people on your website.

I get an error immediately when i try to login to the management screen.

Check the variables in your setup.cgi file. The variable most commonly misconfigured
is the path variable. If you don't know the full path to your website on the server,
your hosting provider will be able to provide you with this information.

--------
If you have any comments, questions, concerns or new script ideas go 
to http://www.cgiscript.net and submit Contact Form. Installation 
is available.

This is only one of many cool scripts we have, check 
out http://www.cgiscript.net
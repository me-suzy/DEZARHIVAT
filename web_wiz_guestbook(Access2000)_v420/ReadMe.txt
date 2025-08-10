Web Wiz Guide Guestbook realease v4.20


****************************************************************************************
**  Copyright Notice    
**
**  Web Wiz Guide Guestbook
**                                                              
**  Copyright 2001-2002 Bruce Corkhill All Rights Reserved.                                
**
**  This program is free software; you can redistribute it and/or modify
**  it under the terms of the GNU General Public License as published by
**  the Free Software Foundation; either version 2 of the License, or
**  any later version.
**
**  All copyright notices must remain intacked in the scripts and the 
**  outputted HTML.
**
**  You may not pass the whole or any part of this application off as your own work.
**   
**  All links to Web Wiz Guide must remain in place and the powered by
**  logo with link back to Web Wiz Guide must remain visiable when the pages
**  are viewed.
**
**  This program is distributed in the hope that it will be useful,
**  but WITHOUT ANY WARRANTY; without even the implied warranty of
**  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
**  GNU General Public License for more details.
**    
**  You should have received a copy of the GNU General Public License
**  along with this program; if not, write to the Free Software
**  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA	
** 
**
**  No official support is available for this program but you may post support questions at: -
**  http://www.webwizguide.com/forum
**
**  Support questions are NOT answered by e-mail ever!
**
**  For correspondence or non support questions contact: -
**  asp@webwizguide.com
**
****************************************************************************************


Introduction
===========================================================================================
Thank you fordownloading this application and hoepfully you will find it of benefit to you.

If you have not downloaded this appliaction from Web Wiz Guide then check for the latest
version at: -

http://www.webwizguide.com


This applcation uses ASP and must be run through a web server supporting ASP. 

It has been tested on PWS 4 and IIS 4 and 5 on Windows 2000/XP/NT4/98

The CDONTS, w3 JMail, or Persists AspEmail, component must be installed on the web server 
in order to use the e-mail features of the Guestbook. An SMTP server also needs to be installed 
on the server if you are using the CDONTS component.

The CDONTS component comes with IIS 4/5 on NT4/Win2k, but does NOT come with IIS5.1 
on Windows XP.

===========================================================================================





Using the Guestbook
===========================================================================================

1. Unzip all the files to the same directory on the web server (smiley images should be in 
the directory guestbook_images)

2. Files must be run through an ASP enabled web server

3. The main page is 'default.asp'

4. To adminster the guestbook use the page 'admin.htm' page from where you can amend/delete 
comments, configure, colours, fonts, e-mail notification, etc.

5. The username and password for the admin.htm page from where you can administer the 
guestbook is: -

	Username - Administrator
	Password - letmein

===========================================================================================




Brinkster Users
===========================================================================================
If you are using the application on Brinkster then you need to follow the steps below to 
configure the application on Brinkster: -

1. You should find a folder on your Brinkster web space called db, you will need to place 
the guestbook.mdb database in this folder. 

2. Edit the file called common.inc with a text editor and uncomment the Brinkster 
database driver string and place your Brinkster username into the string where indicated.

3. Make sure you remove the present database driver string other wise the application 
wont know which one to use.

===========================================================================================




Common database error when using the Guestbook
===========================================================================================

If you recieve the following error: -

Microsoft OLE DB Provider for ODBC Drivers error '80004005' 
[Microsoft][ODBC Microsoft Access Driver] Operation must use an updateable query.

This means that the directory the database is in does not have the right permissions 
to be able to write to the database. 

If you are running the web server yourself and using the NTFS file system then there is
an FAQ page at, http://www.webwizguide.com/asp/FAQ, on how to change the server permissions 
on Win2k/NT4.  

If you are not running the server yourself then you will need to contact the server's
adminstrator and ask them to change the permissions otherwise you cannot update a database.


For other common database errors see:-  

http://www.webwizguide.com/asp/faq/access_database_faq.asp

===========================================================================================





Problems running the Guestbook
===========================================================================================

If you are having trouble with the application then please take a look at the FAQ pages at: -

	http://www.webwizguide.com/asp/FAQ


If you are still having problems then post support questions, queries, suggestions, at: -
	
	http://www.webwizguide.com/forum 

The is no official support for this application as support costs a large amount of unpaid 
time that is not always available to devote to the many questions posted.

===========================================================================================




Donations
===========================================================================================

Many 1000's of unpaid hours have gone into developing this and the other applications available
for free from Web Wiz Guide.

If you like using this application then please help support the development and update of 
this and future applications.

If you would like to remove the powered by logo from the application then you must make a 
donation to Web Wiz Guide.



You can send donations to: -

	Bruce Corkhill
	PO Box 4982
	Bournemouth
	BH8 8XP
	United Kingdom

Please make checks payable to: - Bruce Corkhill



Or you can use your Credit Card or E-Check at PayPal via Web Wiz Guide's web site at: -

	http://www.webwizguide.com/donations

PayPal is an easy way to send donations over the internet for free. You can use a credit/ 
debit card or bank account and best of all it's fast, free and secure. 

===========================================================================================




Other ASP Applications
===========================================================================================

The following ASP Appliacations are available for free from http://www.webwizguide.com 

	ASP Discussion Forum
	ASP Guestbook
	Site Search Engine
	Weekly Poll
	Site News Administrator
	Internet Search Engine
	Mailing List
	Graphical Hit Counter
	Graphical Session Hit Counter
	Database Hidden Hit Counter
	Active Users Counter
	E-mail Form's
	Database Login Page

===========================================================================================




Thanks to
===========================================================================================

Thanks to ::foo:: form http://www.forgetfoo.com for all the help with the emoticons

===========================================================================================




If I have missed anything out or any bugs then please let me know by e-mailing me at: -

asp@webwizguide.com



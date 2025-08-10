Web Wiz Guide ASP Weekly Poll v3.03


****************************************************************************************
**  Copyright Notice    
**
**  Web Wiz Guide ASP Mailing List
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
Thank you fordownloading this application and hopefully you will find it of benefit to you.

If you have not downloaded this appliaction from Web Wiz Guide then check for the latest
version at: -

http://www.webwizguide.com


This applcation uses ASP and must be run through a web server supporting ASP.

===========================================================================================




Using the ASP Weekly Poll
===========================================================================================

1. Unzip all the files to the same directory as you wish to show the weekly poll in

2. Files MUST be run through an ASP enabled web server.

3. The default.asp page is only to show you the script running.

4. If you wish to place the Weekly Poll on a diffrent page to the  default.asp page supplied 
(e.g your homepage) then you will need to: -


	For IIS5+(Win2K\XP) Servers

		4.1 Delete the default.asp page. 
		4.2 Place everything else supplied in the zip file into the folder where the 
		    page is you want the Weekly Poll to be on.
		4.3 Place the following line into the web page where you want the Weekly Poll
		    to be displayed (the page MUST have the extension .asp): -

    			<% Server.Execute "mailing_list.inc" %>


	For IIS4(NT4) Servers

		4.1 Delete the default.asp page. 
		4.2 Place everything else supplied in the zip file into the folder where the 
		    page is you want the Weekly Poll to be on.
		4.3 Place the following line into the HTML on the page(DON'T put between the asp 
		    tags, <% %>)  where you want the Weekly poll to be displayed (the page 
		    MUST have the extension .asp): -

    			<!--#include file="mailing_list.inc" -->


6. If you find you are having problems make sure: -

	6.1 The page you want the weekly poll on is an ASP page with the .asp extension.
	6.2 All the other files from the zip file, except the default.asp, are in the same 
	    folder as the page you want the Weekly Poll on. 

7. To adminster the Weekly Poll use the page 'admin.htm' page from where you can enter new
polls, amend polls, delete polls, change the colours of fonts, pages, etc to fit in with your
own web site.

8. The username and password for the admin.htm page from where you can administer the 
Weekly Poll from is: -

	Username - Administrator
	Password - letmein

===========================================================================================






Brinkster Users
===========================================================================================
If you are using the Weekly Poll on Brinkster then you need to follow the steps below to 
configure the Weekly Poll on Brinkster: -

1. You should find a folder on your Brinkster web space called db, you will need to place the 
weekly_poll.mdb database in this folder. 

2. Edit the file called common.inc with a text editor and uncomment the Brinkster database 
driver string and place your Brinkster username into the string where indicated.

3. Make sure you remove the present database driver string other wise the application wont 
know which one to use.

===========================================================================================





Common database error when using the Weekly Poll
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





Problems running the ASP Weekly Poll
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

If you would like to remove the powered by logo and links from the application then you must 
make a donation of any amount you like to Web Wiz Guide.


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
	Login Page

===========================================================================================




If I have missed anything out or any bugs then please let me know by e-mailing me at: -

asp@webwizguide.com



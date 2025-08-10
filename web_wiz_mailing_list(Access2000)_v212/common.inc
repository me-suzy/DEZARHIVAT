<%
'****************************************************************************************
'**  Copyright Notice    
'**
'**  Web Wiz Guide ASP Mailing List
'**                                                              
'**  Copyright 2001 Bruce Corkhill All Rights Reserved.                                
'**
'**  This program is free software; you can redistribute it and/or modify
'**  it under the terms of the GNU General Public License as published by
'**  the Free Software Foundation; either version 2 of the License, or
'**  any later version.
'**
'**  All copyright notices must remain intacked in the scripts and the 
'**  outputted HTML.
'**
'**  You may not pass the whole or any part of this application off as your own work.
'**   
'**  All links to Web Wiz Guide must remain in place and the powered by
'**  logo with link back to Web Wiz Guide must remain visiable when the pages
'**  are viewed.
'**
'**  This program is distributed in the hope that it will be useful,
'**  but WITHOUT ANY WARRANTY; without even the implied warranty of
'**  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
'**  GNU General Public License for more details.
'**    
'**  You should have received a copy of the GNU General Public License
'**  along with this program; if not, write to the Free Software
'**  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA	
'** 
'**
'**  No official support is available for this program but you may post support questions at: -
'**  http://www.webwizguide.com/forum
'**
'**  Support questions are NOT answered by e-mail ever!
'**
'**  For correspondence or non support questions contact: -
'**  asp@webwizguide.com
'**
'****************************************************************************************


Dim adoCon 			'Database Connection Variable
Dim strAccessDB 		'Holds the Access Database Name
Dim rsConfiguration		'Holds the configuartion recordset
Dim strCon			'Holds the Database driver and the path and name of the database
Dim strSQL			'Holds the SQL query for the database
Dim strWebsiteName		'Holds the website name
Dim strWebsiteAddress		'Holds the website URL and path to the script
Dim strWebsiteEmailAddress	'Holds the forum e-mail address
Dim strTestEmailAddress		'holds the e-mail address the preview e-mail is sent to
Dim strMailComponent		'Email coponent the mailing list useses
Dim strMailServer		'Websites incomming mail server (for JMail)
Dim strBgColour			'Holds the background colour of the Mailing List
Dim strTextColour		'Holds the text colour of the Mailing List
Dim strTextType			'Holds the font type of the Mailing List
Dim intTextSize			'Holds the font size of the Mailing List
Dim strLinkColour		'Holds the link colour of the Mailing List
Dim strVisitedLinkColour	'Holds the visited link colour of the Mailing List
Dim strHoverLinkColour		'Holds the mouse over link colour of the Mailing List
Dim strWelcomeMessage		'Holds the welcome message that is sent to users



'Create database connection
'Initialise the strAccessDB variable with the name of the Access Database
strAccessDB = "mailing_list.mdb"

'Create a connection odject
Set adoCon = Server.CreateObject("ADODB.Connection")
			 
'------------- If you are having problems with the script then try using a diffrent driver or DSN by editing the lines below --------------
			 
'Database connection info and driver (if this driver does not work then comment it out and use one of the alternative drivers)
strCon = "DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=" & Server.MapPath(strAccessDB)
'Alternative drivers
'strCon = "Provider=Microsoft.Jet.OLEDB.3.51; Data Source=" & Server.MapPath(strAccessDB) 'This one is for Access 97
'strCon = "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath(strAccessDB)  'This one is for Access 2000

'If you wish to use DSN then comment out the driver above and uncomment the line below (DSN is slower than the above drivers)
'strCon = "DSN=guestbook" 'Place the DSN name after the DSN=

'---------------------------------------------------------------------------------------------------------------------------------------------

'Set an active connection to the Connection object
adoCon.Open strCon


'Read in the mailing list configuration
'Intialise the ADO recordset object
Set rsConfiguration = Server.CreateObject("ADODB.Recordset")

'Initialise the SQL variable with an SQL statement to get the configuration details from the database
strSQL = "SELECT tblConfiguration.* From tblConfiguration;"

'Query the database
rsConfiguration.Open strSQL, strCon

'If there is config deatils in the recordset then read them in
If NOT rsConfiguration.EOF Then

	'Read in the configuration details from the recordset
	strWebsiteName = rsConfiguration("website_name")
	strWebsiteAddress = rsConfiguration("website_address")
	strWebsiteEmailAddress = rsConfiguration("website_email_address")
	strTestEmailAddress = rsConfiguration("test_email_address")
	strMailComponent = rsConfiguration("mail_component")
	strMailServer = rsConfiguration("mail_server")
	strBgColour = rsConfiguration("bg_colour")
	strTextColour = rsConfiguration("text_colour")
	strTextType = rsConfiguration("text_type")
	intTextSize = CInt(rsConfiguration("text_size"))
	strLinkColour = rsConfiguration("links_colour")
	strVisitedLinkColour = rsConfiguration("visited_links_colour")
	strHoverLinkColour = rsConfiguration("active_links_colour")
	strWelcomeMessage = rsConfiguration("con_message")
End If

'Reset server object
Set rsConfiguration = Nothing
%>
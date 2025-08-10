<%
'****************************************************************************************
'**  Copyright Notice    
'**
'**  Web Wiz Guide ASP Weekly Poll
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
Dim rsConfiguration		'Holds the configuartion recordset
Dim strCon			'Holds the Database driver and the path and name of the database
Dim strSQL			'Holds the SQL query for the database
Dim strBgColour			'Holds the background colour
Dim strTextColour		'Holds the text colour
Dim strTextType			'Holds the font type
Dim intTextSize			'Holds the font size 
Dim intSmTextSize		'Holds the small font size
Dim strLinkColour		'Holds the link colour
Dim strTableColour		'Holds the table colour
Dim strTableBorderColour	'Holds the table border colour
Dim strVisitedLinkColour	'Holds the visited link colour
Dim strHoverLinkColour		'Holds the mouse over link colour
Dim blnMultipleVotes		'Set to true if the user can vote multiple time

blnMultipleVotes = False

'Create database connection

'Create a connection odject
Set adoCon = Server.CreateObject("ADODB.Connection")
			 
'------------- If you are having problems with the script then try using a diffrent driver or DSN by editing the lines below --------------
			 
'Database connection info and driver (if this driver does not work then comment it out and use one of the alternative drivers)
strCon = "DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=" & Server.MapPath("weekly_poll.mdb")

'Database driver for Brinkster
'strCon = "DRIVER={Microsoft Access Driver (*.mdb)}; DBQ=" & Server.MapPath("/USERNAME/db/weekly_poll.mdb") 'This one is for Brinkster users place your Brinster username where you see USERNAME

'Alternative drivers faster than the generic access one above
'strCon = "Provider=Microsoft.Jet.OLEDB.3.51; Data Source=" & Server.MapPath("weekly_poll.mdb") 'This one is if you convert the database to Access 97
'strCon = "Provider=Microsoft.Jet.OLEDB.4.0; Data Source=" & Server.MapPath("weekly_poll.mdb")  'This one is for Access 2000/2002

'If you wish to use DSN then comment out the driver above and uncomment the line below (DSN is slower than the above drivers)
'strCon = "DSN = DSN_NAME" 'Place the DSN where you see DSN_NAME

'---------------------------------------------------------------------------------------------------------------------------------------------

'Set an active connection to the Connection object
adoCon.Open strCon



'Read in the Weekly Poll configuration
'Intialise the ADO recordset object
Set rsConfiguration = Server.CreateObject("ADODB.Recordset")

'Initialise the SQL variable with an SQL statement to get the configuration details from the database
strSQL = "SELECT tblConfiguration.* From tblConfiguration;"

'Query the database
rsConfiguration.Open strSQL, strCon

'If there is config deatils in the recordset then read them in
If NOT rsConfiguration.EOF Then

	'Read in the configuration details from the recordset
	strBgColour = rsConfiguration("bg_colour")
	strTextColour = rsConfiguration("text_colour")
	strTextType = rsConfiguration("text_type")
	intTextSize = CInt(rsConfiguration("text_size"))
	intSmTextSize = CInt(rsConfiguration("sm_text_size"))
	strLinkColour = rsConfiguration("links_colour")
	strTableColour = rsConfiguration("table_colour")
	strTableBorderColour = rsConfiguration("table_border_colour")
	strVisitedLinkColour = rsConfiguration("visited_links_colour")
	strHoverLinkColour = rsConfiguration("active_links_colour")
	blnMultipleVotes = CBool(rsConfiguration("multiple_votes"))
End If

'Reset server object
Set rsConfiguration = Nothing
%>